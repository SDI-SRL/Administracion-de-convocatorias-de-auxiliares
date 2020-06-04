<?php 
    if((strlen($_POST['IdUsuaario'])>0) && (strlen($_POST['IdPassword'])>0)){
        $usuario=$_POST['IdUsuaario'];
        $pass=$_POST['IdPassword'];
        /*ingresar sin conexion a la base de datos
        if($usuario=='secretaria@gmail.com' && $pass== '123'){
            header("Location:secretaria.php");
        }else{
            echo "persona no encontrada";
        }
        */
        require_once('conexion.php');
        $conn=conectarBaseDeDatos();
        //$consulta=pg_query($conn,"SELECT * FROM ADMINISTRATIVO WHERE correo_Administrativo='$usuario' AND password_administrativo='$pass'");
        $pasword=pg_query($conn,"SELECT password_administrativo FROM ADMINISTRATIVO WHERE correo_Administrativo='$usuario'");
        $str = pg_query("SELECT password_administrativo FROM ADMINISTRATIVO WHERE correo_Administrativo='$usuario'");
        $arr = pg_fetch_array($str);
        if(password_verify($pass, $arr['password_administrativo'])){
            //para iniciar sesion
            $getnombre=pg_query($conn,"SELECT nombre_administrativo FROM ADMINISTRATIVO WHERE correo_Administrativo='$usuario'");
            $row=pg_fetch_row($getnombre);
            session_start();
            $_SESSION['sesion']=$row[0];
            header("Location:CRUD_publicaciones.php");
        }else{
            echo "Error al autentificar";
            header("Location:index.php?error=x");
        }
    }else{
    echo "Eror al autentificar";
    header("Location:index.php?error=y");
    }
?>
