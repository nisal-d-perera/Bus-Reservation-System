<?php
require_once "../config/database.php";
session_start();

if (isset ($_POST['signin']) ) {

    if ($stmt = $conn->prepare('SELECT email, password ,type, status FROM user WHERE email = ?')) {
        $stmt->bind_param('s', $_POST['email']);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result( $email, $password ,$type, $status);
            $stmt->fetch();
            $post_password=$_POST['password'];
            if ($post_password== $password) { 
                session_regenerate_id();
                $_SESSION['login']=$_POST['email'];
                $_SESSION['email'] =$email;
                if ($status == "Active"){
                    if ($type == "admin"){
                        header('Location: ../Admin/index.php');
                    }
                    else if($type == "driver") {
                        header('Location: ../Driver/index.php');
                    }
                    else if($type == "customer") {
                        header('Location: ../Customer/index.php');
                    }
                }
                else{
                    echo "<script>alert('You cannot access to the system. Your account has been deactivated');document.location='login.php'</script>";
                }
            } 
            else {
                echo "<script>alert('Incorrect Password');document.location='login.php'</script>";
            }
        } else {
        echo "<script>alert('Incorrect Email');document.location='login.php'</script>";
        }
        $stmt->close();
    }

}
if (isset ($_POST['signup']) ) {

    if ($stmt = $conn->prepare('SELECT email, password ,type FROM user WHERE email = ?')) {
        $stmt->bind_param('s', $_POST['c_email']);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
        echo "<script>alert('Email Already Exist');document.location='Login.php'</script>";
        } else {

            $cus_name=$_POST['c_name'];
            $cus_phone=$_POST['c_tel'];
            $cus_email=$_POST['c_email'];
            $cus_pass=$_POST['c_pass'];
            $cus_repass=$_POST['c_repass'];
            $date = date("Y-m-d");

            if ($cus_pass == $cus_repass){

                $sql="INSERT INTO `user`( `email`, `password`,`name`,`contact_no`,`reg_date`, `type`,`status`) 
                        VALUES ('$cus_email','$cus_pass','$cus_name','$cus_phone','$date','customer','Active')";
                $conn->query($sql);

                $sql="INSERT INTO `customer`(`customer_no`, `email`) 
                        VALUES ('','$cus_email')";
                $conn->query($sql);
 
                


                echo "<script>alert('Account Successfully Created');document.location='login.php'</script>";
            }
            else {
                echo "<script>alert('Password Dismatch');document.location='login.php'</script>";
            }
        } 
        $stmt->close();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTR System</title>
    <link rel="stylesheet" href="login.css">

</head>
<body>

    <h2>Bus Ticket Reservation System</h2>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form method="post">
                <h1>Create Account</h1>
                <input type="text" placeholder="Name" name="c_name" id="c_name" required=""/>
                <input type="tel" placeholder="Contact Number (07X-XXXXXXX)" pattern="[0]{1}[7]{1}[0-9]{1}-[0-9]{7}" name="c_tel" id="c_tel" required=""/>
                <input type="email" placeholder="Email" name="c_email" id="c_email" required=""/>
                <input type="password" placeholder="Password" minlength="8" name="c_pass" id="c_pass" required=""/>
                <input type="password" placeholder="Repeat password" minlength="8" name="c_repass" id="c_repass" required=""/>
                <input type="submit" name="signup" value="SIGN UP"
                style = "background-color: #FF4B2B;">
                
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form method="post">
                <h1>Sign In</h1>
                <input type="email" name="email" placeholder="Email" required=""/>
                <input type="password" name="password" placeholder="Password" minlength="8" required=""/>
                
                <input type="submit" name="signin" value="SIGN IN"
                style = "background-color: #FF416C">
                
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
    <script src="login.js"></script>
</body>
</html>