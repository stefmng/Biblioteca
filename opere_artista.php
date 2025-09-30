<?php include_once 'connessione.php' ?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="utf-8">

    <title>Dataset Artista</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/kimeiga/bahunya/dist/bahunya.min.css">

    <style>
        body {
            max-width: 1200px;
        }
    </style>
</head>
<body>
</body>

<?php
            
$name = $_POST['nome'];

$sql = "SELECT DISTINCT name, title, medium, date_text, dimension, opere.url FROM opere, artista WHERE artista.id_artista = opere.artist_id AND name LIKE '%$name%'";

$result = $connessione->query($sql);

if($result-> num_rows > 0){
    echo " ' " . $result->num_rows . " risultati '" . "<table><tr><th>Artista</th><th>Titolo</th><th>Tipo</th><th>Anno</th><th>Dimensioni</th><th>url</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo '<tr>';
        foreach($row as $field) {
            echo '<td>' . htmlspecialchars($field) . '</td>';
            }
            echo '</tr>';
        }
        echo '</table>';

    } else{
        echo "nessun risultato "; 
        }   

$connessione->close();
?>
</html>