<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous"/>
    <title>
        Ajout Etediant
    </title>
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="appli.php" >Accueil</a>
		<a class="navbar-brand" href="modif.php" >Modifier<span class="sr-only">(current)</span></a>
		<a class="navbar-brand" href="appli.php" >Recherche</a>
	</nav>

<?php
	require_once 'connexion.php';

	if($_POST){
		extract($_POST);
		$sql="INSERT INTO etudiants(nom_etud, prenom_etud, date_nais, sexe, adresse) VALUES('$nom','$prenom','$date','$sexe','$adresse')";

		$resultat=mysqli_query($bdd,$sql);

		if($resultat){
			echo "Etudiant enregistré avec succès.";
		}
		else{
			echo "Erreur d'enregistrement d'un étudiant";
		}
		mysqli_close($bdd);
	}
?>

	<form class="needs-validation" action="ajout.php" method="post">
		
		<div class="form-row">
			<div class="col-md-3 mb-3">
				<label for="validationTooltip01">Nom</label> <input name="nom"
					type="text" class="form-control" id="validationTooltip01"
					placeholder="Nom" value="" required>
			</div>
			<div class="col-md-3 mb-3">
				<label for="validationTooltip02">Prénom</label> <input
					name="prenom" type="text" class="form-control"
					id="validationTooltip02" placeholder="Prenom" value=""
					required>
			</div>
		</div>
		
		<div class="form-row">
			<div class="col-md-3 mb-3">
				<label for="validationTooltip04">Date de naissance</label> <input
					name="date" type="text" class="form-control"
					id="validationTooltip04" placeholder="Date de naissance" required>
			</div>
			<div class="col-md-3 mb-3">
				<label for="validationTooltip05">Sexe</label> 
				<select name="sexe" class="form-control"id="validationTooltip05">
					<option value="M">Masculin</option>
					<option value="F">Féminin</option>
				</select>
			</div>
		</div>
		<div class="form-row">
			<div class="col-md-10 mb-10">
				<label for="validationTooltip04">Adresse</label> <input name="adresse"
					type="text" class="form-control" id="validationTooltip04"
					placeholder="Adresse" required>
			</div>
		</div>
		
		<br>
		<input type="checkbox" onclick="submitForm()">
		<button class="btn btn-primary" type="submit" onclick="submitForm()">Submit form</button>
	</form>
</body>
</html>	