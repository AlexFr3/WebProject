document.addEventListener("DOMContentLoaded", function () {
    const progressElement = document.getElementById("order-progress");
    const progressImage = document.getElementById("progress-image");
    const statusMap = {
        "In elaborazione": 10,
        "Spedito": 60,
        "Consegnato": 100
    };
    const initialStatus = progressElement.dataset.status;

    // Funzione per aggiornare la barra e l'immagine
    function updateProgress(status) {
        if (statusMap[status]) {
            // Imposta il valore della barra di progresso
            progressElement.value = statusMap[status];
        } else {
            console.error("Stato non riconosciuto:", status);
        }
    }

    updateProgress(initialStatus);

    setInterval(() => {
        const updatedStatus = progressElement.dataset.status;
        updateProgress(updatedStatus);
    }, 10000); 
});
