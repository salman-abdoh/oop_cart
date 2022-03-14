<?php

// include 'connect.php'; 
include 'db.php'; 
$db=new Database ;

if(isset($_GET['delete']) == 'id'){
$id=$_GET['itemid'];
$result=$db->delete("items","pid", $id);
  if($result){
    header("location:dashbord.php");
  }else{
    echo "error";
  }
  header("location:dashbord.php");

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
  <h4>products</ h4>
</div><br><br> 

<div class="container">

    <a href="add.php" class="btn btn-primary" style="float:right;">Add New products</a>
    <div class="container row g-2">
 
        <?php 
         $list=$db->getTable('items');
         while($row=mysqli_fetch_assoc($list)){
?>
        <div class=" col-md-3 col-lg-3 " style="    border: 1px solid #ecdcdc;
            border-radius: 7px;">
             <div class="text-primary hiddin" style="display: none;"><h2><?php echo $row['pid'];?></h2></div>
            <div class="text-primary"><h2><?php echo $row['name'];?></h2></div>
            <div class="text-dark"><h6><?php echo $row['price'];?>$</div>
            
            <div class="text-danger"><h5><?php echo $row['descr'];?></h5></div>
            <div class="product-image" ><img style="    width: 250px;
    height: 150px;" src="image/<?php echo $row['image'];?>";></div>
           
                <div class="btn">
               <a class="btn btn-success" href="update.php?updateid=<?php echo $row['pid'];?>" style="color:white">
                   <i class="fa fa-pencil" aria-hidpden="true"></i>update</a>
                  
                    <a class="btn btn-danger" href="dashbord.php?delete=id&itemid=<?php echo $row['pid'];?>" style="color:white" onclick="confirm("Are you sure want to delete this record")">
                    delete<i class="fa fa-trash" aria-hidpden="true"></i> 
                 </a> </div>
                 
                
            </div>
            <?php } ?>
      
    
</div></div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      
    </script>
</body>
</html>