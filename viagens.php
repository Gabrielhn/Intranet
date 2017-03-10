<?php
require_once("assets/php/class/class.seg.php");
session_start();
proteger();

$host="10.0.0.2";
$service="//10.0.0.2:1521/orcl";
$id=$_SESSION['usuarioId'];
$conn= new \PDO("oci:host=$host;dbname=$service","INTRANET","ifnefy6b9");

$query1 = "SELECT USR.EMAIL, USR.TIPO_USUARIO, USR.SETOR, SETO.NOME AS NOME_SETOR, USR.IMG_PERFIL, IMG.IMAGEM,
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
    IN_IMAGENS IMG,
    IN_SETORES SETO 
WHERE 
    USR.IMG_PERFIL = IMG.ID
    AND USR.SETOR = SETO.SIGLA 
    AND USR.ID =:id";

$query2 = "SELECT * FROM IN_SETORES ORDER BY 1";

//#1
$stmt1 = $conn->prepare($query1);
$stmt1->bindValue(':id',$id);
$stmt1->execute();
$result1=$stmt1->fetch(PDO::FETCH_ASSOC);

//#2
$stmt2 = $conn->prepare($query2);
$stmt2->execute();
$result2=$stmt2->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Aniger - Viagens</title>
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
    <link href="assets/plugins/jquery-datatable/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen" />
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
                    <a href="perfil.php" title="Acesse seu perfil"><i class="fa fa-male fa-fw"></i>&nbsp;&nbsp;Meu perfil</a>
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
            <li class=""> 
              <a href="cadastros.php"><i class="material-icons" title="Cadastros">library_add</i> <span class="title">Cadastros</span></a>
            </li>
            <li class="start active"> 
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
        <div class="content">
        <ul class="breadcrumb">
            <li>
              <p>VOC&Ecirc; EST&Aacute; EM </p>
            </li>
            <li><a href="index.php">Home</a></li>
            <li><a href="solicitacoes.php">Solicita&ccedil;&otilde;es</a></li>
            <li><a href="#.php" class="active">Viagens</a></li>
          </ul>
          <!-- BEGIN PAGE TITLE -->
          <div class="page-title"> <i class="fa fa-plane fa-lg fa-fw" aria-hidden="true"></i>
            <h3>Solicitar Viagem </h3>
          </div>
          <!-- END PAGE TITLE -->
          <!-- CONTEÚDO -->
          
          <div class="row">
            <div class="col-md-10">
              <div class="grid simple">
                <div class="grid-title no-border">
                  <img src="assets\img\logo3.png">
                  <p></p>
                  <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <span class="help">Preencha abaixo as informa&ccedil;&otilde;es para solicitar uma viagem.
                    <p>Ap&oacute;s enviar os dados, solicite autoriza&ccedil;&atilde;o de seu gestor e aguarde retorno por e-mail com a cota&ccedil;&atilde;o.</p>
                    </span>
                  </div>
                  <div class="tools">
                    <!-- Controles -->
                  </div>
                </div>
                <div class="grid-body no-border">
                  <br>

                  <div class="row">
                    <form method="POST" name="clientes" action="data\viagens.S.php" target="place">

                      <!-- PMODAL -->
                        <div class="modal fade" id="pModal" tabindex="-1" role="dialog" aria-labelledby="pModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                <br>
                                <i class="fa fa-pencil-square-o fa-6x"></i>
                                <h4 id="pModalLabel" class="semi-bold">Termos e condi&ccedil;&otilde;es.</h4>
                              </div>
                              <div class="modal-body">
                                <div class="alert alert-info">
                                  <i class="pull-left material-icons">feedback</i>
                                  <h6 style="padding-left: 30px;">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro enim laudantium explicabo nobis ad possimus commodi reprehenderit. Odio provident accusamus, ipsam, totam magnam nobis sunt voluptatem, facere maxime sequi quia.
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non, ipsa. Hic omnis, sapiente at non, veritatis iusto facere consectetur excepturi esse voluptas ducimus possimus explicabo illo distinctio quae ab? Expedita.</p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam qui quisquam vitae beatae sequi aspernatur totam ab, assumenda, quasi ipsa ducimus nulla tempore eveniet minus cumque! Quos necessitatibus sunt, laudantium.
                                  <br>&nbsp;
                                  </h6>  
                                </div>
                                <div align="left">                               
                                  <input type="checkbox" id="term" onchange="isChecked(this, 'btenv')"align="left"/>
                                  Eu li, aceito os termos descritos acima e concordo com as<span class="bold"> <a href="./assets/docs/normas_viagem.pdf" target="blank" >normas de reembolso </a></span>em viagens.
                                </div>
                                <div align="right" style="padding-top: 20px;">
                                  <button type="submit" id="btenv" class="btn btn-info btn-cons-md" value="submit" disabled="disabled" >Enviar</button>
                                </div>             
                              </div>
                            </div>
                          </div>
                        </div>

                      <div class="col-md-12 col-sm-12 col-xs-12">

                        <div class="form-group col-md-12 col-sm-12 col-xs-12"></div>

                        <div class="form-group col-md-12 col-sm-12 col-xs-12"></div>

                        <div class="form-group col-md-8 col-sm-8 col-xs-8">
                          <div class="controls">
                            <input type="text" placeholder="Nome Completo" value="<?php echo $_SESSION['usuarioNome'] . " " . $_SESSION['usuarioSobreNome'] ;?>" class="form-control input" name="nome" required>
                          </div>
                        </div>

                        <div class="form-group col-md-4 col-sm-4 col-xs-4">
                          <div class="controls">
                            <select id="source"  class="form-control input" name="setor" required>
                              <?php
                                foreach ($result2 as $key2 => $value) {
                                  echo 
                                  '<option value="'.$result2[$key2]['SIGLA'].'">'.$result2[$key2]['SIGLA'].' - '.$result2[$key2]['NOME'].'</option>';
                                }                                                                  
                              ?>
                            </select>
                          </div>
                        </div>

                        <div class="form-group col-md-9 col-sm-9 col-xs-9">
                          <div class="controls">
                            <input type="text" placeholder="Endere&ccedil;o" class="form-control input" name="endereco" required>
                          </div>
                        </div>

                        <div class="form-group col-md-3 col-sm-3 col-xs-3" >
                          <div class="controls">
                            <input type="text" placeholder="N&ordm;/Comp." class="form-control input" maxlength="16" name="nro" required>
                          </div>
                        </div>
                        
                        <div class="form-group col-md-8 col-sm-8 col-xs-8">
                          <div class="controls">
                            <input type="text" placeholder="Bairro" class="form-control input" name="bairro" required>
                          </div>
                        </div>

                        <!-- MASCARA -->

                        <div class="form-group col-md-4 col-sm-4 col-xs-4">
                          <div class="controls">
                            <input type="text" placeholder="CEP" class="form-control input" maxlength="11" name="cep" required>
                          </div>
                        </div>

                        <div class="form-group col-md-8 col-sm-8 col-xs-8">
                          <div class="controls">
                            <input type="text" placeholder="Cidade" class="form-control input" name="cidade" required>
                          </div>
                        </div>

                        <div class="form-group col-md-4 col-sm-4 col-xs-4">
                          <div class="controls">
                            <select id="source"  class="form-control input" name="estado" required>                             
                                <option value="RS">RS - Rio Grande do Sul</option>
                                <option value="CE">CE - Cear&aacute;</option>
                            </select>
                          </div>
                        </div>

                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                          <div class="controls">
                            <input type="email" value="<?php echo $_SESSION['usuarioEmail'] ;?>" class="form-control input" name="email" required>
                          </div>
                        </div>

                         <div class="form-group col-md-4 col-sm-4 col-xs-4">
                          <div class="controls">
                            <input type="text" placeholder="Fone" class="form-control input" name="fone" maxlenght="21" required>
                          </div>
                        </div>                  

                        <div class="form-group col-md-4 col-sm-4 col-xs-4">
                          <div class="controls">
                            <input type="text" placeholder="RG" class="form-control input" name="rg" maxlenght="10" required>
                          </div>
                        </div>

                        <div class="form-group col-md-4 col-sm-4 col-xs-4">
                          <div class="controls">
                            <input type="text" placeholder="CPF" class="form-control input" maxlength="15" name="cpf" required>
                          </div>
                        </div>

                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                          <div class="controls">
                            <input type="text" placeholder="Destino" class="form-control input" name="destino" required>
                          </div>
                        </div>

                        <div class="form-group col-md-4 col-sm-4 col-xs-4">
                          <div class="controls">
                            <div class="input-append" data-date-format="dd-mm-yyyy">
                             <input type="date" class="form-control input" maxlength="10" name="ida" required>
                              <span class="add-on"><span class="arrow"></span><i class="fa fa-calendar"></i></span>
                            </div>
                          </div>
                        </div>                     

                        <div class="form-group col-md-4 col-sm-4 col-xs-4">
                          <div class="controls">
                            <input style="text-align: center ;" type="text" placeholder="" class="form-control input" readonly>
                          </div>
                        </div>

                        <div class="form-group col-md-4 col-sm-4 col-xs-4">
                          <div class="controls">
                            <div class="input-append" data-date-format="dd-mm-yyyy">
                             <input type="date" class="form-control input" maxlength="10" name="volta" required>
                              <span class="add-on"><span class="arrow"></span><i class="fa fa-calendar"></i></span>
                            </div>
                          </div>
                        </div>
                      

                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                          <div class="controls">
                            <textarea id="Obs" placeholder="Observa&ccedil;&otilde;es" class="form-control input" rows="5" name="obs"></textarea>
                          </div>
                        </div>

                        <div class="form-group col-md-12 col-sm-12 col-xs-12"></div>

                        <div class="form-group col-md-12 col-sm-12 col-xs-12"></div>

                        <div class="form-group col-md-8 col-sm-8 col-xs-8">
                          <div class="controls">
                            <input type="text" placeholder="Autorizado por" class="form-control input" name="autorizado" required>
                          </div>
                        </div>

                        <div class="form-group col-md-3 col-sm-3 col-xs-3">
                          <div class="controls">
                            <div class="input-append" data-date-format="dd-mm-yyyy">
                             <input type="date" class="form-control input" maxlength="10" name="dtAutorizado" required>
                              <span class="add-on"><span class="arrow"></span><i class="fa fa-calendar"></i></span>
                            </div>
                          </div>
                        </div>

                        <div class="form-group col-md-12 col-sm-12 col-xs-12"></div>

                        <iframe name="place" style="display:none;"></iframe>
 
                        <div class="form-actions">
                          <div class="pull-right">

                            <!---->
                            <button type="button" class="btn btn-info btn-cons-md" data-toggle="modal" data-target="#pModal" value="submit">Solicitar</button>
                            <button type="reset" class="btn btn-white btn-cons-md" value="reset">Limpar</button>
                          </div>
                          <div class="form-group col-md-12 col-sm-12 col-xs-12"></div>
                        </div>

                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <hr>

          <div class="page-title"> <i class="fa fa-money fa-lg fa-fw" aria-hidden="true"></i>
            <h3>Registro de despesas </h3>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="grid simple">
                <div class="grid-title no-border">
                  <img src="assets\img\logo3.png">
                  <p></p>
                  <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <span class="help">Preencha abaixo as informa&ccedil;&otilde;es a respeito das despesas de sua viagem.
                    <p>Antes de registrar suas despesas, leia as <span class="bold"> <a href="./assets/docs/normas_viagem.pdf" target="blank" >normas de reembolso </a></span>.</p>                  
                    </span>
                  </div>
                  <div class="tools">
                    <!-- Controles -->
                  </div>
                </div>
                <div class="grid-body no-border">
                  <br>

                  <div class="row">
                    <form method="POST" name="clientes" action="assets\php\viagem_mail.php" target="place">

                      <!-- PMODAL -->
                        <div class="modal fade" id="pModal" tabindex="-1" role="dialog" aria-labelledby="pModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <br>
                                <i class="fa fa-pencil-square-o fa-6x"></i>
                                <h4 id="pModalLabel" class="semi-bold">Termos e condi&ccedil;&otilde;es.</h4>
                              </div>
                              <div class="modal-body">
                                <div class="alert alert-info">
                                  <i class="pull-left material-icons">feedback</i>
                                  <h6 style="padding-left: 30px;">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro enim laudantium explicabo nobis ad possimus commodi reprehenderit. Odio provident accusamus, ipsam, totam magnam nobis sunt voluptatem, facere maxime sequi quia.
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non, ipsa. Hic omnis, sapiente at non, veritatis iusto facere consectetur excepturi esse voluptas ducimus possimus explicabo illo distinctio quae ab? Expedita.</p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam qui quisquam vitae beatae sequi aspernatur totam ab, assumenda, quasi ipsa ducimus nulla tempore eveniet minus cumque! Quos necessitatibus sunt, laudantium.
                                  <br>&nbsp;
                                  </h6>  
                                </div>
                                <div align="left">                               
                                  <input type="checkbox" id="term" onchange="isChecked(this, 'btenv')"align="left"/>
                                  Eu li, aceito os termos descritos acima e concordo com as<span class="bold"> <a href="./assets/docs/normas_viagem.pdf" target="blank" >normas de reembolso </a></span>em viagens.
                                </div>
                                <div align="right" style="padding-top: 20px;">
                                  <button type="submit" id="btenv" class="btn btn-info btn-cons-md" value="submit" disabled="disabled" >Enviar</button>
                                </div>             
                              </div>
                            </div>
                          </div>
                        </div>

                      <div class="col-md-12 col-sm-12 col-xs-12">

                        <div class="form-group col-md-12 col-sm-12 col-xs-12"></div>

                        <div class="form-group col-md-12 col-sm-12 col-xs-12"></div>

                        <div class="form-group col-md-8 col-sm-8 col-xs-8">
                          <div class="controls">
                            <input type="text" placeholder="Nome Completo" value="<?php echo $_SESSION['usuarioNome'] . " " . $_SESSION['usuarioSobreNome'] ;?>" class="form-control input" name="nome" required>
                          </div>
                        </div>

                        <div class="form-group col-md-4 col-sm-4 col-xs-4">
                          <div class="controls">
                            <select id="source"  class="form-control input" name="setor" readonly required>
                              <?php                                
                                  echo 
                                  '<option value="'.$result1['SETOR'].'">'.$result1['SETOR'].' - '.$result1['NOME_SETOR'].'</option>';                                                                                                  
                              ?>
                            </select>
                          </div>
                        </div>

                       <div class="form-group col-md-5 col-sm-4 col-xs-4">
                          <div class="controls">
                            <div class="input-append" data-date-format="dd-mm-yyyy">
                             <input type="date" class="form-control input" maxlength="10" name="ida" required>
                              <span class="add-on"><span class="arrow"></span><i class="fa fa-calendar"></i></span>
                            </div>
                          </div>
                        </div>                     

                        <div class="form-group col-md-3 col-sm-4 col-xs-4">
                          <div class="controls">
                            <input style="text-align: center ;" type="text" placeholder="" class="form-control input" readonly>
                          </div>
                        </div>                        

                        <div class="form-group col-md-4 col-sm-4 col-xs-4">
                          <div class="controls">
                            <div class="input-append" data-date-format="dd-mm-yyyy">
                             <input type="date" class="form-control input" maxlength="10" name="volta" required>
                              <span class="add-on"><span class="arrow"></span><i class="fa fa-calendar"></i></span>
                            </div>
                          </div>
                        </div>                        

                        <div class="form-group col-md-12 col-sm-12 col-xs-12"><hr></div>

                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <table class="table table-hover" id="tDespesa">
                            <thead>
                              <tr>                        
                                <th style="width:10%">Data</th>
                                <th style="width:15%">Valor</th>
                                <th style="width:20%">Quem</th>
                                <th style="width:15%">O que</th>
                                <th style="width:20%">OBS</th>                                                    
                              </tr>
                            </thead>
                            <tbody>                      
                                  <tr>                            
                                    <td class="v-align-middle"><input type="date" class="form-control input" maxlength="10" name="data" required></td>
                                    <td class="v-align-middle"><input type="text" class="form-control input" placeholder="" class="form-control input" name="valor" required></td>
                                    <td class="v-align-middle"><input type="text" class="form-control input" placeholder="" class="form-control input" name="quem" required></td>
                                    <td class="v-align-middle">
                                      <select  class="form-control input input-sm" name="oque" required>
                                        <option value="Alimenta&ccedil;&atilde;o">Alimenta&ccedil;&atilde;o</option>
                                        <option value="Transporte">Transporte</option>
                                        <option value="Aluguel de ve&iacute;culo">Aluguel de ve&iacute;culo</option>
                                        <option value="Hospedagem">Hospedagem</option>
                                        <option value="Outros">Outros</option>                                        
                                      </select>
                                    </td>
                                    <td class="v-align-middle"><input type="text" class="form-control input" placeholder="" class="form-control input" name="obs" required></td>                            
                                  </tr>                                            
                            </tbody>
                          </table>
                        </div>

                        <div class="form-group col-md-12 col-sm-12 col-xs-12"></div>

                        <iframe name="place" style="display:none;"></iframe>
 
                        <div class="form-actions">
                          <div class="pull-right">

                            <!---->
                            <button type="button" class="btn btn-default " onclick="addLinha()">+</button>
                            <button type="button" class="btn btn-default " onclick="delLinha()">-</button>
                            <button type="button" class="btn btn-info btn-cons-md" data-toggle="modal" data-target="#pModal" value="submit">Registrar</button>
                            <button type="reset" class="btn btn-white btn-cons-md" value="reset">Limpar</button>                            
                          </div>
                          <div class="form-group col-md-12 col-sm-12 col-xs-12"></div>
                        </div>

                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <!-- FIM CONTEÚDO -->
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
    <script src="assets/plugins/datatables-responsive/js/datatables.responsive.js" type="text/javascript"></script>
    <script src="assets/plugins/datatables-responsive/js/lodash.min.js" type="text/javascript"></script>
    <script>
      function isChecked(checkbox, btenv) 
        {
          document.getElementById(btenv).disabled = !checkbox.checked;
        }
    </script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('#tDespesa').DataTable()
} );
    </script>
    <script>
      function addLinha() {
          var table = document.getElementById("tDespesa");
          var row = table.insertRow(1);
          var cell1 = row.insertCell(0);
          var cell2 = row.insertCell(1);
          var cell3 = row.insertCell(2);
          var cell4 = row.insertCell(3);
          var cell5 = row.insertCell(4);
          cell1.innerHTML = '<input type="date" class="form-control input" maxlength="10" name="data" required>';
          cell2.innerHTML = '<input type="text" class="form-control input" placeholder="" class="form-control input" name="valor" required>';
          cell3.innerHTML = '<td class="v-align-middle"><input type="text" class="form-control input" placeholder="" class="form-control input" name="quem" required>';
          cell4.innerHTML = '<select  class="form-control input input-sm" name="oque" required><option value="Alimenta&ccedil;&atilde;o">Alimenta&ccedil;&atilde;o</option><option value="Transporte">Transporte</option><option value="Aluguel de ve&iacute;culo">Aluguel de ve&iacute;culo</option><option value="Hospedagem">Hospedagem</option><option value="Outros">Outros</option></select>';
          cell5.innerHTML = '<input type="text" class="form-control input" placeholder="" class="form-control input" name="obs" required>';
      }
      function delLinha() {
          document.getElementById("tDespesa").deleteRow(1);
      }
    </script>
    <script>
      var data_diff = function(date1, date2) {

      dt1 = new Date(date1);
      dt2 = new Date(date2);

      return Math.floor((Date.UTC(dt2.getFullYear(), dt2.getMonth(), dt2.getDate()) - Date.UTC(dt1.getFullYear(), dt1.getMonth(), dt1.getDate()) ) /(1000 * 60 * 60 * 24));

      }
      console.log(data_diff('01/03/2014', '01/10/2014'));      
      var dias2 = data_diff('01/02/2014', '01/10/2014');
      console.log(dias2);      
    </script>    

    <!-- END CORE JS DEPENDECENCIES-->
    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="webarch/js/webarch.js" type="text/javascript"></script>
    <script src="assets/js/chat.js" type="text/javascript"></script>
    <script src="assets/js/datatables.js" type="text/javascript"></script>
    <!-- END CORE TEMPLATE JS -->
  </body>
</html>