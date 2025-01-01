-- Creazione del database
CREATE DATABASE IF NOT EXISTS MangaParadise;
USE MangaParadise;

-- Creazione della tabella Utente
CREATE TABLE IF NOT EXISTS Utente (
    Email VARCHAR(100) NOT NULL PRIMARY KEY,
    Nome VARCHAR(50) NOT NULL,
    Cognome VARCHAR(50) NOT NULL,
    Password VARCHAR(255) NOT NULL,
    Venditore TINYINT(1) NOT NULL DEFAULT 0
);

-- Creazione della tabella Manga
CREATE TABLE IF NOT EXISTS Manga (
    idManga INT(11) AUTO_INCREMENT PRIMARY KEY,
    Voto TINYINT(1),
    Titolo VARCHAR(80) NOT NULL,
    Descrizione VARCHAR(255) NOT NULL,
    Quantità INT(11) NOT NULL,
    Immagine VARCHAR(255) NOT NULL,
    Data_uscita DATE NOT NULL,
    Prezzo DECIMAL(10, 2) NOT NULL  -- Aggiunto il campo Prezzo
);

-- Creazione della tabella Genere
CREATE TABLE IF NOT EXISTS Genere (
    idGenere INT(11) AUTO_INCREMENT PRIMARY KEY,
    Descrizione VARCHAR(50) NOT NULL
);

-- Creazione della tabella Categoria
CREATE TABLE IF NOT EXISTS Categoria (
    idCategoria INT(11) AUTO_INCREMENT PRIMARY KEY,
    Descrizione VARCHAR(50) NOT NULL
);

-- Creazione della tabella di associazione Manga_has_Genere
CREATE TABLE IF NOT EXISTS Manga_has_Genere (
    Manga_idManga INT(11) NOT NULL,
    Genere_idGenere INT(11) NOT NULL,
    FOREIGN KEY (Manga_idManga) REFERENCES Manga(idManga),
    FOREIGN KEY (Genere_idGenere) REFERENCES Genere(idGenere),
    PRIMARY KEY (Manga_idManga, Genere_idGenere)
);

-- Creazione della tabella di associazione Manga_has_Categoria
CREATE TABLE IF NOT EXISTS Manga_has_Categoria (
    Manga_idManga INT(11) NOT NULL,
    Categoria_idCategoria INT(11) NOT NULL,
    FOREIGN KEY (Manga_idManga) REFERENCES Manga(idManga),
    FOREIGN KEY (Categoria_idCategoria) REFERENCES Categoria(idCategoria),
    PRIMARY KEY (Manga_idManga, Categoria_idCategoria)
);
