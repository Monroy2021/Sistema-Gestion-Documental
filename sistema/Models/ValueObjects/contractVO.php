<?php
class contractVO{
    public $id_con;
    public $id_tip_pers;
    public $nom_tip_pers;
    public $orden_tip_pers;
    public $cod_reg_oper;
    public $ced_pers;
    public $id_emp;
    public $nom_emp;
    public $nom_pers;
    public $ape_pers;
    public $fec_exp_ced_pers;
    public $cel_pers;
    public $tel_pers;
    public $email_pers;
    public $sex_pers;
    public $dir_pers;
    public $ciud_pers;
    public $fec_act_pers;

    public function __construct(){
    }

    //Funciones que se obtienen los valores de los atributos del objeto
    public function getId_con(){
        return $this->id_con;
    }

    public function getId_tip_pers_con(){
        return $this->id_tip_pers;
    }

    public function getNom_tip_pers_con(){
        return $this->nom_tip_pers;
    }

    public function getOrden_tip_pers_con(){
        return $this->orden_tip_pers;
    }

    public function getCod_reg_oper_con(){
        return $this->cod_reg_oper;
    }

    public function getCed_pers_con(){
        return $this->ced_pers;
    }

    public function getId_emp_con(){
        return $this->id_emp;
    }

    public function getNom_emp_con(){
        return $this->nom_emp;
    }

    public function getNom_pers_con(){
        return $this->nom_pers;
    }

    public function getApe_pers_con(){
        return $this->ape_pers;
    }

    public function getFec_exp_ced_pers_con(){
        return $this->fec_exp_ced_pers;
    }

    public function getCel_pers_con(){
        return $this->cel_pers;
    }

    public function getTel_pers_con(){
        return $this->tel_pers;
    }

    public function getEmail_pers_con(){
        return $this->email_pers;
    }

    public function getSex_pers_con(){
        return $this->sex_pers;
    }

    public function getDir_pers_con(){
        return $this->dir_pers;
    }

    public function getCiud_pers_con(){
        return $this->ciud_pers;
    }

    public function getFec_act_pers_con(){
        return $this->fec_act_pers;
    }

    //Funciones para recuperar los valores de los atributos del objeto

    public function setId_con($id_con){
        $this->id_con = $id_con;
    }

    public function setId_tip_pers_con($id_tip_pers){
        $this->id_tip_pers = $id_tip_pers;
    }

    public function setNom_tip_pers_con($nom_tip_pers){
        $this->nom_tip_pers = $nom_tip_pers;
    }

    public function setOrden_tip_pers_con($orden_tip_pers){
        $this->orden_tip_pers = $orden_tip_pers;
    }

    public function setCod_reg_oper_con($cod_reg_oper){
        $this->cod_reg_oper = $cod_reg_oper;
    }

    public function setCed_pers_con($ced_pers){
        $this->ced_pers = $ced_pers;
    }

    public function setId_emp_con($id_emp){
        $this->id_emp = $id_emp;
    }

    public function setNom_emp_con($nom_emp){
        $this->nom_emp = $nom_emp;
    }

    public function setNom_pers_con($nom_pers){
        $this->nom_pers = $nom_pers;
    }

    public function setApe_pers_con($ape_pers){
        $this->ape_pers = $ape_pers;
    }

    public function setFec_exp_ced_pers_con($fec_exp_ced_pers){
        $this->fec_exp_ced_pers = $fec_exp_ced_pers;
    }

    public function setCel_pers_con($cel_pers){
        $this->cel_pers = $cel_pers;
    }

    public function setTel_pers_con($tel_pers){
        $this->tel_pers = $tel_pers;
    }

    public function setEmail_pers_con($email_pers){
        $this->email_pers = $email_pers;
    }

    public function setSex_pers_con($sex_pers){
        $this->sex_pers = $sex_pers;
    }

    public function setDir_pers_con($dir_pers){
        $this->dir_pers = $dir_pers;
    }

    public function setCiud_pers_con($ciud_pers){
        $this->ciud_pers = $ciud_pers;
    }

    public function setFec_act_pers_con($fec_act_pers){
        $this->fec_act_pers = $fec_act_pers;
    }
    
}
?>