<?php

function menu_dados()
{    
    if ($result1['TIPO_USUARIO'] == 'ADM') {
        echo '
        <li class="quicklinks">
        <a href="dados.php">
            <i class="material-icons">apps</i>
        </a>
        </li>';
    } elseif ($result1['MURAL'] == 'S') {
        echo '
        <li class="quicklinks">
        <a href="dados.php">
            <i class="material-icons">apps</i>
        </a>
        </li>';
    } elseif ($result1['GESTOR'] == 'S') {
        echo '
        <li class="quicklinks">
        <a href="dados.php">
            <i class="material-icons">apps</i>
        </a>
        </li>';
    }                         
}

