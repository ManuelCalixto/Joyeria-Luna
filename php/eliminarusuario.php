<?php
require 'inicializador.php';
$tabla = "usuarios";
$id = $_POST['id'];
$tareas = $query->eliminarRegistro($tabla, $id);
header('Location: admin.php');