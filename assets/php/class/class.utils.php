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

function retorna_link()
{
 $retorno = '<iframe width="100%" height="730" src="https://app.powerbi.com/view?r=eyJrIjoiNzBmYTA5NzYtZjU2OS00Y2MxLWJlOGItZGYzZWU0YmRjNTg4IiwidCI6IjI1MThjYTMxLWM4YjQtNDk4MS1iYWUwLTM1NDZjZTNjMDlmNiJ9" frameborder="0" allowFullScreen="false"></iframe>';
 return $retorno;
}
