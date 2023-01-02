<?php

$conn = mysqli_connect("localhost", "root", "", "proiect");
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}

$sql = 'SELECT * FROM studenti_inscrisi ORDER by Data_sustinere,profesor_coordonator';
		
$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}
?>

<html>
<title>Studenti</title>
<head>
<link rel="stylesheet" href="interface.css">
<style>
table, th, td {
    border: 1px solid black;
}
</style>
</head>

<body>

<ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="studenti.php">Studenti</a></li>
    <li><a href="profesori.php">Profesori</a></li>
    <li style="float:right"><a href="adauga_lucrare.php">Adauga lucrare</a></li>
</ul>

<h1>Lista studentilor ce vor sustine lucrarile de licenta </h1>

<table style="width:100%">
	<tr>
		<th>Nume student</th>
		<th> Nume lucrare </th>
		<th> Nume profesor coordonator </th>
		<th> Data sustinere </th>
	</tr>
	
	<?php
		while ($row = mysqli_fetch_array($query))
		{
			echo '<tr>
					<td>'.$row['Nume'].'</td>
					<td>'.$row['Titlu_lucrare'].'</td>
					<td>'.$row['Profesor_coordonator'].'</td>
					<td>'.$row['Data_sustinere'].'</td>
				</tr>';
		}?>
	</table>
</body>
</html>