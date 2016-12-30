<!DOCTYPE html>
<html>
  <head>
    <title>Aniger - Ramais</title>
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
              <a href="https://aniger.tomticket.com/helpdesk/login?" class="dropdown-toggle">
                <i class="material-icons">desktop_mac</i><!-- <span class="badge bubble-only"></span> -->
              </a>
            </li>
            <li class="dropdown visible-xs visible-sm">
              <a href="#" data-webarch="toggle-right-side">
                <i class="material-icons">chat</i>
              </a>
            </li>
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
                <a href="#" class="" title="Recurso ainda não implementado.">
                  <i class="material-icons">apps</i>
                </a>
              </li>
              <li class="quicklinks"> <span class="h-seperate"></span></li>
              <li class="quicklinks">
                <a href="#" class="" id="my-task-list" data-placement="bottom" data-content='' data-toggle="dropdown" data-original-title="Novidades">
                  <i class="material-icons">notifications_none</i>
                  <span class="badge badge-important bubble-on  ly"></span>
                </a>
              </li>
              <li class="m-r-10 input-prepend inside search-form no-boarder">
                <span class="add-on"> <i class="material-icons">search</i></span>
                <input name="" type="text" class="no-boarder " placeholder="Buscar" style="width:250px;">
              </li>
            </ul>
          </div>
          <div id="notification-list" style="display:none">
            <div style="width:300px">
            <a href="changelog.php">
              <div class="notification-messages info">
                <div class="user-profile">
                  <img src="assets/img/profiles/d.jpg" alt="" data-src="assets/img/profiles/Aa.jpg" data-src-retina="assets/img/profiles/d2x.jpg" width="35" height="35">
                </div>
                <div class="message-wrapper">
                  <div class="heading">
                    Lançamento - v1.0
                  </div>
                  <div class="description">
                    Visualizar as novidades.
                  </div>
                  <div class="date pull-right">
                    Segunda-feira, 5 Dez 2016
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
                  <li class="disabled">
                    <a href="#" title="Recurso ainda não implementado."> Meu perfil</a>
                  </li>
                  <!-- <li class="disabled">
                    <a href="calender.php" title="Recurso ainda não implementado.">Calendário</a>
                  </li> -->
                  <!-- <li>
                    <a href="email.php"> My Inbox&nbsp;&nbsp;
                      <span class="badge badge-important animated bounceIn">2</span>
                    </a>
                  </li> -->
                  <li class="divider"></li>
                  <li>
                    <a href="login.php"><i class="material-icons">power_settings_new</i>&nbsp;&nbsp;Sair</a>
                  </li>
                </ul>
              </li>
              <li class="quicklinks"> <span class="h-seperate"></span></li>
              <li class="quicklinks">
                <!-- <a href="#" class="chat-menu-toggle" data-webarch="toggle-right-side"><i class="material-icons">chat</i><span class="badge badge-important hide">1</span> -->
                <a href="#" class="chat-menu-toggle"><i class="material-icons" title="Recurso ainda não implementado.">chat</i><span class="badge badge-important hide">1</span>
                </a>
                <div class="simple-chat-popup chat-menu-toggle hide">
                  <!--<div class="simple-chat-popup-arrow"></div>
                  <div class="simple-chat-popup-inner">
                     <div style="width:100px">
                      <div class="semi-bold">David Nester</div>
                      <div class="message">Hey you there </div>
                    </div> -->
                  </div>
                </div>
              </li>
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
              <img src="assets/img/profiles/Aa.jpg" alt="" data-src="assets/img/profiles/Aa.jpg" data-src-retina="assets/img/profiles/Aa.jpg" width="69" height="69" />
              <div class="availability-bubble online"></div>
            </div>
            <div class="user-info sm">
              <div class="username"><span class="semi-bold">Aniger</span></div>
              <div class="status">Seja bem-vindo.</div>
            </div>
          </div>
          <!-- END MINI-PROFILE -->
          <!-- BEGIN SIDEBAR MENU -->
          <p class="menu-title sm">NAVEGAR <span class="pull-right"><a href="javascript:;"><i class="material-icons">refresh</i></a></span></p>
          <ul>
            <li class=""> 
              <a href="index.php"><i class="material-icons" title="Home">home</i> <span class="title">Home</span> <span class="title"></span> </a>
            </li>
            <li class=""> 
              <a href="https://aniger.tomticket.com/helpdesk/login?"><i class="material-icons" title="Chamados">desktop_mac</i> <span class="title">Chamados</span></a>
            </li>
            <li class="start active"> 
              <a href="ramais.php"><i class="material-icons" title="Ramais">phone_forwarded</i> <span class="title">Ramais</span></a>
            </li>
            <li class=""> 
              <a href="cadastros.php"><i class="material-icons" title="Cadastros">library_add</i> <span class="title">Cadastros</span></a>
            </li>
            <li class=""> 
              <a href="solicitacoes.php"><i class="material-icons" title="Solicitações">assignment</i> <span class="title">Solicitações</span></a>
            </li>
            <!--<li class="">
              <a href="#"> <i class="material-icons">email</i> <span class="title">Link</span> <span class=" badge badge-disable pull-right ">203</span>
              </a>
            </li>
            <li class="">
              <a href="javascript:;"> <i class="material-icons">more_horiz</i> <span class="title">Link</span> <span class=" arrow"></span> </a>
              <ul class="sub-menu">
                <li> <a href="javascript:;"> Level 1 </a> </li>
                <li>
                  <a href="javascript:;"> <span class="title">Level 2</span> <span class=" arrow"></span> </a>
                  <ul class="sub-menu">
                    <li> <a href="javascript:;"> Sub Menu </a> </li>
                    <li> <a href="ujavascript:;"> Sub Menu </a> </li>
                  </ul>
                </li>
              </ul>
            </li>-->
            <li class="hidden-lg hidden-md hidden-xs" id="more-widgets">
              <a href="javascript:;"> <i class="material-icons"></i></a>
              <ul class="sub-menu">
                <li class="side-bar-widgets">
                  <p class="menu-title sm">FOLDER <span class="pull-right"><a href="#" class="create-folder"><i class="material-icons">add</i></a></span></p>
                  <ul class="folders">
                    <li>
                      <a href="#">
                        <div class="status-icon green"></div>
                        My quick tasks </a>
                    </li>
                  </ul>
                  <p class="menu-title">PROJECTS </p>
                  <div class="status-widget">
                    <div class="status-widget-wrapper">
                      <div class="title">Freelancer<a href="#" class="remove-widget"><i class="material-icons">close</i></a></div>
                      <p>Redesign home page</p>
                    </div>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
          <!--<div class="side-bar-widgets">
            <p class="menu-title sm">FOLDER <span class="pull-right"><a href="#" class="create-folder"> <i class="material-icons">add</i></a></span></p>
            <ul class="folders">
              <li>
                <a href="#">
                  <div class="status-icon green"></div>
                  My quick tasks </a>
              </li>
            </ul>
            <p class="menu-title">PROJECTS </p>
            <div class="status-widget">
              <div class="status-widget-wrapper">
                <div class="title">Freelancer<a href="#" class="remove-widget"><i class="material-icons">close</i></a></div>
                <p>Redesign home page</p>
              </div>
            </div>
          </div>-->
          <div class="clearfix"></div>
          <!-- END SIDEBAR MENU -->
        </div>
      </div>
      <a href="#" class="scrollup">Scroll</a>
      <div class="footer-widget">
        <div class="pull-left">
          <i class="material-icons">alarm</i>
          <iframe src="http://free.timeanddate.com/clock/i5hp9yxv/n595/tlbr5/fn14/fc666/tc22262e/pa0/th1" frameborder="0" width="58" height="14"></iframe>
        </div>
        <div class="pull-right">
          <!-- IMPLEMENTAR LOCKSCREEN -->
          <a href="login.php"><i class="material-icons">power_settings_new</i></a>
        </div>
      </div>
      <!-- END SIDEBAR -->
      <!-- BEGIN PAGE CONTAINER-->
      <div class="page-content">
        <div class="content">
        <ul class="breadcrumb">
            <li>
              <p>VOCÊ ESTÁ EM </p>
            </li>
            <li>
            <a href="index.php">Home</a>
            </li>
            <li><a href="#" class="active">Ramais</a> </li>
          </ul>
          <!-- BEGIN PAGE TITLE -->
          <div class="page-title"> <i class="material-icons">phone_forwarded</i>
            <h3>Lista de ramais </h3>
          </div>
          <!-- END PAGE TITLE -->
          <!-- BEGIN PlACE PAGE CONTENT HERE -->

          <div class="col-md-4 col-sm-6 m-b-10">
            <div class="span12">
              <div class="grid simple ">
                <div class="grid-title">
                  <h4><span class="bold">Direção &nbsp;</span><span class="label label-adm">ADM</span></h4>
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="#grid-config" data-toggle="modal" class="config"></a>
                    <a href="javascript:;" class="reload"></a>
                  </div>
                </div>
                <div class="grid-body ">
                  <table class="table table-hover table-bordered" id="ADM">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Ramal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="even gradeX">
                        <td>Sergio Ermel<i class="material-icons pull-right" style="font-size: 18px;">stars</i></td>
                        <td class="center">183</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Alan Sergio Ermel<i class="material-icons pull-right" style="font-size: 18px;">stars</i></td>
                        <td class="center">138</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Ariane Regina Ermel<i class="material-icons pull-right" style="font-size: 18px;">stars</i></td>
                        <td class="center">170</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Laci Ritzel<i class="material-icons pull-right" style="font-size: 18px;">stars</i></td>
                        <td class="center">104</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 m-b-10">
            <div class="span12">
              <div class="grid simple ">
                <div class="grid-title">
                  <h4><span class="bold">Rec. Humanos &nbsp;</span><span class="label label-rh">RH</span></h4>
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="#grid-config" data-toggle="modal" class="config"></a>
                    <a href="javascript:;" class="reload"></a>
                  </div>
                </div>
                <div class="grid-body ">
                  <table class="table table-hover table-bordered" id="RH">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Ramal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="even gradeX">
                        <td>Nara Less<i class="material-icons pull-right" style="font-size: 18px;">stars</i></td>
                        <td class="center">123</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Bruna Atz</td>
                        <td class="center">153</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Jessica Nunes</td>
                        <td class="center">135</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Marcia Correa</td>
                        <td class="center">153</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Debora Severo</td>
                        <td class="center">135</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 m-b-10">
            <div class="span12">
              <div class="grid simple ">
                <div class="grid-title">
                  <h4><span class="bold">Informática &nbsp;</span><span class="label label-ti">TI</span></h4>
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="#grid-config" data-toggle="modal" class="config"></a>
                    <a href="javascript:;" class="reload"></a>
                  </div>
                </div>
                <div class="grid-body ">
                  <table class="table table-hover table-bordered" id="TI">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Ramal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="even gradeX">
                        <td>Fernando Horbach<i class="material-icons pull-right" style="font-size: 18px;">stars</i></td>
                        <td class="center">338</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Gabriel Hipolito</td>
                        <td class="center">171</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Fábio Geiger</td>
                        <td class="center">191</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Ronaldo Ribeiro</td>
                        <td class="center">339</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>João Gustavo</td>
                        <td class="center">139</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 m-b-10">
            <div class="span12">
              <div class="grid simple ">
                <div class="grid-title">
                  <h4><span class="bold">Contabilidade &nbsp;</span><span class="label label-ctb">CTB</span></h4>
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="#grid-config" data-toggle="modal" class="config"></a>
                    <a href="javascript:;" class="reload"></a>
                  </div>
                </div>
                <div class="grid-body ">
                  <table class="table table-hover table-bordered" id="CTB">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Ramal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="even gradeX">
                        <td>Luis Roberto da Silva<i class="material-icons pull-right" style="font-size: 18px;">stars</i></td>
                        <td class="center">310</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Marcos Miranda</td>
                        <td class="center">190</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Jonas Amaral</td>
                        <td class="center">156</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Alan Schneider</td>
                        <td class="center">341</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Anna Weber</td>
                        <td class="center">336</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Daniel Voltz</td>
                        <td class="center">105</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Douglas Duarte</td>
                        <td class="center">336</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Fernanda Cavitchoni</td>
                        <td class="center">113</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Iraci Kraemer</td>
                        <td class="center">105</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Natacha Vetter</td>
                        <td class="center">105</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Sidneia Padilha</td>
                        <td class="center">113</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Juliane Mattes</td>
                        <td class="center">341</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 m-b-10">
            <div class="span12">
              <div class="grid simple ">
                <div class="grid-title">
                  <h4><span class="bold">Marketing &nbsp;</span><span class="label label-mkt">MKT</span></h4>
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="#grid-config" data-toggle="modal" class="config"></a>
                    <a href="javascript:;" class="reload"></a>
                  </div>
                </div>
                <div class="grid-body ">
                  <table class="table table-hover table-bordered" id="TI">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Ramal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="even gradeX">
                        <td>Mirele Rittel<i class="material-icons pull-right" style="font-size: 18px;">stars</i></td>
                        <td class="center">173</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Ana Sost</td>
                        <td class="center">173</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Fernanda Fabian</td>
                        <td class="center">173</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Camila Slengmann</td>
                        <td class="center">175</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Tuane Moraes</td>
                        <td class="center">175</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Arthur Lerina</td>
                        <td class="center">314</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Thalita Diniz</td>
                        <td class="center">314</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Emiline Apolinario</td>
                        <td class="center">177</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Emilly Terres</td>
                        <td class="center">177</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Jessica Blankenheim</td>
                        <td class="center">177</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Mayara Cruz</td>
                        <td class="center">177</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 m-b-10">
            <div class="span12">
              <div class="grid simple ">
                <div class="grid-title">
                  <h4><span class="bold">Financeiro &nbsp;</span><span class="label label-fin">FIN</span></h4>
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="#grid-config" data-toggle="modal" class="config"></a>
                    <a href="javascript:;" class="reload"></a>
                  </div>
                </div>
                <div class="grid-body ">
                  <table class="table table-hover table-bordered" id="FIN">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Ramal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="even gradeX">
                        <td>Carmen dos Santos<i class="material-icons pull-right" style="font-size: 18px;">stars</i></td>
                        <td class="center">124</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Fernanda Ferreira</td>
                        <td class="center">185</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Lisiane Alves</td>
                        <td class="center">102</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Sandra Beatto</td>
                        <td class="center">318</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Bruna Thomas</td>
                        <td class="center">303</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Estefani Duarte</td>
                        <td class="center">182</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Karina Silva</td>
                        <td class="center">136</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Andrea Less</td>
                        <td class="center">102</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Andreia Scholles</td>
                        <td class="center">130</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Cristiane Freitas</td>
                        <td class="center">119</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Juliano Neves</td>
                        <td class="center">130</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 m-b-10">
            <div class="span12">
              <div class="grid simple ">
                <div class="grid-title">
                  <h4><span class="bold">Recepção &nbsp;</span><span class="label label-ti">REC</span></h4>
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="#grid-config" data-toggle="modal" class="config"></a>
                    <a href="javascript:;" class="reload"></a>
                  </div>
                </div>
                <div class="grid-body ">
                  <table class="table table-hover table-bordered" id="TI">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Ramal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="even gradeX">
                        <td>Elisangela Silva</td>
                        <td class="center">100</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Juliana Dias</td>
                        <td class="center">166</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 m-b-10">
            <div class="span12">
              <div class="grid simple ">
                <div class="grid-title">
                  <h4><span class="bold">Manutenção &nbsp;</span><span class="label label-ti">MAN</span></h4>
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="#grid-config" data-toggle="modal" class="config"></a>
                    <a href="javascript:;" class="reload"></a>
                  </div>
                </div>
                <div class="grid-body ">
                  <table class="table table-hover table-bordered" id="MAN">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Ramal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="even gradeX">
                        <td>Robinson Souza</td>
                        <td class="center">172</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Juliano Carvalho</td>
                        <td class="center">172</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 m-b-10">
            <div class="span12">
              <div class="grid simple ">
                <div class="grid-title">
                  <h4><span class="bold">Transportes &nbsp;</span><span class="label label-ti">TRA</span></h4>
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="#grid-config" data-toggle="modal" class="config"></a>
                    <a href="javascript:;" class="reload"></a>
                  </div>
                </div>
                <div class="grid-body ">
                  <table class="table table-hover table-bordered" id="TI">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Ramal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="even gradeX">
                        <td>Alexandre Konrath</td>
                        <td class="center">186</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Michael Bortuluzzi</td>
                        <td class="center">186</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 m-b-10">
            <div class="span12">
              <div class="grid simple ">
                <div class="grid-title">
                  <h4><span class="bold">Comercial &nbsp;</span><span class="label label-com">COM</span></h4>
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="#grid-config" data-toggle="modal" class="config"></a>
                    <a href="javascript:;" class="reload"></a>
                  </div>
                </div>
                <div class="grid-body ">
                  <table class="table table-hover table-bordered" id="COM">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Ramal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="even gradeX">
                        <td>Tatiane Cristofoli<i class="material-icons pull-right" style="font-size: 18px;">stars</i></td>
                        <td class="center">178</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Vanessa Silva</td>
                        <td class="center">317</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Susana Silva</td>
                        <td class="center">152</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Rosiane Ev</td>
                        <td class="center">193</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Tais Oliveira</td>
                        <td class="center">157</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Daniéli Costa</td>
                        <td class="center">331</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 m-b-10">
            <div class="span12">
              <div class="grid simple ">
                <div class="grid-title">
                  <h4><span class="bold">Notas &nbsp;</span><span class="label label-com">NFS</span></h4>
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="#grid-config" data-toggle="modal" class="config"></a>
                    <a href="javascript:;" class="reload"></a>
                  </div>
                </div>
                <div class="grid-body ">
                  <table class="table table-hover table-bordered" id="NFS">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Ramal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="even gradeX">
                        <td>Daiana Less<i class="material-icons pull-right" style="font-size: 18px;">stars</i></td>
                        <td class="center">128</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Teilor Oliveira</td>
                        <td class="center">131</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Roger Bauer</td>
                        <td class="center">131</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Greice Reis</td>
                        <td class="center">107</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Bruna Silva</td>
                        <td class="center">107</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Adenoel Saldanha</td>
                        <td class="center">131</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Amanda Scur</td>
                        <td class="center">313</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Alessane Gomes</td>
                        <td class="center">313</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Patricia Santos</td>
                        <td class="center">128</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 m-b-10">
            <div class="span12">
              <div class="grid simple ">
                <div class="grid-title">
                  <h4><span class="bold">Produção &nbsp;</span><span class="label label-success">PCP</span></h4>
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="#grid-config" data-toggle="modal" class="config"></a>
                    <a href="javascript:;" class="reload"></a>
                  </div>
                </div>
                <div class="grid-body ">
                  <table class="table table-hover table-bordered" id="PCP">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Ramal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="even gradeX">
                        <td>Paula Hirchman<i class="material-icons pull-right" style="font-size: 18px;">stars</i></td>
                        <td class="center">328</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Tiessa Hochscheidt</td>
                        <td class="center">301</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Alessandro Koeche</td>
                        <td class="center">301</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Daiane Saenger</td>
                        <td class="center">141</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Bruna Krieger</td>
                        <td class="center">335</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Daiane Freitas</td>
                        <td class="center">309</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Damiani Amorim</td>
                        <td class="center">141</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Adriana Moraes</td>
                        <td class="center">335</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Daniela Michel</td>
                        <td class="center">197</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Miriele Juchem</td>
                        <td class="center">309</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Tatiana Severo</td>
                        <td class="center">309</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Sabrina Heckler</td>
                        <td class="center">330</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Elisabethi Santos</td>
                        <td class="center">330</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Patricia Benetti</td>
                        <td class="center">197</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Daniel Jacobus</td>
                        <td class="center">154</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>         

          <div class="col-md-4 col-sm-6 m-b-10">
            <div class="span12">
              <div class="grid simple ">
                <div class="grid-title">
                  <h4><span class="bold">Exportação &nbsp;</span><span class="label label-com">EXP</span></h4>
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="#grid-config" data-toggle="modal" class="config"></a>
                    <a href="javascript:;" class="reload"></a>
                  </div>
                </div>
                <div class="grid-body ">
                  <table class="table table-hover table-bordered" id="EXP">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Ramal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="even gradeX">
                        <td>Alexandra Hans<i class="material-icons pull-right" style="font-size: 18px;">stars</i></td>
                        <td class="center">180</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Jéssica Santos</td>
                        <td class="center">316</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Jéssica Bender</td>
                        <td class="center">180</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 m-b-10">
            <div class="span12">
              <div class="grid simple ">
                <div class="grid-title">
                  <h4><span class="bold">E-commerce &nbsp;</span><span class="label label-com">ECOM</span></h4>
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="#grid-config" data-toggle="modal" class="config"></a>
                    <a href="javascript:;" class="reload"></a>
                  </div>
                </div>
                <div class="grid-body ">
                  <table class="table table-hover table-bordered" id="ECOM">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Ramal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="even gradeX">
                        <td>Aline Johann</td>
                        <td class="center">149</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Carlos Junior</td>
                        <td class="center">(51) 3598-1955</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 m-b-10">
            <div class="span12">
              <div class="grid simple ">
                <div class="grid-title">
                  <h4><span class="bold">Comércio Ext. &nbsp;</span><span class="label label-mkt">CMX</span></h4>
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="#grid-config" data-toggle="modal" class="config"></a>
                    <a href="javascript:;" class="reload"></a>
                  </div>
                </div>
                <div class="grid-body ">
                  <table class="table table-hover table-bordered" id="CMX">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Ramal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="even gradeX">
                        <td>Marcia Silva<i class="material-icons pull-right" style="font-size: 18px;">stars</i></td>
                        <td class="center">308</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Elemar Breier</td>
                        <td class="center">127</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Patricia Sebolt</td>
                        <td class="center">127</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 m-b-10">
            <div class="span12">
              <div class="grid simple ">
                <div class="grid-title">
                  <h4><span class="bold">Compras &nbsp;</span><span class="label label-cmp">CMP</span></h4>
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="#grid-config" data-toggle="modal" class="config"></a>
                    <a href="javascript:;" class="reload"></a>
                  </div>
                </div>
                <div class="grid-body ">
                  <table class="table table-hover table-bordered" id="CMP">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Ramal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="even gradeX">
                        <td>Vinicius Paulo<i class="material-icons pull-right" style="font-size: 18px;">stars</i></td>
                        <td class="center">338</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Daiane Bender</td>
                        <td class="center">343</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Maria Dolores</td>
                        <td class="center">306</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Elen Souza</td>
                        <td class="center">349</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Maicon Silva</td>
                        <td class="center">306</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Eduardo Thome</td>
                        <td class="center">167</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Marcelo Michel</td>
                        <td class="center">349</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Gabriela Almeida</td>
                        <td class="center">167</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Sauane Padilha</td>
                        <td class="center">144</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Ana Medeiros</td>
                        <td class="center">342</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Rael Michaelsen</td>
                        <td class="center">146</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Ellen Colling</td>
                        <td class="center">309</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Fabricio Kampgen</td>
                        <td class="center">112</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Vani Masera</td>
                        <td class="center">332</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Rita Mello</td>
                        <td class="center">115</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Márcio Maciel</td>
                        <td class="center">115</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Junior Torres</td>
                        <td class="center">196</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Elisandro Garcia</td>
                        <td class="center">350</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Marlon Pereira</td>
                        <td class="center">192</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Marco Lima</td>
                        <td class="center">196</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Marcelo Pavão</td>
                        <td class="center">196</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Marcia Silveira</td>
                        <td class="center">111</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Angelica Martins</td>
                        <td class="center">325</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Lisangela Hermes</td>
                        <td class="center">333</td>
                      </tr>
                      <tr class="even gradeX">
                        <td>Joseane Oliveira</td>
                        <td class="center">333</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-sm-6 m-b-10">
            <div class="span12">
              <div class="grid simple ">
                <div class="grid-title">
                  <h4><span class="bold">Auditoria &nbsp;</span><span class="label label-aud">AUD</span></h4>
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="#grid-config" data-toggle="modal" class="config"></a>
                    <a href="javascript:;" class="reload"></a>
                  </div>
                </div>
                <div class="grid-body ">
                  <table class="table table-hover table-bordered" id="AUD">
                    <thead>
                      <tr>
                        <th>Nome</th>
                        <th>Ramal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="even gradeX">
                        <td>Jonas Riedel<i class="material-icons pull-right" style="font-size: 18px;">stars</i></td>
                        <td class="center">352</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

          
          <!-- END PLACE PAGE CONTENT HERE -->
        </div>
      </div>
      <!-- END PAGE CONTAINER -->
      <!-- BEGIN CHAT -->
      <div class="chat-window-wrapper">
        <div id="main-chat-wrapper" class="inner-content">
          <div class="chat-window-wrapper scroller scrollbar-dynamic" id="chat-users">
            <!-- BEGIN CHAT HEADER -->
            <div class="chat-header">
              <!-- BEGIN CHAT SEARCH BAR -->
              <div class="pull-left">
                <input type="text" placeholder="search">
              </div>
              <!-- END CHAT SEARCH BAR -->
              <!-- BEGIN CHAT QUICKLINKS -->
              <div class="pull-right">
                <a href="#" class="">
                  <div class="iconset top-settings-dark"></div>
                </a>
              </div>
              <!-- END CHAT QUICKLINKS -->
            </div>
            <!-- END CHAT HEADER -->
            <!-- BEGIN GROUP WIDGET -->
            <div class="side-widget">
              <div class="side-widget-title">group chats</div>
              <div class="side-widget-content">
                <div id="groups-list">
                  <ul class="groups">
                    <li>
                      <a href="#">
                        <div class="status-icon green"></div>Group Chat 1</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- END GROUP WIDGET -->
            <!-- BEGIN FAVORITES WIDGET -->
            <div class="side-widget">
              <div class="side-widget-title">favorites</div>
              <div class="side-widget-content">
                <!-- BEGIN SAMPLE CHAT -->
                <div class="user-details-wrapper active" data-chat-status="online" data-chat-user-pic="assets/img/profiles/d.jpg" data-chat-user-pic-retina="assets/img/profiles/d2x.jpg" data-user-name="Jane Smith">
                  <!-- BEGIN PROFILE PIC -->
                  <div class="user-profile">
                    <img src="assets/img/profiles/d.jpg" alt="" data-src="assets/img/profiles/d.jpg" data-src-retina="assets/img/profiles/d2x.jpg" width="35" height="35">
                  </div>
                  <!-- END PROFILE PIC -->
                  <!-- BEGIN MESSAGE -->
                  <div class="user-details">
                    <div class="user-name">Jane Smith</div>
                    <div class="user-more">Message...</div>
                  </div>
                  <!-- END MESSAGE -->
                  <!-- BEGIN MESSAGES BADGE -->
                  <div class="user-details-status-wrapper">
                    <span class="badge badge-important">3</span>
                  </div>
                  <!-- END MESSAGES BADGE -->
                  <!-- BEGIN STATUS -->
                  <div class="user-details-count-wrapper">
                    <div class="status-icon green"></div>
                  </div>
                  <!-- END STATUS -->
                  <div class="clearfix"></div>
                </div>
                <!-- END SAMPLE CHAT -->
              </div>
            </div>
            <!-- END FAVORITES WIDGET -->
            <!-- BEGIN MORE FRIENDS WIDGET -->
            <div class="side-widget">
              <div class="side-widget-title">more friends</div>
              <div class="side-widget-content" id="friends-list">
                <!-- BEGIN SAMPLE CHAT -->
                <div class="user-details-wrapper" data-chat-status="online" data-chat-user-pic="assets/img/profiles/d.jpg" data-chat-user-pic-retina="assets/img/profiles/d2x.jpg" data-user-name="Jane Smith">
                  <!-- BEGIN PROFILE PIC -->
                  <div class="user-profile">
                    <img src="assets/img/profiles/d.jpg" alt="" data-src="assets/img/profiles/d.jpg" data-src-retina="assets/img/profiles/d2x.jpg" width="35" height="35">
                  </div>
                  <!-- END PROFILE PIC -->
                  <!-- BEGIN MESSAGE -->
                  <div class="user-details">
                    <div class="user-name">Jane Smith</div>
                    <div class="user-more">Message...</div>
                  </div>
                  <!-- END MESSAGE -->
                  <!-- BEGIN MESSAGES BADGE -->
                  <div class="user-details-status-wrapper">
                    <span class="badge badge-important">3</span>
                  </div>
                  <!-- END MESSAGES BADGE -->
                  <!-- BEGIN STATUS -->
                  <div class="user-details-count-wrapper">
                    <div class="status-icon green"></div>
                  </div>
                  <!-- END STATUS -->
                  <div class="clearfix"></div>
                </div>
                <!-- END SAMPLE CHAT -->
              </div>
            </div>
            <!-- END MORE FRIENDS WIDGET -->
          </div>
          <!-- BEGIN DUMMY CHAT CONVERSATION -->
          <div class="chat-window-wrapper" id="messages-wrapper" style="display:none">
            <!-- BEGIN CHAT HEADER BAR -->
            <div class="chat-header">
              <!-- BEGIN SEARCH BAR -->
              <div class="pull-left">
                <input type="text" placeholder="search">
              </div>
              <!-- END SEARCH BAR -->
              <!-- BEGIN CLOSE TOGGLE -->
              <div class="pull-right">
                <a href="#" class="">
                  <div class="iconset top-settings-dark"></div>
                </a>
              </div>
              <!-- END CLOSE TOGGLE -->
            </div>
            <div class="clearfix"></div>
            <!-- END CHAT HEADER BAR -->
            <!-- BEGIN CHAT BODY -->
            <div class="chat-messages-header">
              <div class="status online"></div>
              <span class="semi-bold">Jane Smith(Typing..)</span>
              <a href="#" class="chat-back"><i class="icon-custom-cross"></i></a>
            </div>
            <!-- BEGIN CHAT MESSAGES CONTAINER -->
            <div class="chat-messages scrollbar-dynamic clearfix">
              <!-- BEGIN TIME STAMP EXAMPLE -->
              <div class="sent_time">Yesterday 11:25pm</div>
              <!-- END TIME STAMP EXAMPLE -->
              <!-- BEGIN EXAMPLE CHAT MESSAGE -->
              <div class="user-details-wrapper">
                <!-- BEGIN MESSENGER PROFILE -->
                <div class="user-profile">
                  <img src="assets/img/profiles/d.jpg" alt="" data-src="assets/img/profiles/d.jpg" data-src-retina="assets/img/profiles/d2x.jpg" width="35" height="35">
                </div>
                <!-- END MESSENGER PROFILE -->
                <!-- BEGIN MESSENGER MESSAGE -->
                <div class="user-details">
                  <div class="bubble">Hello, You there?</div>
                </div>
                <!-- END MESSENGER MESSAGE -->
                <div class="clearfix"></div>
                <!-- BEGIN TIMESTAMP ON CLICK TOGGLE -->
                <div class="sent_time off">Yesterday 11:25pm</div>
                <!-- END TIMESTAMP ON CLICK TOGGLE -->
              </div>
              <!-- END EXAMPLE CHAT MESSAGE -->
              <!-- BEGIN TIME STAMP EXAMPLE -->
              <div class="sent_time">Today 11:25pm</div>
              <!-- BEGIN TIME STAMP EXAMPLE -->
              <!-- BEGIN EXAMPLE CHAT MESSAGE (FROM SELF) -->
              <div class="user-details-wrapper pull-right">
                <!-- BEGIN MESSENGER MESSAGE -->
                <div class="user-details">
                  <div class="bubble sender">Let me know when you free</div>
                </div>
                <!-- END MESSENGER MESSAGE -->
                <div class="clearfix"></div>
                <!-- BEGIN TIMESTAMP ON CLICK TOGGLE -->
                <div class="sent_time off">Sent On Tue, 2:45pm</div>
                <!-- END TIMESTAMP ON CLICK TOGGLE -->
              </div>
              <!-- END EXAMPLE CHAT MESSAGE (FROM SELF) -->
            </div>
            <!-- END CHAT MESSAGES CONTAINER -->
          </div>
          <div class="chat-input-wrapper" style="display:none">
            <textarea id="chat-message-input" rows="1" placeholder="Type your message"></textarea>
          </div>
          <div class="clearfix"></div>
          <!-- END DUMMY CHAT CONVERSATION -->
        </div>
      </div>
      <!-- END CHAT -->
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