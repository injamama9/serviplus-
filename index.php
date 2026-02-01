<?php
session_start();
$is_logged_in = isset($_SESSION['user_id']);


?>
 
<!-- start main page of serviplus+ -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
  <title>ServiPlus+</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- <link rel="stylesheet" href="style.css"> -->
  <link rel="shortcut icon"
    href="https://img.freepik.com/free-vector/heart-with-settings-cog_78370-6980.jpg?ga=GA1.1.1380887713.1745660169&semt=ais_items_boosted&w=740"
    type="image/x-icon">

     <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <style>
    /* Reset and base */
    *,
    *::before,
    *::after {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    /* Base body styling */
body {
  font-family: 'Georgia', serif;
  background: #f0f4f8;
  color: #1b1b38;
  min-height: 90vh;
  line-height: 1.5;
  margin: 0;
  padding: 0;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  scroll-behavior: smooth;
  font-size: 16px;
  box-sizing: border-box;
}
li i {
      font-size: 20px;
      color: white;
      margin-right: 8px;
    }
  </style>
  <!-- navbar css -->
  <style>
/* nav bar nav bar */
 a {
      text-decoration: none;
      color: inherit;
      cursor: pointer;
    }

    ul {
      list-style: none;
    }

    /* Scrollbar for modern browsers */
    ::-webkit-scrollbar {
      width: 8px;
    }

    ::-webkit-scrollbar-thumb {
      background: #ff6860ff;
      border-radius: 4px;
    }

    ::-webkit-scrollbar-track {
      /* background: #301616ff; */
      background: #e0e7ffff;
    }

    /* Navbar */
    header {
         background: linear-gradient(90deg, #0a1a2a, #102a43e2, #204060e1);
      /* background: linear-gradient(90deg, #0000008f); */
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.25);
      position: sticky;
      top: 0;
      z-index: 10000;
    }

    nav {
      max-width: 1450px;
      margin: 0 auto;
      padding: 0 1.5rem;
      display: flex;
      align-items: center;
      justify-content: flex-start;
      height: 65px;
      gap: 24px;
    }

    /* Logo container */
    .logo {
      font-weight: 700;
      font-size: 1.9rem;
      color: #dff9fb;
      letter-spacing: 2px;
      user-select: none;
      font-style: italic;
      text-shadow:
        1px 1px 3px rgba(0, 0, 0, 0.5),
        0 0 10px #ff5e58aa;
      transition: color 0.3s ease;
      flex-grow: 0;
      flex-shrink: 0;
      white-space: nowrap;
    }

    .logo span {
      color: #ff5e57;
      font-weight: 800;
    }

    .logo:hover {
      color: #ff6b6b;
      text-shadow: 0 0 16px #ff6b6bcc;
    }

    /* Navigation container to hold menu separately */
    .nav-menu-wrapper {
      flex-grow: 1;
      display: flex;
      justify-content: flex-end;
      align-items: center;
    }

    /* Menu - desktop */
    .menu {
      display: flex;
      align-items: center;
      gap: 2.4rem;
      user-select: none;
      font-weight: 600;
      font-size: 1rem;
    }

    .menu>li {
      position: relative;
    }

    .menu>li>a {
      color: #dff9fb;
      padding: 0.45rem 0.4rem;
      display: inline-block;
      border-radius: 6px;
      transition:
        color 0.35s ease,
        background-color 0.35s ease,
        transform 0.2s ease;
    }

    .menu>li>a:hover,
    .menu>li:hover>a,
    .menu>li:focus-within>a {
      color: #fff;
      background-color: #ff5e57;
      transform: translateY(-2px);
      box-shadow: 0 6px 16px rgba(255, 94, 87, 0.65);
    }

    /* Dropdown arrow */
    .menu>li.has-dropdown>a::after {
      content: "▾";
      font-size: 0.75rem;
      margin-left: 6px;
      display: inline-block;
      color: #ff9b99cc;
      transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      vertical-align: middle;
    }

    .menu>li.has-dropdown:hover>a::after,
    .menu>li.has-dropdown:focus-within>a::after {
      transform: rotate(180deg);
      color: #ff5e57;
      text-shadow: 0 0 8px #ff6b6bbb;
    }

    /* Keyframes for slide-in from right */
    @keyframes slideInFromRight {
      0% {
        transform: translateX(30px);
        opacity: 0;
      }

      100% {
        transform: translateX(0);
        opacity: 1;
      }
    }

    /* Dropdown menu */
    .dropdown {
      position: absolute;
      top: calc(100% + 12px);
      left: 0;
      background: #295894ff;
      border-radius: 8px;
      padding: 0.4rem 0;
      min-width: 220px;
      box-shadow: 0 14px 30px rgba(0, 0, 0, 0.3);
      opacity: 0;
      pointer-events: none;
      transform: translateY(12px);
      transition:
        opacity 0.32s ease,
        transform 0.32s ease;
      z-index: 9999;
    }

    /* When dropdown visible, show with slide-in from right animation */
    .menu>li:hover .dropdown,
    .menu>li:focus-within .dropdown {
      opacity: 1;
      pointer-events: auto;
      transform: translateY(0);
      animation: slideInFromRight 0.3s ease forwards;
    }

    .dropdown li a {
      display: flex;
      align-items: center;
      gap: 0.7rem;
      padding: 0.55rem 1.6rem;
      font-size: 0.95rem;
      font-weight: 500;
      color: #c9e4f7cc;
      white-space: nowrap;
      transition:
        background-color 0.3s ease,
        color 0.3s ease;
      border-radius: 6px;
    }

    .dropdown li a:hover,
    .dropdown li a:focus {
      background: #ff5e57;
      color: #fff;
      box-shadow: 0 5px 20px rgba(255, 94, 87, 0.85);
      outline: none;
    }

    /* Icon next to dropdown item */
    .dropdown li a .icon {
      font-size: 1.2em;
      width: 24px;
      text-align: center;
      user-select: none;
    }

    /* Hamburger menu mobile */
    .hamburger {
      display: none;
      flex-direction: column;
      justify-content: center;
      gap: 5px;
      cursor: pointer;
      user-select: none;
      width: 28px;
      height: 22px;
      -webkit-tap-highlight-color: transparent;
    }

    .hamburger span {
      display: block;
      height: 3.5px;
      background: #dff9fb;
      border-radius: 3px;
      transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
      transform-origin: center;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.15);
    }

    .hamburger.active span:nth-child(1) {
      transform: translateY(7px) rotate(45deg);
      box-shadow: 0 2px 10px rgba(255, 94, 87, 0.9);
      background: #ff6b6b;
    }

    .hamburger.active span:nth-child(2) {
      opacity: 0;
      transform: scaleX(0);
    }

    .hamburger.active span:nth-child(3) {
      transform: translateY(-7px) rotate(-45deg);
      box-shadow: 0 2px 10px rgba(255, 94, 87, 0.9);
      background: #ff6b6b;
    }

    /* Mobile styles */
    @media (max-width: 768px) {
      nav {
        height: auto;
        flex-wrap: wrap;
        padding: 0.75rem 1rem;
        gap: 0;
      }

      .nav-menu-wrapper {
        width: 100%;
        order: 3;
        flex-grow: 1;
      }

      .menu {
        width: 100%;
        flex-direction: column;
        gap: 0;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.45s cubic-bezier(0.4, 0, 0.2, 1);
        background: #20538f;
        border-radius: 8px;
        margin-top: 6px;
        box-shadow: 0 10px 28px rgba(0, 0, 0, 0.3);
        user-select: none;
      }

      .menu.open {
        max-height: 720px;
        /* enough space for all items/dropdowns */
      }

      .menu>li {
        width: 100%;
        border-bottom: 1px solid rgba(255, 255, 255, 0.22);
      }

      .menu>li:last-child {
        border-bottom: none;
      }

      .menu>li>a {
        padding: 0.9rem 1.3rem;
        font-size: 1.1rem;
        font-weight: 600;
        color: #dff9fb;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-radius: 6px;
        transition:
          background-color 0.4s ease,
          box-shadow 0.3s ease;
      }

      .menu>li>a:hover,
      .menu>li>a:focus {
        background-color: #ff5e57;
        box-shadow: 0 6px 20px rgba(255, 94, 87, 0.85);
        color: #fff;
        outline: none;
      }

      .menu>li.has-dropdown>a::after {
        content: "";
        margin: 0;
        border: solid #dff9fb;
        border-width: 0 3px 3px 0;
        display: inline-block;
        padding: 7px;
        transform: rotate(45deg);
        transition: transform 0.45s cubic-bezier(0.4, 0, 0.2, 1);
      }

      .menu>li.has-dropdown.open>a::after {
        transform: rotate(-135deg);
        border-color: #fff;
      }

      /* Dropdown mobile */
      .dropdown {
        position: relative;
        background: #2a466e;
        padding: 0;
        border-radius: 0 0 8px 8px;
        transform: none !important;
        opacity: 1 !important;
        pointer-events: auto !important;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.45s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: none;
        min-width: auto;
      }

      .menu>li.has-dropdown.open>.dropdown {
        max-height: 420px;
      }

      .dropdown li a {
        padding: 0.75rem 2.4rem;
        font-size: 1rem;
        font-weight: 500;
        color: #c9e4f7cc;
        border-bottom: 1px solid rgba(255, 255, 255, 0.22);
        border-radius: 0;
        transition:
          background-color 0.35s ease,
          color 0.35s ease;
      }

      .dropdown li:last-child a {
        border-bottom: none;
      }

      .dropdown li a:hover,
      .dropdown li a:focus {
        background-color: #ff5e57;
        color: #fff;
        box-shadow: 0 6px 20px rgba(255, 94, 87, 0.85);
        outline: none;
      }

      .hamburger {
        display: flex;
        order: 1;
      }

      .logo {
        order: 0;
        margin-bottom: 0.5rem;
      }
    }

    /* Accessibility focus */
    a:focus-visible {
      outline: 3px solid #ff5e57;
      outline-offset: 3px;
      border-radius: 6px;
    }
  </style>
