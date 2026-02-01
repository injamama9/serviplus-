<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// 1. Files Include (Path sahi rakhiyega)
require './PHPMailer/Exception.php';
require './PHPMailer/PHPMailer.php';
require './PHPMailer/SMTP.php';

$is_logged_in = isset($_SESSION['user_id']);





// 2. Sirf tabhi chale jab Button daba ho
if (isset($_POST['submit_inquiry'])) {
    $mail = new PHPMailer(true);

    $full_name = htmlspecialchars($_POST['full_name']);
    $user_email = htmlspecialchars($_POST['email']);
    $service = htmlspecialchars($_POST['service']);
    $message = htmlspecialchars($_POST['message']);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; 
        $mail->SMTPAuth   = true;
        $mail->Username   = 'mdinjamama9@gmail.com'; 
        $mail->Password   = 'kopmzicoobfbqmhj'; // Apna App Password yahan dalein
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('servipluscontact@gmail.com', 'ServiPlus Website');
        $mail->addAddress('mdinjamama9@gmail.com'); 
        $mail->addReplyTo($user_email, $full_name);

        $mail->isHTML(true);
        $mail->Subject = "New Elite Inquiry: $service by $full_name";
        
        $mail->Body = "
        <div style='font-family: sans-serif; max-width: 600px; margin: auto; border: 1px solid #eee; border-radius: 20px; padding: 20px;'>
            <h2 style='color: #4f46e5; border-bottom: 2px solid #f1f5f9; padding-bottom: 10px;'>New Service Inquiry</h2>
            <table style='width: 100%; border-collapse: collapse;'>
                <tr style='background: #f8fafc;'><td style='padding: 10px;'><b>Name:</b></td><td>$full_name</td></tr>
                <tr><td style='padding: 10px;'><b>Email:</b></td><td>$user_email</td></tr>
                <tr style='background: #f8fafc;'><td style='padding: 10px;'><b>Service:</b></td><td style='color: #4f46e5;'>$service</td></tr>
                <tr><td style='padding: 10px;'><b>Message:</b></td><td>$message</td></tr>
            </table>
        </div>";

        $mail->send();
        
        echo "<script>alert('Thank you! Your inquiry has been sent.'); window.location.href='index.php';</script>";
        exit(); // Success ke baad redirect zaroori hai

    } catch (Exception $e) {
        echo "<script>alert('Error: {$mail->ErrorInfo}');</script>";
    }
}
// Note: Yahan 'else { exit(); }' nahi hona chahiye warna page load nahi hoga.

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | ServiPlus+ Premium</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,600;1,600&display=swap" rel="stylesheet">

       <link rel="shortcut icon"
    href="https://img.freepik.com/free-vector/heart-with-settings-cog_78370-6980.jpg?ga=GA1.1.1380887713.1745660169&semt=ais_items_boosted&w=740"
    type="image/x-icon">
    
    <style>
        body {
            /* font-family: 'Plus Jakarta Sans', sans-serif; */
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            background-color: #ffffff;
            color: #000000ff;
        }

        .serif { font-family: 'Playfair Display', serif; }

        /* Luxury Soft Shadow & Border */
        .premium-card {
            background: #e6f8ffb9;
            border: 1px solid #f0f0f0;
            box-shadow: 0 20px 40px rgba(0,0,0,0.03);
            transition: all 0.5s ease;
        }

        /* Animated Input */
        .input-group {
            position: relative;
            margin-bottom: 2rem;
        }

        .premium-input {
            width: 100%;
            padding: 0.75rem 0;
            border: none;
            border-bottom: 1px solid #e0e0e0;
            background: transparent;
            outline: none;
            transition: all 0.3s ease;
        }

        .premium-input:focus {
            border-bottom-color: #1a1a1a;
        }

        .premium-label {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: #999;
            font-weight: 700;
        }

        /* Map Styling */
        .map-container {
            filter: grayscale(1) contrast(1.1) opacity(0.8);
            transition: all 0.5s ease;
        }
        .map-container:hover {
            filter: grayscale(0) opacity(1);
        }

        /* Gold Gradient Button */
        .btn-black {
            background: #1a1a1a;
            color: white;
            padding: 1.25rem 2rem;
            text-transform: uppercase;
            letter-spacing: 0.2em;
            font-size: 0.75rem;
            font-weight: 700;
            transition: all 0.4s ease;
        }
        .btn-black:hover {
            background: #444;
            transform: translateY(-2px);
        }
       
    </style>
