<?php
    try{
        $myPDO = new PDO("pgsql:host=ec2-52-201-55-4.compute-1.amazonaws.com;dbname=ddm5k6l3g5nntm","erpgwqxdcmmizk","d764438378b6a33d99872ff2f4321949530f5f26e8271e10fb80ece8311e701a");
        $myPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $MostrarNombreSQL = $myPDO->prepare('SELECT password_administrativo FROM ADMINISTRATIVO;');
        $MostrarNombreSQL->execute();
        while($row=$MostrarNombreSQL->fetch(PDO::FETCH_ASSOC)){
            echo $row['password_administrativo'];
        }
        
    }catch(PDOException $e){
        echo "error al conectar a la base de datos";
        echo $e->getMessage();
    }finally{
        $myPDO =null;
    }


?>