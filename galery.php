<?php 
		echo "<pre>";
		print_r($_FILES);
		echo "</pre>";

		$imagesDir = 'images/';
		
		//Récupération de tous les fichiers dans /images
		$images = glob($imagesDir.'*');
		
		echo "<pre>";
		print_r($images);
		echo "</pre>";

	// je vérifie que mon image a bien été transférée dans mon tmp
	if (isset($_FILES['user_picture']['tmp_name'])) {

		$uploadFileName = $_FILES['user_picture']['name'];
		$uploadFileTmpName = $_FILES['user_picture']['tmp_name'];
		$uploadFileType = $_FILES['user_picture']['type'];
		$uploadFileSize = $_FILES['user_picture']['size'];

			// checker le type de fichier 
			if ((!strstr($uploadFileType, 'jpg')) && (!strstr($uploadFileType, 'jpeg')) && (!strstr($uploadFileType, 'png')) && (!strstr($uploadFileType, 'gif'))){
				echo "ERREUR - le fichier n'est pas une image au format web";
			} 
			// checker la taille du fichier
			elseif ($uploadFileSize > 10485760) { 
				echo "ERREUR - le fichier dépasse la taille maximum";
			} 
			// checker que le fichier est déplacé
			elseif(move_uploaded_file($uploadFileTmpName,$imagesDir.time().$uploadFileName)){
				// 3. Déplacer l'image uploadée
				//move_uploaded_file(filename=nom dans le dossier temporaire) , destination='/dossier/'.nom_du_fichier renommé)) cette fonction return true or false
				echo "le Fichier est déplacé avec succès";
				header('location:galery.php');
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
				<h5>Envoyer une image</h5>
				<form method="POST" action="#" enctype="multipart/form-data">
					<div class="form-group">
						<input type="file" id="user_picture" name="user_picture">
					</div>
					<p class="help-block">	Le poids de votre photo doit être inférieur à 10 Mo. <br/>
												Les formats acceptés : *.jpg *.png *.gif
					</p>
					<!-- <div class="form-group">
						<label for="exampleInputPassword1">Password</label>
						<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
					</div>
					<div class="form-group">
						<label for="exampleInputFile">File input</label>
						<input type="file" id="exampleInputFile">
						<p class="help-block">Example block-level help text here.</p>
					</div> -->
					<button type="submit" name="" class="btn btn-primary">Submit</button>
				</form>
				<!-- faire un foreach sur $images et afficher les images avec <img src ...> -->
				<?php foreach ($images as $image): ?>
					<img src="<?php echo $image; ?>" alt="">
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</body>
</html>