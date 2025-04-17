<?php
session_start();
$host = "localhost";
$user = "root";
$password = "";
$database = "Web_DataBase";

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT pasword FROM Users WHERE user_name = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($pass);
        $stmt->fetch();
        if ($password == $pass) {
            $_SESSION["username"] = $username;
            echo "<script>alert('Login successful! Welcome, " . htmlspecialchars($username) . ".');</script>";
        } else {
            $error_message = "Invalid password!";
        }
    } else {
        $error_message = "User not found!";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
        }

        .login-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 40px;
            width: 380px;
            text-align: center;
            box-shadow: 0px 0px 20px rgba(0, 255, 255, 0.3);
            animation: fadeIn 1.2s ease-in-out;
            border: 2px solid rgba(255, 255, 255, 0.2);
        }

        h2 {
            font-size: 28px;
            color: #fff;
            margin-bottom: 20px;
            letter-spacing: 1px;
            text-transform: uppercase;
            text-shadow: 0px 0px 10px rgba(0, 255, 255, 0.5);
        }

        input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            font-size: 16px;
            text-align: center;
            transition: all 0.4s ease;
        }

        .redir, .redir a {
            width: 100%;
            margin: 10px 0;
            color: white;
            font-size: 16px;
            text-align: center;
            transition: all 0.4s ease;
        }

        input:focus {
            border-color: #00ffff;
            box-shadow: 0px 0px 15px rgba(0, 255, 255, 0.6);
            outline: none;
        }

        button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #ff416c, #ff4b2b);
            border: none;
            color: white;
            font-size: 18px;
            font-weight: bold;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            box-shadow: 0px 0px 10px rgba(255, 75, 43, 0.5);
        }

        button:hover {
            background: linear-gradient(135deg, #ff4b2b, #ff416c);
            box-shadow: 0px 0px 20px rgba(255, 75, 43, 0.8);
            transform: scale(1.05);
        }

        #error-message {
            color: #ff4b2b;
            margin-top: 10px;
            font-size: 14px;
            font-weight: bold;
            text-shadow: 0px 0px 10px rgba(255, 75, 43, 0.5);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
<div class="login-container">
    <h2>Login</h2>
    <form id="loginForm" method="POST">
        <input type="text" id="username" name="username" placeholder="Username" required>
        <input type="password" id="password" name="password" placeholder="Password" required>
        <div class="redir">If you don't have account <a href="http://127.0.0.1/Signup.php">click here!</a></div>
        <button type="submit">Login</button>
    </form>
    <p id="error-message"><?php echo $error_message; ?></p>
</div>

<script>
    document.getElementById("loginForm").addEventListener("submit", function(event) {
        let username = document.getElementById("username").value.trim();
        let password = document.getElementById("password").value.trim();
        let errorMessage = document.getElementById("error-message");

        if (username === "" || password === "") {
            event.preventDefault();
            errorMessage.textContent = "Please fill in all fields!";
        }
    });
</script>
</body>
</html>
