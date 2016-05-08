<?php
include('include/header-admin.php'); 

if(!empty($_POST['username_users']) && !empty($_POST['password_users']) && !empty($_POST['email_users']))
{		
//validate if the current users information meets the specific requirements in the user class
	if(user::validate_username($_POST["username_users"]) && user::validate_password($_POST["password_users"]) && user::validate_email($_POST["email_users"])) 
	{
		//ehen being validated store them in the new variables
		$validated_username = user::validate_username($_POST["username_users"]);
		$validated_email = user::validate_email($_POST["email_users"]);
		$validated_password = user::validate_password($_POST["password_users"]);
 		//Activation key
		$activation_key = sha1(mt_rand(10000, 99999) . time() . $validated_email); //activation key which gets send to email of the newly create user as link
		 //Password_hash
		$hash_userPassword = password_hash($validated_password , PASSWORD_DEFAULT); //decrypt password

		$create_user = user::create_user($validated_username, $hash_userPassword, $validated_email, $activation_key); //insert in database

		$message = "Hi, $validated_username. To activate your account on Sunrise.dk please click here: http://adgrego.dk/activate-user.php?email=$validated_email&activation=$activation_key"; //links which must be entered before the newly created user can become active as a user and admin
            //A activation mail has been send to $validated_email
		$sMessage= rawurlencode($message); //descrypt the message so others can't read
		mail($validated_email ,"Activate your account",rawurldecode($sMessage)); //decrypt when send

		if($create_user == true) //if the user was successfully created display message
			{ ?>
		<div class="container" style="padding-top: 40px">
			<div class="alert alert-success" role="alert" align="center">
				<p>The account was successfully created!</p>
				<p>Consult email <strong><?php echo $validated_email; ?></strong> to activate it</p>
			</div>
		</div>
		<?php } else{ ?>
		<div class="container" style="padding-top: 40px">
			<div class="alert alert-danger" role="alert" align="center">
				<p>Username and email already exist</p>
			</div>
		</div>
		<?php }
        }

    } else {
    	?>
    	<div class="container" style="padding-top: 40px">
    		<div class="alert alert-danger" role="alert" align="center">
    			<p>Please fill in the fields!</p>
    		</div>
    	</div>
    	<?php }


    	include('include/footer-admin.php');
    	?>