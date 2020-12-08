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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" type="text/css" href="css/venues.css">

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
  <link rel="icon" type="image/png" href="images/logo1.png"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/venues.css">
  
  <link rel="stylesheet" type="text/css" href="css/venues.css">

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
<link rel="stylesheet" href="boostrap/mdb.min.css">
    <link rel="stylesheet" href="boostrap/style1.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

    <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style3.css" rel="stylesheet">
    
    <title>Venues</title>
</head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">VenueBooking</a>
  <li class="nav-item active">
        <a class="nav-link" href="#"><?php 
        
        $mongo=new MongoDB\Driver\Manager("mongodb://localhost:27017");
		  	$qry=new MongoDB\Driver\Query([]);
			  $rows=$mongo->executeQuery("VenueBooking.Users",$qry);

        foreach($rows as $row)
        {
          if($_SESSION['user_session']==$row->mail )
          {
              $nm=$row->fname;
              echo $row->fname;
          }
        }
        ?></a>
      </li>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="http://localhost:8080/myProject/index.php">Home</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost:8080/myProject/venues.php">Venues</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link " href="http://localhost:8080/myProject/my_venue.php">My Venues<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="http://localhost:8080/myProject/login.php">Logout</a>
      </li>
  </div>
</nav>
    <!--Mask-->
<section id="hero">
    <div class="hero-container" data-aos="fade-up">
   </div>  
        <div class="mt-5 mb-5">
         <h1>My Venues</h1>  
        </div>
    <div class=" " style="margin-top:100px">
  <div class="row m-5 ">
              <?php 
              $user=$_SESSION['user_session'];
              require 'composer_files/autoload.php';
              $mong=new MongoDB\Client("mongodb://localhost:27017");
              $db=$mong->VenueBooking;
              $mObj=$db->Booking->find(['mail'=>$user]);
    
                foreach($mObj as $row)
                {
                  ?>
                    <div class="row-md-4 mt-5">
                        <div class="card" style="width:100%;">
                              <div class="row m-5">
                                      <div class="col-7">
                                              <div class="">
                                                <form method="POST" action="clear_venue.php">
                                                    <h4 class="card-title"><strong>Venue Name:</strong> <?php echo $row['v_name'];?></h4>
                                                    <h4 class="card-title"><strong>Charge :&nbsp;</strong>&#x20B9; <span class="" style="color:black"> <?php echo $row['charge'];?></span></h4>
                                                    <h4 class="card-title"><strong>Booking Date :</strong> <?php echo $row['date'];?></h4>
                                                    <div>
                                                    <input type="hidden" name="id" value="<?php echo $row['v_id'];?>">
                                                    <input type="hidden" name="da" value="<?php echo $row['date'];?>">
                                                         <button type="submit"  class="btn btn-warning mt-5" style="width:370px;color:white" name="clr">Clear</button>
                                                        
                                                    </div>
                                                    </form>  
                                                    <form method="POST" action="report.php">
                                                        <input type="hidden" name="id" value="<?php echo $row['v_id'];?>">
                                                        <input type="hidden" name="da" value="<?php echo $row['date'];?>">
                                                        <button type="submit" class="btn btn-primary " style="width:370px;color:white" name="more">More</button>
                                                    </form> 
                                              </div>
                                      </div>
                                        <div class="col-5">
                                              <div class="inner">
                                               <?php
                                                    $id=$row['v_id'];
                                                    require 'composer_files/autoload.php';
                                                    $mong=new MongoDB\Client("mongodb://localhost:27017");
                                                    $db=$mong->VenueBooking;
                                                    $mObj=$db->Venue->find(['v_id'=>$id]);

                                                      foreach($mObj as $row)
                                                      {
                                                        ?>
                                                      <img src="data:jpeg;base64,<?=base64_encode($row->v_image->getData())?>" height="270px" width="100%"/>
                                                      
                                                 <?php  } ?>
                                              </div>
                                        </div>
                                        
                              </div>
                        </div>
                    </div>

                  <?php
            }
            
               ?>
      
      </div>
  </div>
</div>
  <!-- fetching data ends-->
 
  <footer class="footer-area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-3  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>About Us</h6>
						<p>
							Right place for your businesses to grow with verified product suppliers. 
						</p>
					</div>
				</div>
				<div class="col-lg-4  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>Newsletter</h6>
						<p>Stay update with our latest updates</p>
						<div class="" id="mc_embed_signup">

						</div>
					</div>
				</div>
				<div class="col-lg-3  col-md-6 col-sm-6">
					<div class="single-footer-widget mail-chimp">
						<h6 class="mb-20">Instragram Feed</h6>
						<p>Follow us in instagram to get the latest updates of your favorite brands.</p>
					</div>
				</div>
				<div class="col-lg-2 col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>Follow Us</h6>
						<p>Let us be social</p>
						<div class="footer-social d-flex align-items-center">
							<a href="https://www.facebook.com/pages/category/Amateur-Sports-Team/CLUB-10-Sports-1021053097973122/"><i class="fa fa-facebook"></i></a>
							<a href="https://www.facebook.com/pages/category/Amateur-Sports-Team/CLUB-10-Sports-1021053097973122/"><i class="fa fa-instagram"></i></a>
						</div>
					</div>
				</div>
			</div>
			
			<div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
				<p class="footer-text m-0">
Copyright &copy;<script>document.write(new Date().getFullYear());</script> This website is created <i class="fa fa-heart-o" style="color:coral" aria-hidden="true"></i> by <a href="#" target="_blank" style="color:coral">Atul Ashish Xalxo </a>

</p>
			</div>
		</div>
	</footer>
  </section>  
  
   
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
<?php
  if(isset($_POST['clear']))
  {
      $id=$_REQUEST['id'];
      echo "<script>document.location.href='delete_venue.php?id=".$id."'</script>";
  }
  if(isset($_POST['more']))
  { 

  }
?>