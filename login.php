<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/logo1.png"/>
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
	
	
	<div class="container-login100" style="background-image: url('img/pexels-asad-photo-maldives-169211.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-40 p-b-30">
			<form class="login100-form validate-form" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" onClick="validation()">

			<div class="container-login100-form-btn">
					<div class="row mr-5 mb-4 ">
						
					</div>
				</div>

				<span class="login100-form-title p-b-37 m-b-5">
					User SignIn
				</span>

				<div class="wrap-input100 validate-input m-b-20" data-validate="Enter email id">
					<input class="input100" type="text" id="mail" name="mail" placeholder="Enter email id">
                    <span class="focus-input100"></span>
					<h6 id="mailCheck" style="color:orange"></h6>
				</div>
				

				<div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
					<input class="input100" type="password" id="pass" name="pass" placeholder="password">
                    <span class="focus-input100"></span>
                    <h6 id="passCheck" style="color:orange"></h6>
				</div>

				<div class="container-login100-form-btn mt-5">
							<button class="login100-form-btn" name="sign" >SignIn</button>
				</div>
				
				<!--
				<div class="text-center p-t-57 p-b-20">
					<span class="txt1">
						Or login with
					</span>
				</div>-->
				<br>

				<div class="text-center">
					<h3><b><a href="http://localhost:8080/myProject/reg.php" class="txt2 hov1">Sign Up</a></b></h3>
				</div>
				<div class="text-center">
					<h6><a href="http://localhost:8080/myProject/forgot.php" class="txt2 hov1">Forgot password!</a></h6>
				</div>
			</form>

			
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
	
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
    
   
if(isset($_REQUEST['sign'])) 
{

			$email=$_REQUEST['mail'];
			$password=$_REQUEST['pass'];
			// 'email'=>$email,'password'=>$password
			$mongo=new MongoDB\Driver\Manager("mongodb://localhost:27017");
			$qry=new MongoDB\Driver\Query(['mail'=>$email]);
			$rows=$mongo->executeQuery("VenueBooking.Users",$qry);

			foreach($rows as $row)
			{
				if($email==$row->mail && $password==$row->password)
				{
							//session_start();
							$_SESSION['user_session']=$email;
							echo "<script>document.location.href='http://localhost:8080/myProject/index.php';</script>";
							//header("Location:reg.php");
				}
				else 
				{
					
				}
				
			}
					$mongo=new MongoDB\Driver\Manager("mongodb://localhost:27017");
					$qry=new MongoDB\Driver\Query(['mail'=>$email]);
					$rows=$mongo->executeQuery("VenueBooking.Admins",$qry);
					foreach($rows as $row)
					{
						if($email==$row->mail && $password==$row->password)
						{
									//session_start();
									$_SESSION['user_session']=$email;
									echo "<script>document.location.href='http://localhost:8080/myProject/admin_home.php';</script>";
									//header("Location:reg.php");
						}
						else
						{
							
							echo "<script>if(confirm('Invalid credentials. Check Again')){document.location.href='http://localhost:8080/myProject/login.php'};</script>";

						}
					}
					//echo "<script>if(confirm('Invalid credentials. Check Again')){document.location.href='http://localhost:8080/myProject/login.php'};</script>";

}
?>