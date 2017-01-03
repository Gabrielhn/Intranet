<?php

function proteger()
{
    if (!isset($_SESSION['usuarioEmail']) OR !isset($_SESSION['usuarioNome'])) {
    session_unset();
    header("Location: erro.html");
    }
}

