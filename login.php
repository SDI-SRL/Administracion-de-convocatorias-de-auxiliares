<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Universidad Mayor De San Simon</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <!-- <link href="css1/bootstrap.min.css" rel="stylesheet"> -->
    <link href="css/style.css" rel="stylesheet">
    

  </head>
  <body>

      <?php
            if(isset($_GET['dato'])){
                $valor=$_GET['dato'];
                echo "<script>";
                if($valor=='x'){
                echo    "alert('Se ha enviado su contraseña a su correo');";
                }else{
                    if($valor=='y'){
                        echo  "alert('Usuario no encontrado');";
                    }else{
                        echo  "alert('Error al  evaluar la sentencia');";
                    }
                }
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
                <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-dark bg-dark">
                    <a class="navbar-brand text-white">
                        <img src="img/logoUMSS.png" height="60px">
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
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" data-target="desplegable">Descripcion</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Descripcion</a> 
                                    <a class="dropdown-item" href="#">Descripcion</a> 
                                    <a class="dropdown-item" href="#">Descripcion</a>
                                    <!-- <div class="dropdown-divider">
                                    </div> <a class="dropdown-item" href="#">Separated link</a> -->
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Contactenos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Inicio Sesion</a>
                            </li>
                        </ul>
                        <form class="form-inline">
                            <input class="form-control mr-sm-2" type="text"> 
                            <button class="btn btn-primary my-2 my-sm-0" type="submit">
                                Buscar
                            </button>
                        </form>
                        <!-- <ul class="navbar-nav ml-md-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Enlace <span class="sr-only">(Actual)</span></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown">Enlace desplegable</a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Action</a> <a class="dropdown-item" href="#">Another action</a> <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider">
                                    </div> <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </li>
                        </ul> -->
                    </div>
                </nav>
                <h3 class="text-center">
                    Inicie Sesion
                </h3>
                
                <div class="container col-xs- col-sm- col-md-6 col-log-">
                    <section class="principal"> 
                        <!--<div class="border border-dark bg-success w-50 mx-auto my-5 p3">-->
                        <div class="border border-dark bg-primary w-50 mx-auto p3">
                            <form action="form_VerificarUsuario.php" method="post" class="rounded-sm">
                                <label class="font-italic d-block p-1" for="loginCorreo">Correo Electronico</label>
                                <input class="font-italic h4 d-block w-75 mx-auto p-2 rounded-sm" type="mail" name="IdUsuaario" id=""  autocomplete='off' id="loginCorreo" placeholder="Ejemplo@gmail.com">
                                <label class="font-italic d-block p-1" for="loginPass"> Contraseña</label>
                                <input class="font-italic h4 d-block w-75 mx-auto p-2 rounded-sm" type="password" name="IdPassword" id="loginPass" pattern="^[a-z0-9_-]{3,30}" placeholder="****************" autocomplete='off'>
                                <input type="submit" value="Entrar" class="btn btn-primary d-block mx-auto my-3">
                                <!--<a class="text-dark m-2" href="" id="btnSend">Reenviar contraseña a tu correo</a>-->
                            </form>
                            <a class="text-dark m-2" href="#" id="btnSend">Reenviar contraseña a tu correo</a>
                            <!--<button class="bg-success"id="btnSend">Reenviar contraseña a tu correo</button>-->
                        </div>
                    </section>
                </div>

                <br>
                <br>
                <br>
                <br>
                <br>

                <!-- <form role="form">
                    <div class="form-group">
                        
                        <label for="exampleInputEmail1">
                            Email address
                        </label>
                        <input type="email" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="form-group">
                        
                        <label for="exampleInputPassword1">
                            Password
                        </label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="form-group">
                        
                        <label for="exampleInputFile">
                            File input
                        </label>
                        <input type="file" class="form-control-file" id="exampleInputFile">
                        <p class="help-block">
                            Example block-level help text here.
                        </p>
                    </div>
                    <div class="checkbox">
                        
                        <label>
                            <input type="checkbox"> Check me out
                        </label>
                    </div> 
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </form> -->
                

                <!-- <div class="jumbotron">
                    <h2>
                        ¡Hola Mundo!
                    </h2>
                    <p>
                        Esta es una plantilla para un simple sitio web de marketing o informativo. Incluye una gran llamada llamada la unidad de héroe y tres piezas de contenido de apoyo. Úselo como punto de partida para crear algo más único.
                    </p>
                    <p>
                        <a class="btn btn-primary btn-large" href="#">Aprende más</a>
                    </p>
                </div> -->

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