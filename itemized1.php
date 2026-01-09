<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BillSplit - Itemized Splitting</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    body { padding-top: 100px; background: #f8fafc; font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, sans-serif; }
    .page-title { font-weight: 800; }
    .demo-card { background: #fff; border: 1px solid #e2e8f0; border-radius: 16px; box-shadow: 0 6px 16px rgba(0,0,0,.06); padding: 1.5rem; margin-bottom: 1.5rem; }
    /* Center main demo-cards for better visual balance */
    .container > .demo-card { max-width: 980px; margin-left: auto; margin-right: auto; }
    .demo-card .table-responsive { display:flex; justify-content:center; }
    .table thead th { background: #f1f5f9; }
    .badge-pill { border-radius: 9999px; }
    .summary-value { font-weight: 800; font-size: 1.1rem; }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg fixed-top" style="background:#fff; border-bottom:1px solid #e2e8f0;">
    <div class="container">
      <a class="navbar-brand" href="index1.php"><i class="fas fa-receipt me-2"></i>BillSplit</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="nav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="features1.php">Back to Features</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="mb-4 text-center">
      <h1 class="page-title">Itemized Splitting</h1>
      <p class="text-muted">Add individual items, assign participants, and split including the payer.</p>
    </div>

    <div class="demo-card">
      <div class="row g-3 align-items-end">
        <div class="col-md-3">
          <label class="form-label">Payer</label>
          <input id="it_payer" type="text" class="form-control" placeholder="Who paid?" aria-label="Payer">
          <div class="invalid-feedback">Enter payer name</div>
        </div>
        <div class="col-md-3">
          <label class="form-label">Item</label>
          <input id="it_name" type="text" class="form-control" placeholder="e.g. Pizza" aria-label="Item name">
          <div class="invalid-feedback">Enter item name</div>
        </div>
        <div class="col-md-2">
          <label class="form-label">Amount (₹)</label>
          <input id="it_amount" type="number" step="0.01" min="0" class="form-control" placeholder="0.00" aria-label="Amount">
          <div class="invalid-feedback">Enter a valid amount</div>
        </div>
        <div class="col-md-4">
          <label class="form-label">Participants (comma separated)</label>
          <input id="it_parts" type="text" class="form-control" placeholder="Name1, Name2" aria-label="Participants">
        </div>
        <div class="col-12 d-flex gap-2">
          <button id="addItemBtn" class="btn btn-primary"><i class="fas fa-plus me-2"></i>Add Item</button>
          <button id="resetBtn" class="btn btn-light"><i class="fas fa-rotate-left me-2"></i>Reset</button>
          <button id="exportBtn" class="btn btn-secondary"><i class="fas fa-file-export me-2"></i>Export CSV</button>
        </div>
      </div>
    </div>

    <div class="demo-card">
      <h5 class="mb-3">Items</h5>
      <div class="table-responsive">
        <table class="table align-middle">
          <thead>
            <tr>
              <th>Item</th>
              <th class="text-end">Amount</th>
              <th>Included People</th>
              <th class="text-end">Actions</th>
            </tr>
          </thead>
          <tbody id="itemsTbody">
            <tr id="itemsEmpty"><td colspan="4" class="text-center text-muted py-4">No items yet</td></tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="demo-card">
      <h5 class="mb-3">Receipt Summary</h5>
      <div class="row g-3">
        <div class="col-md-4">
          <div class="p-3 border rounded">
            <div class="text-muted">Total Items</div>
            <div id="sumItems" class="summary-value">0</div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="p-3 border rounded">
            <div class="text-muted">Total Amount</div>
            <div id="sumAmount" class="summary-value">₹0.00</div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="p-3 border rounded">
            <div class="text-muted">Unique People</div>
            <div id="sumPeople" class="summary-value">0</div>
          </div>
        </div>
      </div>
    </div>

    <div class="demo-card">
      <h5 class="mb-3">Per-Person Totals</h5>
      <div id="totals" class="d-flex flex-wrap gap-2"></div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const items = [];
    let lastPayer = '';
    let lastParts = [];

    function toPaise(n){ const x = Number(n); return isFinite(x) ? Math.round(x*100) : 0; }
    function fromPaise(p){ return (p/100); }
    function money(n){ return '₹' + Number(n).toFixed(2); }
    function esc(s){ return String(s).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;').replace(/'/g,'&#039;'); }

    function showNotification(message, type){
      const n = document.createElement('div');
      n.className = `alert alert-${type==='error'?'danger':'success'} position-fixed`;
      n.style.cssText = 'top: 100px; right: 20px; z-index: 1050; min-width: 300px;';
      n.innerHTML = message;
      document.body.appendChild(n);
      setTimeout(()=> n.remove(), 2500);
    }

    document.getElementById('addItemBtn').addEventListener('click', () => {
      const payerEl = document.getElementById('it_payer');
      const nameEl = document.getElementById('it_name');
      const amountEl = document.getElementById('it_amount');
      const partsEl = document.getElementById('it_parts');

      const payer = payerEl.value.trim();
      const name = nameEl.value.trim();
      const amount = parseFloat(amountEl.value);
      const partsRaw = partsEl.value.split(',').map(s=>s.trim()).filter(Boolean);

      // Fallback to previous values if left blank
      const effectivePayer = payer || lastPayer;
      const effectiveParts = partsRaw.length ? partsRaw : lastParts.slice();

      [payerEl, nameEl, amountEl].forEach(el => el.classList.remove('is-invalid'));

      let hasError = false;
      if(!effectivePayer){ payerEl.classList.add('is-invalid'); if(!hasError) payerEl.focus(); hasError = true; }
      if(!name){ nameEl.classList.add('is-invalid'); if(!hasError) nameEl.focus(); hasError = true; }
      if(!isFinite(amount) || amount<=0){ amountEl.classList.add('is-invalid'); if(!hasError) amountEl.focus(); hasError = true; }
      if(hasError){ showNotification('Please fill all fields correctly.', 'error'); return; }

      // Build group: payer + unique participants
      const seen = new Set();
      const group = [];
      const push = (n)=>{ const k=n.toLowerCase(); if(!seen.has(k)){ seen.add(k); group.push(n); } };
      push(effectivePayer);
      effectiveParts.forEach(p=>{ if(p) push(p); });

      // Add immediately (no loading delay)
      items.push({ payer: effectivePayer, name, amount, group, created_at: new Date().toISOString() });
      renderItems();
      renderTotals();

      nameEl.value = '';
      amountEl.value = '';
      partsEl.value = '';
      // Remember last used values for quick entry
      if (effectivePayer) lastPayer = effectivePayer;
      if (effectiveParts.length) lastParts = effectiveParts.slice();
      showNotification('Item added successfully.', 'success');
    });

    ['it_payer','it_name','it_amount','it_parts'].forEach(id => {
      const el = document.getElementById(id);
      el.addEventListener('input', ()=> el.classList.remove('is-invalid'));
    });

    // Enter key to add item
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Enter') {
        const focused = document.activeElement;
        if (focused && ['it_payer','it_name','it_amount','it_parts'].includes(focused.id)) {
          e.preventDefault();
          document.getElementById('addItemBtn').click();
        }
      }
    });

    function renderItems(){
      const tbody = document.getElementById('itemsTbody');
      tbody.innerHTML='';
      if(items.length===0){
        document.getElementById('itemsEmpty').style.display='';
        return;
      }
      document.getElementById('itemsEmpty').style.display='none';
      items.forEach((it, idx) => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
          <td>${esc(it.name)}</td>
          <td class="text-end">${money(it.amount)}</td>
          <td>
            ${it.group.map(n=>`<span class=\"badge bg-light text-dark me-1 mb-1\">${esc(n)}</span>`).join('')}
          </td>
          <td class="text-end">
            <button class="btn btn-sm btn-outline-danger" onclick="removeItem(${idx})"><i class="fas fa-trash"></i></button>
          </td>`;
        tbody.appendChild(tr);
      });
    }

    function removeItem(i){ items.splice(i,1); renderItems(); renderTotals(); }

    function renderTotals(){
      const totalsPaise = {};
      const allPeople = new Set();
      let sumAmountPaise = 0;
      items.forEach(it => {
        const total = toPaise(it.amount);
        sumAmountPaise += total;
        const n = Math.max(1, it.group.length);
        const base = Math.floor(total / n);
        let rem = total - base * n;
        it.group.forEach(name => {
          const share = base + (rem>0 ? 1 : 0); if(rem>0) rem -= 1;
          totalsPaise[name] = (totalsPaise[name]||0) + share;
          allPeople.add(name);
        });
      });

      const cont = document.getElementById('totals');
      cont.innerHTML='';
      const entries = Object.entries(totalsPaise);
      if(entries.length===0){
        cont.innerHTML = '<div class="text-muted">No totals yet</div>';
        // Update summary
        document.getElementById('sumItems').textContent = '0';
        document.getElementById('sumAmount').textContent = money(0);
        document.getElementById('sumPeople').textContent = '0';
        return;
      }
      entries.sort((a,b)=>a[0].localeCompare(b[0]));
      entries.forEach(([name, paise])=>{
        const el = document.createElement('div');
        el.className = 'badge bg-light text-dark badge-pill p-2';
        el.innerHTML = `${esc(name)}: <strong>${money(fromPaise(paise))}</strong>`;
        cont.appendChild(el);
      });

      // Update summary
      document.getElementById('sumItems').textContent = String(items.length);
      document.getElementById('sumAmount').textContent = money(fromPaise(sumAmountPaise));
      document.getElementById('sumPeople').textContent = String(allPeople.size);
    }

    // Reset
    document.getElementById('resetBtn').addEventListener('click', () => {
      if (!confirm('Clear all items?')) return;
      items.length = 0;
      renderItems();
      renderTotals();
    });

    // Export CSV
    document.getElementById('exportBtn').addEventListener('click', () => {
      if (items.length === 0) { showNotification('Nothing to export.', 'error'); return; }
      // Build CSV rows
      const rows = [['Payer','Item','Amount','Group']];
      items.forEach(it => {
        rows.push([it.payer, it.name, Number(it.amount).toFixed(2), it.group.join(' | ')]);
      });

      // Person totals
      const totalsPaise = {};
      items.forEach(it => {
        const total = toPaise(it.amount);
        const n = Math.max(1, it.group.length);
        const base = Math.floor(total / n);
        let rem = total - base * n;
        it.group.forEach(name => {
          const share = base + (rem>0 ? 1 : 0); if(rem>0) rem -= 1;
          totalsPaise[name] = (totalsPaise[name]||0) + share;
        });
      });
      rows.push([]);
      rows.push(['Person','Total']);
      Object.entries(totalsPaise).sort((a,b)=>a[0].localeCompare(b[0])).forEach(([name, paise]) => {
        rows.push([name, Number(fromPaise(paise)).toFixed(2)]);
      });

      const csv = rows.map(r => r.map(x => '"' + String(x).replace(/"/g,'""') + '"').join(',')).join('\n');
      const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
      const url = URL.createObjectURL(blob);
      const a = document.createElement('a');
      a.href = url;
      a.download = 'itemized_splitting.csv';
      document.body.appendChild(a);
      a.click();
      document.body.removeChild(a);
      URL.revokeObjectURL(url);
      showNotification('Exported CSV.', 'success');
    });
  </script>
</body>
</html>

