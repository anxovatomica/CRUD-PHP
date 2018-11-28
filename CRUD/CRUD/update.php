<?php

/**
 * List all users with a link to edit
 */

require "../config.php";
require "../common.php";

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
        
<h2>Update users</h2>

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Birthdate</th>
            <th>Address</th>
            <th>Email</th>
            <th>Password</th>
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
            <td><?php echo escape($row["password"]); ?></td>
            <td><a href="update-single.php?id=<?php echo escape($row["id"]); ?>">Edit</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<a href="../index.php"><input type="button"  value="Back to home"></a>

<?php require "../templates/footer.php"; ?>