<?php
class contractleasingVO{
    public $id_prop;
    public $id_tip_prop;
    public $nom_tip_prop;
    public $cod_reg_oper;
    public $estado_oper;
    public $cod_reg_oper_dep;
    public $ced_pers;
    public $nom_pers;
    public $ape_pers;
    public $cel_pers;
    public $tel_pers;
    public $email_pers;
    public $sex_pers;
    public $dir_pers;
    public $ciud_pers;
    public $id_tip_oper; 
    public $nom_tip_oper;
    public $id_tip_pers;
    public $nom_tip_pers;
    public $cod_arch;
    public $arch_nom;
    public $arch_num;
    public $id_serie;
    public $nom_serie;
    
    //consulta aparte

    //public $cod_tip_carp;
    //public $nom_tip_carp;
    //public $cod_carp;
    //public $desc_carp;
    //public $id_serie;
    //public $nom_serie;

    public function __construct(){
    }

    //Funciones que se obtienen los valores de los atributos del objeto

    public function getId_prop_ca(){
        return $this->id_prop;
    }

    public function getId_tip_prop_ca(){
        return $this->id_tip_prop;
    }

    public function getNom_tip_prop_ca(){
        return $this->nom_tip_prop;
    }

    public function getCod_reg_oper_ca(){
        return $this->cod_reg_oper;
    }

    public function getEstado_oper_ca(){
        return $this->estado_oper;
    }

    public function getCod_reg_oper_dep_ca(){
        return $this->cod_reg_oper_dep;
    }

    public function getCed_pers_ca(){
        return $this->ced_pers;
    }

    public function getNom_pers_ca(){
        return $this->nom_pers;
    }

    public function getApe_pers_ca(){
        return $this->ape_pers;
    }

    public function getFec_exp_ced_pers_ca(){
        return $this->fec_exp_ced_pers;
    }

    public function getCel_pers_ca(){
        return $this->cel_pers;
    }

    public function getTel_pers_ca(){
        return $this->tel_pers;
    }

    public function getEmail_pers_ca(){
        return $this->email_pers;
    }

    public function getSex_pers_ca(){
        return $this->sex_pers;
    }

    public function getDir_pers_ca(){
        return $this->dir_pers;
    }

    public function getCiud_pers_ca(){
        return $this->ciud_pers;
    }

    public function getId_tip_oper_ca(){
        return $this->id_tip_oper;
    }

    public function getNom_tip_oper_ca(){
        return $this->nom_tip_oper;
    }

    public function getId_tip_pers_ca(){
        return $this->id_tip_pers;
    }

    public function getNom_tip_pers_ca(){
        return $this->nom_tip_pers;
    }

    public function getCod_arch_ca(){
        return $this->cod_arch;
    }

    public function getNom_arch_ca(){
        return $this->nom_arch;
    }

    public function getNum_arch_ca(){
        return $this->num_arch;
    }

    public function getId_serie_ca(){
        return $this->id_serie;
    }

    public function getNom_serie_ca(){
        return $this->nom_serie;
    }

    //public function getCod_tip_carp_cm(){
    //    return $this->cod_tip_carp;
    //}

    //public function getNom_tip_carp_cm(){
    //    return $this->nom_tip_carp;
    //}

    //public function getCod_carp_cm(){
    //    return $this->cod_carp;
    //}

    //public function getDesc_carp_cm(){
    //    return $this->desc_carp;
    //}

    //public function getId_serie_cm(){
    //    return $this->id_serie;
    //}

    //public function getNom_serie_cm(){
    //    return $this->nom_serie;
    //}

    //Funciones para recuperar los valores de los atributos del objeto

    public function setId_prop_ca($id_prop){
        $this->id_prop = $id_prop;
    }

    public function setId_tip_prop_ca($id_tip_prop){
        $this->id_tip_prop = $id_tip_prop;
    }

    public function setNom_tip_prop_ca($nom_tip_prop){
        $this->nom_tip_prop = $nom_tip_prop;
    }

    public function setCod_reg_oper_ca($cod_reg_oper){
        $this->cod_reg_oper = $cod_reg_oper;
    }

    public function setEstado_oper_ca($estado_oper){
        $this->estado_oper = $estado_oper;
    }

    public function setCod_reg_oper_dep_ca($cod_reg_oper_dep){
        $this->cod_reg_oper_dep = $cod_reg_oper_dep;
    }

    public function setCed_pers_ca($ced_pers){
        $this->ced_pers = $ced_pers;
    }

    public function setNom_pers_ca($nom_pers){
        $this->nom_pers = $nom_pers;
    }

    public function setApe_pers_ca($ape_pers){
        $this->ape_pers = $ape_pers;
    }

    public function setFec_exp_ced_pers_ca($fec_exp_ced_pers){
        $this->fec_exp_ced_pers = $fec_exp_ced_pers;
    }

    public function setCel_pers_ca($cel_pers){
        $this->cel_pers = $cel_pers;
    }

    public function setTel_pers_ca($tel_pers){
        $this->tel_pers = $tel_pers;
    }

    public function setEmail_pers_ca($email_pers){
        $this->email_pers = $email_pers;
    }

    public function setSex_pers_ca($sex_pers){
        $this->sex_pers = $sex_pers;
    }
    
    public function setDir_pers_ca($dir_pers){
        $this->dir_pers = $dir_pers;
    }
    
    public function setCiud_pers_ca($ciud_pers){
        $this->ciud_pers = $ciud_pers;
    } 

    public function setId_tip_oper_ca($id_tip_oper){
        $this->id_tip_oper = $id_tip_oper;
    }

    public function setNom_tip_oper_ca($nom_tip_oper){
        $this->nom_tip_oper = $nom_tip_oper;
    }

    public function setId_tip_pers_ca($id_tip_pers){
        $this->id_tip_pers = $id_tip_pers;
    }

    public function setNom_tip_pers_ca($nom_tip_pers){
        $this->nom_tip_pers = $nom_tip_pers;
    }

    public function setCod_arch_ca($cod_arch){
        $this->cod_arch = $cod_arch;
    }

    public function setNom_arch_ca($nom_arch){
        $this->nom_arch = $nom_arch;
    }

    public function setNum_arch_ca($num_arch){
        $this->num_arch = $num_arch;
    }

    public function setId_serie_ca($id_serie){
        $this->id_serie = $id_serie;
    }

    public function setNom_serie_ca($nom_serie){
        $this->nom_serie = $nom_serie;
    }

    //public function setCod_tip_carp_cm($cod_tip_carp){
        //$this->cod_tip_carp = $cod_tip_carp;
    //}

    //public function setNom_tip_carp_cm($nom_tip_carp){
      //  $this->nom_tip_carp = $nom_tip_carp;
    //}

    //public function setCod_carp_cm($cod_carp){
        //$this->cod_carp = $cod_carp;
    //}

    //public function setDesc_carp_cm($desc_carp){
        //$this->desc_carp = $desc_carp;
    //}

    //public function setId_serie_cm($id_serie){
        //$this->id_serie = $id_serie;
    //}

    //public function setNom_serie_cm($nom_serie){
        //$this->nom_serie = $nom_serie;
    //}

}
?>