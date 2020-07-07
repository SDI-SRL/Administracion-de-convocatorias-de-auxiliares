<?php
    session_start();
    $var=$_SESSION['sesion'];
    if($var == null || $var = '' ){
        echo "Erro al autentificar";
        header("Location:../index.php?error=x");
    }
?>

<!-- CONEXION--->

<?php
////////////////// CONEXION A LA BASE DE DATOS //////////////////
    $host = 'localhost';
    $basededatos = 'sdiprueba';
    $usuario = 'root';
    $contraseña = '1234';



    //$conexion_pdo = new PDO("pgsql:host=localhost;port=5432;dbname=sdiprueba","postgres","1234");//error
    $conexion = pg_connect("host=localhost dbname=sdiprueba user=postgres password=1234")or die ('No se ha podido conectar: '.pg_last_error());
    //return $conexion;
///////////////////CONSULTA DE LOS ALUMNOS///////////////////////

    //$alumnos="SELECT * FROM alumnos order by id_alumno";
    //$queryAlumnos= $conexion->query($alumnos);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/bootstrap.css">
    <link rel="stylesheet" href="../style/myStyle.css">
    <script src="https://kit.fontawesome.com/d848ccec99.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>
</head>

<body>
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
            <a href="../formularios/form_cerrarSession.php" class="float-right text-dark">cerrar session</a>
    </header>

    <div id="idConvicatoria" class="mx-auto w-75 p-4 my-5 border border-primary bg-secondary">
    <h1 class="text-center">Publicar Convocatoria</h1>
        <input type="text" name="titulo" id="titulo" placeholder="Titulo" required autocomplete="off" pattern="[a-zA-Z0-9 ]{2,60}" title="Solo puede ingresar numeros y letras">
            <br>
            <br>
            <div class="form-group mx-5">
                <label for="numeroTelefonico">Descripcion: </label>
                <textarea id="descripcion" rows="5" name="descripcion"  style="resize:none; width:100%;"> </textarea>
            </div>
