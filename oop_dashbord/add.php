<?php

include 'db.php'; 

$db=new Database ;
if(isset($_POST['add'])){
  
  $imageName = $_FILES['image']['name'];
  $imageType = $_FILES['image']['type'];
  $imageSize = $_FILES['image']['size'];
  $images  = $_FILES['image']['tmp_name'];

         
 
  
  $imageAllowedExtension = array("jpeg", "jpg", "png", "gif");
  
  @$imageExtension = strtolower(end(explode('.', $imageName)));
  
  $name = $_POST['name'];
  $descr = $_POST['descr'];
  $price = $_POST['price'];
  
  
  // Validate The Form
  
  
  $image = rand(0, 100000) . '_' . $imageName;
  move_uploaded_file($images, "image\\". $image);
  
    
      
      $resultdata=$db->insert("items","VALUES(null, '".$name."','".$image."','".$descr."','".$price."')");
      // "insert into prudocts(name,descr,price,image) values( '$name', '$descr', '$price', '$image')";
     // $result=MySqli_qurey($con,$sql);
      if ($resultdata) {

      header('location:dashbord.php');
      echo '<div class="col-sm-12 col-sm-offset-6">
      <div class="alert alert-info text-center">
        Product added to cart    </div>
    </div>';
      
      }else{ echo "no";}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>products</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
   
   
       
</head>

<body>

<div class="card text-center" style="padding:15px;">
  <h4>ADD NEW PRODUCT</h4>
</div><br> 

<div class="container">
  <form action="add.php"    method="POST"  enctype="multipart/form-data">
  
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" name="name"  required="">
    </div>
    <div class="form-group">
      <label for="price">Price:</label>
      <input type="number" class="form-control" name="price"  required="">
    </div>
    <div class="form-group">
      <label for="details">details:</label>
      <input type="text" class="form-control" name="descr" required="">
    </div>
    <div class="form-group">
      <label for="details">image:</label>
      <input type="file" class="form-control" name="image"  required="">
    </div>
    <div class="form-group">
      <input type="hidden" name="id" value="null" >
      <a href="dashbord.php" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back to products</a>
      <input type="submit" name="add" class="btn btn-primary" style="float:right;" value="add pro">
    </div>
  </form>
</div>
       
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      
    </script>
</body>
</html>