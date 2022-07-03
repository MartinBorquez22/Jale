<?php
include("../Session/sessionUser.php");
include("../Diseños/header1.html");
?>
<?php

$conexion = mysqli_connect('localhost', 'root', '', 'jale');

?>


<!DOCTYPE html>
<html lang="es-CL">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.rtl.min.css" integrity="sha384-dc2NSrAXbAkjrdm9IYrX10fQq9SDG6Vjz7nQVKdKcJl3pC+k37e7qJR5MVSCS+wR" crossorigin="anonymous">


    <!-- CDN ICON -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css%22%3E">

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <title>Sitios Web</title>
</head>

<body>
    <?php
    if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {
    ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Se ha añadido exitosamente</strong> Revisa la pestaña mis links para ver mis links
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
    }
    ?>

    <?php
    if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {
    ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>ERROR!</strong> Vuelva a intentar.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
    }
    ?>

    <section class="w-75 mx-auto text-center pt-5">
        <h4 class="p-3 fs-2 border-top border-3">Sección creada para revisar los <span class="text-primary">principales sitios web</span></h4>
    </section>
    <br>
    <br>
    <form action="verWeb.php" method="GET">
        <div class="row w-75 mx-auto servicio-fila">
            <div class="col-md-auto">
                <label for="Ingresa">Ingrese nombre del Sitio web: </label>
            </div>
            <div class="col-3">
                <input type="text" class="form-control" name="Buscar">
            </div>
            <div class="col-3">
                <input class="btn btn-primary" type="submit" value="Buscar">
            </div>
        </div>
    </form>
    <br>
    <section class="container-fluid">
        <div class="row w-75 mx-auto servicio-fila">
            <div class="card">
                <div class="card-header">
                    Sitios Web
                </div>
                <div class="p-4">
                    <table class="table align-middle" width="50">
                        <tbody>
                            <?php
                            include '../App/buscar1.php';
                            while ($mostrar = mysqli_fetch_array($result1)) {
                            ?>
                                <td>
                                    <img width="180px" height="160px" name="Foto" style="margin-top: 20px;" src="data:image/jpg;base64, <?php echo base64_encode($mostrar["foto"]); ?>">
                                </td>
                                <td>
                                    <h2><?php echo $mostrar['nombre'] ?></h2>
                                    <h2><?php echo $mostrar['valoracion'] ?> ★</h2>
                                    <h4><?php echo $mostrar['tipo'] ?></h4>
                                    <h6><?php echo $mostrar['descripcion'] ?></h6>
                                    <?php $asd = $mostrar['url'] ?>
                                    <a href="<?php echo $asd ?>" class="link1" target="_blank">Visitar Sitio</a>

                                </td>

                                <input type="hidden" name="codigo" value="<?php echo $mostrar['idWeb']; ?>">
                                <td>
                                <a onclick="return confirm('¿Desea calificar este Sitio Web?');" class='text-primary' href="valoracion.php?idWeb=<?php echo  $mostrar['idWeb'];?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-sta" viewBox="0 0 16 16">
                    <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z" /></svg></a>
                               

                                    <a onclick="return confirm('¿Desea agregar este Sitio Web?');" class="text-primary" href="agregarWeb.php?idWeb=<?php echo $mostrar['idWeb'] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                        </svg></a></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </section>
    <br>

</body>

</html>