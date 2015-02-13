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
		<link rel="Stylesheet" type="text/css" href="css/smoothDivScroll.css" />
		<link href='http://fonts.googleapis.com/css?family=Fredoka+One' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="js/sound-mouseover.js"></script>
	</head>

<body>
		<div class="infos">
			<table>	
				<tbody>
				<thead><h2>Bonjour <?php echo $_SESSION['nameCharacter']; ?></h2></thead>
					<tr>
						<td class="vide"><a href="couloir.php"><img src="images/infos/retour.png" alt=""></a></td>
						<td><img src="images/infos/chapeau.png" alt=""></td>
						<td><img src="images/infos/cafe.png" alt=""></td>
					</tr>
					<tr>
						<td><a href="php/deconnect.php"><img src="images/infos/quit.png" alt=""></a></td>
						<td><span id="userScore" data-score="0">0</span>/20</td>
						<!-- <td><span id="userHp" data-hp="0">0</span></td> -->
						<td>0 café</td>
					</tr>
				</tbody>
			</table>
		</div>
		
	<div id="makeMeScrollable">
		<img src="images/cafeteria/img1.jpg" alt="chaises" id="cafeteria" />

		<a href="#" onmouseover="playclip3();"><img src="images/cafeteria/img2.jpg" alt="cafeteria" id="cafeteria" onmouseout="javascript:this.src='images/cafeteria/img2.jpg';" onmouseover="javascript:this.src='images/cafeteria/img2-hover.gif';"/></a>

		<img src="images/cafeteria/img3.jpg" alt="chaises" id="cafeteria" />

		<a href="#" onmouseover="playclip4();"><img src="images/cafeteria/img4.jpg" alt="cafeteria" id="cafeteria"/></a>

		<img src="images/cafeteria/img5.jpg" alt="frigo" id="cafeteria" />

		<img src="images/cafeteria/img6.jpg" alt="frigo" id="cafeteria" />
		<div class="personnage"><img src="images/personnage2.png" alt="" id="img-perso"></div>
	</div>
	<audio id="savoiretre"><source src="sons/savoiretre.mp3"></source></audio>
	<audio id="photoshop"><source src="sons/photoshop.mp3"></source></audio>
	<audio id="javascript"><source src="sons/javascript.mp3"></source></audio>
	<audio id="htmlcss"><source src="sons/htmlcss.mp3"></source></audio>
	<audio id="algo"><source src="sons/algo.mp3"></source></audio>
	<audio id="php"><source src="sons/php.mp3"></source></audio>
	<div id="sounddiv"><bgsound id="sound"></div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
	<script src="js/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
	<script src="js/jquery.mousewheel.min.js" type="text/javascript"></script>
	<script src="js/jquery.kinetic.min.js" type="text/javascript"></script>
	<script src="js/jquery.smoothdivscroll-1.3-min.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$("div#makeMeScrollable").smoothDivScroll({
				autoScrollingMode: ""
			});
		});
	</script>

</body>
</html>
