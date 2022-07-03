<?php
include("../Session/validarSession.php");
include("../Diseños/header1.html");
include("../Conexion/conexion.php");
?>

<?php
$conexion = mysqli_connect('localhost', 'root', '', 'jale');
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- CDN ICON -->
<!-- SCRIPTS JS-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="../js/main.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
<!-- 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="../Css/style.css">
-->

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">

            <!-- Inicio mensaje de alerta -->
            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta') {
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Rellena todos los campos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            }
            ?>

            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Sitio web registrado</strong> Se agregaron los datos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            }
            ?>

            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado') {
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Sitio web Editado</strong> Se editaron correctamente los datos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php
            }
            ?>

            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {
            ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Eliminado!</strong> Se eliminaron correctamente los datos.
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

            <!-- Fin mensaje de alerta -->

            <!-- Buscador -->
            <div class="form-1-2">
                <label for="caja_busqueda">Buscar:</label>
                <input type="text" name="caja_busqueda" id="caja_busqueda"></input>
            </div>
            <br>
            <section id="datos">
            <div class="card">
                <div class="card-header">
                    Lista de Sitios Web
                </div>
                <div class="p-4">
                    <table class="table align-middle" width="50">
                        <thead>
                            <tr>
                                <th scope="col1">#</th>
                                <th scope="col1">nombre</th>
                                <th scope="col1">url</th>
                                <th scope="col1">tipo</th>
                                <th scope="col1">descripción</th>
                                <th scope="col1" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * from web";
                            $result = mysqli_query($conexion, $sql);

                            while ($mostrar = mysqli_fetch_array($result)) {
                            ?>
                                <tr >
                                    <td><?php echo $mostrar['idWeb'] ?></td>
                                    <td><?php echo $mostrar['nombre'] ?></td>
                                    <td><?php echo $mostrar['url'] ?></td>
                                    <td><?php echo $mostrar['tipo'] ?></td>
                                    <td><?php echo $mostrar['descripcion'] ?> </td  width="50">
                                    <td><a class="text-success" href="editarWeb.php?idInfo=<?php echo $mostrar['idWeb'] ?>"><i class="bi bi-pencil-square"></i></a></td>
                                    <td><a onclick="return confirm('¿Estas seguro de eliminar?');" class="text-danger" href="eliminarWeb.php?idWeb=<?php echo $mostrar['idWeb'] ?>"><i class="bi bi-trash3-fill"></i></a></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
               
            </div>
            </section>
        </div>


        <!-- Formulario para registrar noticias -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Ingresar datos de sitios Web:
                </div>
                <form action="regisWeb.php" class="p-4" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="nombre" placeholder="Ingresar nombre" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Imagen: </label>
                        <input type="file" accept="image/*" class="form-control" name="foto" id="foto" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">url: </label>
                        <input type="url" class="form-control" name="url" placeholder="Ingresar url" autofocus required>
                    </div>
                    <div class="mb-3">
                        <select multiple name="Tipo[]">
                            <option value="Entretencion">Entretencion</option>
                            <option value="Deportes">Deportes</option>
                            <option value="Noticias">Noticias</option>
                            <option value="Ocio">Ocio</option>
                            <option value="Otros">Otros</option>
                        </select><br>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descripción: </label>
                        <textarea name="descripcion"  class="form-control" cols="40" rows="4" required="" placeholder="Ingresar descripcion">                                         
                        </textarea>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include("../Diseños/footer.html");
?>