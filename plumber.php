<?php
session_start();
$is_logged_in = isset($_SESSION['user_id']);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlumberPlus+ </title>
     <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
      <link rel="shortcut icon"
    href="https://media.istockphoto.com/id/1516511531/photo/a-plumber-carefully-fixes-a-leak-in-a-sink-using-a-wrench.jpg?s=2048x2048&w=is&k=20&c=8zy3SGo3dUKjOuHNnmB4jYTzaQmXVBNkoIUFvgIwyJA="
    type="image/x-icon">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #0ea5e9;
            --primary-dark: #0284c7;
            --primary-light: #38bdf8;
            --secondary: #64748b;
            --accent: #f59e0b;
            --accent-light: #fbbf24;
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
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--primary);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .nav-links {
            display:flex;
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

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            padding: 8rem 0 4rem;
            margin-top: 80px;
        }

        .hero-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
        }

        .hero-text h1 {
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

        /* Emergency Banner */
        .emergency-banner {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white;
            text-align: center;
            padding: 2rem;
            margin: 3rem 0;
            border-radius: 15px;
            box-shadow: var(--shadow);
        }

        .emergency-banner h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .emergency-cta {
            background: white;
            color: #ef4444;
            padding: 1rem 2rem;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            display: inline-block;
            margin-top: 1rem;
            transition: var(--transition);
        }

        .emergency-cta:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }

        /* Booking Section */
       
        /* Testimonials */
        .testimonials {
            padding: 5rem 0;
            background: white;
        }

        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .testimonial-card {
            background: var(--light);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: var(--shadow);
        }

        .testimonial-text {
            font-style: italic;
            color: var(--secondary);
            margin-bottom: 1.5rem;
            line-height: 1.8;
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
                /* display: none; */
                /*  */
                position: absolute;
                top: 60px;
                left: 0;
                width: 100%;
                background: rgba(255, 255, 255, 0.968);
                flex-direction: column;
                text-align: center;
                /* padding: 1rem 0; */
                box-shadow: var(--shadow);
            }

            .nav-links.active {
                display: flex;
                animation: fadeInDown 0.3s ease;
            }

            .nav-links li {
                /* margin: 1.10rem 0; */
                margin: 6px;
            }


            .nav-cta {
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
            .testimonials {
                padding: 3rem 0;
            }

            .booking-info,
            .booking-form {
                padding: 2rem;
            }

            .emergency-banner h2 {
                font-size: 1.5rem;
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

        /* Water drop animation for fun */
        @keyframes waterDrop {
            0% {
                transform: translateY(-20px) scale(0.8);
                opacity: 0;
            }

            50% {
                opacity: 1;
            }

            100% {
                transform: translateY(0) scale(1);
                opacity: 1;
            }
        }

        .water-animate {
            animation: waterDrop 1s ease forwards;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <nav class="nav">
                <a href="#" class="logo">
                    <i class="fas fa-faucet"></i>
                    PlumberPlus+
                </a>

                <!-- Navigation Links -->
                <ul class="nav-links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="All-servic.php">Services</a></li>
                    <li><a href="#booking">Book Now</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>

                <!-- <a href="#booking" class="nav-cta">Emergency Call</a> -->

                <!-- Mobile Menu Button -->
                <button class="mobile-menu-btn">
                    <i class="fas fa-bars"></i>
                </button>

        </div>
        </div>

        </nav>
        </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text animate">
                    <h1>Expert Plumbing Solutions When You Need Them Most</h1>
                    <p>24/7 emergency plumbing services, installations, and repairs by licensed professionals. Fast
                        response, quality workmanship, and transparent pricing.</p>

                    <div class="hero-stats">
                        <div class="stat-item">
                            <div class="stat-number">1000+</div>
                            <div class="stat-label">Happy Clients</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">5+</div>
                            <div class="stat-label">Years Experience</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">24/7</div>
                            <div class="stat-label">Emergency Service</div>
                        </div>
                    </div>
                </div>

               <div class="relative">
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                        <img src="https://media.istockphoto.com/id/1516511531/photo/a-plumber-carefully-fixes-a-leak-in-a-sink-using-a-wrench.jpg?s=2048x2048&w=is&k=20&c=8zy3SGo3dUKjOuHNnmB4jYTzaQmXVBNkoIUFvgIwyJA="
                            alt="Professional driver in uniform standing next to luxury vehicle with city skyline background"
                            class="rounded-xl w-full h-auto shadow-2xl" />
                    </div>
                    <div class="absolute -bottom-4 -left-4 bg-orange-500 text-white p-4 rounded-xl shadow-lg">
                        <div class="text-2xl font-bold">24/7</div>
                        <div>Available</div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services">
        <div class="container">
            <div class="section-title animate">
                <h2>Our Plumbing Services</h2>
                <p>Comprehensive plumbing solutions for residential and commercial properties</p>
            </div>

            <div class="services-grid">
                <div class="service-card animate delay-1">
                    <div class="service-icon">
                        <i class="fas fa-toilet"></i>
                    </div>
                    <h3>Emergency Repairs</h3>
                    <p>24/7 emergency plumbing services for leaks, clogs, and burst pipes.</p>
                    <div class="service-price">₹300<small>/hour</small></div>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> Leak Detection & Repair</li>
                        <li><i class="fas fa-check"></i> Drain Cleaning</li>
                        <li><i class="fas fa-check"></i> Pipe Repairs</li>
                        <li><i class="fas fa-check"></i> 24/7 Availability</li>
                    </ul>
                </div>

                <div class="service-card animate delay-2">
                    <div class="service-icon">
                        <i class="fas fa-shower"></i>
                    </div>
                    <h3>Bathroom Plumbing</h3>
                    <p>Complete bathroom plumbing services including fixtures and installations.</p>
                    <div class="service-price">₹250<small>/hour</small></div>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> Toilet Installation</li>
                        <li><i class="fas fa-check"></i> Shower & Tub</li>
                        <li><i class="fas fa-check"></i> Sink Installation</li>
                        <li><i class="fas fa-check"></i> Faucet Repair</li>
                    </ul>
                </div>

                <div class="service-card animate delay-3">
                    <div class="service-icon">
                        <i class="fas fa-kitchen-set"></i>
                    </div>
                    <h3>Kitchen Plumbing</h3>
                    <p>Expert kitchen plumbing services including sink and appliance installations.</p>
                    <div class="service-price">₹600<small>/hour</small></div>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> Sink Installation</li>
                        <li><i class="fas fa-check"></i> Garbage Disposal</li>
                        <li><i class="fas fa-check"></i> Dishwasher Hookup</li>
                        <li><i class="fas fa-check"></i> Water Line Repair</li>
                    </ul>
                </div>

                <div class="service-card animate delay-1">
                    <div class="service-icon">
                        <i class="fas fa-fire"></i>
                    </div>
                    <h3>Water Heater Services</h3>
                    <p>Professional water heater installation, repair, and maintenance.</p>
                    <div class="service-price">₹500<small>/hour</small></div>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> Installation</li>
                        <li><i class="fas fa-check"></i> Repair</li>
                        <li><i class="fas fa-check"></i> Maintenance</li>
                        <li><i class="fas fa-check"></i> Tankless Options</li>
                    </ul>
                </div>

                <div class="service-card animate delay-2">
                    <div class="service-icon">
                        <i class="fas fa-pipe"></i>
                    </div>
                    <h3>Pipe Services</h3>
                    <p>Complete pipe installation, repair, and replacement services.</p>
                    <div class="service-price">₹300<small>/hour</small></div>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> Pipe Replacement</li>
                        <li><i class="fas fa-check"></i> Leak Detection</li>
                        <li><i class="fas fa-check"></i> Repiping</li>
                        <li><i class="fas fa-check"></i> Camera Inspection</li>
                    </ul>
                </div>

                <div class="service-card animate delay-3">
                    <div class="service-icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <h3>Commercial Plumbing</h3>
                    <p>Professional plumbing services for businesses and commercial properties.</p>
                    <div class="service-price">₹1,500<small>/hour</small></div>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> Office Buildings</li>
                        <li><i class="fas fa-check"></i> Restaurants</li>
                        <li><i class="fas fa-check"></i> Multi-Unit Properties</li>
                        <li><i class="fas fa-check"></i> Maintenance Contracts</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Emergency Banner -->
    <!-- <div class="container">
        <div class="emergency-banner water-animate">
            <h2>🆘 Emergency Plumbing Service Available 24/7</h2>
            <p>Burst pipes, major leaks, or any plumbing emergency - we're here to help!</p>
            <a href="tel:555-123-4567" class="emergency-cta">
                <i class="fas fa-phone"></i> Call Now: (555) 123-4567
            </a>
        </div>
    </div> -->

    <!-- Booking Section -->
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<style>
    :root {
        --plumb-blue: #2563eb;
        --plumb-hover: #1d4ed8;
        --dark-navy: #0f172a;
        --bg-glass: rgba(255, 255, 255, 0.95);
    }

    .booking-wrapper {
        font-family: 'Plus Jakarta Sans', sans-serif;
        padding: 60px 20px;
        background: #f8fafc;
        display: flex;
        justify-content: center; /* Form ko center mein lane ke liye */
        align-items: center;
        min-height: 100vh;
    }

    .booking-container {
        width: 100%;
        max-width: 650px; /* Left content hatane ke baad width adjust ki gayi hai */
        margin: 0 auto;
    }

    /* Form Styling */
    .booking-form-card {
        background: var(--bg-glass);
        padding: 40px;
        border-radius: 24px;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        border: 1px solid #e2e8f0;
    }

    .booking-form-card h3 {
        text-align: center;
        margin-bottom: 25px;
        font-size: 1.8rem;
        color: var(--dark-navy);
        font-weight: 800;
    }

    .form-group { margin-bottom: 20px; }
    .form-group label { display: block; font-weight: 700; font-size: 0.9rem; margin-bottom: 8px; color: var(--dark-navy); }
    
    .form-group input, .form-group select, .form-group textarea {
        width: 100%; padding: 12px 16px; border: 1.5px solid #e2e8f0; border-radius: 12px; font-size: 1rem; transition: 0.3s;
        box-sizing: border-box; /* Padding handling */
    }

    .form-group input:focus, .form-group select:focus { border-color: var(--plumb-blue); outline: none; box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1); }

    .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; }

    /* Map & Location */
    .loc-btn {
        background: #eff6ff; color: var(--plumb-blue); border: 1.5px dashed #bfdbfe;
        padding: 12px; border-radius: 12px; font-weight: 700; cursor: pointer; width: 100%; margin-bottom: 10px;
        display: flex; justify-content: center; align-items: center; gap: 10px;
    }

    #plumbMap { height: 180px; width: 100%; border-radius: 12px; display: none; margin-bottom: 15px; border: 1px solid #ddd; }

    /* Price Card */
    .price-summary {
        background: linear-gradient(135deg, #2563eb, #3b82f6); color: white;
        padding: 20px; border-radius: 16px; display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;
    }

    .price-summary span { font-weight: 800; font-size: 1.8rem; }

    .form-submit {
        background: var(--plumb-blue); color: white; padding: 16px; width: 100%; border: none;
        border-radius: 12px; font-size: 1.1rem; font-weight: 700; cursor: pointer; transition: 0.3s;
    }

    .form-submit:hover { background: var(--plumb-hover); transform: translateY(-2px); }

    @media (max-width: 600px) {
        .form-row { grid-template-columns: 1fr; gap: 0; }
        .booking-form-card { padding: 25px; }
    }
</style>

<section class="booking-wrapper">
    <div class="booking-container">
        <div class="booking-form-card">
            <h3>Book Plumbing Service</h3>
            <form id="bookingForm" action="plumber-db.php" method="POST">
                
                <input type="hidden" name="total_price" id="finalPriceInput">
                <input type="hidden" name="latitude" id="latInput">
                <input type="hidden" name="longitude" id="lonInput">

                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="name" required placeholder="Full Name">
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" required placeholder="Hello@example.com">
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="tel" name="phone" required placeholder="10-digit number" pattern="[0-9]{10}">
                    </div>
                </div>

                <div class="form-group">
                    <button type="button" onclick="getPlumberLocation()" class="loc-btn">
                        <i class="fas fa-location-crosshairs"></i> Detect My Location
                    </button>
                    <div id="plumbMap"></div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Service Type</label>
                        <select id="plumbService" name="service" onchange="updatePlumberPrice()" required>
                            <option value="" data-price="0">Select service</option>
                            <option value="emergency" data-price="1500">Emergency Repair (₹1,500)</option>
                            <option value="bathroom" data-price="800">Bathroom Plumbing (₹800)</option>
                            <option value="kitchen" data-price="700">Kitchen Plumbing (₹700)</option>
                            <option value="waterheater" data-price="1200">Water Heater (₹1,200)</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Urgency Level</label>
                        <select name="urgency" required>
                            <option value="standard">Standard</option>
                            <option value="urgent">Urgent (Today)</option>
                            <option value="emergency">EMERGENCY (Now)</option>
                        </select>
                    </div>
                </div>

                <div class="price-summary">
                    <small style="text-transform: uppercase; font-size: 0.7rem; letter-spacing: 1px;">Estimated Total</small>
                    <span id="plumbPriceDisplay">₹0</span>
                </div>

                <div class="form-group">
                    <label>Complete Address</label>
                    <input type="text" name="address" required placeholder="Flat, Street, Area">
                </div>

                <div class="form-group">
                    <label>Describe the Issue</label>
                    <textarea name="message" rows="3" placeholder="Explain the problem..."></textarea>
                </div>

                <button type="submit" class="form-submit">Confirm Booking</button>
            </form>
        </div>
    </div>
</section>

<script>
let plumbMap;

function getPlumberLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            const lat = position.coords.latitude;
            const lon = position.coords.longitude;
            document.getElementById('latInput').value = lat;
            document.getElementById('lonInput').value = lon;
            
            document.getElementById('plumbMap').style.display = "block";
            if (!plumbMap) {
                plumbMap = L.map('plumbMap').setView([lat, lon], 16);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(plumbMap);
                L.marker([lat, lon]).addTo(plumbMap);
            } else {
                plumbMap.setView([lat, lon], 16);
            }
            setTimeout(() => { plumbMap.invalidateSize(); }, 200);
        });
    }
}

