<?php
require_once 'Includes/Conexion.php';
require_once 'Includes/Renviar.php';
require_once 'Includes/Cabecera.php';
require_once 'Includes/BarraLateral.php';
//require_once 'RegistrarCategorias.php';
?>
<div id="Principal">
    <h1>Crear Categorias</h1>
    <p>
        Añade Nuevas Categorias al blog para que los usuarios puedan usarlas al
        crear sus entradas
    </p>
    <br/>
    <form action="RegistrarCategorias.php" method="POST">
      
        <label for="Nombre">Nombre de la categoria</label>

        <input type="text" name="Nombre">

        <input type="submit" value="Registrar">
    </form>

</form>
</div>


<?php require_once 'Includes/Footer.php'; ?>

