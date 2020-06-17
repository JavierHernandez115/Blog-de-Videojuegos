<?php
require_once 'Includes/Cabecera.php';
require_once 'Includes/BarraLateral.php';
?>
<div id="Principal"><?php
    $Entradas = EntradasIndividuales($db, isset($_GET['Id']) ? $_GET['Id'] : false);
    $Usuario = isset($_SESSION['Usuario']) ? $_SESSION['Usuario']['Id'] : false;
    if (!empty($Entradas)):
        $Entrada = mysqli_fetch_assoc($Entradas);
        ?>
        <h1><?= $Entrada['Titulo'] ?></h1>
        <article class="Entrada">

            <span class="Fecha">
                <h2><?= $Entrada['Categoria'] . ' | ' . $Entrada['Fecha']; ?></h2>
            </span>
            <p>

                <?= $Entrada['Descripcion'] ?>
            </p>

        </article>
    <?php
    endif;
    if ($Entrada['Usuario_Id'] == $Usuario):
        ?>
        <div id="Botones">
            <a class="Boton Boton-Naranja" href="CambiarEntrada.php?Id=<?= $Entrada['Id'] ?>">Edita la entrada</a>
            <a href="EliminarEntrada.php?Id=<?= $Entrada['Id'] ?>" class="Boton BotonRojo">Eliminar Entrada</a>
        </div> 
        
        
<?php endif; ?>
</div>

<?php require_once 'Includes/Footer.php'; ?>