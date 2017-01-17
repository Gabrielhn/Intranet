<?php
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
require_once("../assets/php/class/class.seg.php");
session_start();
proteger();

$host="10.0.0.2";
$service="//10.0.0.2:1521/orcl";
$id=$_SESSION['usuarioId'];
$email=$_SESSION['usuarioEmail'];
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
$query2 = "SELECT USR.NOME || ' ' || USR.SOBRENOME AS AUTOR, MUR.ID AS ID_MURAL, MUR.DESCRICAO AS DESC_MURAL FROM IN_USUARIOS USR, IN_MURAL MUR WHERE USR.SETOR=MUR.SETOR AND USR.ID=:id";

//#1
$stmt1 = $conn->prepare($query1);
$stmt1->bindValue(':id',$id);
$stmt1->execute();
$result1=$stmt1->fetch(PDO::FETCH_ASSOC);
$setu=$result1['SETOR'];

//#2
$stmt2 = $conn->prepare($query2);
$stmt2->bindValue(':id',$id);
$stmt2->execute();
$result2=$stmt2->fetch(PDO::FETCH_ASSOC);



?>

<!DOCTYPE html>
<html>
  <head>
    <title>Aniger - Mural - Post</title>
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
    <link href="../assets/plugins/jquery-datatable/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
    <link href="../assets/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="../assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css" />
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
                      echo "Versão " . $_SESSION['versao']
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
                <!--<a href="#" class="chat-menu-toggle"><i class="material-icons" title="Recurso ainda não implementado.">chat</i><span class="badge badge-important hide">1</span>-->
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
              <a href="../solicitacoes.php"><i class="material-icons" title="Solicitações">assignment</i> <span class="title">Solicitações</span></a>
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
          <!-- IMPLEMENTAR LOCKSCREEN -->
          <a href="../logout.php"><i class="material-icons">power_settings_new</i></a>
        </div>
      </div>
      <!-- /SIDEBAR -->

      <!-- CONTAINER-->
      <div class="page-content">
        <div class="content">
        <ul class="breadcrumb">
          <li>
            <p>VOCÊ ESTÁ EM </p>
          </li>
          <li>
            <a href="../index.php">Home</a>
          </li>
          <li>
            <a href="../dados.php">Dados</a> 
          </li>
          <li>
            <a href="../murais" class="">Mural</a> 
          </li>
          <li>
            <a href="#" class="active">Nova Postagem</a> 
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
                <div class="grid-body no-border" style="background-color: #f6f7f8;">
                <div class="form-group col-md-12 col-sm-12 col-xs-12"></div>
                  <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <h3><i class="fa fa-commenting-o fa-1x"></i><span class="semi-bold">&nbsp; Nova postagem</span></h3>
                  </div>                  
                  <form method="post" name="postagem" action="post.I.php">

                    <div class="form-group col-md-5 col-sm-5 col-xs-5">
                      <div class="controls">
                        <input type="text" placeholder="Assunto" class="form-control input-lg" name="assunto" required>
                      </div>
                    </div>

                    <div class="form-group col-md-12 col-sm-12 col-xs-12 m-b-5">
                      <textarea id="conteudo" placeholder="Digite o texto ..." class="form-control" rows="10" name="conteudo"></textarea>
                      <hr>
                    </div>

                    <div class="form-group col-md-3 col-sm-3 col-xs-3">
                      <div class="controls">
                        <label class="bold">Mural</label>
                        <input type="text" value="<?php echo '('.$result2['ID_MURAL'].') '.$result2['DESC_MURAL']; ?>" class="form-control input" name="mural" readonly>
                      </div>
                    </div>

                    <div class="form-group col-md-3 col-sm-3 col-xs-3">
                      <div class="controls">
                        <label class="bold">Autor</label>
                        <input type="text" value="<?php echo $result2['AUTOR']; ?>" class="form-control input" name="autor" readonly>
                      </div>
                    </div>
                    
                    <div class="form-group col-md-12 col-sm-12 col-xs-12"></div>

                    <div class="form-actions">
                      <div class="pull-right">
                        <!---->
                        <button type="submit" class="btn btn-info btn-cons-md" value="submit"> Enviar</button>
                        <button type="reset" class="btn btn-white btn-cons-md" value="reset">Limpar</button>
                      </div>                      
                    </div>

                  </form>
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
    <script src="../assets/plugins/jquery-datatable/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="../assets/plugins/jquery-datatable/extra/js/dataTables.tableTools.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="../assets/plugins/datatables-responsive/js/datatables.responsive.js"></script>
    <script type="text/javascript" src="../assets/plugins/datatables-responsive/js/lodash.min.js"></script>
    <script src="../assets/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
    <script src="../assets/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
    <!-- END CORE JS DEPENDECENCIES-->
    <script type="text/javascript">
    $('#conteudo').wysihtml5();
    </script>

    <!--<script type="text/javascript">
      $(document).ready(function() {
        $('#tLocais').DataTable( {
          "paging":   false
          "oLanguage": {
            "sLengthMenu": "_MENU_",
            "sZeroRecords": "Nenhum registro encontrado",
            "sInfo": " Mostrando _START_ / _END_ de _TOTAL_ registro(s)",
            "sInfoEmpty": "Mostrando 0 / 0 de 0 registros",
            "sInfoFiltered": "(filtrado de _MAX_ registros)",
            "sSearch": "Pesquisar: ",
            "sEmptyTable": "Nenhum registro encontrado",
            "oPaginate": {
                "sFirst": "Início",
                "sPrevious": "Anterior ",
                "sNext": "Próximo ",
                "sLast": "Último"
            }
        }
        
    } );
} );
    </script>-->
    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="../webarch/js/webarch.js" type="text/javascript"></script>
    <script src="../assets/js/chat.js" type="text/javascript"></script>
    <script src="../assets/js/datatables.js" type="text/javascript"></script>
    <!-- END CORE TEMPLATE JS -->
  </body>
</html>