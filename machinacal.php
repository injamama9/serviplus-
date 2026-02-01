<?php
session_start();
$is_logged_in = isset($_SESSION['user_id']);
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mechanical</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
      <link rel="shortcut icon"
    href="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/c9a49e4a-9671-4cfd-9090-3cc2ec330fec.png"
    type="image/x-icon">
    
  <style>
        :root {
            --primary: #2563eb;
            --secondary: #f59e0b;
            --dark: #1e293b;
            --light: #f8fafc;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        html,
        body {
            height: 100%;
            overflow-x: hidden;
            overflow-y: auto;
        }



        body {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            min-height: 100vh;
        }

        .hero-gradient {
            background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
        }

        .service-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        /* .booking-form {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
        }

        .btn-primary {
            background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(37, 99, 235, 0.3);
        } */

        .price-badge {
            position: absolute;
            top: -10px;
            right: -10px;
            background: #ef4444;
            color: white;
            padding: 8px 16px;
            border-radius: 25px;
            font-weight: 600;
            font-size: 0.875rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .feature-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
        }
    </style> 
  <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --primary-light: #3b82f6;
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
            background-color: var(--primary);
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

        /* mobile responsive */

        /* Mobile Nav Active */
        .nav-links.active {
            display: flex !important;
            position: absolute;
            top: 70px;
            /* header ke niche */
            left: 0;
            right: 0;
            background: white;
            flex-direction: column;
            gap: 1.5rem;
            padding: 1.5rem;
            box-shadow: var(--shadow);
            z-index: 999;
        }

        .nav-links.active li {
            text-align: center;
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

        /* Booking Section */
        /* .booking {
            padding: 5rem 0;
            background: var(--light);
        }

        .booking-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow-lg);
        }

        .booking-info {
            padding: 3rem;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
        }

        .booking-info h2 {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
        }

        .booking-info p {
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .info-item i {
            font-size: 1.5rem;
            color: var(--accent-light);
        }

        .booking-form {
            padding: 3rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--dark);
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 1rem;
            border: 2px solid var(--border);
            border-radius: 8px;
            font-size: 1rem;
            transition: var(--transition);
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .form-submit {
            background: var(--primary);
            color: white;
            padding: 1rem 2rem;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            width: 100%;
        }

        .form-submit:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
        } */

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
        
    </style>
</head>


<body>
    <!-- Header -->



     <header class="header">
        <div class="container">
            <nav class="nav">
               <div class="flex items-center">
                    <div
                        class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center text-white font-bold text-xl">
                        M</div>
                    <span class="ml-2 text-xl font-bold text-gray-800">mechanicPlus+</span>
                </div>
                 <!-- <a href="#" class="logo">
                    <i class="fas fa-bolt"></i>
                     ElectricPlus+
                </a> -->

                <ul class="nav-links">
                    <li><a href="index.php">Home</a></li>
                     <li><a href="about.php">About</a></li>
                    <li><a href="All-servic.php">Services</a></li>
                    <li><a href="#booking">Book Now</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>

                <!-- <a href="#booking" class="nav-cta">Emergency Call</a> -->

                <button class="mobile-menu-btn">
                    <i class="fas fa-bars"></i>
                </button> 
            </nav>
        </div>
    </header>   

    <!-- Hero Section -->
          <section class="hero-gradient text-white pt-24 pb-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <div>
                        <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
                            Instant Motorcycle Repair Service
                        </h1>
                        <p class="text-xl mb-8 text-blue-100">
                            Get your bike back on the road faster than ever. Professional repairs, competitive pricing,
                            and instant service guarantees.
                        </p>
                        <div class="flex flex-wrap gap-4">
                            <button  onclick="scrollToSection('booking-container')"
                                class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-4 rounded-full font-semibold text-lg transition-colors">
                                Book Instant Service
                            </button>
                            <button onclick="scrollToSection('services')"
                                class="border-2 border-white text-white px-8 py-4 rounded-full font-semibold text-lg hover:bg-white hover:text-blue-600 transition-colors">
                                View Services
                            </button>
                        </div>
                    </div>
                    <div class="relative">
                        <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                            <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/c9a49e4a-9671-4cfd-9090-3cc2ec330fec.png"
                                alt="Professional motorcycle technician performing instant repair service in modern workshop with tools and equipment"
                                class="rounded-xl w-full h-auto shadow-2xl" />
                        </div>
                        <div class="absolute -bottom-4 -left-4 bg-orange-500 text-white p-4 rounded-xl shadow-lg">
                            <div class="text-2xl font-bold">24/7</div>
                            <div>Emergency Service</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- Services Section -->
    <section id="services" class="py-20 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Our Instant Services</h2>
                    <p class="text-gray-600 max-w-2xl mx-auto">Professional motorcycle repair services with instant
                        turnaround times and quality guarantees.</p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Service 1 -->
                    <div class="service-card bg-white rounded-xl p-6 shadow-lg border border-gray-100">
                        <div class="feature-icon">
                            <i class="fas fa-tools text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Engine Repair</h3>
                        <p class="text-gray-600 mb-4">Complete engine diagnostics and repair services with 60-minute
                            completion guarantee.</p>
                        <div class="text-2xl font-bold text-blue-600">From 449</div>
                    </div>

                    <!-- Service 2 -->
                    <div class="service-card bg-white rounded-xl p-6 shadow-lg border border-gray-100">
                        <div class="feature-icon">
                            <i class="fas fa-oil-can text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Oil Change</h3>
                        <p class="text-gray-600 mb-4">Quick oil change service with premium lubricants and 15-minute
                            completion time.</p>
                        <div class="text-2xl font-bold text-blue-600">From 190</div>
                    </div>

                    <!-- Service 3 -->
                    <div class="service-card bg-white rounded-xl p-6 shadow-lg border border-gray-100">
                        <div class="feature-icon">
                            <i class="fas fa-cogs text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Brake Service</h3>
                        <p class="text-gray-600 mb-4">Comprehensive brake inspection and repair with 30-minute service
                            guarantee.</p>
                        <div class="text-2xl font-bold text-blue-600">From 180</div>
                    </div>

                    <!-- Service 4 -->
                    <div class="service-card bg-white rounded-xl p-6 shadow-lg border border-gray-100">
                        <div class="feature-icon">
                            <i class="fas fa-tachometer-alt text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Tire Service</h3>
                        <p class="text-gray-600 mb-4">Tire replacement and repair with premium brands and 20-minute
                            installation.</p>
                        <div class="text-2xl font-bold text-blue-600">From 160</div>
                    </div>

                    <!-- Service 5 -->
                    <div class="service-card bg-white rounded-xl p-6 shadow-lg border border-gray-100">
                        <div class="feature-icon">
                            <i class="fas fa-bolt text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Electrical Repair</h3>
                        <p class="text-gray-600 mb-4">Complete electrical system diagnostics and repair with instant
                            troubleshooting.</p>
                        <div class="text-2xl font-bold text-blue-600">From 120</div>
                    </div>

                    <!-- Service 6 -->
                    <div class="service-card bg-white rounded-xl p-6 shadow-lg border border-gray-100">
                        <div class="feature-icon">
                            <i class="fas fa-star text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Premium Service</h3>
                        <p class="text-gray-600 mb-4">Complete bike overhaul with 2-hour service guarantee and premium
                            parts.</p>
                        <div class="text-2xl font-bold text-blue-600">From 250</div>
                    </div>
                </div>
            </div>
        </section>

          <!-- Stats Section -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                    <div>
                        <div class="text-3xl md:text-4xl font-bold text-blue-600 mb-2">500+</div>
                        <div class="text-gray-600">Bikes Repaired</div>
                    </div>
                    <div>
                        <div class="text-3xl md:text-4xl font-bold text-blue-600 mb-2">24/7</div>
                        <div class="text-gray-600">Service Available</div>
                    </div>
                    <div>
                        <div class="text-3xl md:text-4xl font-bold text-blue-600 mb-2">30min</div>
                        <div class="text-gray-600">Average Repair Time</div>
                    </div>
                    <div>
                        <div class="text-3xl md:text-4xl font-bold text-blue-600 mb-2">98%</div>
                        <div class="text-gray-600">Customer Satisfaction</div>
                    </div>
                </div>
            </div>
        </section>

       <!-- Pricing Section -->
        <!-- <section id="pricing" class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Transparent Pricing</h2>
                    <p class="text-gray-600 max-w-2xl mx-auto">No hidden fees. Just honest pricing for quality
                        motorcycle repair services.</p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8"> -->
                 
                    <!-- <div class="relative bg-gray-50 rounded-xl p-8 border border-gray-200 text-center">
                        <div class="price-badge">Popular</div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Basic Service</h3>
                        <div class="text-3xl font-bold text-blue-600 mb-4">$49</div>
                        <ul class="text-gray-600 space-y-2 mb-6">
                            <li>Oil Change</li>
                            <li>Basic Inspection</li>
                            <li>Air Filter Cleaning</li>
                            <li>30-minute Service</li>
                        </ul>
                        <button onclick="selectPackage('basic')"
                            class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                            Select Package
                        </button>
                    </div> -->

                    <!-- Standard Package -->
                    <!-- <div class="relative bg-white rounded-xl p-8 border-2 border-blue-600 shadow-lg text-center">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Standard Service</h3>
                        <div class="text-3xl font-bold text-blue-600 mb-4">$99</div>
                        <ul class="text-gray-600 space-y-2 mb-6">
                            <li>Oil Change</li>
                            <li>Brake Inspection</li>
                            <li>Tire Pressure Check</li>
                            <li>Chain Lubrication</li>
                            <li>1-hour Service</li>
                        </ul>
                        <button onclick="selectPackage('standard')"
                            class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                            Select Package
                        </button>
                    </div> -->

                    <!-- Premium Package -->
                    <!-- <div class="relative bg-gray-50 rounded-xl p-8 border border-gray-200 text-center">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Premium Service</h3>
                        <div class="text-3xl font-bold text-blue-600 mb-4">$199</div>
                        <ul class="text-gray-600 space-y-2 mb-6">
                            <li>Full Service Package</li>
                            <li>Engine Tune-up</li>
                            <li>Brake Service</li>
                            <li>Electrical Check</li>
                            <li>2-hour Service</li>
                        </ul>
                        <button onclick="selectPackage('premium')"
                            class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                            Select Package
                        </button>
                    </div> -->

                    <!-- Custom Package -->
                    <!-- <div class="relative bg-white rounded-xl p-8 border border-gray-200 text-center">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Custom Service</h3>
                        <div class="text-3xl font-bold text-blue-600 mb-4">Custom</div>
                        <ul class="text-gray-600 space-y-2 mb-6">
                            <li>Tailored to Your Needs</li>
                            <li>Expert Consultation</li>
                            <li>Premium Parts</li>
                            <li>Flexible Timing</li>
                            <li>Priority Service</li>
                        </ul>
                        <button onclick="scrollToSection('booking')"
                            class="w-full bg-gray-600 text-white py-3 rounded-lg font-semibold hover:bg-gray-700 transition-colors">
                            Get Quote
                        </button>
                    </div>
                </div>
            </div>
        </section> -->

    <!-- Booking Section -->
     <!--  60px 20px; -->
<section style="padding: 40px 15px; background-color: #f4f7f6; font-family: 'Poppins', sans-serif;">
  <style>
    .booking-container {
      max-width: 900px;
      margin: 0 auto;
      background: linear-gradient(135deg, #1e40af, #3b82f6);
      border-radius: 16px;
      padding: 40px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
      color: #fff;
    }

    .booking-container h2 { text-align: center; font-size: 2.2rem; margin-bottom: 10px; font-weight: 700; }
    .booking-container p { text-align: center; color: #e0e7ff; margin-bottom: 35px; font-size: 1rem; }
    .booking-form { display: flex; flex-direction: column; gap: 20px; }
    .booking-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; }
    .booking-group { display: flex; flex-direction: column; }
    .booking-group label { margin-bottom: 8px; font-weight: 500; font-size: 0.9rem; color: #f1f5f9; }

    .booking-group input, .booking-group select, .booking-group textarea {
      padding: 12px 15px;
      border: 1px solid rgba(255, 255, 255, 0.2);
      border-radius: 10px;
      background-color: #ffffff;
      color: #1e293b;
      font-size: 1rem;
      transition: all 0.3s ease;
    }

    /* 📍 Location Button Styling */
    .loc-btn {
      background: #10b981;
      color: white;
      border: none;
      padding: 10px;
      border-radius: 8px;
      font-size: 0.8rem;
      font-weight: 700;
      cursor: pointer;
      margin-bottom: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      transition: 0.3s;
    }
    .loc-btn:hover { background: #059669; }

    .price-display-box {
      margin-top: 10px;
      padding: 15px;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 10px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      border: 1px dashed #fcd34d;
    }

    #displayPrice { font-size: 1.5rem; font-weight: 800; color: #fcd34d; }
    .booking-submit {
      width: 100%;
      padding: 16px;
      background-color: #fcd34d;
      color: #1e3a8a;
      border: none;
      border-radius: 10px;
      font-size: 1.1rem;
      font-weight: 700;
      cursor: pointer;
      margin-top: 10px;
    }

    @media (max-width: 768px) { .booking-grid { grid-template-columns: 1fr; } }
  </style>

  <div class="booking-container">
    <h2>Book Your Instant Repair</h2>
    <p>Fill out the form below and we'll get you scheduled instantly</p>

    <form class="booking-form" method="POST" action="machenical_booking.php">
      
      <input type="hidden" name="total_price" id="finalPriceInput">
      <input type="hidden" name="latitude" id="latInput">
      <input type="hidden" name="longitude" id="lonInput">
<!-- map -->
     <style>
        #map {
    height: 200px;
    width: 100%;
    border-radius: 12px;
    margin-bottom: 20px;
    display: none; /* Shuruat mein hide rahega */
    border: 2px solid rgba(255, 255, 255, 0.2);
}
     </style>
     <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<button type="button" class="loc-btn" onclick="getLocation()">
    <i class="fa-solid fa-location-crosshairs"></i> Get My Current Location
</button>
<p id="locStatus" style="text-align: left; font-size: 0.7rem; color: #fcd34d; margin-top: -15px;"></p>

<div id="map"></div>

      <div class="booking-grid">
        <div class="booking-group">
          <label>Full Name</label>
          <input type="text" name="name" placeholder="Enter Name" required>
        </div>
        <div class="booking-group">
          <label>Email Address</label>
          <input type="email" name="email" placeholder="you@example.com" required>
        </div>
      </div>

      <div class="booking-grid">
        <div class="booking-group">
          <label>Phone Number</label>
          <input type="tel" name="phone" placeholder="+91 98765 43210" required>
        </div>
        <div class="booking-group">
          <label>Bike Model</label>
          <input type="text" name="bike" placeholder="Honda Shine, Pulsar, etc." required>
        </div>
      </div>

      <div class="booking-grid">
        <div class="booking-group">
          <label>Enter Your City</label>
          <input type="text" name="city" placeholder="e.g. Delhi, Mumbai" required>
        </div>
        <div class="booking-group">
          <label>Full Address</label>
          <input type="text" name="full_address" placeholder="Street, Area, Landmark" required>
        </div>
      </div>

      <div class="booking-grid">
        <div class="booking-group">
          <label>Select Your Country</label>
          <select name="country" required>
            <option value="">Choose Country</option>
            <option value="India">India</option>
            <option value="USA">USA</option>
            <option value="Nepal">Nepal</option>
          </select>
        </div>
        <div class="booking-group">
          <label>Select Service Needed</label>
          <select name="service" id="serviceSelect" onchange="updatePrice()" required>
            <option value="" data-price="0">-- Select --</option>
            <option value="Tire Change" data-price="500">Tire Change (₹500)</option>
            <option value="Oil Change" data-price="1200">Oil Change (₹1200)</option>
            <option value="Engine Tuning" data-price="2000">Engine Tuning (₹2000)</option>
            <option value="Full Service" data-price="4500">Full Vehicle Service (₹4500)</option>
          </select>
        </div>
      </div>

      <div class="price-display-box">
        <span style="font-weight: 600; text-transform: uppercase; font-size: 0.8rem;">Estimated Total:</span>
        <span id="displayPrice">₹0</span>
      </div>

      <div class="booking-group">
        <label>Preferred Date</label>
        <input type="date" name="date" required>
      </div>

      <div class="booking-group">
        <label>Additional Notes</label>
        <textarea name="notes" placeholder="Any specific instructions..."></textarea>
      </div>

      <button type="submit" class="booking-submit">Book Instant Service</button>
    </form>
  </div>

  <script>
    // 1. Price Update Function
    function updatePrice() {
      const select = document.getElementById('serviceSelect');
      const display = document.getElementById('displayPrice');
      const input = document.getElementById('finalPriceInput');
      const selectedOption = select.options[select.selectedIndex];
      const price = selectedOption.getAttribute('data-price') || 0;
      display.innerText = '₹' + price;
      input.value = price;
    }

    // 2. Live Location Function
   
     let map; // Map variable globally define karein

function getLocation() {
    const status = document.getElementById('locStatus');
    const latInput = document.getElementById('latInput');
    const lonInput = document.getElementById('lonInput');
    const mapDiv = document.getElementById('map');

    if (!navigator.geolocation) {
        status.innerText = "Geolocation is not supported by your browser";
    } else {
        status.innerText = "Locating...";
        navigator.geolocation.getCurrentPosition(
            (position) => {
                const lat = position.coords.latitude;
                const lon = position.coords.longitude;

                // Hidden inputs mein data bharna
                latInput.value = lat;
                lonInput.value = lon;

                status.innerText = "📍 Location Captured!";
                status.style.color = "#10b981";

                // Map dikhana aur load karna
                mapDiv.style.display = "block";
                
                if (!map) {
                    // Naya map initialize karna
                    map = L.map('map').setView([lat, lon], 15);
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        attribution: '© OpenStreetMap'
                    }).addTo(map);
                    L.marker([lat, lon]).addTo(map)
                        .bindPopup('You are here!')
                        .openPopup();
                } else {
                    // Agar map pehle se hai toh sirf view change karna
                    map.setView([lat, lon], 15);
                    L.marker([lat, lon]).addTo(map);
                }
                
                // Map ko resize fix dena (zaroori hai hidden div ke liye)
                setTimeout(() => { map.invalidateSize(); }, 200);
            },
            () => {
                status.innerText = "Unable to retrieve location. Please enable GPS.";
                status.style.color = "#ef4444";
            }
        );
    }
}
  </script>
</section>


    <!-- Testimonials -->
       <section class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">What Our Riders Say</h2>
                    <p class="text-gray-600 max-w-2xl mx-auto">Join hundreds of satisfied motorcycle owners who trust us
                        with their bikes.</p>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    <div class="bg-gray-50 p-6 rounded-xl">
                        <div class="flex items-center mb-4">
                            <div
                                class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold">
                                JD</div>
                            <div class="ml-4">
                                <div class="font-semibold">John Doe</div>
                                <div class="text-blue-600">Yamaha R6 Owner</div>
                            </div>
                        </div>
                        <p class="text-gray-600">"Incredible service! My bike was repaired in under an hour.
                            Professional team and fair pricing."</p>
                        <div class="flex text-yellow-400 mt-3">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>

                    <div class="bg-gray-50 p-6 rounded-xl">
                        <div class="flex items-center mb-4">
                            <div
                                class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center text-white font-bold">
                                SJ</div>
                            <div class="ml-4">
                                <div class="font-semibold">Sarah Johnson</div>
                                <div class="text-blue-600">Honda CBR Owner</div>
                            </div>
                        </div>
                        <p class="text-gray-600">"The 24/7 service saved my road trip! Emergency repair was done
                            professionally and quickly."</p>
                        <div class="flex text-yellow-400 mt-3">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>

                    <div class="bg-gray-50 p-6 rounded-xl">
                        <div class="flex items-center mb-4">
                            <div
                                class="w-12 h-12 bg-purple-600 rounded-full flex items-center justify-center text-white font-bold">
                                MW</div>
                            <div class="ml-4">
                                <div class="font-semibold">Mike Wilson</div>
                                <div class="text-blue-600">Ducati Owner</div>
                            </div>
                        </div>
                        <p class="text-gray-600">"Premium service was worth every penny. My Ducati runs better than when
                            it was new!"</p>
                        <div class="flex text-yellow-400 mt-3">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <!-- Footer -->
   <footer id="contact" class="bg-gray-800 text-white py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid md:grid-cols-4 gap-8">
                    <div>
                        <div
                            class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center text-white font-bold text-xl mb-4">
                            M</div>
                        <p class="text-gray-300 mb-4">Professional motorcycle repair service with instant turnaround and
                            quality guarantees.</p>
                        <div class="flex space-x-4">
                            <a href="#" class="text-gray-400 hover:text-white transition-colors"><i
                                    class="fab fa-facebook-f"></i></a>
                            <a href="#" class="text-gray-400 hover:text-white transition-colors"><i
                                    class="fab fa-twitter"></i></a>
                            <a href="#" class="text-gray-400 hover:text-white transition-colors"><i
                                    class="fab fa-instagram"></i></a>
                            <a href="#" class="text-gray-400 hover:text-white transition-colors"><i
                                    class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                        <ul class="space-y-2">
                            <li>Services</li>
                            <li>Pricing
                            </li>
                            <li>Book Now
                            </li>
                            <li>About Us</li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold mb-4">Services</h3>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Engine Repair</a>
                            </li>
                            <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Brake Service</a>
                            </li>
                            <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Oil Change</a></li>
                            <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Tire Service</a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-lg font-semibold mb-4">Contact Info</h3>
                        <div class="space-y-2 text-gray-300">
                            <div class="flex items-center">
                                <i class="fas fa-map-marker-alt mr-3"></i>
                                <span>123 Moto Street, Bike City</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-phone mr-3"></i>
                                <span>1800-XX-0000</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-envelope mr-3"></i>
                                <span>service@promotofix.com</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-clock mr-3"></i>
                                <span>Open 24/7</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                    <p>&copy; 2026 ServiPlus . All rights reserved. Professional motorcycle repair services. developed by md injamam</p>
                </div>
            </div>
        </footer>

<!-- <script>
            address: document.getElementById('address').value, // FIXED: added address
    document.addEventListener('DOMContentLoaded', function () {
        // Booking Form Submission
  
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

        // Service price calculator (example)
        const serviceSelect = document.getElementById('service');
        const timeSelect = document.getElementById('time');

        function calculateEstimate() {
            const service = serviceSelect.value;
            const time = timeSelect.value;
            let baseRate = 0;

            switch (service) {
                case 'residential': baseRate = 85; break;
                case 'commercial': baseRate = 120; break;
                case 'emergency': baseRate = 150; break;
                case 'installation': baseRate = 100; break;
                case 'maintenance': baseRate = 90; break;
            }

            if (time === 'emergency') {
                baseRate *= 1.5; // Emergency premium
            }

            return baseRate;
        }

        serviceSelect.addEventListener('change', updateEstimate);
        timeSelect.addEventListener('change', updateEstimate);

        function updateEstimate() {
            const estimate = calculateEstimate();
            if (estimate > 0) {
                console.log('Estimated cost: ₹' + estimate);
            }
        }
    });
</script> -->
  <script>
            function scrollToSection(sectionId) {
                document.getElementById(sectionId).scrollIntoView({
                    behavior: 'smooth'
                });
            }

            function selectPackage(packageType) {
                scrollToSection('booking');
                // You can add package pre-selection logic here
                console.log('Selected package:', packageType);
            }

            document.getElementById('bookingForm').addEventListener('submit', function (e) {
                e.preventDefault();
                alert('Booking request submitted! We will contact you within 15 minutes to confirm your appointment.');
                this.reset();
            });

            // Mobile menu toggle (simplified for this example)
            // document.querySelector('nav button').addEventListener('click', function() {
            //     alert('Mobile menu would open here in a complete implementation');
            // });
        </script>


     <script>
  const mobileBtn = document.querySelector('.mobile-menu-btn');
  const navLinks = document.querySelector('.nav-links');
  const icon = mobileBtn.querySelector("i");

  mobileBtn.addEventListener('click', () => {
    navLinks.classList.toggle('active');

    // icon toggle (bars <-> close)
    if (icon.classList.contains("fa-bars")) {
      icon.classList.remove("fa-bars");
      icon.classList.add("fa-times");
    } else {
      icon.classList.remove("fa-times");
      icon.classList.add("fa-bars");
    }
  });
</script>


<!--  -->


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