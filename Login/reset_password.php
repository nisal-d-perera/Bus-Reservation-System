<?php
require_once "../config/database.php";
session_start();

if (isset ($_POST['reset']) ) {

    $new_pass= $_POST['user_newpass'];
    $re_pass = $_POST['user_repass'];

    if ($new_pass == $re_pass) {

    }

}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Yinka Enoch Adedokun">
        <meta name="description" content="Simple Forgot Password Page Using HTML and CSS">
        <meta name="keywords" content="forgot password page, basic html and css">
        <title>Reset Password </title>
        <link rel="stylesheet" href="fp.css">
    </head>
    <body>
        <div class="row">
            <h1>Reset Password</h1>
            
            <br>
            <div class="form-group">
                <form method="post">
                    <p><label for="username">New Password</label></p>
                    <input type="password" name="user_newpass" id="user_newpass" required="">
                    <p><label for="username">Reset Password</label></p>
                    <input type="password" name="user_repass" id="user_repass" required="">
                    
                    <input type="submit" name="reset" id="reset" value="Reset Password">
                </form>
            </div>
            <div class="footer">
                <p class="information-text"><span class="symbols" title="Bus Ticket Resevation System">&hearts; </span><a href="https://www.facebook.com/adedokunyinka.enoch" target="_blank" title="Connect with me on Facebook">Bus Ticket Resevation System</a></p>
            </div>
        </div>
    </body>
</html>