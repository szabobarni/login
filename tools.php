<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once('vendor/phpmailer/phpmailer/src/PHPMailer.php');
require_once('vendor/phpmailer/phpmailer/src/SMTP.php');
require_once('vendor/phpmailer/phpmailer/src/Exception.php');
Class Tools{
    static function install(){
        $servername = "localhost";
        $username = "root";
        $password = null;
        $dbname = "login";
        $conn = new mysqli($servername, $username, $password);


        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
        if ($conn->query($sql) === FALSE) {
            die("Error creating database: " . $conn->error);
        }

        $conn->select_db($dbname);

        $sql = "CREATE TABLE IF NOT EXISTS Users (
            id int primary key auto_increment,
            is_active tinyint default false,
            name varchar(50) not null,
            email varchar(25) not null unique,
            password varchar(50) not null,
            token varchar(100),
            token_valid_until datetime,
            created_at datetime default now(),
            registered_at datetime,
            picture varchar(50),
            deleted_at datetime 
        )";
        if ($conn->query($sql) === FALSE) {
            die("Error creating table: " . $conn->error);
        }
    }
    static function dbExists(){
        
    }
    static function reg($name,$email,$pass,$token,$create_date,$token_valid){
        $servername = "localhost";
        $username = "root";
        $password = null;
        $dbname = "login";
        $conn = new mysqli($servername, $username, $password,$dbname);

        $query = "INSERT INTO Users (id ,is_active,name,email,password,token,token_valid_until,created_at,registered_at,picture,deleted_at) VALUES ('','true','$name','$email','$pass','$token','$token_valid','$create_date','','','')";

        $conn->query($query);

    }
    static function generateToken($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $token = '';
        for ($i = 0; $i < $length; $i++) {
            $token .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $token;
    }
    static function sendEmail($name,$email,$pass,$token,$create_date,$token_valid){
        $mail = new PHPMailer();
        $token = self::generateToken();
 
        try {
 
            $mail->isSMTP();                                           
            $mail->Host       = 'localhost';                
            $mail->SMTPAuth   = false;                                  
            $mail->Port       = 1025;                                
           
 
            $mail->setFrom('from@example.com', 'Mailer');
            $mail->addAddress($email,$name);    
       
            $mail->isHTML(true);                                
            $mail->Subject = 'Regisztracio befejezese';
            $mail->Body    = 'A regisztráció véglegesítésének érdekében kattintson <a href="http://localhost:8000/login/login.php?'.$token.'" target="_blank">ide.</a>';
       
            $mail->send();
            //echo 'Message has been sent';
            self::reg($name,$email,$pass,$token,$create_date,$token_valid);
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
    static function regComplete($email,$regtime){
        $servername = "localhost";
        $username = "root";
        $password = null;
        $dbname = "login";
        $conn = new mysqli($servername, $username, $password,$dbname);

        $query = "UPDATE Users SET is_active='1', registered_at='' WHERE email = '$email';";
        $conn->query($query);
    }
}