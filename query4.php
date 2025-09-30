<?php include_once 'connessione.php' ?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="utf-8">

    <title>Query 4</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/kimeiga/bahunya/dist/bahunya.min.css">

    <style>
        body {
            max-width: 1200px;
        }
    </style>
</head>
<body>
  <h2 style="text-align: left;">Query 4</h2>
</body>

<?php

$luogo_di_nascita = $_POST['luogo_di_nascita'];

$sql = "SELECT COUNT(opere.id_opera) FROM `artista`, `opere` WHERE placeOfBirth LIKE '%$luogo_di_nascita%' AND artista.id_artista = opere.artist_id;";

$result = $connessione->query($sql);

if($result-> num_rows > 0){
    echo "<table><tr><th>Numero di opere</th></tr>";
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