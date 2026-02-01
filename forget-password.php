<?php
session_start();

// PHPMailer files ko include karein
require './PHPMailer/Exception.php';

require './PHPMailer/PHPMailer.php';
require './PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Database Connection
try {
    $pdo = new PDO("mysql:host=localhost;dbname=serviplus", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);

    if ($stmt->rowCount() > 0) {
        $otp = rand(100000, 999999);
        
        $_SESSION["reset_email"] = $email;
        $_SESSION["reset_otp"] = $otp;
        $_SESSION["otp_expiry"] = time() + 300; 

        // PHPMailer settings
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            
            // --- YAHAN APNA DATA BHARIYE ---
            $mail->Username   = 'mdinjamama9@gmail.com';     // Aapka Gmail ID
            $mail->Password   = 'kopmzicoobfbqmhj';      // 16-digit App Password paste karein
            // -------------------------------
            
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            $mail->setFrom('mdinjamama9@gmail.com', 'ServiPlus');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Your Password Reset OTP';
            $mail->Body    = "Your OTP for password reset is: <b>$otp</b>. It is valid for 5 minutes.";

            if($mail->send()) {
                header("Location: verify-otp.php");
                exit;
            }
        } catch (Exception $e) {
            $error = "OTP nahi bheja ja saka. Error: {$mail->ErrorInfo}";
        }
    } else {
        $error = "Email not found in our records.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password | ServiPlus</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
      <link rel="shortcut icon"
    href="https://img.freepik.com/free-vector/heart-with-settings-cog_78370-6980.jpg?ga=GA1.1.1380887713.1745660169&semt=ais_items_boosted&w=740"
    type="image/x-icon">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap');
        
        :root { --primary: #6366f1; --bg: #f8fafc; }
        body { 
            font-family: 'Plus Jakarta Sans', sans-serif; 
            background: var(--bg); 
            overflow: hidden; 
            margin: 0; 
            height: 100vh;
        }

        /* --- Robot Animation (Same as Login/Signup) --- */
        #robot-anchor { position: fixed; top: -500px; left: 50%; transform: translateX(-50%); z-index: 100; transition: all 1s cubic-bezier(0.34, 1.56, 0.64, 1); }
        .robot-active { top: 40px !important; } 
        
        .speech-bubble { 
            position: absolute; left: 115px; top: 10px; width: 220px; 
            background: white; border-radius: 20px; padding: 15px; 
            box-shadow: 0 15px 30px rgba(0,0,0,0.1); border: 2px solid #e2e8f0; 
            font-size: 12px; font-weight: 800; color: #1e293b; 
            opacity: 0; transform: scale(0.5); transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); 
        }
        .speech-bubble.show { opacity: 1; transform: scale(1); }

        .robot-head { 
            width: 100px; height: 90px; 
            background: linear-gradient(145deg, #ffffff, #e2e8f0); 
            border-radius: 30px 30px 50px 50px; box-shadow: 20px 20px 60px #d1d5db; 
            display: flex; flex-direction: column; align-items: center; justify-content: center; 
            border: 1px solid rgba(255,255,255,0.8); 
        }
        .robot-head.angry { background: linear-gradient(145deg, #ff4d4d, #b30000); animation: shake 0.2s infinite; }
        
        .eye { width: 12px; height: 12px; background: var(--primary); border-radius: 50%; box-shadow: 0 0 10px var(--primary); }
        .line { width: 2px; height: 80px; background: linear-gradient(to bottom, #cbd5e1, #64748b); transition: 0.4s; }

        @keyframes shake { 0%, 100% { transform: translateX(0); } 25% { transform: translateX(-5px); } 75% { transform: translateX(5px); } }

        /* --- Modern Card Style --- */
        #forgot-box { 
            position: fixed; top: 150%; left: 50%; transform: translate(-50%, -50%); 
            width: 95%; max-width: 420px; transition: all 1s cubic-bezier(0.19, 1, 0.22, 1); z-index: 50; 
        }
        .form-drop { top: 55% !important; }

        .premium-card { 
            background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(20px); 
            border-radius: 35px; padding: 2.5rem; 
            box-shadow: 0 40px 100px -20px rgba(0,0,0,0.15); border: 1px solid white; 
        }

        .input-style { 
            background: #f1f5f9; border: 2px solid transparent; 
            width: 100%; padding: 1rem 1.25rem 1rem 3.5rem; border-radius: 1.25rem;
            font-weight: 600; color: #334155; transition: 0.3s;
        }
        .input-style:focus { background: white; border-color: var(--primary); outline: none; }

        .btn-send { 
            width: 100%; margin-top: 1.5rem; padding: 1.1rem; border: none;
            border-radius: 1rem; background: #0f172a;
            color: white; font-size: 0.8rem; font-weight: 800; cursor: pointer;
            text-transform: uppercase; letter-spacing: 0.1em; transition: 0.3s;
        }
        .btn-send:hover { 
            background: var(--primary); transform: translateY(-2px); 
            box-shadow: 0 15px 30px -5px rgba(99, 102, 241, 0.4); 
        }

        .back-link { margin-top: 1.5rem; font-size: 0.85rem; color: #64748b; font-weight: 600; }
        .back-link a { color: var(--primary); text-decoration: none; font-weight: 800; }
    </style>
</head>
<body>

    <div id="robot-anchor">
        <div id="bubble" class="speech-bubble">Don't worry! Tell me your email, I'll help you.</div>
        <div class="flex flex-col items-center">
            <div class="w-[2px] h-[40px] bg-slate-300"></div>
            <div class="robot-head" id="main-robot">
                <div class="flex gap-4 mb-2"><div class="eye"></div><div class="eye"></div></div>
                <div class="w-8 h-1 bg-slate-200 rounded-full"></div>
            </div>
            <div id="line" class="line"></div>
        </div>
    </div>

    <div id="forgot-box">
        <div class="premium-card text-center">
            <div class="mb-6">
                <h1 class="text-3xl font-extrabold text-slate-900">Forgot<span class="text-indigo-600">?</span></h1>
                <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mt-1">Reset your password</p>
            </div>

            <?php if (isset($error) && $error): ?>
                <div class="mb-4 p-3 bg-red-50 text-red-600 text-xs font-bold rounded-xl border border-red-100 italic">
                    <i class="fas fa-circle-exclamation mr-1"></i> <?= $error ?>
                </div>
            <?php endif; ?>

            <form method="POST">
                <div class="relative text-left">
                    <label class="block text-xs font-extrabold text-slate-500 uppercase tracking-wider ml-2 mb-2">Email Address</label>
                    <div class="relative">
                        <i class="fas fa-envelope absolute left-5 top-1/2 -translate-y-1/2 text-slate-400"></i>
                        <input type="email" name="email" placeholder="example@mail.com" class="input-style" required>
                    </div>
                </div>

                <button type="submit" class="btn-send">Send OTP Code</button>
            </form>

            <div class="back-link">
                Remember password? <a href="login.php">Go Back</a>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const robot = document.getElementById('robot-anchor');
            const mainRobot = document.getElementById('main-robot');
            const line = document.getElementById('line');
            const forgotBox = document.getElementById('forgot-box');
            const bubble = document.getElementById('bubble');

            // 1. Robot Entry Animation
            setTimeout(() => {
                robot.classList.add('robot-active');
                setTimeout(() => { bubble.classList.add('show'); }, 800);
            }, 500);

            // 2. Card Drop Down Animation
            setTimeout(() => {
                line.style.height = "220px";
                setTimeout(() => {
                    line.style.height = "60px";
                    forgotBox.classList.add('form-drop');
                }, 400);
            }, 2000);

            // 3. Angry Robot if Error exists
            <?php if (isset($error) && $error): ?>
                setTimeout(() => {
                    bubble.innerText = "Oops! Check that email again.";
                    mainRobot.classList.add('angry');
                }, 2800);
            <?php endif; ?>
        });
    </script>
</body>
</html>