<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Registration</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
		<link rel="icon" type="image/png" href="images/logo1.png"/>
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
		<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
		<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
		<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
		<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
		<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
		<link rel="stylesheet" type="text/css" href="css/util.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>
	<body>

		<div class="wrapper" style="background-image: url('images/pot.jpg');">
			<div class="inner">
			<div class="text-center">
				<h6><a href="http://localhost:8080/myProject/login.php" class="txt2 hov1"><span><i class="fa fa-arrow-left"></i></span></a></h6>
			</div>
				<div class="image-holder">
				<h3 class="d-flex justify-content-center">User Form</h3>
					<img src="images/poster1.jpg" alt="">
					<strong class="d-flex justify-content-center mt-2" ><a href="admin_reg.php" style="color:purple;font-size:20px">Register as Admin ?</a></strong>
				</div>
	<form  method="post"  action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>">
					
					<div class="row">
						<div class="col-6 wrap-input100 validate-input m-b-20" data-validate="first name">
							<input class="input100" type="text" id="fname" name="fname" placeholder="First name" pattern="[A-Za-z]{3}" required>
                    		<span class="focus-input100"></span>
							
						</div>
						<div class="col-6 wrap-input100 validate-input m-b-20" data-validate="last name">
							<input class="input100" type="text" id="lname" name="lname" placeholder="last name" pattern="[A-Za-z]{3}" required>
                    		<span class="focus-input100"></span>
							
						</div>
					</div>
					
				<div class="wrap-input100 validate-input m-b-20" data-validate="Enter email id">
					<input class="input100" type="text" id="mail" name="mail" placeholder="Enter email id" pattern="/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/" required />
                    <span class="focus-input100"></span>
					<h6 id="mailCheck" style="color:orange"></h6>
				</div>
					
				<div class="wrap-input100 validate-input m-b-20" data-validate="phone">
							<input class="input100" type="phone" id="phone" name="phone" placeholder="Phone number" pattern="[789][0-9]{9}" required/> 
                    		<span class="focus-input100"></span>
							
				</div>

					<div class="wrap-input100 validate-input m-b-25" data-validate = "password">
						<input class="input100" type="password" id="pass" name="pass" placeholder="password">
                    	<span class="focus-input100"></span>
                    	
					</div>

					<div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
						<input class="input100" type="password" id="Cpass" name="Cpass" placeholder="Confirm password">
                    	<span class="focus-input100"></span>
                    
					</div>

					<div class="login100-form-btn w-100">
							<button type="submit"  class="login100-form-btn" name="reg" >Register</button>
				</div>
				</form>
			</div>
		</div>
		<script>
		$(document).ready(function(){
			$('#mail').keyup(function(){
				if(v_mail())
				{
					$('#mail').css("border","2px solid green");
					$('#mailCheck').html("email validated");
				}
				elseif{
					$('#mail').css("border","2px solid red");
					$('#mailCheck').html("email not valid");
				}
			});
		});

		function v_mail()
		{
			var email=$('#mail').val();
			var reg=/^\w+([-+.']\w)*@\w+([-.]\w+)*\.\w+([-.])\w+)*$/
			if(reg.test(email))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		</script>
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script src="js/main.js"></script>
		
	</body>

</html>


<?php

if(isset($_REQUEST['reg']))
{
        require 'composer_files/autoload.php';
        $mong=new MongoDB\Client("mongodb://localhost:27017");
        $db=$mong->VenueBooking;
        $cll=$db->Users;
    
       if($_POST)                                       
        {
            $ins= array(
                "fname"=>$_REQUEST['fname'],
                "lname"=>$_REQUEST['lname'],
                "mail"=>$_REQUEST['mail'],
                "phone"=>$_REQUEST['phone'],   
                "password"=>$_REQUEST['Cpass'],
            );
            
            if($cll->insertOne($ins))                                   //insert
            {
                $mail=$_REQUEST['mail'];
                $_SESSION['user_session']=$mail;
				//header('Location:http://localhost:8080/myProject/index.php');
				echo "<script>document.location.href='http://localhost:8080/myProject/index.php';</script>";
            }
            else
            {
                echo 'some issue occured';
            }
        }

        else
        {
            echo 'not inserted';
        }
    }
    ?>  