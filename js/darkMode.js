// Mantieni il tema all'avvio della pagina
document.addEventListener('DOMContentLoaded', () => {
  const savedTheme = localStorage.getItem('theme') || 'white'; // Ottieni il tema salvato o usa 'white' di default
  document.documentElement.setAttribute('data-bs-theme', savedTheme);  
  document.documentElement.classList.add(savedTheme);
  const logo = document.getElementById("logo");
  logo.src = savedTheme === 'dark' ? "../img/logoDark.png" : "../img/logoLight.png";
  updateCSSVariables(savedTheme);
});

// Seleziona il bottone
const darkModeButton = document.getElementById('darkModeButton');

// Aggiungi un listener per il click
darkModeButton.addEventListener('click', () => {
  // Seleziona l'elemento <html>
  const htmlElement = document.documentElement;

  // Controlla il valore di data-bs-theme e alterna tra "white" e "dark"
  const currentTheme = htmlElement.getAttribute('data-bs-theme');
  const newTheme = currentTheme === 'white' ? 'dark' : 'white';

  // Imposta il nuovo tema
  htmlElement.setAttribute('data-bs-theme', newTheme);
  htmlElement.classList.replace(currentTheme, newTheme);

  // Salva il tema nel localStorage
  localStorage.setItem('theme', newTheme);

  // Cambia immagine in base al tema
  const logo = document.getElementById("logo");
  logo.src = newTheme === 'dark' ? "../img/logoDark.png" : "../img/logoLight.png";
  updateCSSVariables(newTheme);
});
function updateCSSVariables(theme) {
  const root = document.documentElement.style;
  root.setProperty('--article-hover', theme === 'dark' ? '#525252' : '#f5f5f5');
  console.log('Updated CSS variable:', theme, root.getPropertyValue('--article-hover'));
}

