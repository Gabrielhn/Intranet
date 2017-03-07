<?php
//setlocale(LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.iso-8859-1', 'portuguese');
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
// date_default_timezone_set('America/Sao_Paulo');
session_start();

$host="10.0.0.2";
$service="//10.0.0.2:1521/orcl";
$id=$_SESSION['usuarioId'];
$conn= new \PDO("oci:host=$host;dbname=$service","INTRANET","ifnefy6b9");

$query2 = "SELECT * FROM VW_POST_2 WHERE POSICAO = 1";
$query3 = "SELECT * FROM VW_POST_2 WHERE POSICAO = 2";
$query4 = "SELECT * FROM VW_POST_2 WHERE POSICAO = 3";

$query5 = "SELECT * FROM IN_VAGAS WHERE ATIVO = 'S' AND ROWNUM < 4 ORDER BY DT_CADASTRO";

$query6 = "SELECT * FROM VW_POST_3 WHERE POSICAO = 1";
$query7 = "SELECT * FROM VW_POST_3 WHERE POSICAO = 2";
$query8 = "SELECT * FROM VW_POST_3 WHERE POSICAO = 3";


//#2
$stmt2 = $conn->prepare($query2);
$stmt2->execute();
$result2=$stmt2->fetch(PDO::FETCH_ASSOC);

//#3
$stmt3 = $conn->prepare($query3);
$stmt3->execute();
$result3=$stmt3->fetch(PDO::FETCH_ASSOC);

//#4
$stmt4 = $conn->prepare($query4);
$stmt4->execute();
$result4=$stmt4->fetch(PDO::FETCH_ASSOC);

//#5
$stmt5 = $conn->prepare($query5);
$stmt5->execute();
$result5=$stmt5->fetchAll(PDO::FETCH_ASSOC);

//#6
$stmt6 = $conn->prepare($query6);
$stmt6->execute();
$result6=$stmt6->fetch(PDO::FETCH_ASSOC);

//#7
$stmt7 = $conn->prepare($query7);
$stmt7->execute();
$result7=$stmt7->fetch(PDO::FETCH_ASSOC);

