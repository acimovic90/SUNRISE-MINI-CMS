<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    
    
    
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>

        <link rel="stylesheet" href="css/admin-login-form.css">

    
    
    
  </head>

  <body>
<form class="form-signin" form action="admin-check-login.php" method="post">
    <div class="login-form">
     <h1>Sunrise</h1>
     <div class="form-group ">
       <input type="text" class="form-control" name="username" placeholder="Username " id="UserName">
       <i class="fa fa-user"></i>
     </div>
     <div class="form-group log-status">
       <input type="password" class="form-control" name="password" placeholder="Password" id="Password">
       <i class="fa fa-lock"></i>
     </div>
      <span class="alert">Invalid Credentials</span>
      <a class="link" href="#">Lost your password?</a>
     <button type="submit" class="log-btn" >Log in</button>

   </div>
    </form> 
   

  </body>
</html>
