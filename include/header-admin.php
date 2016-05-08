<?php
include 'include/classes/session.php'; //To enter the methods in session.php i must first include the file
session::start(); //method start() is being called and the session has started
session::security(); //checks if the session_id exist and matches the current users session users id if not the you are logged of as user.  
session::admin_role(); //Only the users with $_SESSION['admin_role'] true have the permission to enter the administration area.
include 'include/classes/user.php';
session::set('last_activity', time()); //activity for log purpose
?>

<!DOCTYPE html> <!--Filen header-admin.php er blevet inkluderet i admin-panel.php-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Panel</title>
  <!-- BOOTSTRAP STYLES-->
  <link href="css/bootstrap.css" rel="stylesheet" />
  <!-- FONTAWESOME STYLES-->
  <link href="css/font-awesome.css" rel="stylesheet" />
  <!-- CUSTOM STYLES-->
  <link href="css/admin-panel.css" rel="stylesheet" />
  <!-- GOOGLE FONTS-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>

  <div id="wrapper">
   <div class="navbar navbar-inverse navbar-fixed-top">

    <div class="adjust-nav">
      <?php 
      $results = user::read_user($_SESSION['column1']) //Show your username i navbar 
      ?>
      <a href="edit-profile-panel.php">
        <img src= <?php echo $results['column2'] ?> class="navbar__picture"> <!--Your profile picture-->
      </a>
      
      <a href="logout.php"><span class="logout-spn fa fa-sign-out" aria-hidden="true">Logout</span></a>  

      
    </div>
  </div>
  <nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
      <ul class="nav" id="main-menu">



        <li class="active-link">
          <a href="admin-panel.php" ><i class="fa fa-desktop "></i>Dashboard</a>
        </li>

      </ul>
    </div>

  </nav>
  <div id="page-wrapper" >
    <div id="page-inner">

      <div class="row">
        <div class="col-lg-12">
         <h2>ADMIN DASHBOARD</h2>   
       </div>
     </div>              
     <!-- /. ROW  -->
     <hr />
     <div class="row">
      <div class="col-lg-12 ">
        <div class="alert alert-info">
         Welcome <strong><?php echo $_SESSION["username"] ?></strong> to your admin dashboard.
       </div>

     </div>
   </div>