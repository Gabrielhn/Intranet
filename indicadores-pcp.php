<?php
require_once("assets/php/class/class.seg.php");
require_once("assets/php/class/class.utils.php");
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

$query2 = "SELECT CAP.DATA, CAP.GRUPO_TRABALHO_ID, GT.NOME, CAP.PARES_DISPONIVEIS AS META,    
    CASE
      WHEN BX.PARES_PRODUZIDOS IS NULL
      THEN 0
      ELSE BX.PARES_PRODUZIDOS
      END AS PRODUCAO
FROM 
    ANIGER.PCP_CAP_GRUPO_TRAB CAP,
    ANIGER.PCP_GRUPOS_TRABALHO GT,
    (SELECT
    PROD.DATA, 
    SUM(PROD.QUANTIDADE) PARES_PRODUZIDOS
FROM    
    (SELECT     
        TRUNC(TSET.DATA_BAIXA) AS DATA,
        SUM(TAL.QUANTIDADE) QUANTIDADE
    FROM 
        PCP_TALOES_SETORES TSET,
        PCP_TALOES_GRADE_CALCADO TAL,
        PCP_GRUPOS_TRABALHO GTRAB 
    WHERE
        TSET.TALAO_ID = TAL.TALAO_ID
        AND TSET.GRUPO_TRABALHO_ID = GTRAB.GRUPO_TRABALHO_ID 
        AND BAIXADO = 'S' 
        AND (DATA_BAIXA BETWEEN (SELECT DATA_INICIAL FROM TAB000029 WHERE CODIGO = :semana) AND (SELECT DATA_FINAL+1 FROM TAB000029 WHERE CODIGO = :semana)) 
        AND TSET.SETOR = GTRAB.SETOR 
        AND TSET.FABRICA = GTRAB.FABRICA 
        AND TSET.GRUPO_TRABALHO_ID = :grupo
    GROUP BY TSET.DATA_BAIXA) PROD
GROUP BY DATA) BX 
WHERE     
    CAP.DATA = BX.DATA(+)
    AND CAP.GRUPO_TRABALHO_ID = GT.GRUPO_TRABALHO_ID 
    AND CAP.GRUPO_TRABALHO_ID = :grupo
    AND CAP.DATA BETWEEN (SELECT DATA_INICIAL FROM TAB000029 WHERE CODIGO = :semana) AND (SELECT DATA_FINAL FROM TAB000029 WHERE CODIGO = :semana)
ORDER BY CAP.DATA";

$query3 = "SELECT 
    * 
FROM      
    (SELECT                
        GRUPO_TRABALHO_ID,
        1100 AS META_DIA,
        5500 AS META_SEMANA,    
        DATA,
        SUM(QUANTIDADE) AS PRODUCAO   
    FROM
        (SELECT
            GTRAB.FABRICA,
            TSET.GRUPO_TRABALHO_ID,     
            TRUNC(TSET.DATA_BAIXA) AS DATA,
            SUM(TAL.QUANTIDADE) AS QUANTIDADE
        FROM 
            PCP_TALOES_SETORES TSET,
            PCP_TALOES_GRADE_CALCADO TAL,
            PCP_GRUPOS_TRABALHO GTRAB 
        WHERE
            TSET.TALAO_ID = TAL.TALAO_ID
            AND TSET.GRUPO_TRABALHO_ID = GTRAB.GRUPO_TRABALHO_ID 
            AND BAIXADO = 'S' 
            AND (DATA_BAIXA BETWEEN (SELECT DATA_INICIAL FROM TAB000029 WHERE CODIGO = :SEMANA) AND (SELECT DATA_FINAL+1 FROM TAB000029 WHERE CODIGO = :SEMANA)) 
            AND TSET.SETOR = GTRAB.SETOR 
            AND TSET.FABRICA = GTRAB.FABRICA 
            AND TSET.GRUPO_TRABALHO_ID IN ('10437','10438','10439','10440','10441','10442')
        GROUP BY TSET.DATA_BAIXA, GTRAB.FABRICA, TSET.GRUPO_TRABALHO_ID) BX
    GROUP BY
    FABRICA, 
        GRUPO_TRABALHO_ID,    
        DATA) AA         
PIVOT
      (            
       SUM(PRODUCAO) FOR DATA IN ('17/03/2017','18/03/2017','19/03/2017','20/03/2017','21/03/2017','22/03/2017','23/03/2017')
       )
ORDER BY 2 ASC";

//#1
$stmt1 = $conn->prepare($query1);
$stmt1->bindValue(':id',$id);
$stmt1->execute();
$result1=$stmt1->fetch(PDO::FETCH_ASSOC);

//#2
$semana="122017";
$grupo="10437";
$stmt2 = $conn->prepare($query2);
$stmt2->bindValue(':semana',$semana);
$stmt2->bindValue(':grupo',$grupo);
$stmt2->execute();
$result2=$stmt2->fetchAll(PDO::FETCH_ASSOC);

//#3
$semana="122017";
$stmt3 = $conn->prepare($query3);
$stmt3->bindValue(':semana',$semana);
$stmt3->execute();
$result3=$stmt3->fetchAll(PDO::FETCH_BOTH);

