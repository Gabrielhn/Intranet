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

$query2 = "SELECT R.*, S.NOME AS NOME_SETOR, S.LABEL, U.EMAIL, R.ID FROM IN_RAMAIS R, IN_SETORES S, IN_USUARIOS U WHERE R.SETOR = S.SIGLA AND R.USUARIO = U.ID(+) AND R.SETOR = :setor ORDER BY R.GESTOR DESC, R.NOME ASC";

//#1
$stmt1 = $conn->prepare($query1);
$stmt1->bindValue(':id',$id);
$stmt1->execute();
$result1=$stmt1->fetch(PDO::FETCH_ASSOC);

//#2
$stmt2 = $conn->prepare($query2);
$stmt2->bindValue(':setor','ADM');
$stmt2->execute();
$result2=$stmt2->fetchAll(PDO::FETCH_ASSOC);

//#3
$stmt3 = $conn->prepare($query2);
$stmt3->bindValue(':setor','RH');
$stmt3->execute();
$result3=$stmt3->fetchAll(PDO::FETCH_ASSOC);

//#4
$stmt4 = $conn->prepare($query2);
$stmt4->bindValue(':setor','TI');
$stmt4->execute();
$result4=$stmt4->fetchAll(PDO::FETCH_ASSOC);

//#5
$stmt5 = $conn->prepare($query2);
$stmt5->bindValue(':setor','CTB');
$stmt5->execute();
$result5=$stmt5->fetchAll(PDO::FETCH_ASSOC);

//#6
$stmt6 = $conn->prepare($query2);
$stmt6->bindValue(':setor','MKT');
$stmt6->execute();
$result6=$stmt6->fetchAll(PDO::FETCH_ASSOC);

//#7
$stmt7 = $conn->prepare($query2);
$stmt7->bindValue(':setor','FIN');
$stmt7->execute();
$result7=$stmt7->fetchAll(PDO::FETCH_ASSOC);

//#8
$stmt8 = $conn->prepare($query2);
$stmt8->bindValue(':setor','REC');
$stmt8->execute();
$result8=$stmt8->fetchAll(PDO::FETCH_ASSOC);

//#9
$stmt9 = $conn->prepare($query2);
$stmt9->bindValue(':setor','MAN');
$stmt9->execute();
$result9=$stmt9->fetchAll(PDO::FETCH_ASSOC);

//#10
$stmt10 = $conn->prepare($query2);
$stmt10->bindValue(':setor','COM');
$stmt10->execute();
$result10=$stmt10->fetchAll(PDO::FETCH_ASSOC);

//$11
$stmt11 = $conn->prepare($query2);
$stmt11->bindValue(':setor','NFS');
$stmt11->execute();
$result11=$stmt11->fetchAll(PDO::FETCH_ASSOC);

//#12
$stmt12 = $conn->prepare($query2);
$stmt12->bindValue(':setor','PCP');
$stmt12->execute();
$result12=$stmt12->fetchAll(PDO::FETCH_ASSOC);

//#13
$stmt13 = $conn->prepare($query2);
$stmt13->bindValue(':setor','CEXP');
$stmt13->execute();
$result13=$stmt13->fetchAll(PDO::FETCH_ASSOC);

//#14
$stmt14 = $conn->prepare($query2);
$stmt14->bindValue(':setor','ECOM');
$stmt14->execute();
$result14=$stmt14->fetchAll(PDO::FETCH_ASSOC);

//#15
$stmt15 = $conn->prepare($query2);
$stmt15->bindValue(':setor','CMX');
$stmt15->execute();
$result15=$stmt15->fetchAll(PDO::FETCH_ASSOC);

//#16
$stmt16 = $conn->prepare($query2);
$stmt16->bindValue(':setor','CMP');
$stmt16->execute();
$result16=$stmt16->fetchAll(PDO::FETCH_ASSOC);

//#17
$stmt17 = $conn->prepare($query2);
$stmt17->bindValue(':setor','AUD');
$stmt17->execute();
$result17=$stmt17->fetchAll(PDO::FETCH_ASSOC);

//#18
$stmt18 = $conn->prepare($query2);
$stmt18->bindValue(':setor','MOD');
$stmt18->execute();
$result18=$stmt18->fetchAll(PDO::FETCH_ASSOC);

//#19
$stmt19 = $conn->prepare($query2);
$stmt19->bindValue(':setor','CRI');
$stmt19->execute();
$result19=$stmt19->fetchAll(PDO::FETCH_ASSOC);

//#20
$stmt20 = $conn->prepare($query2);
$stmt20->bindValue(':setor','MTZ');
$stmt20->execute();
$result20=$stmt20->fetchAll(PDO::FETCH_ASSOC);

//#21
$stmt21 = $conn->prepare($query2);
$stmt21->bindValue(':setor','CTO');
$stmt21->execute();
$result21=$stmt21->fetchAll(PDO::FETCH_ASSOC);

//#22
$stmt22 = $conn->prepare($query2);
$stmt22->bindValue(':setor','EST');
$stmt22->execute();
$result22=$stmt22->fetchAll(PDO::FETCH_ASSOC);

//#23
$stmt23 = $conn->prepare($query2);
$stmt23->bindValue(':setor','LAB');
$stmt23->execute();
$result23=$stmt23->fetchAll(PDO::FETCH_ASSOC);

//#24
$stmt24 = $conn->prepare($query2);
$stmt24->bindValue(':setor','MAQ');
$stmt24->execute();
$result24=$stmt24->fetchAll(PDO::FETCH_ASSOC);

//#25
$stmt25 = $conn->prepare($query2);
$stmt25->bindValue(':setor','PROD');
$stmt25->execute();
$result25=$stmt25->fetchAll(PDO::FETCH_ASSOC);

//#26
$stmt26 = $conn->prepare($query2);
$stmt26->bindValue(':setor','SER');
$stmt26->execute();
$result26=$stmt26->fetchAll(PDO::FETCH_ASSOC);

//#27
$stmt27 = $conn->prepare($query2);
$stmt27->bindValue(':setor','CRO');
$stmt27->execute();
$result27=$stmt27->fetchAll(PDO::FETCH_ASSOC);

