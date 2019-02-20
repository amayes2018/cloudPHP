<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Accueil</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous"/>
	</head>

	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="appli.php" >Accueil</a>
			<a class="navbar-brand" href="ajout.php" >Ajout<span class="sr-only">(current)</span></a>
			<a class="navbar-brand" href="modif.php" >Modification<span class="sr-only">(current)</span></a>
			<a class="navbar-brand" href="appli.php" >Recherche</a>
		</nav>

		<table class="table">
		  <thead class="thead-dark">
		    <tr>
		      <th scope="col">Matricule</th>
		      <th scope="col">Nom</th>
		      <th scope="col">Prénom</th>
		      <th scope="col">Date de naissance</th>
		      <th scope="col">Sexe</th>
		      <th scope="col">Adresse</th>
		    </tr>
		  </thead>

		  <tbody>

			<?php

				require_once 'connexion.php';
				
				$reponse = mysqli_query($bdd, 'SELECT * FROM etudiants');
				
				while ($donnees = mysqli_fetch_assoc($reponse))
				{
					
					echo '<tr>';
				        echo "<th scope='row'>".$donnees['matricule']." </td>";
				        echo "<td>".$donnees['nom_etud']." </td>";
				        echo "<td>".$donnees['prenom_etud']." </td>";
				        echo "<td>".$donnees['date_nais']." </td>";

				        if ($donnees['sexe']=='M') echo '<td>Masculin </td>';
				        else echo '<td>Féminin </td>';

				        echo "<td>".$donnees['adresse']." </td>";
				    echo '</tr>';
				
				}

				mysqli_free_result($reponse);
				
			?>

			</tbody>
		</table>	
	</body>		
</html>