
<?php

$host = "127.0.0.1";
$user = "root";
$password = "";
$database = "project_database";
//connessione tramite oop
$connessione = new mysqli($host, $user, $password, $database);
//verifica connessione avvenuta
if($connessione === false){
    die("errore di connessione: " . $connessione->connect_error);
}

?>