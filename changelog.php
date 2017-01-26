<?php
require_once("assets/php/class/class.seg.php");
session_start();
proteger();

$host="10.0.0.2";
$service="//10.0.0.2:1521/orcl";
$id=$_SESSION['usuarioId'];
$conn= new \PDO("oci:host=$host;dbname=$service","INTRANET","ifnefy6b9");

$query1 = "SELECT USR.EMAIL, USR.TIPO_USUARIO, USR.SETOR, USR.IMG_PERFIL, IMG.IMAGEM,
    CASE
     WHEN USR.SETOR IN (SELECT SIGLA FROM IN_SETORES SETO, IN_MURAL MUR WHERE MUR.SETOR = SETO.SIGLA)
     THEN 'S'
     ELSE 'N'
     END AS MURAL
FROM 
    IN_USUARIOS USR, 
    IN_IMAGENS IMG 
WHERE 
    USR.IMG_PERFIL = IMG.ID AND USR.ID =:id";

//#1
$stmt1 = $conn->prepare($query1);
$stmt1->bindValue(':id',$id);
$stmt1->execute();
$result1=$stmt1->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Aniger - Vers&otilde;es</title>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN PLUGIN CSS -->
    <link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="assets/plugins/bootstrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/bootstrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/animate.min.css" rel="stylesheet" type="text/css" />
    <!-- <link href="assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" /> -->
    <!-- END PLUGIN CSS -->
    <!-- BEGIN CORE CSS FRAMEWORK -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="webarch/css/webarch.css" rel="stylesheet" type="text/css" />
    <!-- END CORE CSS FRAMEWORK -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">
  </head>
  <body class="">
    <!-- BEGIN HEADER -->
    <div class="header navbar navbar-inverse ">
      <!-- BEGIN TOP NAVIGATION BAR -->
      <div class="navbar-inner">
        <div class="header-seperation">
          <ul class="nav pull-left notifcation-center visible-xs visible-sm">
            <li class="dropdown">
              <a href="#main-menu" data-webarch="toggle-left-side">
                <i class="material-icons">menu</i>
              </a>
            </li>
          </ul>
          <!-- BEGIN LOGO -->
          <a href="index.php">
            <img src="assets/img/logo.png" class="logo" alt="" data-src="assets/img/logo.png" data-src-retina="assets/img/logo.png" width="106" height="21" />
          </a>
          <!-- END LOGO -->
          <ul class="nav pull-right notifcation-center">
            <li class="dropdown hidden-xs hidden-sm">
              <a href="index.php" class="dropdown-toggle active" data-toggle="">
                <i class="material-icons">home</i>
              </a>
            </li>
            <li class="dropdown hidden-xs hidden-sm">
              <a href="chamados.php" class="dropdown-toggle">
                <i class="material-icons">desktop_mac</i><!-- <span class="badge bubble-only"></span> -->
              </a>
            </li>
            <!--<li class="dropdown visible-xs visible-sm">
              <a href="#" data-webarch="toggle-right-side">
                <i class="material-icons">chat</i>
              </a>
            </li>-->
          </ul>
        </div>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <div class="header-quick-nav">
          <!-- BEGIN TOP NAVIGATION MENU -->
          <div class="pull-left">
            <ul class="nav quick-section">
              <li class="quicklinks">
                <a href="#" class="" id="layout-condensed-toggle">
                  <i class="material-icons">menu</i>
                </a>
              </li>
            </ul>
            <ul class="nav quick-section">
              <li class="quicklinks  m-r-10">
                <a href="javascript:history.go(0)" class="">
                  <i class="material-icons">refresh</i>
                </a>
              </li>
              <li class="quicklinks">
                <a href="#" class="" id="my-task-list" data-placement="bottom" data-content='' data-toggle="dropdown" data-original-title="Novidades">
                  <i class="material-icons">notifications_none</i>
                  <span class="badge badge-important bubble-on  ly"></span>
                </a>
              </li>
              <li class="quicklinks"> <span class="h-seperate"></span></li>
              <?php
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
                }                  
              ?>
              <!--<li class="m-r-10 input-prepend inside search-form no-boarder">
                <span class="add-on"> <i class="material-icons">search</i></span>
                <input name="" type="text" class="no-boarder " placeholder="Buscar" style="width:250px;">
              </li>-->
            </ul>
          </div>
          <div id="notification-list" style="display:none">
            <div style="width:220px">
            <a href="changelog.php">
              <div class="notification-messages info">
                <div class="user-profile">
                  <img src="assets/img/profiles/Aa.jpg" width="35" height="35">
                </div>
                <div class="message-wrapper">
                  <div class="heading" style="text-align:center;">
                    <?php
                      echo "Vers&atilde;o " . $_SESSION['versao']
                    ?>
                  </div>
                  <div class="description" style="text-align:center;">
                    Visualizar as novidades!
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
            </a>
            </div>
          </div>
          <!-- END TOP NAVIGATION MENU -->
          <!-- BEGIN CHAT TOGGLER -->
          <div class="pull-right">
            <!-- <div class="chat-toggler sm">
              <div class="profile-pic">
                <img src="assets/img/profiles/Aa.jpg" alt="" data-src="assets/img/profiles/Aa.jpg" data-src-retina="assets/img/profiles/Aa.jpg" width="35" height="35" />
                <div class="availability-bubble online"></div>
              </div>
            </div> -->
            <ul class="nav quick-section ">
              <li class="quicklinks">
                <a data-toggle="dropdown" class="dropdown-toggle  pull-right " href="#" id="user-options">
                  <i class="material-icons">tune</i>
                </a>
                <ul class="dropdown-menu  pull-right" role="menu" aria-labelledby="user-options">
                  <li class="">
                    <?php echo '<a href="perfil.php?id='.$id.'" title="Acesse seu perfil"><i class="fa fa-male fa-fw"></i>&nbsp;&nbsp;Meu perfil</a>';?>
                  </li>
                  <!-- <li class="disabled">
                    <a href="calender.php" title="Recurso ainda n&atilde;o implementado.">Calend&aacute;rio</a>
                  </li> -->
                  <!-- <li>
                    <a href="email.php"> My Inbox&nbsp;&nbsp;
                      <span class="badge badge-important animated bounceIn">2</span>
                    </a>
                  </li> -->
                  <li class="divider"></li>
                  <li>
                    <a href="login.php"><i class="material-icons">power_settings_new</i>&nbsp;&nbsp;Sair</a>
                  </li>
                </ul>
              </li>
              <!--<li class="quicklinks"> <span class="h-seperate"></span></li>-->
              <!--<li class="quicklinks">-->
                <!-- <a href="#" class="chat-menu-toggle" data-webarch="toggle-right-side"><i class="material-icons">chat</i><span class="badge badge-important hide">1</span> -->
                <!--<a href="#" class="chat-menu-toggle"><i class="material-icons" title="Recurso ainda n&atilde;o implementado.">chat</i><span class="badge badge-important hide">1</span>-->
                <!--</a>-->
                <!--<div class="simple-chat-popup chat-menu-toggle hide">-->
                  <!--<div class="simple-chat-popup-arrow"></div>
                  <div class="simple-chat-popup-inner">
                     <div style="width:100px">
                      <div class="semi-bold">David Nester</div>
                      <div class="message">Hey you there </div>
                    </div> -->
                  <!--</div>
                </div>
              </li>-->
            </ul>
          </div>
          <!-- END CHAT TOGGLER -->
        </div>
        <!-- END TOP NAVIGATION MENU -->
      </div>
      <!-- END TOP NAVIGATION BAR -->
    </div>
    <!-- END HEADER -->
    <!-- BEGIN CONTENT -->
    <div class="page-container row-fluid">
      <!-- BEGIN SIDEBAR -->
      <div class="page-sidebar " id="main-menu">
        <!-- BEGIN MINI-PROFILE -->
        <div class="page-sidebar-wrapper scrollbar-dynamic" id="main-menu-wrapper">
          <div class="user-info-wrapper sm">
            <div class="profile-wrapper sm">
              <?php
                echo '<img width="69" height="69" src="data:image/jpeg;base64,'.base64_encode(stream_get_contents($result1['IMAGEM'])).'">';
              ?>
              <div class="availability-bubble online"></div>
            </div>
            <div class="user-info sm">
              <div class="username"><span class="semi-bold"> <?php echo $_SESSION['usuarioNome']; ?> </span></div>
              <div class="status">Seja bem-vindo(a)</div>
            </div>
          </div>
          <!-- END MINI-PROFILE -->
          <!-- BEGIN SIDEBAR MENU -->
          <p class="menu-title sm">MENU <span class="pull-right"><a href="javascript:;"><i class="material-icons">refresh</i></a></span></p>
          <ul>
            <li class=""> 
              <a href="index.php"><i class="material-icons" title="Home">home</i> <span class="title">Home</span> <span class="title"></span> </a>
            </li>
            <li class=""> 
              <a href="chamados.php"><i class="material-icons" title="Chamados">desktop_mac</i> <span class="title">Chamados</span></a>
            </li>
            <li class=""> 
              <a href="ramais.php"><i class="material-icons" title="Ramais">phone_forwarded</i> <span class="title">Ramais</span></a>
            </li>
            <li class=""> 
              <a href="cadastros.php"><i class="material-icons" title="Cadastros">library_add</i> <span class="title">Cadastros</span></a>
            </li>
            <li class=""> 
              <a href="solicitacoes.php"><i class="material-icons" title="Solicita&ccedil;&otilde;es">assignment</i> <span class="title">Solicita&ccedil;&otilde;es</span></a>
            </li>            
          </ul>          
          <div class="clearfix"></div>
          <!-- END SIDEBAR MENU -->
        </div>
      </div>
      <a href="#" class="scrollup">Scroll</a>
      <div class="footer-widget">
        <div class="pull-left">
          <i class="material-icons">alarm</i>
          <iframe src="http://free.timeanddate.com/clock/i5hp9yxv/n595/tlbr5/fn17/fc555/tc22262e/pa0/th1" frameborder="0" width="66" height="14"></iframe>
        </div>
        <div class="pull-right">
          <!-- IMPLEMENTAR LOCKSCREEN -->
          <a href="login.php"><i class="material-icons">power_settings_new</i></a>
        </div>
      </div>
      <!-- END SIDEBAR -->

      <!-- CONTAINER -->

      <!-- NAVEGACAO -->

      <div class="page-content">
        <div class="content">
        <ul class="breadcrumb">
            <li>
              <p>VOC&Ecirc; EST&Aacute; EM </p>
            </li>
            <li>
            <a href="index.php">Home</a>
            </li>
            <li><a href="#" class="active">Vers&otilde;es</a> </li>
          </ul>

          <!-- CONTEÚDO -->

          <div class="page-title"> <i class="material-icons">extension</i>
            <h3>Hist&oacute;rico de vers&otilde;es </h3>
          </div>

        <div class="content" style="padding-top:0px;">
          <div class="row">
            <div class="col-md-10 col-vlg-8">
              <ul class="cbp_tmtimeline">

              <li>
                <time class="cbp_tmtime">
                  <span class="time text-success">1.3</span>
                  <span class="description">Sexta, 20 de janeiro de 2016 </span>
                </time>
                <div class="cbp_tmicon primary animated bounceIn"> <i class="fa fa-cubes"></i> </div>
                <div class="cbp_tmlabel">
                  <div class="p-t-10 p-l-30 p-r-20 p-b-20 xs-p-r-10 xs-p-l-10 xs-p-t-5">
                    <!--INICIO 1.3-->
                    <h4></h4>
                    <ul class="fa-ul">
                      <li><i class="fa-li fa fa-user"></i>Login</li>
                      <ul class="fa-ul">
                        <li><i class="fa-li fa fa-check-square-o"></i><span style="font-style: italic; font-size: 11px;">Tratamento para dados incorretos.</span></li>
                      </ul> 

                      <li><i class="fa-li fa fa-male"></i>Perfil</li>
                          <ul class="fa-ul">
                            <li><i class="fa-li fa fa-check-square-o"></i><span style="font-style: italic; font-size: 11px;">Permiss&otilde;es de acordo com o perfil do usu&aacute;rio.</span></li>
                            <li><i class="fa-li fa fa-check-square-o"></i><span style="font-style: italic; font-size: 11px;">Montagem do perfil com dados linkados. (visualiza&ccedil;&atilde;o do perfil dos colegas)</span></li>                             
                          </ul>

                      <li><i class="fa-li fa fa-home"></i>Home</li>
                          <ul class="fa-ul">
                            <li><i class="fa-li fa fa-check-square-o"></i><span style="font-style: italic; font-size: 11px;">Adicionado "Avisos do RH" no layout lista.</span></li>
                            <li><i class="fa-li fa fa-check-square-o"></i><span style="font-style: italic; font-size: 11px;">Adicionado "Mural do Marketing" no layout box.</span></li>
                            <li><i class="fa-li fa fa-check-square-o"></i><span style="font-style: italic; font-size: 11px;">Adicionados "Anivers&aacute;rios".</span></li>
                            <li><i class="fa-li fa fa-check-square-o"></i><span style="font-style: italic; font-size: 11px;">Adicionados "Vagas".</span></li>                             
                          </ul>

                        </ul> 
                        <!--FIM 1.3-->
                        </div>
                        <div class="clearfix"></div>
                    </div>
                  </li>

                <li>
                  <time class="cbp_tmtime">
                    <span class="time text-success">1.2</span>
                    <span class="description">S&aacute;bado, 8 de janeiro de 2017 </span>
                  </time>
                  <div class="cbp_tmicon primary animated bounceIn"> <i class="fa fa-cubes"></i> </div>
                  <div class="cbp_tmlabel">
                    <div class="p-t-10 p-l-30 p-r-20 p-b-20 xs-p-r-10 xs-p-l-10 xs-p-t-5">
                    <!--INICIO 1.2-->
                      <h4></h4>
                      <ul class="fa-ul">
                        <li><i class="fa-li fa fa-user"></i>Login</li>
                        <ul class="fa-ul">
                          <li><i class="fa-li fa fa-check-square-o"></i><span style="font-style: italic; font-size: 11px;">Login com valida&ccedil;&atilde;o de usu&aacute;rio.</span></li>
                        </ul>
                        <li><i class="fa-li fa fa-male"></i>Perfil</li>
                          <ul class="fa-ul">
                            <li><i class="fa-li fa fa-check-square-o"></i><span style="font-style: italic; font-size: 11px;">Criada p&aacute;gina de perfil do usu&aacute;rio.</span></li>
                            <li><i class="fa-li fa fa-check-square-o"></i><span style="font-style: italic; font-size: 11px;">Local para visualiza&ccedil;&atilde;o dos colegas de trabalho do usu&aacute;rio.</span></li>
                          </ul>                        
                        <li><i class="fa-li fa fa-plus-square"></i>Cadastros</li>
                          <ul class="fa-ul">
                            <li><i class="fa-li fa fa-check-square-o"></i><span style="font-style: italic; font-size: 11px;">Novos layouts para envio de Solicita&ccedil;&otilde;es por email: Clientes e Fornecedores.</span></li>
                          </ul>
                        <li><i class="fa-li fa fa-book"></i>Solicita&ccedil;&otilde;es</li>
                          <ul class="fa-ul">
                            <li><i class="fa-li fa fa-check-square-o"></i><span style="font-style: italic; font-size: 11px;">Novos layouts para envio de Solicita&ccedil;&otilde;es por email: Viagens e Ve&iacute;culos.</span></li>
                          </ul>
                        <li><i class="fa-li fa fa-file-o"></i>P&aacute;ginas</li>
                          <ul class="fa-ul">
                            <li><i class="fa-li fa fa-th"></i><span style="font-style: italic; font-size: 11px;">Nova p&aacute;gina: Dados</span></li>
                            <ul class="fa-ul">
                              <li><i class="fa-li fa fa-check-square-o"></i><span style="font-style: italic; font-size: 11px;">Criada p&aacute;gina menu para os cadastros.</span></li>
                            </ul>
                          </ul>
                          <li><i class="fa-li fa fa-th"></i>Dados</li>
                          <ul class="fa-ul">
                            <li><i class="fa-li fa fa-check-square-o"></i><span style="font-style: italic; font-size: 11px;">Consulta/Cadastro/Remo&ccedil;&atilde;o de Usu&aacute;rios.</span></li>
                            <li><i class="fa-li fa fa-check-square-o"></i><span style="font-style: italic; font-size: 11px;">Consulta/Cadastro/Remo&ccedil;&atilde;o de Setores.</span></li>
                            <li><i class="fa-li fa fa-check-square-o"></i><span style="font-style: italic; font-size: 11px;">Consulta/Cadastro/Remo&ccedil;&atilde;o de Locais.</span></li>
                            <li><i class="fa-li fa fa-check-square-o"></i><span style="font-style: italic; font-size: 11px;">Consulta/Cadastro/Remo&ccedil;&atilde;o de Murais e Postagens.</span></li>
                            <li><i class="fa-li fa fa-check-square-o"></i><span style="font-style: italic; font-size: 11px;">Consulta/Cadastro/Remo&ccedil;&atilde;o de Menus.</span></li>
                          </ul>
                        </ul>
                      <!--FIM 1.2-->
                      </div>
                      <div class="clearfix"></div>
                  </div>
                </li>
                
                <li>
                  <time class="cbp_tmtime">
                    <span class="time text-success">1.1</span>
                    <span class="description">Quarta, 14 de dezembro de 2016 </span>
                  </time>
                  <div class="cbp_tmicon primary animated bounceIn"> <i class="fa fa-cubes"></i> </div>
                  <div class="cbp_tmlabel">
                    <div class="p-t-10 p-l-30 p-r-20 p-b-20 xs-p-r-10 xs-p-l-10 xs-p-t-5">
                      <!--INICIO 1.1-->
                      <h4></h4>
                      <ul class="fa-ul">
                        <li><i class="fa-li fa fa-user"></i>Login</li>
                        <ul class="fa-ul">
                          <li><i class="fa-li fa fa-check-square-o"></i><span style="font-style: italic; font-size: 11px;">Adicionada TAG para representar a vers&atilde;o atual em release.</span></li>
                        </ul> 

                        <li><i class="fa-li fa fa-reorder"></i>Menu lateral</li>
                          <ul class="fa-ul">
                            <li><i class="fa-li fa fa-check-square-o"></i><span style="font-style: italic; font-size: 11px;">Adicionado rel&oacute;gio ao menu lateral (Hor&aacute;rio de Bras&iacute;lia).</span></li>
                          </ul>

                        <li><i class="fa-li fa fa-plus-square"></i>Cadastros</li>
                          <ul class="fa-ul">
                            <li><i class="fa-li fa fa-check-square-o"></i> <span style="font-style: italic; font-size: 11px;">Novos cadastros: Clientes, Fornecedores e Materiais (link interno).</span></li>
                          </ul>

                        <li><i class="fa-li fa fa-book"></i>Solicita&ccedil;&otilde;es</li>
                          <ul class="fa-ul">
                            <li><i class="fa-li fa fa-check-square-o"></i><span style="font-style: italic; font-size: 11px;">Novas Solicita&ccedil;&otilde;es: Viagens, Ve&iacute;culos, Notas e Manuten&ccedil;&atilde;o.</span></li>
                          </ul> 
                          </ul> 
                          <!--FIM 1.1-->
                          </div>
                          <div class="clearfix"></div>
                      </div>
                    </li>

                    <li>
                  <time class="cbp_tmtime">
                    <span class="time text-info">1.0</span>
                    <span class="description">Sexta, 2 de dezembro de 2016 </span>
                  </time>
                  <div class="cbp_tmicon success animated bounceIn"> <i class="fa fa-cubes"></i> </div>
                  <div class="cbp_tmlabel">
                    <div class="p-t-10 p-l-30 p-r-20 p-b-20 xs-p-r-10 xs-p-l-10 xs-p-t-5">
                      <!--INICIO 1.0-->
                      <h4></h4>
                      <ul class="fa-ul">
                        <li><i class="fa-li fa fa-user"></i>Login</li>
                        <ul class="fa-ul">
                          <li><i class="fa-li fa fa-check-square-o"></i><span style="font-style: italic; font-size: 11px;">Criada p&aacute;gina de boas vindas.</span></li>
                        </ul>

                        <li><i class="fa-li fa fa-reorder"></i>Menu lateral</li>
                        <ul class="fa-ul">
                          <li><i class="fa-li fa fa-desktop"></i><span style="font-style: italic; font-size: 11px;">Nova p&aacute;gina: Chamados</span></li>
                            <ul class="fa-ul">
                              <li><i class="fa-li fa fa-check-square-o"></i> <span style="font-style: italic; font-size: 11px;">Link direto para a consulta/cria&ccedil;&atilde;o de chamados para a nova plataforma helpdesk TomTicket no menu lateral.</span></li>                              
                            </ul>
                          <li><i class="fa-li fa fa-phone"></i><span style="font-style: italic; font-size: 11px;">Nova p&aacute;gina: Ramais</span></li>
                            <ul class="fa-ul">
                              <li><i class="fa-li fa fa-check-square-o"></i> <span style="font-style: italic; font-size: 11px;">Link para acesso a p&aacute;gina de ramais no menu lateral.</span></li>
                              <li><i class="fa-li fa fa-check-square-o"></i> <span style="font-style: italic; font-size: 11px;">Criada p&aacute;gina para visualiza&ccedil;&atilde;o dos ramais.</span></li>
                              <li><i class="fa-li fa fa-check-square-o"></i> <span style="font-style: italic; font-size: 11px;">Criadas "labels" para organizar os grupos/setores.</span></li>    
                            </ul>
                          <li><i class="fa-li fa fa-plus-square"></i><span style="font-style: italic; font-size: 11px;">Nova p&aacute;gina: Cadastros</span></li>
                            <ul class="fa-ul">
                              <li><i class="fa-li fa fa-check-square-o"></i> <span style="font-style: italic; font-size: 11px;">Link para acesso a p&aacute;gina de cadastros no menu lateral.</span></li>
                              <li><i class="fa-li fa fa-check-square-o"></i> <span style="font-style: italic; font-size: 11px;">Criada p&aacute;gina menu de cadastros.</span></li>
                            </ul>
                          <li><i class="fa-li fa fa-book"></i><span style="font-style: italic; font-size: 11px;">Nova p&aacute;gina: Solicita&ccedil;&otilde;es</span></li>
                            <ul class="fa-ul">
                              <li><i class="fa-li fa fa-check-square-o"></i> <span style="font-style: italic; font-size: 11px;">Link para acesso a p&aacute;gina de Solicita&ccedil;&otilde;es no menu lateral.</span></li>
                              <li><i class="fa-li fa fa-check-square-o"></i> <span style="font-style: italic; font-size: 11px;">Criada p&aacute;gina menu de Solicita&ccedil;&otilde;es.</span></li>
                            </ul>
                        </ul>
                        <li><i class="fa-li fa fa-file-o"></i>P&aacute;ginas</li>
                        <ul class="fa-ul"> 
                          <li><i class="fa-li fa fa-puzzle-piece"></i><span style="font-style: italic; font-size: 11px;">Nova p&aacute;gina: Vers&otilde;es</span></li>
                            <ul class="fa-ul">
                              <li><i class="fa-li fa fa-check-square-o"></i> <span style="font-style: italic; font-size: 11px;">Criada p&aacute;gina para "LOG" de novas vers&otilde;es.</span></li>
                            </ul>
                            </ul> 
                          </ul>
                          <!--FIM 1.0-->
                          </div>
                          <div class="clearfix"></div>
                      </div>
                    </li>
                    <!--FIM TIMELINE-->
                    </ul>
                  </div>
                </div>      
          </div>


          
          <!-- FIM CONTAINER -->

        </div>
      </div>
      
    </div>
    <!-- END CONTENT -->
    <!-- BEGIN CORE JS FRAMEWORK-->
    <script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
    <!-- BEGIN JS DEPENDECENCIES-->
    <script src="assets/plugins/jquery/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrapv3/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-block-ui/jqueryblockui.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
    <!-- END CORE JS DEPENDECENCIES-->
    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="webarch/js/webarch.js" type="text/javascript"></script>
    <script src="assets/js/chat.js" type="text/javascript"></script>
    <!-- END CORE TEMPLATE JS -->
  </body>
</html>