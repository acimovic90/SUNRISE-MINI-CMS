<?php //destroy session without session_id active the user gets logged of
include 'include/classes/session.php';
session::start();

session::destroy($_SESSION['username']);


?>