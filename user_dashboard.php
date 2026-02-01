<?php
session_start();
if (!isset($_SESSION['user_id'])) { header("Location: login.php"); exit; }

$host = "localhost"; $dbname = "serviplus"; $dbuser = "root"; $dbpass = "";
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) { die("Connection failed: " . $e->getMessage()); }

$user_id = $_SESSION['user_id'];

// --- 1. PAYMENT SYNC LOGIC ---
if (isset($_POST['user_verify_payment'])) {
    $b_id = $_POST['b_id'];
    $category = $_POST['b_cat'];
    
    $t_mapping = [
        'Cook' => 'cook_bookings', 'Driver' => 'driver_bookings',
        'Electrician' => 'electrician_bookings', 'Housekeeping' => 'housekeeping',
        'Mechanical' => 'machenical_booking', 'Plumber' => 'plumber'
    ];
    
    if(isset($t_mapping[$category])) {
        $table = $t_mapping[$category];
        $update_pay = $pdo->prepare("UPDATE `$table` SET payment_status = 'Paid' WHERE id = ?");
        if($update_pay->execute([$b_id])) {
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script>
                window.onload = function() {
                    Swal.fire('Success', 'Payment Verified! Blue Tick Activated.', 'success').then(() => {
                        window.location.href = window.location.pathname;
                    });
                }
            </script>";
        }
    }
}

// --- FIX: User details fetch logic ---
$user_stmt = $pdo->prepare("SELECT username, email FROM users WHERE id = ?");
$user_stmt->execute([$user_id]);
$user_data = $user_stmt->fetch();

// Variable define karna zaruri hai taaki error na aaye
$user_name = $user_data['username'] ?? 'Customer'; 
$user_email = $user_data['email'] ?? ''; 

if (empty($user_email)) { die("Error: User email not found."); }

// --- 2. SQL QUERY FIX (Removed hardcoded 'Unpaid' to fetch real DB status) ---
// --- 2. SQL QUERY FIX (Columns order synchronized) ---
$booking_sql = "
    SELECT id, 'Cook' as s_cat, service_type as s_name, created_at, current_status, 'fa-utensils' as icon, full_address as addr, total_price as price, payment_status as p_status, latitude, longitude FROM cook_bookings WHERE email = ?
    UNION ALL
    SELECT id, 'Driver' as s_cat, service as s_name, created_at, current_status, 'fa-car' as icon, full_address as addr, total_price as price, payment_status as p_status, latitude, longitude FROM driver_bookings WHERE email = ?
    UNION ALL
    SELECT id, 'Electrician' as s_cat, service_type as s_name, submitted_at as created_at, current_status, 'fa-bolt' as icon, address as addr, total_price as price, payment_status as p_status, latitude, longitude FROM electrician_bookings WHERE email = ?
    UNION ALL
    SELECT id, 'Housekeeping' as s_cat, service_type as s_name, created_at, current_status, 'fa-broom' as icon, address as addr, total_price as price, payment_status as p_status, latitude, longitude FROM housekeeping WHERE email = ?
    UNION ALL
    SELECT id, 'Plumber' as s_cat, service as s_name, created_at, current_status, 'fa-faucet' as icon, address as addr, total_price as price, payment_status as p_status, latitude, longitude FROM plumber WHERE email = ?
    UNION ALL
    SELECT id, 'Mechanical' as s_cat, service_type as s_name, created_at, current_status, 'fa-gear' as icon, address as addr, total_price as price, payment_status as p_status, latitude, longitude FROM machenical_booking WHERE email = ?
    ORDER BY created_at DESC";

$booking_stmt = $pdo->prepare($booking_sql);
$booking_stmt->execute(array_fill(0, 6, $user_email));
$all_bookings = $booking_stmt->fetchAll();

