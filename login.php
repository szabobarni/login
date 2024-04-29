<?php
require_once 'tools.php';
echo "A regisztráció sikeres";
$email = $_GET['variable'];
$regtime = date('Y-m-d H:i:s');
tools::regComplete($email,$regtime);
