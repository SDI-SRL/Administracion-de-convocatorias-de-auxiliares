<?php
    session_start();
    $var=$_SESSION['sesion'];
    if($var == null || $var = '' ){
        echo "Erro al autentificar";
        header("Location:index.php?error=x");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Vista/bootstrap.css">
    <link rel="stylesheet" href="Vista/header.css">
    <script src="https://kit.fontawesome.com/d848ccec99.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        if(isset($_GET['problem'])){
            $valor=$_GET['problem'];
            echo "<script>";
            if($valor=='x'){
                echo  "alert('La contraseñas deben concidir para procesar la informacion');";
            }
            echo "</script>";
        }
    ?>

    <header class="bg-info w-100 p-4">
                <h4 class="font-italic"><i class="fas fa-users"></i>  Usuario <?php echo $_SESSION['sesion']; ?></h4>
                <a href="CRUD_publicaciones.php" class="float-right text-dark">Convocatorias</a>
                <br>
                <a href="form_cerrarSession.php" class="float-right text-dark">cerrar session</a>
    </header>

    <form action="form_actualizarDatos.php" method="post" class="container w-50 p-3 my-5 bg-dark text-white md w-75 sm w-100 ">
        <h1 class="text-center">Editar datos de Usuario</h1>
        <div class="form-group mx-5">
            <label for="nuevoCorreo">Escriba su nuevo correo electronico: </label>
            <input class="form-control" type="email" name="nuevoCorreo" id="nuevoCorreo" value="<?php echo $_SESSION['correo'];?>">
        </div>
        <div class="form-group mx-5">
            <label for="numeroTelefonico">Escriba su nuevo numero telefonico: </label>
            <input class="form-control" type="text" name="numeroTelefonico" id="numeroTelefonico" value="<?php echo $_SESSION['telefono'];?>">
        </div>

        <div class="from-group mx-5">
            <label for="nuevoPassword">Escriba su nueva contraseña: </label>
            <input class="form-control" type="password" name="nuevoPassword" id="nuevoPassword" value="<?php echo $_SESSION['passoword'];?>">
        </div>
        <div class="form-group mx-5">
            <label for="copiaNuevoPassword">Reescriba su nueva contraseña: </label>
            <input class="form-control" type="password" name="copiaNuevoPassword" id="copiaNuevoPassword" value="<?php echo $_SESSION['passoword']?>">
        </div>
        <div class="row justify-content-center">    
            <input class="btn btn-primary mr-2" type="submit" value="ActualizarDatos" >
            <a class="btn btn-danger ml-2" href="CRUD_publicaciones"> Cancelar</a>
        </div>
    </form>
</body>
</html>