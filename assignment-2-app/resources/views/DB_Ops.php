<?php

use Illuminate\Support\Facades\Mail;

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'web_database';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $createTableSql =
        "CREATE TABLE IF NOT EXISTS Users (
            full_name VARCHAR(50) NOT NULL,
            user_name VARCHAR(50) PRIMARY KEY,
            phone_number VARCHAR(13) NOT NULL,
            whatsapp_number VARCHAR(13) NOT NULL,
            addres VARCHAR(50) NOT NULL,
            pasword VARCHAR(255) NOT NULL,
            email VARCHAR(50) NOT NULL,
            user_image VARCHAR(100) NOT NULL,
            original_file_name VARCHAR(255) NOT NULL,
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
    $conn->exec($createTableSql);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fullname = $_POST['name'];
        $username = $_POST['user'];
        $phoneNumber = $_POST['pnum'];
        $whatsappNumber = $_POST['wnum'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $password = $_POST['pass'];

        // Store both original and unique file names
        $originalFileName = $_FILES['image']['name'];

        if ($uploadedFileName !== false) {
            $stmt = $conn->prepare("INSERT INTO Users (full_name, user_name, phone_number, whatsapp_number, addres, pasword, email, user_image, original_file_name) VALUES (:fullname, :username, :phone_number, :whatsapp_number, :address, :password, :email, :user_image ,:original_file_name)");

            $stmt->bindParam(':fullname', $fullname);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':phone_number', $phoneNumber);
            $stmt->bindParam(':whatsapp_number', $whatsappNumber);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':user_image', $uploadedFileName);
            $stmt->bindParam(':original_file_name', $originalFileName);

            if ($stmt->execute()) {
                echo "User registered successfully!";
                //sending email to admin in case success
                $msg = "A new user has registered.\n\n"
                        . "Name: " . $_POST['name'] . "\n"
                        . "Email: " . $_POST['email'];
                        
                Mail::raw($msg, function($mail){
                    $mail->to('abdoazzam53@gmail.com')
                        ->subject('New user has registered.');
                });
            } else {
                echo "Error: Could not register user.";
            }
        } else {
            echo "Error: Failed to upload image.";
        }
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
