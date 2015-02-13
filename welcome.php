<?php
include_once 'php/connect.php';
include_once 'php/security.php';
?>
<!DOCTYPE html>
<html land="fr">
<head>
	<meta charset="UTF-8">
	<title>HETIC Land</title>
	<link rel="stylesheet" type="text/css" href="css/reset.css" />
	<link rel="stylesheet" type="text/css" href="css/styles.css" />
	<link href='http://fonts.googleapis.com/css?family=Fredoka+One' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link rel="Stylesheet" type="text/css" href="css/smoothDivScroll.css" />
	<script type="text/javascript" src="js/sound-mouseover.js"></script>
</head>

<body>
		<div class="welcome">
		<embed src="sons/brontis.mp3" autostart="true" loop="true"
width="2" height="0">
			<center class="speech"><marquee scrollamount="2" scrolldelay="100" onmouseout="this.start();" height="195" width="600" style="text-align: justify; font-family:'Open Sans'; color:#fff; font-size:18pt; line-height:30px" direction="up">
			Bonjour, bienvenue à Hetic, Heticland! <br>
			Euh, aujourd'hui bah.. et comme tous les autres jours votre parcours sera initiatique, dangereux, il vous faudra du courage, de la volonté et tout le reste. <br><br><br><br><br>
			Alors, ça se passe assez simplement, y'a un couloir, on va pas faire compliqué, des salles, des boss, vous les affrontez un par un, et bien sûr, puisque vous connaissez la chanson, y'a un boss final, à battre aussi, forcément! <br><br><br><br><br>
			Attention, attention, petite règle particulière, en dessous de 15, tu dégages, GAME OVER! <br><br>
			Merci!
			</marquee></center>

			<div class="play"><a href="couloir.php">Rentrer dans l'école </a></div>
		</embed></div>
		<audio id="brontis"><source src="sons/brontis.mp3"></source></audio>
		<div id="sounddiv"><bgsound id="sound"></div>

</body>
</html>