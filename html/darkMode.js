console.log("Script caricato correttamente!");

document.getElementById('btnSwitch').addEventListener('click', () => {
  const theme = document.documentElement.getAttribute('data-bs-theme');
  if (theme === 'dark') {
    document.documentElement.setAttribute('data-bs-theme', 'light');
    console.log("Modalità chiara attivata");
  } else {
    document.documentElement.setAttribute('data-bs-theme', 'dark');
    console.log("Modalità scura attivata");
  }
});