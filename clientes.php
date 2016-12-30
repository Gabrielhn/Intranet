<!DOCTYPE html>
<html>
  <head>
    <title>Aniger - Clientes</title>
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
            <li class=""> 
              <a href="ramais.php"><i class="material-icons" title="Ramais">phone_forwarded</i> <span class="title">Ramais</span></a>
            </li>
            <li class="start active"> 
              <a href="cadastros.php"><i class="material-icons" title="Cadastros">library_add</i> <span class="title">Cadastros</span></a>
            </li>
            <li class=""> 
              <a href="solicitacoes.php"><i class="material-icons" title="Solicitações">assignment</i> <span class="title">Solicitações</span></a>
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
          <iframe src="http://free.timeanddate.com/clock/i5hp9yxv/n595/tlbr5/fn17/fc555/tc22262e/pa0/th1" frameborder="0" width="66" height="14"></iframe>
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
            <li><a href="index.php">Home</a></li>
            <li><a href="cadastros.php">Cadastros</a></li>
            <li><a href="#.php" class="active">Clientes</a></li>
          </ul>
          <!-- BEGIN PAGE TITLE -->
          <div class="page-title"> <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i>
            <h3>Clientes </h3>
          </div>
          <!-- END PAGE TITLE -->
          <!-- CONTEÚDO -->
          
          <div class="row">
            <div class="col-md-10">
              <div class="grid simple">
                <div class="grid-title no-border">
                  <img src="assets\img\logo3.png">
                  <p></p>
                  <div class="form-group col-md-12 col-sm-12 col-xs-12">
                    <span class="help">Preencha abaixo as informações solicitadas para cadastro de novos clientes.
                    <p>Após enviar os dados, aguarde retorno por e-mail com o código do cliente.</p>
                    </span>
                  </div>
                  <div class="tools">
                    <!-- Controles -->
                  </div>
                </div>
                <div class="grid-body no-border">
                  <br>

                  <!-- PMODAL -->
                  <div class="modal fade" id="pModal" tabindex="-1" role="dialog" aria-labelledby="pModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                          <br>
                          <i class="fa fa-check fa-6x"></i>
                          <h4 id="pModalLabel" class="semi-bold">Sucesso.</h4>
                        </div>
                        <div class="modal-body">
                          <div class="alert alert-info">
                            <i class="pull-left material-icons">feedback</i>
                            <h6 style="padding-left: 30px;">
                              <?php
                              // $nome="Gabriel";
                              
                              // $nome=$_POST['nome'];
                            
                              // echo $nome;
                              ?>



                            <br>&nbsp;  
                            </h6>    
                          </div>             
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <form method="POST" name="clientes" action="assets\php\cliente_mail.php" target="place"> 
                      <div class="col-md-12 col-sm-12 col-xs-12">

                        <div class="form-group col-md-12 col-sm-12 col-xs-12"></div>

                        <div class="form-group col-md-12 col-sm-12 col-xs-12"></div>

                        <div class="form-group col-md-6 col-sm-6 col-xs-6">
                          <div class="controls">
                            <input type="text" placeholder="Razão social" class="form-control input" name="nome" required>
                          </div>
                        </div>

                        <div class="form-group col-md-6 col-sm-6 col-xs-6">
                          <div class="controls">
                            <input type="text" placeholder="Nome fantasia" class="form-control input" name="fantasia">
                          </div>
                        </div>

                        <div class="form-group col-md-9 col-sm-9 col-xs-9">
                          <div class="controls">
                            <input type="text" placeholder="Endereço" class="form-control input" name="endereco" required>
                          </div>
                        </div>

                        <div class="form-group col-md-3 col-sm-3 col-xs-3" >
                          <div class="controls">
                            <input type="text" placeholder="Nº/Comp." class="form-control input" maxlength="7" name="nro" required>
                          </div>
                        </div>
                        
                        <div class="form-group col-md-8 col-sm-8 col-xs-8">
                          <div class="controls">
                            <input type="text" placeholder="Bairro" class="form-control input" name="bairro" required>
                          </div>
                        </div>

                        <!-- MASCARA -->

                        <div class="form-group col-md-4 col-sm-4 col-xs-4">
                          <div class="controls">
                            <input type="text" placeholder="CEP" class="form-control input" maxlength="11" name="cep" required>
                          </div>
                        </div>

                        <div class="form-group col-md-8 col-sm-8 col-xs-8">
                          <div class="controls">
                            <input type="text" placeholder="Cidade" class="form-control input" name="cidade" required>
                          </div>
                        </div>

                        <div class="form-group col-md-4 col-sm-4 col-xs-4">
                          <div class="controls">
                            <select id="source"  class="form-control input" name="estado" required>
                              <optgroup label="Região Sul">
                                <option value="RS">RS - Rio Grande do Sul</option>
                                <option value="SC">SC - Santa Catarina</option>
                                <option value="PR">PR - Paraná</option>
                              </optgroup>
                              <optgroup label="Região Sudeste">
                                <option value="RS">SP - São Paulo</option>
                                <option value="SC">RJ - Rio de Janeiro</option>
                                <option value="PR">MG - Minas Gerais</option>
                                <option value="PR">ES - Espírito Santo</option>
                              </optgroup>
                              <optgroup label="Região Centro-Oeste">
                                <option value="RS">MS - Mato Grosso do Sul</option>
                                <option value="SC">GO - Goiás</option>
                                <option value="PR">MT - Mato Grosso</option>
                                <option value="PR">DF - Distrito Federal</option>
                              </optgroup>
                              <optgroup label="Região Nordeste">
                                <option value="BA">BA - Bahia</option>
                                <option value="SE">SE - Sergipe</option>
                                <option value="AL">AL - Alagoas</option>
                                <option value="PE">PE - Pernambuco</option>
                                <option value="PI">PI - Piauí</option>
                                <option value="PB">PB - Paraíba</option>
                                <option value="MA">MA - Maranhão</option>
                                <option value="CE">CE - Ceará</option>
                                <option value="RN">RN - Rio Grande do Norte</option>
                              </optgroup>
                              <optgroup label="Região Norte">
                                <option value="TO">TO - Tocantins</option>
                                <option value="RO">RO - Rondônia</option>
                                <option value="AC">AC - Acre</option>
                                <option value="AM">AM - Amazonas</option>
                                <option value="PA">PA - Pará</option>
                                <option value="RR">RR - Roraima</option>
                                <option value="AP">AP - Amapá</option>
                              </optgroup>
                            </select>
                          </div>
                        </div>

                        <div class="form-group col-md-6 col-sm-6 col-xs-6">
                          <div class="controls">
                            <input type="text" placeholder="CPF" class="form-control input" maxlength="15" name="cpf" required>
                          </div>
                        </div>

                        <div class="form-group col-md-6 col-sm-6 col-xs-6">
                          <div class="controls">
                            <input type="text" placeholder="Inscrição Estadual (IE)" class="form-control input" name="ie" maxlength="20">
                          </div>
                        </div>

                        <div class="form-group col-md-4 col-sm-4 col-xs-4">
                          <div class="controls">
                            <input type="text" placeholder="Contato" class="form-control input" name="contato" required>
                          </div>
                        </div>

                        <div class="form-group col-md-4 col-sm-4 col-xs-4">
                          <div class="controls">
                            <input type="text" placeholder="Fone" class="form-control input" name="fone" maxlenght="21" required>
                          </div>
                        </div>

                        <div class="form-group col-md-4 col-sm-4 col-xs-4">
                          <div class="controls">
                            <input type="email" placeholder="Email" class="form-control input" name="email" required>
                          </div>
                        </div>

                        <div class="form-group col-md-8 col-sm-8 col-xs-8">
                          <div class="controls">
                            <input type="email" placeholder="Email (NF-e)" class="form-control input" name="emailN" required>
                          </div>
                        </div>

                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                          <div class="controls">
                            <textarea id="Obs" placeholder="Observações" class="form-control input" rows="5" name="obs"></textarea>
                          </div>
                        </div>

                        <div class="form-group col-md-12 col-sm-12 col-xs-12"></div>

                        <div class="form-group col-md-12 col-sm-12 col-xs-12"></div>

                        <div class="form-group col-md-8 col-sm-8 col-xs-8">
                          <div class="controls">
                            <input type="text" placeholder="Autorizado por" class="form-control input" name="autorizado" required>
                          </div>
                        </div>

                        <div class="form-group col-md-3 col-sm-3 col-xs-3">
                          <div class="controls">
                            <div class="input-append" data-date-format="dd-mm-yyyy">
                             <input type="date" class="form-control input" maxlength="10" name="dtAutorizado" required>
                              <span class="add-on"><span class="arrow"></span><i class="fa fa-calendar"></i></span>
                            </div>
                          </div>
                        </div>

                        <div class="form-group col-md-12 col-sm-12 col-xs-12"></div>

                        <iframe name="place" style="display:none;"></iframe>
 
                        <div class="form-actions">
                          <div class="pull-right">

                            <!--data-toggle="modal" data-target="#pModal"-->
                            <button type="submit" class="btn btn-info btn-cons-md" value="submit">Enviar</button>
                            <button type="reset" class="btn btn-white btn-cons-md" value="reset">Limpar</button>
                          </div>
                          <div class="form-group col-md-12 col-sm-12 col-xs-12"></div>
                        </div>



                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

          
          <!-- FIM CONTEÚDO -->
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