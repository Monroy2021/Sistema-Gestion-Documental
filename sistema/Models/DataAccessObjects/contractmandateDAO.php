<?php
$namerutevo = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/contractmandateVO.php";
$connectionrute = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/Connection/connection.php";

require_once($namerutevo);
require_once($connectionrute);

class contractmandateDAO{
    private $conn;
    public $stm;

    public function __construct(){
        $this->conn = new connection();
    }

    public function read(){
        $stm = null; 
        try 
        {
            $result = array();
            $query = "SELECT pr.id_prop, pr.id_tip_prop, 
            tp.nom_tip_prop,  
            pr.dir_prop, pr.ubi_prop, pr.desc_prop,  
            o.cod_reg_oper, o.estado_oper,
            p.ced_pers, p.nom_pers, p.ape_pers, p.fec_exp_ced_pers, 
            p.cel_pers, p.tel_pers, p.email_pers, p.sex_pers, p.dir_pers, p.ciud_pers, 
            top.id_tip_oper, top.nom_tip_oper, 
            tpers.id_tip_pers, tpers.nom_tip_pers, 
            arch.cod_arch, arch.nom_arch, arch.num_arch, 
            tc.cod_tip_carp, tc.nom_tip_carp, 
            c.cod_carp, c.des_carp, 
            se.id_serie, se.nom_serie
            FROM operacion o 
            INNER JOIN tipo_operacion top ON o.id_tip_oper = top.id_tip_oper
            INNER JOIN contrato con ON o.cod_reg_oper = con.cod_reg_oper_con
            INNER JOIN persona p ON con.ced_pers_con = p.ced_pers 
            INNER JOIN tipo_persona tpers ON con.id_tip_pers_con = tpers.id_tip_pers 
            INNER JOIN propiedad pr ON o.id_prop = pr.id_prop 
            INNER JOIN tipo_propiedad tp ON pr.id_tip_prop = tp.id_tip_prop 
            INNER JOIN carpeta c ON o.cod_reg_oper = c.cod_reg_oper 
            INNER JOIN tipo_carpeta tc ON c.cod_tip_carp = tc.cod_tip_carp
            INNER JOIN archivo arch ON tc.cod_arch = arch.cod_arch
            INNER JOIN documentos doc ON c.cod_carp = doc.cod_carp
            INNER JOIN subserie subse ON doc.id_subse = subse.id_subse
            INNER JOIN serie se ON subse.id_serie = se.id_serie
            WHERE O.cod_reg_oper_dep = 0
            GROUP BY pr.id_prop, o.cod_reg_oper, p.ced_pers	";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->execute();
            $listaVO = $stm->fetchAll(PDO::FETCH_OBJ);

            foreach($listaVO as $r)
            {
                $cmVO = new contractmandateVO();
                $cmVO->setId_prop_cm($r->id_prop);
                $cmVO->setId_tip_prop_cm($r->id_tip_prop);
                $cmVO->setNom_prop_cm($r->nom_tip_prop);
                $cmVO->setDir_prop_cm($r->dir_prop);
                $cmVO->setUbi_prop_cm($r->ubi_prop);
                $cmVO->setDesc_prop_cm($r->desc_prop);
                $cmVO->setCod_reg_oper_cm($r->cod_reg_oper);
                $cmVO->setEstado_oper_cm($r->estado_oper);
                $cmVO->setCed_pers_cm($r->ced_pers);
                $cmVO->setNom_pers_cm($r->nom_pers);
                $cmVO->setApe_pers_cm($r->ape_pers);
                $cmVO->setFec_exp_ced_pers_cm($r->fec_exp_ced_pers);
                $cmVO->setcel_pers_cm($r->cel_pers);
                $cmVO->setTel_pers_cm($r->tel_pers);
                $cmVO->setEmail_pers_cm($r->email_pers);
                $cmVO->setSex_pers_cm($r->sex_pers);
                $cmVO->setDir_pers_cm($r->dir_pers);
                $cmVO->setCiud_pers_cm($r->ciud_pers);
                $cmVO->setId_tip_oper_cm($r->id_tip_oper);
                $cmVO->setNom_tip_oper_cm($r->nom_tip_oper);
                $cmVO->setId_tip_pers_cm($r->id_tip_pers);
                $cmVO->setNom_tip_pers_cm($r->nom_tip_pers);
                $cmVO->setCod_arch_cm($r->cod_arch);
                $cmVO->setNom_arch_cm($r->nom_arch);
                $cmVO->setNum_arch_cm($r->num_arch);
                $cmVO->setCod_tip_carp_cm($r->cod_tip_carp);
                $cmVO->setNom_tip_carp_cm($r->nom_tip_carp);
                $cmVO->setCod_carp_cm($r->cod_carp);
                $cmVO->setDesc_carp_cm($r->des_carp);
                $cmVO->setId_serie_cm($r->id_serie);
                $cmVO->setNom_serie_cm($r->nom_serie);
                $result[] = $cmVO;
            }
            return $result;
            $stm = null;
        }catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function readContractmandate(){
        $stm = null; 
        try 
        {
            $result = array();
            $query = "SELECT pr.id_prop, pr.id_tip_prop, 
            tp.nom_tip_prop,  
            pr.dir_prop, pr.ubi_prop, pr.desc_prop,  
            o.cod_reg_oper, o.estado_oper,
            p.ced_pers, p.nom_pers, p.ape_pers, p.fec_exp_ced_pers, 
            p.cel_pers, p.tel_pers, p.email_pers, p.sex_pers, p.dir_pers, p.ciud_pers, 
            top.id_tip_oper, top.nom_tip_oper, 
            tpers.id_tip_pers, tpers.nom_tip_pers, 
            arch.cod_arch, arch.nom_arch, arch.num_arch, 
            tc.cod_tip_carp, tc.nom_tip_carp, 
            c.cod_carp, c.des_carp, 
            se.id_serie, se.nom_serie
            FROM operacion o 
            INNER JOIN tipo_operacion top ON o.id_tip_oper = top.id_tip_oper
            INNER JOIN contrato con ON o.cod_reg_oper = con.cod_reg_oper_con
            INNER JOIN persona p ON con.ced_pers_con = p.ced_pers 
            INNER JOIN tipo_persona tpers ON con.id_tip_pers_con = tpers.id_tip_pers 
            INNER JOIN propiedad pr ON o.id_prop = pr.id_prop 
            INNER JOIN tipo_propiedad tp ON pr.id_tip_prop = tp.id_tip_prop 
            INNER JOIN carpeta c ON o.cod_reg_oper = c.cod_reg_oper 
            INNER JOIN tipo_carpeta tc ON c.cod_tip_carp = tc.cod_tip_carp
            INNER JOIN archivo arch ON tc.cod_arch = arch.cod_arch
            INNER JOIN documentos doc ON c.cod_carp = doc.cod_carp
            INNER JOIN subserie subse ON doc.id_subse = subse.id_subse
            INNER JOIN serie se ON subse.id_serie = se.id_serie
            WHERE O.cod_reg_oper_dep = 0
            GROUP BY pr.id_prop, o.cod_reg_oper, p.ced_pers";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->execute();
            $listaVO = $stm->fetchAll(PDO::FETCH_OBJ);

            foreach($listaVO as $r)
            {
                $cmVO = new contractmandateVO();
                $cmVO->setId_prop_cm($r->id_prop);
                $cmVO->setId_tip_prop_cm($r->id_tip_prop);
                $cmVO->setNom_tip_prop_cm($r->nom_tip_prop);
                $cmVO->setDir_prop_cm($r->dir_prop);
                $cmVO->setUbi_prop_cm($r->ubi_prop);
                $cmVO->setDesc_prop_cm($r->desc_prop);
                $cmVO->setCod_reg_oper_cm($r->cod_reg_oper);
                $cmVO->setEstado_oper_cm($r->estado_oper);
                $cmVO->setCed_pers_cm($r->ced_pers);
                $cmVO->setNom_pers_cm($r->nom_pers);
                $cmVO->setApe_pers_cm($r->ape_pers);
                $cmVO->setFec_exp_ced_pers_cm($r->fec_exp_ced_pers);
                $cmVO->setcel_pers_cm($r->cel_pers);
                $cmVO->setTel_pers_cm($r->tel_pers);
                $cmVO->setEmail_pers_cm($r->email_pers);
                $cmVO->setSex_pers_cm($r->sex_pers);
                $cmVO->setDir_pers_cm($r->dir_pers);
                $cmVO->setCiud_pers_cm($r->ciud_pers);
                $cmVO->setId_tip_oper_cm($r->id_tip_oper);
                $cmVO->setNom_tip_oper_cm($r->nom_tip_oper);
                $cmVO->setId_tip_pers_cm($r->id_tip_pers);
                $cmVO->setNom_tip_pers_cm($r->nom_tip_pers);
                $cmVO->setCod_arch_cm($r->cod_arch);
                $cmVO->setNom_arch_cm($r->nom_arch);
                $cmVO->setNum_arch_cm($r->num_arch);
                $cmVO->setCod_tip_carp_cm($r->cod_tip_carp);
                $cmVO->setNom_tip_carp_cm($r->nom_tip_carp);
                $cmVO->setCod_carp_cm($r->cod_carp);
                $cmVO->setDesc_carp_cm($r->des_carp);
                $cmVO->setId_serie_cm($r->id_serie);
                $cmVO->setNom_serie_cm($r->nom_serie);
                $result[] = $cmVO;
            }
            return $result;
            $stm = null;
        }catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }


}
?>