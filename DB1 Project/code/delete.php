<?php
/**
 * Delete a user
 */
require "config.php";
require "common.php";
if (isset($_GET["Profile_ID"])) {
  try {
    $connection = new PDO($dsn, $username, $password, $options);
  
    $Profile_ID = $_GET["Profile_ID"];
    $sql = "DELETE FROM profile WHERE Profile_ID = :Profile_ID";
    $statement = $connection->prepare($sql);
    $statement->bindValue(':Profile_ID', $Profile_ID);
    $statement->execute();
    $success = "User successfully deleted";
  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
}
try {
  $connection = new PDO($dsn, $username, $password, $options);
  $sql = "SELECT Profile_ID, firstname, lastname, Mobile, DOB, email, username, password FROM profile";
  $statement = $connection->prepare($sql);
  $statement->execute();
  $result = $statement->fetchAll();
} catch(PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}
?>
<?php require "templates/header.php"; ?>
        
<h2>Delete profile</h2>

<?php if ($success) echo $success; ?>

<table>
  <thead>
    <tr>
      <th>#</th>
      <th>First Name</th>
      <th>Last Name</th>
	<th>Mobile</th>
            <th>DOB</th>
            <th>Email Address</th>
            <th>Username</th>
            <th>Password</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($result as $row) : ?>
    <tr>
      <td><?php echo escape($row["Profile_ID"]); ?></td>
       <td><?php echo escape($row["firstname"]); ?></td>
            <td><?php echo escape($row["lastname"]); ?></td>
            <td><?php echo escape($row["Mobile"]); ?></td>
            <td><?php echo escape($row["DOB"]); ?></td>
            <td><?php echo escape($row["email"]); ?></td>
            <td><?php echo escape($row["username"]); ?> </td>
	    <td><?php echo escape($row["password"]); ?> </td>
      <td><a href="delete.php?Profile_ID=<?php echo escape($row["Profile_ID"]); ?>">Delete</a></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>

<a href="index.php">Back to home</a>

<?php require "templates/footer.php"; ?>