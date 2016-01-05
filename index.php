<?php 
	// vérifier que les champs sont bien valides
	if (isset($_POST['send'])) {

		echo "<pre>";
		print_r($_POST);
		echo "</pre>";

		echo "<pre>";
		print_r($_FILES);
		echo "</pre>";

		
		// 1. Faire un echo de taille du fichier dans l'input file
		echo "Votre image pèse ".$_FILES['photo']['size']." octet(s).<br>";

		// 2. Afficher le type de l'image
		echo "Votre fichier est de type :".$_FILES['photo']['type']."<br>";

		move_uploaded_file($_FILES['photo']['tmp_name'],'./uploads/'.$_FILES['photo']['name']);//move_uploaded_file(filename=nom dans le dossier temporaire) , destination='/dossier/'.nom_du_fichier renommé))

	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>User Register</title>
	<meta charset="utf-8">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<h1>Inscription</h1>
				<form method="POST" action="#" enctype="multipart/form-data">
					<div class="form-group">
						<label for="nom">Nom</label>
						<input type="text" class="form-control" id="nom" name="nom" placeholder="nom">
					</div>
					<div class="form-group">
						<label for="prenom">Prénom</label>
						<input type="text" class="form-control" id="prenom" name="prenom" placeholder="prenom">
					</div>
					<div class="form-group">
						<label for="photo">Photo de profil</label>
						<input type="file" id="photo" name="photo">
						<p class="help-block">	Le poids de votre photo doit être inférieur à 10 Mo. <br/>
												Les formats acceptés : *.jpg *.png *.gif
						</p>
					</div>
					<button type="submit" name="send" class="btn btn-primary">Envoyer</button>
				</form>
			</div>
			<div class="col-md-8" ></div>
		</div>
	</div>
	<img src="<?php echo $_FILES['photo']['tmp_name']; ?>" alt="">
</body>
</html>