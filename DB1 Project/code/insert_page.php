<?php
/**
 * Use an HTML form to create a new entry in the
 * users table.
 *
 */
if (isset($_POST['submit'])) {
    require "common.php";
    require "config.php";
    try  {
        $conn = new PDO($dsn, $username, $password, $options);
        
      
	$new_page = array(
	    "Page_ID" => $_POST['Page_ID'],
            "Pagename" => $_POST['Pagename'],
            "Description"  => $_POST['Description'],
            "Page_category"     => $_POST['Page_category'],
            "Followers"  => $_POST['Followers']
        );
        $sql2 = sprintf(
                "INSERT INTO %s (%s) values (%s)",
                "page",
                implode(", ", array_keys($new_page)),
                ":" . implode(", :", array_keys($new_page))
        );
        
        $statement = $conn->prepare($sql2);
        $statement->execute($new_page);

  }


	 catch(PDOException $error) 
	{
        echo $sql . "<br>" . $error->getMessage();
    	}
}
?>

<?php require "templates/header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) { ?>
    <blockquote><?php echo $_POST['Pagename']; ?> successfully added.</blockquote>
<?php } ?>


<h2>Add a Page</h2>

<form method="post">

    <label for="Page_ID">Page ID</label>
    <input type="text" name="Page_ID" id="Page_ID">

    <label for="Pagename">Page Name</label>
    <input type="text" name="Pagename" id="Pagename">

    <label for="Description">Description</label>
    <input type="text" name="Description" id="Description">

    <label for="Page_category">Page category</label>
    <input type="text" name="Page_category" id="Page_category">

    <label for="Followers">Followers</label>
    <input type="text" name="Followers" id="Followers">

    <input type="submit" name="submit" value="Submit">
</form>


<a href="index.php">Back to home</a>

<?php require "templates/footer.php"; ?>