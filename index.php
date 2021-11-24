<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Dashboard Times - Gana95</title>
    <link rel="apple-touch-icon" href="./app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon"    href="./app-assets/images/logo/GANALOGO.jpg">
    <!-- <link href="//db.onlinewebfonts.com/c/80cf1e7474c91b7937d9a55459e8bc40?family=AkagiProW00-BlackItalic" rel="stylesheet">-->
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="./app-assets/css/vendors.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="./app-assets/css/app.css">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="./app-assets/css/core/menu/menu-types/vertical-menu-modern.css">
    <link rel="stylesheet" type="text/css" href="./app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="./app-assets/css/pages/login-register.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="./app-assets/vendors/css/extensions/toastr.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/gana.css">
    <!-- END Custom CSS-->
  </head>
  <body class="vertical-layout vertical-menu-modern 1-column  bg-full bodyGana95" style="padding-top: 10%" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
          <section class="flexbox-container">
            <div class="col-12 d-flex align-items-center justify-content-center">
              <div class="col-md-4 col-10 box-shadow-2 p-0">
                <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                  <div class="card-header border-0">
                    <div class="card-title text-center">
                      <img src="./app-assets/images/logo/GANA95.png" style="width:50%" alt="branding logo">
                    </div>
                  </div>
                  <div class="card-content">
                    <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1"><span>Iniciar Sesión</span></p>
                    <div class="card-body">
                      <form class="form-horizontal" novalidate>
                        <fieldset class="form-group position-relative has-icon-left">
                          <input type="text" class="form-control input-lg focusGana" id="txtUsuario" placeholder="Usuario" required>
                          <div class="form-control-position">
                              <i class="la la-user"></i>
                          </div>
                        </fieldset>
                        <fieldset class="form-group position-relative has-icon-left">
                          <input type="password" class="form-control input-lg" id="txtContrasena" placeholder="Contraseña" required>
                          <div class="form-control-position">
                            <i class="la la-key"></i>
                          </div>
                        </fieldset>
                        <button type="button" id="btnLogin" class="btn btn-outline-primary btn-glow btn-block"><i class="ft-unlock"></i> Ingresar</button>
                        <br>
                        <div class="row align-items-center">
                          <div class="col"></div>
                          <div class="col">
                              <a href="https://gana95.com/pv/tyc/tyc.pdf">Términos y condiciones</a>
                          </div>
                          <div class="col"></div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- BEGIN VENDOR JS-->
    <script src="./app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="./app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
    <script src="./app-assets/vendors/js/extensions/toastr.min.js"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN MODERN JS-->
    <script src="./app-assets/js/core/app-menu.js"></script>
    <script src="./app-assets/js/core/app.js"></script>
    <!-- END MODERN JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="./app-assets/js/scripts/forms/form-login-register.js"></script>
    <!-- END PAGE LEVEL JS-->

    <script>
      $("#txtContrasena").keyup(function(event) {
        if (event.keyCode === 13) {
          $("#btnLogin").click();
        }
      });

      $('#btnLogin').click(
        function(){
          /*  
          $.blockUI({
            message: '<div class="semibold"><span class="ft-refresh-cw icon-spin text-left"></span>&nbsp; Verificando ...</div>',
            fadeIn: 1000,
            fadeOut: 1000,
            timeout: 2000, //unblock after 2 seconds
            overlayCSS: {
              backgroundColor: '#fff',
              opacity: 0.8,
              cursor: 'wait'
            },
            css: {
              border: 0,
              padding: '10px 15px',
              color: '#fff',
              backgroundColor: '#333'
            }
          });
          */

          if($('#txtUsuario').val() != "" && $('#txtContrasena').val() != ""){
            var parametros = {
              "Usuario": $('#txtUsuario').val(),
              "Contrasena": $('#txtContrasena').val()
            };
            $.ajax({
              data : parametros,
              url: 'login.php',
              type: 'post',
              beforeSend: function() {
                $.blockUI({
                  message: '<div class="semibold"><span class="ft-refresh-cw icon-spin text-left"></span>&nbsp; Verificando...</div>',
                  fadeIn: 1000,
                  fadeOut: 1000,
                  overlayCSS: {
                    backgroundColor: '#fff',
                    opacity: 0.8,
                    cursor: 'wait'
                  },
                  css: {
                    border: 0,
                    padding: '10px 15px',
                    color: '#fff',
                    backgroundColor: '#333'
                  }
                });
              },
              success: function(response){
                var array = jQuery.parseJSON(response);
                $.unblockUI();
                if(array.Existe == 1){
                  window.location.replace(array.URL);
                }else{
                  toastr.error(array.MSG, 'Error');
                }
              }
            });
          }else{
            toastr.error('Complete los campos solicitados', 'Error');
          }
        }
      );
    </script>

  </body>
</html>