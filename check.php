<?php
    require 'composer_files/autoload.php';
    $mong=new MongoDB\Client("mongodb://localhost:27017");
    $db=$mong->VenueBooking;
      $mObj=$db->Venue->find(['ow_mail'=>'atul@gmail.com']);

         
         
    
    echo '     ******* before each';
    foreach($mObj as $row)
    {
      echo '    ****** inside each';
      
        
        
            ?>
            <div class="row-md-4">
                <div class="card" style="width:100%; box-shadow:2px 6px 11px 0px; margin:20px;">
                      <div class="row m-5">
                              <div class="col-7">
                                      <div class="p-5">
                                            <h4 class="card-title"><strong>Venue Name:</strong> <?php echo $row->mail;?></h4>
                                            <h4 class="card-title"><strong>Charge :</strong> <?php echo $row->charge;?></h4>
                                            <h4 class="card-title"><strong>Booking Date :</strong> <?php echo $row->date;?></h4>
                                            <a  class="btn btn-warning mt-5" style="width:60%;color:white" href='delete_venue.php?name="<?php echo $row['name']."& mail=".$row['mail'];?>"'>Clear</a>
                                      </div>
                              </div>
                              <div class="col-5">
                                      <div class="inner">
                                        <img src="images/hall6.jpeg" class="card-img img-thumbnail" style="width:100%; ">
                                    </div>
                              </div>
                      </div>
                </div>
            </div>

          <?php
      
        
    }
    echo '     ******* after each';
       ?>

</div>
</div>