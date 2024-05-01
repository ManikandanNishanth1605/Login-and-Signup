<?php
require_once "includes/session.inc.php";
require_once "includes/signup_view.inc.php";
require_once "includes/login_view.inc.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Signup</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        form {
            margin: 20px auto;
            padding: 20px;
            width: 300px;
            background-color: #f4f4f4;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <h3> <?php output_username() ?> </h3>

    <h2>Login</h2>
    <form action="includes/login.inc.php" method="POST">
        <label for="login-username">Username:</label>
        <input type="text" id="login-username" name="login-username">

        <label for="login-password">Password:</label>
        <input type="password" id="login-password" name="login-password">

        <input type="submit" value="Login">
    </form>

    <?php
    check_login_errors();
    ?>

    <h2>Sign Up</h2>
    <form action="includes/signup.inc.php" method="POST">
        <label for="signup-username">Username:</label>
        <input type="text" id="signup-username" name="signup-username">

        <label for="signup-email">Email:</label>
        <input type="text" id="signup-email" name="signup-email">

        <label for="signup-password">Password:</label>
        <input type="password" id="signup-password" name="signup-password">

        <!-- <label for="signup-confirm-password">Confirm Password:</label>
        <input type="password" id="signup-confirm-password" name="signup-confirm-password"> -->

        <input type="submit" value="Sign Up">
    </form>

    <?php
    check_signup_errors();
    ?>

    <h2>Logout</h2>
    <form action="includes/logout.inc.php" method="POST">

        <input type="submit" value="Logout">
    </form>
</body>
</html>
