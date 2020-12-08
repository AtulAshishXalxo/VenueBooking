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
    <title>Home</title>
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
  <!--font-->
</head>
<body >
   
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand " style=""href="#">VenueBooking</a>
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
                <a class="nav-link" href="#intro">Home</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="http://localhost:8080/myProject/venues.php">Venues</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#best-features">Services</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#examples">Our Gallery</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#gallery">About</a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="http://localhost:8080/myProject/logout.php">Logout </a>
            </li>
  </div>
</nav>
<!-- poster -->
   <!--Navbar-->
   <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar" style="border: 0; box-shadow: none;">

<div class="container">

  
    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
        aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="basicExampleNav">

        <!-- Links 
        <ul class="navbar-nav ml-auto smooth-scroll  font-weight-bold">
            <li class="nav-item">
                <a class="nav-link" href="#intro">Home</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="http://localhost:8080/myProject/venues.php">Venues</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#best-features">Services</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#examples">Our Gallery</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#gallery">About</a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="http://localhost:8080/myProject/logout.php">Logout </a>
            </li>

        </ul>
        <!-- Links -->

        <!-- Social Icon  -->
        
    </div>
    <!-- Collapsible content -->

</div>

</nav>
<!--/.Navbar-->

<!--Mask-->
<section id="hero">
    <div class="hero-container" data-aos="fade-up">
        <h1>
            Welcome
        </h1>
        <h3 class="text-white"><b>To</b></h3>
      <h1>
         <!-- <span class="text-warning">Our</span>
         <span class="text-success">Happy</span>-->
         <span class="text-white" style="color:purple">  VenueBooking </span>
        </h1>
      <h2 class="text-white">Get Your Best Venue </h2>
      
      <a href="#best-features" class="btn-get-started scrollto text-warning"><i class="bx bx-chevrons-down text-warning"></i></a>
    </div>
  </section>
<!--/.Mask-->

</header>
<main class="mt-5">
<div class="container">

<!--Section: Best Features-->
<section id="best-features" class="text-center pt-5">

    <!-- Heading -->
    <h2 class="mb-5 font-weight-bold mt-5">Our Services</h2>


    <!--Grid row-->
    <div class="row">

        <!--Grid column-->
        <div class="col-md-3 mb-5">
            
            <i class="fas fa-envelope fa-4x orange-text"></i>
            <h4 class="my-4 font-weight-bold">Invitation</h4>
            <p class="black-text">Create an appealing email invitation with your own design or use a template. Build trust and engagement by using your own brand.</p>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-3 mb-1">
           
            <i class="fas fa-award fa-4x orange-text"></i>
            <h4 class="my-4 font-weight-bold">Decoration</h4>
            <p class="black-text">Get rid of replies through mail and get nicer reports of attendees. Create dynamic reply forms and get just the answers you need.</p>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-3 mb-1">
            
            <i class="fas fa-heart fa-4x orange-text"></i>
            <h4 class="my-4 font-weight-bold">Catering</h4>
            <p class="black-text">Built with the user in focus. Easy to get started and to customize. Memlin is helping you get organized on your projects</p>
        </div>
        <!--Grid column-->
        <div class="col-md-3 mb-1">
            
            
            <i class="fas fa-smile-wink fa-4x orange-text"></i>
            <h4 class="my-4 font-weight-bold">Photoshoot</h4>
            <p class="black-text">We are available and reply quickly. We work hard to keep high customer satisfaction.</p>
        </div>
        
    </div>
    <!--Grid row-->

</section>
<!--Section: Best Features-->


