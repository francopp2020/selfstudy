<?php
require_once "pdo.php";

if ( isset($_POST['user_id'])) {
	$sql = "DELETE FROM users WHERE user_id = :zip";
	echo "<pre>\n$sql\n</pre>";
	$stmt = $pdo->prepare($sql);
	$stmt->execute(array(':zip' => $_POST['user_id']));
}
?>

<p>Delete A User</p>
<form method="post">
	<p>ID to Delete: 
		<input type="text" name="user_id" autocomplete="off"></p>
		<p><input type="submit" name="Delete" /></p>
</form>