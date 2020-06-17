<?php

require_once 'Includes/Conexion.php';
$Nombre = isset($_POST['Nombre']) ? mysqli_real_escape_string($db, $_POST['Nombre']) : false;
$Result = ValidarsiExiste($Nombre, $db);
$Errores = array();
if (empty($Nombre)) {
    $Errores['Errores'] = 'El nombre esta vacio';
}
if ($Result >= 1) {
    $Errores['Existente'] = 'El nombre no existe';
}
if (count($Errores) == 0) {
    $Consulta = "INSERT INTO Categorias VALUES(null,'$Nombre')";
    $Sql = mysqli_query($db, $Consulta);
    if ($Sql) {
        $_SESSION['Exito']['RegistrarCategorias'] = 'Se ha registrado en exito';
    } else {
        $_SESSION['Errores']['RegistrarCategorias'] = 'Error al registrar la categoria!!';
    }
}
header('LOCATION: CrearCategorias.php');

function ValidarsiExiste($Nombre, $db) {
    $Consulta = "SELECT * FROM Categorias WHERE Nombre='$Nombre'";
    $Sql = mysqli_query($db, $Consulta);
    $Result = mysqli_num_rows($Sql);
    return $Result;
}
