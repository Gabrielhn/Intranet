<?php
//setlocale(LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.iso-8859-1', 'portuguese');
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
// date_default_timezone_set('America/Sao_Paulo');
require_once("assets/php/class/class.seg.php");
require_once("assets/php/class/class.utils.php");
session_start();
proteger();

$host="10.0.0.2";
$service="//10.0.0.2:1521/orcl";
$id=$_SESSION['usuarioId'];
$conn= new \PDO("oci:host=$host;dbname=$service","INTRANET","ifnefy6b9");

//Dados e permissão
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


$query2 = "SELECT * FROM VW_POST_2 WHERE POSICAO = 1";
$query3 = "SELECT * FROM VW_POST_2 WHERE POSICAO = 2";
$query4 = "SELECT * FROM VW_POST_2 WHERE POSICAO = 3";

$query5 = "SELECT * FROM IN_VAGAS WHERE ATIVO = 'S' AND ROWNUM < 4 ORDER BY DT_CADASTRO";

$query6 = "SELECT * FROM VW_POST_3 WHERE POSICAO = 1";
$query7 = "SELECT * FROM VW_POST_3 WHERE POSICAO = 2";
$query8 = "SELECT * FROM VW_POST_3 WHERE POSICAO = 3";

//#1
$stmt1 = $conn->prepare($query1);
$stmt1->bindValue(':id',$id);
$stmt1->execute();
$result1=$stmt1->fetch(PDO::FETCH_ASSOC);

//#2
$stmt2 = $conn->prepare($query2);
$stmt2->execute();
$result2=$stmt2->fetch(PDO::FETCH_ASSOC);

//#3
$stmt3 = $conn->prepare($query3);
$stmt3->execute();
$result3=$stmt3->fetch(PDO::FETCH_ASSOC);

//#4
$stmt4 = $conn->prepare($query4);
$stmt4->execute();
$result4=$stmt4->fetch(PDO::FETCH_ASSOC);

//#5
$stmt5 = $conn->prepare($query5);
$stmt5->execute();
$result5=$stmt5->fetchAll(PDO::FETCH_ASSOC);

//#6
$stmt6 = $conn->prepare($query6);
$stmt6->execute();
$result6=$stmt6->fetch(PDO::FETCH_ASSOC);

//#7
$stmt7 = $conn->prepare($query7);
$stmt7->execute();
$result7=$stmt7->fetch(PDO::FETCH_ASSOC);

