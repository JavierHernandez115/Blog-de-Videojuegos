<?php
require_once 'Includes/Renviar.php';;
require_once 'Includes/Cabecera.php';
require_once 'Includes/BarraLateral.php';
?>
<div id="Principal">
    <h1>Resultado</h1>
    <?php
    $Entradas = ConsultarEntradas($db,false,null,isset($_POST) ? mysqli_real_escape_string($db,$_POST['Busqueda']):false);
    
    if(!empty($Entradas)):
        while ($Entrada = mysqli_fetch_assoc($Entradas)):
            ?>
            <article class="Entrada">
                <a href="Entradas.php?Id=<?=$Entrada['Id']?>">
                    <h2><?= $Entrada['Titulo'] ?></h2>
                    <span class="Fecha">
                        <?= $Entrada['Categoria'].' | '.$Entrada['Fecha']; ?>
                    </span>
                    <p>
                        
                        <?= substr($Entrada['Descripcion'],0,180).'...' ?>
                    </p>
                </a>
<?php
    endwhile;   
 endif;
 ?>
<?php require_once 'Includes/Footer.php';?>

