<?php
class DatabaseHelper
{
    private $db;

    public function __construct($servername, $username, $password, $dbname, $port)
    {
        $this->db = new mysqli($servername, $username, $password, $dbname, $port);
        if ($this->db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }
    }

    public function getPostByIdAndAuthor($id, $idauthor){
        $query = "SELECT idarticolo, anteprimaarticolo, titoloarticolo, imgarticolo, testoarticolo, dataarticolo, (SELECT GROUP_CONCAT(categoria) FROM articolo_ha_categoria WHERE articolo=idarticolo GROUP BY articolo) as categorie FROM articolo WHERE idarticolo=? AND autore=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii',$id, $idauthor);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getMangaDetails($idManga){
        $query = "SELECT idManga, voto, titolo, descrizione, quantità, immagine, Data_uscita, Prezzo, (SELECT GROUP_CONCAT(descrizione) FROM manga_has_categoria M, Categoria C WHERE Manga_idManga=idManga AND C.id=Categoria_idCategoria GROUP BY idManga) as categorie, (SELECT GROUP_CONCAT(descrizione) FROM manga_has_genere M, Genere G WHERE Manga_idManga=idManga AND G.idGenere=M.Genere_idGenere GROUP BY idManga) as generi FROM manga WHERE idManga=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i',$idManga);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getOrdersByUser($email)
    {
        $query = "SELECT O.idOrdine, O.Data_ordine, O.Totale
              FROM Ordine O
              WHERE O.Utente_Email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllGenres()
    {

        $stmt = $this->db->prepare("SELECT idGenere, Descrizione FROM Genere");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllCategories()
    {
        $stmt = $this->db->prepare("SELECT idCategoria, Descrizione FROM Categoria");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllDatabaseManga()
    {
        $query = "SELECT idManga, Titolo, Descrizione, Prezzo, Quantità, Immagine, Data_uscita  FROM Manga";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllManga($categories, $genres, $price, $orderBy)
    {
        $query = "SELECT DISTINCT m.idManga, m.Prezzo, m.Voto, m.Titolo, m.Descrizione, m.Quantità, m.Immagine, m.Data_uscita 
                  FROM Manga m
                  LEFT JOIN Manga_has_Categoria mc ON m.idManga = mc.Manga_idManga
                  LEFT JOIN Manga_has_Genere mg ON m.idManga = mg.Manga_idManga
                  WHERE 1=1";

        $params = [];

        // Filtro per categorie
        if (!empty($categories)) {
            $placeholders = implode(',', array_fill(0, count($categories), '?'));
            $query .= " AND mc.Categoria_idCategoria IN ($placeholders)";
            $params = array_merge($params, $categories);
        }

        // Filtro per generi
        if (!empty($genres)) {
            $placeholders = implode(',', array_fill(0, count($genres), '?'));
            $query .= " AND mg.Genere_idGenere IN ($placeholders)";
            $params = array_merge($params, $genres);
        }

        // Filtro per prezzo
        if ($price > 0) {
            $query .= " AND m.Prezzo <= ?";
            $params[] = $price;
        }

        // Ordinamento
        if ($orderBy === 'voti') {
            $query .= " ORDER BY m.Voto DESC";
        } elseif ($orderBy === 'prezzo') {
            $query .= " ORDER BY m.Prezzo ASC";
        } elseif ($orderBy === 'data') {
            $query .= " ORDER BY m.Data_uscita DESC";
        }


        // Prepara ed esegui la query
        $stmt = $this->db->prepare($query);
        $stmt->execute($params);
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getRandomManga($n)
    {
        $stmt = $this->db->prepare("SELECT Voto, Titolo, Descrizione, Quantità, Immagine, Data_uscita FROM Manga ORDER BY RAND() LIMIT ?");
        $stmt->bind_param('i', $n);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getLatestManga($n)
    {
        $stmt = $this->db->prepare("SELECT idManga, Titolo, Immagine, Quantità, Prezzo FROM Manga ORDER BY Data_uscita DESC LIMIT ?");
        $stmt->bind_param('i', $n);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getTopRatedManga($n)
    {
        $stmt = $this->db->prepare("SELECT idManga, Voto, Titolo, Immagine, Quantità, Prezzo FROM Manga ORDER BY Voto DESC LIMIT ?");
        $stmt->bind_param('i', $n);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getMangaById($idManga)
    {
        $query = "SELECT idManga, Titolo, Descrizione, Prezzo, Quantità, Immagine, Data_uscita 
              FROM Manga 
              WHERE idManga = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $idManga); // 'i' indica un parametro intero
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_assoc(); // Restituisce una singola riga associativa
    }

    public function getCategories()
    {
        $stmt = $this->db->prepare("SELECT * FROM categoria");
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getCategoryById($idcategory)
    {
        $stmt = $this->db->prepare("SELECT nomecategoria FROM categoria WHERE idcategoria=?");
        $stmt->bind_param('i', $idcategory);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function checkLogin($email, $password)
    {
        $query = "SELECT email, password, venditore, nome, cognome FROM utente WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        $user = $result->fetch_assoc();
        if ($user && password_verify($password, $user['password'])) {
            unset($user['password']);
            return $user;
        }
        return false;
    }

    public function registerNewUser($nome, $cognome, $email, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $query = "INSERT INTO `Utente` (`Email`, `Nome`, `Cognome`, `Password`, `Venditore`) VALUES(?, ?, ?, ?, 0)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssss', $email, $nome, $cognome, $hashedPassword);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function existsUserWithEmail($email)
    {
        $query = "SELECT email, venditore, nome, cognome FROM utente WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        $result = $result->fetch_all(MYSQLI_ASSOC);
        if (count($result) == 0) {
            return false;
        } else {
            return true;
        }
    }

    public function getQuantity($idManga)
    {
        $query = "SELECT Quantità FROM manga WHERE idManga = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('i', $idManga);
        $stmt->execute();
        $result = $stmt->get_result();
        $result = $result->fetch_all(MYSQLI_ASSOC);

        if (count($result) == 0) {
            return 0;
        } else {
            return (int) $result[0]["Quantità"];
        }
    }

    public function addToCart($idManga, $email)
    {
        $query = "INSERT INTO `Carrello` (`Utente_Email`, `Manga_idManga`) VALUES(?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('si', $email, $idManga);
        try {
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }

    public function getMangaInCart($email)
    {
        $query = "SELECT idManga, Titolo, Immagine, Prezzo, C.Quantità AS Quantità_In_Carrello, M.Quantità AS Quantità_Disponibile FROM Manga M, Carrello C WHERE C.Utente_Email = ? AND M.idManga = C.Manga_idManga";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function updateMangaQuantityAndCart($idManga, $quantityToRemove) {
        // Riduci la quantità nella tabella Manga
        $queryManga = "UPDATE Manga 
                       SET Quantità = GREATEST(Quantità - ?, 0) 
                       WHERE idManga = ?";
        $stmtManga = $this->db->prepare($queryManga);
        $stmtManga->bind_param("ii", $quantityToRemove, $idManga);
        $stmtManga->execute();
    
        // Controlla la quantità attuale del manga
        $queryCheckQuantity = "SELECT Quantità FROM Manga WHERE idManga = ?";
        $stmtCheck = $this->db->prepare($queryCheckQuantity);
        $stmtCheck->bind_param("i", $idManga);
        $stmtCheck->execute();
        $result = $stmtCheck->get_result();
        $currentQuantity = $result->fetch_assoc()["Quantità"];
    
        // Se la quantità è zero, rimuovi il manga dal carrello
        if ($currentQuantity == 0) {
            $queryDeleteCart = "DELETE FROM Carrello WHERE Manga_idManga = ?";
            $stmtCart = $this->db->prepare($queryDeleteCart);
            $stmtCart->bind_param("i", $idManga);
            $stmtCart->execute();
        }
    
        return $currentQuantity; 
    }

    public function createOrder($userEmail, $cartItems, $total) {
        try {
            // Inizia una transazione
            $this->db->begin_transaction();
    
            // Inserisce l'ordine nella tabella Ordine
            $queryOrder = "INSERT INTO Ordine (Utente_Email, Totale) VALUES (?, ?)";
            $stmtOrder = $this->db->prepare($queryOrder);
            $stmtOrder->bind_param("sd", $userEmail, $total);
            $stmtOrder->execute();
    
            // Ottieni l'ID dell'ordine appena creato
            $orderId = $stmtOrder->insert_id;
    
            // Inserisci i dettagli dell'ordine nella tabella Ordine_has_Manga
            $queryOrderDetails = "INSERT INTO Ordine_has_Manga (Ordine_idOrdine, Manga_idManga, Quantità, Prezzo_unitario) 
                                  VALUES (?, ?, ?, ?)";
            $stmtOrderDetails = $this->db->prepare($queryOrderDetails);
    
            foreach ($cartItems as $item) {
                $stmtOrderDetails->bind_param(
                    "iiid",
                    $orderId,
                    $item['idManga'],
                    $item['Quantità_In_Carrello'],
                    $item['Prezzo']
                );
                $stmtOrderDetails->execute();
            }
            $queryDeleteCart = "DELETE FROM Carrello WHERE Utente_Email = ?";
            $stmtDeleteCart = $this->db->prepare($queryDeleteCart);
            $stmtDeleteCart->bind_param("s", $userEmail);
            $stmtDeleteCart->execute();
            
            // Conferma la transazione
            $this->db->commit();
    
            return $orderId; 
        } catch (Exception $e) {
            // In caso di errore, effettua un rollback
            $this->db->rollback();
            throw $e;
        }
    }

    public function getTotalPrice($email)
    {
        $query = "SELECT SUM(Prezzo * C.Quantità) as TOTALE FROM Manga M, Carrello C WHERE C.Utente_Email = ? AND M.idManga = C.Manga_idManga";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $result = mysqli_fetch_assoc($result);

        return $result["TOTALE"];
    }

    public function getItemNumber($email)
    {
        $query = "SELECT SUM(C.Quantità) as Articoli FROM Carrello C WHERE C.Utente_Email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $result = mysqli_fetch_assoc($result);

        return (int) $result["Articoli"];
    }

    public function removeFromCart($idManga, $email)
    {
        $query = "DELETE FROM Carrello WHERE Utente_Email = ? AND Manga_idManga = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('si', $email, $idManga);
        try {
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }

    public function emptyCart($email)
    {
        $query = "DELETE FROM Carrello WHERE Utente_Email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $email);
        try {
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }

    public function isMangaInCart($email, $idManga)
    {
        $query = "SELECT * FROM CARRELLO WHERE Utente_Email = ? AND Manga_idManga = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('si', $email, $idManga);
        $stmt->execute();
        $result = $stmt->get_result();

        $result = $result->fetch_all(MYSQLI_ASSOC);
        if (count($result) == 0) {
            return false;
        } else {
            return true;
        }
    }

    public function getQuantityInCart($email, $idManga)
    {
        $query = "SELECT Quantità FROM CARRELLO WHERE Utente_Email = ? AND Manga_idManga = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('si', $email, $idManga);
        $stmt->execute();
        $result = $stmt->get_result();
        $result = $result->fetch_all(MYSQLI_ASSOC);

        if (count($result) == 0) {
            return 0;
        } else {
            return (int) $result[0]["Quantità"];
        }
    }

    public function changeQuantityInCart($email, $idManga, $increase)
    {
        if ($increase) {
            $query = "UPDATE CARRELLO SET Quantità = Quantità + 1 WHERE Utente_Email = ? AND Manga_idManga = ?";
        } else {
            $query = "UPDATE CARRELLO SET Quantità = Quantità - 1 WHERE Utente_Email = ? AND Manga_idManga = ?";
        }
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('si', $email, $idManga);
        try {
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }
}
?>