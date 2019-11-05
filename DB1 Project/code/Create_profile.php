<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "project";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql1 = "CREATE TABLE profile (
Profile_ID			INT		PRIMARY KEY,
firstname			VARCHAR(30)	NOT NULL,
 lastname			VARCHAR(30) 	NOT NULL,
 Mobile				CHAR(10) 	NOT NULL,
 DOB				DATE,		
 Email				VARCHAR(50),	
 Username			VARCHAR(10) 	NOT NULL,
 Password			VARCHAR(10) 	NOT NULL)";


    $conn->exec($sql1);

	  echo "  Profile table created successfully!";

    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>
