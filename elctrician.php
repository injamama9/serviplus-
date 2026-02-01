<?php
session_start();
$is_logged_in = isset($_SESSION['user_id']);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElectricPlus+</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
         <link rel="shortcut icon"
    href="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/a072d81c-4caa-4407-b72c-27b925d0e3ba.png"
    type="image/x-icon">
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
                <a href="#" class="logo">
                    <i class="fas fa-bolt"></i>
                     ElectricPlus+
                </a>

                <ul class="nav-links">
                    <li><a href="index.php">Home</a></li>
                     <li><a href="about.php">About</a></li>
                    <li><a href="All-servic.php">All Services</a></li>
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
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text animate">
                    <h1>Professional Electrical Services You Can Trust</h1>
                    <p>24/7 emergency electrical services, installations, and repairs by certified electricians. Fast
                        response, quality workmanship, and competitive pricing.</p>

                    <div class="hero-stats">
                        <div class="stat-item">
                            <div class="stat-number">500+</div>
                            <div class="stat-label">Happy Clients</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number">15+</div>
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
                        <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/a072d81c-4caa-4407-b72c-27b925d0e3ba.png"
                            alt="Professional driver in uniform standing next to luxury vehicle with city skyline background"
                            class="rounded-xl w-full h-auto shadow-2xl" />
                    </div>
                    <div class="absolute -bottom-4 -left-4 bg-orange-500 text-white p-4 rounded-xl shadow-lg">
                        <div class="text-2xl font-bold">24/7</div>
                        <div>Available</div>
                    </div>
                </div>
                <!-- <div class="hero-image animate delay-1">
                    <img src="" alt="Professional electrician working on electrical panel with safety equipment" />
                </div> -->
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services">
        <div class="container">
            <div class="section-title animate">
                <h2>Our Electrical Services</h2>
                <p>Comprehensive electrical solutions for residential and commercial properties</p>
            </div>

            <div class="services-grid">
                <div class="service-card animate delay-1">
                    <div class="service-icon">
                        <i class="fas fa-home"></i>
                    </div>
                    <h3>Residential Electrical</h3>
                    <p>Complete home electrical services including wiring, lighting, and panel upgrades.</p>
                    <div class="service-price">₹1,000<small>/hour</small></div>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> Wiring Installation</li>
                        <li><i class="fas fa-check"></i> Lighting Solutions</li>
                        <li><i class="fas fa-check"></i> Panel Upgrades</li>
                        <li><i class="fas fa-check"></i> Safety Inspections</li>
                    </ul>
                </div>

                <div class="service-card animate delay-2">
                    <div class="service-icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <h3>Commercial Electrical</h3>
                    <p>Professional electrical services for businesses and commercial properties.</p>
                    <div class="service-price">₹3,000<small>/hour</small></div>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> Office Wiring</li>
                        <li><i class="fas fa-check"></i> Lighting Systems</li>
                        <li><i class="fas fa-check"></i> Data Cabling</li>
                        <li><i class="fas fa-check"></i> Maintenance</li>
                    </ul>
                </div>

                <div class="service-card animate delay-3">
                    <div class="service-icon">
                        <i class="fas fa-tools"></i>
                    </div>
                    <h3>Emergency Repairs</h3>
                    <p>24/7 emergency electrical repair services for urgent situations.</p>
                    <div class="service-price">₹1,500<small>/hour</small></div>
                    <ul class="service-features">
                        <li><i class="fas fa-check"></i> 24/7 Availability</li>
                        <li><i class="fas fa-check"></i> Quick Response</li>
                        <li><i class="fas fa-check"></i> Fault Finding</li>
                        <li><i class="fas fa-check"></i> Immediate Fixes</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Booking Section -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<style>
    :root {
        --electric-orange: #f97316;
        --electric-hover: #ea580c;
        --dark-blue: #0f172a;
        --gray-text: #ffffff;
        --border-color: #e2e8f0;
    }

    .booking-card {
        font-family: 'Inter', sans-serif;
        max-width: 650px;
        margin: 2rem auto;
        background: #ffffff;
        border-radius: 20px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        overflow: hidden;
        border: 1px solid var(--border-color);
    }

    .booking-header {
        background: var(--dark-blue);
        color: white;
        padding: 1.5rem;
        text-align: center;
    }

    .booking-header h3 {
        margin: 0;
        font-size: 1.5rem;
        font-weight: 700;
        letter-spacing: -0.5px;
    }

    .booking-form {
        padding: 2rem;
    }

    .form-group {
        margin-bottom: 1.25rem;
    }

    .form-group label {
        display: block;
        font-size: 0.875rem;
        font-weight: 600;
        color: var(--dark-blue);
        margin-bottom: 0.5rem;
    }

    .form-group input, 
    .form-group select, 
    .form-group textarea {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1.5px solid var(--border-color);
        border-radius: 10px;
        font-size: 1rem;
        color: var(--dark-blue);
        transition: all 0.3s ease;
        box-sizing: border-box;
    }

    .form-group input:focus, 
    .form-group select:focus {
        outline: none;
        border-color: var(--electric-orange);
        box-shadow: 0 0 0 4px rgba(249, 115, 22, 0.1);
    }

    /* Grid for Desktop, Single Column for Mobile */
    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
    }

    @media (max-width: 600px) {
        .form-row {
            grid-template-columns: 1fr;
        }
    }

    /* Location Button */
    .loc-btn {
        background: #fff7ed;
        color: var(--electric-orange);
        border: 1.5px dashed var(--electric-orange);
        padding: 12px;
        border-radius: 10px;
        font-weight: 700;
        cursor: pointer;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        transition: 0.3s;
    }

    .loc-btn:hover {
        background: #ffedd5;
    }

    #elecMap {
        height: 200px;
        width: 100%;
        border-radius: 12px;
        margin-top: 15px;
        border: 1px solid var(--border-color);
        display: none;
    }

    /* Price Summary Box */
    .price-container {
        background: #fff7ed;
        padding: 1.25rem;
        border-radius: 12px;
        border: 1px solid #ffedd5;
        margin: 1.5rem 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .price-container span:first-child {
        font-size: 0.75rem;
        font-weight: 800;
        color: #9a3412;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .price-value {
        font-size: 1.75rem;
        font-weight: 800;
        color: var(--electric-orange);
    }

    /* Submit Button */
    .form-submit {
        background: var(--electric-orange);
        color: white;
        border: none;
        padding: 1rem;
        width: 100%;
        border-radius: 12px;
        font-size: 1.1rem;
        font-weight: 700;
        cursor: pointer;
        transition: 0.3s ease;
        box-shadow: 0 4px 12px rgba(249, 115, 22, 0.2);
    }

    .form-submit:hover {
        background: var(--electric-hover);
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(249, 115, 22, 0.3);
    }
</style>

<div class="booking-card">
    <div class="booking-header">
        <h3>Schedule Electrician</h3>
    </div>

    <form class="booking-form" id="bookingForm" action="electrician.php" method="POST">
        <input type="hidden" name="total_price" id="finalPriceInput">
        <input type="hidden" name="latitude" id="latInput">
        <input type="hidden" name="longitude" id="lonInput">

        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" required placeholder="Your Name">
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required placeholder="Hello@example.com">
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" required placeholder="10-digit number" pattern="[0-9]{10}">
            </div>
        </div>

        <div class="form-group">
            <button type="button" onclick="getElectricianLocation()" class="loc-btn">
                <i class="fas fa-location-arrow"></i> Detect Current Location
            </button>
            <div id="elecMap"></div>
        </div>

        <div class="form-group">
            <label for="serviceSelect">Service Type</label>
            <select id="serviceSelect" name="service" onchange="updateElectricianPrice()" required>
                <option value="" data-price="0">Select a service</option>
                <option value="residential" data-price="1000">Residential Electrical (₹1,000)</option>
                <option value="commercial" data-price="3000">Commercial Electrical (₹3,000)</option>
                <option value="emergency" data-price="1500">Emergency Repair (₹1,500)</option>
                <option value="installation" data-price="500">Installation (₹500)</option>
                <option value="maintenance" data-price="500">Maintenance (₹500)</option>
            </select>
        </div>

        <div class="price-container">
            <span>Total Estimated Fee</span>
            <div class="price-value" id="elecPriceDisplay">₹0</div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="date">Preferred Date</label>
                <input type="date" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="time">Preferred Time</label>
                <select id="time" name="time" required>
                    <option value="morning">Morning (8AM-12PM)</option>
                    <option value="afternoon">Afternoon (12PM-5PM)</option>
                    <option value="evening">Evening (5PM-9PM)</option>
                    <option value="emergency">EMERGENCY (Now)</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="address">Service Address</label>
            <input type="text" id="address" name="address" required placeholder="Flat No, Building, Landmark">
        </div>

        <div class="form-group">
            <label for="message">Additional Instructions (Optional)</label>
            <textarea id="message" name="message" rows="3" placeholder="Tell us more about the issue..."></textarea>
        </div>

        <button type="submit" class="form-submit">
            Confirm Booking
        </button>
    </form>
</div>

<script>
let elecMap;

function getElectricianLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            const lat = position.coords.latitude;
            const lon = position.coords.longitude;
            document.getElementById('latInput').value = lat;
            document.getElementById('lonInput').value = lon;
            
            const mapDiv = document.getElementById('elecMap');
            mapDiv.style.display = "block";

            if (!elecMap) {
                elecMap = L.map('elecMap').setView([lat, lon], 16);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(elecMap);
                L.marker([lat, lon]).addTo(elecMap).bindPopup("Current Location Captured").openPopup();
            } else {
                elecMap.setView([lat, lon], 16);
            }
            setTimeout(() => { elecMap.invalidateSize(); }, 200);
        });
    }
}

