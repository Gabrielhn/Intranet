<?php
  session_start();

  $user = 'Admin';
  $pass = 'anigerasa';
  define("versao", "1.1");

  if ($user == "Admin" && $pass == "aniger") {
    $_SESSION['login'] = true;
  }
  
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
  <!-- END HEAD -->
  <!-- BEGIN BODY -->
  <body class="error-body no-top lazy" data-original="assets/img/work.jpg" style="background-image: url('assets/img/work.jpg')">
    <div class="container">
      <div class="row login-container animated fadeInUp">
        <div class="col-md-7 col-md-offset-2 tiles white no-padding">
          <div class="p-t-30 p-l-40 p-b-20 xs-p-t-10 xs-p-l-10 xs-p-b-10">
            <h2 class="normal">
          <img src="assets\img\logo3.png" alt="Aniger">
        </h2>
            <p class="p-b-20">
              "Quanto mais trabalhamos, mais sorte temos!"
            </p>
            <div role="tablist">
              <!--<a href="#tab_login" class="btn btn-primary btn-cons disabled" role="tab" data-toggle="tab">Entrar</a> ou&nbsp;&nbsp; -->
              <!--<a href="#tab_register" class="btn btn-info btn-cons disabled" role="tab" data-toggle="tab">Criar uma conta</a> ou&nbsp;&nbsp; -->
              <a href="index.php" class="btn btn-primary btn-cons btn-lg btn-large" role="tab">Entrar</a>
              <br>&nbsp;
              <div>
              <div class="alert alert-success" style=" margin-right: 30px;">
                <i class="pull-left material-icons">feedback</i>
                  <h6 style="padding-left: 30px;">
                    Este é um espaço que está sendo desenvolvido pelo setor de TI, para reunir várias informações uteis para os colaboradores do grupo Aniger. 
                    <br>&nbsp;  
                    <p>Aguarde novidades =)</p>
                  </h6>
                  <div class="pull-right">
                <span class="label label-success"> <?= versao ?> </span>
              </div>    
              </div>
              
            </div>
          </div>
          <!--<div class="tiles grey p-t-20 p-b-20 no-margin text-black tab-content">
            <div role="tabpanel" class="tab-pane active" id="tab_login">
              <form class="animated fadeIn validate" id="" name="">
                <div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                  <div class="col-md-6 col-sm-6">
                    <input class="form-control" id="login_username" name="login_username" placeholder="Usuário" type="email" required>
                  </div>
                  <div class="col-md-6 col-sm-6">
                    <input class="form-control" id="login_pass" name="login_pass" placeholder="Senha" type="password" required>
                  </div>
                </div>
                <div class="row p-t-10 m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                  <div class="control-group col-md-10">
                    <div class="checkbox checkbox check-success">
                      <input id="checkbox1" type="checkbox" value="1">
                      <label for="checkbox1">Manter-se conectado</label>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div role="tabpanel" class="tab-pane" id="tab_register">
              <form class="animated fadeIn validate" id="" name="">
                <div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                  <div class="col-md-6 col-sm-6">
                    <input class="form-control" id="reg_username" name="reg_username" placeholder="Usuário" type="text" required>
                  </div>
                  <div class="col-md-6 col-sm-6">
                    <input class="form-control" id="reg_pass" name="reg_pass" placeholder="Senha" type="password" required>
                  </div>
                </div>
                <div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                  <div class="col-md-12">
                    <input class="form-control" id="reg_mail" name="reg_mail" placeholder="E-mail" type="email" required>
                  </div>
                </div>
                <div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                  <div class="col-md-6 col-sm-6">
                    <input class="form-control" id="reg_first_Name" name="reg_first_Name" placeholder="Nome" type="text" required>
                  </div>
                  <div class="col-md-6 col-sm-6">
                    <input class="form-control" id="reg_first_Name" name="reg_first_Name" placeholder="Sobrenome" type="text" required>
                  </div>
                </div>
                <div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
                  <div class="col-md-12">
                    <input class="form-control" id="reg_email" name="reg_email" placeholder="Email" type="email" required>
                  </div>
                </div>
              </form>
            </div>
          </div>  -->
        </div>
      </div>
    </div>
    <!-- END CONTAINER -->
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