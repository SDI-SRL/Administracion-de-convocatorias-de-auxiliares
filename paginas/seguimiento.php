<?php 
    if(isset($_GET['id_post']) && isset($_GET['idConv'])){
        $idPostulante= $_GET['id_post'];
        $idConv = $_GET['idConv'];
        require_once("../modelo/convocatoria.php");                    
        $convocatoria = new  Convocatoria();
        $respuesta = $convocatoria->mostrarListaDeDocumentos($idPostulante);
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
<body>
    <h2 class="text-center">Documentos presentados</h2>
    <table class="table" border=1>
        <thead>
            <tr>
                <td>Descripcion</td>
                <td>Calificacion</td>
                <td>Observaciones</td>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach($respuesta as $res){
                    echo "<tr>
                        <td>".$res['descripcion_documento']."</td>
                        <td>Aceptado</td>
                        <td>Sin Observaciones</td>
                    </tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>