function updatePlumberPrice() {
    const select = document.getElementById('plumbService');
    const price = select.options[select.selectedIndex].getAttribute('data-price') || 0;
    document.getElementById('plumbPriceDisplay').innerText = "₹" + price;
    document.getElementById('finalPriceInput').value = price;
}
</script>

    <!-- Testimonials -->
    <section class="testimonials">
        <div class="container">
            <div class="section-title">
                <h2>What Our Customers Say</h2>
                <p>Trusted by homeowners and businesses throughout the community</p>
            </div>

            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="testimonial-text">
                        "ServiPlus+ saved us from a major basement flood! Their emergency response was incredible - they
                        arrived within 45 minutes and fixed everything professionally."
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">MJ</div>
                        <div class="author-info">
                            <h4>Maria Johnson</h4>
                            <p>Homeowner</p>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-text">
                        "As a restaurant owner, plumbing issues can be devastating. ServiPlus+ commercial services are
                        reliable, fast, and their pricing is fair. Highly recommend!"
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">RS</div>
                        <div class="author-info">
                            <h4>Robert Smith</h4>
                            <p>Restaurant Owner</p>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-text">
                        "The team was professional, clean, and efficient. They explained everything clearly and the
                        price was exactly what they quoted. Will definitely use them again."
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">SD</div>
                        <div class="author-info">
                            <h4>Sarah Davis</h4>
                            <p>Apartment Manager</p>
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
                    <h3>ServiPlus+  Plumbing</h3>
                    <p>Professional plumbing services with 5+ years of experience. Licensed, insured, and committed to
                        excellence in every job.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>

                <div class="footer-col">
                    <h3>Quick Links</h3>
                    <ul class="footer-links">
                        <li><a href="#services">Our Services</a></li>
                        <li><a href="#pricing">Pricing</a></li>
                        <li><a href="#booking">Book Online</a></li>
                        <li><a href="#about">About Us</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h3>Services</h3>
                    <ul class="footer-links">
                        <li><a href="#">Emergency Repairs</a></li>
                        <li><a href="#">Bathroom Plumbing</a></li>
                        <li><a href="#">Kitchen Plumbing</a></li>
                        <li><a href="#">Water Heater Services</a></li>
                        <li><a href="#">Commercial Plumbing</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h3>Contact Info</h3>
                    <ul class="contact-info">
                        <li>
                            <i class="fas fa-map-marker-alt"></i>
                            <span>456 Water Street, City, State 12345</span>
                        </li>
                        <li>
                            <i class="fas fa-phone"></i>
                            <span>(555) 123-4567</span>
                        </li>
                        <li>
                            <i class="fas fa-envelope"></i>
                            <span>info@aquaflowplumbing.com</span>
                        </li>
                        <li>
                            <i class="fas fa-clock"></i>
                            <span>24/7 Emergency Service Available</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <p>© 2026 ServiPlus Plumbing. All rights reserved. | Developed by bca Injamam</p>
            </div>
        </div>
    </footer>
