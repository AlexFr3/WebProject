DELETE FROM Manga_has_Genere;
DELETE FROM Manga_has_Categoria;
DELETE FROM Utente;
DELETE FROM Manga;
DELETE FROM Genere;
DELETE FROM Categoria;

INSERT INTO `MangaParadise`.`Utente` (`Email`, `Nome`, `Cognome`, `Password`, `Venditore`)
VALUES ('utente@example.com', 'Mario', 'Rossi', 'password123', 0);

INSERT INTO `MangaParadise`.`Utente` (`Email`, `Nome`, `Cognome`, `Password`, `Venditore`)
VALUES ('venditore@example.com', 'Luca', 'Bianchi', 'securepass', 1);

-- Inserimento manga Naruto
INSERT INTO `MangaParadise`.`Manga` (`Voto`, `Titolo`, `Descrizione`, `Quantità`, `Image`)
VALUES 
(5, 'Naruto - capitolo 1', 'Naruto è una serie manga che racconta la storia di un giovane ninja che sogna di diventare Hokage.', 50, 'WEBPROJECT/img/Manga/Naruto_vol_1.jpg');

-- Inserimento manga One Piece
INSERT INTO `MangaParadise`.`Manga` (`Voto`, `Titolo`, `Descrizione`, `Quantità`, `Image`)
VALUES 
(5, 'One Piece - capitolo 1', 'One Piece segue le avventure di Monkey D. Rufy e del suo equipaggio alla ricerca del leggendario tesoro One Piece.', 30, 'WEBPROJECT/img/Manga/One_Piece_vol_1.jpg');

-- Inserimento Generi
INSERT INTO `MangaParadise`.`Genere` (`Descrizione`)
VALUES 
('Azione'),
('Avventura'),
('Drammatico'),
('Fantasy'),
('Commedia');

-- Inserimento Categorie
INSERT INTO `MangaParadise`.`Categoria` (`Descrizione`)
VALUES 
('Shonen'),
('Manga Italiani'),
('Manhua');

-- Associazione di Manga ai Generi
INSERT INTO `MangaParadise`.`Manga_has_Genere` (`Manga_idManga`, `Genere_idGenere`)
VALUES 
((SELECT `idManga` FROM `MangaParadise`.`Manga` WHERE `Titolo` = 'Naruto - capitolo 1'), (SELECT `idGenere` FROM `MangaParadise`.`Genere` WHERE `Descrizione` = 'Azione')),
((SELECT `idManga` FROM `MangaParadise`.`Manga` WHERE `Titolo` = 'Naruto - capitolo 1'), (SELECT `idGenere` FROM `MangaParadise`.`Genere` WHERE `Descrizione` = 'Drammatico')),
((SELECT `idManga` FROM `MangaParadise`.`Manga` WHERE `Titolo` = 'Naruto - capitolo 1'), (SELECT `idGenere` FROM `MangaParadise`.`Genere` WHERE `Descrizione` = 'Fantasy')),
((SELECT `idManga` FROM `MangaParadise`.`Manga` WHERE `Titolo` = 'Naruto - capitolo 1'), (SELECT `idGenere` FROM `MangaParadise`.`Genere` WHERE `Descrizione` = 'Avventura')),
((SELECT `idManga` FROM `MangaParadise`.`Manga` WHERE `Titolo` = 'One Piece - capitolo 1'), (SELECT `idGenere` FROM
`MangaParadise`.`Genere` WHERE `Descrizione` = 'Commedia')),
((SELECT `idManga` FROM `MangaParadise`.`Manga` WHERE `Titolo` = 'One Piece - capitolo 1'), (SELECT `idGenere` FROM
`MangaParadise`.`Genere` WHERE `Descrizione` = 'Azione')),
((SELECT `idManga` FROM `MangaParadise`.`Manga` WHERE `Titolo` = 'One Piece - capitolo 1'), (SELECT `idGenere` FROM
`MangaParadise`.`Genere` WHERE `Descrizione` = 'Avventura')),
((SELECT `idManga` FROM `MangaParadise`.`Manga` WHERE `Titolo` = 'One Piece - capitolo 1'), (SELECT `idGenere` FROM
`MangaParadise`.`Genere` WHERE `Descrizione` = 'Fantasy'));

-- Associazione di Manga alle Categorie
INSERT INTO `MangaParadise`.`Manga_has_Categoria` (`Manga_idManga`, `Categoria_idCategoria`)
VALUES 
((SELECT `idManga` FROM `MangaParadise`.`Manga` WHERE `Titolo` = 'Naruto - capitolo 1'), (SELECT `idCategoria` FROM `MangaParadise`.`Categoria` WHERE `Descrizione` = 'Shonen')),
((SELECT `idManga` FROM `MangaParadise`.`Manga` WHERE `Titolo` = 'One Piece - capitolo 1'), (SELECT `idCategoria` FROM `MangaParadise`.`Categoria` WHERE `Descrizione` = 'Shonen'));