function updateElectricianPrice() {
    const select = document.getElementById('serviceSelect');
    const display = document.getElementById('elecPriceDisplay');
    const hiddenInput = document.getElementById('finalPriceInput');
    const price = select.options[select.selectedIndex].getAttribute('data-price') || 0;
    display.innerText = "₹" + price;
    hiddenInput.value = price;
}
</script>

    <!-- Testimonials -->
    <section class="testimonials">
        <div class="container">
            <div class="section-title">
                <h2>What Our Clients Say</h2>
                <p>Trusted by homeowners and businesses across the city</p>
            </div>

            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="testimonial-text">
                        "ServiPlus Electric saved us during an emergency power outage. Their response time was incredible
                        and the service was professional. Highly recommended!"
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">JS</div>
                        <div class="author-info">
                            <h4>John Smith</h4>
                            <p>Homeowner</p>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-text">
                        "We've been using ProSpark for our office electrical needs for years. Their commercial services
                        are top-notch and always on time."
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">SD</div>
                        <div class="author-info">
                            <h4>Sarah Davis</h4>
                            <p>Office Manager</p>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="testimonial-text">
                        "The pricing was transparent, the work was quality, and the electricians were polite and
                        professional. Will definitely use them again."
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">MJ</div>
                        <div class="author-info">
                            <h4>Mike Johnson</h4>
                            <p>Restaurant Owner</p>
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
                    <h3>ElectricPlus+</h3>
                    <p>Professional electrical services with 1+ years of experience. Licensed, insured, and committed
                        to excellence.</p>
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
                        <li>Our Services
                        <li>Pricing
                        <li>Book Online
                        <li>About Us
                      <li>Contact
                    </ul>
                </div>

                <div class="footer-col">
                    <h3>Services</h3>
                    <ul class="footer-links">
                        <li>Residential Electrical</li>
                        <li>Commercial Electrical</li>
                        <li>Emergency Repairs</li>
                        <li>Lighting Installation</li>
                        <li>Electrical Inspections</li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h3>Contact Info</h3>
                    <ul class="contact-info">
                        <li>
                            <i class="fas fa-map-marker-alt"></i>
                            <span>123 Electric Avenue, City, State 12345</span>
                        </li>
                        <li>
                            <i class="fas fa-phone"></i>
                            <span>1800-XX-0000</span>
                        </li>
                        <li>
                            <i class="fas fa-envelope"></i>
                            <span>Servi@electric.com</span>
                        </li>
                        <li>
                            <i class="fas fa-clock"></i>
                            <span>24/7 Emergency Service Available</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <p>© 2026 ElectricPlus+. All rights reserved. | designed by BCA injamam</p>
            </div>
        </div>
    </footer>

<script>
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
        

           
       

        
        
    });
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
<!-- login page  -->

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
</body>
</html>