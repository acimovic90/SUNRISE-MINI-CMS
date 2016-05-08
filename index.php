<?php include('include/header.php') ?>
<div class="jumbotron__banner jumbotron">
	<div class="jumbotron__banner--darkpicture" style="background-image:url(https://sunrise.dk/wp-content/uploads/2014/04/wallpaper_krea_afd.jpg);height:430px">
		<div class="jumbotron__inner">
		<div class="banner__text img-responsive">
				<h3 style="text-align: center;">Indsigtsbåren strategi og unik kreativ eksekvering er den mest 
				effektive vej til maksimal effekt</h3>
			
		</div>
		<center><a href="https://sunrise.dk/om-sunrise/" class="btn--turquoise btn btn-primary">Se hvad vi kan hjælpe dig med</a></center>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		
		<?php 
		include 'include/classes/post.php';
		$results = post::read_post();
		foreach( $results as $row ){

			echo "<div class='col-lg-4 col-md-4 col-sm-4 col-xs-12'>";
			echo "<div class='item'>";
			?>
			<div class='item__image img-responsive'>
				<img src="<?php echo $row['post_image']; ?>" style="height: 249px; width: 100%">
			</div>
			<div class='item__inner'>
				<div class='item__heading'><h1><?php echo $row['post_heading'];?></h1></div>
				<div class='item__text'><p><?php echo $row['post_text'];?></p></div>
				<div class='container__button'>
					<button type="button" class="btn__read btn btn-lg">Read more</button>
					<?php 
					if(isset($_SESSION['admin_role'])){ ?>
						<a href="delete-post.php?id=<?php echo $row['post_id']; ?>"><span class='fa fa-trash-o fa-5x' aria-hidden='true'></span></a>
					<?php }
					?>
				</div>
			</div>
			<?php 
			echo "</div>";
			echo "</div>";
		} ?>

	</div>
</div>
</div>
<?php include('include/footer.php') ?>