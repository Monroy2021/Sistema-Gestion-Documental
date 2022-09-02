<?php
$namerutevo = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/contractVO.php";
$connectionrute = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/Connection/connection.php";

require_once($namerutevo);
require_once($connectionrute);

class contractDAO{

    private $conn;
    public $stm;

    public function __construct(){
        $this->conn = new connection();
    }

    public function create(contractVO $conVO){ 
        $stm = null;   
        try 
        {
            if($conVO != null){
                $ced_pers_con = $conVO->getCed_pers_con();
                $cod_reg_oper_con = $conVO->getCod_reg_oper_con();
                $id_tip_pers_con = $conVO->getId_tip_pers_con();
                $orden_tip_pers_con = $conVO->getOrden_tip_pers_con();
                $query = "INSERT INTO contrato(ced_pers_con, cod_reg_oper_con, id_tip_pers_con) VALUES (?,?,?)";
                $stm = $this->conn->db_open()->prepare($query);  
                $stm->bindParam(1, $ced_pers_con);   
                $stm->bindParam(2, $cod_reg_oper_con);   
                $stm->bindParam(3, $id_tip_pers_con);
                $stm->execute();
            }
        }catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function read(){
        $stm = null; 
        try 
        {
            $result = array();
            $query = "SELECT c.id_con, o.cod_reg_oper, tp.id_tip_pers, tp.nom_tip_pers, 
            p.ced_pers, p.id_emp, e.nom_emp, p.nom_pers, p.ape_pers, p.fec_exp_ced_pers, p.cel_pers, 
            p.tel_pers, p.email_pers, p.sex_pers, p.dir_pers, p.ciud_pers, p.fec_reg_pers, p.fec_act_pers 
            FROM persona p 
            INNER JOIN contrato c ON p.ced_pers = c.ced_pers_con
            INNER JOIN operacion o ON c.cod_reg_oper_con = o.cod_reg_oper
            INNER JOIN tipo_persona tp ON c.id_tip_pers_con = tp.id_tip_pers
            INNER JOIN empresa e ON p.id_emp = e.id_emp";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->execute();
            $listaVO = $stm->fetchAll(PDO::FETCH_OBJ);

            foreach($listaVO as $r)
            {
                $conVO = new contractVO();
                $conVO->setId_con($r->id_con);
                $conVO->setCod_reg_oper_con($r->cod_reg_oper);
                $conVO->setId_tip_pers_con($r->id_tip_pers);
                $conVO->setNom_tip_pers_con($r->nom_tip_pers);
                $conVO->setCed_pers_con($r->ced_pers);
                $conVO->setId_emp_con($r->id_emp);
                $conVO->setNom_emp_con($r->nom_emp);
                $conVO->setNom_pers_con($r->nom_pers);
                $conVO->setApe_pers_con($r->ape_pers);
                $conVO->setFec_exp_ced_pers_con($r->fec_exp_ced_pers);
                $conVO->setCel_pers_con($r->cel_pers);
                $conVO->setTel_pers_con($r->tel_pers);
                $conVO->setEmail_pers_con($r->email_pers);
                $conVO->setSex_pers_con($r->sex_pers);
                $conVO->setDir_pers_con($r->dir_pers);
                $conVO->setCiud_pers_con($r->ciud_pers);
                $conVO->setFec_act_pers_con($r->fec_act_pers);
                $result[] = $conVO;
            }
            return $result;
            $stm = null;
        }catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function readPersoncontract($cod_reg_oper){
        $stm = null; 
        try 
        {
            $query = "SELECT c.id_con, c.orden_tip_pers_con,
            o.cod_reg_oper, 
            tp.id_tip_pers, tp.nom_tip_pers, 
            p.ced_pers, p.id_emp, e.nom_emp, p.nom_pers, p.ape_pers, p.fec_exp_ced_pers, p.cel_pers, 
            p.tel_pers, p.email_pers, p.sex_pers, p.dir_pers, p.ciud_pers, p.fec_act_pers 
            FROM contrato c
            INNER JOIN operacion o ON c.cod_reg_oper_con = o.cod_reg_oper
            INNER JOIN persona p ON c.ced_pers_con = p.ced_pers
            INNER JOIN tipo_persona tp ON c.id_tip_pers_con = tp.id_tip_pers
            INNER JOIN empresa e ON p.id_emp = e.id_emp
            WHERE o.cod_reg_oper = ?";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindValue(1, $cod_reg_oper);
            $stm->execute();
            $listaVO = $stm->fetchAll(PDO::FETCH_OBJ);

            foreach($listaVO as $r)
            {
                $conVO = new contractVO();
                $conVO->setId_con($r->id_con);
                $conVO->setOrden_tip_pers_con($r->orden_tip_pers_con);
                $conVO->setCod_reg_oper_con($r->cod_reg_oper);
                $conVO->setId_tip_pers_con($r->id_tip_pers);
                $conVO->setNom_tip_pers_con($r->nom_tip_pers);
                $conVO->setCed_pers_con($r->ced_pers);
                $conVO->setId_emp_con($r->id_emp);
                $conVO->setNom_emp_con($r->nom_emp);
                $conVO->setNom_pers_con($r->nom_pers);
                $conVO->setApe_pers_con($r->ape_pers);
                $conVO->setFec_exp_ced_pers_con($r->fec_exp_ced_pers);
                $conVO->setCel_pers_con($r->cel_pers);
                $conVO->setTel_pers_con($r->tel_pers);
                $conVO->setEmail_pers_con($r->email_pers);
                $conVO->setSex_pers_con($r->sex_pers);
                $conVO->setDir_pers_con($r->dir_pers);
                $conVO->setCiud_pers_con($r->ciud_pers);
                $conVO->setFec_act_pers_con($r->fec_act_pers);
                $result[] = $conVO;
            }
            return $result;
            $stm = null;
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }

    }

    public function readContract($ced_pers, $cod_reg_oper, $id_tip_pers){
        $stm = null; 
        try 
        {
            $query = "SELECT c.id_con, c.orden_tip_pers_con,
            o.cod_reg_oper, 
            tp.id_tip_pers, tp.nom_tip_pers, 
            p.ced_pers, p.id_emp, e.nom_emp, p.nom_pers, p.ape_pers, 
            p.fec_exp_ced_pers, p.cel_pers, p.tel_pers, p.email_pers, 
            p.sex_pers, p.dir_pers, p.ciud_pers, p.fec_act_pers 
            FROM persona p 
            INNER JOIN contrato c ON p.ced_pers = c.ced_pers_con
            INNER JOIN operacion o ON c.cod_reg_oper_con = o.cod_reg_oper
            INNER JOIN tipo_persona tp ON c.id_tip_pers_con = tp.id_tip_pers
            INNER JOIN empresa e ON p.id_emp = e.id_emp
            WHERE p.ced_pers = ? AND o.cod_reg_oper = ? AND tp.id_tip_pers = ? ";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindValue(1, $ced_pers);
            $stm->bindValue(2, $cod_reg_oper);
            $stm->bindValue(3, $id_tip_pers);
            $stm->execute();
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $conVO = new contractVO();

            if($stm->rowCount()!=0){
                $conVO->setId_con($r->id_con);
                $conVO->setOrden_tip_pers_con($r->orden_tip_pers_con);
                $conVO->setCod_reg_oper_con($r->cod_reg_oper);
                $conVO->setId_tip_pers_con($r->id_tip_pers);
                $conVO->setNom_tip_pers_con($r->nom_tip_pers);
                $conVO->setCed_pers_con($r->ced_pers);
                $conVO->setId_emp_con($r->id_emp);
                $conVO->setNom_emp_con($r->nom_emp);
                $conVO->setNom_pers_con($r->nom_pers);
                $conVO->setApe_pers_con($r->ape_pers);
                $conVO->setFec_exp_ced_pers_con($r->fec_exp_ced_pers);
                $conVO->setCel_pers_con($r->cel_pers);
                $conVO->setTel_pers_con($r->tel_pers);
                $conVO->setEmail_pers_con($r->email_pers);
                $conVO->setSex_pers_con($r->sex_pers);
                $conVO->setDir_pers_con($r->dir_pers);
                $conVO->setCiud_pers_con($r->ciud_pers);
                $conVO->setFec_act_pers_con($r->fec_act_pers);
            }
            else{
                $conV0 = null;
            }

            return $conVO;

            $stm = null;
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }

    }

    public function update(contractVO $conVO){
        $stm = null; 
        try 
        {
            $id_con = $conVO->getId_con();
            $ced_pers_con = $conVO->getCed_pers_con();
            $cod_reg_oper_con = $conVO->getCod_reg_oper_con();
            $id_tip_pers_con = $conVO->getId_tip_pers_con();
            $orden_tip_pers_con = $conVO->getOrden_tip_pers_con();
            $query = "UPDATE contrato SET ced_pers_con= ?, cod_reg_oper_con= ?, id_tip_pers_con= ?, orden_tip_pers_con=? WHERE id_con= ?";
            $stm = $this->conn->db_open()->prepare($query);   
            $stm->bindParam(1, $ced_pers_con);   
            $stm->bindParam(2, $cod_reg_oper_con);   
            $stm->bindParam(3, $id_tip_pers_con);
            $stm->bindParam(4, $orden_tip_pers_con);
            $stm->bindParam(5, $id_con);
            $stm->execute();
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }

    }

    public function delete($id_con){
        $stm = null;
        try 
        {
            $ced = $id_con;
            $query = "DELETE FROM contrato WHERE id_con = ?";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindParam(1, $id_con);                 
            $stm->execute();
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
        
    }


}
?>