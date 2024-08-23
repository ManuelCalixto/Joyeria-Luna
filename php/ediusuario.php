<?php
require 'inicializador.php';
$tabla = "usuarios";
$id = $_POST['id'];
$parametros = [
    'nombre'=>$_POST['nombre'],
    'contra'=>$_POST['contra'],
    'email'=>$_POST['email'],
    'numero'=>$_POST['numero'],
];
$query -> actualizar($tabla, $parametros, $id);
header('Location: admin.php');