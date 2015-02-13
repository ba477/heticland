<!DOCTYPE html>
<html land="fr">
<head>
	<meta charset="UTF-8">
	<title>HETIC Land</title>
	<link rel="stylesheet" type="text/css" href="css/reset.css" />
	<link rel="stylesheet" type="text/css" href="css/styles.css" />
	<link rel="Stylesheet" type="text/css" href="css/smoothDivScroll.css" />
	<link href='http://fonts.googleapis.com/css?family=Fredoka+One' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="js/sound-mouseover.js"></script>
</head>

<body>
	<div class="container">	
		<header>
			<h1><a href="index.php"><img src="images/connexion/logo_heticland.png" alt="logo_heticland"></a></h1>
		</header>

		<div class="connexion">
			<h3>Oups, ce compte ne semble pas exister! Tu peux retenter:</h3>
			<form method="post" action="php/connexion.php">
				<p>
       			 <label>Pseudo :</label> <input type="text" name="name" />
       			 <br/>
			       <label for="pass">Mot de passe :</label>
			       <input type="password" name="pass1" id="pass" />
				</p>
					<input type="submit" value="Jouer" class="submit"/>
				<br/>
					<a href="signin.php">ou bien t'inscrire !</a>
				</form>
		</div>
		<div class="perso_utilisateur"><img src="images/connexion/perso_utilisateur.png" alt=""></div>



	</div>
</body>
</html>