<!--Section: Examples-->
<section id="examples" class="text-center">

    <!-- Heading -->
    <h2 class="mb-5 font-weight-bold">Our Gallery</h2>

    <!--Grid row-->
    <div class="row justify-content-center">

        <div class=" col-md-4 view overlay zoom">
            <img src="./img/pexels-asad-photo-maldives-169189.jpg" class="img-fluid " alt="smaple image" style="width: 350px; height: 300px;">
            <div class="mask flex-center">
               <!-- <p class="lead black-text font-weight-bold">Click to book</p>-->
            </div>
        </div>
        <div class=" col-md-4 view overlay zoom">
            <img src="./img/pexels-asad-photo-maldives-169190.jpg" class="img-fluid " alt="smaple image" style="width: 350px; height: 300px;">
            <div class="mask flex-center">
               <!-- <p class="lead black-text font-weight-bold">Click to book</p>-->
            </div>
        </div>
        <div class=" col-md-4 view overlay zoom">
            <img src="./img/pexels-asad-photo-maldives-169211.jpg" class="img-fluid " alt="smaple image" style="width: 350px; height: 300px;">
            <div class="mask flex-center">
               <!-- <p class="lead black-text font-weight-bold">Click to book</p>-->
            </div>
        </div>
        <div class=" col-md-4 view overlay zoom mt-5">
            <img src="./img/pexels-edward-eyer-1045541.jpg" class="img-fluid " alt="smaple image" style="width: 350px; height: 300px;">
            <div class="mask flex-center">
               <!-- <p class="lead black-text font-weight-bold">Click to book</p>-->
            </div>
        </div>
        <div class=" col-md-4 view overlay zoom mt-5">
            <img src="./img/pexels-mike-little-2140980.jpg" class="img-fluid " alt="smaple image" style="width: 350px; height: 300px;">
            <div class="mask flex-center">
               <!-- <p class="lead black-text font-weight-bold">Click to book</p>-->
            </div>
        </div>
        <div class=" col-md-4 view overlay zoom mt-5">
            <img src="./img/pexels-pixabay-265920.jpg" class="img-fluid " alt="smaple image" style="width: 350px; height: 300px;">
            <div class="mask flex-center">
               <!-- <p class="lead black-text font-weight-bold">Click to book</p>-->
            </div>
        </div>
        <button class="btn  mt-5" style="padding:1px;width:500px;background-color:orange"><a class="nav-link" href="http://localhost:8080/myProject/venues.php" style="color:white">Click to book your venue</a></button>
   </section>
 
<!--Section: Examples-->

<!--Section: Gallery-->
<section id="gallery">

    <!-- Heading -->
    <h2 class="mb-5  display-4 font-weight-bold text-center">About Us</h2>

    <!--Grid row-->
    <div class="row">

        <!--Grid column-->
        <div class="col-md-6 mb-4">

            <!--Carousel Wrapper-->
            <div id="carousel-example-1z" class="carousel slide carousel-fade carousel-fade" data-ride="carousel">
                <!--Indicators-->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-1z" data-slide-to="1"></li>
                    <li data-target="#carousel-example-1z" data-slide-to="2"></li>
                </ol>
                <!--/.Indicators-->
                <!--Slides-->
                <div class="carousel-inner z-depth-1-half" role="listbox">
                    <!--First slide-->
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="./img/engagement-wedding-party-hall-decoration-picture-every-imaginable-venue-one-wonderful-engagement-124012542.jpg"
                            alt="First slide" >
                    </div>
                    <!--/First slide-->
                    <!--Second slide-->
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./img/abby-savage-zNsSwsuyP3A-unsplash (1).jpg"
                            alt="Second slide">
                    </div>
                    <!--/Second slide-->
                    <!--Third slide-->
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./img/dave-lastovskiy-RygIdTavhkQ-unsplash.jpg"
                            alt="Third slide">
                    </div>
                    <!--/Third slide-->
                </div>
                <!--/.Slides-->
                <!--Controls-->
                <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                <!--/.Controls-->
            </div>
            <!--/.Carousel Wrapper-->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-6">

            <!--Excerpt-->
            <a href="" class="teal-text">
                <h6 class="pb-1"><i class="fa fa-heart"></i><strong> About </strong></h6>
            </a>
            <h4 class="mb-3"><strong>This is title of the news</strong></h4>
            <p>Venue booking system is a web application in which dealers and customers can add and book the events based on their location, availability, and area. This makes the workload simple for users to book an event they need to search for it. In this application, the user needs to be registered and log in to log in the user will search for venues by giving the location if the venues were present in the particular location.</p>

            
            <p>by <a><strong>Atul Ashish Xalxo</strong></a>, 27/11/2020</p>
           <!-- <a class="btn btn-primary btn-md">Read more</a>

        </div>
        <!--Grid column-->

    </div>
    <!--Grid row-->

