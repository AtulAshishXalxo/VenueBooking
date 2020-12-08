<?php

  session_start();
  if(!isset($_SESSION['user_session']))
  {
    
    header('Location:login.php');
  }

   if(isset($_GET['date']))
    {
              $date=$_GET['date'];
              $v_name=$_GET['v_name'];
              require 'composer_files/autoload.php';
              $mong=new MongoDB\Client("mongodb://localhost:27017");
              $db=$mong->VenueBooking;
              $mObj=$db->Booking->find();
              foreach($mObj as $row)
              {
                if($row['date']==$date && $row['v_name']==$v_name)
                {
                  echo "<script>if(confirm('Date is already booked. Check other venues for same date')){document.location.href='http://localhost:8080/myProject/venues.php'};</script>";
                  }
                
              }
    }
/* 
    if(isset($_GET['submit']))
    {
        
        require 'composer_files/autoload.php';
        $mong=new MongoDB\Client("mongodb://localhost:27017");
        $db=$mong->VenueBooking;
        $cll=$db->Booking;
        if($_GET)                                       
        {
            $ins= array(
                "name"=>$_REQUEST['name'],
                "mail"=>$_REQUEST['mail'],
                "phone"=>$_REQUEST['phone'],
                "B_date"=>$_REQUEST['bdate']
            );
            
            if($cll->insertOne($ins))                                   //insert
            {
                echo "<script>if(confirm('Venue booked')){document.location.href='http://localhost:8080/myProject/payment.php'};</script>";
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
    }*/
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book</title>
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
</head>
<body style="background-image:url('img/pexels-edward-eyer-1045541.jpg');">
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
                <a class="nav-link" href="index.php">Home</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="http://localhost:8080/myProject/venues.php">Venues</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="http://localhost:8080/myProject/my_venue.php">My Venues<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
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


</div>

</nav>
<!--/.Navbar-->


<div class="container mt-3 mb-5 " >
    <form action="" method="GET">
        <h1 class="text-center">Booking venue for : &nbsp; <?php echo date('d F Y',strtotime($date));?></h1>
        <div class="row mt-5 ">
            <div class="col-md-6 col-md-offset-3 " style="width:400px;">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="">Name</label>&nbsp;&nbsp; 
                        <input type="text" class="form-control" name="name">
                    </div>  
                    <div class="form-group">
                        <!--<label for="">Email</label>-->
                        <input type="hidden" class="form-control" name="mail" value="<?php echo $_SESSION['user_session'];?>">
                    </div>
                    <div class="form-group">
                        <label for="">Phone Number</label>&nbsp;&nbsp;  
                        <input type="text" class="form-control" name="phone">
                    </div>
                    
                    <input type="hidden" name="bdate" value="<?php echo date('m/d/Y',strtotime($date));?>">
                    <input type="hidden" name="v_name" value="<?php echo $_GET['v_name'];?>">
                    <input type="hidden" name="charge" value="<?php echo $_GET['charge'];?>">
                    <input type="hidden" name="v_id" value="<?php echo $_GET['v_id'];?>">
                    <button type="submit" name="submit" class="btn btn-warning">submit</button>
                </form>
            </div>
        </div>
    </div>

    <?php
    
    
        if(isset($_GET['submit']))
        {
            
            $name=$_GET['name'];
            $email=$_GET['mail'];
            $phone=$_GET['phone'];
            $date=$_GET['bdate'];
            $v_name=$_GET['v_name'];
            $charge=$_GET['charge'];
            $v_id=$_GET['v_id'];
           echo "<script>if(confirm('complete payment to book your venue.')){document.location.href='http://localhost:8080/myProject/payment.php?name=".$name."&mail=".$email."&phone=".$phone."&date=".$date."&v_name=".$v_name."&charge=".$charge."&v_id=".$v_id."'};</script>";
               
        }
    ?>




<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>