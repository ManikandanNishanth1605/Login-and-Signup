<?php

if ($_SERVER["REQUEST_METHOD"]=="POST") {
    // $firstName = htmlspecialchars($_POST["signup-firstname"]);
    $userName = ($_POST["signup-username"]);
    // $lastName = htmlspecialchars($_POST["signup-lastname"]);
    $eMail = ($_POST["signup-email"]);
    $password = ($_POST["signup-password"]);
    // $cpassword = htmlspecialchars($_POST["signup-confirm-password"]);

    try {
        require_once "dbh.inc.php";
        
        $query = "INSERT INTO users (USERNAME, PWD, EMAIL) VALUES (?, ?, ?);";
        // $query = "INSERT INTO users (USERNAME, PWD, EMAIL) VALUES (:username, :pwd, :email);";
        $stmt = $pdo->prepare($query);
        // $stmt->bindParam(".username",$username)
        $stmt->execute([$userName,$password,$eMail]);
        $pdo = null;
        $stmt = null;
        header("Location: ../index.php");
        exit();

    } catch (PDOException $e) {
        die("Connection failed: ". $e->getMessage());
    }

    // echo "These are the inputs";
    // echo $firstName;
    // echo $userName;
    // echo $eMail;


} else {
    header("Location: ../index.php");
}