<?php   include_once 'connessione.php' ?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="utf-8">

    <title>Dataset opere</title>

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
// Prendi i dati dall'input dell'utente
$artist = $_POST['artista'];
$artist_role = $_POST['ruolo_artista'];
$title = $_POST['titolo'];
$year = $_POST['anno'];

//si crea la query sql, ed aggiungiamo condizioni alla query per filtrare i record
$sql = "SELECT * FROM opere WHERE 1";

if (!empty($artist)) {
    $sql .= " AND artist LIKE '%$artist%'";
}
  
if (!empty($artist_role)) {
  $sql .= " AND artist_Role = '$artist_role'";
}

if (!empty($title)) {
  $sql .= " AND title LIKE '%$title%'";
}

if (!empty($year)) {
    $sql .= " AND year = '$year'";
}


$result = $connessione->query($sql);
  // output data of each row
if($result-> num_rows > 0){
    echo " ' " . $result->num_rows . " risultati '" . "<table><tr><th>ID</th><th>Accession Number</th>
            <th>Artist</th><th>Artist role</th><th>Artist id</th>
            <th>Title</th><th>Date</th><th>Medium</th><th>CreditLine</th><th>Year</th>
            <th>Aquisition year</th><th>Dimension</th><th>width</th>
            <th>heigth</th><th>units</th><th>thumbnail_url</th><th>url</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo '<tr>';
    foreach($row as $field) {
        echo '<td>' . htmlspecialchars($field) . '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
}else {
    echo "nessun risultato";
}
$connessione->close();
?>

</html>