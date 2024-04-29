<?php
require_once 'page.php';
require_once 'tools.php';

Page::header();
Page::loginBtn();
if(isset($_POST['login'])){
    Page::login();
}
if(isset($_POST['btn-reg'])){
    Page::reg();
}
Page::footer();