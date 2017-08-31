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

function pbi()
{
 $retorno = '<iframe width="100%" height="730" src="https://app.powerbi.com/view?r=eyJrIjoiODkxZDE1OGQtMTAwMy00MzlhLTk3N2QtM2EzMTUyY2E2ZjNhIiwidCI6IjI1MThjYTMxLWM4YjQtNDk4MS1iYWUwLTM1NDZjZTNjMDlmNiJ9"></iframe>';
 return $retorno;
}
