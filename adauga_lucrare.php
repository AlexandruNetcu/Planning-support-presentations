<?php
$conn = mysqli_connect("localhost", "root", "", "proiect");
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}

if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL
$nume = $_POST['nume'];
$lucrare = $_POST['lucrare'];
$profesori = $_POST['profesor'];
$data = $_POST['data'];


$sql="insert into studenti_inscrisi(Nume, Titlu_lucrare, Profesor_coordonator, Data_sustinere) values ('$nume', '$lucrare', '$profesori', '$data')";


if(($nume !=''||$lucrare !=''|| $profesori!='')&& mysqli_query($conn, $sql))
{
echo "<meta HTTP-EQUIV='REFRESH' content='0; url=studenti.php'>";
}
 else {
    
   echo "<script type='text/javascript'>\n";
echo "alert('Va rugam sa completati toate spatiile!');\n" . mysqli_error($conn);;
echo "</script>";
}
}


//mysqli_close($conn);
?>

<html>
    <title>Adauga lucrare</title>
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
        
        <h1>Adaugare lucrare</h1>
<form action="adauga_lucrare.php" method="POST">
<table>
<tr><td><font color="black">Nume: </font><br><input type="text" name="nume"/></td></tr>
<tr><td><font color="black">Titlu lucrare: </font><br><input type="text" name="lucrare"/></td></tr>
<tr><td><font color="black">Profesor: </font><br><input type="text" name="profesor"/></td></tr>
<tr><td><font color="black">Data sustinere: </font><br><input type="datetime-local" name="data"/></td></tr>

<tr><td colspan="2"><input type="submit" name="submit" value="Adauga lucrare"></td></tr>
</table>
</form>
    </body>
</html>