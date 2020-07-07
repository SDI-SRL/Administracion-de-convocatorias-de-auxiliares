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
    $conexion = pg_connect("host=localhost dbname=sdiprueba2 user=postgres password=1234")or die ('No se ha podido conectar: '.pg_last_error());
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
<!---                     ---------------------------------------------------------------------------------     -------------------------------------------            -->
        
        <?php 
            $requCant = 1;
            $docCant = 1;
            $cantD = 1;
            $cantL = 1;
        ?>
    <section>
        <script>
            $(function(){
                if('#select0' == "tipoConvocatoria"){
                    //$('.fila-fijaL').hide();
                    //$('.fila-fijaD').hide();
                }
                $('#select0').on('change',function(){
                    var selectValor = $(this).val();
                    //alert (selectValor);
                    if (selectValor == 'ConvocatoriaDocencia') {
                        $('.tableL').show();
                        $('.btnL').show();
                        $('.tableD').hide();
                        $('.btnD').hide();
                    }
                    if (selectValor == 'ConvocatoriaAuxiliar') {
                        $('.tableD').show();
                        $('.btnD').show();
                        $('.tableL').hide();
                        $('.btnL').hide();
                    }
                    if (selectValor == 'tipoConvocatoria') {
                        $('.tableD').hide();
                        $('.tableL').hide();
                        $('.btnD').hide();
                        $('.btnL').hide();
                    }
                    //else {
                    //$('.fila-fija0').hide();
                    //$('.eliminar').hide();
                        //alert('esta es la opcion 2')
                    //}
                });
                $('.tableD').hide();
                $('.tableL').hide();
                $('.btnD').hide();
                $('.btnL').hide();
            });
        </script>
        <script>
        var auxiliarL = "<?php $cantL; ?>";
        var auxiliarD = "<?php $cantD; ?>";
        var auxiliar2 = "<?php $docCant; ?>";
        var auxiliar11 = "<?php $requCant; ?>";
            $(function(){
                $("#adicionarD").on('click', function(){
                    $("#tablaD tbody tr:eq(0)").clone().removeClass('fila-fijaD').appendTo("#tablaD");
                    auxiliarD++;
                });
                // Evento que selecciona la fila y la elimina
                $(document).on("click",".eliminarD",function(){
                    if(auxiliarD > 0){
                        var parent = $(this).parents().get(0);
                        $(parent).remove();
                        auxiliarD--;
                    }
                });
                $("#adicionarL").on('click', function(){
                    $("#tablaL tbody tr:eq(0)").clone().removeClass('fila-fijaL').appendTo("#tablaL");
                    auxiliarL++;
                });
                // Evento que selecciona la fila y la elimina
                $(document).on("click",".eliminarL",function(){
                    if(auxiliarL > 0){
                        var parent = $(this).parents().get(0);
                        $(parent).remove();
                        auxiliarL--;
                    }
                });
                // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
                $("#adicional2").on('click', function(){
                    $("#tablaDoc tbody tr:eq(0)").clone().removeClass('fila-fija2').appendTo("#tablaDoc");
                    auxiliar2++;
                });
                // Evento que selecciona la fila y la elimina
                $(document).on("click",".eliminar2",function(){
                    if(auxiliar2 > 0){
                        var parent = $(this).parents().get(0);
                        $(parent).remove();
                        auxiliar2--;
                    }
                });
                $("#adicionall").on('click', function(){
                    $("#tablaRequ tbody tr:eq(0)").clone().removeClass('fila-fija1').appendTo("#tablaRequ");                   
                    //$("#tabla tbody tr:eq(0)").clone().removeClass('fila-fija').prependTo("#tabla");
                    auxiliar11++;
                    //$("#tabla tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tabla");
                });
                // Evento que selecciona la fila y la elimina
                $(document).on("click",".eliminar1",function(){
                    if(auxiliar11 > 0){
                        var parent = $(this).parents().get(0);
                        $(parent).remove();  
                        auxiliar11--;         
                    }
                });
            });
		</script>
        <form method="post"> <!-- -->
        <input type="text" name="titulo" id="titulo" placeholder="Titulo" required autocomplete="off" pattern="[a-zA-Z0-9 ]{2,60}" title="Solo puede ingresar numeros y letras">
            <br>
            <br>
            <div class="form-group mx-5">
                <label for="numeroTelefonico">Descripcion: </label>
                <textarea id="descripcion" rows="5" name="descripcion"  style="resize:none; width:100%;"> </textarea>
            </div>
            </br>
            <label for="requerimientos">Requerimientos: </label>
            </br>
            <select id="select0" name="select0" class="mr-2">
                <option value="tipoConvocatoria">Seleccionar tipo de convocatoria</option>
				<option value="ConvocatoriaDocencia">Convocatoria de Docencia</option>
				<option value="ConvocatoriaAuxiliar">Convocatoria de Auxiliar</option>
		    </select>  
            </br>
            </br>
        <!--</table>
            <form method="post">-->
                <table class="tableD bg-info"  id="tablaD">
                    <tr class="fila-fijaD">
                        <td><input required name="cantidadD[]" placeholder="Cantidad"/></td>
                        <td><input required name="hrsAcademicas[]" placeholder="Horas academicas"/></td>
                        <td><input required name="destino[]" placeholder="Destino"/></td>
                        <td class="eliminarD"><input type="button"   value="Menos -"/></td>
                    </tr>
                </table>
                <button id="adicionarD" name="adicionarD" type="button" class="btnD btn-warning"> Más + </button>
                <table class="tableL bg-info"  id="tablaL">
                    <tr class="fila-fijaL">
                        <td><input required name="cantidadL[]" placeholder="Cantidad"/></td>
                        <td><input required name="hrsAcademicas[]" placeholder="Horas academicas"/></td>
                        <td><input required name="nombreAuxiliatura[]" placeholder="Nombre de la auxiliatura"/></td>
                        <td><input required name="codAux[]" placeholder="Codigo de la auxiliatura"/></td>
                        <td class="eliminarL"><input type="button"   value="Menos -"/></td>
                    </tr>
                </table>
                <button id="adicionarL" name="adicionarL" type="button" class="btnL btn-warning"> Más + </button>
                <div class="btn-der">
            <!--</form>-->

        <label for="requisitos">Requisitos: </label>
            <table class="table bg-info"  id="tablaRequ">
                <tr class="fila-fija1">
                    <td><input required class = "form-control input-lg" name="requisito[]" placeholder="Escriba su requerimiento" value=""/></td>
                    <td class="eliminar1"><input type="button"   value="Menos -"/></td>
                </tr>
            </table>

            <div class="btn-der">
                <input type="submit" name="insertarrr" value="Insertar Alumno" class="btn btn-info"/>
                <button id="adicionall" name="adicional1" type="button" class="btn btn-warning"> Más + </button>
                <br>
            </div>

            <label for="documentos">Documentos a presentar: </label>
            <table class="table bg-info"  id="tablaDoc">
                <tr class="fila-fija2">
                    <td><input required class = "form-control input-lg" name="documentos[]" placeholder="Escriba los documentos a presentar"/></td>
                    <td class="eliminar2"><input type="button"   value="Menos -"/></td>
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
            ///conv///
            $nombreDeConvocatoria=($_POST['titulo']);
            $descripcionConvocatoria=($_POST['descripcion']);
            pg_query($conexion,"INSERT INTO convocatorias (titulo, descripcion) VALUES ('$nombreDeConvocatoria','$descripcionConvocatoria')");

            $items0 = ($_POST['documentos']);
            $items1 = ($_POST['requisito']);
        ///////////// SEPARAR VALORES DE ARRAYS, EN ESTE CASO SON 4 ARRAYS UNO POR CADA INPUT (ID, NOMBRE, CARRERA Y GRUPO////////////////////)
            while(true) {
                //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
                    $item0 = current($items0);
                    $item1 = current($items1);
                ////// ASIGNARLOS A VARIABLES ///////////////////
                    $id0=(( $item0 !== false) ? $item0 : ", &nbsp;");
                    $id1=(( $item1 !== false) ? $item1 : ", &nbsp;");
                //// CONCATENAR LOS VALORES EN ORDEN PARA SU FUTURA INSERCIÓN ////////
                    $valores=''.$id0.',';
                    $valores1=''.$id1.',';
                //////// YA QUE TERMINA CON COMA CADA FILA, SE RESTA CON LA FUNCIÓN SUBSTR EN LA ULTIMA FILA /////////////////////
                    $valoresD= substr($valores, 0, -1);
                    $valoresQ= substr($valores1, 0, -1);
                ///////// QUERY DE INSERCIÓN ////////////////////////////
                    //$sql = "INSERT INTO requisitos (iddescripcion_requisito)
                    //VALUES $valoresQ";
                    if($valoresD !== ", &nbsp;"){
                        pg_query($conexion,"INSERT INTO documentos (id_convocatoria, descripcion_documento) VALUES ('1','$valoresD')");
                    }
                    if($valoresQ !== ", &nbsp;"){
                        pg_query($conexion,"INSERT INTO requisitos (id_convocatoria, descripcion_requisito) VALUES ('1','$valoresQ')");
                    }
                    //pg_query($conexion,"INSERT INTO documentos (id_convocatoria, descripcion_documento) VALUES ('1','$valoresD')");
                    //pg_query($conexion,"INSERT INTO requisitos (id_convocatoria, descripcion_requisito) VALUES ('1','$valoresQ')");
            
                    //$sqlRes=$conexion->query($sql) or mysql_error();
                // Up! Next Value
                    $item0 = next( $items0 );
                    $item1 = next( $items1 );
                // Check terminator
                if($item0 === false && $item1 === false) break;
            }            
        }

        ?>
    </section>
    <br>
                <!----------------------------------------------------- -->
    <form action="../formularios/form_subirPublicacion2.php" method="post" enctype="multipart/form-data">
            
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
