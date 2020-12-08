<?php

session_start();

if(!isset($_SESSION['user_session']))
{

  header('Location:login.php');
}



  if(isset($_GET['ad_mail']))
  {
      $ad_email=$_GET['ad_mail'];
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
    <li class="nav-item">
        <a class="nav-link " href="admin_home.php">Home</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="http://localhost:8080/myProject/admin_upload.php">Add Venue <span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item active">
        <a class="nav-link " href="http://localhost:8080/myProject/admin_venues.php">My Venues<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="http://localhost:8080/myProject/logout.php">Logout </a>
      </li>
  </div>
</nav>
<section id="hero">
    <div class="hero-container" data-aos="fade-up">
      </div>   
        <div>
         <h1>My Venues</h1>  
        </div>
        <div class="gallary">
 
  
  <!-- fetching data -->

  <div class=" " style="margin-top:100px">
  <div class="row m-5">
      <?php 

          $user=$_SESSION['user_session'];
          require 'composer_files/autoload.php';
          $mong=new MongoDB\Client("mongodb://localhost:27017");
          $db=$mong->VenueBooking;
          $mObj=$db->Venue->find(['ow_mail'=>$user]);

            foreach($mObj as $row)
            {
                //if($ad_email=$row->ow_mail)
                {
                ?>
                
                 <div class="col-md-4 mb-5">
                
                 <div class="card" style="width:350px; ">
                     <div class="inner">
                        <img style="position:relative" src="data:jpeg;base64,<?=base64_encode($row->v_image->getData())?>" height="200px" width="100%"/>
                   
                      </div>
                     <div class="card-body" >
                         <h4 class="card-title "> <b><?php echo $row['venue_name'];?></b></h4>
                         <p class="card-test"> </p><span><p> &#x20B9; &nbsp; <?php echo $row['charge'];?> </p></span>
                         
                            <p> <?php echo $row['descrip'];?> </p>
                      
                     </div>

                    <div>
                       <form method="POST" action="delete_venue.php">
                        <input type="hidden" name="v_id" value="<?php echo $row['v_id'];?>">
                        <button type="submit" name="del"  style="color:white;width:340px" class="btn btn-warning p-2 m-1" >Delete<i class="fa fa-trash"></i></button>
                      </form>
                        <form method="POST" action="edit_venue.php">
                                <input type="hidden" name="v_id" value="<?php echo $row['v_id'];?>">
                             <button  type="submit" name="ed" style="color:white;width:340px" class="btn btn-primary p-2 m-1">Edit<i class="fa fa-sticky-note"></i></button>
                             </form>
                    </div>

                 </div>
                 
             </div>

                <?php
                }
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

if(isset($_POST['del']))
{
            $v_mail=$_POST['ow_mail'];
            $v_id=$_POST['v_id'];
           echo "<script>{document.location.href='http://localhost:8080/myProject/delete_venue.php?mail=".$v_mail."&v_id=".$v_id."'};</script>";
           
}
if(isset($_POST['up']))
{
            $v_mail=$_POST['ow_mail'];
            $v_id=$_POST['v_id'];
           echo "<script>{document.location.href='http://localhost:8080/myProject/edit_venue.php?mail=".$v_mail."&v_id=".$v_id."'};</script>";
           
}
?>