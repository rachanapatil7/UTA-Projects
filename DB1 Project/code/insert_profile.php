<?php
/**
 * Use an HTML form to create a new entry in the
 * users table.
 *
 */
if (isset($_POST['submit'])) {
	require "common.php";
        require "config.php";

    
       $conn = new PDO($dsn, $username, $password, $options);
    try  {
       
        
        $new_profile = array(
	    "Profile_ID" => $_POST['Profile_ID'],
            "firstname" => $_POST['firstname'],
            "lastname"  => $_POST['lastname'],
	    "Mobile"    => $_POST['Mobile'],
	    "DOB"       => $_POST['DOB'],
            "email"     => $_POST['email'],
            "username"  => $_POST['username'],
            "password"  => $_POST['password']
	    
        );
        $sql1 = sprintf(
                "INSERT INTO %s (%s) values (%s)",
                "profile",
                implode(", ", array_keys($new_profile)),
                ":" . implode(", :", array_keys($new_profile))
        );
        
        $statement = $conn->prepare($sql1);
        $statement->execute($new_profile);

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


<h2>Add a Profile</h2>

<form method="post">

    <label for="Profile_ID">Profile ID</label>
    <input type="text" name="Profile_ID" id="Profile_ID">

    <label for="firstname">First Name</label>
    <input type="text" name="firstname" id="firstname">

    <label for="lastname">Last Name</label>
    <input type="text" name="lastname" id="lastname">

    <label for="Mobile">Mobile</label>
    <input type="text" name="Mobile" id="Mobile">
  
    <label for="DOB">DOB</label>
    <input type="text" name="DOB" id="DOB">

    <label for="email">Email Address</label>
    <input type="text" name="email" id="email">

    <label for="username">username</label>
    <input type="text" name="username" id="username">

    <label for="password">password</label>
    <input type="text" name="password" id="password">

    <input type="submit" name="submit" value="Submit">
</form>

<a href="index.php">Back to home</a>

<?php require "templates/footer.php"; ?>