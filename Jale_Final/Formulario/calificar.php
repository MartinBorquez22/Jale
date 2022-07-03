<?php
include_once '../Conexion/conexion.php';
include_once '../Session/sessionUser.php';

$estrellas = $_POST['estrellas'];
$idUser = $_SESSION['idUsuarioUser'];
$idWeb = $_POST['idWeb'];
$sentencia = $con->prepare("UPDATE web SET valoracion = ? where idWeb = '$idWeb';");
$resultado = $sentencia->execute([$estrellas]);

if ($resultado == TRUE) {
    header('Location: verWeb.php');
} else {
    header('Location: verWeb.php');
    exit();
}

?>