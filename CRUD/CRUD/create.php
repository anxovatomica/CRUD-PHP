
<?php

/**
 * Use an HTML form to create a new entry in the
 * users table.
 *
 */

require "../config.php";
require "../common.php";
if (isset($_POST['submit'])) {
  //if (!hash_equals($_SESSION['csrf'], $_POST['csrf'])) die();

  try {
    $connection = new PDO($dsn, $username, $password, $options);

    $new_user = array(
      "name" => $_POST['name'],
      "surname" => $_POST['surname'],
      "birthdate" => $_POST['birthdate'],
      "address" => $_POST['address'],
      "email" => $_POST['email'],
      "password" => $_POST['password']
    );

    $sql = sprintf(
      "INSERT INTO %s (%s) values (%s)",
      "user",
      implode(", ", array_keys($new_user)),
      ":" . implode(", :", array_keys($new_user))
    );

    $statement = $connection->prepare($sql);
    $statement->execute($new_user);
  } catch (PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
}
?>
<?php require "../templates/header.php"; ?>

  <!--If submit was clicked and the query is executed-->
  <?php if (isset($_POST['submit']) && $statement) : ?>
    <blockquote><?php echo $_POST['name']; ?> successfully added.</blockquote>
  <?php endif; ?>

  <h2>Add a user</h2>

  <form method="post">
    <label for="name">First Name</label>
    <input type="text" name="name" id="name" placeholder="First Name"><br>
    <label for="surname">Last Name</label>
    <input type="text" name="surname" id="surname" placeholder="Last Name"><br>
    <label for="birthdate">Birthdate</label>
    <input type="date" name="birthdate" id="birthdate" placeholder="0000-00-00"><br>
    <label for="address">Address</label>
    <input type="text" name="address" id="address" placeholder="Address"><br>
    <label for="email">Email</label>
    <input type="text" name="email" id="email" placeholder="Email"><br>
    <label for="email">Password</label>
    <input type="password" name="password" id="password" placeholder="Password"><br>
    <input type="submit" name="submit" value="Submit">
  </form>
  
  <a href="../index.php"><input type="button"  value="Back to home"></a>

<?php require "../templates/footer.php"; ?>
