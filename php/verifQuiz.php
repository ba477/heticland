<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 10/02/2015
 * Time: 19:01
 */
session_start();
include("connect.php");





$salle=$_POST['salle'];


$sql="SELECT answer from rooms where nameRoom='$salle'";

$resultats=$db->query($sql);
$resultat = $resultats->fetchAll(PDO::FETCH_ASSOC);
$answer1 = $resultat[0]['answer'];
$answer2 = $resultat[1]['answer'];
$answer3 = $resultat[2]['answer'];


function rightAnswer($question,$answer){
    if($question==$answer){
        return true;
    }
}
$good=0;
if(rightAnswer($_POST['question1'], $answer1)){
    $good++;
}

if(rightAnswer($_POST['question2'], $answer2)){
    $good++;
}

if(rightAnswer($_POST['question3'], $answer3)){
    $good++;
}
echo $character=$_SESSION['nameCharacter'];
echo 'vous avez '.$good.'bonne réponses!';
if($good>=2){
    $sql="

    UPDATE characters SET hp = hp+'100' WHERE nameCharacter = '$character';

    ";
    $resultats=$db->exec($sql);
    echo 'HP augmenté';
    $sql="SELECT hp from characters where nameCharacter='$character'";
    $resultats=$db->query($sql);
    $resultat = $resultats->fetch(PDO::FETCH_OBJ);
    echo $resultat->hp. ' hp';
}

header('Location: ../duel.php?nbAnswers='.$good.'&salle='.$salle.'');