<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/bootstrap.css">
    <link rel="stylesheet" href="../style/myStyle.css">
    <script src="https://kit.fontawesome.com/d848ccec99.js" crossorigin="anonymous"></script>
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

    <form action="#" method="post" class="container w-50 p-3 my-5 bg-dark text-white md w-75 sm w-100 ">
        <h1 class="text-center">Tipo de convotatoria</h1>
        <div class="form-group mx-5">
            <label for="nuevoCorreo">Seleccione el tipo de convocatoria: </label>
            <select id="tipoConv" name="tipoConv" class="mr-2">
                <option value="">Tipo de convocatoria</option>
				<option value="Convocatoria de Docencia">Convocatoria de Docencia</option>
				<option value="Convocatoria de Auxiliar">Convocatoria de Auxiliar</option>
		    </select>
        </div>
        <div class="form-group mx-5">
            <label for="numeroTelefonico">Departamento de la convocatoria: </label>
            <select id="departamentoConv" name="departamentoConv" class="mr-2">
                <option value="">General</option>
                <option value="Departamento De Biologia">Departamento De Biologia</option>
                <option value="Departamento de Ingeniería Eléctrica y Electrónica">Departamento de Ingeniería Eléctrica y Electrónica</option>
                <option value="Departamento de Química">Departamento de Química</option>
                <option value="Convocatoria de fisica">Departamento De Fisica</option>
				<option value="Departamento de Sistemas/Informatica">Departamento de Sistemas/Informatica</option>
                <option value="Departamento de Industrias">Departamento de Industrias</option>
                <option value="Departamento de Ingeniería mecánica – electromecánica (DIME)">Departamento de Ingeniería mecánica–electromecánica</option>
                <option value="Departamento de Matemáticas">Departamento de Matemáticas</option>
                <option value="Departamento de Ingeniería Civil">Departamento de Ingeniería Civil</option>
		    </select>
        </div>

        <div class="from-group mx-5">
            <label for="nuevoPassword">Gestion: </label>
            <select id="semestreConv" name="semestreConv" class="mr-2">
                <option value="">Semestre</option>
                    <option value='I-Regular'>I-Regular</option>
                    <option value='II-Regular'>II-Regular</option>
                    <option value='III-Invierno'>III-Invierno</option>
                    <option value='IV-Verano'>IV-Verano</option>   
 
		    </select>
            <select id="gestionConv" name="gestionConv" class="mr-2">
                <option value="">Gestion</option>
                <?php
                    date_default_timezone_set('America/La_Paz');
                    $year=date('Y');
                    //echo "<option value='gestion'>Gestion</option>";
                    for($i=-10; $i<10 ; $i++){
                        $yearAux=$year + $i;
                        echo "<option value='$yearAux'>$yearAux</option>";
                    }
 
                ?>
		    </select>
        </div>
        <!--<div class="form-group mx-5">
            <label for="copiaNuevoPassword">Reescriba su nueva contraseña: </label>
            <input class="form-control" type="password" name="copiaNuevoPassword" id="copiaNuevoPassword" 
            title="La contraseña debe contar con 4 caracteres como minimo, al menos un numero, una minuscula y una mayuscula"
            placeholder="" autocomplete='off' pattern="[A-Za-z0-9!?-]{4,30}" required/>
        </div>-->
        <div class="row justify-content-center">    
            <!--<input class="btn btn-primary mr-2" type="submit" value="ActualizarDatos" >-->
            <a class="btn btn-primary ml-2" href=""> Buscar</a>
        </div>
    </form>
    <?php
                            //date_default_timezone_set('America/La_Paz');
                            //$fechaActual=date("Y-m-d H:i:s");
                            include_once("modelo/convocatoria.php");
                            $convocatoria= new  Convocatoria();
                            $consulta=$convocatoria->buscarConvocatoria($);
                            foreach($consulta as $elemento){
                                echo "<h2>".$elemento['nombre_convocatoria']."</h2>";
                                echo "<h5>Descripcion del documento</h5>";
                                echo "<h6>".$elemento['descripcion_conv']."</h6>";
                                echo "<a href='".$elemento['direccion_pdf']."' target='_blank' >Abrir archivo ".$elemento['nombre_convocatoria']."</a>";
                                echo "<p class='float-right'>".$elemento['fecha_subida']."</p>"; //fecha subida?
                                echo "<hr>";
                            }
                            $convocatoria->cerrarConexion();
                            
                        ?>
    <?php
        //////////////////////// PRESIONAR EL BOTÓN //////////////////////////
        if(isset($_POST['insertarr'])){
            $tipo=($_POST['']);
            $departamento=($_POST['']);
            $gestion=($_POST['']);
        }
    ?>
</body>
</html>