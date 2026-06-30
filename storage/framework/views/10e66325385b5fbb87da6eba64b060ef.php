<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ramela Bakery</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Outfit', sans-serif;
            transition: background-color 0.3s ease, color 0.3s ease;
            padding-top: 100px; /* Space for floating navbar */
        }
        
        /* Floating Glassmorphism Navbar */
        .navbar-floating {
            position: fixed;
            top: 20px;
            left: 5%;
            right: 5%;
            width: 90%;
            z-index: 1030;
            border-radius: 50px;
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            padding: 10px 25px;
        }

        .footer {
            background-color: transparent;
            color: #666;
            padding: 30px 0;
            margin-top: 50px;
            border-top: 1px solid rgba(0,0,0,0.05);
        }

        /* Glassmorphism Cards */
        .glass-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.05);
            border-radius: 20px;
        }

        .product-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 20px;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.5);
        }
        .product-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        /* Hover & Interactive Animations */
        .btn, button, input, select, textarea {
            transition: all 0.3s ease;
        }
        .btn:hover, button:not(.navbar-toggler):hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        input:hover, select:hover, textarea:hover {
            border-color: #0d6efd !important;
            box-shadow: 0 0 8px rgba(13,110,253,0.2);
        }
        input:focus, select:focus, textarea:focus {
            box-shadow: 0 0 12px rgba(13,110,253,0.4) !important;
            transform: translateY(-2px);
        }
        .hover-scale {
            transition: transform 0.3s ease, color 0.3s ease;
            display: inline-block;
        }
        .hover-scale:hover {
            transform: scale(1.2);
            color: #0d6efd !important;
        }
        a {
            transition: all 0.3s ease;
        }
        a:not(.btn):not(.navbar-brand):not(.nav-link):not(.hover-scale):not(.card-img-top):hover {
            color: #0d6efd !important;
            transform: translateX(3px);
            display: inline-block;
        }
        .nav-link {
            position: relative;
            transition: color 0.3s ease, transform 0.3s ease;
        }
        .nav-link:hover {
            transform: translateY(-2px);
        }
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 50%;
            background-color: #0d6efd;
            transition: all 0.3s ease;
        }
        .nav-link:hover::after {
            width: 100%;
            left: 0;
        }
        #theme-toggle {
            transition: all 0.3s ease;
        }
        #theme-toggle:hover {
            transform: rotate(30deg) scale(1.1);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        body.dark-mode #theme-toggle:hover {
            box-shadow: 0 5px 15px rgba(255,255,255,0.1);
        }
        
        /* Dark Mode Glassmorphism */
        body.dark-mode {
            background-color: #121212 !important;
            color: #e0e0e0 !important;
        }
        body.dark-mode .navbar-floating {
            background: rgba(30, 30, 36, 0.7) !important;
            border-color: rgba(255, 255, 255, 0.1) !important;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3) !important;
        }
        body.dark-mode .glass-card,
        body.dark-mode .product-card,
        body.dark-mode .dropdown-menu {
            background: rgba(30, 30, 36, 0.7) !important;
            border-color: rgba(255, 255, 255, 0.1) !important;
        }
        body.dark-mode .footer {
            background-color: #1e1e24 !important;
            color: #aaa;
            border-top: 1px solid rgba(255,255,255,0.05) !important;
        }
        body.dark-mode .nav-link-footer {
            color: #aaa !important;
        }
        body.dark-mode .nav-link-footer:hover {
            color: #fff !important;
        }
        body.dark-mode .navbar-brand,
        body.dark-mode .nav-link,
        body.dark-mode .card-title,
        body.dark-mode h1, body.dark-mode h2, body.dark-mode h3, body.dark-mode h4, body.dark-mode h5 {
            color: #ffffff !important;
        }
        body.dark-mode .text-muted {
            color: #999 !important;
        }
        body.dark-mode .dropdown-item {
            color: #e0e0e0;
        }
        body.dark-mode .dropdown-item:hover {
            background-color: rgba(255,255,255,0.1);
        }
        body.dark-mode .btn-outline-primary {
            color: #6ea8fe;
            border-color: #6ea8fe;
        }
        body.dark-mode .btn-outline-primary:hover {
            background-color: #6ea8fe;
            color: #000;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-floating">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="<?php echo e(route('frontend.home')); ?>">
                <img src="<?php echo e(asset('image/logo.png')); ?>" alt="Ramela Bakery" height="35" onerror="this.outerHTML='<span class=\'fw-bold\'>RAMELA BAKERY</span>'">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('frontend.home')); ?>">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('frontend.katalog')); ?>">Katalog Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('frontend.keranjang')); ?>">
                            <i class="bi bi-cart"></i>
                        </a>
                    </li>
                    <?php if(Auth::check() && Auth::user()->role == 2): ?>
                        <li class="nav-item ms-3 dropdown">
                            <a class="nav-link dropdown-toggle btn btn-outline-primary text-primary px-3" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Halo, <?php echo e(Auth::user()->nama); ?>

                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li>
                                    <form action="<?php echo e(route('frontend.logout')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li class="nav-item ms-3">
                            <a class="btn btn-primary rounded-pill px-4" href="<?php echo e(route('frontend.login')); ?>">Login Pelanggan</a>
                        </li>
                    <?php endif; ?>
                    
                    <!-- Dark Mode Toggle -->
                    <li class="nav-item ms-3 d-flex align-items-center">
                        <button id="theme-toggle" class="btn btn-outline-secondary rounded-circle" style="width: 40px; height: 40px; display:flex; align-items:center; justify-content:center;">
                            <i id="theme-icon" class="bi bi-moon-fill"></i>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container my-4 min-vh-100">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <!-- Footer -->
    <footer class="footer mt-auto" style="background-color: #fff; padding: 50px 0 20px 0; border-top: 1px solid rgba(0,0,0,0.05);">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <h4 class="fw-bold mb-3">Ramela Bakery</h4>
                    <p class="text-muted">Menyajikan aneka roti dan kue dengan bahan premium dan cita rasa yang tak terlupakan. Nikmati kelezatan di setiap gigitan.</p>
                </div>
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <h5 class="fw-bold mb-3">Tautan Cepat</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="<?php echo e(route('frontend.home')); ?>" class="text-decoration-none text-muted nav-link-footer">Beranda</a></li>
                        <li class="mb-2"><a href="<?php echo e(route('frontend.katalog')); ?>" class="text-decoration-none text-muted nav-link-footer">Katalog Produk</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <h5 class="fw-bold mb-3">Ikuti Kami</h5>
                    <div class="d-flex gap-3">
                        <a href="https://www.instagram.com/labibbss/" class="text-muted fs-4 hover-scale"><i class="bi bi-instagram"></i></a>
                        <a href="https://www.facebook.com/" class="text-muted fs-4 hover-scale"><i class="bi bi-facebook"></i></a>
                        <a href="https://wa.me/+6281299597075" class="text-muted fs-4 hover-scale"><i class="bi bi-whatsapp"></i></a>
                    </div>
                </div>
            </div>
            <div class="text-center pt-3 border-top">
                <p class="mb-0 text-muted">&copy; <?php echo e(date('Y')); ?> Ramela Bakery. Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Dark Mode Logic -->
    <script>
        const themeToggleBtn = document.getElementById('theme-toggle');
        const themeIcon = document.getElementById('theme-icon');
        const body = document.body;
        
        // Cek localStorage
        const currentTheme = localStorage.getItem('frontend_theme');
        if (currentTheme === 'dark') {
            body.classList.add('dark-mode');
            themeIcon.classList.replace('bi-moon-fill', 'bi-sun-fill');
            themeIcon.classList.add('text-warning');
        }

        themeToggleBtn.addEventListener('click', function() {
            body.classList.toggle('dark-mode');
            if (body.classList.contains('dark-mode')) {
                localStorage.setItem('frontend_theme', 'dark');
                themeIcon.classList.replace('bi-moon-fill', 'bi-sun-fill');
                themeIcon.classList.add('text-warning');
            } else {
                localStorage.setItem('frontend_theme', 'light');
                themeIcon.classList.replace('bi-sun-fill', 'bi-moon-fill');
                themeIcon.classList.remove('text-warning');
            }
        });
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true
        });
    </script>
</body>
</html>
<?php /**PATH D:\PROJECT RADIT\Toko_online-Laravel\resources\views/frontend/layouts/app.blade.php ENDPATH**/ ?>