<?php
$namerutevo = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/contractleasingVO.php";
$connectionrute = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/Connection/connection.php";

require_once($namerutevo);
require_once($connectionrute);

class contractleasingDAO{
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
            $query = "SELECT pr.id_prop, 
            pr.id_tip_prop, tp.nom_tip_prop,   
            con.ced_pers_con, pers.nom_pers, pers.ape_pers,
            o.cod_reg_oper, o.estado_oper, o.cod_reg_oper_dep,
            top.id_tip_oper, top.nom_tip_oper,  
            arch.cod_arch, arch.nom_arch, arch.num_arch, 
            se.id_serie, se.nom_serie
            FROM operacion o 
            INNER JOIN tipo_operacion top ON o.id_tip_oper = top.id_tip_oper
            INNER JOIN contrato con ON o.cod_reg_oper = con.cod_reg_oper_con
            INNER JOIN tipo_persona tpe ON con.id_tip_pers_con = tpe.id_tip_pers
            INNER JOIN persona pers ON con.ced_pers_con = pers.ced_pers
            INNER JOIN propiedad pr ON o.id_prop = pr.id_prop 
            INNER JOIN tipo_propiedad tp ON pr.id_tip_prop = tp.id_tip_prop 
            INNER JOIN carpeta c ON o.cod_reg_oper = c.cod_reg_oper 
            INNER JOIN tipo_carpeta tc ON c.cod_tip_carp = tc.cod_tip_carp
            INNER JOIN archivo arch ON tc.cod_arch = arch.cod_arch
            INNER JOIN documentos doc ON c.cod_carp = doc.cod_carp
            INNER JOIN subserie subse ON doc.id_subse = subse.id_subse
            INNER JOIN serie se ON subse.id_serie = se.id_serie
            WHERE O.cod_reg_oper_dep != 0
            GROUP BY o.cod_reg_oper";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->execute();
            $listaVO = $stm->fetchAll(PDO::FETCH_OBJ);

            foreach($listaVO as $r)
            {
                $caVO = new contractleasingVO();
                $caVO->setId_prop_ca($r->id_prop);
                $caVO->setId_tip_prop_ca($r->id_tip_prop);
                $caVO->setNom_tip_prop_ca($r->nom_tip_prop);
                $caVO->setCed_pers_ca($r->ced_pers_con);
                $caVO->setNom_pers_ca($r->nom_pers);
                $caVO->setApe_pers_ca($r->nom_pers);
                $caVO->setCod_reg_oper_ca($r->cod_reg_oper);
                $caVO->setId_tip_oper_ca($r->id_tip_oper);
                $caVO->setNom_tip_oper_ca($r->nom_tip_oper);
                $caVO->setCod_arch_ca($r->cod_arch);
                $caVO->setNom_arch_ca($r->nom_arch);
                $caVO->setNum_arch_ca($r->num_arch);
                $caVO->setId_serie_ca($r->id_serie);
                $caVO->setNom_serie_ca($r->nom_serie);
                $result[] = $caVO;
            }
            return $result;
            $stm = null;
        }catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function readContractleasing(){
        $stm = null; 
        try 
        {
            $result = array();
            $query = "SELECT pr.id_prop, 
            pr.id_tip_prop, tp.nom_tip_prop,   
            con.ced_pers_con, pers.nom_pers, pers.ape_pers,
            o.cod_reg_oper, o.estado_oper, o.cod_reg_oper_dep,
            top.id_tip_oper, top.nom_tip_oper,  
            arch.cod_arch, arch.nom_arch, arch.num_arch, 
            se.id_serie, se.nom_serie
            FROM operacion o 
            INNER JOIN tipo_operacion top ON o.id_tip_oper = top.id_tip_oper
            INNER JOIN contrato con ON o.cod_reg_oper = con.cod_reg_oper_con
            INNER JOIN tipo_persona tpe ON con.id_tip_pers_con = tpe.id_tip_pers
            INNER JOIN persona pers ON con.ced_pers_con = pers.ced_pers
            INNER JOIN propiedad pr ON o.id_prop = pr.id_prop 
            INNER JOIN tipo_propiedad tp ON pr.id_tip_prop = tp.id_tip_prop 
            INNER JOIN carpeta c ON o.cod_reg_oper = c.cod_reg_oper 
            INNER JOIN tipo_carpeta tc ON c.cod_tip_carp = tc.cod_tip_carp
            INNER JOIN archivo arch ON tc.cod_arch = arch.cod_arch
            INNER JOIN documentos doc ON c.cod_carp = doc.cod_carp
            INNER JOIN subserie subse ON doc.id_subse = subse.id_subse
            INNER JOIN serie se ON subse.id_serie = se.id_serie
            WHERE O.cod_reg_oper_dep != 0
            GROUP BY o.cod_reg_oper";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->execute();
            $listaVO = $stm->fetchAll(PDO::FETCH_OBJ);

            foreach($listaVO as $r)
            {
                $caVO = new contractleasingVO();
                $caVO->setId_prop_ca($r->id_prop);
                $caVO->setId_tip_prop_ca($r->id_tip_prop);
                $caVO->setNom_tip_prop_ca($r->nom_tip_prop);
                $caVO->setCed_pers_ca($r->ced_pers_con);
                $caVO->setNom_pers_ca($r->nom_pers);
                $caVO->setApe_pers_ca($r->ape_pers);
                $caVO->setCod_reg_oper_ca($r->cod_reg_oper);
                $caVO->setEstado_oper_ca($r->estado_oper);
                $caVO->setCod_reg_oper_dep_ca($r->cod_reg_oper_dep);
                $caVO->setId_tip_oper_ca($r->id_tip_oper);
                $caVO->setNom_tip_oper_ca($r->nom_tip_oper);
                $caVO->setCod_arch_ca($r->cod_arch);
                $caVO->setNom_arch_ca($r->nom_arch);
                $caVO->setNum_arch_ca($r->num_arch);
                $caVO->setId_serie_ca($r->id_serie);
                $caVO->setNom_serie_ca($r->nom_serie);
                $result[] = $caVO;
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