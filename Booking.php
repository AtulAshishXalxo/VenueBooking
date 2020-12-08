<?php
 session_start();
 if(!isset($_SESSION['user_session']))
 {
   
   header('Location:login.php');
 }
    function build_calendar($month,$year)
    {

        

       /* $mongo=new MongoDB\Driver\Manager("mongodb://localhost:27017");
        $qry=new MongoDB\Driver\Query([]);
        $rows=$mongo->executeQuery("VenueBooking.Booking",$qry);
        $bookings=array();
        foreach($rows as $row)
        {
           if($month==$row->B_date && $year==$row->B_date)
           {
                $bookings[]=$row['B_date'];
           }
        }*/

        $daysOfWeek=array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
        $firstDayOfMonth=mktime(0,0,0,$month,1,$year); 
        $numberDays=date('t',$firstDayOfMonth);
        $dateComponents=getdate($firstDayOfMonth);
        $monthName=$dateComponents['month'];
        $dayOfWeek=$dateComponents['wday'];
        $dateToday=date('Y-m-d');

        $calendar="<table class='table table-bordered'>";
        $calendar.="<center><h2 style='margin-bottom:30px;'>$monthName $year</h2>";
       /* 
        $calendar.="<a class='btn btn-xs btn-primary' href='?month=".date('m',mktime(0,0,0,$month-1,1,$year))." & year=".date('Y',mktime(0,0,0,$month-1,1,$year))."'>Previous Month</a>";
        $calendar.="<a class='btn btn-xs btn-primary' href='?month=".date('m')." & year=".date('Y')."'>Current Month</a>";
        $calendar.="<a class='btn btn-xs btn-primary' href='?month=".date('m',mktime(0,0,0,$month+1,1,$year))." & year=".date('Y',mktime(0,0,0,$month+1,1,$year))."'>Next Month</a></center><br>";
        */
        $calendar.="<tr>";

        foreach ($daysOfWeek as $day) //calendar header
        {
            $calendar.="<th class='header'>$day</th>";
        }
        $calendar.="</tr><tr>";

        if($dayOfWeek>0)//7 columns for days
        {
            for($k=0;$k<$dayOfWeek;$k++)
            {
                $calendar.="<td></td>";
            }
        }

        $currentDay=1;
        $month=str_pad($month,2,"0",STR_PAD_LEFT);

        while($currentDay<=$numberDays)
        {
            if($dayOfWeek==7)
            {
                $dayOfWeek=0;
                $calendar.="</tr><tr>";
            }

            $v_name=$_GET['v_name'];
            $charge=$_GET['charge'];
            $v_id=$_GET['v_id'];

            $currentDayRel=str_pad($currentDay,2,"0",STR_PAD_LEFT);
            $date="$currentDayRel/$month/$year";

            $dayname=strtolower(date('l',strtotime($date)));
            $evenNum=0;

            $today=$date==date('d/m/Y')?"taday":"";
            if($date<date('d/m/Y'))
            {
                $calendar.="<td><h4>$currentDay</h4><button class='btn btn-danger btn-xs'>N/A</button>";
            }
           /* elseif(in_array($date,$bookings)) ///checking booked date
            {
                $calendar.="<td class='$today'><h4>$currentDay</h4><button class='btn btn-danger btn-xs'>Booked</button>";

            }*/
            else
            {
                $calendar.="<td class='$today'><h4>$currentDay</h4><a href='book.php?date=".$date."&v_name=".$v_name."&charge=".$charge."&v_id=".$v_id."' class='btn btn-success btn-xs'>Book</a>";
            }
            
            $calendar.="</td>";

            $currentDay++;          
            $dayOfWeek++;
        }

        if($dayOfWeek!=7)
        {
            $remainingDays=7-$dayOfWeek;
            for($i=0;$i<$remainingDays;$i++)
            {
                $calendar.="<td></td>";
            }
        }
        
        $calendar.="</tr>";
        $calendar.="</table>";

        echo $calendar;
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking venue</title>
    <link rel="icon" type="image/png" href="images/logo1.png"/>
    
    <link rel="stylesheet" type="text/css" href="css/venues.css">

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
    <style>
        table{
            text-align:center;
            box-shadow:2px 2px 11px 0px;
        }
        th{
            text-align:center;
            background-color:#BA55D3;
            color:white;
        }
    </style>
</head>
<body style="background-image:url('assets/img/bgd.jpg);">

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
      <li class="nav-item">
        <a class="nav-link " href="http://localhost:8080/myProject/my_venue.php">My Venues</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="http://localhost:8080/myProject/login.php">Logout</a>
      </li>
  </div>
</nav>

    <div class="container mt-3 mb-5" >
        <div class="row">
            <div class="col-md-12" >
                <?php
                    $dateComponents=getdate();
                    $month=$dateComponents['mon'];
                    $year=$dateComponents['year'];
                    echo build_calendar($month,$year);
                ?>
            </div>
        </div>
    </div>
    <footer class="footer-area section_gap ">
		<div class="container ">
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

</body>
</html>