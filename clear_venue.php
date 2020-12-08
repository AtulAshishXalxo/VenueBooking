<?php
            session_start();
            if(!isset($_SESSION['user_session']))
            {
              header('Location:login.php');
            }


            if(isset($_POST['clr']))
            {
                  $id=$_REQUEST['id'];
                  $da=$_REQUEST['da'];
                  $bulk = new MongoDB\Driver\BulkWrite;
                  $filters=['date' => $da,'v_id'=>$id];
                  $options=[];
                  $mongo=new MongoDB\Driver\Manager("mongodb://localhost:27017");
                  $bulk->delete($filters, $options);

                  $result = $mongo->executeBulkWrite('VenueBooking.Booking', $bulk);
                  header("Location:my_venue.php");
                  

             }
             if(isset($_POST['more']))
            { 
                  header("Location:report.php");
                  

             }
            
?>

