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
       
	$new_post = array(
	    "Post_ID" => $_POST['Post_ID'],
            "Post_date" => $_POST['Post_date'],
            "Comments"  => $_POST['Comments'],
	    "Profile_ID" => $_POST['Profile_ID'],
	    "Page_ID" => $_POST['Page_ID']
        );
        $sql3 = sprintf(
                "INSERT INTO %s (%s) values (%s)",
                "post",
                implode(", ", array_keys($new_post)),
                ":" . implode(", :", array_keys($new_post))
        );
        
        $statement = $conn->prepare($sql3);
        $statement->execute($new_post);

  }
	 catch(PDOException $error) 
	{
        echo $sql . "<br>" . $error->getMessage();
    	}
}
?>

<?php require "templates/header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) { ?>
    <blockquote><?php echo $_POST['firstname']; ?> successfully added.</blockquote>
<?php } ?>


<h2>Add a Post</h2>

<form method="post">

    <label for="Post_ID">Post ID</label>
    <input type="text" name="Post_ID" id="Post_ID">
	
    <label for="Post_date">Postdate</label>
    <input type="text" name="Post_date" id="Post_date">

    <label for="Comments">Comments</label>
    <input type="text" name="Comments" id="Comments">

    <label for="Profile_ID">Profile ID</label>
    <input type="text" name="Profile_ID" id="Profile_ID">

    <label for="Page_ID">Page ID</label>
    <input type="text" name="Page_ID" id="Page_ID">
  
    <input type="submit" name="submit" value="Submit">
</form>


<a href="index.php">Back to home</a>

<?php require "templates/footer.php"; ?>