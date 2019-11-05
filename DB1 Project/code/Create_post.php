<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "project";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql3 = "CREATE TABLE post
	(Post_ID			INT	 PRIMARY KEY NOT NULL,
 	Post_date			DATE,				
 	Comments	INT,
	Profile_ID 	INT,
	Page_ID 	INT,
	FOREIGN KEY(Profile_ID) REFERENCES profile(Profile_ID),
	FOREIGN KEY(Page_ID) REFERENCES page(Page_ID)
	
	)";

    $conn->exec($sql3);

    echo "  Post table created successfully.";

    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>
