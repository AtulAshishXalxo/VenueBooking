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
	<title>Venues</title>
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
  <link href="assets/css/style.css" rel="stylesheet">

    
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
        <a class="nav-link" href="http://localhost:8080/myProject/index.php">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link " href="http://localhost:8080/myProject/venues.php">Venues<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="http://localhost:8080/myProject/my_venue.php">My Venues</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="http://localhost:8080/myProject/logout.php">Logout </a>
      </li>
  </div>
</nav>
        
<!--Mask-->
<section id="hero">
    <div class="hero-container" data-aos="fade-up">
      <h1>
         <!-- <span class="text-warning">Our</span>
         <span class="text-success">Happy</span>-->
         <span class="text-warning" style="color:purple">Welcome To VenueBooking </span>
        </h1>
      <h2>Find Your Best location </h2>
   </div>

        <div class="mb-5">
         <h1 >Venues</h1>  
        </div>
        <div class="gallary mb-5">
 
  
  <!-- fetching data -->

  <div class=" " style="margin-top:100px">
  <div class="row m-5">
      <?php 
        
          require 'composer_files/autoload.php';
          $mong=new MongoDB\Client("mongodb://localhost:27017");
          $db=$mong->VenueBooking;
            $mObj=$db->Venue->find();

               foreach($mObj as $row)
               {
                ?>
                
                 <div class="col-md-4 mb-5">
                 <div class="card" style="width:360px; box-shadow:2px 6px 11px 0px;">
                 <form action="" method="POST">
                     <div class="inner">
                        <img class=""style="position:relative" src="data:jpeg;base64,<?=base64_encode($row->v_image->getData())?>" height="200px" width="100%"/>
                        <button style="margin-left:-50px;" type="submit" name="book" class="btn btn-warning" style="background-color:purple;color:white;width:100%">Book <scan><i class="fa fa-table" style="color:white"></i></scan></button>
                    
                      </div>
                     
                    <div class></div>
                     <div class="card-body">
                         <h4 class="card-title"><b> <span class="text-warning" style="color:purple"><?php echo $row['venue_name'];?> </span></b></h4>
                         <p class="card-test"> <b><span class="" style="color:black">&#x20B9;  <?php echo $row['charge'];?> </span></b></p>
                  
                            <p> <?php echo $row['descrip'];?></p>
                        
                     </div>
                     <input type="hidden" name="v_name" value="<?php echo $row['venue_name'];?>">
                     <input type="hidden" name="charge" value="<?php echo $row['charge'];?>">
                     <input type="hidden" name="v_id" value="<?php echo $row['v_id'];?>">

                    
                    </form>
                    <?php
                    
                    
                      if(isset($_POST['book']))
                      {
                        $v_name=$_POST['v_name'];
                        $charge=$_POST['charge'];
                        $v_id=$_POST['v_id'];
                        echo "<script>{document.location.href='http://localhost:8080/myProject/Booking.php?v_name=".$v_name."&charge=".$charge."& v_id=".$v_id."'};</script>";
                     }
                    ?>
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
<!--/.Mask-->
   
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </body>
</html>