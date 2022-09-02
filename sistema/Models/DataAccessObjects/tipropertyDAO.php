<?php
$namerutevo = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/tipropertyVO.php";
$connectionrute = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/Connection/connection.php";

require_once($namerutevo);
require_once($connectionrute);

class tipropertyDAO{

    private $conn;
    public $stm;

    public function __construct(){
        $this->conn = new connection();
    }

    public function create(tipropertyVO $tipropVO){ 
        $stm = null;   
        try 
        {
            if($tipropVO != null){
                $id_tip_prop = $tipropVO->getId_tip_prop();
                $id_cat_prop = $tipropVO->getId_cat_prop();
                $nom_tip_prop = $tipropVO->getNom_tip_prop();
                $desc_tip_prop = $tipropVO->getDes_tip_prop();
                $query = "INSERT INTO tipo_propiedad(id_tip_prop, id_cat_prop, nom_tip_prop, desc_tip_prop) VALUES (?,?,?,?)";
                $stm = $this->conn->db_open()->prepare($query);    
                $stm->bindParam(1, $id_tip_prop);   
                $stm->bindParam(2, $id_cat_prop);
                $stm->bindParam(3, $nom_tip_prop);
                $stm->bindParam(4, $desc_tip_prop);    
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
            $query = "SELECT tp.id_tip_prop, cp.id_cat_prop, cp.nom_cat_prop, tp.nom_tip_prop, tp.desc_tip_prop
            FROM categoria_propiedad cp 
            INNER JOIN tipo_propiedad tp ON cp.id_cat_prop = tp.id_cat_prop";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->execute();
            $listaVO = $stm->fetchAll(PDO::FETCH_OBJ);

            foreach($listaVO as $r)
            {
                $tipropVO = new tipropertyVO();
                $tipropVO->setId_tip_prop($r->id_tip_prop);
                $tipropVO->setId_cat_prop($r->id_cat_prop);
                $tipropVO->setNom_cat_prop($r->nom_cat_prop);
                $tipropVO->setNom_tip_prop($r->nom_tip_prop);
                $tipropVO->setDes_tip_prop($r->desc_tip_prop);
                $result[] = $tipropVO;
            }
            return $result;
            $stm = null;
        }catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function readTiproperty($id_tip_prop){
        $stm = null; 
        try 
        {
            $query = "SELECT tp.id_tip_prop, cp.id_cat_prop, cp.nom_cat_prop, tp.nom_tip_prop, tp.desc_tip_prop
            FROM categoria_propiedad cp 
            INNER JOIN tipo_propiedad tp ON cp.id_cat_prop = tp.id_cat_prop
            WHERE tp.id_tip_prop = ?";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindValue(1, $id_tip_prop);
            $stm->execute();
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $tipropVO = new tipropertyVO();

            if($stm->rowCount()!=0){
                $tipropVO->setId_tip_prop($r->id_tip_prop);
                $tipropVO->setId_cat_prop($r->id_cat_prop);
                $tipropVO->setNom_cat_prop($r->nom_cat_prop);
                $tipropVO->setNom_tip_prop($r->nom_tip_prop);
                $tipropVO->setDes_tip_prop($r->desc_tip_prop);
            }
            else{
                $tipropVO = null;
            }

            return $tipropVO;

            $stm = null;
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function update(tipropertyVO $tipropVO){
        $stm = null; 
        try 
        {
            $id_tip_prop = $tipropVO->getId_tip_prop();
            $id_cat_prop = $tipropVO->getId_cat_prop();
            $nom_tip_prop = $tipropVO->getNom_tip_prop();
            $desc_tip_prop = $tipropVO->getDes_tip_prop();
            $query = "UPDATE tipo_propiedad SET id_cat_prop=?, nom_tip_prop=?, desc_tip_prop=? WHERE id_tip_prop = ?";
            $stm = $this->conn->db_open()->prepare($query);    
            $stm->bindParam(1, $id_cat_prop);   
            $stm->bindParam(2, $nom_tip_prop); 
            $stm->bindParam(3, $desc_tip_prop); 
            $stm->bindParam(4, $id_tip_prop);      
            $stm->execute();
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }

    }

    public function delete($id_tip_prop){
        $stm = null;
        try 
        {
            $id = $id_tip_prop;
            $query = "DELETE FROM tipo_propiedad WHERE id_tip_prop = ?";
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