<?php
require_once 'Includes/Conexion.php';
require_once 'Includes/Helpers.php';
if(isset($_POST)){
    $Nombre= isset($_POST['Nombre'])? mysqli_real_escape_string($db,$_POST['Nombre']):false;
    $Apellidos= isset($_POST['Apellidos'])? mysqli_real_escape_string($db,$_POST['Apellidos']):false;
    $Email= isset($_POST['Email'])? mysqli_real_escape_string($db,$_POST['Email']):false;
    $Id=$_SESSION['Usuario']['Id'];
    $Alertas=array();
    if(empty($Nombre)|| is_numeric($Nombre) ||preg_match('/0-9/',$Nombre)){
       $Alertas['Nombre']='Error en el Nombre!!'; 
    }
    if(empty($Apellidos)|| is_numeric($Apellidos)|| preg_match('/0-9/', $Apellidos)){
        $Alertas['Apellidos']='Error en los Apellidos!!';
    }
    if(empty($Email) || !filter_var($Email,FILTER_VALIDATE_EMAIL)){
        $Alertas['Email']='Error en el correo Electronico';
    }else{
        $Consulta="SELECT * FROM Usuarios WHERE CorreoElectronico='$Email'";
        $Sql= mysqli_query($db, $Consulta);
        if($Sql && mysqli_num_rows($Sql)>=1){
//            echo 'Aqui';
//            die();
            $Alertas['Email']='El Correo Electronico Ya Existe';
        }
    }
    
    if(count($Alertas)==0){
        //Actualizar Usuario
        $Consulta="UPDATE Usuarios SET Nombre='$Nombre',Apellidos='$Apellidos',CorreoElectronico='$Email'"
                . " WHERE Id='$Id'";
//        echo $Consulta;
//            die();
        $Sql= mysqli_query($db, $Consulta);
        if($Sql){
            $Alertas['Exito']='Exito al Actualizar';
            ActualizarSesion($Nombre, $Apellidos, $Email);
            header('LOCATION: Index.php');
        }else{
            
            $Alertas['ErrorGeneral']='Error al Actulaizar';
            header('LOCATION: MisDatos.php');
        }
    } else {
        
        $_SESSION['ErrorActualizarDatos']=$Alertas;
        header('LOCATION: MisDatos.php');
        
    }
}



