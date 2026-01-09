<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Join Group</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light" style="padding-top:60px">
  <div class="container" style="max-width:520px">
    <div class="card shadow-sm">
      <div class="card-body">
        <h4 class="mb-3">Join Group</h4>
        <div id="inviteMeta" class="text-muted mb-3"></div>
        <div class="mb-3">
          <label class="form-label">Your Name</label>
          <input id="name" type="text" class="form-control" placeholder="Enter your name">
        </div>
        <div class="mb-3">
          <label class="form-label">Your Email</label>
          <input id="email" type="email" class="form-control" placeholder="you@example.com">
        </div>
        <button id="joinBtn" class="btn btn-primary w-100">Join</button>
        <div id="msg" class="mt-3"></div>
      </div>
    </div>
  </div>
  <script>
    const params = new URLSearchParams(location.search);
    const token = params.get('token') || '';
    const meta = document.getElementById('inviteMeta');
    const msg = document.getElementById('msg');

    if (!token) {
      meta.textContent = 'Missing invite token.';
      document.getElementById('joinBtn').disabled = true;
    } else {
      fetch('/api/invites.php?token=' + encodeURIComponent(token))
        .then(r => r.json()).then(j => {
          if (j && j.ok) {
            meta.textContent = 'You are joining: ' + (j.data.group_name || ('Group #' + j.data.group_id));
          } else {
            meta.textContent = j && j.error ? j.error : 'Invalid invite link.';
            document.getElementById('joinBtn').disabled = true;
          }
        }).catch(() => {
          meta.textContent = 'Unable to validate invite link right now.';
          document.getElementById('joinBtn').disabled = true;
        });
    }

    document.getElementById('joinBtn').addEventListener('click', () => {
      const name = document.getElementById('name').value.trim();
      const email = document.getElementById('email').value.trim();
      msg.textContent = '';
      if (!name || !email) { msg.textContent = 'Please enter name and email.'; msg.className='text-danger'; return; }
      fetch('/api/invites.php?action=join', {
        method: 'POST', headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ token, name, email })
      }).then(r => r.json()).then(j => {
        if (j && j.ok) {
          msg.textContent = 'Joined successfully. You can now be selected in that group.';
          msg.className = 'text-success';
        } else {
          msg.textContent = (j && j.error) ? j.error : 'Failed to join.';
          msg.className = 'text-danger';
        }
      }).catch(() => { msg.textContent = 'Failed to join.'; msg.className='text-danger'; });
    });
  </script>
</body>
</html>
