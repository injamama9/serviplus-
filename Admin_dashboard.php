<?php
session_start();

// 1. SECURITY CHECK
// Check if user is logged in AND is an admin
if (!isset($_SESSION['role']) || strtolower(trim($_SESSION['role'])) !== 'admin') {
    // User ko message set kar rahe hain
    echo "
    
       <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
        setTimeout(function() {
            Swal.fire({
                icon: 'error',
                title: 'Access Denied!',
                text: 'This Page only for Master Admin .',
                confirmButtonColor: '#6366f1'
            }).then(() => {
                window.history.back();
            });
        }, 100);
    </script>";
   
    // header("Location: index.php"); 
    exit;
}


// Database Connection
$host = "localhost"; $dbname = "serviplus"; $dbuser = "root"; $dbpass = "";
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database Connection Failed: " . $e->getMessage());
}

// --- LOGIC SECTION ---

// Notification Mark as Read Logic
if (isset($_GET['mark_read'])) {
    $pdo->query("UPDATE users SET is_read = 1 WHERE is_read = 0");
    header("Location: admin_dashboard.php?msg=Notifications Cleared");
    exit;
}

if (isset($_POST['update_user'])) {
    $stmt = $pdo->prepare("UPDATE users SET username = ?, email = ?, role = ? WHERE id = ?");
    $stmt->execute([$_POST['username'], $_POST['email'], $_POST['role'], $_POST['user_id']]);
    header("Location: admin_dashboard.php?msg=User Updated Successfully");
    exit;
}

if (isset($_GET['delete_id'])) {
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = ? AND role != 'admin'");
    $stmt->execute([$_GET['delete_id']]);
    header("Location: admin_dashboard.php?msg=User Deleted Successfully");
    exit;
}

if (isset($_GET['verify_id'])) {
    $stmt = $pdo->prepare("UPDATE users SET is_verified = 1 WHERE id = ?");
    $stmt->execute([$_GET['verify_id']]);
    header("Location: admin_dashboard.php?msg=User Verified Successfully");
    exit;
}

// Stats Fetching
$total_emp = $pdo->query("SELECT COUNT(*) FROM users WHERE role = 'employer'")->fetchColumn();
$total_users = $pdo->query("SELECT COUNT(*) FROM users WHERE role = 'user'")->fetchColumn();
$new_signups = $pdo->query("SELECT COUNT(*) FROM users WHERE DATE(created_at) = CURDATE()")->fetchColumn();

// Search & Fetch
$search = $_GET['search'] ?? '';
$sql = "SELECT * FROM users WHERE (username LIKE ? OR email LIKE ?) AND role != 'admin' ORDER BY id DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute(["%$search%", "%$search%"]);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

$unread_count = $pdo->query("SELECT COUNT(*) FROM users WHERE is_read = 0 AND role != 'admin'")->fetchColumn();
$recent_notifications = $pdo->query("SELECT username, created_at FROM users WHERE is_read = 0 AND role != 'admin' ORDER BY id DESC LIMIT 5")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel | ServiPlus+</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; overflow-x: hidden; }
        .sidebar-transition { transition: transform 0.3s ease-in-out; }
        @media (max-width: 1024px) {
            .sidebar-closed { transform: translateX(-100%); }
        }
        .notif-dropdown { display: none; }
        .notif-active .notif-dropdown { display: block; }
    </style>
