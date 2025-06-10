<?php
$conn = new mysqli("localhost", "root", "", "web_database");

if (isset($_GET['username'])) {
    $username = $conn->real_escape_string($_GET['username']);
    $query = "SELECT * FROM users WHERE user_name = '$username'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "Username already taken";
    } else {
        echo "Username available";
    }
}
