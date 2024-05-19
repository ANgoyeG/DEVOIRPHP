<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relevé de Compte</title>
    <link rel="stylesheet" type="text/css" href="Mes CSS/styles.css">
    <style>
        table {
            border-collapse: collapse;
        }
        th, td {
            border: 3px solid black;
            padding: 8px;
        }
        .error-message {
            color: red;
        }
    </style>
    <script>
        function validateClientID() {
            var clientIDInput = document.getElementById('proprietaire_id');
            var clientIDValue = clientIDInput.value.trim();
            var errorMessage = document.getElementById('error-message');

            if (clientIDValue === "" || isNaN(clientIDValue)) {
                errorMessage.textContent = "Veuillez saisir un ID valide (nombre uniquement).";
                clientIDInput.classList.add('error');
                return false;
            } else {
                errorMessage.textContent = "";
                clientIDInput.classList.remove('error');
                return true;
            }
        }

        function validateForm() {
            return validateClientID();
        }
    </script>
</head>
<body>
<header>
    <nav>
        <img class="logos" src="iamge19.jpg">
        <ul>
            <li><a href="Accueil.php">Accueil</a></li>
            <li><a href="Creationcompte.php">Création de Comptes</a></li>
            <li><a href="operationBancaire.php">Opérations Bancaires</a></li>
            <li class="active"><a href="Relevecompte.php">Relevé Client</a></li>
        </ul>
    </nav>
</header>
<h1>Relevé de Compte Bancaire</h1>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validateForm();">
    <label for="proprietaire_id">ID du Client:</label>
    <input type="text" name="proprietaire_id" id="proprietaire_id" required><br>
    <span id="error-message" class="error-message"></span><br>
    <input type="submit" name="submit" value="Rechercher">
</form>

</body>
</html>
