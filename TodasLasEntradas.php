<?php
require_once 'Includes/Cabecera.php';
require_once 'Includes/BarraLateral.php';
?>
<div id="Principal">
    <h1>Todas Las Entradas</h1>
     <?php
    $Entradas = ConsultarEntradas($db,false,null,null);
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
            </article>

<?php 
        endwhile; 
    endif;
?>
</div>
<?php require_once 'Includes/Footer.php';?>
