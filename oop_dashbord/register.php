
<?php

// include 'connect.php'; 
include 'db.php'; 
$db=new Database ;
if(isset($_POST['register'])){
 
  
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
 
  
  
  // Validate The Form
  
  

  
    
      
      $resultdata=$db->insert("users","VALUES(null, '".$name."','".$password."',0,'".$email."')");
      // "insert into prudocts(name,descr,price,image) values( '$name', '$descr', '$price', '$image')";
     // $result=MySqli_qurey($con,$sql);
      if ($resultdata) {
            
       header('location:login.php');
       echo '<div class="col-sm-12 col-sm-offset-6">
       <div class="alert alert-info text-center">
        you have register go to login now    </div>
     </div>';
      
      }else{ echo "no";}
}


?>
<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    
    <link rel="stylesheet" href="/stylesheets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <style>
          .login-dark {
        height:auto;
        width: 50%;
        background:#ffffff url(../../assets/img/star-sky.jpg);
        background-size:cover;
        position:relative;
       
      }
      
      .login-dark form {
        
        background-color:#1e2833;
        padding:40px;
        border-radius:4px;
       text-align: right;
        
       color:     hsl(45deg 93% 77%);;
        box-shadow:3px 3px 4px rgba(0,0,0,0.2);
      }
      
      .login-dark .illustration {
        text-align:center;
        padding:15px 0 20px;
        font-size:100px;
        color:#2980ef;
        
      }
      
      .login-dark form .form-control {
        background:none;
        text-align: right;
        border:none;
        border-bottom:1px solid #434a52;
        border-radius:0;
        box-shadow:none;
        outline:none;
        color:inherit;
      }
      label{    margin-top: 10px;}
      .login-dark form .btn-primary {
        width: 100%;
        background:#0369ee;
        border:none;
        border-radius:4px;
        padding:11px;
        color:     hsl(45deg 93% 77%);;
        margin:auto ;
        box-shadow:none;
        margin-top:26px;
        text-shadow:none;
        outline:none;
      }
      
      .login-dark form .btn-primary:hover, .login-dark form .btn-primary:active {
        background:#214a80;
        outline:none;
      }
      
      .login-dark form .forgot {
        display:block;
        text-align:center;
        font-size:12px;
        color:#6f7a85;
        opacity:0.9;
        text-decoration:none;
      }
      
      .login-dark form .forgot:hover, .login-dark form .forgot:active {
        opacity:1;
        text-decoration:none;
      }
      
      .login-dark form .btn-primary:active {
        transform:translateY(1px);
      }
      @media (max-width:850px){
  .login-dark {
  height:100%;
  width: 100%;
  background:#ffffff url(../../assets/img/star-sky.jpg);
  background-size:cover;
  position:relative;
}
   
    }
      
      
              </style>
</head>

<body>
  <div class="login-dark card card-body col-md-6 m-auto">
      <h1 class="text-center mb-3">
        <i class="fas fa-user-plus"></i> التسجيل
      </h1>
      
      <form action="register.php" method="POST">
        <div class="form-group">
          <label for="name">الاسم </label>
          <input
            type="text"
            id="name"
            name="name"
            class="form-control"
            placeholder="ادخل اسمك "
           
          />
        </div>
        <div class="form-group">
          <label for="email">البريد الالكتروني</label>
          <input
            type="email"
            id="email"
            name="email"
            class="form-control"
            placeholder=" ادخل البريد الالكتروني"
           
          />
        </div>
        <div class="form-group">
          <label for="password">كلمة السر</label>
          <input
            type="password"
            id="password"
            name="password"
            class="form-control"
            placeholder=" ادخل كلمة السر"
           
          />
        </div>
       
        <button type="submit" name="register" class="btn btn-primary btn-block">
          التسجيل
        </button>
      </form>
      <p class="lead mt-4 " style="
      text-align: end;">هل لديك حساب؟ <a href="login.php">الدخول</a></p>
    </div>
 
</body></html>