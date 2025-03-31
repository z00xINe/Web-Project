<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
</head>
<body>
<div class="container d-flex justify-content-center align-items-center reg_container">
    <form class="p-4 rounded form-container" style="max-width: 500px;">
        <h3 class="text-center mb-4">Register</h3>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-md-6">
                <label class="form-label">Phone Number</label>
                <input type="tel" class="form-control">
            </div>
            <div class="mb-3 col-md-6">
                <label class="form-label">WhatsApp Number</label>
                <input type="tel" class="form-control">
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Address</label>
            <input type="text" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Password
                <div id="password_state">
                    <span>8 Letters</span>
                    <span>contain a number</span>
                    <span>contain special character</span>
                </div>
            </label>
            <input type="password" id="password" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Confirm Password
                <div class="err" id="confirm_pass_err"><span>The passwords doesn't match</span></div>
            </label>
            <input type="password" class="form-control" id="confirm_pass">
        </div>
        <div class="mb-3">
            <label class="form-label">User Image</label>
            <input type="file" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Email
                <div class="err"><span>Email error</span></div>
            </label>
            <input type="text" class="form-control" id="email">
        </div>
        <button type="submit" class="btn btn-primary w-100 mb-3">Register</button>
        <button type="submit" class="btn btn-primary w-100">Back to login</button>
    </form>
</div>
<script src="js/jquery-3.7.1.min.js"></script>
<script src="js/main.js"></script>
<?php

    

?>
</body>
</html>
