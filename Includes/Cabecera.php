<?php require_once 'Conexion.php'; 
require_once 'Helpers.php';?>

<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Blog de videojuegos</title>
        <link rel="stylesheet" type="text/css" href="assets/css/styles.css" >
    </head>
    
    <body>
        <!--------Cabecera------>
        <header id="Header">
            <div id="Logo">
                <a href="index.php">
                    Blog de videojuegos
                </a>
            </div>
            <!--------Menu------>
        <nav id="Nav">
            
            <ul>
                <li>
                    <a href="index.php">Inicio</a>
                </li>
                <?php
                $Categorias=ConsultaCategorias($db,false,null);
                if(!empty($Categorias)):
                    while ($Categoria= mysqli_fetch_assoc($Categorias)):                
                ?>
                        <li>
                            <a href="Categoria.php?id=<?=$Categoria['Id']?>"><?=$Categoria['Nombre']?></a>
                        </li>
                
                <?php 
                    endwhile;
                endif;
                ?>
                
                <li>
                    <a href="index.php">Sobre mi</a>
                </li>
                <li>
                   <a href="index.php">Contacto</a> 
                </li>                           
            </ul>
        </nav>
            <div class="clearfix"></div>
        </header>
        <div class="Contenedor">
        