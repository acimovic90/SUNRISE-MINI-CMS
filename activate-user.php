<?php //activating the user when entering the unique link handled to one in the mail inbox
include 'include/classes/user.php';
$user_email = strip_tags(trim($_GET['email']));
$secret_key = strip_tags(trim($_GET['activation']));

$results = user::read_user_email($user_email );

if(count($results) > 0 && $results['column3'] == 0 && $results['column2'] == $user_email && $results['column3'] == $secret_key) {

	try {
		
		include 'include/classes/session.php';
		session::start();
		session_regenerate_id();
		session::set('column1', $results['column1']);
        session::set('column2', $results['column2']);
        session::set('column3', time());
		$session_id = session_id();
		user::update_user($user_email, $session_id, $secret_key);
		header('Location: admin-panel.php');

	} catch (PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
	require 'include/db-connect.php';
	$conn = null;
} else {
	?>
	<div style="padding-top: 40px">
		<div class='alert alert-danger' role='alert'>
			<p align="center">Something did not match!</p>
			<p align="center">Are you sure you clicked the right link?</p>
		</div>
	</div>
	<?php
	header("refresh:3;url=index.php");
}
?>
