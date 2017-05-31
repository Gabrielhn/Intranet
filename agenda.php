<?php
require_once("assets/php/class/class.seg.php");
session_start();
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
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
      END AS MURAL,
    CASE
      WHEN USR.ID IN (SELECT GESTOR FROM IN_SETORES WHERE GESTOR = :id)
      THEN 'S'
      ELSE 'N'
      END AS GESTOR
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
    <title>Aniger - Agenda</title>
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
    <link href='assets/plugins/fullcalendar/fullcalendar.css' rel='stylesheet' />
    <!-- <link href="assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" /> -->
    <!-- END PLUGIN CSS -->
    <!-- BEGIN CORE CSS FRAMEWORK -->
    <link href="assets/css/material.css" rel="stylesheet">
    <link href="webarch/css/webarch.css" rel="stylesheet" type="text/css" />
    <!-- END CORE CSS FRAMEWORK -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">
  </head>
  <body>
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
            <img src="assets/img/logo.png" class="logo" alt="" data-src="assets/img/logo.png" data-src-retina="assets/img/logo.png" width="103" height="21" />
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
                } elseif ($result1['GESTOR'] == 'S') {
                  echo '
                  <li class="quicklinks">
                    <a href="dados.php">
                      <i class="material-icons">apps</i>
                    </a>
                  </li>';
                } elseif ($result1['SETOR'] == 'RH' || $result1['SETOR'] == 'REC') {
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
                    <a href="logout.php"><i class="material-icons">power_settings_new</i>&nbsp;&nbsp;Sair</a>
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
            <li class="start active"> 
              <a href="agenda.php"><i class="fa fa-calendar" title="&uacute;teis"></i> <span class="title">Agenda</span></a>
            </li>
            <li class=""> 
              <a href="cadastros.php"><i class="material-icons" title="Cadastros">library_add</i> <span class="title">Cadastros</span></a>
            </li>
            <li class=""> 
              <a href="solicitacoes.php"><i class="material-icons" title="Solicita&ccedil;&otilde;es">assignment</i> <span class="title">Solicita&ccedil;&otilde;es</span></a>
            </li>
            <li class=""> 
              <a href="uteis.php"><i class="fa fa-external-link" title="&uacute;teis"></i> <span class="title">Links &uacute;teis</span></a>
            </li>
            <?php
              if ($result1['GESTOR'] == 'S' || $result1['TIPO_USUARIO'] == 'ADM') {
                echo 
                '<li class="">
                  <a href="indicadores.php"><i class="fa fa-bar-chart" title="Indicadores"></i> <span class="title">Indicadores</span></a>               
                </li>';
              }                
            ?>
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
          <a href="bloquear.php"><i class="material-icons">lock_outline</i></a>
        </div>
      </div>
      <!-- END SIDEBAR -->
      <!-- BEGIN PAGE CONTAINER-->
      <div class="page-content">
        <div class="content">
        <ul class="breadcrumb">
            <li>
              <p>VOC&Ecirc; EST&Aacute; EM </p>
            </li>
            <li>
            <a href="index.php">Home</a>
            </li>
            <li><a href="#" class="active">Agenda</a> </li>
          </ul>
          <!-- BEGIN PAGE TITLE -->
          <div class="page-title"> 
            <i class="fa fa-calendar" title="Agenda - Salas"></i>
            <h3>Agenda - Salas</h3>
          </div>
          <!-- END PAGE TITLE -->
          <!-- BEGIN PlACE PAGE CONTENT HERE -->

          <!-- TILE #1 -->
          <div class="col-md-3 col-sm-4 m-b-20">
            <div class="tiles blue blend weather-widget ">
              <div class="tiles-body">
                <a href="agsala1.php" style="color: #edeeef;">
                  <div class="heading">
                    <div class="pull-left">Sala de v&iacute;deo </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="big-icon">
                    <i class="fa fa-video-camera fa-7x fa-fw"></i>
                  </div>
                  <div class="clearfix"></div>
              </div>
                </a>
              <div class="tile-footer">
                <div class="pull-left">
                  <canvas id="" width="1" height="30"></canvas>
                  <span class=" small-text-description">&nbsp;&nbsp;
                  <!--<span class="label">PN</span>&nbsp;</span>-->
                </div>
                <div class="pull-right">
                  <canvas id="" width="1" height="28"></canvas>
                  <span style="cursor: pointer;" data-toggle="modal" data-target="#1Modal"><i class="fa fa-info fa-2x"></i> </span>
                </div>
                <div class="pull-right">
                  <canvas id="" width="32" height="32"></canvas>
                  <span class="text-white small-text-description"></span> 
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>

          <!-- MODAL #1 -->
          <div class="modal fade" id="1Modal" tabindex="-1" role="dialog" aria-labelledby="1ModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                  <br>
                  <i class="fa fa-info fa-6x"></i>
                  <h4 id="1ModalLabel" class="semi-bold">Informa&ccedil;&atilde;o.</h4>
                </div>
                <div class="modal-body">
                  <div class="alert alert-info">
                    <i class="pull-left material-icons">feedback</i>
                    <div style="padding-left: 30px;">
                      <p><span class="bold">Equipamentos dispon&iacute;veis:</span></p>
                      <!--<br/>-->
                      <p>- Televis&atilde;o 60 pol. (HDMI)</p>
                      <p>- Equipamento para videoconfer&ecirc;ncias (Polycom)</p>
                      <p>- Computador para chamadas via Skype.</p> 
                      <br/>
                      <p><span class="bold">Localiza&ccedil;&atilde;o:</span> Pr&eacute;dio novo - frente a Contabilidade</p>
                      <span class="bold">Lugares:</span> 12                                                                   
                    </div>    
                  </div>             
                </div>
              </div>
            </div>
          </div>

          <!-- TILE #2 -->
          <div class="col-md-3 col-sm-4 m-b-20">
            <div class="tiles blue blend weather-widget ">
              <div class="tiles-body">
                <a href="agsala2.php" style="color: #edeeef;">
                  <div class="heading">
                    <div class="pull-left">Skype </div>  
                    <div class="clearfix"></div>
                  </div>
                  <div class="big-icon">
                    <i class="fa fa-skype fa-7x fa-fw"></i>
                  </div>
                  <div class="clearfix"></div>
              </div>
                </a>
              <div class="tile-footer">
                <div class="pull-left">
                  <canvas id="" width="1" height="30"></canvas>
                  <span class=" small-text-description">&nbsp;&nbsp;
                  <!--<span class="label">CTB</span>&nbsp;</span>-->
                </div>
                <div class="pull-right">
                  <canvas id="" width="1" height="28"></canvas>
                  <span style="cursor: pointer;" data-toggle="modal" data-target="#2Modal"><i class="fa fa-info fa-2x"></i> </span>
                </div>
                <div class="pull-right">
                  <canvas id="" width="32" height="32"></canvas>
                  <span class="text-white small-text-description"></span> 
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>

          <!-- MODAL #2 -->
          <div class="modal fade" id="2Modal" tabindex="-1" role="dialog" aria-labelledby="2ModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                  <br>
                  <i class="fa fa-info fa-6x"></i>
                  <h4 id="2ModalLabel" class="semi-bold">Informa&ccedil;&atilde;o.</h4>
                </div>
                <div class="modal-body">
                  <div class="alert alert-info">
                    <i class="pull-left material-icons">feedback</i>
                    <div style="padding-left: 30px;">
                      <p><span class="bold">Equipamentos dispon&iacute;veis:</span></p>
                      <!--<br/>-->
                      <p>- Televis&atilde;o 42 pol. (HDMI-VGA)</p>                      
                      <p>- Computador para chamadas via Skype.</p> 
                      <br/>                                            
                      <p><span class="bold">Localiza&ccedil;&atilde;o:</span> Pr&eacute;dio novo - em frente ao Marketing</p>
                      <span class="bold">Lugares:</span> 7 
                    </div>    
                  </div>             
                </div>
              </div>
            </div>
          </div>

          <!-- TILE #3 -->
          <div class="col-md-3 col-sm-4 m-b-20">
            <div class="tiles blue blend weather-widget ">
              <div class="tiles-body">
                <a href="agsala3.php" style="color: #edeeef;">
                  <div class="heading">
                    <div class="pull-left">Sala 2 </div>  
                    <div class="clearfix"></div>
                  </div>
                  <div class="big-icon">
                    <i class="fa fa-wechat fa-7x fa-fw"></i>
                  </div>
                  <div class="clearfix"></div>
              </div>
                </a>
              <div class="tile-footer">
                <div class="pull-left">
                  <canvas id="" width="1" height="30"></canvas>
                  <span class=" small-text-description">&nbsp;&nbsp;
                  <!--<span class="label">CTB</span>&nbsp;</span>-->
                </div>
                <div class="pull-right">
                  <canvas id="" width="1" height="28"></canvas>
                  <span style="cursor: pointer;" data-toggle="modal" data-target="#3Modal"><i class="fa fa-info fa-2x"></i> </span>
                </div>
                <div class="pull-right">
                  <canvas id="" width="32" height="32"></canvas>
                  <span class="text-white small-text-description"></span> 
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>

          <!-- MODAL #3 -->
          <div class="modal fade" id="3Modal" tabindex="-1" role="dialog" aria-labelledby="3ModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                  <br>
                  <i class="fa fa-info fa-6x"></i>
                  <h4 id="3ModalLabel" class="semi-bold">Informa&ccedil;&atilde;o.</h4>
                </div>
                <div class="modal-body">
                  <div class="alert alert-info">
                    <i class="pull-left material-icons">feedback</i>
                    <div style="padding-left: 30px;">                                            
                      <p><span class="bold">Localiza&ccedil;&atilde;o:</span> Pr&eacute;dio novo - ao lado da sala de v&iacute;deo.</p>
                      <span class="bold">Lugares:</span> 7 
                    </div>    
                  </div>             
                </div>
              </div>
            </div>
          </div>

          <!-- TILE #4 -->
          <div class="col-md-3 col-sm-4 m-b-20">
            <div class="tiles blue blend weather-widget ">
              <div class="tiles-body">
                <a href="agsala4.php" style="color: #edeeef;">
                  <div class="heading">
                    <div class="pull-left">Audit&oacute;rio </div>  
                    <div class="clearfix"></div>
                  </div>
                  <div class="big-icon">
                    <i class="fa fa-tv fa-7x fa-fw"></i>
                  </div>
                  <div class="clearfix"></div>
              </div>
                </a>
              <div class="tile-footer">
                <div class="pull-left">
                  <canvas id="" width="1" height="30"></canvas>
                  <span class=" small-text-description">&nbsp;&nbsp;
                  <!--<span class="label">CTB</span>&nbsp;</span>-->
                </div>
                <div class="pull-right">
                  <canvas id="" width="1" height="28"></canvas>
                  <span style="cursor: pointer;" data-toggle="modal" data-target="#4Modal"><i class="fa fa-info fa-2x"></i> </span>
                </div>
                <div class="pull-right">
                  <canvas id="" width="32" height="32"></canvas>
                  <span class="text-white small-text-description"></span> 
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>

          <!-- MODAL #4 -->
          <div class="modal fade" id="4Modal" tabindex="-1" role="dialog" aria-labelledby="4ModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                  <br>
                  <i class="fa fa-info fa-6x"></i>
                  <h4 id="4ModalLabel" class="semi-bold">Informa&ccedil;&atilde;o.</h4>
                </div>
                <div class="modal-body">
                  <div class="alert alert-info">
                    <i class="pull-left material-icons">feedback</i>
                    <div style="padding-left: 30px;">                                            
                      <p><span class="bold">Localiza&ccedil;&atilde;o:</span> Pr&eacute;dio novo - 3&ordm; andar.</p>
                      <span class="bold">Lugares:</span> 100 
                    </div>    
                  </div>             
                </div>
              </div>
            </div>
          </div>

          <!-- TILE #5 -->
          <div class="col-md-3 col-sm-4 m-b-20">
            <div class="tiles blue blend weather-widget ">
              <div class="tiles-body">
                <a href="agsala5.php" style="color: #edeeef;">
                  <div class="heading">
                    <div class="pull-left">Audit&oacute;rio - antigo</div>  
                    <div class="clearfix"></div>
                  </div>
                  <div class="big-icon">
                    <i class="fa fa-tv fa-7x fa-fw"></i>
                  </div>
                  <div class="clearfix"></div>
              </div>
                </a>
              <div class="tile-footer">
                <div class="pull-left">
                  <canvas id="" width="1" height="30"></canvas>
                  <span class=" small-text-description">&nbsp;&nbsp;
                  <!--<span class="label">CTB</span>&nbsp;</span>-->
                </div>
                <div class="pull-right">
                  <canvas id="" width="1" height="28"></canvas>
                  <span style="cursor: pointer;" data-toggle="modal" data-target="#5Modal"><i class="fa fa-info fa-2x"></i> </span>
                </div>
                <div class="pull-right">
                  <canvas id="" width="32" height="32"></canvas>
                  <span class="text-white small-text-description"></span> 
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>

          <!-- MODAL #5 -->
          <div class="modal fade" id="5Modal" tabindex="-1" role="dialog" aria-labelledby="5ModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                  <br>
                  <i class="fa fa-info fa-6x"></i>
                  <h4 id="5ModalLabel" class="semi-bold">Informa&ccedil;&atilde;o.</h4>
                </div>
                <div class="modal-body">
                  <div class="alert alert-info">
                    <i class="pull-left material-icons">feedback</i>
                    <div style="padding-left: 30px;">                                            
                      <p><span class="bold">Localiza&ccedil;&atilde;o:</span> Pr&eacute;dio antgo - ao lado da entrada de funcion&aacute;rios.</p>
                      <span class="bold">Lugares:</span> 30 
                    </div>    
                  </div>             
                </div>
              </div>
            </div>
          </div>

          <!-- END PLACE PAGE CONTENT HERE -->
        </div>
      </div>
      <!-- END PAGE CONTAINER -->
     
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
    <script src='assets/js/moment.min.js'></script> 
    <script src='assets/plugins/fullcalendar/fullcalendar.js'></script>
    <script src='assets/plugins/fullcalendar/locale/pt-br.js'></script>
    <script src="assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
    <script src="assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
    <!-- END CORE JS DEPENDECENCIES-->
    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="webarch/js/webarch.js" type="text/javascript"></script>
    <script src="assets/js/chat.js" type="text/javascript"></script>
    <script>
    $(document).ready(function() {
      $('#calendario').fullCalendar({          
          weekends: false,
          weekNumbers: true,
          height: 700,
          customButtons: {
          NovoEvento: {
              text: 'Novo Evento',
              click: function() {
                  $("#ADDModal").modal();
                  }
              }
          },
          header: {
            left:   'title',
            center: 'listWeek',
            right:  'NovoEvento month,agendaWeek,agendaDay prev,today,next'
          },
          events: [				
				{
					title: 'Evento Dias',
					start: '2017-04-07',
					end: '2017-04-10'
				},
				{
					id: 999,
					title: 'kkkkkkk',
					start: '2017-04-09T16:30:00'
				},
				{
					id: 999,
					title: 'Teste 2',
					start: '2017-04-16T16:00:00',        
          eventBackgroundColor : 'red'
				},
				{
					title: 'Teste1',
					start: '2017-04-15T10:30:00',
					end: '2017-04-15T12:30:00'
				},
        {
					title: 'Teste44',
					start: '2017-04-30T15:30:00',
					end: '2017-04-30T18:30:00'
				},
				{
					title: 'Coffee',
					start: '2017-04-22T12:00:00',
          color: 'green'
				},
				{
					title: 'Reuniao',
					start: '2017-04-03T07:00:00'
				},
				{
					title: 'Teste link',
					url: 'http://google.com/',
					start: '2017-04-28'
				}
			]
      })
    });
    </script>

    <script type="text/javascript">
    $(function () {
        $('#eventoIni').datetimepicker();
        $('#eventoFim').datetimepicker({
            useCurrent: false //Important! See issue #1075
        });
        $("#eventoIni").on("dp.change", function (e) {
            $('#eventoFim').data("DateTimePicker").minDate(e.date);
        });
        $("#eventoFim").on("dp.change", function (e) {
            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
        });
    });
</script>

    <!--<script>
    $(document).ready(function() {
      $('#calendario').fullCalendar({          
          weekends: false,
          weekNumbers: true,
          height: 700,
          header: {
            left:   'title',
            center: 'listWeek',
            right:  'month,agendaWeek,agendaDay prev,today,next'
          },
          events: "http://localhost:8080/json-feed-eventos.php"          
      })
    });
    </script>-->
    <!-- END CORE TEMPLATE JS -->
  </body>
</html>