<?php

// include 'connect.php'; 
session_start();
if(isset($_SESSION['userid'])){
//initialize cart if not set or is unset
if(!isset($_SESSION['cart'])){
  $_SESSION['cart'] = array();
}

//unset qunatity
unset($_SESSION['qty_array']);
include 'db.php'; 
$db=new Database ;


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
  <h4>products</h4>
 
      
            <a href='cart.php' style="   color: #0f5ed3;
    text-decoration: none;
    font-family: cursive;
    font-size: 17px;"> in cart<span style="color: #443f68;
    font-size: 19px;
    border: 1px solid #7e0909;
    padding: 1px;
    border-radius: 9px;
">'<?php echo count($_SESSION['cart']); ?>'</span>products</a>
            <?php
            if(isset($_SESSION['message'])){
              ?>
              <div class="row">
                <div class="col-sm-12 col-sm-offset-6">
                  <div class="alert alert-info text-center">
                    <?php echo $_SESSION['message']; ?>
                  </div>
                </div>
              </div>
              <?php
              unset($_SESSION['message']);
            }
       
        ?>
</div><br><br> 

<div class="container row">

    
 
        <?php 
         $list=$db->getTable('items');
         while($row=mysqli_fetch_assoc($list)){
?>

        <div class=" col-md-3 col-lg-3 " style="    border: 1px solid #ecdcdc;
            border-radius: 7px;">
            <form action="index.php" method="post">
             <div class="text-primary hiddin" style="display: none;"><h2><?php echo $row['pid'];?></h2></div>
            <div class="text-primary"><h2><?php echo $row['name'];?></h2></div>
            <div class="text-dark"><h6><?php echo $row['price'];?></div>
            
            <div class="text-danger"><h5><?php echo $row['descr'];?></h5></div>
            <div class="product-image"><img style="   width: 250px;
    height: 150px;" src="image/<?php echo $row['image'];?>";></div>
           
                <div class="btn">
                <span class="pull-right"><a href="add_cart.php?id=<?php echo $row['pid']; ?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-plus"></span> Cart</a></span>
                  
                   </div>
                 
                   </form>
            </div>
         
            <?php } ?>
       
    
</div></div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      
    </script>
</body>
</html>
   
<?php
}
	else{
		header("location:login.php");
		
	}	
?>	