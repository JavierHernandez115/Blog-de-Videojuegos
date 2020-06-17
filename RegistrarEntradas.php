<?php
require_once 'Includes/Conexion.php';
$Alertas=array();
if(isset($_POST)){
    $Titulo= isset($_POST['Titulo'])? mysqli_real_escape_string($db,$_POST['Titulo']):false;
    $Descripcion= isset($_POST['Descripcion']) ? mysqli_real_escape_string($db,$_POST['Descripcion']):false;  
    $Categoria= isset($_POST['Categoria']) ? mysqli_real_escape_string($db,$_POST['Categoria']):false;
    $UsuarioId=$_SESSION['Usuario']['Id'];
    
    if(empty($Titulo)){
       $Alertas['Titulo']='El Titulo esta Vacio¡¡';
    }
    if(empty($Descripcion)){
        $Alertas['Descripcion']='La Descripcion esta Vacia¡¡' ;
    }
    if(count($Alertas)==0){
        $Consulta="INSERT INTO Entradas VALUES(null,'$UsuarioId','$Categoria','$Titulo','$Descripcion',CURDATE())";
//        echo $Consulta;
//        die();
        header('LOCATION: index.php');
        $Sql= mysqli_query($db, $Consulta);
        if($Sql){
            $_SESSION['Exito']='La entrada se ha registrado con exito';
        }else{
            $_SESSION['ErrorGeneral']='Error al registrar la entrada';
        }        
    }else{
        $_SESSION['ErrorEntradas']=$Alertas;
        header('LOCATION: CrearEntradas.php');
    }
    
}

