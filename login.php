<?php
  session_start();
  define("versao", "1.3");
  $_SESSION['versao'] = versao;
?>

<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8" />
    <title>Aniger - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN PLUGIN CSS -->
    <link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="assets/plugins/bootstrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/bootstrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="assets/plugins/animate.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" />
    <!-- END PLUGIN CSS -->
    <!-- BEGIN CORE CSS FRAMEWORK -->
    <link href="webarch/css/webarch.css" rel="stylesheet" type="text/css" />
    <!-- END CORE CSS FRAMEWORK -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">
  </head>
  <!-- FIM HEAD -->

  <!-- CONTAINER -->
  <body class="error-body no-top lazy" data-original="assets/img/work3.jpg" style="background-image: url('assets/img/work3.jpg')">
    <div class="container">
      <div class="row login-container animated fadeIn" style="margin-top:5%;">
        <div class="col-md-6 col-md-offset-3 tiles white no-padding">
          <div class="p-t-30 p-l-40 p-b-20 xs-p-t-10 xs-p-l-10 xs-p-b-10">
            <h2 class="normal">
              <img src="assets\img\logo3.png" alt="Aniger">
            </h2>
            <p class="p-b-20">
              "Quanto mais trabalhamos, mais sorte temos!"
            </p>
            <div class="tiles white no-margin text-black tab-content">
            <div role="tabpanel" class="tab-pane active" id="tab_login" style="padding-left:0px; padding-bottom:0px;" >
              <form class="animated fadeIn" method="post" action="assets\php\vLogin.php" id="">
                <div class="row form-row">
                  <div class="col-md-12 col-sm-12" style="padding-right:25px;">
                    <input class="form-control input-lg" id="login_email" name="login_username" placeholder="E-mail" type="email" style="text-align: center" autofocus>
                  </div>
                  <div class="col-md-12 col-sm-12" style="padding-right:25px;">
                    <input class="form-control input-lg" id="login_senha" name="login_pass" placeholder="Senha" type="password" style="text-align: center">
                  </div>
                </div>
                <div class="row p-t-10 m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                  <div class="control-group col-md-10">                  
                  </div>
                </div>
                <div style=" margin-right: 10px;">
                  <button type="submit" class="btn btn-success btn-block btn-large" value="submit"><i class="fa fa-check"></i> Entrar</button>
                </div>
              </form>
            </div>
            </div>
            <div role="tablist" align="center" style=" margin-right: 30px;">
              <br>&nbsp;
              <hr>
              </div>
              <div>
              <div class="alert alert-info" style=" margin-right: 30px;">
                <i class="pull-left material-icons">feedback</i>
                  <h6 style="padding-left: 30px;">
                    Este é um espaço que está sendo desenvolvido pelo setor de TI, para reunir várias informações uteis para os colaboradores do grupo Aniger. 
                    <br>&nbsp;  
                    <p>Aguarde novidades =)</p>
                  </h6>
                  <div class="pull-right">
                <span class="label label-info"> <?= versao ?> </span>
              </div>    
              </div>              
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>

    <!-- FIM CONTAINER -->
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