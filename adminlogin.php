<?php if(!isset($_SESSION)) {session_start();}  ?>

<!Doctype html>

<html>
  <title>Login</title>

	<head>
	<h2>Login<h2>
	</head>

	<body>
	<?php include('dbcon.php');?>
		<form method="post" autocomplete="off">
		Id:	<input type="text" name="ids" >
		<br>
		Password:	<input type="password" name="passwords" >
		<br>
		<input type="submit" name="signin" value="login" ">
		</form>
	<?php
	if(isset($_POST["signin"])){
		$con=makeconnection();
		$q="select * from adminuser where id='".$_POST["ids"]."' and password='".$_POST["passwords"]."'";
		$run=mysqli_query($con,$q);
		$n=mysqli_num_rows($run);
		$user=mysqli_fetch_array($run);
		
		mysqli_close($con);
		if($n>0){
			$_SESSION["id"]=$_POST["ids"];
			$_SESSION["username"]=$user[1];
			$_SESSION['loginstatus']="yes";
			echo $SESSION['loginstatus'];
			header("location:PHP/changes.php");		
		        }
		else{
			echo "<script>alert('Invalid User id or Password')</script>";
		    }  
	?>
	</body>

</html>