<?php
    session_start();
    if(!isset($_SESSION['user_session']))
  {

    header('Location:login.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>New Password</title>
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
	
	
	<div class="container-login100" style="background-image: url('img/pexels-asad-photo-maldives-169190.jpg');background-repeat:no-repeat">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-40 p-b-30">
			<form class="login100-form validate-form" method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" onClick="validation()">

			<div class="container-login100-form-btn">
					<div class="row mr-5 mb-4 ">
						
					</div>
				</div>

				<span class="login100-form-title p-b-37 m-b-5">
										New Password
				</span>


				<div class="wrap-input100 validate-input m-b-20" data-validate="new password">
					<input class="input100" type="password" id="new_pass" name="new_pass" placeholder="new password">
                    <span class="focus-input100"></span>
					<h6 id="mailCheck" style="color:orange"></h6>
				</div>
				

				<div class="wrap-input100 validate-input m-b-25" data-validate = "confirm password">
					<input class="input100" type="password" id="c_pass" name="c_pass" placeholder="confirm password">
                    <span class="focus-input100"></span>
                    <h6 id="passCheck" style="color:orange"></h6>
				</div>

				<div class="container-login100-form-btn mt-5">
							<button type="submit" class="login100-form-btn" name="go" >SignIn</button>
                </div>
                <br>
				<div class="text-center">
					<h6><a href="http://localhost:8080/myProject/logout.php" class="txt2 hov1">Cancel</a></h6>
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
    
$type=$_GET['type'];
$email=$_GET['mail'];
$user=$_SESSION['user_session'];

if(isset($_POST['go'])) 
{
    //echo "<script>if(confirm('this is main')){document.location.href='';}</script>";
   
            
                $mongo=new MongoDB\Driver\Manager("mongodb://localhost:27017");
                $qry=new MongoDB\Driver\Query([]);
                $rows=$mongo->executeQuery("VenueBooking.Users",$qry);
                $password=$_POST['c_pass'];
                foreach($rows as $row)
                {
                    
                    
                                //session_start();
                                //header("Location:reg.php");
                                $password=$_POST['c_pass'];
                                $mongo=new MongoDB\Driver\Manager("mongodb://localhost:27017"); 
                                $bulk = new MongoDB\Driver\BulkWrite;
                                $bulk->update(
                                                ['mail'=>$user],
                                                ['$set' => ['password' => $password]]
                                            );

                               if($result = $mongo->executeBulkWrite('VenueBooking.Users', $bulk))
                               {
                                    //$_SESSION['user_session']=$user;
                                    echo "<script>if(confirm('Password changed, try loging in.')){document.location.href='http://localhost:8080/myProject/logout.php'};</script>";

                               }
                                
                }
                
            
               // echo "<script>if(confirm('this is admin')){document.location.href='';}</script>";
               echo $email;
                $mongo=new MongoDB\Driver\Manager("mongodb://localhost:27017");
                $qry=new MongoDB\Driver\Query([]);
                $rows=$mongo->executeQuery("VenueBooking.Admins",$qry);
                $password=$_POST['c_pass'];
                foreach($rows as $row)
                {
                    
                        
                                //session_start();
                                //header("Location:reg.php");
                                $password=$_REQUEST['c_pass'];
                                $mongo=new MongoDB\Driver\Manager("mongodb://localhost:27017"); 
                                $bulk = new MongoDB\Driver\BulkWrite;
                                $bulk->update(
                                                ['mail'=>$user],
                                                ['$set' => ['password' => $password]]
                                            );

                                if($result = $mongo->executeBulkWrite('VenueBooking.Admins', $bulk))
                                {
                                    //$_SESSION['user_session']=$user;
                                    
                                    echo "<script>if(confirm('Password changed, try loging in.')){document.location.href='http://localhost:8080/myProject/logout.php'};</script>";

                                }
                            
                               
                }
            
                        

                        
			
}
?>