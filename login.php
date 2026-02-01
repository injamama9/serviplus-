<?php
session_start();

// Database configuration
$host = "localhost";
$dbname = "serviplus";
$dbuser = "root";
$dbpass = "";

$error = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $email = trim($_POST["email"] ?? "");
        $password = $_POST["password"] ?? "";

        if (!$email || !$password) {
            $error = "Please enter both email and password.";
        } else {
            // Humne 'role' fetch kiya hai taaki redirect kar sakein
            $stmt = $pdo->prepare("SELECT id, username, password_hash, role FROM users WHERE email = :email");
            $stmt->execute(['email' => $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user["password_hash"])) {
                
                // Session Variables Set Karein
                $_SESSION["user_id"] = $user["id"];
                $_SESSION["username"] = $user["username"];
                $_SESSION["role"] = strtolower(trim($user["role"])); // e.g. 'admin', 'employee', 'user'

                // --- 🚀 REAL-WORLD REDIRECT LOGIC ---
                $role = $_SESSION["role"];

                if ($role === 'admin') {
                    // Master Admin ko poora system dikhega
                    header("Location: admin_dashboard.php");
                } 
                elseif ($role === 'employer') {
                    // Employee ko sirf booking panel dikhega
                    header("Location: employer_dashboard.php");
                } 
                else {
                    // Normal Customer ko website ka main page (index) dikhega
                    header("Location: index.php");
                }
                exit;
                // ------------------------------------

            } else {
                $error = "Invalid email or password.";
            }
        }
    }
} catch (PDOException $e) {
    $error = "Database error: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ServiPlus | Login Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
     <link rel="shortcut icon"
    href="https://img.freepik.com/free-vector/heart-with-settings-cog_78370-6980.jpg?ga=GA1.1.1380887713.1745660169&semt=ais_items_boosted&w=740"
    type="image/x-icon">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap');
        
        :root { --primary: #6366f1; --bg: #f8fafc; }
        body { font-family: 'Plus Jakarta Sans', sans-serif; background: var(--bg); overflow: hidden; margin: 0; }

        /* --- Robot Anchor --- */
        #robot-anchor {
            position: fixed; top: -500px; left: 50%;
            transform: translateX(-50%); z-index: 100;
            transition: all 1s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        .robot-active { top: 60px !important; } 

        /* Speech Bubble */
        .speech-bubble {
            position: absolute; left: 115px; top: 10px;
            width: 200px; background: white; border-radius: 20px;
            padding: 15px; box-shadow: 0 15px 30px rgba(0,0,0,0.1);
            border: 2px solid #e2e8f0; font-size: 12px; font-weight: 800;
            color: #1e293b; opacity: 0; transform: scale(0.5);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            pointer-events: none;
        }
        .speech-bubble.show { opacity: 1; transform: scale(1); }
        .speech-bubble::before {
            content: ''; position: absolute; left: -10px; top: 20px;
            border-top: 10px solid transparent; border-bottom: 10px solid transparent;
            border-right: 10px solid #e2e8f0;
        }

        .robot-head {
            width: 100px; height: 90px;
            background: linear-gradient(145deg, #ffffff, #e2e8f0);
            border-radius: 30px 30px 50px 50px;
            box-shadow: 20px 20px 60px #d1d5db, -20px -20px 60px #ffffff;
            display: flex; flex-direction: column; align-items: center; justify-content: center;
            border: 1px solid rgba(255,255,255,0.8); transition: all 0.3s ease;
        }

        .robot-head.angry {
            background: linear-gradient(145deg, #ff4d4d, #b30000);
            box-shadow: 0 0 40px rgba(255, 0, 0, 0.6);
            border-color: #ff0000; animation: shake 0.2s infinite;
        }

        .eyes { display: flex; gap: 15px; margin-bottom: 5px; }
        .eye { 
            width: 12px; height: 12px; background: var(--primary); 
            border-radius: 50%; box-shadow: 0 0 15px var(--primary);
            transition: all 0.3s ease;
        }
        .robot-head.angry .eye { background: white; box-shadow: 0 0 15px white; }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }

        .line { width: 2px; height: 100px; background: linear-gradient(to bottom, #cbd5e1, #64748b); transition: height 0.4s ease; }

        #login-box {
            position: fixed; top: 150%; left: 50%;
            transform: translate(-50%, -50%); width: 90%; max-width: 420px;
            transition: all 1s cubic-bezier(0.19, 1, 0.22, 1); z-index: 50;
        }
        .form-drop { top: 55% !important; }
        .premium-card { background: rgba(255, 255, 255, 0.85); backdrop-filter: blur(20px); border-radius: 40px; padding: 3rem; box-shadow: 0 40px 100px -20px rgba(0,0,0,0.15); border: 1px solid white; }
        .input-style { background: #f1f5f9; border: 2px solid transparent; transition: all 0.3s; }
        .input-style:focus { background: white; border-color: var(--primary); outline: none; }
        .input-error { border-color: #ff4d4d !important; background: #fff5f5 !important; }
    </style>
</head>
<body>

    <div id="robot-anchor">
        <div id="bubble" class="speech-bubble">
           Sir, please log in quickly to go to Serviplus.!
        </div>

        <div class="flex flex-col items-center">
            <div class="w-[2px] h-[50px] bg-slate-300"></div>
            <div class="robot-head" id="main-robot">
                <div class="eyes">
                    <div class="eye"></div>
                    <div class="eye"></div>
                </div>
                <div class="w-8 h-1 bg-slate-200 rounded-full"></div>
            </div>
            <div id="line" class="line"></div>
        </div>
    </div>

    <div id="login-box">
        <div class="premium-card">
            <div class="text-center mb-10">
                <h1 class="text-4xl font-extrabold text-slate-900 tracking-tighter">Servi<span class="text-indigo-600">Plus+</span></h1>
                <p id="status-text" class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mt-4">Safe & Secure Login Access</p>
            </div>

            <form method="POST" action="" id="loginForm" class="space-y-4">
    
    <div class="input-group relative">
        <i class="fas fa-envelope absolute left-5 top-1/2 -translate-y-1/2 text-slate-400"></i>
        <input type="email" 
               name="email" 
               id="email" 
               placeholder="Email Address" 
               class="input-style w-full pl-12 pr-6 py-4 rounded-2xl font-semibold text-slate-700 bg-slate-100 border-2 border-transparent focus:bg-white focus:border-indigo-500 outline-none transition-all" 
               required>
    </div>
    
    <div class="input-group relative">
        <i class="fas fa-lock absolute left-5 top-1/2 -translate-y-1/2 text-slate-400"></i>
        <input type="password" 
               name="password" 
               id="password" 
               placeholder="Password" 
               class="input-style w-full pl-12 pr-6 py-4 rounded-2xl font-semibold text-slate-700 bg-slate-100 border-2 border-transparent focus:bg-white focus:border-indigo-500 outline-none transition-all" 
               required>
    </div>

    <div style="text-align: right; margin-bottom: 1rem;">
        <a style="font-size: 0.75rem; color: #6366f1; text-decoration: none; font-weight: 700;" href="forget-password.php">
            Forgot Password?
        </a>
    </div>
                 <button type="submit">Sign In to Dashboard</button>
                  
                 
    <!--  name="login_submit" -->
    <!-- <button type="submit"     
            class="w-full bg-slate-900 hover:bg-indigo-600 text-white font-bold py-5 rounded-2xl shadow-2xl transition-all active:scale-95 uppercase tracking-widest text-xs">
        Sign In to Dashboard
    </button> -->
    <style>
      /* --- Premium Button System CSS --- */
button[type="submit"], .btn-premium {
    /* w-full */
    width: 100%;
    
    /* bg-[#0f172a] */
    background-color: #0f172a;
    
    /* text-white & font-extrabold */
    color: #ffffff;
    font-weight: 800;
    
    /* py-5 px-6 */
    padding: 1.25rem 1.5rem;
    
    /* rounded-2xl */
    border-radius: 1rem;
    
    /* shadow-xl */
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    
    /* transition-all duration-300 */
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    
    /* uppercase & tracking-widest & text-[11px] */
    text-transform: uppercase;
    letter-spacing: 0.1em;
    font-size: 11px;
    
    /* Basics */
    border: none;
    cursor: pointer;
    outline: none;
    display: flex;
    justify-content: center;
    align-items: center;
}

/* hover:bg-[#6366f1] */
button[type="submit"]:hover {
    background-color: #6366f1;
    /* Thoda lift effect dene ke liye */
    transform: translateY(-2px);
    box-shadow: 0 25px 30px -10px rgba(99, 102, 241, 0.4);
}

/* active:scale-95 */
button[type="submit"]:active {
    transform: scale(0.95);
}

/* Focus state for accessibility */

    button:hover { transform: translateY(-2px); opacity: 0.9; }
       .footer { text-align: center; margin-top: 1.5rem; font-size: 0.85rem; color: #64748b; }
    .footer a { color: var(--primary); text-decoration: none; font-weight: 700; }
    </style>
      <div class="footer">
            New to ServiPlus? <a href="signup.php">Create Account</a>
        </div>
</form>
        </div>
    </div>


<script>
document.addEventListener('DOMContentLoaded', () => {

    const robot = document.getElementById('robot-anchor');
    const mainRobot = document.getElementById('main-robot');
    const line = document.getElementById('line');
    const loginBox = document.getElementById('login-box');
    const bubble = document.getElementById('bubble');
    const passwordInput = document.getElementById('password');

    /* 🟢 SAFETY CHECK */
    if (!robot || !mainRobot || !bubble) return;

    /* 1️⃣ ROBOT ENTRY */
    setTimeout(() => {
        robot.classList.add('robot-active');
        setTimeout(() => {
            bubble.innerText = "Hello Sir 👋 Please Login ServiPlus+";
            bubble.classList.add('show');
        }, 800);
    }, 500);

    /* 2️⃣ FORM DROP */
    if (line && loginBox) {
        setTimeout(() => {
            line.style.height = "250px";
            setTimeout(() => {
                line.style.height = "80px";
                loginBox.classList.add('form-drop');
            }, 300);
        }, 2000);
    }

    /* 3️⃣ WRONG PASSWORD / ERROR LOGIC (Corrected) */
    // PHP ka error check karne ke liye ye line zaroori hai
    <?php if (isset($error) && $error != ""): ?>
        
        // Form drop hone ke thoda baad gussa dikhayenge
        setTimeout(() => {
            bubble.innerText = "❌ <?= addslashes($error) ?>"; // PHP se error msg yahan aayega
            bubble.classList.add('show');
            mainRobot.classList.add('angry'); // Robot red ho jayega

            if (passwordInput) {
                passwordInput.classList.add('input-error');
            }

            // 3 second baad gussa thanda hoga
            setTimeout(() => {
                mainRobot.classList.remove('angry');
                bubble.innerText = "Try again carefully, Sir!";
            }, 2000);
        }, 2500);

    <?php endif; ?>
});
</script>
</body>
</html>