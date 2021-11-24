<?php
require_once('header.php');
require_once 'config.php';
require_once('funciones.php');
$FuncionesClass = new funciones();
$apifuncion = $_GET['operation'];
?>

<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="content-header-left col-md-12 col-12 mb-1">
        <h3 class="content-header-title" align="center">TEST API CALIENTE</h3>
      </div>
    </div>
    <div class="content-body">
      <?php
      $titulo="Nada";
      $html = '<p>NADA QUE MOSTRAR</p>';
      switch ($apifuncion) {
        case 'deposit':
          $titulo="Depositos";
          $html = '
            <div class="input-group">
              <span class="input-group-addon">Monto</span>
              <input type="number" step="0.1" class="form-control input-sm" id="amount">
            </div>                                        
            <div class="input-group">
              <span class="input-group-addon">Id Tienda envia</span>
              <input type="number" class="form-control input-sm" id="id_store">
            </div>                                        
            <div class="input-group">
              <span class="input-group-addon">Id Terminar (Punto de Venta)</span>
              <input type="number" class="form-control input-sm" id="id_terminal">
            </div>                                    
            <div class="input-group">
              <span class="input-group-addon">Numero de telefono</span>
              <input type="phone" class="form-control input-sm" id="phone">
            </div>                                        

            <div class="input-group">
              <span class="input-group-addon">Mensage</span>
              <input type="text" class="form-control input-sm" id="message" readonly>
            </div>
          ';
          break;
        case 'withdraw':
          $titulo="Retiros";
          $html = '
            <div class="input-group">
              <span class="input-group-addon">Id de Transaccion</span>
              <input type="text" class="form-control input-sm" id="transactionId">
            </div>                                        
            <div class="input-group">
              <span class="input-group-addon">Pin</span>
              <input type="number" class="form-control input-sm" id="pin">
            </div>                                        
            <div class="input-group">
              <span class="input-group-addon">Id Tienda envia</span>
              <input type="number" class="form-control input-sm" id="id_store">
            </div>                                        
            <div class="input-group">
              <span class="input-group-addon">Id Terminar (Punto de Venta)</span>
              <input type="number" class="form-control input-sm" id="id_terminal">
            </div>                                    
            <div class="input-group">
              <span class="input-group-addon">Numero de telefono</span>
              <input type="phone" class="form-control input-sm" id="phone">
            </div>                                 

            <br>
            <div class="input-group">
              <span class="input-group-addon">Monto</span>
              <input type="number" class="form-control input-sm" id="amount" readonly>
            </div>                                        
            <div class="input-group">
              <span class="input-group-addon">Mensage</span>
              <input type="text" class="form-control input-sm" id="message" readonly>
            </div>
          ';
          break;

        case 'check':
          $titulo="Check de Retiro";
          $html = '
            <div class="input-group">
              <span class="input-group-addon">Id de Transaccion</span>
              <input type="text" class="form-control input-sm" id="transactionId">
            </div>                                        
            <div class="input-group">
              <span class="input-group-addon">Pin</span>
              <input type="number" class="form-control input-sm" id="pin">
            </div>                                        
            <div class="input-group">
              <span class="input-group-addon">Numero de telefono</span>
              <input type="phone" class="form-control input-sm" id="phone">
            </div>                                        

            <div class="input-group">
              <span class="input-group-addon">Mensage</span>
              <input type="text" class="form-control input-sm" id="message" readonly>
            </div>
          ';
          break;

        case 'withdraw_check_amount':
          $titulo="Check de Retiro";
          $html = '
            <div class="input-group">
              <span class="input-group-addon">Id de Transaccion</span>
              <input type="text" class="form-control input-sm" id="transactionId">
            </div>                                        
            <div class="input-group">
              <span class="input-group-addon">Pin</span>
              <input type="number" class="form-control input-sm" id="pin">
            </div>                                        
            <div class="input-group">
              <span class="input-group-addon">Numero de telefono</span>
              <input type="phone" class="form-control input-sm" id="phone">
            </div>                                        
            <div class="input-group">
              <span class="input-group-addon">Monto</span>
              <input type="number" class="form-control input-sm" id="amount">
            </div>                                        

            <div class="input-group">
              <span class="input-group-addon">Mensage</span>
              <input type="text" class="form-control input-sm" id="message" readonly>
            </div>
          ';
          break;

        case 'withdraw_check_status':
          $titulo="Check estatus de Retiro";
          $html = '
            <div class="input-group">
              <span class="input-group-addon">Id de Transaccion</span>
              <input type="text" class="form-control input-sm" id="transactionId">
            </div>                                        
            <div class="input-group">
              <span class="input-group-addon">Mensage</span>
              <input type="text" class="form-control input-sm" id="message" readonly>
            </div>
          ';
          break;

        case 'pending_withdraws':
          $titulo="Lista de Transacciones";
          $html = '
            <div class="input-group">
              <span class="input-group-addon">Nombre de usuario</span>
              <input type="text" class="form-control input-sm" id="user">
            </div>                                        
            <div class="input-group">
              <span class="input-group-addon">Mensage</span>
              <input type="text" class="form-control input-sm" id="message" readonly>
            </div>
          ';
          break;

        case 'info':
          $titulo="Informacion de usuario";
          $html = '
            <div class="input-group">
              <span class="input-group-addon">Telefono</span>
              <input type="text" class="form-control input-sm" id="phone">
            </div>                                        
            <div class="input-group">
              <span class="input-group-addon">Usuario</span>
              <input type="text" class="form-control input-sm" id="user" readonly>
            </div>                                        
            <div class="input-group">
              <span class="input-group-addon">Mensage</span>
              <input type="text" class="form-control input-sm" id="message" readonly>
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
<script src="./app-assets/js/core/app-caliente.js"></script>
<script>
  $("#liCaliente").addClass('active');
</script>