</head>
<body class="bg-slate-50">

    <div class="lg:hidden bg-slate-900 text-white p-4 flex justify-between items-center sticky top-0 z-50">
        <h1 class="font-black text-xl tracking-tighter italic text-indigo-400">ServiPlus+</h1>
        <button onclick="toggleSidebar()" class="p-2 bg-slate-800 rounded-lg">
            <i class="fa-solid fa-bars-staggered"></i>
        </button>
    </div>

    <div class="flex">
        <aside id="sidebar" class="w-72 bg-slate-900 text-white p-6 h-screen fixed top-0 left-0 z-[60] sidebar-transition sidebar-closed lg:translate-x-0 shadow-2xl">
            <div class="mb-10 flex justify-between items-center">
                <div>
                    <h2 class="text-2xl font-extrabold text-indigo-400 italic">ServiPlus+</h2>
                    <p class="text-[10px] text-slate-500 font-bold uppercase tracking-widest mt-1">Admin Panel</p>
                </div>
                <button onclick="toggleSidebar()" class="lg:hidden text-slate-400"><i class="fa fa-times text-xl"></i></button>
            </div>

            <nav class="space-y-2">
                <a href="admin_dashboard.php" class="flex items-center gap-3 p-4 bg-indigo-600 rounded-2xl font-bold transition shadow-lg shadow-indigo-600/20 text-white">
                    <i class="fa fa-chart-pie text-lg"></i> Dashboard
                </a>
                <a href="employer-registration.php" class="flex items-center gap-3 p-4 text-slate-400 hover:bg-slate-800 rounded-2xl font-bold transition">
                    <i class="fa fa-user-tie text-lg"></i> Employers
                </a>
                <a href="database_inventory.php" class="flex items-center gap-3 p-4 text-slate-400 hover:bg-slate-800 rounded-2xl font-bold transition">
                    <i class="fa fa-database text-lg"></i> DB Inventory
                </a>
                <a href="index.php" class="flex items-center gap-3 p-4 text-slate-400 hover:bg-slate-800 rounded-2xl font-bold transition border-t border-slate-800 mt-6 pt-6">
                    <i class="fa fa-arrow-up-right-from-square text-lg"></i> Visit Site
                </a>
                <div class="pt-10">
                    <a href="logout.php" class="flex items-center gap-3 p-4 text-rose-400 hover:bg-rose-500/10 rounded-2xl font-bold transition">
                        <i class="fa-solid fa-power-off text-lg"></i> Logout
                    </a>
                </div>
            </nav>
        </aside>

        <main class="flex-1 lg:ml-72 min-h-screen p-4 md:p-8 transition-all duration-300">
            
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-10">
                <div class="flex-1 max-w-lg">
                    <form method="GET" class="relative flex gap-2">
                        <div class="relative w-full">
                            <i class="fa fa-search absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                            <input type="text" name="search" value="<?= htmlspecialchars($search) ?>" 
                                   placeholder="Search users by name or email..." 
                                   class="w-full bg-white border border-slate-200 pl-12 pr-4 py-3 rounded-2xl outline-none focus:ring-4 focus:ring-indigo-500/5 focus:border-indigo-400 transition-all shadow-sm">
                        </div>
                        <button type="submit" class="bg-indigo-600 text-white px-6 py-3 rounded-2xl font-bold hover:bg-indigo-700 transition shadow-lg shadow-indigo-200">
                            Search
                        </button>
                    </form>
                </div>

                <div class="flex items-center gap-4 self-end md:self-auto">
                    <div class="relative" id="notif-wrapper">
                        <button onclick="toggleNotif()" class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-slate-400 relative border border-slate-200 hover:text-indigo-600 transition">
                            <i class="fa-solid fa-bell text-xl"></i>
                            <?php if($unread_count > 0): ?>
                                <span class="absolute top-2 right-2 w-5 h-5 bg-rose-500 text-white text-[10px] flex items-center justify-center rounded-full border-2 border-white font-bold">
                                    <?= $unread_count ?>
                                </span>
                            <?php endif; ?>
                        </button>

                        <div class="notif-dropdown absolute right-0 mt-3 w-80 bg-white shadow-2xl rounded-[2rem] border border-slate-100 z-50 overflow-hidden animate-in slide-in-from-top-2 duration-200">
                            <div class="p-5 border-b flex justify-between items-center bg-slate-50">
                                <h4 class="font-black text-slate-800 text-sm">Notifications</h4>
                                <?php if($unread_count > 0): ?>
                                    <a href="?mark_read=1" class="text-[10px] font-bold text-indigo-600 hover:underline uppercase">Mark all read</a>
                                <?php endif; ?>
                            </div>
                            <div class="max-h-80 overflow-y-auto">
                                <?php if(empty($recent_notifications)): ?>
                                    <p class="p-8 text-center text-slate-400 text-xs font-medium italic">No new notifications</p>
                                <?php else: ?>
                                    <?php foreach($recent_notifications as $notif): ?>
                                        <div class="p-4 border-b border-slate-50 hover:bg-slate-50 transition flex items-center gap-3">
                                            <div class="w-8 h-8 bg-indigo-100 rounded-full flex items-center justify-center text-indigo-600 text-xs">
                                                <i class="fa fa-user-plus"></i>
                                            </div>
                                            <div>
                                                <p class="text-xs font-bold text-slate-800"><?= htmlspecialchars($notif['username']) ?> just signed up!</p>
                                                <p class="text-[9px] text-slate-400 mt-0.5"><?= date('M d, h:i A', strtotime($notif['created_at'])) ?></p>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <div class="text-right hidden sm:block">
                            <p class="font-black text-slate-800 leading-none text-sm"><?= htmlspecialchars($_SESSION['username'] ?? 'Admin') ?></p>
                            <span class="text-[10px] text-indigo-500 font-bold uppercase tracking-widest">Master Admin</span>
                        </div>
                        <div class="w-12 h-12 bg-slate-900 rounded-2xl flex items-center justify-center font-black text-white shadow-xl">
                            <?= strtoupper(substr($_SESSION['username'] ?? 'A', 0, 1)) ?>
                        </div>
                    </div>
                </div>
            </div>

            <?php if(isset($_GET['msg'])): ?>
                <div class="bg-emerald-50 text-emerald-700 p-4 rounded-2xl mb-6 font-bold flex items-center border border-emerald-100">
                    <i class="fa fa-check-circle mr-2"></i> <?= htmlspecialchars($_GET['msg']) ?>
                </div>
            <?php endif; ?>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
                <div class="bg-indigo-600 p-8 rounded-[2.5rem] text-white shadow-2xl shadow-indigo-100 relative overflow-hidden group">
                    <p class="text-indigo-100 font-bold text-xs uppercase tracking-widest">Total Employers</p>
                    <h2 class="text-5xl font-black mt-2"><?= $total_emp ?></h2>
                </div>
                <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-slate-100">
                    <p class="text-slate-400 font-bold text-xs uppercase tracking-widest">Active Customers</p>
                    <h2 class="text-5xl font-black mt-2 text-slate-800"><?= $total_users ?></h2>
                </div>
                <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-slate-100">
                    <p class="text-slate-400 font-bold text-xs uppercase tracking-widest">Today's Signups</p>
                    <h2 class="text-5xl font-black mt-2 text-slate-800"><?= $new_signups ?></h2>
                </div>
            </div>

            <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
                <div class="p-8 border-b border-slate-50 flex flex-col sm:flex-row justify-between items-center gap-4">
                    <h3 class="text-xl font-black text-slate-800 tracking-tight">System Users</h3>
                </div>
                <div class="overflow-x-auto p-4">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="text-slate-400 text-[10px] font-black uppercase tracking-[0.2em] border-b">
                                <th class="p-5">User Profile</th>
                                <th class="p-5">Account Type</th>
                                <th class="p-5">Safety</th>
                                <th class="p-5 text-right">Settings</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-50">
                            <?php foreach ($users as $u): ?>
                            <tr class="hover:bg-slate-50 transition-all duration-300">
                                <td class="p-5">
                                    <div class="flex items-center gap-4">
                                        <div class="w-10 h-10 bg-slate-100 rounded-xl flex items-center justify-center font-bold text-slate-500"><?= strtoupper(substr($u['username'], 0, 1)) ?></div>
                                        <div>
                                            <p class="font-black text-slate-800"><?= htmlspecialchars($u['username']) ?></p>
                                            <p class="text-[10px] font-bold text-slate-400"><?= htmlspecialchars($u['email']) ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td class="p-5">
                                    <span class="px-4 py-1.5 rounded-xl text-[9px] font-black tracking-widest uppercase <?= $u['role'] == 'employer' ? 'bg-indigo-100 text-indigo-600' : 'bg-slate-100 text-slate-600' ?>">
                                        <?= $u['role'] ?>
                                    </span>
                                </td>
                                <td class="p-5">
                                    <?php if($u['is_verified'] == 1): ?>
                                        <div class="text-blue-500 font-bold text-[11px]"><i class="fa fa-circle-check mr-1"></i> Verified</div>
                                    <?php else: ?>
                                        <a href="?verify_id=<?= $u['id'] ?>" class="text-emerald-500 hover:underline font-bold text-[11px]">Verify Now</a>
                                    <?php endif; ?>
                                </td>
                                <td class="p-5 text-right flex justify-end gap-2">
                                    <button onclick="openModal('<?= $u['id'] ?>', '<?= addslashes($u['username']) ?>', '<?= $u['email'] ?>', '<?= $u['role'] ?>')" class="w-10 h-10 bg-slate-50 text-slate-400 rounded-xl hover:bg-indigo-600 hover:text-white transition-all flex items-center justify-center"><i class="fa fa-pen-to-square"></i></button>
                                    <a href="?delete_id=<?= $u['id'] ?>" onclick="return confirm('Delete permanently?')" class="w-10 h-10 bg-slate-50 text-rose-300 rounded-xl hover:bg-rose-500 hover:text-white transition-all flex items-center justify-center"><i class="fa fa-trash-can"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <div id="editModal" class="hidden fixed inset-0 bg-slate-900/40 backdrop-blur-sm z-[100] flex items-center justify-center p-4">
        <div class="bg-white w-full max-w-lg rounded-[2.5rem] shadow-2xl overflow-hidden animate-in zoom-in duration-300">
            <div class="p-8 border-b bg-slate-900 text-white flex justify-between items-center">
                <h3 class="font-black text-xl">Edit Authority</h3>
                <button onclick="closeModal()" class="text-slate-400 hover:text-white"><i class="fa fa-times text-xl"></i></button>
            </div>
            <form method="POST" class="p-8 space-y-6">
                <input type="hidden" name="user_id" id="edit_user_id">
                <div>
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Username</label>
                    <input type="text" name="username" id="edit_username" class="w-full border-2 border-slate-100 p-4 rounded-2xl mt-2 font-bold outline-none focus:border-indigo-500">
                </div>
                <div>
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Email</label>
                    <input type="email" name="email" id="edit_email" class="w-full border-2 border-slate-100 p-4 rounded-2xl mt-2 font-bold outline-none focus:border-indigo-500">
                </div>
                <div>
                    <label class="text-[10px] font-black text-slate-400 uppercase tracking-widest ml-1">Role</label>
                    <select name="role" id="edit_role" class="w-full border-2 border-slate-100 p-4 rounded-2xl mt-2 font-bold outline-none focus:border-indigo-500 bg-white">
                        <option value="user">User</option>
                        <option value="employer">Employer</option>
                    </select>
                </div>
                <button type="submit" name="update_user" class="w-full bg-indigo-600 text-white py-5 rounded-2xl font-black text-lg shadow-xl shadow-indigo-200 hover:bg-indigo-700 transition-all">Update Settings</button>
            </form>
        </div>
    </div>

    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('sidebar-closed');
        }

        function toggleNotif() {
            document.getElementById('notif-wrapper').classList.toggle('notif-active');
        }

        // Dropdown ko tab band karein jab bahar click ho
        window.addEventListener('click', function(e) {
            if (!document.getElementById('notif-wrapper').contains(e.target)) {
                document.getElementById('notif-wrapper').classList.remove('notif-active');
            }
        });

        function openModal(id, name, email, role) {
            document.getElementById('edit_user_id').value = id;
            document.getElementById('edit_username').value = name;
            document.getElementById('edit_email').value = email;
            document.getElementById('edit_role').value = role;
            document.getElementById('editModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('editModal').classList.add('hidden');
        }
    </script>
</body>
</html>