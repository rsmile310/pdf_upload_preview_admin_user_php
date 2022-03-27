<?php
    $servername = "localhost";
    $username = "labworkc_adu";
    $password = "FNtlfvir0105#";
    $dbname = "labworkc_data";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
?>