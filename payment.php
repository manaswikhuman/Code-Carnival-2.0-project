<?php
// payment.php - simple UPI QR display for fixed UPI ID
// UPI ID embedded: yss
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Pay via UPI</title>
  <style>
    body { font-family: Arial, sans-serif; background:#f7f7f7; display:flex; align-items:center; justify-content:center; height:100vh; margin:0; }
    .card { background:white; padding:24px; border-radius:12px; box-shadow:0 6px 24px rgba(0,0,0,0.08); text-align:center; max-width:420px; }
    h1 { margin:0 0 8px 0; font-size:20px; }
    p { margin:6px 0 18px 0; color:#555; }
    .upi-id { font-weight:600; margin-bottom:12px; }
    img.qr { width:300px; height:300px; border-radius:8px; background:white; }
    .note { margin-top:12px; font-size:13px; color:#666; }
    .instructions { text-align:left; margin-top:14px; font-size:14px; color:#333; }
    .btn { display:inline-block; margin-top:12px; padding:8px 14px; border-radius:8px; text-decoration:none; border:1px solid #ddd; color:#333; }
  </style>
</head>
<body>
  <div class="card">
    <h1>Pay with UPI</h1>
    <p class="upi-id">UPI ID: <span style="color:#1a73e8;">manaswikhuman@oksbi</span></p>
    <!-- QR generated via Google Chart API from UPI URI -->
    <img class="qr" src="qr.jpg" alt="UPI QR code" />
    <div class="note">Scan this QR from any UPI app (Google Pay, PhonePe, Paytm)</div>
    <div class="instructions">
      <strong>How to pay</strong>
      <ol>
        <li>Open your UPI app and choose "Scan & Pay".</li>
        <li>Scan the QR code above.</li>
        <li>Confirm the UPI ID shown and complete payment.</li>
      </ol>
    </div>
    <a class="btn" href="/">Back to site</a>
  </div>
  <script>
    // Try to load saved UPI details from localStorage and update the page
    (function() {
      try {
        var upi = localStorage.getItem('userUpiId');
        var qr = localStorage.getItem('userUpiQr');
        if (upi) {
          var el = document.querySelector('.upi-id span');
          if (el) el.textContent = upi;
        }
        if (qr) {
          var img = document.querySelector('img.qr');
          if (img) img.src = qr;
        }
      } catch (err) {
        console.warn('Could not read saved UPI data:', err);
      }
    })();
  </script>
</body>
</html>
