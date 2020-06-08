<?php
    session_start();
    $var=$_SESSION['sesion'];
    if($var == null || $var = '' ){
        echo "Error al autentificar";
        header("Location:index.php?error=x");
    }

    require_once('conexion.php');
    $conn=conectarBaseDeDatos();

    $nuevoCorreo=$_POST['nuevoCorreo'];
    $nuevoTelefono=$_POST['numeroTelefonico'];
    $nuevoPass=$_POST['nuevoPassword'];
    $CpyNuevoPass=$_POST['copiaNuevoPassword'];

    $aux=true;
    $bandera=true;
    if($nuevoPass!=$CpyNuevoPass){
        $bandera=false;
        header("Location:cambiarEmailPassword.php?problem=x");        
    }else{
        if($nuevoPass!=$_SESSION['passoword']){
            //Crear Consulta para actualizar el password
            $sql0= "UPDATE administrativo SET password_decodificado = '".$nuevoPass."' WHERE correo_administrativo = '".$_SESSION['correo']."'";//auxiliar
            pg_query($sql0);
            $hash = password_hash($nuevoPass, PASSWORD_DEFAULT, ['cost' => 10]);
            $sql= "UPDATE administrativo SET password_administrativo = '".$hash."' WHERE correo_administrativo = '".$_SESSION['correo']."'";
            pg_query($sql);
            //return pg_execute($conn, $sql);
        }
    }
    
    if($nuevoCorreo!=$_SESSION['correo']){
        //crear Consulta para actualizar correo
        $sql2= "UPDATE administrativo SET correo_administrativo = '".$nuevoCorreo."' WHERE correo_administrativo = '".$_SESSION['correo']."'";
        pg_query($sql2);
    }
    if($nuevoTelefono!=$_SESSION['telefono']){
        //consulta para actualizar telefono
        //$hashT = password_hash($nuevoTelefono, PASSWORD_DEFAULT, ['cost' => 10]);
        $sql3= "UPDATE administrativo SET numero_telefonico = '".$nuevoTelefono."' WHERE correo_administrativo = '".$_SESSION['correo']."'";
        pg_query($sql3);
    }

    if($bandera){
        header("Location:CRUD_publicaciones.php");
    }
        
    
?>