<?php 
include "../config.php";
session_start();
if(isset($_SESSION['logged_in_user'])){
header("Location:dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutrio Admin</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: sans-serif;
        }

        body {
            min-height: 100vh;
            background-color: #f5f5f5;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            width: 100%;
            max-width: 340px;
            margin: 0 10px;
            background: #fff;
            padding: 30px;
            border-radius: 5px;
        }

        .error {
            width: 100%;
            max-width: 340px;
            margin: 0 10px;
            background: #ff000033;
            color: red;
            padding: 10px;
            border-bottom: 1px solid #ccc;
            border-radius: 5px 5px 0 0;
        }

        .form-title {
            margin-bottom: 30px;
            text-align: center;
            font-size: 22px;
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
        }

        .form-control label {
            text-transform: capitalize;
            margin-bottom: 3px;
        }

        .form-control input {
            padding: 7px 10px;
            border-radius: 7px;
            outline: none;
            border: none;
            border: 1px solid #c5c5c5;
        }

        .submit-btn {
            width: 100%;
            text-transform: uppercase;
            padding: 7px 10px;
            border-radius: 7px;
            outline: none;
            border: none;
            cursor: pointer;
            color: #fff;
            background: #ff0076;
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <?php

    // $result['error_msg'] = "Account with this email does not exist. Please try again with different email account";

    $error = "";
    $email = "";
    $password = "";
    $result['error_msg'] = "An unexpected error has happend.";
    if (isset($_POST['submit'])) {

        if (isset($_POST['password']) && !empty($_POST['password'])) {
            $password = $_POST['password'];
        } else {
            $error = "Please enter your password";
        }

        if (isset($_POST['email']) && !empty($_POST['email'])) {
            $email = $_POST['email'];
        } else {
            $error = "Please enter your email";
        }

        if (empty($error)) {
            $user = "SELECT * FROM admin WHERE user_email='{$email}'";
            if($result = mysqli_query($conn,$user)){
                if(mysqli_num_rows($result) > 0){
                    $user_data = mysqli_fetch_assoc($result);

                    if(md5($password)===$user_data['user_password']){
                        $_SESSION['logged_in_user'] = $user_data['user_id'];
                        header("Location:dashboard.php");
                    }else{
                        $error = "Your password is incorrect.";
                    }

                }else{
                    $error = "Account with this email does not exists";
                }
            }
        }
    }

    ?>
    <?php
    if (!empty($error)) :
    ?>
        <div class="error">
            <?= $error; ?>
        </div>
    <?php
    endif
    ?>


    <form class="login-container" action="" method="POST">
        <div class="form-title">Admin Panel</div>
        <div class="form-control">
            <label for="">Email</label>
            <input type="email" value="<?= $_POST['email'] ?? "" ?>" name="email" placeholder="Email">
        </div>
        <div class="form-control">
            <label for="">Password</label>
            <input type="password" name="password" placeholder="Password">
        </div>
        <input type="submit" value="log In" name="submit" class="submit-btn">
    </form>
</body>

</html>