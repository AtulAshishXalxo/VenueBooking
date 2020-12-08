<?php
 session_start();

 if(!isset($_SESSION['user_session']))
 {
   header('Location:login.php');
 }
        $result="";
    
        $id  = $_GET['id'];
        
        $manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
        $delRec = new MongoDB\Driver\BulkWrite;
        $delRec->delete(['v_id' =>$id,'mail' => $_SESSION['user_session']], ['limit' => 1]);
        $writeConcern = new MongoDB\Driver\WriteConcern(MongoDB\Driver\WriteConcern::MAJORITY, 1000);
        $result = $manager->executeBulkWrite('VenueBooking.Booking', $delRec, $writeConcern);					
        if($result)
        {
            echo "<script>alert('Successfully product deleted!');</script>";
            header('Location:');
        }
        else
        {
            echo "<script>alert('Sorry, something went wrong.');</script>";
        }

?>