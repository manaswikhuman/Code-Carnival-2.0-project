<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BillSplit - Demo</title>
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

    /* Cards */
    .demo-card {
      background: white;
      border: 1px solid var(--gray-200);
      border-radius: var(--border-radius-xl);
      padding: 2rem;
      margin-bottom: 2rem;
      box-shadow: var(--shadow-md);
      transition: var(--transition);
      position: relative;
      overflow: hidden;
    }

    .demo-card::before {
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

    .demo-card:hover {
      box-shadow: var(--shadow-lg);
      transform: translateY(-2px);
    }

    .demo-card:hover::before {
      transform: scaleX(1);
    }

    .card-header {
      display: flex;
      align-items: center;
      gap: 1rem;
      margin-bottom: 1.5rem;
      padding-bottom: 1rem;
      border-bottom: 1px solid var(--gray-200);
    }

    .card-icon {
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

    .card-title {
      font-size: 1.5rem;
      font-weight: 700;
      margin: 0;
      color: var(--gray-900);
    }

    /* Form Inputs */
    .form-control {
      border: 2px solid var(--gray-200);
      border-radius: var(--border-radius);
      padding: 0.75rem 1rem;
      font-size: 1rem;
      transition: var(--transition);
      background: white;
    }

    /* Participant Row Styles */
    .participant-row {
      display: flex;
      gap: 1rem;
      align-items: end;
      margin-bottom: 1rem;
      padding: 1rem;
      background: #f8f9fa;
      border-radius: var(--border-radius);
      border: 1px solid var(--gray-200);
    }

    .participant-row .form-control {
      flex: 1;
    }

    .participant-row .btn {
      flex-shrink: 0;
    }

    .form-control:focus {
      border-color: var(--primary-color);
      box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
      outline: none;
    }

    .form-control.is-invalid {
      border-color: var(--danger-color);
      box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1);
    }

    .form-label {
      font-weight: 600;
      color: var(--gray-700);
      margin-bottom: 0.5rem;
    }

    /* Buttons */
    .btn-custom {
      border-radius: var(--border-radius-lg);
      padding: 0.75rem 1.5rem;
      font-weight: 600;
      font-size: 1rem;
      border: 2px solid transparent;
      transition: var(--transition);
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      text-decoration: none;
      margin: 0.25rem;
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
      background: var(--gray-600);
      border-color: var(--gray-600);
      color: white;
    }

    .btn-secondary:hover {
      background: var(--gray-700);
      border-color: var(--gray-700);
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

    .btn-danger {
      background: var(--danger-color);
      border-color: var(--danger-color);
      color: white;
    }

    .btn-danger:hover {
      background: #dc2626;
      border-color: #dc2626;
      color: white;
      transform: translateY(-2px);
      box-shadow: var(--shadow-lg);
    }

    .btn-outline-primary {
      background: transparent;
      border-color: var(--primary-color);
      color: var(--primary-color);
    }

    .btn-outline-primary:hover {
      background: var(--primary-color);
      border-color: var(--primary-color);
      color: white;
      transform: translateY(-2px);
      box-shadow: var(--shadow-lg);
    }

    /* List Groups */
    .list-group {
      border-radius: var(--border-radius-lg);
      overflow: hidden;
    }

    .list-group-item {
      border: none;
      border-bottom: 1px solid var(--gray-200);
      padding: 1rem 1.25rem;
      background: white;
      transition: var(--transition);
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .list-group-item:hover {
      background: var(--gray-50);
    }

    .list-group-item:last-child {
      border-bottom: none;
    }

    .expense-item {
      display: flex;
      align-items: center;
      gap: 1rem;
      width: 100%;
    }

    .expense-icon {
      width: 2.5rem;
      height: 2.5rem;
      background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 0.875rem;
      flex-shrink: 0;
    }

    .expense-details {
      flex: 1;
    }

    .expense-amount {
      font-weight: 700;
      font-size: 1.125rem;
    }

    .balance-item {
      display: flex;
      align-items: center;
      gap: 1rem;
      width: 100%;
    }

    .balance-avatar {
      width: 2.5rem;
      height: 2.5rem;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-weight: 700;
      font-size: 1rem;
      flex-shrink: 0;
    }

    .balance-positive {
      background: var(--success-color);
    }

    .balance-negative {
      background: var(--danger-color);
    }

    .balance-zero {
      background: var(--gray-400);
    }

    .balance-details {
      flex: 1;
    }

    .balance-name {
      font-weight: 600;
      margin-bottom: 0.25rem;
    }

    .balance-amount {
      font-weight: 700;
      font-size: 1.125rem;
    }

    .text-positive {
      color: var(--success-color);
    }

    .text-negative {
      color: var(--danger-color);
    }

    /* Empty State */
    .empty-state {
      text-align: center;
      padding: 3rem 2rem;
      color: var(--gray-500);
    }

    .empty-icon {
      font-size: 3rem;
      margin-bottom: 1rem;
      color: var(--gray-400);
    }

    .empty-text {
      font-size: 1.125rem;
      margin-bottom: 0.5rem;
    }

    .empty-subtext {
      font-size: 0.95rem;
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
      
      .demo-card {
        padding: 1.5rem;
      }
      
      .navigation-buttons {
        flex-direction: column;
        align-items: center;
      }
      
      .btn-custom {
        width: 100%;
        max-width: 300px;
      }
      
      .expense-item,
      .balance-item {
        flex-direction: column;
        text-align: center;
        gap: 0.75rem;
      }
    }

    @media (max-width: 576px) {
      .page-title {
        font-size: 2rem;
      }
      
      .demo-card {
        padding: 1rem;
      }
    }

    /* Success Animation */
    @keyframes successPulse {
      0% { transform: scale(1); }
      50% { transform: scale(1.05); }
      100% { transform: scale(1); }
    }

    .success-animation {
      animation: successPulse 0.3s ease-in-out;
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#home">
        <i class="fas fa-receipt me-2"></i>BillSplit
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="index1.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="features1.php">Features</a></li>
          <li class="nav-item"><a class="nav-link active" href="demo1.php">Expenses</a></li>
          <li class="nav-item"><a class="nav-link" href="dashboard1.php">Dashboard</a></li>
          <li class="nav-item"><a class="nav-link" href="faq1.php">FAQ</a></li>
          <li class="nav-item"><a class="nav-link" href="about1.php">About</a></li>
        </ul>
      </div>
    </div>
  </nav>




  <div class="container">
    <!-- Page Header -->
    <div class="page-header animate-on-scroll">
      <h1 class="page-title">💸 BillSplit Expenser</h1>
      <p class="page-subtitle">Try our bill splitting calculator and see how easy it is to manage group expenses</p>
    </div>

    <!-- Add Expense Card -->
    <div class="demo-card animate-on-scroll">
      <div class="card-header">
        <div class="card-icon">
          <i class="fas fa-plus"></i>
        </div>
        <h4 class="card-title">Add New Expense</h4>
      </div>
      <div class="card-body">
        <div class="row g-3">
          <div class="col-md-4">
            <label for="payer" class="form-label">Who Paid?</label>
            <input type="text" id="payer" class="form-control" placeholder="Enter payer name">
          </div>
          <div class="col-md-4">
            <label for="amount" class="form-label">Amount (₹)</label>
            <input type="number" id="amount" class="form-control" placeholder="0.00" step="0.01" min="0">
          </div>
          <div class="col-md-4">
            <label for="payerEmail" class="form-label">Payer Email <span class="text-danger">*</span></label>
            <input type="email" id="payerEmail" class="form-control" placeholder="payer@example.com" required>
          </div>
        </div>
        
        <!-- Participants Section -->
        <div class="mt-4">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <label class="form-label mb-0">Participants <span class="text-danger">*</span></label>
            <button type="button" class="btn btn-sm btn-outline-primary" onclick="addParticipant()">
              <i class="fas fa-plus me-1"></i>Add Participant
            </button>
          </div>
          <div class="row g-2 mb-3 align-items-end">
            <div class="col-md-6">
              <label class="form-label d-flex justify-content-between align-items-center">
                <span>Select Group</span>
                <button type="button" class="btn btn-sm btn-outline-secondary" onclick="refreshGroups()" title="Reload groups">
                  <i class="fas fa-rotate"></i>
                </button>
              </label>
              <input id="groupSearch" class="form-control mb-2" placeholder="Search groups..." oninput="filterGroupOptions(this.value)">
              <select id="groupSelect" class="form-control" onchange="onSelectGroup(this.value)" onfocus="refreshGroups()">
                <option value="">-- No group selected --</option>
              </select>
            </div>
            <div class="col-md-6 d-flex gap-2">
              <button type="button" class="btn btn-secondary" onclick="saveCurrentAsGroup()">
                <i class="fas fa-users me-1"></i>Save as Group
              </button>
             
            </div>
          </div>
          <div id="participantsContainer">
            <!-- Participants will be added here dynamically -->
          </div>
        </div>
        <div class="mt-3">
          <button id="addExpenseBtn" class="btn btn-success btn-custom" onclick="addExpense()">
            <i class="fas fa-plus me-2"></i>Add Expense
          </button>
          <button class="btn btn-outline-primary btn-custom" onclick="loadSampleData()">
            <i class="fas fa-sync me-2"></i>Load Sample Data
          </button>
        </div>
      </div>
    </div>

    <!-- Expense List -->
    <div class="demo-card animate-on-scroll">
      <div class="card-header">
        <div class="card-icon">
          <i class="fas fa-list"></i>
        </div>
        <h4 class="card-title">Recent Expenses</h4>
      </div>
      <div id="expenseList" class="list-group">
        <div class="empty-state">
          <div class="empty-icon">
            <i class="fas fa-receipt"></i>
          </div>
          <div class="empty-text">No expenses added yet</div>
          <div class="empty-subtext">Add your first expense above to get started</div>
        </div>
      </div>
    </div>

    <!-- Balances -->
    <div class="demo-card animate-on-scroll">
      <div class="card-header">
        <div class="card-icon">
          <i class="fas fa-balance-scale"></i>
        </div>
        <h4 class="card-title">Current Balances</h4>
      </div>
      <div id="balanceList" class="list-group">
        <div class="empty-state">
          <div class="empty-icon">
            <i class="fas fa-users"></i>
          </div>
          <div class="empty-text">No balances to show</div>
          <div class="empty-subtext">Balances will appear after adding expenses</div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
      <div class="footer-content">
        <p class="footer-text"> 2025 BillSplit | Built for Hackathon Project </p>
      </div>
    </footer>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- UPI floating pay button -->
  <div style='position:fixed;bottom:12px;right:12px;z-index:9999'>
    <a href="/payment.php"
       style="background:#1a73e8;color:#fff;padding:10px 14px;border-radius:8px;text-decoration:none;font-weight:600;box-shadow:0 4px 12px rgba(26,115,232,0.2)">
       <i class="fas fa-hand-holding-dollar me-2"></i>Pay via UPI
    </a>
  </div>
  <script>
    // Generate printable/downloadable receipt for an expense
    function generateReceipt(id) {
      const exp = expenses.find(e => Number(e.id) === Number(id));
      if (!exp) return alert('Expense not found');

      const when = exp.created_at ? new Date(exp.created_at).toLocaleString() : new Date().toLocaleString();
      const participantsHtml = (exp.participants || []).map(p => `<li>${escapeHtml(p)}</li>`).join('');

      const upi = localStorage.getItem('userUpiId') || '';
      const receiptHtml = `
        <!doctype html>
        <html>
        <head>
          <meta charset="utf-8" />
          <title>Receipt - ${escapeHtml(exp.payer)}</title>
          <style>
            body{font-family:Arial,Helvetica,sans-serif;padding:24px;color:#111}
            .card{max-width:680px;margin:0 auto;border:1px solid #e5e7eb;padding:18px;border-radius:8px}
            h1{margin:0 0 8px}
            .muted{color:#6b7280}
            .amount{font-weight:800;font-size:1.4rem;color:#111}
            .small{font-size:0.9rem;color:#374151}
            .actions{margin-top:18px}
            .btn{display:inline-block;padding:8px 12px;background:#2563eb;color:#fff;border-radius:6px;text-decoration:none}
          </style>
        </head>
        <body>
          <div class="card">
            <h1>Payment Receipt</h1>
            <div class="muted">${when}</div>
            <hr />
            <div><strong>Payer:</strong> ${escapeHtml(exp.payer)}</div>
            <div><strong>Amount:</strong> <span class="amount">${formatCurrency(exp.amount)}</span></div>
            <div class="small">Participants:</div>
            <ul>${participantsHtml}</ul>
            ${exp.email ? `<div class="small">Payer Email: ${escapeHtml(exp.email)}</div>` : ''}
            ${upi ? `<div class="small">UPI ID: ${escapeHtml(upi)}</div>` : ''}
            <div class="actions">
              <a class="btn" href="#" onclick="window.print(); return false;">Print</a>
            </div>
          </div>
        </body>
        </html>
      `;

      // Open in a new window/tab
      const w = window.open('', '_blank');
      if (w) {
        w.document.open();
        w.document.write(receiptHtml);
        w.document.close();
      }

      // Also trigger download of receipt as HTML file
      try {
        const blob = new Blob([receiptHtml], { type: 'text/html' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        const fname = `receipt_${exp.id || Date.now()}.html`;
        a.download = fname;
        document.body.appendChild(a);
        a.click();
        a.remove();
        URL.revokeObjectURL(url);
      } catch (err) {
        console.warn('Download failed', err);
      }
    }
    let expenses = [];

    // ---------- Currency helpers (use integer paise to avoid float errors) ----------
    function toPaise(value) {
      const n = Number(value);
      if (!isFinite(n)) return 0;
      return Math.round(n * 100);
    }

    function fromPaise(paise) {
      return (paise / 100);
    }

    function formatCurrency(n) {
      return '₹' + Number(n).toFixed(2);
    }

    // Safe HTML escape used in renderers
    function escapeHtml(text) {
      return String(text)
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#039;');
    }

    // Email validation function
    function isValidEmail(email) {
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return emailRegex.test(email);
    }

    // Participant management
    let participantCount = 0;

    function addParticipant() {
      participantCount++;
      const container = document.getElementById('participantsContainer');
      const participantRow = document.createElement('div');
      participantRow.className = 'participant-row';
      participantRow.id = `participant-${participantCount}`;
      
      participantRow.innerHTML = `
        <div class="form-group">
          <label class="form-label">Name</label>
          <input type="text" class="form-control participant-name" placeholder="Enter name" required>
        </div>
        <div class="form-group">
          <label class="form-label">Email <span class="text-danger">*</span></label>
          <input type="email" class="form-control participant-email" placeholder="email@example.com" required>
        </div>
        <button type="button" class="btn btn-danger" onclick="removeParticipant(${participantCount})">
          <i class="fas fa-trash"></i>
        </button>
      `;
      
      container.appendChild(participantRow);
    }

    function addParticipantWith(name, email) {
      addParticipant();
      const row = document.getElementById(`participant-${participantCount}`);
      if (!row) return;
      const nameInput = row.querySelector('.participant-name');
      const emailInput = row.querySelector('.participant-email');
      if (nameInput) nameInput.value = name || '';
      if (emailInput) emailInput.value = email || '';
    }

    function removeParticipant(id) {
      const element = document.getElementById(`participant-${id}`);
      if (element) {
        element.remove();
      }
    }

    function getParticipants() {
      const participants = [];
      const participantRows = document.querySelectorAll('.participant-row');
      
      participantRows.forEach(row => {
        const name = row.querySelector('.participant-name').value.trim();
        const email = row.querySelector('.participant-email').value.trim();
        
        if (name && email) {
          participants.push({ name, email });
        }
      });
      
      return participants;
    }

    // ---------- Groups: load/list/apply/save/invite ----------
    let loadedGroups = [];

    function onPayerEmailChanged() {
      const owner = document.getElementById('payerEmail').value.trim();
      if (!owner) { populateGroupSelect([]); return; }
      fetch('/api/groups.php?ownerEmail=' + encodeURIComponent(owner))
        .then(r => r.json()).then(j => {
          if (j && j.ok && Array.isArray(j.data)) {
            loadedGroups = j.data;
            populateGroupSelect(loadedGroups);
          } else {
            populateGroupSelect([]);
          }
        }).catch(() => populateGroupSelect([]));
    }

    function populateGroupSelect(groups) {
      const sel = document.getElementById('groupSelect');
      sel.innerHTML = '<option value="">-- No group selected --</option>';
      groups.forEach(g => {
        const opt = document.createElement('option');
        opt.value = String(g.id);
        opt.textContent = `${g.name} (${(g.members||[]).length})`;
        sel.appendChild(opt);
      });
      // Restore previously selected group if available
      const saved = localStorage.getItem('selectedGroupId');
      let pick = '';
      if (saved && groups.some(g => String(g.id) === String(saved))) {
        pick = String(saved);
      } else if (groups.length === 1) {
        pick = String(groups[0].id);
      } else {
        // saved no longer valid for this email
        localStorage.removeItem('selectedGroupId');
      }
      if (pick) {
        sel.value = pick;
        onSelectGroup(pick);
      }
      // Re-apply any search filter text
      const search = document.getElementById('groupSearch');
      if (search && search.value) filterGroupOptions(search.value);
    }

    function onSelectGroup(groupId) {
      if (!groupId) return; 
      const g = loadedGroups.find(x => String(x.id) === String(groupId));
      if (!g) { showNotification('Selected group not found for this email.', 'error'); return; }
      // Persist selection
      localStorage.setItem('selectedGroupId', String(groupId));
      // Clear existing
      document.getElementById('participantsContainer').innerHTML = '';
      participantCount = 0;
      // Apply members
      (g.members || []).forEach(m => addParticipantWith(m.name || '', m.email || ''));
      showNotification(`Applied group: ${g.name}`, 'success');
    }

    function refreshGroups() {
      // Force reload based on current payer email
      onPayerEmailChanged();
    }

    function filterGroupOptions(query) {
      const sel = document.getElementById('groupSelect');
      const q = String(query || '').toLowerCase();
      for (const opt of Array.from(sel.options)) {
        if (!opt.value) continue; // keep placeholder always visible
        const show = opt.textContent.toLowerCase().includes(q);
        opt.style.display = show ? '' : 'none';
      }
    }

    function saveCurrentAsGroup() {
      const ownerEmail = document.getElementById('payerEmail').value.trim();
      if (!ownerEmail) { showNotification('Enter payer email first.', 'error'); return; }
      const members = getParticipants();
      if (members.length === 0) { showNotification('Add at least one participant.', 'error'); return; }
      const name = prompt('Enter a name for this group:');
      if (!name) return;
      fetch('/api/groups.php', {
        method: 'POST', headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ name, ownerEmail, members })
      }).then(r => r.json()).then(j => {
        if (j && j.ok) {
          showNotification('Group saved successfully.', 'success');
          if (j.id) {
            try { localStorage.setItem('selectedGroupId', String(j.id)); } catch(e) {}
          }
          // Refresh groups and auto-select the newly created one
          onPayerEmailChanged();
        } else {
          showNotification((j && j.error) || 'Failed to save group', 'error');
        }
      }).catch(() => showNotification('Failed to save group', 'error'));
    }

    function copyInviteLink() {
      const sel = document.getElementById('groupSelect');
      const groupId = sel && sel.value ? parseInt(sel.value, 10) : 0;
      if (!groupId) { showNotification('Select a group first.', 'error'); return; }
      fetch('/api/invites.php', {
        method: 'POST', headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ groupId })
      }).then(r => r.json()).then(j => {
        if (j && j.ok && j.inviteUrl) {
          navigator.clipboard.writeText(j.inviteUrl).then(() => {
            showNotification('Invite link copied to clipboard.', 'success');
          }, () => { showNotification('Invite URL: ' + j.inviteUrl, 'success'); });
          window.__lastInviteUrl = j.inviteUrl;
        } else {
          showNotification('Failed to create invite link.', 'error');
        }
      }).catch(() => showNotification('Failed to create invite link.', 'error'));
    }

    function showInviteQR() {
      const sel = document.getElementById('groupSelect');
      const groupId = sel && sel.value ? parseInt(sel.value, 10) : 0;
      if (!groupId) { showNotification('Select a group first.', 'error'); return; }
      const showQR = (url) => {
        const qrUrl = 'https://chart.googleapis.com/chart?cht=qr&chs=220x220&chl=' + encodeURIComponent(url);
        const img = document.getElementById('qrImg');
        const link = document.getElementById('qrLink');
        img.src = qrUrl;
        link.href = url;
        link.textContent = url;
        const modal = new bootstrap.Modal(document.getElementById('qrModal'));
        modal.show();
      };
      if (window.__lastInviteUrl) {
        showQR(window.__lastInviteUrl);
        return;
      }
      // Create invite if not already created this session
      fetch('/api/invites.php', {
        method: 'POST', headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ groupId })
      }).then(r => r.json()).then(j => {
        if (j && j.ok && j.inviteUrl) {
          window.__lastInviteUrl = j.inviteUrl;
          showQR(j.inviteUrl);
        } else {
          showNotification('Failed to create invite link.', 'error');
        }
      }).catch(() => showNotification('Failed to create invite link.', 'error'));
    }

    // Function to add an expense
    function addExpense() {
      const payerInput = document.getElementById('payer');
      const amountInput = document.getElementById('amount');
      const payerEmailInput = document.getElementById('payerEmail');

      const payer = payerInput.value.trim();
      const amount = parseFloat(amountInput.value);
      const payerEmail = payerEmailInput.value.trim();
      const participants = getParticipants();

      // Basic validation with inline feedback
      let hasError = false;
      [payerInput, amountInput, payerEmailInput].forEach(el => el.classList.remove('is-invalid'));
      
      // Clear previous participant validation
      document.querySelectorAll('.participant-row').forEach(row => {
        row.querySelectorAll('.form-control').forEach(input => input.classList.remove('is-invalid'));
      });

      if (!payer) { payerInput.classList.add('is-invalid'); if (!hasError) payerInput.focus(); hasError = true; }
      if (!isFinite(amount) || amount <= 0) { amountInput.classList.add('is-invalid'); if (!hasError) amountInput.focus(); hasError = true; }
      if (!payerEmail) { payerEmailInput.classList.add('is-invalid'); if (!hasError) payerEmailInput.focus(); hasError = true; }
      if (payerEmail && !isValidEmail(payerEmail)) { payerEmailInput.classList.add('is-invalid'); if (!hasError) payerEmailInput.focus(); hasError = true; }
      
      if (participants.length === 0) { 
        showNotification("Please add at least one participant.", "error"); 
        hasError = true; 
      }

      // Validate each participant
      participants.forEach((participant, index) => {
        const participantRow = document.querySelectorAll('.participant-row')[index];
        if (participantRow) {
          const nameInput = participantRow.querySelector('.participant-name');
          const emailInput = participantRow.querySelector('.participant-email');
          
          if (!participant.name) {
            nameInput.classList.add('is-invalid');
            if (!hasError) nameInput.focus();
            hasError = true;
          }
          if (!participant.email) {
            emailInput.classList.add('is-invalid');
            if (!hasError) emailInput.focus();
            hasError = true;
          }
          if (participant.email && !isValidEmail(participant.email)) {
            emailInput.classList.add('is-invalid');
            if (!hasError) emailInput.focus();
            hasError = true;
          }
        }
      });

      if (hasError) { showNotification("Please fill all fields correctly.", "error"); return; }

      const addBtn = document.getElementById('addExpenseBtn');
      const originalHTML = addBtn.innerHTML;
      addBtn.disabled = true;
      addBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Saving...';

      // Prepare data for local storage
      const participantNames = participants.map(p => p.name);
      const participantEmails = participants.map(p => p.email);
      
      // Add to local expenses array
      const newExpense = { 
        id: Date.now(), // Simple ID generation
        payer, 
        amount, 
        participants: participantNames, 
        email: payerEmail,
        participantEmails: participantEmails,
        created_at: new Date().toISOString() 
      };

      // Optimistically add locally
      expenses.push(newExpense);
      renderExpenses();
      renderBalances();

      // Try to persist to server
      fetch('/api/expenses.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({
          payer: payer,
          amount: amount,
          participants: participantNames,
          email: payerEmail,
          participantEmails: participantEmails
        })
      }).then(r => r.json()).then(json => {
        if (json && json.ok && json.id) {
          // Replace temporary ID with real ID from server
          const idx = expenses.findIndex(e => e.id === newExpense.id);
          if (idx !== -1) expenses[idx].id = json.id;
          localStorage.setItem('billsplit_expenses', JSON.stringify(expenses));
        } else {
          // Keep local state but warn
          console.warn('Server rejected save', json);
          localStorage.setItem('billsplit_expenses', JSON.stringify(expenses));
        }
      }).catch(err => {
        console.warn('Failed to save to server, keeping local copy', err);
        localStorage.setItem('billsplit_expenses', JSON.stringify(expenses));
      });

      // Clear inputs with animation
      const form = document.querySelector('.demo-card');
      form.classList.add('success-animation');
      setTimeout(() => form.classList.remove('success-animation'), 300);

      document.getElementById('payer').value = '';
      document.getElementById('amount').value = '';
      // Do not clear payer email so group list remains available
      document.getElementById('participantsContainer').innerHTML = '';
      participantCount = 0;
      showNotification("Expense added successfully!", "success");

      addBtn.disabled = false;
      addBtn.innerHTML = originalHTML;
    }

    // Load groups when payerEmail changes or on load if prefilled
    document.addEventListener('DOMContentLoaded', () => {
      const emailEl = document.getElementById('payerEmail');
      emailEl.addEventListener('change', onPayerEmailChanged);
      emailEl.addEventListener('blur', onPayerEmailChanged);
      // Initial load of groups if payer email already set
      if (emailEl.value.trim()) {
        onPayerEmailChanged();
      }
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/service-worker.js').catch(()=>{});
      }
    });

    // Function to render expense list (sorted, professional formatting)
    function renderExpenses() {
      const list = document.getElementById('expenseList');

      if (expenses.length === 0) {
        list.innerHTML = `
          <div class="empty-state">
            <div class="empty-icon">
              <i class="fas fa-receipt"></i>
            </div>
            <div class="empty-text">No expenses added yet</div>
            <div class="empty-subtext">Add your first expense above to get started</div>
          </div>
        `;
        return;
      }

      // Sort newest first by created_at if available
      const sorted = expenses.slice().sort((a, b) => {
        const ta = a.created_at ? Date.parse(a.created_at) : 0;
        const tb = b.created_at ? Date.parse(b.created_at) : 0;
        return tb - ta;
      });

      list.innerHTML = '';
      sorted.forEach(exp => {
        const li = document.createElement('div');
        li.className = 'list-group-item';

        // Build group (payer + participants), unique case-insensitive
        const seenNames = new Set();
        const group = [];
        if (exp.payer) { 
          const k = String(exp.payer).toLowerCase(); 
          if (!seenNames.has(k)) { 
            seenNames.add(k); 
            group.push(String(exp.payer)); 
          } 
        }
        (exp.participants || []).forEach(name => {
          const v = String(name || '').trim();
          if (!v) return;
          const k = v.toLowerCase();
          if (!seenNames.has(k)) { 
            seenNames.add(k); 
            group.push(v); 
          }
        });

        const n = Math.max(1, group.length); // include payer in split
        const totalPaise = toPaise(exp.amount);
        const baseShare = Math.floor(totalPaise / n);
        let remainder = totalPaise - baseShare * n;
        // Compute per-person shares in paise with fair remainder distribution
        const shares = group.map((name, idx) => baseShare + (remainder-- > 0 ? 1 : 0));
        const share = n > 0 ? fromPaise(baseShare) : 0; // display typical base share

        const when = exp.created_at ? new Date(exp.created_at) : null;
        const whenText = when ? when.toLocaleString() : '';

        // Build participant info with emails
        const participantInfo = group.map((name, i) => {
          const amt = fromPaise(shares[i]);
          let email = '';
          
          // Find email for this person - check if it's the payer or a participant
          if (name === exp.payer && exp.email) {
            email = exp.email;
          } else {
            // Find the participant email by matching the name with participants
            const participantIndex = exp.participants ? exp.participants.indexOf(name) : -1;
            if (participantIndex >= 0 && exp.participantEmails && exp.participantEmails[participantIndex]) {
              email = exp.participantEmails[participantIndex];
            }
          }
          
          const emailIcon = email ? `<i class="fas fa-envelope me-1" style="font-size:0.8rem;"></i>` : '';
          return `<span class="badge bg-light text-dark">${emailIcon}${escapeHtml(name)}: ${formatCurrency(amt)}</span>`;
        }).join('');

        li.innerHTML = `
          <div class="expense-item">
            <div class="expense-icon">
              <i class="fas fa-receipt"></i>
            </div>
            <div class="expense-details">
              <div class="expense-amount">${formatCurrency(exp.amount)}</div>
              <div class="text-muted">${escapeHtml(exp.payer)} paid &middot; ${n} people &middot; Each: ${formatCurrency(share)}</div>
              ${exp.email ? `<div class="text-muted" style="font-size:0.9rem;"><i class="fas fa-envelope me-1"></i>Payer: ${escapeHtml(exp.email)}</div>` : ''}
              <div class="mt-1" style="display:flex;flex-wrap:wrap;gap:.5rem;">
                ${participantInfo}
              </div>
              ${whenText ? `<div class="text-muted" style="font-size:0.9rem;">${whenText}</div>` : ''}
            </div>
            <div>
              <div style="display:flex;flex-direction:column;gap:.5rem;align-items:flex-end;">
                <button class="btn btn-sm btn-light" title="Receipt" onclick="generateReceipt(${exp.id})">
                  <i class="fas fa-receipt"></i>
                </button>
                <button class="btn btn-sm btn-light" title="Edit" onclick="openEditModal(${exp.id})">
                  <i class="fas fa-edit"></i>
                </button>
                <button class="btn btn-sm btn-light" title="Delete" onclick="deleteExpense(${exp.id})">
                  <i class="fas fa-trash"></i>
                </button>
              </div>
            </div>
          </div>
        `;
        list.appendChild(li);
      });
    }

    // Function to render balances (precise split with paise rounding)
    function renderBalances() {
      const list = document.getElementById('balanceList');

      if (expenses.length === 0) {
        list.innerHTML = `
          <div class="empty-state">
            <div class="empty-icon">
              <i class="fas fa-users"></i>
            </div>
            <div class="empty-text">No balances to show</div>
            <div class="empty-subtext">Balances will appear after adding expenses</div>
          </div>
        `;
        return;
      }

      const balancePaise = {};

      expenses.forEach(exp => {
        const total = toPaise(exp.amount);
        const payer = String(exp.payer || '').trim();
        const participants = (exp.participants || []).map(n => String(n || '').trim()).filter(Boolean);

        // Build group including payer, without duplicates (case-insensitive)
        const seen = new Set();
        const group = [];
        const pushUnique = (name) => {
          const key = name.toLowerCase();
          if (!seen.has(key)) { seen.add(key); group.push(name); }
        };
        if (payer) pushUnique(payer);
        participants.forEach(pushUnique);

        const n = Math.max(1, group.length);
        const baseShare = Math.floor(total / n);
        let remainder = total - baseShare * n; // distribute remaining paise fairly

        // Subtract each group member's share (including payer)
        group.forEach(name => {
          const add = baseShare + (remainder > 0 ? 1 : 0);
          if (remainder > 0) remainder -= 1;
          balancePaise[name] = (balancePaise[name] || 0) - add;
        });

        // Add total to payer as credit
        if (payer) {
          balancePaise[payer] = (balancePaise[payer] || 0) + total;
        }
      });

      const entries = Object.entries(balancePaise);
      if (entries.length === 0) {
        list.innerHTML = `
          <div class="empty-state">
            <div class="empty-icon">
              <i class="fas fa-users"></i>
            </div>
            <div class="empty-text">No balances to show</div>
            <div class="empty-subtext">Balances will appear after adding expenses</div>
          </div>
        `;
        return;
      }

      // Sort by absolute amount desc
      entries.sort((a, b) => Math.abs(b[1]) - Math.abs(a[1]));

      list.innerHTML = '';
      entries.forEach(([name, paise]) => {
        const amount = fromPaise(paise);
        const isZero = Math.abs(amount) < 0.005;
        const isPositive = amount > 0;
        const avatarClass = isZero ? 'balance-zero' : (isPositive ? 'balance-positive' : 'balance-negative');
        const amountClass = isZero ? '' : (isPositive ? 'text-positive' : 'text-negative');
        const statusText = isZero ? 'Settled' : (isPositive ? 'Gets back' : 'Owes');

        const li = document.createElement('div');
        li.className = 'list-group-item';
        li.innerHTML = `
          <div class="balance-item">
            <div class="balance-avatar ${avatarClass}">${escapeHtml(name.charAt(0).toUpperCase())}</div>
            <div class="balance-details">
              <div class="balance-name">${escapeHtml(name)}</div>
              <div class="balance-amount ${amountClass}">${statusText}: ${formatCurrency(Math.abs(amount))}</div>
            </div>
          </div>
        `;
        list.appendChild(li);
      });
    }

    // Notification function
    function showNotification(message, type) {
      // Create notification element
      const notification = document.createElement('div');
      notification.className = `alert alert-${type === 'success' ? 'success' : 'danger'} position-fixed`;
      notification.style.cssText = `
        top: 100px;
        right: 20px;
        z-index: 1050;
        min-width: 300px;
        box-shadow: var(--shadow-lg);
        border-radius: var(--border-radius-lg);
      `;
      notification.innerHTML = `
        <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-triangle'} me-2"></i>
        ${message}
      `;
      
      document.body.appendChild(notification);
      
      // Remove after 3 seconds
      setTimeout(() => {
        notification.remove();
      }, 3000);
    }

    // Delete an expense
    function deleteExpense(id) {
      const expenseIndex = expenses.findIndex(exp => exp.id === id);
      if (expenseIndex === -1) return;
      
      const expense = expenses[expenseIndex];
      const msg = `Delete ${formatCurrency(expense.amount)} paid by ${expense.payer}?`;
      if (!confirm(msg)) return;

      expenses.splice(expenseIndex, 1);
        // Update UI immediately
        localStorage.setItem('billsplit_expenses', JSON.stringify(expenses));
        renderExpenses();
        renderBalances();

        // Try deleting from server (best-effort)
        fetch('/api/expenses.php?id=' + encodeURIComponent(id), {
          method: 'DELETE'
        }).then(r => r.json()).then(json => {
          if (json && json.ok) {
            showNotification('Expense deleted.', 'success');
          } else {
            showNotification('Deleted locally (server may not have been updated).', 'info');
          }
        }).catch(() => {
          showNotification('Deleted locally (server unavailable).', 'info');
        });
    }

    // Load sample data
    function loadSampleData() {
      expenses = [
        {
          id: 1,
          payer: "Alice",
          amount: 200,
          participants: ["Alice", "Bob", "Charlie"],
          email: "alice@example.com",
          participantEmails: ["alice@example.com", "bob@example.com", "charlie@example.com"],
          created_at: new Date(Date.now() - 86400000).toISOString() // Yesterday
        },
        {
          id: 2,
          payer: "Bob",
          amount: 150,
          participants: ["Alice", "Bob"],
          email: "bob@example.com",
          participantEmails: ["alice@example.com", "bob@example.com"],
          created_at: new Date(Date.now() - 43200000).toISOString() // 12 hours ago
        },
        {
          id: 3,
          payer: "Charlie",
          amount: 300,
          participants: ["Alice", "Bob", "Charlie", "David"],
          email: "charlie@example.com",
          participantEmails: ["alice@example.com", "bob@example.com", "charlie@example.com", "david@example.com"],
          created_at: new Date().toISOString() // Now
        }
      ];
      
      localStorage.setItem('billsplit_expenses', JSON.stringify(expenses));
      renderExpenses();
      renderBalances();
      showNotification('Sample data loaded successfully!', 'success');
    }

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

    // Add enter key support for form
    document.addEventListener('keypress', function(e) {
      if (e.key === 'Enter' && e.target.tagName !== 'BUTTON') {
        addExpense();
      }
    });

  // Initialize tooltips and load data on page load
  document.addEventListener('DOMContentLoaded', function() {
      // Initialize tooltips
      var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
      var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
      });

      // Clear invalid state on input
      ['payer','amount','payerEmail'].forEach(id => {
        const el = document.getElementById(id);
        if (el) {
          el.addEventListener('input', () => el.classList.remove('is-invalid'));
        }
      });

      // Try loading from server API first, fall back to localStorage
      fetch('/api/expenses.php')
        .then(r => r.json())
        .then(json => {
          if (json && json.ok && Array.isArray(json.data) && json.data.length > 0) {
            // Normalize to the client-side expected shape
            expenses = json.data.map(e => ({
              id: e.id,
              payer: e.payer,
              amount: Number(e.amount),
              participants: e.participants || [],
              email: e.email || '',
              participantEmails: e.participant_emails || [],
              created_at: e.created_at || new Date().toISOString()
            }));
            localStorage.setItem('billsplit_expenses', JSON.stringify(expenses));
            renderExpenses();
            renderBalances();
          } else {
            // fallback to localStorage or sample data
            const savedExpenses = localStorage.getItem('billsplit_expenses');
            if (savedExpenses) {
              expenses = JSON.parse(savedExpenses);
              renderExpenses();
              renderBalances();
            } else {
              loadSampleData();
            }
          }
        })
        .catch(err => {
          console.warn('Could not fetch from API, using local data:', err);
          try {
            const savedExpenses = localStorage.getItem('billsplit_expenses');
            if (savedExpenses) {
              expenses = JSON.parse(savedExpenses);
              renderExpenses();
              renderBalances();
            } else {
              loadSampleData();
            }
          } catch (error) {
            console.error('Error loading expenses from localStorage:', error);
            loadSampleData();
          }
        });
    });

    // Periodically poll server for updates (near-real-time)
    setInterval(function() {
      fetch('/api/expenses.php')
        .then(r => r.json())
        .then(json => {
          if (json && json.ok && Array.isArray(json.data)) {
            const serverExpenses = json.data.map(e => ({
              id: e.id,
              payer: e.payer,
              amount: Number(e.amount),
              participants: e.participants || [],
              email: e.email || '',
              participantEmails: e.participant_emails || [],
              created_at: e.created_at || new Date().toISOString()
            }));
            // Quick diff - replace local view if changed
            try {
              const prev = JSON.stringify(expenses.map(e => e.id));
              const next = JSON.stringify(serverExpenses.map(e => e.id));
              if (prev !== next) {
                expenses = serverExpenses;
                localStorage.setItem('billsplit_expenses', JSON.stringify(expenses));
                renderExpenses();
                renderBalances();
              }
            } catch (err) { console.warn(err); }
          }
        }).catch(() => {});
    }, 3000);
  </script>
  <!-- Edit Expense Modal -->
  <div class="modal fade" id="editExpenseModal" tabindex="-1" aria-labelledby="editExpenseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editExpenseModalLabel">Edit Expense</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="editExpenseId" />
          <div class="mb-3">
            <label class="form-label">Payer</label>
            <input id="editPayer" class="form-control" type="text" />
          </div>
          <div class="mb-3">
            <label class="form-label">Amount (₹)</label>
            <input id="editAmount" class="form-control" type="number" step="0.01" />
          </div>
          <div class="mb-3">
            <label class="form-label">Payer Email</label>
            <input id="editPayerEmail" class="form-control" type="email" />
          </div>
          <div class="mb-3">
            <label class="form-label">Participants (comma separated)</label>
            <input id="editParticipants" class="form-control" type="text" />
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" id="saveEditBtn" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    function openEditModal(id) {
      const exp = expenses.find(e => Number(e.id) === Number(id));
      if (!exp) return alert('Expense not found');
      document.getElementById('editExpenseId').value = exp.id;
      document.getElementById('editPayer').value = exp.payer || '';
      document.getElementById('editAmount').value = exp.amount || '';
      document.getElementById('editPayerEmail').value = exp.email || '';
      document.getElementById('editParticipants').value = (exp.participants || []).join(', ');
      var modalEl = document.getElementById('editExpenseModal');
      var modal = bootstrap.Modal.getInstance(modalEl) || new bootstrap.Modal(modalEl);
      modal.show();
    }

    document.getElementById('saveEditBtn').addEventListener('click', function() {
      const id = document.getElementById('editExpenseId').value;
      const payer = document.getElementById('editPayer').value.trim();
      const amount = parseFloat(document.getElementById('editAmount').value);
      const email = document.getElementById('editPayerEmail').value.trim();
      const participants = document.getElementById('editParticipants').value.split(',').map(s => s.trim()).filter(Boolean);

      if (!payer || !isFinite(amount) || amount <= 0 || !email || participants.length === 0) {
        return alert('Please fill all fields correctly');
      }

      // Send PUT to API
      fetch('/api/expenses.php', {
        method: 'PUT',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ id: id, payer: payer, amount: amount, participants: participants, email: email, participantEmails: [] })
      }).then(r => r.json()).then(json => {
        if (json && json.ok) {
          // Update local copy and UI
          const idx = expenses.findIndex(e => Number(e.id) === Number(id));
          if (idx !== -1) {
            expenses[idx].payer = payer;
            expenses[idx].amount = amount;
            expenses[idx].participants = participants;
            expenses[idx].email = email;
            localStorage.setItem('billsplit_expenses', JSON.stringify(expenses));
            renderExpenses();
            renderBalances();
          }
          var modalEl = document.getElementById('editExpenseModal');
          var modal = bootstrap.Modal.getInstance(modalEl);
          if (modal) modal.hide();
          showNotification('Expense updated successfully!', 'success');
        } else {
          alert('Failed to update expense: ' + (json && json.error ? json.error : 'Unknown error'));
        }
      }).catch(err => {
        console.error(err);
        alert('Could not update expense (server error)');
      });
    });
  </script>
</body>
</html>