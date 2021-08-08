<?php
	session_start();
	if ( isset($_POST["account"]) && isset($_POST['pw'])  ) {
		unset($_SESSION['account']); // Logout current user
		if ( $_POST['pw'] == 'umsi') {
			$_SESSION["account"] = $_POST["account"];
			$_SESSION["success"] = "logged In." ;
			header( 'Location: app.php' ) ;
			return;
		}
		else {
			$_SESSION["error"] = "Incorrect password.";
			header( 'Location: login.php') ;
			return;
		}
	}
?>

<html>
<body>
	<h1>Please Log in</h1>
	<?php
	if ( isset($_SESSION["error"])  ) {
		echo ('<p style="color:red">') .$_SESSION["error"] . "</p> \n";
		unset($_SESSION['error']) ;
	}
	if ( isset($_SESSION['success']) ) {
		echo ('<p style="color: green">'.$_SESSION['success']."</p>\n");
		unset($_SESSION['success']);
	}
?>

<form method="post">
	<p>Account <input type="text" name="account" value=""></p>
	<p>Password: <input type="text" name="pw" value=""></p>
<!-- Password is umsi -->
<p><input type="submit" name="" value="Log in"><a href="app.php">Cancel</a></p>
</form>
</body>
</html>