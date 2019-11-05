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
      "Page_ID"        => $_POST['Page_ID'],
      "Pagename" => $_POST['Pagename'],
      "Description"  => $_POST['Description'],
      "Page_category"  => $_POST['Page_category'],
      "Followers"     => $_POST['Followers']
 
    ];
    $sql = "UPDATE page
            SET Page_ID = :Page_ID, 
              Pagename = :Pagename, 
              Description= :Description, 
	      Page_category= :Page_category, 
              Followers = :Followers

            WHERE Page_ID= :Page_ID";
  
  $statement = $conn->prepare($sql);
  $statement->execute($user);
  } catch(PDOException $error) {
      echo $sql . "<br>" . $error->getMessage();
  }
}
  
if (isset($_GET['Page_ID'])) {
  try {
    $conn = new PDO($dsn, $username, $password, $options);
    $Page_ID = $_GET['Page_ID'];
    $sql = "SELECT * FROM page WHERE Page_ID = :Page_ID";
    $statement = $conn->prepare($sql);
    $statement->bindValue(':Page_ID', $Page_ID);
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
	<blockquote><?php echo escape($_POST['Pagename']); ?> successfully updated.</blockquote>
<?php endif; ?>

<h2>Edit a page</h2>

<form method="post">
    <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
    <?php foreach ($user as $key => $value) : ?>
      <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
	    <input type="text" name="<?php echo $key; ?>" Page_ID="<?php echo $key; ?>" value="<?php echo escape($value); ?>" <?php echo ($key === 'Page_ID' ? 'readonly' : null); ?>>
    <?php endforeach; ?> 
    <input type="submit" name="submit" value="Submit">
</form>

<a href="index.php">Back to home</a>

<?php require "templates/footer.php"; ?>