<?php
require_once("assets/php/class/class.seg.php");
require_once("assets/php/class/class.crud.php");
session_start();
proteger();

$host="10.0.0.2";
$service="//10.0.0.2:1521/orcl";
$id=$_SESSION['usuarioId'];
$conn= new \PDO("oci:host=$host;dbname=$service","INTRANET","ifnefy6b9");

$query1 = "SELECT USR.ID, USR.EMAIL, USR.SENHA, USR.NOME, USR.SETOR, USR.CARGO, USR.RAMAL, USR.IM, LOC.NOME AS LOCAL, USR.ADMISSAO, USR.SOBRENOME, IMG.ID AS ID_IMG, IMG.IMAGEM FROM IN_USUARIOS USR, IN_LOCAIS LOC, IN_IMAGENS IMG WHERE USR.LOCAL = LOC.LOCAL AND LOC.LOCAL = USR.LOCAL AND USR.IMG_PERFIL = IMG.ID AND USR.ID=:id";
$query2 = "SELECT COUNT(EMAIL) AS COLEGAS FROM IN_USUARIOS WHERE SETOR =:setor AND ID !=:id";
$query3 = "SELECT USR.EMAIL, USR.IMG_PERFIL, IMG.IMAGEM FROM IN_USUARIOS USR, IN_IMAGENS IMG WHERE USR.IMG_PERFIL = IMG.ID AND USR.SETOR =:setor AND USR.ID !=:id";
$query4 = "SELECT USR.ID, USR.EMAIL, USR.SENHA, USR.NOME, USR.SETOR, USR.CARGO, USR.RAMAL, USR.IM, LOC.NOME AS LOCAL, USR.ADMISSAO, USR.SOBRENOME, IMG.ID AS ID_IMG, IMG.IMAGEM FROM IN_USUARIOS USR, IN_LOCAIS LOC, IN_IMAGENS IMG WHERE USR.LOCAL = LOC.LOCAL AND LOC.LOCAL = USR.LOCAL AND USR.IMG_PERFIL = IMG.ID AND USR.ID=:id";

//#1
$stmt1 = $conn->prepare($query1);
$stmt1->bindValue(':id',$id);
$stmt1->execute();
$result1=$stmt1->fetch(PDO::FETCH_ASSOC);

//#2
$stmt2 = $conn->prepare($query2);
$stmt2->bindValue(':setor',$result1['SETOR']);
$stmt2->bindValue(':id',$result1['ID']);
$stmt2->execute();
$result2=$stmt2->fetch(PDO::FETCH_ASSOC);

//#3
$stmt3 = $conn->prepare($query3);
$stmt3->bindValue(':setor',$result1['SETOR']);
$stmt3->bindValue(':id',$result1['ID']);
$stmt3->execute();
$result3=$stmt3->fetchAll(PDO::FETCH_ASSOC);

