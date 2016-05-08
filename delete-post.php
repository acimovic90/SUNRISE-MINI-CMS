<?php include('include/header-admin.php') ?>

<?php 
include 'include/classes/post.php';
if(isset($_GET['id'])){ //checking if there is any Id in the url
	$post_id = trim(strip_tags($_GET['id'])); 
	post::delete_post($post_id); //delete the post with the current post_id
}
?>
<?php include('include/footer-admin.php') ?>