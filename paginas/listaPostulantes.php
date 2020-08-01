<?php 
    if(isset($_GET['id'])){
        $idConvocatoria = $_GET['id'];
        require_once('../modelo/convocatoria.php');
        $convocatoria = new Convocatoria();
        $resultado = $convocatoria->mostrarConvocatoriaUnica($idConvocatoria);
          

    }else{
        header("Location:CRUD_publicaciones.php?error=x;");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body class=" alert alert-primary" role="alert">
    <main class="container-fluid">
        <h1>Lista de postulante</h1>
        <?php 
            echo  "<h6>Nombre Convocatoria: ".$resultado['nombre_convocatoria']."</h6>
            <h6>Gestion: ".$resultado['gestion_convocatoria']."</h6> <br><br>";
            
            $listaDeMaterias = $convocatoria->mostrarMateriasDisponibles($idConvocatoria);
            foreach($listaDeMaterias as $materia){
                if(strcasecmp($resultado['tipo_convocatoria'],'Auxiliatura de laboratorio')==0){
                    echo "<h5 class='text-center'>".$materia['nombre_auxiliatura']."</h5>";
                    require_once('../modelo/postulante.php');
                    $postulante = new Postulante();
                    $listaPostulante = $postulante->mostrarPostulantesInscritos($materia['id_requerimiento']);
                    foreach($listaPostulante as $postulante){
                        echo   "<table class='table table-warning'>
                                <thead>
                                    <tr>
                                        <th>Nombre Postulante</th>
                                        <th>Carnet de identidad</th>
                                        <th>Estado</th>
                                        <th>Observaciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>".$postulante['nombre_postulante']."</td>
                                        <td>".$postulante['ci_postulante']."</td>
                                        <td><a href='evaluarPostulante.php' class='btn btn-danger'>Evaluar Postulante</a></td>
                                        <td>Observacion 1</td>
                                    </tr>
                                </tbody>
                            </table>
                            <h4 class='text-center'>Comision de evaluadores</h4>
                            <div class='row'>
                                <div class='col-6 p-5'>
                                    <table class='table table-warning text-center'>
                                    <theah>
                                        <tr>
                                            <th>Evaluadores de merito</th>
                                        </tr>
                                    </thead>
                                        <tbody>";
                                            $NewPostulante = new Postulante();
                                            $tipo = 'merito';
                                            $listaDeEvaluadores = $NewPostulante->listaDeEvaluadores($materia['id_requerimiento'],$tipo);
                                            if(empty($listaDeEvaluadores)){
                                                echo "<tr><td>No existe evaluadores designados</td></tr>";
                                            }else{
                                                foreach($listaDeEvaluadores as $evaluador){
                                                    echo "<tr>
                                                        <td><b>Nombre: </b>".$evaluador['nombre_evaluador']."</td>
                                                    </tr>";
                                                    echo "<tr>
                                                        <td><b>Cargo: </b>".$evaluador['cargo_evaluador']."</td>
                                                    </tr>";
                                                }
                                            }
                                        echo    "<tr>
                                                <td><a href='EvaluadoresMeritos.php?id=".$materia['id_requerimiento']."&idTipo=".$tipo."' class='btn btn-primary'>Editar comision</a></td>
                                            </tr>
                                        <tbody>    
                                    </table>
                                </div>
                                <div class='col-6 p-5'>
                                <table class='table table-warning text-center'>
                                <theah>
                                    <tr>
                                        <th>Evaluadores de Conocimiento</th>
                                    </tr>
                                </thead>
                                    <tbody>";
                                        $NewPostulante = new Postulante();
                                        $tipoC = 'conocimiento';
                                        $listaDeEvaluadoresConocimiento = $NewPostulante->listaDeEvaluadores($materia['id_requerimiento'],$tipoC);
                                        if(empty($listaDeEvaluadoresConocimiento )){
                                            echo "<tr><td>No existe evaluadores designados</td></tr>";
                                        }else{
                                            foreach($listaDeEvaluadoresConocimiento  as $evaluador){
                                                echo "<tr>
                                                    <td><b>Nombre: </b>".$evaluador['nombre_evaluador']."</td>
                                                </tr>";
                                                echo "<tr>
                                                    <td><b>Cargo: </b>".$evaluador['cargo_evaluador']."</td>
                                                </tr>";
                                            }
                                        }
                                        echo    "<tr>
                                            <td><a href='EvaluadoresMeritos.php?id=".$materia['id_requerimiento']."&idTipo=".$tipoC."' class='btn btn-primary'>Editar comision</a></td>
                                        </tr>
                                    <tbody>    
                                </table>        
                                </div>
                            </div>
                            <br>
                            <hr>";

                    }
                }
            }
        ?>
    </main>
</body>
</html>