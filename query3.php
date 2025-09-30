<?php include_once 'connessione.php' ?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="utf-8">

    <title>Query 3</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/kimeiga/bahunya/dist/bahunya.min.css">

    <style>
        body {
            max-width: 1200px;
        }
    </style>
</head>
<body>
  <h2 style="text-align: left;">Query 3</h2>
</body>

<?php

$name = $_POST['nome'];

$sql = "SELECT artist, COUNT(*) FROM `opere` WHERE artist LIKE '%$name%' GROUP BY artist;";

$result = $connessione->query($sql);

if($result-> num_rows > 0){
    echo "' " . $result->num_rows . " risultati '" . "<table><tr><th>Artista</th><th>Numero di opere</th></tr>";
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