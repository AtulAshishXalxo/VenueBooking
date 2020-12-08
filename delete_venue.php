<?php
            session_start();
            if(!isset($_SESSION['user_session']))
            {
              header('Location:login.php');
            }


            if(isset($_POST['del']))
            {
                  $id=$_REQUEST['v_id'];
                  $user=$_SESSION['user_session'];
                  $bulk = new MongoDB\Driver\BulkWrite;
                  $filters=['ow_mail'=>$user,'v_id'=>$id];
                  $options=[];
                  $mongo=new MongoDB\Driver\Manager("mongodb://localhost:27017");
                  $bulk->delete($filters, $options);

                  $result = $mongo->executeBulkWrite('VenueBooking.Venue', $bulk);
                  header("Location:admin_venues.php");
                  

             }
             if(isset($_POST['edit']))
            { 
                  header("Location:edit_venue.php");
                  

             }
            
?>

