<?php
class user //The class for handling the users tabel inside the database
{	
	public static function create_user($db_username, $db_password, $db_email, $db_activation_key)
	{	
		$results = self::read_user($db_username);
		if(!$results['username'] || !$results['email']) //if the result does not exist in the database proceed
		{
			require 'include/db-connect.php';	
			$stmt = $conn->prepare('INSERT INTO table (column1, column2, column3, column4, column5) 
				VALUES (:column1, :column2, :column3, :column4, NOW())');
			$stmt->bindParam(':column1', $db_username);
			$stmt->bindParam(':column2', $db_password);
			$stmt->bindParam(':column3', $db_email);	
			$stmt->bindParam(':column4', $db_activation_key);
			$stmt->execute();
			return true;
		} else{
			return false;
		}
	}

	public static function read_users()
	{	
		require 'include/db-connect.php';	
		$records = $conn->prepare('SELECT * FROM table');
		$records->execute();
		$results = $records->fetchAll(PDO::FETCH_ASSOC);
		return $results;
	}

	public static function read_user($db_username)
	{	
		require 'include/db-connect.php';	
		$records = $conn->prepare('SELECT column1,column2,column3,column4, column5, column6, column7, column8 FROM table WHERE column1 = :column1');
		$records->bindParam(':column1', $db_username);
		$records->execute();
		$results = $records->fetch(PDO::FETCH_ASSOC);
		return $results;
	}

	public static function read_user_email($db_email)
	{	
		require 'include/db-connect.php';	
		$records = $conn->prepare('SELECT column1, column2,column3, column4, column5 FROM table WHERE column3 = :column3');
		$records->bindParam(':column3', $db_email);
		$records->execute();
		$results = $records->fetch(PDO::FETCH_ASSOC);
		return $results;
	}

	public static function read_users_role($db_role)
	{	
		require 'include/db-connect.php';	
		$records = $conn->prepare('SELECT column1, column2, column3, column4, column5, column6 FROM table WHERE column4 = :column4');
		$records->bindParam(':column4', $db_role);
		$records->execute();
		$results = $records->fetchAll(PDO::FETCH_ASSOC);
		return $results;
	}
	public static function update_user($db_email, $db_session_id, $db_activation_key) 
	{	
		/*when the user has been entering the link send to them from the admin-panel it information gets updated and he is now a admin*/
		require 'include/db-connect.php';
		$stmt = $conn->prepare("UPDATE table SET column1=NOW(), column2 = :column2, column3 = '5', column4='1' WHERE column5=:column5 AND column6=:column6 AND column7='0'");
		$stmt->bindParam(':column3', $db_email);
		$stmt->bindParam(':column4', $db_session_id);
		$stmt->bindParam(':column5', $db_activation_key);
		$stmt->execute();
	}

	public static function update_user_picture($db_username, $db_picture)
	{	
		require 'include/db-connect.php';
		$stmt = $conn->prepare("UPDATE table SET column1= :column1  WHERE column2=:column2");
		$stmt->bindParam(':column2', $db_username);
		$stmt->bindParam(':column1', $db_picture);
		$stmt->execute();
	}

	public static function update_user_bio($db_username, $db_bio)
	{	
		require 'include/db-connect.php';
		$stmt = $conn->prepare("UPDATE table SET column1= :column1  WHERE column2=:column2");
		$stmt->bindParam(':column2', $db_username);
		$stmt->bindParam(':column1', $db_bio);
		$stmt->execute();
	}

	public static function update_user_password($db_username, $db_password)
	{	
		$validated_password = self::validate_password($db_password);
		$hash_password = password_hash($validated_password , PASSWORD_DEFAULT);
		require 'include/db-connect.php';
		$stmt = $conn->prepare("UPDATE table SET column1= :column1  WHERE column2=:column2");
		$stmt->bindParam(':column2', $db_username);
		$stmt->bindParam(':column1', $hash_password);
		$stmt->execute();
	}

	public static function update_user_role($db_user_id, $db_role)
	{	
		require 'include/db-connect.php';
		$stmt = $conn->prepare("UPDATE table SET column1= :column1  WHERE column2=:column2");
		$stmt->bindParam(':column1', $db_user_id);
		$stmt->bindParam(':column2', $db_role);
		$stmt->execute();
	}

	public static function update_user_session($db_session_id, $db_user_id)
	{	
		require 'include/db-connect.php';
		$stmt = $conn->prepare("UPDATE table SET column1= :column1  WHERE column2=:column2");
		$stmt->bindParam(':column1', $db_session_id);
		$stmt->bindParam(':column2', $db_user_id);
		$stmt->execute();
	}


	public static function validate_email($email) {
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			?>
			<div class="container" style="padding-top: 40px">
				<div class="alert alert-danger" role="alert" align="center">
					<p>Invalid Email!</p>
				</div>
			</div>
			<?php
			return false;
		}
		return $email;
	}


	public static function validate_username($user) {
		$trim_user = trim($user);
		$userName = filter_var($trim_user, FILTER_SANITIZE_STRING);
		$aValid = array('-', '_', '!', '.');

		if(!ctype_alnum(str_replace($aValid, '', $userName))) {
			?>
			<div class="container" style="padding-top: 40px">
				<div class="alert alert-danger" role="alert" align="center">
					<p>Your username is not properly formatted.</p>
				</div>
			</div>
			<?php
			return false;
		}

		if(strlen($userName) < 4 || strlen($userName) > 15) {
        //Format okay, check length
			?>
			<div class="container" style="padding-top: 40px">
				<div class="alert alert-danger" role="alert" align="center">
					<p>Username needs to be between 4 & 15 characters!</p>
				</div>
			</div>
			<?php
			return false;
		}
		return $userName;
	}

	public static function validate_password($pass) {
		$error = NULL;
    //Password validate
		$userPassword = trim($pass);
		if(strlen($userPassword) < 8 ) {$error .= "<p>Password too short!</p>";}
		if(strlen($userPassword) > 20 ) {$error .= "<p>Password too long!</p>";}
		if(!preg_match("#[0-9]+#", $userPassword) ) {$error .= "<p>Password must include at least one number!</p>";}
		if(!preg_match("#[a-z]+#", $userPassword) ) {$error .= "<p>Password must include at least one letter!</p>";}
		if(!preg_match("#[A-Z]+#", $userPassword) ) {$error .= "<p>Password must include at least one CAPS!</p>";}
    //if( !preg_match("#\W+#", $userPassword) ) {$error .= "<p>Password must include at least one symbol!</p>";}
		if($error){
			?>
			<div class="container" style="padding-top: 40px">
				<div class="alert alert-danger" role="alert" align="center">
					<p>Password validation failure(your choice is weak):</p>
					<?php echo $error; ?>
				</div>
			</div>
			<?php
			return false;
		} else {
			return $userPassword;
		}
	}
}

?>