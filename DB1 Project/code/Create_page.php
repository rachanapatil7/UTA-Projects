<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "project";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $sql2= "CREATE TABLE page(
	Page_ID	 INT	 PRIMARY KEY NOT NULL,
 	Pagename VARCHAR(20)     NOT NULL,		
 	Description	 Text,		
 	Page_category		VARCHAR(20)		NOT NULL,
 	Followers		INT
	)";

	 $conn->exec($sql2);
	
	  echo "  Page table created successfully.";

    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>
