<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Web_DataBase";

$conn = new mysqli($servername, $username, $password);


$sql = "CREATE DATABASE IF NOT EXISTS $dbname";

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "CREATE TABLE IF NOT EXISTS Users (
  full_name VARCHAR(50) NOT NULL,
  user_name VARCHAR(50) PRIMARY KEY,
  phone_number VARCHAR(13) NOT NULL,
  whatsapp_number VARCHAR(13) NOT NULL,
  addres VARCHAR(50) NOT NULL,
  pasword VARCHAR(50) NOT NULL,
  user_image VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL,
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$name = $_POST['name'];
$user = $_POST['user'];
$pnum = $_POST['pnum'];
$wnum = $_POST['wnum'];
$address = $_POST['address'];
$pass = $_POST['pass'];
$email = $_POST['email'];

$sql = "INSERT INTO $dbname (full_name, user_name, phone_number, whatsapp_number, addres, pasword, email) VALUES ($name, $user, $pnum, $wnum, $address, $pass, $email)";

$conn->close();