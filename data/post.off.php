<?php
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
session_start();

$host="10.0.0.2";
$service="//10.0.0.2:1521/orcl";
$id=$_SESSION['usuarioId'];
$postid=$_GET['id'];
$conn= new \PDO("oci:host=$host;dbname=$service","INTRANET","ifnefy6b9");


$query2 = "SELECT POST.*, IMG.IMAGEM AS IMG_MURAL , MUR.DESCRICAO AS TIT_MURAL, SETO.LABEL, USU.NOME || ' ' || USU.SOBRENOME AS AUTOR FROM IN_MURAL_POST POST, IN_USUARIOS USU, IN_IMAGENS IMG, IN_MURAL MUR, IN_SETORES SETO WHERE POST.USUARIO = USU.EMAIL AND POST.IMG_POST = IMG.ID AND POST.MURAL = MUR.ID AND MUR.SETOR = SETO.SIGLA AND POST.ID =:post";

$queryview = "UPDATE IN_MURAL_POST SET VIEWS = VIEWS+1 WHERE ID =:post";




//#views
$stmtview = $conn->prepare($queryview);
$stmtview->bindValue(':post',$postid);
$stmtview->execute();

//#2
$stmt2 = $conn->prepare($query2);
$stmt2->bindValue(':post',$postid);
$stmt2->execute();
$result2=$stmt2->fetch(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html>
  <head>
    <title>Aniger - Avisos</title>
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
    <!-- <link href="../assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" /> -->
    <!-- END PLUGIN CSS -->
    <!-- BEGIN CORE CSS FRAMEWORK -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../webarch/css/webarch.css" rel="stylesheet" type="text/css" />
    <!-- END CORE CSS FRAMEWORK -->
    <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../assets/img/favicon.ico" type="image/x-icon">
  </head>
  <body class="hide-sidebar hide-top-content-header" style="background-color:#E5E9EC;">
    
      <!-- BEGIN PAGE CONTAINER-->
      <div class="page-content">
        <div class="content">
        <ul class="breadcrumb">
            <li>
              <p>VOC&Ecirc; EST&Aacute; EM </p>
            </li>
            <li><a href="#" class="active">Aviso</a></li>
          </ul>
          <!-- BEGIN PAGE TITLE -->
          <div class="page-title"><i class="fa fa-newspaper-o fa-1x"></i>
            <h3><?php echo $result2['TIT_MURAL']  ?></h3>
          </div>
          <!-- END PAGE TITLE -->
          <!-- CONTEUDO -->
                    
          <div class="row">
            <?php
              echo'
                <div class="col-md-12 col-sm-12">
                  <div class="grid simple ">
                    <div class="grid-title">
                      <h3><span class="bold">&nbsp;'.$result2['ASSUNTO'].'</span></h3>
                      <span class="muted">&nbsp;&nbsp;&nbsp;'.$result2['AUTOR'].'</span>
                    </div>
                    <div class="grid-body">
                      <div class="col-md-12">
                        '.stream_get_contents($result2['CONTEUDO']).'
                        <hr>
                        <div>
                          <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:left;"><i class="fa fa-eye fa-lg"></i>&nbsp;&nbsp;<span style="font-weight:500; font-size:13px;">'.$result2['VIEWS'].'</span></div>
                          <div class="col-md-4 col-sm-4 col-xs-4 rating" style="text-align:center;">
                            
                          </div>
                          <div class="col-md-4 col-sm-4 col-xs-4" style="text-align:right;">'.strftime('%A, %d de %B de %Y', strtotime($result2['INCLUSAO'])).'</div>
                        </div>
                      </div>                    
                    </div>                                                                                       
                  </div>
                </div>
              </div>'        
            ?>                                                   
          </div>

          <!--<span><i class="fa fa-star-o fa-lg"></i></span>
          <span><i class="fa fa-star-o fa-lg"></i></span>
          <span><i class="fa fa-star-o fa-lg"></i></span>
          <span><i class="fa fa-star-o fa-lg"></i></span>
          <span><i class="fa fa-star-o fa-lg"></i></span>-->


          <!-- FIM CONTEUDO -->
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