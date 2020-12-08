<?php
    
    session_start();
    if(!isset($_SESSION['user_session']))
    {
      
      header('Location:login.php');
    }

    $name=$_GET['name'];
    $mail=$_GET['mail'];
    $phone=$_GET['phone'];
    $B_date=$_GET['date'];
    $v_name=$_GET['v_name'];
    $charge=$_GET['charge'];

?>


<!DOCTYPE html>
<html>
<head>
 <title>
    
    </title> 
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
   
  <body style="background-image:url('img/pexels-edward-eyer-1045541.jpg');background-repeat:no-repeat;">
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
      
      
      <!-- payment section-->
      <div class="container py-5 ">
    <!-- For demo purpose -->
    <div class="row mb-4 ">
        <div class="col-lg-8 mx-auto text-center">
            <h4 class=" text-primary">Complete payment to book</h4>
        </div>
    </div><!-- End -->
     
       
       
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="card ">
                <div class="card-header">
                <!-- End -->
                    <!-- Credit card form content -->
                    <div class="card-body">
                        <div class="row">
                        <div class="col-md-5">
                            <?php 
                                $v_id=$_GET['v_id'];
                                $user=$_SESSION['user_session'];
                                require 'composer_files/autoload.php';
                                $mong=new MongoDB\Client("mongodb://localhost:27017");
                                $db=$mong->VenueBooking;
                                $mObj=$db->Venue->find(['v_id'=>$v_id]);

                                foreach($mObj as $row)
                                {
                            ?>    
                    
                                <img src="data:jpeg;base64,<?=base64_encode($row->v_image->getData())?>" height="140px" width="100%"/>
                    
                           
                            <?php
                             }
                            ?>
                             </div>
                            <div class="col-md-7">
                                                    
                                <div class="form-group">
                                        Venue Name : <input type="text" class="form-control" value="<?php echo $_GET['v_name'];?>"> 
                                    </div>
                                        <div class="form-group">
                                            Venue Charge : <input type="text" class="form-control" value="<?php echo $_GET['charge'];?>"> 
                                    </div>
                                        <div class="form-group">
                                            Booked by : <input type="text" class="form-control" value="<?php echo $_GET['name'];?>"> 
                                    </div>
                                    <div class="form-group">
                                            Email id :<input type="email" class="form-control" value="<?php echo $_SESSION['user_session'];?>"> 
                                    </div>

                                </div>
                          </div>
                    </div>
                    
                 <div class="tab-content">
                        <!-- credit card info-->
                        <div id="credit-card" class="tab-pane fade show active pt-3">
                            <form  method="POST">
                                <div class="form-group"> <label for="username">
                                        <h6>Card Owner</h6>
                                    </label> <input type="text" name="username" placeholder="Card Owner Name" required class="form-control "> </div>
                                <div class="form-group"> <label for="cardNumber">
                                        <h6>Card number</h6>
                                    </label>
                                    <div class="input-group"> <input type="text" name="cardNumber" placeholder="Valid card number" class="form-control " required>
                                        <div class="input-group-append"> <span class="input-group-text text-muted"> <!--<i class="fab fa-cc-visa mx-1"></i> <i class="fab fa-cc-mastercard mx-1"></i> <i class="fab fa-cc-amex mx-1"></i> --></span> </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group"> <label><span class="hidden-xs">
                                                    <h6>Expiration Date</h6>
                                                </span></label>
                                            <div class="input-group"> <input type="number" placeholder="MM" name="" class="form-control" required> <input type="number" placeholder="YY" name="" class="form-control" required> </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group mb-4"> <label data-toggle="tooltip" title="Three digit CV code on the back of your card">
                                                <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                            </label> <input type="text" required class="form-control"> </div>
                                    </div>
                                </div>

                                <input type="hidden" name="name" value="<?php echo $_GET['name'];?>">
                                <input type="hidden" name="mail" value="<?php echo $_GET['mail'];?>">
                                <input type="hidden" name="phone" value="<?php echo $_GET['phone'];?>">
                                <input type="hidden" name="date" value="<?php echo $_GET['date'];?>">
                                <input type="hidden" name="v_name" value="<?php echo $_GET['v_name'];?>">
                                <input type="hidden" name="charge" value="<?php echo $_GET['charge'];?>">
                                <input type="hidden" name="status" value="paid">



                                <button type="submit" class="btn btn-outline-primary btn-block" name="pay">Confirm Payment</button>
                                    <a href="venues.php" class="btn btn-outline-primary btn-block" name="pay">Cancel</a>
                                 </form>
                                
                    </div> <!-- End -->
                    <!-- Paypal info -->
                   
                    <!-- End -->
                </div>
            </div>
        </div>
    </div>
       </div>
    </div>
      
        
     
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
       
    </body>


</html>
<?php
    if(isset($_POST['pay']))
    {

                 
                require 'composer_files/autoload.php';
                $mong=new MongoDB\Client("mongodb://localhost:27017");
                $db=$mong->VenueBooking;
                $cll=$db->Booking;

                if($_POST)
                {
                    $ins= array(
                        "name"=>$_POST['name'],
                        "mail"=>$_POST['mail'],
                        "phone"=>$_POST['phone'],
                        "date"=>$_POST['date'],
                        "v_name"=>$_POST['v_name'],
                        "charge"=>$_POST['charge'],
                        "v_id"=>$_GET['v_id'],
                        "status"=>$_POST['status']
                    );

                    if($cll->insertOne($ins))                                   //insert
                    {
                        echo "<script>if(confirm('Venue booked')){document.location.href='http://localhost:8080/myProject/venues.php'};</script>";
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