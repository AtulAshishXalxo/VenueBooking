<?php
if(isset($_POST["sub"]))
{
        

                $id=$_POST['id'];
    
                $name=$_POST['ProName'];
                $pro_dis=$_POST['ProDesc'];
                $pro_price=$_POST['ProPrice'];
                $ow_name=$_POST['owner'];
                $ow_phone=$_POST['ow_phone'];
                echo $name;
                echo $pro_dis;
                echo $ow_name;
                echo $ow_phone;
                
                $mng=new MongoDB\Driver\Manager("mongodb://localhost:27017");
                $bulk = new MongoDB\Driver\BulkWrite;
                $data =[
                    "venue_name"=>$name,
                    "descrip"=>$pro_dis,
                    "charge"=>$pro_price,
                    "ow_name"=>$ow_name,
                    "ow_phone"=>$ow_phone
                    ];
                $bulk->update(
                    ['v_id'=>$id],
                    ['$set'=>["venue_name"=>$name,"ow_phone"=>$ow_phone,"ow_name"=>$ow_name,"descrip"=>$pro_dis]]);
                if( $mng->executeBulkWrite('VenueBooking.Venue', $bulk))
                {
                    header("Location:admin_venues.php");
                }
                else
                {
                echo "Unsuccessful";
                }
        


    }

?>