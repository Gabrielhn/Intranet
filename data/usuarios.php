<?php
require_once("../assets/php/class/class.seg.php");
session_start();
proteger();

// ini_set('default_charset','iso-8859-1');

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
$query2 = "SELECT * FROM VW_PERFIL ORDER BY 11 DESC, 16 ASC";
$query3 = "SELECT * FROM IN_SETORES ORDER BY 1";
$query4 = "SELECT * FROM IN_LOCAIS ORDER BY 2";

//#1
$stmt1 = $conn->prepare($query1);
$stmt1->bindValue(':id',$id);
$stmt1->execute();
$result1=$stmt1->fetch(PDO::FETCH_ASSOC);

//#2
$stmt2 = $conn->prepare($query2);
$stmt2->execute();
$result2=$stmt2->fetchAll(PDO::FETCH_ASSOC);

//#3
$stmt3 = $conn->prepare($query3);
$stmt3->execute();
$result3=$stmt3->fetchAll(PDO::FETCH_ASSOC);

//#4
$stmt4 = $conn->prepare($query4);
$stmt4->execute();
$result4=$stmt4->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Aniger - Dados - Usu&aacute;rios</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
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
    <!-- <link href="../assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" /> -->
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
          <a href="../index.php">
            <img src="../assets/img/logo.png" class="logo" alt="" width="106" height="21" />
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
                <img src="../assets/img/profiles/Aa.jpg" alt="" data-src="../assets/img/profiles/Aa.jpg" data-src-retina="../assets/img/profiles/Aa.jpg" width="35" height="35" />
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
    <!-- CONTENT -->
    <div class="page-container row-fluid">
      <!-- SIDEBAR -->
      <div class="page-sidebar" id="main-menu">
        <!-- MINI PERFIL -->
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
          <!-- /MINI PERFIL -->

          <!-- SIDEBAR MENU -->
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
              <a href="../cadastros.php"><i class="material-icons" title="Cadastros">library_add</i> <span class="title">Cadastros</span></a>
            </li>
            <li class=""> 
              <a href="../solicitacoes.php"><i class="material-icons" title="Solicita&ccedil;&otilde;es">assignment</i> <span class="title">Solicita&ccedil;&otilde;es</span></a>
            </li>
           </ul>            
          <div class="clearfix"></div>
          <!-- /SIDEBAR MENU -->
          
        </div>
      </div>
      <a href="#" class="scrollup">Scroll</a>
      <div class="footer-widget">
        <div class="pull-left">
          <i class="material-icons">alarm</i>
          <iframe src="http://free.timeanddate.com/clock/i5hp9yxv/n595/tlbr5/fn17/fc555/tc22262e/pa0/th1" frameborder="0" width="66" height="14"></iframe>
        </div>
        <div class="pull-right">
          <a href="../bloquear.php"><i class="material-icons">lock_outline</i></a>
        </div>
      </div>
      <!-- /SIDEBAR -->

      <!-- CONTAINER-->
      <div class="page-content">
        <div class="content">
        <ul class="breadcrumb">
          <li>
            <p>VOC&Ecirc; EST&Aacute; EM </p>
          </li>
          <li>
            <a href="../index.php">Home</a>
          </li>
          <li>
            <a href="../dados.php">Dados</a> 
          </li>
          <li>
            <a href="#" class="active">Usu&aacute;rios</a> 
          </li>
        </ul>

        <!-- TITULO -->
        <!--<div class="page-title"> <i class="fa fa-globe fa-5x"></i>
          <h3>Locais</h3>
        </div>-->
        <br>
        <br>
          <!-- /TITULO -->

          <!-- CONTEUDO -->
          
          <div class="row">
            <div class="col-md-12">
              <div class="grid simple ">
                <div class="grid-title no-border">
                  <div class="tools">
                    <span data-toggle="modal" data-target="#INModal"><a href="#" title="Adicionar"><i class="fa fa-plus fa-lg"></i></a></span>                   
                  </div>
                </div>
                <div class="grid-body no-border">
                  <h3><i class="fa fa-male fa-1x"></i><span class="semi-bold">&nbsp; Usu&aacute;rios</span></h3>
                  <table class="table table-hover">
                    <thead>
                      <tr>                                              
                        <th style="width:20%">Nome completo</th>
                        <th style="width:20%">E-mail</th>
                        <th style="width:6%">Setor</th>
                        <th style="width:20%">Cargo</th>
                        <th style="width:20%">Local</th>
                        <th style="width:8%">Ramal</th>
                        <th style="width:5%">Ativo</th>
                        <th style="width:5%">A&ccedil;&otilde;es</th>                     
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $rr=1;
                      foreach ($result2 as $key => $value) {
                        echo '
                          <tr>                                                        
                            <td class="v-align-middle"><span class="muted">'.$result2[$key]['NOME_COMPLETO'].'</span></td>
                            <td class="v-align-middle"><span class="muted">'.$result2[$key]['EMAIL'].'</span></td>
                            <td class="v-align-middle"><span class="muted">'.$result2[$key]['SETOR'].'</span></td>
                            <td class="v-align-middle"><span class="muted">'.$result2[$key]['CARGO'].'</span></td>
                            <td class="v-align-middle"><span class="muted">'.$result2[$key]['LOCAL'].'</span></td>
                            <td class="v-align-middle"><span class="muted">'.$result2[$key]['RAMAL'].'</span></td>
                            <td class="v-align-middle"><span class="muted">'.$result2[$key]['ATIVO'].'</span></td>
                            <td class="v-align-middle">
                              <span data-toggle="modal" data-target="#'.$result2[$key]['ID'].'UPModal"><a href="#" title="Editar"><i class="fa fa-pencil"></i></a></span>
                              <span data-toggle="modal" data-target="#'.$result2[$key]['ID'].'DLModal"><a href="#" title="Excluir"><i class="fa fa-trash"></i></a></span>
                              <span data-toggle="modal" data-target="#'.$result2[$key]['ID'].'VWModal"><a href="#" title="Detalhes"><i class="fa fa-search"></i></a></span>
                            </td>
                          </tr>

                          <!-- MODAL UPDATE -->
                          <div class="modal fade" id="'.$result2[$key]['ID'].'UPModal" tabindex="-1" role="dialog" aria-labelledby="'.$result2[$key]['ID'].'UPModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">                                  
                                  <div>
                                    <div class="col-md-6 col-sm-6 col-xs-6" style="text-align:left;">#'.$result2[$key]['ID'].'</div>
                                    <div class="col-md-6 col-sm-6 col-xs-6" style="text-align:right;"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button></div>
                                  </div>
                                  <br>
                                  <i class="fa fa-pencil-square-o fa-6x"></i>
                                  <h4 id="1ModalLabel" class="semi-bold">Usu&aacute;rio: '.$result2[$key]['NOME_COMPLETO'].'</h4>
                                </div>
                                <div class="modal-body">
                                  <div class="">
                                    <div class="row" style="line-height:2;">
                                      <form method="post" name="usuario" action="usuarios.U.php">                                      

                                        <div class="form-group col-md-4 col-sm-4 col-xs-4">
                                          <div class="controls">
                                            <input type="text" placeholder="Nome" value="'.$result2[$key]['NOME'].'" class="form-control input" name="nome" maxlength="50" required>
                                          </div>
                                        </div>

                                        <div class="form-group col-md-4 col-sm-4 col-xs-4">
                                          <div class="controls">
                                            <input type="text" placeholder="Sobrenome" value="'.$result2[$key]['SOBRENOME'].'" class="form-control input" name="sobrenome" maxlength="40" required>
                                          </div>
                                        </div>

                                        <div class="form-group col-md-4 col-sm-4 col-xs-4">
                                          <div class="controls">
                                            <input type="text" placeholder="Admiss&atilde;o" value="'.$result2[$key]['ADMISSAO'].'" class="form-control input" name="admissao" maxlength="8" required>
                                          </div>
                                        </div>

                                        <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                          <div class="controls">
                                            <input type="email" placeholder="E-mail" value="'.$result2[$key]['EMAIL'].'" class="form-control input" name="email" maxlength="40" required>
                                          </div>
                                        </div>

                                        <div class="form-group col-md-4 col-sm-4 col-xs-4">
                                          <div class="controls">
                                            <input type="password" placeholder="Senha" value="'.$result2[$key]['SENHA'].'" class="form-control input" name="senha" maxlength="20" required>
                                          </div>
                                        </div>

                                        <div class="form-group col-md-2 col-sm-2 col-xs-2">
                                          <div class="controls">
                                            <input type="text" placeholder="Ramal" value="'.$result2[$key]['RAMAL'].'" class="form-control input" name="ramal" maxlength="4" required>
                                          </div>
                                        </div>

                                        <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                          <div class="controls">
                                            <select id="source"  class="form-control input" name="setor" required>';                                              
                                              foreach ($result3 as $key3 => $value) {
                                                echo 
                                                  '<option value="'.$result3[$key3]['SIGLA'].'">'.$result3[$key3]['SIGLA'].' - '.$result3[$key3]['NOME'].'</option>';
                                              }
                                            echo '
                                            </select>                        
                                          </div>
                                        </div>

                                        <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                          <div class="controls">
                                            <input type="text" placeholder="Cargo" value="'.$result2[$key]['CARGO'].'" class="form-control input" name="cargo" maxlength="30" required>
                                          </div>
                                        </div>

                                        <div class="form-group col-md-4 col-sm-4 col-xs-4">
                                          <div class="controls">
                                            <input type="text" placeholder="IM/Skype" value="'.$result2[$key]['IM'].'" class="form-control input" name="im" maxlength="25" required>
                                          </div>
                                        </div>

                                        <div class="form-group col-md-2 col-sm-2 col-xs-2">
                                          <div class="controls">
                                            <input type="text" placeholder="Local" value="'.$result2[$key]['LOCAL'].'" class="form-control input" name="local" maxlength="3" required>
                                          </div>
                                        </div>

                                        <div class="form-group col-md-4 col-sm-4 col-xs-4">
                                          <div class="controls">
                                            <input type="text" placeholder="Cadastro" value="Cadastro: '.$result2[$key]['CADASTRO'].'" class="form-control input" name="cadastro" readonly required>
                                          </div>
                                        </div>

                                        <div class="form-group col-md-2 col-sm-2 col-xs-2">
                                          <div class="controls">
                                            <input type="text" placeholder="Ativo" value="'.$result2[$key]['ATIVO'].'" class="form-control input" name="ativo" maxlength="1" required>
                                          </div>
                                        </div>                                        

                                        <div class="form-group col-md-2 col-sm-2 col-xs-2">
                                          <div class="controls">
                                            <input type="text" placeholder="" value="'.$result2[$key]['TIPO_USUARIO'].'" class="form-control input" name="tipo" maxlength="3" required>
                                          </div>
                                        </div>

                                        <div class="form-group col-md-2 col-sm-2 col-xs-2">
                                          <div class="controls">
                                            <input type="text" id="" value="'.$result2[$key]['ID'].'" class="form-control input" name="id" readonly required>
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
                          </div>

                          <!-- MODAL DELETE -->
                          <div class="modal fade" id="'.$result2[$key]['ID'].'DLModal" tabindex="-1" role="dialog" aria-labelledby="'.$result2[$key]['ID'].'DLModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                  <br>
                                  <i class="fa fa-trash fa-6x"></i>
                                  <h4 id="1ModalLabel" class="semi-bold">Excluir</h4>
                                </div>
                                <div class="modal-body">
                                  <div class="alert alert-danger">
                                    <i class="pull-left material-icons">feedback</i>
                                    <div>
                                      <span style="padding-left: 20px;">
                                        Voc&ecirc; tem certeza que deseja excluir <strong> '.$result2[$key]['NOME_COMPLETO'].' </strong>?                                             
                                      </span>
                                      <div class="pull-right">
                                      <a href="usuarios.D.php?id='.$result2[$key]['ID'].'"><button class="btn btn-danger btn-small">Sim </button></a>
                                      <button type="button" class="btn btn-default btn-small" data-dismiss="modal">N&atilde;o </button>    
                                      </div>
                                      </div>
                                  </div>             
                                </div>
                              </div>
                            </div>
                          </div>

                          <!-- MODAL VIEW -->
                          <div class="modal fade" id="'.$result2[$key]['ID'].'VWModal" tabindex="-1" role="dialog" aria-labelledby="'.$result2[$key]['ID'].'VWModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                  <br>
                                  <i class="fa fa-male fa-6x"></i>
                                  <h4 id="1ModalLabel" class="semi-bold">Usu&aacute;rio: '.$result2[$key]['NOME_COMPLETO'].'</h4>
                                </div>
                                <div class="modal-body">
                                  <div class="">
                                    <div class="row" style="line-height:2;">
                                      <div class="col-md-6">                                                                  
                                        <strong>ID: </strong>'.$result2[$key]['ID'].'                                
                                      </div>
                                      <div class="col-md-6">                                                                  
                                        <strong>ATIVO: </strong>'.$result2[$key]['ATIVO'].'                                
                                      </div>                                       
                                      <div class="col-md-6">                                                                  
                                        <strong>E-MAIL: </strong>'.$result2[$key]['EMAIL'].'                                
                                      </div>
                                      <div class="col-md-6">                                                                  
                                        <strong>SENHA: </strong>'.$result2[$key]['SENHA'].'                                
                                      </div>
                                      <div class="col-md-6">                                                                  
                                        <strong>SETOR: </strong>'.$result2[$key]['SETOR'].' - '.$result2[$key]['NOME_SETOR'].'                                
                                      </div>
                                      <div class="col-md-6">                                                                  
                                        <strong>CARGO: </strong>'.$result2[$key]['CARGO'].'                                
                                      </div>                                      
                                      <div class="col-md-6">                                                                  
                                        <strong>RAMAL: </strong>'.$result2[$key]['RAMAL'].'                                
                                      </div>
                                      <div class="col-md-6">                                                                  
                                        <strong>IM: </strong>'.$result2[$key]['IM'].'                                
                                      </div>
                                      <div class="col-md-6">                                                                  
                                        <strong>LOCAL: </strong>'.$result2[$key]['LOCAL'].' - '.$result2[$key]['NOME_LOCAL'].'                                
                                      </div>
                                      <div class="col-md-6">                                                                  
                                        <strong>ADMISS&Atilde;O: </strong>'.$result2[$key]['ADMISSAO'].'                                
                                      </div>
                                      <div class="col-md-6">                                                                  
                                        <strong>CADASTRO: </strong>'.$result2[$key]['CADASTRO'].'                                
                                      </div>
                                      <div class="col-md-6">                                                                  
                                        <strong>TIPO: </strong>'.$result2[$key]['TIPO_USUARIO'].'                                
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          ';
                        $rr++;
                      }                        
                      ?>
                    </tbody>
                  </table>
                </div>

                <!-- MODAL UPDATE -->
                <div class="modal fade" id="INModal" tabindex="-1" role="dialog" aria-labelledby="INModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">                                  
                        <div>
                          <div class="col-md-6 col-sm-6 col-xs-6" style="text-align:left;"></div>
                          <div class="col-md-6 col-sm-6 col-xs-6" style="text-align:right;"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button></div>
                        </div>
                        <br>
                        <i class="fa fa-male fa-6x"></i>
                        <h4 id="INModalLabel" class="semi-bold">Novo Usu&aacute;rio</h4>
                      </div>
                      <div class="modal-body">
                        <div class="">
                          <div class="row" style="line-height:2;">
                            <form method="post" name="usuario" action="usuarios.I.php">                                      

                              <div class="form-group col-md-4 col-sm-4 col-xs-4">
                                <div class="controls">
                                  <input type="text" placeholder="Nome" value="" class="form-control input" name="nome" maxlength="50" required>
                                </div>
                              </div>

                              <div class="form-group col-md-4 col-sm-4 col-xs-4">
                                <div class="controls">
                                  <input type="text" placeholder="Sobrenome" value="" class="form-control input" name="sobrenome" maxlength="40" required>
                                </div>
                              </div>

                              <div class="form-group col-md-4 col-sm-4 col-xs-4">
                                <div class="controls">
                                  <input type="text" placeholder="Admiss&atilde;o" value="" class="form-control input" name="admissao" maxlength="8" required>
                                </div>
                              </div>

                              <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                <div class="controls">
                                  <input type="email" placeholder="E-mail" value="" class="form-control input" name="email" maxlength="40" required>
                                </div>
                              </div>

                              <div class="form-group col-md-4 col-sm-4 col-xs-4">
                                <div class="controls">
                                  <input type="password" placeholder="Senha" value="" class="form-control input" name="senha" maxlength="20" required>
                                </div>
                              </div>

                              <div class="form-group col-md-2 col-sm-2 col-xs-2">
                                <div class="controls">
                                  <input type="text" placeholder="Ramal" value="" class="form-control input" name="ramal" maxlength="4" required>
                                </div>
                              </div>

                              <?php echo '
                              <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                <div class="controls">
                                  <select id="source"  class="form-control input" name="setor" required>';                                              
                                    foreach ($result3 as $key3 => $value) {
                                      echo 
                                        '<option value="'.$result3[$key3]['SIGLA'].'">'.$result3[$key3]['SIGLA'].' - '.$result3[$key3]['NOME'].'</option>';
                                    }
                                  echo '
                                  </select>                        
                                </div>
                              </div>'
                              ?>

                              <div class="form-group col-md-6 col-sm-6 col-xs-6">
                                <div class="controls">
                                  <input type="text" placeholder="Cargo" value="" class="form-control input" name="cargo" maxlength="30" required>
                                </div>
                              </div>

                              <div class="form-group col-md-4 col-sm-4 col-xs-4">
                                <div class="controls">
                                  <input type="text" placeholder="IM/Skype" value="" class="form-control input" name="im" maxlength="25" required>
                                </div>
                              </div>

                              <?php echo '
                              <div class="form-group col-md-8 col-sm-8 col-xs-8">
                                <div class="controls">
                                  <select id="source"  class="form-control input" name="local" required>';                                              
                                    foreach ($result4 as $key4 => $value) {
                                      echo 
                                        '<option value="'.$result4[$key4]['LOCAL'].'">'.$result4[$key4]['LOCAL'].' - '.$result4[$key4]['NOME'].'</option>';
                                    }
                                  echo '
                                  </select>                        
                                </div>
                              </div>'
                              ?>

                              <div class="form-group col-md-4 col-sm-4 col-xs-4">
                                <div class="controls">
                                  <select id="source"  class="form-control input" name="tipo" required>
                                    <option selected value="USU">USU - Usu&aacute;rio</option>
                                    <option value="ADM">ADM - Administrador</option>
                                  </select>
                                </div>
                              </div>                             

                              <div class="form-group col-md-4 col-sm-4 col-xs-4">
                                <div class="controls">
                                  <select id="source"  class="form-control input" name="ativo" required>
                                    <option value="S">Ativo: Sim</option>
                                    <option value="N">Ativo: N&atilde;o</option>
                                  </select>
                                </div>
                              </div>                                                                                                                                                  
                              
                              <div class="form-group col-md-12 col-sm-12 col-xs-12 pull-right">
                                <button type="submit" class="btn btn-info btn-block" value="submit">Cadastrar</button>                                        
                              </div>                                                                                                                                           
                            
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>        
          <!-- /CONTEUDO -->
        </div>
      </div>
      <!-- CONTAINER -->
      
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