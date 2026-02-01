<?php
session_start();
$is_logged_in = isset($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | ServiPlus+</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
      <link rel="shortcut icon"
    href="https://img.freepik.com/free-vector/heart-with-settings-cog_78370-6980.jpg?ga=GA1.1.1380887713.1745660169&semt=ais_items_boosted&w=740"
    type="image/x-icon">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap');
        
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8fafc; color: #1e293b; overflow-x: hidden; }
        .glass-nav { background: rgba(255, 255, 255, 0.85); backdrop-filter: blur(15px); border-bottom: 1px solid rgba(0,0,0,0.05); }
        
        .premium-row-card {
            background: #ffffff;
            border-radius: 2rem;
            border: 1px solid rgba(0,0,0,0.04);
            box-shadow: 0 10px 30px -12px rgba(0,0,0,0.05);
            overflow: hidden;
            transition: all 0.5s ease;
        }
        
        @media (min-width: 768px) {
            .premium-row-card { border-radius: 2.5rem; }
            .premium-row-card:hover { transform: scale(1.02); }
        }

        .fade-up { opacity: 0; transform: translateY(30px); transition: all 0.8s ease-out; }
        .fade-up.visible { opacity: 1; transform: translateY(0); }

        /* Mobile Menu Animation */
        #mobile-menu {
            transition: all 0.3s ease-in-out;
            transform: translateY(-100%);
            opacity: 0;
            pointer-events: none;
        }
        #mobile-menu.open {
            transform: translateY(0);
            opacity: 1;
            pointer-events: auto;
        }
    </style>
</head>
<body class="bg-slate-50">

    <nav class="glass-nav fixed top-0 w-full z-[100]">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-extrabold bg-gradient-to-r from-indigo-600 to-cyan-500 bg-clip-text text-transparent">ServiPlus+</h1>
            
            <div class="hidden md:flex space-x-8 font-semibold text-slate-600">
                <a href="index.php" class="hover:text-indigo-600 transition">Home</a>
                <a href="#" class="text-indigo-600">About</a>
                <a href="All-servic.php" class="hover:text-indigo-600 transition">Services</a>
                <a href="contact.php" class="hover:text-indigo-600 transition">Contact</a>
            </div>

            <div class="flex items-center gap-4">
                <?php if($is_logged_in): ?>
                    <span class="hidden sm:inline-block text-sm bg-green-100 text-green-600 px-4 py-1.5 rounded-full border border-green-200 font-bold">● Active</span>
                <?php endif; ?>
                
                <button id="menu-btn" class="md:hidden text-slate-800 text-2xl focus:outline-none">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>

        <div id="mobile-menu" class="absolute top-full left-0 w-full bg-white border-b border-slate-100 p-6 flex flex-col space-y-4 font-bold text-slate-600 md:hidden shadow-xl">
            <a href="home.php" class="hover:text-indigo-600 py-2 border-b border-slate-50">Home</a>
            <a href="#" class="text-indigo-600 py-2 border-b border-slate-50">About</a>
            <a href="All-service.php" class="hover:text-indigo-600 py-2 border-b border-slate-50">Services</a>
            <a href="contact.php" class="hover:text-indigo-600 py-2">Contact</a>
        </div>
    </nav>

    <section class="relative min-h-[80vh] md:min-h-[90vh] flex items-center justify-center overflow-hidden pt-20">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1920&q=80" class="w-full h-full object-cover opacity-80" alt="Background">
            <div class="absolute inset-0 bg-gradient-to-b from-white/0 via-white/0 to-slate-30"></div>
        </div>
        
        <div class="relative z-10 text-center px-6">
            <span class="inline-block px-4 py-1.5 mb-6 text-xs md:text-sm font-bold tracking-widest text-indigo-600 uppercase bg-white shadow-sm rounded-full fade-up">Trust & Excellence</span>
            <h1 class="text-4xl md:text-7xl font-extrabold mb-6 text-slate-900 fade-up leading-tight">Quality Services,<br><span class="text-indigo-600">Trusted Experts.</span></h1>
            <p style="color:blue;" class="text-base md:text-xl text-slate-600 max-w-2xl mx-auto mb-10 fade-up font-medium px-4">
                Experience the new standard of professional home solutions.
            </p>
            <div class="fade-up">
                <a href="#services" class="px-8 py-4 bg-indigo-600 text-white shadow-xl rounded-full font-bold hover:bg-indigo-700 transition-all inline-block">Explore Services</a>
            </div>
        </div>
    </section>

    <section class="py-12 md:py-16 bg-white border-y border-slate-100">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-8 text-center">
                <div class="p-2 md:p-4">
                    <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-1" id="count-clients">0</h2>
                    <p class="text-indigo-600 font-bold uppercase tracking-widest text-[10px] md:text-xs">Happy Clients</p>
                </div>
                <div class="p-2 md:p-4">
                    <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-1" id="count-services">0</h2>
                    <p class="text-indigo-600 font-bold uppercase tracking-widest text-[10px] md:text-xs">Tasks Done</p>
                </div>
                <div class="p-2 md:p-4">
                    <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-1" id="count-hours">0</h2>
                    <p class="text-indigo-600 font-bold uppercase tracking-widest text-[10px] md:text-xs">Support Hours</p>
                </div>
                <div class="p-2 md:p-4">
                    <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-1" id="count-team">0</h2>
                    <p class="text-indigo-600 font-bold uppercase tracking-widest text-[10px] md:text-xs">Expert Staff</p>
                </div>
            </div>
        </div>
    </section>

