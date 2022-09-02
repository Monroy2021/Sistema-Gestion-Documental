<?php
$namerutevo = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/operationVO.php";
$connectionrute = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/Connection/connection.php";

require_once($namerutevo);
require_once($connectionrute);

class operationDAO{

    private $conn;
    public $stm;

    public function __construct(){
        $this->conn = new connection();
    }

    public function create(operationVO $operVO){ 
        $stm = null;   
        try 
        {
            if($operVO != null){
                $cod_reg_oper =  $operVO->getCod_reg_oper();
                $id_tip_oper = $operVO->getId_tip_oper(); 
                $id_prop = $operVO->getId_prop_oper();
                $desc_oper = $operVO->getDesc_oper(); 
                $cod_reg_oper_dep = $operVO->getCod_reg_oper_dep(); 
                $estado_oper = $operVO->getEstado_oper(); 
                $fec_oper = $operVO->getFec_oper(); 
                $query = "INSERT INTO operacion(cod_reg_oper, id_tip_oper, id_prop,  desc_oper, cod_reg_oper_dep, estado_oper, fec_oper) VALUES (?,?,?,?,?,?,?)";
                $stm = $this->conn->db_open()->prepare($query);  
                $stm->bindParam(1, $cod_reg_oper);   
                $stm->bindParam(2, $id_tip_oper);     
                $stm->bindParam(3, $id_prop); 
                $stm->bindParam(4, $desc_oper); 
                $stm->bindParam(5, $cod_reg_oper_dep);
                $stm->bindParam(6, $estado_oper);
                $stm->bindParam(7, $fec_oper);  
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
            $query = "SELECT c.id_con,
            o.cod_reg_oper, o.desc_oper, o.cod_reg_oper_dep, o.estado_oper, o.fec_oper, 
            toper.id_tip_oper, toper.nom_tip_oper, 
            p.ced_pers, 
            pro.id_prop, 
            tp.id_tip_pers, tp.nom_tip_pers 
            FROM operacion o
            INNER JOIN tipo_operacion toper ON o.id_tip_oper = toper.id_tip_oper
            INNER JOIN propiedad pro ON o.id_prop = pro.id_prop
            INNER JOIN contrato c ON o.cod_reg_oper = c.cod_reg_oper_con
            INNER JOIN persona p ON c.ced_pers = p.ced_pers
            INNER JOIN tipo_persona tp ON c.id_tip_pers = tp.id_tip_pers";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->execute();
            $listaVO = $stm->fetchAll(PDO::FETCH_OBJ);

            foreach($listaVO as $r)
            {
                $operVO = new operationVO();
                $operVO->setId_con_oper($r->id_con);
                $operVO->setCod_reg_oper($r->cod_reg_oper);
                $operVO->setDesc_oper($r->desc_oper); 
                $operVO->setCod_reg_oper_dep($r->cod_reg_oper_dep); 
                $operVO->setEstado_oper($r->estado_oper);
                $operVO->setFec_oper($r->fec_oper);
                $operVO->setId_tip_oper($r->id_tip_oper);
                $operVO->setNom_tip_oper($r->nom_tip_oper); 
                $operVO->setCed_pers_oper($r->ced_pers);
                $operVO->setId_prop_oper($r->id_prop);
                $operVO->setId_tip_pers_oper($r->id_tip_pers);
                $operVO->setNom_tip_pers_oper($r->nom_tip_pers);
                $result[] = $operVO;
            }
            return $result;

            $stm = null;
        }catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function readOper($cod_reg_oper){
        $stm = null; 
        try 
        {
            $query = "SELECT c.id_con,
            o.cod_reg_oper, o.desc_oper, o.cod_reg_oper_dep, o.estado_oper, o.fec_oper, 
            toper.id_tip_oper, toper.nom_tip_oper, 
            p.ced_pers, 
            pro.id_prop, 
            tp.id_tip_pers, tp.nom_tip_pers 
            FROM operacion o
            INNER JOIN tipo_operacion toper ON o.id_tip_oper = toper.id_tip_oper
            INNER JOIN propiedad pro ON o.id_prop = pro.id_prop
            INNER JOIN contrato c ON o.cod_reg_oper = c.cod_reg_oper_con
            INNER JOIN persona p ON c.ced_pers_con = p.ced_pers
            INNER JOIN tipo_persona tp ON c.id_tip_pers_con = tp.id_tip_pers
            WHERE o.cod_reg_oper = ?";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindValue(1, $cod_reg_oper);
            $stm->execute();
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $operVO = new operationVO();

            if($stm->rowCount()!=0){
                $operVO->setId_con_oper($r->id_con);
                $operVO->setCod_reg_oper($r->cod_reg_oper);
                $operVO->setDesc_oper($r->desc_oper); 
                $operVO->setCod_reg_oper_dep($r->cod_reg_oper_dep); 
                $operVO->setEstado_oper($r->estado_oper);
                $operVO->setFec_oper($r->fec_oper);
                $operVO->setId_tip_oper($r->id_tip_oper);
                $operVO->setNom_tip_oper($r->nom_tip_oper); 
                $operVO->setCed_pers_oper($r->ced_pers);
                $operVO->setId_prop_oper($r->id_prop);
                $operVO->setId_tip_pers_oper($r->id_tip_pers);
                $operVO->setNom_tip_pers_oper($r->nom_tip_pers);
            }
            else{
                $operVO = null;
            }

            return $operVO;

            $stm = null;
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function update(operationVO $operVO){
        $stm = null; 
        try 
        {
            $cod_reg_oper =  $operVO->getCod_reg_oper();
            $id_tip_oper = $operVO->getId_tip_oper(); 
            $id_prop = $operVO->getId_prop_oper();
            $desc_oper = $operVO->getDesc_oper(); 
            $cod_reg_oper_dep = $operVO->getCod_reg_oper_dep(); 
            $estado_oper = $operVO->getEstado_oper(); 
            $fec_oper = $operVO->getFec_oper(); 
            $query = "UPDATE operacion SET id_tip_oper=?, id_prop=?, desc_oper=?, cod_reg_oper_dep=?, estado_oper=?, fec_oper=? WHERE cod_reg_oper=?";
            $stm = $this->conn->db_open()->prepare($query);  
            $stm->bindParam(1, $cod_reg_oper);    
            $stm->bindParam(2, $id_tip_oper); 
            $stm->bindParam(3, $id_prop); 
            $stm->bindParam(4, $desc_oper); 
            $stm->bindParam(5, $cod_reg_oper_dep);
            $stm->bindParam(6, $estado_oper);
            $stm->bindParam(7, $fec_oper);   
            $stm->execute();         
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }

    }

    public function delete($cod_reg_oper){
        $stm = null;
        try 
        {
            $id = $cod_reg_oper;
            $query = "DELETE FROM operacion WHERE cod_reg_oper = ?";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindParam(1, $id);                 
            $stm->execute();
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
        
    }

}

?>