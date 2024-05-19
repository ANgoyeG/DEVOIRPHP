<?php
require_once 'CompteBancaire.php';

?>
<!DOCTYPE html>
<html>
<head>
  <title>Simulation de prets</title>
  <link rel="stylesheet" type="text/css" href="Mes CSS/styles.css">
      <script>
    function montantTotal() {
      var montantSelect = document.getElementById("montantSelect");
      var montantInitial = parseFloat(montantSelect.options[montantSelect.selectedIndex].value);
      var dureeMois = parseInt(document.getElementById("duree").value);
      var retardJours = parseInt(document.getElementById("retard").value);

      var frais;
      if (dureeMois >= 1 && dureeMois <= 3) {
        frais = montantInitial * 0.05;
      } else if (dureeMois <= 6) {
        frais = montantInitial * 0.08;
      } else {
        frais = montantInitial * 0.12;
      }

      var penalites;
      if (retardJours >= 1 && retardJours <= 4) {
        penalites = montantInitial * 0.03;
      } else if (retardJours > 4) {
        penalites = montantInitial * 0.05;
      } else {
        penalites = 0;
      }

      var montantDûAuRetard = penalites;
      var montantTotal = montantInitial + frais + penalites;
      
      document.getElementById("frais").innerHTML = frais + "FCFA";
      document.getElementById("montantDûRetard").innerHTML = montantDûAuRetard + "FCFA";
      document.getElementById("montantTotal").innerHTML = montantTotal + "FCFA";
    }
  </script>
</head>
<body>
<header>
    <nav>
        <img class="logos" src="iamge19.jpg">
        <ul>
            <li class="active"><a href="Accueil.php">Accueil</a></li>
            <li class="active"><a href="Aide.php">AIDES</a></li>
            <li><a href="Creationcompte.php">Creation de Comptes</a></li>
        </ul>
    </nav>
</header>
    <h1>Simulation de prêt</h1>
            <main>
                <table border="3px">
                    
                  <tr>
                    <th>Montant du prêt</th>
                    <th>Nombre de mois </th>
                    <th>Nombre de jour de retard </th>
                    <th>Frais du prêt </th>
                    <th>Montant dû au retard </th>
                    <th>Montant total a rembourser</th>
                    
                  </tr>
                  <tr>
                    <td>
                        <select id="montantSelect">
                        <option value="1000000">1.000.000F</option>
                        <option value="2000000">2.000.000F</option>
                        <option value="3000000">3.000.000F</option>
                        <option value="5000000">5.000.000F</option>
                        <option value="7000000">7.000.000F</option>
                        <option value="9000000">9.000.000F</option>
                        <option value="15000000">15.000.000F</option>
                        <option value="20000000">20.000.000F</option>
                        <option value="30000000">30.000.000F</option>
                        <option value="50000000">50.000.000F</option>
                    </select><br>
                </td>
                 
    <td>  <select id="duree">
            <option value="0.05">1 a 3mois </option>
            <option value="0.08">3 a 6mois </option>
            <option value="0.12">plus de 6mois</option> 
          </select>
    </td>
    <td><input type="number" id="retard"></td>
    <td><span id="frais"></span>0</td>
   <td><span id="montantDûRetard">0</span></td>
   <td><button type="button" onclick="montantTotal()">Calculer</button><span id="montantTotal">
   </span></td>
    
  
                    </tr>
                </table>
            </main>

<h2>Conversion monétaire</h2>
<main>
<!-- Tableau pour saisir la somme en CFA et choisir la devise -->
            <table border="3px">
    <!-- Ajout d'une ligne vide pour afficher le résultat -->
<tr id="resultatRow" style="display: none;">
    <td colspan="2" id="resultatCell"></td>
</tr>
<tr>
    <td><label for="montant">Montant en CFA:</label></td>
    <td><input type="number" id="montant" name="montant" required></td>
</tr>
<tr>
    <td><label for="devise">Choisissez la devise:</label></td>
    <td>
        <select id="devise" name="devise" required>
            <option value="euro">Euro</option>
            <option value="dollar">Dollar</option>
            <option value="livre">Livre</option>
        </select>
    </td>
</tr>
<tr>
    <td colspan="2"><input type="submit" value="Convertir"></td>
</tr>
</table>

<script>
document.querySelector('input[type="submit"]').addEventListener('click', function(event) {
    event.preventDefault(); // Empêche le rechargement de la page
    
    // Récupération des données du formulaire
    var montantCFA = parseFloat(document.getElementById('montant').value);
    var devise = document.getElementById('devise').value;
    var resultat;
    
    // Calcul du résultat en fonction de la devise choisie
    switch(devise) {
        case 'euro':
            resultat = montantCFA * 640;
            break;
        case 'dollar':
            resultat = montantCFA * 625;
            break;
        case 'livre':
            resultat = montantCFA * 750;
            break;
    }
    
    // Affichage du résultat au-dessus du bouton "Convertir"
    var deviseFormatee = devise.charAt(0).toUpperCase() + devise.slice(1);
    document.getElementById('resultatCell').textContent = deviseFormatee + ': ' + resultat.toFixed(2); // Affiche la devise et le résultat
    document.getElementById('resultatRow').style.display = ''; // Affiche la ligne résultat
});
</script>

</body>
</html>
