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
    $arquivo = fopen ('http://intranet.aniger/paineis/Modelos.txt', 'r');
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

//Exibe o menu lateral das páginas WEB
function exibe_menu_lateral($id_foco)
{
    //Abre conexão com o banco de dados
    $host="10.0.0.2";
    $service="//10.0.0.2:1521/orcl";
    $id=$_SESSION['usuarioId'];
    $conn= new \PDO("oci:host=$host;dbname=$service","INTRANET","ifnefy6b9");
    //Insere o menu lateral
    echo '<p class="menu-title sm">MENU <span class="pull-right"><a href="javascript:;"><i class="material-icons">refresh</i></a></span></p>
          <ul>';
    if($id_foco == "index.php"){
      echo '  <li class="start active"> 
                <a href="index.php"><i class="material-icons" title="Home">home</i> <span class="title">Home</span> <span class="title"></span> </a>
              </li>';
    } else {
      echo '  <li class=""> 
                <a href="index.php"><i class="material-icons" title="Home">home</i> <span class="title">Home</span> <span class="title"></span> </a>
              </li>';
    }
    if($id_foco == "chamados.php"){
      echo '  <li class="start active">
                <a href="chamados.php"><i class="material-icons" title="Chamados">desktop_mac</i> <span class="title">Chamados</span></a>
              </li>';
    } else {
      echo '  <li class="">
                <a href="chamados.php"><i class="material-icons" title="Chamados">desktop_mac</i> <span class="title">Chamados</span></a>
              </li>';
    }
    if($id_foco == "ramais.php"){
      echo '  <li class="start active"> 
                <a href="ramais.php"><i class="material-icons" title="Ramais">phone_forwarded</i> <span class="title">Ramais</span></a>
              </li>';
    } else {
      echo '  <li class="">
                <a href="ramais.php"><i class="material-icons" title="Ramais">phone_forwarded</i> <span class="title">Ramais</span></a>
              </li>';
    }
    if($id_foco == "agenda.php"){
      echo '  <li class="start active"> 
                <a href="agenda.php"><i class="fa fa-calendar" title="&uacute;teis"></i> <span class="title">Agenda</span></a>
              </li>';
    } else {
      echo '  <li class="">
                <a href="agenda.php"><i class="fa fa-calendar" title="&uacute;teis"></i> <span class="title">Agenda</span></a>
              </li>';
    }
    if($id_foco == "cadastros.php"){
      echo '  <li class="start active"> 
                <a href="cadastros.php"><i class="material-icons" title="Cadastros">library_add</i> <span class="title">Cadastros</span></a>
              </li>';
    } else {
      echo '  <li class=""> 
                <a href="cadastros.php"><i class="material-icons" title="Cadastros">library_add</i> <span class="title">Cadastros</span></a>
              </li>';
    }
    if($id_foco == "solicitacoes.php"){
      echo '  <li class="start active"> 
                <a href="solicitacoes.php"><i class="material-icons" title="Solicita&ccedil;&otilde;es">assignment</i> <span class="title">Solicita&ccedil;&otilde;es</span></a>
              </li>';
    } else {
      echo '  <li class=""> 
                <a href="solicitacoes.php"><i class="material-icons" title="Solicita&ccedil;&otilde;es">assignment</i> <span class="title">Solicita&ccedil;&otilde;es</span></a>
              </li>';
    }
    if($id_foco == "uteis.php"){
      echo '  <li class="start active"> 
                <a href="uteis.php"><i class="fa fa-external-link" title="&uacute;teis"></i> <span class="title">Links &uacute;teis</span></a>
              </li>';
    } else {
      echo '  <li class=""> 
                <a href="uteis.php"><i class="fa fa-external-link" title="&uacute;teis"></i> <span class="title">Links &uacute;teis</span></a>
              </li>';
    }
    //Verifica se o usuário possui acesso aos indicadores da INTRANET
    $query01 = "SELECT * FROM in_usuarios_paineis WHERE id_usu = :idUSU";
    $stmt01 = $conn->prepare($query01);
    $stmt01->bindValue(':idUSU',$id);
    $stmt01->execute();
    $result01=$stmt01->fetch(PDO::FETCH_ASSOC);
    //Se o usuário possui acesso aos indicadores da INTRANET
    if(! empty($result01)){
      if($id_foco == "indicadores.php"){
        echo '  <li class="start active"> 
                  <a href="indicadores.php"><i class="fa fa-bar-chart" title="Indicadores"></i> <span class="title">Indicadores</span></a>
                </li>';
      } else {
        echo '  <li class=""> 
                  <a href="indicadores.php"><i class="fa fa-bar-chart" title="Indicadores"></i> <span class="title">Indicadores</span></a>
                </li>';
      }
    }
    //Finaliza o menu lateral
    echo '</ul>
          <div class="clearfix"></div>';          
}
