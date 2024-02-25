<?php

require_once("globals.php");
require_once("db.php");
require_once("models/User.php");
require_once("models/Message.php");
require_once("dao/UserDAO.php");

$message = new Message($BASE_URL);
$userDAO = new UserDAO($conn, $BASE_URL);

// Resgata tipo do formulario
$type = filter_input(INPUT_POST, "type");

// Atualizar usuário
if($type === "update") {

    // Resgata dados do usuário
    $userData = $userDAO->verifyToken(true);

    // Resgata dados do post
    $name = filter_input(INPUT_POST, "name");
    $lastname = filter_input(INPUT_POST, "lastname");
    $email = filter_input(INPUT_POST, "email");
    $bio = filter_input(INPUT_POST, "bio");

    // Criar um novo objeto de usuario
    $user = new User();

    // Preencher os dados do usuário
    $userData->name = $name;
    $userData->lastname = $lastname;
    $userData->email = $email;
    $userData->bio = $bio;

    $userDAO->update($userData);

    // Atualizar Senha do usuario
} else if($type === "changepassword") {

} else {
    $message->setMessage("Ação inválida", "error", "index.php");
}