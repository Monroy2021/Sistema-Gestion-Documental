<?php
$namerutevo = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/catpropertyVO.php";
$connectionrute = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/Connection/connection.php";

require_once($namerutevo);
require_once($connectionrute);

class catpropertyDAO{

    private $conn;
    public $stm;

    public function __construct(){
        $this->conn = new connection();
    }

    public function create(catpropertyVO $catpropVO){ 
        $stm = null;   
        try 
        {
            if($catpropVO != null){
                $id_cat_prop = $catpropVO->getId_cat_prop();
                $nom_cat_prop = $catpropVO->getNom_cat_prop();
                $desc_cat_prop = $catpropVO->getDes_cat_prop();
                $query = "INSERT INTO categoria_propiedad(id_cat_prop, nom_cat_prop, desc_cat_prop) VALUES (?,?,?)";
                $stm = $this->conn->db_open()->prepare($query);    
                $stm->bindParam(1, $id_cat_prop);   
                $stm->bindParam(2, $nom_cat_prop);
                $stm->bindParam(3, $desc_cat_prop);  
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
            $query = "SELECT * FROM categoria_propiedad";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->execute();
            $listaVO = $stm->fetchAll(PDO::FETCH_OBJ);

            foreach($listaVO as $r)
            {
                $catpropVO = new catpropertyVO();
                $catpropVO->setId_cat_prop($r->id_cat_prop);
                $catpropVO->setNom_cat_prop($r->nom_cat_prop);
                $catpropVO->setDes_cat_prop($r->desc_cat_prop);
                $result[] = $catpropVO;
            }
            return $result;
            $stm = null;
        }catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function readCatproperty($id_cat_prop){
        $stm = null; 
        try 
        {
            $query = "SELECT * FROM categoria_propiedad WHERE id_cat_prop = ?";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindValue(1, $id_cat_prop);
            $stm->execute();
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $catpropVO = new catpropertyVO();

            if($stm->rowCount()!=0){
                $catpropVO->setId_cat_prop($r->id_cat_prop);
                $catpropVO->setNom_cat_prop($r->nom_cat_prop);
                $catpropVO->setDes_cat_prop($r->desc_cat_prop);
            }
            else{
                $catpropVO = null;
            }

            return $catpropVO;

            $stm = null;
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function update(catpropertyVO $catpropVO){
        $stm = null; 
        try 
        {
            $id_cat_prop = $catpropVO->getId_cat_prop();
            $nom_cat_prop = $catpropVO->getNom_cat_prop();
            $desc_cat_prop = $catpropVO->getDes_cat_prop();
            $query = "UPDATE categoria_propiedad SET nom_cat_prop=?, desc_cat_prop=? WHERE id_cat_prop=?";
            $stm = $this->conn->db_open()->prepare($query);    
            $stm->bindParam(1, $nom_cat_prop);   
            $stm->bindParam(2, $desc_cat_prop); 
            $stm->bindParam(3, $id_cat_prop);      
            $stm->execute();
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }

    }

    public function delete($id_cat_prop){
        $stm = null;
        try 
        {
            $id = $id_cat_prop;
            $query = "DELETE FROM categoria_propiedad WHERE id_cat_prop = ?";
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