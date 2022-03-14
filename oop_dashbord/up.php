<?php
include 'db.php'; 

$db=new Database ;

if(isset($_POST['do']) == 'update'){
  
   
  
    $id = $_POST['id'];       
    $name = $_POST['name'];
    $descr = $_POST['descr'];
    $price = $_POST['price'];
    $image = $_POST['image']; 
      
      $resultdata=$db->saveUp("items", "name='".$name."', image='".$image."', descr='".$descr."', price='".$price."'" ,"pid='".$id."'");
      // "insert into prudocts(name,descr,price,image) values( '$name', '$descr', '$price', '$image')"
     // $result=MySqli_qurey($con,$sql);
      if ($resultdata) {
        echo $resultdata;
       
      
      
      }else{ echo"no";}
      header('location:index.php');
  }  
     

?>