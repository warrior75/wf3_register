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

		
		// 4. Checker l'extension du type de fichier
		// 5. checker les extensions suivantes jpg, jpeg, gif
		$uploadFileType = $_FILES['photo']['type'];
		$uploadFileSize = $_FILES['photo']['size'];

			if ((!strstr($uploadFileType, 'jpg')) && (!strstr($uploadFileType, 'jpeg')) && (!strstr($uploadFileType, 'png')) && (!strstr($uploadFileType, 'gif'))){
				echo "ERREUR - le fichier n'est pas une image au format web";
			} elseif ($uploadFileSize > 10485760) {
				echo "ERREUR - le fichier dépasse la taille maximum";
			} elseif(move_uploaded_file($_FILES['photo']['tmp_name'],'./uploads/'.$_FILES['photo']['name'])){
				// 3. Déplacer l'image uploadée
				//move_uploaded_file(filename=nom dans le dossier temporaire) , destination='/dossier/'.nom_du_fichier renommé)) cette fonction return true or false
				echo "le Fichier est déplacé avec succès";
			}	
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