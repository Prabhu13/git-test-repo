<?php include_once('/common/header.php');?>
<head>
<div class="heading">
<h2>Home</h2>
</div>
<link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>

<body>
	<?php 
	if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
		include_once('/common/logout.php'); 
	} else {
		header("Location: /Party/login.php");
	}
	?>
	<?php if($_SESSION['user_type']==1) {?>
	<input type="button" name="Add_User" onClick="window.location='http://localhost/Party/adduser.php'" value="Add user" >
	<br><br>
	<input type="button" name="Add_Late" onClick="window.location='http://localhost/Party/addlate.php'" value="Add Late">
	<br><br>
	<?php } ?>
   <table border='1' width='50%' >
		<tr>
			<th colspan='2' align='center'>Id</th> 
			<th colspan='2' align='center'>Name</th> 
			<th colspan='2' align='center'>Count</th>
			<?php if($_SESSION['user_type']==1) {?>
			<th colspan='2' align='center'>Details</th>
			<?php } ?>
		</tr>
		
		<?php
		$lateInfo = getLateInfo();
		while($data = mysqli_fetch_array($lateInfo)) {
			echo "<tr><td colspan='2'>{$data['id']}</td><td colspan='2'>{$data['name']}</td><td colspan='2'>{$data['counter']}</td>";
		 if($_SESSION['user_type']==1) { ?>
		    <td colspan='2'>
			<input type="button" value="Details" onClick="window.location='http://localhost/Party/summary.php/?id=<?php echo $data['id'] ?>'">
		<?php
			echo "</td>";
		 }
			echo "</tr>";
		} ?>
		
	</table>
<?php include_once('/common/footer.php'); ?>