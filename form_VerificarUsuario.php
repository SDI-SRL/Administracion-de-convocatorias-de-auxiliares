<?php 
    if((strlen($_POST['IdUsuaario'])>0) && (strlen($_POST['IdPassword'])>0)){
        $usuario=$_POST['IdUsuaario'];
        $pass=$_POST['IdPassword'];

        require_once('conexion.php');
        $conn=conectarBaseDeDatos();
        $pasword=pg_query($conn,"SELECT password_administrativo FROM ADMINISTRATIVO WHERE correo_Administrativo='$usuario'");
        $str = pg_query("SELECT password_administrativo FROM ADMINISTRATIVO WHERE correo_Administrativo='$usuario'");
        $arr = pg_fetch_array($str);
        if(password_verify($pass, $arr['password_administrativo'])){
            //para iniciar sesion
            $getnombre=pg_query($conn,"SELECT nombre_administrativo FROM ADMINISTRATIVO WHERE correo_Administrativo='$usuario'");
            $row=pg_fetch_row($getnombre);
            $gettelefono=pg_query($conn,"SELECT numero_telefonico FROM ADMINISTRATIVO WHERE correo_Administrativo='$usuario'");
            $row2=pg_fetch_row($gettelefono);
            session_start();
            $_SESSION['sesion']=$row[0];
            //Passar correo y contraseña
            $_SESSION['correo']=$usuario;
            $_SESSION['passoword']=$pass;
            $_SESSION['telefono']=$row2[0];

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