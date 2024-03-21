<?php

declare(strict_types=1);

function get_username(object $pdo, string $username)
{
    $query = "SELECT username FROM users WHERE username = :username;";
    //to prevent from sql injection
    $stmt = $pdo->prepare($query);
    //bind the data
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
    //return $result["username"];
}

function get_email(object $pdo, string $email)
{
    $query = "SELECT username FROM users WHERE email = :email;";
    //to prevent from sql injection
    $stmt = $pdo->prepare($query);
    //bind the data
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;

}

function set_user(object $pdo, string $username, string $email, string $pwd)
{
    $query = "INSERT INTO users (username, pwd, email) VALUES (:username, :pwd, :email);";
    //to prevent from sql injection
    $stmt = $pdo->prepare($query);

    //to slowd down the bruteforce
    $options = [
        'cost' => 12
    ];
    $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

    //bind the data
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":pwd", $hashedPwd);
    $stmt->execute();

}