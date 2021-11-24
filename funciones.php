<?php


require_once("conexion.php");

$DB = $pdoConn;

class funciones{

    function Login($Usuario, $Contrasena){

        $sqlQuery = "CALL LOGIN(?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($Usuario, $Contrasena));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//

    function SelectUsuarios($IdPadre, $IdRol){

        $sqlQuery = "CALL SELECT_USUARIOS(?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdPadre, $IdRol));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//

    function SelectUsuariosPrepago($IdPadre, $IdRol){

        $sqlQuery = "CALL SELECT_USUARIOS_PREPAGO(?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdPadre, $IdRol));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//

    function SelectUsuariosAG($IdUsuario){

        $sqlQuery = "CALL SELECT_USUARIOSAG(?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdUsuario));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//

    function SelectDatosUsuario($IdUsuario){

        $sqlQuery = "CALL SELECT_DATOS_USUARIO(?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdUsuario));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//

    function SelectUsuariosRol($IdRol){

        $sqlQuery = "CALL SELECT_USUARIOS_ROL(?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdRol));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//

    function SelectUsuariosRolPadre($IdRol, $IdPadre){

        $sqlQuery = "CALL SELECT_USUARIOS_ROL_PADRE(?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdRol, $IdPadre));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//

    function SelectUsuariosHijos($IdUsuario){

        $sqlQuery = "CALL SELECT_USUARIOS_HIJOS(?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdUsuario));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//

    function SelectUsuariosHijosPrepago($IdUsuario){

        $sqlQuery = "CALL SELECT_USUARIOS_HIJOS_PREPAGO(?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdUsuario));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//

    function InsertUsuario($Usuario, $Contrasena, $NombreCompleto, $NombrePuesto, $Direccion, $Email, $Telefono, $Celular, $Comision, 
    $ComisionRec, $PagaPorcentaje, $PagaReal, $AplicaRecompra, $Devolucion, $MontoArranque, $AplicaDevolucion, 
    $Activo, $IdRol, $IdPadre, $IdUsuarioCrea, $Prepago , $Identificacion , $Iban , $Regimen , $Iva){

        $Date = date('Y-m-d H:i:s');

        $sqlQuery = "CALL INSERT_USUARIO(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($Usuario, $Contrasena, $NombreCompleto, $NombrePuesto, $Direccion, $Email, 
                                  $Telefono, $Celular, $Comision, $ComisionRec, $PagaPorcentaje, $PagaReal, $AplicaRecompra, $Devolucion, 
                                  $MontoArranque, $AplicaDevolucion, $Activo, $IdRol, $IdPadre, $IdUsuarioCrea, $Prepago, $Date , $Iva,$Identificacion));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//

    function UpdateUsuario($IdUsuario, $Usuario, $NombreCompleto, $NombrePuesto, $Direccion, $Email, $Telefono, $Celular, $Comision, $ComisionRec, $PagaPorcentaje, $PagaReal, $AplicaRecompra, $Devolucion, $MontoArranque, $AplicaDevolucion, $IMEI, $Activo, $IdRol,$Iva){

        $sqlQuery = "CALL UPDATE_USUARIO(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdUsuario, $Usuario, $NombreCompleto, $NombrePuesto, $Direccion, $Email, $Telefono, $Celular, 
                        $Comision, $ComisionRec, $PagaPorcentaje, $PagaReal, $AplicaRecompra, $Devolucion, $MontoArranque, $AplicaDevolucion, $IMEI, $Activo, $IdRol,$Iva));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//

    function UpdatePassword($IdUsuario, $Contrasena){
        
        $sqlQuery = "CALL UPDATE_PASSWORD(?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdUsuario, $Contrasena));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//

    function UpdatePasswordPV($IdUsuario, $ContrasenaVieja ,$Contrasena){
        
        $sqlQuery = "CALL UPDATE_PASSWORD_PV(?,?,?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdUsuario, $ContrasenaVieja, $Contrasena));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//

    function UpdateCambioPadre($idHijo , $IdPadre )
    {
        $sqlQuery = "CALL UPDATE_CAMBIO_PADRE(?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($idHijo, $IdPadre));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;
    }//


    function UpdateIcono($IdUsuario, $Icono){
        
        $sqlQuery = "CALL UPDATE_ICONO(?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdUsuario, $Icono));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//

    function SelectPadreUsuarios($IdUsuario, $IdRol){

        $sqlQuery = "CALL SELECT_PADRES_USUARIOS(?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdUsuario, $IdRol));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//

    /*SORTEO DEFINICION*/

    function SelectSorteosDefinicion($IdSorteoDefinicion, $Activo, $IdBanca){

        $sqlQuery = "CALL SELECT_SORTEO_DEFINICION(?, ?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdSorteoDefinicion, $Activo, $IdBanca));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//

    function InsertSorteosDefinicion($Nombre, $Hora, $HoraCierre, $Ganadores, $Activo, $IdBanca){

        $sqlQuery = "CALL INSERT_SORTEO_DEFINICION(?, ?, ?, ?, ?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($Nombre, $Hora, $HoraCierre, $Ganadores, $Activo, $IdBanca));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//

    function UpdateSorteoDefinicion($IdSorteoDefinicion, $Nombre, $Hora, $HoraCierre, $Ganadores, $Activo){

        $sqlQuery = "CALL UPDATE_SORTEO_DEFINICION(?,?,?,?,?,?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdSorteoDefinicion, $Nombre, $Hora, $HoraCierre, $Ganadores, $Activo));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//

    function DeleteSorteoDefinicion($IdSorteoDefinicion){
        
        $sqlQuery = "CALL DELETE_SORTEO_DEFINICION(?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdSorteoDefinicion));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//

    /*SORTEO PROGRAMACION*/
    function InsertSorteoProgramacion($IdSorteoDefinicion, $HoraCierre, $HoraSorteo, $IdBanca){

        $sqlQuery = "CALL INSERT_SORTEO_PROGRAMACION(?, ?, ?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdSorteoDefinicion, $HoraCierre, $HoraSorteo, $IdBanca));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//

    function SelectSorteosPendientesFinalizados($Tipo, $IdBanca){

        $Date = date('Y-m-d H:i:s');

        $sqlQuery = "CALL SELECT_SORTEOS_PENDIENTES_FINALIZADOS(?, ?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($Tipo, $IdBanca, $Date));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//

    function SelectSorteosPendientes($IdUsuario){
        
        $Date = date('Y-m-d H:i:s');

        $sqlQuery = "CALL SELECT_SORTEOS_PENDIENTES(?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdUsuario, $Date));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//

    function SelectSorteoProgramacion($IdSorteoProgramacion){
        
        $sqlQuery = "CALL SELECT_SORTEO_PROGRAMACION(?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdSorteoProgramacion));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//

    function SelectSorteoFechas($FechaInicio, $FechaFin, $IdBanca){
        
        $sqlQuery = "CALL SELECT_SORTEOS_FECHAS(?, ?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($FechaInicio, $FechaFin, $IdBanca));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//

    function UpdateSorteoProgramacion($IdSorteoProgramacion, $HoraCierre, $HoraSorteo, $Activo){
        
        $sqlQuery = "CALL UPDATE_SORTEO_PROGRAMACION(?, ?, ?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdSorteoProgramacion, $HoraCierre, $HoraSorteo, $Activo));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//

    /*NUMEROS RESTRINGIDOS*/
    function SelectNumerosRestringidos($IdSorteoProgramacion){
        
        $sqlQuery = "CALL SELECT_NUMEROS_RESTRINGIDOS(?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdSorteoProgramacion));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//

    function InsertNumerosRestringidos($IdSorteoProgramacion, $Numero){
        
        $sqlQuery = "CALL INSERT_NUMERO_RESTRINGIDO(?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdSorteoProgramacion, $Numero));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//

    function DeleteNumerosRestringidos($IdSorteoProgramacion){
        
        $sqlQuery = "CALL DELETE_NUMEROS_RESTRINGIDOS(?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdSorteoProgramacion));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//


    /*NUMERO GANADOR*/
    function SelectSorteosPendientesGanadores($IdBanca){

        $Date = date('Y-m-d H:i:s');
        
        $sqlQuery = "CALL SELECT_SORTEOS_PENDIENTES_GANADOR(?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdBanca, $Date));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//

    function SelectSorteosFinalizadosGanadores($IdBanca){

        $Date = date('Y-m-d H:i:s');
        
        $sqlQuery = "CALL SELECT_SORTEOS_FINALIZADOS_GANADOR(?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdBanca, $Date));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//

    
    function SelectNumeroGanador($IdSorteoProgramacion){
        
        $sqlQuery = "CALL SELECT_NUMERO_GANADOR(?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdSorteoProgramacion));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//

    function InsertNumeroGanador($IdSorteoProgramacion, $Numero, $Orden, $FechayHora){
        
        $sqlQuery = "CALL INSERT_NUMERO_GANADOR(?, ?, ?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdSorteoProgramacion, $Numero, $Orden, $FechayHora));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//

    function DeleteNumeroGanador($IdSorteoProgramacion){
        
        $sqlQuery = "CALL DELETE_NUMERO_GANADOR(?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdSorteoProgramacion));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//

    /*JUGADAS*/
    function InsertJugada($IdSorteoProgramacion, $IdUsuario, $Numero){

        $Date = date('Y-m-d H:i:s');
        
        $sqlQuery = "CALL INSERT_JUGADA(?, ?, ?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdSorteoProgramacion, $IdUsuario, $Numero, $Date));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//

    function SelectJugada($IdSorteoProgramacion, $IdUsuario){
        
        $sqlQuery = "CALL SELECT_JUGADA(?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdSorteoProgramacion, $IdUsuario));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//

    function DeleteJugada($IdSorteoProgramacion, $IdUsuario){

        $sqlQuery = "CALL DELETE_JUGADA(?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdSorteoProgramacion, $IdUsuario));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//

    /*CIERRE SORTEO*/
    function SelectSorteosFinalizadosCierre($IdBanca){

        $Date = date('Y-m-d H:i:s');
        
        $sqlQuery = "CALL SELECT_SORTEOS_FINALIZADOS_CIERRE(?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdBanca, $Date));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//

    function SelectUsuariosCierre($IdSorteoProgramacion){

        $sqlQuery = "CALL SELECT_USUARIO_CIERRES(?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdSorteoProgramacion));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//

    
    function SelectUsuariosCierreDiario($FechaInicio, $FechaFin){

        $sqlQuery = "CALL SELECT_USUARIOS_CIERRE_DIARIO(?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($FechaInicio, $FechaFin));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//

    function DeleteBalances($Fecha, $FechaInicio, $FechaFin){

        $sqlQuery = "CALL DELETE_BALANCES(?, ?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($Fecha, $FechaInicio, $FechaFin));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//

    function InsertBalance($IdTipoBalance, $IdUsuario, $Total, $PorcComision, $Comision 
                         , $Premio, $TotalRec, $PorcComisionRec, $ComisionRec, $IVA, $Balance, $IdUsuarioAplica
                         , $Descripcion, $FechaCierre, $FechaInicio, $FechaFin){
        
        $Date = date('Y-m-d H:i:s');

        $sqlQuery = "CALL INSERT_BALANCE(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdTipoBalance, $IdUsuario, $Total, $PorcComision, 
                                  $Comision, $Premio, $TotalRec, $PorcComisionRec, $ComisionRec, $IVA, 
                                  $Balance, $IdUsuarioAplica, $Descripcion, $Date, $FechaCierre, $FechaInicio, $FechaFin));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//

    function InsertPagos($IdTipoBalance, $IdUsuario, $Total, $PorcComision, $Comision 
                        , $Premio, $TotalRec, $PorcComisionRec, $ComisionRec, $IVA, $Balance, $IdUsuarioAplica
                        , $Descripcion, $PagoPremio){

        $Date = date('Y-m-d H:i:s');

        $sqlQuery = "CALL INSERT_PAGOS(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdTipoBalance, $IdUsuario, $Total, $PorcComision, 
                                  $Comision, $Premio, $TotalRec, $PorcComisionRec, $ComisionRec, $IVA, 
                                  $Balance, $IdUsuarioAplica, $Descripcion, $Date, $PagoPremio));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;


    }//

    function SelectResumenBalancesHijos($FechaCierre, $IdUsuario){

        $sqlQuery = "CALL SELECT_RESUMEN_BALANCES_HIJOS(?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($FechaCierre, $IdUsuario));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//

    function UpdateCierreSorteo($IdSorteoProgramacion){

        $sqlQuery = "CALL UPDATE_CIERRE_SORTEO(?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdSorteoProgramacion));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//

    function AplicarPremioAG($IdUsuario, $IdUsuarioAplica, $IdTiquete, $Paga, $Premio, $MontoPremio){

        $Date = date('Y-m-d H:i:s');

        $sqlQuery = "CALL APLICAR_PREMIO_AG(?, ?, ?, ?, ?, ?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdUsuario, $IdUsuarioAplica, $IdTiquete, $Paga, $Premio, $MontoPremio, $Date));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//

    function SelectUltimos10Pagos($IdUsuario){

        $sqlQuery = "CALL SELECT_ULTIMOS_10_PAGOS(?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdUsuario));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//

    /*GENERAR*/
    function SelectSorteosFinalizadosGenerar($IdBanca){

        $Date = date('Y-m-d H:i:s');
        
        $sqlQuery = "CALL SELECT_SORTEOS_FINALIZADOS_GENERAR(?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdBanca, $Date));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//

    function SelectCalculoDevoluciones($IdSorteoProgramacion){

        $sqlQuery = "CALL SELECT_CALCULO_DEVOLUCIONES(?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdSorteoProgramacion));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//

    function DeleteDevolucion($IdSorteoProgramacion){

        $sqlQuery = "CALL DELETE_DEVOLUCION(?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdSorteoProgramacion));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//

    function InsertDevolucion($IdSorteoProgramacion, $IdUsuario, $Numero, $Monto){

        $Date = date('Y-m-d H:i:s');

        $sqlQuery = "CALL INSERT_DEVOLUCION(?, ?, ?, ?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdSorteoProgramacion, $IdUsuario, $Numero, $Monto, $Date));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//

    function GenerarListaNetaSorteo($IdSorteoProgramacion, $IdUsuario){

        $Date = date('Y-m-d H:i:s');

        $sqlQuery = "CALL GENERAR_LISTANETASORTEO(?, ?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdSorteoProgramacion, $IdUsuario, $Date));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//

    function SelectListaNetaSorteo($IdSorteoProgramacion, $IdUsuario){

        $ArrayTotalesNumeros = array_fill(0, 100, 0);

        $sqlQuery = "CALL SELECT_LISTA_NETA_SORTEO(?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdSorteoProgramacion, $IdUsuario));
        $Lista = $stmtQuery->fetchAll();

        foreach ($Lista as $Numero){ 
            
            $ArrayTotalesNumeros[$Numero['Numero']] += $Numero['Monto'];
            
        }//


        return $ArrayTotalesNumeros;

    }//

    function SelectListaTiempoRealSorteo($IdSorteoProgramacion){

        $ArrayTotalesNumeros = array_fill(0, 100, 0);

        $sqlQuery = "CALL SELECT_LISTA_TIEMPO_REAL_SORTEO(?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdSorteoProgramacion));
        $Lista = $stmtQuery->fetchAll();

        foreach ($Lista as $Numero){ 
            
            $ArrayTotalesNumeros[$Numero['Numero']] += $Numero['Cantidad'];
            
        }//


        return $ArrayTotalesNumeros;

    }//
    function SelectListaTiempoRealAgrupadoSorteo($IdSorteoProgramacion){

        $ArrayTotalesNumeros = array_fill(0, 100, 0);

        $sqlQuery = "CALL SELECT_LISTA_TIEMPO_REAL_SORTEO_AGRUPADO_PAGAREAL(?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdSorteoProgramacion));
        $Lista = $stmtQuery->fetchAll();

        return $Lista;

    }//
    function SelectListaTiempoRealDistribucion($IdSorteoProgramacion , $Numero){


        $sqlQuery = "CALL SELECT_LISTA_TIEMPO_DISTRIBUCION_NUMERO(? , ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdSorteoProgramacion , $Numero));
        $Lista = $stmtQuery->fetchAll();

        return $Lista;

    }


    function SelectMasCargadosListaSorteo($IdSorteoProgramacion){

        $sqlQuery = "CALL SELECT_MAS_CARGADOS_LISTA_SORTEO(?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdSorteoProgramacion));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//


    /*SEGUROS*/
    function InsertSeguros($IdUsuarioComprador, $IdUsuarioAsegurador, $IdSorteoProgramacion, $Numero, $Monto){

        $Date = date('Y-m-d H:i:s');

        $sqlQuery = "CALL INSERT_SEGUROS(?, ?, ?, ?, ?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdUsuarioComprador, $IdUsuarioAsegurador, $IdSorteoProgramacion, $Numero, $Monto, $Date));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//


    function DeleteSeguros($IdUsuarioComprador, $IdUsuarioAsegurador, $IdSorteoProgramacion){

        $Date = date('Y-m-d H:i:s');

        $sqlQuery = "CALL DELETE_SEGUROS(?, ?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdUsuarioComprador, $IdUsuarioAsegurador, $IdSorteoProgramacion));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//


    function SelectSeguros($IdUsuarioAsegurador, $IdSorteoProgramacion){

        $sqlQuery = "CALL SELECT_SEGUROS(?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdUsuarioAsegurador, $IdSorteoProgramacion));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//

    
    function SelectUsuariosGenerarSeguros($IdSorteoProgramacion){

        $sqlQuery = "CALL SELECT_USUARIOS_GENERAR_SEGUROS(?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdSorteoProgramacion));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//

    
    function SelectTotalSegurosUsuario($IdUsuarioComprador, $IdSorteoProgramacion){

        $sqlQuery = "CALL SELECT_TOTAL_SEGUROS_USUARIO(?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdUsuarioComprador, $IdSorteoProgramacion));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//

    function SelectTotalNumeroSegurosUsuario($IdUsuarioComprador, $Numero, $IdSorteoProgramacion){

        $sqlQuery = "CALL SELECT_TOTAL_NUMERO_SEGUROS_USUARIO(?, ?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdUsuarioComprador, $Numero, $IdSorteoProgramacion));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//

    
    function InsertSaldoSeguro($IdUsuario, $IdSorteoProgramacion, $Importe, $Comision, $Premio, $Balance, $Descripcion){

        $Date = date('Y-m-d H:i:s');

        $sqlQuery = "CALL INSERT_SALDO_SEGURO(?, ?, ?, ?, ?, ?, ?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdUsuario, $IdSorteoProgramacion, $Importe, $Comision, $Premio, $Balance, $Date, $Descripcion));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//

    function SelectReporteSegurosRF($FechaInicio, $FechaFin, $IdUsuario){
        
        $sqlQuery = "CALL SELECT_REPORTE_SEGUROSRF(?, ?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($FechaInicio, $FechaFin, $IdUsuario));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//


    function SelectTotalesSeguros($IdSorteoProgramacion){
        
        $sqlQuery = "CALL SELECT_TOTAL_VENTA_SEGUROS(?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdSorteoProgramacion));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//


    function SelectListaCompradoresSeguros($IdSorteoProgramacion){
        
        $sqlQuery = "CALL SELECT_LISTA_COMPRADORES_SEGUROS(?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdSorteoProgramacion));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//


    function SelectBalancesSeguros(){

        $sqlQuery = "CALL SELECT_BALANCES_SEGUROS()";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute();
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//

    function SelectReporteCobroSorteo($IdSorteoProgramacion){

        $sqlQuery = "CALL SELECT_REPORTE_COBRO_SORTEO_SEGUROS(?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdSorteoProgramacion));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//


    /*MOVIMIENTOS*/
    function ReporteMovimientosUsuarios($IdUsuario, $FechaInicio, $FechaFin){

        $Date = date('Y-m-d H:i:s');

        $sqlQuery = "CALL SELECT_REPORTE_MOVIMIENTOS_USUARIOS(?, ?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdUsuario, $FechaInicio, $FechaFin));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//

    function ReporteMovimientos($IdUsuario, $FechaInicio, $FechaFin){

        //$Date = date('Y-m-d H:i:s');

        $sqlQuery = "CALL SELECT_REPORTE_MOVIMIENTOS(?, ?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdUsuario, $FechaInicio, $FechaFin));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//

    function ReporteContaMovimientos($FechaInicio, $FechaFin){

        $sqlQuery = "CALL SELECT_REPORTE_CONTA_MOVIMIENTOS(?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($FechaInicio, $FechaFin));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//

    function ReporteResultadoSorteo($FechaInicio, $FechaFin, $IdUsuario){
        
        $sqlQuery = "CALL SELECT_RESULTADO_SORTEO(?, ?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($FechaInicio, $FechaFin, $IdUsuario));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//


    /*SORTEO*/
    function SelectTotalSorteo($IdUsuario, $IdSorteoProgramacion){

        $sqlQuery = "CALL SELECT_TOTAL_SORTEO(?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdUsuario, $IdSorteoProgramacion));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//

    function SelectTotalNumeroSorteo($IdUsuario, $IdSorteoProgramacion, $Numero){

        $sqlQuery = "CALL SELECT_TOTAL_SORTEO_NUMERO(?, ?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdUsuario, $IdSorteoProgramacion, $Numero));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//

    function SelectTotalSorteoHijos($IdUsuario, $IdSorteoProgramacion){

        $sqlQuery = "CALL SELECT_TOTAL_SORTEO_HIJOS(?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdUsuario, $IdSorteoProgramacion));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//

    function SelectTotalSorteoJerarquia($IdUsuario , $IdSorteoProgramacion)
    {
        $sqlGetLista = "CALL SELECT_TOTAL_SORTEO_JERARQUIA(?, ?)";
        $stmtGetLista = $GLOBALS['DB']->prepare($sqlGetLista);
        $stmtGetLista->execute(array($IdUsuario, $IdSorteoProgramacion));
        $Resultado = $stmtGetLista->fetchAll();

        return $Resultado;
    }


    /*TIQUETE APUESTA*/
    function InsertTiquete($IdSorteoProgramacion, $IdUsuario){

        $Date = date('Y-m-d H:i:s');
        $MaxHoraReversion = date('Y-m-d H:i:s',strtotime('+2 minutes',strtotime($Date)));
        $CodigoSeguridad = rand(1000, 9999);

        $sqlQuery = "CALL INSERT_TIQUETE(?, ?, ?, ?, ?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdSorteoProgramacion, $IdUsuario, $MaxHoraReversion, $Date, $Date, $CodigoSeguridad));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//

    function InsertTiquetePrepago($IdSorteoProgramacion, $IdUsuario, $TotalTiquete){

        $Date = date('Y-m-d H:i:s');
        $MaxHoraReversion = date('Y-m-d H:i:s',strtotime('+2 minutes',strtotime($Date)));
        $CodigoSeguridad = rand(1000, 9999);

        $sqlQuery = "CALL INSERT_TIQUETE_PREPAGO(?, ?, ?, ?, ?, ?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdSorteoProgramacion, $IdUsuario, $MaxHoraReversion, $Date, $Date, $CodigoSeguridad, $TotalTiquete));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//

    function InsertTiqueteApuesta($IdTiquete, $Numero, $Monto, $IVA){

        $Date = date('Y-m-d H:i:s');

        $sqlQuery = "CALL INSERT_TIQUETE_APUESTA(?, ?, ?, ?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdTiquete, $Numero, $Monto, $IVA, $Date));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//

    function SelectTiqueteImpresion($IdTiquete){

        $sqlQuery = "CALL SELECT_TIQUETE_IMPRESION(?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdTiquete));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//

    function SelectTiqueteReimpresion($IdUsuario, $IdSorteoProgramacion){

        $sqlQuery = "CALL SELECT_TIQUETE_REIMPRESION(?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdUsuario, $IdSorteoProgramacion));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//

    function SelectTiqueteCopiar($IdTiquete){

        $sqlQuery = "CALL SELECT_TIQUETE_COPIAR(?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdTiquete));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//

    function ReversionTiquete($IdTiquete, $IdUsuario){

        $Date = date('Y-m-d H:i:s');

        $sqlQuery = "CALL REVERSION_TIQUETE(?, ?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdTiquete, $IdUsuario, $Date));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//

    function GenerarTiquetesGanadores($IdSorteoProgramacion, $HoraSorteo){

        //$Date = date('Y-m-d H:i:s');
        $FechaVencimiento = date('Y-m-d H:i:s',strtotime('+7 days',strtotime($HoraSorteo)));

        $sqlQuery = "CALL GENERAR_TIQUETES_GANADORES(?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdSorteoProgramacion, $FechaVencimiento));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//

    function SelectTiquetesGenerados($IdSorteoProgramacion, $IdUsuario){

        $sqlQuery = "CALL SELECT_TIQUETES_GENERADOS(?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdSorteoProgramacion, $IdUsuario));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//

    function SelectTiquetesGanadores($IdSorteoProgramacion, $IdUsuario){

        $sqlQuery = "CALL SELECT_TIQUETES_GANADORES(?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdSorteoProgramacion, $IdUsuario));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//


    function SelectTiquetesGanadoresRF($FechaInicio, $FechaFin, $IdUsuario){

        $sqlQuery = "CALL SELECT_TIQUETES_GANADORES_RF(?, ?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($FechaInicio, $FechaFin, $IdUsuario));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//

    function SelectTiqueteGanadoresPV($IdSorteoProgramacion, $IdUsuario){

        $sqlQuery = "CALL SELECT_TIQUETES_GANADORES_PV(?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdSorteoProgramacion, $IdUsuario));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//
    

    function SelectTiqueteGanadoresAG($IdSorteoProgramacion){

        $sqlQuery = "CALL SELECT_TIQUETES_GANADORES_AG(?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdSorteoProgramacion));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//

    function VerificarTiqueteGanador($IdTiquete, $CodigoSeguridad, $IdUsuario){

        $sqlQuery = "CALL VERIFICAR_TIQUETE_GANADOR(?, ?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdTiquete, $CodigoSeguridad, $IdUsuario));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//

    function CanjearTiquete($IdTiquete, $IdUsuario){

        $Date = date('Y-m-d H:i:s');

        $sqlQuery = "CALL CANJEAR_TIQUETE(?, ?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdTiquete, $IdUsuario, $Date));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//

    function SelectTiqueteFormulario($IdTiqueteGanador){

        $sqlQuery = "CALL SELECT_TIQUETE_FORMULARIO(?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdTiqueteGanador));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//


    function VerificarLimiteNumeros($IdSorteoProgramacion, $Numero){

        $sqlQuery = "CALL VERIFICAR_LIMITES_NUMEROS(?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdSorteoProgramacion, $Numero));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//


    
    function GenerarMovimientoSorteo($IdSorteoProgramacion, $Descripcion){

        $Date = date('Y-m-d H:i:s');

        $sqlQuery = "CALL GENERAR_MOVIMIENTO_SORTEO(?, ?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdSorteoProgramacion, $Descripcion, $Date));
        //$Resultado = $stmtQuery->fetch();

        //return $Resultado;

    }//


    function SelectFechasBalances($Fecha){

        $sqlQuery = "CALL SELECT_FECHA_BALANCES(?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($Fecha));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//

    function DeleteTodasApuestasTemporales($IdSorteoProgramacion){

        $sqlQuery = "CALL DELETE_APUESTA_TEMPORAL_TODAS(?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdSorteoProgramacion));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//

    function UpdateClaveHacienda($IdTiquete, $ClaveHacienda, $Consecutivo){

        $sqlQuery = "CALL UPDATE_CLAVE_HACIENDA(?,?,?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdTiquete, $ClaveHacienda, $Consecutivo));
        $Resultado = $stmtQuery->fetch();

        //return $Resultado;


    }//


    function UpdateNotaCredito($IdTiquete, $NotaCredito, $NotaCreditoConsecutivo){

        $sqlQuery = "CALL UPDATE_NOTA_CREDITO(?, ?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdTiquete, $NotaCredito, $NotaCreditoConsecutivo));
        $Resultado = $stmtQuery->fetch();

        //return $Resultado;


    }//


    /*REPORTES*/
    function SelectReporteDiario($FechaInicio, $FechaFin, $IdBanca){
        
        $sqlQuery = "CALL SELECT_REPORTE_DIARIO(?, ?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($FechaInicio, $FechaFin, $IdBanca));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//

    function SelectReporteHojaCobro($FechaCierre, $IdUsuario){
        
        $sqlQuery = "CALL SELECT_REPORTE_HOJA_COBRO(?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($FechaCierre, $IdUsuario));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//


    function SelectReporteHojaCobroRF($FechaInicio, $FechaFin, $IdUsuario, $IdVendedor){
        
        $sqlQuery = "CALL SELECT_REPORTE_HOJA_COBRORF(?, ?, ?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($FechaInicio, $FechaFin, $IdUsuario, $IdVendedor));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//

    function SelectReporteHojaCobroPV($FechaInicio, $FechaFin, $IdUsuario){
        
        $sqlQuery = "CALL SELECT_REPORTE_HOJA_COBROPV(?, ?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($FechaInicio, $FechaFin, $IdUsuario));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//

    function SelectReporteHojaCobroDiario($FechaInicio, $FechaFin, $IdBanca){
        
        $sqlQuery = "CALL SELECT_REPORTE_HOJA_COBRO_DIARIO(?, ?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($FechaInicio, $FechaFin, $IdBanca));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//

    function SelectBalancesPV($IdUsuario){

        $sqlQuery = "CALL SELECT_BALANCES_PV(?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdUsuario));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//




    /*CONTABILIDAD*/ 
    function SelectReporteHojaDiaria($FechaCierre){
        
        $sqlQuery = "CALL SELECT_REPORTE_HOJA_DIARIA(?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($FechaCierre));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//

    
    function SelectReporteHojaDiariaUsuarios($FechaInicio, $FechaFin, $IdBanca){
        
        $sqlQuery = "CALL SELECT_REPORTE_HOJA_DIARIA_USUARIOS(?, ?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($FechaInicio, $FechaFin, $IdBanca));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//
    
    /*SALDOS*/
    function SelectSaldoActual($IdUsuario){

        $sqlQuery = "CALL SELECT_SALDO_ACTUAL(?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdUsuario));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//

    function SelectSaldoBilletera($IdUsuario){

        $sqlQuery = "CALL SELECT_SALDO_BILLETERA(?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdUsuario));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//


    function SelectSaldoSeguros($IdUsuario){

        $sqlQuery = "CALL SELECT_SALDO_SEGUROS(?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdUsuario));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//


    /*CONFIRMACION*/
    function SelectUsuariosSinConfirmacion($IdSorteoProgramacion, $Numero){
        
        $sqlQuery = "CALL SELECT_USUARIOS_SIN_CONFIRMACION(?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdSorteoProgramacion, $Numero));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//

    function SelectUsuariosConfirmacion($IdSorteoProgramacion, $Numero){
        
        $sqlQuery = "CALL SELECT_USUARIOS_CONFIRMACION(?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdSorteoProgramacion, $Numero));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//


    function InsertConfirmacion($IdSorteoProgramacion, $IdUsuario, $FechaCreacion, $HechoPor){
        
        $sqlQuery = "CALL INSERT_CONFIRMACION(?, ?, ?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdSorteoProgramacion, $IdUsuario, $FechaCreacion, $HechoPor));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//

    function DeleteConfirmacion($IdSorteoProgramacion, $IdUsuario){

        $Date = date('Y-m-d H:i:s');
        
        $sqlQuery = "CALL DELETE_CONFIRMACION(?, ?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdSorteoProgramacion, $IdUsuario, $Date));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//



    /*EXPORTACION*/ 
    function SelectApuestaExportacion($IdUsuario){
        
        $sqlQuery = "CALL SELECT_APUESTA_EXPORTACION(?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdUsuario));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//

    function DeleteApuestaExportacion($IdUsuario){

        $sqlQuery = "CALL DELETE_APUESTA_EXPORTACION(?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdUsuario));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//

    function InsertTiqueteExportacion($IdSorteoProgramacion, $IdUsuario, $HechoPor){

        $Date = date('Y-m-d H:i:s');

        $sqlQuery = "CALL INSERT_TIQUETE_EXPORTACION(?, ?, ?, ?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdSorteoProgramacion, $IdUsuario, $Date, $Date, $HechoPor));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//




    /*METODOS GENERALES*/
    function ListaBruta($IdUsuario, $IdSorteoProgramacion){

        $ArrayTotalesNumeros = array_fill(0, 100, 0);

        $sqlUsuarios = "CALL SELECT_USUARIOS(?, ?)";
        $stmtUsuarios = $GLOBALS['DB']->prepare($sqlUsuarios);
        $stmtUsuarios->execute(array($IdUsuario, 2));
        $Usuarios = $stmtUsuarios->fetchAll();

        $sqlUsuarios = null;

        foreach($Usuarios as $Usuario){

            $sqlGetLista = "CALL SELECT_LISTA_SORTEO(?, ? )";
            $stmtGetLista = $GLOBALS['DB']->prepare($sqlGetLista);
            $stmtGetLista->execute(array($IdSorteoProgramacion, $Usuario['IdUsuario']));
            $Lista = $stmtGetLista->fetchAll();

            $sqlGetLista = null;

            foreach ($Lista as $Numero){ 
                
                $ArrayTotalesNumeros[$Numero['Numero']] += $Numero['Cantidad'];
                
            }//

        }//

        return $ArrayTotalesNumeros;

    }//

    function ListaNeta($IdUsuario, $IdSorteoProgramacion){

        $ArrayTotalesNumeros = array_fill(0, 100, 0);

        $sqlUsuarios = "CALL SELECT_USUARIOS(?, ?)";
        $stmtUsuarios = $GLOBALS['DB']->prepare($sqlUsuarios);
        $stmtUsuarios->execute(array($IdUsuario, 2));
        $Usuarios = $stmtUsuarios->fetchAll();

        $sqlUsuarios = null;

        foreach($Usuarios as $Usuario){

            $sqlGetLista = "CALL SELECT_LISTA_SORTEO(?, ? )";
            $stmtGetLista = $GLOBALS['DB']->prepare($sqlGetLista);
            $stmtGetLista->execute(array($IdSorteoProgramacion, $Usuario['IdUsuario']));
            $Lista = $stmtGetLista->fetchAll();

            $sqlGetLista = null;

            foreach ($Lista as $Numero){ 
                
                if($Usuario['AplicaRecompra'] == 1){

                    $Recompra = ($Numero['Cantidad'] * $Usuario['PagaPorcentaje']) / $Usuario['PagaReal'];
                    $Recompra = round($Recompra, 0, PHP_ROUND_HALF_UP);
                    $Recompra = redondeo12($Recompra);

                    $ArrayTotalesNumeros[$Numero['Numero']] += $Recompra;

                }else{

                    $ArrayTotalesNumeros[$Numero['Numero']] += $Numero['Cantidad'];

                }
                
            }//

        }//

        return $ArrayTotalesNumeros;

    }//


    function ListaBrutaPuesto($IdUsuario, $IdSorteoProgramacion){

        $ArrayTotalesNumeros = array_fill(0, 100, 0);

        $sqlGetLista = "CALL SELECT_LISTA_SORTEO(?, ? )";
        $stmtGetLista = $GLOBALS['DB']->prepare($sqlGetLista);
        $stmtGetLista->execute(array($IdSorteoProgramacion, $IdUsuario));
        $Lista = $stmtGetLista->fetchAll();


        foreach ($Lista as $Numero){ 
            
            $ArrayTotalesNumeros[$Numero['Numero']] += $Numero['Cantidad'];
            
        }//


        return $ArrayTotalesNumeros;

    }//


    function ListaBrutaHijos($IdUsuario, $IdSorteoProgramacion){

        $ArrayTotalesNumeros = array_fill(0, 100, 0);

        $sqlGetLista = "CALL SELECT_LISTA_SORTEO_HIJOS(?, ? )";
        $stmtGetLista = $GLOBALS['DB']->prepare($sqlGetLista);
        $stmtGetLista->execute(array($IdSorteoProgramacion, $IdUsuario));
        $Lista = $stmtGetLista->fetchAll();


        foreach ($Lista as $Numero){ 
            
            $ArrayTotalesNumeros[$Numero['Numero']] += $Numero['Cantidad'];
            
        }//


        return $ArrayTotalesNumeros;

    }//

    //BILLETERA
    function VerificarUsuarioRecarga( $Tipo , $Telefono , $Usuario )
    {
        $sql = "CALL VERIFICAR_USUARIO_RECARGA(?,?,?)";
        $stmt = $GLOBALS['DB']->prepare($sql);
        $stmt->execute(array($Tipo, $Telefono , $Usuario));
        $Verifica = $stmt->fetch();

        return $Verifica;
    }

    function VerificarUsuarioRecargaPV( $IdUsuario )
    {
        $sql = "CALL VERIFICAR_USUARIO_RECARGAPV(?)";
        $stmt = $GLOBALS['DB']->prepare($sql);
        $stmt->execute(array($IdUsuario));
        $Verifica = $stmt->fetch();

        return $Verifica;
    }

    function PVRecargaSaldo($IdUsuario,$IdUsuarioAplica,$Monto,$Descripcion)
    {
        try
        {
            $Date = date('Y-m-d H:i:s');
            $sql = "CALL PVRECARGA_SALDO(?,?,?,?,?)";
            $stmt = $GLOBALS['DB']->prepare($sql);
            $stmt->execute(array($IdUsuario,$IdUsuarioAplica,$Monto,$Date,$Descripcion));
            $Recarga = $stmt->fetch();

            if($Recarga['CODERROR'] != -99)
            {
                require_once('PHPMailer/plantillas.php');
                plantillas::RecargaSaldo($Monto,$Recarga['CODERROR'],$Recarga['Email']);
            }

            return $Recarga;
        }
        catch(Exception $e)
        {
            return $e;
        }

        

    }//


    function PVPRERecargaSaldo($IdUsuario,$IdUsuarioAplica,$Monto,$Descripcion)
    {
        try
        {
            $Date = date('Y-m-d H:i:s');
            $sql = "CALL PVPRERECARGA_SALDO(?,?,?,?,?)";
            $stmt = $GLOBALS['DB']->prepare($sql);
            $stmt->execute(array($IdUsuario,$IdUsuarioAplica,$Monto,$Date,$Descripcion));
            $Recarga = $stmt->fetch();

            if($Recarga['CODERROR'] != -99)
            {
                require_once('PHPMailer/plantillas.php');
                plantillas::RecargaSaldo($Monto,$Recarga['CODERROR'],$Recarga['Email']);
            }

            return $Recarga;
        }
        catch(Exception $e)
        {
            return $e;
        }

        

    }//


    function PREPVRecargaSaldo($IdUsuario,$IdUsuarioAplica,$Monto,$Descripcion)
    {
        try
        {
            $Date = date('Y-m-d H:i:s');
            $sql = "CALL PREPVRECARGA_SALDO(?,?,?,?,?)";
            $stmt = $GLOBALS['DB']->prepare($sql);
            $stmt->execute(array($IdUsuario,$IdUsuarioAplica,$Monto,$Date,$Descripcion));
            $Recarga = $stmt->fetch();

            if($Recarga['CODERROR'] != -99  && $Recarga['CODERROR'] != -2)
            {
                require_once('PHPMailer/plantillas.php');
                plantillas::RecargaSaldo($Monto,$Recarga['CODERROR'],$Recarga['Email']);
            }

            return $Recarga;
        }
        catch(Exception $e)
        {
            return $e;
        }

        

    }//


    function TransferenciaSaldoPrepago($IdUsuario,$IdUsuarioAplica,$Monto,$Descripcion)
    {
        try
        {
            $Date = date('Y-m-d H:i:s');
            $sql = "CALL TRANSFERENCIA_SALDO_PREPAGO(?,?,?,?,?)";
            $stmt = $GLOBALS['DB']->prepare($sql);
            $stmt->execute(array($IdUsuario,$IdUsuarioAplica,$Monto,$Date,$Descripcion));
            $Recarga = $stmt->fetch();

            /*if($Recarga['CODERROR'] != -99)
            {
                require_once('PHPMailer/plantillas.php');
                plantillas::RecargaSaldo($Monto,$Recarga['CODERROR'],$Recarga['Email']);
            }*/

            return $Recarga;
        }
        catch(Exception $e)
        {
            return $e;
        }

        

    }//

    function ReembolsoAnulacionTiquete($IdUsuario, $Monto, $Descripcion){

        $Date = date('Y-m-d H:i:s');

        $sqlQuery = "CALL REEMBOLSO_ANULACION_TIQUETE(?, ?, ?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdUsuario, $Monto, $Date, $Descripcion));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//

    function ReporteTransaccionesAG($FechaInicio, $FechaFin){

        //$Date = date('Y-m-d H:i:s');

        $sqlQuery = "CALL SELECT_REPORTE_TRANSACCIONES_AG(?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($FechaInicio, $FechaFin));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//


    function ReporteTransaccionesPRE($FechaInicio, $FechaFin){

        //$Date = date('Y-m-d H:i:s');

        $sqlQuery = "CALL SELECT_REPORTE_TRANSACCIONES_PRE(?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($FechaInicio, $FechaFin));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//

    function InsertTransaccionPrepago($IdSorteoProgramacion, $IdUsuario, $IdTiquete, $MontoTiquete, $MontoIVA){

        $sqlQuery = "CALL INSERT_TRANSACCION_PREPAGO(?, ?, ?, ?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdSorteoProgramacion, $IdUsuario, $IdTiquete, $MontoTiquete, $MontoIVA));

        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//


    function SelectTransaccionesFecha($IdUsuario, $FechaInicio, $FechaFin){

        $sqlQuery = "CALL AGSELECT_TRANSACCIONES_FECHA(?, ?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdUsuario, $FechaInicio, $FechaFin));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//


    /*RETIRO DINERO*/
    function SelectSolicitudesRetiroPendientes($IdUsuario){

        $sqlQuery = "CALL SELECT_SOLICITUDES_RETIRO_PENDIENTES(?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdUsuario));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//
    
    function SelectSolicitudesRetiroRevision($IdUsuario){

        $sqlQuery = "CALL SELECT_SOLICITUDES_RETIRO_REVISION(?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdUsuario));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//


    function SelectSolicitudesRetiroFinalizados($IdUsuario){

        $sqlQuery = "CALL SELECT_SOLICITUDES_RETIRO_FINALIZADOS(?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdUsuario));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//


    function SelectSolicitudesRetiroRechazados($IdUsuario){

        $sqlQuery = "CALL SELECT_SOLICITUDES_RETIRO_RECHAZADOS(?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdUsuario));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//

    function SelectCuenta($IdCuenta, $IdUsuario, $Eliminado){

        $sqlQuery = "CALL SELECT_CUENTAS(?, ?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdCuenta, $IdUsuario, $Eliminado));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//

    static function SelectCuentaImagen($IdCuenta){

        $sqlQuery = "CALL SELECT_CUENTA_IMAGEN(?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdCuenta));
        if($stmtQuery->rowCount() > 0 )
        {
            $stmtQuery->bindColumn(1,$img,PDO::PARAM_LOB);
            $stmtQuery->fetch(PDO::FETCH_BOUND);
            return $img;
        }

        

    }//


    function UpdateEstadoSolicitudRetiro($IdSolicitudRetiro ,$IdUsuario ,$Comprobante, $IdTipoEstado){

        $Date = date('Y-m-d H:i:s');

        $sql = "CALL UPDATE_ESTADO_SOLICITUD_RETIRO(?, ?, ?, ?,? )";
        $stmt = $GLOBALS['DB']->prepare($sql);
        $stmt->execute(array($IdSolicitudRetiro ,$IdUsuario ,$Comprobante, $IdTipoEstado, $Date));
        $Resultado = $stmt->fetch();

        return $Resultado;


    }//



    function AprobacionSolicitudRetiro($IdSolicitudRetiro, $Comprobante ,$IdUsuarioAprueba){

        $Date = date('Y-m-d H:i:s');

        $sql = "CALL APROBACION_SOLICITUD_RETIRO(?, ?, ?, ?)";
        $stmt = $GLOBALS['DB']->prepare($sql);
        $stmt->execute(array($IdSolicitudRetiro ,$Comprobante , $IdUsuarioAprueba, $Date));
        $Resultado = $stmt->fetch();

        /*if($Resultado['CODERROR'] != -99)
        {
            require_once('PHPMailer/plantillas.php');
            plantillas::EmailRechazo($Motivo,$IdSolicitudRetiro,$Resultado['Email']);
        }*/

        return $Resultado;

    }//



    function RechazarSolicitudRetiro($IdSolicitudRetiro, $Motivo ,$IdUsuarioRechaza){

        $Date = date('Y-m-d H:i:s');

        $sql = "CALL RECHAZAR_SOLICITUD_RETIRO(?, ?, ?, ?)";
        $stmt = $GLOBALS['DB']->prepare($sql);
        $stmt->execute(array($IdSolicitudRetiro ,$Motivo , $IdUsuarioRechaza, $Date));
        $Resultado = $stmt->fetch();

        if($Resultado['CODERROR'] == 0)
        {
            require_once('PHPMailer/plantillas.php');
            plantillas::EmailRechazo($Motivo,$IdSolicitudRetiro,$Resultado['Email']);
        }

        return $Resultado;

    }//

    function GenerarCodigosRecarga(){
       
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codeAlphabet.= "0123456789";
        $max = strlen($codeAlphabet); // edited

        for ($i=0; $i < 12; $i++) {
            $token .= $codeAlphabet[random_int(0, $max-1)];
        }

        return $token;
    }//

    function InsertarCodigo($Codigo , $Monto , $IdUsuario,$Vendido){

        $Date = date('Y-m-d H:i:s');

        $sql = "CALL INSERTAR_CODIGO(?, ?, ?, ? , ?)";
        $stmt = $GLOBALS['DB']->prepare($sql);
        $stmt->execute(array($Codigo,$Monto,$IdUsuario,$Date,$Vendido));
        $Resultado = $stmt->fetch();

        return $Resultado;
    }//

    function SelectVouchers(){

        $sqlQuery = "CALL SELECT_VOUCHERS()";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute();
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//

    /*LIMITE NUMEROS*/
    
    function SelectLimitesSorteoDefinicion($IdSorteoDefinicion){

        $sqlQuery = "CALL SELECT_LIMITES_SORTEO_DEFINICION(?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdSorteoDefinicion));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//
    

    function UpdateLimiteNumeroGlobal($IdSorteoDefinicion, $Numero, $Limite){

        $sqlQuery = "CALL UPDATE_LIMITE_NUMERO_GLOBAL(?, ?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdSorteoDefinicion, $Numero, $Limite));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//


    function BloquearLimiteNumeroGLobal($IdSorteoDefinicion, $Numero, $Bloqueado){

        $sqlQuery = "CALL BLOQUEAR_LIMITE_NUMERO_GLOBAL(?, ?, ?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($IdSorteoDefinicion, $Numero, $Bloqueado));
        $Resultado = $stmtQuery->fetch();

        return $Resultado;

    }//

    function ReporteHacienda($FechaInicial , $FechaFinal)
    {
        
        $sqlQuery = "CALL SELECT_REPORTE_HACIENDA( ? , ?);";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($FechaInicial , $FechaFinal));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;
    }

    function SelectReporteUltimaVenta(){

        //$Date = date('Y-m-d');
        $Date = date('Y-m-d', strtotime('-3 days'));
        $Date .= ' 00:00:00';

        $sqlQuery = "CALL SELECT_REPORTE_ULTIMA_VENTA(?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($Date));
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;

    }//

    function ObtenerImagenesBanner()
    {
        $sqlQuery = "CALL SELECT_BANNER();";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute();
        $Resultado = $stmtQuery->fetchAll();

        return $Resultado;
    }
   function GuardarBanner($img , $prioridad,$url)
    {
        $sqlQuery = "CALL INSERT_BANNER(?,?,?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($img , $prioridad,$url));
        $Resultado = $stmtQuery->fetch();

        return $Resultado['CODERROR'];
    }
    static function SelectBannerImagen($Id)
    {

        $sqlQuery = "CALL SELECT_BANNER_IMAGEN(?)";
        $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
        $stmtQuery->execute(array($Id));
        if($stmtQuery->rowCount() > 0 )
        {
            $stmtQuery->bindColumn(1,$img,PDO::PARAM_LOB);
            $stmtQuery->fetch(PDO::FETCH_BOUND);
            return $img;
        }

    }
     function DeleteImagenBanner($Id)
    {
        try
        {
            $sqlQuery = "DELETE FROM BannerPrincipal WHERE Id = ?";
            $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
            $stmtQuery->execute(array($Id));

            return 0;
        }
        catch(Exception $e)
        {
            return -99;
        }
    }
    function UpdatePrioridadImagenBanner($Id , $prioridad)
    {
        try
        {
            $sqlQuery = "UPDATE BannerPrincipal SET Prioridad = ? WHERE Id = ?";
            $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
            $stmtQuery->execute(array( $prioridad, $Id));

            return 0;
        }
        catch(Exception $e)
        {
            return -99;
        }
    }
    function InsertTiqueteGolden($idGolden , $clave , $consecutivo , $monto , $iva )
    {
        try
        {
            $Date = date('Y-m-d H:i:s');
            $sqlQuery = "CALL INSERT_TIQUETE_GOLDEN(?,?,?,?,?,?)";
            $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
            $stmtQuery->execute(array($idGolden , $clave , $consecutivo , $monto , $iva , $Date ));

            $Resultado = $stmtQuery->fetch();

            return $Resultado['CODERROR'];
        }
        catch(Exception $e)
        {
            return -99;
        }

    }
    function SelectCountGolden($idGolden)
    {
            $sqlQuery = "CALL SELECT_COUNT_TIQUETE_GOLDEN(?)";
            $stmtQuery = $GLOBALS['DB']->prepare($sqlQuery);
            $stmtQuery->execute(array( $idGolden ));

            $Resultado = $stmtQuery->fetch();

            return $Resultado['Existe'];
    }



}//Fin clase