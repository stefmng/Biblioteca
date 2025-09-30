<?php   include_once 'connessione.php' ?>

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
// Prendi i dati dall'input dell'utente
$name = $_POST['nome'];
$gender = $_POST['genere'];
$anno_di_nascita = $_POST['anno_di_nascita'];
$anno_di_morte = $_POST['anno_di_morte'];
$luogo_di_nascita = $_POST['luogo_di_nascita'];
$luogo_di_morte = $_POST['luogo_di_morte'];

//si crea la query sql, ed aggiungiamo condizioni alla query per filtrare i record
$sql = "SELECT * FROM artista WHERE 1";

if (!empty($name)) {
    $sql .= " AND name LIKE '%$name%'";
}
  
if (!empty($gender)) {
  $sql .= " AND gender = '$gender'";
}

if (!empty($anno_di_nascita)) {
  $sql .= " AND yearOfBirth = '$anno_di_nascita'";
}

if (!empty($anno_di_morte)) {
    $sql .= " AND yearOfDeath = '$anno_di_morte'";
}

  if (!empty($luogo_di_nascita)) {
    $sql .= " AND placeOfbirth LIKE '%$luogo_di_nascita%'";
}

  if (!empty($luogo_di_morte)) {
    $sql .= " AND placeOfDeath LIKE '%$luogo_di_morte%'";
}


$result = $connessione->query($sql);
  // output data of each row
if($result-> num_rows > 0){
    echo "'" . $result->num_rows . " risultati '" . "<table><tr><th>ID</th><th>Name</th>
            <th>Gender</th><th>yearOfBirth</th><th>yearOfDeath</th>
            <th>placeOfBirth</th><th>placeOfDeath</th><th>url</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo '<tr>';
    foreach($row as $field) {
        echo '<td>' . htmlspecialchars($field) . '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
}else{
    echo "nessun risultato";
}
$connessione->close();
?>

</html>
