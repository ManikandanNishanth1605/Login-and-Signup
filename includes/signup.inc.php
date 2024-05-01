<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // $firstName = htmlspecialchars($_POST["signup-firstname"]);
    $userName = ($_POST["signup-username"]);
    // $lastName = htmlspecialchars($_POST["signup-lastname"]);
    $eMail = ($_POST["signup-email"]);
    $password = ($_POST["signup-password"]);

    try {
        require_once "dbh.inc.php";
        require_once "signup_model.inc.php";
        require_once "signup_control.inc.php";
        require_once "signup_view.inc.php";
        
        // ERROR HANDLING
        $errors = [];

        if (is_input_empty($userName, $password, $eMail)) {
            $errors["empty_inputs"] = "Fill all the fields";
        }

        if (is_email_invalid($eMail)) {
            $errors["invalid_email"] = "Invalid email address";
        }
        if (is_username_taken($pdo, $userName)) {
            $errors["user_taken"] = "Username already taken";
        }
        if (is_email_registered($pdo, $userName)) {
            $errors["email_taken"] = "Email already taken";
        }

        require_once "session.inc.php";
        header("Location: ../index.php");

        if ($errors) {
            $_SESSION["errors_signup"] = $errors;
            header("Location: ../index.php");
            die();
        }

        create_user($pdo, $eMail, $userName, $password);

        header("Location: ../index.php?signup=success");

        $pdo = null;
        $stmt = null;

        die();

    } catch (PDOException $e) {
        die("Query failed: ". $e->getMessage());
    }


} else {
    header("Location: ../index.php");
    die();
}