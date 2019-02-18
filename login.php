<?php include_once('/common/header.php');
?>
<?php if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']==1){
          header("Location:home.php");
}else{ ?>
<head>
	<div class="heading">
		<h2>Login Page</h2>
	</div>

	<link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>
<body>
		<form method="post" action="/Party/login.php" autocomplete="off">
				<br><br>

				Enter Email Id:<input type="text" name="email_id" required>
				<br><br>

				Enter Password:<input type="password" name="pwd" required>
				<br><br>
				<input type="submit" name="login" value="Login">
		</form>

		<?php 
			if(isset($_POST['login'])) {
				$result = validateUser($_POST);
				$num_rows = mysqli_num_rows($result);
				$userData = mysqli_fetch_array($result);
				
				if($num_rows) {
					$_SESSION['loggedIn'] = 1;
					$_SESSION['userData'] = $userData;
					$_SESSION['user_type']=$userData['user_type'];
					header("Location: /Party/home.php");
				}	
			}			
		?>

<?php include_once('/common/footer.php')?>
<?php } ?>