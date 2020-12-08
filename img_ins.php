<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>html image</title>
</head>
<body>
    <form method="POST" action="" enctype="multipart/form-data">
        ...................
        <input type="file" name="cover" >
        ..................
        <button type="submit">Submit</button>
        
      </form>

    <?php
    
        if(isset($_FILES)){
            $questionCover = $_FILES["cover"];
  // Establish MongoDB Connection
  $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");

  
   $bulk = new MongoDB\Driver\BulkWrite;

 
  $document = array(
      "type" => "MCQ",
      "cover" => new MongoDB\BSON\Binary(file_get_contents($questionCover["tmp_name"]), MongoDB\BSON\Binary::TYPE_GENERIC),
  );

  $bulk->insert($document);
  $mng->executeBulkWrite('MyImage.myRecord', $bulk);


  
  return false;
            
           
                
        }
    
    ?>
</body>
</html>