</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4e54c8;
            --secondary-color: #8f94fb;
            --dark-bg: #0a0a0a;
            --card-bg: #1a1a1a;
            --text-color: #ffffff;
        }

        body {
            background-color: var(--dark-bg);
            color: var(--text-color);
            font-family: 'Poppins', sans-serif;
        }

        .hero-section {
            position: relative;
            overflow: hidden;
            background: var(--dark-bg);
            min-height: 100vh;
            padding: 0;
        }

        .hero-content {
            position: relative;
            z-index: 3;
            padding: 0 20px;
        }

        /* Memperbesar ukuran teks */
        .hero-title {
            font-size: 5rem;
            font-weight: 800;
            margin-bottom: 2rem;
            display: flex;  /* Tambahkan ini */
            align-items: center;  /* Tambahkan ini */
            justify-content: center;  /* Tambahkan ini */
            gap: 15px;  /* Tambahkan ini untuk spacing yang konsisten */
        }

        .hero-subtitle {
            font-size: 2rem;
            margin-bottom: 3rem;
            /* Ganti dengan warna solid */
            color: var(--text-color);
            text-align: center;
        }

        .btn-custom {
            font-size: 1.2rem;
            padding: 15px 40px;
        }

        .navbar {
            background-color: rgba(10, 10, 10, 0.95) !important;
            backdrop-filter: blur(10px);
        }

        .nav-link {
            position: relative;
            padding: 6px 15px !important;
            color: var(--text-color) !important;
            background: none !important;
            border: none !important;
            outline: none !important;
        }

        /* Gabungkan semua hover/focus/active states */
        .nav-link:hover,
        .nav-link:focus,
        .nav-link:active,
        .nav-link.active {
            background: none !important;
            color: var(--text-color) !important;
            box-shadow: none !important;
            outline: none !important;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 3px;
            bottom: -5px;
            left: 0;
            background: var(--primary-color);
            transition: width 0.3s ease;
            border-radius: 3px;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        /* Untuk mobile devices */
        @media (max-width: 768px) {
            .nav-link:active::after {
                width: 100%;
            }
        }

        .project-card {
            background: var(--card-bg);
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            transition: all 0.4s ease;
        }

        .project-card:hover {
            transform: translateY(-15px) scale(1.02);
            box-shadow: 0 10px 25px rgba(78, 84, 200, 0.3);
        }

        .card {
            background: var(--card-bg);
            color: var(--text-color);
        }

        .progress {
            height: 8px;
            background-color: #2d2d2d;
            border-radius: 10px;
        }

        .progress-bar {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            border-radius: 10px;
        }

        .btn-custom {
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            border: none;
            color: white;
            padding: 12px 30px;
            border-radius: 30px;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(78, 84, 200, 0.4);
        }

        .form-control {
            background-color: var(--card-bg);
            border: 1px solid #2d2d2d;
            color: var(--text-color);
            padding: 12px;
            border-radius: 10px;
        }

        .form-control:focus {
            background-color: var(--card-bg);
            border-color: var(--primary-color);
            color: var(--text-color);
            box-shadow: 0 0 0 0.25rem rgba(78, 84, 200, 0.25);
        }

        .social-links a {
            display: inline-block;
            width: 40px;
            height: 40px;
            line-height: 40px;
            border-radius: 50%;
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            color: white;
            text-align: center;
            margin: 0 10px;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(78, 84, 200, 0.4);
        }

        .skill-item {
            margin-bottom: 25px;
        }

        .skill-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        /* Typing animation styles */
        .typing-container {
            display: inline-flex;
            align-items: center;
            position: relative;
            height: 100%;
        }

        .typing-text {
            display: inline-block;
            position: relative;
            white-space: nowrap;
            overflow: hidden;
            width: 0;
            animation: typing 5s steps(12) infinite;
            color: var(--primary-color);
            opacity: 1;
        }

        .cursor {
            display: inline-block;
            font-weight: bold;
            font-size: 5rem;
            position: absolute;
            animation: blink 0.7s infinite, moveCursor 5s steps(12) infinite;
            color: var(--primary-color);
            top: 40%;
            transform: translateY(-50%);
            line-height: 1;
            left: 0;
        }

        @keyframes typing {
            0% { 
                width: 0;
                opacity: 1;
            }
            30%, 60% { 
                width: 100%;
                opacity: 1;
            }
            90%, 100% { 
                width: 0;
                opacity: 1;
            }
        }

        @keyframes moveCursor {
            0% { 
                left: 0;
            }
            30%, 60% { 
                left: 100%;
            }
            90%, 100% { 
                left: 0;
            }
        }

        @keyframes blink {
            0%, 100% { 
                opacity: 1;
            }
            50% { 
                opacity: 0;
            }
        }

        /* Mobile responsive */
        @media (max-width: 768px) {
            .typing-text {
                font-size: 2rem;
            }
            
            .cursor {
                font-size: 2.8rem; /* Diubah dari 1.3rem untuk menyesuaikan dengan ukuran mobile hero-title */
            }
        }

        .mouse-particle {
            position: fixed;
            pointer-events: none;
            border-radius: 50%;
            z-index: 2;
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            opacity: 0.6;
            transition: all 0.8s ease;
            transform-origin: center;
        }

        /* Desktop particles */
        @media (min-width: 769px) {
            .mouse-particle {
                transition: all 0.8s ease;
                transform-origin: center;
            }
        }

        /* Mobile particles */
        @media (max-width: 768px) {
            .mouse-particle {
                transition: all 1s ease;
                box-shadow: 0 0 10px rgba(78, 84, 200, 0.3);
            }
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.8rem;
                line-height: 1.2;
                margin-bottom: 1rem;
                flex-direction: column; /* Stack text vertically */
            }
            
            .hero-subtitle {
                font-size: 1.3rem;
                margin-bottom: 2rem;
                /* Hapus gradient dan ganti dengan warna solid */
                color: var(--text-color);
                -webkit-text-fill-color: initial;
            }
            
            /* About Section */
            .skill-item {
                background: rgba(26, 26, 26, 0.5);
                padding: 1rem;
                border-radius: 15px;
                margin-bottom: 1rem;
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.1);
            }
            
            /* Projects Section */
            .project-card {
                margin: 0 1rem;
                transform: scale(0.98);
                transition: transform 0.3s ease;
            }
            
            .project-card:hover {
                transform: scale(1);
            }
            
            .project-card .card-body {
                padding: 1.5rem;
            }
            
            /* Contact Section */
            .form-control {
                font-size: 1rem;
                padding: 1rem;
                margin-bottom: 1rem;
                background: rgba(26, 26, 26, 0.5);
                backdrop-filter: blur(10px);
            }
            
            /* Navigation */
            .navbar-collapse {
                background: rgba(10, 10, 10, 0.95);
                backdrop-filter: blur(10px);
                padding: 1rem;
                border-radius: 15px;
                margin-top: 1rem;
            }
            
            .nav-item {
                margin: 0.5rem 0;
            }
            
            /* Social Links */
            .social-links {
                display: flex;
                justify-content: center;
                gap: 1.5rem;
                margin-top: 2rem;
            }
            
            .social-links a {
                width: 45px;
                height: 45px;
                line-height: 45px;
                font-size: 1.2rem;
            }
            
            /* Section Spacing */
            section {
                padding: 4rem 0;
            }
            
            /* Custom Scrollbar */
            ::-webkit-scrollbar {
                width: 8px;
            }
            
            ::-webkit-scrollbar-track {
                background: var(--dark-bg);
            }
            
            ::-webkit-scrollbar-thumb {
                background: linear-gradient(var(--primary-color), var(--secondary-color));
                border-radius: 4px;
            }
        }

        /* Floating Animation for Cards on Mobile */
        @media (max-width: 768px) {
            @keyframes floatingCard {
                0% { transform: translateY(0); }
                50% { transform: translateY(-10px); }
                100% { transform: translateY(0); }
            }
            
            .project-card {
                animation: floatingCard 3s ease-in-out infinite;
            }
            
            /* Stagger animation for multiple cards */
            .project-card:nth-child(2) {
                animation-delay: 0.2s;
            }
            
            .project-card:nth-child(3) {
                animation-delay: 0.4s;
            }
        }

        /* Enhanced Touch Feedback */
        @media (max-width: 768px) {
            .btn-custom {
                position: relative;
                overflow: hidden;
            }
            
            .btn-custom::after {
                content: '';
                position: absolute;
                top: 50%;
                left: 50%;
                width: 100%;
                height: 100%;
                background: rgba(255, 255, 255, 0.2);
                transform: translate(-50%, -50%) scale(0);
                border-radius: 50%;
                transition: transform 0.5s;
            }
            
            .btn-custom:active::after {
                transform: translate(-50%, -50%) scale(2);
            }
        }

        /* Touch indicator style */
        .touch-indicator {
            position: fixed;
            width: 20px;
            height: 20px;
            background: rgba(78, 84, 200, 0.5);
            border-radius: 50%;
            pointer-events: none;
            z-index: 9999;
            display: none;
        }

        /* Touch Feedback */
        @media (max-width: 768px) {
            /* Haptic touch feedback for interactive elements */
            .project-card,
            .btn-custom,
            .nav-link {
                touch-action: manipulation;
                -webkit-tap-highlight-color: transparent;
            }
            
            /* Active state feedback */
            .project-card:active,
            .btn-custom:active,
            .nav-link:active {
                transform: scale(0.98);
                transition: transform 0.2s ease;
            }
            
            /* Hover state simulation for touch */
            .project-card:active::after,
            .btn-custom:active::after,
            .nav-link:active::after {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(255, 255, 255, 0.1);
                border-radius: inherit;
                pointer-events: none;
            }
        }

        /* Reset style Bootstrap default */
        .navbar-nav .nav-link {
            border: none !important;
            background: none !important;
        }

        /* Style untuk nav-link */
        .nav-link {
            position: relative;
            color: white !important;
            padding: 6px 15px !important;
            border: none !important;  /* Tambahan */
            outline: none !important; /* Tambahan */
        }

        /* Hapus semua style default Bootstrap saat hover/focus/active */
        .nav-link:hover,
        .nav-link:focus,
        .nav-link:active,
        .nav-link.active {
            background: none !important;
            border: none !important;
            box-shadow: none !important;
            outline: none !important; /* Tambahan */
        }

        /* Style untuk garis bawah */
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 3px;
            bottom: -5px;
            left: 0;
            background: var(--primary-color);
            transition: width 0.3s ease;
            border-radius: 3px;
        }

        /* Efek hover - pastikan ini bekerja untuk seluruh area button */
        .nav-link:hover::after {
            width: 100%;
        }

        /* Tambahkan style untuk fancy text */
        .fancy-text-container {
            display: inline-flex;
            position: relative;
        }

        .fancy-text {
            margin-left: 10px;
            position: relative;
        }

        .fancy-text .text-wrapper {
            position: relative;
            display: inline-block;
            padding-top: 0.1em;
            padding-right: 0.05em;
            padding-bottom: 0.15em;
            line-height: 1;
        }

        .fancy-text .letter {
            display: inline-block;
            line-height: 1em;
        }

        .fancy-text .text {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            opacity: 0;
        }

        .fancy-text .text.active {
            position: relative;
            opacity: 1;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .fancy-text {
                font-size: 1.5rem;
            }
        }

        .fancy-subtitle-container {
            display: inline-flex;
            position: relative;
            min-width: 150px; /* Sesuaikan dengan lebar maksimum dari teks terpanjang */
        }

        .fancy-subtitle {
            display: inline-block;
            position: relative;
            white-space: nowrap;
            overflow: hidden;
            width: 0;
            animation: typing 5s steps(12) infinite;
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .fancy-subtitle:nth-child(1) {
            position: relative;
            animation-delay: 2.5s;
        }

        .fancy-subtitle:nth-child(2) {
            animation-delay: 0s;
        }

        /* Tambahkan style untuk cursor */
        .fancy-subtitle::after {
            content: '|';
            position: absolute;
            right: -10px;
            animation: blink 0.7s infinite;
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        @keyframes typing {
            0% { 
                width: 0;
                opacity: 0;
            }
            5% {
                opacity: 1;
            }
            30%, 60% { 
                width: 100%;
                opacity: 1;
            }
            85% {
                opacity: 0;
            }
            90%, 100% { 
                width: 0;
                opacity: 0;
            }
        }

        @keyframes blink {
            0%, 100% { 
                opacity: 1;
            }
            50% { 
                opacity: 0;
            }
        }

        /* Sesuaikan style hero-subtitle yang ada */
        .hero-subtitle {
            font-size: 2rem;
            margin-bottom: 3rem;
            /* Ganti dengan warna solid */
            color: var(--text-color);
            text-align: center;
        }

        /* Mobile responsive */
        @media (max-width: 768px) {
            .hero-subtitle {
                font-size: 1.3rem;
                margin-bottom: 2rem;
                /* Hapus gradient dan ganti dengan warna solid */
                color: var(--text-color);
                -webkit-text-fill-color: initial;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Portfolio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#projects">Projects</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-section d-flex align-items-center">
        <div id="mouseParticles"></div>
        
        <div class="container text-center text-white position-relative hero-content" data-aos="fade-up">
            <h1 class="hero-title">
                Hello,
                <div class="typing-container">
                    <span class="typing-text">I'm Salman</span>
                    <span class="cursor">|</span>
                </div>
            </h1>
            <h2 class="hero-subtitle">Full Stack Developer</h2>
            <a href="#projects" class="btn btn-custom btn-lg">View My Work</a>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5" data-aos="fade-up">About Me</h2>
            <div class="row align-items-center">
                <div class="col-md-6 mb-4" data-aos="fade-right">
                    <img src="profil.png    " alt="Profile" class="img-fluid rounded-3">
                </div>
                <div class="col-md-6" data-aos="fade-left">
                    <h3 class="mb-4">Who Am I?</h3>
                    <p class="lead">I'm a passionate Full Stack Developer with expertise in creating beautiful and functional websites.</p>
                    <div class="mt-4">
                        <h4 class="mb-4">My Skills:</h4>
                        <div class="skill-item">
                            <div class="skill-info">
                                <span>Laravel</span>
                                <span>60%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" style="width: 60%"></div>
                            </div>
                        </div>
                        <div class="skill-item">
                            <div class="skill-info">
                                <span>Flutter</span>
                                <span>40%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" style="width: 40%"></div>
                            </div>
                        </div>
                        <!-- Tambahkan skill lainnya dengan format yang sama -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5" data-aos="fade-up">My Projects</h2>
            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100" data-aos-anchor-placement="top-bottom">
                    <div class="project-card">
                        <img src="https://source.unsplash.com/random/400x300?code" class="card-img-top" alt="Project 1">
                        <div class="card-body">
                            <h5 class="card-title">Project 1</h5>
                            <p class="card-text">A modern web application built with Laravel and Vue.js</p>
                            <a href="#" class="btn btn-custom">View Project</a>
                        </div>
                    </div>
                </div>
                <!-- Tambahkan project cards lainnya -->
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5" data-aos="fade-up">Get In Touch</h2>
            <div class="row justify-content-center">
                <div class="col-md-8" data-aos="fade-up">
                    <form>
                        <div class="mb-4">
                            <input type="text" class="form-control" placeholder="Your Name">
                        </div>
                        <div class="mb-4">
                            <input type="email" class="form-control" placeholder="Your Email">
                        </div>
                        <div class="mb-4">
                            <textarea class="form-control" rows="5" placeholder="Your Message"></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-custom btn-lg">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-4">
        <div class="container text-center">
            <div class="social-links">
                <a href="#"><i class="fab fa-github"></i></a>
                <a href="#"><i class="fab fa-linkedin"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
            <p class="mb-4">&copy; 2024 Salman Firdaus. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS and Font Awesome -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/your-kit-code.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });
    </script>
    <script>
        // Touch and Mouse Particle System
        let lastX = 0;
        let lastY = 0;
        let isMouseStatic = false;
        let staticTimeout;
        let staticInterval;
        const isMobile = 'ontouchstart' in window;
        const heroSection = document.getElementById('home');

        function isInHeroSection(y) {
            const heroRect = heroSection.getBoundingClientRect();
            return y >= heroRect.top && y <= heroRect.bottom;
        }

        // Mouse/touch event handlers
        if (!isMobile) {
            document.addEventListener('mousemove', (e) => {
                if (isInHeroSection(e.clientY)) {
                    lastX = e.clientX;
                    lastY = e.clientY;
                    
                    clearTimeout(staticTimeout);
                    clearInterval(staticInterval);
                    isMouseStatic = false;
                    
                    for (let i = 0; i < 6; i++) {
                        const offsetX = (Math.random() - 0.5) * 80;
                        const offsetY = (Math.random() - 0.5) * 80;
                        createBubbleParticle(e.clientX + offsetX, e.clientY + offsetY);
                    }

                    staticTimeout = setTimeout(() => {
                        isMouseStatic = true;
                        staticInterval = setInterval(() => {
                            if (isMouseStatic && isInHeroSection(lastY)) {
                                for (let i = 0; i < 8; i++) {
                                    const offsetX = (Math.random() - 0.5) * 80;
                                    const offsetY = (Math.random() - 0.5) * 80;
                                    createBubbleParticle(lastX + offsetX, lastY + offsetY);
                                }
                            }
                        }, 170);
                    }, 170);
                }
            });
        } else {
            // Touch events for mobile - diperbarui
            document.addEventListener('touchstart', (e) => {
                const touch = e.touches[0];
                if (isInHeroSection(touch.clientY)) {
                    for (let i = 0; i < 8; i++) {
                        const offsetX = (Math.random() - 0.5) * 80;
                        const offsetY = (Math.random() - 0.5) * 80;
                        createBubbleParticle(touch.clientX + offsetX, touch.clientY + offsetY);
                    }
                }
            });

            document.addEventListener('touchmove', (e) => {
                const touch = e.touches[0];
                if (isInHeroSection(touch.clientY)) {
                    for (let i = 0; i < 8; i++) {
                        const offsetX = (Math.random() - 0.5) * 80;
                        const offsetY = (Math.random() - 0.5) * 80;
                        createBubbleParticle(touch.clientX + offsetX, touch.clientY + offsetY);
                    }
                }
            });
        }

        function createBubbleParticle(x, y) {
            const particle = document.createElement('div');
            particle.className = 'mouse-particle';
            
            // Ukuran yang sama untuk semua kondisi
            const size = Math.random() * 35 + 10; // 10-40px
            
            particle.style.width = `${size}px`;
            particle.style.height = `${size}px`;
            
            particle.style.left = `${x - size/2}px`;
            particle.style.top = `${y - size/2}px`;
            
            document.body.appendChild(particle);
            
            // Tambahkan initial opacity untuk transisi yang lebih smooth
            particle.style.opacity = '0.8';
            
            requestAnimationFrame(() => {
                // Gunakan transition yang lebih smooth
                particle.style.transition = `
                    transform ${isMobile ? '1.5s' : '1.8s'} cubic-bezier(0.4, 0, 0.2, 1),
                    opacity ${isMobile ? '1.5s' : '1.8s'} cubic-bezier(0.4, 0, 0.2, 1)
                `;
                
                particle.style.opacity = '0';
                
                // Tambahkan variasi pergerakan
                const distance = Math.random() * 100 + 80;
                const angle = Math.random() * Math.PI * 2;
                const curve = (Math.random() - 0.5) * 50; // Menambah efek kurva
                
                // Gunakan transform yang lebih kompleks untuk gerakan lebih natural
                particle.style.transform = `
                    translate3d(
                        ${Math.cos(angle) * distance + curve}px,
                        ${Math.sin(angle) * distance - distance/2}px,
                        0
                    )
                    scale(${Math.random() * 1.5 + 0.3})
                    rotate(${Math.random() * 360}deg)
                `;
            });
            
            setTimeout(() => {
                particle.remove();
            }, isMobile ? 1500 : 1800); // Durasi yang lebih panjang
        }

        // Handle visibility change
        document.addEventListener('visibilitychange', () => {
            if (document.hidden) {
                clearTimeout(staticTimeout);
                clearInterval(staticInterval);
                isMouseStatic = false;
                const particles = document.querySelectorAll('.mouse-particle');
                particles.forEach(particle => particle.remove());
            }
        });
    </script>
    <script>
        // Tambahkan konfigurasi AOS untuk mobile
        AOS.init({
            duration: 800,
            once: true,
            offset: 100,
            disable: 'phone' // Disable on phones if performance issues
        });

        // Smooth scroll untuk mobile
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
    </script>
</body>
</html>
