<?php
session_start();
$is_logged_in = isset($_SESSION['user_id']);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>professional-cook</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;600;700&display=swap"
        rel="stylesheet">
        <link rel="shortcut icon" href="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/c9d10c2f-3754-439e-8b04-eb4227dcf2a1.png" type="image/x-icon">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #dc2626;
            --primary-dark: #b91c1c;
            --primary-light: #ef4444;
            --secondary: #78350f;
            --accent: #d97706;
            --accent-light: #f59e0b;
            --cream: #fef3c7;
            --light: #f8fafc;
            --dark: #1e293b;
            --darker: #0f172a;
            --success: #10b981;
            --warning: #f59e0b;
            --error: #ef4444;
            --border: #e2e8f0;
            --shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 20px 40px rgba(0, 0, 0, 0.15);
            --transition: all 0.3s ease;
        }

        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            color: var(--dark);
            background-color: var(--light);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        /* Header & Navigation */
        .header {
            background: white;
            box-shadow: var(--shadow);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
        }

        .logo {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            list-style: none;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--dark);
            font-weight: 500;
            transition: var(--transition);
        }

        .nav-links a:hover {
            color: var(--primary);
        }

        .nav-cta {
            background: var(--primary);
            color: white;
            padding: 0.8rem 1.5rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
        }

        .nav-cta:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
        }


        /* Mobile Navigation Button */
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 1.8rem;
            color: var(--dark);
            cursor: pointer;
        }

        /* Mobile Dropdown */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
                flex-direction: column;
                background: white;
                position: absolute;
                top: 70px;
                right: 0;
                width: 100%;
                padding: 1rem 0;
                box-shadow: var(--shadow);
                text-align: center;
            }

            .nav-links.active {
                display: flex;
            }

            .nav-links li {
                padding: 0.8rem 0;
            }

            .nav-cta {
                display: none;
            }

            .mobile-menu-btn {
                display: block;
            }
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 8rem 0 4rem;
            margin-top: 80px;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="2" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.1;
        }

        .hero-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .hero-text h1 {
            font-family: 'Playfair Display', serif;
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .hero-text p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .hero-stats {
            display: flex;
            gap: 2rem;
            margin-top: 2rem;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--accent-light);
        }

        .stat-label {
            font-size: 0.9rem;
            opacity: 0.8;
        }

        /* Services Section */
        .services {
            padding: 5rem 0;
            background: white;
        }

        .section-title {
            text-align: center;
            margin-bottom: 3rem;
        }

        .section-title h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            color: var(--dark);
            margin-bottom: 1rem;
        }

        .section-title p {
            color: var(--secondary);
            max-width: 600px;
            margin: 0 auto;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .service-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: var(--shadow);
            transition: var(--transition);
            border: 1px solid var(--border);
            position: relative;
            overflow: hidden;
        }

        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--accent));
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .service-icon {
            width: 60px;
            height: 60px;
            background: var(--primary-light);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            color: white;
            font-size: 1.5rem;
        }

        .service-card h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: var(--dark);
        }

        .service-price {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary);
            margin: 1rem 0;
        }

        .service-price small {
            font-size: 1rem;
            color: var(--secondary);
            font-weight: 400;
        }

        .service-features {
            list-style: none;
            margin: 1rem 0;
        }

        .service-features li {
            padding: 0.5rem 0;
            color: var(--secondary);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .service-features li i {
            color: var(--success);
        }

        /* Chef Showcase */
        .chef-showcase {
            padding: 5rem 0;
            background: var(--cream);
        }

        .chef-profile {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
        }

        .chef-info h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            color: var(--dark);
        }

        .chef-specialties {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin: 1.5rem 0;
        }

        .specialty-tag {
            background: var(--primary-light);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 500;
        }

        /* Booking Section */
      

        /* Testimonials */
        .testimonials {
            padding: 5rem 0;
            background: var(--cream);
        }

        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .testimonial-card {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: var(--shadow);
            position: relative;
        }

        .testimonial-card::before {
            content: '"';
            font-family: 'Playfair Display', serif;
            font-size: 4rem;
            color: var(--primary-light);
            position: absolute;
            top: 1rem;
            left: 1rem;
            opacity: 0.2;
        }

        .testimonial-text {
            font-style: italic;
            color: var(--secondary);
            margin-bottom: 1.5rem;
            line-height: 1.8;
            position: relative;
            z-index: 2;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .author-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }

        .author-info h4 {
            color: var(--dark);
            margin-bottom: 0.2rem;
        }

        .author-info p {
            color: var(--secondary);
            font-size: 0.9rem;
        }

        /* Footer */
        .footer {
            background: var(--darker);
            color: white;
            padding: 4rem 0 2rem;
            position: relative;
            overflow: hidden;
        }

        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--accent));
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .footer-col h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            color: var(--accent-light);
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 0.8rem;
        }

        .footer-links a {
            color: var(--secondary);
            text-decoration: none;
            transition: var(--transition);
        }

        .footer-links a:hover {
            color: white;
        }

        .contact-info {
            list-style: none;
        }

        .contact-info li {
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .contact-info i {
            color: var(--accent-light);
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .social-links a {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: var(--transition);
        }

        .social-links a:hover {
            background: var(--primary);
            transform: translateY(-2px);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid var(--border-dark);
            color: var(--secondary);
        }

        /* Mobile Navigation */
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: var(--dark);
            cursor: pointer;
        }

        /* Responsive Design */
        @media (max-width: 968px) {
            .hero-content {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .hero-text h1 {
                font-size: 2.8rem;
            }

            .chef-profile {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .booking-container {
                grid-template-columns: 1fr;
            }

            .booking-info {
                text-align: center;
            }

            .info-item {
                justify-content: center;
            }
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .mobile-menu-btn {
                display: block;
            }

            .hero-text h1 {
                font-size: 2.2rem;
            }

            .hero-stats {
                justify-content: center;
                flex-wrap: wrap;
            }

            .section-title h2 {
                font-size: 2rem;
            }

            .service-card {
                text-align: center;
            }

            .service-icon {
                margin: 0 auto 1.5rem;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 0 1rem;
            }

            .hero {
                padding: 6rem 0 3rem;
            }

            .hero-text h1 {
                font-size: 1.8rem;
            }

            .stat-number {
                font-size: 2rem;
            }

            .services,
            .booking,
            .testimonials,
            .chef-showcase {
                padding: 3rem 0;
            }

            .booking-info,
            .booking-form {
                padding: 2rem;
            }
        }

        /* Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate {
            animation: fadeInUp 0.6s ease forwards;
        }

        .delay-1 {
            animation-delay: 0.2s;
        }

        .delay-2 {
            animation-delay: 0.4s;
        }

        .delay-3 {
            animation-delay: 0.6s;
        }

        /* Food animation */
        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .float-animate {
            animation: float 3s ease-in-out infinite;
        }
    </style>
</head>

<body>
    <!-- Header -->
<script src="https://cdn.tailwindcss.com"></script>

<header class="bg-white border-b border-gray-100 sticky top-0 z-50 shadow-sm">
    <div class="container mx-auto px-4 md:px-6">
        <nav class="flex items-center justify-between h-20">
            <a href="#" class="flex items-center gap-2 text-2xl font-extrabold text-orange-500">
                <i class="fas fa-utensils"></i>
                <span>CookPlus<span class="text-slate-900">+</span></span>
            </a>

            <ul class="hidden md:flex items-center gap-8 font-semibold text-slate-600">
                <li><a href="index.php" class="hover:text-orange-500 transition-colors">Home</a></li>
                <li><a href="about.php" class="hover:text-orange-500 transition-colors">About</a></li>
                <li><a href="All-servic.php" class="hover:text-orange-500 transition-colors">Services</a></li>
                <li><a href="#booking" class="hover:text-orange-500 transition-colors">Book Now</a></li>
                <li><a href="contact.php" class="hover:text-orange-500 transition-colors">Contact</a></li>
            </ul>

            <div class="hidden md:block">
                <a href="#booking" class="bg-orange-500 text-white px-6 py-2.5 rounded-full font-bold hover:bg-orange-600 transition-all shadow-md">
                    Book Now
                </a>
            </div>

            <button id="menu-btn" class="md:hidden text-2xl text-slate-800 focus:outline-none">
                <i class="fas fa-bars"></i>
            </button>
        </nav>

        <div id="mobile-menu" class="hidden md:hidden pb-6 transition-all duration-300">
            <ul class="flex flex-col gap-4 font-semibold text-slate-600">
                <li><a href="index.php" class="block py-2 hover:text-orange-500">Home</a></li>
                <li><a href="about.php" class="block py-2 hover:text-orange-500">About</a></li>
                <li><a href="All-servic.php" class="block py-2 hover:text-orange-500">Services</a></li>
                <li><a href="#booking" class="block py-2 hover:text-orange-500">Book Now</a></li>
                <li><a href="contact.php" class="block py-2 hover:text-orange-500">Contact</a></li>
                <li>
                    <a href="#booking" class="block text-center bg-orange-500 text-white py-3 rounded-xl mt-2 font-bold">
                        Book Now
                    </a>
                </li>
            </ul>
        </div>
    </div>
</header>

<script>
    const btn = document.getElementById('menu-btn');
    const menu = document.getElementById('mobile-menu');

    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
        // Icon change effect
        const icon = btn.querySelector('i');
        icon.classList.toggle('fa-bars');
        icon.classList.toggle('fa-times');
    });
</script>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text animate">
                    <h1>Elevate Your Culinary Experience</h1>
                    <p>Professional chef services for private events, cooking classes, and personalized meals.
                        Michelin-trained expertise for unforgettable dining experiences.</p>

                    <div class="hero-stats">
                        <div class="stat-item">
                            <div class="stat-number">500+</div>
                            <div class="stat-label">Events Catered</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">5+</div>
                            <div class="stat-label">Years Experience</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">99%</div>
                            <div class="stat-label">Satisfied Clients</div>
                        </div>
                    </div>
                </div>


                <div class="relative">
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-5 border border-white/20">
                        <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/c9d10c2f-3754-439e-8b04-eb4227dcf2a1.png"
                            alt="Professional driver in uniform standing next to luxury vehicle with city skyline background"
                            class="rounded-xl w-full h-auto shadow-2xl" />
                    </div>
                    <div class="absolute -bottom-4 -left-4 bg-orange-500 text-white p-4 rounded-xl shadow-lg">
                        <div class="text-2xl font-bold">24/7</div>
                        <div>Available</div>
                    </div>

                    <!-- <div class="hero-image animate delay-1">
                    <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/c9d10c2f-3754-439e-8b04-eb4227dcf2a1.png" alt="Professional chef preparing gourmet meal in modern kitchen with fresh ingredients" />
                </div> -->
                </div>
            </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services">
        <div class="container">
            <div class="section-title animate">
                <h2>Gourmet Services</h2>
                <p>Exceptional culinary experiences tailored to your preferences</p>
            </div>

            <div class="services-grid">
                <div class="service-card animate delay-1">
                    <div class="service-icon">
                        <i class="fas fa-home"></i>
                    </div>
                    <h3>Private Chef</h3>
                    <p>Personalized in-home dining experiences with custom menus and professional service.</p>
                    <div class="service-price">₹1,500<small>/day</small></div>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> Custom Menu Planning</li>
                        <li><i class="fas fa-check"></i> Grocery Shopping</li>
                        <li><i class="fas fa-check"></i> Meal Preparation</li>
                        <li><i class="fas fa-check"></i> Cleanup Service</li>
                    </ul>
                </div>

                <div class="service-card animate delay-2">
                    <div class="service-icon">
                        <i class="fas fa-glass-cheers"></i>
                    </div>
                    <h3>Event Catering</h3>
                    <p>Elegant catering for weddings, corporate events, and special occasions.</p>
                    <div class="service-price">₹500<small>/person</small></div>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> Wedding Receptions</li>
                        <li><i class="fas fa-check"></i> Corporate Events</li>
                        <li><i class="fas fa-check"></i> Birthday Parties</li>
                        <li><i class="fas fa-check"></i> Full Service Staff</li>
                    </ul>
                </div>

                <div class="service-card animate delay-3">
                    <div class="service-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h3>Cooking Classes</h3>
                    <p>Interactive cooking lessons for individuals, couples, or groups.</p>
                    <div class="service-price">₹1,500<small>/person</small></div>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> Private Lessons</li>
                        <li><i class="fas fa-check"></i> Group Workshops</li>
                        <li><i class="fas fa-check"></i> Team Building</li>
                        <li><i class="fas fa-check"></i> Recipe Development</li>
                    </ul>
                </div>

                <div class="service-card animate delay-1">
                    <div class="service-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h3>Meal Preparation</h3>
                    <p>Weekly meal prep services for busy professionals and families.</p>
                    <div class="service-price">₹3,000<small>/week</small></div>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> Customized Menus</li>
                        <li><i class="fas fa-check"></i> Dietary Restrictions</li>
                        <li><i class="fas fa-check"></i> Fresh Ingredients</li>
                        <li><i class="fas fa-check"></i> Delivery Available</li>
                    </ul>
                </div>

                <div class="service-card animate delay-2">
                    <div class="service-icon">
                        <i class="fas fa-cookie-bite"></i>
                    </div>
                    <h3>Pastry & Baking</h3>
                    <p>Artisan breads, desserts, and pastries for any occasion.</p>
                    <div class="service-price">₹1,000<small>/hour</small></div>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> Wedding Cakes</li>
                        <li><i class="fas fa-check"></i> Artisan Breads</li>
                        <li><i class="fas fa-check"></i> French Pastries</li>
                        <li><i class="fas fa-check"></i> Custom Desserts</li>
                    </ul>
                </div>

                <div class="service-card animate delay-3">
                    <div class="service-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>Consultation</h3>
                    <p>Professional kitchen consulting and menu development services.</p>
                    <div class="service-price">₹200<small>/hour</small></div>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> Menu Design</li>
                        <li><i class="fas fa-check"></i> Kitchen Setup</li>
                        <li><i class="fas fa-check"></i> Staff Training</li>
                        <li><i class="fas fa-check"></i> Recipe Testing</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Chef Showcase -->
    <section id="about" class="chef-showcase">
        <div class="container">
            <div class="chef-profile">
                <div class="chef-info animate">
                    <h2>Meet Chef Marco</h2>
                    <p>With over 15 years of culinary experience, including training at Michelin-starred restaurants in
                        France and Italy, I bring world-class expertise to your kitchen. My passion is creating
                        memorable dining experiences that delight the senses and bring people together.</p>

                    <div class="chef-specialties">
                        <span class="specialty-tag">French Cuisine</span>
                        <span class="specialty-tag">Italian Specialties</span>
                        <span class="specialty-tag">Farm-to-Table</span>
                        <span class="specialty-tag">Molecular Gastronomy</span>
                        <span class="specialty-tag">Diet-Specific Menus</span>
                    </div>

                    <p>I believe that great food is about more than just taste—it's about creating moments and memories
                        that last a lifetime.</p>
                </div>

                <!-- <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                    <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/a072d81c-4caa-4407-b72c-27b925d0e3ba.png"
                        alt="Professional driver in uniform standing next to luxury vehicle with city skyline background"
                        class="rounded-xl w-full h-auto shadow-2xl" />
                </div> -->

                <div class="relative">
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-5 border border-white/20">
                        <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/c9d10c2f-3754-439e-8b04-eb4227dcf2a1.png"
                            alt="Professional driver in uniform standing next to luxury vehicle with city skyline background"
                            class="rounded-xl w-full h-auto shadow-2xl" />
                    </div>
                    <!-- <div class="absolute -bottom-4 -left-4 bg-orange-500 text-white p-4 rounded-xl shadow-lg">
                        <div class="text-2xl font-bold">24/7</div>
                        <div>Available</div>
                    </div> -->

                    <!-- <div class="chef-image animate delay-1">
                    <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/e6494102-09c1-4571-b9d5-88d5d5955928.png" alt="Professional chef Marco in white uniform smiling with arms crossed in modern kitchen" />
                </div> -->
                </div>
            </div>
    </section>

    <!-- Booking Section -->
 

<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<style>
    :root { --gold: #f59e0b; --navy: #0f172a; }
    body { font-family: 'Plus Jakarta Sans', sans-serif; background: #fffcf2; margin: 0; padding: 20px; }
    .card { max-width: 600px; margin: 40px auto; background: white; padding: 30px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); border: 1px solid #fde68a; }
    .form-group { margin-bottom: 15px; }
    label { display: block; font-weight: 700; margin-bottom: 5px; font-size: 0.9rem; color: var(--navy); }
    input, select, textarea { width: 100%; padding: 12px; border: 1.5px solid #e2e8f0; border-radius: 10px; box-sizing: border-box; }
    .row { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; }
    .loc-btn { background: #fef3c7; color: #d97706; border: 1.5px dashed var(--gold); padding: 10px; width: 100%; border-radius: 10px; cursor: pointer; font-weight: 700; margin-bottom: 10px; }
    #cookMap { height: 150px; display: none; margin-bottom: 15px; border-radius: 10px; }
    .price-box { background: linear-gradient(135deg, #f59e0b, #fbbf24); color: white; padding: 15px; border-radius: 12px; display: flex; justify-content: space-between; align-items: center; margin: 15px 0; }
    .submit-btn { background: var(--gold); color: white; border: none; padding: 15px; width: 100%; border-radius: 10px; font-size: 1.1rem; font-weight: 800; cursor: pointer; transition: 0.3s; }
    .submit-btn:hover { background: #d97706; }
</style>

<div class="card">
    <h2 style="text-align: center; color: var(--navy);">👨‍🍳 Cook Booking</h2>
    
    <form action="cook-booking.php" method="POST" id="mainBookingForm">
        
        <input type="hidden" name="total_price" id="p_val" value="0">
        <input type="hidden" name="latitude" id="lat_val" value="">
        <input type="hidden" name="longitude" id="lon_val" value="">

        <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="name" required>
        </div>

        <div class="row">
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="tel" name="phone" required pattern="[0-9]{10}">
            </div>
        </div>

        <div class="form-group">
            <button type="button" class="loc-btn" onclick="findMe()">📍 Click to Add Location</button>
            <div id="cookMap"></div>
        </div>

        <div class="row">
            <div class="form-group">
                <label>Service</label>
                <select name="service_type" id="srv" onchange="updatePrice()" required>
                    <option value="" data-p="0">Select Service</option>
                    <option value="Private Chef" data-p="1500">Private Chef (₹1500)</option>
                    <option value="Cooking Classes" data-p="1500">Cook classes (₹1000)</option>
                    <option value="Meal Preparation" data-p="3000">Meal Preparation (₹3,000)</option>
                    <option value="Pastry & Baking" data-p="1000">Pastry & Baking (₹1,000)</option>
                    <option value="Consultation" data-p="200">Consultation (₹200)</option>
                    
                  
                    <option value="Catering" data-p="5000">Catering (₹5000)</option>
                </select>
            </div>
            <div class="form-group">
                <label>Date</label>
                <input type="date" name="event-date" required>
            </div>
        </div>

        <div class="row">
            <div class="form-group">
                <label>District</label>
                <input type="text" name="district" required>
            </div>
            <div class="form-group">
                <label>Country</label>
                <input type="text" name="country" value="India" required>
            </div>
        </div>

        <div class="price-box">
            <span>Total Amount:</span>
            <strong id="priceDisp">₹0</strong>
        </div>

        <div class="form-group">
            <label>Full Address</label>
            <input type="text" name="full_address" required>
        </div>

        <button type="submit" class="submit-btn">BOOK NOW</button>
    </form>
</div>

<script>
    var map;
    function findMe() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(p) {
                document.getElementById('lat_val').value = p.coords.latitude;
                document.getElementById('lon_val').value = p.coords.longitude;
                document.getElementById('cookMap').style.display = 'block';
                if(!map) {
                    map = L.map('cookMap').setView([p.coords.latitude, p.coords.longitude], 15);
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
                    L.marker([p.coords.latitude, p.coords.longitude]).addTo(map);
                }
            });
        }
    }

    function updatePrice() {
        var s = document.getElementById('srv');
        var p = s.options[s.selectedIndex].getAttribute('data-p');
        document.getElementById('priceDisp').innerHTML = '₹' + p;
        document.getElementById('p_val').value = p;
    }
</script>

    <!-- Testimonials -->
    <section class="testimonials">
        <div class="container">
            <div class="section-title">
                <h2>Culinary Reviews</h2>
                <p>What our clients say about their dining experiences</p>
            </div>

            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="testimonial-text">
                        "CookPlus created the most amazing anniversary dinner for us. The six-course meal was
                        perfection, and his attention to detail was exceptional. Worth every penny!"
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">EJ</div>
                        <div class="author-info">
                            <h4> Dr. Ab sharma</h4>
                            <p>Anniversary Celebration</p>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-text">
                        "We hired Chef Marco for our corporate retreat cooking class. The team loved it! He was
                        engaging, professional, and taught us techniques we still use. Highly recommend!"
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">MS</div>
                        <div class="author-info">
                            <h4>Manoj Kumar</h4>
                            <p>Job Celebration</p>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-text">
                        "The wedding catering was absolutely stunning. Guests are still talking about the food six
                        months later. Flawless execution from start to finish."
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">SD</div>
                        <div class="author-info">
                            <h4>Mutakim alam</h4>
                            <p>Wedding Reception</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer" id="contact">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <h3>ChefPlus </h3>
                    <p>Creating unforgettable culinary experiences with Michelin-starred expertise and personalized
                        service.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>

                <div class="footer-col">
                    <h3>Quick Links</h3>
                    <ul class="footer-links">
                        <li>>Services</li>
                        <li>Pricing</li>
                        <li>Book Now</li>
                        <li>About Chef</li>
                        <li>Contact</li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h3>Services</h3>
                    <ul class="footer-links">
                        <li>Private Chef</li>
                        <li>Event Catering</li>
                        <li>Cooking Classes</li>
                        <li>Meal Preparation</li>
                        <li>Consultation</li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h3>Contact Info</h3>
                    <ul class="contact-info">
                        <li>
                            <i class="fas fa-map-marker-alt"></i>
                            <span>123 Culinary Avenue, Food District, City 12345</span>
                        </li>
                        <li>
                            <i class="fas fa-phone"></i>
                            <span>1800-xxx-000</span>
                        </li>
                        <li>
                            <i class="fas fa-envelope"></i>
                            <span>chef@plus.com</span>
                        </li>
                        <li>
                            <i class="fas fa-clock"></i>
                            <span>Available 7 Days a Week</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <p>© 2026 CookPlus+ Culinary Services. All rights reserved. | Developed by bca Injamam</p>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Booking Form Submission
            const bookingForm = document.getElementById('bookingForm');
            bookingForm.addEventListener('submit', function (e) {
                e.preventDefault();

                const formData = {
                    name: document.getElementById('name').value,
                    email: document.getElementById('email').value,
                    phone: document.getElementById('phone').value,
                    service: document.getElementById('service').value,
                    eventDate: document.getElementById('event-date').value,
                    guests: document.getElementById('guests').value,
                    message: document.getElementById('message').value
                };

                // Simulate form submission
                alert('Thank you for your booking request! Chef Marco will contact you within 24 hours to discuss your culinary experience.\n\nYou qualify for 10% off your first service!');
                bookingForm.reset();

                // Here you would typically send the data to your server
                console.log('Booking submitted:', formData);
            });

            // Mobile Menu Toggle
            const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
            const navLinks = document.querySelector('.nav-links');

            mobileMenuBtn.addEventListener('click', function () {
                navLinks.style.display = navLinks.style.display === 'flex' ? 'none' : 'flex';
            });

            // Smooth Scrolling for Navigation
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Animation on scroll
            const animateElements = document.querySelectorAll('.animate');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, { threshold: 0.1 });

            animateElements.forEach(element => {
                element.style.opacity = '0';
                element.style.transform = 'translateY(30px)';
                element.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(element);
            });

            // Service price calculator
            const serviceSelect = document.getElementById('service');
            const guestsInput = document.getElementById('guests');

            function calculateEstimate() {
                const service = serviceSelect.value;
                const guests = parseInt(guestsInput.value) || 1;
                let baseRate = 0;
                let isPerPerson = false;

                switch (service) {
                    case 'private-chef': baseRate = 150; break;
                    case 'catering': baseRate = 75; isPerPerson = true; break;
                    case 'cooking-class': baseRate = 120; isPerPerson = true; break;
                    case 'meal-prep': baseRate = 250; break;
                    case 'pastry': baseRate = 100; break;
                    case 'consultation': baseRate = 200; break;
                }

                const total = isPerPerson ? baseRate * guests : baseRate;
                return { total, isPerPerson };
            }

            serviceSelect.addEventListener('change', updateEstimate);
            guestsInput.addEventListener('input', updateEstimate);

            function updateEstimate() {
                const { total, isPerPerson } = calculateEstimate();
                if (total > 0) {
                    const estimateText = isPerPerson ?
                        `Estimated cost: $${total} total ($${total / parseInt(guestsInput.value) || 1} per person)` :
                        `Estimated cost: $${total}`;
                    console.log(estimateText);
                }
            }

            // Add floating animation to chef image
            const chefImage = document.querySelector('.chef-image img');
            if (chefImage) {
                chefImage.classList.add('float-animate');
            }
        });
    </script>

    <!-- login  -->

      <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .modal-overlay {
      display: none;
      position: fixed;
      top: 0; left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.6);
      justify-content: center;
      align-items: center;
      z-index: 1000;
    }

    .modal-content {
      background: white;
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
      width: 300px;
      text-align: center;
    }

    .modal-content input {
      width: 100%;
      padding: 0.5rem;
      margin: 0.5rem 0;
    }

    .modal-content button {
      padding: 0.5rem 1rem;
      background: #5a67d8;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .modal-content button:hover {
      background: #434190;
    }

    .modal-error {
      color: red;
      margin-top: 10px;
    }
  </style>



  <?php if ($is_logged_in): ?>
    <!-- <p> 
  //<?= htmlspecialchars($_SESSION['username']) ?>
    </p> -->
    <!-- <a href="logout.php">Logout</a> -->
     <!-- 👈 Logout link yahan diya -->
<?php else: ?>
    <!-- <p>You are browsing as a guest.</p> -->
<?php endif; ?>


  <?php if ($is_logged_in): ?>

  <?php else: ?>
    <!-- <p>You're viewing this page as a guest. You'll be asked to log in after 5 minutes.</p> -->
   
  <?php endif; ?>

  <!-- Login Modal -->
  <div class="modal-overlay" id="loginModal">
    <div class="modal-content">
      <h3>Login Required</h3>
      <form method="post" action="login.php">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
      </form>
       <div class="signup">
      Don't have an account? <a href="signup.php">Sign up</a>
    </div>
      <div class="modal-error" id="modalError"></div>
    </div>
  </div>

  <script>
    const isLoggedIn = <?= $is_logged_in ? 'true' : 'false' ?>;

    if (!isLoggedIn) {
      // 5 minute (300000 ms) ke baad login modal show karo
      setTimeout(() => {
        document.getElementById("loginModal").style.display = "flex";
        document.body.style.overflow = "hidden"; // Prevent scrolling when modal is open
      }, 10000); // 5 minutes
    }
  </script>
</body>

</html>