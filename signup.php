<?php
// 1. Error Reporting On karein taaki blank screen ki jagah error dikhe agar kuch galat ho
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

// PHPMailer Classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// FILES CHECK: Pehle check karte hain files hain ya nahi
if (!file_exists('./PHPMailer/Exception.php') || !file_exists('./PHPMailer/PHPMailer.php') || !file_exists('./PHPMailer/SMTP.php')) {
    // Agar files nahi hain toh ye message dikhega blank screen ki jagah
    $error = "PHPMailer files are missing in './PHPMailer/' folder!";
} else {
    require './PHPMailer/Exception.php';
    require './PHPMailer/PHPMailer.php';
    require './PHPMailer/SMTP.php';
}

$host = "localhost";
$dbname = "serviplus";
$dbuser = "root";
$dbpass = ""; // Removed hidden space here

$error = $error ?? ""; // Preserve file missing error if any
$success = "";

function is_strong_password($password) {
    $length = strlen($password) >= 8;
    $upper  = preg_match('@[A-Z]@', $password);
    $lower  = preg_match('@[a-z]@', $password);
    $number = preg_match('@[0-9]@', $password);
    $special= preg_match('@[^\w]@', $password);
    return $length && $upper && $lower && $number && $special;
}

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = trim($_POST["username"] ?? "");
        $email = trim($_POST["email"] ?? "");
        $password = $_POST["password"] ?? "";
        $confirm_password = $_POST["confirm_password"] ?? "";
        $role = $_POST["role"] ?? "user";

        if (!$username || !$email || !$password || !$confirm_password || !$role) {
            $error = "All fields are required.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "Invalid email address.";
        } elseif ($password !== $confirm_password) {
            $error = "Passwords do not match.";
        } elseif (!is_strong_password($password)) {
            $error = "Password must be at least 8 chars with A-Z, a-z, 0-9 & @.";
        } else {
            $stmt = $pdo->prepare("SELECT id FROM users WHERE username=:username OR email=:email");
            $stmt->execute(['username' => $username, 'email' => $email]);
            if ($stmt->fetch()) {
                $error = "Username or email already taken.";
            } else {
                $password_hash = password_hash($password, PASSWORD_DEFAULT); 
                if ($role === 'admin') { $role = 'user'; } 

                $stmt = $pdo->prepare("INSERT INTO users (username, email, password_hash, role) VALUES (:username, :email, :password_hash, :role)");
                if ($stmt->execute(['username' => $username, 'email' => $email, 'password_hash' => $password_hash, 'role' => $role])) {
                    
                    // Mail sending logic
                    $mail = new PHPMailer(true);
                    try {
                        $mail->isSMTP();
                        $mail->Host       = 'smtp.gmail.com';
                        $mail->SMTPAuth   = true;
                        $mail->Username   = 'mdinjamama9@gmail.com';
                        $mail->Password   = 'kopmzicoobfbqmhj'; 
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                        $mail->Port       = 587;
                        $mail->setFrom('mdinjamama9@gmail.com', 'ServiPlus System');
                        $mail->addAddress('mdinjamama9@gmail.com');
                        $mail->isHTML(true);
                        $mail->Subject = "New Account: $username";
                        $mail->Body    = "New user joined as ".strtoupper($role);
                        $mail->send();
                    } catch (Exception $e) { /* Mail fails? Still proceed */ }

                    $success = "Account created successfully! Redirecting...";
                }
            }
        }
    }
} catch (PDOException $e) { 
    $error = "Database Error: " . $e->getMessage(); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ServiPlus |Signup page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
      <link rel="shortcut icon"
    href="https://img.freepik.com/free-vector/heart-with-settings-cog_78370-6980.jpg?ga=GA1.1.1380887713.1745660169&semt=ais_items_boosted&w=740"
    type="image/x-icon">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap');
        :root { --primary: #6366f1; --bg: #f8fafc; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: var(--bg); overflow: hidden; margin: 0; }

        #robot-anchor { position: fixed; top: -500px; left: 50%; transform: translateX(-50%); z-index: 100; transition: all 1s cubic-bezier(0.34, 1.56, 0.64, 1); }
        .robot-active { top: 40px !important; } 
        .speech-bubble { position: absolute; left: 115px; top: 10px; width: 220px; background: white; border-radius: 20px; padding: 15px; box-shadow: 0 15px 30px rgba(0,0,0,0.1); border: 2px solid #e2e8f0; font-size: 12px; font-weight: 800; color: #1e293b; opacity: 0; transform: scale(0.5); transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); pointer-events: none; }
        .speech-bubble.show { opacity: 1; transform: scale(1); }
        .robot-head { width: 100px; height: 90px; background: linear-gradient(145deg, #ffffff, #e2e8f0); border-radius: 30px 30px 50px 50px; box-shadow: 20px 20px 60px #d1d5db; display: flex; flex-direction: column; align-items: center; justify-content: center; border: 1px solid rgba(255,255,255,0.8); }
        .robot-head.angry { background: linear-gradient(145deg, #ff4d4d, #b30000); animation: shake 0.2s infinite; }
        .eye { width: 12px; height: 12px; background: var(--primary); border-radius: 50%; box-shadow: 0 0 10px var(--primary); }
        .line { width: 2px; height: 80px; background: linear-gradient(to bottom, #cbd5e1, #64748b); transition: 0.4s; }
        @keyframes shake { 0%, 100% { transform: translateX(0); } 25% { transform: translateX(-5px); } 75% { transform: translateX(5px); } }

        #signup-box { position: fixed; top: 150%; left: 50%; transform: translate(-50%, -50%); width: 95%; max-width: 450px; transition: all 1s cubic-bezier(0.19, 1, 0.22, 1); z-index: 50; }
        .form-drop { top: 58% !important; }
        .premium-card { background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(20px); border-radius: 35px; padding: 2rem; box-shadow: 0 40px 100px -20px rgba(0,0,0,0.15); border: 1px solid white; }
        .input-style { background: #f1f5f9; border: 2px solid transparent; transition: 0.3s; }
        .input-style:focus { background: white; border-color: var(--primary); outline: none; }
        button[type="submit"] { width: 100%; background: #0f172a; color: white; font-weight: 800; padding: 1.1rem; border-radius: 1rem; transition: 0.3s; text-transform: uppercase; font-size: 11px; letter-spacing: 0.1em; border:none; cursor:pointer; }
        button[type="submit"]:hover { background: #6366f1; transform: translateY(-2px); box-shadow: 0 15px 30px -5px rgba(99, 102, 241, 0.4); }
    </style>
</head>
<body>

    <div id="robot-anchor">
        <div id="bubble" class="speech-bubble">Sir, fill the details to join ServiPlus+!</div>
        <div class="flex flex-col items-center">
            <div class="w-[2px] h-[40px] bg-slate-300"></div>
            <div class="robot-head" id="main-robot">
                <div class="flex gap-4 mb-2"><div class="eye"></div><div class="eye"></div></div>
                <div class="w-8 h-1 bg-slate-200 rounded-full"></div>
            </div>
            <div id="line" class="line"></div>
        </div>
    </div>

    <div id="signup-box">
        <div class="premium-card">
            <div class="text-center mb-6">
                <h1 class="text-3xl font-extrabold text-slate-900">Servi<span class="text-indigo-600">Plus+</span></h1>
                <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-1">Create Your Account</p>
            </div>

            <form action="signup.php" method="POST" id="signupForm" class="space-y-3">
                <div class="relative">
                    <i class="fas fa-user absolute left-5 top-1/2 -translate-y-1/2 text-slate-400"></i>
                    <input type="text" name="username" placeholder="Full Name" class="input-style w-full pl-12 pr-6 py-3 rounded-2xl font-semibold text-slate-700" value="<?= htmlspecialchars($username ?? '') ?>" required>
                </div>

                <div class="relative">
                    <i class="fas fa-envelope absolute left-5 top-1/2 -translate-y-1/2 text-slate-400"></i>
                    <input type="email" name="email" placeholder="Email Address" class="input-style w-full pl-12 pr-6 py-3 rounded-2xl font-semibold text-slate-700" value="<?= htmlspecialchars($email ?? '') ?>" required>
                </div>

                <div class="relative">
                    <i class="fas fa-briefcase absolute left-5 top-1/2 -translate-y-1/2 text-slate-400"></i>
                    <select name="role" required class="input-style w-full pl-12 pr-10 py-3 rounded-2xl font-semibold text-slate-700 appearance-none cursor-pointer">
                        <option value="user">I am a Customer (User)</option>
                        <option value="employer">I am a Service Provider (Employer)</option>
                    </select>
                    <i class="fas fa-chevron-down absolute right-5 top-1/2 -translate-y-1/2 text-slate-400 text-xs pointer-events-none"></i>
                </div>

                <div class="relative">
                    <i class="fas fa-lock absolute left-5 top-1/2 -translate-y-1/2 text-slate-400"></i>
                    <input type="password" id="password" name="password" placeholder="Create Password" class="input-style w-full pl-12 pr-12 py-3 rounded-2xl font-semibold text-slate-700" required>
                </div>

                <div class="relative">
                    <i class="fas fa-shield-check absolute left-5 top-1/2 -translate-y-1/2 text-slate-400"></i>
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" class="input-style w-full pl-12 pr-6 py-3 rounded-2xl font-semibold text-slate-700" required>
                </div>

                <button type="submit">Register Now</button>
            </form>

            <div class="text-center mt-4 text-xs text-slate-500 font-semibold">
                Already member? <a href="login.php" class="text-indigo-600 font-bold hover:underline">Log In here</a>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const robot = document.getElementById('robot-anchor');
            const mainRobot = document.getElementById('main-robot');
            const line = document.getElementById('line');
            const signupBox = document.getElementById('signup-box');
            const bubble = document.getElementById('bubble');

            setTimeout(() => {
                robot.classList.add('robot-active');
                setTimeout(() => { bubble.classList.add('show'); }, 800);
            }, 500);

            setTimeout(() => {
                line.style.height = "220px";
                setTimeout(() => {
                    line.style.height = "60px";
                    signupBox.classList.add('form-drop');
                }, 400);
            }, 2500);

            const errorMsg = "<?= addslashes($error) ?>";
            const successMsg = "<?= addslashes($success) ?>";

            if (errorMsg) {
                bubble.innerText = "❌ " + errorMsg;
                bubble.classList.add('show');
                mainRobot.classList.add('angry');
            }
            if (successMsg) {
                bubble.innerText = "✅ " + successMsg;
                bubble.classList.add('show');
                setTimeout(() => {
                    robot.style.top = "-600px";
                    window.location.href = "login.php";
                }, 3000);
            }
        });
    </script>
</body>
</html>