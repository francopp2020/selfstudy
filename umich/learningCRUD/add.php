<?php
require_once "pdo.php";
session_start();

if ( isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']))  {

	// Data validation
	if (strlen($_POST['name']) < 1  || strlen($_POST['password']) < 1)  {
		$_SESSION['error'] = 'Missing data';
		header("Location: add.php");
		return;
	}

	if (strpos($_POST['email'], '@') === false ) {
		$_SESSION['error'] = 'Not a real Email';
		header("Location: add.php");
		return;
	}

	$sql = "INSERT INTO users (name, email, password)
		VALUES (:name, :email, :password)";
	$stmt = $pdo->prepare($sql);
	$stmt->execute (array(
		':name' => $_POST['name'],
		':email' => $_POST['email'],

		':password' => $_POST['password']))   ;
	$_SESSION['success'] = 'Record Added';
	header( 'Location: index.php') ;
	return;
}

?>

<html>
<head></head>
<body>
<?php
	if (isset($_SESSION['error']))  {
		echo '<p style="color:red">'.$_SESSION['error']."</p>\n";
		unset($_SESSION['error']);
	}
?>
	<p>Add a new user</p>
	<form method="post">
		<p>Name:
			<input type="text" name="name">
		</p>
		<p>Email:
			<input type="text" name="email">
		</p>
		<p>Password:
			<input type="text" name="password">
		</p>
		<p>
			<input type="submit" name="" value="Add New" />
			<a href="index.php">Cancel</a>
		</p>
	</form>
</body>
</html>