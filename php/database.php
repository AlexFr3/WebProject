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

    public function getTotalPrice($email)
    {
        $query = "SELECT SUM(Prezzo) as TOTALE FROM Manga M, Carrello C WHERE C.Utente_Email = ? AND M.idManga = C.Manga_idManga";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $result = mysqli_fetch_assoc($result);

        return $result["TOTALE"];
    }

    public function getItemNumber($email)
    {
        $query = "SELECT COUNT(*) as Articoli FROM Carrello C WHERE C.Utente_Email = ?";
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
}
?>