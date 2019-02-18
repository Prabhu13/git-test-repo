<?php include('/common/header.php') ?>

<head>

    <link rel="stylesheet" type="text/css" href="CSS/style.css">
	<div class="heading">
	<h2>Process</h2>
	</div>
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
	<h2>Gave The Party!!!!!!!! <h2>
	<button type="button" name="" value="Details" onClick="window.location='http://localhost/Party/home.php'">
	Back To Users
	</button>
	<br>
    <?php
		$ids = isset($_POST['party_given']) ? implode(', ', $_POST['party_given']) : 0;	
		updatePartyGiven($ids);	
	
include('/common/footer.php') 
?>