</head>

<body style="background-color: rgb(235, 246, 255);">
  <!-- <h4 style="color: red;">This website is not complet some reason and problem</h4> -->
  <!-- header part -->


<header class="sticky top-0 z-[1000] w-full bg-white shadow-md relative z-[1000]">
  <nav role="navigation" aria-label="Primary Navigation">
    <div class="logo">Servi<span>Plus+</span></div>
    <div class="hamburger"><span></span><span></span><span></span></div>
    <div class="nav-menu-wrapper">
      <ul class="menu" id="primary-menu">
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li class="has-dropdown">
          <a href="#">Services</a>
          <ul class="dropdown">
            <li><a target="_blank" href="houskeeping.php"><span class="icon">🧹</span> Housekeeping</a></li>
            <li><a target="_blank" href="elctrician.php"><span class="icon">💡</span> Electrician</a></li>
            <li><a target="_blank" href="plumber.php"><span class="icon">🔧</span> Plumber</a></li>
            <li><a target="_blank" href="machinacal.php"><span class="icon">⚙️</span> Mechanical</a></li>
            <li><a target="_blank" href="cook.php"><span class="icon">🍳</span> Cook</a></li>
            <li><a target="_blank" href="driver.php"><span class="icon">🚗</span> Driver</a></li>
            <li><a target="_blank" href="All-servic.php"><span class="icon"></span> All Services</a></li>
          </ul>
        </li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="directory.php">Expert Employee</a></li>
        <li><a href="Admin_dashboard.php">Admin</a></li>
        

        <?php if(isset($_SESSION['username'])) : ?>

<?php if(isset($_SESSION['username'])) : ?>
  <li class="has-dropdown relative list-none">
    
    <a href="#" class="flex items-center gap-2 px-4 py-2 bg-[linear-gradient(90deg,#0a1a2a,#102a43e2,#204060e1)] hover:bg-[#ff5e57] rounded-xl transition-all duration-300 shadow-lg !text-white">
        <span class="text-lg">🙍‍♂️</span>
        <span class="font-black text-xs uppercase tracking-widest">
            <?= htmlspecialchars($_SESSION['username']); ?>
        </span>
        <!-- <i class="fa-solid fa-chevron-down text-[10px] opacity-70"></i> -->
    </a>

    <ul class="dropdown !bg-[#295894ff] !border-white/10 !w-60 shadow-2xl rounded-2xl !py-2 !right-0 !left-auto">
        <div class="absolute -top-1.5 right-6 w-3 h-3 bg-[#295894ff] border-l border-t border-white/10 rotate-45 hidden md:block"></div>

        <li>
            <a href="profile.php" class="flex items-center gap-3 px-4 py-3 text-sm font-normal text-white hover:bg-[#ff5e57] !bg-transparent transition-all">
                <span class="w-8 h-8 flex items-center justify-center bg-white/10 rounded-lg text-xs">🙍‍♂️</span> 
                Employer Profile
            </a>
        </li>
        <li>
            <a href="employer_dashboard.php" class="flex items-center gap-3 px-4 py-3 text-sm font-normal text-white hover:bg-[#ff5e57] !bg-transparent transition-all">
                <span class="w-8 h-8 flex items-center justify-center bg-white/10 rounded-lg text-xs">📊</span> 
                Dashboard
            </a>
        </li>
        <li>
            <a href="user_dashboard.php" class="flex items-center gap-3 px-4 py-3 text-sm font-normal text-white hover:bg-[#ff5e57] !bg-transparent transition-all">
                <span class="w-8 h-8 flex items-center justify-center bg-white/10 rounded-lg text-xs">🗓️</span> 
                My Booking
            </a>
        </li>
        
        <div class="my-1 border-t border-white/10"></div>
        
        <li>
            <a href="logout.php" class="flex items-center gap-3 px-4 py-3 text-sm font-normal text-rose-300 hover:bg-[#ff5e57] hover:text-white !bg-transparent transition-all">
                <span class="w-8 h-8 flex items-center justify-center bg-rose-500/20 rounded-lg text-xs">⏻</span> 
                Logout
            </a>
        </li>
    </ul>
  </li>
<?php else : ?>
  <li><a href="login.php">Login</a></li>
<?php endif; ?>




           
        <?php else : ?>
          <li><a href="signup.php">Signup</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </nav>

<div class="bg-white border-b border-slate-100 shadow-sm py-3 px-4 md:px-10">
  <div class="max-w-7xl mx-auto flex flex-col lg:flex-row items-center justify-between gap-6">
    
    <div class="flex flex-col sm:flex-row items-center gap-4 w-full lg:w-auto">
      
      <div class="flex-shrink-0 w-full sm:w-auto">
        <button onclick="getLocation()" id="locBtn" class="group flex items-center gap-3 outline-none border-none bg-transparent w-full sm:w-auto justify-center sm:justify-start">
          <div class="w-10 h-10 bg-indigo-50 rounded-2xl flex items-center justify-center group-hover:bg-indigo-600 transition-all shadow-sm">
             <i class="fa-solid fa-location-crosshairs text-indigo-600 group-hover:text-white transition-all text-lg"></i>
          </div>
          <div class="text-left">
            <h2 class="text-[10px] font-black text-slate-400 uppercase tracking-widest leading-none">Service Area</h2>
            <p class="text-[11px] text-indigo-500 font-bold leading-tight">Click to auto-detect</p>
          </div>
        </button>
      </div>

      <div class="flex items-center bg-slate-100 p-1.5 rounded-[1.25rem] border border-slate-200 w-full sm:w-72 transition-all focus-within:ring-2 focus-within:ring-indigo-500 focus-within:bg-white">
        <input type="text" id="userPincode" maxlength="6" placeholder="Enter Pincode" 
               class="w-full pl-4 bg-transparent outline-none font-bold text-slate-700 text-sm placeholder:text-slate-400 placeholder:font-medium">
        <button onclick="searchByPin()" id="checkBtn" class="bg-indigo-600 text-white px-6 py-2.5 rounded-xl font-black text-[11px] uppercase tracking-wider hover:bg-slate-900 transition-all shadow-md active:scale-95">
          Search
        </button>
      </div>
    </div>

    <div id="resultContainer" class="flex flex-col sm:flex-row items-center justify-center lg:justify-end gap-3 w-full lg:flex-1 opacity-0 transition-all duration-500 translate-y-2">
      <div class="flex items-center gap-2 bg-slate-50 px-4 py-2 rounded-full border border-slate-100">
          <div class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></div>
          <p id="statusMsg" class="text-xs sm:text-sm font-bold text-slate-700"></p>
      </div>
      
      <a id="viewAllBtn" href="#" class="hidden w-full sm:w-auto text-center bg-emerald-500 text-white px-6 py-3 rounded-2xl font-black text-[11px] uppercase shadow-lg shadow-emerald-100 hover:bg-emerald-600 hover:-translate-y-0.5 transition-all active:scale-95">
        View All Experts <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
      </a>
    </div>

  </div>
</div>
</header>

<script>
  // 1. Live Location detect karne ke liye
function getLocation() {
    const msg = document.getElementById('statusMsg');
    const container = document.getElementById('resultContainer');
    const viewBtn = document.getElementById('viewAllBtn');
    const locIcon = document.querySelector('.fa-location-crosshairs');

    if (navigator.geolocation) {
        locIcon.classList.add('animate-spin'); // Loading start
        msg.innerHTML = "🛰️ Detecting your live location...";
        container.style.opacity = "1";

        navigator.geolocation.getCurrentPosition((position) => {
            const lat = position.coords.latitude;
            const lng = position.coords.longitude;

            // Direct check with Latitude & Longitude
            fetch(`check_pincode.php?lat=${lat}&lng=${lng}`)
            .then(res => res.json())
            .then(data => {
                locIcon.classList.remove('animate-spin');
                if(data.available) {
                    msg.innerHTML = `<span class="text-emerald-600">✅ Services available at your location!</span>`;
                    viewBtn.classList.remove('hidden');
                    viewBtn.href = `directory.php?lat=${lat}&lng=${lng}`;
                } else {
                    msg.innerHTML = `<span class="text-rose-500 font-bold">❌ Sorry, no experts near your live spot.</span>`;
                    viewBtn.classList.add('hidden');
                }
            });
        }, (err) => {
            locIcon.classList.remove('animate-spin');
            alert("Location Blocked! Please allow location permission in browser.");
        });
    }
}

