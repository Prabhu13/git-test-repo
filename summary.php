<?php include('/common/header.php') ?>

<head>
<div class="heading">
	<h2>Details</h2>
	</div>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>

<body>
	<?php 
		if($_SESSION['loggedIn']) {
			include_once('/common/logout.php'); 
		}
		else {
		header("Location: /Party/login.php");
	}
	?>

	<form action="/party/process.php" method="post">
		<table border='1' width='50%' >
			<tr>
				<th colspan='2' align='center'>Name</th> 
				<th colspan='2' align='center'>Reason</th> 
				<th colspan='2' align='center'>Date</th>
				<th colspan='2' align='center'>Party Given?</th  >
			</tr>

			<?php
			$id = $_GET['id'];
			$summary = getSummary($id);
			
			while($data = mysqli_fetch_array($summary)) { ?>
				<tr>
					<td colspan='2'><?php echo $data['name'] ?></td>
					<td colspan='2'><?php echo $data['reason'] ?></td>
					<td colspan='2'><?php echo $data['date_of_late'] ?></td>
					<td colspan='2'><input type="checkbox" name="party_given[]" value=<?php echo $data['id'];?>></td>
				</tr>
			<?php  } ?>
		</table>
		<input type="submit" name="update" value="update" />
		&nbsp
				<input type="submit" value="Back"<a href="#" onclick="history.back();"></a>
		
	</form>
<?php include('/common/footer.php'); ?>