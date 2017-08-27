<?php
//setlocale(LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.iso-8859-1', 'portuguese');
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
// date_default_timezone_set('America/Sao_Paulo');
session_start();

$host="10.0.0.2";
$service="//10.0.0.2:1521/orcl";
$conn= new \PDO("oci:host=$host;dbname=$service","INTRANET","ifnefy6b9");

$query2 = "SELECT CAP.DATA, CAP.GRUPO_TRABALHO_ID, GT.GRUPO_TRABALHO, GT.NOME, CAP.PARES_DISPONIVEIS AS META,    
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

//#2
$semana="152017";
$grupo="11782";
$stmt2 = $conn->prepare($query2);
$stmt2->bindValue(':semana',$semana);
$stmt2->bindValue(':grupo',$grupo);
$stmt2->execute();
$result2=$stmt2->fetchAll(PDO::FETCH_ASSOC);


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
  <body class="">

    <div class="content" style="padding-top:20px;">

    <!--#1 MURAL 1-->
      <div class="col-md-12 col-sm-12">
        <div class="grid simple ">
          <div class="grid-title no-border">
            <div class="tools"></div>
          </div>
          <div class="grid-body no-border">
            <div class="col-md-12">  
              <h3><i class="fa fa-industry fa-1x"></i><span class="semi-bold">&nbsp; Meta x Produ&ccedil;&atilde;o - <?php echo $result2[1]['GRUPO_TRABALHO'] ?> - <?php echo $result2[1]['NOME'] ?></span><div class="pull-right"><span class="label label-mkt">PCP</span></div></h3>
              <br/>
            </div>
            <!--DESTAQUE-->
            <div class="col-md-12 p-b-10 m-b-10">
              
            </div>
            <!--NOTICIAS-->

              <!--<div class="js-loading text-center">
                      <h3>Carregando...</h3>
                  </div>-->
                    &nbsp;


                  <div id="1111"></div>

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

    Morris.Area({
        element: '1111',
        xkey: 'data',
        ykeys: ['meta', 'produzido'],
        labels: ['Meta', 'Produzido'],      
        data: [
          { data: '2017-04-07', meta: Met1, produzido: Prod1 },
          { data: '2017-04-08', meta: Met2, produzido: Prod2 },
          { data: '2017-04-09', meta: Met3, produzido: Prod3 },
          { data: '2017-04-10', meta: Met4, produzido: Prod4 },
          { data: '2017-04-11', meta: Met5, produzido: Prod5 },
          { data: '2017-04-12', meta: Met6, produzido: Prod6 },
          { data: '2017-04-13', meta: Met7, produzido: Prod7 }
        ],
        behaveLikeLine: true,      
        fillOpacity: 0.5,      
        hideHover: 'auto',      
        pointSize: 4,
        smooth: true,
        resize: true,      
        lineColors:['#9ea2a8', '#2c63b7']
      });

  </script>
    <!-- END CORE TEMPLATE JS -->
  </body>
</html>