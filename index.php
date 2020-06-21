<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Universidad Mayor de San simon</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <!-- <link href="css1/bootstrap.min.css" rel="stylesheet"> -->
    <!--<link rel="stylesheet" href="../style/bootstrap.css">
    <link rel="stylesheet" href="../style/myStyle.css"> -->
    <link href="css/estilos.css" rel="stylesheet">
</head>

<body>
    <?php
        if(isset($_GET['error'])){
            echo "<script>";
            echo    "alert('Error al autentificar');";
            echo "</script>";
        }
    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h3>
                        Facultad de Ciencias y Tecnologia 
                        <p><small>Departamento de Informatica-Sistemas</small></p>
                    </h3>
                </div>
                <nav class="navbar navbar-expand-lg navbar-primary bg-primary navbar-primary bg-primary">
                    <a class="navbar-brand text-white">
                        <img src="img/logoUMSS.png" height="60px">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="navbar-toggler-icon"></span>
                    </button> <a class="navbar-brand" href="#">Menu</a> <!-- aqui entraba "Menu" -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="navbar-nav">
                            <li class="nav-item ">
                                <a class="nav-link" href="index.php">Inicio<span class="sr-only">(Actual)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Personal</a>
                            </li>
                            <!-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" data-target="desplegable">Descripcion</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Descripcion</a> 
                                    <a class="dropdown-item" href="#">Descripcion</a> 
                                    <a class="dropdown-item" href="#">Descripcion</a>
                                    
                                </div>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contactenos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="paginas/login.php">Inicio Sesion</a>
                            </li>
                        </ul>
                        <form class="form-inline">
                            <input class="form-control mr-sm-2" type="text"> 
                            <button class="btn btn-primary my-2 my-sm-0" type="submit">
                                Buscar
                            </button>
                        </form>
                        
                    </div>
                </nav>

                <h3 class="text-center">
                    Publicacion de convocatorias
                </h3>
                <?php
                    if(isset($_GET['error'])){
                        echo "<script>";
                        echo    "alert('Error al autentificar');";
                        echo "</script>";
                    }
                ?>

                <section>
                    <div class="d-block w-75 mx-auto">
                        <h2 class="text-center" >Publicaciones de Convocatorias</h2>
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
                <br>
                <br>
                <br>

                <footer class="pieIndice">
                    <div class="container col-xs- col-sm- col-md-12 col-log-">
                        <div class="text-center">
                            <h6 class="d-inline-block">Contacto: <a href="">correo_del_Administardor@mail.com ,</a> <a href="">  correo_de_la_Empresa@mail.com</a></h6>
                            <h6 class="d-inline-block">Telefono: (+591) 72584871 Administrador, (+591) 77581871 Secretaria</h6 >
                        </div>
                        <div class="text-center">
                            <h6>Sitios Relacionados :
                                <a href="http://www.umss.edu.bo/" target="_blank">UMSS</a>
                                <a href="http://websis.umss.edu.bo/" target="_blank"> | WEBSISS</a>
                                <a href="https://www.facebook.com/UmssBolOficial" target="_blank"> | facebook</a>
                                <a href="https://twitter.com/UmssBolOficial" target="_blank"> | Twitter</a>
                                <a href="https://www.instagram.com/umssboloficial/" target="_blank"> | Instagram</a>
                                <a href="https://www.linkedin.com/school/universidad-mayor-de-san-simon/" target="_blank"> | Linkedin</a>
                                <a href="https://www.youtube.com/universidadmayordesansimon" target="_blank"> | Youtube</a>
                            </h6>
                        </div>
                        <div class="text-center">
                            <h6>Derechos Reservados © 2020 · Universidad Mayor de San Simón.</h6>
                        </div>
                    </div>
        
                </footer>
            </div>
        </div>
    </div>

    <script src="MyScript.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    <!-- <script src="js1/jquery.min.js"></script>
    <script src="js1/bootstrap.min.js"></script>
    <script src="js1/scripts.js"></script> -->
    </body>
</html>