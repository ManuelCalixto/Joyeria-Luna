<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
require 'inicializador.php';

if (isset($_POST['login'])) {
    if (isset($pdo)) {
        $usuario = $_POST['nombre'];
        $contrasena = $_POST['contra'];
        $sql = "SELECT id, nombre, contra FROM usuarios WHERE nombre=:nombre";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nombre', $usuario);
        if ($stmt->execute()) {
            if ($stmt->rowCount() == 1) {
                $usuario = $stmt->fetch(PDO::FETCH_ASSOC); // Devuelve un array asociativo
                $hashed_password = $usuario['contra'];
                if ($contrasena === $hashed_password) {
                    $_SESSION['loggedin'] = true;
                    $_SESSION['id'] = $usuario['id'];
                    $_SESSION['nombre'] = $usuario['nombre'];
                    header('Location: ../index.php');
                    exit;
                } else {
                    header('Location: ../php/login.php');
                }
            } else {
                $error = "No se encontró una cuenta con ese nombre de usuario.";
                echo $error;
            }
        } else {
            $error = "Algo salió mal. Por favor, inténtalo de nuevo más tarde.";
            echo $error;
        }
    } else {
        die('Error de conexión a la base de datos.');
    }
}