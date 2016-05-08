<?php include('include/header-admin.php') ?>
<!--A switch statement which  collects form-data the from read-user-panel.php through the URL-->
<?php
if(isset($_GET['id']) && $_GET['role']){ //there are different options all which changes the role of user
	$user_id = trim(strip_tags($_GET['id']));
	$user_role = $_GET['role'];
	switch($user_role){
		case "downgrade_to_user":
		user::update_user_role($user_id, "1");
		header('Location: read-users-panel.php');
		break;

		case "upgrade_to_admin":
		user::update_user_role($user_id, "5");
		header('Location: read-users-panel.php');
		break;

		case "ban_user":
		user::update_user_role($user_id, "0");
		header('Location: read-users-panel.php');
		break;

		case "upgrade_to_user":
		user::update_user_role($user_id, "1");
		header('Location: read-users-panel.php');
		break;

		case "delete_banned":
		user::update_user_role($user_id, "-1");
		header('Location: read-users-panel.php');
		break;

		case "session_logout": //if this option is choosen the user current logged in with user_id matched gets logged of. Admin can log of other users.
		user::update_user_session('', $user_id);
		header('Location: read-users-panel.php');
		break;

		default: echo "error";
		break;
	} 
}

?>


<?php include('include/footer-admin.php') ?>