<?php
require_once 'Includes/Renviar.php';
require_once 'Includes/Cabecera.php';
require_once 'Includes/BarraLateral.php';
?>

<div id="Principal">
    <h1>Mis Datos</h1>   
    <form method="POST" action="ActualizarUsuario.php">
        <?php echo isset($_SESSION['ErrorActualizarDatos']) ? MostrarErrores($_SESSION['ErrorActualizarDatos'], 'Nombre') : '' ?>
        <label for="Nombre">Nombre</label>
        <input type="text" name="Nombre" value="<?=$_SESSION['Usuario']['Nombre']?>">

        <?php echo isset($_SESSION['ErrorActualizarDatos']) ? MostrarErrores($_SESSION['ErrorActualizarDatos'],'Apellidos') : '' ?>
        <label for="Apellido">Apellidos</label>
        <input type="text" name="Apellidos" value="<?=$_SESSION['Usuario']['Apellidos']?>">

        <?php echo isset($_SESSION['ErrorActualizarDatos']) ? MostrarErrores($_SESSION['ErrorActualizarDatos'],'Email') : ''?>
        <label for="Email">Correo Electronico</label>
        <input type="email" name="Email" value="<?=$_SESSION['Usuario']['CorreoElectronico']?>">
        
        <input type="submit" value="Actualizar">
    </form>
<?php BorrarSesiones();?>
</div>

<?php require_once 'Includes/Footer.php'; ?>
