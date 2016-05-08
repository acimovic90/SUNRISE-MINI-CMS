<?php include('include/header-admin.php') ?> <!--Here you can create your post which gets displayed on the index page-->
<div class="container">
	<div class=row>
		<div class="col-lg-12 ">
			<div class="alert alert-success" role="alert"><b>Lav din egen artikel!</b> Upload et billed, indsæt en titel og skriv 
				din artikel. Tryk på <b>Create Post</b> og din artikel bliver vist på forsiden. 
			</div>
			<h4>Upload a image</h4>

			<form class="form__post form-signin" form action="create-post.php" method="post" class="text-center center-block well well-sm" enctype="multipart/form-data">

			<div class="pull-left"><input type="file" name="fileToUpload" id="fileToUpload"></div>
				<input type="text" class="form__heading form-control" name="title_post" placeholder="Title...">
				<textarea class="form__text form-control" name="text_post" rows="10" placeholder="Insert Text Here..."></textarea>
				<button type="submit" class="form__btn btn btn-primary">Create Post</button>
			</form>
		</div>
	</div>
</div>


<?php include('include/footer-admin.php') ?>