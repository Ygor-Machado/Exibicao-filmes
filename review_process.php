<?php

    require_once("globals.php");
    require_once("db.php");
    require_once("models/Movie.php");
    require_once("models/Message.php");
    require_once("dao/MovieDAO.php");
    require_once("dao/UserDAO.php");

    $message = new Message($BASE_URL);
    $movieDAO = new MovieDAO($conn, $BASE_URL);
    $userDAO = new UserDAO($conn, $BASE_URL);

    // Resgata dados do usúario
    $userData = $userDAO->verifyToken(true);

    // Recebendo o tipo do formulário
    $type = filter_input(INPUT_POST, "type");

    if($type === "create") {

    }