// 2. Manual Pincode Search ke liye
function searchByPin() {
    const pin = document.getElementById('userPincode').value;
    const msg = document.getElementById('statusMsg');
    const btn = document.getElementById('checkBtn');
    const container = document.getElementById('resultContainer');
    const viewBtn = document.getElementById('viewAllBtn');

    if(pin.length < 6) {
        container.style.opacity = "1";
        msg.innerHTML = `<span class="text-orange-500">❗ Please enter 6-digit pin</span>`;
        return;
    }

    btn.innerHTML = "<i class='fa-solid fa-spinner animate-spin'></i>";
    
    fetch('check_pincode.php?pincode=' + pin)
    .then(res => res.json())
    .then(data => {
        btn.innerHTML = "Search";
        container.style.opacity = "1";
        
        if(data.available) {
            msg.innerHTML = `<span class="text-emerald-600">✅ Services available in ${pin}!</span>`;
            viewBtn.classList.remove('hidden');
            viewBtn.href = `directory.php?search=${pin}`;
        } else {
            msg.innerHTML = `<span class="text-rose-500 font-bold">❌ Services not available in ${pin}</span>`;
            viewBtn.classList.add('hidden');
        }
    })
    .catch(() => {
        btn.innerHTML = "Search";
        alert("Server Error!");
    });
}
</script>



<!-- srousal  -->

<section class="relative w-full h-screen overflow-hidden bg-black">
    <div id="carouselTrack" class="flex w-full h-full transition-transform duration-1000 ease-[cubic-bezier(0.23, 1, 0.32, 1)]">
        
       <div class="carousel-slide flex-none w-full min-w-full relative h-full active">
            <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover brightness-[0.4] scale-110 transition-transform duration-[10000ms]">
                <source src="making food.mp4" type="video/mp4">
            </video>
           <div class="absolute inset-0 z-20 flex items-center px-6 md:px-24">
    <div class="max-w-4xl space-y-4 md:space-y-6 transform translate-y-[100px]">
        <span class="inline-block px-4 py-1 border border-[#d4af37] text-[#d4af37] text-[10px] tracking-[0.4em] uppercase rounded-full">Cook</span>
        <h3 class="text-white text-5xl md:text-8xl font-black leading-tight font-serif italic">Culinary <span class="not-italic text-[#d4af37]">Artistry</span></h3>
        <p class="text-gray-300 text-sm md:text-xl font-light max-w-lg leading-relaxed">Michelin-star experiences delivered to your private residence with impeccable service.</p>
    </div>
</div>
        </div>




        <div class="carousel-slide min-w-full relative h-full">
            <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover brightness-[0.4] scale-110 transition-transform duration-[10000ms]">
                <source src="electrician.mp4">
            </video>
            <div class="absolute inset-0 z-20 flex items-center px-6 md:px-24">
                <div class="max-w-4xl space-y-4 md:space-y-6 transform translate-y-[100px]">
                    <span class="inline-block px-4 py-1 border border-[#d4af37] text-[#d4af37] text-[10px] tracking-[0.4em] uppercase rounded-full">Electrician</span>
                    <h3 class="text-white text-5xl md:text-8xl font-black leading-tight font-serif">Estate <span class="italic text-[#d4af37]">Care</span></h3>
                    <p class="text-gray-300 text-sm md:text-xl font-light max-w-lg leading-relaxed">Advanced engineering and maintenance for the world's most sophisticated homes.</p>
                    
                </div>
            </div>
        </div>

        <div class="carousel-slide min-w-full relative h-full">
            <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover brightness-[0.4] scale-110 transition-transform duration-[10000ms]">
                <source src="plumber.mp4">
            </video>
            <div class="absolute inset-0 z-20 flex items-center px-6 md:px-24">
                <div class="max-w-4xl space-y-4 md:space-y-6 transform translate-y-[100px]">
                    <span class="inline-block px-4 py-1 border border-[#d4af37] text-[#d4af37] text-[10px] tracking-[0.4em] uppercase rounded-full">Plumber</span>
                    <h3 class="text-white text-5xl md:text-8xl font-black leading-tight font-serif">Advanced Sanitary <span class="italic text-[#d4af37]">Artistry</span></h3>
                    <p class="text-gray-300 text-sm md:text-xl font-light max-w-lg leading-relaxed">This focuses on the health, hygiene, and structure of a building..</p>
                  
                </div>
            </div>
        </div>

    </div>

    <div class="absolute bottom-10 left-0 w-full px-6 md:px-24 flex justify-between items-end z-30">
        <div class="flex gap-3">
            <div class="carousel-indicator w-12 h-1 bg-white/20 cursor-pointer overflow-hidden active"     onclick="currentSlide(0)">
             <div class="progress-bar h-full bg-[#d4af37] w-0"></div>
            </div>
            <div class="carousel-indicator w-12 h-1 bg-white/20 cursor-pointer overflow-hidden" onclick="currentSlide(1)">
                <div class="progress-bar h-full bg-[#d4af37] w-0"></div>
            </div>
           
              <div class="carousel-indicator w-12 h-1 bg-white/20 cursor-pointer overflow-hidden" onclick="currentSlide(3)">
                <div class="progress-bar h-full bg-[#d4af37] w-0"></div>
            </div>

        </div>
        
        <div class="flex gap-4">
            <button onclick="moveSlide(-1)" class="w-12 h-12 flex items-center justify-center border border-white/20 rounded-full text-white hover:bg-[#d4af37] hover:text-black transition-all">
                <i class="fa-solid fa-chevron-left text-xs"></i>
            </button>
            <button onclick="moveSlide(1)" class="w-12 h-12 flex items-center justify-center border border-white/20 rounded-full text-white hover:bg-[#d4af37] hover:text-black transition-all">
                <i class="fa-solid fa-chevron-right text-xs"></i>
            </button>
        </div>
    </div>
</section>  





  <style>
    /* Slide ko poori screen par dikhane ke liye */
    .carousel-slide {
        width: 100%;
        height: 100vh; /* vh matlab viewport height, ye full screen cover karega */
        overflow: hidden;
    }

    /* Video animation logic */
    .carousel-slide video {
        transition: transform 10s ease-out;
        object-fit: cover; /* Ye video ko stretch hone se rokta hai aur area fill karta hai */
    }

    .carousel-slide.active video {
        transform: scale(1) !important; /* Zoom-out effect */
    }

    /* Text reveal animation fix */
    .carousel-slide h3 {
        opacity: 0; /* Pehle hidden rahega */
        transform: translateY(30px);
        transition: all 0.8s ease 0.5s;
    }

    .carousel-slide.active h3 {
        opacity: 1;
        transform: translateY(0);
    }

    /* Progress bar animation */
    .carousel-indicator.active .progress-bar {
        animation: progress 8s linear forwards;
    }

    @keyframes progress {
        from { width: 0%; }
        to { width: 100%; }
    }




    /* Premium Animations */
    .carousel-slide.active video {
        transform: scale(1); /* Slow zoom-out effect */
    }
    
    .carousel-indicator.active .progress-bar {
        animation: progress 8s linear forwards;
    }

    @keyframes progress {
        from { width: 0%; }
        to { width: 100%; }
    }

 

    /* Text reveal animation */
    .carousel-slide h3 {
        opacity: 2;
        transform: translateY(30px);
        transition: all 0.8s ease 0.5s;
    }
    .carousel-slide.active h3 {
        opacity: 1;
        transform: translateY(0);
    }
</style> 

<script>
    let index = 0;
    const track = document.getElementById('carouselTrack');
    const slides = document.querySelectorAll('.carousel-slide');
    const indicators = document.querySelectorAll('.carousel-indicator');

    function updateCarousel() {
        track.style.transform = `translateX(-${index * 100}%)`;
        slides.forEach((slide, i) => {
            slide.classList.toggle('active', i === index);
            indicators[i].classList.toggle('active', i === index);
        });
    }

    function moveSlide(step) {
        index = (index + step + slides.length) % slides.length;
        updateCarousel();
    }

    function currentSlide(n) {
        index = n;
        updateCarousel();
    }

    // Auto-advance
    setInterval(() => moveSlide(1), 8000);
</script>


 
  
 
  
  <!-- end crousal |-->

  <!-- Discover Inovativation -->
  <!-- <div
    class="absolute size-full bg-white transition-all duration-1000 ease-out bg-[size:16px_16px] bg-[position:0_0,8px_8px] bg-[image:linear-gradient(45deg,#efefef_25%,rgba(239,239,239,0)_25%,rgba(239,239,239,0)_75%,#efefef_75%,#efefef),linear-gradient(45deg,#efefef_25%,rgba(239,239,239,0)_25%,rgba(239,239,239,0)_75%,#efefef_75%,#efefef)] [clip-path:polygon(0px_0px,0%_0px,0%_100%,0px_100%)]">
  </div> -->

  <!-- End-Discover Inovativation -->

<!-- Include AOS CSS and JS in your <head> -->
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<!-- <section class="bg-gradient-to-br from-gray-50 to-blue-50 py-20 px-6 md:px-16 overflow-hidden">
  <div class="flex flex-col md:flex-row items-center justify-between max-w-7xl mx-auto gap-16">

    
    <div class="relative w-full md:w-1/2 group" data-aos="fade-right" data-aos-duration="1000">
      <img src="about-image.png" alt="Team"
        class="rounded-2xl w-full h-auto object-cover shadow-2xl transform group-hover:scale-105 transition duration-700 ease-in-out" />

      
      <div class="absolute -bottom-4 -left-4 bg-blue-600 text-white p-5 rounded-xl shadow-2xl w-48 transform hover:scale-105 transition duration-500 ease-in-out"
     data-aos="zoom-in" data-aos-delay="300">
     
    <div class="mb-4">
      <div class="flex items-center text-2xl font-extrabold">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path d="M3 8h18M3 16h18M5 12h14" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
        3+
      </div>
      <p class="text-[11px] mt-1 text-blue-100 uppercase tracking-wider">Years Experience</p>
    </div>

    <div>
      <div class="flex items-center text-2xl font-extrabold">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path d="M16 12a4 4 0 01-8 0 4 4 0 018 0zM2 20h20" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
        120+
      </div>
      <p class="text-[11px] mt-1 text-blue-100 uppercase tracking-wider">Worldwide Clients</p>
    </div>
