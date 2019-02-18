<?php
if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
	echo "Welcome {$_SESSION['userData']['name']} ! <br/>";
}
?>

<form method="post" action="/Party/common/logout.php">
		<input type="submit" name="logout" value="logout" onClick="return confirm('Are You Sure To Logout!!');">
</form>
<br>
<?php
	if(isset($_POST['logout'])) {
		session_start();
		session_destroy();
		header("Location: /Party/login.php");
	}	
?>