<?php
$namerutevo = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/typersonVO.php";
$connectionrute = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/Connection/connection.php";

require_once($namerutevo);
require_once($connectionrute);

class typersonDAO{

    private $conn;
    public $stm;

    public function __construct(){
        $this->conn = new connection();
    }

    public function create(typersonVO $typersonVO){ 
        $stm = null;   
        try 
        {
            if($typersonVO != null){
                $id_tip_pers = $typersonVO->getId_tip_pers();
                $nom_tip_pers = $typersonVO->getNom_tip_pers();
                $des_tip_pers = $typersonVO->getDes_tip_pers();
                $query = "INSERT INTO tipo_persona (id_tip_pers, nom_tip_pers, desc_tip_pers) VALUES (?,?,?)";
                $stm = $this->conn->db_open()->prepare($query);  
                $stm->bindParam(1, $id_tip_pers);   
                $stm->bindParam(2, $nom_tip_pers);   
                $stm->bindParam(3, $des_tip_pers); 
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
            $query = "SELECT * FROM tipo_persona";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->execute();
            $listaVO = $stm->fetchAll(PDO::FETCH_OBJ);

            foreach($listaVO as $r)
            {
                $typersonVO = new typersonVO();
                $typersonVO->setId_tip_pers($r->id_tip_pers);
                $typersonVO->setNom_tip_pers($r->nom_tip_pers);
                $typersonVO->setDes_tip_pers($r->desc_tip_pers);
                $result[] = $typersonVO;
            }

            return $result;

            $stm = null;
        }catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function readTipers($id_tip_pers){
        $stm = null; 
        try 
        {
            $query = "SELECT * FROM tipo_persona WHERE id_tip_pers = ?";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindValue(1, $id_tip_pers);
            $stm->execute();
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $typersonVO = new typersonVO();

            if($stm->rowCount()!=0){
                $typersonVO->setId_tip_pers($r->id_tip_pers);
                $typersonVO->setNom_tip_pers($r->nom_tip_pers);
                $typersonVO->setDes_tip_pers($r->des_tip_pers);
            }
            else{
                $typersonVO = null;
            }

            return $typersonVO;

            $stm = null;
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function update(typersonVO $typersonVO){
        $stm = null; 
        try 
        {
            $id_tip_pers = $typersonVO->getId_tip_pers();
            $nom_tip_pers = $typersonVO->getNom_tip_pers();
            $des_tip_pers = $typersonVO->getDes_tip_pers();
            $query = "UPDATE tipo_persona SET nom_tip_pers= ?, desc_tip_pers=? WHERE id_tip_pers= ?";
            $stm = $this->conn->db_open()->prepare($query);    
            $stm->bindParam(1, $nom_tip_pers);   
            $stm->bindParam(2, $des_tip_pers); 
            $stm->bindParam(3, $id_tip_pers);      
            $stm->execute();
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }

    }

    public function delete($id_tip_pers){
        $stm = null;
        try 
        {
            $id = $id_tip_pers;
            $query = "DELETE FROM tipo_persona WHERE id_tip_pers = ?";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindParam(1, $id_tip_pers);                 
            $stm->execute();
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
        
    }

}

?>