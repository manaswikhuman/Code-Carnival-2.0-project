<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Group Manager - BillSplit</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    body { padding-top: 80px; background: #f8fafc; }
    .card { border:1px solid #e2e8f0; border-radius:12px; box-shadow:0 4px 12px rgba(0,0,0,.05); }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg fixed-top bg-white border-bottom">
    <div class="container">
      <a class="navbar-brand" href="index1.php"><i class="fas fa-users-gear me-2"></i>Group Manager</a>
      <div class="ms-auto">
        <a class="btn btn-sm btn-outline-secondary" href="demo1.php">Expenses</a>
        <a class="btn btn-sm btn-outline-secondary" href="dashboard1.php">Dashboard</a>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="card p-3 mb-3">
      <div class="row g-2 align-items-end">
        <div class="col-md-4">
          <label class="form-label">Your Email</label>
          <input id="ownerEmail" class="form-control" type="email" placeholder="you@example.com">
        </div>
        <div class="col-md-3">
          <button class="btn btn-primary w-100" onclick="loadGroups()"><i class="fas fa-download me-1"></i>Load Groups</button>
        </div>
        <div class="col-md-5 d-flex gap-2">
          <input id="newGroupName" class="form-control" placeholder="New group name">
          <button class="btn btn-success" onclick="createGroup()"><i class="fas fa-plus me-1"></i>Create Group</button>
        </div>
      </div>
    </div>

    <div id="groupsContainer" class="row g-3"></div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function esc(s){ return String(s).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;').replace(/'/g,'&#039;'); }

    function loadGroups(){
      const email = document.getElementById('ownerEmail').value.trim();
      if(!email){ alert('Enter your email'); return; }
      fetch('/api/groups.php?ownerEmail=' + encodeURIComponent(email))
        .then(r=>r.json()).then(j=>{
          if(j && j.ok){ renderGroups(j.data||[]); }
        });
    }

    function createGroup(){
      const email = document.getElementById('ownerEmail').value.trim();
      const name = document.getElementById('newGroupName').value.trim();
      if(!email || !name){ alert('Enter email and group name'); return; }
      fetch('/api/groups.php', { method:'POST', headers:{'Content-Type':'application/json'}, body: JSON.stringify({ name, ownerEmail: email, members: [] }) })
        .then(r=>r.json()).then(j=>{ if(j && j.ok){ document.getElementById('newGroupName').value=''; loadGroups(); } });
    }

    function addMember(groupId, idx){
      const name = document.getElementById(`mname-${groupId}-${idx}`).value.trim();
      const email = document.getElementById(`memail-${groupId}-${idx}`).value.trim();
      if(!name || !email){ alert('Enter name and email'); return; }
      fetch('/api/groups.php?action=addMember', { method:'POST', headers:{'Content-Type':'application/json'}, body: JSON.stringify({ groupId, name, email }) })
        .then(r=>r.json()).then(j=>{ if(j && j.ok){ loadGroups(); } });
    }

    function removeMember(memberId){
      if(!confirm('Remove this member?')) return;
      fetch('/api/groups.php?action=removeMember', { method:'POST', headers:{'Content-Type':'application/json'}, body: JSON.stringify({ memberId }) })
        .then(r=>r.json()).then(j=>{ if(j && j.ok){ loadGroups(); } });
    }

    function createInvite(groupId){
      fetch('/api/invites.php', { method:'POST', headers:{'Content-Type':'application/json'}, body: JSON.stringify({ groupId }) })
        .then(r=>r.json()).then(j=>{
          if(j && j.ok){
            navigator.clipboard.writeText(j.inviteUrl).then(()=> alert('Invite copied: '+j.inviteUrl), ()=> alert('Invite: '+j.inviteUrl));
          }
        });
    }

    function renderGroups(groups){
      const cont = document.getElementById('groupsContainer');
      if(!groups.length){ cont.innerHTML = '<div class="text-muted">No groups yet.</div>'; return; }
      cont.innerHTML = groups.map(g=>{
        const members = (g.members||[]).map(m=>`
          <li class="list-group-item d-flex justify-content-between align-items-center">
            <span>${esc(m.name)} <small class="text-muted">(${esc(m.email)})</small></span>
            <button class="btn btn-sm btn-outline-danger" onclick="removeMember(${m.id})"><i class="fas fa-trash"></i></button>
          </li>`).join('');
        const idx = Math.floor(Math.random()*100000);
        return `
          <div class="col-md-6">
            <div class="card h-100">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <h5 class="mb-0">${esc(g.name)}</h5>
                  <button class="btn btn-sm btn-outline-primary" onclick="createInvite(${g.id})"><i class="fas fa-link me-1"></i>Invite</button>
                </div>
                <h6 class="text-muted">Members</h6>
                <ul class="list-group mb-3">${members || '<li class="list-group-item">No members</li>'}</ul>
                <div class="row g-2">
                  <div class="col">
                    <input id="mname-${g.id}-${idx}" class="form-control" placeholder="Member name">
                  </div>
                  <div class="col">
                    <input id="memail-${g.id}-${idx}" class="form-control" placeholder="Member email" type="email">
                  </div>
                  <div class="col-auto">
                    <button class="btn btn-success" onclick="addMember(${g.id}, ${idx})"><i class="fas fa-plus"></i></button>
                  </div>
                </div>
              </div>
            </div>
          </div>`;
      }).join('');
    }
  </script>
</body>
</html>
