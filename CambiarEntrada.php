<?php
require_once 'Includes/Renviar.php';
require_once 'Includes/Cabecera.php';
require_once 'Includes/BarraLateral.php';
$Entradas = EntradasIndividuales($db, isset($_GET) ? $_GET['Id'] : false);
$Categorias = ConsultaCategorias($db, false, null);
if (!empty($Entradas)):
    $Entrada = mysqli_fetch_assoc($Entradas);
endif;
?>
<div id="Principal">
    <h1>Edita la Entrada</h1>
    <form method="POST" action="ActualizarEntrada.php?Id=<?=($_GET)? $_GET['Id']:false?>">
        <?php echo isset($_SESSION['ErrorActualizarEntradas'])? MostrarErrores($_SESSION['ErrorActualizarEntradas'], 'Titulo'):false;?>
        <label for="Titulo">Titulo</label>
        <input type="text" name="Titulo" value="<?= $Entrada['Titulo'] ?>">
        
        <?php echo isset($_SESSION['ErrorActualizarEntradas'])? MostrarErrores($_SESSION['ErrorActualizarEntradas'], 'Descripcion'):false;?>
        <label for="Descripcion">Descripcion</label>
        <textarea name="Descripcion"><?= $Entrada['Descripcion'] ?></textarea>
        
        <?php echo isset($_SESSION['ErrorActualizarEntradas'])? MostrarErrores($_SESSION['ErrorActualizarEntradas'], 'Categorias'):false;?>
        <label for="Categorias">Selecciona La Categoria de la entrada</label>
        <select name="Categorias">
            <?php
            if(!empty($Categorias)):
                while ($Categoria= mysqli_fetch_assoc($Categorias)):?>
            <option value="<?=$Categoria['Id']?>" <?=($Entrada['Categoria_Id']==$Categoria['Id']) ? 'selected="Selected"' :false;?>>
                    <?=$Categoria['Nombre']?>
                    </option>
                
            <?php endwhile;
            endif;?>
?>
        </select>
        <input type="submit" value="Actualizar">
    </form>
    <?php BorrarSesiones();?>
</div>



<?php require_once 'Includes/Footer.php'; ?>

