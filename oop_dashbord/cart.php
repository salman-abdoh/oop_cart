<?php
	session_start();
	if(isset($_SESSION['userid'])){
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Simple Shopping Cart using Session in PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<div class="container">
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    

	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	      	<!-- left nav here -->
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	      	<li class="active"><a href="view_cart.php"><span class="badge"><?php echo count($_SESSION['cart']); ?></span> Cart <span class="glyphicon glyphicon-shopping-cart"></span></a></li>
	      </ul>
	    </div>
	  </div>
	</nav>
	<h1 class="page-header text-center">Cart </h1>
	<div class="row">
		<div class="col-sm-12 col-sm-offset-2">
			<?php 
			if(isset($_SESSION['message'])){
				?>
				<div class="alert alert-info text-center">
					<?php echo $_SESSION['message']; ?>
				</div>
				<?php
				unset($_SESSION['message']);
			}

			?>
			<form method="POST" action="save_cart.php">
			<table class="table table-bordered table-striped">
				<thead>
					
					<th>Name</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Subtotal</th>
                    <th></th>
				</thead>
				<tbody>
					<?php
						//initialize total
						$total = 0;
						if(!empty($_SESSION['cart'])){
						//connection
						$conn = new mysqli('localhost', 'root', '', 'products');
						//create array of initail qty which is 1
 						$index = 0;
 						if(!isset($_SESSION['qty_array'])){
 						
                            $_SESSION['qty_array'] = array_fill(0, count($_SESSION['cart']), 1);
						
 						}
						$sql = "SELECT * FROM items WHERE pid IN (".implode(',',$_SESSION['cart']).")";
						$query = $conn->query($sql);
							while($row = $query->fetch_assoc()){
								?>
								<tr>
									
									<td><?php echo $row['name']; ?></td>
									<td><?php echo$row['price'] ,"$"; ?></td>
									<input type="hidden" name="indexes[]" value="<?php echo $index; ?>">
									<td><input type="text" class="form-control" value="<?php echo $_SESSION['qty_array'][$index]; ?>" name="qty_<?php echo $index; ?>"></td>
									<td><?php echo $_SESSION['qty_array'][$index]*$row['price']; ?>$</td>
									<?php  $total += $_SESSION['qty_array'][$index]*$row['price'] ; ?>
                                    <td>
										<a href="delete_item.php?id=<?php echo $row['pid']; ?>&index=<?php echo $index; ?>" class="btn btn-danger btn-sm">Remove</a>
									</td>
								</tr>
								<?php
								$index ++;
							}
						}
						else{
							?>
							<tr>
								<td colspan="4" class="text-center">No Item in Cart</td>
							</tr>
							<?php
						}

					?>
					<tr>
						<td colspan="4" align="right"><b>Total</b></td>
						<td><b><?php echo $total; ?></b>$</td>
						<?php
						
						?>
					</tr>
				</tbody>
			</table>
			<a href="index.php" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back to products</a>
			<button type="submit" class="btn btn-success" name="save">Save Changes</button>
			<a href="clear_cart.php" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Clear Cart</a>
			<a href="checkout.php" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Pay Now</a>
			</form>
		</div>
	</div>
</div>

</body>
</html>
<?php
}
	else{
		header("location:login.php");
		
	}	
?>	