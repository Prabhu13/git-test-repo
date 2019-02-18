<?php
	$con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	function execute($query) {
		global $con, $logger;
		$q = mysqli_query($con, $query);	
		$logger->addLogs($query);
		return $q;
	}
	
	function getLateInfo() {
		$query = "SELECT u.id, u.name, IFNULL(COUNT(1), 0) AS counter 
					FROM users u 
					LEFT JOIN track t ON u.id = t.users_id 
					WHERE working_status = 1 AND party_given = 1 
					GROUP BY u.id 
					ORDER BY u.id ASC";				
		return execute($query);		
	}
	
	function updatePartyGiven($ids) {
		$query = "UPDATE track 
					SET party_given = 0 
					WHERE id IN (" . $ids . ")";
		return execute($query);
	}
	
	function getSummary($id) {
		$query = "SELECT * 
				FROM users AS u 
				LEFT JOIN track AS t on u.id = t.users_id 
				WHERE users_id = {$_GET['id']} 
				AND party_given = 1";				
		return execute($query);		
	}
	
	function getAllUsers() {
		$query = "SELECT * FROM users WHERE working_status = 1";
		return execute($query);
	}
	
	function inserttrack($data) {
		$column = implode(', ', array_keys($data));
		$values = "'" . implode("','", $data) . "'";
		
		$query = "INSERT INTO track ($column) 
			VALUES ($values)";
		return execute($query);
	}
	function insertuser($data) {
		$column = implode(', ', array_keys($data));
		$values = "'" . implode("','", $data) . "'";
		
		$query = "INSERT INTO users ($column) 
			VALUES ($values)";
		return execute($query);
	}
	
	function validateUser($data){
		$query = "select name, email_id,user_type from users where email_id='" . $data['email_id'] . "'  and pwd = '" . $data['pwd'] . "'";
		return execute($query);
	}

	
?>