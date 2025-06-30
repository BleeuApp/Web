<!-- filepath: c:\laragon\www\Web\local\resources\views\public_site\landing_india.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Bleeu India – Wellness & Meal Delivery</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 CSS -->
    <link href="{{ Asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ Asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ Asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <style>
        :root {
            --primary: #ff6f00;
            --primary-light: #fff3e0;
            --accent: #388e3c;
            --dark: #212121;
            --light: #f5f5f5;
            --glass-bg: rgba(255, 255, 255, 0.8);
            --glass-border: rgba(255, 255, 255, 0.3);
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #fffde7 0%, #ffe0b2 100%);
            color: var(--dark);
        }

        .navbar {
            background: var(--glass-bg);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--glass-border);
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

        .btn-primary {
            background: var(--primary);
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            font-weight: 600;
        }

        .btn-primary:hover {
            background: #e65100;
        }

        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 7rem 2rem 4rem;
            background: linear-gradient(120deg, #fffde7 0%, #ffe0b2 100%);
        }

        .hero-title {
            font-size: 2.7rem;
            font-weight: 700;
            background: linear-gradient(90deg, var(--primary), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 1.2rem;
        }

        .hero-subtitle {
            font-size: 1.15rem;
            color: #6c757d;
            margin-bottom: 2rem;
        }

        .app-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
            flex-wrap: wrap;
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
            background: var(--accent);
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

        .features {
            padding: 5rem 2rem 3rem;
            background: var(--light);
        }

        .section-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 2.5rem;
            text-align: center;
            color: var(--primary);
        }

        .feature-card {
            background: var(--glass-bg);
            border-radius: 1.5rem;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
            padding: 2rem 1.5rem;
            text-align: center;
            border: 1px solid var(--glass-border);
            margin-bottom: 2rem;
        }

        .feature-icon {
            font-size: 2.2rem;
            color: var(--primary);
            background: var(--primary-light);
            border-radius: 1rem;
            padding: 0.7rem;
            margin-bottom: 1rem;
            display: inline-block;
        }

        .feature-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .feature-desc {
            color: #6c757d;
            font-size: 1rem;
        }

        .footer {
            padding: 3rem 2rem 1rem;
            background: var(--dark);
            color: white;
            text-align: center;
        }

        .footer-logo {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 1rem;
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
        }

        .copyright {
            text-align: center;
            opacity: 0.7;
            font-size: 0.9rem;
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2rem;
            }

            .features {
                padding: 3rem 0.5rem 2rem;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand logo" href="#">
                <div class="logo-icon">
                    <i class="bi bi-heart-pulse-fill"></i>
                </div>
                Bleeu India
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <i class="bi bi-list"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#features">Features</a></li>
                    <li class="nav-item"><a class="nav-link" href="#download">Download</a></li>
                    <li class="nav-item ms-2"><a href="#login" class="btn btn-primary">Get Started</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <h1 class="hero-title">India’s Wellness, <span style="color:var(--accent)">Redefined</span></h1>
                    <p class="hero-subtitle">
                        Indian meals, yoga-inspired fitness, and expert coaching—Bleeu India brings holistic health to
                        your doorstep.
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
                    <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=600&q=80"
                        alt="Bleeu India App Preview" class="img-fluid rounded-4 shadow-lg">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="features">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Made for India, Made for You</h2>
            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-card">
                        <div class="feature-icon"><i class="bi bi-egg-fried"></i></div>
                        <div class="feature-title">Regional Indian Meals</div>
                        <div class="feature-desc">Enjoy healthy, chef-prepared Indian meals from every state, delivered
                            fresh.</div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-card">
                        <div class="feature-icon"><i class="bi bi-yin-yang"></i></div>
                        <div class="feature-title">Yoga & Fitness</div>
                        <div class="feature-desc">Yoga-inspired routines and fitness plans for mind and body wellness.
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-card">
                        <div class="feature-icon"><i class="bi bi-person-video3"></i></div>
                        <div class="feature-title">Ayurvedic Coaching</div>
                        <div class="feature-desc">Personalized guidance from Indian wellness experts and nutritionists.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Download/CTA Section -->
    <section class="features" id="download">
        <div class="container text-center">
            <h2 class="section-title" data-aos="fade-up">Start Your Wellness Journey</h2>
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

    <!-- Login Section -->
    <section class="features" id="login">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="feature-card text-center">
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

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-logo">Bleeu India</div>
        <div class="footer-links">
            <a href="#" class="footer-link">About</a>
            <a href="#" class="footer-link">Features</a>
            <a href="#" class="footer-link">Contact</a>
        </div>
        <div class="social-links">
            <a href="#" class="social-link"><i class="bi bi-facebook"></i></a>
            <a href="#" class="social-link"><i class="bi bi-instagram"></i></a>
            <a href="#" class="social-link"><i class="bi bi-twitter-x"></i></a>
            <a href="#" class="social-link"><i class="bi bi-linkedin"></i></a>
        </div>
        <div class="copyright">
            &copy; {{ date('Y') }} Bleeu India. All rights reserved.
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="{{ Asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ Asset('assets/vendor/aos/aos.js') }}"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true
        });
    </script>
</body>

</html>
