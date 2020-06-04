<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Universidad Mayor de San simon</title>
    <link rel="stylesheet" href="Vista/bootstrap.css">
    <link rel="stylesheet" href="Vista/header.css">
</head>
<body>
    <?php
        if(isset($_GET['error'])){
            echo "<script>";
            echo    "alert('Error al autentificar');";
            echo "</script>";
        }
    ?>

    <?php include("plantillas/header.php");?>   

    <!--Convocatorias-->
    <section>
        <div class="d-block w-75 mx-auto">
            <h2 class="text-center" >Publicaciones de Convocatorias</h2>

            <?php
                require_once('conexion.php');
                $conn=conectarBaseDeDatos();
                //Consulta para ordenar por fecha
                date_default_timezone_set('America/La_Paz');
                $fechaActual=date("Y-m-d H:i:s");
                $consulta=pg_query($conn,"SELECT titulo,descripcion_convocatoria,fecha,direcccion_pdf FROM convocatoria WHERE activo='true' AND '$fechaActual' <= fecha_expiracion ORDER BY fecha desc");
                if (!$consulta) {
                    echo "An error occurred.\n";
                    exit;
                }
                $variable=pg_num_rows($consulta);
                if($variable>0){
                    while($row = pg_fetch_row($consulta)){
                        $titulo=$row[0];
                        $descripcion=$row[1];
                        $fecha=$row[2];
                        $direcccion_pdf=$row[3];
                        echo "<h2>$titulo</h2>";
                        echo "<h5>Descripcion del documento</h5>";
                        echo "<h6>$descripcion</h6>";
                        echo "<a href='$direcccion_pdf' target='_blank' >Abrir archivo $titulo</a>";
                        echo "<p class='float-right'>$fecha</p>";
                        echo "<hr>";
                    }
                }
            ?>
        </div>

    </section>

    <?php include("plantillas/footer.php");?>
</body>
</html>
