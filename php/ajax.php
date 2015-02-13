<?php
	include_once 'connect.php';
    include_once 'security.php';

	// On sécurise les données ans la variable $_GET
	foreach ( $_GET as $Key => $Value ) {
		$_GET[$Key] = htmlspecialchars($Value, ENT_QUOTES);
	}

	// Ceci est un tableau contenant la liste des clés situé dans 
	// $_GET, à vérifier
	$DatasToCheck = [
		'attackId',
		'roomName',
		'userScore'
	];

	// Je créé un nouvel objet
	$Object         = new stdClass();
	$Object->boss   = new stdClass();
	$Object->system = new stdClass();
	$Object->user   = new stdClass();

	if ( !isset($_GET["attackId"], $_GET["roomName"], $_GET["userScore"]) ) {
		// On stock notre message
		$Object->message = "La requête n'a pas pu aboutir, veuillez recharger la page.";
	}

	// Ici on fait une requête pour récupérer les infos de l'attaque
	$AttackQuery = "SELECT SQL_CALC_FOUND_ROWS *
		FROM attaks
		WHERE idAttak = '" . $_GET["attackId"] . "';
	";

	$DBObject = $db->query($AttackQuery);
	$Attack   = $DBObject->fetch(PDO::FETCH_ASSOC);

	// Ici on récupère la santé du boss afin de vérifier qu'il n'est pas mort
	$BossQuery = "SELECT SQL_CALC_FOUND_ROWS *
		FROM boss
		WHERE boss_roomName = '" . $_GET["roomName"] . "'
		AND boss_hp > 0;
	";

	$DBObject = $db->query($BossQuery);
	$Boss     = $DBObject->fetch(PDO::FETCH_ASSOC);

	// Si on a un boss, c'est qu'il n'est pas mort
	if ( $Boss ) {
		// Ici on fait une requête pour mettre à jour la vie du boss
		// Par rapport au nombre de dégât corresondant à l'attaque choisis
		$BossQuery = "UPDATE boss SET
			boss_hp = boss_hp - {$Attack["damage"]}
			WHERE boss_roomName = '" . $_GET["roomName"] . "';
		";

		$db->query($BossQuery);

		// On stock la vie restante du boss
		$Object->boss->hp = $Boss["boss_hp"] - $Attack["damage"];

		// On met à jour le score du joueur en lui rajoutant 100 points
		$Object->user->score = $_GET["userScore"] + 3;

		$Object->system->message = "Superbe attaque!";
	} else {
		// Alors on y est, on a gagné ! =)))
		$Object->system->message = "Vous avez gagné, le boss a été battu!";
	}

	// Notre requête AJAX s'attend à recevoir des données au FORMAT JSON
	// La seule façon qui existe en PHP pour envoyer des données au format
	// JSON à une requête AJAX est celle utilisé en dessous.
	// J'ai créé au départ un objet appelé $Object, mais pour envoyer du JSON
	// Il faut que la variable soit un tableau, alors je convertie en array comme si dessous
	// json_encode sert à convertir un tableau au format JSON
	// Il faut faire un ECHO pour écrire le résultat comme si on voulait afficher de l'HTML
	echo json_encode((array)$Object);
	// Il faut toujours mettre un die() ou un exit() sinon l'exécution du programme continue et il ne faut surtout pas qu'il le fasse
	// PS : DIE === EXIT (c'est un alias => un raccourci)
	die();

?>