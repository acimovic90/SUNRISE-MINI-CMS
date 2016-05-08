<?php include('include/header-admin.php') ?> <!--Include my header and it security check-->
<!-- /. NAV TOP  -->


<!-- /. NAV TOP  -->

<!-- /. NAV SIDE  -->

<!-- /. ROW  --> 
<div class="row text-center pad-top">
  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
    <div class="square__active">
     <a href="create-post-panel.php" >
       <i class="fa fa-plus fa-5x"></i>
       <h4>Create Post</h4>
     </a>
   </div>
 </div> 

 <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
  <div class="square__active">
   <a href="index.php" >
     <i class="fa fa-home fa-5x"></i>
     <h4>See Post</h4>
   </a>
 </div>


</div>

<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
 <a data-toggle="modal" data-target="#show__email">
  <div class="square__active">
   <i class="fa fa-envelope-o fa-5x"></i>
   <h4>Send Mail</h4>
 </div>
</a>
</div>

<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
  <div class="square__active">
   <a href="read-users-panel.php" >
     <i class="fa fa-users fa-5x"></i>
     <h4>See Users</h4>
   </a>
 </div>


</div>

<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
  <a data-toggle="modal" data-target="#create__user">
    <div class="square__active">
     <i class="fa fa-user fa-5x"></i>
     <h4>Register User</h4>
   </a>
 </div>


</div>

<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
  <div class="square__active">
   <a href="edit-profile-panel.php" >
     <i class="fa fa-gear fa-5x"></i>
     <h4>Settings</h4>
   </a>
 </div>


</div>


</div>
<!-- /. ROW  --> 
<div class="row text-center pad-top">
  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
    <div class="square__deactive">
     <a href="#" >
       <i class="fa fa-key fa-5x"></i>
       <h4>Admin </h4>
     </a>
   </div>


 </div>

 <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
  <div class="square__deactive">
   <a href="#" >
     <i class="fa fa-clipboard fa-5x"></i>
     <h4>Logs</h4>
   </a>
 </div>


</div>

<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
  <div class="square__deactive">
   <a href="#" >
     <i class="fa fa-comments-o fa-5x"></i>
     <h4>Support</h4>
   </a>
 </div>


</div>


<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
  <div class="square__deactive">
   <a href="#" >
     <i class="fa fa-wechat fa-5x"></i>
     <h4>Live Talk</h4>
   </a>
 </div>


</div>
<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
  <div class="square__deactive">
   <a href="#" >
     <i class="fa fa-bell-o fa-5x"></i>
     <h4>Notifications </h4>
   </a>
 </div>


</div>



<div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
  <div class="square__deactive">
   <a href="blank.html" >
     <i class="fa fa-circle-o-notch fa-5x"></i>
     <h4>Check Data</h4>
   </a>
 </div>


</div> 
</div>   
<!-- /. ROW  -->    

<!-- /. ROW  -->  

<!-- /. ROW  -->  

<!-- /. ROW  -->   
<div class="row">
  <div class="col-lg-12 ">
    <br/>
    <div class="alert alert-success">
     <strong>Grønne ikoner</strong><p>Alle grønne ikoner er aktive links og kan klikkes på</p>
   </div>
   <div class="alert alert-danger">
     <strong>Røde ikoner</strong><p>Alle røde ikoner er inaktive links og kan ikke klikkes på</p>
   </div>
 </div>
</div>
<!-- /. ROW  --> 

<!-- /. PAGE WRAPPER  -->
<!--email modal-->

<div class="modal fade" id="show__email" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
       <?php
       $results = user::read_users(); /*fetching all the users in my read_users method inside my user class which returns me the result after that is declared in $results*/

       ?>
       <form class="form-signin" method="post" action="admin-send-email.php">
        <div class="dropdown">               
          Email to:
          <select class="btn btn-default btn-block dropdown-toggle"name="selected-email">
            <?php 
            foreach($results as $row ){ //looping through them all
              ?>  <option class="form-control" value="<?php echo $row['email'] ?>"> <?php echo $row['username']." - ". $row['email']; }?></option>            
            </select>
          </br></br>
          Message:</br>
          <textarea class="form-control" rows="4" name="text-message"></textarea>

        </br></br>
        <button class="btn btn-sm btn-primary" id="submit" type="submit">Send Email</button>  <!--When clicked the form is submitted and the selected mail get posted to admin-send-email.php-->


      </div>
    </form>


  </div>
</div>
</div>
</div>

<!--User Modal-->

<div class="modal fade" id="create__user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
       
       <form class="form-signin" method="post" action="create-user.php">
        <div class="form-group">
          <label>Username</label>
          <input type="text" class="form-control" name="username_users" placeholder="Username">
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control" name="password_users"  placeholder="Password">
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="email" class="form-control" name="email_users" placeholder="Email">
        </div>
        <button type="submit" class="btn btn-primary">Register User</button>
      </form>
    </div>
  </div>
</div>
</div>


<?php include('include/footer-admin.php') ?>