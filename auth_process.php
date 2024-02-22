<?php

require_once("globals.php");
require_once("db.php");
require_once("models/User.php");
require_once("models/Message.php");
require_once("dao/UserDAO.php");

$message = new Message($BASE_URL);
$userDAO = new UserDAO($conn, $BASE_URL);

// Verifica o tipo do formulário

$type = filter_input(INPUT_POST, "type");

// Verificação do tipo de formulário

if($type === "register") {

    $name = filter_input(INPUT_POST, "name");
    $lastname = filter_input(INPUT_POST, "lastname");
    $email = filter_input(INPUT_POST, "email");
    $password = filter_input(INPUT_POST, "password");
    $confirmpassword = filter_input(INPUT_POST, "confirmpassword");

    // Verificação de dados mínimos
    if($name && $lastname && $email && $password) {

        // Verificar se as senhas batem
        if($password === $confirmpassword) {
            // Verificar se o email ja está cadastrado no sistema
            if($userDAO->findByEmail($email) === false) {

                $user = new User();

                // Criação de token e senha
                $userToken = $user->generateToken();
                $finalPassword = $user->generatePassword($password);

            } else {
                $message->setMessage("Usuario já cadastrado, tente outro email", "error", "back");
            }

        } else {
            $message->setMessage("As senhas não são iguais", "error", "back");
        }

    } else {

        // Enviar uma msg de erro, usuário já existe
        $message->setMessage("Preencha todos os dados", "error", "back");

    }

} else if($type === "login") {



}