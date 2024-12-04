-- Disabilita i controlli sulle chiavi esterne
SET FOREIGN_KEY_CHECKS=0;

-- Creazione del database MangaParadise
CREATE SCHEMA IF NOT EXISTS `MangaParadise` DEFAULT CHARACTER SET utf8;
USE `MangaParadise`;

-- Creazione della tabella Utente
CREATE TABLE IF NOT EXISTS `Utente` (
  `Email` VARCHAR(64) NOT NULL,
  `Nome` VARCHAR(45) NOT NULL,
  `Cognome` VARCHAR(45) NOT NULL,
  `Password` VARCHAR(45) NOT NULL,
  `Venditore` TINYINT(1) NOT NULL,
  PRIMARY KEY (`Email`)
) ENGINE = InnoDB;

-- Creazione della tabella Notifica
CREATE TABLE IF NOT EXISTS `Notifica` (
  `idNotifica` INT NOT NULL AUTO_INCREMENT,
  `Testo` VARCHAR(150) NOT NULL,
  `Letta` TINYINT(1),
  `User_Email` VARCHAR(64) NOT NULL,
  PRIMARY KEY (`idNotifica`),
  INDEX `fk_Notifica_User_idx` (`User_Email`),
  CONSTRAINT `fk_Notifica_User`
    FOREIGN KEY (`User_Email`)
    REFERENCES `Utente` (`Email`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE = InnoDB;

-- Creazione della tabella Ordine
CREATE TABLE IF NOT EXISTS `Ordine` (
  `idOrdine` INT NOT NULL AUTO_INCREMENT,
  `Stato` VARCHAR(45) NOT NULL,
  `User_Email` VARCHAR(64) NOT NULL,
  PRIMARY KEY (`idOrdine`),
  INDEX `fk_Ordine_User1_idx` (`User_Email`),
  CONSTRAINT `fk_Ordine_User1`
    FOREIGN KEY (`User_Email`)
    REFERENCES `Utente` (`Email`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE = InnoDB;

-- Creazione della tabella Transazione
CREATE TABLE IF NOT EXISTS `Transazione` (
  `Totale` INT NOT NULL,
  `NumeroIdentificativo` VARCHAR(80) NOT NULL,
  `Ordine_idOrdine` INT NOT NULL,
  PRIMARY KEY (`Ordine_idOrdine`),
  CONSTRAINT `fk_Transazione_Ordine1`
    FOREIGN KEY (`Ordine_idOrdine`)
    REFERENCES `Ordine` (`idOrdine`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE = InnoDB;

-- Creazione della tabella Manga
CREATE TABLE IF NOT EXISTS `Manga` (
  `idManga` INT NOT NULL AUTO_INCREMENT,
  `Voto` TINYINT(1),
  `Titolo` VARCHAR(80) NOT NULL,
  `Descrizione` VARCHAR(255) NOT NULL,
  `Quantità` INT NOT NULL,
  `Immagine` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idManga`)
) ENGINE = InnoDB;

-- Creazione della tabella Dettaglio_Ordine
CREATE TABLE IF NOT EXISTS `Dettaglio_Ordine` (
  `Manga_idManga` INT NOT NULL,
  `Ordine_idOrdine` INT NOT NULL,
  `Quantità` INT NOT NULL,
  PRIMARY KEY (`Manga_idManga`, `Ordine_idOrdine`),
  INDEX `fk_Manga_has_Ordine_Ordine1_idx` (`Ordine_idOrdine`),
  CONSTRAINT `fk_Manga_has_Ordine_Manga1`
    FOREIGN KEY (`Manga_idManga`)
    REFERENCES `Manga` (`idManga`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Manga_has_Ordine_Ordine1`
    FOREIGN KEY (`Ordine_idOrdine`)
    REFERENCES `Ordine` (`idOrdine`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE = InnoDB;

-- Creazione della tabella Genere
CREATE TABLE IF NOT EXISTS `Genere` (
  `idGenere` INT NOT NULL AUTO_INCREMENT,
  `Descrizione` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idGenere`)
) ENGINE = InnoDB;

-- Creazione della tabella Categoria
CREATE TABLE IF NOT EXISTS `Categoria` (
  `idCategoria` INT NOT NULL AUTO_INCREMENT,
  `Descrizione` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE = InnoDB;

-- Creazione della tabella Manga_has_Categoria
CREATE TABLE IF NOT EXISTS `Manga_has_Categoria` (
  `Manga_idManga` INT NOT NULL,
  `Categoria_idCategoria` INT NOT NULL,
  PRIMARY KEY (`Manga_idManga`, `Categoria_idCategoria`),
  CONSTRAINT `fk_Manga_has_Categoria_Manga1`
    FOREIGN KEY (`Manga_idManga`)
    REFERENCES `Manga` (`idManga`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Manga_has_Categoria_Categoria1`
    FOREIGN KEY (`Categoria_idCategoria`)
    REFERENCES `Categoria` (`idCategoria`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE = InnoDB;

-- Creazione della tabella Manga_has_Genere
CREATE TABLE IF NOT EXISTS `Manga_has_Genere` (
  `Manga_idManga` INT NOT NULL,
  `Genere_idGenere` INT NOT NULL,
  PRIMARY KEY (`Manga_idManga`, `Genere_idGenere`),
  CONSTRAINT `fk_Manga_has_Genere_Manga1`
    FOREIGN KEY (`Manga_idManga`)
    REFERENCES `Manga` (`idManga`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Manga_has_Genere_Genere1`
    FOREIGN KEY (`Genere_idGenere`)
    REFERENCES `Genere` (`idGenere`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE = InnoDB;

-- Creazione della tabella Carrello_has_Manga
CREATE TABLE IF NOT EXISTS `Carrello_has_Manga` (
  `Utente_Email` VARCHAR(64) NOT NULL,
  `Manga_idManga` INT NOT NULL,
  `Quantità` INT NOT NULL,
  PRIMARY KEY (`Utente_Email`, `Manga_idManga`),
  CONSTRAINT `fk_Utente_has_Manga_Utente1`
    FOREIGN KEY (`Utente_Email`)
    REFERENCES `Utente` (`Email`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_Utente_has_Manga_Manga1`
    FOREIGN KEY (`Manga_idManga`)
    REFERENCES `Manga` (`idManga`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE = InnoDB;

-- Abilitazione dei controlli sulle chiavi esterne
SET FOREIGN_KEY_CHECKS=1;