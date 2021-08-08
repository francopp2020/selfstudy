// ON THIS EXAMPLE WE ARE USING SOMETHING CALLED STRING CONCATENATION FROM LINE 13 TO 24. THIS MEANS WE ARE NOT PREPARING STATEMENT. AND THIS IS WHY IS SO EASY TO BREAK INTO OUR CODE USING THE P' OR'1' = '1 TECHNIQUE. LOGIN2 FIXES THIS CODE.

<?php
require_once "pdo.php";

// p' OR '1' = '1

if (isset($_POST['email']) && isset($_POST['password'])  ) {
	echo ("<p>Handling POST data...</p>\n");
	$e = $_POST['email'];
	$p = $_POST['password'];	

	$sql = "SELECT name FROM users
	WHERE email = '$e'
	AND password = '$p'";

	echo "<p>$sql</p>\n";

	$stmt = $pdo->query($sql);
	$row = $stmt->fetch(PDO::FETCH_ASSOC);

	var_dump($row);
	echo "-->\n";
	 if ( $row == FALSE ) {
	 	echo "<h1>Login incorrect. </h1>\n";
	 }
	 else
	 {
	 	echo "<h1>Login Success. </h1> \n";
	 }
}

?>

<p>Please Login</p>
<form method="post">
	<p>Email:
		<input type="text" name="email" size="40">
	</p>
	<p>Password:
		<input type="text" name="password" size="40">
	</p>
	<p>
		<input type="submit" value="login" />
		<a href="<?php echo($_SERVER['PHP_SELF']);?>">REfresh</a>
	</p>
</form>
<p>
	Check out this
	<a href="http://xkcd.com/327/" target="_blank">XKCD Comic</a>
</p>