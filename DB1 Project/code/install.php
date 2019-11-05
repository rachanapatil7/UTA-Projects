<?php
require "config.php";
try {
    $conn = new PDO("mysql:host=$servername", $username, $password, $options);
    // set the PDO error mode to exception
   
    $sql = "CREATE DATABASE project";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Database project created successfully!<br>";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>