</div>
    </div>

 
    <div class="w-full md:w-1/2" data-aos="fade-left" data-aos-duration="1000">
      <p class="text-blue-600 font-semibold uppercase tracking-widest mb-2">About Our Company</p>
      <h1 class="text-4xl md:text-5xl font-bold text-gray-900 leading-snug mb-6">
        Bringing Smart Solutions<br class="hidden md:block" />
        <span class="text-blue-600">to Your Home</span>
      </h1>
      <p class="text-gray-700 leading-relaxed mb-8">
        In today’s busy world, managing household tasks can be challenging. That’s why our app brings
        smart, efficient solutions right to your doorstep — simplifying your life in the best way possible.
        Whether you need professional housekeeping, skilled electricians, expert plumbing, home-cooked meals,
        or reliable drivers — we’ve got you covered.
        <br><br>
        Our platform connects you with trusted professionals committed to high-quality service.
        Every service provider is verified and background-checked to ensure your safety and peace of mind.
      </p>

      <div class="bg-white rounded-2xl p-6 shadow-lg border border-blue-100 hover:shadow-xl transition" data-aos="fade-up"
        data-aos-delay="200">
        <h3 class="text-blue-600 font-bold text-xl mb-2 flex items-center">
          <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path d="M12 11c0-2.21 1.79-4 4-4h4v10h-4c-2.21 0-4-1.79-4-4v-2zM6 8h2v8H6V8z" stroke-width="2"
              stroke-linecap="round" stroke-linejoin="round" />
          </svg>
          Security System
        </h3>
        <p class="text-gray-600 text-sm">
          Your safety is our top priority. We use advanced encryption and verify all professionals
          to ensure secure, trusted, and safe home services.
        </p>
      </div>
    </div>
  </div>
</section>  -->

<!-- Initialize AOS -->
<!-- <script>
  AOS.init({
    once: true, // Animation only once when scrolling
    offset: 100,
    duration: 1000,
    easing: 'ease-in-out'
  });
</script> -->

  <!-- end enovation -->

  <!-- new chat services text with image -->
<!-- Add AOS for scroll animations -->
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

<section class="bg-gradient-to-br from-sky-50 via-white to-sky-100 py-20 px-6 md:px-16 text-gray-900 overflow-hidden">
  <div class="max-w-7xl mx-auto text-center" data-aos="fade-down">
    <h2 class="text-4xl md:text-5xl font-extrabold mb-4 text-transparent bg-clip-text bg-gradient-to-r from-blue-700 to-sky-500">
      We Help Teams Build Their Dream Business
    </h2>
    <p class="text-gray-600 max-w-2xl mx-auto">
      Explore our professional home and lifestyle services designed to make your daily life easier and smarter.
    </p>
  </div>

  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 max-w-6xl mx-auto mt-16">
    <!-- Card Template -->
    <div class="group bg-white rounded-2xl shadow-lg p-8 transition-all duration-500 hover:-translate-y-3 hover:shadow-2xl border border-gray-100"
         data-aos="fade-up" data-aos-delay="100">
      <div class="text-5xl mb-6 transform transition-transform group-hover:scale-110">🧹</div>
      <img src="https://img.freepik.com/premium-photo/responsible-young-male-waiter-protective-face-shield-spraying-disinfectant-tables-restaurant_425904-2977.jpg?w=740"
           alt="Housekeeping" class="rounded-xl mb-6 mx-auto w-full h-52 object-cover shadow-md group-hover:shadow-lg transition">
      <h3 class="text-xl font-bold text-blue-700 uppercase mb-3">Housekeeping</h3>
      <p class="text-gray-600 text-sm leading-relaxed">Professional cleaning services to maintain hygiene and comfort in your spaces.</p>
      <!--  -->
       <div class="mt-6">
           <a href="houskeeping.php" class="group relative inline-flex items-center justify-center gap-3 bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-4 rounded-2xl font-black text-[11px] uppercase tracking-[0.15em] transition-all duration-300 shadow-xl shadow-indigo-200 hover:shadow-indigo-400 hover:-translate-y-1 w-full sm:w-max">
               
             <span class="relative z-10 flex items-center gap-2">
                 Book Service Now
                 <i class="fa-solid fa-chevron-right text-[10px] transition-transform group-hover:translate-x-1"></i>
             </span>
     
             <div class="absolute inset-0 rounded-2xl bg-gradient-to-tr from-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
               </a>
               </div>
    </div>

    <div class="group bg-white rounded-2xl shadow-lg p-8 transition-all duration-500 hover:-translate-y-3 hover:shadow-2xl border border-gray-100"
         data-aos="fade-up" data-aos-delay="200">
      <div class="text-5xl mb-6 transform transition-transform group-hover:scale-110">💡</div>
      <img src="WhatsApp Image 2025-05-20 at 16.53.44_82908247.jpg"
           alt="Electrician" class="rounded-xl mb-6 mx-auto w-full h-52 object-cover shadow-md group-hover:shadow-lg transition">
      <h3 class="text-xl font-bold text-blue-700 uppercase mb-3">Electrician</h3>
      <p class="text-gray-600 text-sm leading-relaxed">Certified electricians for safe and efficient electrical installations and repairs.</p>
      <div class="mt-6">
    <a href="elctrician.php" class="group relative inline-flex items-center justify-center gap-3 bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-4 rounded-2xl font-black text-[11px] uppercase tracking-[0.15em] transition-all duration-300 shadow-xl shadow-indigo-200 hover:shadow-indigo-400 hover:-translate-y-1 w-full sm:w-max">
        
        <span class="relative z-10 flex items-center gap-2">
            Book Service Now
            <i class="fa-solid fa-chevron-right text-[10px] transition-transform group-hover:translate-x-1"></i>
        </span>

        <div class="absolute inset-0 rounded-2xl bg-gradient-to-tr from-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
    </a>
</div>
    </div>

    <div class="group bg-white rounded-2xl shadow-lg p-8 transition-all duration-500 hover:-translate-y-3 hover:shadow-2xl border border-gray-100"
         data-aos="fade-up" data-aos-delay="300">
      <div class="text-5xl mb-6 transform transition-transform group-hover:scale-110">🚰</div>
      <img src="https://img.freepik.com/premium-photo/pipe-maintenance-by-plumber_895561-10265.jpg?w=740"
           alt="Plumbing" class="rounded-xl mb-6 mx-auto w-full h-52 object-cover shadow-md group-hover:shadow-lg transition">
      <h3 class="text-xl font-bold text-blue-700 uppercase mb-3">Plumbing</h3>
      <p class="text-gray-600 text-sm leading-relaxed">Expert plumbing services to fix leaks, clogs, and ensure smooth water systems.</p>
      <div class="mt-6">
    <a href="plumber.php" class="group relative inline-flex items-center justify-center gap-3 bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-4 rounded-2xl font-black text-[11px] uppercase tracking-[0.15em] transition-all duration-300 shadow-xl shadow-indigo-200 hover:shadow-indigo-400 hover:-translate-y-1 w-full sm:w-max">
        
        <span class="relative z-10 flex items-center gap-2">
            Book Service Now
            <i class="fa-solid fa-chevron-right text-[10px] transition-transform group-hover:translate-x-1"></i>
        </span>

        <div class="absolute inset-0 rounded-2xl bg-gradient-to-tr from-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
    </a>
</div>
    </div>

    <div class="group bg-white rounded-2xl shadow-lg p-8 transition-all duration-500 hover:-translate-y-3 hover:shadow-2xl border border-gray-100"
         data-aos="fade-up" data-aos-delay="400">
      <div class="text-5xl mb-6 transform transition-transform group-hover:scale-110">⚙️</div>
      <img src="https://img.freepik.com/premium-photo/side-view-portrait-man-working-garage-repairing-motorcycle_124865-1216.jpg?w=740"
           alt="Mechanical" class="rounded-xl mb-6 mx-auto w-full h-52 object-cover shadow-md group-hover:shadow-lg transition">
      <h3 class="text-xl font-bold text-blue-700 uppercase mb-3">Mechanical</h3>
      <p class="text-gray-600 text-sm leading-relaxed">Reliable mechanical services for equipment maintenance and machinery support.</p>
      <div class="mt-6">
    <a href="machinacal.php" class="group relative inline-flex items-center justify-center gap-3 bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-4 rounded-2xl font-black text-[11px] uppercase tracking-[0.15em] transition-all duration-300 shadow-xl shadow-indigo-200 hover:shadow-indigo-400 hover:-translate-y-1 w-full sm:w-max">
        
        <span class="relative z-10 flex items-center gap-2">
            Book Service Now
            <i class="fa-solid fa-chevron-right text-[10px] transition-transform group-hover:translate-x-1"></i>
        </span>

        <div class="absolute inset-0 rounded-2xl bg-gradient-to-tr from-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
    </a>
