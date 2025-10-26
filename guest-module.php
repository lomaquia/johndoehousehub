<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HouseHub – Guest View</title>

    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;700&family=Roboto:wght@400;500&display=swap"
        rel="stylesheet">

    <style>
        body {
            margin: 0;
            padding-top: 120px;
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(to bottom right, rgba(0, 0, 0, 0.4), rgba(255, 255, 255, 0.2))d;
            background-size: cover;
            background-blend-mode: overlay;
            color: #f0f0f0;
            overflow-x: hidden;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            padding: 0px 30px;
            background: linear-gradient(135deg, #000000ff, #333334ff);
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
            z-index: 1000;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px;
            border-radius: 12px;
        }

        .logo img {
            width: 100px;
            height: 100px;
            border-radius: 12px;
            padding: 4px;
            animation: pulseLogo 4s ease-in-out infinite;
        }

        header h1 {
            margin: 0;
            font-size: 2.5rem;
            font-family: 'Montserrat', sans-serif;
            letter-spacing: 1px;
            color: #3c402a;
        }

        h1 .letter {
            display: inline-block;
            color: white;
            opacity: 0;
            animation: fadeSlideUpLoop 3s ease-in-out infinite;
        }

        .letter:nth-child(1) { animation-delay: 0s; }
        .letter:nth-child(2) { animation-delay: 0.15s; }
        .letter:nth-child(3) { animation-delay: 0.3s; }
        .letter:nth-child(4) { animation-delay: 0.45s; }
        .letter:nth-child(5) { animation-delay: 0.6s; }
        .letter:nth-child(6) { animation-delay: 0.75s; }
        .letter:nth-child(7) { animation-delay: 0.9s; }
        .letter:nth-child(8) { animation-delay: 1.05s; }

        header .subtitle {
            font-size: 1rem;
            font-family: 'Roboto', sans-serif;
            font-style: italic;
            opacity: 0.95;
        }

        .nav-buttons {
            display: flex;
            gap: 15px;
        }

        .nav-btn {
            background: #2c2c2c;
            color: #fff;
            border: 1px solid #555;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 0.9rem;
            font-weight: bold;
            font-family: 'Montserrat', sans-serif;
            transition: all 0.3s ease;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .nav-btn:hover {
            background: #444;
            color: #fff;
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
            border-color: #777;
        }

        .btn {
            background: linear-gradient(135deg, #030303ff, #676765ff);
            color: #fff;
            border: none;
            padding: 12px 28px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: bold;
            font-family: 'Montserrat', sans-serif;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            transition: all 0.4s ease;
        }

        .btn:hover {
            transform: translateY(-3px);
            background: linear-gradient(135deg, #6d6e65ff, #ffffffff);
            box-shadow: 0 8px 25px rgba(192, 193, 190, 0.6);
        }

        .hero {
            padding: 170px 40px;
            text-align: center;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            margin: 20px;
        }

        .hero h2 {
            font-size: 2.5rem;
            font-family: 'Montserrat', sans-serif;
            color: #000;
            margin: 0;
        }

        .hero p {
            font-size: 1.2rem;
            font-family: 'Roboto', sans-serif;
            color: #000;
            margin: 20px 0;
        }

        .content {
            padding: 100px 40px;
        }

        .content h2 {
            font-size: 2.5rem;
            font-family: 'Montserrat', sans-serif;
            color: #000;
            text-align: center;
            margin-bottom: 30px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 24px;
        }

        .house-box {
            position: relative;
            overflow: hidden;
            border-radius: 18px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
            background: #cdcdc0;
            cursor: pointer;
            transition: transform 0.4s ease, box-shadow 0.4s ease;
        }

        .house-box:hover {
            transform: translateY(-10px) scale(1.03);
            box-shadow: 0 25px 40px rgba(0, 0, 0, 0.5);
        }

        .house-image {
            width: 100%;
            height: 220px;
            object-fit: cover;
            border-top-left-radius: 18px;
            border-top-right-radius: 18px;
            transition: transform 0.3s ease-in-out;
        }

        .house-box:hover .house-image {
            transform: scale(1.08);
        }

        .house-overlay {
            padding: 20px;
            background: linear-gradient(to bottom right, #ffffffff, #b9b9b9ff);
            border-bottom-left-radius: 18px;
            border-bottom-right-radius: 18px;
        }

        .house-name {
            font-size: 1.4rem;  
            font-weight: 700;
            color: #000000ff;
            margin: 0 0 8px;
        }

        .house-location {
            font-size: 1rem;
            color: black;
        }

        .about-us, .contact {
            padding: 120px 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            margin: 20px;
            text-align: center;
            position: relative;
        }

        .about-us {
            overflow: hidden;
            backdrop-filter: blur(10px);
            background: linear-gradient(135deg, #f5f5f5 0%, #e8e8e8 100%);
            position: relative;
        }

        .about-us::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(0,140,255,0.1) 0%, transparent 70%);
            animation: rotateGradient 20s linear infinite;
            z-index: 0;
        }

        .about-us > * {
            position: relative;
            z-index: 1;
        }

        @keyframes rotateGradient {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .about-us h2, .contact h2 {
            font-weight: 700;
            font-size: 3rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: #1a1a1a;
            padding: 20px 0;
            display: inline-block;
            position: relative;
            margin-bottom: 20px;
            background: linear-gradient(90deg, #000000, #008cff, #000000);
            background-size: 200% auto;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: textShine 3s ease-in-out infinite;
        }

        @keyframes textShine {
            0% { background-position: 0% center; }
            50% { background-position: 100% center; }
            100% { background-position: 0% center; }
        }

        .about-us h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 4px;
            background: linear-gradient(90deg, transparent, #008cff, transparent);
            animation: expandLine 2s ease-in-out infinite;
        }

        @keyframes expandLine {
            0%, 100% { width: 0%; }
            50% { width: 80%; }
        }

        .about-subtitle {
            font-size: 1.2rem;
            line-height: 1.9;
            color: #2c2c2c;
            font-weight: 400;
            text-align: center;
            max-width: 900px;
            margin: 0 auto 60px;
            letter-spacing: 0.5px;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUpSlow 1s ease-out 0.3s forwards;
        }

        @keyframes fadeInUpSlow {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .about-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 40px;
            max-width: 1100px;
            margin: 0 auto;
            perspective: 1000px;
        }

        @media (max-width: 768px) {
            .about-grid {
                grid-template-columns: 1fr;
            }
        }

        .about-card {
            background: linear-gradient(145deg, #ffffff, #f8f8f8);
            border-radius: 20px;
            padding: 50px 35px;
            text-align: left;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 2px solid transparent;
            position: relative;
            overflow: hidden;
            opacity: 0;
            transform: translateY(50px) rotateX(10deg);
        }

        .about-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(0,140,255,0.1), transparent);
            transition: left 0.5s ease;
        }

        .about-card:hover::before {
            left: 100%;
        }

        .about-card.card-animate {
            opacity: 1;
            transform: translateY(0) rotateX(0);
        }

        .about-card:nth-child(1) {
            animation: cardSlideIn 0.6s ease-out 0.1s forwards;
        }

        .about-card:nth-child(2) {
            animation: cardSlideIn 0.6s ease-out 0.3s forwards;
        }

        .about-card:nth-child(3) {
            animation: cardSlideIn 0.6s ease-out 0.5s forwards;
        }

        .about-card:nth-child(4) {
            animation: cardSlideIn 0.6s ease-out 0.7s forwards;
        }

        @keyframes cardSlideIn {
            to {
                opacity: 1;
                transform: translateY(0) rotateX(0);
            }
        }

        .about-card:hover {
            transform: translateY(-15px) scale(1.02);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            border-color: #008cff;
        }

        .about-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #008cff, #0056b3);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 0 30px 0;
            box-shadow: 0 8px 20px rgba(0, 140, 255, 0.3);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
        }

        .about-icon::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 20px;
            background: linear-gradient(135deg, #008cff, #0056b3);
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .about-card:hover .about-icon {
            transform: scale(1.15) rotate(5deg);
            background: linear-gradient(135deg, #000000, #333334);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.4);
        }

        .about-icon svg {
            position: relative;
            z-index: 1;
            filter: drop-shadow(0 2px 4px rgba(0,0,0,0.2));
        }

        .about-card h3 {
            font-family: 'Montserrat', sans-serif;
            font-size: 1.6rem;
            font-weight: 700;
            color: #1a1a1a;
            margin: 0 0 18px;
            letter-spacing: 0.5px;
            transition: color 0.3s ease;
        }

        .about-card:hover h3 {
            color: #008cff;
        }

        .about-card p {
            font-size: 1.05rem;
            line-height: 1.8;
            color: #555;
            font-family: 'Roboto', sans-serif;
            margin: 0;
        }

        .about-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 4px;
            background: linear-gradient(90deg, #008cff, #0056b3);
            transition: width 0.4s ease;
        }

        .about-card:hover::after {
            width: 100%;
        }

        .contact p {
            font-size: 1rem;
            font-family: 'Roboto', sans-serif;
            color: #000;
            max-width: 600px;
            margin: 0 auto;
        }

        .contact-details {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 40px;
            margin-top: 30px;
        }

        .contact-item {
            background: rgba(255, 255, 255, 0.9);
            border: 2px solid #ddd;
            border-radius: 12px;
            padding: 20px;
            min-width: 250px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: left;
            transition: all 0.4s ease;
            border-top: 4px solid #008cffff;
        }

        .contact-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2);
            border-top-color: #000000;
        }

        .contact-item h3 {
            font-family: 'Montserrat', sans-serif;
            color: #333;
            margin-bottom: 10px;
            border-bottom: 2px solid #ccc;
            padding-bottom: 5px;
        }

        .contact-item p {
            margin: 5px 0;
            color: #555;
        }

        footer {
            background: linear-gradient(135deg, #000000ff, #333334ff);
            color: #fff;
            padding: 40px 150px;
            margin-top: auto;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            box-shadow: 0 -8px 20px rgba(0, 0, 0, 0.4);
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            flex-wrap: wrap;
            gap: 20px;
        }

        .footer-section {
            min-width: 200px;
        }

        .footer-section h3 {
            font-family: 'Montserrat', sans-serif;
            margin-bottom: 15px;
            color: #fff;
        }

        .footer-section ul {
            list-style: none;
            padding: 0;
        }

        .footer-section ul li {
            margin-bottom: 8px;
        }

        .footer-section ul li a {
            color: #ccc;
            text-decoration: none;
            font-family: 'Roboto', sans-serif;
            transition: color 0.3s ease;
        }

        .footer-section ul li a:hover {
            color: #fff;
        }

        .footer-bottom {
            text-align: center;
            margin-top: 20px;
            border-top: 1px solid #555;
            padding-top: 20px;
            font-size: 0.9rem;
            color: #ccc;
        }

        .footer-bottom a {
            color: #ccc;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-bottom a:hover {
            color: #fff;
        }

        #login-toast {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: linear-gradient(135deg, #000000ff, #4c4d4aff);
            color: #fff;
            padding: 15px 24px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
            z-index: 9999;
            font-family: 'Roboto', sans-serif;
            font-size: 1rem;
            opacity: 0;
            display: none;
        }

        @keyframes toastFadeInOut {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            10% {
                opacity: 1;
                transform: translateY(0);
            }
            90% {
                opacity: 1;
                transform: translateY(0);
            }
            100% {
                opacity: 0;
                transform: translateY(20px);
            }
        }

        @keyframes pulseLogo {
            0%, 100% {
                transform: scale(1);
                opacity: 1;
            }
            50% {
                transform: scale(1.05);
                opacity: 0.9;
            }
        }

        .hero, .content, .about-us, .contact {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }

        .hero.visible, .content.visible, .about-us.visible, .contact.visible {
            opacity: 1;
            transform: translateY(0);
        }

        @keyframes fadeSlideUpLoop {
            0% {
                opacity: 0;
                transform: translateY(10px);
            }
            10% {
                opacity: 1;
                transform: translateY(0);
            }
            40% {
                opacity: 1;
            }
            60% {
                opacity: 0;
                transform: translateY(-10px);
            }
            100% {
                opacity: 0;
                transform: translateY(10px);
            }
        }
    </style>
</head>

<body>
    <header>
        <div class="logo">
            <img src="images/newlogoname.png" alt="HouseHub Logo">
            <div>
                <h1>
                    <span class="letter">H</span>
                    <span class="letter">o</span>
                    <span class="letter">u</span>
                    <span class="letter">s</span>
                    <span class="letter">e</span>
                    <span class="letter">H</span>
                    <span class="letter">u</span>
                    <span class="letter">b</span>
                </h1>
            </div>
        </div>
        <nav class="nav-buttons">
            <button class="nav-btn" onclick="scrollToSection('home')">Home</button>
            <button class="nav-btn" onclick="scrollToSection('houses')">Houses</button>
            <button class="nav-btn" onclick="scrollToSection('about')">About Us</button>
            <button class="nav-btn" onclick="scrollToSection('contact')">Contact</button>
        </nav>
    </header>

    <main>
        <section id="home" class="hero">
            <h2>Welcome to HouseHub</h2>
            <p>Discover your dream home with our curated selection of houses and apartments.</p>
            <button class="btn" onclick="redirectToLogin()">Login</button>
        </section>
        <section id="houses" class="content">
            <h2>Featured Houses</h2>
            <div class="grid">
                <div class="house-box" onclick="showLoginToast()">
                    <img src="https://q-xx.bstatic.com/xdata/images/hotel/max500/373762750.jpg?k=354cec9ad2309d8ce4c65daad2b328dfd53353619fc56c51551561ca924469a7&o=" alt="Modern Apartment" class="house-image">
                    <div class="house-overlay">
                        <h3 class="house-name">Modern Apartment</h3>
                        <p class="house-location">Makati City</p>
                    </div>
                </div>
                <div class="house-box" onclick="showLoginToast()">
                    <img src="https://placehold.co/300x200?text=Cozy+Studio" alt="Cozy Studio" class="house-image">
                    <div class="house-overlay">
                        <h3 class="house-name">Cozy Studio</h3>
                        <p class="house-location">Quezon City</p>
                    </div>
                </div>
                <div class="house-box" onclick="showLoginToast()">
                    <img src="https://placehold.co/300x200?text=Luxury+Condo" alt="Luxury Condo" class="house-image">
                    <div class="house-overlay">
                        <h3 class="house-name">Luxury Condo</h3>
                        <p class="house-location">BGC, Taguig</p>
                    </div>
                </div>
                <div class="house-box" onclick="showLoginToast()">
                    <img src="https://placehold.co/300x200?text=Beach+House" alt="Beach House" class="house-image">
                    <div class="house-overlay">
                        <h3 class="house-name">Beach House</h3>
                        <p class="house-location">Batangas</p>
                    </div>
                </div>
            </div>
        </section>
        <section id="about" class="about-us">
            <h2>Why HouseHub Stands Out</h2>
            <p class="about-subtitle">We're committed to providing exceptional service and building lasting relationships with our customers.</p>
            <div class="about-grid">
                <div class="about-card">
                    <div class="about-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                    </div>
                    <h3>Verified Listings</h3>
                    <p>We connect renters and buyers with verified listings across the Philippines, ensuring a seamless and trustworthy experience.</p>
                </div>
                <div class="about-card">
                    <div class="about-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                    </div>
                    <h3>24/7 Support</h3>
                    <p>Our dedicated team of professionals provides personalized support around the clock to help you find your ideal home effortlessly.</p>
                </div>
                <div class="about-card">
                    <div class="about-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="12" y1="1" x2="12" y2="23"></line>
                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                        </svg>
                    </div>
                    <h3>Transparent Pricing</h3>
                    <p>We provide comprehensive listings with transparent pricing and expert advice, prioritizing quality and customer satisfaction.</p>
                </div>
                <div class="about-card">
                    <div class="about-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        </svg>
                    </div>
                    <h3>Trusted Since 2025</h3>
                    <p>Founded in 2025, our mission is to simplify the real estate process with transparency, quality service, and comprehensive support.</p>
                </div>
            </div>
        </section>
        <section id="contact" class="contact">
            <h2>Contact Us</h2>
            <p>Have questions? Reach out to us through the details below. We're here to help you find your ideal home.</p>
            <div class="contact-details">
                <div class="contact-item">
                    <h3>Address</h3>
                    <p>247 Bedana St, Brgy. San Miguel, Pasig City</p>
                    <p>Metro Manila, Pasig City</p>
                </div>
                <div class="contact-item">
                    <h3>Phone</h3>
                    <p>(01) 234 4567</p>
                    <p>0998 765 4321</p>
                    <p>0912 345 6789</p>
                </div>
                <div class="contact-item">
                    <h3>Email</h3>
                    <p>househub@gmail.com</p>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="#home" onclick="scrollToSection('home')">Home</a></li>
                    <li><a href="#houses" onclick="scrollToSection('houses')">Houses</a></li>
                    <li><a href="#about" onclick="scrollToSection('about')">About Us</a></li>
                    <li><a href="#contact" onclick="scrollToSection('contact')">Contact</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Contact Info</h3>
                <p>Phone: (02) 218 4962</p>
                <p>Email: househub@gmail.com</p>
            </div>
            <div class="footer-section">
                <h3>Follow Us</h3>
                <ul>
                    <li><a href="javascript:void(0)">Facebook</a></li>
                    <li><a href="javascript:void(0)">Instagram</a></li>
                    <li><a href="javascript:void(0)">Twitter</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            © 2025 BruceCar. All Rights Reserved. | <a href="javascript:void(0)">Privacy Policy</a> | <a href="javascript:void(0)">Terms of Service</a>
        </div>
    </footer>

    <div id="login-toast">Please login to view property details</div>

    <script>
        function scrollToSection(sectionId) {
            const section = document.getElementById(sectionId);
            if (section) {
                const headerHeight = document.querySelector('header').offsetHeight;
                const sectionTop = section.offsetTop - headerHeight;
                
                window.scrollTo({
                    top: sectionTop,
                    behavior: 'smooth'
                });
            }
        }

        function showLoginToast() {
            const toast = document.getElementById('login-toast');
            toast.style.display = 'block';
            toast.style.animation = 'toastFadeInOut 3s ease-in-out';
            
            setTimeout(() => {
                toast.style.display = 'none';
                toast.style.animation = '';
            }, 3000);
        }

        function redirectToLogin() {
            // Replace with your actual login page URL
            window.location.href = 'login.php';
        }

        // Intersection Observer for scroll animations
        document.addEventListener('DOMContentLoaded', () => {
            const sections = document.querySelectorAll('.hero, .content, .about-us, .contact');
            
            const observerOptions = {
                threshold: 0.15,
                rootMargin: '0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, observerOptions);

            sections.forEach(section => {
                observer.observe(section);
            });
        });
    </script>
</body>

</html>