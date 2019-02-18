<?php include_once('/common/header.php');?>
<head>
<div class="heading">
<h2>ADD DEFAULTER</h2>
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
			<form method="post" action="/party/addlate.php">
				<br>
				Name:
				<select name="users_id">
					<?php 
						$allUsers = getAllUsers();
						while($data = mysqli_fetch_array($allUsers)) {
							echo '<option value="'.$data['id'].'">' . $data['name'] . '</option>';	
						}
					?>
				</select>
					<br><br>
					Date: <input type="date" name="date_of_late">
					<br><br>
					Type: <select name="faultType">
					<option value="Late">Late</option>
					<option value="Absent">Absent</option>
				</select>
				<br><br>
				Comment Your Reason: <input type="text" name="reason" autocomplete="off" required>
				<br>
				<input type="submit" value="Add" name="add">
				&nbsp
				<input type="reset" name="cancel" value="Cancel" >
				&nbsp
				<input type="submit" value="Back" <a href="#" onclick="history.back();"></a>
			</form>
		<?php
		if(isset($_POST['add'])) {
			unset($_POST['add']);
			if(inserttrack($_POST)) {
				header("Location: home.php");
			}
		}

		include_once('/common/footer.php'); 
	   ?>