</section>
<!--Section: Gallery

<hr class="my-5">

<!--Section: Contact
<section id="contact">

    <!-- Heading -->
    <!--<h2 class="mb-5 font-weight-bold text-center">Contact us</h2>

    <!--Grid row
    <div class="row">

        <!--Grid column
        <div class="col-lg-5 col-md-12">
            <!-- Form contact 
            <form class="p-5 grey-text">
                <div class="md-form form-sm"> <i class="fa fa-user prefix"></i>
                    <input type="text" id="form3" class="form-control form-control-sm">
                    <label for="form3">Your name</label>
                </div>
                <div class="md-form form-sm"> <i class="fa fa-envelope prefix"></i>
                    <input type="text" id="form2" class="form-control form-control-sm">
                    <label for="form2">Your email</label>
                </div>
                <div class="md-form form-sm"> <i class="fa fa-tag prefix"></i>
                    <input type="text" id="form32" class="form-control form-control-sm">
                    <label for="form34">Subject</label>
                </div>
                <div class="md-form form-sm"> <i class="fa fa-pencil prefix"></i>
                    <textarea type="text" id="form8" class="md-textarea form-control form-control-sm" rows="4"></textarea>
                    <label for="form8">Your message</label>
                </div>
                <div class="text-center mt-4">
                    <button class="btn btn-outline-primary">Send <i class="fa fa-paper-plane-o "></i></button>
                </div>
            </form>
            <!-- Form contact 
        </div>-->
        <!--Grid column-->

        <!--Grid column
        <div class="col-lg-7 col-md-12">

            <!--Grid row
            <div class="row text-center">

                <!--Grid column
                <div class="col-lg-4 col-md-12 mb-3">

                    <p><i class="fa fa-map fa-1x mr-2 grey-text"></i>kristu jayanti college</p>

                </div>
                <!--Grid column-->

                <!--Grid column
                <div class="col-lg-4 col-md-6 mb-3">

                    <p><i class="fa fa-building fa-1x mr-2 grey-text"></i>Mon - Fri, 8:00-22:00</p>

                </div>
                <!--Grid column-->

                <!--Grid column
                <div class="col-lg-4 col-md-6 mb-3">

                    <p><i class="fa fa-phone fa-1x mr-2 grey-text"></i>91 9986345468</p>

                </div>
                <!--Grid column

            </div>
            <!--Grid row-->

            <!--Google map
            <div class="row row-grid align-items-center my-md">
                <div class="col-lg-12">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3886.6464414959937!2d77.64067241536544!3d13.058162516504815!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae17578c79da7d%3A0xe96dcd8e2b982f8e!2sKristu%20Jayanti%20College%2C%20Autonomous!5e0!3m2!1sen!2sin!4v1581486673150!5m2!1sen!2sin"
                        width="100%" height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>

        </div>
        <!--Grid column

    </div>
    <!--Grid row

</section>
<!--Section: Contact-->

</div>
</main>
<!-- customer -->
<section class="bg-white " id="customers">
<div class="container ">
<div class="row text-center">
<div class="col">
    <h1 class="mb-5">
    <span class="text-warning">Our</span>
         <span class="text-success">Happy</span>
         <span class="text-primary">Customer </span>
    
    </h1>
 </div>
