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
    <div class="salledeclasse">
        <div class="infos">
            <table> 
                <tbody>
                <thead><h2>Bonjour <?php echo $_SESSION['nameCharacter']; ?></h2></thead>
                    <tr>
                        <td class="vide"><a href="javascript:history.go(-1)"><img src="images/infos/retour.png" alt=""></a></td>
                        <td><img src="images/infos/chapeau.png" alt=""></td>
                        <td><img src="images/infos/cafe.png" alt=""></td>
                    </tr>
                    <tr>
                        <td><a href="php/deconnect.php"><img src="images/infos/quit.png" alt=""></a></td>
                        <td>14/20</td>
                        <td>0 café</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="titrecours">

            <?php
            $salle=$_GET['salle'];
            $sql="SELECT distinct nameRoom2 from rooms where nameroom='$salle'";
            $resultats=$db->query($sql);
            $resultats->setFetchMode(PDO::FETCH_OBJ);
            $resultat = $resultats->fetch();
            echo $resultat->nameRoom2;
            ?>

        </div>

        <div class="formulaire">
            <form action="php/verifQuiz.php" method="post">
        <ul>
            <li>
                <label for="pass">
                    <?php


                    $sql="SELECT question from rooms where nameRoom='$salle';";

                    $resultats=$db->query($sql);
                    $resultat = $resultats->fetchAll(PDO::FETCH_ASSOC);
                    echo $resultat[0]['question'];

                    ?>


                </label><br>
                <input type="text" name="question1" id="pass" />
            </li>
            <li>
                <label for="pass"><?php echo $resultat[1]['question']; ?></label><br>
                <input type="text" name="question2" id="pass" />
            </li>
            <li>
                <label for="pass"><?php echo $resultat[2]['question']; ?></label><br>
                <input type="text" name="question3" id="pass" />
            </li>
            <input type="hidden" name="salle" value='<?php echo $salle ?>'>
            <li>
                <input type="submit" class="submit">
            </li>
        </ul>
            </form>
        </div>

        <img src="

        <?php $sql="SELECT distinct imageProf from rooms where nameroom='$salle'";
        $resultats=$db->query($sql);
        $resultats->setFetchMode(PDO::FETCH_OBJ);
        $resultat = $resultats->fetch();
        echo $resultat->imageProf;
        ?>
        " alt="prof" class="prof">

    </div>
</body>
</html>
