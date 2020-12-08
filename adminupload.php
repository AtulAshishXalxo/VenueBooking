<?php



		if (isset($_FILES["fileToUpload"])) 
		{
				$name=$_POST["ProName"];
				$questionCover = $_FILES["fileToUpload"];
				$mng=new MongoDB\Driver\Manager("mongodb://localhost:27017");
				$bulk = new MongoDB\Driver\BulkWrite;
				$data =[
					"PTName" => $name,
					"PTimage" => new MongoDB\BSON\Binary(file_get_contents($questionCover["tmp_name"]), MongoDB\BSON\Binary::TYPE_GENERIC),
					];
				$bulk->insert($data);
				if( $mng->executeBulkWrite('VenueBooking.Image', $bulk))
				{
					header("Location:admin_home.php");
				}
				else
				{
				echo "Unsuccessful";
				}
		}
		
//$file=$_FILES['fileToUpload'];
		//print_r($file);


		/*require 'composer_files/autoload.php';
        $mong=new MongoDB\Client("mongodb://localhost:27017");
        $db=$mong->VenueBooking;
		$cll=$db->Venue;
		
		$pro_name=$_POST['ProName'];
		$pro_type=$_POST['ProType'];
		$pro_dis=$_REQUEST['ProDesc'];
		$pro_price=$_POST['ProPrice'];
		$cat=$_POST['category'];
		$ow_name=$_POST['owner'];
		$ow_mail=$_POST['ow_mail'];
		$ow_phone=$_POST['ow_phone'];

		$img=addcslashes(file_get_contents['image_up']['']);

       if($_POST)                                       
        {
            $ins= array(
				"venue_name"=>$pro_name,
				"type"=>$pro_type,	
				"descrip"=>$pro_dis,
				"charge"=>$pro_price,
				'category'=>$cat,
				"ow_name"=>$ow_name,
				"ow_mail"=>$ow_mail,
				"ow_phone"=>$ow_phone
            );
            
            if($cll->insertOne($ins))                                   
            {
                echo "<script>document.location.href='http://localhost:8080/myProject/admin_venues.php';</script>";
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


	/*

	//// other way////////

	require 'composer_files/autoload.php';
        $mong=new MongoDB\Client("mongodb://localhost:27017");
        $db=$mong->VenueBooking;
		$cll=$db->Image;

		
		$questionCover = $_FILES["question_cover"];


		$pro_name=$_POST['ProName'];
		$pro_type=$_POST['ProType'];
		$pro_dis=$_REQUEST['ProDesc'];
		$pro_price=$_POST['ProPrice'];
		$cat=$_POST['category'];



		$document = array(
			"venue_name"=>$pro_name,
				"type"=>$pro_type,	
				"descrip"=>$pro_dis,
				"charge"=>$pro_price,
				'category'=>$cat,
			"cover" => new MongoDB\BSON\Binary(file_get_contents($questionCover["tmp_name"]), MongoDB\BSON\Binary::TYPE_GENERIC),
		);
		if ($cll->insertOne($document)) 
		{
			return true;
		}
		return false;
		
	}

	//aswin//
	$mongo=new MongoDB\Driver\Manager("mongodb://localhost:27017");
	$bulk = new MongoDB\Driver\BulkWrite;
	$qry=new MongoDB\Driver\Query([]);
	$rows=$mongo->executeQuery("VenueBooking.Image",$qry);

if($_POST){
  //$pkg_id=$_POST["pkg_id"];
  $price=$_POST["ProPrice"];
  $desc=$_POST["ProDesc"];
  $target_dir = "upload/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
  }

  if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        $pic=htmlspecialchars( basename ($_FILES["fileToUpload"]["name"]));
        echo $pic;
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }
  $doc = ['ProPrice' => $price,'ProDesc' => $desc,'picc'=>$pic];
  $bulk->insert($doc);
    $mongo->executeBulkWrite('VenueBooking.Image', $bulk);
    echo"successful";
   // header("Location: ../admin/adminhome.php");
   
  }
  else{
    echo "no data inserted";
  }*/



//sherlin//
?>
