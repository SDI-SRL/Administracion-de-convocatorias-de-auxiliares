<?php
    require_once("conexion.php");
    class Convocatoria extends Connexion{
        public function Convocatoria(){
            parent::__construct();
        }
        public function cerrarConexion(){
            $this->connexion_bd=null;
        }
        public function mostrarConvocatoriaCompleta($id){
            $sql="SELECT * FROM convocatoria WHERE id_convocatoria= :id";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute(array(":id"=>$id));
            $resultado=$sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            return $resultado;
        }
        public function mostrarConvocatoriaFechaAscendente($fechaActual){
            $sql="SELECT nombre_convocatoria,descripcion_conv,fecha_subida,direccion_pdf FROM convocatoria WHERE visible='true' AND ? <= fecha_expiracion ORDER BY fecha_subida desc";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute([$fechaActual]);
            $resultado=$sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            return $resultado;
        }
        public function mostrarTodasConvocatoriaFechaAscendente(){
            $sql="SELECT nombre_convocatoria,descripcion_conv,fecha_subida,direccion_pdf,id_convocatoria,fecha_expiracion,creador FROM convocatoria WHERE visible='true' ORDER BY fecha_subida desc";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute();
            $resultado=$sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            return $resultado;
        }
        public function mostrarTodasConvocatoriaFechaDescendente(){
            $sql="SELECT nombre_convocatoria,descripcion_conv,fecha_subida,direccion_pdf,id_convocatoria,fecha_expiracion,creador FROM convocatoria WHERE visible='true' ORDER BY fecha_subida asc";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute();
            $resultado=$sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            return $resultado;
        }
        public function mostrarTodasConvocatoriaNombreDescendente(){
            $sql="SELECT nombre_convocatoria,descripcion_conv,fecha_subida,direccion_pdf,id_convocatoria,fecha_expiracion,creador FROM convocatoria WHERE visible='true' ORDER BY nombre_convocatoria desc";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute();
            $resultado=$sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            return $resultado;
        }
        public function mostrarTodasConvocatoriaNombreAscendente(){
            $sql="SELECT nombre_convocatoria,descripcion_conv,fecha_subida,direccion_pdf,id_convocatoria,fecha_expiracion,creador FROM convocatoria WHERE visible='true' ORDER BY nombre_convocatoria asc";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute();
            $resultado=$sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            return $resultado;
        }

        public function mostrarTodasConvocatoriaAutorDescendente(){
            $sql="SELECT nombre_convocatoria,descripcion_convocatoria,fecha_subida,direccion_pdf,id_convocatoria,fecha_expiracion,creador FROM convocatoria WHERE visible='true' ORDER BY creador desc";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute();
            $resultado=$sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            return $resultado;
        }
        public function mostrarTodasConvocatoriaAutorAscendente(){
            $sql="SELECT nombre_convocatoria,descripcion_convocatoria,fecha_subida,direccion_pdf,id_convocatoria,fecha_expiracion,creador FROM convocatoria WHERE visible='true' ORDER BY creador asc";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute();
            $resultado=$sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            return $resultado;
        }

        public function agregarConvocatoria($nombreDeConvocatoria,$fechaActual,$direccionBaseDeDatos,$descripcion,$FechaHoraExpiracion,$tipoConvocatoria,$departamento,$gestion,$autor){
            $sql= "INSERT INTO convocatoria(nombre_convocatoria,fecha_subida,direccion_pdf,descripcion_convocatoria,visible,fecha_expiracion,tipo_convocatoria,departamento,gestion,creador)
            VALUES (:nomConvocatoria,:fechaActual,:direccionBaseDeDatos,:descripcion,TRUE,:fechaHoraExpiracion,:tipoConvocatoria,:departamento,:gestion,:autor)";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $resultado=$sentenceSQL->execute(array(":nomConvocatoria"=>$nombreDeConvocatoria,":fechaActual"=>$fechaActual,":direccionBaseDeDatos"=>$direccionBaseDeDatos,":descripcion"=>$descripcion,
            ":fechaHoraExpiracion"=>$FechaHoraExpiracion,":tipoConvocatoria"=>$tipoConvocatoria,":departamento"=>$departamento,":gestion"=>$gestion,":autor"=>$autor));
            $sentenceSQL->closeCursor();
            return $resultado;
        }
        public function actualizarConvocatoria($id,$titulo,$descripcion,$enlace,$fechaActual,$tipoConvocatoria,$departamento,$gestion,$FechaHoraExpiracion){
            $sql= "UPDATE convocatoria set nombre_convocatoria= :tit,descripcion_convocatoria= :descr,direcccion_pdf= :enlace,fecha_subida=:fechActual,tipo_convocatoria=:tipConvo,departamento= :depar,gestion= :ges,fecha_expiracion=:fechExp WHERE id_convocatoria= :id";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $resultado=$sentenceSQL->execute(array(":tit"=>$titulo,":descr"=>$descripcion,":enlace"=>$enlace,":fechActual"=>$fechaActual,":tipConvo"=>$tipoConvocatoria,
            ":depar"=>$departamento,":ges"=>$gestion,"fechExp"=>$FechaHoraExpiracion,":id"=>$id));
            $sentenceSQL->closeCursor();
            return $resultado;
        }

        public function eliminarConvocatoria($id){
            $sql="UPDATE convocatoria SET visible=false WHERE id_convocatoria= :id";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute(array(":id"=>$id));
            $resultado=$sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL->closeCursor();
            return $resultado;
        }
    }
    
?>