</div>
    </div>

    <div class="group bg-white rounded-2xl shadow-lg p-8 transition-all duration-500 hover:-translate-y-3 hover:shadow-2xl border border-gray-100"
         data-aos="fade-up" data-aos-delay="500">
      <div class="text-5xl mb-6 transform transition-transform group-hover:scale-110">🍳</div>
      <img src="female-chef-chopping-vegetables-kitchen.jpg"
           alt="Cooking" class="rounded-xl mb-6 mx-auto w-full h-52 object-cover shadow-md group-hover:shadow-lg transition">
      <h3 class="text-xl font-bold text-blue-700 uppercase mb-3">Cooking</h3>
      <p class="text-gray-600 text-sm leading-relaxed">Skilled cooks to prepare delicious and healthy meals for homes and events.</p>
      <div class="mt-6">
    <a href="cook.php" class="group relative inline-flex items-center justify-center gap-3 bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-4 rounded-2xl font-black text-[11px] uppercase tracking-[0.15em] transition-all duration-300 shadow-xl shadow-indigo-200 hover:shadow-indigo-400 hover:-translate-y-1 w-full sm:w-max">
        
        <span class="relative z-10 flex items-center gap-2">
            Book Service Now
            <i class="fa-solid fa-chevron-right text-[10px] transition-transform group-hover:translate-x-1"></i>
        </span>

        <div class="absolute inset-0 rounded-2xl bg-gradient-to-tr from-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
    </a>
</div>
    </div>

    <div class="group bg-white rounded-2xl shadow-lg p-8 transition-all duration-500 hover:-translate-y-3 hover:shadow-2xl border border-gray-100"
         data-aos="fade-up" data-aos-delay="600">
      <div class="text-5xl mb-6 transform transition-transform group-hover:scale-110">🚗</div>
      <img src="man-working-as-truck-driver-posing.jpg"
           alt="Driver" class="rounded-xl mb-6 mx-auto w-full h-52 object-cover shadow-md group-hover:shadow-lg transition">
      <h3 class="text-xl font-bold text-blue-700 uppercase mb-3">Driver</h3>
      <p class="text-gray-600 text-sm leading-relaxed">Experienced drivers for safe and reliable transportation services.</p>
      <div class="mt-6">
    <a href="driver.php" class="group relative inline-flex items-center justify-center gap-3 bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-4 rounded-2xl font-black text-[11px] uppercase tracking-[0.15em] transition-all duration-300 shadow-xl shadow-indigo-200 hover:shadow-indigo-400 hover:-translate-y-1 w-full sm:w-max">
        
        <span class="relative z-10 flex items-center gap-2">
            Book Service Now
            <i class="fa-solid fa-chevron-right text-[10px] transition-transform group-hover:translate-x-1"></i>
        </span>

        <div class="absolute inset-0 rounded-2xl bg-gradient-to-tr from-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
    </a>
</div>
    </div>
  </div>

  <!-- Buttons -->
  <div class="mt-14 text-center space-x-4" data-aos="fade-up" data-aos-delay="700">
    <a href="All-servic.php"
       class="inline-block bg-gradient-to-r from-blue-600 to-sky-500 hover:from-sky-500 hover:to-blue-600 text-white font-semibold py-3 px-8 rounded-full shadow-lg hover:shadow-xl transition duration-500">
       View All Services
    </a>
    <!-- <a href="Book a consult.html"
       class="inline-block bg-gradient-to-r from-yellow-400 to-amber-500 hover:from-amber-500 hover:to-yellow-400 text-gray-900 font-semibold py-3 px-8 rounded-full shadow-lg hover:shadow-xl transition duration-500">
       Book Free Consultation
    </a> -->
  </div>
</section>

<!-- Initialize AOS -->
<script>
  AOS.init({
    duration: 1000,
    once: true,
    easing: 'ease-in-out',
  });
</script>

  <!-- end services -->

  <!-- why chosse us -->
<section class="bg-gradient-to-b from-gray-50 via-white to-gray-100 py-20 px-6">
  <div class="max-w-7xl mx-auto flex flex-col lg:flex-row items-center gap-16">

    <!-- Left Text Column -->
    <div class="lg:w-1/2 space-y-8" data-aos="fade-right">
      <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 leading-tight">
        Why Choose <span class="text-indigo-600">Us?</span>
      </h2>
      <p class="text-gray-700 text-lg md:text-xl">
        Trusted professionals, verified and background-checked experts — ensuring your safety and satisfaction.
      </p>

      <ul class="space-y-6">
        <li class="flex items-start gap-4 hover:translate-x-2 transition-transform duration-300">
          <span class="bg-indigo-100 text-indigo-600 p-3 rounded-full shadow-md">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path d="M12 21l-8-4.5V6l8-4.5L20 6v10.5L12 21z" />
            </svg>
          </span>
          <span class="text-lg font-semibold text-gray-800">
            All-in-One Services: Cleaning, electrical, plumbing, cooking, driving — all in one app.
          </span>
        </li>

        <li class="flex items-start gap-4 hover:translate-x-2 transition-transform duration-300">
          <span class="bg-green-100 text-green-600 p-3 rounded-full shadow-md">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path d="M12 20h9" />
              <path d="M16.5 3.5l-9 9" />
              <path d="M10 5l7 7" />
            </svg>
          </span>
          <span class="text-lg font-semibold text-gray-800">
            Convenient Booking: Book anytime, anywhere with a simple tap.
          </span>
        </li>

        <li class="flex items-start gap-4 hover:translate-x-2 transition-transform duration-300">
          <span class="bg-yellow-100 text-yellow-500 p-3 rounded-full shadow-md">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path d="M5 13l4 4L19 7" />
            </svg>
          </span>
          <span class="text-lg font-semibold text-gray-800">
            24/7 Customer Support: We’re here for you day and night, whenever you need help.
          </span>
        </li>

        <li class="flex items-start gap-4 hover:translate-x-2 transition-transform duration-300">
          <span class="bg-blue-100 text-blue-500 p-3 rounded-full shadow-md">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path d="M12 4v16m8-8H4" />
            </svg>
          </span>
          <span class="text-lg font-semibold text-gray-800">
            Reliable & On-Time: Skilled professionals who respect your time.
          </span>
        </li>
      </ul>
    </div>

    <!-- Right Image Column -->
    <div class="lg:w-1/2" data-aos="fade-left">
      <img
        src="https://img.freepik.com/premium-photo/composition-with-question-mark-urban-landscape_23-2150525221.jpg?w=740"
        alt="Team Meeting"
        class="w-full h-auto rounded-2xl shadow-2xl hover:scale-105 transition-transform duration-500 ease-in-out"
      >
    </div>

  </div>
</section>

  <!-- end why choose us -->

  <!-- reviws -->
<!-- ✅ Modern Testimonial Section -->
<!-- ✅ Premium White-Themed Testimonial Section with Scroll Animation -->
<section class="relative py-24 bg-gradient-to-b from-white via-gray-50 to-gray-100 text-gray-800 overflow-hidden">
  <div class="max-w-7xl mx-auto px-6 md:px-12 grid md:grid-cols-2 gap-16 items-center">

    <!-- ⭐ Testimonial Card -->
    <div
      class="bg-white/70 backdrop-blur-xl border border-gray-200 rounded-2xl shadow-2xl p-10 relative overflow-hidden hover:shadow-green-300/40 transition-all duration-700 transform hover:-translate-y-2"
      data-aos="fade-right">
      <div class="flex flex-col items-center text-center space-y-4">
        <div class="w-28 h-28 rounded-full overflow-hidden ring-4 ring-green-400/30 shadow-lg">
          <img id="customer-photo" src="https://via.placeholder.com/150" alt="Customer Photo"
            class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
        </div>
        <p id="testimonial-quote" class="text-gray-600 italic leading-relaxed">
          "This service changed my daily routine! Super fast and trustworthy."
        </p>
        <h4 id="testimonial-name" class="text-xl font-semibold text-green-600">John Doe</h4>
        <span id="testimonial-role" class="text-sm text-gray-500">Home Service Customer</span>
      </div>

      <!-- Navigation Buttons -->
      <div class="flex justify-center gap-4 mt-8">
        <button onclick="prevTestimonial()"
          class="w-10 h-10 rounded-full border border-green-500 text-green-500 hover:bg-green-500 hover:text-white transition duration-300">
          &#8592;
        </button>
        <button onclick="nextTestimonial()"
          class="w-10 h-10 rounded-full border border-green-500 text-green-500 hover:bg-green-500 hover:text-white transition duration-300">
          &#8594;
        </button>
      </div>
    </div>

    <!-- 💬 Text Info Block -->
    <div class="space-y-6" data-aos="fade-left">
      <h2 class="text-4xl md:text-5xl font-extrabold text-green-600 leading-tight">
        Perfect Reviews from <span class="text-gray-800">Our Real Customers</span>
      </h2>
      <p class="text-gray-600 leading-relaxed text-lg">
        Our customers love the convenience and reliability of our services. From quick repairs to home-cooked meals and professional cleaning — we deliver trusted help right to your doorstep.
      </p>
      <ul class="space-y-2 text-gray-700">
        <li>✅ Over 5,000 satisfied clients</li>
        <li>✅ Consistent 5-star reviews</li>
        <li>✅ 24/7 Customer support excellence</li>
      </ul>
    </div>
  </div>
</section>


<!-- ✨ Testimonial Auto Slide Script -->

