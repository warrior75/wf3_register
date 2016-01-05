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
				<form>
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
						<p class="help-block">	Le poinds de votre photo doit être inférieur à 10 Mo. <br/>
												Les formats acceptés : *.jpg *.png *.gif
						</p>
					</div>
					<button type="submit" name="submit" class="btn btn-primary">Envoyer</button>
				</form>
			</div>
			<div class="col-md-8" ></div>
		</div>
	</div>
</body>
</html>