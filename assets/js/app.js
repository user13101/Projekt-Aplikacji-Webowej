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