//#28
$stmt28 = $conn->prepare($query2);
$stmt28->bindValue(':setor','OUT');
$stmt28->execute();
$result28=$stmt28->fetchAll(PDO::FETCH_ASSOC);

//#29
$stmt29 = $conn->prepare($query2);
$stmt29->bindValue(':setor','TRA');
$stmt29->execute();
$result29=$stmt29->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html>
  <head>
    <title>Aniger - Ramais</title>
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
            <li class="start active"> 
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
          <iframe src="http://free.timeanddate.com/clock/i5hp9yxv/n595/tlbr5/fn14/fc666/tc22262e/pa0/th1" frameborder="0" width="58" height="14"></iframe>
        </div>
        <div class="pull-right">
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
            <li><a href="#" class="active">Ramais</a> </li>
          </ul>
          <!-- BEGIN PAGE TITLE -->
          <div class="page-title" style="margin-bottom:0px;"> <i class="material-icons">phone_forwarded</i>
            <h3>Lista de ramais </h3>
          </div>
          <div class="col-md-12 m-b-10">
            <span class="help">* Clique no nome para ver o e-mail.</span>
          </div>
          <!-- END PAGE TITLE -->
          <!-- CONTEUDO -->
          <!--<div class="row">-->
          <div class="col-md-4 col-sm-6 m-b-10">
            <div class="span12">
              <div class="grid simple ">
                <div class="grid-title">
                  <?php echo '<h4><span class="bold">Dire&ccedil;&atilde;o &nbsp;</span><span class="'.$result2[0]['LABEL'].'">'.$result2[0]['SETOR']; ?> </span></h4>
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <!--<a href="#" class="config"></a>                    -->
                    <a href="javascript:;" class="reload"></a>
                  </div>
                </div>
                <div class="grid-body ">
                  <table class="table table-hover table-bordered" id="ADM">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Ramal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($result2 as $key2 => $value) {
                          echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result2[$key2]['ID'].'" data-target=".row'.$result2[$key2]['ID'].'">
                              <td>'.$result2[$key2]['NOME'].'<i class="material-icons pull-right" style="font-size: 18px;">stars</i></td>
                              <td class="center">'.$result2[$key2]['RAMAL'].'</td>
                            </tr>
                            <tr class="collapse row'.$result2[$key2]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result2[$key2]['EMAIL'].'</td>                                
                            </tr>';
                        }
                      ?>                                            
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 m-b-10">
            <div class="span12">
              <div class="grid simple ">
                <div class="grid-title">
                  <?php echo '<h4><span class="bold">Co. Exporta&ccedil;&atilde;o &nbsp;</span><span class="'.$result13[0]['LABEL'].'">'.$result13[0]['SETOR']; ?> </span></h4>                                                                                                        
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>                     
                    <a href="javascript:;" class="reload"></a>
                  </div>
                </div>
                <div class="grid-body ">
                  <table class="table table-hover table-bordered" id="CEXP">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Ramal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($result13 as $key13 => $value) {
                          if ($result13[$key13]['GESTOR'] == 'S') {
                            echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result13[$key13]['ID'].'" data-target=".row'.$result13[$key13]['ID'].'">
                              <td>'.$result13[$key13]['NOME'].'<i class="material-icons pull-right" style="font-size: 18px;">stars</i></td>
                              <td class="center">'.$result13[$key13]['RAMAL'].'</td>
                            </tr>
                            <tr class="collapse row'.$result13[$key13]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result13[$key13]['EMAIL'].'</td>                                
                            </tr>';
                          } else {
                            echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result13[$key13]['ID'].'" data-target=".row'.$result13[$key13]['ID'].'">
                              <td>'.$result13[$key13]['NOME'].'</td>
                              <td class="center">'.$result13[$key13]['RAMAL'].'</td>
                            </tr><tr class="collapse row'.$result13[$key13]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result13[$key13]['EMAIL'].'</td>                                
                            </tr>';
                          }                          
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>                                        
          
          <div class="col-md-4 col-sm-6 m-b-10">
            <div class="span12">
              <div class="grid simple ">
                <div class="grid-title">
                  <?php echo '<h4><span class="bold">Inform&aacute;tica &nbsp;</span><span class="'.$result4[0]['LABEL'].'">'.$result4[0]['SETOR']; ?> </span></h4>                                                      
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>                     
                    <a href="javascript:;" class="reload"></a>
                  </div>
                </div>
                <div class="grid-body ">
                  <table class="table table-hover table-bordered" id="TI">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Ramal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($result4 as $key4 => $value) {
                          if ($result4[$key4]['GESTOR'] == 'S') {
                            echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result4[$key4]['ID'].'" data-target=".row'.$result4[$key4]['ID'].'">
                              <td>'.$result4[$key4]['NOME'].'<i class="material-icons pull-right" style="font-size: 18px;">stars</i></td>
                              <td class="center">'.$result4[$key4]['RAMAL'].'</td>
                            </tr>
                            <tr class="collapse row'.$result4[$key4]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result4[$key4]['EMAIL'].'</td>                                
                            </tr>';
                          } else {
                            echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result4[$key4]['ID'].'" data-target=".row'.$result4[$key4]['ID'].'">
                              <td>'.$result4[$key4]['NOME'].'</td>
                              <td class="center">'.$result4[$key4]['RAMAL'].'</td>
                            </tr>
                            <tr class="collapse row'.$result4[$key4]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result4[$key4]['EMAIL'].'</td>                                
                            </tr>
                            ';
                          }                          
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-4 col-sm-6 m-b-10">
            <div class="span12">
              <div class="grid simple ">
                <div class="grid-title">
                  <?php echo '<h4><span class="bold">Financeiro &nbsp;</span><span class="'.$result7[0]['LABEL'].'">'.$result7[0]['SETOR']; ?> </span></h4>
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>                     
                    <a href="javascript:;" class="reload"></a>
                  </div>
                </div>
                <div class="grid-body ">
                  <table class="table table-hover table-bordered" id="FIN">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Ramal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($result7 as $key7 => $value) {
                          if ($result7[$key7]['GESTOR'] == 'S') {
                            echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result7[$key7]['ID'].'" data-target=".row'.$result7[$key7]['ID'].'">
                              <td>'.$result7[$key7]['NOME'].'<i class="material-icons pull-right" style="font-size: 18px;">stars</i></td>
                              <td class="center">'.$result7[$key7]['RAMAL'].'</td>
                            </tr>
                            <tr class="collapse row'.$result7[$key7]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result7[$key7]['EMAIL'].'</td>                                
                            </tr>';
                          } else {
                            echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result7[$key7]['ID'].'" data-target=".row'.$result7[$key7]['ID'].'">
                              <td>'.$result7[$key7]['NOME'].'</td>
                              <td class="center">'.$result7[$key7]['RAMAL'].'</td>
                            </tr>
                            <tr class="collapse row'.$result7[$key7]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result7[$key7]['EMAIL'].'</td>                                
                            </tr>';
                          }                          
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>                    

          <div class="col-md-4 col-sm-6 m-b-10">
            <div class="span12">
              <div class="grid simple ">
                <div class="grid-title">
                  <?php echo '<h4><span class="bold">Marketing &nbsp;</span><span class="'.$result6[0]['LABEL'].'">'.$result6[0]['SETOR']; ?> </span></h4>
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>                     
                    <a href="javascript:;" class="reload"></a>
                  </div>
                </div>
                <div class="grid-body ">
                  <table class="table table-hover table-bordered" id="MKT">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Ramal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($result6 as $key6 => $value) {
                          if ($result6[$key6]['GESTOR'] == 'S') {
                            echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result6[$key6]['ID'].'" data-target=".row'.$result6[$key6]['ID'].'">
                              <td>'.$result6[$key6]['NOME'].'<i class="material-icons pull-right" style="font-size: 18px;">stars</i></td>
                              <td class="center">'.$result6[$key6]['RAMAL'].'</td>
                            </tr>
                            <tr class="collapse row'.$result6[$key6]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result6[$key6]['EMAIL'].'</td>                                
                            </tr>';
                          } else {
                            echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result6[$key6]['ID'].'" data-target=".row'.$result6[$key6]['ID'].'">
                              <td>'.$result6[$key6]['NOME'].'</td>
                              <td class="center">'.$result6[$key6]['RAMAL'].'</td>
                            </tr>
                            <tr class="collapse row'.$result6[$key6]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result6[$key6]['EMAIL'].'</td>                                
                            </tr>';
                          }                          
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 m-b-10" >
            <div class="span12">
              <div class="grid simple ">
                <div class="grid-title">
                  <?php echo '<h4><span class="bold">Comercial &nbsp;</span><span class="'.$result10[0]['LABEL'].'">'.$result10[0]['SETOR']; ?> </span></h4>
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>                     
                    <a href="javascript:;" class="reload"></a>
                  </div>
                </div>
                <div class="grid-body ">
                  <table class="table table-hover table-bordered" id="COM">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Ramal</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php
                        foreach ($result10 as $key10 => $value) {
                          if ($result10[$key10]['GESTOR'] == 'S') {
                            echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result10[$key10]['ID'].'" data-target=".row'.$result10[$key10]['ID'].'">
                              <td>'.$result10[$key10]['NOME'].'<i class="material-icons pull-right" style="font-size: 18px;">stars</i></td>
                              <td class="center">'.$result10[$key10]['RAMAL'].'</td>
                            </tr>
                            <tr class="collapse row'.$result10[$key10]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result10[$key10]['EMAIL'].'</td>                                
                            </tr>';
                          } else {
                            echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result10[$key10]['ID'].'" data-target=".row'.$result10[$key10]['ID'].'">
                              <td>'.$result10[$key10]['NOME'].'</td>
                              <td class="center">'.$result10[$key10]['RAMAL'].'</td>
                            </tr>
                            <tr class="collapse row'.$result10[$key10]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result10[$key10]['EMAIL'].'</td>                                
                            </tr>';
                          }                          
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>          

          <div class="col-md-4 col-sm-6 m-b-10">
            <div class="span12">
              <div class="grid simple ">
                <div class="grid-title">
                  <?php echo '<h4><span class="bold">Auditoria &nbsp;</span><span class="'.$result17[0]['LABEL'].'">'.$result17[0]['SETOR']; ?> </span></h4>                  
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>                     
                    <a href="javascript:;" class="reload"></a>
                  </div>
                </div>
                <div class="grid-body ">
                  <table class="table table-hover table-bordered" id="AUD">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Ramal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($result17 as $key17 => $value) {
                          if ($result17[$key17]['GESTOR'] == 'S') {
                            echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result17[$key17]['ID'].'" data-target=".row'.$result17[$key17]['ID'].'">
                              <td>'.$result17[$key17]['NOME'].'<i class="material-icons pull-right" style="font-size: 18px;">stars</i></td>
                              <td class="center">'.$result17[$key17]['RAMAL'].'</td>
                            </tr>
                            <tr class="collapse row'.$result4[$key4]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result17[$key17]['EMAIL'].'</td>                                
                            </tr>';
                          } else {
                            echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result17[$key17]['ID'].'" data-target=".row'.$result17[$key17]['ID'].'">
                              <td>'.$result17[$key17]['NOME'].'</td>
                              <td class="center">'.$result17[$key17]['RAMAL'].'</td>
                            </tr>
                            <tr class="collapse row'.$result17[$key17]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result17[$key17]['EMAIL'].'</td>                                
                            </tr>';
                          }                          
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 m-b-10">
            <div class="span12">
              <div class="grid simple ">
                <div class="grid-title">
                  <?php echo '<h4><span class="bold">Compras &nbsp;</span><span class="'.$result16[0]['LABEL'].'">'.$result16[0]['SETOR']; ?> </span></h4>                                    
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>                     
                    <a href="javascript:;" class="reload"></a>
                  </div>
                </div>
                <div class="grid-body ">
                  <table class="table table-hover table-bordered" id="CMP">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Ramal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($result16 as $key16 => $value) {
                          if ($result16[$key16]['GESTOR'] == 'S') {
                            echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result16[$key16]['ID'].'" data-target=".row'.$result16[$key16]['ID'].'">
                              <td>'.$result16[$key16]['NOME'].'<i class="material-icons pull-right" style="font-size: 18px;">stars</i></td>
                              <td class="center">'.$result16[$key16]['RAMAL'].'</td>
                            </tr>
                            <tr class="collapse row'.$result16[$key16]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result16[$key16]['EMAIL'].'</td>                                
                            </tr>';
                          } else {
                            echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result16[$key16]['ID'].'" data-target=".row'.$result16[$key16]['ID'].'">
                              <td>'.$result16[$key16]['NOME'].'</td>
                              <td class="center">'.$result16[$key16]['RAMAL'].'</td>
                            </tr>
                            <tr class="collapse row'.$result16[$key16]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result16[$key16]['EMAIL'].'</td>                                
                            </tr>';
                          }                          
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
                    
          <div class="col-md-4 col-sm-6 m-b-10">
            <div class="span12">
              <div class="grid simple ">
                <div class="grid-title">
                  <?php echo '<h4><span class="bold">Notas &nbsp;</span><span class="'.$result11[0]['LABEL'].'">'.$result11[0]['SETOR']; ?> </span></h4>                                                      
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>                     
                    <a href="javascript:;" class="reload"></a>
                  </div>
                </div>
                <div class="grid-body ">
                  <table class="table table-hover table-bordered" id="NFS">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Ramal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($result11 as $key11 => $value) {
                          if ($result11[$key11]['GESTOR'] == 'S') {
                            echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result11[$key11]['ID'].'" data-target=".row'.$result11[$key11]['ID'].'">
                              <td>'.$result11[$key11]['NOME'].'<i class="material-icons pull-right" style="font-size: 18px;">stars</i></td>
                              <td class="center">'.$result11[$key11]['RAMAL'].'</td>
                            </tr>
                            <tr class="collapse row'.$result11[$key11]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result11[$key11]['EMAIL'].'</td>                                
                            </tr>';
                          } else {
                            echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result11[$key11]['ID'].'" data-target=".row'.$result11[$key11]['ID'].'">
                              <td>'.$result11[$key11]['NOME'].'</td>
                              <td class="center">'.$result11[$key11]['RAMAL'].'</td>
                            </tr>
                            <tr class="collapse row'.$result11[$key11]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result11[$key11]['EMAIL'].'</td>                                
                            </tr>';
                          }                          
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 m-b-10">
            <div class="span12">
              <div class="grid simple ">
                <div class="grid-title">
                  <?php echo '<h4><span class="bold">Manuten&ccedil;&atilde;o &nbsp;</span><span class="'.$result9[0]['LABEL'].'">'.$result9[0]['SETOR']; ?> </span></h4>                                                      
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>                     
                    <a href="javascript:;" class="reload"></a>
                  </div>
                </div>
                <div class="grid-body ">
                  <table class="table table-hover table-bordered" id="MAN">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Ramal</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php
                        foreach ($result9 as $key9 => $value) {
                          if ($result9[$key9]['GESTOR'] == 'S') {
                            echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result9[$key9]['ID'].'" data-target=".row'.$result9[$key9]['ID'].'">
                              <td>'.$result9[$key9]['NOME'].'<i class="material-icons pull-right" style="font-size: 18px;">stars</i></td>
                              <td class="center">'.$result9[$key9]['RAMAL'].'</td>
                            </tr>
                            <tr class="collapse row'.$result9[$key9]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result9[$key9]['EMAIL'].'</td>                                
                            </tr>';
                          } else {
                            echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result9[$key9]['ID'].'" data-target=".row'.$result9[$key9]['ID'].'">
                              <td>'.$result9[$key9]['NOME'].'</td>
                              <td class="center">'.$result9[$key9]['RAMAL'].'</td>
                            </tr>
                            <tr class="collapse row'.$result9[$key9]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result9[$key9]['EMAIL'].'</td>                                
                            </tr>';
                          }                          
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 m-b-10">
            <div class="span12">
              <div class="grid simple ">
                <div class="grid-title">
                  <?php echo '<h4><span class="bold">Maquetaria &nbsp;</span><span class="'.$result24[0]['LABEL'].'">'.$result24[0]['SETOR']; ?> </span></h4>                                                                                                                                   
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>                     
                    <a href="javascript:;" class="reload"></a>
                  </div>
                </div>
                <div class="grid-body ">
                  <table class="table table-hover table-bordered" id="MAQ">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Ramal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($result24 as $key24 => $value) {
                          if ($result24[$key24]['GESTOR'] == 'S') {
                            echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result24[$key24]['ID'].'" data-target=".row'.$result24[$key24]['ID'].'">
                              <td>'.$result24[$key24]['NOME'].'<i class="material-icons pull-right" style="font-size: 18px;">stars</i></td>
                              <td class="center">'.$result24[$key24]['RAMAL'].'</td>
                            </tr>
                            <tr class="collapse row'.$result24[$key24]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result24[$key24]['EMAIL'].'</td>                                
                            </tr>';
                          } else {
                            echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result24[$key24]['ID'].'" data-target=".row'.$result24[$key24]['ID'].'">
                              <td>'.$result24[$key24]['NOME'].'</td>
                              <td class="center">'.$result24[$key24]['RAMAL'].'</td>
                            </tr>
                            <tr class="collapse row'.$result24[$key24]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result24[$key24]['EMAIL'].'</td>                                
                            </tr>';
                          }                          
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>                    

          <div class="col-md-4 col-sm-6 m-b-10">
            <div class="span12">
              <div class="grid simple ">
                <div class="grid-title">
                  <?php echo '<h4><span class="bold">Contabilidade &nbsp;</span><span class="'.$result5[0]['LABEL'].'">'.$result5[0]['SETOR']; ?> </span></h4>                                                                                                                              
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>                     
                    <a href="javascript:;" class="reload"></a>
                  </div>
                </div>
                <div class="grid-body ">
                  <table class="table table-hover table-bordered" id="CTB">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Ramal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($result5 as $key5 => $value) {
                          if ($result5[$key5]['GESTOR'] == 'S') {
                            echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result5[$key5]['ID'].'" data-target=".row'.$result5[$key5]['ID'].'">
                              <td>'.$result5[$key5]['NOME'].'<i class="material-icons pull-right" style="font-size: 18px;">stars</i></td>
                              <td class="center">'.$result5[$key5]['RAMAL'].'</td>
                            </tr>
                            <tr class="collapse row'.$result5[$key5]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result5[$key5]['EMAIL'].'</td>                                
                            </tr>';
                          } else {
                            echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result5[$key5]['ID'].'" data-target=".row'.$result5[$key5]['ID'].'">
                              <td>'.$result5[$key5]['NOME'].'</td>
                              <td class="center">'.$result5[$key5]['RAMAL'].'</td>
                            </tr>
                            <tr class="collapse row'.$result5[$key5]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result5[$key5]['EMAIL'].'</td>                                
                            </tr>';
                          }                          
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>          

          <div class="col-md-4 col-sm-6 m-b-10">
            <div class="span12">
              <div class="grid simple ">
                <div class="grid-title">
                  <?php echo '<h4><span class="bold">Recep&ccedil;&atilde;o &nbsp;</span><span class="'.$result8[0]['LABEL'].'">'.$result8[0]['SETOR']; ?> </span></h4>                                                                                          
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>                     
                    <a href="javascript:;" class="reload"></a>
                  </div>
                </div>
                <div class="grid-body ">
                  <table class="table table-hover table-bordered" id="REC">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Ramal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($result8 as $key8 => $value) {
                          if ($result8[$key8]['GESTOR'] == 'S') {
                            echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result8[$key8]['ID'].'" data-target=".row'.$result8[$key8]['ID'].'">
                              <td>'.$result8[$key8]['NOME'].'<i class="material-icons pull-right" style="font-size: 18px;">stars</i></td>
                              <td class="center">'.$result8[$key8]['RAMAL'].'</td>
                            </tr>
                            <tr class="collapse row'.$result8[$key8]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result8[$key8]['EMAIL'].'</td>                                
                            </tr>';
                          } else {
                            echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result8[$key8]['ID'].'" data-target=".row'.$result8[$key8]['ID'].'">
                              <td>'.$result8[$key8]['NOME'].'</td>
                              <td class="center">'.$result8[$key8]['RAMAL'].'</td>
                            </tr>
                            <tr class="collapse row'.$result8[$key8]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result8[$key8]['EMAIL'].'</td>                                
                            </tr>';
                          }                          
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 m-b-10">
            <div class="span12">
              <div class="grid simple ">
                <div class="grid-title">
                  <?php echo '<h4><span class="bold">Cronoan&aacute;lise &nbsp;</span><span class="'.$result27[0]['LABEL'].'">'.$result27[0]['SETOR']; ?> </span></h4>                                                                                                         
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>                     
                    <a href="javascript:;" class="reload"></a>
                  </div>
                </div>
                <div class="grid-body ">
                  <table class="table table-hover table-bordered" id="CRO">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Ramal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($result27 as $key27 => $value) {
                          if ($result27[$key27]['GESTOR'] == 'S') {
                            echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result27[$key27]['ID'].'" data-target=".row'.$result27[$key27]['ID'].'">
                              <td>'.$result27[$key27]['NOME'].'<i class="material-icons pull-right" style="font-size: 18px;">stars</i></td>
                              <td class="center">'.$result27[$key27]['RAMAL'].'</td>
                            </tr>
                            <tr class="collapse row'.$result27[$key27]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result27[$key27]['EMAIL'].'</td>                                
                            </tr>';
                          } else {
                            echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result27[$key27]['ID'].'" data-target=".row'.$result27[$key27]['ID'].'">
                              <td>'.$result27[$key27]['NOME'].'</td>
                              <td class="center">'.$result27[$key27]['RAMAL'].'</td>
                            </tr>
                            <tr class="collapse row'.$result27[$key27]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result27[$key27]['EMAIL'].'</td>                                
                            </tr>';
                          }                          
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 m-b-10">
            <div class="span12">
              <div class="grid simple ">
                <div class="grid-title">
                  <?php echo '<h4><span class="bold">Modelagem &nbsp;</span><span class="'.$result18[0]['LABEL'].'">'.$result18[0]['SETOR']; ?> </span></h4>                                                                                                                                     
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>                     
                    <a href="javascript:;" class="reload"></a>
                  </div>
                </div>
                <div class="grid-body ">
                  <table class="table table-hover table-bordered" id="MOD">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Ramal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($result18 as $key18 => $value) {
                          if ($result18[$key18]['GESTOR'] == 'S') {
                            echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result18[$key18]['ID'].'" data-target=".row'.$result18[$key18]['ID'].'">
                              <td>'.$result18[$key18]['NOME'].'<i class="material-icons pull-right" style="font-size: 18px;">stars</i></td>
                              <td class="center">'.$result5[$key18]['RAMAL'].'</td>
                            </tr>
                            <tr class="collapse row'.$result18[$key18]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result18[$key18]['EMAIL'].'</td>                                
                            </tr>';
                          } else {
                            echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result18[$key18]['ID'].'" data-target=".row'.$result18[$key18]['ID'].'">
                              <td>'.$result18[$key18]['NOME'].'</td>
                              <td class="center">'.$result18[$key18]['RAMAL'].'</td>
                            </tr>
                            <tr class="collapse row'.$result18[$key18]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result18[$key18]['EMAIL'].'</td>                                
                            </tr>';
                          }                          
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 m-b-10">
            <div class="span12">
              <div class="grid simple ">
                <div class="grid-title">
                  <?php echo '<h4><span class="bold">Plan. Produ&ccedil;&atilde;o &nbsp;</span><span class="'.$result12[0]['LABEL'].'">'.$result12[0]['SETOR']; ?> </span></h4>                                                                                                         
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>                     
                    <a href="javascript:;" class="reload"></a>
                  </div>
                </div>
                <div class="grid-body ">
                  <table class="table table-hover table-bordered" id="PCP">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Ramal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($result12 as $key12 => $value) {
                          if ($result12[$key12]['GESTOR'] == 'S') {
                            echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result12[$key12]['ID'].'" data-target=".row'.$result12[$key12]['ID'].'">
                              <td>'.$result12[$key12]['NOME'].'<i class="material-icons pull-right" style="font-size: 18px;">stars</i></td>
                              <td class="center">'.$result12[$key12]['RAMAL'].'</td>
                            </tr>
                            <tr class="collapse row'.$result12[$key12]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result12[$key12]['EMAIL'].'</td>                                
                            </tr>';
                          } else {
                            echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result12[$key12]['ID'].'" data-target=".row'.$result12[$key12]['ID'].'">
                              <td>'.$result12[$key12]['NOME'].'</td>
                              <td class="center">'.$result12[$key12]['RAMAL'].'</td>
                            </tr>
                            <tr class="collapse row'.$result12[$key12]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result12[$key12]['EMAIL'].'</td>                                
                            </tr>';
                          }                          
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>                                        

          <div class="col-md-4 col-sm-6 m-b-10">
            <div class="span12">
              <div class="grid simple ">
                <div class="grid-title">
                  <?php echo '<h4><span class="bold">Com&eacute;rcio Ext. &nbsp;</span><span class="'.$result15[0]['LABEL'].'">'.$result15[0]['SETOR']; ?> </span></h4>                                                                                                                                  
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>                     
                    <a href="javascript:;" class="reload"></a>
                  </div>
                </div>
                <div class="grid-body ">
                  <table class="table table-hover table-bordered" id="CMX">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Ramal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($result15 as $key15 => $value) {
                          if ($result15[$key15]['GESTOR'] == 'S') {
                            echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result15[$key15]['ID'].'" data-target=".row'.$result15[$key15]['ID'].'">
                              <td>'.$result15[$key15]['NOME'].'<i class="material-icons pull-right" style="font-size: 18px;">stars</i></td>
                              <td class="center">'.$result15[$key15]['RAMAL'].'</td>
                            </tr>
                            <tr class="collapse row'.$result15[$key15]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result15[$key15]['EMAIL'].'</td>                                
                            </tr>';
                          } else {
                            echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result15[$key15]['ID'].'" data-target=".row'.$result15[$key15]['ID'].'">
                              <td>'.$result15[$key15]['NOME'].'</td>
                              <td class="center">'.$result15[$key15]['RAMAL'].'</td>
                            </tr>
                            <tr class="collapse row'.$result15[$key15]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result15[$key15]['EMAIL'].'</td>                                
                            </tr>';
                          }                          
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 m-b-10">
            <div class="span12">
              <div class="grid simple ">
                <div class="grid-title">
                  <?php echo '<h4><span class="bold">Produ&ccedil;&atilde;o &nbsp;</span><span class="'.$result25[0]['LABEL'].'">'.$result25[0]['SETOR']; ?> </span></h4>                                                                                                                                   
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>                     
                    <a href="javascript:;" class="reload"></a>
                  </div>
                </div>
                <div class="grid-body ">
                  <table class="table table-hover table-bordered" id="PROD">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Ramal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($result25 as $key25 => $value) {
                          if ($result25[$key25]['GESTOR'] == 'S') {
                            echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result25[$key25]['ID'].'" data-target=".row'.$result25[$key25]['ID'].'">
                              <td>'.$result25[$key25]['NOME'].'<i class="material-icons pull-right" style="font-size: 18px;">stars</i></td>
                              <td class="center">'.$result25[$key25]['RAMAL'].'</td>
                            </tr>
                            <tr class="collapse row'.$result25[$key25]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result25[$key25]['EMAIL'].'</td>                                
                            </tr>';
                          } else {
                            echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result25[$key25]['ID'].'" data-target=".row'.$result25[$key25]['ID'].'">
                              <td>'.$result25[$key25]['NOME'].'</td>
                              <td class="center">'.$result25[$key25]['RAMAL'].'</td>
                            </tr>
                            <tr class="collapse row'.$result25[$key25]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result25[$key25]['EMAIL'].'</td>                                
                            </tr>';
                          }                          
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 m-b-10">
            <div class="span12">
              <div class="grid simple ">
                <div class="grid-title">
                  <?php echo '<h4><span class="bold">Rec. Humanos &nbsp;</span><span class="'.$result3[0]['LABEL'].'">'.$result3[0]['SETOR']; ?> </span></h4>                  
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>                     
                    <a href="javascript:;" class="reload"></a>
                  </div>
                </div>
                <div class="grid-body ">
                  <table class="table table-hover table-bordered" id="RH">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Ramal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($result3 as $key3 => $value) {
                          if ($result3[$key3]['GESTOR'] == 'S') {
                            echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result3[$key3]['ID'].'" data-target=".row'.$result3[$key3]['ID'].'">
                              <td>'.$result3[$key3]['NOME'].'<i class="material-icons pull-right" style="font-size: 18px;">stars</i></td>
                              <td class="center">'.$result3[$key3]['RAMAL'].'</td>
                            </tr>
                            <tr class="collapse row'.$result3[$key3]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result3[$key3]['EMAIL'].'</td>                                
                            </tr>';
                          } else {
                            echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result3[$key3]['ID'].'" data-target=".row'.$result3[$key3]['ID'].'">
                              <td>'.$result3[$key3]['NOME'].'</td>
                              <td class="center">'.$result3[$key3]['RAMAL'].'</td>
                            </tr>
                            <tr class="collapse row'.$result3[$key3]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result3[$key3]['EMAIL'].'</td>                                
                            </tr>';
                          }                          
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 m-b-10">
            <div class="span12">
              <div class="grid simple ">
                <div class="grid-title">
                  <?php echo '<h4><span class="bold">Cria&ccedil;&atilde;o &nbsp;</span><span class="'.$result19[0]['LABEL'].'">'.$result19[0]['SETOR']; ?> </span></h4>                                                                                                                                   
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                     
                    <a href="javascript:;" class="reload"></a>
                  </div>
                </div>
                <div class="grid-body ">
                  <table class="table table-hover table-bordered" id="CRI">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Ramal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($result19 as $key19 => $value) {
                          if ($result19[$key19]['GESTOR'] == 'S') {
                            echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result19[$key19]['ID'].'" data-target=".row'.$result19[$key19]['ID'].'">
                              <td>'.$result19[$key19]['NOME'].'<i class="material-icons pull-right" style="font-size: 18px;">stars</i></td>
                              <td class="center">'.$result19[$key19]['RAMAL'].'</td>
                            </tr>
                            <tr class="collapse row'.$result19[$key19]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result19[$key19]['EMAIL'].'</td>                                
                            </tr>';
                          } else {
                            echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result19[$key19]['ID'].'" data-target=".row'.$result19[$key19]['ID'].'">
                              <td>'.$result19[$key19]['NOME'].'</td>
                              <td class="center">'.$result19[$key19]['RAMAL'].'</td>
                            </tr>
                            <tr class="collapse row'.$result19[$key19]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result19[$key19]['EMAIL'].'</td>                                
                            </tr>';
                          }                          
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>                              

          <div class="col-md-4 col-sm-6 m-b-10">
            <div class="span12">
              <div class="grid simple ">
                <div class="grid-title">
                  <?php echo '<h4><span class="bold">Almoxarifado &nbsp;</span><span class="'.$result22[0]['LABEL'].'">'.$result22[0]['SETOR']; ?> </span></h4>                                                                                                                                   
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>                     
                    <a href="javascript:;" class="reload"></a>
                  </div>
                </div>
                <div class="grid-body ">
                  <table class="table table-hover table-bordered" id="EST">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Ramal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($result22 as $key22 => $value) {
                          if ($result22[$key22]['GESTOR'] == 'S') {
                            echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result22[$key22]['ID'].'" data-target=".row'.$result22[$key22]['ID'].'">
                              <td>'.$result22[$key22]['NOME'].'<i class="material-icons pull-right" style="font-size: 18px;">stars</i></td>
                              <td class="center">'.$result22[$key22]['RAMAL'].'</td>
                            </tr>
                            <tr class="collapse row'.$result22[$key22]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result22[$key22]['EMAIL'].'</td>                                
                            </tr>';
                          } else {
                            echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result22[$key22]['ID'].'" data-target=".row'.$result22[$key22]['ID'].'">
                              <td>'.$result22[$key22]['NOME'].'</td>
                              <td class="center">'.$result22[$key22]['RAMAL'].'</td>
                            </tr>
                            <tr class="collapse row'.$result22[$key22]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result22[$key22]['EMAIL'].'</td>                                
                            </tr>';
                          }                          
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 m-b-10">
            <div class="span12">
              <div class="grid simple ">
                <div class="grid-title">
                  <?php echo '<h4><span class="bold">Laborat&oacute;rio &nbsp;</span><span class="'.$result23[0]['LABEL'].'">'.$result23[0]['SETOR']; ?> </span></h4>                                                                                                                                   
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>                     
                    <a href="javascript:;" class="reload"></a>
                  </div>
                </div>
                <div class="grid-body ">
                  <table class="table table-hover table-bordered" id="LAB">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Ramal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($result23 as $key23 => $value) {
                          if ($result23[$key23]['GESTOR'] == 'S') {
                            echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result23[$key23]['ID'].'" data-target=".row'.$result23[$key23]['ID'].'">
                              <td>'.$result23[$key23]['NOME'].'<i class="material-icons pull-right" style="font-size: 18px;">stars</i></td>
                              <td class="center">'.$result23[$key23]['RAMAL'].'</td>
                            </tr>
                            <tr class="collapse row'.$result23[$key23]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result23[$key23]['EMAIL'].'</td>                                
                            </tr>';
                          } else {
                            echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result23[$key23]['ID'].'" data-target=".row'.$result23[$key23]['ID'].'">
                              <td>'.$result23[$key23]['NOME'].'</td>
                              <td class="center">'.$result23[$key23]['RAMAL'].'</td>
                            </tr>
                            <tr class="collapse row'.$result23[$key23]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result23[$key23]['EMAIL'].'</td>                                
                            </tr>';
                          }                          
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 m-b-10">
            <div class="span12">
              <div class="grid simple ">
                <div class="grid-title">
                  <?php echo '<h4><span class="bold">Matrizaria &nbsp;</span><span class="'.$result20[0]['LABEL'].'">'.$result20[0]['SETOR']; ?> </span></h4>                                                                                                                                   
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>                     
                    <a href="javascript:;" class="reload"></a>
                  </div>
                </div>
                <div class="grid-body ">
                  <table class="table table-hover table-bordered" id="MTZ">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Ramal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($result20 as $key20 => $value) {
                          if ($result20[$key20]['GESTOR'] == 'S') {
                            echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result20[$key20]['ID'].'" data-target=".row'.$result20[$key20]['ID'].'">
                              <td>'.$result20[$key20]['NOME'].'<i class="material-icons pull-right" style="font-size: 18px;">stars</i></td>
                              <td class="center">'.$result20[$key20]['RAMAL'].'</td>
                            </tr>
                            <tr class="collapse row'.$result20[$key20]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result20[$key20]['EMAIL'].'</td>                                
                            </tr>';
                          } else {
                            echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result20[$key20]['ID'].'" data-target=".row'.$result20[$key20]['ID'].'">
                              <td>'.$result20[$key20]['NOME'].'</td>
                              <td class="center">'.$result20[$key20]['RAMAL'].'</td>
                            </tr>
                            <tr class="collapse row'.$result20[$key20]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result20[$key20]['EMAIL'].'</td>                                
                            </tr>';
                          }                          
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 m-b-10">
            <div class="span12">
              <div class="grid simple ">
                <div class="grid-title">
                  <?php echo '<h4><span class="bold">Custos &nbsp;</span><span class="'.$result21[0]['LABEL'].'">'.$result21[0]['SETOR']; ?> </span></h4>                                                                                                                                   
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>                     
                    <a href="javascript:;" class="reload"></a>
                  </div>
                </div>
                <div class="grid-body ">
                  <table class="table table-hover table-bordered" id="CTO">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Ramal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($result21 as $key21 => $value) {
                          if ($result21[$key21]['GESTOR'] == 'S') {
                            echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result21[$key21]['ID'].'" data-target=".row'.$result21[$key21]['ID'].'">
                              <td>'.$result21[$key21]['NOME'].'<i class="material-icons pull-right" style="font-size: 18px;">stars</i></td>
                              <td class="center">'.$result21[$key21]['RAMAL'].'</td>
                            </tr>
                            <tr class="collapse row'.$result21[$key21]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result21[$key21]['EMAIL'].'</td>                                
                            </tr>';
                          } else {
                            echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result21[$key21]['ID'].'" data-target=".row'.$result21[$key21]['ID'].'">
                              <td>'.$result21[$key21]['NOME'].'</td>
                              <td class="center">'.$result21[$key21]['RAMAL'].'</td>
                            </tr>
                            <tr class="collapse row'.$result21[$key21]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result21[$key21]['EMAIL'].'</td>                                
                            </tr>';
                          }                          
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 m-b-10">
            <div class="span12">
              <div class="grid simple ">
                <div class="grid-title">
                  <?php echo '<h4><span class="bold">Outros &nbsp;</span><span class="'.$result28[0]['LABEL'].'">'.$result28[0]['SETOR']; ?> </span></h4>                                                                                                         
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>                     
                    <a href="javascript:;" class="reload"></a>
                  </div>
                </div>
                <div class="grid-body ">
                  <table class="table table-hover table-bordered" id="OUT">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Ramal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($result28 as $key28 => $value) {
                          if ($result28[$key28]['GESTOR'] == 'S') {
                            echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result28[$key28]['ID'].'" data-target=".row'.$result28[$key28]['ID'].'">
                              <td>'.$result28[$key28]['NOME'].'<i class="material-icons pull-right" style="font-size: 18px;">stars</i></td>
                              <td class="center">'.$result28[$key28]['RAMAL'].'</td>
                            </tr>
                            <tr class="collapse row'.$result28[$key28]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result28[$key28]['EMAIL'].'</td>                                
                            </tr>';
                          } else {
                            echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result28[$key28]['ID'].'" data-target=".row'.$result28[$key28]['ID'].'">
                              <td>'.$result28[$key28]['NOME'].'</td>
                              <td class="center">'.$result28[$key28]['RAMAL'].'</td>
                            </tr>
                            <tr class="collapse row'.$result28[$key28]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result28[$key28]['EMAIL'].'</td>                                
                            </tr>';
                          }                          
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>                    

          <div class="col-md-4 col-sm-6 m-b-10">
            <div class="span12">
              <div class="grid simple ">
                <div class="grid-title">
                  <?php echo '<h4><span class="bold">Serigrafia &nbsp;</span><span class="'.$result26[0]['LABEL'].'">'.$result26[0]['SETOR']; ?> </span></h4>                                                                                                                                   
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>                     
                    <a href="javascript:;" class="reload"></a>
                  </div>
                </div>
                <div class="grid-body ">
                  <table class="table table-hover table-bordered" id="EST">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Ramal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($result26 as $key26 => $value) {
                          if ($result26[$key26]['GESTOR'] == 'S') {
                            echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result26[$key26]['ID'].'" data-target=".row'.$result26[$key26]['ID'].'">
                              <td>'.$result26[$key26]['NOME'].'<i class="material-icons pull-right" style="font-size: 18px;">stars</i></td>
                              <td class="center">'.$result26[$key26]['RAMAL'].'</td>
                            </tr>
                            <tr class="collapse row'.$result26[$key26]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result26[$key26]['EMAIL'].'</td>                                
                            </tr>';
                          } else {
                            echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result26[$key26]['ID'].'" data-target=".row'.$result26[$key26]['ID'].'">
                              <td>'.$result26[$key26]['NOME'].'</td>
                              <td class="center">'.$result26[$key26]['RAMAL'].'</td>
                            </tr>
                            <tr class="collapse row'.$result26[$key26]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result26[$key26]['EMAIL'].'</td>                                
                            </tr>';
                          }                          
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 m-b-10">
            <div class="span12">
              <div class="grid simple ">
                <div class="grid-title">
                  <?php echo '<h4><span class="bold">Transportes &nbsp;</span><span class="'.$result29[0]['LABEL'].'">'.$result29[0]['SETOR']; ?> </span></h4>                                                                                                                                   
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>                     
                    <a href="javascript:;" class="reload"></a>
                  </div>
                </div>
                <div class="grid-body ">
                  <table class="table table-hover table-bordered" id="EST">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Ramal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($result29 as $key29 => $value) {
                          if ($result29[$key29]['GESTOR'] == 'S') {
                            echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result29[$key29]['ID'].'" data-target=".row'.$result29[$key29]['ID'].'">
                              <td>'.$result29[$key29]['NOME'].'<i class="material-icons pull-right" style="font-size: 18px;">stars</i></td>
                              <td class="center">'.$result29[$key29]['RAMAL'].'</td>
                            </tr>
                            <tr class="collapse row'.$result29[$key29]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result29[$key29]['EMAIL'].'</td>                                
                            </tr>';
                          } else {
                            echo
                            '<tr class="clickable" data-toggle="collapse" id="row'.$result29[$key29]['ID'].'" data-target=".row'.$result29[$key29]['ID'].'">
                              <td>'.$result29[$key29]['NOME'].'</td>
                              <td class="center">'.$result29[$key29]['RAMAL'].'</td>
                            </tr>
                            <tr class="collapse row'.$result29[$key29]['ID'].'">                              
                              <td colspan="2"><i class="fa fa-envelope"></i> &nbsp;'.$result29[$key29]['EMAIL'].'</td>                                
                            </tr>';
                          }                          
                        }
                      ?>
                    </tbody>
                  </table>
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