<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up Page</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="login-container">
        <h2>Sign up</h2>

        <form id="signForm" method="POST" action="create" enctype="multipart/form-data" onsubmit="return full_validation(event)">
            @csrf

            <div id="group">
                <input type="text" id="fullName" name="name" placeholder="Full Name" required>
                <input type="text" id="userName" name="user" placeholder="Username" required>
            </div>

            <div id="group">
                <input type="tel" id="PhoneNum" name="pnum" placeholder="Phone Number" required>
            </div>

            <div id="group">
                <input type="tel" id="whatsappNum" placeholder="Whatsapp Number" name="wnum" required>
                <span class="verify-false"><b id="check">invalid</b></span>
            </div>

            <button type="button" onclick="validation()">Verify your number</button>

            <input type="text" id="address" name="address" placeholder="Address" required>

            <p class="error-message" id="emailERR">Wrong Email Format</p>
            <input type="text" id="email" name="email" placeholder="Email" required>

            <p id="password_state">
                <span>8 Letters</span>
                <span>contain a number</span>
                <span>contain special character</span>
            </p>

            <input type="password" id="password" name="pass" placeholder="Password" required>
            <p class="error-message" id="confirmPassERR">the passwords doesn't match</p>
            <input type="password" id="confPassword" placeholder="Confirm Password" required>

            <div class="file-upload">
                <input type="file" id="fileInput" name="image" accept="image/*" onchange="updateFileName()" required>
                <label for="fileInput">Select a profile photo</label>
                <span id="fileName">No photo selected</span>
            </div>

            <div class="redir">
                If you have account <a href="../login">click here!</a>
            </div>

            <button type="submit">Sign Up</button>
        </form>
    </div>
</body>

</html>