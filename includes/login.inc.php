<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // $firstName = htmlspecialchars($_POST["signup-firstname"]);
    $UserName = ($_POST["login-username"]);
    // $lastName = htmlspecialchars($_POST["signup-lastname"]);
    $Password = ($_POST["login-password"]);

    try {

        require_once "dbh.inc.php";
        require_once "login_model.inc.php";
        require_once "login_control.inc.php";

        // ERROR HANDLING
        $errors = [];

        if (is_input_empty($Password, $UserName)) {
            $errors["empty_inputs"] = "Fill all the fields";
        }

        $result = get_user($pdo, $UserName);

        if (is_username_wrong($result)) {
            $errors["wrong_user"] = "No username found";
        }

        if (!is_username_wrong($result) && is_password_wrong($Password, $result["PWD"])) {
            $errors["wrong_user"] = "Incorrect credentials";
        }

        require_once "session.inc.php";

        if ($errors) {
            $_SESSION["errors_login"] = $errors;
            header("Location: ../index.php");
            die();
        }

        $newSessionId = session_create_id();
        $sessionId = $newSessionId . "_" . $result["ID"];
        session_id($sessionId);

        $_SESSION["user_id"] = $result["ID"];
        $_SESSION["user_username"] = htmlspecialchars($result["USERNAME"]);
        $_SESSION["last_regeneration"] = time();

        header("Location: ../welcome.html?login=success");
        $pdo = null;
        $statement = null;

        die();

    } catch (PDOException $e) {
        die("Query failed: ". $e->getMessage());
    }

} else {
    header("Location: ../index.php");
    die();
}