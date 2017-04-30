<?php
require_once("assets/php/class/class.seg.php");
session_start();
proteger();

$host="10.0.0.2";
$service="//10.0.0.2:1521/orcl";
$id=$_GET['id'];
$idl=$_SESSION['usuarioId'];
$conn= new \PDO("oci:host=$host;dbname=$service","INTRANET","ifnefy6b9");

$query1 = "SELECT * FROM VW_PERFIL WHERE ID=:id";
$query2 = "SELECT COUNT(EMAIL) AS COLEGAS FROM IN_USUARIOS WHERE SETOR =:setor AND ID !=:id AND ID != '84'";
$query3 = "SELECT USR.ID, USR.NOME || ' ' || USR.SOBRENOME AS NOME_COMPLETO, USR.EMAIL, USR.IMG_PERFIL, IMG.IMAGEM FROM IN_USUARIOS USR, IN_IMAGENS IMG WHERE USR.IMG_PERFIL = IMG.ID AND USR.SETOR =:setor AND USR.ID != :id AND USR.ID != '84'";
$query4 = "SELECT USR.EMAIL, USR.TIPO_USUARIO, USR.SETOR, USR.IMG_PERFIL, IMG.IMAGEM,
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
$query5 = "SELECT * FROM VW_PERFIL WHERE ID=:id";

// #1 INFO PERFIL
$stmt1 = $conn->prepare($query1);
$stmt1->bindValue(':id',$id);
$stmt1->execute();
$result1=$stmt1->fetch(PDO::FETCH_ASSOC);

// #2 COUNT COLEGAS
$stmt2 = $conn->prepare($query2);
$stmt2->bindValue(':setor',$result1['SETOR']);
$stmt2->bindValue(':id',$result1['ID']);
$stmt2->execute();
$result2=$stmt2->fetch(PDO::FETCH_ASSOC);

// #3 COLEGAS
$stmt3 = $conn->prepare($query3);
$stmt3->bindValue(':setor',$result1['SETOR']);
$stmt3->bindValue(':id',$id);
$stmt3->execute();
$result3=$stmt3->fetchAll(PDO::FETCH_ASSOC);

// #4 FOTO SIDEBAR
$stmt4 = $conn->prepare($query4);
$stmt4->bindValue(':id',$idl);
$stmt4->execute();
$result4=$stmt4->fetch(PDO::FETCH_ASSOC);

// #5 EDITAR PERFIL
$stmt5 = $conn->prepare($query5);
$stmt5->bindValue(':id',$idl);
$stmt5->execute();
$result5=$stmt5->fetch(PDO::FETCH_ASSOC);

// TEMPO
$adm=$result1['ADMISSAO'];
$hj=date('d/m/y');

$data_inicial = $adm;
$data_final = $hj;                  
function geraTimestamp($data) {
$partes = explode('/', $data);
return mktime(0, 0, 0, $partes[1], $partes[0], $partes[2]);
}                  
$time_inicial = geraTimestamp($data_inicial);
$time_final = geraTimestamp($data_final);                  
$diferenca = $time_final - $time_inicial;
$anos = (int)floor( $diferenca / (60 * 60 * 24)/ 365);

// #5 TEMPO
// $adm=date('m/d/y',strtotime($result1['ADMISSAO']));
// $hj=date('d/m/y');
// $tempo=strtotime($hj)-strtotime($adm);
// $anos =floor(($tempo)/(60*60*24*365));


?>

