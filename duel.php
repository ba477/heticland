<?php
	// A inclure dans chaque fichier du site où il faut que l'utilisateur soit connecté pour y accéder
	include_once 'php/connect.php';
    include_once 'php/security.php';

	// ROOM NAME
	if ( empty($_GET['salle']) ) {
		header('Location: ../couloir.php');
	}
	$RoomName = $_GET['salle'];

	$BossQuery = "UPDATE boss SET
		boss_hp = 100
		WHERE boss_roomName = '" . $RoomName . "';
	";

	$db->query($BossQuery);

	// GETTING BOSS INFORMATIONS
	$BossQuery = "SELECT SQL_CALC_FOUND_ROWS *
		FROM boss
		WHERE boss_roomName = '$RoomName';
	";

	$DBObject = $db->query($BossQuery);
	$Boss     = $DBObject->fetch();

	// GETTING ATTACKS FROM DB
	$AttacksQuery = "SELECT SQL_CALC_FOUND_ROWS *
		FROM attaks
		WHERE roomName = '$RoomName'
		AND owner = '" . $_SESSION['nameCharacter'] . "'
		ORDER BY idAttak;
	";

	$DBObject = $db->query($AttacksQuery);
	$Attacks  = $DBObject->fetchAll(PDO::FETCH_ASSOC);

	// GETTING ROOM INFOS FROM FB
	$RoomsQuery = "SELECT nameRoom, imageGif
		FROM rooms
		WHERE nameRoom = '$RoomName'
		GROUP BY nameRoom;
	";

	$DBObject = $db->query($RoomsQuery);
	$Room     = $DBObject->fetch(PDO::FETCH_ASSOC);
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
	<link rel="stylesheet" type="text/css" href="css/themes/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="css/alertify.min.css" />
	<link rel="stylesheet" type="text/css" href="css/smoothDivScroll.css" />
	<script type="text/javascript" src="js/sound-mouseover.js"></script>
</head>

<body onload="window.location.href = '#openModal';">

	<input type="hidden" id="room" value="<?php echo $RoomName; ?>">

	<div id="openModal" class="modalDialog">
        <div>
			<p>Vous avez obtenu <?php echo $_GET['nbAnswers'] ?> bonne(s) réponse(s)!</p>
			<p>Et maintenant ... place au DUEL !</p>
			<img src="<?php echo $Room["imageGif"]; ?>" alt="duel" class="gifduel">
            <a href="#close" title="Close" class="close">Jouer</a>
        </div>
    </div>

    <div class="bigduel <?php echo $Room["nameRoom"]; ?>">
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
		<div class="bigboss">			
			 <input type="text" readonly data-hp="0" id="bossHp" value="Vie du bigboss: <?php echo $Boss["boss_hp"]; ?>"></div>
		<div class="duel">
		<h2>Attaques</h2>
			<table>
				<tr>
					<?php foreach ( $Attacks as $Attack): ?>
						<td>
							<span>
								<img id="attack" data-id="<?php echo $Attack["idAttak"]; ?>" src="images/salledeclasse/attaque.png" alt="" class="attaque">
							</span>
						</td>
					<?php endforeach ?>
				</tr>
				<tr>
					<?php foreach ( $Attacks as $Attack): ?>
						<td>
							<p><?php echo $Attack["nameAttak"]; ?>
							</p>
						</td>
					<?php endforeach ?>
				</tr>
			</table>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<script src="js/alertify.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$(function () {
				$("#bossHp").change(function (e) {
					alertify.notify("the value changed.");
				});

				$("img#attack").click(function (e) {
					var datas = {
						attackId: $(this).data("id"),
						roomName: $("#room").val(),
						userScore: $("#userScore").text()
					};

					$.ajax({
						url: "php/ajax.php",
						dataType: "json",
						data: datas,
						method: "GET",
						success: function (res) {
							console.log(res);
							if ( typeof res.message !== "undefined" ) {
								alertify.error(res.message);
							} else {
								$("#userScore").attr("data-score", res.user.score)
								$("#userScore").text(res.user.score);
								if ( res.boss.hp > 0 ) {
									$("#bossHp").attr('value', res.boss.hp);
									$("#bossHp").attr("data-hp", res.boss.hp);
								} else {
									$("#bossHp").attr('value', "Mort");
									$("#bossHp").attr("data-hp", 0);
								}
								
								alertify.success(res.system.message);
							}
						},
						error: function (jqXHR, textStatus, errorThrown) {
							console.log(jqXHR);
							console.log(textStatus);
						}
					});
				});
			});
		});
	</script>

</body>
</html>