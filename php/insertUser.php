<?php

include_once 'connect.php';

foreach ( $_POST as $Key => $Value ) {
	$_POST[$Key] = htmlspecialchars($Value, ENT_QUOTES);
}

$sql= "SELECT nameUser from users";
$resultats=$db->query($sql);
$resultats->setFetchMode(PDO::FETCH_OBJ);
$exist=false;
while( $resultat = $resultats->fetch(PDO::FETCH_OBJ) )
{
	if($_POST['name'] == $resultat->nameUser ){
		$exist=true;
	}
}

if($exist){
	header('Location: ../userexist.php');
}elseif(empty($_POST['name']) || empty($_POST['pass1'])) {
	header('Location: ../signin-empty.php');
}elseif(($_POST['pass1'])!=($_POST['pass2'])) {
	header('Location: ../signin-bis.php');
}
else
{
	$sqlInsert = "INSERT INTO
				users
			(
				nameUser,
				password
			) VALUES (
				'" . $_POST['name'] . "',
				'" . password_hash($_POST['pass1'], PASSWORD_BCRYPT) . "'
			)";

	$db->exec($sqlInsert);
		// création du personnage par défaut
	//récupération de l'id
	$sqlId="SELECT
			idUser
			From
			users
			WHERE nameUser='".$_POST['name']."';
	";

	$resultats=$db->query($sqlId);
	$resultats->setFetchMode(PDO::FETCH_OBJ);

	$resultat = $resultats->fetch();

	// création du personnage avec des stats par défaut, avec le nom et l'id
	$_SESSION['userID']=$resultat->idUser;
	$sqlInsert = "INSERT INTO characters (nameCharacter, pnj, idRoom, hp, idUser, idAttak, moyenne) VALUES ('".$_POST['name']."', '0', '1', '500', '".$_SESSION['userID']."', '1', '0');";
	$db->exec($sqlInsert);

	header('Location: ../welcome.php');

}

