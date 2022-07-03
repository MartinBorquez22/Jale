<?php
if (!isset($_GET['idWeb'])) {
    header('Location: crudWeb.php?mensaje=error');
    exit();
}

include_once '../Conexion/conexion.php';
$codigo = $_GET['idWeb'];

$sentencia = $con->prepare("DELETE FROM web where idWeb = ?;");
$resultado = $sentencia->execute([$codigo]);

if ($resultado === TRUE){
    header('Location: crudWeb.php?mensaje=eliminado');
}else{
    header('Location: crudWeb.php?mensaje=error');
    exit();
}

?>