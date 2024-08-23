<?php
require 'inicializador.php';
$tabla="usuarios";

//echo 'Estoy recibiendo informacion<br>';

$parametros = [
    'nombre'=>$_POST['nombre'],
    'contra'=>$_POST['contra'],
    'email'=>$_POST['email'],
    'numero'=>$_POST['numero'],
];
$query->crear($tabla,$parametros);
header('Location: login.php');