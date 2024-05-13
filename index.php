<?php
require_once 'page.php';
require_once 'tools.php';
require 'vendor/autoload.php';

//page::installBtn();
Page::header();
Page::loginBtn();
if(isset($_POST['btn-install'])){
    Tools::install();
}
if(isset($_POST['btn-login'])){
    Page::login();
}
if(isset($_POST['btn-reg'])){
    Page::reg();
}
if(isset($_POST['btn-reg-conf'])){
    $name = $_POST['reg-name'];
    $email = $_POST['reg-email'];
    $pass = $_POST['reg-pass'];
    $pass2 = $_POST['reg-pass2'];
    $secret_pass = password_hash($pass, PASSWORD_DEFAULT);
    $token = tools::generateToken();
    $create_date = date('Y-m-d H:i:s');
    $token_valid = date('Y-m-d H:i:s', strtotime('+10 minutes', strtotime($create_date)));
    if($pass == $pass2){
        Tools::sendEmail($name, $email, $secret_pass,$token,$create_date,$token_valid);
    }
}
if(isset($_POST['btn-login-conf'])){
    $email = $_POST['input1'];
    $pass = $_POST['input2'];
    $pass2 = tools::login($email);
    if (password_verify($pass, $pass2['password'])) {
        page::loginSuccess();
    } else {
        page::loginFail();
    }
}
Page::footer();