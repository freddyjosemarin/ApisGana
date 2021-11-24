<?php
if (count($_POST)) {
  require_once 'config.php';
  require_once 'funciones.php';

  $sqlQuery = "CALL SELECT_REPORTE_COBRO_LOTERIA_CHANCES (?, ?, ?)";
  $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
  $stmtQuery->execute(array($_POST['desde'], $_POST['hasta'], $_POST['usuario']));
  $Resultado = $stmtQuery->fetchAll();
  header('Content-Type: application/json');
  echo json_encode(array('success'=> $Resultado===false,"datos"=>$Resultado), JSON_FORCE_OBJECT); 
  return; 
}

require_once('header.php');
require_once 'config.php';
require_once('funciones.php');
$FuncionesClass = new funciones();
?>

<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="content-header-left col-md-12 col-12 mb-1">
        <h3 class="content-header-title" align="center">Hola Cobro Loteria y Chances</h3>
      </div>
    </div>
    <div class="content-body">
      <!-- Historial Transacciones -->
      <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-xl-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Reporte</h4> 
            </div>
        
            <div class="card-content collapse show">
              <div class="card-body card-dashboard">
                <input type="hidden" id="usuario" name="usuario" value="<?php echo $_SESSION['IdUsuario']; ?>">
                <fieldset>
                  <label>Fecha:</label>
                  <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-2">
                          De:<input type="DATE" id="desde" value="2021-07-06" >
                        </div>
                        
                        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-2">
                            Hasta:<input type="DATE" id="hasta" value="2021-07-06">
                        </div>   
                        <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-2">
                          <br>
                          <button type="button" class="btn btn-primary float-right" id="btnBuscar">Ver</button>
                        </div>
                    </div>
                  </div>
                </fieldset>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="dataTable_wrapper">
        <div class="table-responsive">
          <table class="table table-striped table-hover" id="tabla">
            <thead class="thead-inverse">
              <tr>
                <th>Usuario</th>
                <th>Padre</th>
                <th>Venta Total</th>
                <th>Comision</th>
                <th>Resultado</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
require_once('footer.php');
?>
<script src="./app-assets/js/core/app-caliente.js"></script>

<script>
  // $("#liCaliente").addClass('active');
  var tabla, indice;
  var lenguaje={
      "decimal": "",
      "emptyTable": "No hay información",
      "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
      "infoEmpty": "Mostrando 0 a 0 de 0 Entradas",
      "infoFiltered": "(Filtrado de _MAX_ total entradas)",
      "infoPostFix": "",
      "thousands": ",",
      "lengthMenu": "Mostrar _MENU_ Entradas",
      "loadingRecords": "Cargando...",
      "processing": "Procesando...",
      "search": "Buscar:",
      "zeroRecords": "Sin resultados encontrados",
      "paginate": {
          "first": "Primero",
          "last": "Ultimo",
          "next": "Siguiente",
          "previous": "Anterior"
      }
    };

$(function () {
    registro=null;
    indice=0;

    tabla=$('#tabla');
    inicializarTabla();

})

function showData() {
  params={};
  params.desde=document.getElementById('desde').value+' 00:00:00.0';
  params.hasta=document.getElementById('hasta').value+' 23:59:59.9';
  params.usuario=document.getElementById('usuario').value;

  $.post('repoCobroLoteria.php',params,function(retval){
    tabla.rows().remove();
    datos=retval.datos;

    for (n in datos) {
        var tr = document.createElement("TR");
        var indice=parseInt(n);

        item=datos[indice];

        tr.className="";
        tr.setAttribute("data-id",parseInt(item.id));
        tr.insertCell().innerText=item.Usuario;
        tr.insertCell().innerText=item.Padre;
        tr.insertCell().innerText=parseFloat(item.Total).toFixed(2);
        tr.insertCell().innerText=parseFloat(item.Comision).toFixed(2);
        tr.insertCell().innerText=parseFloat(item.Total-item.Comision).toFixed(2);;
        tabla.row.add(tr);
    };
    tabla.rows().draw();
  });
}

function inicializarTabla() {
    tabla.DataTable().destroy();
    tabla=$('#tabla').DataTable({
        "language": lenguaje,
        "responsive": true,
        "paging": true,
        "dom": 'Blfrtip',
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "buttons": ['pageLength','copy', 'csv', 'excel', 'pdf', 'print'],
    });
}

$(document).on('click','#btnBuscar',function(e){
    e.stopImmediatePropagation();
    showData();
})


</script>
