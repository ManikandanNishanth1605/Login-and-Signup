<?php

declare(strict_types = 1);

function get_user(object $pdo, string $username) {
    $query = "SELECT * FROM USERS WHERE USERNAME = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}