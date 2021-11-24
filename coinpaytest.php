<?php

require_once('header.php');
require_once 'config.php';
require_once('funciones.php');
$FuncionesClass = new funciones();
$apifuncion = $_GET['f'];
$monedas = array(
["1" ,"BitCoin"],
["2" ,"Ethereum"],
["6" ,"USD"],
["7" ,"LiteCoin"],
["8" ,"Dash"],
["12","Smart"],
["13","BCH"],
["14","Colon - Colon"],
["16","SCC - Safe Capit"],
["17","Bolivares"],
["18","SUS"],
["19","USDT"],
);

function fnMoneda($monedas)
{

  $retVal='<select class="form-control input-sm" id="IdCurrency">';
  foreach ($monedas as $moneda) {
    $retVal .='<option value="'.$moneda[0].'" >'.
    $moneda[1].'</option>';
  }
  $retVal .= '</select>';

  return $retVal;
}
?>

<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="content-header-left col-md-12 col-12 mb-1">
        <h3 class="content-header-title" align="center">TEST API COINPAY</h3>
      </div>
    </div>
    <div class="content-body">
      <?php
      $titulo="Nada";
      $html = '<p>NADA QUE MOSTRAR</p>';
      switch ($apifuncion) {
        case 'CreateChannel':
          $titulo="Crear Canal";
          $html = '
            <div class="input-group">
              <span class="input-group-addon">Id de Moneda</span>'.
              fnMoneda($monedas).'
            </div>                                        
            <div class="input-group">
              <span class="input-group-addon">Identificacion Externa</span>
              <input type="text" class="form-control input-sm" id="IdExternalIdentification">
            </div>                                        
            <div class="input-group">
              <span class="input-group-addon">Nombre objetivo</span>
              <input type="text" class="form-control input-sm" id="TagName">
            </div>                                        
            <div class="input-group">
              <span class="input-group-addon">Direccion</span>
              <input type="text" class="form-control input-sm" id="CAddress" readonly>
            </div>
          ';
          break;
        case 'IsValidAddress':
          $titulo="Validar";
          $html = '
            <div class="timeline-body">
              <div class="input-group">
                <span class="input-group-addon">Id de Moneda</span>'.
                  fnMoneda($monedas).'
              </div>                                        
              <div class="input-group">
                <span class="input-group-addon">Direccion</span>
                <input type="text" class="form-control input-sm" id="VAddress" >
              </div>                                        
              <div class="input-group">
                <span class="input-group-addon">Es Valido ? </span>
                <input type="text" class="form-control input-sm" id="EsValido" readonly="">
              </div>                                        
            </div>
          ';

          break;
        case 'JPCCreateUserAccount':
          $titulo="Crear Usuario";
          $html ='
              <input type="hidden" class="form-control input-sm" id="Languaje" values="ES">
              <div class="input-group">
                  <span class="input-group-addon">Nombre</span>
                  <input type="text" class="form-control input-sm" id="Name">
              </div>                                        
              <div class="input-group">
                  <span class="input-group-addon">Segundo Nombre</span>
                  <input type="text" class="form-control input-sm" id="MiddleName">
              </div>                                        
              <div class="input-group">
                  <span class="input-group-addon">Apellido 1</span>
                  <input type="text" class="form-control input-sm" id="LastName">
              </div>                                        
              <div class="input-group">
                  <span class="input-group-addon">Apellido 2</span>
                  <input type="text" class="form-control input-sm" id="LastName2">
              </div>                                        
              <div class="input-group">
                  <span class="input-group-addon">Email</span>
                  <input type="email" class="form-control input-sm" id="Email">
              </div>                                        
              <div class="input-group">
                  <span class="input-group-addon">Clave</span>
                  <input type="pass" class="form-control input-sm" id="Password">
              </div>                                        
              <div class="input-group">
                  <span class="input-group-addon">Telefono</span>
                  <input type="phone" class="form-control input-sm" id="Phone">
              </div>                                        
              <div class="input-group">
                  <span class="input-group-addon">Nombre Ciudad</span>
                  <input type="phone" class="form-control input-sm" id="City">
              </div>                                        
              <div class="input-group">
                  <span class="input-group-addon">Codigo del Estado </span>
                  <input type="phone" class="form-control input-sm" id="StateCode">
              </div>                                        
              <div class="input-group">
                  <span class="input-group-addon">Codigo de Pais</span>
                  <input type="phone" class="form-control input-sm" id="CountryCode">
              </div>                                        
              <br>
              <div class="input-group">
                  <span class="input-group-addon">Mensaje</span>
                  <input type="text" class="form-control input-sm" id="UMessage" readonly>
              </div>   
          ';
          break;
        case 'GetAccountBalance':

          $titulo="Balance de Cuenta";
          $html ='
            <table class="table table-striped table-hover">
              <thead class="thead-inverse">
                <tr>
                  <th>ID</th><th>Cuenta</th><th>Balance</th><th>Pendiente</th><th>Moneda</th><th>e-mail</th>  
                </tr>
              </thead>
              <tbody id="tabla">
                
              </tbody>
            </table>          
          ';
          break;
        case 'GetAccountBalanceByIdCurrency':
          $titulo="Balance por Moneda";
          $html ='
            <div class="input-group">
                <span class="input-group-addon">Id de la Moneda</span>'.
                fnMoneda($monedas).'
            </div>                                        
            <div class="input-group">
                <span class="input-group-addon">Id de Cuenta</span>
                <input type="text" class="form-control input-sm" id="M_Id">
            </div>                                        
            <table class="table table-striped table-hover">
              <thead class="thead-inverse">
                <tr>
                  <th>ID</th><th>Cuenta</th><th>Balance</th><th>Pendiente</th><th>Moneda</th><th>e-mail</th>  
                </tr>
              </thead>
              <tbody id="tabla">
                
              </tbody>
            </table>          
            <div class="input-group">
                <span class="input-group-addon">Mensaje</span>
                <input type="text" class="form-control input-sm" id="MMessage" readonly>
            </div>                                        
          ';
          break;
        case 'JPCEasyPaymentGetCustomerDetails':
          $titulo="Detalle pago de Cliente";
          $html ='
            <input type="hidden" class="form-control input-sm" id="Languaje" values="ES">
            <div class="input-group">
              <span class="input-group-addon">Email</span>
              <input type="email" class="form-control input-sm" id="CD_Email">
            </div>                                        
            <div class="input-group">
              <span class="input-group-addon">Id Usuario</span>
              <input type="text" class="form-control input-sm" id="CD_IdUser" readonly>
            </div>                                        
            <div class="input-group">
              <span class="input-group-addon">Identificacion</span>
              <input type="text" class="form-control input-sm" id="CD_Identification" readonly>
            </div>                                        
            <div class="input-group">
              <span class="input-group-addon">Nombre</span>
              <input type="text" class="form-control input-sm" id="CD_FirstName" readonly>
            </div>                                        
            <div class="input-group">
              <span class="input-group-addon">Apellido 1</span>
              <input type="text" class="form-control input-sm" id="CD_LastName" readonly>
            </div>                                        
            <div class="input-group">
              <span class="input-group-addon">Apellido 2</span>
              <input type="text" class="form-control input-sm" id="CD_LastName2" readonly>
            </div>                                        
            <div class="input-group">
              <span class="input-group-addon">Email Activo</span>
              <input type="email" class="form-control input-sm" id="CD_Email_Activo" readonly>
            </div>                                        
            <br>
            <div class="input-group">
              <span class="input-group-addon">Mensaje</span>
              <input type="text" class="form-control input-sm" id="CD_message" readonly>
            </div>  
          </div>
          ';
          break;
        case 'JPCEasyPaymentGetTransactionDetails':
          $titulo="Detalle de la Transaccion";
          $html ='
            <input type="hidden" class="form-control input-sm" id="Languaje" values="ES">
            <div class="input-group">
              <span class="input-group-addon">Transaccion Id</span>
              <input type="email" class="form-control input-sm" id="TD_Id">
            </div>                                        
            <div class="input-group">
              <span class="input-group-addon">Cliente Envia</span>
              <input type="text" class="form-control input-sm" id="TD_Customer" readonly>
            </div>                                        
            <div class="input-group">
              <span class="input-group-addon">Cliente Recibe</span>
              <input type="text" class="form-control input-sm" id="TD_Receiver" readonly>
            </div>                                        
            <div class="input-group">
              <span class="input-group-addon">Monto</span>
              <input type="number" class="form-control input-sm" id="TD_Amount" readonly>
            </div>                                        
            <div class="input-group">
              <span class="input-group-addon">Moneda</span>
              <input type="text" class="form-control input-sm" id="TD_Currency" readonly>
            </div>                                        
            <div class="input-group">
              <span class="input-group-addon">Tipo Transaccion</span>
              <input type="text" class="form-control input-sm" id="TD_Type" readonly>
            </div>                                        
            <div class="input-group">
              <span class="input-group-addon">Estado Transaccion</span>
              <input type="email" class="form-control input-sm" id="TD_tatus" readonly>
            </div>                                        
            <br>
            <div class="input-group">
              <span class="input-group-addon">Mensaje</span>
              <input type="text" class="form-control input-sm" id="TD_message" readonly>
            </div>  
          ';
          break;
        case 'JPCEasyPaymentRequest':
          $titulo="Peticion de Pago";
          $html ='
            <input type="hidden" class="form-control input-sm" id="Languaje" values="ES">
            <div class="input-group">
              <span class="input-group-addon">Id Usuario</span>
              <input type="text" class="form-control input-sm" id="PR_IdUser">
            </div>                                        
            <div class="input-group">
              <span class="input-group-addon">Email</span>
              <input type="email" class="form-control input-sm" id="PR_Email">
            </div>                                        
            <div class="input-group">
              <span class="input-group-addon">Identificacion</span>
              <input type="text" class="form-control input-sm" id="PR_Identification">
            </div>                                        
            <div class="input-group">
              <span class="input-group-addon">Nombre</span>
              <input type="text" class="form-control input-sm" id="PR_FirstName">
            </div>                                        
            <div class="input-group">
              <span class="input-group-addon">Apellido 1</span>
              <input type="text" class="form-control input-sm" id="PR_LastName">
            </div>                                        
            <div class="input-group">
              <span class="input-group-addon">Apellido 2</span>
              <input type="text" class="form-control input-sm" id="PR_LastName2">
            </div>                                        
            <div class="input-group">
              <span class="input-group-addon">Monto</span>
              <input type="monto" class="form-control input-sm" id="PR_Amount">
            </div>                                        
            <div class="input-group">
              <span class="input-group-addon">Comision</span>
              <input type="number" class="form-control input-sm" id="PR_Fee">
            </div>                                        
            <div class="input-group">
              <span class="input-group-addon">Descripcion</span>
              <input type="text" class="form-control input-sm" id="PR_Description">
            </div>                                        
            <div class="input-group">
              <span class="input-group-addon">Id Moneda</span>
              '.fnMoneda($monedas).'
            </div>                                        
            <br>
            <div class="input-group">
              <span class="input-group-addon">Mensaje</span>
              <input type="text" class="form-control input-sm" id="PR_Message" readonly>
            </div>  
          ';
          break;
        case 'MoveFundsWithAuthorization':
          $titulo="Movimiento de Fondos autorizado";
          $html ='
          <input type="hidden" class="form-control input-sm" id="Languaje" values="ES">
          <div class="input-group">
            <span class="input-group-addon">Id Moneda</span>
            '.fnMoneda($monedas).'
          </div>                                        
          <div class="input-group">
            <span class="input-group-addon">Id de Transaccion</span>
            <input type="text" class="form-control input-sm" id="MF_IdTransaction">
          </div>                                        
          <div class="input-group">
            <span class="input-group-addon">Cuenta Destino</span>
            <input type="email" class="form-control input-sm" id="MF_AddressTo">
          </div>                                        
          <div class="input-group">
            <span class="input-group-addon">Monto</span>
            <input type="monto" class="form-control input-sm" id="MF_Amount">
          </div>                                        
          <div class="input-group">
            <span class="input-group-addon">Comentario</span>
            <input type="text" class="form-control input-sm" id="MF_Comments">
          </div>                                        
          <br>
          <div class="input-group">
            <span class="input-group-addon">Mensaje</span>
            <input type="text" class="form-control input-sm" id="MF_Message" readonly>
          </div>  
          ';
          break;
        case 'buyProduct':
          $titulo="Comprar Producto";
          $html ='
            <input type="hidden" class="form-control input-sm" id="Languaje" values="ES">
            <div class="input-group">
              <span class="input-group-addon">Id Moneda</span>
              '.fnMoneda($monedas).'
            </div>                                        
            <div class="input-group">
              <span class="input-group-addon">Total monto moneda</span>
              <input type="number" class="form-control input-sm" id="BP_TotalAmountCurrency">
            </div>                                        
            <div class="input-group">
              <span class="input-group-addon">Monto USD</span>
              <input type="number" class="form-control input-sm" id="BP_AmountUsd">
            </div>                                        
            <div class="input-group">
              <span class="input-group-addon">Total monto USD</span>
              <input type="number" class="form-control input-sm" id="BP_TotalAmountUsd">
            </div>                                        
            <br>
            <div class="input-group">
              <span class="input-group-addon">Id Producto</span>
              <input type="text" class="form-control input-sm" id="BP_IdProduct">
            </div>  
            <div class="input-group">
              <span class="input-group-addon">Sku</span>
              <input type="text" class="form-control input-sm" id="BP_Sku">
            </div>  
            <div class="input-group">
              <span class="input-group-addon">Nombre Producto</span>
              <input type="text" class="form-control input-sm" id="BP_Name">
            </div>  
            <div class="input-group">
              <span class="input-group-addon">Cantidad Producto</span>
              <input type="text" class="form-control input-sm" id="BP_Amount">
            </div>  
            <br>
            <div class="input-group">
              <span class="input-group-addon">Mensaje informativo</span>
              <input type="text" class="form-control input-sm" id="BP_MessageInformation" readonly>
            </div>  

            <div class="input-group">
              <span class="input-group-addon">Mensaje HTML</span>
              <input type="text" class="form-control input-sm" id="BP_MessageHtml" readonly>
            </div>  
            <div class="input-group">
              <span class="input-group-addon">Id Transaccion</span>
              <input type="text" class="form-control input-sm" id="BP_IdTransaction" readonly>
            </div>  
            <div class="input-group">
              <span class="input-group-addon">Mensaje</span>
              <input type="text" class="form-control input-sm" id="BP_Message" readonly>
            </div>  
          ';
          break;
        case 'getProducts':
          $titulo="Obtener Productos";
          $html='
            <div class="input-group">
              <span class="input-group-addon">Country</span>
              <input type="text" class="form-control input-sm" id="GP_country" value="Us">
            </div>  
            <div class="table">
              <table class="table" id="GP_Details" width="100%">
                <thead>
                  <tr>
                    <th>Image</th><th>Nombre</th> <th>Sku</th>                            
                  </tr>                          
                </thead>
                <tbody>
                  
                </tbody>                          
              </table>
            </div>  

            <br>
            <div class="input-group">
              <span class="input-group-addon">Mensaje</span>
              <input type="text" class="form-control input-sm" id="GP_Message" readonly>
            </div>  
          ';
          break;
        case 'productFee':
          $titulo="Comision del Producto";
          $html ='
            <input type="hidden" class="form-control input-sm" id="Languaje" values="ES">
            <div class="input-group">
              <span class="input-group-addon">Id Moneda</span>
              '.fnMoneda($monedas).'
            </div>                                        
            <div class="input-group">
              <span class="input-group-addon">Total monto moneda</span>
              <input type="number" class="form-control input-sm" id="PF_TotalAmountCurrency">
            </div>                                        
            <div class="input-group">
              <span class="input-group-addon">Monto USD</span>
              <input type="number" class="form-control input-sm" id="PF_AmountUsd">
            </div>                                        
            <div class="input-group">
              <span class="input-group-addon">Total monto USD</span>
              <input type="number" class="form-control input-sm" id="PF_TotalAmountUsd">
            </div>                                        
            <br>
            <div class="input-group">
              <span class="input-group-addon">Id Producto</span>
              <input type="text" class="form-control input-sm" id="PF_IdProduct">
            </div>  
            <div class="input-group">
              <span class="input-group-addon">Sku</span>
              <input type="text" class="form-control input-sm" id="PF_Sku">
            </div>  
            <div class="input-group">
              <span class="input-group-addon">Nombre Producto</span>
              <input type="text" class="form-control input-sm" id="PF_Name">
            </div>  
            <div class="input-group">
              <span class="input-group-addon">Cantidad Producto</span>
              <input type="text" class="form-control input-sm" id="PF_Amount">
            </div>  
            <br>
            <div class="input-group">
              <span class="input-group-addon">Total</span>
              <input type="text" class="form-control input-sm" id="PF_DetailTotal" readonly>
            </div>  

            <div class="input-group">
              <span class="input-group-addon">Nombre</span>
              <input type="text" class="form-control input-sm" id="PF_DetailName" readonly>
            </div>  
            <div class="input-group">
              <span class="input-group-addon">Cantidad</span>
              <input type="text" class="form-control input-sm" id="PF_DetailAmount" readonly>
            </div>  
            <div class="input-group">
              <span class="input-group-addon">Mensaje</span>
              <input type="text" class="form-control input-sm" id="PF_Message" readonly>
            </div>  
          ';
          break;        
        default:
          break;
      }
      echo '
          <div class="row">  
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div class="box">
                <div class="header-box">
                  <button type="button" class="btn btn-block btn-info" >'.
                  $titulo.'</button>
                </div>

                <br>
                <div id="box-body">'.$html.'</div>

                <br>
                <div class="box-footer" align="center">
                    <a id="'.$apifuncion.'" class="btn btn-warning btn-xs" >
                    Para consultar pulse aqui</a>
                </div>
              </div>
            </div>
          </div>
      ';
      ?>
    </div>
  </div>
</div>

<?php
require_once('footer.php');
?>
<script src="./app-assets/js/core/app-coinpay.js"></script>
<script>
  $("#liCoinPay").addClass('active');
</script>
