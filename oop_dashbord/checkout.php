<?php

	session_start();
	include "db.php";
	
	$db=new Database ;
	//user needs to login to checkout
	// $_SESSION['message'] = 'You need to login to checkout';
	// header('location: index.php');
	if(isset($_SESSION['cart'])){
	if(isset($_SESSION['userid'])){
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
	
<div class="col-md-12 mb-4" style="display: flex;
    justify-content: space-around;
    margin-top: 34px;" >
<div class="col-md-4 " style="margen:auto;">

<!-- Heading -->
<h4 class="d-flex justify-content-between align-items-center mb-3">
  <span class="text-muted">Checkout
</span>
  <span class="badge badge-secondary badge-pill">3</span>
</h4>

<!-- Cart -->
<ul class="list-group mb-3 z-depth-1" >
  <li class="list-group-item d-flex justify-content-between lh-condensed">
	  
  <?php 
  
   
         $list=$db->update("*", "users", "where uid =  '".$_SESSION['uid']."' ");
         while($row=mysqli_fetch_assoc($list)){
?>
	<div>
	  <h6 class="my-0"> Hi <?php echo $_SESSION['userid'] ?> </h6>
	  <small class="text-muted">you add to crat</small>
	</div>
	<span class="text-muted"><?php echo count($_SESSION['cart']); ?> products</span>
  </li>
  <li class="list-group-item d-flex justify-content-between lh-condensed">
	<div>
	  <h6 class="my-0">in your wallet</h6>
	  <small class="text-muted">of your products</small>
	</div>
	<span class="text-muted">$<?php echo $row['total_mony'];?></span>
  </li>
  <li class="list-group-item d-flex justify-content-between lh-condensed">
	<div>
	  <h6 class="my-0">total price</h6>
	  <small class="text-muted">of your products</small>
	</div>
	<span class="text-muted">$5</span>
  </li>
  
  <li class="list-group-item d-flex justify-content-between bg-light">
	<h6 class="text-success"> total price (USD)</h6>
	<strong  class="text-success">$5000</strong>
  </li>
</ul>
<!-- Cart -->

<!-- Promo code -->
<?php
		 }
?>
  
	  <input class="btn btn-secondary btn-md waves-effect " style=" float: right;" type="submit" value="accepet and Pay">
	  <a href="cart.php" class="btn btn-primary btn-md waves-effect " style=" float: left;" type="submit" value="go cart">go cart</a>
	
  

<!-- Promo code -->

</div></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      
	  </script>
  </body>
  </html>
  <?php
  
}
	else{
		header("location:login.php");
	
	}}	
?>	