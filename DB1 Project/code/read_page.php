<?php
/**
 * List all users with a link to edit
 */
require "config.php";
require "common.php";

try {
  $conn = new PDO($dsn, $username, $password, $options);
  $sql = "SELECT Page_ID, Pagename, Description, Page_category, Followers FROM page";
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
        
<h2>Read Page</h2>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Pagename</th>
            <th>Description</th>
	    <th>Page_category</th>
            <th>Followers</th>
            
        </tr>
    </thead>
    <tbody>
    <?php foreach ($result as $row) : ?>
        <tr>
            <td><?php echo escape($row["Page_ID"]); ?></td>
            <td><?php echo escape($row["Pagename"]); ?></td>
            <td><?php echo escape($row["Description"]); ?></td>
            <td><?php echo escape($row["Page_category"]); ?></td>
            <td><?php echo escape($row["Followers"]); ?></td>
            
            
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<a href="index.php">Back to home</a>

<?php require "templates/footer.php"; ?>