<script>
document.addEventListener("DOMContentLoaded", () => {
  const testimonials = [
    {
      photo: "https://randomuser.me/api/portraits/men/32.jpg",
      quote: "Amazing experience! The team was on time and did an excellent job.",
      name: "Michael Lee",
      role: "Plumbing Service Customer"
    },
    {
      photo: "https://randomuser.me/api/portraits/women/44.jpg",
      quote: "Highly professional and quick service. Definitely recommend!",
      name: "Sophia Carter",
      role: "Cleaning Service Customer"
    },
    {
      photo: "https://randomuser.me/api/portraits/men/85.jpg",
      quote: "Super easy booking and reliable workers. I use it every week!",
      name: "David Johnson",
      role: "Home Maintenance Customer"
    }
  ];

  let current = 0;
  const photoEl = document.getElementById("customer-photo");
  const quoteEl = document.getElementById("testimonial-quote");
  const nameEl = document.getElementById("testimonial-name");
  const roleEl = document.getElementById("testimonial-role");

  if (!photoEl || !quoteEl || !nameEl || !roleEl) return; // safety check

  function updateTestimonial(index) {
    const t = testimonials[index];
    photoEl.src = t.photo;
    quoteEl.textContent = `"${t.quote}"`;
    nameEl.textContent = t.name;
    roleEl.textContent = t.role;
  }

  function nextTestimonial() {
    current = (current + 1) % testimonials.length;
    updateTestimonial(current);
  }

  function prevTestimonial() {
    current = (current - 1 + testimonials.length) % testimonials.length;
    updateTestimonial(current);
  }

  // Expose navigation functions globally
  window.nextTestimonial = nextTestimonial;
  window.prevTestimonial = prevTestimonial;

  // Initialize first testimonial
  updateTestimonial(current);

  // Auto-slide every 5s
  setInterval(nextTestimonial, 5000);
});
</script>


<!-- 🚀 Add AOS Library for Scroll Animation -->
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 1000,
    once: true,
    easing: 'ease-in-out'
  });
</script>




  <!-- end rivews -->


  <!-- Gallery Section Start -->
<!-- Include Tailwind CSS via CDN -->
<script src="https://cdn.tailwindcss.com"></script>

<section id="gallery" class="relative py-24 bg-gradient-to-b from-gray-50 via-gray-100 to-white overflow-hidden">
  <div class="max-w-7xl mx-auto px-6 md:px-12">
    
    <!-- Heading -->
    <div class="text-center mb-12" data-aos="fade-down">
      <h2 class="text-4xl md:text-5xl font-extrabold text-gray-800 mb-3">
        Our <span class="text-green-500">Gallery</span>
      </h2>
      <p class="text-gray-500 text-lg">Check out our latest work and our team in action</p>
      <div class="mt-4 mx-auto w-24 h-1 bg-green-400 rounded-full"></div>
    </div>

    <!-- Gallery Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6" data-aos="zoom-in">

      <!-- Item -->
      <div class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
        <img src="WhatsApp Image 2025-05-20 at 16.53.44_82908247.jpg" alt="Gallery 1"
          class="w-full h-60 object-cover transform group-hover:scale-110 transition duration-500">
        <div
          class="absolute inset-0 bg-black/50 flex flex-col justify-center items-center opacity-0 group-hover:opacity-100 transition-all duration-500">
          <span class="text-green-400 text-lg font-semibold">Electrician Work</span>
          <p class="text-gray-200 text-sm">High-quality electrical service</p>
        </div>
      </div>

      <div class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
        <img src="female-chef-chopping-vegetables-kitchen.jpg" alt="Gallery 2"
          class="w-full h-60 object-cover transform group-hover:scale-110 transition duration-500">
        <div
          class="absolute inset-0 bg-black/50 flex flex-col justify-center items-center opacity-0 group-hover:opacity-100 transition-all duration-500">
          <span class="text-green-400 text-lg font-semibold">Cooking Service</span>
          <p class="text-gray-200 text-sm">Our expert chefs in action</p>
        </div>
      </div>

      <div class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
        <img src="https://img.freepik.com/premium-photo/cheerful-plumber-gesturing-ok_23-2147772212.jpg"
          alt="Gallery 3" class="w-full h-60 object-cover transform group-hover:scale-110 transition duration-500">
        <div
          class="absolute inset-0 bg-black/50 flex flex-col justify-center items-center opacity-0 group-hover:opacity-100 transition-all duration-500">
          <span class="text-green-400 text-lg font-semibold">Plumbing</span>
          <p class="text-gray-200 text-sm">Reliable plumbing service</p>
        </div>
      </div>

      <div class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
        <img src="https://img.freepik.com/premium-photo/transport-tourism-road-trip-gesture-people-concept-happy-driver-inviting-board-intercity-bus_380164-169315.jpg"
          alt="Gallery 4" class="w-full h-60 object-cover transform group-hover:scale-110 transition duration-500">
        <div
          class="absolute inset-0 bg-black/50 flex flex-col justify-center items-center opacity-0 group-hover:opacity-100 transition-all duration-500">
          <span class="text-green-400 text-lg font-semibold">Driving</span>
          <p class="text-gray-200 text-sm">Safe & professional drivers</p>
        </div>
      </div>

      <div class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
        <img src="https://img.freepik.com/premium-photo/composite-image-thinking-businessman_1134-28470.jpg"
          alt="Gallery 5" class="w-full h-60 object-cover transform group-hover:scale-110 transition duration-500">
        <div
          class="absolute inset-0 bg-black/50 flex flex-col justify-center items-center opacity-0 group-hover:opacity-100 transition-all duration-500">
          <span class="text-green-400 text-lg font-semibold">Corporate Team</span>
          <p class="text-gray-200 text-sm">Our management team at work</p>
        </div>
      </div>

      <div class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
        <img src="man-fixing-motorcycle-modern-workshop.jpg" alt="Gallery 6"
          class="w-full h-60 object-cover transform group-hover:scale-110 transition duration-500">
        <div
          class="absolute inset-0 bg-black/50 flex flex-col justify-center items-center opacity-0 group-hover:opacity-100 transition-all duration-500">
          <span class="text-green-400 text-lg font-semibold">Mechanical</span>
          <p class="text-gray-200 text-sm">Precision work every time</p>
        </div>
      </div>

      <div class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
        <img src="https://img.freepik.com/free-photo/business-concept-with-team-close-up_23-2149151159.jpg"
          alt="Gallery 7" class="w-full h-60 object-cover transform group-hover:scale-110 transition duration-500">
        <div
          class="absolute inset-0 bg-black/50 flex flex-col justify-center items-center opacity-0 group-hover:opacity-100 transition-all duration-500">
          <span class="text-green-400 text-lg font-semibold">Office Team</span>
          <p class="text-gray-200 text-sm">Collaboration at its best</p>
        </div>
      </div>

      <div class="group relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
        <img src="https://img.freepik.com/free-photo/middle-aged-woman-wearing-apron-holding-bucket-with-cleaning-tools-looking-surprised-while-talking-mobile-phone-standing-white-wall_141793-22785.jpg"
          alt="Gallery 8" class="w-full h-60 object-cover transform group-hover:scale-110 transition duration-500">
        <div
          class="absolute inset-0 bg-black/50 flex flex-col justify-center items-center opacity-0 group-hover:opacity-100 transition-all duration-500">
          <span class="text-green-400 text-lg font-semibold">Housekeeping</span>
          <p class="text-gray-200 text-sm">Efficient & dedicated cleaning</p>
        </div>
      </div>
    </div>
  </div>
</section>

<br><br>
  <!-- End Gallery Section -->




  <!-- fotter -->
  <footer class="bg-[#0f2a35] text-white px-6 py-12">
    <div class="max-w-7xl mx-auto space-y-10">
      <!-- Top Section -->
      <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
        <div>
          <h2 class="text-3xl font-bold">ServiPlus+ <br>Bringing Smart Solutions to
            Your Home </h2>
          <p class="mt-2 text-gray-300"> Book trusted helpers for cleaning, electrical work, plumbing, cooking, and
            driving—right at your home. Fast, easy, and reliable!</p>
        </div>
        <button class="bg-lime-400 text-black px-6 py-3 rounded-full font-semibold shadow hover:bg-lime-300 transition"><a href="Book a consult.html">Book Free Consultation</a>
           <span class="ml-1">»</span>
        </button>
      </div>

      <hr class="border-gray-500">

      <!-- Bottom Section -->
      <div class="grid grid-cols-1 md:grid-cols-4 gap-10 text-sm text-gray-300">
        <!-- Logo & Social -->
        <div class="space-y-4">
          <div class="flex items-center gap-2">
            <span class="text-2xl">∞</span>
            <span class="text-lg font-semibold text-white">Infinity Services</span>
          </div>
          <div class="flex gap-3">
            <a href="#"
              class="border border-lime-400 rounded-full w-10 h-10 flex items-center justify-center text-lime-400 hover:bg-lime-400 hover:text-black transition">Bē</a>
            <a href="#"
              class="border border-lime-400 rounded-full w-10 h-10 flex items-center justify-center text-lime-400 hover:bg-lime-400 hover:text-black transition">in</a>
            <a href="#"
              class="border border-lime-400 rounded-full w-10 h-10 flex items-center justify-center text-lime-400 hover:bg-lime-400 hover:text-black transition">⦿</a>
            <a href="#"
              class="border border-lime-400 rounded-full w-10 h-10 flex items-center justify-center text-lime-400 hover:bg-lime-400 hover:text-black transition">📷</a>
          </div>
        </div>

        <!-- Services -->
        <div class="space-y-2">
          <h3 class="font-semibold text-white">Services</h3>
          <ul class="space-y-1">
            <li>Housekeeping</li>
            <li>Electrician</li>
            <li>Plumbing</li>
            <li>Mechanical</li>
            <li>Cooking</li>
            <li>Driver</li>
          </ul>
        </div>

        <!-- Company -->
        <div class="space-y-2">
          <h3 class="font-semibold text-white">Company</h3>
          <ul class="space-y-1">
            <li class="text-lime-400">Home</li>
            <li> <a href="about.php">About</a></li>
            <li> <a href="All-servic.php">Services</a></li>
            <li><a href="contact.php">Contact</a></li>
          </ul>
        </div>

        <!-- Contact -->
        <div class="space-y-2">
          <h3 class="font-semibold text-white">Contact</h3>
          <p>Bathinda Talwandi-Sabo <br>Chowk zip 151302</p>
          <p>📞 +91 7739495175</p>
          <p>✉️ Injamama484@gmail.com</p>
        </div>
      </div>

      <hr class="border-gray-500">

      <!-- Copyright -->
      <div class="text-center text-sm text-gray-400">
        Copyright © 2026 designed by Injamam Ansari
      </div>
    </div>
  </footer>
  <!-- end footer -->



  
  
  <!-- login backend code  -->


  
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">

