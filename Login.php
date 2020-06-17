<?php

//Conexion a la bd
require_once 'Includes/Conexion.php';
if (isset($_POST)) {
    $Email= isset($_POST['Email'])? mysqli_real_escape_string($db,$_POST['Email']):false;
    $Password= isset($_POST['Password'])? mysqli_real_escape_string($db,$_POST['Password']): false;
//  Ver si el usuario Existe
    var_dump($_POST);
    $Consulta="SELECT * FROM Usuarios WHERE CorreoElectronico='$Email'";
//  echo $Consulta;
    $Sql=mysqli_query($db, $Consulta);  
//    var_dump($Sql);
     if($Sql && mysqli_num_rows($Sql)==1){
//  Verificar la Contraseña
        $Usuario= mysqli_fetch_assoc($Sql);
        $Verificar= password_verify($Password,$Usuario['Password']);
        if($Verificar){
            $_SESSION['Usuario']=$Usuario;
            if(isset($_SESSION['ErrorLogin'])){
                unset($_SESSION['ErrorLogin']);
            }
        }else{
            $_SESSION['ErrorLogin']='Contraseña Incorrecta';
        }
    }else{
//  El Correo No se encuentra en la BD
        $_SESSION['ErrorLogin']='Usuairo Inexistente';
    }
}
//Redirigir al index

header('Location: index.php');