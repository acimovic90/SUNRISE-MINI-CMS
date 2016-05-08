<?php 

include 'include/classes/session.php';
include 'include/classes/user.php';
session::start();
//session::set('key', value);

if(!empty($_POST["username"]) && !empty($_POST["password"])) //checks the inputs field have values 
{	
	$userName = strip_tags(trim($_POST['username'])); //Strip HTML and PHP tags from a string and strip for whitespace
    $userPassword = strip_tags(trim($_POST['password']));


    $results = user::read_user($userName); //find the user with the specific username

    if(count($results) > 0 && password_verify($userPassword, $results['password'])) //check if the user exist in the database, and verify the given hash for password 
    {
    	
    	session_regenerate_id(); //replaces the current session id with a new one so the user always gets a refreshed sessin_id when logged in
        session::set('username', $results['username']);
        session::set('email', $results['email']);
        session::set('last_activity', time());
        $session_id = session_id();
        session::update_session($userName, $session_id); //update the users session with the new session_id
        $results = user::read_user($userName);

        if($results["role"] == 5) //if it role in the database is 5 the set the admin role to true
        {
       	session::set('admin_role', 1);
    	header("Location:admin-panel.php"); //direct to the admin panel
        }
    	else 
    	{
    		header("Location:logout.php");
    	}
    	

        
//testing out session//
    } else{
        header("Location:logout.php");
    
    }
} 	?>
