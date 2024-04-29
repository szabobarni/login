<?php
Class Install{
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
}