<?php
    session_start();
    $var=$_SESSION['nombre_postulante'];
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
    <title>Convocatoria UMSS</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../style/bootstrap.css">
    <link rel="stylesheet" href="../style/myStyle.css">
</head>
<body>
    <div class="row">
        <div class="col-7 p-5">
            <h2 class="text-center" >Convocatorias vigentes</h2>
                    <?php
                        require_once("../modelo/convocatoria.php");                    
                        $convocatoria = new  Convocatoria();
                        $consulta = $convocatoria->mostrarConvocatoriaFechaDescendente();
                        foreach($consulta as $elemento){
                            echo "<h2>".$elemento['tipo_convocatoria']."</h2>";
                            echo "<h5>Descripcion del documento</h5>";
                            echo "<h6 class='w-75'>".$elemento['nombre_convocatoria']."</h6>";
                            echo "<a href='".$elemento['direccion_pdf']."' target='_blank' >Descargar convocatoria</a>";
                            echo "<p class='float-right'>".$elemento['fecha_subida']."</p>"; ?>
                            <a href="../formularios/listaDeMaterias.php?id_conv=<?php echo $elemento['id_convocatoria']?>">ver lista de materias</a>
                            <?php echo "<hr>";
                            
                        }
                    ?>
        </div>
        <div class="col-5 p-5 text-center">
            <h2>Convocatorias inscritas</h2>
            <?php 
                //$listaDeMaterias = $convocatoria->mostrarSoloMateriasInscritas($_SESSION['id_postulante']);
                $listaConvocatoria = $convocatoria->mostrarConvocatoriaFechaDescendente();   
                foreach($listaConvocatoria as $conv){
                    //echo var_dump($conv);
                    $bandera = true;
                    $listaRequerimiento = $convocatoria->mostrarRequerimientoPostulante($conv['id_convocatoria'],$_SESSION['id_postulante']); 
                    foreach($listaRequerimiento as $requerimiento){
                        //echo var_dump($requerimiento);
                        $tmp = $requerimiento['id_requerimiento'];
                        if($tmp){
                            if($bandera){
                                $bandera = false;
                                echo "<h5>".$conv['nombre_convocatoria']."</h5>";
                            }
                            echo "<h6 class='text-left p-3'>".$requerimiento['nombre_auxiliatura']."</h6>"; ?>
                            <a href="../paginas/seguimiento.php?id_post=<?php echo $_SESSION['id_postulante'];?>&idConv=<?php echo $conv['id_convocatoria']; ?>" class='btn btn-success float-right'>Seguimiento</a> 
                            <a href="../formularios/form_imprimirRotulo.php?id_post=<?php echo $_SESSION['id_postulante'];?>&id_mat=<?php echo $requerimiento['id_requerimiento'];?>" class='btn btn-primary float-right mr-1'>Imprimir rotulo</a>
                            <br>   
                            <?php
                        }
                    }
                    //echo "<br>";
                    echo "<hr>";
                }
            ?>
        </div>               
    </div>
</body>
</html>