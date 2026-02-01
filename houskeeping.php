<?php
session_start();
$is_logged_in = isset($_SESSION['user_id']);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Housekeeping</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
         <link rel="shortcut icon"
    href="http://localhost:3000/man-fixing-motorcycle-modern-workshop.jpg"
    type="image/x-icon">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-color: #2563eb;
            --secondary-color: #f59e0b;
            --accent-color: #10b981;
            --text-dark: #1f2937;
            --text-light: #6b7280;
            --bg-light: #f9fafb;
            --white: #ffffff;
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
            overflow-x: hidden;
        }

        /* Header & Navigation */
        header {
            position: fixed;
            top: 0;
            width: 100%;
            background: var(--white);
            box-shadow: var(--shadow);
            z-index: 1000;
            transition: all 0.3s ease;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 5%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--primary-color);
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--text-dark);
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .nav-links a:hover {
            color: var(--primary-color);
        }

        .cta-button {
            background: var(--primary-color);
            color: var(--white);
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 0.5rem;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .cta-button:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .mobile-menu {
            display: none;
            font-size: 1.5rem;
            cursor: pointer;
        }

        /* Hero Section */
        .hero {
            margin-top: 80px;
            min-height: 90vh;
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: var(--white);
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
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="%23ffffff10" points="0,1000 1000,800 1000,1000"/></svg>');
            background-size: cover;
        }

        .hero-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 5%;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
            position: relative;
            z-index: 1;
        }

        .hero-text h1 {
            font-size: 3.5rem;
            margin-bottom: 1rem;
            line-height: 1.1;
        }

        .hero-text p {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .secondary-button {
            background: transparent;
            color: var(--white);
            border: 2px solid var(--white);
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .secondary-button:hover {
            background: var(--white);
            color: var(--primary-color);
        }

        .hero-image {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .hero-card {
            background: var(--white);
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: var(--shadow-lg);
            color: var(--text-dark);
            max-width: 400px;
            width: 100%;
        }

        /* Services Section */
        .services {
            padding: 5rem 5%;
            background: var(--bg-light);
        }

        .section-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .section-header h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: var(--text-dark);
        }

        .section-header p {
            font-size: 1.125rem;
            color: var(--text-light);
            max-width: 600px;
            margin: 0 auto;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .service-card {
            background: var(--white);
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
            text-align: center;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .service-icon {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .service-card h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: var(--text-dark);
        }

        .service-card p {
            color: var(--text-light);
            margin-bottom: 1rem;
        }

        .price {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--accent-color);
            margin-bottom: 1rem;
        }

        /* Booking Section */
        .booking {
            padding: 5rem 5%;
            background: var(--white);
        }

        .booking-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .booking-form {
            background: var(--bg-light);
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: var(--shadow-lg);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--text-dark);
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary-color);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        /* Testimonials */
        .testimonials {
            padding: 5rem 5%;
            background: var(--bg-light);
        }

        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .testimonial-card {
            background: var(--white);
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: var(--shadow);
            position: relative;
        }

        .testimonial-card::before {
            content: '"';
            position: absolute;
            top: -10px;
            left: 1rem;
            font-size: 4rem;
            color: var(--primary-color);
            opacity: 0.3;
        }

        .stars {
            color: var(--secondary-color);
            margin-bottom: 1rem;
        }

        .testimonial-text {
            font-style: italic;
            margin-bottom: 1rem;
            color: var(--text-light);
        }

        .testimonial-author {
            font-weight: 600;
            color: var(--text-dark);
        }

        /* Footer */
        footer {
            background: var(--text-dark);
            color: var(--white);
            padding: 3rem 5%;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }

        .footer-section h3 {
            margin-bottom: 1rem;
        }

        .footer-section a {
            color: var(--text-light);
            text-decoration: none;
            display: block;
            margin-bottom: 0.5rem;
            transition: color 0.3s ease;
        }

        .footer-section a:hover {
            color: var(--white);
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .social-links a {
            color: white;
            display: inline-block;
            width: 40px;
            height: 40px;
            background: var(--primary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background: var(--secondary-color);
            transform: translateY(-3px);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background: var(--white);
                flex-direction: column;
                padding: 1rem;
                box-shadow: var(--shadow);
            }

            .nav-links.active {
                display: flex;
            }

            .mobile-menu {
                display: block;
            }

            .hero-content {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .hero-text h1 {
                font-size: 2.5rem;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .hero-buttons {
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            .hero-text h1 {
                font-size: 2rem;
            }

            .section-header h2 {
                font-size: 2rem;
            }

            .service-card,
            .testimonial-card {
                margin: 0 1rem;
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

        .fade-in {
            animation: fadeInUp 0.6s ease-out;
        }

        /* Loading Spinner */
        .spinner {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: var(--white);
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <nav>
            <div class="logo">
                <i class="fas fa-sparkles"></i> housekeepPlus+
            </div>
            <div class="nav-links" id="navLinks">
                <a href="index.php">Home</a>
                  <a href="about.php">About</a>
                <a href="All-servic.php">All Services</a>
                <!-- <a href="#testimonials">Reviews</a> -->
                <a href="contact.php">Contact</a>
                <button class="cta-button" onclick="openBooking()">Get Started</button>
            </div>
            <div class="mobile-menu" onclick="toggleMenu()">
                <i class="fas fa-bars"></i>
            </div>
        </nav>
    </header>

    <!-- 1 sec processing of loading -->
<!-- 
    <a href="home.php" id="homeLink">Home</a> -->

<script>
document.getElementById('homeLink').addEventListener('click', function(event) {
  event.preventDefault(); // page ko turant reload hone se roko
  
  // Show loading spinner ya koi visual effect
  this.textContent = 'Loading...';  // simple text change, aap animation bhi kar sakte ho

  // Thodi der rukne ke baad page redirect karo
  setTimeout(() => {
    window.location.href = this.href;
  }, 1000); // 1 second delay for loading effect
});
</script>


    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <div class="hero-text fade-in">
                <h1>Professional Housekeeping Services That Sparkle</h1>
                <p>Transform your home with our expert cleaning services. Trusted by thousands of happy customers, we bring the shine back to your space.</p>
                <div class="hero-buttons">
                    <button class="cta-button" onclick="openBooking()">Book Your Clean</button>
                    <button class="secondary-button" onclick="scrollToSection('services')">View Services</button>
                </div>
            </div>
            <div class="hero-image">
                   <!-- <img src="man-fixing-motorcycle-modern-workshop.jpg"width="60%" margin-left="30%" alt=""> -->
                <div class="hero-card fade-in">
                    <!-- <h3>Instant Quote</h3> -->
                    <img src="man-fixing-motorcycle-modern-workshop.jpg"width="103%" height="90%" alt="">
                    <!-- <form id="quickQuote" onsubmit="getQuote(event)">
                        <div class="form-group">
                            <label>Property Size</label>
                            <select id="propertySize" required>
                                <option value="">Select size</option>
                                <option value="studio">Studio</option>
                                <option value="1bed">1 Bedroom</option>
                                <option value="2bed">2 Bedrooms</option>
                                <option value="3bed">3 Bedrooms</option>
                                <option value="4bed+">4+ Bedrooms</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Service Type</label>
                            <select id="serviceType" required>
                                <option value="">Select service</option>
                                <option value="standard">Standard Clean</option>
                                <option value="deep">Deep Clean</option>
                                <option value="movein">Move-in/out</option>
                            </select>
                        </div>
                        <button type="submit" class="cta-button" style="width: 100%;">Get Quote</button>
                        <div id="quoteResult" style="margin-top: 1rem; font-weight: bold; display: none;"></div>
                    </form> -->
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services" id="services">
        <div class="section-header">
            <h2>Our Premium Services</h2>
            <p>Choose from our comprehensive range of professional cleaning services tailored to your needs</p>
        </div>
        <div class="services-grid">
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-home"></i>
                </div>
                <h3>Standard Cleaning</h3>
                <p>Perfect for regular maintenance. Includes dusting, vacuuming, mopping, and bathroom sanitization.</p>
                <div class="price">From ₹800</div>
                <button class="cta-button" onclick="selectService('standard')">Book Now</button>
            </div>
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-broom"></i>
                </div>
                <h3>Deep Cleaning</h3>
                <p>Intensive cleaning for every corner. Includes inside appliances, baseboards, and detailed sanitization.</p>
                <div class="price">From ₹1,500</div>
                <button class="cta-button" onclick="selectService('deep')">Book Now</button>
            </div>
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-boxes"></i>
                </div>
                <h3>Move-in/out Clean</h3>
                <p>Comprehensive cleaning for empty properties. Perfect for new moves or end of lease requirements.</p>
                <div class="price">From ₹2,500</div>
                <button class="cta-button" onclick="selectService('movein')">Book Now</button>
            </div>
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-couch"></i>
                </div>
                <h3>Upholstery Cleaning</h3>
                <p>Professional cleaning for sofas, chairs, and mattresses. Removes stains and allergens effectively.</p>
                <div class="price">From 500/item</div>
                <button class="cta-button" onclick="selectService('upholstery')">Book Now</button>
            </div>
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-window-maximize"></i>
                </div>
                <h3>Window Cleaning</h3>
                <p>Streak-free cleaning for all windows, frames, and sills. Interior and exterior options available.</p>
                <div class="price">From ₹300</div>
                <button class="cta-button" onclick="selectService('windows')">Book Now</button>
            </div>
            <div class="service-card">
                <div class="service-icon">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <h3>Recurring Service</h3>
                <p>Weekly, bi-weekly, or monthly cleaning plans. Save 15% with regular bookings and enjoy consistent service.</p>
                <div class="price">Save 15%</div>
                <button class="cta-button" onclick="selectService('recurring')">Subscribe</button>
            </div>
        </div>
    </section>

    <!-- Booking Section -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<style>
    :root {
        --primary: #4f46e5;
        --primary-hover: #4338ca;
        --bg-light: #f8fafc;
        --text-main: #1e293b;
        --text-muted: #64748b;
        --white: #ffffff;
    }

    .booking-wrapper {
        font-family: 'Plus Jakarta Sans', sans-serif;
        padding: 20px;
        background: var(--bg-light);
        display: flex;
        justify-content: center;
    }

    .booking-form {
        width: 100%;
        max-width: 700px;
        background: var(--white);
        padding: 40px;
        border-radius: 24px;
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        border: 1px solid #f1f5f9;
    }

    .form-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .form-header h2 {
        font-size: 1.8rem;
        font-weight: 800;
        color: var(--text-main);
        margin-bottom: 8px;
    }

    .form-header p {
        color: var(--text-muted);
        font-size: 0.95rem;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-bottom: 20px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
        margin-bottom: 20px;
    }

    .form-group label {
        font-weight: 600;
        font-size: 0.85rem;
        margin-bottom: 8px;
        color: var(--text-main);
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .form-group input, 
    .form-group select, 
    .form-group textarea {
        padding: 12px 16px;
        border: 1.5px solid #e2e8f0;
        border-radius: 12px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: #fcfcfd;
    }

    .form-group input:focus, 
    .form-group select:focus, 
    .form-group textarea:focus {
        border-color: var(--primary);
        outline: none;
        box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
        background: var(--white);
    }

    /* 📍 Location Button */
    .loc-btn {
        background: #f5f3ff !important;
        color: var(--primary) !important;
        border: 1.5px dashed #c4b5fd !important;
        padding: 14px !important;
        border-radius: 12px !important;
        font-weight: 700 !important;
        transition: all 0.3s ease !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        gap: 10px !important;
        font-size: 0.9rem !important;
    }

    .loc-btn:hover {
        background: #ede9fe !important;
        border-color: var(--primary) !important;
    }

    #map {
        height: 220px;
        width: 100%;
        border-radius: 16px;
        margin-top: 15px;
        border: 1px solid #e2e8f0;
        display: none;
        z-index: 1;
    }

    /* 💰 Price Display */
    .price-card {
        background: linear-gradient(to right, #4f46e5, #6366f1);
        padding: 20px;
        border-radius: 16px;
        color: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 25px 0;
    }

    .price-label {
        font-size: 0.8rem;
        font-weight: 600;
        opacity: 0.9;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    #displayPrice {
        font-size: 1.8rem;
        font-weight: 800;
    }

    /* 🚀 Submit Button */
    .cta-button {
        background: var(--primary);
        color: white;
        padding: 16px;
        border: none;
        border-radius: 14px;
        font-size: 1.1rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 10px 15px -3px rgba(79, 70, 229, 0.3);
    }

    .cta-button:hover {
        background: var(--primary-hover);
        transform: translateY(-2px);
        box-shadow: 0 20px 25px -5px rgba(79, 70, 229, 0.4);
    }

    /* Responsive */
    @media (max-width: 600px) {
        .form-row { grid-template-columns: 1fr; gap: 0; }
        .booking-form { padding: 25px; margin: 10px; }
        .cta-button { font-size: 1rem; }
    }
</style>

<div class="booking-wrapper">
    <form class="booking-form" id="bookingForm" action="houskeeping-booking.php" method="POST">
        <div class="form-header">
            <h2>Housekeeping Booking</h2>
            <p>Experience a spotless home with our expert cleaners</p>
        </div>

        <input type="hidden" name="total_price" id="finalPriceInput">
        <input type="hidden" name="latitude" id="lat">
        <input type="hidden" name="longitude" id="lon">

        <div class="form-row">
            <div class="form-group">
                <label>First Name *</label>
                <input type="text" name="first_name" placeholder="First name" required>
            </div>
            <div class="form-group">
                <label>Last Name *</label>
                <input type="text" name="last_name" placeholder="Last name" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Email Address *</label>
                <input type="email" name="email" placeholder="hello@example.com" required>
            </div>
            <div class="form-group">
                <label>Phone Number *</label>
                <input type="tel" name="phone" placeholder="+91 00000 00000" required>
            </div>
        </div>

        <div class="form-group">
            <button type="button" onclick="getLocation()" class="loc-btn">
                <i class="fa-solid fa-location-crosshairs"></i> Use Live Location
            </button>
            <p id="locStatus" style="text-align: center; margin-top: 8px; font-size: 0.8rem; color: var(--primary); font-weight: 600;"></p>
            <div id="map"></div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Service Type *</label>
                <select name="service_type" id="houseService" onchange="calculateHousekeepingPrice()" required>
                    <option value="" data-price="0">Select service</option>
                    <option value="Standard" data-price="1000">Standard Cleaning (₹1000)</option>
                    <option value="Deep" data-price="2500">Deep Cleaning (₹2500)</option>
                    <option value="Move-in" data-price="4000">Move-in/out (₹4000)</option>
                </select>
            </div>
            <div class="form-group">
                <label>Property Size *</label>
                <select name="property_size" id="propSize" onchange="calculateHousekeepingPrice()" required>
                    <option value="1" data-multiplier="1">Studio / 1 BHK</option>
                    <option value="1.5" data-multiplier="1.5">2 BHK</option>
                    <option value="2" data-multiplier="2">3 BHK</option>
                    <option value="3" data-multiplier="3">4+ BHK / Villa</option>
                </select>
            </div>
        </div>

        <div class="price-card">
            <div class="price-info">
                <div class="price-label">Estimated Price</div>
                <div id="displayPrice">₹0</div>
            </div>
            <div class="price-icon" style="font-size: 2rem; opacity: 0.5;"><i class="fa-solid fa-receipt"></i></div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Preferred Date *</label>
                <input type="date" name="booking_date" required>
            </div>
            <div class="form-group">
                <label>Preferred Time *</label>
                <select name="booking_time" required>
                    <option value="09:00">09:00 AM</option>
                    <option value="12:00">12:00 PM</option>
                    <option value="15:00">03:00 PM</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label>Service Address *</label>
            <input type="text" name="address" id="addressField" placeholder="House No, Area, Landmark" required>
        </div>

        <div class="form-group">
            <label>Special Instructions</label>
            <textarea name="special_notes" rows="3" placeholder="Any specific requirements..."></textarea>
        </div>

        <button type="submit" name="submit_booking" class="cta-button">
            Confirm Booking & Pay
        </button>
    </form>
</div>

<script>
    let map;
    function getLocation() {
        const status = document.getElementById('locStatus');
        const mapDiv = document.getElementById('map');
        if (navigator.geolocation) {
            status.innerText = "Capturing location...";
            navigator.geolocation.getCurrentPosition(function(position) {
                const lat = position.coords.latitude;
                const lon = position.coords.longitude;
                document.getElementById('lat').value = lat;
                document.getElementById('lon').value = lon;
                status.innerText = "📍 Location Verified!";
                mapDiv.style.display = "block";
                if (!map) {
                    map = L.map('map').setView([lat, lon], 16);
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
                    L.marker([lat, lon]).addTo(map);
                } else {
                    map.setView([lat, lon], 16);
                }
                setTimeout(() => { map.invalidateSize(); }, 200);
            }, function() { alert("Enable GPS to use this feature."); });
        }
    }

    function calculateHousekeepingPrice() {
        const service = document.getElementById('houseService');
        const size = document.getElementById('propSize');
        const basePrice = parseFloat(service.options[service.selectedIndex].getAttribute('data-price')) || 0;
        const multiplier = parseFloat(size.options[size.selectedIndex].getAttribute('data-multiplier')) || 1;
        const finalTotal = basePrice * multiplier;
        document.getElementById('displayPrice').innerText = "₹" + finalTotal;
        document.getElementById('finalPriceInput').value = finalTotal;
    }
</script>




    <!-- Testimonials -->
    <section class="testimonials" id="testimonials">
        <div class="section-header">
            <h2>What Our Customers Say</h2>
            <p>Over 5,000 happy homes and counting</p>
        </div>
        <div class="testimonials-grid">
            <div class="testimonial-card">
                <div class="stars">★★★★★</div>
                <p class="testimonial-text">"Absolutely amazing service! My apartment has never looked this clean. The team was professional, punctual, and incredibly thorough. I've already booked my next cleaning!"</p>
                <p class="testimonial-author">- Sarah M.</p>
            </div>
            <div class="testimonial-card">
                <div class="stars">★★★★★</div>
                <p class="testimonial-text">"ServiPlus saved me during my move-out. They made my old place look brand new and helped me get my full deposit back. Worth every penny!"</p>
                <p class="testimonial-author">- Michael R.</p>
            </div>
            <div class="testimonial-card">
                <div class="stars">★★★★★</div>
                <p class="testimonial-text">"I've tried many cleaning services, but ServiPlus is by far the best. Their attention to detail is incredible, and their online booking system makes everything so easy."</p>
                <p class="testimonial-author">- Emily K.</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>ServiPlus+</h3>
                <p>Professional housekeeping services that bring the sparkle back to your home. Trusted, insured, and guaranteed.</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="footer-section">
                <h3>Services</h3>
                <a href="#services">Standard Cleaning</a>
                <a href="#services">Deep Cleaning</a>
                <a href="#services">Move-in/out</a>
                <a href="#services">Upholstery</a>
                <a href="#services">Window Cleaning</a>
            </div>
            <div class="footer-section">
                <h3>Company</h3>
                <a href="#">About Us</a>
                <a href="#">Our Team</a>
                <a href="#">Careers</a>
                <a href="#">Blog</a>
                <a href="#">Contact Us</a>
            </div>
            <div class="footer-section" id="contact">
                <h3>Contact Info</h3>
                <p><i class="fas fa-phone"></i> 1800-XX-0000</p>
                <p><i class="fas fa-envelope"></i> hello@Servi+clean.com</p>
                <p><i class="fas fa-map-marker-alt"></i> Serving All Areas</p>
                <p><i class="fas fa-clock"></i> 7 Days a Week, 8AM-6PM</p>
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
            }, 10000); 
        }
    </script>
    <!--  -->
<!-- 
    <script>
        // Set minimum date to today
        document.getElementById('date').min = new Date().toISOString().split('T')[0];

        // Mobile menu toggle
        function toggleMenu() {
            const navLinks = document.getElementById('navLinks');
            navLinks.classList.toggle('active');
        }

        // Smooth scrolling
        function scrollToSection(sectionId) {
            document.getElementById(sectionId).scrollIntoView({ behavior: 'smooth' });
        }

        // Open booking section
        function openBooking() {
            scrollToSection('booking');
        }

        // Select service and scroll to booking
        // function selectService(serviceType) {
        //     document.getElementById('service').value = serviceType;
        //     updatePrice();
        //     scrollToSection('booking');
        // }

    

        // Quick quote
        function getQuote(event) {
            event.preventDefault();
            const propertySize = document.getElementById('propertySize').value;
            const serviceType = document.getElementById('serviceType').value;
            
            if (propertySize && serviceType) {
                const price = basePrices[serviceType][propertySize];
                document.getElementById('quoteResult').textContent = `Estimated Price: $${price}`;
                document.getElementById('quoteResult').style.display = 'block';
                document.getElementById('quoteResult').style.color = '#10b981';
                
                setTimeout(() => {
                    document.getElementById('quickQuote').reset();
                    document.getElementById('quoteResult').style.display = 'none';
                }, 5000);
            }
        }

        // gpt chat 

        function submitBooking(event) {
    event.preventDefault();

    const submitBtn = document.querySelector('#bookingForm .cta-button');
    const submitText = document.getElementById('submitText');
    const submitSpinner = document.getElementById('submitSpinner');
    const bookingMessage = document.getElementById('bookingMessage');

    // Show loading state
    submitBtn.disabled = true;
    submitText.style.display = 'none';
    submitSpinner.style.display = 'inline-block';

    // Prepare data
    const data = {
        firstName: document.getElementById("firstName").value,
        lastName: document.getElementById("lastName").value,
        email: document.getElementById("email").value,
        phone: document.getElementById("phone").value,
        service: document.getElementById("service").value,
        propertySize: document.getElementById("propertySizeBooking").value,
        date: document.getElementById("date").value,
        time: document.getElementById("time").value,
        address: document.getElementById("address").value,
        notes: document.getElementById("notes").value,
        estimatedPrice: document.getElementById("estimatedPrice").textContent
    };

    // Send to PHP backend
    fetch('booking-handler.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(result => {
        if (result.status === 'success') {
            bookingMessage.textContent = result.message;
            bookingMessage.style.backgroundColor = '#10b981';
            bookingMessage.style.color = 'white';
        } else {
            bookingMessage.textContent = result.message;
            bookingMessage.style.backgroundColor = '#ef4444';
            bookingMessage.style.color = 'white';
        }

        bookingMessage.style.display = 'block';
        document.getElementById('bookingForm').reset();
        document.getElementById('estimatedPrice').textContent = '$0';

        setTimeout(() => {
            bookingMessage.style.display = 'none';
        }, 5000);

        window.scrollTo({ top: 0, behavior: 'smooth' });
    })
    .catch(error => {
        bookingMessage.textContent = 'Error! Please try again.';
        bookingMessage.style.backgroundColor = '#ef4444';
        bookingMessage.style.color = 'white';
        bookingMessage.style.display = 'block';
    })
    .finally(() => {
        submitBtn.disabled = false;
        submitText.style.display = 'inline';
        submitSpinner.style.display = 'none';
    });
}


        // Booking submission
        // function submitBooking(event) {
            // event.preventDefault();
            
            // const submitBtn = document.querySelector('#bookingForm .cta-button');
            // const submitText = document.getElementById('submitText');
            // const submitSpinner = document.getElementById('submitSpinner');
            // const bookingMessage = document.getElementById('bookingMessage');
            
            // Show loading state
            // submitBtn.disabled = true;
            // submitText.style.display = 'none';
            // submitSpinner.style.display = 'inline-block';
            
            // Simulate API call
        //     setTimeout(() => {
        //         // Hide loading state
        //         submitBtn.disabled = false;
        //         submitText.style.display = 'inline';
        //         submitSpinner.style.display = 'none';
                
        //         // Show success message
        //         bookingMessage.textContent = 'Booking confirmed! We\'ll contact you shortly to finalize details.';
        //         bookingMessage.style.backgroundColor = '#10b981';
        //         bookingMessage.style.color = 'white';
        //         bookingMessage.style.display = 'block';
                
        //         // Reset form
        //         document.getElementById('bookingForm').reset();
        //         document.getElementById('estimatedPrice').textContent = '$0';
                
        //         // Hide message after 5 seconds
        //         // setTimeout(() => {
        //         //     bookingMessage.style.display = 'none';
        //         // }, 5000);
                
        //         // Scroll to top
        //         window.scrollTo({ top: 0, behavior: 'smooth' });
        //     }, 2000);
        // }

        // Intersection Observer for animations
        // const observerOptions = {
        //     threshold: 0.1,
        //     rootMargin: '0px 0px -50px 0px'
        // };

        // const observer = new IntersectionObserver((entries) => {
        //     entries.forEach(entry => {
        //         if (entry.isIntersecting) {
        //             entry.target.classList.add('fade-in');
        //         }
        //     });
        // }, observerOptions);

        // Observe all service cards and testimonial cards
        document.querySelectorAll('.service-card, .testimonial-card').forEach(card => {
            observer.observe(card);
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', (e) => {
            const navLinks = document.getElementById('navLinks');
            const mobileMenu = document.querySelector('.mobile-menu');
            
            if (!navLinks.contains(e.target) && !mobileMenu.contains(e.target)) {
                navLinks.classList.remove('active');
            }
        });

        // Header scroll effect
        window.addEventListener('scroll', () => {
            const header = document.querySelector('header');
            if (window.scrollY > 100) {
                header.style.boxShadow = '0 4px 20px rgba(0,0,0,0.1)';
            } else {
                header.style.boxShadow = '0 4px 6px -1px rgba(0, 0, 0, 0.1)';
            }
        });
    </script> -->

    <script>
    // Set minimum date to today
    document.getElementById('date').min = new Date().toISOString().split('T')[0];

    // Mobile menu toggle
    function toggleMenu() {
        const navLinks = document.getElementById('navLinks');
        navLinks.classList.toggle('active');
    }

    // Smooth scrolling
    function scrollToSection(sectionId) {
        document.getElementById(sectionId).scrollIntoView({ behavior: 'smooth' });
    }

    // Open booking section
    function openBooking() {
        scrollToSection('booking');
    }

    // Quick quote
    function getQuote(event) {
        event.preventDefault();
        const propertySize = document.getElementById('propertySize').value;
        const serviceType = document.getElementById('serviceType').value;

        if (propertySize && serviceType) {
            const price = basePrices[serviceType][propertySize];
            document.getElementById('quoteResult').textContent = `Estimated Price: $${price}`;
            document.getElementById('quoteResult').style.display = 'block';
            document.getElementById('quoteResult').style.color = '#10b981';

            setTimeout(() => {
                document.getElementById('quickQuote').reset();
                document.getElementById('quoteResult').style.display = 'none';
            }, 5000);
        }
    }

    // Booking submission (REAL submission to PHP backend)
    function submitBooking(event) {
        event.preventDefault();

        const submitBtn = document.querySelector('#bookingForm .cta-button');
        const submitText = document.getElementById('submitText');
        const submitSpinner = document.getElementById('submitSpinner');
        const bookingMessage = document.getElementById('bookingMessage');

        // Show loading state
        submitBtn.disabled = true;
        submitText.style.display = 'none';
        submitSpinner.style.display = 'inline-block';

        // Prepare data
       const data = {
    firstName: document.getElementById("firstName").value,
    lastName: document.getElementById("lastName").value,
    email: document.getElementById("email").value,
    phone: document.getElementById("phone").value,
    service: document.getElementById("service").value,
    propertySize: document.getElementById("propertySizeBooking").value,
    date: document.getElementById("date").value,
    time: document.getElementById("time").value,
    address: document.getElementById("address").value,
    notes: document.getElementById("notes").value,
    estimatedPrice: document.getElementById("estimatedPrice").textContent
};


        // Send to PHP backend
        fetch('booking-handler.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(result => {
            if (result.status === 'success') {
                bookingMessage.textContent = result.message;
                bookingMessage.style.backgroundColor = '#10b981';
                bookingMessage.style.color = 'white';
            } else {
                bookingMessage.textContent = result.message;
                bookingMessage.style.backgroundColor = '#ef4444';
                bookingMessage.style.color = 'white';
            }

            bookingMessage.style.display = 'block';
            document.getElementById('bookingForm').reset();
            document.getElementById('estimatedPrice').textContent = '$0';

            setTimeout(() => {
                bookingMessage.style.display = 'none';
            }, 5000);

            window.scrollTo({ top: 0, behavior: 'smooth' });
        })
        .catch(error => {
            bookingMessage.textContent = 'Error! Please try again.';
            bookingMessage.style.backgroundColor = '#ef4444';
            bookingMessage.style.color = 'white';
            bookingMessage.style.display = 'block';
        })
        .finally(() => {
            submitBtn.disabled = false;
            submitText.style.display = 'inline';
            submitSpinner.style.display = 'none';
        });
    }

    // Optional: Intersection Observer for animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('fade-in');
            }
        });
    }, observerOptions);

    // Observe all service cards and testimonial cards
    document.querySelectorAll('.service-card, .testimonial-card').forEach(card => {
        observer.observe(card);
    });

    // Close mobile menu when clicking outside
    document.addEventListener('click', (e) => {
        const navLinks = document.getElementById('navLinks');
        const mobileMenu = document.querySelector('.mobile-menu');

        if (!navLinks.contains(e.target) && !mobileMenu.contains(e.target)) {
            navLinks.classList.remove('active');
        }
    });

    // Header scroll effect
    window.addEventListener('scroll', () => {
        const header = document.querySelector('header');
        if (window.scrollY > 100) {
            header.style.boxShadow = '0 4px 20px rgba(0,0,0,0.1)';
        } else {
            header.style.boxShadow = '0 4px 6px -1px rgba(0, 0, 0, 0.1)';
        }
    });
</script>

</body>

</html>