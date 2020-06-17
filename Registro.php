<?php

require_once 'Includes/Conexion.php';

//var_dump($_POST);
$Errores = array();
if (isset($_POST)) {
    //Llenar los valores de la BD
    $Nombre = isset($_POST['Nombre']) ? mysqli_real_escape_string($db, $_POST['Nombre']) : false;
    $Apellidos = isset($_POST['Apellidos']) ? mysqli_real_escape_string($db, $_POST['Apellidos']) : false;
    $Email = isset($_POST['Email']) ? mysqli_real_escape_string($db, $_POST['Email']) : false;
    $Password = isset($_POST['Password']) ? mysqli_real_escape_string($db, $_POST['Password']) : false;
}

if (empty($Nombre) || is_numeric($Nombre) || preg_match('/[0-9]/', $Nombre)) {
    $Errores['Nombre'] = 'El Nombre Tiene Un Error';
}

if (empty($Apellidos) || is_numeric($Apellidos) || preg_match('/[0-9]/', $Apellidos)) {
    $Errores['Apellidos'] = 'Los Apllidos tienen Un Error';
}

if (empty($Email) || !filter_var($Email, FILTER_VALIDATE_EMAIL)) {
    $Errores['Email'] = 'El Correo Es Invalido';
}

if (empty($Password)) {
    $Errores['Password'] = 'La Contraseña Esta Vacia';
}

if (count($Errores) == 0) {
    //Registrar Usuario
    $PassCifrada = password_hash($Password, PASSWORD_BCRYPT, ['cost<=4']);
    $Consulta = "INSERT INTO Usuarios VALUES(null,'$Nombre','$Apellidos','$Email','$PassCifrada',CURDATE());";
    $Resultado = mysqli_query($db, $Consulta);
    if ($Resultado) {
        echo 'Exito';
        $_SESSION['Completados'] = 'El registro se ha completado con éxito';
        
    } else {
        $_SESSION['Errores']['Generales'] = 'Fallo al guardar Usuario!!';
    }
} else {
    //Mostrar Errores
    $_SESSION['Errores'] = $Errores;
}
header('Location: index.php');