$colunas = array_keys($result3[0]);

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Aniger - Indicadores</title>
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
    <link href="http://cdnjs.cloudflare.com/ajax/libs/prettify/r224/prettify.min.css" rel="stylesheet" >
    <link href="assets/plugins/morris/morris.css" rel="stylesheet">
    <!-- <link href="assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" /> -->
    <!-- END PLUGIN CSS -->
    <!-- BEGIN CORE CSS FRAMEWORK -->
    <link href="assets/css/material.css" rel="stylesheet">
    <link href="webarch/css/webarch.css" rel="stylesheet" type="text/css" />
    <!-- END CORE CSS FRAMEWORK -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">
  </head>
  <body class="hide-top-content-header">
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
            <?php
               //Exibe o menu lateral das páginas WEB
               exibe_menu_lateral("indicadores.php");
            ?>
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
            <li>
            <a href="index.php">Home</a>
            </li>
            <li><a href="#" class="active">Indicadores</a> </li>
          </ul>
          <!-- BEGIN PAGE TITLE -->
          <div class="page-title"> <i class="fa fa-bar-chart" title="Indicadores"></i>
            <h3>Indicadores - Nike</h3>
          </div>
          <!-- END PAGE TITLE -->
          <!-- BEGIN PlACE PAGE CONTENT HERE -->
          <div class="row">            

            <div class="col-md-12">
              <div class="grid simple ">
                <div class="grid-title no-border">
                  <!--<div class="tools">
                    <a href="#"><i class="fa fa-plus fa-lg"></i> </a>
                  </div>-->
                </div>
                <div class="grid-body no-border">
                  <h3><i class="fa fa-calendar fa-1x"></i><span class="semi-bold">&nbsp; Semana 12-2017</span></h3>
                  <table class="table table-hover">
                    <thead>
                      <tr>                                                
                        <th style="width:7%">Linha</th>                    
                        <th style="width:7%">Meta dia</th>
                        <th style="width:7%">Meta semana</th>
                        <th style="width:10%"> <?php echo $colunas[6]; ?> </th>
                        <th style="width:10%"> <?php echo $colunas[8]; ?> </th>
                        <th style="width:10%"> <?php echo $colunas[10]; ?> </th>
                        <th style="width:10%"> <?php echo $colunas[12]; ?> </th>
                        <th style="width:10%"> <?php echo $colunas[14]; ?> </th>
                        <th style="width:10%"> <?php echo $colunas[16]; ?> </th>
                        <th style="width:10%"> <?php echo $colunas[18]; ?> </th>                                                
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $rr=1;
                      foreach ($result3 as $key => $value) {
                        echo '
                          <tr>                           
                            <td class="v-align-middle"><span class="muted">'.$result3[$key]['GRUPO_TRABALHO_ID'].'</span></td>
                            <td class="v-align-middle"><span class="muted">'.$result3[$key]['META_DIA'].'</span></td>
                            <td class="v-align-middle"><span class="muted" data-toggle="modal" data-target=".charts-modal"><a href="#" title="Gr&aacute;fico">'.$result3[$key]['META_SEMANA'].' <i class="fa fa-line-chart"><i></span></td>
                            <td style="text-align:center;" class="v-align-middle"><span class="muted">'.$result3[$key][3].'</span></td>
                            <td style="text-align:center;" class="v-align-middle"><span class="muted">'.$result3[$key][4].'</span></td>
                            <td style="text-align:center;" class="v-align-middle"><span class="muted">'.$result3[$key][5].'</span></td>                                                                                               
                            <td style="text-align:center;" class="v-align-middle"><span class="muted">'.$result3[$key][6].'</span></td>                                                                                               
                            <td style="text-align:center;" class="v-align-middle"><span class="muted">'.$result3[$key][7].'</span></td>                                                                                               
                            <td style="text-align:center;" class="v-align-middle"><span class="muted">'.$result3[$key][8].'</span></td>                                                                                               
                            <td style="text-align:center;" class="v-align-middle"><span class="muted">'.$result3[$key][9].'</span></td>                                                                                               
                          </tr>

                          <!-- MODAL GRAFICO -->
                          <div class="modal fade" id="'.$result3[$key]['GRUPO_TRABALHO_ID'].'GRModal" tabindex="-1" role="dialog" aria-labelledby="'.$result3[$key]['GRUPO_TRABALHO_ID'].'GRModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                  <h4 class="modal-title">Meta x Produ&ccedil;&atilde;o - Grupo '.$result3[$key]['GRUPO_TRABALHO_ID'].'</h4>                                                                                                                                    
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
              </div>
            </div>

            <div class="col-md-4 col-sm-4 m-b-20">
              <div class="tiles blue weather-widget">
                <div class="col-md-12 m-b-10 m-t-10">
                  <div class="col-md-6">Data/Hora atual </div>   <div style="text-align:right;" class="col-md-6"><iframe src="http://free.timeanddate.com/clock/i5hp9yxv/n595/tlbr5/fs12/fcfff/tc0090d9/pct/ahl/avb/pb0/tt0/tw1/tm1/th1" frameborder="0" width="189" height="15" allowTransparency="true"></iframe>
 </div>               
                  <div class="col-md-6">Meta anterior </div>   <div style="text-align:right;" class="col-md-6">27000 </div>               
                  <div class="col-md-6">Produ&ccedil;&atilde;o anterior </div>   <div style="text-align:right;" class="col-md-6">27050 </div>               
                  <div class="col-md-6">Saldo </div>   <div style="text-align:right;" class="col-md-6">+50 </div>                                 
                </div>
              </div>
            </div>
          
            <div class="col-md-4 col-sm-4 m-b-20">
              <div class="tiles blue weather-widget">
                <div class="col-md-12 m-b-10 m-t-10">
                  <div class="col-md-6">Meta dia </div>   <div style="text-align:right;" class="col-md-6">5500 </div>               
                  <div class="col-md-6">Meta semana </div>   <div style="text-align:right;" class="col-md-6">27500 </div>               
                  <div class="col-md-6">Total produzido </div>   <div style="text-align:right;" class="col-md-6">7814 </div>               
                  <div class="col-md-6">Saldo </div>   <div style="text-align:right;" class="col-md-6">+2314 </div>                                 
                </div>
              </div>
            </div>
            
            <div class="col-md-4 col-sm-4 m-b-20">
              <div class="tiles blue weather-widget">
                <div class="col-md-12 m-b-10 m-t-10">
                  OTP FA <br/>
                  OTP HO  <br/>
                  OTP SP  <br/>
                  OTP SU  <br/>
                </div>
              </div>
            </div>


          <!-- CONTEUDO -->
          </div>
          
                    

          <div class="modal fade charts-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                      <h4 class="modal-title" id="myModalLabel">Meta x Produ&ccedil;&atilde;o - Grupo 10437</h4>
                </div>    
                  <div class="js-loading text-center">
                      <h3>Carregando...</h3>
                  </div>
                  <div id="GR10437"></div>
                  <div class="modal-footer">
                      <br/>
                  </div>    
              </div>
            </div>
          </div>
           

                    

                   

          <!-- CONTEUDO -->
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
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
    <script src="assets/plugins/morris/morris.js"></script>
    <!-- END CORE JS DEPENDECENCIES-->    

  <script>
    var Met1 = "<?php echo $result2[0]['META']; ?>"; var Prod1 = "<?php echo $result2[0]['PRODUCAO']; ?>";
      var Met2 = "<?php echo $result2[1]['META']; ?>"; var Prod2 = "<?php echo $result2[1]['PRODUCAO']; ?>";
      var Met3 = "<?php echo $result2[2]['META']; ?>"; var Prod3 = "<?php echo $result2[2]['PRODUCAO']; ?>";
      var Met4 = "<?php echo $result2[3]['META']; ?>"; var Prod4 = "<?php echo $result2[3]['PRODUCAO']; ?>";
      var Met5 = "<?php echo $result2[4]['META']; ?>"; var Prod5 = "<?php echo $result2[4]['PRODUCAO']; ?>";
      var Met6 = "<?php echo $result2[5]['META']; ?>"; var Prod6 = "<?php echo $result2[5]['PRODUCAO']; ?>";
      var Met7 = "<?php echo $result2[6]['META']; ?>"; var Prod7 = "<?php echo $result2[6]['PRODUCAO']; ?>";

    $(window).load(function(){
    $('.charts-modal').on('show.bs.modal', function (event) {
        setTimeout(function(){
            Morris.Area({
        element: 'GR10437',
        xkey: 'data',
        ykeys: ['meta', 'produzido'],
        labels: ['Meta', 'Produzido'],      
        data: [
          { data: '2017-03-17', meta: Met1, produzido: Prod1 },
          { data: '2017-03-18', meta: Met2, produzido: Prod2 },
          { data: '2017-03-19', meta: Met3, produzido: Prod3 },
          { data: '2017-03-20', meta: Met4, produzido: Prod4 },
          { data: '2017-03-21', meta: Met5, produzido: Prod5 },
          { data: '2017-03-22', meta: Met6, produzido: Prod6 },
          { data: '2017-03-23', meta: Met7, produzido: Prod7 }
        ],
        behaveLikeLine: true,      
        fillOpacity: 0.5,      
        hideHover: 'auto',      
        pointSize: 4,
        smooth: true,
        resize: true,      
        lineColors:['#9ea2a8', '#2c63b7']
      });             
    		if($('#GR10437').find('svg').length > 1){                
    		    $('#GR10437 svg:first').remove();                
                $(".morris-hover:last").remove();
    		}            
            $('.js-loading').addClass('hidden');
    	},1000);
    });
});
  </script>

    <!-- BEGIN CORE TEMPLATE JS -->
    <script src="webarch/js/webarch.js" type="text/javascript"></script>
    <script src="assets/js/chat.js" type="text/javascript"></script>
    <!-- END CORE TEMPLATE JS -->
  </body>
</html>