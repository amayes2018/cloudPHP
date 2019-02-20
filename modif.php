<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous"/>
    <title>
        Modif Etediant
    </title>
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" href="appli.php" >Accueil</a>
		<a class="navbar-brand" href="ajout.php" >Ajout <span class="sr-only">(current)</span></a>
		<a class="navbar-brand" href="appli.php" >Recherche</a>
	</nav>

	<h1>Modification d'un Etudiant :</h1>
<?php
	require_once 'connexion.php';
	if(isset($_GET['matricule'])){
		$matricule=$_GET['matricule'];
		$sql="SELECT * FROM etudiants WHERE matricule='$matricule'";
		$resultat=mysqli_query($bdd,$sql);
		if($resultat){
			$rows=mysqli_fetch_assoc($resultat);
			extract($rows);
			mysqli_free_result($resultat);
		}
		else{
			echo "aucun etudiant avec le matricule :".$matricule;
			return;
		}
	}else{
		echo 'veuillez choisir un etudiant !';
		return;
	}
?>

<?php
	if($_POST){
		extract($_POST);
		$sql="UPDATE etudiants SET nom_etud='$nom_etud',
			prenom_etud='$prenom_etud',
			date_nais='$date_nais',
			sexe='$sexe',
			adresse='$adresse'
			WHERE matricule='$matricule'
		";
		$resultat=mysqli_query($bdd,$sql);
		if($resultat) echo "Etudiant modifié avce succès";
		else echo "Erreur de modification d'un étudiant";

		mysqli_close($bdd);
	}
?>

	<form class="needs-validation" action="modif.php?matricule=<?php echo $matricule; ?>" method="post">
		
		<div class="form-row">
			<div class="col-md-3 mb-3">
				<label for="validationTooltip01">Nom</label> <input name="nom"
					type="text" class="form-control" id="validationTooltip01" value="<?php echo $nom_etud; ?>" required>
			</div>
			<div class="col-md-3 mb-3">
				<label for="validationTooltip02">Prénom</label> <input
					name="preson" type="text" class="form-control"
					id="validationTooltip02" value="<?php echo $prenom_etud; ?>"
					required>
			</div>
		</div>
		
		<div class="form-row">
			<div class="col-md-3 mb-3">
				<label for="validationTooltip04">Date de naissance</label> <input
					name="date" type="text" class="form-control" value="<?php echo $date_nais; ?>"
					id="validationTooltip04" required>
			</div>
			<div class="col-md-3 mb-3">
				<label for="validationTooltip05">Sexe</label> 
				<select name="sexe" class="form-control"id="validationTooltip05">
					<option value="M" <?php if($sexe=="M") echo 'selected';?> >Masculin</option>
					<option value="F" <?php if($sexe=="F") echo 'selected';?> >Féminin</option>
				</select>
			</div>
		</div>
		<div class="form-row">
			<div class="col-md-10 mb-10">
				<label for="validationTooltip04">Adresse</label> <input name="adresse"
					type="text" class="form-control" id="validationTooltip04"
					value="<?php echo $adresse; ?>" required>
			</div>
		</div>
		
		<br>
		<input type="checkbox" onclick="submitForm()">
		<button class="btn btn-primary" type="submit" onclick="submitForm()">Submit form</button>
	</form>

</body>
</html>		