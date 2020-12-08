<?php
$mng=new MongoDB\Driver\Manager("mongodb://localhost:27017");
$qry=new MongoDB\Driver\Query([]);

$rows=$mng->executeQuery("VenueBooking.Image",$qry);

?>
<table>
<tr>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Description</th>
<?php
foreach ($rows as $row){?>
<tr>
     <?php     
     
     $myQuestion = $row;
         
 
 ?>
         
                    <td style="margin-right:10px"><?php echo nl2br("$row->v_Name"); ?></td>
                    <td style="margin-right:10px"><img src="data:jpeg;base64,<?=base64_encode($myQuestion->v_image->getData())?>" height="200px" width="330px"/></td>
                    <tdstyle="margin-right:10px">Rs.<?php echo nl2br("$row->v_price"); ?></td>
                     <td style="margin-right:10px"> <?php echo nl2br("$row->v_dis"); ?></td>

                  </tr>
                 
<?php 

                

} ?>
               </table> 