<?php include "templates/header.php"; ?>
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: 200px;
    background-color: #f1f1f1;
}

li a {
    display: block;
    color: #000;
    padding: 8px 16px;
    text-decoration: none;
}

li a.active {
    background-color: #4CAF50;
    color: white;
}

li a:hover:not(.active) {
    background-color: #555;
    color: white;
}
</style>
<ul>
<li><a class="active" href="#home">CRUD - User</a></li>
	<li><a href="CRUD/create.php"><strong>Create</strong></a></li>
	<li><a href="CRUD/read.php"><strong>Read</strong></a></li>
	<li><a href="CRUD/update.php"><strong>Update</strong></a></li>
    <li><a href="CRUD/delete.php"><strong>Delete</strong></a></li>
    <li><a href="CRUD/login.php"><strong>Log In</strong></a></li>
</ul>

<?php include "templates/footer.php"; ?>