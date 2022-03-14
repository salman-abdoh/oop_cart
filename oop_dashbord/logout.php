<?php

session_start();
unset($_SESSION['userid']);
unset($_SESSION['uid']);
unset($_SESSION['cart']);

header("location: login.php");



?>