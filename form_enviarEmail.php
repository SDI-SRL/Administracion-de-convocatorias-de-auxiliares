<?php 
    
    if(isset($_POST['reenvio_Pass'])){
        $correDestino=$_POST['reenvio_Pass'];
        require_once('conexion.php');
        $conn=conectarBaseDeDatos();
        $consulta=pg_query($conn,"SELECT * FROM ADMINISTRATIVO WHERE correo_Administrativo='$correDestino'");
        if(pg_fetch_row($consulta)>0){
            require 'vendor/autoload.php'; //

            $getPassword=pg_query($conn,"SELECT password_administrativo FROM ADMINISTRATIVO WHERE correo_Administrativo='$correDestino'");
            $resultado=pg_fetch_row($getPassword);
            $destino=$resultado[0];

            $from = new SendGrid\Email(null, "ConvocatoriaUMSS@email.com");
            $subject = "Recuperacion de password ";
            $to = new SendGrid\Email(null, $destino);
            $content = new SendGrid\Content("text/html", "<p>Hemos visto que ha tenido problemas para recordar su password <h3>$mensaje</h3></p>");
            $mail = new SendGrid\Mail($from, $subject, $to, $content);

            $apiKey = getenv('SENDGRID_API_KEY');
            $sg = new \SendGrid($apiKey);
    
            $response = $sg->client->mail()->send()->post($mail);
            echo $response->statusCode();
            echo $response->headers();
            echo $response->body();


            header("Location:login.php?dato=x");
        }else{
            header("Location:login.php?dato=y");
        }
    }else{
        header("Location:login.php?dato=z");
    }
?>