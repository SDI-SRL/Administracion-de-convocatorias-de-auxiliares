<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Universidad Mayor de San simon</title>
    <link rel="stylesheet" href="style/bootstrap.css">
    <link rel="stylesheet" href="style/myStyle.css">
</head>
<body>
    <?php
        if(isset($_GET['error'])){
            echo "<script>";
            echo    "alert('Error al autentificar');";
            echo "</script>";
        }
    ?>
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h3>
                            Facultad de Ciencias y Tecnologia 
                            <p><small>Departamento de Informatica-Sistemas</small></p>
                            <h2 class="text-center" >Publicaciones de Convocatorias</h2>
                        </h3>
                        <br>
                    </div>
                    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-dark bg-dark">
                        <a class="navbar-brand text-white">
                            <img src="recursos/img/logoUMSS.png" height="60px">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="navbar-toggler-icon"></span>
                        </button> <a class="navbar-brand" href="#">Menu</a>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link" href="index.php">Inicio<span class="sr-only">(Actual)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Personal</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Contactenos</a>
                                </li>
                                <!--
                                <li class="nav-item">
                                    <a class="nav-link" href="paginas/login.php">Inicio Sesion</a>
                                </li>
                                -->
                            </ul>
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="paginas/login.php">Inicio Sesion</a>
                                </li>
                            </ul>
                                <!--
                                <form class="form-inline">
                                    <input class="form-control mr-sm-2" type="text"> 
                                    <button class="btn btn-primary my-2 my-sm-0" type="submit">
                                        Buscar
                                    </button>
                                </form>
                                -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <section>
        <div class="d-block w-75 mx-auto">
            <br>
            <h2 class="text-center" >Convocatorias</h2>
            <br>
            <?php
                date_default_timezone_set('America/La_Paz');
                $fechaActual=date("Y-m-d H:i:s");
                include_once("modelo/convocatoria.php");
                $convocatoria= new  Convocatoria();
                $consulta=$convocatoria->mostrarConvocatoriaFechaAscendente($fechaActual);
                foreach($consulta as $elemento){
                    echo "<h2>".$elemento['titulo']."</h2>";
                    echo "<h5>Descripcion del documento</h5>";
                    echo "<h6>".$elemento['descripcion_convocatoria']."</h6>";
                    echo "<a href='".$elemento['direcccion_pdf']."' target='_blank' >Abrir archivo ".$elemento['titulo']."</a>";
                    echo "<p class='float-right'>".$elemento['fecha']."</p>";
                    echo "<hr>";
                }
                $convocatoria->cerrarConexion();
                
            ?>
        </div>
    </section>
    <?php include("plantillas/footer.php");?>
</body>
</html>
