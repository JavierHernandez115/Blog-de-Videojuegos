<?php

function MostrarErrores($Erorres, $Campo) {
    $Alerta = '';
    if (!empty($Campo) && isset($Erorres[$Campo])) {
        $Alerta = "<div class='Alertas AlertasError'>$Erorres[$Campo] </div>";
    }
    return $Alerta;
}

function BorrarSesiones() {
    $_SESSION['Errores'] = null;
    if (isset($_SESSION['Completados'])) {
        $_SESSION['Completados'] = null;
        unset($_SESSION['Completados']);
    }
    if (isset($_SESSION['Errores']['Generales'])) {
        $_SESSION['Errores']['Generales'] = null;
        unset($_SESSION['Errores']['Generales']);
    }
    if (isset($_SESSION['ErrorEntradas'])) {
        $_SESSION['ErrorEntradas'] = null;
    }
    if (isset($_SESSION['ErrorActualizarDatos'])) {
        $_SESSION['ErrorActualizarDatos'] = null;
    }
    if (isset($_SESSION['ErrorActualizarEntradas'])) {
        $_SESSION['ErrorActualizarEntradas'] = null;
    }
    unset($_SESSION['Errores']);
}

function ConsultaCategorias($db, $Individual, $Id) {
    $Consulta = 'SELECT * FROM Categorias';
    if ($Individual) {
        $Consulta = $Consulta . " WHERE Id='$Id'";
    }

    $Sql = mysqli_query($db, $Consulta);
    $Categorias = array();
    if ($Sql && mysqli_num_rows($Sql) >= 1) {
        $Categorias = $Sql;
    } else {
        $Categorias = false;
    }
    return $Categorias;
}

function ConsultarEntradas($db, $Limite, $CategoriaId, $Busqueda) {
    $Consulta = "SELECT e.*, c.Nombre AS 'Categoria' FROM Entradas e INNER JOIN Categorias c ON " .
            'e.Categoria_Id=c.Id  ';
    if ($Limite) {
        $Consulta = $Consulta . ' ORDER BY e.Id DESC LIMIT 4';
    } else {
        if ($CategoriaId != null) {
            $Consulta = $Consulta . " WHERE e.Categoria_Id='$CategoriaId' ORDER BY e.Id DESC ";
        } else {
            if (!empty($Busqueda)) {
                $Consulta = $Consulta . " WHERE e.Titulo LIKE '%$Busqueda%'";
            }
            
            $Consulta = $Consulta . ' ORDER BY e.Id DESC';
        }
    }

    $Sql = mysqli_query($db, $Consulta);
    $Entradas = array();
    if ($Sql && mysqli_num_rows($Sql) >= 1) {
        $Entradas = $Sql;
    } else {
        $Entradas = false;
    }
    return$Sql;
}

function EntradasIndividuales($db, $EntradaId) {
    $Consulta = "SELECT e.*,c.Nombre AS 'Categoria' FROM Entradas e INNER JOIN Categorias c ON"
            . " e.Categoria_Id=c.Id WHERE e.Id='$EntradaId'";
//    echo $Consulta;
//    die();
    $Sql = mysqli_query($db, $Consulta);
    $Entradas = array();
    if ($Sql && mysqli_num_rows($Sql) >= 1) {
        $Entradas = $Sql;
    } else {
        $Entradas = false;
    }
    return$Sql;
}

function ActualizarSesion($Nombre, $Apellidos, $Email) {
    $_SESSION['Usuario']['Nombre'] = $Nombre;
    $_SESSION['Usuario']['Apellidos'] = $Apellidos;
    $_SESSION['Usuario']['CorreoElectronico'] = $Email;
}
