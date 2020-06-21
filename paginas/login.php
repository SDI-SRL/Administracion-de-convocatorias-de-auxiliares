<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Universidad Mayor de San simon</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="css/estilos.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../style/bootstrap.css">
    <link rel="stylesheet" href="../style/myStyle.css">
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
    <?php include("../plantillas/header.php");?>

<!-- Login -->
    <div class="overlay" id="overlay">
            <div id="formReenvio">
                <form action="../formularios/form_enviarEmail.php" method="post">
                    <a href="" class="float-right m-2">Cancelar</a>
                    <br>
                    <h2>Formulario de Reenvio</h2>
                    <label class="d-block mx-auto" for="reenvio_Pass">Correo Electronico: <input class="p-2 font" type="email" name="reenvio_Pass" id="reenvio_Pass" required placeholder="ejemplo@gmail.com"></label>
                    <label class="d-block mx-auto" for="catcha"><input type="text" name="" id="catcha"></label>
                    <input class="d-block my-2 mx-auto btn btn-success" type="submit" value="Reenviar">
                </form>
            </div>
        </div>

    <section class="principal">
        <div class="border border-dark bg-primary w-50 mx-auto my-5 p3">
            <form action="../formularios/form_VerificarUsuario.php" method="post" class="rounded-sm">
                <label class="font-italic d-block p-1" for="loginCorreo">Correo Electronico</label>
                <input class="font-italic h4 d-block w-75 mx-auto p-2 rounded-sm" type="mail" name="IdUsuaario" id=""  autocomplete='off' id="loginCorreo" placeholder="Ejemplo@gmail.com">
                <label class="font-italic d-block p-1" for="loginPass"> Contraseña</label>
                <input class="font-italic h4 d-block w-75 mx-auto p-2 rounded-sm" type="password" name="IdPassword" id="loginPass" placeholder="****************" autocomplete='off'>
                <input type="submit" value="Entrar" class="btn btn-success d-block mx-auto my-3">
                <!--<a class="text-dark m-2" href="" id="btnSend">Reenviar contraseña a tu correo</a>   pattern="^[a-z0-9_-]{3,30}-->
            </form>
            <a class="text-dark m-2" href="#" id="btnSend">Reenviar contraseña a tu correo</a>
            <!--<button class="bg-success"id="btnSend">Reenviar contraseña a tu correo</button>-->
        </div>
    </section>
    <?php include("../plantillas/footer.php");?>
    <script src="../style/MyScript.js"></script>
    <!-- <script src="MyScript.js"></script> -->

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>
