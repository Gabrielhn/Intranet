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

//Busca o painel BI que deverá exibir na página
function pbi($pbi_id)
{
    $arquivo = fopen ('C:\www\Intranet\paineis\Modelos.txt', 'r');
    for ($i=1; $i <= (base64_decode($pbi_id) - 1); $i++) { 
      fgets($arquivo, 2000);
    };
    $link = fgets($arquivo, 2000); 
    //Verifica se possui um link válido para o POWER_BI
    if (empty($link)) {
      $link_aux = 'http://intranet.aniger/erro_bi.html';
    } else {
      $link_aux = substr($link, 46);
      if($link_aux == "\r\n"){
          $link_aux = 'http://intranet.aniger/erro_bi.html';
      }  
    }
    fclose($arquivo);
    $retorno = '<iframe width="100%" height="650" src="'.$link_aux.'"></iframe>';
    return $retorno;
}
