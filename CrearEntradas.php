<?php
require_once 'Includes/Conexion.php';
require_once 'Includes/Renviar.php';
require_once 'Includes/Cabecera.php';
require_once 'Includes/BarraLateral.php';
?>
<div id="Principal">
    <h1>Crear Entradas</h1>
    <p>
        Crea entradas para que todos lo podemos ver
    </p>
    <br/>
    <form action="RegistrarEntradas.php" method="POST">
        <?PHP echo isset($_SESSION['ErrorEntradas'])? MostrarErrores($_SESSION['ErrorEntradas'],'Titulo'):'';?>
        <label for="Titulo">Titulo de la entrada</label> 
        <input type="text" name="Titulo">
 
        <?PHP echo isset($_SESSION['ErrorEntradas'])? MostrarErrores($_SESSION['ErrorEntradas'],'Descripcion'):'';?>
        <label for="Descripcion">Descripcion de la entrada</label>
        <textarea name="Descripcion"></textarea>
        
        <label for="Categoria">Selecciona la categoria de la entrada</label>
        <select name="Categoria">
            <?php
                $Categorias=ConsultaCategorias($db,false,null);
                if(!empty($Categorias)):
                while ($Categoria= mysqli_fetch_assoc($Categorias)):
            ?>
            <option value="<?=$Categoria['Id']?>">
                <?=$Categoria['Nombre']?>
            </option>
            <?php endwhile;
            endif;?>
        </select>
        <input type="submit" value="Registrar">
    </form>
<?php BorrarSesiones();?>
</form>
</div>


<?php require_once 'Includes/Footer.php'; ?>