</div> 
<div class="carousel slide" id="carousel1" data-ride="carousel">
    <div class="carousel-inner">
    <div class="carousel-item active">
       <div class="row text-center">
    <div class="col-md-4 animated zoomIn delay-1s">
    <img src="img/person_1.jpg" class="img-fluid rounded-circle w-50">
        <h1> Mery Elizabeth</h1>
        <p>A noster philosophari iis sed elit eiusmod philosophari e deserunt ut tempor, 
           iudicem ad anim cupidatat iis o ubi summis aliqua malis, in fugiat senserit sed 
           excepteur adipisicing est litteris eu commodo nulla eiusmod.</p>
    </div>  
           <div class="col-md-4 animated zoomIn delay-2s">
    <img src="img/person_2.jpg" class="img-fluid rounded-circle w-50">
        <h1> lex griffin</h1>
        <p>A noster philosophari iis sed elit eiusmod philosophari e deserunt ut tempor, 
           iudicem ad anim cupidatat iis o ubi summis aliqua malis, in fugiat senserit sed 
           excepteur adipisicing est litteris eu commodo nulla eiusmod.</p>
    </div>  
           <div class="col-md-4 animated zoomIn delay-3s">
    <img src="img/person_3.jpg" class="img-fluid rounded-circle w-50">
        <h1> amandacerny</h1>
        <p>A noster philosophari iis sed elit eiusmod philosophari e deserunt ut tempor, 
           iudicem ad anim cupidatat iis o ubi summis aliqua malis, in fugiat senserit sed 
           excepteur adipisicing est litteris eu commodo nulla eiusmod.</p>
    </div>  
        </div>
    </div>
         <div class="carousel-item ">
       <div class="row text-center">
    <div class="col-md-4 animated zoomIn delay-1s">
    <img src="img/person_1.jpg" class="img-fluid rounded-circle w-50">
        <h1> Mery joseph</h1>
        <p>A noster philosophari iis sed elit eiusmod philosophari e deserunt ut tempor, 
           iudicem ad anim cupidatat iis o ubi summis aliqua malis, in fugiat senserit sed 
           excepteur adipisicing est litteris eu commodo nulla eiusmod.</p>
    </div>  
           <div class="col-md-4 animated zoomIn delay-2s">
    <img src="img/person_2.jpg" class="img-fluid rounded-circle w-50">
        <h1> Lazarus Angelo</h1>
        <p>A noster philosophari iis sed elit eiusmod philosophari e deserunt ut tempor, 
           iudicem ad anim cupidatat iis o ubi summis aliqua malis, in fugiat senserit sed 
           excepteur adipisicing est litteris eu commodo nulla eiusmod.</p>
    </div>  
           <div class="col-md-4 animated zoomIn delay-3s">
    <img src="img/person_3.jpg" class="img-fluid rounded-circle w-50">
        <h1> anlina sagra</h1>
        <p>A noster philosophari iis sed elit eiusmod philosophari e deserunt ut tempor, 
           iudicem ad anim cupidatat iis o ubi summis aliqua malis, in fugiat senserit sed 
           excepteur adipisicing est litteris eu commodo nulla eiusmod.</p>
    </div>  
        </div>
    </div>
         
    <a class="carousel-control-prev" href="#carousel1" role="button" data-slide="prev">
<span class="carousel-control-prev-icon" aria-hidden="true"></span>
<span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carousel1" role="button" data-slide="next">
<span class="carousel-control-next-icon" aria-hidden="true"></span>
<span class="sr-only">Next</span>
</a>    
    </div>
</div>
</div>
</section>

<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  
  
  <!-- The slideshow -->
  <div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/hall2.jpg" alt="" width="100%" height="700">
      <div class="carousel-caption">
        <!--<h1>	Welcome to VenueBooking<?php echo $_SESSION['user_session'];?></h1>
        <p>Book your venue</p>-->
      </div>   
    </div>
    <div class="carousel-item">
      <img src="img/beach-wedding.jpg" alt="" width="100%" height="700">
      <div class="carousel-caption">
        <h3></h3>
        <p></p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="img/bgd.jpg" alt="" width="100%" height="700">
      <div class="carousel-caption">
        <h3></h3>
        <p></p>
      </div>   
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

	<!-- start footer Area -->
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
  
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="./js/jquery.min.js"></script>
<script src="./js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/mdb.min.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>
</html>