<?php
require_once "../config/database.php";
session_start();

if (isset ($_POST['confirm']) ) {

    if ($stmt = $conn->prepare('SELECT email, password ,type FROM user WHERE email = ?')) {
        $stmt->bind_param('s', $_POST['user_email']);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result( $email, $password ,$type);
            $stmt->fetch();
            $post_phone=$_POST['user_num'];
            $sql="SELECT `contact_no` FROM `user` WHERE user.email = '".$_POST['user_email']."' ;";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $cus_phone=$row["contact_no"];
            $email= $_POST['user_email'];
            if($cus_phone==$post_phone){
                header('Location: reset_password.php?email=".$row["schedule_id"]."');
            }else{
                echo "<script>alert('Incorrect Phone Number');document.location='forgot_password.php'</script>";
            }
        } else {
        echo "<script>alert('Incorrect Email');document.location='forgot_password.php'</script>";
        }
        $stmt->close();
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
        <title>Forgot Password Page </title>
        <link rel="stylesheet" href="fp.css">
    </head>
    <body>
        <div class="row">
            <h1>Forgot Password</h1>
            <h6 class="information-text">Enter your registered email and phone number to reset your password.</h6>
            <br>
            <div class="form-group">
                <form method="post">
                    <p><label for="username">Email</label></p>
                    <input type="email" name="user_email" id="user_email" required="">
                    <p><label for="username">Phone Number</label></p>
                    <input type="tel" name="user_num" id="user_num" required="">
                    
                    
                    <input type="submit" name="confirm" id="confirm" value="Confirm Details">
                </form>
            </div>
            <div class="footer">
                <h5>New here? <a href="login.php">Sign Up.</a></h5>
                <h5>Already have an account? <a href="login.php">Sign In.</a></h5>
                <p class="information-text"><span class="symbols" title="Bus Ticket Resevation System">&hearts; </span><a href="https://www.facebook.com/adedokunyinka.enoch" target="_blank" title="Connect with me on Facebook">Bus Ticket Resevation System</a></p>
            </div>
        </div>
    </body>
</html>