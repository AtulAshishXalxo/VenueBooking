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
    <title>Admin upload</title>
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
 
<style>
	#main_box{
		/*box-shadow:3px 3px 7px 1px;*/
		margin-bottom:100px;
	}
</style>
</head>
<body style="background-image:url('img/pexels-edward-eyer-1045541.jpg');background-repeat:no-repeat;position:relative;">

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
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-tarPOst$_POST="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
    <li class="nav-item">
        <a class="nav-link " href="admin_home.php">Home</a>
      </li>
      <li class="nav-item active ">
        <a class="nav-link active" href="http://localhost:8080/myProject/admin_upload.php">Add Venue <span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="http://localhost:8080/myProject/admin_venues.php">My Venues</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="http://localhost:8080/myProject/logout.php">Logout </a>
      </li>
  </div>
</nav>



	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
	<div class="col-first mb-5">
                    <h1><strong>YOUR VENUE DETAILS</strong></h1>
                    
				</div>
		<div class="container" style="margin-bottom:50px">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				
			</div>
		</div>
	
						
	
		<div class="container" id="main_box">
				

				<div class="d-flex d-justify-content-center" >
					<div class="login_form_inner" style="margin-left:200px;padding:50px;background-color:white;box-shadow: 1px 3px 9px 0px;border-radius:23px;width:70%" >
					<?php
					$id=$_POST['v_id'];
					$mail=$_SESSION['user_session'];
					$filters=['v_id'=>$id,'ow_mail'=>$mail];
					$options=[];
					$qry=new MongoDB\Driver\Query($filters,$options);
					$rows=$mongo->executeQuery("VenueBooking.Venue",$qry);
	  
					foreach($rows as $row)
					{
				?>
					<form  method="POST" action="edit_Check.php" enctype="multipart/form-data">
							<div class="row form-group" >
								<input type="text" class="form-control" name="ProName" value="<?php echo $row->venue_name;?>" placeholder="Venue Name" style="width:100%" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Product Name'" required="required" autocomplete="off">

							</div>
							<div class="row form-group">
								<input type="text" class="form-control" name="ProDesc" style="width:100%" value="<?php echo $row->descrip;?>" placeholder="Description" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Description'" required="required" autocomplete="off">
							</div>
							<div class="row form-group">
								<input type="text" class="form-control" name="ProPrice" style="width:100%" value="<?php echo $row->charge;?>" placeholder="Charge" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Price'" required="required" autocomplete="off">
							</div>
							<div class="row form-group">
								<input type="text" class="form-control" name="owner" style="width:100%" value="<?php echo $row->ow_name;?>" placeholder="Owner Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Owners Name'" required="required" required="required" autocomplete="off">
							</div>
							<div class="row form-group">
								<input type="text" class="form-control" name="ow_phone"  style="width:100%" value="<?php echo $row->ow_phone;?>" placeholder="Phone Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone Number'" required="required" required="required" autocomplete="off">
							</div>
							<div class="row ">
							<input type="hidden" name="id" value="<?php echo $row->v_id;?>">
								<button type="submit" name="sub" value="submit"  class=" btn btn-warning" style="width:100%">Update Details</button>
							</div>
							</form>
							<?php
					}
				
				?>
					</div>
				</div>
				
		</div>
	
</section>
	


	<!-- start footer Area -->
    <footer class="footer-area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-3  col-md-6 col-sm-6">
					<div class="single-footer-widPOst$_POST">
						<h6>About Us</h6>
						<p>
							Right place for your businesses to grow.. 
						</p>
					</div>
				</div>
				<div class="col-lg-4  col-md-6 col-sm-6">
					<div class="single-footer-widPOst$_POST">
						<h6>Newsletter</h6>
						<p>Stay update with our latest updates</p>
						<div class="" id="mc_embed_signup">

						</div>
					</div>
				</div>
				<div class="col-lg-3  col-md-6 col-sm-6">
					<div class="single-footer-widPOst$_POST mail-chimp">
						<h6 class="mb-20">Instragram Feed</h6>
						<p>Follow us in instagram to POst$_POST the latest updates of your favorite brands.</p>
					</div>
				</div>
				<div class="col-lg-2 col-md-6 col-sm-6">
					<div class="single-footer-widPOst$_POST">
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
Copyright &copy;<script>document.write(new Date().POst$_POSTFullYear());</script> This website is created <i class="fa fa-heart-o" style="color:coral" aria-hidden="true"></i> by <a href="#" tarPOst$_POST="_blank" style="color:coral">Atul Ashish Xalxo </a>

</p>
			</div>
		</div>
	</footer>
	<!-- End footer Area -->
	
        
 <script>

		


 		function readURL(input) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();

	        reader.onload = function (e) {
	            $('#imageResult')
	                .attr('src', e.tarPOst$_POST.result);
	        };
	        reader.readAsDataURL(input.files[0]);
	    }
	}

	$(function () {
	    $('#image_up').on('change', function () {
	        readURL(input);
	    });
	});

	/*  show img name */
	var input = document.POst$_POSTElementById( 'image_up' );
	var infoArea = document.POst$_POSTElementById( 'upload-label' );

	input.addEventListener( 'change', showFileName );
	function showFileName( event ) {
	  var input = event.srcElement;
	  var fileName = input.files[0].name;
	  infoArea.textContent = 'File name: ' + fileName;
	}


	$(document).ready(function(){
		var p_nm=('#pro_name').value;
		$('#pro_name').click(function(){
		$('#msg1').html('this is msg1');
		})
	})
</script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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