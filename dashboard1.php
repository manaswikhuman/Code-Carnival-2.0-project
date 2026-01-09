<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BillSplit</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

    /* Cards */
    .card {
      background: white;
      border: 1px solid var(--gray-200);
      border-radius: var(--border-radius-xl);
      box-shadow: var(--shadow-md);
      transition: var(--transition);
      margin-bottom: 2rem;
      position: relative;
      overflow: hidden;
    }

    .card::before {
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

    .card:hover {
      box-shadow: var(--shadow-lg);
      transform: translateY(-2px);
    }

    .card:hover::before {
      transform: scaleX(1);
    }

    /* Summary Cards */
    .summary-card {
      text-align: center;
      padding: 2rem 1.5rem;
      background: white;
      border: 1px solid var(--gray-200);
      border-radius: var(--border-radius-xl);
      box-shadow: var(--shadow-md);
      transition: var(--transition);
      height: 100%;
      position: relative;
      overflow: hidden;
    }

    .summary-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 4px;
      background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
    }

    .summary-card:hover {
      transform: translateY(-4px);
      box-shadow: var(--shadow-xl);
    }

    .summary-icon {
      width: 4rem;
      height: 4rem;
      background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 1rem;
      color: white;
      font-size: 1.5rem;
    }

    .summary-value {
      font-size: 2rem;
      font-weight: 800;
      color: var(--gray-900);
      margin-bottom: 0.5rem;
    }

    .summary-label {
      font-size: 1rem;
      font-weight: 600;
      color: var(--gray-600);
      margin: 0;
    }

    .summary-change {
      font-size: 0.875rem;
      margin-top: 0.5rem;
    }

    .change-positive {
      color: var(--success-color);
    }

    .change-negative {
      color: var(--danger-color);
    }

    /* Participant Balances */
    .balance-list {
      padding: 0;
      margin: 0;
    }

    .balance-item {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 1rem 1.5rem;
      border-bottom: 1px solid var(--gray-200);
      transition: var(--transition);
    }

    .balance-item:last-child {
      border-bottom: none;
    }

    .balance-item:hover {
      background: var(--gray-50);
    }

    .balance-info {
      display: flex;
      align-items: center;
      gap: 1rem;
    }

    .balance-avatar {
      width: 3rem;
      height: 3rem;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-weight: 700;
      font-size: 1.125rem;
    }

    .balance-positive .balance-avatar {
      background: var(--success-color);
    }

    .balance-negative .balance-avatar {
      background: var(--danger-color);
    }

    .balance-neutral .balance-avatar {
      background: var(--gray-400);
    }

    .balance-name {
      font-weight: 600;
      font-size: 1.125rem;
      color: var(--gray-900);
    }

    .balance-amount {
      font-weight: 700;
      font-size: 1.25rem;
    }

    .balance-positive .balance-amount {
      color: var(--success-color);
    }

    .balance-negative .balance-amount {
      color: var(--danger-color);
    }

    .balance-neutral .balance-amount {
      color: var(--gray-600);
    }

    /* Transaction Items */
    .transaction-item {
      display: flex;
      align-items: center;
      gap: 1rem;
      padding: 1rem 1.5rem;
      border-bottom: 1px solid var(--gray-200);
      transition: var(--transition);
    }

    .transaction-item:last-child {
      border-bottom: none;
    }

    .transaction-item:hover {
      background: var(--gray-50);
    }

    .transaction-icon {
      width: 2.5rem;
      height: 2.5rem;
      background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 0.875rem;
    }

    .transaction-details {
      flex: 1;
    }

    .transaction-description {
      font-weight: 600;
      color: var(--gray-900);
      margin-bottom: 0.25rem;
    }

    .transaction-meta {
      font-size: 0.875rem;
      color: var(--gray-500);
    }

    .transaction-amount {
      font-weight: 700;
      font-size: 1.125rem;
      color: var(--primary-color);
    }

    /* Chart Cards */
    .chart-card {
      padding: 2rem;
      background: white;
      border: 1px solid var(--gray-200);
      border-radius: var(--border-radius-xl);
      box-shadow: var(--shadow-md);
      transition: var(--transition);
      height: 100%;
    }

    .chart-card:hover {
      box-shadow: var(--shadow-lg);
      transform: translateY(-2px);
    }

    .chart-header {
      display: flex;
      align-items: center;
      justify-content: between;
      margin-bottom: 1.5rem;
      padding-bottom: 1rem;
      border-bottom: 1px solid var(--gray-200);
    }

    .chart-title {
      font-size: 1.25rem;
      font-weight: 700;
      color: var(--gray-900);
      margin: 0;
    }

    .chart-container {
      position: relative;
      height: 300px;
      display: flex;
      align-items: center;
      justify-content: center;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .no-data {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100%;
      color: var(--gray-500);
      text-align: center;
    }

    .no-data i {
      font-size: 3rem;
      margin-bottom: 1rem;
      opacity: 0.5;
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

    /* Empty State */
    .empty-state {
      text-align: center;
      padding: 3rem 2rem;
      color: var(--gray-500);
    }

    .empty-state i {
      font-size: 3rem;
      margin-bottom: 1rem;
      color: var(--gray-400);
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
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
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

    @keyframes slideIn {
      from {
        transform: translateX(100%);
        opacity: 0;
      }
      to {
        transform: translateX(0);
        opacity: 1;
      }
    }

    @keyframes slideOut {
      from {
        transform: translateX(0);
        opacity: 1;
      }
      to {
        transform: translateX(100%);
        opacity: 0;
      }
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      body {
        padding-top: 80px;
      }
      
      .page-title {
        font-size: 2.5rem;
      }
      
      .summary-card {
        margin-bottom: 1rem;
      }
      
      .chart-container {
        height: 250px;
      }
    }

    @media (max-width: 576px) {
      .page-title {
        font-size: 2rem;
      }
      
      .summary-card,
      .chart-card {
        padding: 1.5rem;
      }
      
      .chart-container {
        height: 200px;
      }
    }
    /* Dark theme overrides */
    body[data-theme='dark'] {
      --primary-color: #60a5fa;
      --primary-dark: #3b82f6;
      --secondary-color: #94a3b8;
      --accent-color: #22d3ee;
      --success-color: #34d399;
      --warning-color: #fbbf24;
      --danger-color: #f87171;
      --dark-color: #0b1220;
      --light-color: #0b1220;
      --gray-50: #0b1220;
      --gray-100: #0f172a;
      --gray-200: #1f2937;
      --gray-300: #374151;
      --gray-400: #9ca3af;
      --gray-500: #9ca3af;
      --gray-600: #d1d5db;
      --gray-700: #e5e7eb;
      --gray-800: #f3f4f6;
      --gray-900: #f9fafb;
      background-color: var(--gray-100);
      color: var(--gray-900);
    }
    body[data-theme='dark'] .navbar { background: rgba(15,23,42,0.95) !important; border-bottom-color: var(--gray-300); }
    body[data-theme='dark'] .card,
    body[data-theme='dark'] .summary-card,
    body[data-theme='dark'] .chart-card { background: var(--gray-100); border-color: var(--gray-300); }
    body[data-theme='dark'] .list-group-item { background: var(--gray-100); border-bottom-color: var(--gray-300); }
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">
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
          <li class="nav-item"><a class="nav-link active" href="dashboard1.php">Dashboard</a></li>
          <li class="nav-item"><a class="nav-link" href="faq1.php">FAQ</a></li>
          <li class="nav-item"><a class="nav-link" href="about1.php">About</a></li>
        </ul>
        
      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
            <button id="syncBtn" class="btn btn-primary btn-sm ms-2" onclick="syncData()">
              <i class="fas fa-sync-alt me-1"></i>Sync Data
            </button>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <!-- Page Header -->
    <div class="page-header animate-on-scroll">
      <h1 class="page-title">📊 Expense Dashboard</h1>
      <p class="page-subtitle">Track participant expenses, balances, and group spending analytics</p>
    </div>

    <!-- Summary Cards -->
    <div class="row g-4 mb-4">
      <div class="col-md-4">
        <div class="summary-card animate-on-scroll">
          <div class="summary-icon">
            <i class="fas fa-money-bill-wave"></i>
          </div>
          <div class="summary-value" id="totalExpenses">₹0.00</div>
          <div class="summary-label">Total Expenses</div>
          <div class="summary-change change-positive" id="totalChange">
            <i class="fas fa-arrow-up me-1"></i>Start adding expenses
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="summary-card animate-on-scroll">
          <div class="summary-icon">
            <i class="fas fa-users"></i>
          </div>
          <div class="summary-value" id="totalParticipants">0</div>
          <div class="summary-label">Active Participants</div>
          <div class="summary-change change-positive" id="participantChange">
            <i class="fas fa-arrow-up me-1"></i>No participants yet
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="summary-card animate-on-scroll">
          <div class="summary-icon">
            <i class="fas fa-balance-scale"></i>
          </div>
          <div class="summary-value" id="balanceOverview">₹0.00</div>
          <div class="summary-label">Pending Settlements</div>
          <div class="summary-change change-positive" id="balanceChange">
            <i class="fas fa-arrow-up me-1"></i>All settled
          </div>
        </div>
      </div>
    </div>

    <!-- Leaderboard & Badges -->
    <div class="row g-4 mb-4">
      <div class="col-lg-6">
        <div class="card animate-on-scroll">
          <div class="d-flex align-items-center justify-content-between p-3 border-bottom">
            <h5 class="mb-0"><i class="fas fa-trophy me-2 text-primary"></i>Leaderboard (Total Paid)</h5>
          </div>
          <div id="leaderboardList" class="list-group"></div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card animate-on-scroll">
          <div class="d-flex align-items-center justify-content-between p-3 border-bottom">
            <h5 class="mb-0"><i class="fas fa-award me-2 text-primary"></i>Badges</h5>
          </div>
          <div id="badgesList" class="p-3"></div>
        </div>
      </div>
    </div>

    <!-- Participant Balances -->
    <div class="card animate-on-scroll">
      <div class="card-body p-0">
        <div class="d-flex align-items-center justify-content-between p-3 border-bottom">
          <h5 class="mb-0">
            <i class="fas fa-users me-2 text-primary"></i>
            Participant Balances
          </h5>
          <div class="d-flex gap-2">
            <button id="refreshBalancesBtn" class="btn btn-sm btn-outline-primary" onclick="refreshBalances()">
              <i class="fas fa-sync-alt me-1"></i>Refresh
            </button>
            <button id="remindAllBtn" class="btn btn-sm btn-outline-secondary" onclick="remindAll()">
              <i class="fas fa-paper-plane me-1"></i>Remind All
            </button>
            <button id="exportBalancesBtn" class="btn btn-sm btn-outline-success" onclick="exportBalancesCSV()">
              <i class="fas fa-file-csv me-1"></i>Export Balances
            </button>
          </div>
        </div>
        <div class="balance-list" id="balanceList">
          <div class="empty-state">
            <i class="fas fa-users"></i>
            <p>No participants yet</p>
            <small>Add expenses to see participant balances</small>
          </div>
        </div>
      </div>
    </div>

    <!-- Recent Transactions -->
    <div class="card animate-on-scroll">
      <div class="card-body p-0">
        <div class="d-flex align-items-center justify-content-between p-3 border-bottom">
          <h5 class="mb-0">
            <i class="fas fa-history me-2 text-primary"></i>
            Recent Transactions
          </h5>
          <span id="transactionCount" class="badge bg-primary">0 transactions</span>
        </div>
        <div id="transactionList">
          <div class="empty-state">
            <i class="fas fa-receipt"></i>
            <p>No transactions yet</p>
            <small>Add participant expenses to see transactions</small>
          </div>
        </div>
      </div>
    </div>

    <!-- Activity Feed -->
    <div class="card animate-on-scroll">
      <div class="card-body p-0">
        <div class="d-flex align-items-center justify-content-between p-3 border-bottom">
          <h5 class="mb-0">
            <i class="fas fa-stream me-2 text-primary"></i>
            Activity Feed
          </h5>
          <div class="d-flex gap-2">
            <a class="btn btn-sm btn-outline-success" href="/api/exports.php?type=reminders">
              <i class="fas fa-file-csv me-1"></i>Export Reminders
            </a>
            <button class="btn btn-sm btn-outline-primary" onclick="loadActivities()">
              <i class="fas fa-rotate me-1"></i>Refresh
            </button>
          </div>
        </div>
        <div id="activityList" class="list-group"></div>
      </div>
    </div>

    <!-- Charts -->
    <div class="row g-4 mb-4">
      <div class="col-lg-6">
        <div class="chart-card animate-on-scroll">
          <div class="chart-header">
            <h5 class="chart-title">
              <i class="fas fa-chart-pie me-2 text-primary"></i>
              Expenses by Participant
            </h5>
          </div>
          <div class="chart-container">
            <canvas id="expensesChart"></canvas>
            <div id="noDataMessage" class="no-data">
              <i class="fas fa-chart-pie"></i>
              <p>No expenses yet</p>
              <small>Add participant expenses to see the chart</small>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="chart-card animate-on-scroll">
          <div class="chart-header">
            <h5 class="chart-title">
              <i class="fas fa-chart-line me-2 text-primary"></i>
              Spending Trend
            </h5>
          </div>
          <div class="chart-container">
            <canvas id="trendChart"></canvas>
            <div id="noTrendData" class="no-data">
              <i class="fas fa-chart-line"></i>
              <p>No trend data yet</p>
              <small>Add expenses over time to see trends</small>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
      <div class="footer-content">
        <p class="footer-text"> 2025 Expense Dashboard | Built for Group Expense Management </p>
      </div>
    </footer>
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Expense Dashboard JavaScript
    class ExpenseDashboard {
      constructor() {
    this.expenses = [];
        this.participants = new Set();
        this.expenseChart = null;
        this.trendChart = null;
        this.init();
      }

      init() {
    this.updateDashboard();
    this.startPolling();
        this.initCharts();
        this.setupAnimations();
      }

      updateDashboard() {
        this.updateSummaryCards();
        this.updateParticipantBalances();
        this.updateTransactionList();
        this.updateCharts();
      }

      updateSummaryCards() {
        const totalExpenses = this.expenses.reduce((sum, expense) => sum + expense.amount, 0);
        
        // Get unique participants
        this.participants.clear();
        this.expenses.forEach(expense => {
          if (expense.payer) this.participants.add(expense.payer);
          if (expense.participants && Array.isArray(expense.participants)) {
            expense.participants.forEach(p => this.participants.add(p));
          }
        });

        // Calculate pending settlements (simplified)
        const balances = this.calculateBalances();
        const pendingSettlements = Object.values(balances).reduce((sum, balance) => {
          return sum + (balance > 0 ? balance : 0);
        }, 0);

        document.getElementById('totalExpenses').textContent = `₹${totalExpenses.toFixed(2)}`;
        document.getElementById('totalParticipants').textContent = this.participants.size;
        document.getElementById('balanceOverview').textContent = `₹${pendingSettlements.toFixed(2)}`;
      }

      calculateBalances() {
        const balances = {};
        
        this.expenses.forEach(expense => {
          const payer = expense.payer;
          const participants = expense.participants || [];
          const allParticipants = [payer, ...participants].filter(p => p);
          const uniqueParticipants = [...new Set(allParticipants)];
          
          if (uniqueParticipants.length === 0) return;
          
          const sharePerPerson = expense.amount / uniqueParticipants.length;
          
          // Initialize balances
          uniqueParticipants.forEach(p => {
            if (!balances[p]) balances[p] = 0;
          });
          
          // Payer gets positive balance
          if (payer) {
            balances[payer] += expense.amount;
          }
          
          // All participants (including payer) owe their share
          uniqueParticipants.forEach(p => {
            balances[p] -= sharePerPerson;
          });
        });
        
        return balances;
      }

      updateParticipantBalances() {
        const balanceList = document.getElementById('balanceList');
        let balances = this.calculateBalances();
        // Hide settled participants (locally tracked)
        try {
          const settled = JSON.parse(localStorage.getItem('settledPeople') || '[]');
          if (Array.isArray(settled) && settled.length) {
            const set = new Set(settled.map(s => String(s).toLowerCase()));
            const filtered = {};
            Object.entries(balances).forEach(([name, amt]) => {
              if (!set.has(String(name).toLowerCase())) filtered[name] = amt;
            });
            balances = filtered;
          }
        } catch(e) {}
        
        if (Object.keys(balances).length === 0) {
          balanceList.innerHTML = `
            <div class="empty-state">
              <i class="fas fa-users"></i>
              <p>No participants yet</p>
              <small>Add expenses to see participant balances</small>
            </div>
          `;
          return;
        }

        balanceList.innerHTML = Object.entries(balances).map(([name, balance]) => {
          const absBalance = Math.abs(balance);
          const state = Math.abs(balance) < 0.01 ? 'balance-neutral' : (balance > 0 ? 'balance-positive' : 'balance-negative');
          const sign = balance > 0 ? '+' : (balance < 0 ? '-' : '');
          
          return `
            <div class="balance-item ${state}">
              <div class="balance-info">
                <div class="balance-avatar">${name.charAt(0).toUpperCase()}</div>
                <div class="balance-name">${this.escapeHtml(name)}</div>
              </div>
              <div class="d-flex align-items-center gap-2">
                <div class="balance-amount">${sign}₹${absBalance.toFixed(2)}</div>
                ${balance !== 0 ? `
                  <button class="btn btn-sm btn-outline-secondary" onclick="sendReminder('${this.escapeHtml(name)}', '${balance.toFixed(2)}')">
                    <i class="fas fa-paper-plane me-1"></i>Remind
                  </button>
                  ${balance < 0 ? `<button class=\"btn btn-sm btn-outline-success\" onclick=\"markSettled('${this.escapeHtml(name)}')\"><i class=\"fas fa-check\"></i> Mark Settled</button>` : ''}
                ` : ''}
              </div>
            </div>
          `;
        }).join('');
      }

      renderActivity(items) {
        const cont = document.getElementById('activityList');
        if (!cont) return;
        if (!items || !items.length) {
          cont.innerHTML = '<div class="empty-state"><i class="fas fa-stream"></i><p>No activity yet</p></div>';
          return;
        }
        cont.innerHTML = items.map(row => {
          let detail = {};
          try { detail = row.detail ? JSON.parse(row.detail) : {}; } catch(e) {}
          return `
            <div class="list-group-item d-flex justify-content-between">
              <div>
                <strong>${this.escapeHtml(row.type)}</strong>
                <div class="text-muted small">${this.escapeHtml(JSON.stringify(detail))}</div>
              </div>
              <div class="text-muted small">${this.escapeHtml(row.created_at)}</div>
            </div>
          `;
        }).join('');
      }

      updateTransactionList() {
        const transactionList = document.getElementById('transactionList');
        const transactionCount = document.getElementById('transactionCount');
        
        transactionCount.textContent = `${this.expenses.length} transaction${this.expenses.length !== 1 ? 's' : ''}`;

        if (this.expenses.length === 0) {
          transactionList.innerHTML = `
            <div class="empty-state">
              <i class="fas fa-receipt"></i>
              <p>No transactions yet</p>
              <small>Add participant expenses to see transactions</small>
            </div>
          `;
          return;
        }

        // Sort expenses by date (newest first)
        const sortedExpenses = [...this.expenses].sort((a, b) => new Date(b.date) - new Date(a.date));

        transactionList.innerHTML = sortedExpenses.map(expense => `
          <div class="transaction-item">
            <div class="transaction-icon">
              <i class="fas fa-${this.getCategoryIcon(expense.category)}"></i>
            </div>
            <div class="transaction-details">
              <div class="transaction-description">${this.escapeHtml(expense.description)}</div>
              <div class="transaction-meta">
                Paid by ${this.escapeHtml(expense.payer)} • ${this.formatDate(expense.date)}
                ${expense.participants && expense.participants.length > 0 ? ` • Split among ${expense.participants.length + 1} people` : ''}
              </div>
            </div>
            <div class="transaction-amount">₹${expense.amount.toFixed(2)}</div>
          </div>
        `).join('');
      }

      initCharts() {
        // Expense Pie Chart
        const expensesCtx = document.getElementById('expensesChart').getContext('2d');
        this.expenseChart = new Chart(expensesCtx, {
          type: 'doughnut',
          data: {
            labels: [],
            datasets: [{
              data: [],
              backgroundColor: [
                '#2563eb',
                '#06b6d4',
                '#10b981',
                '#f59e0b',
                '#ef4444',
                '#8b5cf6'
              ],
              borderWidth: 0,
              cutout: '60%'
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
              legend: {
                position: 'bottom',
                labels: {
                  padding: 20,
                  usePointStyle: true,
                  font: {
                    family: 'Inter',
                    size: 12
                  }
                }
              }
            }
          }
        });

        // Trend Line Chart
        const trendCtx = document.getElementById('trendChart').getContext('2d');
        this.trendChart = new Chart(trendCtx, {
          type: 'line',
          data: {
            labels: [],
            datasets: [{
              label: 'Monthly Expenses',
              data: [],
              borderColor: '#2563eb',
              backgroundColor: 'rgba(37, 99, 235, 0.1)',
              borderWidth: 3,
              fill: true,
              tension: 0.4,
              pointBackgroundColor: '#2563eb',
              pointBorderColor: '#ffffff',
              pointBorderWidth: 2,
              pointRadius: 6
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
              legend: {
                display: false
              }
            },
            scales: {
              y: {
                beginAtZero: true,
                grid: {
                  color: 'rgba(0, 0, 0, 0.1)'
                },
                ticks: {
                  font: {
                    family: 'Inter'
                  },
                  callback: function(value) {
                    return '₹' + value;
                  }
                }
              },
              x: {
                grid: {
                  display: false
                },
                ticks: {
                  font: {
                    family: 'Inter'
                  }
                }
              }
            }
          }
        });
      }

      updateCharts() {
        // Update pie chart - expenses by participant
        const participantTotals = {};
        this.expenses.forEach(expense => {
          if (expense.payer) {
            participantTotals[expense.payer] = (participantTotals[expense.payer] || 0) + expense.amount;
          }
        });

        const labels = Object.keys(participantTotals);
        const data = Object.values(participantTotals);

        if (labels.length === 0) {
          document.getElementById('noDataMessage').style.display = 'flex';
          document.getElementById('expensesChart').style.display = 'none';
        } else {
          document.getElementById('noDataMessage').style.display = 'none';
          document.getElementById('expensesChart').style.display = 'block';
          
          this.expenseChart.data.labels = labels;
          this.expenseChart.data.datasets[0].data = data;
          this.expenseChart.update();
        }

        // Update trend chart
        const monthlyData = {};
        this.expenses.forEach(expense => {
          const date = new Date(expense.date);
          const monthKey = `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, '0')}`;
          monthlyData[monthKey] = (monthlyData[monthKey] || 0) + expense.amount;
        });

        const trendLabels = Object.keys(monthlyData).sort();
        const trendData = trendLabels.map(label => monthlyData[label]);

        if (trendLabels.length === 0) {
          document.getElementById('noTrendData').style.display = 'flex';
          document.getElementById('trendChart').style.display = 'none';
        } else {
          document.getElementById('noTrendData').style.display = 'none';
          document.getElementById('trendChart').style.display = 'block';
          
          this.trendChart.data.labels = trendLabels.map(label => {
            const [year, month] = label.split('-');
            return new Date(year, month - 1).toLocaleDateString('en-US', { month: 'short', year: 'numeric' });
          });
          this.trendChart.data.datasets[0].data = trendData;
          this.trendChart.update();
        }
      }

      getCategoryIcon(category) {
        const icons = {
          'Food': 'utensils',
          'Transport': 'car',
          'Entertainment': 'film',
          'Shopping': 'shopping-bag',
          'Bills': 'file-invoice-dollar',
          'Other': 'ellipsis-h'
        };
        return icons[category] || 'receipt';
      }

      formatDate(dateString) {
        const date = new Date(dateString);
        return date.toLocaleDateString('en-US', {
          year: 'numeric',
          month: 'short',
          day: 'numeric'
        });
      }

      escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
      }

      showNotification(message, type = 'success') {
        const notification = document.createElement('div');
        notification.className = `alert alert-${type === 'success' ? 'success' : type === 'error' ? 'danger' : 'info'} position-fixed`;
        notification.style.cssText = `
          top: 100px;
          right: 20px;
          z-index: 9999;
          min-width: 300px;
          animation: slideIn 0.3s ease-out;
        `;
        notification.innerHTML = `
          <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'exclamation-triangle' : 'info-circle'} me-2"></i>
          ${message}
        `;

        document.body.appendChild(notification);

        setTimeout(() => {
          notification.style.animation = 'slideOut 0.3s ease-in forwards';
          setTimeout(() => notification.remove(), 300);
        }, 3000);
      }

      setupAnimations() {
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
      }

      startPolling() {
        // Initial load
        this.fetchFromServer();
        loadActivities();
        loadGamificationData();
        // Poll every 3 seconds for near-real-time updates
        this._poller = setInterval(() => this.fetchFromServer(), 3000);
      }

      async fetchFromServer() {
        try {
          const res = await fetch('/api/expenses.php');
          const json = await res.json();
          if (json && json.ok && Array.isArray(json.data)) {
            const serverExpenses = json.data.map(e => ({
              id: e.id,
              payer: e.payer,
              amount: Number(e.amount),
              participants: e.participants || [],
              email: e.email || '',
              participantEmails: e.participant_emails || [],
              date: e.created_at || new Date().toISOString(),
              description: e.description || '',
              category: e.category || 'Other'
            }));
            // Compare by IDs to avoid unnecessary re-renders
            const prevIds = JSON.stringify(this.expenses.map(x => x.id));
            const newIds = JSON.stringify(serverExpenses.map(x => x.id));
            if (prevIds !== newIds) {
              this.expenses = serverExpenses;
              this.updateDashboard();
            }
          }
        } catch (err) {
          console.warn('Could not fetch expenses from server:', err);
        }
      }
    }

    // Global functions
  function toggleDarkMode() {
    const enabled = document.body.getAttribute('data-theme') === 'dark';
    if (enabled) {
      document.body.removeAttribute('data-theme');
      localStorage.removeItem('theme');
    } else {
      document.body.setAttribute('data-theme', 'dark');
      localStorage.setItem('theme', 'dark');
    }
  }

  function exportBalancesCSV() {
    const balances = dashboard.calculateBalances();
    const rows = [['Name','Balance']];
    Object.entries(balances).forEach(([name, bal]) => rows.push([name, Number(bal).toFixed(2)]));
    const csv = rows.map(r => r.map(x => '"' + String(x).replace(/"/g,'""') + '"').join(',')).join('\n');
    const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = 'balances.csv';
    document.body.appendChild(a);
    a.click();
    a.remove();
    URL.revokeObjectURL(url);
  }

  function loadActivities() {
    fetch('/api/activities.php?limit=50').then(r => r.json()).then(j => {
      if (j && j.ok) {
        dashboard.renderActivity(j.data || []);
        window.__activities = j.data || [];
      }
    }).catch(() => {});
  }

  async function loadGamificationData() {
    try {
      const res = await fetch('/api/reminders_list.php?limit=200');
      const json = await res.json();
      if (json && json.ok) {
        window.__reminders = json.data || [];
      }
    } catch (e) {}
    computeLeaderboardAndBadges();
  }

  function computeLeaderboardAndBadges() {
    // Leaderboard by total paid
    const totals = {};
    (dashboard.expenses || []).forEach(exp => {
      if (!exp || !exp.payer) return;
      totals[exp.payer] = (totals[exp.payer] || 0) + (Number(exp.amount) || 0);
    });
    const board = Object.entries(totals).sort((a,b)=>b[1]-a[1]).slice(0,5);
    const boardEl = document.getElementById('leaderboardList');
    if (boardEl) {
      boardEl.innerHTML = board.length ? board.map(([name, amt]) => `
        <div class="list-group-item d-flex justify-content-between">
          <div>${dashboard.escapeHtml(name)}</div>
          <div><strong>₹${Number(amt).toFixed(2)}</strong></div>
        </div>`).join('') : '<div class="empty-state"><i class="fas fa-trophy"></i><p>No data yet</p></div>';
    }

    // Badges
    const badges = new Set();
    // High Roller: total paid ≥ 5000
    for (const [name, amt] of Object.entries(totals)) {
      if (amt >= 5000) { badges.add('High Roller'); break; }
    }
    // Group Builder: from activities count members ≥ 5 for any created group (best-effort)
    try {
      const acts = window.__activities || [];
      const membersByGroup = {};
      acts.forEach(a => {
        if (a.type === 'group_member_added') {
          const d = JSON.parse(a.detail||'{}');
          const gid = d.groupId || d.group_id;
          if (gid) membersByGroup[gid] = (membersByGroup[gid]||0)+1;
        }
      });
      if (Object.values(membersByGroup).some(c => c >= 5)) badges.add('Group Builder');
    } catch(e) {}
    // Punctual Payer: settled within 3 days after first reminder for that name
    try {
      const reminders = window.__reminders || [];
      const acts = window.__activities || [];
      const firstReminder = {};
      reminders.forEach(r => {
        const name = (r.recipient_name||'').trim();
        if (!name) return;
        const t = new Date(r.created_at).getTime();
        if (isFinite(t)) firstReminder[name] = Math.min(firstReminder[name]||Infinity, t);
      });
      let unlocked = false;
      acts.forEach(a => {
        if (a.type === 'settled') {
          const d = JSON.parse(a.detail||'{}');
          const nm = (d.name||'').trim();
          if (!nm || !(nm in firstReminder)) return;
          const s = new Date(a.created_at).getTime();
          if (isFinite(s) && s - firstReminder[nm] <= 3*24*3600*1000) { unlocked = true; }
        }
      });
      if (unlocked) badges.add('Punctual Payer');
    } catch(e) {}

    const badgeEl = document.getElementById('badgesList');
    if (badgeEl) {
      const list = Array.from(badges);
      badgeEl.innerHTML = list.length ? list.map(b => `
        <span class="badge bg-success me-2 mb-2">${dashboard.escapeHtml(b)}</span>`).join('') : '<div class="text-muted">No badges yet</div>';
    }
  }

  function markSettled(name) {
    if (!confirm(`Mark ${name} as settled?`)) return;
    fetch('/api/settle.php?name=' + encodeURIComponent(name), { method: 'DELETE' })
      .then(r => r.json()).then(j => {
        if (j && j.ok) {
          dashboard.showNotification('Marked as settled', 'success');
          // Track locally so we hide from balances
          try {
            const arr = JSON.parse(localStorage.getItem('settledPeople') || '[]');
            if (!arr.includes(name)) { arr.push(name); }
            localStorage.setItem('settledPeople', JSON.stringify(arr));
          } catch(e) {}
          loadActivities();
          computeLeaderboardAndBadges();
          refreshBalances();
        }
      });
  }
    function goToExpensePage() {
      alert('Navigate to the separate expense entry page where participants can add their expenses.');
    }

    function syncData() {
      const syncBtn = document.getElementById('syncBtn');
      const originalHTML = syncBtn.innerHTML;
      
      syncBtn.disabled = true;
      syncBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i>Syncing...';
      
      // Trigger immediate fetch from server
      dashboard.fetchFromServer().then(() => {
        syncBtn.disabled = false;
        syncBtn.innerHTML = originalHTML;
        dashboard.showNotification('Data synced successfully!', 'success');
      }).catch(() => {
        syncBtn.disabled = false;
        syncBtn.innerHTML = originalHTML;
        dashboard.showNotification('Sync failed (server unreachable)', 'error');
      });
    }

    function refreshBalances() {
      const button = document.getElementById('refreshBalancesBtn');
      const icon = button.querySelector('i');

      icon.classList.add('fa-spin');
      button.disabled = true;

      // Force immediate fetch and UI update
      dashboard.fetchFromServer().then(() => {
        dashboard.updateParticipantBalances();
        icon.classList.remove('fa-spin');
        button.disabled = false;
        dashboard.showNotification('Balances refreshed successfully!', 'success');
      }).catch(() => {
        icon.classList.remove('fa-spin');
        button.disabled = false;
        dashboard.showNotification('Could not refresh balances (server unreachable)', 'error');
      });
    }

    function sendReminder(name, balance) {
      const amount = Math.abs(parseFloat(balance));
      // Try to find an email for this participant from loaded expenses
      let recipientEmail = '';
      for (const exp of dashboard.expenses) {
        if (exp.payer === name && exp.email) { recipientEmail = exp.email; break; }
        if (exp.participants && exp.participants.indexOf(name) !== -1) {
          // attempt to get participant email array
          if (exp.participantEmails && exp.participantEmails.length) {
            const idx = exp.participants.indexOf(name);
            if (idx >= 0 && exp.participantEmails[idx]) { recipientEmail = exp.participantEmails[idx]; break; }
          }
        }
      }

      if (!recipientEmail) {
        recipientEmail = prompt(`Enter email address to send reminder to ${name}:` , '');
        if (!recipientEmail) { dashboard.showNotification('Reminder cancelled', 'info'); return; }
      }

      // Build message
      const subject = 'Payment reminder from BillSplit';
      const message = `Hi ${name},\n\nThis is a gentle reminder to settle your balance of ₹${amount.toFixed(2)} on BillSplit.\n\nThanks!`;
      const upi = localStorage.getItem('userUpiId') || '';

      fetch('/api/reminder.php', {
  method: 'POST',
  headers: { 'Content-Type': 'application/json' },
  body: JSON.stringify({ email: recipientEmail, subject, message, name, amount, upi })
}).then(r => r.json()).then(json => {
        if (json && json.ok) {
          dashboard.showNotification(`Reminder sent to ${recipientEmail}`, 'success');
        } else {
          const err = (json && json.error) ? json.error : 'Failed to send reminder';
          dashboard.showNotification(err, 'error');
        }
      }).catch(err => {
        console.error('Reminder error', err);
        dashboard.showNotification('Failed to send reminder', 'error');
      });
    }

    function remindAll() {
      // Debtors have negative balances
      const balances = dashboard.calculateBalances();
      const entries = Object.entries(balances).filter(([_, bal]) => bal < 0);
      if (entries.length === 0) { dashboard.showNotification('No pending dues to remind.', 'info'); return; }
      let sent = 0;
      entries.forEach(([name, bal]) => {
        sendReminder(name, Math.abs(bal).toFixed(2));
        sent++;
      });
      if (sent > 0) {
        dashboard.showNotification(`Attempted to send ${sent} reminder(s).`, 'success');
      }
    }

    // Initialize dashboard when page loads
    let dashboard;
    document.addEventListener('DOMContentLoaded', () => {
      dashboard = new ExpenseDashboard();
      // Apply persisted theme
      if (localStorage.getItem('theme') === 'dark') {
        document.body.setAttribute('data-theme', 'dark');
      }
    });
  </script>
</body>
</html>