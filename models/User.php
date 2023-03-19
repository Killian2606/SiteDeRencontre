<?php

class User extends Model
{

    public function __construct()
    {
        $this->table = "user";

        $this->getConnection();
    }

    /**
     * Retourne un utilisateur en fonction de son login
     *
     * @param string $login
     * @return void
     */
    public function findByLogin(string $pseudo, string $motDePasse)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE `pseudo`='" . $pseudo . "' AND `mot_de_passe`='" . $motDePasse . "'";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    public function insertUser(string $pseudo, string $motDePasse, string $resume, string $description, string $photo)
    {
        try {
            $sql = "INSERT INTO " . $this->table . " (`pseudo`, `mot_de_passe`, `résumé`, `description`, `photo_de_profil`) VALUES ('" . $pseudo . "', '" . $motDePasse . "', '" . $resume . "', '" . $description . "', ?)";
            $query = $this->_connexion->prepare($sql);
            $query->execute(array($photo));
        } catch (PDOException $e) {
            return $e;
        }

        $sql = "SELECT MAX(`id`) FROM " . $this->table;
        $query2 = $this->_connexion->prepare($sql);
        $query2->execute();
        return $query2->fetch(PDO::FETCH_ASSOC);
    }

    public function getAll()
    {
        $sql = "SELECT `id`, `pseudo`, `résumé`, `photo_de_profil` FROM " . $this->table . " WHERE NOT (`id` = " . $_SESSION['id'] . ")";
        $query = $this->_connexion->prepare($sql);
        $query->execute();

        $allUsers = array();
        foreach ($query->fetchAll(PDO::FETCH_ASSOC) as $row) {
            $row['statut'] = (new Matchs)->getStatut($_SESSION['id'], $row['id']);
            $allUsers[] = $row;
        }
        return $allUsers;
    }

    public function getById(int $id)
    {
        $sql = "SELECT `id`, `pseudo`, `résumé`, `description`, `photo_de_profil` FROM " . $this->table . " WHERE `id` = " . $id;
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
}