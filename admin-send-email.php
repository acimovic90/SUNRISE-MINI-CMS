<?php //retrieves all the post data and from the admin panel and sends it to whomever mail has been selected in $_POST["selected-email"]
include 'include/classes/session.php';
session::start();
session::admin_role();

$to = $_POST["selected-email"];
$subject = "Send From Admin Panel";
$message = $_POST["text-message"];
$headers = "From:" . $_SESSION['email'];
$sMessage= rawurlencode($message);

mail($to,$subject,rawurldecode($sMessage),$headers);

header('Location: admin-panel.php');



?>