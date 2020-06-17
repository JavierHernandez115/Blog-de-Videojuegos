<?php
require_once 'Includes/Cabecera.php';
require_once 'Includes/BarraLateral.php';
?>
<div id="Principal">
    <?php
    $Categorias = ConsultaCategorias($db, true, isset($_GET['id']) ? $_GET['id'] : null);
    if (!empty($Categorias)):
        $Categoria = mysqli_fetch_assoc($Categorias);
        ?>
        <h1>Entradas de <?= $Categoria['Nombre'] ?></h1>
    <?php endif; ?>
        <?php
    $Entradas = ConsultarEntradas($db,false,(isset($_GET['id']) ? $_GET['id'] : null),null);
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
    <?php
    require_once 'Includes/Footer.php';
    ?>