self.addEventListener('install', (event) => {
  event.waitUntil(
    caches.open('billsplit-v1').then((cache) => cache.addAll([
      '/',
      '/demo1.php',
      '/dashboard1.php',
      '/api/expenses.php',
      '/manifest.json'
    ]))
  );
});

self.addEventListener('fetch', (event) => {
  event.respondWith(
    caches.match(event.request).then((cached) => {
      const fetchPromise = fetch(event.request).then((networkResponse) => {
        if (networkResponse && networkResponse.status === 200 && event.request.method === 'GET') {
          const copy = networkResponse.clone();
          caches.open('billsplit-v1').then((cache) => cache.put(event.request, copy));
        }
        return networkResponse;
      }).catch(() => cached);
      return cached || fetchPromise;
    })
  );
});
