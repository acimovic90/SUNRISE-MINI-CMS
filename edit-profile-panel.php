<?php include('include/header-admin.php') ?>

<?php 
//Here you can view all your user information and edit them 
if(!empty($_SESSION['username'])) 
{
	$user_filter = filter_var($_SESSION['username'], FILTER_SANITIZE_STRING); //FILTER_SANITIZE_STRING Remove all HTML tags from a string:
	$results = user::read_user($user_filter);
}
?> 
<div class="container">
    <div class="row">
        <!-- left column -->
        <div class="col-lg-12 col-sm-6 col-xs-12">
            <div class="text-center">
                <img src="<?php echo $results['picture']; ?>" class="img-circle img-thumbnail" style="height: 200px; width: 200px">
                <h6>Upload a different photo...</h6>
                <!--insert form for img upload -->

                <form action="edit-profile.php" style="width: 400px; padding-bottom: 30px;" method="post" class="text-center center-block well well-sm" enctype="multipart/form-data">
                    <div class="pull-left"><input type="file" name="fileToUpload" id="fileToUpload"></div>
                    <div class="pull-right"><input type="submit" class='btn btn-xs btn-primary' value="Upload" name="submit"></div>
                </form>
                <b>Din profil blev oprettet: </b><p><?php echo $results["time_created"]; ?></p>
            </div>
            
            <!-- edit form column -->

            <h3>Personal info</h3>

            <form class="form-horizontal" role="form" method="post" action="edit-profile.php">
                <div class="form-group">
                    <label class="col-lg-3 control-label">Username:</label>

                    <div class="col-lg-8">
                        <input class="form-control" name="username" disabled="disabled" value="<?php echo $results['username']; ?>" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Email:</label>

                    <div class="col-lg-8">
                        <input class="form-control" name="input-email" disabled="disabled" value="<?php echo $results['email']; ?>" type="email">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Bio:</label>

                    <div class="col-lg-8">
                        <textarea rows="5" class="form-control" name="input-bio"><?php echo $results['bio']; ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label"></label>

                    <div class="col-md-8">
                        <input class="btn btn-primary" value="Save Changes" type="submit">
                    </div>
                </div>
            </form>
            <br/>

            <form class="form-horizontal" role="form" method="post" action="edit-profile.php">
                <h3>Change Password</h3>

                <div class="form-group">
                    <label class="col-md-3 control-label">New Password</label>

                    <div class="col-md-8">
                        <input class="form-control" name="input-password" type="password">
                    </div>
                </div>
                <br/>
                <div class="form-group">
                    <label class="col-md-3 control-label"></label>

                    <div class="col-md-8">
                        <input class="btn btn-primary" value="Change Password" type="submit">
                        <span></span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<?php include('include/footer-admin.php') ?>