-- Inserimento Utenti
INSERT INTO `Utente` (`Email`, `Nome`, `Cognome`, `Password`, `Venditore`)
VALUES 
('utente@example.com', 'Mario', 'Rossi', 'password123', 0),
('venditore@example.com', 'Luca', 'Bianchi', 'securepass', 1);

-- Inserimento Manga con Prezzo
INSERT INTO `Manga` (`Voto`, `Titolo`, `Descrizione`, `Quantità`, `Immagine`, `Data_uscita`, `Prezzo`)
VALUES 
(5, 'Naruto - capitolo 1', 'Naruto è una serie manga che racconta la storia di un giovane ninja che sogna di diventare Hokage.', 50, 'naruto_vol_1.jpg', '1999-09-21', 15.99),
(5, 'Naruto - capitolo 2', 'Secondo capitolo della storia di Naruto in cui affronta nuove sfide.', 50, 'naruto_vol_2.jpg', '1999-10-01', 16.99),
(5, 'One Piece - capitolo 1', 'One Piece segue le avventure di Monkey D. Rufy e del suo equipaggio alla ricerca del leggendario tesoro One Piece.', 30, 'one_piece_vol_1.jpg', '1997-07-22', 18.50),
(5, 'One Piece - capitolo 2', 'Secondo capitolo delle avventure di Rufy e del suo equipaggio.', 30, 'one_piece_vol_2.png', '1997-08-01', 18.50),
(9, 'Dandadan', 'Dandadan è una serie manga che unisce elementi sovrannaturali, azione e commedia, seguendo le avventure di due protagonisti alla ricerca di misteri paranormali.', 40, 'dandadan_vol_1.jpg', '2021-03-12', 17.50),
(10, 'Hunter x Hunter - capitolo 1', 'Hunter x Hunter segue le avventure di Gon Freecss, un ragazzo che sogna di diventare un Hunter per cercare suo padre, uno dei più grandi cacciatori del mondo.', 60, 'hunter_x_hunter_vol_1.jpg', '1998-03-03', 18.00),
(8, 'Detective Conan - capitolo 1', 'Conan è un giovane detective che risolve misteri complessi, pur affrontando grandi pericoli e enigmi criminali.', 70, 'detective_conan_vol_1.jpg', '1994-01-01', 20.00),
(7, 'Minecraft - capitolo 1', 'Minecraft Manga esplora il mondo di Minecraft con nuovi personaggi e avventure in un contesto a tema sandbox, dove ogni costruzione è possibile.', 50, 'minecraft_vol_1.jpg', '2021-05-15', 14.99);

-- Inserimento Generi
INSERT INTO `Genere` (`Descrizione`)
VALUES 
('Azione'),
('Avventura'),
('Drammatico'),
('Fantasy'),
('Commedia');

-- Inserimento Categorie
INSERT INTO `Categoria` (`Descrizione`)
VALUES 
('Shonen'),
('MangaItaliani'),
('Manhua');

-- Associazione di Manga ai Generi
INSERT INTO `Manga_has_Genere` (`Manga_idManga`, `Genere_idGenere`)
VALUES 
((SELECT `idManga` FROM `Manga` WHERE `Titolo` = 'Naruto - capitolo 1'), (SELECT `idGenere` FROM `Genere` WHERE `Descrizione` = 'Azione')),
((SELECT `idManga` FROM `Manga` WHERE `Titolo` = 'Naruto - capitolo 1'), (SELECT `idGenere` FROM `Genere` WHERE `Descrizione` = 'Drammatico')),
((SELECT `idManga` FROM `Manga` WHERE `Titolo` = 'Naruto - capitolo 2'), (SELECT `idGenere` FROM `Genere` WHERE `Descrizione` = 'Azione')),
((SELECT `idManga` FROM `Manga` WHERE `Titolo` = 'Naruto - capitolo 2'), (SELECT `idGenere` FROM `Genere` WHERE `Descrizione` = 'Fantasy')),
((SELECT `idManga` FROM `Manga` WHERE `Titolo` = 'One Piece - capitolo 1'), (SELECT `idGenere` FROM `Genere` WHERE `Descrizione` = 'Avventura')),
((SELECT `idManga` FROM `Manga` WHERE `Titolo` = 'One Piece - capitolo 1'), (SELECT `idGenere` FROM `Genere` WHERE `Descrizione` = 'Commedia')),
((SELECT `idManga` FROM `Manga` WHERE `Titolo` = 'One Piece - capitolo 2'), (SELECT `idGenere` FROM `Genere` WHERE `Descrizione` = 'Avventura')),
((SELECT `idManga` FROM `Manga` WHERE `Titolo` = 'One Piece - capitolo 2'), (SELECT `idGenere` FROM `Genere` WHERE `Descrizione` = 'Commedia')),
((SELECT `idManga` FROM `Manga` WHERE `Titolo` = 'Dandadan'), (SELECT `idGenere` FROM `Genere` WHERE `Descrizione` = 'Azione')),
((SELECT `idManga` FROM `Manga` WHERE `Titolo` = 'Hunter x Hunter - capitolo 1'), (SELECT `idGenere` FROM `Genere` WHERE `Descrizione` = 'Azione')),
((SELECT `idManga` FROM `Manga` WHERE `Titolo` = 'Detective Conan - capitolo 1'), (SELECT `idGenere` FROM `Genere` WHERE `Descrizione` = 'Drammatico')),
((SELECT `idManga` FROM `Manga` WHERE `Titolo` = 'Minecraft - capitolo 1'), (SELECT `idGenere` FROM `Genere` WHERE `Descrizione` = 'Fantasy'));

-- Associazione di Manga alle Categorie
INSERT INTO `Manga_has_Categoria` (`Manga_idManga`, `Categoria_idCategoria`)
VALUES 
((SELECT `idManga` FROM `Manga` WHERE `Titolo` = 'Naruto - capitolo 1'), (SELECT `idCategoria` FROM `Categoria` WHERE `Descrizione` = 'Shonen')),
((SELECT `idManga` FROM `Manga` WHERE `Titolo` = 'Naruto - capitolo 2'), (SELECT `idCategoria` FROM `Categoria` WHERE `Descrizione` = 'Shonen')),
((SELECT `idManga` FROM `Manga` WHERE `Titolo` = 'One Piece - capitolo 1'), (SELECT `idCategoria` FROM `Categoria` WHERE `Descrizione` = 'Shonen')),
((SELECT `idManga` FROM `Manga` WHERE `Titolo` = 'One Piece - capitolo 2'), (SELECT `idCategoria` FROM `Categoria` WHERE `Descrizione` = 'Shonen')),
((SELECT `idManga` FROM `Manga` WHERE `Titolo` = 'Dandadan'), (SELECT `idCategoria` FROM `Categoria` WHERE `Descrizione` = 'Shonen')),
((SELECT `idManga` FROM `Manga` WHERE `Titolo` = 'Hunter x Hunter - capitolo 1'), (SELECT `idCategoria` FROM `Categoria` WHERE `Descrizione` = 'Shonen')),
((SELECT `idManga` FROM `Manga` WHERE `Titolo` = 'Detective Conan - capitolo 1'), (SELECT `idCategoria` FROM `Categoria` WHERE `Descrizione` = 'MangaItaliani')),
((SELECT `idManga` FROM `Manga` WHERE `Titolo` = 'Minecraft - capitolo 1'), (SELECT `idCategoria` FROM `Categoria` WHERE `Descrizione` = 'Shonen'));
