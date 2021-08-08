<?php
if (isset($_POST['where'])    )  {
	if ( $_POST['where']  ==  '1')  {
		header("Location: redir1.php");
		return;
	}
	else if ( $_POST['where']  ==  '2')  {
		header("Location: redir2.php");
		return;
	}
	else {
		header("Location: http://www.google.com");
		return;
	}
}

?>

<html>
	<body>
		<p>I am Router one...</p>
		<form method="post">
			<p><label for="inp9">Where to go? (1-3)</label>
				<input type="text" name="where" id="inp9" size="5">
			</p>	
			<input type="submit" name="Redirector">
		</form>
	</body>
</html>