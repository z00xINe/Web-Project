<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Web_DataBase"; 

$conn = new mysqli($servername, $username, $password);

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
$conn->query($sql);

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
$conn->query($sql);

$sql = $conn->prepare("INSERT INTO Users (full_name, user_name, phone_number, whatsapp_number, addres, pasword, email) VALUES (?, ?, ?, ?, ?, ?, ?)");
$sql->bind_param("sssssss", $name, $user, $pnum, $wnum, $address, $pass, $email);

$name = $_POST['name'];
$user = $_POST['user'];
$pnum = $_POST['pnum'];
$wnum = $_POST['wnum'];
$address = $_POST['address'];
$pass = $_POST['pass'];
$email = $_POST['email'];

$sql->execute();

$sql->close();
$conn->close();