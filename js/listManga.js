function updateValue(value) {
    document.querySelector('.rangeValue').textContent = value;
  }

  const openButton = document.querySelector('.btn-outline-info.rounded-pill');
  const overlay = document.querySelector('.filter-overlay');
  openButton.addEventListener('click', () => {
    overlay.style.display = 'flex';
  });

  // Chiudi il filtro cliccando fuori dalla form
  overlay.addEventListener('click', (e) => {
    if (e.target === overlay) {
      overlay.style.display = 'none';
    }
  });

  