</head>
<body class="antialiased">

    <nav class="fixed top-0 w-full z-50 bg-white/80 backdrop-blur-md border-b border-gray-100 px-6 py-4 flex justify-between items-center">
        <div class="text-xl font-bold tracking-tighter serif italic">ServiPlus+</div>
        <div class="hidden md:flex space-x-8 text-[11px] font-bold uppercase tracking-widest text-gray-500">
            <a href="index.php" class="hover:text-black transition">Home</a>
            <a href="about.php" class="hover:text-black transition">About</a>
            <a href="All-servic.php" class="text-black border-b border-black">Services</a>
        </div>
        <button class="text-xs font-bold uppercase tracking-tighter border border-black px-5 py-2 hover:bg-black hover:text-white transition">Contact</button>
    </nav>

    <header class="pt-40 pb-20 px-6 text-center">
        <span class="text-[10px] uppercase tracking-[0.5em] text-gray-400 font-bold mb-4 block">Get in Touch</span>
        <h1 class="text-5xl md:text-7xl serif italic mb-6">Connect with <span class="not-italic">ServiPlus+</span></h1>
        <p class="max-w-2xl mx-auto text-gray-500 font-light text-lg">Experience the pinnacle of home services. Our dedicated concierge team is ready to curate your perfect living experience.</p>
    </header>

    <main class="container mx-auto px-6 pb-20">
        <div class="grid lg:grid-cols-3 gap-12">
            
            <div class="lg:col-span-1 space-y-12">
                <div>
                    <h3 class="text-sm uppercase tracking-widest font-bold mb-6 border-l-2 border-black pl-4">Contact Detail</h3>
                    <div class="space-y-6">
                        <div class="flex items-start space-x-4 group">
    <div class="flex items-center justify-center w-10 h-10 bg-slate-100 text-slate-500 rounded-xl group-hover:bg-indigo-600 group-hover:text-white transition-all duration-300 shadow-sm">
        <i class="fas fa-envelope text-lg"></i>
    </div>

    <div class="flex flex-col">
        <p class="text-[10px] uppercase text-gray-400 font-bold tracking-widest">Official Email</p>
        <a href="mailto:servipluscontact@gmail.com" class="text-lg font-extrabold text-slate-800 hover:text-indigo-600 transition-colors break-all">
            servipluscontact@gmail.com
        </a>
    </div>
</div>
                        <div class="flex flex-col gap-1">
    <p class="text-[10px] uppercase text-gray-400 font-bold tracking-widest">Phone & WhatsApp</p>
    
    <div class="flex items-center gap-3">
           <!-- #region -->
              <a href="https://wa.me/917739495175" target="_blank" class="flex items-center justify-center w-8 h-8 bg-emerald-500 text-white rounded-lg shadow-lg shadow-emerald-200 hover:bg-emerald-600 hover:scale-110 active:scale-95 transition-all">
            <i class="fa-brands fa-whatsapp text-lg"></i>
        </a>

        <a href="tel:+917739495175" class="text-lg font-extrabold text-slate-800 hover:text-indigo-600 transition-colors">
            7739495175
        </a>

       
    </div>
