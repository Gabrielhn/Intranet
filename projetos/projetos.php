<?php
require_once("../assets/php/class/class.seg.php");
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

$query2="SELECT * FROM IN_PROJETOS WHERE STATUS = :status ORDER BY ORDEM";

//#1
$stmt1 = $conn->prepare($query1);
$stmt1->bindValue(':id',$id);
$stmt1->execute();
$result1=$stmt1->fetch(PDO::FETCH_ASSOC);

//#2 Status 1
$stmt2 = $conn->prepare($query2);
$stmt2->bindValue(':status',"1");
$stmt2->execute();
$result2=$stmt2->fetchAll(PDO::FETCH_ASSOC);

//#4 Status 2
$stmt4 = $conn->prepare($query2);
$stmt4->bindValue(':status',"2");
$stmt4->execute();
$result4=$stmt4->fetchAll(PDO::FETCH_ASSOC);

//#6 Status 3
$stmt6 = $conn->prepare($query2);
$stmt6->bindValue(':status',"3");
$stmt6->execute();
$result6=$stmt6->fetchAll(PDO::FETCH_ASSOC);

//#8 Status 4
$stmt8 = $conn->prepare($query2);
$stmt8->bindValue(':status',"4");
$stmt8->execute();
$result8=$stmt8->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html>
  <head>
    <title>Aniger - Projetos</title>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN PLUGIN CSS -->
    <link href="../assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="../assets/plugins/bootstrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/bootstrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/animate.min.css" rel="stylesheet" type="text/css" />
    <!-- <link href="assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" /> -->
    <!-- END PLUGIN CSS -->
    <!-- BEGIN CORE CSS FRAMEWORK -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../webarch/css/webarch.css" rel="stylesheet" type="text/css" />
    <!-- END CORE CSS FRAMEWORK -->
    <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../assets/img/favicon.ico" type="image/x-icon">
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
            <img src="../assets/img/logo.png" class="logo" alt="" data-src="../assets/img/logo.png" data-src-retina="../assets/img/logo.png" width="106" height="21" />
          </a>
          <!-- END LOGO -->
          <ul class="nav pull-right notifcation-center">
            <li class="dropdown hidden-xs hidden-sm">
              <a href="../index.php" class="dropdown-toggle active" data-toggle="">
                <i class="material-icons">home</i>
              </a>
            </li>
            <li class="dropdown hidden-xs hidden-sm">
              <a href="../chamados.php" class="dropdown-toggle">
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
                    <a href="../dados.php">
                      <i class="material-icons">apps</i>
                    </a>
                  </li>';
                } elseif ($result1['MURAL'] == 'S') {
                  echo '
                  <li class="quicklinks">
                    <a href="../dados.php">
                      <i class="material-icons">apps</i>
                    </a>
                  </li>';
                } elseif ($result1['GESTOR'] == 'S') {
                  echo '
                  <li class="quicklinks">
                    <a href="../dados.php">
                      <i class="material-icons">apps</i>
                    </a>
                  </li>';
                } elseif ($result1['SETOR'] == 'RH' || $result1['SETOR'] == 'REC') {
                  echo '
                  <li class="quicklinks">
                    <a href="../dados.php">
                      <i class="material-icons">apps</i>
                    </a>
                  </li>';
                }                
              ?>
              <li class="quicklinks"> <span class="h-seperate"></span></li>
              <!--<li class="m-r-10 input-prepend inside search-form no-boarder">
                <span class="add-on"> <i class="material-icons">search</i></span>
                <input name="" type="text" class="no-boarder " placeholder="Buscar" style="width:250px;">
              </li>-->
            </ul>
          </div>
          <div id="notification-list" style="display:none">
            <div style="width:220px">
            <a href="../changelog.php">
              <div class="notification-messages info">
                <div class="user-profile">
                  <img src="../assets/img/profiles/Aa.jpg" width="35" height="35">
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
                    <?php echo '<a href="../perfil.php?id='.$id.'" title="Acesse seu perfil"><i class="fa fa-male fa-fw"></i>&nbsp;&nbsp;Meu perfil</a>';?>
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
                    <a href="../logout.php"><i class="material-icons">power_settings_new</i>&nbsp;&nbsp;Sair</a>
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
              <a href="../index.php"><i class="material-icons" title="Home">home</i> <span class="title">Home</span> <span class="title"></span> </a>
            </li>
            <li class=""> 
              <a href="../chamados.php"><i class="material-icons" title="Chamados">desktop_mac</i> <span class="title">Chamados</span></a>
            </li>
            <li class=""> 
              <a href="../ramais.php"><i class="material-icons" title="Ramais">phone_forwarded</i> <span class="title">Ramais</span></a>
            </li>
            <li class=""> 
              <a href="../agenda.php"><i class="fa fa-calendar" title="&uacute;teis"></i> <span class="title">Agenda</span></a>
            </li>
            <li class=""> 
              <a href="../cadastros.php"><i class="material-icons" title="Cadastros">library_add</i> <span class="title">Cadastros</span></a>
            </li>
            <li class=""> 
              <a href="../solicitacoes.php"><i class="material-icons" title="Solicita&ccedil;&otilde;es">assignment</i> <span class="title">Solicita&ccedil;&otilde;es</span></a>
            </li>
            <li class=""> 
              <a href="../uteis.php"><i class="fa fa-external-link" title="&uacute;teis"></i> <span class="title">Links &uacute;teis</span></a>
            </li>
            <?php
              if ($result1['GESTOR'] == 'S' || $result1['TIPO_USUARIO'] == 'ADM') {
                echo 
                '<li class="">
                  <a href="../indicadores.php"><i class="fa fa-bar-chart" title="Indicadores"></i> <span class="title">Indicadores</span></a>               
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
          <iframe src="http://free.timeanddate.com/clock/i5hp9yxv/n595/tlbr5/fn14/fc666/tc22262e/pa0/th1" frameborder="0" width="58" height="14"></iframe>
        </div>
        <div class="pull-right">
          <a href="../bloquear.php"><i class="material-icons">lock_outline</i></a>
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
            <a href="../index.php">Home</a>
            </li>
            <li><a href="#" class="active">Projetos</a> </li>
          </ul>
          <!-- BEGIN PAGE TITLE -->
          <div class="page-title" style="margin-bottom:0px;"> <i class="fa fa-trello"></i>
            <h3>Projetos </h3>
          </div>          
          <!-- END PAGE TITLE -->
          <!-- CONTEUDO -->
          <div class="row">

            <div class="col-md-3 col-sm-3">
              <div class="grid simple ">
                <div class="grid-title no-border">
                  <div class="tools">                                      
                  </div>
                </div>                
                <div class="grid-body no-border">
                  <h4><i class="fa fa-lightbulb-o fa-1x"></i><span class="semi-bold">&nbsp; N&atilde;o iniciado </span> <span class="badge pull-right"><?php echo count($result2); ?></span> </h4>

                  <?php
                    foreach ($result2 as $key2 => $value) {

                      $projeto=$result2[$key2]['ID'];

                      $queryTAG="SELECT PTAG.PROJETO, TAG.NOME AS TAG, TAG.ATRIBUTO FROM IN_PROJETOS_TAGS PTAG, IN_TAGS TAG WHERE PTAG.TAG = TAG.ID AND PROJETO = :projeto";
                      $queryMEM="SELECT PMEM.PROJETO, SUBSTR(USU.NOME,1,1) ||SUBSTR(USU.SOBRENOME,1,1) AS MEMBRO, USU.NOME || ' ' || USU.SOBRENOME AS NOME, SETO.LABEL FROM IN_PROJETOS_MEMBROS PMEM, IN_USUARIOS USU, IN_SETORES SETO WHERE PMEM.USUARIO = USU.ID AND USU.SETOR = SETO.SIGLA AND PROJETO = :projeto ORDER BY MEMBRO";
                      $queryCOM="SELECT PCOM.PROJETO, PCOM.COMENTARIO, USU.NOME || ' ' || USU.SOBRENOME AS USUARIO, PCOM.INCLUSAO  FROM IN_PROJETOS_COMENTARIOS PCOM, IN_USUARIOS USU WHERE PCOM.USUARIO = USU.ID AND PROJETO = :projeto ORDER BY INCLUSAO DESC";

                      $stmtTAG=$conn->prepare($queryTAG);                    
                      $stmtTAG->bindValue(':projeto',$projeto);
                      $stmtTAG->execute();                    
                      $resultTAG=$stmtTAG->fetchAll(PDO::FETCH_ASSOC);

                      $stmtMEM=$conn->prepare($queryMEM);                    
                      $stmtMEM->bindValue(':projeto',$projeto);
                      $stmtMEM->execute();                    
                      $resultMEM=$stmtMEM->fetchAll(PDO::FETCH_ASSOC);

                      $stmtCOM=$conn->prepare($queryCOM);                    
                      $stmtCOM->bindValue(':projeto',$projeto);
                      $stmtCOM->execute();                    
                      $resultCOM=$stmtCOM->fetchAll(PDO::FETCH_ASSOC);

                      echo 
                      '<span style="cursor: pointer;" data-toggle="modal" data-target="#'.$key2.'ModalEdit">
                        <div class="tiles grey weather-widget round  m-b-10">
                         <h5 class="m-l-10 m-r-10">'.$result2[$key2]['NOME'].'</h5>
                        </div>
                       </span>
                       
                       <div class="modal fade" id="'.$key2.'ModalEdit" tabindex="-1" role="dialog" aria-labelledby="'.$key2.'ModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>                                                
                              <br>
                              <h4 id="'.$key2.'ModalLabel" class="semi-bold">'.$result2[$key2]['NOME'].'</h4>                            
                              <span class="label"><i class="fa fa-lightbulb-o"> &nbsp; </i> N&atilde;o iniciado</span> &nbsp;                                    
                            </div>
                            <div class="modal-body">

                              <div class="">
                                <div class="row" style="line-height:2;">

                                  <div class="col-md-12">
                                    <h5 class="bold">Descri&ccedil;&atilde;o &nbsp; <i class="fa fa-edit"></i></h5>                                                                                                   
                                    '.$result2[$key2]['DESCRICAO'].'
                                  </div>

                                    <div class="col-md-12">&nbsp;</div>

                                  <div class="col-md-12">
                                    <h5 class="bold">Tarefas &nbsp; <i class="fa fa-plus-square-o"></i></h5>
                                    <div class="checkbox check-warning">
                                      <input id="checkbox1" type="checkbox">
                                      <label for="checkbox1">An&aacute;lise de requisitos.</label>
                                      <br/>
                                      <input id="checkbox2" type="checkbox">
                                      <label for="checkbox2">Desenvolvimento das rotinas.</label>
                                      <br/>
                                      <input id="checkbox3" type="checkbox">
                                      <label for="checkbox3">Homologacao e entrega aos usuarios.</label>
                                    </div>
                                  </div>

                                    <div class="col-md-12">&nbsp;</div>                                                                    

                                  <div class="col-md-12">
                                    <h5 class="bold">Coment&aacute;rios &nbsp; <i class="fa fa-plus-square-o"></i></h5>';                                                                                                   
                                    foreach ($resultCOM as $keyCOM => $value) {
                                      echo '<p>- '.$resultCOM[$keyCOM]['COMENTARIO'].' <span style="font-size:10px; font-style:italic;"><b> ('.$resultCOM[$keyCOM]['USUARIO'].' em '.$resultCOM[$keyCOM]['INCLUSAO'].')</b></span></p>';
                                    }
                                  echo
                                  '</div>

                                    <div class="col-md-12">&nbsp;</div>                                  

                                  <div class="col-md-6">
                                    <h5 class="bold">Tags &nbsp; <i class="fa fa-plus-square-o"></i></h5>';
                                    foreach ($resultTAG as $keyTAG => $value) {
                                      echo '<span class="'.$resultTAG[$keyTAG]['ATRIBUTO'].'">'.$resultTAG[$keyTAG]['TAG'].'</span> &nbsp;';                                      
                                    }
                                  
                                  echo 
                                  '</div>
                                  
                                  <div class="col-md-6">
                                    <h5 class="bold">Membros &nbsp; <i class="fa fa-plus-square-o"></i></h5>';
                                    foreach ($resultMEM as $keyMEM => $value) {
                                      echo '<span class="'.$resultMEM[$keyMEM]['LABEL'].'" title="'.$resultMEM[$keyMEM]['NOME'].'">'.$resultMEM[$keyMEM]['MEMBRO'].'</span> &nbsp;';
                                    }                                     

                                  echo                                      
                                  '</div>

                                   <div class="col-md-12" style="border-bottom: 1px solid #b6bbc1;">&nbsp;</div> 

                                  <div class="col-md-12">
                                    <h5 class="bold">A&ccedil;&otilde;es</h5>                                    
                                    <div class="btn-group"> <a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#"> Status <span class="caret"></span> </a>
                                      <ul class="dropdown-menu">
                                        <li><a href="projeto.S.php?status=1&id='.$projeto.'">N&atilde;o iniciado</a></li>
                                        <li><a href="projeto.S.php?status=2&id='.$projeto.'">Em andamento</a></li>
                                        <li><a href="projeto.S.php?status=3&id='.$projeto.'">Em valida&ccedil;&atilde;o</a></li>
                                        <li><a href="projeto.S.php?status=4&id='.$projeto.'">Conclu&iacute;do</a></li>
                                      </ul>
                                    </div>

                                    <div class="btn-group"> <a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#"> Ordem <span class="caret"></span> </a>
                                      <ul class="dropdown-menu">
                                        <li><a href="#">Subir</a></li>
                                        <li><a href="#">Descer</a></li>
                                      </ul>
                                    </div>
                                                                       
                                    <button class="btn btn-small">Excluir</button>                                    
                                  </div>
                                                                    
                                </div>
                              </div>                              

                            </div>
                          </div>
                        </div>
                      </div>';
                    }
                  ?>                                                       
                </div>
              </div>
            </div>

            

            <div class="col-md-3 col-sm-3">
              <div class="grid simple ">
                <div class="grid-title no-border">
                  <div class="tools">                                      
                  </div>
                </div>                
                <div class="grid-body no-border">
                  <h4><i class="fa fa-bolt fa-1x"></i><span class="semi-bold">&nbsp; Em andamento </span> <span class="badge badge-danger pull-right"><?php echo count($result4); ?></span> </h4>

                  <?php
                    foreach ($result4 as $key4 => $value) {

                      $projeto=$result4[$key4]['ID'];

                      $queryTAG="SELECT PTAG.PROJETO, TAG.NOME AS TAG, TAG.ATRIBUTO FROM IN_PROJETOS_TAGS PTAG, IN_TAGS TAG WHERE PTAG.TAG = TAG.ID AND PROJETO = :projeto";
                      $queryMEM="SELECT PMEM.PROJETO, SUBSTR(USU.NOME,1,1) ||SUBSTR(USU.SOBRENOME,1,1) AS MEMBRO, USU.NOME || ' ' || USU.SOBRENOME AS NOME, SETO.LABEL FROM IN_PROJETOS_MEMBROS PMEM, IN_USUARIOS USU, IN_SETORES SETO WHERE PMEM.USUARIO = USU.ID AND USU.SETOR = SETO.SIGLA AND PROJETO = :projeto ORDER BY MEMBRO";
                      $queryCOM="SELECT PCOM.PROJETO, PCOM.COMENTARIO, USU.NOME || ' ' || USU.SOBRENOME AS USUARIO, PCOM.INCLUSAO  FROM IN_PROJETOS_COMENTARIOS PCOM, IN_USUARIOS USU WHERE PCOM.USUARIO = USU.ID AND PROJETO = :projeto ORDER BY INCLUSAO DESC";

                      $stmtTAG=$conn->prepare($queryTAG);                    
                      $stmtTAG->bindValue(':projeto',$projeto);
                      $stmtTAG->execute();                    
                      $resultTAG=$stmtTAG->fetchAll(PDO::FETCH_ASSOC);

                      $stmtMEM=$conn->prepare($queryMEM);                    
                      $stmtMEM->bindValue(':projeto',$projeto);
                      $stmtMEM->execute();                    
                      $resultMEM=$stmtMEM->fetchAll(PDO::FETCH_ASSOC);

                      $stmtCOM=$conn->prepare($queryCOM);                    
                      $stmtCOM->bindValue(':projeto',$projeto);
                      $stmtCOM->execute();                    
                      $resultCOM=$stmtCOM->fetchAll(PDO::FETCH_ASSOC);

                      echo 
                      '<span style="cursor: pointer;" data-toggle="modal" data-target="#'.$key4.'ModalEdit2">
                        <div class="tiles grey weather-widget round  m-b-10">
                         <h5 class="m-l-10 m-r-10">'.$result4[$key4]['NOME'].'</h5>
                        </div>
                       </span>
                       
                       <div class="modal fade" id="'.$key4.'ModalEdit2" tabindex="-1" role="dialog" aria-labelledby="'.$key4.'ModalLabel2" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>                                                
                              <br>
                              <h4 id="'.$key4.'ModalLabel2" class="semi-bold">'.$result4[$key4]['NOME'].'</h4>                            
                              <span class="label label-danger"><i class="fa fa-bolt"> &nbsp; </i> Em andamento</span> &nbsp;                                    
                            </div>
                            <div class="modal-body">

                              <div class="">
                                <div class="row" style="line-height:2;">

                                  <div class="col-md-12">
                                    <h5 class="bold">Descri&ccedil;&atilde;o &nbsp; <i class="fa fa-edit"></i></h5>                                                                                                   
                                    '.$result4[$key4]['DESCRICAO'].'
                                  </div>

                                    <div class="col-md-12">&nbsp;</div>

                                  <div class="col-md-12">
                                    <h5 class="bold">Tarefas &nbsp; <i class="fa fa-plus-square-o"></i></h5>
                                    <div class="checkbox check-warning">
                                      <input id="checkbox1" type="checkbox">
                                      <label for="checkbox1">An&aacute;lise de requisitos.</label>
                                      <br/>
                                      <input id="checkbox2" type="checkbox">
                                      <label for="checkbox2">Desenvolvimento das rotinas.</label>
                                      <br/>
                                      <input id="checkbox3" type="checkbox">
                                      <label for="checkbox3">Homologacao e entrega aos usuarios.</label>
                                    </div>
                                  </div>

                                    <div class="col-md-12">&nbsp;</div>                                                                    

                                  <div class="col-md-12">
                                    <h5 class="bold">Coment&aacute;rios &nbsp; <i class="fa fa-plus-square-o"></i></h5>';                                                                                                   
                                    foreach ($resultCOM as $keyCOM => $value) {
                                      echo '<p>- '.$resultCOM[$keyCOM]['COMENTARIO'].' <span style="font-size:10px; font-style:italic;"><b> ('.$resultCOM[$keyCOM]['USUARIO'].' em '.$resultCOM[$keyCOM]['INCLUSAO'].')</b></span></p>';
                                    }
                                  echo
                                  '</div>

                                    <div class="col-md-12">&nbsp;</div>                                  

                                  <div class="col-md-6">
                                    <h5 class="bold">Tags &nbsp; <i class="fa fa-plus-square-o"></i></h5>';
                                    foreach ($resultTAG as $keyTAG => $value) {
                                      echo '<span class="'.$resultTAG[$keyTAG]['ATRIBUTO'].'">'.$resultTAG[$keyTAG]['TAG'].'</span> &nbsp;';                                      
                                    }
                                  
                                  echo 
                                  '</div>
                                  
                                  <div class="col-md-6">
                                    <h5 class="bold">Membros &nbsp; <i class="fa fa-plus-square-o"></i></h5>';
                                    foreach ($resultMEM as $keyMEM => $value) {
                                      echo '<span class="'.$resultMEM[$keyMEM]['LABEL'].'" title="'.$resultMEM[$keyMEM]['NOME'].'">'.$resultMEM[$keyMEM]['MEMBRO'].'</span> &nbsp;';
                                    }                                     

                                  echo                                      
                                  '</div>

                                   <div class="col-md-12" style="border-bottom: 1px solid #b6bbc1;">&nbsp;</div> 

                                  <div class="col-md-12">
                                    <h5 class="bold">A&ccedil;&otilde;es</h5>                                    
                                    <div class="btn-group"> <a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#"> Status <span class="caret"></span> </a>
                                      <ul class="dropdown-menu">
                                        <li><a href="projeto.S.php?status=1&id='.$projeto.'">N&atilde;o iniciado</a></li>
                                        <li><a href="projeto.S.php?status=2&id='.$projeto.'">Em andamento</a></li>
                                        <li><a href="projeto.S.php?status=3&id='.$projeto.'">Em valida&ccedil;&atilde;o</a></li>
                                        <li><a href="projeto.S.php?status=4&id='.$projeto.'">Conclu&iacute;do</a></li>
                                      </ul>
                                    </div>

                                    <div class="btn-group"> <a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#"> Ordem <span class="caret"></span> </a>
                                      <ul class="dropdown-menu">
                                        <li><a href="#">Subir</a></li>
                                        <li><a href="#">Descer</a></li>
                                      </ul>
                                    </div>
                                                                       
                                    <button class="btn btn-small">Excluir</button>                                    
                                  </div>
                                                                    
                                </div>
                              </div>                              

                            </div>
                          </div>
                        </div>
                      </div>';
                    }
                  ?>                                                       
                </div>
              </div>
            </div>

            <div class="col-md-3 col-sm-3">
              <div class="grid simple ">
                <div class="grid-title no-border">
                  <div class="tools">                                      
                  </div>
                </div>
                <div class="grid-body no-border">
                  <h4><i class="fa fa-square-o fa-1x"></i><span class="semi-bold">&nbsp; Em valida&ccedil;&atilde;o</span> <span class="badge badge-info pull-right"><?php echo count($result6); ?></span> </h4>

                  <?php
                    foreach ($result6 as $key6 => $value) {

                      $projeto=$result6[$key6]['ID'];

                      $queryTAG="SELECT PTAG.PROJETO, TAG.NOME AS TAG, TAG.ATRIBUTO FROM IN_PROJETOS_TAGS PTAG, IN_TAGS TAG WHERE PTAG.TAG = TAG.ID AND PROJETO = :projeto";
                      $queryMEM="SELECT PMEM.PROJETO, SUBSTR(USU.NOME,1,1) ||SUBSTR(USU.SOBRENOME,1,1) AS MEMBRO, USU.NOME || ' ' || USU.SOBRENOME AS NOME, SETO.LABEL FROM IN_PROJETOS_MEMBROS PMEM, IN_USUARIOS USU, IN_SETORES SETO WHERE PMEM.USUARIO = USU.ID AND USU.SETOR = SETO.SIGLA AND PROJETO = :projeto ORDER BY MEMBRO";
                      $queryCOM="SELECT PCOM.PROJETO, PCOM.COMENTARIO, USU.NOME || ' ' || USU.SOBRENOME AS USUARIO, PCOM.INCLUSAO  FROM IN_PROJETOS_COMENTARIOS PCOM, IN_USUARIOS USU WHERE PCOM.USUARIO = USU.ID AND PROJETO = :projeto ORDER BY INCLUSAO DESC";

                      $stmtTAG=$conn->prepare($queryTAG);                    
                      $stmtTAG->bindValue(':projeto',$projeto);
                      $stmtTAG->execute();                    
                      $resultTAG=$stmtTAG->fetchAll(PDO::FETCH_ASSOC);

                      $stmtMEM=$conn->prepare($queryMEM);                    
                      $stmtMEM->bindValue(':projeto',$projeto);
                      $stmtMEM->execute();                    
                      $resultMEM=$stmtMEM->fetchAll(PDO::FETCH_ASSOC);

                      $stmtCOM=$conn->prepare($queryCOM);                    
                      $stmtCOM->bindValue(':projeto',$projeto);
                      $stmtCOM->execute();                    
                      $resultCOM=$stmtCOM->fetchAll(PDO::FETCH_ASSOC);

                      echo 
                      '<span style="cursor: pointer;" data-toggle="modal" data-target="#'.$key6.'ModalEdit3">
                        <div class="tiles grey weather-widget round  m-b-10">
                         <h5 class="m-l-10 m-r-10">'.$result6[$key6]['NOME'].'</h5>
                        </div>
                       </span>
                       
                       <div class="modal fade" id="'.$key6.'ModalEdit3" tabindex="-1" role="dialog" aria-labelledby="'.$key6.'ModalLabel3" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>                                                
                              <br>
                              <h4 id="'.$key6.'ModalLabel3" class="semi-bold">'.$result6[$key6]['NOME'].'</h4>                            
                              <span class="label label-info"><i class="fa fa-square-o"> &nbsp; </i> Em valida&ccedil;&atilde;o</span> &nbsp;                                    
                            </div>
                            <div class="modal-body">

                              <div class="">
                                <div class="row" style="line-height:2;">

                                  <div class="col-md-12">
                                    <h5 class="bold">Descri&ccedil;&atilde;o &nbsp; <i class="fa fa-edit"></i></h5>                                                                                                   
                                    '.$result6[$key6]['DESCRICAO'].'
                                  </div>

                                    <div class="col-md-12">&nbsp;</div>

                                  <div class="col-md-12">
                                    <h5 class="bold">Tarefas &nbsp; <i class="fa fa-plus-square-o"></i></h5>
                                    <div class="checkbox check-warning">
                                      <input id="checkbox1" type="checkbox">
                                      <label for="checkbox1">An&aacute;lise de requisitos.</label>
                                      <br/>
                                      <input id="checkbox2" type="checkbox">
                                      <label for="checkbox2">Desenvolvimento das rotinas.</label>
                                      <br/>
                                      <input id="checkbox3" type="checkbox">
                                      <label for="checkbox3">Homologacao e entrega aos usuarios.</label>
                                    </div>
                                  </div>

                                    <div class="col-md-12">&nbsp;</div>                                                                    

                                  <div class="col-md-12">
                                    <h5 class="bold">Coment&aacute;rios &nbsp; <i class="fa fa-plus-square-o"></i></h5>';                                                                                                   
                                    foreach ($resultCOM as $keyCOM => $value) {
                                      echo '<p>- '.$resultCOM[$keyCOM]['COMENTARIO'].' <span style="font-size:10px; font-style:italic;"><b> ('.$resultCOM[$keyCOM]['USUARIO'].' em '.$resultCOM[$keyCOM]['INCLUSAO'].')</b></span></p>';
                                    }
                                  echo
                                  '</div>

                                    <div class="col-md-12">&nbsp;</div>                                  

                                  <div class="col-md-6">
                                    <h5 class="bold">Tags &nbsp; <i class="fa fa-plus-square-o"></i></h5>';
                                    foreach ($resultTAG as $keyTAG => $value) {
                                      echo '<span class="'.$resultTAG[$keyTAG]['ATRIBUTO'].'">'.$resultTAG[$keyTAG]['TAG'].'</span> &nbsp;';                                      
                                    }
                                  
                                  echo 
                                  '</div>
                                  
                                  <div class="col-md-6">
                                    <h5 class="bold">Membros &nbsp; <i class="fa fa-plus-square-o"></i></h5>';
                                    foreach ($resultMEM as $keyMEM => $value) {
                                      echo '<span class="'.$resultMEM[$keyMEM]['LABEL'].'" title="'.$resultMEM[$keyMEM]['NOME'].'">'.$resultMEM[$keyMEM]['MEMBRO'].'</span> &nbsp;';
                                    }                                     

                                  echo                                      
                                  '</div>

                                   <div class="col-md-12" style="border-bottom: 1px solid #b6bbc1;">&nbsp;</div> 

                                  <div class="col-md-12">
                                    <h5 class="bold">A&ccedil;&otilde;es</h5>                                    
                                    <div class="btn-group"> <a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#"> Status <span class="caret"></span> </a>
                                      <ul class="dropdown-menu">
                                        <li><a href="projeto.S.php?status=1&id='.$projeto.'">N&atilde;o iniciado</a></li>
                                        <li><a href="projeto.S.php?status=2&id='.$projeto.'">Em andamento</a></li>
                                        <li><a href="projeto.S.php?status=3&id='.$projeto.'">Em valida&ccedil;&atilde;o</a></li>
                                        <li><a href="projeto.S.php?status=4&id='.$projeto.'">Conclu&iacute;do</a></li>
                                      </ul>
                                    </div>

                                    <div class="btn-group"> <a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#"> Ordem <span class="caret"></span> </a>
                                      <ul class="dropdown-menu">
                                        <li><a href="#">Subir</a></li>
                                        <li><a href="#">Descer</a></li>
                                      </ul>
                                    </div>
                                                                       
                                    <button class="btn btn-small">Excluir</button>                                    
                                  </div>
                                                                    
                                </div>
                              </div>                              

                            </div>
                          </div>
                        </div>
                      </div>';
                    }
                  ?>
                </div>
              </div>
            </div>

            <div class="col-md-3 col-sm-3">
              <div class="grid simple ">
                <div class="grid-title no-border">
                  <div class="tools">                                      
                  </div>
                </div>
                <div class="grid-body no-border">
                  <h4><i class="fa fa-check-square-o fa-1x"></i><span class="semi-bold">&nbsp; Conclu&iacute;do</span> <span class="badge badge-success pull-right"><?php echo count($result8); ?></span> </h4>

                  <?php
                    foreach ($result8 as $key8 => $value) {

                      $projeto=$result8[$key8]['ID'];

                      $queryTAG="SELECT PTAG.PROJETO, TAG.NOME AS TAG, TAG.ATRIBUTO FROM IN_PROJETOS_TAGS PTAG, IN_TAGS TAG WHERE PTAG.TAG = TAG.ID AND PROJETO = :projeto";
                      $queryMEM="SELECT PMEM.PROJETO, SUBSTR(USU.NOME,1,1) ||SUBSTR(USU.SOBRENOME,1,1) AS MEMBRO, USU.NOME || ' ' || USU.SOBRENOME AS NOME, SETO.LABEL FROM IN_PROJETOS_MEMBROS PMEM, IN_USUARIOS USU, IN_SETORES SETO WHERE PMEM.USUARIO = USU.ID AND USU.SETOR = SETO.SIGLA AND PROJETO = :projeto ORDER BY MEMBRO";
                      $queryCOM="SELECT PCOM.PROJETO, PCOM.COMENTARIO, USU.NOME || ' ' || USU.SOBRENOME AS USUARIO, PCOM.INCLUSAO  FROM IN_PROJETOS_COMENTARIOS PCOM, IN_USUARIOS USU WHERE PCOM.USUARIO = USU.ID AND PROJETO = :projeto ORDER BY INCLUSAO DESC";

                      $stmtTAG=$conn->prepare($queryTAG);                    
                      $stmtTAG->bindValue(':projeto',$projeto);
                      $stmtTAG->execute();                    
                      $resultTAG=$stmtTAG->fetchAll(PDO::FETCH_ASSOC);

                      $stmtMEM=$conn->prepare($queryMEM);                    
                      $stmtMEM->bindValue(':projeto',$projeto);
                      $stmtMEM->execute();                    
                      $resultMEM=$stmtMEM->fetchAll(PDO::FETCH_ASSOC);

                      $stmtCOM=$conn->prepare($queryCOM);                    
                      $stmtCOM->bindValue(':projeto',$projeto);
                      $stmtCOM->execute();                    
                      $resultCOM=$stmtCOM->fetchAll(PDO::FETCH_ASSOC);

                      echo 
                      '<span style="cursor: pointer;" data-toggle="modal" data-target="#'.$key8.'ModalEdit4">
                        <div class="tiles grey weather-widget round  m-b-10">
                         <h5 class="m-l-10 m-r-10">'.$result8[$key8]['NOME'].'</h5>
                        </div>
                       </span>
                       
                       <div class="modal fade" id="'.$key8.'ModalEdit4" tabindex="-1" role="dialog" aria-labelledby="'.$key8.'ModalLabel4" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>                                                
                              <br>
                              <h4 id="'.$key8.'ModalLabel4" class="semi-bold">'.$result8[$key8]['NOME'].'</h4>                            
                              <span class="label label-success"><i class="fa fa-check-square-o"> &nbsp; </i> Conclu&iacute;do</span> &nbsp;                                    
                            </div>
                            <div class="modal-body">

                              <div class="">
                                <div class="row" style="line-height:2;">

                                  <div class="col-md-12">
                                    <h5 class="bold">Descri&ccedil;&atilde;o &nbsp; <i class="fa fa-edit"></i></h5>                                                                                                   
                                    '.$result8[$key8]['DESCRICAO'].'
                                  </div>

                                    <div class="col-md-12">&nbsp;</div>

                                  <div class="col-md-12">
                                    <h5 class="bold">Tarefas &nbsp; <i class="fa fa-plus-square-o"></i></h5>
                                    <div class="checkbox check-warning">
                                      <input id="checkbox1" type="checkbox">
                                      <label for="checkbox1">An&aacute;lise de requisitos.</label>
                                      <br/>
                                      <input id="checkbox2" type="checkbox">
                                      <label for="checkbox2">Desenvolvimento das rotinas.</label>
                                      <br/>
                                      <input id="checkbox3" type="checkbox">
                                      <label for="checkbox3">Homologacao e entrega aos usuarios.</label>
                                    </div>
                                  </div>

                                    <div class="col-md-12">&nbsp;</div>                                                                    

                                  <div class="col-md-12">
                                    <h5 class="bold">Coment&aacute;rios &nbsp; <i class="fa fa-plus-square-o"></i></h5>';                                                                                                   
                                    foreach ($resultCOM as $keyCOM => $value) {
                                      echo '<p>- '.$resultCOM[$keyCOM]['COMENTARIO'].' <span style="font-size:10px; font-style:italic;"><b> ('.$resultCOM[$keyCOM]['USUARIO'].' em '.$resultCOM[$keyCOM]['INCLUSAO'].')</b></span></p>';
                                    }
                                  echo
                                  '</div>

                                    <div class="col-md-12">&nbsp;</div>                                  

                                  <div class="col-md-6">
                                    <h5 class="bold">Tags &nbsp; <i class="fa fa-plus-square-o"></i></h5>';
                                    foreach ($resultTAG as $keyTAG => $value) {
                                      echo '<span class="'.$resultTAG[$keyTAG]['ATRIBUTO'].'">'.$resultTAG[$keyTAG]['TAG'].'</span> &nbsp;';                                      
                                    }
                                  
                                  echo 
                                  '</div>
                                  
                                  <div class="col-md-6">
                                    <h5 class="bold">Membros &nbsp; <i class="fa fa-plus-square-o"></i></h5>';
                                    foreach ($resultMEM as $keyMEM => $value) {
                                      echo '<span class="'.$resultMEM[$keyMEM]['LABEL'].'" title="'.$resultMEM[$keyMEM]['NOME'].'">'.$resultMEM[$keyMEM]['MEMBRO'].'</span> &nbsp;';
                                    }                                     

                                  echo                                      
                                  '</div>

                                   <div class="col-md-12" style="border-bottom: 1px solid #b6bbc1;">&nbsp;</div> 

                                  <div class="col-md-12">
                                    <h5 class="bold">A&ccedil;&otilde;es</h5>                                    
                                    <div class="btn-group"> <a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#"> Status <span class="caret"></span> </a>
                                      <ul class="dropdown-menu">
                                        <li><a href="projeto.S.php?status=1&id='.$projeto.'">N&atilde;o iniciado</a></li>
                                        <li><a href="projeto.S.php?status=2&id='.$projeto.'">Em andamento</a></li>
                                        <li><a href="projeto.S.php?status=3&id='.$projeto.'">Em valida&ccedil;&atilde;o</a></li>
                                        <li><a href="projeto.S.php?status=4&id='.$projeto.'">Conclu&iacute;do</a></li>
                                      </ul>
                                    </div>

                                    <div class="btn-group"> <a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#"> Ordem <span class="caret"></span> </a>
                                      <ul class="dropdown-menu">
                                        <li><a href="#">Subir</a></li>
                                        <li><a href="#">Descer</a></li>
                                      </ul>
                                    </div>
                                                                       
                                    <button class="btn btn-small">Excluir</button>                                    
                                  </div>
                                                                    
                                </div>
                              </div>                              

                            </div>
                          </div>
                        </div>
                      </div>';
                    }
                  ?>

                </div>
              </div>
            </div>         



          </div> <!--/row -->
          <!-- END PLACE PAGE CONTENT HERE -->
        </div>
      </div>
      <!-- END PAGE CONTAINER -->      
    </div>
    <!-- END CONTENT -->
    <!-- BEGIN CORE JS FRAMEWORK-->
    <script src="../assets/plugins/pace/pace.min.js" type="text/javascript"></script>
    <!-- BEGIN JS DEPENDECENCIES-->
    <script src="../assets/plugins/jquery/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/bootstrapv3/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/jquery-block-ui/jqueryblockui.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
    <script src="../assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
    <!-- END CORE JS DEPENDECENCIES-->
    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="../webarch/js/webarch.js" type="text/javascript"></script>
    <script src="../assets/js/chat.js" type="text/javascript"></script>
    <!-- END CORE TEMPLATE JS -->
  </body>
</html>