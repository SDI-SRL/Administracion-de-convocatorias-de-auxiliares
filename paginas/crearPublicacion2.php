<?php
    session_start();
    $var=$_SESSION['sesion'];
    if($var == null || $var = '' ){
        echo "Erro al autentificar";
        header("Location:../index.php?error=x");
    }
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
                <textarea id="descripcion" rows="9" name="descripcion"  style="resize:none; width:100%;"> </textarea>
            </div>
            <div class="form-group mx-5">
                <label for="requisitos">Requisitos: </label>
                <?php
                    # La lista de requisitos; por defecto vacía
                    $requisitos0 = [];
                    # Si hay requisitos enviados por el formulario; entonces
                    # la lista es el formulario.
                    # Cada que lo envíen, se agrega un elemento a la lista
                    if (isset($_POST["requisitos0"])) {
                        $requisitos0 = $_POST["requisitos0"];
                    }
                    # Detectar cuál botón fue presionado
                    # Más info: https://parzibyte.me/blog/2019/07/23/php-formulario-dos-botones/
                    # En caso de que haya sido el de guardar, no agregamos más campos
                    if (isset($_POST["guardar"])) {
                        # Quieren guardar; no quieren agregar campos
                        echo "OK se guarda lo siguiente:<br>";
                        print_r($requisitos0);
                        exit;
                    }
                ?>
                    <form method="post" action="crearPublicacion2.php">
                        <?php
                        $indices = array('a)', 'b)', 'c)', 'd)', 'e)', 'f)', 'g)', 'h)', 'i)', 'j)', 'k)', 'l)', 'm)', 'n)', 'o)', 'p)', 'q)', 'r)', 's)', 't)');
                        $cant = -1;
                        $id = 0;
                        ?>
                        <!--Comienza el ciclo que dibuja los campos dinámicos-->
                        <?php foreach ($requisitos0 as $requisito0) { $cant++; $id++;?>
                            <label for="requisitoInd"><?php echo $indices[$cant]?> </label>
                            <input value="<?php echo $requisito0 ?>" type="text" name="requisitos0[]">
                            <!--<a name="< "?" php echo $id?>" class='btn btn-danger' onclick="borrar($id)" title='Eliminar'><i class='fas fa-trash-alt'></i></a>-->
                            <br><br>
                            <?php } ?>
                        <!--Termina el ciclo que dibuja los campos dinámicos-->

                        <!--Fuera de la lista tenemos siempre este campo, es el primero-->
                        <input autocomplete="off" autofocus value="" type="text" name="requisitos0[]">
                        <!--<label for="numeroTelefonico">indices </label>
                        <input autocomplete="off" autofocus value="" type="text" name="requisitos0[]">
                        <a class='btn btn-danger' onclick="" title='Eliminar'><i class='fas fa-trash-alt'></i></a>
                        <br><br>-->
                        <button name="agregar" type="submit">Agregar campo</button>
                        <button name="guardar" type="submit">Guardar lista</button>
                    </form>
            </div>

            <script type="text/javascript">
                function borrar($x)
                    {
                        unset($requisitos[$x]);
                        var_export ($requisitos);
                    }
            </script>
            
            <div class="form-group mx-5">
                
                <?php
                    $requisitos = [];
                    $requerimientos = [];
                    # Cada que lo envíen, se agrega un elemento a la lista
                    if (isset($_POST["requerimientos"])) {
                        $requerimientos = $_POST["requerimientos"];
                    }
                    if (isset($_POST["requisitos"])) {
                        $requisitos = $_POST["requisitos"];
                    }
                    if (isset($_POST["guardar"])) {
                        # Quieren guardar; no quieren agregar campos
                        echo "OK se guarda lo siguiente:<br>";
                        print_r($requerimientos);
                        exit;
                    }
                ?>
                    <form method="post" action="crearPublicacion2.php">
                        <?php
                        $indicesRequisitos = array('a)', 'b)', 'c)', 'd)', 'e)', 'f)', 'g)', 'h)', 'i)', 'j)', 'k)', 'l)', 'm)', 'n)', 'o)', 'p)', 'q)', 'r)', 's)', 't)');
                        $cantRequisitos = -1;
                        $limiteDeRequisitos = 3;
                        $idRequisitos = 0;
                        ?>
                        <!--Comienza el ciclo que dibuja los campos dinámicos-->
                        <label for="requerimientos">Requisitos: </label>
                        <br>
                        <?php 
                            foreach ($requisitos as $requisito) { $cantRequisitos++; $idRequisitos++;
                                if($cantRequisitos < $limiteDeRequisitos){
                                echo "<label for='requisitoInd'>".$indicesRequisitos[$cantRequisitos]." </label>";
                                echo "<input value='".$requisito."' type='text' name='requisitos[]'>";
                                echo "<br><br>";
                                }
                                if($cantRequisitos >= $limiteDeRequisitos){
                                echo '<script language="javascript">';
                                echo 'alert("La convocatoria no puede tener mas de 20 requisitos")';
                                echo '</script>';
                                }
                            }                         
                        ?>
                        <input autocomplete="off" autofocus value="" type="text" name="requerimientos[]">
                        <button name="agregar" type="submit">Agregar campo</button>
                        <button name="guardar" type="submit">Guardar lista</button>
                        <br><br>

                        <?php
                        $indicesRequerimientos = array('a)', 'b)', 'c)', 'd)', 'e)', 'f)', 'g)', 'h)', 'i)', 'j)', 'k)', 'l)', 'm)', 'n)', 'o)', 'p)', 'q)', 'r)', 's)', 't)');
                        $cantRequerimientos = -1;
                        $limiteDeRequerimientos = 3;
                        $idRequerimientos = 0;
                        ?>
                        <label for="requerimientos">Requerimientos: </label>
                        <br>
                        <?php                       
                            foreach ($requerimientos as $requerimiento) { $cantRequerimientos++; $idRequerimientos++;
                                if($cant < $limiteDeRequerimientos){
                                echo "<label for='requerimientoInd'>".$indicesRequerimientos[$cantRequerimientos]." </label>";
                                echo "<input value='".$requerimiento."' type='text' name='requerimientos[]'>";
                                echo "<br><br>";
                                }
                                if($cantRequerimientos >= $limiteDeRequerimientos){
                                echo '<script language="javascript">';
                                echo 'alert("La convocatoria no puede tener mas de 20 requerimientos")';
                                echo '</script>';
                                }
                            }
                        ?>
                        <input autocomplete="off" autofocus value="" type="text" name="requerimientos[]">
                        <button name="agregar" type="submit">Agregar campo</button>
                        <button name="guardar" type="submit">Guardar lista</button>
                    </form>
            </div>
    <form action="../formularios/form_subirPublicacion.php" method="post" enctype="multipart/form-data">
            
        <div class="form-group mx-5">
            <label for="numeroTelefonico">Documentos: </label>
            <textarea id="documentos" rows="9" name="requisidocumentostos"  style="resize:none; width:100%;"> </textarea>
        </div>
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
