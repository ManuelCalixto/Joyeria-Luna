<?php
require 'conexion.php';
require 'consultas.php';

$pdo = Conexion::star();
$query = new Consultas ($pdo);