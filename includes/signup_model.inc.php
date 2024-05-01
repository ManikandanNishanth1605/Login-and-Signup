<?php

declare(strict_types = 1);

function get_username(object $pdo, string $username){
    $query = "SELECT USERNAME FROM USERS WHERE USERNAME = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function get_email(object $pdo, string $email) {
    $query = "SELECT EMAIL FROM USERS WHERE EMAIL = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function set_user(object $pdo, string $email, string $username, string $pwd) {
    $query = "INSERT INTO USERS (USERNAME,PWD,EMAIL) VALUES (:username, :pwd, :email);";
    $stmt = $pdo->prepare($query);

    $options = [
        'cost' => 12
    ];
    $hashedpwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":pwd", $hashedpwd);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}