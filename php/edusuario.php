<?php
require 'inicializador.php';
$tabla = "usuarios";
$id = $_GET['id'];
$usuarios = $query->getRegistro($tabla, $id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <header class="container">
        <hr>
        <div class="row">
            <!--Título-->

            <div class="col-4"><img class="img-fluid" src="../img/luna.jpg" alt=""></div>
            <div class="col-4 text-muted text-end">

            </div>


        </div>
        <!--Fin Título-->
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
                        <a class="nav-link active" aria-current="page" href="../index.php">Inicios</a>

                        <a class="nav-link active" href="contacros.php">Contacto</a>
                        <a class="nav-link active" href="login.php">Login</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!--Empieza el formulario-->>
    <div class="contact_form">
        <div class="formulario">
            <h1>Editar Contacto</h1>
            <h3>Llena los campos</h3>
            <?php foreach ($usuarios as $usuario): ?>
                <form action="ediusuario.php" method="post">
                    <div>
                        <input type="hidden" name="id" value="<?= $usuario->id?>">
                        <label for="nombre">NOMBRE</label>
                        <input type="text" placeholder="Escribe nombre" name="nombre" value="<?= $usuario->nombre?>">

                    </div><br>
                    <div>
                        <label for="contra">CONTRASE´NA</label>
                        <input type="password" placeholder="" name="contra" value="<?= $usuario->contra?>">

                    </div><br>
                    <div>
                        <label for="email">EMAIL</label>
                        <input type="text" placeholder="" name="email" value="<?= $usuario->email?>">

                    </div><br>
                    <div>
                        <label for="numero">NUMERO</label>
                        <input type="text" placeholder="" name="numero" value="<?= $usuario->numero?>">

                    </div><br>
                    <div>
                        <button type="sub">💾 Guardar</button>
        
                    </div>
                <?php endforeach ?>
            </form>
        </div>
    </div>



    <footer>
        <!-- empieza footer-->
        <div class="container">
            <div class="row">
                <div class="col-2" pd-footer>
                    <img src="" class="img-fluid rounded-start" alt="">
                </div>
                <div class="col-4" pd-footer>
                    <h5>Nosotros</h5>
                    <p>
                        Somos una empresa de joyería, con productos de marca y buena calidad, que ofrece
                        diferentes diseños para lograr la satisfacción de nuestros clientes.
                        "El valor sentimental de una Joya se mide por los Recuerdos que concervamos de ella".
                    </p>

                </div>
                <div class="col-4">
                    <h5>Siguenos</h5>
                    <a href="#"><img src="../img/facebook.png" alt=""></a>
                    <a href="#"><img src="../img/instangram.png" alt=""></a>
                    <a href="#"><img src="../img/youtube.png" alt=""></a>

                </div>

            </div>
            <!--Termina clase row-->
        </div>
        <!--termina footer1-->

        <div class="container-fluid copy">
            <!--footer2-->
            <p class="copi">
                Todos los derechos reservados &copy;. Lunita 2022
            </p>

        </div>
        <!--Termina footer 2-->

    </footer>

    <script src="../js/bootstrap.min.js"></script>
</body>

</html>