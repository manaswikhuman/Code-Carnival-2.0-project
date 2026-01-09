<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BillSplit - Smart Bill Splitting Made Easy</title>
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
      background-color: var(--white);
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
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

    /* Profile Dropdown */
    .dropdown-menu {
      border: 1px solid var(--gray-200);
      border-radius: var(--border-radius-lg);
      box-shadow: var(--shadow-xl);
      padding: 0.5rem 0;
      min-width: 220px;
      margin-top: 0.5rem;
    }

    .dropdown-item {
      padding: 0.75rem 1.25rem;
      font-size: 0.95rem;
      color: var(--gray-700);
      transition: var(--transition);
      display: flex;
      align-items: center;
      gap: 0.75rem;
      border-radius: 0;
    }

    .dropdown-item:hover {
      background-color: var(--gray-50);
      color: var(--primary-color);
    }

    .dropdown-item i {
      width: 1rem;
      text-align: center;
    }

    .dropdown-divider {
      margin: 0.5rem 0;
      border-color: var(--gray-200);
    }

    .user-email-display {
      font-size: 0.85rem;
      color: var(--gray-600);
      padding: 0.5rem 1.25rem;
      background-color: var(--gray-50);
      border-bottom: 1px solid var(--gray-200);
      margin-bottom: 0.5rem;
      font-weight: 500;
    }

    .logout-item {
      border-radius: 0 0 var(--border-radius-lg) var(--border-radius-lg) !important;
    }

    .logout-item:hover {
      background-color: var(--danger-color) !important;
      color: white !important;
      border-radius: 0 0 var(--border-radius-lg) var(--border-radius-lg) !important;
    }

    /* Hero Section */
    .hero {
      background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
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
      color: white;
    }

    .hero h1 {
      font-size: clamp(2.5rem, 5vw, 4rem);
      font-weight: 800;
      margin-bottom: 1.5rem;
      color: white;
      text-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    }

    .hero .lead {
      font-size: clamp(1.1rem, 2vw, 1.3rem);
      margin-bottom: 2.5rem;
      opacity: 0.95;
      font-weight: 400;
    }

    .btn-primary-custom {
      background: white;
      color: var(--primary-color);
      border: 2px solid white;
      padding: 0.875rem 2rem;
      font-size: 1rem;
      font-weight: 600;
      border-radius: var(--border-radius-lg);
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      box-shadow: var(--shadow-lg);
      transition: var(--transition);
    }

    .btn-primary-custom:hover {
      background: var(--gray-50);
      color: var(--primary-dark);
      transform: translateY(-2px);
      box-shadow: var(--shadow-xl);
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
      padding: 2.5rem 2rem;
      text-align: center;
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

    .feature-icon {
      width: 4rem;
      height: 4rem;
      background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
      border-radius: var(--border-radius-lg);
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 1.5rem;
      color: white;
      font-size: 1.5rem;
    }

    .feature-card h5 {
      font-size: 1.25rem;
      font-weight: 600;
      margin-bottom: 1rem;
      color: var(--gray-900);
    }

    .feature-card p {
      color: var(--gray-600);
      line-height: 1.6;
      margin: 0;
    }

    /* Steps Section */
    .steps-section {
      background: var(--gray-50);
    }

    .step-card {
      background: white;
      border: 1px solid var(--gray-200);
      border-radius: var(--border-radius-xl);
      padding: 2.5rem 2rem;
      text-align: center;
      transition: var(--transition);
      height: 100%;
    }

    .step-card:hover {
      box-shadow: var(--shadow-lg);
      transform: translateY(-2px);
    }

    .step-number {
      width: 3.5rem;
      height: 3.5rem;
      background: var(--primary-color);
      color: white;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.25rem;
      font-weight: 700;
      margin: 0 auto 1.5rem;
      box-shadow: var(--shadow-md);
    }

    .step-card h5 {
      font-size: 1.25rem;
      font-weight: 600;
      margin-bottom: 1rem;
      color: var(--gray-900);
    }

    .step-card p {
      color: var(--gray-600);
      line-height: 1.6;
      margin: 0;
    }

   
    /* Testimonials */
    .testimonials-section {
      background: var(--gray-50);
    }

    .testimonial-card {
      background: white;
      border: 1px solid var(--gray-200);
      border-radius: var(--border-radius-xl);
      padding: 2.5rem 2rem;
      transition: var(--transition);
      height: 100%;
      position: relative;
    }

    .testimonial-card:hover {
      box-shadow: var(--shadow-lg);
      transform: translateY(-2px);
    }

    .testimonial-quote {
      font-size: 2.5rem;
      color: var(--primary-color);
      opacity: 0.3;
      position: absolute;
      top: 1rem;
      left: 1.5rem;
      font-family: serif;
    }

    .testimonial-text {
      font-style: italic;
      margin-bottom: 1.5rem;
      color: var(--gray-700);
      font-size: 1.125rem;
      line-height: 1.6;
      padding-top: 1rem;
    }

    .testimonial-author {
      display: flex;
      align-items: center;
      gap: 0.75rem;
      font-weight: 600;
      color: var(--gray-900);
    }

    .testimonial-avatar {
      width: 2.5rem;
      height: 2.5rem;
      background: var(--primary-color);
      color: white;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1rem;
    }

    /* CTA Section */
    .cta-section {
      background: linear-gradient(135deg, var(--gray-900) 0%, var(--gray-800) 100%);
      color: white;
      text-align: center;
      position: relative;
      overflow: hidden;
    }

    .cta-section::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: url('data:image/svg+xml,<svg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><g fill="rgba(255,255,255,0.05)" fill-opacity="0.1"><circle cx="30" cy="30" r="1.5"/></g></svg>') repeat;
    }

    .cta-content {
      position: relative;
      z-index: 2;
    }

    .cta-title {
      font-size: clamp(2rem, 4vw, 2.5rem);
      font-weight: 700;
      margin-bottom: 1rem;
      color: white;
    }

    .cta-subtitle {
      font-size: 1.125rem;
      margin-bottom: 2rem;
      opacity: 0.9;
    }

    .btn-cta {
      background: var(--primary-color);
      color: white;
      border: 2px solid var(--primary-color);
      padding: 0.875rem 2rem;
      font-size: 1rem;
      font-weight: 600;
      border-radius: var(--border-radius-lg);
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      transition: var(--transition);
    }

    .btn-cta:hover {
      background: var(--primary-dark);
      border-color: var(--primary-dark);
      color: white;
      transform: translateY(-2px);
      box-shadow: var(--shadow-xl);
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
        min-height: 80vh;
      }
      
      .feature-card,
      .step-card,
      .testimonial-card {
        margin-bottom: 2rem;
      }
      
      .navbar-nav .nav-link {
        margin: 0.25rem 0;
      }
    }

    @media (max-width: 576px) {
      .hero {
        padding: 2rem 0;
      }
      
      .section {
        padding: 3rem 0;
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
    
      width: 100%;
      max-width: 520px;
      height: auto;
      display: block;
      object-fit: contain;
      -webkit-filter: none;
      filter: none;
      image-rendering: -webkit-optimize-contrast;
      image-rendering: crisp-edges;
      border-radius: var(--border-radius-lg);
      margin-left: auto;
      margin-right: auto;
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
          <li class="nav-item"><a class="nav-link active" href="index1.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="features1.php">Features</a></li>
          <li class="nav-item"><a class="nav-link" href="demo1.php">Expenses</a></li>
          <li class="nav-item"><a class="nav-link" href="dashboard1.php">Dashboard</a></li>
          <li class="nav-item"><a class="nav-link" href="faq1.php">FAQ</a></li>
          <li class="nav-item"><a class="nav-link" href="about1.php">About</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-user me-1"></i>Profile
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                  <li><a class="dropdown-item" href="#" id="myProfileBtn" data-bs-toggle="modal" data-bs-target="#profileModal">
                    <i class="fas fa-user-circle"></i> My Profile
                  </a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item logout-item" href="#" id="logoutBtn">
                <i class="fas fa-sign-out-alt"></i> Log Out
              </a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  

  <!-- Hero Section -->
  <section class="hero">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="hero-content">
            <h1>💸 Welcome to BillSplit</h1>
            <p class="lead">The smartest way to split bills with friends — clean, fast, and transparent.</p>
            <a href="features1.php" class="btn-primary-custom">
              Get Started <i class="fas fa-arrow-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-6"> <div class="hero-illustration text-center"> <img src="3d.png" alt="BillSplit illustration" class="img-fluid"> </div> </div>
      </div>
    </div>
  </section>

  <!-- Features Section -->
  <section class="section">
    <div class="container">
      <div class="section-header animate-on-scroll">
        <h2 class="section-title">✨ Why Choose BillSplit?</h2>
        <p class="section-subtitle">Discover the features that make bill splitting effortless and transparent for everyone involved.</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-3 col-md-6">
          <div class="feature-card animate-on-scroll">
            <div class="feature-icon">
              <i class="fas fa-list-ul"></i>
            </div>
           <h5>Itemized Splitting</h5>
            <p>Split each item fairly among selected friends, not just the total bill.</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="feature-card animate-on-scroll">
            <div class="feature-icon">
              <i class="fas fa-chart-pie"></i>
            </div>
            <h5>Visual Dashboard</h5>
            <p>See clear charts of who owes what and total group spending.</p>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- How it Works Section -->
  <section class="section steps-section">
    <div class="container">
      <div class="section-header animate-on-scroll">
        <h2 class="section-title">⚡ How It Works</h2>
        <p class="section-subtitle">Three simple steps to split bills fairly and efficiently with your friends.</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-4">
          <div class="step-card animate-on-scroll">
            <div class="step-number">1</div>
            <h5>Add Expense</h5>
            <p>Enter who paid, how much, and who participated.</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="step-card animate-on-scroll">
            <div class="step-number">2</div>
            <h5>Split Smartly</h5>
            <p>BillSplit divides costs fairly, item by item or total.</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="step-card animate-on-scroll">
            <div class="step-number">3</div>
            <h5>Settle Up</h5>
            <p>View balances and settle payments easily with your friends.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  

  <!-- Testimonials -->
  <section class="section testimonials-section">
    <div class="container">
      <div class="section-header animate-on-scroll">
        <h2 class="section-title">💬 What Users Say</h2>
        <p class="section-subtitle">Hear from our satisfied users who have simplified their bill splitting experience.</p>
      </div>
      <div class="row g-4">
        <div class="col-lg-4">
          <div class="testimonial-card animate-on-scroll">
            <div class="testimonial-quote">"</div>
            <p class="testimonial-text">BillSplit made our group trip so easy. No more money fights!</p>
            <div class="testimonial-author">
              <div class="testimonial-avatar">P</div>
              <div>
                <div>Priya</div>
                <small class="text-muted">Student</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="testimonial-card animate-on-scroll">
            <div class="testimonial-quote">"</div>
            <p class="testimonial-text">Loved the itemized splitting. Perfect for dinners with friends.</p>
            <div class="testimonial-author">
              <div class="testimonial-avatar">R</div>
              <div>
                <div>Raj</div>
                <small class="text-muted">Developer</small>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="testimonial-card animate-on-scroll">
            <div class="testimonial-quote">"</div>
            <p class="testimonial-text">Offline mode was a lifesaver during our trek!</p>
            <div class="testimonial-author">
              <div class="testimonial-avatar">A</div>
              <div>
                <div>Ananya</div>
                <small class="text-muted">Trekker</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA Section -->
  <section class="section cta-section">
    <div class="container">
      <div class="cta-content">
        <h2 class="cta-title">Ready to Try BillSplit?</h2>
        <p class="cta-subtitle">Join thousands of users who've simplified their bill splitting experience</p>
        <a href="features1.php" class="btn-cta">
          Explore Features <i class="fas fa-arrow-right"></i>
        </a>
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
    // My Profile functionality - shows email from login
    document.getElementById('myProfileBtn').addEventListener('click', function(e) {
      e.preventDefault();
      const userEmail = localStorage.getItem('userEmail') || 'No email found';
      alert(`📧 My Profile\n\nEmail: ${userEmail}`);
    });

    // Logout functionality
    document.getElementById('logoutBtn').addEventListener('click', function(e) {
      e.preventDefault();
      
      // Clear user data from localStorage
      localStorage.removeItem('userEmail');
      localStorage.removeItem('isLoggedIn');
      localStorage.removeItem('registeredEmail');
      localStorage.removeItem('registeredName');
      
      // Show logout message
      alert('✅ Successfully logged out!');
      
      // Redirect to login page
      window.location.href = 'login1.php';
    });

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
  </script>
  <!-- Profile Modal -->
  <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="profileModalLabel"><i class="fas fa-user-circle me-2"></i>My Profile & Payments</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="profileEmail" class="form-label">Email</label>
            <input type="email" id="profileEmail" class="form-control" readonly />
          </div>
          <div class="mb-3">
            <label for="upiId" class="form-label">UPI ID</label>
            <input type="text" id="upiId" class="form-control" placeholder="yourupi@bank" />
            <div class="form-text">Enter your UPI ID so friends can pay you quickly.</div>
          </div>
          <div class="mb-3">
            <label class="form-label">Upload UPI QR Code (image)</label>
            <input type="file" id="qrUpload" accept="image/*" class="form-control" />
            <div class="form-text">Optional: upload a QR code image for quick scanning.</div>
          </div>
          <div id="qrPreviewContainer" style="display:none; text-align:center;">
            <p style="font-weight:600;">QR Preview</p>
            <img id="qrPreview" src="#" alt="QR preview" style="max-width:220px; border-radius:8px; box-shadow:var(--shadow-lg);" />
            <div><button id="clearQrBtn" class="btn btn-sm btn-outline-danger mt-2">Remove QR</button></div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" id="saveProfileBtn" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Profile modal behavior: load and save UPI ID + QR image to localStorage
    document.addEventListener('DOMContentLoaded', function() {
      const profileEmailEl = document.getElementById('profileEmail');
      const upiIdEl = document.getElementById('upiId');
      const qrUploadEl = document.getElementById('qrUpload');
      const qrPreview = document.getElementById('qrPreview');
      const qrPreviewContainer = document.getElementById('qrPreviewContainer');
      const clearQrBtn = document.getElementById('clearQrBtn');
      const saveProfileBtn = document.getElementById('saveProfileBtn');

      // Populate email if available
      const savedEmail = localStorage.getItem('registeredEmail') || localStorage.getItem('userEmail') || '';
      profileEmailEl.value = savedEmail;

      // Load saved UPI info
      const savedUpi = localStorage.getItem('userUpiId') || '';
      const savedQr = localStorage.getItem('userUpiQr') || '';
      upiIdEl.value = savedUpi;
      if (savedQr) {
        qrPreview.src = savedQr;
        qrPreviewContainer.style.display = 'block';
      }

      // Handle file upload -> read as data URL and preview
      qrUploadEl.addEventListener('change', function(e) {
        const f = e.target.files && e.target.files[0];
        if (!f) return;
        const reader = new FileReader();
        reader.onload = function(ev) {
          qrPreview.src = ev.target.result;
          qrPreviewContainer.style.display = 'block';
        };
        reader.readAsDataURL(f);
      });

      clearQrBtn.addEventListener('click', function() {
        qrPreview.src = '';
        qrPreviewContainer.style.display = 'none';
        localStorage.removeItem('userUpiQr');
        // Clear file input
        qrUploadEl.value = null;
      });

      saveProfileBtn.addEventListener('click', function() {
        const upi = upiIdEl.value.trim();
        if (upi && !/^\S+@\S+$/.test(upi)) {
          alert('Please enter a valid UPI ID (format: name@bank).');
          return;
        }

        localStorage.setItem('userUpiId', upi);
        // If preview has a data URL, save it too
        if (qrPreview && qrPreview.src && qrPreview.src.startsWith('data:')) {
          try { localStorage.setItem('userUpiQr', qrPreview.src); } catch (err) { console.warn('Could not save QR to localStorage (size?)', err); }
        }

        // Close modal
        var modalEl = document.getElementById('profileModal');
        var modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
        modal.hide();

        alert('Profile saved. Your UPI ID will be used on the payment page.');
      });
    });
  </script>
</body>
</html>