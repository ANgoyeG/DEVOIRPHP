<?php

class CompteBancaire {
    // Vos attributs et méthodes existants...

    public function __construct($id, $numero_compte, $solde_initial, $proprietaire, $connexion) {
        $this->id = $id;
        $this->numero_compte = $numero_compte;
        $this->solde_initial = $solde_initial; // Correction ici
        $this->proprietaire = $proprietaire;
        $this->connexion = $connexion; // Ajout de la connexion à la base de données
        $this->solde = $solde;
    }

    public function deposer($montant) {
        $this->solde_initial += $montant; // Correction ici
        $this->updateSoldeInDatabase(); // Mettre à jour le solde dans la base de données
    }

    public function retirer($montant) {
        if ($this->solde_initial >= $montant) { // Correction ici
            $this->solde_initial -= $montant; // Correction ici
            $this->updateSoldeInDatabase(); // Mettre à jour le solde dans la base de données
            return true;
        } else {
            return false;
        }
    }

    public function virer($montant, $compte_destinataire) {
        if ($this->retirer($montant)) {
            $compte_destinataire->deposer($montant);
            return true;
        } else {
            return false;
        }
    }

    private function updateSoldeInDatabase() {
        // Utilisation de requête préparée pour éviter les injections SQL
        $query = "UPDATE comptes_bancaires SET solde_initial = ? WHERE id = ?";
        $statement = mysqli_prepare($this->connexion, $query);
        mysqli_stmt_bind_param($statement, "di", $this->solde_initial, $this->id);
        mysqli_stmt_execute($statement);
        mysqli_stmt_close($statement);
    }
}

// Informations de connexion à la base de données
$_host = "localhost";
$dbuser = "root";
$dbpass = "";
$dbName= "comptebancaire";

// Connexion à la base de données
$connexion = mysqli_connect($_host, $dbuser, $dbpass, $dbName);

if (!$connexion){
    die("Echec de la connexion: ". mysqli_connect_error());
}

class Client {
    public $id;
    public $prenom;
    public $nom;
    public $adresse;
    public $numero_telephone;
    public $passwd;

    public function __construct($id, $prenom, $nom, $adresse, $numero_telephone, $passwd) {
        $this->id = $id;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->adresse = $adresse;
        $this->numero_telephone = $numero_telephone;
        $this->passwd = $passwd;
    }

    public function getNomComplet() {
        return $this->prenom . ' ' . $this->nom;
    }
}

?>
