<?php
class soporteVO{
    public $cod_reg_oper_sop;
    public $id_sop;
    public $cod_docs;
    public $nom_docs;
    public $nom_sop;
    public $ext_arch_sop;
    public $orden_sop;
    public $rep_sop;
    

    public function __construct(){
    }

     //Funciones que se obtienen los valores de los atributos del objeto

    public function getOper_sop(){
        return $this->cod_reg_oper_sop;
    }
    
    public function getId_sop(){
        return $this->id_sop;
    }

    public function getCod_docs(){
        return $this->cod_docs;
    }

    public function getNom_docs(){
        return $this->nom_docs;
    }

    public function getNom_sop(){
        return $this->nom_sop;
    }

    public function getExt_arch_sop(){
        return $this->ext_arch_sop;
    }

    public function getOrden_sop(){
        return $this->orden_sop;
    }

    public function getRep_sop(){
        return $this->rep_sop;
    }

    //Funciones para recuperar los valores de los atributos del objeto

    public function setId_sop($id_sop){
        $this->id_sop = $id_sop;
    }

    public function setOper_sop($cod_reg_oper_sop){
        $this->cod_reg_oper_sop = $cod_reg_oper_sop;
    }

    public function setCod_docs($cod_docs){
        $this->cod_docs = $cod_docs;
    }

    public function setNom_docs($nom_docs){
        $this->nom_docs = $nom_docs;
    }

    public function setNom_sop($nom_sop){
        $this->nom_sop = $nom_sop;
    }

    public function setExt_arch_sop($ext_arch_sop){
        $this->ext_arch_sop = $ext_arch_sop;
    }

    public function setOrden_sop($orden_sop){
        $this->orden_sop = $orden_sop;
    }

    public function setRep_sop($rep_sop){
        $this->rep_sop = $rep_sop;
    }

}
?>