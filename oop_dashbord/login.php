<?php

// include 'connect.php'; 
include 'db.php'; 
$db=new Database ;

session_start();
      
       
if(isset($_SESSION['userid'])){
    header('Location: index.php');
}


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $name   = $_POST['name'];
    $password   = $_POST['password'];
  
    $result = $db->checkUser($name, $password);
    // if (mysqli_num_rows($user) === 1) {
    $user = mysqli_fetch_assoc($result);
    if($user){
        $_SESSION['userid'] = $name; 

        $_SESSION['uid'] = $user['uid'];

        header('Location: index.php');
        // exit();
    }else{
      echo '<div class="col-sm-12 col-sm-offset-6">
      <div class="alert alert-danger text-center">
        please enter correct name and password    </div>
    </div>';
    
    }
}

// Encrypt cookie

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
    
   
    <style>
    .login-dark {
  height:auto;
  width: 35%;
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
  color:#fff;
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
  color:     hsl(45deg 93% 77%);;
  border-radius:0;
  box-shadow:none;
  outline:none;
  color:inherit;
}

.login-dark form .btn-primary {
  width: 100%;
  background:#0369ee;
  color:     hsl(45deg 93% 77%);;
  border:none;
  border-radius:4px;
  padding:11px;
  margin:auto ;
  box-shadow:none;
  margin-top:26px;
  text-shadow:none;
  outline:none;
}
label{color:     hsl(45deg 93% 77%);;}

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



    
<div class="login-dark card card-body col-md-12 m-auto">
        <h1 class="text-center mb-3"><i class="fas fa-sign-in-alt"></i>  الدخول</h1>
        <?php
      
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>"  method="post">
          <div class="form-group">
            <label for="email">البريد اسمك</label>
            <input
              type="text"
              id="name"
              name="name"
              class="form-control"
              placeholder="ادخل اسمك  "
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
          <button type="submit" class="btn btn-primary btn-block">الدخول</button>
        </form>
      
        <p class="lead mt-4" style="
        text-align: end;">
        ليس لديك حساب؟ <a href="register.php">التسجيل</a>
        </p>
      
      </div>
        
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      
    </script>
</body>
</html>