//#8
$stmt8 = $conn->prepare($query8);
$stmt8->execute();
$result8=$stmt8->fetch(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html>
  <head>
    <title>Aniger - Home</title>
    <meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
    <meta charset="iso-8859-1" />
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

    <div align="center" style="padding-top:20px;">
      <a href="login.php"><img src="assets/img/logo.png" class="logo" alt="" data-src="assets/img/logo.png" data-src-retina="assets/img/logo.png"  width="180" /></a>
    </div>

    <div class="content" style="padding-top:20px;">

    <!--#1 MURAL 1-->
      <div class="col-md-12 col-sm-12">
        <div class="grid simple ">
          <div class="grid-title no-border">
            <div class="tools"></div>
          </div>
          <div class="grid-body no-border">
            <div class="col-md-12">  
              <h4><i class="fa fa-newspaper-o fa-1x"></i><span class="semi-bold">&nbsp; <?php echo $result2['TIT_MURAL'] ?></span><div class="pull-right"><span class="label label-mkt">MKT</span></div></h4>
              <br/>
            </div>
            <!--DESTAQUE-->
            <div class="col-md-12 p-b-10 m-b-10">
              <a href="#">
                <img src="assets/img/others/banner1_2.png" alt="" class="image-responsive-width xs-image-responsive-width lazy">
              </a>
            </div>
            <!--NOTICIAS-->
            <?php
              
                echo '                      
                <div class="col-md-3  col-sm-3 m-b-10" data-aspect-ratio="true">
                  <a href="data/post.off.php?id='.$result2['ID'].'">
                    <div class="live-tile slide ha">
                      <div class="slide-front ha tiles green ">
                        <div class="overlayer bottom-left fullwidth">
                          <div class="overlayer-wrapper">
                            <div class="tiles gradient-black p-l-20 p-r-10 p-b-20 p-t-20">
                              <h4 class="text-white semi-bold no-margin">'.$result2['ASSUNTO'].'</h4>
                              <div class="muted">'.$result2['AUTOR'].'</div>
                              <div class="preview-wrapper pull-right"><i class="icon-custom-up "></i> Leia mais...</p></div>                            
                            </div>
                          </div>
                        </div>
                        <img src="data:image/jpeg;base64,'.base64_encode(stream_get_contents($result2['IMG_MURAL'])).'" alt="" class="image-responsive-width xs-image-responsive-width lazy"> </div>
                      <div class="slide-back ha tiles white">                                                  
                      </div>
                    </div>
                  </div>
                </a>';

                echo '                      
                <div class="col-md-3  col-sm-3 m-b-10" data-aspect-ratio="true">
                  <a href="data/post.off.php?id='.$result3['ID'].'">
                    <div class="live-tile slide ha">
                      <div class="slide-front ha tiles green ">
                        <div class="overlayer bottom-left fullwidth">
                          <div class="overlayer-wrapper">
                            <div class="tiles gradient-black p-l-20 p-r-10 p-b-20 p-t-20">
                              <h4 class="text-white semi-bold no-margin">'.$result3['ASSUNTO'].'</h4>
                              <div class="muted">'.$result3['AUTOR'].'</div>
                              <div class="preview-wrapper pull-right"><i class="icon-custom-up "></i> Leia mais...</p></div>                            
                            </div>
                          </div>
                        </div>
                        <img src="data:image/jpeg;base64,'.base64_encode(stream_get_contents($result3['IMG_MURAL'])).'" alt="" class="image-responsive-width xs-image-responsive-width lazy"> </div>
                      <div class="slide-back ha tiles white">                                                  
                      </div>
                    </div>
                  </div>
                </a>';

                echo '                      
                <div class="col-md-3  col-sm-3 m-b-10" data-aspect-ratio="true">
                  <a href="data/post.off.php?id='.$result4['ID'].'">
                    <div class="live-tile slide ha">
                      <div class="slide-front ha tiles green ">
                        <div class="overlayer bottom-left fullwidth">
                          <div class="overlayer-wrapper">
                            <div class="tiles gradient-black p-l-20 p-r-10 p-b-20 p-t-20">
                              <h4 class="text-white semi-bold no-margin">'.$result4['ASSUNTO'].'</h4>
                              <div class="muted">'.$result4['AUTOR'].'</div>
                              <div class="preview-wrapper pull-right"><i class="icon-custom-up "></i> Leia mais...</p></div>                            
                            </div>
                          </div>
                        </div>
                        <img src="data:image/jpeg;base64,'.base64_encode(stream_get_contents($result4['IMG_MURAL'])).'" alt="" class="image-responsive-width xs-image-responsive-width lazy"> </div>
                      <div class="slide-back ha tiles white">                                                  
                      </div>
                    </div>
                  </div>
                </a>';
              
            ?>                  
          </div>
        </div>
      </div>

    <!--#2 MURAL 2-->            

      <div class="col-md-6 col-sm-6">
          <div class="grid simple ">
            <div class="grid-title no-border">
              <div class="tools">                                      
              </div>
            </div>
            <div class="grid-body no-border">
            <div class="col-md-12">
              <h4><i class="fa fa-newspaper-o fa-1x"></i><span class="semi-bold">&nbsp; <?php echo $result6['TIT_MURAL']?></span><div class="pull-right"><span class="label label-rh">RH</span></div></h4>
              <br/>                  
              <?php                     
                  echo '
                  <a href="data/post.off.php?id='.$result6['ID'].'">
                  <div class="notification-messages info">
                    <div class="user-profile">
                      <img alt=""  width="35" height="35" src="data:image/jpeg;base64,'.base64_encode(stream_get_contents($result6['IMG_AUTOR'])).'">
                    </div>
                    <div class="message-wrapper">
                      <div class="heading" style="overflow:visible;">
                        '.$result6['ASSUNTO'].' <div class="date">por '.$result6['AUTOR'].'</div>
                      </div>
                      <div class="description">
                        Clique para visualizar.
                      </div>
                      <div class="date pull-right">
                        '.strftime('%A, %d de %B de %Y', strtotime($result6['INCLUSAO'])).'
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </a>';

                echo '
                  <a href="data/post.off.php?id='.$result7['ID'].'">
                  <div class="notification-messages info">
                    <div class="user-profile">
                      <img alt=""  width="35" height="35" src="data:image/jpeg;base64,'.base64_encode(stream_get_contents($result7['IMG_AUTOR'])).'">
                    </div>
                    <div class="message-wrapper">
                      <div class="heading" style="overflow:visible;">
                        '.$result7['ASSUNTO'].' <div class="date">por '.$result7['AUTOR'].'</div>
                      </div>
                      <div class="description">
                        Clique para visualizar.
                      </div>
                      <div class="date pull-right">
                        '.strftime('%A, %d de %B de %Y', strtotime($result7['INCLUSAO'])).'
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </a>'; 

                echo '
                  <a href="data/post.off.php?id='.$result8['ID'].'">
                  <div class="notification-messages info">
                    <div class="user-profile">
                      <img alt=""  width="35" height="35" src="data:image/jpeg;base64,'.base64_encode(stream_get_contents($result8['IMG_AUTOR'])).'">
                    </div>
                    <div class="message-wrapper">
                      <div class="heading" style="overflow:visible;">
                        '.$result8['ASSUNTO'].' <div class="date">por '.$result8['AUTOR'].'</div>
                      </div>
                      <div class="description">
                        Clique para visualizar.
                      </div>
                      <div class="date pull-right">
                        '.strftime('%A, %d de %B de %Y', strtotime($result8['INCLUSAO'])).'
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </a>'; 

              ?>
              </div>                                   
            </div>
          </div>
        </div>        

        <!--#3 VAGAS-->
        <div class="col-md-3 col-sm-6">
          <div class="grid simple ">
            <div class="grid-title no-border">
              <div class="tools">                                      
              </div>
            </div>
            <div class="grid-body no-border">
              <h4><i class="fa fa-bookmark fa-1x"></i><span class="semi-bold">&nbsp; Vagas</span></h4>
              <br/>              
              <?php
                foreach ($result5 as $key5 => $value) {
                  echo '
                  <span style="cursor: pointer;" data-toggle="modal" data-target="#'.$result5[$key5]['ID'].'Modal">                        
                    <div class="notification-messages info">                          
                      <div class="" style="font-weight: 450; font-size:13px;">
                        <div class="heading" style="overflow:visible; text-align: center;">
                          <div><span class="label label-'.strtolower($result5[$key5]['SETOR']).'">'.$result5[$key5]['SETOR'].'</span></div>
                          <p> </p>
                          '.$result5[$key5]['FUNCAO'].'
                        </div>                                                        
                      </div>
                      <div class="clearfix"></div>
                    </div>                      
                  </span>
                  
                  <div class="modal fade" id="'.$result5[$key5]['ID'].'Modal" tabindex="-1" role="dialog" aria-labelledby="'.$result5[$key5]['ID'].'ModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <div>
                            <div class="col-md-6 col-sm-6 col-xs-6" style="text-align:left;">#'.$result5[$key5]['ID'].'</div>
                            <div class="col-md-6 col-sm-6 col-xs-6" style="text-align:right;"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button></div>
                          </div>                              
                          <br>
                          <i class="fa fa-bookmark fa-6x"></i>
                          <h4 id="'.$result5[$key5]['ID'].'ModalLabel" class="semi-bold">Cargo: '.$result5[$key5]['FUNCAO'].'</h4>
                          <span class="label label-'.strtolower($result5[$key5]['SETOR']).'">'.$result5[$key5]['SETOR'].'</span>
                        </div>
                        <div class="modal-body">
                          <div class="alert alert-info" >
                            Descri&ccedil;&atilde;o:
                            <h6 style="padding-left: 30px;">
                              '.$result5[$key5]['DESCRICAO'].' 
                            <br>&nbsp;  
                            </h6>    
                          </div>
                          <div class="alert alert-info" >
                            Requisitos:
                            <h6 style="padding-left: 30px;">
                              '.$result5[$key5]['REQUISITOS'].' 
                            <br>&nbsp;  
                            </h6>    
                          </div>
                          <div style="text-align:center;">
                            <span class="description" style="font-size:11px;">
                              <p>
                              Caso j&aacute; seja um funcion&aacute;rio ANIGER e tenha interesse nesta vaga, comunique ao seu gestor para ele entrar em contato com o RH.                                  
                              Caso queira indicar esta vaga a um amigo, pedimos que seja enviado um e-mail para <span class="bold">rh@aniger.com.br</span> mencionando o c&oacute;digo da vaga.
                              </p>
                            </span>
                          </div>             
                        </div>
                      </div>
                    </div>
                  </div>'
                  ;
                }                                            
                ?>
            </div>
          </div>
        </div>
             
        <!--#4 ANIVERSARIANTES-->
        <div class="col-md-3 col-sm-6">
            <div class="grid simple ">
              <div class="grid-title no-border">
                <div class="tools">                                      
                </div>
              </div>
              <div class="grid-body no-border">
                <h4><i class="fa fa-birthday-cake fa-1x"></i><span class="semi-bold">&nbsp; Anivers&aacute;rios</span></h4>
                <br/>
                <a href="assets/img/janeiro-sul.png" target="blank">
                  <img src="assets/img/janeiro-sul.png" class="image-responsive-width xs-image-responsive-width lazy"></img>                                  
                </a>
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