<!-- about -->
 <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;1,600&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>
    :root {
        --lux-gold: #b8924b;      /* Muted Gold */
        --lux-black: #1a1a1a;     /* Sophisticated Black */
        --lux-gray: #f9f9f9;      /* Soft Background */
        --lux-text: #4a4a4a;      /* Soft Text */
    }

    .lux-about-section {
        padding: 120px 10%;
        display: flex;
        align-items: center;
        gap: 80px;
        background-color: var(--lux-gray);
        font-family: 'Poppins', sans-serif;
        overflow: hidden;
    }

    /* Left Side: Image with Decorative Frame */
    .lux-image-wrapper {
        flex: 1;
        position: relative;
        z-index: 1;
    }

    /* The "Floating Frame" Decoration */
    .lux-image-wrapper::before {
        content: "";
        position: absolute;
        top: -30px;
        left: -30px;
        width: 70%;
        height: 80%;
        border: 2px solid var(--lux-gold);
        z-index: -1;
        transition: 0.5s ease;
    }

    .lux-image-wrapper img {
        width: 100%;
        height: auto;
        display: block;
        filter: grayscale(20%);
        transition: 0.5s ease;
        box-shadow: 30px 30px 80px rgba(0,0,0,0.1);
    }

    .lux-image-wrapper:hover img {
        filter: grayscale(0%);
        transform: translate(10px, -10px);
    }

    .lux-image-wrapper:hover::before {
        transform: translate(-10px, 10px);
    }

    /* Right Side: Text Content */
    .lux-text-content {
        flex: 1.2;
    }

    .lux-subtitle {
        font-size: 13px;
        font-weight: 600;
        letter-spacing: 5px;
        text-transform: uppercase;
        color: var(--lux-gold);
        margin-bottom: 15px;
        display: block;
    }

    .lux-title {
        font-family: 'Playfair Display', serif;
        font-size: 52px;
        color: var(--lux-black);
        line-height: 1.1;
        margin-bottom: 25px;
    }

    .lux-description {
        font-size: 18px;
        line-height: 1.9;
        color: var(--lux-text);
        margin-bottom: 35px;
        font-weight: 300;
    }

    .lux-btn {
        display: inline-block;
        padding: 15px 45px;
        background-color: var(--lux-black);
        color: #fff;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        letter-spacing: 2px;
        text-transform: uppercase;
        border: 1px solid var(--lux-black);
        transition: all 0.4s ease;
    }

    .lux-btn:hover {
        background-color: transparent;
        color: var(--lux-black);
        border: 1px solid var(--lux-black);
    }

    /* Responsive Adjustments */
    @media (max-width: 1024px) {
        .lux-about-section {
            flex-direction: column;
            padding: 80px 5%;
            text-align: center;
            gap: 60px;
        }

        .lux-title { font-size: 40px; }

        .lux-image-wrapper::before {
            display: none; /* Hide frame on mobile for cleaner look */
        }
    }
</style>