//#4
$stmt4 = $conn->prepare($query4);
$stmt4->bindValue(':id',$id);
$stmt4->execute();
$result4=$stmt4->fetch(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html>
  <head>
    <title>Aniger - Meu perfil</title>
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
              <a href="https://aniger.tomticket.com/helpdesk/login?" class="dropdown-toggle">
                <i class="material-icons">desktop_mac</i><!-- <span class="badge bubble-only"></span> -->
              </a>
            </li>
            <li class="dropdown visible-xs visible-sm">
              <a href="#" data-webarch="toggle-right-side">
                <i class="material-icons">chat</i>
              </a>
            </li>
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
                <a href="#" class="" title="Recurso ainda não implementado.">
                  <i class="material-icons">apps</i>
                </a>
              </li>
              <li class="quicklinks"> <span class="h-seperate"></span></li>
              <li class="quicklinks">
                <a href="#" class="" id="my-task-list" data-placement="bottom" data-content='' data-toggle="dropdown" data-original-title="Novidades">
                  <i class="material-icons">notifications_none</i>
                  <span class="badge badge-important bubble-on  ly"></span>
                </a>
              </li>
              <li class="m-r-10 input-prepend inside search-form no-boarder">
                <span class="add-on"> <i class="material-icons">search</i></span>
                <input name="" type="text" class="no-boarder " placeholder="Buscar" style="width:250px;">
              </li>
            </ul>
          </div>
          <div id="notification-list" style="display:none">
            <div style="width:300px">
            <a href="changelog.php">
              <div class="notification-messages info">
                <div class="user-profile">
                  <img src="assets/img/profiles/d.jpg" alt="" data-src="assets/img/profiles/Aa.jpg" data-src-retina="assets/img/profiles/d2x.jpg" width="35" height="35">
                </div>
                <div class="message-wrapper">
                  <div class="heading">
                    Lançamento - v1.0
                  </div>
                  <div class="description">
                    Visualizar as novidades.
                  </div>
                  <div class="date pull-right">
                    Segunda-feira, 5 Dez 2016
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
                    <a href="perfil.php" title="Acesse seu perfil"> Meu perfil</a>
                  </li>
                  <!-- <li class="disabled">
                    <a href="calender.php" title="Recurso ainda não implementado.">Calendário</a>
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
              <li class="quicklinks"> <span class="h-seperate"></span></li>
              <li class="quicklinks">
                <!-- <a href="#" class="chat-menu-toggle" data-webarch="toggle-right-side"><i class="material-icons">chat</i><span class="badge badge-important hide">1</span> -->
                <a href="#" class="chat-menu-toggle"><i class="material-icons" title="Recurso ainda não implementado.">chat</i><span class="badge badge-important hide">1</span>
                </a>
                <div class="simple-chat-popup chat-menu-toggle hide">
                  <!--<div class="simple-chat-popup-arrow"></div>
                  <div class="simple-chat-popup-inner">
                     <div style="width:100px">
                      <div class="semi-bold">David Nester</div>
                      <div class="message">Hey you there </div>
                    </div> -->
                  </div>
                </div>
              </li>
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
              <a href="https://aniger.tomticket.com/helpdesk/login?"><i class="material-icons" title="Chamados">desktop_mac</i> <span class="title">Chamados</span></a>
            </li>
            <li class=""> 
              <a href="ramais.php"><i class="material-icons" title="Ramais">phone_forwarded</i> <span class="title">Ramais</span></a>
            </li>
            <li class=""> 
              <a href="cadastros.php"><i class="material-icons" title="Cadastros">library_add</i> <span class="title">Cadastros</span></a>
            </li>
            <li class=""> 
              <a href="solicitacoes.php"><i class="material-icons" title="Solicitações">assignment</i> <span class="title">Solicitações</span></a>
            </li>
            <!--<li class="">
              <a href="#"> <i class="material-icons">email</i> <span class="title">Link</span> <span class=" badge badge-disable pull-right ">203</span>
              </a>
            </li>
            <li class="">
              <a href="javascript:;"> <i class="material-icons">more_horiz</i> <span class="title">Link</span> <span class=" arrow"></span> </a>
              <ul class="sub-menu">
                <li> <a href="javascript:;"> Level 1 </a> </li>
                <li>
                  <a href="javascript:;"> <span class="title">Level 2</span> <span class=" arrow"></span> </a>
                  <ul class="sub-menu">
                    <li> <a href="javascript:;"> Sub Menu </a> </li>
                    <li> <a href="ujavascript:;"> Sub Menu </a> </li>
                  </ul>
                </li>
              </ul>
            </li>-->
            <li class="hidden-lg hidden-md hidden-xs" id="more-widgets">
              <a href="javascript:;"> <i class="material-icons"></i></a>
              <ul class="sub-menu">
                <li class="side-bar-widgets">
                  <p class="menu-title sm">FOLDER <span class="pull-right"><a href="#" class="create-folder"><i class="material-icons">add</i></a></span></p>
                  <ul class="folders">
                    <li>
                      <a href="#">
                        <div class="status-icon green"></div>
                        My quick tasks </a>
                    </li>
                  </ul>
                  <p class="menu-title">PROJECTS </p>
                  <div class="status-widget">
                    <div class="status-widget-wrapper">
                      <div class="title">Freelancer<a href="#" class="remove-widget"><i class="material-icons">close</i></a></div>
                      <p>Redesign home page</p>
                    </div>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
          <!--<div class="side-bar-widgets">
            <p class="menu-title sm">FOLDER <span class="pull-right"><a href="#" class="create-folder"> <i class="material-icons">add</i></a></span></p>
            <ul class="folders">
              <li>
                <a href="#">
                  <div class="status-icon green"></div>
                  My quick tasks </a>
              </li>
            </ul>
            <p class="menu-title">PROJECTS </p>
            <div class="status-widget">
              <div class="status-widget-wrapper">
                <div class="title">Freelancer<a href="#" class="remove-widget"><i class="material-icons">close</i></a></div>
                <p>Redesign home page</p>
              </div>
            </div>
          </div>-->
          <div class="clearfix"></div>
          <!-- END SIDEBAR MENU -->
        </div>
      </div>
      <a href="#" class="scrollup">Scroll</a>
      <div class="footer-widget">
        <div class="pull-left">
          <a data-html="true" data-content="<b>popover</b> - title " id="popover" title="" data-toggle="popover">
            <i class="material-icons">alarm</i>
          </a>
          <iframe src="http://free.timeanddate.com/clock/i5hp9yxv/n595/tlbr5/fn17/fc555/tc22262e/pa0/th1" frameborder="0" width="66" height="14"></iframe>
        </div>
        <div class="pull-right">
          <!-- IMPLEMENTAR LOCKSCREEN -->
          <a href="login.php"><i class="material-icons">power_settings_new</i></a>
        </div>
      </div>
      <!-- END SIDEBAR -->
      <!-- BEGIN PAGE CONTAINER-->
      <div class="page-content">
        <div class="content">
        <ul class="breadcrumb">
            <li>
              <p>VOCÊ ESTÁ EM </p>
            </li>
            <li><a href="#" class="active">Meu perfil</a> </li>
          </ul>
           <!--BEGIN PAGE TITLE 
          <div class="page-title"> <i class="material-icons">face</i>
            <h3>-&nbsp;&nbsp;Gabriel Hipolito</h3>
          </div>-->
          <!-- END PAGE TITLE -->
          <!-- CONTEUDO -->

          <div class="content" style="padding-top:20px;">
          <div class="row">
            <div class="col-md-12">
              <div class=" tiles white col-md-12 no-padding">
                <div class="tiles green cover-pic-wrapper">
                  <div class="overlayer bottom-right">
                    <div class="overlayer-wrapper">
                      <div class="padding-10 hidden-xs">
                        <button type="button" class="btn btn-info btn-small disabled"><i class="fa fa-check"></i>&nbsp;&nbsp;Adicionar</button>
                      </div>
                    </div>
                  </div>
                  <img src="assets/img/cb.png" alt="capa">
                </div>
                <div class="tiles white">
                  <div class="row">
                    <div class="col-md-3 col-sm-3">
                      <div class="user-profile-pic">
                        <?php
                          echo '<img width="69" height="69" src="data:image/jpeg;base64,'.base64_encode(stream_get_contents($result4['IMAGEM'])).'">';
                        ?>
                      </div>
                      <div class="user-mini-description">
                        <h3 class="text-info semi-bold">
                         <i class="fa fa-star"></i>
                         <i class="fa fa-star-half-full"></i>                    
                        </h3>
                        <h5>Tempo</h5>
                        <h3 class="text-info semi-bold" style="line-height:40px;">
                          <span class="label label-ti"> <?php echo $result1['SETOR']; ?></span>
                        </h3>
                        <h5>Setor</h5>
                      </div>
                    </div>
                    <div class="col-md-4 col-sm-4 user-description-box  col-sm-5">
                      <h4 class="semi-bold no-margin"><?php echo $result1['NOME'] . " " . $result1['SOBRENOME']; ?></h4>
                      <br>
                      <!--CARGO-->
                      <p><i class="fa fa-briefcase"></i><?php echo $result1['CARGO']; ?> </p>

                      <!--LOCAL-->
                      <p><i class="fa fa-globe"></i><?php echo $result1['LOCAL']; ?></p>

                      <!--EMAIL-->
                      <p><i class="fa fa-envelope"></i><?php echo $result1['EMAIL']; ?></p>

                      <!--IM RAMAL-->
                      <p><i class="fa fa-skype"></i><?php echo $result1['IM']; ?> 
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <i class="fa fa-phone"></i><?php echo $result1['RAMAL']; ?></p>                      
                    </div>
                    <div class="col-md-3  col-sm-3">
                      <h5 class="normal">Colegas ( <span class="text-success"> <?php echo $result2['COLEGAS']; ?> </span> )</h5>
                      <ul class="my-friends">
                        <?php
                        foreach($result3 as $key => $value ) 
                          { 
                            echo
                              '<li>
                                <div class="profile-pic">
                                  <img width="35" height="35" title="'. $value['EMAIL'] .'" src="data:image/jpeg;base64,'.base64_encode(stream_get_contents($value['IMAGEM'])).'">
                                </div>
                              </li>';
                          }
                        ?>
                      </ul>
                    </div>
                  </div>
                  <hr/>
                  &nbsp;&nbsp;<br/>                  
                  &nbsp;&nbsp;<br/>
          <!-- FIM CONTEÚDO -->
        </div>
      </div>
      <!-- END PAGE CONTAINER -->
      &nbsp;&nbsp;<br/>
      &nbsp;&nbsp;<br/>
      &nbsp;&nbsp;<br/>
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