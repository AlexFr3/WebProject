-- -----------------------------------------------------
-- Schema MangaParadise
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `MangaParadise` DEFAULT CHARACTER SET utf8 ;
USE `MangaParadise` ;

-- -----------------------------------------------------
-- Table `MangaParadise`.`Utente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MangaParadise`.`Utente` (
  `Email` VARCHAR(64) NOT NULL,
  `Nome` VARCHAR(45) NOT NULL,
  `Cognome` VARCHAR(45) NOT NULL,
  `Password` VARCHAR(45) NOT NULL,
  `Venditore` TINYINT(1) NULL,
  PRIMARY KEY (`Email`),
  UNIQUE INDEX `Password_UNIQUE` (`Password`)
);

-- -----------------------------------------------------
-- Table `MangaParadise`.`Notifica`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MangaParadise`.`Notifica` (
  `idNotifica` INT NOT NULL AUTO_INCREMENT,
  `Testo` VARCHAR(150) NOT NULL,
  `Letta` TINYINT(1) NULL,
  `User_Email` VARCHAR(64) NOT NULL,
  PRIMARY KEY (`idNotifica`),
  INDEX `fk_Notifica_User_idx` (`User_Email`),
  CONSTRAINT `fk_Notifica_User`
    FOREIGN KEY (`User_Email`)
    REFERENCES `MangaParadise`.`Utente` (`Email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);

-- -----------------------------------------------------
-- Table `MangaParadise`.`Ordine`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MangaParadise`.`Ordine` (
  `idOrdine` INT NOT NULL AUTO_INCREMENT,
  `Stato` VARCHAR(45) NOT NULL,
  `User_Email` VARCHAR(64) NOT NULL,
  PRIMARY KEY (`idOrdine`),
  INDEX `fk_Ordine_User1_idx` (`User_Email`),
  CONSTRAINT `fk_Ordine_User1`
    FOREIGN KEY (`User_Email`)
    REFERENCES `MangaParadise`.`Utente` (`Email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);

-- -----------------------------------------------------
-- Table `MangaParadise`.`Transazione`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MangaParadise`.`Transazione` (
  `Totale` INT NOT NULL,
  `NumeroIdentificativo` VARCHAR(80) NOT NULL,
  `Ordine_idOrdine` INT NOT NULL,
  PRIMARY KEY (`Ordine_idOrdine`),
  CONSTRAINT `fk_Transazione_Ordine1`
    FOREIGN KEY (`Ordine_idOrdine`)
    REFERENCES `MangaParadise`.`Ordine` (`idOrdine`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);

-- -----------------------------------------------------
-- Table `MangaParadise`.`Manga`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MangaParadise`.`Manga` (
  `idManga` INT NOT NULL AUTO_INCREMENT,
  `Voto` TINYINT(1) NULL,
  `Titolo` VARCHAR(80) NOT NULL,
  `Descrizione` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idManga`)
);

-- -----------------------------------------------------
-- Table `MangaParadise`.`Dettaglio_Ordine`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MangaParadise`.`Dettaglio_Ordine` (
  `Manga_idManga` INT NOT NULL,
  `Ordine_idOrdine` INT NOT NULL,
  `Quantità` INT NOT NULL,
  PRIMARY KEY (`Manga_idManga`, `Ordine_idOrdine`),
  INDEX `fk_Manga_has_Ordine_Ordine1_idx` (`Ordine_idOrdine`),
  INDEX `fk_Manga_has_Ordine_Manga1_idx` (`Manga_idManga`),
  CONSTRAINT `fk_Manga_has_Ordine_Manga1`
    FOREIGN KEY (`Manga_idManga`)
    REFERENCES `MangaParadise`.`Manga` (`idManga`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Manga_has_Ordine_Ordine1`
    FOREIGN KEY (`Ordine_idOrdine`)
    REFERENCES `MangaParadise`.`Ordine` (`idOrdine`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);

-- -----------------------------------------------------
-- Table `MangaParadise`.`Genere`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MangaParadise`.`Genere` (
  `idGenere` INT NOT NULL AUTO_INCREMENT,
  `Descrizione` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idGenere`)
);

-- -----------------------------------------------------
-- Table `MangaParadise`.`Categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MangaParadise`.`Categoria` (
  `idCategoria` INT NOT NULL AUTO_INCREMENT,
  `Descrizione` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idCategoria`)
);

-- -----------------------------------------------------
-- Table `MangaParadise`.`Manga_has_Categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MangaParadise`.`Manga_has_Categoria` (
  `Manga_idManga` INT NOT NULL,
  `Categoria_idCategoria` INT NOT NULL,
  PRIMARY KEY (`Manga_idManga`, `Categoria_idCategoria`),
  INDEX `fk_Manga_has_Categoria_Categoria1_idx` (`Categoria_idCategoria`),
  INDEX `fk_Manga_has_Categoria_Manga1_idx` (`Manga_idManga`),
  CONSTRAINT `fk_Manga_has_Categoria_Manga1`
    FOREIGN KEY (`Manga_idManga`)
    REFERENCES `MangaParadise`.`Manga` (`idManga`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Manga_has_Categoria_Categoria1`
    FOREIGN KEY (`Categoria_idCategoria`)
    REFERENCES `MangaParadise`.`Categoria` (`idCategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);

-- -----------------------------------------------------
-- Table `MangaParadise`.`Manga_has_Genere`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `MangaParadise`.`Manga_has_Genere` (
  `Manga_idManga` INT NOT NULL,
  `Genere_idGenere` INT NOT NULL,
  PRIMARY KEY (`Manga_idManga`, `Genere_idGenere`),
  INDEX `fk_Manga_has_Genere_Genere1_idx` (`Genere_idGenere`),
  INDEX `fk_Manga_has_Genere_Manga1_idx` (`Manga_idManga`),
  CONSTRAINT `fk_Manga_has_Genere_Manga1`
    FOREIGN KEY (`Manga_idManga`)
    REFERENCES `MangaParadise`.`Manga` (`idManga`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Manga_has_Genere_Genere1`
    FOREIGN KEY (`Genere_idGenere`)
    REFERENCES `MangaParadise`.`Genere` (`idGenere`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
);
