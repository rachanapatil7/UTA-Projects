<?php
/**
 * Use an HTML form to edit an entry in the
 * users table.
 *
 */
require "config.php";
require "common.php";

if (isset($_POST['submit'])) {
  if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();
  try {
    $conn = new PDO($dsn, $username, $password, $options);
    $user =[
      "Profile_ID"        => $_POST['Profile_ID'],
      "firstname" => $_POST['firstname'],
      "lastname"  => $_POST['lastname'],
      "Mobile"  => $_POST['Mobile'],
      "DOB"  => $_POST['DOB'],
      "email"     => $_POST['email'],
      "username"       => $_POST['username'],
      "password"  => $_POST['password']
 
    ];
    $sql = "UPDATE profile 
            SET Profile_ID = :Profile_ID, 
              firstname = :firstname, 
              lastname = :lastname, 
	      Mobile = :Mobile, 
              DOB = :DOB, 
              email = :email, 
              username = :username, 
              password = :password
            WHERE Profile_ID = :Profile_ID";
  
  $statement = $conn->prepare($sql);
  $statement->execute($user);
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
}
  
if (isset($_GET['Profile_ID'])) {
  try {
    $conn = new PDO($dsn, $username, $password, $options);
    $Profile_ID = $_GET['Profile_ID'];
    $sql = "SELECT Profile_ID, firstname, lastname, Mobile, DOB, email, username, password FROM profile WHERE Profile_ID = :Profile_ID";
    $statement = $conn->prepare($sql);
    $statement->bindValue(':Profile_ID', $Profile_ID);
    $statement->execute();
    
    $user = $statement->fetch(PDO::FETCH_ASSOC);
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
} else {
    echo "Something went wrong!";
    exit;
}
?>

<?php require "templates/header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) : ?>
	<blockquote><?php echo escape($_POST['firstname']); ?> successfully updated.</blockquote>
<?php endif; ?>

<h2>Edit a profile</h2>

<form method="post">
    <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
    <?php foreach ($user as $key => $value) : ?>
      <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
	    <input type="text" name="<?php echo $key; ?>" Profile_ID="<?php echo $key; ?>" value="<?php echo escape($value); ?>" <?php echo ($key === 'Profile_ID' ? 'readonly' : null); ?>>
    <?php endforeach; ?> 
    <input type="submit" name="submit" value="Submit">
</form>

<a href="index.php">Back to home</a>

<?php require "templates/footer.php"; ?>