<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BillSplit - FAQ</title>
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
      margin-bottom: 3rem;
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
    }

    /* Search Section */
    .search-section {
      background: white;
      border: 1px solid var(--gray-200);
      border-radius: var(--border-radius-xl);
      padding: 2rem;
      margin-bottom: 3rem;
      box-shadow: var(--shadow-md);
      text-align: center;
    }

    .search-input {
      border: 2px solid var(--gray-200);
      border-radius: var(--border-radius-lg);
      padding: 0.875rem 1.25rem;
      font-size: 1rem;
      width: 100%;
      max-width: 500px;
      transition: var(--transition);
      background: white;
    }

    .search-input:focus {
      border-color: var(--primary-color);
      box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
      outline: none;
    }

    .search-icon {
      position: absolute;
      right: 1rem;
      top: 50%;
      transform: translateY(-50%);
      color: var(--gray-400);
      font-size: 1.125rem;
    }

    .search-container {
      position: relative;
      display: inline-block;
      width: 100%;
      max-width: 500px;
    }

    /* Accordion */
    .accordion {
      --bs-accordion-border-radius: var(--border-radius-xl);
      --bs-accordion-border-color: var(--gray-200);
    }

    .accordion-item {
      background: white;
      border: 1px solid var(--gray-200);
      border-radius: var(--border-radius-xl) !important;
      margin-bottom: 1rem;
      box-shadow: var(--shadow-md);
      transition: var(--transition);
      overflow: hidden;
    }

    .accordion-item:hover {
      box-shadow: var(--shadow-lg);
      transform: translateY(-2px);
    }

    .accordion-button {
      background: white;
      border: none;
      padding: 1.5rem 2rem;
      font-weight: 600;
      font-size: 1.125rem;
      color: var(--gray-900);
      border-radius: var(--border-radius-xl) !important;
      transition: var(--transition);
      position: relative;
    }

    .accordion-button::after {
      background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23374151'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
      width: 1.25rem;
      height: 1.25rem;
    }

    .accordion-button:not(.collapsed) {
      background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
      color: white;
      box-shadow: none;
    }

    .accordion-button:not(.collapsed)::after {
      background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23ffffff'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
    }

    .accordion-button:focus {
      box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
      border-color: var(--primary-color);
    }

    .accordion-body {
      padding: 2rem;
      background: var(--gray-50);
      color: var(--gray-700);
      line-height: 1.7;
      font-size: 1rem;
    }

    .accordion-body a {
      color: var(--primary-color);
      text-decoration: none;
      font-weight: 600;
    }

    .accordion-body a:hover {
      color: var(--primary-dark);
      text-decoration: underline;
    }

    /* FAQ Icons */
    .faq-icon {
      width: 2.5rem;
      height: 2.5rem;
      background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
      border-radius: 50%;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 1rem;
      margin-right: 1rem;
      flex-shrink: 0;
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

    .btn-warning {
      background: var(--warning-color);
      border-color: var(--warning-color);
      color: white;
    }

    .btn-warning:hover {
      background: #d97706;
      border-color: #d97706;
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

    /* Help Section */
    .help-section {
      background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
      color: white;
      border-radius: var(--border-radius-xl);
      padding: 3rem 2rem;
      text-align: center;
      margin: 3rem 0;
      position: relative;
      overflow: hidden;
    }

    .help-section::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: url('data:image/svg+xml,<svg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><g fill="rgba(255,255,255,0.1)" fill-opacity="0.1"><circle cx="30" cy="30" r="1.5"/></g></svg>') repeat;
      opacity: 0.3;
    }

    .help-content {
      position: relative;
      z-index: 2;
    }

    .help-title {
      font-size: 1.75rem;
      font-weight: 700;
      margin-bottom: 1rem;
    }

    .help-text {
      font-size: 1.125rem;
      margin-bottom: 2rem;
      opacity: 0.9;
    }

    .btn-help {
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
      transition: var(--transition);
    }

    .btn-help:hover {
      background: var(--gray-50);
      color: var(--primary-dark);
      transform: translateY(-2px);
      box-shadow: var(--shadow-xl);
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
      
      .accordion-button {
        padding: 1.25rem 1.5rem;
        font-size: 1rem;
      }
      
      .accordion-body {
        padding: 1.5rem;
      }
      
      .navigation-buttons {
        flex-direction: column;
        align-items: center;
      }
      
      .navigation-buttons .btn {
        width: 100%;
        max-width: 300px;
      }
      
      .search-section {
        padding: 1.5rem;
      }
    }

    @media (max-width: 576px) {
      .page-title {
        font-size: 2rem;
      }
      
      .accordion-button {
        padding: 1rem;
        font-size: 0.95rem;
      }
      
      .accordion-body {
        padding: 1rem;
      }
      
      .help-section {
        padding: 2rem 1rem;
      }
    }

    /* Search Results */
    .no-results {
      text-align: center;
      padding: 3rem 2rem;
      color: var(--gray-500);
    }

    .no-results i {
      font-size: 3rem;
      margin-bottom: 1rem;
      color: var(--gray-400);
    }

    .hidden {
      display: none !important;
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
          <li class="nav-item"><a class="nav-link active" href="faq1.php">FAQ</a></li>
          <li class="nav-item"><a class="nav-link" href="about1.php">About</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <!-- Page Header -->
    <div class="page-header animate-on-scroll">
      <h1 class="page-title">❓ Frequently Asked Questions</h1>
      <p class="page-subtitle">Find answers to common questions about BillSplit and how to use it effectively</p>
    </div>

    <!-- Search Section -->
    <div class="search-section animate-on-scroll">
      <h5 class="mb-3">
        <i class="fas fa-search me-2 text-primary"></i>
        Search FAQ
      </h5>
      <div class="search-container">
        <input type="text" class="search-input" id="faqSearch" placeholder="Type your question here...">
        <i class="fas fa-search search-icon"></i>
      </div>
    </div>

    <!-- FAQ Accordion -->
    <div class="accordion animate-on-scroll" id="faqAccordion">
      <!-- Q1 -->
      <div class="accordion-item" data-keywords="billsplit what is expense manager split">
        <h2 class="accordion-header" id="q1">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#a1" aria-expanded="true" aria-controls="a1">
            <div class="faq-icon">
              <i class="fas fa-info-circle"></i>
            </div>
            What is BillSplit?
          </button>
        </h2>
        <div id="a1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            BillSplit is a real-time shared expense manager that helps you track and split expenses easily among friends, family, or teams. It offers itemized splitting, visual dashboards, and offline functionality to make group expense management effortless and transparent.
          </div>
        </div>
      </div>

      <!-- Q2 -->
      <div class="accordion-item" data-keywords="itemized splitting items individual split calculate">
        <h2 class="accordion-header" id="q2">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#a2" aria-expanded="false" aria-controls="a2">
            <div class="faq-icon">
              <i class="fas fa-list-ul"></i>
            </div>
            How does the itemized splitting work?
          </button>
        </h2>
        <div id="a2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Each expense can be split by item instead of total amount — you can assign different items to different people and calculate the total automatically. This is perfect for restaurant bills where everyone orders different things, or shopping trips where people buy different items.
          </div>
        </div>
      </div>

      <!-- Q3 -->
      <div class="accordion-item" data-keywords="offline mode internet connection sync online">
        <h2 class="accordion-header" id="q3">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#a3" aria-expanded="false" aria-controls="a3">
            <div class="faq-icon">
              <i class="fas fa-wifi"></i>
            </div>
            Can I use it offline?
          </button>
        </h2>
        <div id="a3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Yes! You can add and edit expenses offline — they'll automatically sync when you're back online. This feature is perfect for trips or situations where internet connectivity is limited.
          </div>
        </div>
      </div>

      <!-- Q4 -->
      <div class="accordion-item" data-keywords="data security privacy secure encryption safe">
        <h2 class="accordion-header" id="q4">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#a4" aria-expanded="false" aria-controls="a4">
            <div class="faq-icon">
              <i class="fas fa-shield-alt"></i>
            </div>
            Is my data secure?
          </button>
        </h2>
        <div id="a4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Absolutely. All expense data is stored locally on your browser or securely synced through encryption if cloud sync is enabled. We prioritize your privacy and never share your financial information with third parties.
          </div>
        </div>
      </div>

      <!-- Q5 -->
      <div class="accordion-item" data-keywords="start using getting started begin signup account">
        <h2 class="accordion-header" id="q5">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#a5" aria-expanded="false" aria-controls="a5">
            <div class="faq-icon">
              <i class="fas fa-rocket"></i>
            </div>
            How do I start using BillSplit?
          </button>
        </h2>
        <div id="a5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Just go to our <a href="demo.html">Demo page</a> and start adding expenses — no sign-up required! You can also visit our <a href="index.html">Home page</a> to learn more about all the features available.
          </div>
        </div>
      </div>

      <!-- Q6 -->
      <div class="accordion-item" data-keywords="dashboard charts visualization analytics reports">
        <h2 class="accordion-header" id="q6">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#a6" aria-expanded="false" aria-controls="a6">
            <div class="faq-icon">
              <i class="fas fa-chart-pie"></i>
            </div>
            What insights does the dashboard provide?
          </button>
        </h2>
        <div id="a6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            The dashboard shows visual charts of spending patterns, who owes what to whom, expense breakdowns by person, and settlement recommendations. It helps you understand group spending habits and makes settling up much easier.
          </div>
        </div>
      </div>

      <!-- Q7 -->
      <div class="accordion-item" data-keywords="mobile responsive phone tablet device">
        <h2 class="accordion-header" id="q7">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#a7" aria-expanded="false" aria-controls="a7">
            <div class="faq-icon">
              <i class="fas fa-mobile-alt"></i>
            </div>
            Does BillSplit work on mobile devices?
          </button>
        </h2>
        <div id="a7" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Yes! BillSplit is fully responsive and works seamlessly on all devices including smartphones, tablets, and desktop computers. The interface adapts to your screen size for the best user experience.
          </div>
        </div>
      </div>

      <!-- Q8 -->
      <div class="accordion-item" data-keywords="currency support international money exchange rates">
        <h2 class="accordion-header" id="q8">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#a8" aria-expanded="false" aria-controls="a8">
            <div class="faq-icon">
              <i class="fas fa-dollar-sign"></i>
            </div>
            What currencies are supported?
          </button>
        </h2>
        <div id="a8" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Currently, BillSplit displays amounts in Indian Rupees (₹), but you can enter expenses in any currency. Future updates will include multi-currency support with automatic conversion rates for international groups.
          </div>
        </div>
      </div>
    </div>

    <!-- No Results Message -->
    <div class="no-results hidden" id="noResults">
      <i class="fas fa-search"></i>
      <h5>No matching questions found</h5>
      <p>Try searching with different keywords or browse all questions above.</p>
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
    // Search functionality
    const searchInput = document.getElementById('faqSearch');
    const accordionItems = document.querySelectorAll('.accordion-item');
    const noResults = document.getElementById('noResults');

    searchInput.addEventListener('input', function() {
      const searchTerm = this.value.toLowerCase().trim();
      let hasResults = false;

      accordionItems.forEach(item => {
        const keywords = item.getAttribute('data-keywords').toLowerCase();
        const questionText = item.querySelector('.accordion-button').textContent.toLowerCase();
        const answerText = item.querySelector('.accordion-body').textContent.toLowerCase();
        
        const isMatch = keywords.includes(searchTerm) || 
                       questionText.includes(searchTerm) || 
                       answerText.includes(searchTerm);

        if (searchTerm === '' || isMatch) {
          item.classList.remove('hidden');
          hasResults = true;
        } else {
          item.classList.add('hidden');
        }
      });

      // Show/hide no results message
      if (searchTerm !== '' && !hasResults) {
        noResults.classList.remove('hidden');
      } else {
        noResults.classList.add('hidden');
      }
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

    // Enhanced accordion interactions
    document.querySelectorAll('.accordion-button').forEach(button => {
      button.addEventListener('click', function() {
        // Add subtle animation when opening/closing
        const target = document.querySelector(this.getAttribute('data-bs-target'));
        if (target) {
          setTimeout(() => {
            if (target.classList.contains('show')) {
              target.style.animation = 'fadeInUp 0.3s ease-out';
            }
          }, 50);
        }
      });
    });

    // Clear search on escape key
    searchInput.addEventListener('keydown', function(e) {
      if (e.key === 'Escape') {
        this.value = '';
        this.dispatchEvent(new Event('input'));
        this.blur();
      }
    });

    // Initialize page
    window.addEventListener('load', function() {
      document.body.classList.add('loaded');
    });
  </script>
</body>
</html>