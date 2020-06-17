<?php
require_once 'Includes/Conexion.php';
if(isset($_POST)){
    $EntradaId= isset($_GET)?$_GET['Id']:false;
    $Alertas=array();
    $Titulo= isset($_POST['Titulo']) ? mysqli_real_escape_string($db,$_POST['Titulo']):false;
    $Descripcion= isset($_POST['Descripcion']) ? mysqli_real_escape_string($db,$_POST['Descripcion']):false;
    $Categoria= isset($_POST['Categorias']) ? mysqli_real_escape_string($db,$_POST['Categorias']):false;
    if(empty($Titulo)){
        $Alertas['Titulo']='El Titulo esta Vacio';
    }
    
    if(empty($Descripcion)){
        $Alertas['Descripcion']='La Descripcion esta Vacia';
    }
    
    if(empty($Categoria)){
        $Alertas['Categoria']='Categoria no valida';
    }
    if(count($Alertas)==0){
        $Consulta="UPDATE Entradas SET Titulo='$Titulo', "
                . "Categoria_Id='$Categoria', Descripcion='$Descripcion' "
                . " WHERE Id='$EntradaId'";
        $Sql= mysqli_query($db, $Consulta);
        if($Sql){
            header('LOCATION: Index.php');
        }else{
            
        }
        
    }else{
        $_SESSION['ErrorActualizarEntradas']=$Alertas;
        header("LOCATION: CambiarEntrada.php?Id=$EntradaId");
    }

}
