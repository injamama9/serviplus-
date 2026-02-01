<?php
session_start();
$is_logged_in = isset($_SESSION['user_id']);
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driveplus</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
        <link rel="shortcut icon" href="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/32c54557-be98-48f3-bc09-38ddb9b60403.png" type="image/x-icon">
    <style>
        :root {
            --primary: #10b981;
            --secondary: #f59e0b;
            --dark: #1f2937;
            --light: #f9fafb;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
            min-height: 100vh;
        }

        .hero-gradient {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
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
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(16, 185, 129, 0.3);
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
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
        }

        .driver-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .mobile-menu {
            display: none;
        }

        .mobile-menu.active {
            display: flex;
            flex-direction: column;
            align-items: center;
            animation: slideDown 0.3s ease-in-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body class="min-h-screen">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg fixed w-full top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">

                <!-- Logo -->
                <div class="flex items-center">
                    <div
                        class="w-10 h-10 bg-green-600 rounded-lg flex items-center justify-center text-white font-bold text-xl">
                        D</div>
                    <span class="ml-2 text-xl font-bold text-gray-800">DrivPlus</span>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="index.php" class="text-gray-600 hover:text-green-600 transition-colors">Home</a>
                    <a href="about.php" class="text-gray-600 hover:text-green-600 transition-colors">About</a>
                    <a href="All-servic.php"
                        class="text-gray-600 hover:text-green-600 transition-colors">Services</a>
                    <a href="#booking" class="text-gray-600 hover:text-green-600 transition-colors">Book Now</a>
                    <a href="contact.php" class="text-gray-600 hover:text-green-600 transition-colors">Contact</a>
                </div>

                <!-- Hamburger Button -->
                <div class="md:hidden flex items-center">
                    <button id="menu-btn" class="text-gray-600 focus:outline-none">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- ✅ Mobile Menu -->
        <div id="mobile-menu" class="mobile-menu md:hidden bg-white border-t border-gray-200 shadow-lg py-4 space-y-4">
            <a href="index.php" class="text-gray-700 hover:text-green-600">Home</a>
            <a href="about.php" class="text-gray-700 hover:text-green-600">About</a>
            <a href="All-servic.php" class="text-gray-700 hover:text-green-600">Servics</a>
             
            <a href="#pricing" class="text-gray-700 hover:text-green-600">Pricing</a>
            <a href="#drivers" class="text-gray-700 hover:text-green-600">Our Drivers</a>
            <a href="#booking" class="text-gray-700 hover:text-green-600">Book Now</a>
            <a href="contact.php" class="text-gray-700 hover:text-green-600">Contact</a>
        </div>
    </nav>
    <!-- <nav class="bg-white shadow-lg fixed w-full top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <div
                            class="w-10 h-10 bg-green-600 rounded-lg flex items-center justify-center text-white font-bold text-xl">
                            D</div>
                        <span class="ml-2 text-xl font-bold text-gray-800">DriveEase</span>
                    </div>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#services" class="text-gray-600 hover:text-green-600 transition-colors">Services</a>
                    <a href="#pricing" class="text-gray-600 hover:text-green-600 transition-colors">Pricing</a>
                    <a href="#drivers" class="text-gray-600 hover:text-green-600 transition-colors">Our Drivers</a>
                    <a href="#booking" class="text-gray-600 hover:text-green-600 transition-colors">Book Now</a>
                    <a href="#contact" class="text-gray-600 hover:text-green-600 transition-colors">Contact</a>
                </div>
                <div class="md:hidden flex items-center">
                    <button class="text-gray-600">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav> -->

    <!-- Hero Section -->
    <section class="hero-gradient text-white pt-24 pb-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
                        Professional Driver <br>Booking Service
                    </h1>
                    <p class="text-xl mb-8 text-green-100">
                        Book certified professional drivers for any occasion. Safe, reliable, and available 24/7 for all
                        your transportation needs.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <button onclick="scrollToBooking()"
                            class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-4 rounded-full font-semibold text-lg transition-colors">
                            Book Driver Now
                        </button>
                        <button onclick="scrollToSection('services')"
                            class="border-2 border-white text-white px-8 py-4 rounded-full font-semibold text-lg hover:bg-white hover:text-green-600 transition-colors">
                            View Services
                        </button>
                    </div>
                </div>

                <!-- <button onclick="scrollToBooking()"
                    class="w-full bg-green-600 text-white py-3 rounded-lg font-semibold hover:bg-green-700 transition-colors">
                    Select Plan
                </button> -->

                <div class="relative">
                    <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                        <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/32c54557-be98-48f3-bc09-38ddb9b60403.png"
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

    <!-- Stats Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div>
                    <div class="text-3xl md:text-4xl font-bold text-green-600 mb-2">100+</div>
                    <div class="text-gray-600">Happy Clients</div>
                </div>
                <div>
                    <div class="text-3xl md:text-4xl font-bold text-green-600 mb-2">50+</div>
                    <div class="text-gray-600">Certified Drivers</div>
                </div>
                <div>
                    <div class="text-3xl md:text-4xl font-bold text-green-600 mb-2">15min</div>
                    <div class="text-gray-600">Average Response</div>
                </div>
                <div>
                    <div class="text-3xl md:text-4xl font-bold text-green-600 mb-2">4.9★</div>
                    <div class="text-gray-600">Customer Rating</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Our Driver Services</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Professional driver services for every occasion, available
                    whenever you need them.</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Service 1 -->
                <div class="service-card bg-white rounded-xl p-6 shadow-lg border border-gray-100">
                    <div class="feature-icon">
                        <i class="fas fa-car text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Corporate Driving</h3>
                    <p class="text-gray-600 mb-4">Professional drivers for business meetings, airport transfers, and
                        corporate events.</p>
                    <div class="text-2xl font-bold text-green-600">From ₹999/hr</div>
                </div>

                <!-- Service 2 -->
                <div class="service-card bg-white rounded-xl p-6 shadow-lg border border-gray-100">
                    <div class="feature-icon">
                        <i class="fas fa-glass-cheers text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Event Driving</h3>
                    <p class="text-gray-600 mb-4">Safe transportation for weddings, parties, and special occasions with
                        luxury vehicles.</p>
                    <div class="text-2xl font-bold text-green-600">From ₹1499/hr</div>
                </div>

                <!-- Service 3 -->
                <div class="service-card bg-white rounded-xl p-6 shadow-lg border border-gray-100">
                    <div class="feature-icon">
                        <i class="fas fa-plane text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Airport Service</h3>
                    <p class="text-gray-600 mb-4">Reliable airport pickups and drop-offs with flight monitoring and
                        waiting time.</p>
                    <div class="text-2xl font-bold text-green-600">From ₹1799/trip</div>
                </div>

                <!-- Service 4 -->
                <div class="service-card bg-white rounded-xl p-6 shadow-lg border border-gray-100">
                    <div class="feature-icon">
                        <i class="fas fa-briefcase text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Executive Service</h3>
                    <p class="text-gray-600 mb-4">Premium service for executives with luxury vehicles and personalized
                        attention.</p>
                    <div class="text-2xl font-bold text-green-600">From 1099/hr</div>
                </div>

                <!-- Service 5 -->
                <div class="service-card bg-white rounded-xl p-6 shadow-lg border border-gray-100">
                    <div class="feature-icon">
                        <i class="fas fa-calendar text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Daily Commute</h3>
                    <p class="text-gray-600 mb-4">Regular commute service for work, school, or daily appointments with
                        trusted drivers.</p>
                    <div class="text-2xl font-bold text-green-600">From ₹799/hr</div>
                </div>

                <!-- Service 6 -->
                <div class="service-card bg-white rounded-xl p-6 shadow-lg border border-gray-100">
                    <div class="feature-icon">
                        <i class="fas fa-star text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">VIP Service</h3>
                    <p class="text-gray-600 mb-4">Exclusive VIP treatment with premium vehicles and highly experienced
                        drivers.</p>
                    <div class="text-2xl font-bold text-green-600">From 2499/hr</div>
                </div>
            </div>
        </div>
    </section>

    <!-- bokking section -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<section style="padding: 60px 20px; background-color: #f8fafc; font-family: 'Poppins', sans-serif;">
    <style>
        .booking-container { max-width: 900px; margin: 0 auto; background: #2563eb; border-radius: 20px; padding: 40px; box-shadow: 0 20px 40px rgba(37, 99, 235, 0.2); color: #fff; }
        .booking-container h2 { text-align: center; font-size: 2.2rem; font-weight: 800; margin-bottom: 5px; }
        .booking-container p { text-align: center; color: #bfdbfe; margin-bottom: 30px; }
        .booking-form { display: flex; flex-direction: column; gap: 20px; }
        .booking-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; }
        .booking-group { display: flex; flex-direction: column; }
        .booking-group label { margin-bottom: 8px; font-weight: 500; font-size: 0.9rem; color: #dbeafe; }
        .booking-group input, .booking-group select, .booking-group textarea { padding: 14px; border: none; border-radius: 12px; font-size: 1rem; color: #1e293b; outline: none; }
        .loc-btn { background: #fbbf24; color: #92400e; border: none; padding: 12px; border-radius: 10px; font-weight: 700; cursor: pointer; margin-bottom: 10px; display: flex; align-items: center; justify-content: center; gap: 8px; }
        #driverMap { height: 180px; border-radius: 12px; display: none; margin-bottom: 15px; border: 2px solid #fff; }
        .price-display { background: rgba(255, 255, 255, 0.1); padding: 20px; border-radius: 15px; display: flex; justify-content: space-between; align-items: center; border: 1px dashed #60a5fa; }
        .price-display span { font-size: 1.5rem; font-weight: 800; }
        .booking-submit { padding: 16px; background-color: #fbbf24; color: #92400e; border: none; border-radius: 12px; font-size: 1.2rem; font-weight: 800; cursor: pointer; transition: 0.3s; }
        .booking-submit:hover { background-color: #f59e0b; transform: translateY(-2px); }
        @media (max-width: 768px) { .booking-grid { grid-template-columns: 1fr; } }
    </style>

    <div class="booking-container">
        <h2>Book Your Driver</h2>
        <p>Instant confirmation for professional chauffeurs</p>

        <form class="booking-form" method="post" action="driver-booking.php">
            <input type="hidden" name="total_price" id="driverPriceInput" value="0">
            <input type="hidden" name="latitude" id="driverLat">
            <input type="hidden" name="longitude" id="driverLon">

            <div class="booking-grid">
                <div class="booking-group">
                    <label>Full Name</label>
                    <input type="text" name="name" placeholder="Name" required>
                </div>
                <div class="booking-group">
                    <label>Email Address</label>
                    <input type="email" name="email" placeholder="example@mail.com" required>
                </div>
            </div>

            <div class="booking-grid">
                <div class="booking-group">
                    <label>Phone Number</label>
                    <input type="tel" name="phone" placeholder="10-digit number" pattern="[0-9]{10}" required>
                </div>
                <div class="booking-group">
                    <label>Vehicle Model</label>
                    <input type="text" name="bike" placeholder="Tata,Maruti Suzuki Swift,Baleno." required>
                </div>
            </div>

            <div class="booking-group">
                <button type="button" class="loc-btn" onclick="getDriverLocation()">
                    <i class="fas fa-map-marker-alt"></i> Auto-Detect Pickup Location
                </button>
                <div id="driverMap"></div>
            </div>

            <div class="booking-grid">
                <div class="booking-group">
                    <label>Service Type</label>
                    <select id="driverService" name="service" onchange="calcDriverPrice()" required>
                        <option value="" data-price="0">Choose Service</option>
                        <option value="Daily" data-price="799">Daily Commute (₹799)</option>
                        <option value="Corporate" data-price="999">Corporate (₹999)</option>
                        <option value="Event" data-price="1499">Event Driving (₹1499)</option>
                        <option value="Airport" data-price="1799">Airport Trip (₹1799)</option>
                        <option value="VIP" data-price="2499">VIP Service (₹2499)</option>
                    </select>
                </div>
                <div class="booking-group">
                    <label>Pickup Date</label>
                    <input type="date" name="pickup_date" required>
                </div>
            </div>

            <div class="booking-grid">
                <div class="booking-group">
                    <label>Pickup Time</label>
                    <input type="time" name="pickup_time" required>
                </div>
                <div class="booking-group">
                    <label>Pickup Address</label>
                    <input type="text" name="full_address" placeholder="Street, Landmark, City" required>
                </div>
            </div>

            <div class="price-display">
                <label>Estimated Total</label>
                <span id="showDriverPrice">₹0</span>
            </div>

            <button type="submit" class="booking-submit">Confirm Driver Booking</button>
        </form>
    </div>
</section>

<script>
let dMap;
function getDriverLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            const lat = position.coords.latitude;
            const lon = position.coords.longitude;
            document.getElementById('driverLat').value = lat;
            document.getElementById('driverLon').value = lon;
            const mapDiv = document.getElementById('driverMap');
            mapDiv.style.display = "block";
            if (!dMap) {
                dMap = L.map('driverMap').setView([lat, lon], 15);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(dMap);
                L.marker([lat, lon]).addTo(dMap);
            }
        });
    }
}
function calcDriverPrice() {
    const sel = document.getElementById('driverService');
    const price = sel.options[sel.selectedIndex].getAttribute('data-price');
    document.getElementById('showDriverPrice').innerText = '₹' + price;
    document.getElementById('driverPriceInput').value = price;
}
</script>

    <!-- Drivers Section -->
    <section id="drivers" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Our Professional Drivers</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Certified, experienced, and background-checked drivers you
                    can trust.</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="driver-card">
                    <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/4c483026-02fd-4882-84b8-3fe211717a3b.png"
                        alt="Professional male driver in uniform with friendly smile and confident posture"
                        class="w-24 h-24 rounded-full mx-auto mb-4" />
                    <h3 class="font-semibold text-lg mb-2">Ronak Kumar</h3>
                    <p class="text-green-600 mb-2">5+ years experience</p>
                    <p class="text-gray-600 text-sm">Specializes in corporate and executive services</p>
                    <div class="flex justify-center mt-3 text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>

                <div class="driver-card">
                    <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/5d208d45-93d1-4cab-a155-64d80d89649d.png"
                        alt="Professional female driver with confident expression and professional attire"
                        class="w-24 h-24 rounded-full mx-auto mb-4" />
                    <h3 class="font-semibold text-lg mb-2">Sarah nair</h3>
                    <p class="text-green-600 mb-2">7+ years experience</p>
                    <p class="text-gray-600 text-sm">Expert in event and VIP transportation</p>
                    <div class="flex justify-center mt-3 text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>

                <div class="driver-card">
                    <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/ad247e52-88a9-4730-a599-1ffa5bb13ca2.png"
                        alt="Experienced male driver with professional appearance and trustworthy demeanor"
                        class="w-24 h-24 rounded-full mx-auto mb-4" />
                    <h3 class="font-semibold text-lg mb-2">David Lala</h3>
                    <p class="text-green-600 mb-2">10+ years experience</p>
                    <p class="text-gray-600 text-sm">Airport specialist with perfect timing</p>
                    <div class="flex justify-center mt-3 text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>

                <div class="driver-card">
                    <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/73b9e1cf-8aad-4167-b26b-7acd19988f8f.png"
                        alt="Professional driver with excellent customer service skills and welcoming smile"
                        class="w-24 h-24 rounded-full mx-auto mb-4" />
                    <h3 class="font-semibold text-lg mb-2">Manish Moin</h3>
                    <p class="text-green-600 mb-2">4+ years experience</p>
                    <p class="text-gray-600 text-sm">Daily commute and family transportation expert</p>
                    <div class="flex justify-center mt-3 text-yellow-400">
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

         


     <!-- Booking Section  -->


    <!-- Footer -->
    <footer id="contact" class="bg-gray-800 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <div
                        class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center text-white font-bold text-xl mb-4">
                        D</div>
                    <p class="text-gray-300 mb-4">Professional driver booking service with 24/7 availability and quality
                        guarantees.</p>
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
                        <li><a href="#services" class="text-gray-300 hover:text-white transition-colors">Services</a>
                        </li>
                        <li><a href="#pricing" class="text-gray-300 hover:text-white transition-colors">Pricing</a></li>
                        <li><a href="#drivers" class="text-gray-300 hover:text-white transition-colors">Our Drivers</a>
                        </li>
                        <li><a href="#booking" class="text-gray-300 hover:text-white transition-colors">Book Now</a>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-4">Services</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Corporate Driving</a>
                        </li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Event Driving</a></li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Airport Service</a>
                        </li>
                        <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Executive Service</a>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-4">Contact Info</h3>
                    <div class="space-y-2 text-gray-300">
                        <div class="flex items-center">
                            <i class="fas fa-map-marker-alt mr-3"></i>
                            <span>123 Drive Street, City Center</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-phone mr-3"></i>
                            <span>1800 XX-0000</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-envelope mr-3"></i>
                            <span>book@driveplus.com</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-clock mr-3"></i>
                            <span>Available 24/7</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>© 2025 Driveplus. All rights reserved. Professional driver booking services. developed by bca injamam</p>
            </div>
        </div>
    </footer>

    <script>
        function scrollToSection(sectionId) {
            document.getElementById(sectionId).scrollIntoView({
                behavior: 'smooth'
            });
        }

        function selectPackage(packageType) {
            scrollToSection('booking-container');
            // You can add package pre-selection logic here
            console.log('Selected package:', packageType);
        }

        document.getElementById('bookingForm').addEventListener('submit', function (e) {
            e.preventDefault();
            alert('Booking request submitted! We will contact you within 15 minutes to confirm your driver.');
            this.reset();
        });

        // Mobile menu toggle
        // document.querySelector('nav button').addEventListener('click', function () {
        //     alert('Mobile menu would open here in a complete implementation');
        // });
    </script>


<!-- login -->


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
<!-- ✅ mobile menu Script -->
<script>
    const menuBtn = document.getElementById('menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIcon = menuBtn.querySelector('i');

    menuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('active');
        // Toggle icon bars <-> X
        if (mobileMenu.classList.contains('active')) {
            menuIcon.classList.remove('fa-bars');
            menuIcon.classList.add('fa-times');
        } else {
            menuIcon.classList.remove('fa-times');
            menuIcon.classList.add('fa-bars');
        }
    });
</script>

</html>