</div>
                    </div>
                </div>

                <div>
                    <h3 class="text-sm uppercase tracking-widest font-bold mb-6 border-l-2 border-black pl-4">Headquarters</h3>
                    <p class="text-gray-500 leading-relaxed font-light">
                        123 Luxury Avenue, Suite 500<br>
                        Manhattan, india<br>
                       
                    </p>
                </div>

                <div>
                    <h3 class="text-sm uppercase tracking-widest font-bold mb-6 border-l-2 border-black pl-4">Business Hours</h3>
                    <div class="text-gray-500 text-sm space-y-2">
                        <div class="flex justify-between"><span>Mon — Fri</span> <span>09:00 - 20:00</span></div>
                        <div class="flex justify-between"><span>Saturday</span> <span>10:00 - 16:00</span></div>
                        <div class="flex justify-between text-gray-300"><span>Sunday</span> <span>Closed</span></div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2 premium-card p-8 md:p-12">
          <form id="contactForm" action="" method="POST">
    <div class="grid md:grid-cols-2 gap-x-8">
        <div class="input-group">
            <label class="premium-label">Full Name</label>
            <input type="text" name="full_name" class="premium-input" placeholder="Your Name" required>
        </div>
        <div class="input-group">
            <label class="premium-label">Email Address</label>
            <input type="email" name="email" class="premium-input" placeholder="email@address.com" required>
        </div>
    </div>
    
    <div class="input-group">
        <label class="premium-label">Service Required</label>
        <select name="service" class="premium-input appearance-none cursor-pointer">
            <option> Housekeeping Releted</option>
            <option>Private Chef & Catering</option>
            <option>Master Engineering & Repairs</option>
            <option>Home Salon & Spa</option>
            <option>Electrician Releted</option>
            <option>Plumber Releted</option>
            <option>Driver Releted</option>
        </select>
    </div>

    <div class="input-group">
        <label class="premium-label">Your Inquiry</label>
        <textarea name="message" rows="4" class="premium-input" placeholder="How can we assist you today?" required></textarea>
    </div>

    <button type="submit" name="submit_inquiry" class="btn-black w-full md:w-auto">
        Send Inquiry <i class="fas fa-arrow-right ml-2 text-[10px]"></i>
    </button>
</form>
            </div>
        </div>
    </main>

    <section class="w-full h-[500px] relative overflow-hidden">
        <div class="absolute inset-0 bg-white/10 z-10 pointer-events-none"></div>
    <iframe 
    class="map-container w-full h-full border-none" 
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13809.843644485593!2d75.07684610166687!3d29.987515569424164!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391029730d1747e1%3A0x992cde8812c25ea4!2sTalwandi%20Sabo%2C%20Punjab%20151302!5e0!3m2!1sen!2sin!4v1715856000000!5m2!1sen!2sin" 
    allowfullscreen="" 
    loading="lazy" 
    referrerpolicy="no-referrer-when-downgrade">