<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
        --glass-bg: rgba(255, 255, 255, 0.98);
    }

    /* 1. Modal Overlay */
    .modal-overlay {
        display: none;
        position: fixed;
        top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(15, 23, 42, 0.4); 
        backdrop-filter: blur(12px); 
        justify-content: center; 
        align-items: center; 
        z-index: 100000;
        padding: 20px; /* Mobile par gaps ke liye */
    }

    /* 2. Robot Container */
    #robot-anchor {
        position: relative;
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%; /* Full width container */
        transform: translateY(-120%); 
        transition: transform 0.9s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .robot-active#robot-anchor { 
        transform: translateY(0); 
    }

    /* 3. The Line */
    #line {
        width: 3px;
        height: 80px;
        background: #94a3b8;
    }

    /* 4. Robot Head */
    #main-robot {
        width: 60px; height: 50px;
        background: var(--primary-gradient);
        border-radius: 14px;
        display: flex; justify-content: center; align-items: center;
        box-shadow: 0 10px 25px rgba(99, 102, 241, 0.3);
        position: relative;
        z-index: 10;
    }

    /* 5. Speech Bubble (Responsive Positioning) */
    #bubble {
        position: absolute; 
        left: 75px; top: -5px;
        background: white; padding: 10px 15px;
        border-radius: 15px 15px 15px 0;
        font-size: 12px; font-weight: 700; width: 160px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        opacity: 0; transform: scale(0);
        transition: 0.4s all;
        pointer-events: none;
        color: #1e293b;
    }
    #bubble.show { opacity: 1; transform: scale(1); }

    /* 6. Login Box - Width Updated & Responsive */
    .modal-content {
        background: var(--glass-bg);
        padding: 2.5rem; 
        border-radius: 2rem;
        width: 100%; 
        max-width: 450px; /* Width ko 360px se badha kar 450px kiya */
        text-align: center;
        box-shadow: 0 30px 60px rgba(0, 0, 0, 0.25);
        opacity: 0; 
        transform: translateY(30px);
        transition: all 0.6s ease-out;
        margin-top: -5px;
        border: 1px solid rgba(255,255,255,0.3);
        box-sizing: border-box;
    }

    .form-drop.modal-content { 
        opacity: 1; 
        transform: translateY(0); 
    }

    /* Form Elements */
    .input-group { position: relative; margin-bottom: 1.2rem; text-align: left; }
    .input-group i { position: absolute; left: 1.2rem; top: 50%; transform: translateY(-50%); color: #94a3b8; }
    
    .modal-content input { 
        width: 100%; padding: 1rem 1rem 1rem 3.2rem; 
        border-radius: 12px; border: 1.5px solid #e2e8f0; 
        background: #f8fafc; outline: none; box-sizing: border-box;
        font-size: 1rem;
        transition: 0.3s;
    }
    .modal-content input:focus { border-color: #6366f1; background: #fff; box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1); }

    .modal-content button { 
        width: 100%; padding: 1rem; background: var(--primary-gradient); 
        color: white; border: none; border-radius: 12px; 
        font-size: 1.1rem; font-weight: 700; cursor: pointer; transition: 0.3s;
        box-shadow: 0 8px 20px rgba(99, 102, 241, 0.3);
        margin-top: 0.5rem;
    }
    .modal-content button:hover { transform: translateY(-2px); box-shadow: 0 12px 25px rgba(99, 102, 241, 0.4); }

   .modal-brand {
    font-size: 1.6rem;
    font-weight: 800;
    display: inline-block; /* Gradient text ke liye zaroori hai */
    
    /* 1. Pehle ek solid color dein (Fallback) */
    color: #6366f1; 
    
    /* 2. Gradient apply karein */
    background-image: var(--primary-gradient);
    background-image: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
    
    /* 3. Clipping properties (Sahi order mein) */
    -webkit-background-clip: text;
    background-clip: text;
    
    /* 4. Text fill (Transparent karna zaroori hai taaki peeche ka gradient dikhe) */
    -webkit-text-fill-color: transparent;
    color: transparent; /* Standard property */
}

    /* --- RESPONSIVE MEDIA QUERIES --- */
    @media (max-width: 480px) {
        .modal-content {
            padding: 1.5rem; /* Mobile par padding kam takki space bache */
            max-width: 100%;
        }
        #bubble {
            left: auto; top: -50px; /* Mobile par bubble robot ke upar */
            border-radius: 15px 15px 0 15px;
            width: 130px;
        }
        .modal-brand { font-size: 1.3rem; }
        h3 { font-size: 1.2rem; }
    }

    #main-robot::before, #main-robot::after {
        content: ''; width: 6px; height: 6px; background: white; border-radius: 50%; margin: 0 4px; animation: blink 3s infinite;
    }
    @keyframes blink { 0%, 90%, 100% { transform: scaleY(1); } 95% { transform: scaleY(0.1); } }
</style>

<div class="modal-overlay" id="loginModal">
    <div id="robot-anchor">
        <div id="line"></div>
        <div id="main-robot">
            <div id="bubble">Hey Sir, please log in quickly to go to Serviplus+... 🚀</div>
        </div>
        
        <div class="modal-content" id="login-box">
            <span class="modal-brand">ServiPlus+</span>
            <h3 style="margin: 15px 0 8px; font-weight:800; color: #1e293b; font-size: 1.6rem;">Welcome Back</h3>
            <p style="font-size:13px; color:#64748b; margin-bottom:2rem;">Your premium home services are just one login away.</p>
            
            <form method="post" action="login.php">
                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" placeholder="Email Address" required>
                </div>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <button type="submit">Login to Account</button>
            </form>

            <div style="margin-top:20px; font-size:14px; color: #64748b;">
                New to ServiPlus? <a href="signup.php" style="color:#6366f1; font-weight:700; text-decoration:none;">Create Account</a>
            </div>
        </div>
    </div>
</div>

<script>
    const isLoggedIn = <?= isset($is_logged_in) && $is_logged_in ? 'true' : 'false' ?>;

    if (!isLoggedIn) {
        setTimeout(() => {
            const modal = document.getElementById("loginModal");
            const robot = document.getElementById("robot-anchor");
            const bubble = document.getElementById("bubble");
            const loginBox = document.getElementById("login-box");

            modal.style.display = "flex";
            document.body.style.overflow = "hidden"; 

            setTimeout(() => {
                robot.classList.add('robot-active');
                setTimeout(() => { bubble.classList.add('show'); }, 800);
                setTimeout(() => {
                    loginBox.classList.add('form-drop');
                }, 1400);
            }, 100);
        }, 4000); 
    }
</script>
<!-- end backend -->





<!-- ai agent code  -->


<style>
    /* 1. Robot Widget Container */
    #ai-widget {
        position: fixed;
        bottom: 30px; /* Neeche fix rahega */
        right: 25px;
        z-index: 1000000;
        display: flex;
        flex-direction: column;
        align-items: center;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    /* Jump Animation (8 Seconds ke liye) */
    .bot-jump {
        animation: jump-once 0.8s ease-in-out 10; /* 0.8s * 10 = 8 seconds approx */
    }

    @keyframes jump-once {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-20px); }
    }

    /* Robot Button Style */
    .bot-trigger {
        width: 60px; height: 60px;
        border-radius: 50%;
        background: linear-gradient(135deg, #6366f1, #a855f7);
        border: none;
        color: white;
        font-size: 24px;
        cursor: pointer;
        box-shadow: 0 10px 25px rgba(99, 102, 241, 0.4);
        position: relative;
        transition: 0.3s;
    }
    
    .bot-trigger:hover { transform: scale(1.1); }

    /* 2. Auto Speech Bubble */
    #bot-bubble {
        position: absolute;
        right: 75px;
        bottom: 15px;
        background: white;
        padding: 10px 15px;
        border-radius: 15px 15px 0 15px;
        width: 170px;
        font-size: 13px;
        font-weight: 800;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        color: #1e293b;
        opacity: 0;
        transform: scale(0);
        transition: 0.5s all ease;
        pointer-events: none;
        border: 1px solid #f1f5f9;
    }
    #bot-bubble.show { opacity: 1; transform: scale(1); }

    /* Eyes blinking */
    .bot-trigger::before, .bot-trigger::after {
        content: ''; width: 6px; height: 6px; background: white; border-radius: 50%; position: absolute; top: 22px; animation: blink 3s infinite;
    }
    .bot-trigger::before { left: 20px; }
    .bot-trigger::after { right: 20px; }
    @keyframes blink { 0%, 90%, 100% { transform: scaleY(1); } 95% { transform: scaleY(0.1); } }
</style>

