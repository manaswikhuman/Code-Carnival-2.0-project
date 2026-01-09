<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>BillSplit | Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />

  <style>
    :root {
      --primary-color: #2563eb;
      --primary-dark: #1d4ed8;
      --accent-color: #06b6d4;
      --gray-50: #f8fafc;
      --gray-100: #f1f5f9;
      --gray-600: #475569;
      --gray-900: #0f172a;
      --shadow-lg: 0 10px 20px rgba(0, 0, 0, 0.15);
      --border-radius: 0.75rem;
    }

    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      color: var(--gray-900);
    }

    .login-container {
      background: white;
      padding: 3rem 2.5rem;
      border-radius: var(--border-radius);
      box-shadow: var(--shadow-lg);
      width: 100%;
      max-width: 420px;
      text-align: center;
      animation: fadeIn 0.8s ease-in-out;
    }

    .login-container h2 {
      font-weight: 700;
      color: var(--primary-dark);
      margin-bottom: 1.5rem;
    }

    .form-control {
      border-radius: var(--border-radius);
      padding: 0.75rem;
      border: 1px solid var(--gray-100);
      font-size: 1rem;
      box-shadow: none;
      padding-right: 3rem; /* Add space for the eye icon */
    }

    .form-control:focus {
      border-color: var(--primary-color);
      box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.2);
    }

    .btn-primary {
      background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
      border: none;
      padding: 0.75rem 1rem;
      font-weight: 600;
      border-radius: var(--border-radius);
      transition: all 0.3s ease;
      width: 100%;
      color: white;
      margin-top: 1rem;
    }

    .btn-primary:hover {
      background: linear-gradient(135deg, var(--primary-dark), var(--accent-color));
      transform: translateY(-2px);
      box-shadow: var(--shadow-lg);
    }

    .form-check-label {
      font-size: 0.9rem;
      color: var(--gray-600);
    }

    .password-input-container {
      position: relative;
    }

    .toggle-password {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: var(--gray-600);
      z-index: 10;
      font-size: 1rem;
      transition: color 0.3s ease;
    }

    .toggle-password:hover {
      color: var(--primary-color);
    }

    .footer-text {
      margin-top: 1rem;
      font-size: 0.9rem;
      color: var(--gray-600);
    }

    .footer-text a {
      color: var(--primary-color);
      text-decoration: none;
      font-weight: 600;
    }

    .footer-text a:hover {
      text-decoration: underline;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* Responsive adjustments */
    @media (max-width: 480px) {
      .login-container {
        padding: 2rem 1.5rem;
        margin: 1rem;
      }
    }
  </style>
</head>

<body>
  <div class="login-container">
    <h2><i class="fas fa-receipt me-2 text-primary"></i>BillSplit Login</h2>
    <form id="loginForm">
      <div class="mb-3 text-start">
        <label for="email" class="form-label fw-semibold">Email</label>
        <input type="email" class="form-control" id="email" placeholder="Enter your email" required />
      </div>
      <div class="mb-3 text-start">
        <label for="password" class="form-label fw-semibold">Password</label>
        <div class="password-input-container">
          <input type="password" class="form-control" id="password" placeholder="Enter your password" required />
          <i class="fas fa-eye toggle-password" id="togglePassword"></i>
        </div>
      </div>
      <div class="form-check text-start mb-3">
        <input class="form-check-input" type="checkbox" id="rememberMe" />
        <label class="form-check-label" for="rememberMe">Remember me</label>
      </div>
      <button type="submit" class="btn btn-primary">
        <i class="fas fa-sign-in-alt me-2"></i>Login
      </button>
    </form>
    <div class="footer-text">
      Don't have an account? <a href="signup1.php">Sign Up</a><br />
  </div>

  <script>
    // Password visibility toggle
    const togglePassword = document.querySelector("#togglePassword");
    const password = document.querySelector("#password");
    
    togglePassword.addEventListener("click", function () {
      const type = password.getAttribute("type") === "password" ? "text" : "password";
      password.setAttribute("type", type);
      
      // Toggle between eye and eye-slash icons
      if (type === "text") {
        this.classList.remove("fa-eye");
        this.classList.add("fa-eye-slash");
      } else {
        this.classList.remove("fa-eye-slash");
        this.classList.add("fa-eye");
      }
    });

    // Form validation and login - Accept any credentials
    document.getElementById("loginForm").addEventListener("submit", function (e) {
      e.preventDefault();
      
      const email = document.getElementById("email").value.trim();
      const passwordValue = password.value.trim();
      
      // Basic validation - just check if fields are not empty
      if (!email || !passwordValue) {
        alert("❌ Please fill in all fields.");
        return;
      }
      
      // Email format validation
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRegex.test(email)) {
        alert("❌ Please enter a valid email address.");
        return;
      }
      
      // Accept any valid email and password combination
      alert("✅ Login Successful! Redirecting to home page...");
      
      // Store user info in localStorage (optional)
      localStorage.setItem('userEmail', email);
      localStorage.setItem('isLoggedIn', 'true');
      
      // Redirect to index1.php after a short delay
      setTimeout(() => {
        window.location.href = "index1.php";
      }, 1000);
    });

    // Add some interactive feedback
    const inputs = document.querySelectorAll('.form-control');
    inputs.forEach(input => {
      input.addEventListener('focus', function() {
        this.parentElement.style.transform = 'scale(1.02)';
        this.parentElement.style.transition = 'transform 0.2s ease';
      });
      
      input.addEventListener('blur', function() {
        this.parentElement.style.transform = 'scale(1)';
      });
    });
  </script>
</body>
</html>