//#8
$stmt8 = $conn->prepare($query8);
$stmt8->execute();
$result8=$stmt8->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Aniger - Home</title>
    <meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
    <meta charset="iso-8859-1" />
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
    <!-- BEGIN HEADER oi -->
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
                <i class="material-icons">desktop_mac</i>
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
                  <span class="badge badge-important bubble-only"></span>
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
                  <li class="">
                    <?php echo '<a title="Alterar sua senha"><span style="cursor:pointer;" data-toggle="modal" data-target="#SEModal">&nbsp;<i class="fa fa-unlock-alt"></i>&nbsp;&nbsp; Alterar senha</span></a>';?>
                  </li>
                   <!--<li class="disabled">
                    <a href="calender.php" title="Recurso ainda n&atilde;o implementado.">Calend&aacute;rio</a>
                  </li>
                   <li>
                    <a href="email.php"> My Inbox&nbsp;&nbsp;
                      <span class="badge badge-important animated bounceIn">2</span>
                    </a>
                  </li>-->
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
            <li class="start active"> 
              <a href="index.php"><i class="material-icons" title="Home">home</i> <span class="title">Home</span> <span class="title"></span> </a>
            </li>
            <li class=""> 
              <a href="chamados.php"><i class="material-icons" title="Chamados">desktop_mac</i> <span class="title">Chamados</span></a>
            </li>            
            <li class=""> 
              <a href="ramais.php"><i class="material-icons" title="Ramais">phone_forwarded</i> <span class="title">Ramais</span></a>
            </li>
            <li class=""> 
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
          <a href="bloquear.php"><i class="material-icons">lock_outline</i></a>
        </div>
      </div>
      <!-- END SIDEBAR -->
      <!-- BEGIN PAGE CONTAINER-->
      <div class="page-content">
        <div class="content"  style="padding:0, 0, 0, 0;">
        <ul class="breadcrumb">
            <li>
              <p>VOC&Ecirc; EST&Aacute; EM </p>
            </li>
            <li><a href="#" class="active">Home</a> </li>
          </ul>
          <!-- BEGIN PAGE TITLE -->
          <!--<div class="page-title"> <i class="material-icons">home</i>
            <h3>Home </h3>
          </div>-->
          <!-- END PAGE TITLE -->
          <!-- CONTEUDO -->
                    
          <div class="row">

          <!--#1 MURAL 1-->
            <div class="col-md-12 col-sm-12">
              <div class="grid simple ">
                <div class="grid-title no-border">
                  <div class="tools"></div>
                </div>
                <div class="grid-body no-border">
                  <div class="col-md-12">  
                    <h4><i class="fa fa-newspaper-o fa-1x"></i><span class="semi-bold">&nbsp; <?php echo $result2['TIT_MURAL'] ?></span><div class="pull-right"><span class="label label-mkt">MKT</span></div></h4>
                    <br/>
                  </div>
                  <!--DESTAQUE-->
                  <div class="col-md-12 p-b-10 m-b-10">
                    <a href="#">
                      <img src="assets/img/others/banner1_2.png" alt="" class="image-responsive-width xs-image-responsive-width lazy">
                    </a>
                  </div>
                  <!--NOTICIAS-->
                  <?php
                    
                      echo '                      
                      <div class="col-md-4  col-sm-4 m-b-10" data-aspect-ratio="true">
                        <a href="data/post.php?id='.$result2['ID'].'">
                          <div class="live-tile slide ha">
                            <div class="slide-front ha tiles green ">
                              <div class="overlayer bottom-left fullwidth">
                                <div class="overlayer-wrapper">
                                  <div class="tiles gradient-black p-l-20 p-r-10 p-b-20 p-t-20">
                                    <h4 class="text-white semi-bold no-margin">'.$result2['ASSUNTO'].'</h4>
                                    <div class="muted">'.$result2['AUTOR'].'</div>
                                    <!--<div class="preview-wrapper pull-right"><i class="icon-custom-up "></i> Leia mais...</p></div>-->                            
                                  </div>
                                </div>
                              </div>
                              <img src="data:image/jpeg;base64,'.base64_encode(stream_get_contents($result2['IMG_MURAL'])).'" alt="" class="image-responsive-width xs-image-responsive-width lazy"> </div>
                            <div class="slide-back ha tiles white">                                                  
                            </div>
                          </div>
                        </div>
                      </a>';

                      echo '                      
                      <div class="col-md-4  col-sm-4 m-b-10" data-aspect-ratio="true">
                        <a href="data/post.php?id='.$result3['ID'].'">
                          <div class="live-tile slide ha">
                            <div class="slide-front ha tiles green ">
                              <div class="overlayer bottom-left fullwidth">
                                <div class="overlayer-wrapper">
                                  <div class="tiles gradient-black p-l-20 p-r-10 p-b-20 p-t-20">
                                    <h4 class="text-white semi-bold no-margin">'.$result3['ASSUNTO'].'</h4>
                                    <div class="muted">'.$result3['AUTOR'].'</div>
                                    <!--<div class="preview-wrapper pull-right"><i class="icon-custom-up "></i> Leia mais...</p></div>-->                                                                                            
                                  </div>
                                </div>
                              </div>
                              <img src="data:image/jpeg;base64,'.base64_encode(stream_get_contents($result3['IMG_MURAL'])).'" alt="" class="image-responsive-width xs-image-responsive-width lazy"> </div>
                            <div class="slide-back ha tiles white">                                                  
                            </div>
                          </div>
                        </div>
                      </a>';

                      echo '                      
                      <div class="col-md-4  col-sm-4 m-b-10" data-aspect-ratio="true">
                        <a href="data/post.php?id='.$result4['ID'].'">
                          <div class="live-tile slide ha">
                            <div class="slide-front ha tiles green ">
                              <div class="overlayer bottom-left fullwidth">
                                <div class="overlayer-wrapper">
                                  <div class="tiles gradient-black p-l-20 p-r-10 p-b-20 p-t-20">
                                    <h4 class="text-white semi-bold no-margin">'.$result4['ASSUNTO'].'</h4>
                                    <div class="muted">'.$result4['AUTOR'].'</div>
                                    <!--<div class="preview-wrapper pull-right"><i class="icon-custom-up "></i> Leia mais...</p></div>-->                                                                                            
                                  </div>
                                </div>
                              </div>
                              <img src="data:image/jpeg;base64,'.base64_encode(stream_get_contents($result4['IMG_MURAL'])).'" alt="" class="image-responsive-width xs-image-responsive-width lazy"> </div>
                            <div class="slide-back ha tiles white">                                                  
                            </div>
                          </div>
                        </div>
                      </a>';
                    
                  ?>                  
                </div>
              </div>
            </div>

          <!--#2 MURAL 2-->            

            <div class="col-md-6 col-sm-6">
               <div class="grid simple ">
                 <div class="grid-title no-border">
                   <div class="tools">                                      
                   </div>
                 </div>
                 <div class="grid-body no-border">
                  <div class="col-md-12">
                    <h4><i class="fa fa-newspaper-o fa-1x"></i><span class="semi-bold">&nbsp; <?php echo $result6['TIT_MURAL']?></span><div class="pull-right"><span class="label label-rh">RH</span></div></h4>
                    <br/>                  
                   <?php                     
                       echo '
                       <a href="data/post.php?id='.$result6['ID'].'">
                        <div class="notification-messages info">
                          <div class="user-profile">
                            <img alt=""  width="35" height="35" src="data:image/jpeg;base64,'.base64_encode(stream_get_contents($result6['IMG_AUTOR'])).'">
                          </div>
                          <div class="message-wrapper">
                            <div class="heading" style="overflow:visible;">
                              '.$result6['ASSUNTO'].' <div class="date">por '.$result6['AUTOR'].'</div>
                            </div>
                            <div class="description">
                              Clique para visualizar.
                            </div>
                            <div class="date pull-right">
                              '.date_format(date_create_from_format('d/m/y', $result6['INCLUSAO']), 'd/m/Y').'
                            </div>
                          </div>
                          <div class="clearfix"></div>
                        </div>
                      </a>';

                      echo '
                       <a href="data/post.php?id='.$result7['ID'].'">
                        <div class="notification-messages info">
                          <div class="user-profile">
                            <img alt=""  width="35" height="35" src="data:image/jpeg;base64,'.base64_encode(stream_get_contents($result7['IMG_AUTOR'])).'">
                          </div>
                          <div class="message-wrapper">
                            <div class="heading" style="overflow:visible;">
                              '.$result7['ASSUNTO'].' <div class="date">por '.$result7['AUTOR'].'</div>
                            </div>
                            <div class="description">
                              Clique para visualizar.
                            </div>
                            <div class="date pull-right">
                              '.date_format(date_create_from_format('d/m/y', $result7['INCLUSAO']), 'd/m/Y').'
                            </div>
                          </div>
                          <div class="clearfix"></div>
                        </div>
                      </a>'; 

                      echo '
                       <a href="data/post.php?id='.$result8['ID'].'">
                        <div class="notification-messages info">
                          <div class="user-profile">
                            <img alt=""  width="35" height="35" src="data:image/jpeg;base64,'.base64_encode(stream_get_contents($result8['IMG_AUTOR'])).'">
                          </div>
                          <div class="message-wrapper">
                            <div class="heading" style="overflow:visible;">
                              '.$result8['ASSUNTO'].' <div class="date">por '.$result8['AUTOR'].'</div>
                            </div>
                            <div class="description">
                              Clique para visualizar.
                            </div>
                            <div class="date pull-right">
                              '.date_format(date_create_from_format('d/m/y', $result8['INCLUSAO']), 'd/m/Y').'
                            </div>
                          </div>
                          <div class="clearfix"></div>
                        </div>
                      </a>'; 

                   ?>
                   </div>                                   
                 </div>
               </div>
             </div>          

          <!--#3 VAGAS-->
            <div class="col-md-3 col-sm-6">
              <div class="grid simple ">
                <div class="grid-title no-border">
                  <div class="tools">                                      
                  </div>
                </div>
                <div class="grid-body no-border">
                  <h4><i class="fa fa-bookmark fa-1x"></i><span class="semi-bold">&nbsp; Vagas</span></h4>
                  <br/>              
                  <?php
                    foreach ($result5 as $key5 => $value) {
                      echo '
                      <span style="cursor: pointer;" data-toggle="modal" data-target="#'.$result5[$key5]['ID'].'Modal">                        
                        <div class="notification-messages info">                          
                          <div class="" style="font-weight: 450; font-size:13px;">
                            <div class="heading" style="overflow:visible; text-align: center;">
                              <div><span class="label label-'.strtolower($result5[$key5]['SETOR']).'">'.$result5[$key5]['SETOR'].'</span></div>
                              <p> </p>
                              '.$result5[$key5]['FUNCAO'].'
                            </div>                                                        
                          </div>
                          <div class="clearfix"></div>
                        </div>                      
                      </span>
                      
                      <div class="modal fade" id="'.$result5[$key5]['ID'].'Modal" tabindex="-1" role="dialog" aria-labelledby="'.$result5[$key5]['ID'].'ModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <div>
                                <div class="col-md-6 col-sm-6 col-xs-6" style="text-align:left;">#'.$result5[$key5]['ID'].'</div>
                                <div class="col-md-6 col-sm-6 col-xs-6" style="text-align:right;"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button></div>
                              </div>                              
                              <br>
                              <i class="fa fa-bookmark fa-6x"></i>
                              <h4 id="'.$result5[$key5]['ID'].'ModalLabel" class="semi-bold">Cargo: '.$result5[$key5]['FUNCAO'].'</h4>
                              <span class="label label-'.strtolower($result5[$key5]['SETOR']).'">'.$result5[$key5]['SETOR'].'</span>
                            </div>
                            <div class="modal-body">
                              <div class="alert alert-info" >
                                Descri&ccedil;&atilde;o:
                                <h5 style="padding-left: 30px; line-height:20px;">
                                  '.$result5[$key5]['DESCRICAO'].' 
                                <br>&nbsp;  
                                </h5>    
                              </div>
                              <div class="alert alert-info" >
                                Requisitos:
                                <h5 style="padding-left: 30px; line-height:20px;">
                                  '.$result5[$key5]['REQUISITOS'].' 
                                <br>&nbsp;  
                                </h5>    
                              </div>
                              <div style="text-align:center;">
                                <span class="description" style="font-size:11px;">
                                  <p>
                                  Caso j&aacute; seja um funcion&aacute;rio ANIGER e tenha interesse nesta vaga, comunique ao seu gestor para ele entrar em contato com o RH.                                  
                                  Caso queira indicar esta vaga a um amigo, pedimos que seja enviado um e-mail para <span class="bold">rh@aniger.com.br</span> mencionando o c&oacute;digo da vaga.
                                  </p>
                                </span>
                              </div>             
                            </div>
                          </div>
                        </div>
                      </div>'
                      ;
                    }                                            
                    ?>
                    <div style="text-align:center; padding-top:10px;"> 
                      <a title="Ver todas as vagas.">
                        <span class="label label" style="cursor:pointer;" data-toggle="modal" data-target="#VAModal">Ver todos</span>                        
                      </a>
                    </div>
                </div>
              </div>
            </div>

            <!--#4 ANIVERSARIANTES-->
            <div class="col-md-3 col-sm-6">
              <div class="grid simple ">
                <div class="grid-title no-border">
                  <div class="tools">                                      
                  </div>
                </div>
                <div class="grid-body no-border">
                  <h4><i class="fa fa-birthday-cake fa-1x"></i><span class="semi-bold">&nbsp; Anivers&aacute;rios</span></h4>
                  <br/>
                  <a href="assets/img/abril-sul.png" target="blank">
                    <img src="assets/img/abril-sul.png" class="image-responsive-width xs-image-responsive-width lazy"></img>                                  
                  </a>
                </div>
              </div>
            </div>            

            <div class="modal fade" id="SEModal" tabindex="-1" role="dialog" aria-labelledby="SEModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>                                                
                    <br>
                    <i class="fa fa-unlock-alt fa-6x"></i>
                    <h4 id="SEModalLabel" class="semi-bold">Alterar senha</h4>                  
                  </div>
                  <div class="modal-body"> 
                    <div class="">
                      <div class="row" style="line-height:2;">
                        <form method="post" name="ramal" action="data\senha.A.php">                          

                          <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <div class="controls">
                              <input type="password" placeholder="Nova senha" class="form-control input input-lg" style="text-align: center" name="senha" maxlength="20" required>
                            </div>
                          </div>                                             

                          <div class="form-group col-md-12 col-sm-12 col-xs-12 pull-right">
                            <button type="submit" class="btn btn-info btn-block btn-large" value="submit"> Alterar</button>                                        
                          </div>

                        </form>
                      </div>
                    </div>                                                                                           
                  </div>

                    
          <!-- FIM CONTEUDO -->
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