<?php include_once 'connessione.php' ?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="utf-8">

    <title>Query 2</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/kimeiga/bahunya/dist/bahunya.min.css">

    <style>
        body {
            max-width: 1200px;
        }
    </style>
</head>
<body>
  <h2 style="text-align: left;">Query 2</h2>
</body>

<?php
            
$luogo_di_nascita = $_POST['luogo_di_nascita'];
$luogo_di_morte = $_POST['luogo_di_morte'];

$sql = "SELECT COUNT(*) FROM `artista` WHERE placeOfBirth LIKE '%$luogo_di_nascita%' AND placeOfDeath LIKE '%$luogo_di_morte%'";

$result = $connessione->query($sql);

if($result-> num_rows > 0){
    echo "<table><tr><th>numero di artisti</th></tr>";
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