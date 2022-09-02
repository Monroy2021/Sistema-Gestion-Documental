<?php
class subserieVO{
    public $id_subse;
    public $id_serie; 
    public $nom_serie;
    public $nom_subse;
    public $orden_subse;
    public $desc_subse;
    
    public function __construct(){
    }

    //Funciones que se obtienen los valores de los atributos del objeto

    public function getId_subse(){
        return $this->id_subse;
    }

    public function getId_serie(){
        return $this->id_serie;
    }
    
    public function getNom_serie(){
        return $this->nom_serie;
    } 

    public function getNom_subse(){
        return $this->nom_subse;
    } 

    public function getOrden_subse(){
        return $this->orden_subse;
    } 

    public function getDesc_subse(){
        return $this->desc_subse;
    }
  

    //Funciones para recuperar los valores de los atributos del objeto

    public function setId_subse($id_subse){
        $this->id_subse = $id_subse;
    }

    public function setId_serie($id_serie){
        $this->id_serie = $id_serie;
    } 

    public function setNom_serie($nom_serie){
        $this->nom_serie = $nom_serie;
    } 

    public function setNom_subse($nom_subse){
        $this->nom_subse = $nom_subse;
    } 

    public function setOrden_subse($orden_subse){
        $this->orden_subse = $orden_subse;
    } 

    public function setDesc_subse($desc_subse){
        $this->desc_subse = $desc_subse;
    }
    
}
?>