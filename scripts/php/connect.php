<?php 
    $host = "localhost";
    $user = "root";
    $passw = "root";
    $db_name = "englishclub";

    $conn = new mysqli($host, $user, $passw, $db_name);

    if ($conn -> connect_error) {
        die("error: " . $conn -> connect_error);
    }
?>