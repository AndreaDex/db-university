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
} else {
    echo "connessione riuscita";
}


$statement = $connection->prepare("INSERT INTO `departments` ('name', 'address', 'phone') VALUES ( ?, ?, ?)");
$statement->bind_param("sss", $name, $address, $phone);
$name = "Dipartimento delle arti magiche";
$address = "Via della magia";
$phone = "+03 8952 1711580";

$statement->execute();

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