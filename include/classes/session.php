<?php

class session //start session if none exist
{	
	public static function start()
	{
		if (session_status() == PHP_SESSION_NONE) 
		{
			session_start();
		} 

	}

	public static function admin_role() //check if the user admin_role is true
	{
		if(!isset($_SESSION['admin_role'])) {
			header('location: index.php');
		}

	}

	public static function set($key, $value) 
	{
		$_SESSION[$key] = $value;
	}

	public static function get($key)
	{
		if(isset($_SESSION[$key]))
			return $_SESSION[$key];
		else
			return false;
	}

	public static function destroy($username) //destroys the session
	{
		if(!$username == '' || !$username == NULL) 
		{
			session_destroy();
		}

		header('location: admin-login.php');
	}
	
//SESSION CRUD
	public static function update_session($db_username, $session_id) /*updates session makes sure you get a new one everytime you log in*/
	{	
		require "include/db-connect.php";
		$update = $conn->prepare("UPDATE table SET column1=NOW(), column2=:column1 WHERE column3=:column2");
		$update->bindParam(':column2', $db_username);
		$update->bindParam(':column1', $session_id);
		$update->execute();
	}

	public static function security() //checks the session_id if it matches the one of the current user in the database if not then log off
	{	
		$session_user = $_SESSION['username'];
		$session_id = session_id();
		require "include/db-connect.php";
		$records = $conn->prepare("SELECT column1, column2 FROM table WHERE column1 = :column1 AND column2= :column2");
		$records->bindParam(':column1', $session_user);
		$records->bindParam(':column2', $session_id);
		$records->execute();
		$results = $records->fetch(PDO::FETCH_ASSOC);

		if(!isset($results['session_id']))
    		header("Location:logout.php");
		}
}

?>