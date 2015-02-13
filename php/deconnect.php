<?php 

	include_once 'connect.php';

	// On démarre la session pour récupérer le SESSID
	session_start();

	// On récupère les paramètres de cookie
	$params = session_get_cookie_params();

	// On supprime la session de la base de donnée
	$SessionQuery = "DELETE
		FROM sessions
		WHERE session_sess_id = '" . session_id() . "';
	";

	$res = $db->query($SessionQuery);

	if ( !$res ) {
		die("Une erreur est survenue lors de la suppression de la session.");
	}

	// On vire le cookie grâce à time() - 42000
	setcookie(session_name(), '', time() - 42000,
		$params["path"],
		$params["domain"],
		$params["secure"],
		$params["httponly"]
	);

	// On détruit la session
	session_destroy();

	// On redirige
	header('Location: ../index.php');

?>