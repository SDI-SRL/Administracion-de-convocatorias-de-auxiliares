<?php 
    if((strlen($_POST['IdUsuaario'])>0) && (strlen($_POST['IdPassword'])>0)){
        $usuario=$_POST['IdUsuaario'];
        $pass=$_POST['IdPassword'];
        require_once("Modelo/adminstrativo.php");
        $administrativo = new Administrativo();
        $password=$administrativo-> obtenerPasswordAdministrativo($usuario);
        if(password_verify($pass, $password)){
            session_start();
            $_SESSION['correo']=$usuario;
            $_SESSION['passoword']=$pass;
            $getnombre=$administrativo->obtenerNombreAdministrativo($usuario);
            $_SESSION['sesion']=$getnombre;
            $gettelefono=$administrativo->obtenerNumeroTelefonicoAdministrativo($usuario);
            $_SESSION['telefono']=$gettelefono;
            $getCargo=$administrativo->obtenerCargoAdministrativo($usuario);
            $_SESSION['cargoUsuario']=$getCargo;
            $getSexo=$administrativo->obtenerSexoAdministrativo($usuario);
            $_SESSION['sexoUsuario']=$getSexo;
            $_SESSION['bandera']=true;
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