<!DOCTYPE html>
<html>
  <head>
    <title>Aniger - Perfil</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
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
                if ($result4['TIPO_USUARIO'] == 'ADM') {
                  echo '
                  <li class="quicklinks">
                    <a href="dados.php">
                      <i class="material-icons">apps</i>
                    </a>
                  </li>';
                } elseif ($result4['MURAL'] == 'S') {
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
                    <?php echo '<a title="Editar seu perfil"><span style="cursor:pointer;" data-toggle="modal" data-target="#EDModal"><i class="fa fa-edit fa-fw"></i>&nbsp;&nbsp;Editar perfil</span></a>';?>
                  </li>
                  <li class="">
                    <?php echo '<a title="Alterar sua senha"><span style="cursor:pointer;" data-toggle="modal" data-target="#SEModal"><i class="fa fa-unlock-alt fa-fw"></i>&nbsp;&nbsp;Alterar senha</span></a>';?>
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
    <div class="page-container row-fluid">
      <!-- SIDEBAR -->
      <div class="page-sidebar " id="main-menu">
        <!-- MINI PERFIL -->
        <div class="page-sidebar-wrapper scrollbar-dynamic" id="main-menu-wrapper">
          <div class="user-info-wrapper sm">
            <div class="profile-wrapper sm">
              <?php
                echo '<img width="69" height="69" src="data:image/jpeg;base64,'.base64_encode(stream_get_contents($result4['IMAGEM'])).'">';
              ?>
              <div class="availability-bubble online"></div>
            </div>
            <div class="user-info sm">
              <div class="username"><span class="semi-bold"> <?php echo $_SESSION['usuarioNome']; ?> </span></div>
              <div class="status">Seja bem-vindo(a)</div>
            </div>
          </div>
          <!-- MINI PERFIL -->
          <!-- SIDEBAR MENU -->
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
          <!-- SIDEBAR MENU -->
        </div>
      </div>
      <a href="#" class="scrollup">Scroll</a>
      <div class="footer-widget">
        <div class="pull-left">
          <!--<a data-html="true" data-content="<b>popover</b> - title " id="popover" title="" data-toggle="popover">-->
            <i class="material-icons">alarm</i>
          <!--</a>-->
          <iframe src="http://free.timeanddate.com/clock/i5hp9yxv/n595/tlbr5/fn17/fc555/tc22262e/pa0/th1" frameborder="0" width="66" height="14"></iframe>
        </div>
        <div class="pull-right">
          <a href="bloquear.php"><i class="material-icons">lock_outline</i></a>
        </div>
      </div>
      <!-- SIDEBAR -->
      <!-- TITULO-->
      <div class="page-content">
        <div class="content">
        <ul class="breadcrumb">
          <li>
            <p>VOC&Ecirc; EST&Aacute; EM </p>
          </li>
          <li><a href="#" class="active">Perfil</a> </li>
        </ul>

        <!-- CONTEUDO -->

        <div class="content" style="padding-top:20px;">
          <div class="row">
            <div class="col-md-12">
              <div class=" tiles white no-padding">
                <div class="tiles white cover-pic-wrapper">
                  <div class="overlayer bottom-right">
                    <div class="overlayer-wrapper">
                      <div class="padding-10 hidden-xs">
                        <!--<button type="button" class="btn btn-info btn-small disabled"><i class="fa fa-check"></i>&nbsp;&nbsp;Adicionar</button>-->
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
                          echo '<img width="69" height="69" src="data:image/jpeg;base64,'.base64_encode(stream_get_contents($result1['IMAGEM'])).'">';
                        ?>
                      </div>
                      <div class="user-mini-description">
                        <h3 class="text-info semi-bold">
                          <?php                            
                            for ($i=0; $i < $anos; $i++) { 
                              echo "\n".'<i class="fa fa-star"></i>';
                            }
                            if ($anos == 0 || $anos >= 1) {
                               echo "\n".'<i class="fa fa-star-half-o"></i>';
                            }                            
                          ?>
                        </h3>
                        <h5>Tempo</h5>
                        <h3 class="text-info semi-bold" style="line-height:40px;">
                          <span class="<?php echo $result1['LABEL_SETOR']; ?>"> <?php echo $result1['SETOR']; ?></span>
                        </h3>
                        <h5>Setor</h5>
                      </div>
                    </div>
                    <div class="col-md-5 col-sm-5 user-description-box  col-sm-5">
                      <h4 class="semi-bold no-margin"><?php echo $result1['NOME'] . " " . $result1['SOBRENOME']; ?></h4>
                      <br>
                      <!--CARGO-->
                      <p><i class="fa fa-briefcase"></i><?php echo $result1['CARGO']; ?> </p>

                      <!--LOCAL-->
                      <p><i class="fa fa-globe"></i><?php echo $result1['NOME_LOCAL']; ?></p>

                      <!--EMAIL-->
                      <p><i class="fa fa-envelope"></i><?php echo $result1['EMAIL']; ?></p>

                      <!--IM RAMAL-->
                      <p><i class="fa fa-skype"></i><?php echo $result1['IM']; ?> 
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <i class="fa fa-phone"></i><?php echo $result1['RAMAL']; ?></p>                      
                    </div>
                    <div class="col-md-3 col-sm-3 m-t-10" style="padding:0px;">
                      <div class="dropdown">
                       <span style="font-family: 'Roboto'; font-weight: normal;color: #505458; font-size:15px;" class="dropdown-toggle" data-toggle="dropdown"> Colegas ( <span class="text-success"> <?php echo $result2['COLEGAS']; ?></span> )</span>                                            
                        <ul class="dropdown-menu">
                          <?php
                          foreach ($result3 as $key => $value) {
                           echo
                             '<li>
                                <a href="perfil.php?id='.$result3[$key]['ID'].'">
                                  '.$result3[$key]['NOME_COMPLETO'].'   
                                </a>
                             </li>';
                        }
                        ?>
                        </ul>
                      </div>
                      <!--<ul class="my-friends">
                        
                        // foreach ($result3 as $key => $value) {
                        //   echo
                        //     '<li>
                        //       <a href="perfil.php?id='.$result3[$key]['ID'].'">
                        //         <div class="profile-pic">
                        //           <img width="35" height="35" title="'. $result3[$key]['NOME_COMPLETO'] .'" src="data:image/jpeg;base64,'.base64_encode(stream_get_contents($result3[$key]['IMAGEM'])).'">
                        //         </div>
                        //       </a>
                        //     </li>';
                        }
                        
                      </ul>-->
                    </div>
                  </div>
                  <hr/>
                  &nbsp;&nbsp;<br/>                                    
                  &nbsp;&nbsp;<br/>

                  <?php echo ' 
                  <!-- MODAL EDITAR -->
                  <div class="modal fade" id="EDModal" tabindex="-1" role="dialog" aria-labelledby="EDModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">                                  
                          <div>
                            <div class="col-md-6 col-sm-6 col-xs-6" style="text-align:left;">#'.$result5['ID'].'</div>
                            <div class="col-md-6 col-sm-6 col-xs-6" style="text-align:right;"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button></div>
                          </div>
                          <br>
                          <i class="fa fa-pencil-square-o fa-6x"></i>
                          <h4 id="1ModalLabel" class="semi-bold">Usu&aacute;rio: '.$result5['NOME_COMPLETO'].'</h4>
                        </div>
                        <div class="modal-body">
                          <div class="">
                            <div class="row" style="line-height:2;">
                              <form method="post" name="usuario" action="data/usuarios.U.P.php">                                      

                                <div class="form-group col-md-4 col-sm-4 col-xs-4">
                                  <div class="controls">
                                    <input type="text" placeholder="Nome" value="'.$result5['NOME'].'" class="form-control input" name="nome" maxlength="50" required>
                                  </div>
                                </div>

                                <div class="form-group col-md-4 col-sm-4 col-xs-4">
                                  <div class="controls">
                                    <input type="text" placeholder="Sobrenome" value="'.$result5['SOBRENOME'].'" class="form-control input" name="sobrenome" maxlength="40" required>
                                  </div>
                                </div>

                                <div class="form-group col-md-4 col-sm-4 col-xs-4">
                                  <div class="controls">
                                    <input type="text" placeholder="Admiss&atilde;o" value="'.$result5['ADMISSAO'].'" class="form-control input" name="admissao" maxlength="8" required>
                                  </div>
                                </div>

                                <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                  <div class="controls">
                                    <input type="email" placeholder="E-mail" value="'.$result5['EMAIL'].'" class="form-control input" name="email" maxlength="40" readonly>
                                  </div>
                                </div>

                                <div class="form-group col-md-4 col-sm-4 col-xs-4">
                                  <div class="controls">
                                    <input type="password" placeholder="Senha" value="'.$result5['SENHA'].'" class="form-control input" name="senha" maxlength="20" required>
                                  </div>
                                </div>

                                <div class="form-group col-md-2 col-sm-2 col-xs-2">
                                  <div class="controls">
                                    <input type="text" placeholder="Ramal" value="'.$result5['RAMAL'].'" class="form-control input" name="ramal" maxlength="4" required>
                                  </div>
                                </div>

                                <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                  <div class="controls">
                                    <input type="text" placeholder="Setor" value="'.$result5['SETOR'].' - '.$result1['NOME_SETOR'].'" class="form-control input" name="setor" required readonly>                        
                                  </div>
                                </div>

                                <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                  <div class="controls">
                                    <input type="text" placeholder="Cargo" value="'.$result5['CARGO'].'" class="form-control input" name="cargo" maxlength="30" required>
                                  </div>
                                </div>

                                <div class="form-group col-md-4 col-sm-4 col-xs-4">
                                  <div class="controls">
                                    <input type="text" placeholder="IM/Skype" value="'.$result5['IM'].'" class="form-control input" name="im" maxlength="25">
                                  </div>
                                </div>

                                <div class="form-group col-md-2 col-sm-2 col-xs-2">
                                  <div class="controls">
                                    <input type="text" placeholder="Local" value="'.$result5['LOCAL'].'" class="form-control input" name="local" maxlength="3" readonly>
                                  </div>
                                </div>

                                <div class="form-group col-md-4 col-sm-4 col-xs-4">
                                  <div class="controls">
                                    <input type="text" placeholder="Cadastro" value="Cadastro: '.$result5['CADASTRO'].'" class="form-control input" name="cadastro" readonly required>
                                  </div>
                                </div>                                       

                                <div class="form-group col-md-2 col-sm-2 col-xs-2">
                                  <div class="controls">
                                    <input type="text" id="" value="'.$result5['ID'].'" class="form-control input" name="id" readonly required>
                                  </div>
                                </div>                                                
                                
                                <div class="form-group col-md-12 col-sm-12 col-xs-12 pull-right">
                                  <button type="submit" class="btn btn-info btn-block" value="submit"> Atualizar</button>                                        
                                </div>                                                                                                                                           
                              
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>';
                  ?>  

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


          <!-- FIM CONTEÚDO -->

        </div>
      </div>
      <!-- END CONTAINER -->
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