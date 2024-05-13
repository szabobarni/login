<?php
require_once 'tools.php';
echo "A regisztráció sikeres";
$email = $_GET['variable1'];
//echo $email;
$regtime = date('Y-m-d H:i:s');
tools::regComplete($email,$regtime);
