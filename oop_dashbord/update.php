<?php

// include 'connect.php'; 
include 'db.php'; 

 $db=new Database ;

if(isset($_GET['do']) == 'update'){
  
  $imageName = $_FILES['image']['name'];
  $imageType = $_FILES['image']['type'];
  $imageSize = $_FILES['image']['size'];
  $images  = $_FILES['image']['tmp_name'];

         
 
  
  $imageAllowedExtension = array("jpeg", "jpg", "png", "gif");
  
  @$imageExtension = strtolower(end(explode('.', $imageName)));
  
  
  $id = $_POST['id'];       
  $name = $_POST['name'];
  $descr = $_POST['descr'];
  $price = $_POST['price'];
 
  
  // Validate The Form
  
  
  $image = rand(0, 100000) . '_' . $imageName;
  move_uploaded_file($images, "image\\". $image);
  
  
    
    $resultdata=$db->saveUp("items", "name='".$name."', image='".$image."', descr='".$descr."', price='".$price."'" ,"pid='".$id."'");
    // "insert into prudocts(name,descr,price,image) values( '$name', '$descr', '$price', '$image')"
   // $result=MySqli_qurey($con,$sql);
    if ($resultdata) {
      echo $resultdata;
      header('location:dashbord.php');
    
    
    }else{ echo"no";}
    
}   else{
  $id =$_GET['updateid'];
 echo $id;
$resultdata=$db->update("*", "items", "where pid = $id");
$item = mysqli_fetch_assoc($resultdata);
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
  <h4> update PRODUCT</h4>
</div><br> 
<?php
 
       
?>
<div class="container">
  <form  action="update.php?do=update&itemid=<?php echo $item['pid']?>"   method="POST"  enctype="multipart/form-data">
  <input type="hidden" name="id"  value="<?php echo $item['pid']?>">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" name="name"  required="" value="<?php echo $item['name'] ?>">
    </div>
    <div class="form-group">
      <label for="price">Price:</label>
      <input type="number" class="form-control" name="price"  required=""  value="<?php echo $item['price'] ?>">
    </div>
    <div class="form-group">
      <label for="details">details:</label>
      <input type="text" class="form-control" name="descr" required=""  value="<?php echo $item['descr'] ?>">
    </div>
    <div class="form-group">
      <label for="details">image:</label>
      <input type="file" class="form-control" name="image"  required=""  value="<?php echo $item['image'] ?>">
    </div>
    <div class="form-group">
      
      <input type="submit" name="update" class="btn btn-primary" style="float:right;" value="update">
    </div>
  </form>
</div>
       
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      
    </script>
</body>
</html>