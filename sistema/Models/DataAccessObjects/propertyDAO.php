<?php
$namerutevo = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/propertyVO.php";
$connectionrute = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/Connection/connection.php";

require_once($namerutevo);
require_once($connectionrute);

class propertyDAO{

    private $conn;
    public $stm;

    public function __construct(){
        $this->conn = new connection();
    }

    public function create(propertyVO $propVO){ 
        $stm = null;   
        try 
        {
            if($propVO != null){
                $id_prop = $propVO->getId_prop();
                $id_tip_prop = $propVO->getId_tip_prop();
                $dir_prop = $propVO->getDir_prop();
                $ubi_prop = $propVO->getUbi_prop();
                $desc_prop = $propVO->getDesc_prop();
                $query = "INSERT INTO propiedad(id_prop, id_tip_prop, dir_prop, ubi_prop, desc_prop) VALUES (?,?,?,?,?)";
                $stm = $this->conn->db_open()->prepare($query);  
                $stm->bindParam(1, $id_prop);   
                $stm->bindParam(2, $id_tip_prop);    
                $stm->bindParam(3, $dir_prop); 
                $stm->bindParam(4, $ubi_prop); 
                $stm->bindParam(5, $desc_prop); 
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
            $query = "SELECT p.id_prop, p.id_tip_prop, tp.nom_tip_prop, p.dir_prop, p.ubi_prop, p.desc_prop
            FROM propiedad p
            INNER JOIN tipo_propiedad tp ON p.id_tip_prop = tp.id_tip_prop";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->execute();
            $listaVO = $stm->fetchAll(PDO::FETCH_OBJ);

            foreach($listaVO as $r)
            {
                $propVO = new propertyVO();
                $propVO->setId_prop($r->id_prop);
                $propVO->setId_tip_prop($r->id_tip_prop);
                $propVO->setNom_tip_prop($r->nom_tip_prop); 
                $propVO->setDir_prop($r->dir_prop);
                $propVO->setUbi_prop($r->ubi_prop);
                $propVO->setDesc_prop($r->desc_prop);
                $result[] = $propVO;
            }
            return $result;

            $stm = null;
        }catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function readProp($id_prop){
        $stm = null; 
        try 
        {
            $query = "SELECT p.id_prop, p.id_tip_prop, tp.nom_tip_prop, p.dir_prop, p.ubi_prop, p.desc_prop
            FROM propiedad p
            INNER JOIN tipo_propiedad tp ON p.id_tip_prop = tp.id_tip_prop
            WHERE p.id_prop = ?";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindValue(1, $id_prop);
            $stm->execute();
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $propVO = new propertyVO();

            if($stm->rowCount()!=0){
                $propVO->setId_prop($r->id_prop);
                $propVO->setId_tip_prop($r->id_tip_prop);
                $propVO->setNom_tip_prop($r->nom_tip_prop); 
                $propVO->setDir_prop($r->dir_prop);
                $propVO->setUbi_prop($r->ubi_prop);
                $propVO->setDesc_prop($r->desc_prop);
            }
            else{
                $propVO = null;
            }

            return $propVO;

            $stm = null;
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function readPropoper($cod_reg_oper){
        $stm = null; 
        try 
        {
            $query = "SELECT p.id_prop, p.id_tip_prop, tp.nom_tip_prop, p.dir_prop, p.ubi_prop, p.desc_prop
            FROM propiedad p
            INNER JOIN tipo_propiedad tp ON p.id_tip_prop = tp.id_tip_prop
            INNER JOIN operacion op ON p.id_prop = op.id_prop
            WHERE op.cod_reg_oper = ?";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindValue(1, $cod_reg_oper);
            $stm->execute();
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $propVO = new propertyVO();

            if($stm->rowCount()!=0){
                $propVO->setId_prop($r->id_prop);
                $propVO->setId_tip_prop($r->id_tip_prop);
                $propVO->setNom_tip_prop($r->nom_tip_prop); 
                $propVO->setDir_prop($r->dir_prop);
                $propVO->setUbi_prop($r->ubi_prop);
                $propVO->setDesc_prop($r->desc_prop);
            }
            else{
                $propVO = null;
            }

            return $propVO;

            $stm = null;
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function update(propertyVO $propVO){
        $stm = null; 
        try 
        {
            $id_prop = $propVO->getId_prop();
            $id_tip_prop = $propVO->getId_tip_prop();
            $dir_prop = $propVO->getDir_prop();
            $ubi_prop = $propVO->getUbi_prop();
            $desc_prop = $propVO->getDesc_prop();
            $query = "UPDATE propiedad SET id_tip_prop=?, dir_prop=?, ubi_prop=?, desc_prop=? WHERE id_prop= ?";
            $stm = $this->conn->db_open()->prepare($query);   
            $stm->bindParam(1, $id_tip_prop);    
            $stm->bindParam(2, $dir_prop); 
            $stm->bindParam(3, $ubi_prop); 
            $stm->bindParam(4, $desc_prop); 
            $stm->bindParam(5, $id_prop);  
            $stm->execute();
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }

    }

    public function delete($id_prop){
        $stm = null;
        try 
        {
            $id = $id_prop;
            $query = "DELETE FROM propiedad WHERE id_prop = ?";
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