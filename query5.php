<?php include_once 'connessione.php' ?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="utf-8">

    <title>Query 5</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/kimeiga/bahunya/dist/bahunya.min.css">

    <style>
        body {
            max-width: 1200px;
        }
    </style>
</head>
<body>
  <h2 style="text-align: left;">Query 5</h2>
</body>

<?php

$anno_di_nascita = $_POST['anno_di_nascita'];

$sql = "SELECT  title, yearOfBirth, name FROM `opere`,`artista` WHERE opere.artist_id=artista.id_artista AND yearOfBirth=$anno_di_nascita";

$result = $connessione->query($sql);

if($result-> num_rows > 0){
    echo "' " . $result->num_rows . " risultati '" . "<table><tr><th>Titoli</th><th>Anno di nascita</th><th>Nome artista</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo '<tr>';
        foreach($row as $field) {
            echo '<td>' . htmlspecialchars($field) . '</td>';
            }
            echo '</tr>';
        }
        echo '</table>';

    } else{
        echo "nessun risultato";
        }   

$connessione->close();
?>
</html>