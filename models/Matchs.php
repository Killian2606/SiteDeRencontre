<?php

class Matchs extends Model
{

    public function __construct()
    {
        $this->table = "matchs";

        $this->getConnection();
    }

    public function getStatut(int $premierId, int $deuxiemeId)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE (`id_premier` = " . $premierId . " AND `id_second` = " . $deuxiemeId . ") OR (`id_premier` = " . $deuxiemeId . " AND `id_second` = " . $premierId . ")";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        $resultat = $query->fetchAll(PDO::FETCH_ASSOC);

        if (sizeof($resultat) == 1) {
            if ($resultat[0]['id_premier'] == $premierId) {
                return "Like";
            }
            else {
                return "Non";
            }
        }
        else if (sizeof($resultat) == 2) {
            return "Match";
        }
        else {
            return "Non";
        }
    }

    public function like(int $premierId, int $deuxiemeId)
    {
        $statut = $this->getStatut($premierId, $deuxiemeId);

        if ($statut == "Non") {
            $sql = "INSERT INTO " . $this->table . " (`id_premier`, `id_second`, `statut`) VALUES ('" . $premierId . "', '" . $deuxiemeId . "', 'Like')";
        } else if ($statut == "Like") {
            $sql = "UPDATE " . $this->table . " SET `statut` = 'Match' WHERE (`id_premier` = " . $premierId . " AND `id_second` = " . $deuxiemeId . ") OR (`id_premier` = " . $deuxiemeId . " AND `id_second` = " . $premierId . ")";
        } else {
            header("Location: /");
            exit();
        }

        try {
            $query = $this->_connexion->prepare($sql);
            $query->execute();
        } catch (PDOException $e) {}

        header("Location: /users/voir/" . $deuxiemeId);
        exit();
    }


}