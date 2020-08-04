<?php
    require_once("conexion.php");
    class Evaluacion extends Connexion{
        public function Evaluacion(){
            parent::__construct();
        }
        public function cerrarConexion(){
            $this->connexion_bd=null;
        }
        public function obtenerTitulosPruebas($idConvocatoria){
            $sql = "SELECT * FROM meritos_generales WHERE id_convocatoria = :idCon ORDER BY id_merito";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute(array(":idCon"=>$idConvocatoria));
            $resultado=$sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL -> closeCursor();
            return $resultado;
        }
        public function obtenerReglas($idMerito){
            $sql = "SELECT * FROM reglas_meritos WHERE id_merito = :idMerito";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute(array(":idMerito"=>$idMerito));
            $resultado=$sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL -> closeCursor();
            return $resultado;
        }
        public function obtenerNormas($idRegla){
            $sql = "SELECT * FROM normas_meritos WHERE id_regla = :idRegla";
            $sentenceSQL = $this->connexion_bd->prepare($sql);
            $sentenceSQL->execute(array(":idRegla"=>$idRegla));
            $resultado=$sentenceSQL->fetchAll(PDO::FETCH_ASSOC);
            $sentenceSQL -> closeCursor();
            return $resultado;
        }
    }
?>