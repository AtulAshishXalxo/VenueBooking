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
	<title>Bookings</title>
	<meta charset="UTF-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
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
<link href="assets/css/style2.css" rel="stylesheet">
 
    <title>Bookings</title>
</head>
    <body style="background-image=url()">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">VenueBooking</a>
  <li class="nav-item active">
        <a class="nav-link" href="#"><?php 
        
        $mongo=new MongoDB\Driver\Manager("mongodb://localhost:27017");
		  	$qry=new MongoDB\Driver\Query([]);
			  $rows=$mongo->executeQuery("VenueBooking.Admins",$qry);

        foreach($rows as $row)
        {
          if($_SESSION['user_session']==$row->mail )
          {
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
    <li class="nav-item active">
        <a class="nav-link active" href="#">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="http://localhost:8080/myProject/admin_upload.php">Add Venue <span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="http://localhost:8080/myProject/admin_venues.php">My Venues</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="http://localhost:8080/myProject/logout.php">Logout </a>
      </li>
  </div>
</nav>
<section id="hero">
    <div class="hero-container" data-aos="fade-up">
      </div>
        <div class="mt-5 mb-5">
         <h1>My Bookings</h1>  
        </div>
        <div class="gallary mt-5">
 
  
  <!-- fetching data -->

  <div class="m-5 ">
      <?php 

              $user=$_SESSION['user_session'];
              require 'composer_files/autoload.php';
              $mong=new MongoDB\Client("mongodb://localhost:27017");
              $db=$mong->VenueBooking;
              $mObj=$db->Venue->find(['ow_mail'=>$user]);

                foreach($mObj as $row)
                {
                      
                      $id=$row['v_id'];
                      $mong=new MongoDB\Client("mongodb://localhost:27017");
                      $db=$mong->VenueBooking;
                      $rs=$db->Booking->find(['v_id'=>$id]);
                    
                     foreach($rs as $ro)
                     {
                ?>
                
                 <div class="row-md-4 mb-5 mt-5">
                 <div class="card" style="width:100%; ">
                  <div class="row m-5">
                    <div class="col-7">
                    <div class="p-5">
                         <h4 class="card-title"><strong>Venue Name :</strong> <?php echo $ro['v_name'];?> </h4>
                         <h4 class="card-title"><strong>Venue Charge :</strong> &#x20B9; <?php echo $ro['charge'];?> </h4>
                         <h4 class="card-title"><strong>Venue id :</strong> <?php echo $ro['v_id'];?> </h4>
                         <h4 class="card-title"><strong>Booking Name :</strong> <?php echo $ro['name'];?> </h4>
                         <h4 class="card-title"><strong>Email :</strong> <?php echo $ro['mail'];?> </h4>
                         <h4 class="card-title"><strong>Phone Number :</strong> <?php echo $ro['phone'];?> </h4>
                         <h4 class="card-title"><strong>Booking Date :</strong> <?php echo $ro['date'];?> </h4>
                         <h4 class="card-title"><strong>Booking id :</strong> <?php echo $ro['_id'];?> </h4>
                         <a  class="btn btn-warning mt-5" style="width:60%;color:white" href='delete_venue.php?date="<?php echo $ro['date']."&mail=".$ro['mail']."&id=".$ro['v_id'];?>"'>Clear  <span class="fa fa-trash"></span></a>
                    </div>

                    </div>
                    <div class="col-5">
                    <div class="inner">
                    <img src="data:jpeg;base64,<?=base64_encode($row->v_image->getData())?>" height="250px" width="100%"/>
                     </div>
                    </div>
                  </div>
                 </div>
             </div>

                <?php
                
                
                }
               }
      ?>
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