<?php
require 'inicializador.php';
$tabla="asuntos";

//echo 'Estoy recibiendo informacion<br>';

$parametros = [
    'nombre'=>$_POST['nombre'],
    'email'=>$_POST['email'],
    'asunto'=>$_POST['asunto'],
    'mensaje'=>$_POST['mensaje']
];
$query->crear($tabla,$parametros);
header('Location: ../index.php');