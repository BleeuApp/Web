<!DOCTYPE html>
<html lang="en">

<head>




    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bleeu – Your All-in-One Lifestyle & Fitness App</title>
    <!-- Bootstrap 5 CSS -->

    <link href="{{ Asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ Asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ Asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <!-- Google Fonts (Inter) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- AOS Animation -->
    <link href="{{ Asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">

    <style>
        :root {
            --primary: #4361ee;
            --primary-light: rgba(67, 97, 238, 0.1);
            --accent: #f72585;
            --dark: #14213d;
            --light: #f8f9fa;
            --glass-bg: rgba(255, 255, 255, 0.7);
            --glass-border: rgba(255, 255, 255, 0.3);
            --shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            color: var(--dark);
            overflow-x: hidden;
        }

        /* ===== Glass Effect ===== */
        .glass {
            background: var(--glass-bg);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid var(--glass-border);
            box-shadow: var(--shadow);
            border-radius: 20px;
            overflow: hidden;
        }

        /* ===== Header ===== */
        .navbar {
            padding: 1rem 2rem;
            position: fixed;
            width: 100%;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .navbar.scrolled {
            background: var(--glass-bg);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }

        .logo {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .logo-icon {
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--primary-light);
            border-radius: 10px;
        }

        .nav-link {
            color: var(--dark);
            font-weight: 500;
            margin: 0 0.75rem;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: var(--primary);
        }

        .btn-primary {
            background: var(--primary);
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(67, 97, 238, 0.3);
        }

        /* ===== Hero Section ===== */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 8rem 2rem 4rem;
            position: relative;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            line-height: 1.2;
            background: linear-gradient(90deg, var(--primary), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 1.5rem;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            color: #6c757d;
            margin-bottom: 2rem;
            max-width: 600px;
        }

        .app-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }

        .app-btn {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.25rem;
            border-radius: 12px;
            background: var(--dark);
            color: white;
            font-weight: 500;
            transition: all 0.3s;
        }

        .app-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .app-btn i {
            font-size: 1.5rem;
        }

        .app-btn-text {
            display: flex;
            flex-direction: column;
            font-size: 0.8rem;
        }

        .app-btn-text span:first-child {
            font-size: 0.7rem;
            opacity: 0.8;
        }

        /* ===== Features ===== */
        .features {
            padding: 6rem 2rem;
            background: linear-gradient(180deg, rgba(248, 249, 250, 0) 0%, rgba(233, 236, 239, 0.5) 100%);
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 3rem;
            text-align: center;
            color: var(--dark);
        }

        .feature-card {
            padding: 2rem;
            border-radius: 20px;
            transition: all 0.3s;
            height: 100%;
        }

        .feature-card:hover {
            transform: translateY(-10px);
        }

        .feature-icon {
            width: 60px;
            height: 60px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--primary-light);
            color: var(--primary);
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .feature-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .feature-desc {
            color: #6c757d;
            line-height: 1.6;
        }

        /* ===== Testimonials ===== */
        .testimonials {
            padding: 6rem 2rem;
            background: var(--light);
        }

        .testimonial-card {
            padding: 2rem;
            border-radius: 20px;
        }

        .testimonial-text {
            font-style: italic;
            margin-bottom: 1.5rem;
            color: #495057;
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
            object-fit: cover;
        }

        .author-name {
            font-weight: 600;
        }

        .author-role {
            font-size: 0.9rem;
            color: #6c757d;
        }

        /* ===== CTA Section ===== */
        .cta {
            padding: 6rem 2rem;
            background: linear-gradient(135deg, var(--primary), #3a0ca3);
            color: white;
            text-align: center;
        }

        .cta-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .cta-subtitle {
            font-size: 1.25rem;
            opacity: 0.9;
            margin-bottom: 2rem;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        /* ===== Footer ===== */
        footer {
            padding: 4rem 2rem 2rem;
            background: var(--dark);
            color: white;
        }

        .footer-logo {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            display: inline-block;
        }

        .footer-links {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            justify-content: center;
            margin-bottom: 2rem;
        }

        .footer-link {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-link:hover {
            color: white;
        }

        .social-links {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-bottom: 2rem;
        }

        .social-link {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
        }

        .social-link:hover {
            background: var(--primary);
            transform: translateY(-3px);
        }

        .copyright {
            text-align: center;
            opacity: 0.7;
            font-size: 0.9rem;
        }

        /* ===== Mobile Responsiveness ===== */
        @media (max-width: 992px) {
            .hero-title {
                font-size: 2.8rem;
            }
        }

        @media (max-width: 768px) {
            .hero {
                padding: 6rem 1.5rem 3rem;
                text-align: center;
            }

            .hero-title {
                font-size: 2.5rem;
            }

            .hero-subtitle {
                font-size: 1.1rem;
            }

            .app-buttons {
                justify-content: center;
            }

            .section-title {
                font-size: 2rem;
            }
        }

        @media (max-width: 576px) {
            .navbar {
                padding: 1rem;
            }

            .hero-title {
                font-size: 2rem;
            }

            .app-buttons {
                flex-direction: column;
                gap: 1rem;
            }

            .app-btn {
                justify-content: center;
            }

            .feature-card {
                padding: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <!-- ===== Header ===== -->
    <nav class="navbar navbar-expand-lg glass">
        <div class="container">
            <a class="navbar-brand logo" href="#">
                <div class="logo-icon">
                    <i class="bi bi-heart-pulse-fill"></i>
                </div>
                Bleeu
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <i class="bi bi-list"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimonials">Testimonials</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#download">Download</a>
                    </li>
                    <li class="nav-item ms-2">
                        <a href="#login" class="btn btn-primary">Get Started</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- ===== Hero Section ===== -->
    <section class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <h1 class="hero-title">Transform Your Lifestyle with Bleeu</h1>
                    <p class="hero-subtitle">
                        Personalized meal plans, fitness coaching, and health tracking—all in one app.
                        Achieve your wellness goals with expert guidance.
                    </p>
                    <div class="app-buttons">
                        <a href="#" class="app-btn">
                            <i class="bi bi-apple"></i>
                            <div class="app-btn-text">
                                <span>Download on the</span>
                                <span>App Store</span>
                            </div>
                        </a>
                        <a href="#" class="app-btn">
                            <i class="bi bi-google-play"></i>
                            <div class="app-btn-text">
                                <span>Get it on</span>
                                <span>Google Play</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <img src="https://images.unsplash.com/photo-1546069901-456c5fe22961?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=880&q=80"
                        alt="Bleeu App Preview" class="img-fluid rounded-4 shadow-lg">
                </div>
            </div>
        </div>
    </section>

    <!-- ===== Features ===== -->
    <section class="features" id="features">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Your Complete Wellness Solution</h2>
            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="glass feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-egg-fried"></i>
                        </div>
                        <h3 class="feature-title">Personalized Meal Plans</h3>
                        <p class="feature-desc">
                            Customized nutrition plans based on your goals, allergies, and preferences. Fresh meals
                            delivered weekly.
                        </p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="glass feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-activity"></i>
                        </div>
                        <h3 class="feature-title">Fitness Coaching</h3>
                        <p class="feature-desc">
                            AI-powered workout plans with video tutorials. Track progress and adjust intensity
                            automatically.
                        </p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="glass feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-person-video3"></i>
                        </div>
                        <h3 class="feature-title">1-on-1 Expert Coaching</h3>
                        <p class="feature-desc">
                            Get personalized guidance from certified nutritionists and trainers via video calls.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== Testimonials ===== -->
    <section class="testimonials" id="testimonials">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">What Our Users Say</h2>
            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="glass testimonial-card">
                        <p class="testimonial-text">
                            "Bleeu changed my life! I lost 15kg in 3 months with their meal plans and workouts. The
                            coaches are amazing!"
                        </p>
                        <div class="testimonial-author">
                            <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="User"
                                class="author-avatar">
                            <div>
                                <div class="author-name">Sarah K.</div>
                                <div class="author-role">Fitness Enthusiast</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="glass testimonial-card">
                        <p class="testimonial-text">
                            "As a busy CEO, I don't have time to meal prep. Bleeu's delivery service saves me hours
                            every week!"
                        </p>
                        <div class="testimonial-author">
                            <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="User"
                                class="author-avatar">
                            <div>
                                <div class="author-name">James L.</div>
                                <div class="author-role">Entrepreneur</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="glass testimonial-card">
                        <p class="testimonial-text">
                            "The personalized coaching helped me manage my diabetes better than any dietitian I've
                            worked with before."
                        </p>
                        <div class="testimonial-author">
                            <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="User"
                                class="author-avatar">
                            <div>
                                <div class="author-name">Maria G.</div>
                                <div class="author-role">Health Advocate</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== CTA Section ===== -->
    <section class="cta" id="download">
        <div class="container">
            <h2 class="cta-title" data-aos="fade-up">Ready to Transform Your Life?</h2>
            <p class="cta-subtitle" data-aos="fade-up" data-aos-delay="100">
                Download Bleeu today and get your first week of meals + fitness plan for free!
            </p>
            <div class="app-buttons justify-content-center" data-aos="fade-up" data-aos-delay="200">
                <a href="#" class="app-btn">
                    <i class="bi bi-apple"></i>
                    <div class="app-btn-text">
                        <span>Download on the</span>
                        <span>App Store</span>
                    </div>
                </a>
                <a href="#" class="app-btn">
                    <i class="bi bi-google-play"></i>
                    <div class="app-btn-text">
                        <span>Get it on</span>
                        <span>Google Play</span>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- ===== Login Section ===== -->
    <section class="login-section py-5 bg-light" id="login">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="glass p-5 text-center">
                        <h3 class="mb-4">Partner Access</h3>
                        <a href="{{ Asset('admin') }}" class="btn btn-primary w-100 mb-3">
                            <i class="bi bi-person-gear me-2"></i> Admin Login
                        </a>
                        <a href="{{ Asset(env('store') . '/login') }}" class="btn btn-outline-dark w-100">
                            <i class="bi bi-shop me-2"></i> Store Login
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== Footer ===== -->
    <footer>
        <div class="container">
            <div class="footer-logo">Bleeu</div>
            <div class="footer-links">
                <a href="#" class="footer-link">About</a>
                <a href="#" class="footer-link">Features</a>
                <a href="#" class="footer-link">Pricing</a>
                <a href="#" class="footer-link">Blog</a>
                <a href="#" class="footer-link">Contact</a>
            </div>
            <div class="social-links">
                <a href="#" class="social-link"><i class="bi bi-facebook"></i></a>
                <a href="#" class="social-link"><i class="bi bi-instagram"></i></a>
                <a href="#" class="social-link"><i class="bi bi-twitter-x"></i></a>
                <a href="#" class="social-link"><i class="bi bi-linkedin"></i></a>
            </div>
            <div class="copyright">
                &copy; {{ date('Y') }} Bleeu. All rights reserved.
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="{{ Asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AOS Animation -->
    <script src="{{ Asset('assets/vendor/aos/aos.js') }}"></script>
    <script>
        // Initialize AOS animations
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>

</html>
