<?php
	session_start();
	if ( isset($_POST['reset']))   {
		$_SESSION['chats'] = Array();
		header("Location: index.php");
		return;
	}

	if ( isset($_POST['message']))  {
		if (!isset ($_SESSION['chats']) ) $_SESSION['chats'] = Array();
		$_SESSION['chats'] [] = array($_POST['message'], date(DATE_RFC2822));
		header( "Location: index.php");
		return;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
</head>
<body>
	<h1>Chat</h1>
	<form method="post" action="index.php">
		<p>
			<input type="text" name="message" size="60" />
			<input type="submit" name="" value="Chat" />
			<input type="submit" name="reset" value="Reset" />
		</p>
	</form>
	<div id="chatcontent">
		<img src="spinner.gif" alt="Loading..." />
	</div>
</body>
</html>