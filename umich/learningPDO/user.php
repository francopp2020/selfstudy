<?php
require_once "pdo.php";
if ( isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
	$sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
	echo ("<pre>\n".$sql."\n</pre>\n");
	$stmt = $pdo->prepare($sql);
	$stmt->execute(array(
		':name' => $_POST['name'],
		':email' => $_POST['email'],
		':password' => $_POST['password']));
}

?>
<html>
<head></head>
<body>
	<p>Add a new User</p>
	<form method="post">
		<p>Name:
		<input type="text" name="name" size="40" placeholder="Enter your name"></p>
		<p>Email:
		<input type="text" name="email"></p>
		<p>Password:
		<input type="text" name="password"></p>
		<p><input type="submit" name="Add New" value="Enter"></p>
	</form>
</body>
</html>