<?php
    session_start();
    if(isset($_SESSION['nombreEvaluador'])  &&  isset($_SESSION['idEvaluador'])){
        $nombreEvaluador = $_SESSION['nombreEvaluador'];
        $idEvaluador = $_SESSION['idEvaluador'];
    }else{
        header("Location:comisionEvaluadora.php?error=x");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index Evaluador</title>
    <link rel="stylesheet" href="../style/bootstrap.css">
    <link rel="stylesheet" href="../style/myStyle.css">
</head>
<body>
    <header class='p-5 bg-dark'>
        <h3 class='text-light'>Bienvenido <?php echo $nombreEvaluador; ?></h3>
    </header>
</body>
</html>