<section class="lux-about-section">
    <div class="lux-image-wrapper">
        <img src="about-image.png" alt="Luxury Estate Care">
    </div>

    <div class="lux-text-content">
        <span class="lux-subtitle">"Excellence aur Lifestyle"</span>
        <h2 class="lux-title">"ServiPlus+: <br><i>Precision Estate Care</i></h2>
        <p class="lux-description">
           This website is very good nowadays because everyone needs services at home so that they can call an expert or worker to their home to get some work done, and it is just for that.This website has six services,<i> which will be added in the future</i><br><b>There are currently 6 services available</b><br>
            <strong>Housekeeping</strong>, <strong>Electrician</strong>, <strong>Plumber</strong>, <strong>Mechanical</strong>, <strong>Cook</strong>, <strong>Driver</strong>, <br>He will be the export employer for all these services who will go to the customer's home to provide the services.All these services can be booked through this website. <i>This website was created by <b>Md Injamam Ansari </b> and it is currently engaged in performing some security checks on its website.</i> 
            <h6>Our website will be revealed within 2 months.</h6>
        </p>
        
    </div>
</section>
 <!--  -->

    <section id="services" class="py-16 md:py-24 px-6">
        <div class="max-w-6xl mx-auto space-y-10 md:space-y-16">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-4">Our Professional Range</h2>
                <div class="h-1.5 w-16 bg-indigo-600 mx-auto rounded-full"></div>
            </div>

            <!-- <div class="premium-row-card flex flex-col md:flex-row items-center fade-up group">
                <div class="p-8 md:p-12 md:w-3/5 order-2 md:order-1">
                    <span class="text-indigo-600 font-bold text-xs tracking-widest uppercase mb-2 block">Technical Support</span>
                    <h3 class="text-2xl md:text-3xl font-bold mb-4 text-slate-900">Expert Mechanical Works</h3>
                    <p class="text-slate-500 leading-relaxed mb-8 text-base md:text-lg">Mechanical repair and maintenance services for engines, equipment, and machinery with quality assurance..</p>
                    <a href="#" class="inline-flex items-center text-indigo-600 font-bold hover:translate-x-2 transition-all">Read More <i class="fas fa-arrow-right ml-2 text-sm"></i></a>
                </div>
                <div class="md:w-2/5 h-64 md:h-auto self-stretch order-1 md:order-2">
                    <img src="http://localhost:3000/man-fixing-motorcycle-modern-workshop.jpg" class="w-full h-full object-cover" alt="Mechanical">
                </div>
            </div> -->

                    <div class="premium-row-card flex flex-col md:flex-row items-center fade-up group bg-white border border-slate-100 rounded-xl overflow-hidden mb-10 shadow-sm">
    
              <div class="p-8 md:p-12 md:w-3/5 order-2 md:order-1">
              <span class="text-indigo-600 font-bold text-xs tracking-widest uppercase mb-2 block">Technical Support</span>
              <h3 class="text-2xl md:text-3xl font-bold mb-4 text-slate-900">Expert Mechanical Works</h3>
        
              <p class="text-slate-500 leading-relaxed mb-4 text-base md:text-lg">
           Here is a professional description for an Electrician, highlighting their importance and core responsibilities in English.

Professional Electrician Description
Overview
A professional Electrician is a skilled tradesperson responsible for the design, installation, maintenance, and repair of electrical power systems. Beyond just "fixing wires,
             </p>

            <div id="electrician-more" class="hidden">
            <p class="text-slate-500 leading-relaxed mb-4 text-base md:text-lg border-t border-slate-100 pt-4">
               an electrician ensures that the heartbeat of any modern <strong> infrastructure—electricity</strong>is delivered safely, efficiently, and reliably to homes, industries, and commercial spaces.
            </p>
           </div>

        <a href="javascript:void(0)" 
           onclick="toggleReadMore(this, 'electrician-more')" 
           class="inline-flex items-center text-indigo-600 font-bold hover:translate-x-2 transition-all">
           <span class="btn-text">Read More</span> 
           <i class="fas fa-arrow-right ml-2 text-sm transition-transform"></i>
        </a>
    </div>

    <div class="md:w-2/5 h-64 md:h-auto self-stretch order-1 md:order-2 overflow-hidden">
        <img src="http://localhost:3000/WhatsApp%20Image%202025-05-20%20at%2016.53.44_82908247.jpg" 
             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" 
             alt="Professional Electrician Service">
    </div>