function getStatusUI($status) {
    $status = strtolower($status ?? '');
    switch ($status) {
        case 'completed': return ['color' => 'emerald', 'percent' => 100, 'icon' => 'fa-check-double'];
        case 'in progress': return ['color' => 'blue', 'percent' => 75, 'icon' => 'fa-truck-fast'];
        case 'confirmed': return ['color' => 'indigo', 'percent' => 40, 'icon' => 'fa-thumbs-up'];
        case 'pending': return ['color' => 'orange', 'percent' => 20, 'icon' => 'fa-clock'];
        default: return ['color' => 'slate', 'percent' => 15, 'icon' => 'fa-spinner'];
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard | ServiPlus</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap');
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: #f8fafc; }
        .glass-card { background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.5); border-radius: 2rem; }
        .map-frame { height: 0; transition: all 0.5s ease; overflow: hidden; border-radius: 1.5rem; }
        .map-frame.active { height: 300px; margin-top: 1rem; border: 1px solid #e2e8f0; }
    </style>
</head>
<body class="bg-slate-50">

<header class="bg-white border-b border-slate-100 sticky top-0 z-[1000] shadow-sm">
    <nav class="max-w-7xl mx-auto px-4 md:px-10 h-20 flex items-center justify-between">
        
        <div class="flex items-center gap-2">
            <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center shadow-lg shadow-indigo-200">
                <i class="fa-solid fa-bolt-lightning text-white text-xl"></i>
            </div>
            <span class="text-2xl font-black text-slate-800 tracking-tighter">Servi<span class="text-indigo-600">Plus+</span></span>
        </div>

        <ul class="hidden md:flex items-center gap-8 text-sm font-bold text-slate-600">
            <li><a href="index.php" class="hover:text-indigo-600 transition-colors">Home</a></li>
            <li class="relative group">
                <button class="flex items-center gap-1 hover:text-indigo-600 transition-colors uppercase tracking-widest text-[11px]">
                    Services <i class="fa-solid fa-chevron-down text-[10px]"></i>
                </button>
                <div class="absolute top-full left-0 mt-2 w-48 bg-white border border-slate-100 rounded-2xl shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 py-2">
                    <a href="houskeeping.php" class="block px-4 py-2 hover:bg-slate-50">🧹 Housekeeping</a>
                    <a href="elctrician.php" class="block px-4 py-2 hover:bg-slate-50">💡 Electrician</a>
                    <a href="plumber.php" class="block px-4 py-2 hover:bg-slate-50">🔧 Plumber</a>
                    <hr class="my-1 border-slate-100">
                    <a href="All-servic.php" class="block px-4 py-2 text-indigo-600 font-black">View All</a>
                </div>
            </li>
            <li><a href="directory.php" class="hover:text-indigo-600 transition-colors">Expert Employers</a></li>
        </ul>

        <div class="flex items-center gap-4">
            <?php if(isset($_SESSION['user_id'])): ?>
                <div class="flex items-center gap-3 pl-4 border-l border-slate-200">
                    <div class="text-right hidden sm:block">
                        <p class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Welcome back</p>
                        <p class="text-sm font-bold text-slate-800"><?= htmlspecialchars($user_name) ?></p>
                    </div>
                    <a href="user_dashboard.php" class="w-10 h-10 bg-slate-100 rounded-full flex items-center justify-center hover:bg-indigo-50 transition-all border border-slate-200">
                        <i class="fa-solid fa-user-gear text-slate-600"></i>
                    </a>
                </div>
            <?php else: ?>
                <a href="login.php" class="bg-indigo-600 text-white px-6 py-2.5 rounded-xl font-black text-xs uppercase tracking-widest hover:bg-slate-900 transition-all">
                    Login
                </a>
            <?php endif; ?>

            <button class="md:hidden text-slate-800 text-xl" onclick="toggleMobileMenu()">
                <i class="fa-solid fa-bars-staggered"></i>
            </button>
        </div>
    </nav>

    <div id="mobileMenu" class="md:hidden hidden bg-white border-t border-slate-50 p-6 space-y-4">
        <a href="index.php" class="block font-bold text-slate-700">Home</a>
        <a href="all-services.php" class="block font-bold text-slate-700">Services</a>
        <a href="directory.php" class="block font-bold text-slate-700">Expert Employers</a>
        <?php if(isset($_SESSION['user_id'])): ?>
            <a href="user_dashboard.php" class="block font-bold text-indigo-600">My Dashboard</a>
        <?php endif; ?>
    </div>
</header>

<script>
    function toggleMobileMenu() {
        const menu = document.getElementById('mobileMenu');
        menu.classList.toggle('hidden');
    }
</script>
<style>
    .step-dot { position: relative; z-index: 10; }
    .step-line { position: absolute; top: 50%; left: 0; transform: translateY(-50%); height: 3px; background: #e2e8f0; z-index: 1; width: 100%; }
    .step-active { background: #6366f1 !important; } /* Indigo-500 */
</style>

<div class="max-w-4xl mx-auto px-4 py-10">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-4">
        <div>
            <h1 class="text-3xl font-black text-slate-900 tracking-tight">Hey, <?= htmlspecialchars($user_name) ?>!</h1>
            <p class="text-slate-500 font-medium">You have <span class="text-indigo-600 font-bold"><?= count($all_bookings) ?></span> total bookings.</p>
        </div>
        <div class="bg-white px-4 py-2 rounded-2xl shadow-sm border border-slate-100 flex items-center gap-3">
            <div class="w-3 h-3 bg-emerald-500 rounded-full animate-pulse"></div>
            <span class="text-xs font-bold text-slate-600 uppercase tracking-widest">Live Updates</span>
        </div>
    </div>

    <div class="space-y-8">
        <?php foreach ($all_bookings as $b): 
            $status = strtolower($b['current_status']);
            $ui = getStatusUI($b['current_status']);
            $isPaid = (strtolower($b['p_status']) == 'paid');
        ?>
        <div class="glass-card p-6 md:p-8 shadow-sm hover:shadow-xl transition-all border border-slate-50">
            <div class="flex flex-col md:flex-row justify-between gap-6 mb-8">
                <div class="flex gap-5">
                    <div class="w-16 h-16 bg-<?= $ui['color'] ?>-50 rounded-2xl flex items-center justify-center text-2xl text-<?= $ui['color'] ?>-600 border border-<?= $ui['color'] ?>-100">
                        <i class="fa-solid <?= $b['icon'] ?>"></i>
                    </div>
                    <div>
                        <span class="text-[10px] font-black uppercase text-indigo-500 tracking-[0.2em]"><?= $b['s_cat'] ?> Service</span>
                        <h2 class="text-xl font-extrabold text-slate-800 leading-tight"><?= $b['s_name'] ?></h2>
                        <p class="text-xs font-bold text-slate-400 mt-1 uppercase tracking-tighter italic">ID: #SP-<?= $b['id'] ?> | <?= date('d M Y', strtotime($b['created_at'])) ?></p>
                    </div>
                </div>

                <div class="flex flex-row md:flex-col justify-between items-center md:items-end gap-2">
                   <div class="text-right">
                          <p class="text-[9px] font-black text-slate-400 uppercase tracking-widest">Final Price</p>
                          <p class="text-2xl font-black text-slate-900 leading-none">
                             ₹<?= number_format((float)($b['price'] ?? 0), 2) ?>
                          </p>
                            </div>
                    <span class="text-[9px] font-black px-3 py-1 rounded-full <?= $isPaid ? 'bg-emerald-100 text-emerald-700' : 'bg-rose-100 text-rose-700' ?>">
                        <i class="fa-solid <?= $isPaid ? 'fa-circle-check' : 'fa-circle-exclamation' ?> mr-1"></i>
                        <?= $isPaid ? 'PAID' : 'PAYMENT PENDING' ?>
                    </span>
                </div>
            </div>

            <div class="relative flex justify-between items-center mb-10 px-2">
                <div class="step-line"></div>
                <div class="absolute top-50 left-0 transform -translate-y-1/2 h-[3px] bg-indigo-500 transition-all duration-700" style="width: <?= $ui['percent'] ?>%; z-index: 2;"></div>
                
                <?php 
                $steps = ['Pending', 'Confirmed', 'In Progress', 'Completed'];
                foreach($steps as $index => $stepName):
                    $isPassed = $ui['percent'] >= ($index * 33); // Simplified logic for 4 steps
                    $activeColor = $isPassed ? 'bg-indigo-600 text-white' : 'bg-slate-200 text-slate-500';
                ?>
                <div class="flex flex-col items-center gap-2 relative z-10">
                    <div class="w-8 h-8 <?= $activeColor ?> rounded-full flex items-center justify-center text-[10px] font-bold shadow-md transition-all duration-500">
                        <?php if($ui['percent'] > ($index * 33)): ?> <i class="fa-solid fa-check"></i> <?php else: echo $index + 1; endif; ?>
                    </div>
                    <span class="text-[9px] font-black uppercase tracking-tighter <?= $isPassed ? 'text-indigo-600' : 'text-slate-400' ?>"><?= $stepName ?></span>
                </div>
                <?php endforeach; ?>
            </div>

            <div class="flex flex-wrap md:flex-nowrap gap-3">
                


         
   <?php if($b['p_status'] != 'Paid'): ?>
        <form method="POST" class="flex-1">
            <input type="hidden" name="b_id" value="<?= $b['id'] ?>">
            <input type="hidden" name="b_cat" value="<?= $b['s_cat'] ?>">
            <button name="user_verify_payment" class="w-full bg-indigo-600 text-white font-bold py-3 rounded-xl text-[10px] uppercase tracking-widest hover:bg-blue-600 transition flex items-center justify-center gap-2">
                <i class="fa-solid fa-credit-card"></i> Pay & Verify
            </button>
        </form>
    <?php else: ?>
        <div class="flex-1 bg-blue-50 text-blue-600 font-bold py-3 rounded-xl text-[10px] uppercase tracking-widest flex items-center justify-center gap-2 border border-blue-200">
            <i class="fa-solid fa-shield-check"></i> Verified Paid
        </div>
    <?php endif; ?>
<a href="https://wa.me/7739495175?text=Hello! I need help with my booking ID: #SP-<?= $b['id'] ?>" 
   target="_blank" 
   class="w-12 bg-emerald-100 text-emerald-600 rounded-xl hover:bg-emerald-600 hover:text-white transition flex items-center justify-center shadow-sm"
   title="Chat on WhatsApp">
    <i class="fa-brands fa-whatsapp text-xl"></i>
</a>

<!--  -->
<?php
// Ensure $user_email is set from session
$user_email = $_SESSION['user_email'] ?? ''; 

if (!empty($user_email)):
    // Query with check to avoid errors if no employer is assigned yet
    $sql = "SELECT b.*, e.name as emp_name, e.phone as emp_phone, 
                   IFNULL(e.latitude, 0) as latitude, 
                   IFNULL(e.longitude, 0) as longitude 
            FROM cook_bookings b 
            LEFT JOIN employer e ON b.employer_id = e.id 
            WHERE b.customer_email = '$user_email' 
            AND b.current_status != 'Pending'
            ORDER BY b.id DESC LIMIT 1";

    $res = $conn->query($sql);

    // Agar booking mil jaye tabhi card dikhao
    if ($res && $data = $res->fetch_assoc()): 
        // JavaScript ke liye safe coordinates
        $lat = !empty($data['latitude']) ? $data['latitude'] : 0;
        $lng = !empty($data['longitude']) ? $data['longitude'] : 0;
?>
    <div class="max-w-md mx-auto bg-white rounded-[2rem] shadow-2xl border border-slate-100 overflow-hidden mt-6">
        <div class="bg-indigo-600 p-6 text-white flex justify-between items-center">
            <div>
                <p class="text-[10px] font-black uppercase opacity-80">Service Provider</p>
                <h2 class="text-xl font-black italic uppercase"><?= htmlspecialchars($data['emp_name'] ?? 'Assigned soon') ?></h2>
            </div>
            <div class="h-12 w-12 bg-white/20 rounded-full flex items-center justify-center">
                <i class="fa fa-user-check text-xl text-white"></i>
            </div>
        </div>
        
        <div class="p-6">
            <div class="flex items-center justify-between mb-4">
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Current Status</span>
                <span class="px-3 py-1 bg-emerald-100 text-emerald-600 text-[10px] font-black rounded-full uppercase">
                    <?= htmlspecialchars($data['current_status']) ?>
                </span>
            </div>

            <div class="flex gap-3 mt-6">
                <a href="tel:<?= $data['emp_phone'] ?>" class="flex-1 bg-slate-900 text-white text-center py-3 rounded-xl text-xs font-black uppercase hover:bg-slate-800 transition">
                    <i class="fa fa-phone mr-2"></i> Call Now
                </a>
                
                <button onclick="toggleMap('live_map_div', <?= $lat ?>, <?= $lng ?>)" class="flex-1 bg-indigo-50 text-indigo-600 text-center py-3 rounded-xl text-xs font-black uppercase border border-indigo-100 hover:bg-indigo-100 transition">
                    <i class="fa fa-location-dot mr-2"></i> Track Live
                </button>
            </div>

            <div id="live_map_div" class="map-frame"></div>
        </div>
    </div>
<?php 
    endif; 
endif; 
?>
<!--  -->
            </div>

            <div id="map-<?= $b['id'] ?>" class="map-frame mt-4"></div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
    <?php
$grand_total = 0;
$total_bookings = count($all_bookings);
foreach($all_bookings as $b) {
    $grand_total += (float)$b['price'];
}
?>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6 mb-8 md:mb-10 px-2 sm:px-0">
    
    <div class="bg-indigo-600 rounded-[1.5rem] md:rounded-[2rem] p-5 md:p-6 shadow-xl shadow-indigo-100 relative overflow-hidden group min-h-[140px] flex flex-col justify-center">
        <div class="absolute -right-4 -top-4 w-20 h-20 md:w-24 md:h-24 bg-white/10 rounded-full transition-transform group-hover:scale-150 duration-700"></div>
        
        <div class="relative z-10">
            <div class="w-10 h-10 md:w-12 md:h-12 bg-white/20 rounded-xl flex items-center justify-center mb-3 md:mb-4 backdrop-blur-md">
                <i class="fa-solid fa-indian-rupee-sign text-white text-lg md:text-xl"></i>
            </div>
            <p class="text-indigo-100 text-[10px] md:text-xs font-black uppercase tracking-widest mb-1">Total Expenditure</p>
            <h3 class="text-2xl md:text-3xl font-black text-white leading-none">
                ₹<?= number_format($grand_total, 0) ?><span class="text-xs md:text-sm font-medium opacity-70">.<?= explode('.', number_format($grand_total, 2))[1] ?></span>
            </h3>
        </div>
    </div>

    <div class="bg-white border border-slate-100 rounded-[1.5rem] md:rounded-[2rem] p-5 md:p-6 shadow-sm hover:shadow-md transition-all flex flex-col justify-center min-h-[140px]">
        <div class="w-10 h-10 md:w-12 md:h-12 bg-emerald-50 rounded-xl flex items-center justify-center mb-3 md:mb-4">
            <i class="fa-solid fa-clipboard-list text-emerald-600 text-lg md:text-xl"></i>
        </div>
        <p class="text-slate-400 text-[10px] md:text-xs font-black uppercase tracking-widest mb-1">Services Booked</p>
        <h3 class="text-2xl md:text-3xl font-black text-slate-800 leading-none">
            <?= $total_bookings ?> <span class="text-[10px] md:text-xs text-slate-400 font-bold uppercase tracking-tighter">Orders</span>
        </h3>
    </div>

    <div class="bg-white border border-slate-100 rounded-[1.5rem] md:rounded-[2rem] p-5 md:p-6 shadow-sm hover:shadow-md transition-all sm:col-span-2 lg:col-span-1 flex flex-col justify-center min-h-[140px]">
        <div class="flex items-center lg:block gap-4">
            <div class="w-10 h-10 md:w-12 md:h-12 bg-orange-50 rounded-xl flex-shrink-0 flex items-center justify-center lg:mb-4">
                <i class="fa-solid fa-chart-line text-orange-600 text-lg md:text-xl"></i>
            </div>
            <div>
                <p class="text-slate-400 text-[10px] md:text-xs font-black uppercase tracking-widest mb-1">Avg. Per Service</p>
                <h3 class="text-2xl md:text-3xl font-black text-slate-800 leading-none">
                    ₹<?= ($total_bookings > 0) ? number_format($grand_total / $total_bookings, 0) : 0 ?>
                </h3>
            </div>
        </div>
    </div>

</div>

</body>
</html>