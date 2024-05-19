<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opérations Bancaires</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="Mes CSS/styles.css">
    <script>
    function afficherMessageConfirmation(event) {
        // Récupérer le numéro de compte saisi
        var numeroCompteInput = document.getElementById('numero_compte');
        var numeroCompte = numeroCompteInput.value;

        // Vérifier si le numéro de compte est un nombre
        if (isNaN(numeroCompte)) {
            // Afficher un message d'erreur
            var errorMessage = document.getElementById('numero_compte_error');
            errorMessage.textContent = "Veuillez saisir un nombre pour le numéro de compte.";
            // Empêcher la soumission du formulaire
            event.preventDefault();
        } else {
            // Effacer le message d'erreur s'il existe
            var errorMessage = document.getElementById('numero_compte_error');
            errorMessage.textContent = "";
            // Continuer avec la soumission du formulaire
            // Récupérer les données du formulaire
            var montant = document.getElementById('montant').value;
            var typeOperation = document.getElementById('type_operation').value;
            var typeOperationLabel = typeOperation.charAt(0).toUpperCase() + typeOperation.slice(1);

            // Afficher le message de confirmation dans un tableau
            var messageTable = '<table border="3" style="border-collapse: collapse; width: 50%; margin-top: 20px;">' +
                            '<tr><th colspan="2">Confirmation de l\'Opération</th></tr>' +
                            '<tr><td>Type d\'opération</td><td>' + typeOperationLabel + '</td></tr>' +
                            '<tr><td>Numéro de compte</td><td>' + numeroCompte + '</td></tr>' +
                            '<tr><td>Montant</td><td>' + montant + ' CFA</td></tr>' +
                            '</table>';
            document.getElementById('message_confirmation').innerHTML = messageTable;

            // Actualiser la page après 10 secondes pour réinitialiser l'état
            setTimeout(function() {
                location.reload();
            }, 10000); // 10 secondes
        }
    }
    </script>
</head>
<body>
<header>
    <nav>
        <img class="logos" src="iamge19.jpg">
        <ul>
            <li class="active"><a href="Accueil.php">Accueil</a></li>
            <li><a href="Creationcompte.php">Creation de Comptes</a></li>
            <li><a href="operationBancaire.php">Operations Bancairtes</a></li>
            <li><a href="Relevecompte.php">Relevé Client</a></li>
        </ul>
    </nav>
</header>
<h1>Opérations Bancaires</h1>

<h2>Effectuer une Opération</h2>
<div id="message_confirmation" style="color: white; font-weight: bold;"></div>
<form onsubmit="afficherMessageConfirmation(event)" action="operationBancaire.php" method="post">
    <label for="numero_compte">Numéro de Compte:</label>
    <input type="text" id="numero_compte" name="numero_compte" required><br>
    <span id="numero_compte_error" style="color: red;"></span><br>
    <label for="montant">Montant:</label>
    <input type="number" id="montant" name="montant" required><br><br>
    <label for="type_operation">Type d'Opération:</label>
    <select id="type_operation" name="type_operation">
        <option value="depot">Dépôt</option>
        <option value="retrait">Retrait</option>
        <option value="virement">Virement</option>
    </select><br><br>
    <input type="submit" value="Valider">
</form>
</body>
</html>
