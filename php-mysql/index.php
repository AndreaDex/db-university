<?php
define("DB_SERVERNAME", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("DB_NAME", "university");
define("DB_PORT", "3306");


// Connessione al db tramine istanza mysqli
$connection = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);

// Controllo per errori durante la connessione 
if ($connection && $connection->connect_error) {
    echo "Commection failed error: " . $connection->connect_error;
}
// Eseguire una query

$sql = "SELECT * FROM departments";
$results = $connection->query($sql);
//var_dump($results);

if ($results && $results->num_rows > 0) {
    while ($department = $results->fetch_assoc()) {
?>
        <h2><?= $department['name'] ?></h2>
        <p><?= $department['address'] ?> </p>
        <p><?= $department['phone'] ?> </p>
        <p><?= $department['email'] ?> </p>

<?php

    }
} else if ($results) {
    echo "nessun risultato";
    # code...
} else {
    echo "errore nella query";
}



// Chiudere la connessione
$connection->close();

?>