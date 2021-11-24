<?php
try {

    $pdoConn = new PDO("mysql:host=$DB_Servidor;dbname=$DB_Database", $DB_Username, $DB_Password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $pdoConn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $pdoConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}