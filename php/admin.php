<?php
require 'inicializador.php';
$tabla = 'usuarios';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$contactos = $query->selectALL($tabla);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
<style>
    .btn-eliminar {
        width: auto;
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
    }

    .btn-sm-custom {
        width: auto;
        padding: 0.5rem 1rem;
        /* Ajustar padding para ambos botones */
        font-size: 1rem;
        /* Asegurar que ambos tengan el mismo tamaño de fuente */
        display: inline-block;
        text-align: center;
    }

    .btn-editar,
    .btn-eliminar {
        width: 100%;
        /* Ambos botones ocupan el mismo ancho en su celda */
    }

    .btn-eliminar {
        width: auto;
        /* El ancho del botón se ajusta al contenido */
        padding: 0.25rem 0.5rem;
        /* Ajuste de padding para un tamaño más pequeño */
        font-size: 0.875rem;
        /* Tamaño de fuente más pequeño */
    }
</style>

<body>
    <header class="container">
        <hr>
        <div class="row">
            <div class="col-4"><img class="img-fluid" src="../img/luna.jpg" alt=""></div>
            <div class="col-4 text-muted text-end"></div>
        </div>
        <hr>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active" aria-current="page" href="../index.php">Inicio</a>
                        <a class="nav-link active" href="contacros.php">Contacto</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!--Empieza la tabla-->
    <div class="container mt-5">
        <h1 class="mb-3">Lista de Usuarios</h1>
        <h2>Buscar Usuario 🔍</h2><br>
        <input class="form-control w-25" id="searchInput" type="text" placeholder="Buscar por nombre..."><br>

        <table class="table table-sm table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Contraseña</th>
                    <th>Apellido Materno</th>
                    <th>Número</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <?php foreach ($contactos as $contacto): ?>
                    <tr>
                        <td><?= $contacto->nombre ?></td>
                        <td><?= $contacto->contra ?></td>
                        <td><?= $contacto->email ?></td>
                        <td><?= $contacto->numero ?></td>
                        <td><a class="btn btn-success btn-ediatar" href="edusuario.php?id=<?= $contacto->id ?>">Editar✏️</a>
                        </td>
                        <td>
                            <form action="eliminarusuario.php" method="post"
                                onsubmit="return confirm('¿Estás seguro que deseas eliminar el registro?');">
                                <input hidden type="text" value="<?= $contacto->id ?>" name="id">
                                <button type="submit" class="btn btn-danger btn-sm btn-eliminar">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <!--Termina la tabla-->

    <footer>
        <div class="container-fluid copy">
            <p class="copi">Todos los derechos reservados &copy;. Lunita 2022</p>
        </div>
    </footer>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/busqueda.js"></script>
</body>

</html>