<script>
  document.addEventListener('DOMContentLoaded', function () {

//     const bookingForm = document.getElementById('bookingForm');
//     bookingForm.addEventListener('submit', function (e) {
//       e.preventDefault();

    //   const formData = {
    //     name: document.getElementById('name').value,
    //     email: document.getElementById('email').value,
    //     phone: document.getElementById('phone').value,
    //     address: document.querySelector('input[placeholder="Enter Your Address"]').value,
    //     service: document.getElementById('service').value,
    //     urgency: document.getElementById('urgency').value,
    //     message: document.getElementById('message').value
    //   };

      // Simulate form submission
    //   alert('✅ Thank you, ' + formData.name + '! We will contact you shortly.');
    //   bookingForm.reset();

    //   console.log('Booking submitted:', formData);
    // });

    // Mobile Menu Toggle
    const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
    const navLinks = document.querySelector('.nav-links');
    if (mobileMenuBtn && navLinks) {
      mobileMenuBtn.addEventListener('click', function () {
        navLinks.style.display = navLinks.style.display === 'flex' ? 'none' : 'flex';
      });
    }

    // Smooth Scrolling
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

    // Scroll Animation
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

    // Estimate Calculator
    // const serviceSelect = document.getElementById('service');
    // const urgencySelect = document.getElementById('urgency');

    // function calculateEstimate() {
    //   const service = serviceSelect.value;
    //   const urgency = urgencySelect.value;
    //   let baseRate = 0;

    //   switch (service) {
    //     case 'emergency': baseRate = 600; break;
    //     case 'bathroom': baseRate = 500; break;
    //     case 'kitchen': baseRate = 450; break;
    //     case 'waterheater': baseRate = 700; break;
    //     case 'pipe': baseRate = 550; break;
    //     case 'commercial': baseRate = 1500; break;
    //   }

    //   if (urgency === 'emergency') {
    //     baseRate *= 1.5;
    //   } else if (urgency === 'urgent') {
    //     baseRate *= 1.2;
    //   }

    //   return baseRate;
    // }

    // function updateEstimate() {
    //   const estimate = calculateEstimate();
    //   if (estimate > 0) {
    //     alert('💰 Estimated cost: ₹' + estimate);
    //     console.log('Estimated cost: ₹' + estimate);
    //   }
    // }

    serviceSelect.addEventListener('change', updateEstimate);
    urgencySelect.addEventListener('change', updateEstimate);

    // Emergency CTA Animation
    const emergencyCta = document.querySelector('.emergency-cta');
    if (emergencyCta) {
      emergencyCta.addEventListener('mouseenter', function () {
        this.style.transform = 'scale(1.05)';
      });
      emergencyCta.addEventListener('mouseleave', function () {
        this.style.transform = 'scale(1)';
      });
    }
  });
</script>

<!-- login page  -->

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
    <p> <?= htmlspecialchars($_SESSION['username']) ?></p>
    <a href="logout.php"></a> <!-- 👈 Logout link yahan diya -->
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
<script>
document.addEventListener("DOMContentLoaded", () => {
    const menuBtn = document.querySelector(".mobile-menu-btn");
    const navLinks = document.querySelector(".nav-links");

    menuBtn.addEventListener("click", () => {
        navLinks.classList.toggle("active");
    });
});
</script>

<!-- <script>
    const menuBtn = document.querySelector(".mobile-menu-btn");
    const navLinks = document.querySelector(".nav-links");

    menuBtn.addEventListener("click", () => {
        navLinks.classList.toggle("active");
    });
</script> -->



</html>