</iframe>
    </section>

    <footer class="py-12 bg-[#fafafa] border-t border-gray-100">
        <div class="container mx-auto px-6 flex flex-col md:flex-row justify-between items-center text-gray-400 text-[10px] uppercase tracking-widest font-bold">
            <p>© 2026 ServiPlus+ Developed by Injamam Ansari</p>
            <div class="flex space-x-6 mt-4 md:mt-0">
                <a href="All-servic.php" class="hover:text-black transition">services</a>
                <a href="index.php" class="hover:text-black transition">Home</a>
                <a href="about.php" class="hover:text-black transition">About</a>
            </div>
        </div>
    </footer>

    <!-- login code  -->

        <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
            --glass-bg: rgba(255, 255, 255, 0.95);
            --text-dark: #1e293b;
            --text-light: #64748b;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8fafc;
            color: var(--text-dark);
        }

        /* Modal Overlay with Blur */
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0; left: 0;
            width: 100%;
            height: 100%;
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(8px);
            justify-content: center;
            align-items: center;
            z-index: 10000;
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        /* Premium Modal Content */
        .modal-content {
            background: var(--glass-bg);
            padding: 2.5rem;
            border-radius: 2rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            width: 90%;
            max-width: 400px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.3);
            transform: scale(0.9) translateY(20px);
            transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .modal-overlay.active {
            opacity: 1;
        }

        .modal-overlay.active .modal-content {
            transform: scale(1) translateY(0);
        }

        /* Branding in Modal */
      

            .modal-brand {
    font-size: 1.5rem;
    font-weight: 800;
    /* Gradient color ensure karein ki CSS variables mein define ho */
    background: var(--primary-gradient, linear-gradient(45deg, #d4af37, #f2d06b)); 
    
    /* Ye teen lines text gradient ke liye mandatory hain */
    background-clip: text; 
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    
    /* Fallback for older browsers */
    color: #d4af37; 

    margin-bottom: 0.5rem;
    display: inline-block;
}

        .modal-content h3 {
            font-size: 1.75rem;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 0.5rem;
        }

        .modal-content p {
            color: var(--text-light);
            font-size: 0.9rem;
            margin-bottom: 2rem;
        }

        /* Luxury Inputs */
        .input-group {
            position: relative;
            margin-bottom: 1.25rem;
            text-align: left;
        }

        .input-group i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-light);
            font-size: 1rem;
            transition: color 0.3s ease;
        }

        .modal-content input {
            width: 100%;
            padding: 1rem 1rem 1rem 3rem;
            border-radius: 12px;
            border: 1.5px solid #e2e8f0;
            background: #f1f5f9;
            font-size: 1rem;
            font-weight: 500;
            box-sizing: border-box;
            transition: all 0.3s ease;
            outline: none;
        }

        .modal-content input:focus {
            border-color: #6366f1;
            background: #fff;
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
        }

        .modal-content input:focus + i {
            color: #6366f1;
        }

        /* Premium Gradient Button */
        .modal-content button {
            width: 100%;
            padding: 1rem;
            background: var(--primary-gradient);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 10px 15px -3px rgba(99, 102, 241, 0.4);
            transition: all 0.3s ease;
            margin-top: 0.5rem;
        }

        .modal-content button:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 25px -5px rgba(99, 102, 241, 0.4);
        }

        .modal-content button:active {
            transform: translateY(0);
        }

        /* Signup Link Styling */
        .signup {
            margin-top: 1.5rem;
            font-size: 0.9rem;
            color: var(--text-light);
        }

        .signup a {
            color: #6366f1;
            text-decoration: none;
            font-weight: 700;
            transition: all 0.3s ease;
        }

        .signup a:hover {
            text-decoration: underline;
        }

        .modal-error {
            color: #ef4444;
            font-size: 0.85rem;
            margin-top: 1rem;
            font-weight: 600;
        }
    </style>

    <div class="modal-overlay" id="loginModal">
        <div class="modal-content">
            <span class="modal-brand">ServiPlus+</span>
            <h3>Welcome Back</h3>
            <p>Sign in to continue to our premium home services.</p>
            
            <form method="post" action="login.php">
                <div class="input-group">
                    <input type="email" name="email" placeholder="Email Address" required>
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="input-group">
                    <input type="password" name="password" placeholder="Password" required>
                    <i class="fas fa-lock"></i>
                </div>
                <button type="submit">Login to Account</button>
            </form>

            <div class="signup">
                Don't have an account? <a href="signup.php">Create One</a>
            </div>
            <div class="modal-error" id="modalError"></div>
        </div>
    </div>

    <script>
        const isLoggedIn = <?= $is_logged_in ? 'true' : 'false' ?>;

        if (!isLoggedIn) {
            // 10 seconds delay for premium experience
            setTimeout(() => {
                const modal = document.getElementById("loginModal");
                modal.style.display = "flex";
                
                // Trigger animation with a tiny delay
                setTimeout(() => {
                    modal.classList.add("active");
                }, 10);

                document.body.style.overflow = "hidden"; 
            }, 3000); 
        }
    </script>
    <!--  -->

</body>
</html>