<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BillSplit - Features</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary-color: #2563eb;
      --primary-dark: #1d4ed8;
      --secondary-color: #64748b;
      --accent-color: #06b6d4;
      --success-color: #10b981;
      --warning-color: #f59e0b;
      --danger-color: #ef4444;
      --dark-color: #0f172a;
      --light-color: #f8fafc;
      --white: #ffffff;
      --gray-50: #f8fafc;
      --gray-100: #f1f5f9;
      --gray-200: #e2e8f0;
      --gray-300: #cbd5e1;
      --gray-400: #94a3b8;
      --gray-500: #64748b;
      --gray-600: #475569;
      --gray-700: #334155;
      --gray-800: #1e293b;
      --gray-900: #0f172a;
      --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
      --shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
      --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
      --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
      --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
      --shadow-2xl: 0 25px 50px -12px rgb(0 0 0 / 0.25);
      --border-radius: 0.5rem;
      --border-radius-lg: 0.75rem;
      --border-radius-xl: 1rem;
      --transition: all 0.15s ease-in-out;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
      line-height: 1.6;
      color: var(--gray-900);
      background-color: var(--gray-50);
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
      padding-top: 100px;
    }

    /* Typography */
    h1, h2, h3, h4, h5, h6 {
      font-weight: 700;
      line-height: 1.2;
      color: var(--gray-900);
    }

    .text-primary { color: var(--primary-color) !important; }
    .text-secondary { color: var(--secondary-color) !important; }
    .text-muted { color: var(--gray-500) !important; }

    /* Navbar */
    .navbar {
      background: rgba(255, 255, 255, 0.95) !important;
      backdrop-filter: blur(20px);
      border-bottom: 1px solid var(--gray-200);
      box-shadow: var(--shadow-sm);
      transition: var(--transition);
      padding: 1rem 0;
    }

    .navbar.scrolled {
      background: rgba(255, 255, 255, 0.98) !important;
      box-shadow: var(--shadow-md);
    }

    .navbar-brand {
      font-weight: 800;
      font-size: 1.5rem;
      color: var(--primary-color) !important;
      text-decoration: none;
    }

    .navbar-brand:hover {
      color: var(--primary-dark) !important;
    }

    .navbar-nav .nav-link {
      color: var(--gray-700) !important;
      font-weight: 500;
      font-size: 0.95rem;
      margin: 0 0.5rem;
      padding: 0.5rem 1rem !important;
      border-radius: var(--border-radius);
      transition: var(--transition);
      position: relative;
    }

    .navbar-nav .nav-link:hover {
      color: var(--primary-color) !important;
      background-color: var(--gray-50);
    }

    .navbar-nav .nav-link.active {
      color: var(--primary-color) !important;
      background-color: var(--gray-100);
    }

    /* Hero Section */
    .hero {
      background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
      padding: 8rem 0 6rem;
      color: white;
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
      background: url('data:image/svg+xml,<svg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><g fill="rgba(255,255,255,0.1)" fill-opacity="0.1"><circle cx="30" cy="30" r="1.5"/></g></svg>') repeat;
      opacity: 0.4;
    }

    .hero-content {
      position: relative;
      z-index: 2;
      text-align: center;
    }

    .hero h1 {
      font-size: clamp(2.5rem, 5vw, 3.5rem);
      font-weight: 800;
      margin-bottom: 1.5rem;
      color: white;
      text-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    }

    .hero .lead {
      font-size: clamp(1.1rem, 2vw, 1.3rem);
      margin-bottom: 2rem;
      opacity: 0.95;
      font-weight: 400;
    }

    /* Sections */
    .section {
      padding: 6rem 0;
    }

    .section-header {
      text-align: center;
      margin-bottom: 4rem;
    }

    .section-title {
      font-size: clamp(2rem, 4vw, 2.5rem);
      font-weight: 700;
      margin-bottom: 1rem;
      color: var(--gray-900);
    }

    .section-subtitle {
      font-size: 1.125rem;
      color: var(--gray-600);
      max-width: 600px;
      margin: 0 auto;
    }

    /* Feature Cards */
    .feature-card {
      background: white;
      border: 1px solid var(--gray-200);
      border-radius: var(--border-radius-xl);
      padding: 2.5rem;
      transition: var(--transition);
      height: 100%;
      position: relative;
      overflow: hidden;
    }

    .feature-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 4px;
      background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
      transform: scaleX(0);
      transition: transform 0.3s ease;
    }

    .feature-card:hover {
      border-color: var(--primary-color);
      box-shadow: var(--shadow-xl);
      transform: translateY(-4px);
    }

    .feature-card:hover::before {
      transform: scaleX(1);
    }

    .feature-header {
      display: flex;
      align-items: center;
      gap: 1rem;
      margin-bottom: 2rem;
    }

    .feature-icon {
      width: 3.5rem;
      height: 3.5rem;
      background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
      border-radius: var(--border-radius-lg);
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 1.25rem;
      flex-shrink: 0;
    }

    .feature-card h4 {
      font-size: 1.5rem;
      font-weight: 600;
      margin: 0;
      color: var(--gray-900);
    }

    .problem-benefit {
      margin-bottom: 2rem;
    }

    .problem {
      background: rgba(239, 68, 68, 0.1);
      color: var(--danger-color);
      padding: 1rem;
      border-radius: var(--border-radius);
      border-left: 4px solid var(--danger-color);
      margin-bottom: 1rem;
      font-weight: 500;
    }

    .problem::before {
      content: '⚠️ ';
      margin-right: 0.5rem;
    }

    .benefit {
      background: rgba(16, 185, 129, 0.1);
      color: var(--success-color);
      padding: 1rem;
      border-radius: var(--border-radius);
      border-left: 4px solid var(--success-color);
      font-weight: 500;
    }

    .benefit::before {
      content: '✅ ';
      margin-right: 0.5rem;
    }

    .feature-image {
      border-radius: var(--border-radius-lg);
      overflow: hidden;
      box-shadow: var(--shadow-md);
      transition: var(--transition);
    }

    .feature-image:hover {
      transform: scale(1.02);
      box-shadow: var(--shadow-lg);
    }

    .image-placeholder {
      background: linear-gradient(135deg, var(--gray-100), var(--gray-200));
      height: 250px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--gray-500);
      font-size: 1.125rem;
      font-weight: 500;
    }

    .placeholder-icon {
      font-size: 3rem;
      margin-bottom: 1rem;
      display: block;
      color: var(--gray-400);
    }

    

    /* Footer */
    .footer {
      background: var(--gray-900);
      color: var(--gray-400);
      text-align: center;
      padding: 3rem 0;
      border-top: 1px solid var(--gray-800);
    }

    .footer p {
      margin: 0;
      font-size: 0.95rem;
    }

    .footer .text-danger {
      color: var(--danger-color) !important;
    }

    /* Animations */
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

    .animate-on-scroll {
      opacity: 0;
      transform: translateY(30px);
      transition: all 0.6s ease;
    }

    .animate-on-scroll.animated {
      opacity: 1;
      transform: translateY(0);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .section {
        padding: 4rem 0;
      }
      
      .section-header {
        margin-bottom: 3rem;
      }
      
      .hero {
        padding: 6rem 0 4rem;
      }
      
      .feature-card {
        margin-bottom: 2rem;
        padding: 2rem;
      }
      
      .navbar-nav .nav-link {
        margin: 0.25rem 0;
      }

      .feature-header {
        flex-direction: column;
        text-align: center;
        gap: 1rem;
      }
    }

    @media (max-width: 576px) {
      .hero {
        padding: 4rem 0 3rem;
      }
      
      .section {
        padding: 3rem 0;
      }

      .feature-card {
        padding: 1.5rem;
      }
    }

    /* Utility Classes */
    .text-gradient {
      background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .bg-gradient {
      background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index1.php">
        <i class="fas fa-receipt me-2"></i>BillSplit
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="index1.php">Home</a></li>
          <li class="nav-item"><a class="nav-link active" href="features1.php">Features</a></li>
          <li class="nav-item"><a class="nav-link" href="demo1.php">Expenses</a></li>
          <li class="nav-item"><a class="nav-link" href="dashboard1.php">Dashboard</a></li>
          <li class="nav-item"><a class="nav-link" href="faq1.php">FAQ</a></li>
          <li class="nav-item"><a class="nav-link" href="about1.php">About</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero">
    <div class="container">
      <div class="hero-content">
        <h1>🚀 Features That Make BillSplit Unique</h1>
        <p class="lead">From simple UI to powerful dashboards, we designed everything for YOU.</p>
      </div>
    </div>
  </section>

  <!-- Features Section -->
  <section class="section">
    <div class="container">
      <div class="row g-4">
        <div class="col-lg-6">
          <a href="itemized1.php" style="text-decoration:none; color:inherit;">
          <div class="feature-card animate-on-scroll">
            <div class="feature-header">
              <div class="feature-icon">
                <i class="fas fa-list-ul"></i>
              </div>
              <h4>Itemized Splitting</h4>
            </div>
            <div class="problem-benefit">
              <div class="problem">
                <strong>Problem:</strong> Only total bill splitting available.
              </div>
              <div class="benefit">
                <strong>Benefit:</strong> Split each individual item among selected users fairly.
              </div>
            </div>
            <div class="feature-image">
              <div class="image-placeholder">
                <div>
                  <i class="fas fa-receipt placeholder-icon"></i>
                  Itemized Splitting Preview
                </div>
              </div>
            </div>
          </div>
          </a>
        </div>
        
        <div class="col-lg-6">
          <a href="dashboard1.php" style="text-decoration:none; color:inherit;">
          <div class="feature-card animate-on-scroll">
            <div class="feature-header">
              <div class="feature-icon">
                <i class="fas fa-chart-pie"></i>
              </div>
              <h4>Visual Dashboard</h4>
            </div>
            <div class="problem-benefit">
              <div class="problem">
                <strong>Problem:</strong> Hard to understand balances at a glance.
              </div>
              <div class="benefit">
                <strong>Benefit:</strong> Clear charts show who owes what and overall group spending.
              </div>
            </div>
            <div class="feature-image">
              <div class="image-placeholder">
                <div>
                  <i class="fas fa-chart-bar placeholder-icon"></i>
                  Dashboard Preview
                </div>
              </div>
            </div>
          </div>
          </a>
       
        </div>
      </div>
    </div>
  </section>



  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <p>© 2025 BillSplit | Hackathon Project | Made with <i class="fas fa-heart text-danger"></i></p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Smooth scrolling for anchor links
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

    // Scroll animations
    const observerOptions = {
      threshold: 0.1,
      rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('animated');
        }
      });
    }, observerOptions);

    // Observe all elements with animate-on-scroll class
    document.querySelectorAll('.animate-on-scroll').forEach(el => {
      observer.observe(el);
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

    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Add loading state
    window.addEventListener('load', function() {
      document.body.classList.add('loaded');
    });

    // Feature card interactions
    document.querySelectorAll('.feature-card').forEach(card => {
      card.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-8px)';
      });
      
      card.addEventListener('mouseleave', function() {
        this.style.transform = 'translateY(0)';
      });
    });
  </script>
</body>
</html>