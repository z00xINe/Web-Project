
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up Page</title>
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
        .failedInput{
            border: 2px solid #ff4b2b;
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
        /*signup */
        #group {
            position: relative;
            display: flex;
            gap: 10px; 
        }

        #group input {
            flex: 1;
            padding-right: 80px;
        }
        .login-container{
            width: 480px !important;
            padding: 20px 40px;
        }
        input{
            margin: 6px 0;
        }

        h2 {
            margin-bottom: 10px;
        }
        .error-message {
            color: #ff4b2b;
            margin-top: 5px;
            font-size: 14px;
            font-weight: bold;
            text-shadow: 0px 0px 10px rgba(255, 75, 43, 0.5);
            display:none;
            animation: fadeIn 1.2s ease-in-out;
        }
        #error-message{
            margin-top: 5px;
        }
        #password_state{
            display:none;
        }
        #password_state span{
            font-size: 12px;
            margin: 1px 8px;
            font-weight: bold;
            text-shadow: 0px 0px 10px rgba(255, 75, 43, 0.5);
          animation: fadeIn 1.2s ease-in-out;
        }
        #password_state .failed{
            color: #ff4b2b !important;
          animation: fadeIn 1.2s ease-in-out;
        }
        #password_state .success{
            color: #2bff4b !important;
          animation: fadeIn 1.2s ease-in-out;
        }
        .file-upload {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom:5px;
        }

        .file-upload input[type="file"] {
            display: none; 
        }

        .file-upload label {
            background: linear-gradient(135deg, #ff416c, #ff4b2b);
            color: white;
            padding: 5px 20px;
            font-size: 13px;
            font-weight: bold;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0px 0px 10px rgba(255, 75, 43, 0.5);
            text-transform: uppercase;
        }

        .file-upload label:hover {
            background: linear-gradient(135deg, #ff4b2b, #ff416c);
            box-shadow: 0px 0px 20px rgba(255, 75, 43, 0.8);
            transform: scale(1.05);
        }

        #fileName {
            color: white;
            font-size: 14px;
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

        .verify-false, .verify-true {
          font-size: 20px;
          padding: 4px 8px;
          border-radius: 5px;
          transition: all 0.3s ease;
          position: absolute;
          right: 10px;
          top: 50%;
          transform: translateY(-50%);
          display: flex;
          justify-content: center;
          align-items: center;
          min-width: 80px;
          text-align: center;
          animation: appear 2s ease-in-out;
        }

        @keyframes appear {
            from {
                opacity: 0;
                transform: translateY(-100%);
            }
            to {
                opacity: 1;
                transform: translateY(-50%);
            }
        }

        .verify-true {
          color: rgb(0, 255, 0);
        }

        .verify-false {
          color: #ff4b2b;
        }

    </style>
</head>
<body>
<div class="login-container">
    <h2>Sign up</h2>
    <form id="signForm" method="POST" action="DB_Ops.php" onsubmit="return full_validation(event)">
        <div id="group">
            <input type="text" id="fullName" name="name" placeholder="Full Name" required>
            <input type="text" id="userName" name="user" placeholder="Username" required>
        </div>

        <div id="group">
            <input type="tel" id="PhoneNum" name="pnum" placeholder="Phone Number" required>
        </div>

        <div id="group">
          <input type="tel" id="whatsappNum" name="" placeholder="Whatsapp Number" name="wnum" required>
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
        <p class="error-message" id="confirmPassERR" >the passwords doesn't match</p>
        <input type="password" id="confPassword" placeholder="Confirm Password" required>

        <div class="file-upload">
            <input type="file" id="fileInput" accept="image/*">
            <label for="fileInput">Select a profile photo</label>
            <span id="fileName">No photo selected</span>
        </div>

        <button type="submit">Sign Up</button>
    </form>
</div>

<script src="main.js"></script>
</body>
</html>
