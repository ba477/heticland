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
			<img src="images/couloir/img1.jpg" alt="johannah" id="img-johannah" />

			<a href="quiz.php?salle=savoiretre" onmouseover="playclip();">
				<img src="images/couloir/img2.jpg" alt="savoiretre" id="img-savoiretre" onmouseout="javascript:this.src='images/couloir/img2.jpg';" onmouseover="javascript:this.src='images/couloir/img2-hover.jpg';"/>
			</a>

				<img src="images/couloir/img3.jpg" alt="deco" id="img-deco1" />

			<a href="quiz.php?salle=photoshop" onmouseover="playclip1();">
				<img src="images/couloir/img4.jpg" alt="photoshop" id="img-photoshop" onmouseout="javascript:this.src='images/couloir/img4.jpg';" onmouseover="javascript:this.src='images/couloir/img4-hover.jpg';"/>
			</a>

				<img src="images/couloir/img5.jpg" alt="deco" id="img-deco2" />

			<a href="cafeteria.php">
				<img src="images/couloir/img6.jpg" alt="cafeteria" id="img-cafeteria" />
			</a>

				<img src="images/couloir/img7.jpg" alt="deco" id="img-deco3" />

			<a href="quiz.php?salle=javascript">
				<img src="images/couloir/img8.jpg" alt="javascript" id="img-javascript" onmouseout="javascript:this.src='images/couloir/img8.jpg';" onmouseover="javascript:this.src='images/couloir/img8-hover.jpg';"/>
			</a>

			<a href="toilettes.php">
				<img src="images/couloir/img9.jpg" alt="toilettes" id="img-toilettes" />
			</a>

			<a href="quiz.php?salle=htmlcss">
				<img src="images/couloir/img10.jpg" alt="html" id="img-htmlcss" onmouseout="javascript:this.src='images/couloir/img10.jpg';" onmouseover="javascript:this.src='images/couloir/img10-hover.jpg';"/>
			</a>

			<a href="quiz.php?salle=algo">
				<img src="images/couloir/img11.jpg" alt="algo" id="img-algo" onmouseout="javascript:this.src='images/couloir/img11.jpg';" onmouseover="javascript:this.src='images/couloir/img11-hover.jpg';"/>
			</a>

				<img src="images/couloir/img12.jpg" alt="deco" id="img-deco4" />

			<a href="quiz.php?salle=php" onmouseover="playclip5();">
				<img src="images/couloir/img13.jpg" alt="php" id="img-php" onmouseout="javascript:this.src='images/couloir/img13.jpg';" onmouseover="javascript:this.src='images/couloir/img13-hover.jpg';"/>
			</a>

				<img src="images/couloir/img14.jpg" alt="deco" id="img-deco5" />

			<!-- <a href="daniel.php" onmouseover="playclip6();"> -->
				<img src="images/couloir/img15.jpg" alt="daniel" id="img-daniel" onmouseout="javascript:this.src='images/couloir/img15.jpg';" onmouseover="javascript:this.src='images/couloir/img15-hover.gif'; playclip6();"/>
			<!-- </a> -->

			<div class="personnage">
				<img src="images/personnage2.png" alt="" id="img-perso">
			</div>
		</div>

		<audio id="savoiretre"><source src="sons/savoiretre.mp3"></source></audio>
		<audio id="photoshop"><source src="sons/photoshop.mp3"></source></audio>
		<audio id="javascript"><source src="sons/javascript.mp3"></source></audio>
		<audio id="htmlcss"><source src="sons/htmlcss.mp3"></source></audio>
		<audio id="algo"><source src="sons/algo.mp3"></source></audio>
		<audio id="php"><source src="sons/php.mp3"></source></audio>
		<audio id="daniel"><source src="sons/daniel.mp3"></source></audio>
		<audio id="brontis"><source src="sons/brontis.mp3"></source></audio>
		<div id="sounddiv"><bgsound id="sound"></div>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
		<script src="js/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
		<script src="js/jquery.mousewheel.min.js" type="text/javascript"></script>
		<script src="js/jquery.kinetic.min.js" type="text/javascript"></script>
		<script src="js/jquery.smoothdivscroll-1.3-min.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function () {
				$("div#makeMeScrollable").smoothDivScroll({
					autoScrollingMode: "",
					startAtElementId: "photoshop"
				});
			});
		</script>

	</body>
</html>