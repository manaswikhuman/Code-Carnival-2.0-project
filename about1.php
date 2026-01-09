<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BillSplit - About Us</title>
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

    /* Page Header */
    .page-header {
      text-align: center;
      margin-bottom: 4rem;
    }

    .page-title {
      font-size: clamp(2.5rem, 5vw, 3.5rem);
      font-weight: 800;
      margin-bottom: 1rem;
      background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .page-subtitle {
      font-size: 1.25rem;
      color: var(--gray-600);
      margin-bottom: 2rem;
      max-width: 600px;
      margin-left: auto;
      margin-right: auto;
    }

    /* Section Cards */
    .section {
      background: white;
      border: 1px solid var(--gray-200);
      border-radius: var(--border-radius-xl);
      padding: 3rem;
      margin-bottom: 2rem;
      box-shadow: var(--shadow-md);
      transition: var(--transition);
      position: relative;
      overflow: hidden;
    }

    .section::before {
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

    .section:hover {
      box-shadow: var(--shadow-lg);
      transform: translateY(-4px);
    }

    .section:hover::before {
      transform: scaleX(1);
    }

    .section-header {
      display: flex;
      align-items: center;
      gap: 1rem;
      margin-bottom: 1.5rem;
    }

    .section-icon {
      width: 3rem;
      height: 3rem;
      background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
      border-radius: var(--border-radius-lg);
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 1.25rem;
    }

    .section-title {
      font-size: 1.75rem;
      font-weight: 700;
      margin: 0;
      color: var(--gray-900);
    }

    .section-content {
      font-size: 1.125rem;
      line-height: 1.7;
      color: var(--gray-700);
    }

    /* Features List */
    .features-list {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .features-list li {
      display: flex;
      align-items: flex-start;
      gap: 1rem;
      padding: 1rem 0;
      border-bottom: 1px solid var(--gray-200);
      transition: var(--transition);
    }

    .features-list li:last-child {
      border-bottom: none;
    }

    .features-list li:hover {
      background: var(--gray-50);
      margin: 0 -1rem;
      padding-left: 1rem;
      padding-right: 1rem;
      border-radius: var(--border-radius);
    }

    .feature-icon {
      width: 2.5rem;
      height: 2.5rem;
      background: linear-gradient(135deg, var(--success-color), #059669);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 1rem;
      flex-shrink: 0;
      margin-top: 0.25rem;
    }

    .feature-content {
      flex: 1;
    }

    .feature-title {
      font-weight: 700;
      color: var(--gray-900);
      margin-bottom: 0.25rem;
    }

    .feature-description {
      color: var(--gray-600);
      font-size: 1rem;
    }

    /* Team Section */
    .team-section {
      text-align: center;
    }

    .team-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 2rem;
      margin-top: 3rem;
    }

    .team-member {
      background: var(--gray-50);
      border-radius: var(--border-radius-xl);
      padding: 2rem;
      transition: var(--transition);
      position: relative;
      overflow: hidden;
    }

    .team-member::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 4px;
      background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
    }

    .team-member:hover {
      background: white;
      box-shadow: var(--shadow-lg);
      transform: translateY(-4px);
    }

    .team-img {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      object-fit: cover;
      margin: 0 auto 1.5rem;
      border: 4px solid white;
      box-shadow: var(--shadow-md);
      background: linear-gradient(135deg, var(--gray-200), var(--gray-300));
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--gray-500);
      font-size: 2rem;
    }

    .team-name {
      font-size: 1.25rem;
      font-weight: 700;
      color: var(--gray-900);
      margin-bottom: 0.5rem;
    }

    .team-role {
      color: var(--gray-600);
      font-size: 1rem;
      font-weight: 500;
    }

    
    /* Buttons */
    .btn {
      border-radius: var(--border-radius-lg);
      padding: 0.75rem 1.5rem;
      font-weight: 600;
      font-size: 1rem;
      transition: var(--transition);
      border: 2px solid transparent;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
    }

    .btn-primary {
      background: var(--primary-color);
      border-color: var(--primary-color);
      color: white;
    }

    .btn-primary:hover {
      background: var(--primary-dark);
      border-color: var(--primary-dark);
      color: white;
      transform: translateY(-2px);
      box-shadow: var(--shadow-lg);
    }

    .btn-secondary {
      background: var(--secondary-color);
      border-color: var(--secondary-color);
      color: white;
    }

    .btn-secondary:hover {
      background: var(--gray-600);
      border-color: var(--gray-600);
      color: white;
      transform: translateY(-2px);
      box-shadow: var(--shadow-lg);
    }

    .btn-success {
      background: var(--success-color);
      border-color: var(--success-color);
      color: white;
    }

    .btn-success:hover {
      background: #059669;
      border-color: #059669;
      color: white;
      transform: translateY(-2px);
      box-shadow: var(--shadow-lg);
    }

    .btn-info {
      background: var(--accent-color);
      border-color: var(--accent-color);
      color: white;
    }

    .btn-info:hover {
      background: #0891b2;
      border-color: #0891b2;
      color: white;
      transform: translateY(-2px);
      box-shadow: var(--shadow-lg);
    }

    .btn-light {
      background: white;
      border-color: var(--gray-300);
      color: var(--gray-700);
    }

    .btn-light:hover {
      background: var(--gray-50);
      border-color: var(--gray-400);
      color: var(--gray-800);
      transform: translateY(-2px);
      box-shadow: var(--shadow-lg);
    }

    /* Footer */
    .footer {
      background: linear-gradient(135deg, var(--gray-900), var(--gray-800));
      color: white;
      text-align: center;
      padding: 3rem 2rem;
      border-radius: var(--border-radius-xl);
      margin-top: 3rem;
      position: relative;
      overflow: hidden;
    }

    .footer::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: url('data:image/svg+xml,<svg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><g fill="rgba(255,255,255,0.05)" fill-opacity="0.1"><circle cx="30" cy="30" r="1.5"/></g></svg>') repeat;
      opacity: 0.3;
    }

    .footer-content {
      position: relative;
      z-index: 2;
    }

    .footer-text {
      font-size: 1.125rem;
      margin: 0;
      opacity: 0.9;
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
      body {
        padding-top: 80px;
      }
      
      .page-title {
        font-size: 2.5rem;
      }
      
      .section {
        padding: 2rem;
      }
      
      .team-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
      }
      
      .navigation-buttons {
        flex-direction: column;
        align-items: center;
      }
      
      .navigation-buttons .btn {
        width: 100%;
        max-width: 300px;
      }
    }

    @media (max-width: 576px) {
      .page-title {
        font-size: 2rem;
      }
      
      .section {
        padding: 1.5rem;
      }
      
      .section-header {
        flex-direction: column;
        text-align: center;
        gap: 0.75rem;
      }
      
      .features-list li {
        flex-direction: column;
        text-align: center;
        gap: 0.75rem;
      }
    }

    /* Stats Animation */
    @keyframes countUp {
      from {
        opacity: 0;
        transform: scale(0.8);
      }
      to {
        opacity: 1;
        transform: scale(1);
      }
    }

    .stats-animation {
      animation: countUp 0.6s ease-out;
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
          <li class="nav-item"><a class="nav-link" href="features1.php">Features</a></li>
          <li class="nav-item"><a class="nav-link" href="demo1.php">Expenses</a></li>
          <li class="nav-item"><a class="nav-link" href="dashboard1.php">Dashboard</a></li>
          <li class="nav-item"><a class="nav-link" href="faq1.php">FAQ</a></li>
          <li class="nav-item"><a class="nav-link active" href="about1.php">About</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <!-- Page Header -->
    <div class="page-header animate-on-scroll">
      <h1 class="page-title">👥 About BillSplit</h1>
      <p class="page-subtitle">Meet the team behind the innovative expense splitting solution that's changing how groups manage money</p>
    </div>

    <!-- Mission Section -->
    <div class="section animate-on-scroll">
      <div class="section-header">
        <div class="section-icon">
          <i class="fas fa-bullseye"></i>
        </div>
        <h2 class="section-title">Our Mission</h2>
      </div>
      <div class="section-content">
        At <strong>BillSplit</strong>, our goal is to make managing shared expenses effortless, transparent, and fair for everyone.
        Whether it's a friends' trip, a group dinner, or a team project, we simplify the process of splitting bills in real time.
        We believe that money management shouldn't create friction between people - it should bring them closer together through trust and transparency.
      </div>
    </div>

    <!-- Features Summary -->
    <div class="section animate-on-scroll">
      <div class="section-header">
        <div class="section-icon">
          <i class="fas fa-star"></i>
        </div>
        <h2 class="section-title">What Makes Us Special</h2>
      </div>
      <ul class="features-list">
        <li>
          <div class="feature-icon">
            <i class="fas fa-list-ul"></i>
          </div>
          <div class="feature-content">
            <div class="feature-title">Itemized Splitting</div>
            <div class="feature-description">Split by individual items, not just totals. Perfect for restaurants and shopping trips.</div>
          </div>
        </li>
        <li>
          <div class="feature-icon">
            <i class="fas fa-chart-pie"></i>
          </div>
          <div class="feature-content">
            <div class="feature-title">Visual Dashboard</div>
            <div class="feature-description">Instantly view who owes whom with beautiful charts and clear balance summaries.</div>
          </div>
        </li>
        <li>
          
          <div class="feature-icon">
            <i class="fas fa-sync-alt"></i>
          </div>
          <div class="feature-content">
            <div class="feature-title">Real-time Updates</div>
            <div class="feature-description">Auto-syncs across all devices when connected, keeping everyone up to date.</div>
          </div>
        </li>
      </ul>
    </div>

    <!-- Team Section -->
    <div class="section team-section animate-on-scroll">
      <div class="section-header">
        <div class="section-icon">
          <i class="fas fa-users"></i>
        </div>
        <h2 class="section-title">Meet Our Team</h2>
      </div>
      <p class="section-content">
        We're a passionate group of developers, designers, and innovators who came together to solve a common problem we all faced.
      </p>
      <div class="team-grid">
        <div class="team-member">
          <div class="team-img">
            <i class="fas fa-user"></i>
          </div>
          <h5 class="team-name">Abhishek Kundal</h5>
          <p class="team-role">Frontend Developer</p>
        </div>
        <div class="team-member">
          <div class="team-img">
            <i class="fas fa-user"></i>
          </div>
          <h5 class="team-name">Dharmil Kotecha</h5>
          <p class="team-role">Backend Engineer</p>
        </div>
        <div class="team-member">
          <div class="team-img">
            <i class="fas fa-user"></i>
          </div>
          <h5 class="team-name">Manaswi Khuman</h5>
          <p class="team-role">UI/UX Designer</p>
        </div>
        <div class="team-member">
          <div class="team-img">
            <i class="fas fa-user"></i>
          </div>
          <h5 class="team-name">Maitri Bhalodi</h5>
          <p class="team-role">Project Manager & QA Tester</p>
        </div>
      </div>
    </div>

    

    <!-- Footer -->
    <footer class="footer">
      <div class="footer-content">
        <p class="footer-text">© 2025 BillSplit | Built for Hackathon Project 💡</p>
      </div>
    </footer>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
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

    // Team member hover effects
    document.querySelectorAll('.team-member').forEach(member => {
      member.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-8px) scale(1.02)';
      });
      
      member.addEventListener('mouseleave', function() {
        this.style.transform = 'translateY(-4px) scale(1)';
      });
    });

    // Feature list animations
    document.querySelectorAll('.features-list li').forEach((item, index) => {
      item.addEventListener('mouseenter', function() {
        const icon = this.querySelector('.feature-icon');
        icon.style.transform = 'scale(1.1) rotate(5deg)';
      });
      
      item.addEventListener('mouseleave', function() {
        const icon = this.querySelector('.feature-icon');
        icon.style.transform = 'scale(1) rotate(0deg)';
      });
    });

    // Staggered animation for team members
    window.addEventListener('load', function() {
      const teamMembers = document.querySelectorAll('.team-member');
      teamMembers.forEach((member, index) => {
        setTimeout(() => {
          member.style.animation = 'fadeInUp 0.6s ease-out forwards';
          member.style.opacity = '1';
        }, index * 200);
      });
    });

    // Add some interactive elements
    document.querySelectorAll('.section').forEach(section => {
      section.addEventListener('mouseenter', function() {
        this.style.borderColor = 'var(--primary-color)';
      });
      
      section.addEventListener('mouseleave', function() {
        this.style.borderColor = 'var(--gray-200)';
      });
    });
  </script>
</body>
</html>