</div>

           <div class="premium-row-card flex flex-col md:flex-row items-center fade-up group bg-white border border-slate-100 rounded-xl overflow-hidden mb-10 shadow-sm">
    
              <div class="p-8 md:p-12 md:w-3/5 order-2 md:order-1">
              <span class="text-indigo-600 font-bold text-xs tracking-widest uppercase mb-2 block">Technical Support</span>
              <h3 class="text-2xl md:text-3xl font-bold mb-4 text-slate-900">Plumber</h3>
        
              <p class="text-slate-500 leading-relaxed mb-4 text-base md:text-lg">
         A Plumber is a highly skilled technician specialized in installing and maintaining systems used for water, sewage, and drainage. They are the essential guardians of a building’s
             </p>

            <div id="electrician-more" class="hidden">
            <p class="text-slate-500 leading-relaxed mb-4 text-base md:text-lg border-t border-slate-100 pt-4">
              water health, ensuring that clean water flows in and waste is removed safely, protecting both the property and public health.Public Health and Hygiene: Plumbers play a critical role in preventing water-borne diseases by ensuring clean water delivery and the safe removal of toxic waste and sewage.
            </p>
           </div>

        <a href="javascript:void(0)" 
           onclick="toggleReadMore(this, 'electrician-more')" 
           class="inline-flex items-center text-indigo-600 font-bold hover:translate-x-2 transition-all">
           <span class="btn-text">Read More</span> 
           <i class="fas fa-arrow-right ml-2 text-sm transition-transform"></i>
        </a>
    </div>

    <div class="md:w-2/5 h-64 md:h-auto self-stretch order-1 md:order-2 overflow-hidden">
        <img src="http://localhost:3000/sanitary-technician-gesturing-thumb-up.jpg" 
             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" 
             alt="Professional Electrician Service">
    </div>
</div>

             

             <div class="premium-row-card flex flex-col md:flex-row items-center fade-up group bg-white border border-slate-100 rounded-xl overflow-hidden mb-10 shadow-sm">
    
              <div class="p-8 md:p-12 md:w-3/5 order-2 md:order-1">
              <span class="text-indigo-600 font-bold text-xs tracking-widest uppercase mb-2 block">Technical Support</span>
              <h3 class="text-2xl md:text-3xl font-bold mb-4 text-slate-900">Mechanical Technician</h3>
        
              <p class="text-slate-500 leading-relaxed mb-4 text-base md:text-lg">
          Since "Mechanical" is a broad field, this description focuses on a Mechanical Technician/Mechanic, as it aligns with the Electrician and Plumber profiles you previously asked for.

Professional Mechanical Technician Description
Overview
A Mechanical Technician is a skilled professional responsible for the assembly, operation, and repair of machinery and mechanical systems.
             </p>

            <div id="electrician-more" class="hidden">
            <p class="text-slate-500 leading-relaxed mb-4 text-base md:text-lg border-t border-slate-100 pt-4">
               They are the backbone of the industrial and automotive world, ensuring that complex machines—from small engines to massive factory production lines—work smoothly and safely.
            </p>
           </div>

        <a href="javascript:void(0)" 
           onclick="toggleReadMore(this, 'electrician-more')" 
           class="inline-flex items-center text-indigo-600 font-bold hover:translate-x-2 transition-all">
           <span class="btn-text">Read More</span> 
           <i class="fas fa-arrow-right ml-2 text-sm transition-transform"></i>
        </a>
    </div>

    <div class="md:w-2/5 h-64 md:h-auto self-stretch order-1 md:order-2 overflow-hidden">
        <img src="https://img.freepik.com/premium-photo/side-view-portrait-man-working-garage-repairing-motorcycle_124865-1216.jpg?w=740" 
             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" 
             alt="Professional Electrician Service">
    </div>
</div>

<script>
    function toggleReadMore(btn, contentId) {
        const moreText = document.getElementById(contentId);
        const btnText = btn.querySelector('.btn-text');
        const icon = btn.querySelector('i');

        // Toggle the 'hidden' class
        if (moreText.classList.contains('hidden')) {
            moreText.classList.remove('hidden');
            btnText.innerHTML = "Read Less";
            icon.style.transform = "rotate(-90deg)"; // Arrow points up when open
        } else {
            moreText.classList.add('hidden');
            btnText.innerHTML = "Read More";
            icon.style.transform = "rotate(0deg)"; // Arrow points right when closed
        }
    }
