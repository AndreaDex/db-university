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
