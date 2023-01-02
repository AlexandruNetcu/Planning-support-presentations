<!DOCTYPE html>

<?php

$host = "localhost";
$user = "root";
$pass = "";
$db   = "proiect";

$conn = mysqli_connect($host, $user, $pass, $db);
?>
<html>
<title>Profesori</title>
<head>
<link rel="stylesheet" href="interface.css">
</head>

<body>

<ul>
  <li><a href="index.php">Home</a></li>
  <li><a href="studenti.php">Studenti</a></li>
    <li><a href="profesori.php">Profesori</a></li>
  <li style="float:right"><a href="adauga_lucrare.php">Adauga lucrare</a></li>
</ul>

    <h1>Lista profesorilor coordonatori</h1>
    
    <table border="1" style="width: 100%">
        <tr>
            <th>Profesori</th>
            <th>Nume student</th>
            <th>Lucrare </th>
            <th> Data </th>
        </tr>
            <?php
            $result = mysqli_query($conn, "SELECT * FROM `profesori`");
            while($row = mysqli_fetch_assoc($result))
            {
                $profesor = $row['Nume_profesor'];
                ?>
        <tr><td><?= $profesor ?> <td>
                            <table style="width: 100%">
                        <?php
                        $result1 = mysqli_query($conn, "SELECT * FROM `studenti_inscrisi` WHERE `Profesor_coordonator`='".$profesor."'");
                        while($r1 = mysqli_fetch_assoc($result1)){
                            ?>
                                <tr><td><?= $r1['Nume']?>
                            <?php
 
                        }
                        ?>
 
                        </table>
                <?php
            
            ?>
            </td>
            
            <td>
                            <table style="width: 100%">
                        <?php
                        $result2 = mysqli_query($conn, "SELECT * FROM `studenti_inscrisi` WHERE `Profesor_coordonator`='".$profesor."'");
                        while($r12 = mysqli_fetch_assoc($result2)){
                            ?>
                                <tr><td><?= $r12['Titlu_lucrare']?>
                            <?php
 
                        }
                        ?>
 
                        </table>
                <?php
            
            ?>
            </td>
            
            <td>
                            <table style="width: 100%">
                        <?php
                        $result3 = mysqli_query($conn, "SELECT * FROM `studenti_inscrisi` WHERE `Profesor_coordonator`='".$profesor."' order by Data_sustinere");
                        while($r13 = mysqli_fetch_assoc($result3)){
                            ?>
                                <tr><td><?= $r13['Data_sustinere']?>
                            <?php
 
                        }
                        ?>
 
                        </table>
                <?php
            }
            ?>
            </td>
            
            
        </table>
</body>
</html>