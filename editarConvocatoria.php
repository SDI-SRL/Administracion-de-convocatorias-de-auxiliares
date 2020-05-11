<?php
    session_start();
    $var=$_SESSION['sesion'];
    if($var == null || $var = '' ){
        echo "Erro al autentificar";
        header("Location:index.php?error=x");
    }
?>
<?php
     require_once('conexion.php');
     $conn=conectarBaseDeDatos();
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $consulta=pg_query($conn,"SELECT titulo,descripcion_convocatoria,fecha,direcccion_pdf,id_convocatoria FROM convocatoria WHERE id_convocatoria='$id'");
        if (!$consulta) {
            echo "An error occurred.\n";
            exit;
        }else{
            $row=pg_fetch_row($consulta);
        }

    }else{
        echo "Error";
    }
    //
    if(isset($_POST['update'])){
        $nuevoTitulo=$_POST['titulo'];
        $nuevaDescrpcion=$_POST['descripcion'];
        date_default_timezone_set('America/La_Paz');
        $nuevaFecha=date("Y-m-d H:i:s");
        $Actualizar=pg_query($conn,"UPDATE convocatoria SET titulo='$nuevoTitulo', descripcion_convocatoria='$nuevaDescrpcion' ,fecha='$nuevaFecha' WHERE id_convocatoria=$id");
        if (!$Actualizar) {
            echo "An error occurred.\n";
            exit;
        }else{
            header("Location:CRUD_publicaciones.php");
        }

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

        <body class="cuerpo">
            <header class="bg-info w-100 p-4">
                <h3 class="font-italic"><i class="fas fa-users"></i>
                <?php
                    if(isset($_SESSION['sexoUsuario'])){
                        $sexo=$_SESSION['sexoUsuario'];
                        if($sexo=="Hombre"){
                            if(isset($_SESSION['cargoUsuario'])){
                                $cargo=$_SESSION['cargoUsuario'];
                                if($cargo=="Administrador"){
                                    echo "Administrador ";
                                }else{
                                    if($cargo=="Secretaria"){
                                        echo "Secretario ";
                                    }else{
                                        echo "Usuario ";
                                    }
                                }
                            }
                        }else{
                            if(isset($_SESSION['cargoUsuario'])){
                                $cargo=$_SESSION['cargoUsuario'];
                                if($cargo=="Administrador"){
                                    echo "Administradora ";
                                }else{
                                    if($cargo=="Secretaria"){
                                        echo "Secretaria ";
                                    }
                                    else{
                                        echo "Usuaria ";
                                    }
                                }
                            }
                        }
                    }
                    echo $_SESSION['sesion'];
                    ?>

                </h3>
                <a href="CRUD_publicaciones.php" class="float-right text-dark">Convocatorias</a>
                <br>
                <a href="form_cerrarSession.php" class="float-right text-dark">cerrar session</a>
            </header>

            <div id="idConvicatoria" class="mx-auto w-75 p-4 my-5 border border-primary bg-secondary">
            <h1>Editar Convocatoria</h1>
            <form action="editarConvocatoria.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
                <input type="text" name="titulo" id="titulo" placeholder="Titulo" autocomplete="off" pattern="[a-zA-Z0-9 ]{2,200}" title="Solo puede ingresar numeros y letras" required value='<?php echo $row[0] ?>'>
                <br>
                <br>
                <textarea id="descripcion" rows="10" cols="190" name="descripcion" style="resize:none; width:100%;"><?php echo $row[1] ?></textarea>
                <br>
                <br>
                <input type="file" name="archivo" id="archivo" accept='.pdf'>
                <br>
                <br>
                <select id="lista1" name="lista1" class="mr-2">
				<option value="ConvocatoriaDocencia">Convocatoria de Docencia</option>
				<option value="ConvocatoriaAuxiliar">Convocatoria de Auxiliar</option>

		</select>

        <select id="lista2" name="lista2" class="mr-2">
				<option value="Convocatoria Sistemas">Departamento de Sistemas/Informatica</option>
				<option value="Convocatoria de biologia">Departamento De Biologia</option>
                <option value="Convocatoria de fisica">Departamento De Fisica</option>

		</select>

        <select id="lista3" name="lista3" class="mr-2">
				<option value="gestion I">Gestion I </option>
				<option value="Gestion II">Gestion II</option>
		</select>
                <br>
                <br>
               <div class="mx-auto">
               <button class="btn btn-primary" name="update">Actualizar</button>
                <a href="CRUD_publicaciones.php" class="btn btn-danger ml-5">Cancelar</a>
               </div>
            </form>
            </div>
        </body>

    <footer class="pieIndice">
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
    </footer>
</html>
