function losujKota() {
  fetch('https://api.thecatapi.com/v1/images/search')
    .then(res => res.json())
    .then(data => {
      document.getElementById('kot').src = data[0].url;
    });
}

document.addEventListener('DOMContentLoaded', () => {
  const nav = document.getElementById('primaryNav');
  const toggle = document.getElementById('mobileToggle');
  if (toggle && nav) {
    toggle.addEventListener('click', () => {
      const open = nav.classList.toggle('open');
      toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
  }

  const themeToggle = document.getElementById('themeToggle');
  const applyThemeState = () => {
    const explicit = document.documentElement.dataset.theme;
    const systemDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
    const dark = explicit ? explicit === 'dark' : systemDark;
    if (themeToggle) {
      themeToggle.textContent = dark ? '☀️' : '🌙';
      themeToggle.setAttribute('aria-pressed', dark ? 'true' : 'false');
      themeToggle.setAttribute('aria-label', dark ? 'Włącz jasny motyw' : 'Włącz ciemny motyw');
      themeToggle.title = dark ? 'Jasny motyw' : 'Ciemny motyw';
    }
  };
  applyThemeState();
  if (themeToggle) {
    themeToggle.addEventListener('click', () => {
      const explicit = document.documentElement.dataset.theme;
      const systemDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
      const dark = explicit ? explicit === 'dark' : systemDark;
      const next = dark ? 'light' : 'dark';
      document.documentElement.dataset.theme = next;
      try { localStorage.setItem('theme', next); } catch (e) {}
      applyThemeState();
    });
  }
  if (window.matchMedia) {
    const mq = window.matchMedia('(prefers-color-scheme: dark)');
    const onChange = () => { if (!localStorage.getItem('theme')) applyThemeState(); };
    if (mq.addEventListener) mq.addEventListener('change', onChange);
    else if (mq.addListener) mq.addListener(onChange);
  }

  const searchInput = document.getElementById('catSearch');
  const statusFilter = document.getElementById('statusFilter');
  const items = document.querySelectorAll('.cat-item');
  const filterCats = () => {
    const query = (searchInput?.value || '').toLowerCase().trim();
    const status = statusFilter?.value || 'all';
    items.forEach(item => {
      const name = item.dataset.name || '';
      const breed = item.dataset.breed || '';
      const state = item.dataset.status || '';
      const matchesQuery = name.includes(query) || breed.includes(query);
      const matchesStatus = status === 'all' || state === status;
      item.style.display = matchesQuery && matchesStatus ? '' : 'none';
    });
  };
  searchInput?.addEventListener('input', filterCats);
  statusFilter?.addEventListener('change', filterCats);
  const toast = document.getElementById('cartToast');
  document.querySelectorAll('.add-cart').forEach(button => {
    button.addEventListener('click', () => {
      if (!toast) return;
      toast.textContent = `Dodano do koszyka: ${button.dataset.product}`;
      toast.classList.add('show');
      setTimeout(() => toast.classList.remove('show'), 2400);
    });
  });

  const reveals = document.querySelectorAll('.reveal');
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
      }
    });
  }, { threshold: 0.15 });
  reveals.forEach(el => observer.observe(el));
});
