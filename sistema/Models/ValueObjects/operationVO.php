<?php
class operationVO{
    public $id_con;
    public $cod_reg_oper;
    public $id_tip_oper;
    public $nom_tip_oper;
    public $ced_pers_oper;
    public $id_prop_oper;
    public $id_tip_pers_oper;
    public $nom_tip_pers_oper;
    public $desc_oper;
    public $cod_reg_oper_dep;
    public $estado_oper;
    public $fec_oper;

    public function __construct(){
    }

     //Funciones que se obtienen los valores de los atributos del objeto

     public function getId_con_oper(){
        return $this->id_con;
    }

    public function getCod_reg_oper(){
        return $this->cod_reg_oper;
    }

    public function getId_tip_oper(){
        return $this->id_tip_oper;
    }

    public function getNom_tip_oper(){
        return $this->nom_tip_oper;
    }

    public function getCed_pers_oper(){
        return $this->ced_pers_oper;
    }

    public function getId_prop_oper(){
        return $this->id_prop_oper;
    }

    public function getId_tip_pers_oper(){
        return $this->id_tip_pers_oper;
    }

    public function getNom_tip_pers_oper(){
        return $this->nom_tip_pers_oper;
    }

    public function getDesc_oper(){
        return $this->desc_oper;
    }

    public function getCod_reg_oper_dep(){
        return $this->cod_reg_oper_dep;
    }

    public function getEstado_oper(){
        return $this->estado_oper;
    }

    public function getFec_oper(){
        return $this->fec_oper;
    }

    //Funciones para recuperar los valores de los atributos del objeto

    public function setId_con_oper($id_con){
        $this->id_con = $id_con;
    }

    public function setCod_reg_oper($cod_reg_oper){
        $this->cod_reg_oper = $cod_reg_oper;
    }

    public function setId_tip_oper($id_tip_oper){
        $this->id_tip_oper = $id_tip_oper;
    }

    public function setNom_tip_oper($nom_tip_oper){
        $this->nom_tip_oper = $nom_tip_oper;
    }

    public function setCed_pers_oper($ced_pers_oper){
        $this->ced_pers_oper = $ced_pers_oper;
    }

    public function setId_prop_oper($id_prop_oper){
        $this->id_prop_oper = $id_prop_oper;
    }

    public function setId_tip_pers_oper($id_tip_pers_oper){
        $this->id_tip_pers_oper = $id_tip_pers_oper;
    }

    public function setNom_tip_pers_oper($nom_tip_pers_oper){
        $this->nom_tip_pers_oper = $nom_tip_pers_oper;
    }

    public function setDesc_oper($desc_oper){
        $this->desc_oper = $desc_oper;
    }

    public function setCod_reg_oper_dep($cod_reg_oper_dep){
        $this->cod_reg_oper_dep = $cod_reg_oper_dep;
    }

    public function setEstado_oper($estado_oper){
        $this->estado_oper = $estado_oper;
    }

    public function setFec_oper($fec_oper){
        $this->fec_oper = $fec_oper;
    }
}
?>