<div id="ai-widget">
    <div id="bot-bubble">Hey, need some help? Talk to me! 🚀</div>
    
    <button class="bot-trigger" id="bot-main-btn" onclick="toggleChat()">
        <i class="fas fa-robot"></i>
    </button>

    <div id="chat-window" style="display: none; position: absolute; bottom: 80px; right: 0; width: 320px; height: 400px; background: white; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.15); flex-direction: column; overflow: hidden; border: 1px solid #eee;">
        <div style="background: linear-gradient(135deg, #6366f1, #a855f7); padding: 15px; color: white; font-weight: bold; display: flex; justify-content: space-between;">
            <span>ServiPlus AI Agent</span>
            <i class="fas fa-volume-up" id="voice-status" style="font-size: 14px; opacity: 0.8;"></i>
        </div>

        <div id="chat-box" style="flex: 1; padding: 15px; overflow-y: auto; background: #f9f9f9; display: flex; flex-direction: column; gap: 10px;">
            <div style="background: #eee; padding: 8px 12px; border-radius: 12px 12px 12px 0; font-size: 13px; align-self: flex-start;">Hi! I'm your assistant. Click the mic to speak!</div>
        </div>

        <div style="padding: 10px; border-top: 1px solid #eee; display: flex; align-items: center; gap: 8px;">
            <button id="start-record" style="background: #f1f5f9; border: none; color: #6366f1; width: 35px; height: 35px; border-radius: 50%; cursor: pointer;">
                <i class="fas fa-microphone" id="mic-icon"></i>
            </button>
            <input type="text" id="ai-input" placeholder="Type or speak..." style="flex: 1; border: none; outline: none; padding: 5px; font-size: 14px;">
            <button onclick="askAI()" style="background: none; border: none; color: #6366f1; cursor: pointer;">
                <i class="fas fa-paper-plane"></i>
            </button>
        </div>
    </div>
</div>

<script>
let isVoiceMode = false;

// 1. Logic for Jumping & Bubble
window.addEventListener('load', () => {
    const botBtn = document.getElementById('bot-main-btn');
    const bubble = document.getElementById('bot-bubble');

    // Page load hote hi jump start (8 seconds approx)
    botBtn.classList.add('bot-jump');

    // 1.5 second baad bubble dikhega
    setTimeout(() => {
        bubble.classList.add('show');
    }, 1500);

    // 8 second baad jump animation rokne ke liye (Optional)
    setTimeout(() => {
        botBtn.classList.remove('bot-jump');
    }, 8500);
});

function toggleChat() {
    const win = document.getElementById('chat-window');
    const bubble = document.getElementById('bot-bubble');
    const botBtn = document.getElementById('bot-main-btn');
    
    if (win.style.display === 'none' || win.style.display === '') {
        win.style.display = 'flex';
        bubble.classList.remove('show'); 
        botBtn.classList.remove('bot-jump'); // Chat khulne par jump rok do
    } else {
        win.style.display = 'none';
    }
}

// --- Voice & Message Logic (Same as your original code) ---
const startBtn = document.getElementById('start-record');
const micIcon = document.getElementById('mic-icon');
const aiInput = document.getElementById('ai-input');

if ('webkitSpeechRecognition' in window) {
    const recognition = new webkitSpeechRecognition();
    recognition.lang = 'en-IN';
    recognition.interimResults = false;

    startBtn.addEventListener('click', function() {
        isVoiceMode = true;
        recognition.start();
        micIcon.style.color = "red";
    });

    recognition.onresult = (event) => {
        const transcript = event.results[0][0].transcript;
        aiInput.value = transcript;
        micIcon.style.color = "#6366f1";
        askAI(); 
    };
    recognition.onerror = () => { micIcon.style.color = "#6366f1"; isVoiceMode = false; };
    recognition.onend = () => { micIcon.style.color = "#6366f1"; };
}

function speakText(text) {
    if (isVoiceMode) {
        window.speechSynthesis.cancel();
        const speech = new SpeechSynthesisUtterance();
        speech.text = text;
        speech.volume = 1;
        speech.rate = 1;
        window.speechSynthesis.speak(speech);
        speech.onend = () => { isVoiceMode = false; };
    }
}

function askAI() {
    const input = document.getElementById('ai-input');
    const box = document.getElementById('chat-box');
    const msg = input.value.trim();
    if(!msg) return;

    box.innerHTML += `<div style="background: #6366f1; color: white; padding: 8px 12px; border-radius: 12px 12px 0 12px; font-size: 13px; align-self: flex-end; margin-bottom:5px;">${msg}</div>`;
    input.value = '';

    fetch('ai_handler.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'message=' + encodeURIComponent(msg)
    })
    .then(res => res.text())
    .then(data => {
        box.innerHTML += `<div style="background: #eee; padding: 8px 12px; border-radius: 12px 12px 12px 0; font-size: 13px; align-self: flex-start; margin-bottom:5px;">${data}</div>`;
        box.scrollTop = box.scrollHeight;
        speakText(data);
    })
    .catch(err => console.error("Error:", err));
}

document.addEventListener('DOMContentLoaded', () => {
    const inputField = document.getElementById('ai-input');
    if(inputField) {
        inputField.addEventListener('keypress', function (e) {
            if (e.key === 'Enter') {
                isVoiceMode = false;
                askAI();
            }
        });
    }
});
</script>
<!-- end ai agent code -->
</body>
<!--navigationbar-->
<script>
  const hamburger = document.querySelector('.hamburger');
  const menu = document.querySelector('.menu');
  const dropdownParents = document.querySelectorAll('.menu > li.has-dropdown > a');

  function toggleMenu() {
    const expanded = hamburger.getAttribute('aria-expanded') === 'true' || false;
    hamburger.setAttribute('aria-expanded', !expanded);
    hamburger.classList.toggle('active');
    menu.classList.toggle('open');
  }

  hamburger.addEventListener('click', toggleMenu);
  hamburger.addEventListener('keydown', (e) => {
    if (e.key === 'Enter' || e.key === ' ') {
      e.preventDefault();
      toggleMenu();
    }
  });

  dropdownParents.forEach(trigger => {
    trigger.addEventListener('click', e => {
      if (window.innerWidth <= 768) {
        e.preventDefault();
        const parentLi = trigger.parentElement;
        const isOpen = parentLi.classList.contains('open');

        if (isOpen) {
          parentLi.classList.remove('open');
          trigger.setAttribute('aria-expanded', 'false');
        } else {
          document.querySelectorAll('.menu > li.has-dropdown.open').forEach(openItem => {
            openItem.classList.remove('open');
            openItem.querySelector('a').setAttribute('aria-expanded', 'false');
          });
          parentLi.classList.add('open');
          trigger.setAttribute('aria-expanded', 'true');
        }
      }
    });

    trigger.addEventListener('keydown', e => {
      if ((e.key === 'Enter' || e.key === ' ') && window.innerWidth <= 768) {
        e.preventDefault();
        trigger.click();
      }
    });
  });

  window.addEventListener('resize', () => {
    if (window.innerWidth > 768) {
      menu.classList.remove('open');
      hamburger.setAttribute('aria-expanded', 'false');
      hamburger.classList.remove('active');
      document.querySelectorAll('.menu > li.has-dropdown.open').forEach(openItem => {
        openItem.classList.remove('open');
        openItem.querySelector('a').setAttribute('aria-expanded', 'false');
      });
    }
  });
</script>
<!-- crousal js -->
 
<!--reviews js  -->
<script>
  const testimonials = [
    {
      image: "https://img.freepik.com/premium-photo/woman-is-preparing-tomato-salad-ripe-vegetables-herbs-aromatic-spices-olive-oil-home-cooking-fresh-ingredients_164638-22393.jpg?ga=GA1.1.1380887713.1745660169&semt=ais_hybrid&w=740",
      photo: "https://randomuser.me/api/portraits/women/44.jpg",
      quote: "“ ⭐️⭐️⭐️⭐️-The cook prepared delicious meals right at home.Convenient and tasty--perfect for busy days! — Sameer P.”",

      name: "Mohan",
      role: "cook customer"
    },
    {
      image: "WhatsApp Image 2025-05-20 at 16.53.44_82908247.jpg",
      photo: "WhatsApp Image 2025-05-20 at 16.53.44_82908247.jpg",
      quote: "“ ⭐️⭐️⭐️⭐️⭐️The electrician fixed our wiring issues quickly and safely.Great service and affordable prices.”. ”",
      name: "Rahul K",
      role: "Electrician"
    },
    {
      image: "https://img.freepik.com/free-photo/middle-aged-woman-wearing-apron-rubber-gloves-holding-bucket-with-cleaning-tools-with-serious-confident-expression-face-standing-orange-wall_141793-22742.jpg?ga=GA1.1.1380887713.1745660169&semt=ais_hybrid&w=740",
      photo: "https://randomuser.me/api/portraits/women/68.jpg",
      quote: "“ ⭐️⭐️⭐️-Very easy to book a cleaner. The professional arrived on time and did an excellent job. Highly recommend! ”",
      name: "Sameer P.",
      role: "Houskeeping"
    }
  ];

  let current = 0;

  function loadTestimonial(index) {
    document.getElementById("testimonial-image").style.backgroundImage = `url('${testimonials[index].image}')`;
    document.getElementById("customer-photo").src = testimonials[index].photo;
    document.getElementById("testimonial-quote").innerText = testimonials[index].quote;
    document.getElementById("testimonial-name").innerText = testimonials[index].name;
    document.getElementById("testimonial-role").innerText = testimonials[index].role;
  }

  function nextTestimonial() {
    current = (current + 1) % testimonials.length;
    loadTestimonial(current);
  }

  function prevTestimonial() {
    current = (current - 1 + testimonials.length) % testimonials.length;
    loadTestimonial(current);
  }

  // Load initial
  window.onload = () => loadTestimonial(current);
</script>
<!-- gallery -->


</html>