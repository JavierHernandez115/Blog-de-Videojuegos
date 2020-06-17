<?php
require_once 'Includes/Conexion.php';
$EntradaId= isset($_GET)? $_GET['Id']:false;

$Consulta="DELETE FROM Entradas WHERE Id='$EntradaId'";
$Sql= mysqli_query($db, $Consulta);
if($Sql){
    header('LOCATION: Index.php');
}else{
    header('LOCATION: Entradas.php');
}


