<?php
require_once 'tools.php';
echo "A regisztráció sikeres";
$token = $_GET['t'];
$regtime = date('Y-m-d H:i:s');
tools::regComplete($token,$regtime);
