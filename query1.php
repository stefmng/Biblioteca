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
  <h3 style="text-align: left;">Query 1</h3>
</body>

<?php
            
$year = $_POST['anno'];

$sql = "SELECT year, COUNT(*) FROM opere WHERE year = '$year' GROUP BY year";

$result = $connessione->query($sql);

if($result-> num_rows > 0){
    echo "<table><tr><th>Anno</th><th>Numero di opere</th></tr>";
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