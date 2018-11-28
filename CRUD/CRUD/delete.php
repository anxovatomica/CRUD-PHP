<?php

/**
 * Delete a user
 */

require "../config.php";
require "../common.php";

if (isset($_GET["id"])) {
  try {
    $connection = new PDO($dsn, $username, $password, $options);
  
    $id = $_GET["id"];

    $sql = "DELETE FROM user WHERE id = :id";

    $statement = $connection->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();
  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
}

try {
  $connection = new PDO($dsn, $username, $password, $options);

  $sql = "SELECT * FROM user";

  $statement = $connection->prepare($sql);
  $statement->execute();

  $result = $statement->fetchAll();
} catch(PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}
?>
<?php require "../templates/header.php"; ?>
        
<h2>Delete users</h2>



<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Birthdate</th>
      <th>Address</th>
      <th>Email</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($result as $row) : ?>
    <tr>
      <td><?php echo escape($row["id"]); ?></td>
      <td><?php echo escape($row["name"]); ?></td>
      <td><?php echo escape($row["surname"]); ?></td>
      <td><?php echo escape($row["birthdate"]); ?></td>
      <td><?php echo escape($row["address"]); ?></td>
      <td><?php echo escape($row["email"]); ?></td>
      <td><a href="delete.php?id=<?php echo escape($row["id"]); ?>">Delete</a></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>

<a href="../index.php"><input type="button"  value="Back to home"></a>

<?php require "../templates/footer.php"; ?>