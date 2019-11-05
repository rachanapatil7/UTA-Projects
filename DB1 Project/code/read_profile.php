<?php
/**
 * List all users with a link to edit
 */
require "config.php";
require "common.php";

try {
  $conn = new PDO($dsn, $username, $password, $options);
  $sql = "SELECT Profile_ID, firstname, lastname, Mobile, DOB, email, username, password FROM profile";
  $statement = $conn->prepare($sql);
  $statement->execute();
  $result = $statement->fetchAll();

} 
catch(PDOException $error)
 {
  echo $sql . "<br>" . $error->getMessage();
}
?>
<?php require "templates/header.php"; ?>
        
<h2>Read Profile</h2>

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
            
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<a href="index.php">Back to home</a>

<?php require "templates/footer.php"; ?>