</script>

<style>
    /* Smooth fade in for the hidden text */
    #electrician-more:not(.hidden) {
        animation: fadeIn 0.4s ease-in-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

              <div class="premium-row-card flex flex-col md:flex-row items-center fade-up group">
                <div class="p-8 md:p-12 md:w-3/5 order-2 md:order-1">
                    <span class="text-indigo-600 font-bold text-xs tracking-widest uppercase mb-2 block">Technical Support</span>
                    <h3 class="text-2xl md:text-3xl font-bold mb-4 text-slate-900">Housekeeping</h3>
                    <p class="text-slate-500 leading-relaxed mb-8 text-base md:text-lg">Our elite housekeeping team uses eco-friendly technology and traditional precision to ensure every corner of your home reflects perfection..</p>
                    <a href="#" class="inline-flex items-center text-indigo-600 font-bold hover:translate-x-2 transition-all">Read More <i class="fas fa-arrow-right ml-2 text-sm"></i></a>
                </div>
                <div class="md:w-2/5 h-64 md:h-auto self-stretch order-1 md:order-2">
                    <img src="https://img.freepik.com/free-photo/professional-cleaning-service-people-working-together-office_23-2150520599.jpg?w=800" class="w-full h-full object-cover" alt="Mechanical">
                </div>
            </div>

            <div class="premium-row-card flex flex-col md:flex-row items-center fade-up">
                <div class="p-8 md:p-12 md:w-3/5 order-2 md:order-1">
                    <span class="text-orange-600 font-bold text-xs tracking-widest uppercase mb-2 block">Culinary Excellence</span>
                    <h3 class="text-2xl md:text-3xl font-bold mb-4 text-slate-900">Professional Gourmet Cooks</h3>
                    <p class="text-slate-500 leading-relaxed mb-8 text-base md:text-lg">Gourmet dining experience at the comfort of your home. From daily nutrition to private events, we serve excellence on a plate..</p>
                    <a href="#" class="inline-flex items-center text-orange-600 font-bold hover:translate-x-2 transition-all">Read More <i class="fas fa-arrow-right ml-2 text-sm"></i></a>
                </div>
                <div class="md:w-2/5 h-64 md:h-auto self-stretch order-1 md:order-2">
                    <img src="https://images.unsplash.com/photo-1556910103-1c02745aae4d?auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover" alt="Cook">
                </div>
            </div>

            <div class="premium-row-card flex flex-col md:flex-row items-center fade-up">
                <div class="p-8 md:p-12 md:w-3/5 order-2 md:order-1">
                    <span class="text-cyan-600 font-bold text-xs tracking-widest uppercase mb-2 block">Safe Travel</span>
                    <h3 class="text-2xl md:text-3xl font-bold mb-4 text-slate-900">Experienced Personal Drivers</h3>
                    <p class="text-slate-500 leading-relaxed mb-8 text-base md:text-lg">Hamaare verified drivers aapko ek smooth aur stress-free driving experience provide karte hain.</p>
                    <a href="#" class="inline-flex items-center text-cyan-600 font-bold hover:translate-x-2 transition-all">Read More <i class="fas fa-arrow-right ml-2 text-sm"></i></a>
                </div>
                <div class="md:w-2/5 h-64 md:h-auto self-stretch order-1 md:order-2">
                    <img src="https://images.unsplash.com/photo-1449965408869-eaa3f722e40d?auto=format&fit=crop&w=800&q=80" class="w-full h-full object-cover" alt="Driver">
                </div>
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-6 mb-16 md:mb-24">
        <div class="bg-indigo-600 p-8 md:p-12 rounded-[2rem] md:rounded-[3rem] text-center shadow-2xl shadow-indigo-200">
            <h2 class="text-2xl md:text-4xl font-extrabold mb-4 text-white">🆘 Need Help Immediately?</h2>
            <p class="text-indigo-100 mb-8 max-w-xl mx-auto text-sm md:text-lg opacity-90">Our emergency team is available 24/7 for critical repairs.</p>
            <a href="tel:5551234567" class="inline-block bg-white text-indigo-600 px-10 py-4 rounded-full font-black hover:scale-105 transition transform">
                <i class="fas fa-phone-alt mr-2"></i> +91 7739495175
            </a>
        </div>
    </section>

    <footer class="bg-white border-t border-slate-100 pt-16 pb-8 px-6">
        <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
            <div class="space-y-4">
                <h3 class="text-2xl font-black text-indigo-600">ServiPlus+</h3>
                <p class="text-slate-500 text-sm leading-relaxed">Top-rated professional home services at your doorstep. We ensure quality, trust, and excellence in every task.</p>
                <div class="flex space-x-4">
                    <a href="#" class="text-slate-400 hover:text-indigo-600 transition"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-slate-400 hover:text-indigo-600 transition"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-slate-400 hover:text-indigo-600 transition"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
            <div>
                <h4 class="font-bold text-slate-900 mb-6 uppercase text-xs tracking-widest">Company</h4>
                <ul class="space-y-3 text-sm text-slate-500 font-medium">
                    <li><a href="#" class="hover:text-indigo-600 transition">About Us</a></li>
                    <li><a href="#" class="hover:text-indigo-600 transition">Career</a></li>
                    <li><a href="#" class="hover:text-indigo-600 transition">Contact</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-slate-900 mb-6 uppercase text-xs tracking-widest">Services</h4>
                <ul class="space-y-3 text-sm text-slate-500 font-medium">
                    <li><a href="#" class="hover:text-indigo-600 transition">Mechanical Works</a></li>
                    <li><a href="#" class="hover:text-indigo-600 transition">Gourmet Cooks</a></li>
                    <li><a href="#" class="hover:text-indigo-600 transition">Professional Drivers</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-slate-900 mb-6 uppercase text-xs tracking-widest">Support</h4>
                <div class="text-sm text-slate-500 space-y-3 font-medium">
                    <p><i class="fas fa-envelope mr-2 text-indigo-600"></i> support@serviplus+.com</p>
                    <p><i class="fas fa-phone mr-2 text-indigo-600"></i> +91 123 456 7890</p>
                    <p><i class="fas fa-map-marker-alt mr-2 text-indigo-600"></i> Bathinda India</p>
                </div>
            </div>
        </div>
        <div class="border-t border-slate-50 pt-8 text-center text-slate-400 text-xs">
            <p>&copy; 2026 ServiPlus+ Technologies. All Rights Reserved. designed by Injamam Ansari <i class="fas fa-heart text-indigo-500 mx-1"></i></p>
        </div>
    </footer>

    <!-- backend login code  -->

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
            }, 5000); 
        }
    </script>

    <script>
        // Mobile Menu Toggle Logic
        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = menuBtn.querySelector('i');

        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('open');
            // Change icon from Bars to Times (X)
            if (mobileMenu.classList.contains('open')) {
                menuIcon.classList.remove('fa-bars');
                menuIcon.classList.add('fa-times');
            } else {
                menuIcon.classList.remove('fa-times');
                menuIcon.classList.add('fa-bars');
            }
        });

        // Fade Up Animation Logic
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) entry.target.classList.add('visible');
            });
        }, { threshold: 0.1 });
        document.querySelectorAll('.fade-up').forEach(el => observer.observe(el));

        // Stats Counter Animation
        function animateStats(id, target, suffix = "+") {
            const element = document.getElementById(id);
            let startTimestamp = null;
            const duration = 2000;

            const step = (timestamp) => {
                if (!startTimestamp) startTimestamp = timestamp;
                const progress = Math.min((timestamp - startTimestamp) / duration, 1);
                const easeProgress = 1 - Math.pow(2, -10 * progress);
                const currentCount = Math.floor(easeProgress * target);
                element.innerText = currentCount.toLocaleString() + suffix;
                if (progress < 1) window.requestAnimationFrame(step);
            };
            window.requestAnimationFrame(step);
        }

        const statsSection = document.querySelector('#count-clients').parentElement.parentElement;
        const statsObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateStats('count-clients', 120);
                    animateStats('count-services', 10);
                    animateStats('count-hours', 24, "");
                    animateStats('count-team', 20);
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });
        statsObserver.observe(statsSection);
    </script>
</body>
</html>