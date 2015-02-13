<?php
// On démarre la session
session_start();

// On fait une requête dans la table sessions pour s'assurer que le SESSID qu'on génère dans connoxion.php est bien dans la table d'où le session_id()
$SessionQuery = "SELECT SQL_CALC_FOUND_ROWS *
	FROM sessions
	WHERE session_sess_id = '" . session_id() . "'
	AND session_expiration > NOW();
";

$DBObject = $db->query($SessionQuery);
$Result = $DBObject->fetch();

//  SI ON A UN USER ALORS LA PERSONNE EST BIEN AUTHENTIFIé
if ( $Result ) {
	// On prolonge la durée de la session pour ne pas être déconnecté
	$UpdateQuery = "UPDATE sessions SET
		session_date_modification = NOW(),
		session_expiration = '" . date("Y-m-d H:i:s", mktime(date("H"), date("i"), date("s"), date("n"), date("j") + 3, date("Y"))) . "'
		WHERE session_sess_id = '" . session_id() . "';
	";

	$db->query($UpdateQuery);
} else {
	// header("Location: http://localhost/heticland/index.php");
}