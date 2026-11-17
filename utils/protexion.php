<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function protegerPagina(): void
{
    if (!isset($_SESSION["usuario"]) || $_SESSION["usuario"] === "") {
        header("Location: Login.php");
        exit;
    }
}

protegerPagina();