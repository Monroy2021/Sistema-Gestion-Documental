<?php
$namerutevo = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/tyoperationVO.php";
$connectionrute = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/Connection/connection.php";

require_once($namerutevo);
require_once($connectionrute);

class tyoperationDAO{

    private $conn;
    public $stm;

    public function __construct(){
        $this->conn = new connection();
    }

    public function create(tyoperationVO $tipoperVO){ 
        $stm = null;   
        try 
        {
            if($tipoperVO != null){
                $id_tip_oper = $tipoperVO->getCod_tip_oper();
                $nom_tip_oper = $tipoperVO->getNom_tip_oper();
                $desc_tip_oper = $tipoperVO->getDes_tip_oper();
                $query = "INSERT INTO tipo_operacion(id_tip_oper,nom_tip_oper,desc_tip_oper) VALUES (?,?,?)";
                $stm = $this->conn->db_open()->prepare($query);  
                $stm->bindParam(1, $id_tip_oper);   
                $stm->bindParam(2, $nom_tip_oper);   
                $stm->bindParam(3, $desc_tip_oper); 
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
            $query = "SELECT * FROM tipo_operacion";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->execute();
            $listaVO = $stm->fetchAll(PDO::FETCH_OBJ);

            foreach($listaVO as $r)
            {
                $tipoperVO= new tyoperationVO();
                $tipoperVO->setCod_tip_oper($r->id_tip_oper);
                $tipoperVO->setNom_tip_oper($r->nom_tip_oper);
                $tipoperVO->setDes_tip_oper($r->desc_tip_oper);
                $result[] = $tipoperVO;
            }
            return $result;

            $stm = null;
        }catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function readTipoper($id_tip_oper){
        $stm = null; 
        try 
        {
            $query = "SELECT * FROM tipo_operacion WHERE id_tip_oper= ?";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindValue(1, $id_tip_oper);
            $stm->execute();
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $tipoperVO= new tyoperationVO();

            if($stm->rowCount()!=0){
                $tipoperVO->setCod_tip_oper($r->id_tip_oper);
                $tipoperVO->setNom_tip_oper($r->nom_tip_oper);
                $tipoperVO->setDes_tip_oper($r->desc_tip_oper);
            }
            else{
                $tipoperVO = null;
            }

            return $tipoperVO;

            $stm = null;
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function update(tyoperationVO $tipoperVO){
        $stm = null; 
        try 
        {
            $id_tip_oper = $tipoperVO->getCod_tip_oper();
            $nom_tip_oper = $tipoperVO->getNom_tip_oper();
            $des_tip_oper = $tipoperVO->getDes_tip_oper();
            $query = "UPDATE tipo_operacion SET nom_tip_oper= ?, desc_tip_oper=? WHERE id_tip_oper= ?";
            $stm = $this->conn->db_open()->prepare($query);    
            $stm->bindParam(1, $nom_tip_oper);   
            $stm->bindParam(2, $des_tip_oper); 
            $stm->bindParam(3, $id_tip_oper);      
            $stm->execute();
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }

    }

    public function delete($id_tip_oper){
        $stm = null;
        try 
        {
            $id = $id_tip_oper;
            $query = "DELETE FROM tipo_operacion WHERE id_tip_oper = ?";
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