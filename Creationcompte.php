<?php

require_once 'CompteBancaire.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $adresse = $_POST['adresse'];
    $telephone = $_POST['telephone'];
    $numero_compte = $_POST['numero_compte'];
    $solde_initial = $_POST['solde_initial'];

    
    $connexion = new mysqli($_host, $dbuser, $dbpass, $dbName);

    if ($connexion->connect_error) {
        die("Connexion échouée: " . $connexion->connect_error);
    }

    $sql = "INSERT INTO comptes_bancaires (numero_compte, solde, Proprietaire_id) VALUES (?, ?, ?)";

    $stmt = $connexion->prepare($sql);

    $stmt->bind_param("sdi", $numero_compte, $solde_initial, $id);

    $query = "SELECT id FROM clients WHERE prenom = ? AND nom = ? AND numero_telephone = ?";
    $stmt2 = $connexion->prepare($query);
    $stmt2->bind_param("sss", $prenom, $nom, $telephone);
    $stmt2->execute();
    $result = $stmt2->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id_client = $row['id'];
    } else {
        $query = "INSERT INTO clients (id, prenom, nom, adresse, numero_telephone) VALUES (?, ?, ?, ?,?)";
        $stmt3 = $connexion->prepare($query);
        $stmt3->bind_param("sssss",$id, $prenom, $nom, $adresse, $telephone);
        $stmt3->execute();

        $id_client = $stmt3->insert_id;
    }

    

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création de Compte Bancaire</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="Mes CSS/styles.css">
</head>
<body>
<header >
        <nav>
        <img class="logos" src="iamge19.jpg">
            <ul>
                <li class="active"><a href="Accueil.php">Accueil</a></li>
                <li><a href="Creationcompte.php">Creation de Comptes</a></li>
                <li><a href="operationBancaire.php">Operations Bancaire</a></li>
                <li><a href="Relevecompte.php">Relevé Client</a></li>
            </ul>
        </nav>
    </header>
    <h1>Création de Compte Bancaire</h1>
    <form action="Creationcompte.php" method="post">
        <label for="id">id:</label><br>
        <input type="text" id="id" name="id" required><br>
        
        <label for="prenom">Prénom:</label><br>
        <input type="text" id="prenom" name="prenom" required><br>

        <label for="nom">Nom:</label><br>
        <input type="text" id="nom" name="nom" required><br>
        
        <label for="adresse">Adresse:</label><br>
        <input type="text" id="adresse" name="adresse" required><br>
        
        <label for="telephone">Numéro de téléphone:</label><br>
        <input type="text" id="telephone" name="telephone" required><br>
        
        <label for="numero_compte">Numéro de compte:</label><br>
        <input type="text" id="numero_compte" name="numero_compte" required><br>
        
        <label for="solde_initial">Solde initial:</label><br>
        <input type="number" id="solde_initial" name="solde_initial" required><br><br>
        
        <input type="submit" value="Créer Compte">
    </form>
</body>
</html>
