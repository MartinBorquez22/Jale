<?php include("../Conexion/conexion.php");

if (!isset($_GET['Buscar'])) {
    $_GET['Buscar'] = "";
    $Buscar = $_GET['Buscar'];
}
$Buscar = $_GET['Buscar'];
$sqlPubli = "SELECT * from web Where nombre Like '%".$Buscar."%'  ";
$result1 = mysqli_query($con, $sqlPubli);

?>