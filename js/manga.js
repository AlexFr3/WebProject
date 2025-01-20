document.addEventListener("DOMContentLoaded", () => {
    const articles = document.querySelectorAll("article[data-id]");
  
    if (articles.length === 0) {
      console.warn("Nessun articolo trovato.");
      return;
    }
  
    articles.forEach(article => {
      article.addEventListener("click", () => {
        const mangaId = article.dataset.id;
        if (mangaId) {
          window.location.href = `manga.php?id=${mangaId}`;
        } else {
          console.error("ID manga non trovato per l'articolo selezionato.");
        }
      });
    });
  });
  