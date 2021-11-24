<?php
date_default_timezone_set('America/Costa_Rica');

if (!isset($_SESSION)) 
{    
  session_start(); 
  $_SESSION['UltimaAccion'] = time();
}

$ArrayRolVendedor= array(5);
$ArrayRolSorteos= array(1);
$ArrayRolUsuarios= array(1,2,3,4);
$ArrayRolVenta= array(1,2,3,4);
$ArrayExportador = array(6);
$ArrayContabilidad = array(7); 
$ArrayReclutador = array(9);
$ArrayAsegurador = array(10);
$ArrayRolDisSub= array(3, 4);
$ArraySaldos = array(4,5,6);
require_once 'sesion.php';  

?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Dashboard Times - Gana95</title>
    <link rel="apple-touch-icon" href="./app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="./app-assets/images/logo/GANALOGO.jpg">
    <!--  <link href="//db.onlinewebfonts.com/c/80cf1e7474c91b7937d9a55459e8bc40?family=AkagiProW00-BlackItalic" rel="stylesheet">-->
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="./app-assets/css/vendors.css">
    <link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/ui/prism.min.css">
    
    <link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/extensions/datedropper.min.css">
    <link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/extensions/timedropper.min.css">
    <link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/extensions/toastr.css">
    <link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/extensions/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/pickers/pickadate/pickadate.css">
    <!-- <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css">-->
    <link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/forms/selects/select2.min.css">
    <link rel="stylesheet" type="text/css" href="./app-assets/css/plugins/loaders/loaders.min.css">
    <link rel="stylesheet" type="text/css" href="./app-assets/fonts/simple-line-icons/style.min.css">
    <link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/forms/icheck/icheck.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="./app-assets/css/app.css">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="./app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
    <link rel="stylesheet" type="text/css" href="./app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="./app-assets/css/plugins/forms/checkboxes-radios.css">
    
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="./assets/css/image-picker.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/gana.css">
    <!-- END Custom CSS-->
  </head>
  <body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" onload="">

    <!-- fixed-top-->
    <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-dark navbar-shadow">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav flex-row position-relative">
            <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
            <li class="nav-item mr-auto"><a class="navbar-brand" href="principal"><img class="brand-logo" style="border-radius:50%" alt="modern admin logo" src="./app-assets/images/logo/GANALOGO.jpg">
                <h4 class="brand-text">DT - Gana95</h4></a></li>
            <li class="nav-item d-none d-md-block nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="toggle-icon ft-toggle-right font-medium-3 white" data-ticon="ft-toggle-right"></i></a></li>
            <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a></li>
          </ul>
        </div>
        <div class="navbar-container content">
          <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="nav navbar-nav mr-auto float-left">         
              <li class="nav-item nav-search">
                <div class="search-input">
                  <h1 class="text-bold-600" id="divHora"></h1>
    
                </div>
              </li>
            </ul>
            <ul class="nav navbar-nav float-right">
              <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"><span class="mr-1">Bienvenido,<span class="user-name text-bold-700"><?php echo $_SESSION['Usuario']?></span></span><span class="avatar avatar-online"><img src="./app-assets/images/gana/<?php echo $_SESSION['Icono']?>" alt="avatar"><i></i></span></a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item" href="perfil"><i class="ft-user"></i> Mi Perfil</a>
                  <div class="dropdown-divider"></div><a class="dropdown-item" href="logout.php"><i class="ft-power"></i> Salir</a>
                </div>
              </li>

              <!--<li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-bell"></i><span class="badge badge-pill badge-default badge-danger badge-default badge-up badge-glow">5</span></a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                  <li class="dropdown-menu-header">
                    <h6 class="dropdown-header m-0"><span class="grey darken-2">Notifications</span></h6><span class="notification-tag badge badge-default badge-danger float-right m-0">5 New</span>
                  </li>
                  <li class="scrollable-container media-list w-100"><a href="javascript:void(0)">
                      <div class="media">
                        <div class="media-left align-self-center"><i class="ft-plus-square icon-bg-circle bg-cyan"></i></div>
                        <div class="media-body">
                          <h6 class="media-heading">You have new order!</h6>
                          <p class="notification-text font-small-3 text-muted">Lorem ipsum dolor sit amet, consectetuer elit.</p><small>
                            <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">30 minutes ago</time></small>
                        </div>
                      </div></a><a href="javascript:void(0)">
                      <div class="media">
                        <div class="media-left align-self-center"><i class="ft-download-cloud icon-bg-circle bg-red bg-darken-1"></i></div>
                        <div class="media-body">
                          <h6 class="media-heading red darken-1">99% Server load</h6>
                          <p class="notification-text font-small-3 text-muted">Aliquam tincidunt mauris eu risus.</p><small>
                            <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Five hour ago</time></small>
                        </div>
                      </div></a><a href="javascript:void(0)">
                      <div class="media">
                        <div class="media-left align-self-center"><i class="ft-alert-triangle icon-bg-circle bg-yellow bg-darken-3"></i></div>
                        <div class="media-body">
                          <h6 class="media-heading yellow darken-3">Warning notifixation</h6>
                          <p class="notification-text font-small-3 text-muted">Vestibulum auctor dapibus neque.</p><small>
                            <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Today</time></small>
                        </div>
                      </div></a><a href="javascript:void(0)">
                      <div class="media">
                        <div class="media-left align-self-center"><i class="ft-check-circle icon-bg-circle bg-cyan"></i></div>
                        <div class="media-body">
                          <h6 class="media-heading">Complete the task</h6><small>
                            <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Last week</time></small>
                        </div>
                      </div></a><a href="javascript:void(0)">
                      <div class="media">
                        <div class="media-left align-self-center"><i class="ft-file icon-bg-circle bg-teal"></i></div>
                        <div class="media-body">
                          <h6 class="media-heading">Generate monthly report</h6><small>
                            <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Last month</time></small>
                        </div>
                      </div></a></li>
                  <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center" href="javascript:void(0)">Read all notifications</a></li>
                </ul>
              </li>
              <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-mail">             </i></a>
                <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                  <li class="dropdown-menu-header">
                    <h6 class="dropdown-header m-0"><span class="grey darken-2">Messages</span></h6><span class="notification-tag badge badge-default badge-warning float-right m-0">4 New</span>
                  </li>
                  <li class="scrollable-container media-list w-100"><a href="javascript:void(0)">
                      <div class="media">
                        <div class="media-left"><span class="avatar avatar-sm avatar-online rounded-circle"><img src="./app-assets/images/portrait/small/avatar-s-19.png" alt="avatar"><i></i></span></div>
                        <div class="media-body">
                          <h6 class="media-heading">Margaret Govan</h6>
                          <p class="notification-text font-small-3 text-muted">I like your portfolio, let's start.</p><small>
                            <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Today</time></small>
                        </div>
                      </div></a><a href="javascript:void(0)">
                      <div class="media">
                        <div class="media-left"><span class="avatar avatar-sm avatar-busy rounded-circle"><img src="./app-assets/images/portrait/small/avatar-s-2.png" alt="avatar"><i></i></span></div>
                        <div class="media-body">
                          <h6 class="media-heading">Bret Lezama</h6>
                          <p class="notification-text font-small-3 text-muted">I have seen your work, there is</p><small>
                            <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Tuesday</time></small>
                        </div>
                      </div></a><a href="javascript:void(0)">
                      <div class="media">
                        <div class="media-left"><span class="avatar avatar-sm avatar-online rounded-circle"><img src="./app-assets/images/portrait/small/avatar-s-3.png" alt="avatar"><i></i></span></div>
                        <div class="media-body">
                          <h6 class="media-heading">Carie Berra</h6>
                          <p class="notification-text font-small-3 text-muted">Can we have call in this week ?</p><small>
                            <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">Friday</time></small>
                        </div>
                      </div></a><a href="javascript:void(0)">
                      <div class="media">
                        <div class="media-left"><span class="avatar avatar-sm avatar-away rounded-circle"><img src="./app-assets/images/portrait/small/avatar-s-6.png" alt="avatar"><i></i></span></div>
                        <div class="media-body">
                          <h6 class="media-heading">Eric Alsobrook</h6>
                          <p class="notification-text font-small-3 text-muted">We have project party this saturday.</p><small>
                            <time class="media-meta text-muted" datetime="2015-06-11T18:29:20+08:00">last month</time></small>
                        </div>
                      </div></a></li>
                  <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center" href="javascript:void(0)">Read all messages</a></li>
                </ul>-->
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
          <?php if(in_array($_SESSION['IdRol'], $ArraySaldos)):?>

            <li class=" nav-item"><a href="principal"><i class="la la-money"></i><span class="menu-title" data-i18n="">Saldo:</span><span class="menu-title" id="spSaldo"></span></a></li>
          <?php endif;?>

          <?php if($_SESSION['Prepago'] == 1):?>
            <li class=" nav-item"><a href="principal"><i class="icon-wallet"></i><span class="menu-title" data-i18n="">Prepago:</span><span class="menu-title" id="spSaldoBilletera"></span></a>
            </li>
          <?php endif;?>

          <?php if($_SESSION['IdRol'] == 10):?>
            <li class=" nav-item"><a href="principal"><i class="la la-money"></i><span class="menu-title" data-i18n="">Saldo:</span><span class="menu-title" id="spSaldoSeguros"></span></a>
            </li>
          <?php endif;?>

          <li id="liPrincipal" class=" nav-item"><a href="principal"><i class="la la-home"></i><span class="menu-title" data-i18n="">Principal</span></a>
          </li>

          <?php if(in_array($_SESSION['IdRol'], $ArrayRolVendedor)):?>
          <li class=" nav-item">
            <a href="#"><i class="la la-ticket"></i><span class="menu-title">Venta</span></a>
            <?php if($_SESSION['Prepago'] == 0):?>
              <ul class="menu-content">
                <li id="liVentaSorteo"><a class="menu-item" href="apuestasorteo">Eventos</a>
                </li>
              </ul>
              <!--<ul class="menu-content">
                <li id="liVentaReporte"><a class="menu-item" href="reportesorteo">Reportes</a>
                </li>
              </ul>-->
              <ul class="menu-content">
                  <li id="liHojaCobrorf"><a class="menu-item" href="hojadecobropv">Hoja de Cobro</a>
                  </li>
              </ul>
              <ul class="menu-content">
                <li id="liVentaMovimiento"><a class="menu-item" href="reportemovimiento">Movimientos</a>
                </li>
              </ul>
            <?php endif;?>
            <?php if($_SESSION['Prepago'] == 1):?>
              <ul class="menu-content">
                <li id="liVentaSorteoPre"><a class="menu-item" href="apuestasorteopre">Eventos</a>
                </li>
              </ul>
              <ul class="menu-content">
                <li id="liHistTranPre"><a class="menu-item" href="historialtranpre">Historial Transacciones</a>
                </li>
              </ul>
              <ul class="menu-content">
                  <li id="liHojaCobrorf"><a class="menu-item" href="hojadecobropv">Hoja de Cobro</a>
                  </li>
              </ul>
              <ul class="menu-content">
                <li id="liVentaMovimiento"><a class="menu-item" href="reportemovimiento">Movimientos</a>
                </li>
              </ul>
              <ul class="menu-content">
                <li id="liCanjePremio"><a class="menu-item" href="canjepremios">Canje de Premio</a>
                </li>
              </ul>
              <ul class="menu-content">
                <li id="liRecargaprePV"><a class="menu-item" href="recargasprepv">Recargar</a>
                </li>
              </ul>
            <?php endif;?>
            <ul class="menu-content">
              <li id="liReportesorteo"><a class="menu-item" href="reportesorteopv">Reporte Sorteo</a>
              </li>
            </ul>
            <?php if($_SESSION['Prepago'] == 0):?>
              <ul class="menu-content">
                <li id="liCanjePremio"><a class="menu-item" href="canjepremios">Canje de Premio</a>
                </li>
              </ul>
              <ul class="menu-content">
                <li id="liRecargaPV"><a class="menu-item" href="recargaspv">Recargar</a>
                </li>
              </ul>
            <?php endif;?>
          </li>

          <li id="liApuestasDeportivas" class="nav-item"><a href="https://admin.gana360.com/auth/login" target="_blank"><i class="la la-futbol-o"></i><span class="menu-title" data-i18n="">Venta Apuestas Deportivas</span></a>
          </li>
          <?php endif;?>

          <?php if($_SESSION['IdRol'] == 0 || $_SESSION['IdRol'] == 0):?>
            <li class=" nav-item"><a href="#"><i class="la la-check-circle"></i><span class="menu-title">Confirmación</span></a>
              <ul class="menu-content">
                <li id="liConfirSorteo"><a class="menu-item" href="confirmacion">Sorteos</a>
                </li>
                <li id="liGeneraLista"><a class="menu-item" href="generarlista">Generar Lista</a>
                </li>
              </ul>
            </li>
          <?php endif;?>

          <?php 
          // if(in_array($_SESSION['IdRol'], $ArrayRolVenta)):
          ?>
            <li class=" nav-item"><a href="#"><i class="la la-check-circle"></i><span class="menu-title">Reportes</span></a>
              <ul class="menu-content">
                <li id="liTotalSorteo"><a class="menu-item" href="totalventa">Venta por Tiquetes</a>
                </li>
              </ul>
              <ul class="menu-content">
                <li id="liHojaCobro"><a class="menu-item" href="hojadecobro">Hoja de Cobro</a>
                </li>
              </ul>
              <ul class="menu-content">
                <li id="liHojaCobrorf"><a class="menu-item" href="hojadecobrorf">Hoja de Cobro RF</a>
                </li>
              </ul>
              <?php if(in_array($_SESSION['IdRol'], $ArrayRolDisSub)):?>
                <ul class="menu-content">
                  <li id="liHistTranPre"><a class="menu-item" href="historialtranpre">Historial Transacciones</a>
                  </li>
                </ul>
              <?php endif;?>
              <?php if(in_array($_SESSION['IdRol'], $ArrayRolSorteos)):?>
                <ul class="menu-content">
                  <li id="liRepMovimientos"><a class="menu-item" href="movimientos">Movimientos</a>
                  </li>
                </ul>
              <?php endif;?>
              <ul class="menu-content">
                <li id="liBalances"><a class="menu-item" href="balances">Balances</a>
                </li>
              </ul>
              <?php if(in_array($_SESSION['IdRol'], $ArrayRolSorteos)):?>
              <ul class="menu-content">
                <li id="liRepTransaccionesAG"><a class="menu-item" href="transaccionesag">Transacciones AG</a>
                </li>
              </ul>
              <ul class="menu-content">
                <li id="liRepTransaccionesPRE"><a class="menu-item" href="transaccionespre">Transacciones PV</a>
                </li>
              </ul>
              <?php endif;?>

              <ul class="menu-content">
                <li id="reporteTiquete"><a class="menu-item" href="repoVentaLoteria.php">Tiquete Loteria y Chance</a>
                </li>
              </ul>
              <ul class="menu-content">
                <li id="repVentaTiquete"><a class="menu-item" href="repoVentaTiquete.php">Venta de Tiquete</a>
                </li>
              </ul>
              <ul class="menu-content">
                <li id="repHojaCobro"><a class="menu-item" href="repoCobroLoteria.php">Hoja de Cobro y Chances</a>
                </li>
              </ul>

            </li>
            <li class=" nav-item"><a href="#"><i class="la la-ticket"></i><span class="menu-title">Tiquetes</span></a>
              <ul class="menu-content">

                <li id="liTiqGanadores"><a class="menu-item" href="tiqueteganadores">Ganadores por Sorteo</a>
                </li>
                <li id="liTiqGanadoresRF"><a class="menu-item" href="tiqueteganadoresrf">Ganadores por Fechas</a>
                </li>
                <?php if(in_array($_SESSION['IdRol'], $ArrayRolSorteos)):?>
                  <li id="liTiqGenerados"><a class="menu-item" href="tiquetegenerados">Generados</a>
                  </li>
                  <li id="liAnulacionTiquete"><a class="menu-item" href="anulaciontiquete">Anulación de Tiquetes</a>
                  </li>
                  <li id="liReporteHacienda"><a class="menu-item" href="reportehacienda">Reporte Hacienda</a>
                  </li>
                <?php endif;?>
              </ul>
            </li>

          <?php 
          // endif;

          // Solo para Test de Api CoinPay
          include "coinpaymenu.php";

          // Solo para Test de Api Caliente
          include "calientemenu.php";

          ?>

          <?php if(in_array($_SESSION['IdRol'], $ArrayRolUsuarios)):?>
            <li class=" nav-item"><a href="#"><i class="la la-user"></i><span class="menu-title">Usuarios</span></a>
              <ul class="menu-content">
                <li id="liConfigUsuario"><a class="menu-item" href="usuarios">Config. Usuarios</a>
                </li>
                <?php if(in_array($_SESSION['IdRol'], $ArrayRolSorteos)):?>
                  <li id="liConfigUsuarioAG"><a class="menu-item" href="usuariosag">Usuarios AG</a>
                  </li>
                <?php endif;?>
                <li id="liPagosUsuario"><a class="menu-item" href="pagousuario">Pagos</a>
                </li>
                <?php if(in_array($_SESSION['IdRol'], $ArrayRolSorteos)):?>
                  <li id="liCierreDiario"><a class="menu-item" href="cierrediario">Cierre Diario</a>
                  </li>
                  <li id="liSolicitudRetiro"><a class="menu-item" href="solicitudretiro">Solicitud de Retiro</a>
                  </li>
                  <ul class="menu-content">
                    <li id="liRecargaalprePV"><a class="menu-item" href="recargaralpvpre">Recargar PV</a>
                    </li>
                  </ul>
                  <ul class="menu-content">
                    <li id="liReporteUltimaVenta"><a class="menu-item" href="reporteultimaventa">Reporte Ultima Venta</a>
                    </li>
                  </ul>
                <?php endif;?>
                <?php if(in_array($_SESSION['IdRol'], $ArrayRolDisSub)):?>
                  <li id="liTransSaldo"><a class="menu-item" href="transferenciasaldo">Transferencia Saldo</a>
                  </li>
                <?php endif;?>
              </ul>
            </li>
          <?php endif;?>

          <?php if($_SESSION['IdRol'] == 1 || $_SESSION['IdRol'] == 2 ):?>
            <!--<li class=" nav-item"><a href="#"><i class="la la-sticky-note"></i><span class="menu-title">Vouchers</span></a>
              <ul class="menu-content">
                <li id="liCrearVoucher"><a class="menu-item" href="crearvoucher">Crear Voucher</a>
                </li>
              </ul>
            </li>-->
          <?php endif;?>

          <?php if(in_array($_SESSION['IdRol'], $ArrayRolSorteos)):?>
            <li class=" nav-item"><a href="#"><i class="la la-sticky-note"></i><span class="menu-title">Seguros</span></a>
              <ul class="menu-content">
                <li id="liSegurosVenta">
                  <a class="menu-item" href="reportesegurosventa">Reporte de Venta</a>
                </li>
                <li id="liResSegurosCobro">
                  <a class="menu-item" href="reporteseguroscobro">Reporte de Cobro</a>
                </li>
                <li id="liSegurosBal">
                  <a class="menu-item" href="reportesegurosbalances">Balances</a>
                </li>
              </ul>
            </li>
          <?php endif;?>

          <?php if(in_array($_SESSION['IdRol'], $ArrayAsegurador)):?>
            <li class=" nav-item"><a href="#"><i class="la la-sticky-note"></i><span class="menu-title">Seguros</span></a>
              <ul class="menu-content">
                <li id="liSeguros">
                  <a class="menu-item" href="verseguros">Ver Seguros</a>
                </li>
                <li id="liResSeguros">
                  <a class="menu-item" href="verresultadoseguros">Resultado Seguros</a>
                </li>
              </ul>
            </li>
          <?php endif;?>

          <?php if(in_array($_SESSION['IdRol'], $ArrayReclutador)):?>
            <li class=" nav-item"><a href="#"><i class="la la-user"></i><span class="menu-title">Usuarios</span></a>
              <ul class="menu-content">
                <li id="liCrearUsuario">
                  <a class="menu-item" href="nuevousuario">Crear Usuarios</a>
                </li>
              </ul>
            </li>
          <?php endif;?>

          <?php if(in_array($_SESSION['IdRol'], $ArrayRolSorteos)):?>
            <li class=" nav-item"><a href="#"><i class="la la-calendar"></i><span class="menu-title">Eventos</span></a>
              <ul class="menu-content">
                <li id="liNumGanadores"><a class="menu-item" href="numeroganador">Num. Ganadores</a>
                </li>
                <li id="liProgramacion"><a class="menu-item" href="sorteoprogramacion">Programación</a>
                </li>
                <li id="liEventosDeportivos"><a class="menu-item" href="crearevento">Eventos Deportivos</a>
                </li>
                <li id="liTipoSorteo"><a class="menu-item" href="tiposorteo">Tipo Evento</a>
                </li>
                <li id="liListaTiempoReal"><a class="menu-item" href="listatiemporeal">Lista Tiempo Real</a>
                </li>
                 <li id="liListaTiempoRealA"><a class="menu-item" href="listatiemporealagrupado">Lista Dividida Banca Paga</a>
                </li>
                <li id="liGeneraLista"><a class="menu-item" href="generarlista">Generar Lista</a>
                </li>
                <li id="liHistorialListaGen"><a class="menu-item" href="historiallistas">Historico Listas</a>
                </li>
              </ul>
            </li>
          <?php endif;?>

          <?php if($_SESSION['IdRol'] == 0 || $_SESSION['IdRol'] == 0):?>
            <li class=" nav-item"><a href="#"><i class="la la-calendar"></i><span class="menu-title">Parlay</span></a>
              <ul class="menu-content">
                <li id="liProgramacionParlay"><a class="menu-item" href="parlayprogramacion">Programación</a>
                </li>
                <li id="liTipoParlay"><a class="menu-item" href="tipoparlay">Tipo Parlay</a>
                </li>
              </ul>
            </li>
          <?php endif;?>

          <?php if(in_array($_SESSION['IdRol'], $ArrayExportador)):?>
          <li class=" nav-item"><a href="#"><i class="la la-upload"></i><span class="menu-title">Exportación</span></a>
            <ul class="menu-content">
              <li id="liExportarExcel"><a class="menu-item" href="exportarexcel">Excel</a>
              </li>
            </ul>
          </li>
          <?php endif;?>

          <?php if(in_array($_SESSION['IdRol'], $ArrayContabilidad)):?>
          <li class=" nav-item"><a href="#"><i class="la la-bar-chart"></i><span class="menu-title">Cobros</span></a>
            <ul class="menu-content">
              <li id="liContaHojaDiaria"><a class="menu-item" href="contahojadiaria">Hoja Diaria</a>
              </li>
              <li id="liContaMovimentos"><a class="menu-item" href="contamovimientos">Movimientos</a>
              </li>
              <li id="liRepTransaccionesAG"><a class="menu-item" href="transaccionesag">Transacciones AG</a>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="la la-search"></i><span class="menu-title">Consultas</span></a>
            <ul class="menu-content">
              <li id="liContaHojaDiaria"><a class="menu-item" href="contahojadiaria">Cobros</a>
              </li>
              <li id="liContaHojaDiaria"><a class="menu-item" href="contahojadiaria">Pagos</a>
              </li>
            </ul>
          </li>
          <li class=" nav-item"><a href="#"><i class="la la-ticket"></i><span class="menu-title">Tiquetes</span></a>
            <ul class="menu-content">
              <li id="liTiqGanadores"><a class="menu-item" href="contatiqueteganadores">Ganadores</a>
              </li>
              <li id="liTiqGenerados"><a class="menu-item" href="contatiquetegenerados">Generados</a>
              </li>
            </ul>
          </li>
          <?php endif;?>

          <?php if(in_array($_SESSION['IdRol'], $ArrayRolSorteos)):?>
            <li class=" nav-item"><a href="#"><i class="la la-gear"></i><span class="menu-title">Configuración</span></a>
              <ul class="menu-content">
                <li id="liTerminosCondiciones"><a class="menu-item" href="actualizarterminos">Terminos y Condiciones</a>
                </li>
                <li id="liBanner"><a class="menu-item" href="configuracionbanner">Configuración Banner</a>
                </li> 
                <li id="liConfiguracionPalabras"><a class="menu-item" href="configuracioncodigospromocion">Configuración Palabras Promocionales</a>
                </li>
                <li id="liTiquetesGolden"><a class="menu-item" href="cargartiquetesgolden">Cargar / Tributar Tiquetes Golden</a>
                </li>
                <li id="liCodigosRecarga"><a class="menu-item" href="generarvoucher">Generar Códigos de Recargas</a>
                </li>
                <li id="liLimitesApuesta"><a class="menu-item" href="limiteapuesta">Límites de Apuesta</a>
                </li>
              </ul>
            </li>
          <?php endif;?>

        </ul>
      </div>
    </div>

    <!--
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-12 mb-1">
            <h3 class="content-header-title">Principal</h3>
          </div>
        </div>
        <div class="content-body">

        </div>
      </div>
    </div>
    -->
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- BEGIN VENDOR JS-->
    <script src="./app-assets/vendors/js/vendors.min.js"></script>
    <script src="./app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="./app-assets/vendors/js/extensions/datedropper.min.js"></script>
    <script src="./app-assets/vendors/js/extensions/timedropper.min.js"></script>
    <script src="./app-assets/vendors/js/extensions/toastr.min.js"></script>
    <script src="./app-assets/vendors/js/extensions/sweetalert.min.js"></script>
    <script src="./app-assets/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="./app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
    <script src="./app-assets/vendors/js/pickers/dateTime/moment-with-locales.min.js"></script>
    <script src="./app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="./app-assets/vendors/js/session/bootstrap-session-timeout.js"></script>
    <script src="./app-assets/vendors/js/forms/icheck/icheck.min.js"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="./app-assets/vendors/js/ui/prism.min.js"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN MODERN JS-->
    <script src="./app-assets/js/core/app-menu.js"></script>
    <script src="./app-assets/js/core/app.js"></script>
    <!-- END MODERN JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- END PAGE LEVEL JS-->

    <script src="./app-assets/js/scripts/session/backfunctions.js"></script>

    <script>

      <?php if(in_array($_SESSION['IdRol'], $ArraySaldos)):?>

        $( document ).ready(function() {
          Saldo();
          /*setInterval(function() {
            
              Saldo();
              SaldoPrepago();
          }, 60000);*/
        });

        function Saldo() {  
          var parametros = {
            "Accion" : 'Saldo'
          };
          $.ajax({
            data : parametros,
            url: 'headeraction.php',
            type: 'get',
            success: function(response){
                $('#spSaldo').html(response);
            }
          });

        }//

      <?php endif;?>

      <?php if($_SESSION['Prepago'] == 1):?>
        $( document ).ready(function() {

          SaldoPrepago();
          /*setInterval(function() {
            
              Saldo();
              SaldoPrepago();

          }, 60000);*/
        });

        function SaldoPrepago() {  
          var parametros = {
            "Accion" : 'Prepago'
          };
          $.ajax({
            data : parametros,
            url: 'headeraction.php',
            type: 'get',
            success: function(response){
                $('#spSaldoBilletera').html(response);
            }
          });
        }//
      <?php endif;?>

      <?php if($_SESSION['IdRol'] == 10):?>
        $( document ).ready(function() {
          SaldoSeguros();
        });

        function SaldoSeguros() {  
          var parametros = {
              "Accion" : 'Seguros'
          };
          $.ajax({
            data : parametros,
            url: 'headeraction.php',
            type: 'get',
            success: function(response){
                $('#spSaldoSeguros').html(response);
            }
          });
        }//
      <?php endif;?>   

      jQuery.extend( jQuery.fn.pickadate.defaults, {
        monthsFull: [ 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre' ],
        monthsShort: [ 'Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic' ],
        weekdaysFull: [ 'Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado' ],
        weekdaysShort: [ 'Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb' ],
        today: '',
        clear: '',
        close: '',
        firstDay: 1,
        format: 'yyyy/mm/dd',
        formatSubmit: 'yyyy/mm/dd'
      });

      function getTime()
      {
        var today=new Date();
        var h=today.getHours();
        var m=today.getMinutes();
        var s=today.getSeconds();
        // add a zero in front of numbers<10
        m=checkTime(m);
        s=checkTime(s);
        document.getElementById('divHora').innerHTML= h+":"+m+":"+s;
        t=setTimeout(function(){getTime()},500);
      }

      function checkTime(i)
      {
        if (i<10)
        {
          i="0" + i;
        }
        return i;
      }

      function esNumero(evt) {

        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        //alert(charCode);
        if (charCode > 31 && (charCode < 48 || charCode > 57) && (charCode < 95 || charCode > 106)) {
          if(charCode == 43){
            return true;
          }else{
            return false;
          }
        }
        return true;

      }//FIN esNumero

        //Limita que no pueda ingresar mas de 2 caracteres
      function limit(element)
        {
        var max_chars = 2;

        if(element.value.length > max_chars) {
          element.value = element.value.substr(0, max_chars);
        }
      }//Fin limit

      /************************MASCARA*********************/
      function mascara(o,f){
        /*  alert($(o).val());
        v_obj=o;
        v_fun=f;
        setTimeout("execmascara()",1);*/
        $(o).val(formatoMoney($(o).val().replace(/[\.]/g,'')));
      }

      function execmascara(){
        v_obj.value=v_fun(v_obj.value);
      }

      function cpf(v){
        v=v.replace(/([^0-9\,]+)/g,'');//Acepta solo números y comas.
        v=v.replace(/^[\,]/,'');//Quita coma al inicio
        v=v.replace(/[\,][\,]/g,'');//Elimina dos comas juntas.
        v=v.replace(/\,(\d)(\d)(\d)/g,',$1$2'); // Si encuentra el patrón .123 lo cambia por .12.
        v=v.replace(/\,(\d{1,2})\./g,',$1');//Si encuentra el patrón .1. o .12. lo cambia por .1 o .12.
        v = v.toString().split('').reverse().join('').replace(/(\d{3})/g,'$1.');//Pone la cadena al revés Si encuentra el patrón 123 lo cambia por 123,.
        v = v.split('').reverse().join('').replace(/^[\.]/,'');//Si inicia con un punto la reemplaza por nada.
        return v;
      }

      function formatoMoney(monto){

        monto = monto.toString();

        if(monto.length > 3){

          // monto = parseInt(monto) || 0;

          var montoFormato = "";//Almacena el nuevo monto con formato
          var contador = 0;//Contador para al tercer loop concatene un "."
          monto = monto.split("").reverse().join("");//Invertimos la cadena para ir colocando los "."

          for(var i = 0; i < monto.length; i++){
              if(contador == 3){//Para al tercer loop concatene un "."
                  montoFormato = montoFormato + ".";
                  contador = 0;
              }
              montoFormato = montoFormato + monto.substring(i, i+1);
              contador++;
          }//Fin for


          return montoFormato.split("").reverse().join("");//Invertimos para que quede como estaba

        }else{

          return monto;

        }
      }//Fin formatoMoney

      /*BLOCK*/
      $(document).keydown(function (event) {
        if (event.keyCode == 123) { // Prevent F12
          return false;
        } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I
          return false;
        }
      });
      
      $(document).on("contextmenu", function (e) {
        e.preventDefault();
      });    
    </script>

  </body>
</html>