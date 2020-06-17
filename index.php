<?php
require_once 'Includes/Cabecera.php';
require_once 'Includes/BarraLateral.php';
require_once 'Includes/Helpers.php';
?>
<div id="Principal">
    <h1>Ultimas Entradas</h1>
    <?php
    $Entradas = ConsultarEntradas($db,true,null,null);
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
    <div id="ver-todas">
        <a href="TodasLasEntradas.php">Ver todas las entradas</a>
    </div> 
</div>
<?php require_once 'Includes/Footer.php'; ?>