<!---                     ---------------------------------------------------------------------------------     -------------------------------------------            -->
    <section>
        <script>
        var auxiliar0 = "<?php $tablaCant0; ?>";
            $(function(){
                // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
                $("#adicional0").on('click', function(){
                    $("#tabla0 tbody tr:eq(0)").clone().removeClass('fila-fija0').appendTo("#tabla0");
                    auxiliar0++;
                });
                // Evento que selecciona la fila y la elimina
                $(document).on("click",".eliminar",function(){
                    if(auxiliar0 > 0){
                        var parent = $(this).parents().get(0);
                        $(parent).remove();
                        auxiliar0--;
                    }
                });
            });
		</script>
        <?php 
            $tablaCant0 = 1;
        ?>
        <table class="table">
        <?php
        /*while($registroAlumno  = $queryAlumnos->fetch_array( MYSQLI_BOTH))
        {


        echo '<tr>
                <td>'.$registroAlumno['id_alumno'].'</td>
                <td>'.$registroAlumno['nombre'].'</td>
                <td>'.$registroAlumno['carrera'].'</td>
                <td>'.$registroAlumno['grupo'].'</td>
            </tr>';
            }*/
        ?>
        <label for="requerimientos">Requerimientos: </label>
        </table>
        <form method="post">
            <table class="table bg-info"  id="tabla0">
                <tr class="fila-fija0">
                    <td><input required name="idalumno[]" placeholder="ID Alumno"/></td>
                    <td><input required name="nombre[]" placeholder="Nombre Alumno"/></td>
                    <td><input required name="carrera[]" placeholder="Carrera"/></td>
                    <td><input required name="grupo[]" placeholder="Grupo"/></td>
                    <td class="eliminar"><input type="button"   value="Menos -"/></td>
                </tr>
            </table>
            <div class="btn-der">
                <input type="submit" name="insertar" value="Insertar Alumno" class="btn btn-info"/>
                <button id="adicional0" name="adicional0" type="button" class="btn btn-warning"> Más + </button>
                <br>
            </div>
        </form>
        <?php
            //////////////////////// PRESIONAR EL BOTÓN //////////////////////////
            if(isset($_POST['insertar'])){
                $items1 = ($_POST['idalumno']);
                $items2 = ($_POST['nombre']);
                $items3 = ($_POST['carrera']);
                $items4 = ($_POST['grupo']);
            ///////////// SEPARAR VALORES DE ARRAYS, EN ESTE CASO SON 4 ARRAYS UNO POR CADA INPUT (ID, NOMBRE, CARRERA Y GRUPO////////////////////)
                while(true) {

                    //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
                    $item1 = current($items1);
                    $item2 = current($items2);
                    $item3 = current($items3);
                    $item4 = current($items4);

                    ////// ASIGNARLOS A VARIABLES ///////////////////
                    $id=(( $item1 !== false) ? $item1 : ", &nbsp;");
                    $nom=(( $item2 !== false) ? $item2 : ", &nbsp;");
                    $carr=(( $item3 !== false) ? $item3 : ", &nbsp;");
                    $gru=(( $item4 !== false) ? $item4 : ", &nbsp;");

                    //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÓN ////////
                    $valores='('.$id.',"'.$nom.'","'.$carr.'","'.$gru.'"),';

                    //////// YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCIÓN SUBSTR EN LA ULTIMA FILA /////////////////////
                    $valoresQ= substr($valores, 0, -1);

                    ///////// QUERY DE INSERCIÓN ////////////////////////////
                    $sql = "INSERT INTO alumnos (id_alumno, nombre, carrera, grupo)
                    VALUES $valoresQ";
                    $sqlRes=$conexion->query($sql) or mysql_error();
                    // Up! Next Value
                    $item1 = next( $items1 );
                    $item2 = next( $items2 );
                    $item3 = next( $items3 );
                    $item4 = next( $items4 );

                    // Check terminator
                    if($item1 === false && $item2 === false && $item3 === false && $item4 === false) break;
                }
            }
        ?>
    </section>
        <script>
        var auxiliar1 = "<?php $requCant; ?>";
            $(function(){            
                // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
                $("#adicional").on('click', function(){
                    $("#tabla tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tabla").prop('value', '');                   
                    $("span", this).text("My NEW Text");
                    $(this).prop('value', '');
                    //$("#tabla tbody tr:eq(0)").clone().removeClass('fila-fija').prependTo("#tabla");
                    auxiliar1++;
                    //$("#tabla tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tabla");
                });
                // Evento que selecciona la fila y la elimina
                $(document).on("click",".eliminar1",function(){
                    if(auxiliar1 > 0){
                        var parent = $(this).parents().get(0);
                        $(parent).remove();  
                        auxiliar1--;         
                    }
                    //var parent = $(this).parents().get(0);
                    //$(parent).remove();
                });
            });
		</script>
        <?php 
            $requCant = 1;
        ?>
    <section>
            
        <form method="post">
        <label for="requisitos">Requisitos: </label>
            <table class="table bg-info"  id="tabla">
                <tr class="fila-fija">
                    <td><input required class = "form-control input-lg" name="requisito[]" placeholder="Escriba su requerimiento" value=""/></td>
                    <td class="eliminar1"><input type="button"   value="Menos -"/></td>
                </tr>
            </table>

            <div class="btn-der">
                <input type="submit" name="insertarrr" value="Insertar Alumno" class="btn btn-info"/>
                <button id="adicional" name="adicional" type="button" class="btn btn-warning"> Más + </button>
                <br>
            </div>
        </form>
        <?php
            //////////////////////// PRESIONAR EL BOTÓN //////////////////////////
            if(isset($_POST['insertarrr'])){
                $items1 = ($_POST['requisito']);
            ///////////// SEPARAR VALORES DE ARRAYS, EN ESTE CASO SON 4 ARRAYS UNO POR CADA INPUT (ID, NOMBRE, CARRERA Y GRUPO////////////////////)
                while(true) {
                    //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
                        $item1 = current($items1);
                    ////// ASIGNARLOS A VARIABLES ///////////////////
                        $id=(( $item1 !== false) ? $item1 : ", &nbsp;");
                    //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÓN ////////
                        $valores='('.$id.'),';
                    //////// YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCIÓN SUBSTR EN LA ULTIMA FILA /////////////////////
                        $valoresQ= substr($valores, 0, -1);
                    ///////// QUERY DE INSERCIÓN ////////////////////////////
                        //$sql = "INSERT INTO requisitos (iddescripcion_requisito)
                        //VALUES $valoresQ";
                        pg_query($conexion,"INSERT INTO requisitos (id_convocatoria, descripcion_requisito) VALUES ('1','$valoresQ')");
                
                        //$sqlRes=$conexion->query($sql) or mysql_error();
                    // Up! Next Value
                        $item1 = next( $items1 );
                    // Check terminator
                    if($item1 === false) break;
                }
            }

        ?>
    </section>
        <script>
        var auxiliar2 = "<?php $docCant; ?>";
            $(function(){
                // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
                $("#adicional2").on('click', function(){
                    $("#tabla2 tbody tr:eq(0)").clone().removeClass('fila-fija2').appendTo("#tabla2");
                    auxiliar2++;
                });

                // Evento que selecciona la fila y la elimina
                $(document).on("click",".eliminar",function(){
                    if(auxiliar2 > 0){
                        var parent = $(this).parents().get(0);
                        $(parent).remove();
                        auxiliar2--;
                    }
                    
                });
            });
		</script>
        <?php 
            $docCant = 1;
        ?>
    <section>
        <form method="post">
            <label for="documentos">Documentos a presentar: </label>
            <table class="table bg-info"  id="tabla2">
                <tr class="fila-fija2">
                    <td><input required class = "form-control input-lg" name="documentos[]" placeholder=""/></td>
                    <td class="eliminar"><input type="button"   value="Menos -"/></td>
                </tr>
            </table>

            <div class="btn-der">
                <input type="submit" name="insertarr" value="Insertar Alumno" class="btn btn-info"/>
                <button id="adicional2" name="adicional2" type="button" class="btn btn-warning"> Más + </button>
                <br>
            </div>
        </form>
        <?php
        //////////////////////// PRESIONAR EL BOTÓN //////////////////////////
        if(isset($_POST['insertarr'])){
            $items0 = ($_POST['documentos']);
        ///////////// SEPARAR VALORES DE ARRAYS, EN ESTE CASO SON 4 ARRAYS UNO POR CADA INPUT (ID, NOMBRE, CARRERA Y GRUPO////////////////////)
            while(true) {
                //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
                    $item0 = current($items0);
                ////// ASIGNARLOS A VARIABLES ///////////////////
                    $id=(( $item0 !== false) ? $item0 : ", &nbsp;");
                //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÓN ////////
                    $valores='('.$id.'),';
                //////// YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCIÓN SUBSTR EN LA ULTIMA FILA /////////////////////
                    $valoresD= substr($valores, 0, -1);
                ///////// QUERY DE INSERCIÓN ////////////////////////////
                    //$sql = "INSERT INTO requisitos (iddescripcion_requisito)
                    //VALUES $valoresQ";
                    pg_query($conexion,"INSERT INTO documentos (id_convocatoria, descripcion_documento) VALUES ('1','$valoresD')");
            
                    //$sqlRes=$conexion->query($sql) or mysql_error();
                // Up! Next Value
                    $item0 = next( $items0 );
                // Check terminator
                if($item0 === false) break;
            }
            $items1 = ($_POST['requisito']);
        ///////////// SEPARAR VALORES DE ARRAYS, EN ESTE CASO SON 4 ARRAYS UNO POR CADA INPUT (ID, NOMBRE, CARRERA Y GRUPO////////////////////)
            while(true) {
                //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
                    $item1 = current($items1);
                ////// ASIGNARLOS A VARIABLES ///////////////////
                    $id=(( $item1 !== false) ? $item1 : ", &nbsp;");
                //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÓN ////////
                    $valores='('.$id.'),';
                //////// YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCIÓN SUBSTR EN LA ULTIMA FILA /////////////////////
                    $valoresQ= substr($valores, 0, -1);
                ///////// QUERY DE INSERCIÓN ////////////////////////////
                    //$sql = "INSERT INTO requisitos (iddescripcion_requisito)
                    //VALUES $valoresQ";
                    pg_query($conexion,"INSERT INTO requisitos (id_convocatoria, descripcion_requisito) VALUES ('1','$valoresQ')");
            
                    //$sqlRes=$conexion->query($sql) or mysql_error();
                // Up! Next Value
                    $item1 = next( $items1 );
                // Check terminator
                if($item1 === false) break;
            }
        }

        ?>
    </section>
    <br>
                <!----------------------------------------------------- -->
    <form action="../formularios/form_subirPublicacion.php" method="post" enctype="multipart/form-data">
            
        <input type="file" name="archivo" id="archivo" required accept='.pdf'>

        <br>
        <br>
        <select id="lista1" name="lista1" class="mr-2">
                <option value="Departamentos en general">General</option>
				<option value="Convocatoria de Docencia">Convocatoria de Docencia</option>
				<option value="Convocatoria de Auxiliar">Convocatoria de Auxiliar</option>
		</select>
        <select id="lista2" name="lista2" class="mr-2">
                <option value="Departamentos en general">General</option>
                <option value="Departamento De Biologia">Departamento De Biologia</option>
                <option value="Departamento de Ingeniería Eléctrica y Electrónica">Departamento de Ingeniería Eléctrica y Electrónica</option>
                <option value="Departamento de Química">Departamento de Química</option>
                <option value="Convocatoria de fisica">Departamento De Fisica</option>
				<option value="Departamento de Sistemas/Informatica">Departamento de Sistemas/Informatica</option>
                <option value="Departamento de Industrias">Departamento de Industrias</option>
                <option value="Departamento de Ingeniería mecánica – electromecánica (DIME)">Departamento de Ingeniería mecánica – electromecánica (DIME)</option>
                <option value="Departamento de Matemáticas">Departamento de Matemáticas</option>
                <option value="Departamento de Ingeniería Civil">Departamento de Ingeniería Civil</option>
		</select>
        <select id="lista3" name="lista3" class="mr-2">
            <?php
                date_default_timezone_set('America/La_Paz');
                $mes=date('m');
                $year=date('Y');
                if($mes<6){
                    $aux1="Gestion I-".$year;
                    $aux2="Gestion II-".$year;
                    echo "<option value='gestion general'>General</option>
				          <option value='$aux1'>$aux1</option>
				          <option value='$aux1'>$aux12</option>";
                }else{
                    $year_actual = date("Y");
                    $yearProx=date("Y",strtotime($fecha_actual."+ 1 year"));
                    $aux1="Gestion II-".$year;
                    $aux2="Gestion I-".$yearProx;
                    echo "<option value='gestion general'>General</option>
				          <option value='$aux1'>$aux1</option>
				          <option value='$aux2'>$aux2</option>";
                }
            ?>
		</select>
        <br>
        <br>
        <label for="fechaDeExpiracion"> Fecha de Expiracion</label>
                <?php
                     date_default_timezone_set('America/La_Paz');
                     $fechaHoy=date('Y-m-d');
                     $fechaMinima=date('Y-m-d',strtotime($fechaHoy."+ 1 days"))
                ?>
        <input type="date" name="fechaDeExpiracion" id="fechaDeExpiracion" min="<?php echo $fechaMinima;?>">
        <label for="horaDeExpiracion"> Hora de Expiracion</label>
        <input type="time" name="horaDeExpiracion" id="horaDeExpiracion">
        <br>
        <br>
        <div class="d-block w-25 mx-auto">
            <input class="btn btn-primary" type="submit" value="Publicar">
            <a href="CRUD_publicaciones.php" class="btn btn-danger ml-5">Cancelar</a>
        </div>
    </form>
    <br>
        <br>

    </div>

    <footer class="pieIndice">
        <div class="text-center">
            <h6 class="d-inline-block">Contacto: <a  href="mailto:elcorreoquequieres@correo.com">correo_del_Administardor@mail.com ,</a> <a  href="mailto:elcorreoquequieres@correo.com">  correo_de_la_Empresa@mail.com</a></h6>
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
</body>
</html>
