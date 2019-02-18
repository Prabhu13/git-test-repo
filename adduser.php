<?php include_once('/common/header.php') ?>
<head>
	<div class="heading">
		<h2>ADD USER</h2>
	</div>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>

<body>
		<?php 
//this is the best method for it
		if($_SESSION['loggedIn']) {
				include_once('/common/logout.php'); 
			}
			else {
		header("Location: /Party/login.php");
	}
		?>
		<form method="post" autocomplete="off" action="/party/adduser.php">
				<br><br>
				Name:<input type="text" name="name" required>
				<br><br>
				Email Id:<input type="text" name="email_id" required>
				<br><br>
				User Type:
				<select name="user_type">
						<option value="2">Others</option>
						<option value="1">Admin</option>
				</select>
				<br><br>
				Password:<input type="password" name="pwd" required>
				<br><br>
				<input type="submit" name="submit" value="submit">
				&nbsp
				<input type="reset" name="cancel" value="Cancel" >
				&nbsp
				<input type="submit" value="Back"<a href="#" onclick="history.back();"></a>
		</form>
</body>
<?php 
		if(isset($_POST['submit'])) {
				unset($_POST['submit']);
				if(insertuser($_POST)) {
					header("Location: home.php");
				}
			}

        include_once('/common/footer.php')
?>
