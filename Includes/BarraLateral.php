<!----BarraLateral--->
<?php require_once 'Includes/Helpers.php'; ?>

<aside id="Slidebar">
    <?php if (isset($_SESSION['Usuario'])): ?>
    
        <div id="Buscador" class="block_Asile">
            <h3>Busca en el Blog</h3>
            <form method="POST" action="Buscar.php">
                <input type="text" name="Busqueda"/>
                <input type="submit" value="Entrar"/>
            </form>
        </div>
    
        <div id="UsuarioLogin" class="block_Asile">
            <h3><?= 'Bienvenido ' . $_SESSION['Usuario']['Nombre'] . ' ' . $_SESSION['Usuario']['Apellidos']; ?></h3>
            <a href="CrearEntradas.php" class="Boton Boton-Verde">Crear Entradas</a>
            <a href="CrearCategorias.php" class="Boton">Crear Categorias</a>
            <a href="MisDatos.php" class="Boton Boton-Naranja">Mis Datos</a>
            <a class="Boton BotonRojo" href="CerrarSesion.php">Cerrar Sesion</a>
        </div>
    <?php endif; ?>
    <?php if (!isset($_SESSION['Usuario'])): ?>
        <div id="Login" class="block_Asile">
            <h3>Identificate</h3>

            <?php if (isset($_SESSION['ErrorLogin'])) : ?>
                <div class="Alertas AlertasError">
                    <?= $_SESSION['ErrorLogin'] ?>
                </div>
            <?php endif; ?>
            <form action="Login.php" method="POST">
                <label for="Email">Email</label>
                <input type="email" name="Email"/>

                <label for="Password">Contraseña</label>
                <input type="password" name="Password"/>

                <input type="submit" value="Entrar"/>
            </form>
        </div>
        <div id="Registro" class="block_Asile">
            <h3>Registrarse</h3>
            <?php if (isset($_SESSION['Completados'])): ?>
                <div class="Alertas AlertasExito">
                    <?= $_SESSION['Completados'] ?>
                </div>
            <?php elseif (isset($_SESSION['Errores']['Generales'])): ?>
                <div class="Alertas AlertasError">
                    <?= $_SESSION['Errores']['Generales'] ?>
                </div>
            <?php endif; ?>
            <form action="Registro.php" method="POST">
                <label for="Nombre">Nombre</label>
                <input type="text" name="Nombre"/>
                <?php echo isset($_SESSION['Errores']) ? MostrarErrores($_SESSION['Errores'], 'Nombre') : false; ?>
                <label for="Apellidos">Apellidos</label>
                <input type="text" name="Apellidos"/>
                <?php echo isset($_SESSION['Errores']) ? MostrarErrores($_SESSION['Errores'], 'Apellidos') : false; ?>

                <label for="Email">Email</label>
                <input type="email" name="Email"/>
                <?php echo isset($_SESSION['Errores']) ? MostrarErrores($_SESSION['Errores'], 'Email') : false; ?>

                <label for="Password">Contraseña</label>
                <input type="password" name="Password"/>
                <?php echo isset($_SESSION['Errores']) ? MostrarErrores($_SESSION['Errores'], 'Password') : false; ?>

                <input type="submit" value="Log in"/>
            </form>
            <?php BorrarSesiones(); ?>
        </div>
    <?php endif; ?>
</aside>