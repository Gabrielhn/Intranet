<?php
//setlocale(LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.iso-8859-1', 'portuguese');
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
// date_default_timezone_set('America/Sao_Paulo');
session_start();

$host="10.0.0.2";
$service="//10.0.0.2:1521/orcl";
$conn= new \PDO("oci:host=$host;dbname=$service","INTRANET","ifnefy6b9");

$idpainel=$_GET['painel'];
$query1 = "SELECT * FROM IN_PROGRAMACAO_MIDIA WHERE PAINEL = :id AND ORDEM = :ordem";
$query2 = "SELECT * FROM IN_PAINEIS WHERE ID = :id";
$query3 = "SELECT MAX(ORDEM) AS MAX FROM IN_PROGRAMACAO_MIDIA WHERE PAINEL = :id";

if (isset($_SESSION['exibe'])) {
  ;
} else {
  $_SESSION['exibe'] = '1';
}

//#1 MIDIA
$stmt1 = $conn->prepare($query1);
$stmt1->bindValue(':id',$idpainel);
$stmt1->bindValue(':ordem',$_SESSION['exibe']);
$stmt1->execute();
$result1=$stmt1->fetch(PDO::FETCH_ASSOC);

//#2 PAINEL
$stmt2 = $conn->prepare($query2);
$stmt2->bindValue(':id',$idpainel);
$stmt2->execute();
$result2=$stmt2->fetch(PDO::FETCH_ASSOC);

//#3 MAX
$stmt3 = $conn->prepare($query3);
$stmt3->bindValue(':id',$idpainel);
$stmt3->execute();
$result3=$stmt3->fetch(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html>
  <head>
    <title>Aniger - Painel</title>
    <meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
    <meta charset="iso-8859-1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <?php
      echo '<meta http-equiv="refresh" content="'.$result1['TEMPO'].'">';
    ?>
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

    <div align="center" style="padding-top:20px;">
      <img style="cursor:pointer;" src="assets/img/logo.png" class="logo" alt="" data-src="assets/img/logo.png" data-src-retina="assets/img/logo.png"  width="180" onclick="history.back()" />
    </div>

    <div class="content" style="padding-top:20px;">
  
        <div class="col-md-12">
          <div class="grid simple ">
            <div class="grid-title no-border">
            </div>
            <div class="grid-body no-border">
              <h3><i class="fa fa-tv fa-1x"></i><span class="semi-bold">&nbsp; <?php echo $result2['DESCRICAO']; ?></span></h3>
              <?php

              if ($result1['TIPO'] == 'IMG') {
                echo '<img src="data:image/jpeg;base64,'.base64_encode(stream_get_contents($result1['CONTEUDO'])).'" alt="" class="xs-image-responsive-width lazy">';
              };
              if ($result1['TIPO'] == 'URL') {
                echo '<iframe src="'.$result1['DESCRICAO'].'" style="border:none;width:100%;height:800px;"></iframe>';
              }
              
              if ($_SESSION['exibe'] == $result3['MAX']) {
                $_SESSION['exibe'] = '1';
              } else {
                $_SESSION['exibe'] ++;
              };
              
              ?> 
            </div>

          </div>
        </div>

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