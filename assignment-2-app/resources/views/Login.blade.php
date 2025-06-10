<?php
// session_start();
// $host = "localhost";
// $user = "root";
// $password = "";
// $database = "Web_DataBase";

// $conn = new mysqli($host, $user, $password, $database);
// if ($conn->connect_error) {
//     die("Database connection failed: " . $conn->connect_error);
// }

// $error_message = "";

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $username = $_POST["username"];
//     $password = $_POST["password"];

//     $stmt = $conn->prepare("SELECT pasword FROM Users WHERE user_name = ?");
//     $stmt->bind_param("s", $username);
//     $stmt->execute();
//     $stmt->store_result();

//     if ($stmt->num_rows > 0) {
//         $stmt->bind_result($pass);
//         $stmt->fetch();
//         if ($password == $pass) {
//             $_SESSION["username"] = $username;
//             echo "<script>alert('Login successful! Welcome, " . htmlspecialchars($username) . ".');</script>";
//         } else {
//             $error_message = "Invalid password!";
//         }
//     } else {
//         $error_message = "User not found!";
//     }

//     $stmt->close();
//     $conn->close();
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form id="loginForm" method="POST" action="">
            @csrf
            <input type="text" id="username" name="username" placeholder="Username" value="{{ old('username') }}" required>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <div class="redir">If you don't have account <a href="../signup">click here!</a></div>
            <button type="submit">Login</button>
        </form>
        @if (session('error'))
            <p id="error-message">{{ session('error') }}</p>
        @endif
    </div>
    </body>
    </html>