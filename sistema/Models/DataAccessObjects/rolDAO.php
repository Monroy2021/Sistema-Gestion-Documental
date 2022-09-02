<?php
$namerutevo = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/rolVO.php";
$connectionrute = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/Connection/connection.php";

require_once($namerutevo);
require_once($connectionrute);

class rolDAO{

    private $conn;
    public $stm;

    public function __construct(){
        $this->conn = new connection();
    }

    public function create(rolVO $rolVO){ 
        $stm = null;   
        try 
        {
            if($rolVO != null){
                $nom_rol = $rolVO->getNom_rol();
                $esp_rol = $rolVO->getEsp_rol();
                $query = "INSERT INTO rol(nom_rol,esp_rol) VALUES (?,?)";
                $stm = $this->conn->db_open()->prepare($query);    
                $stm->bindParam(1, $nom_rol);   
                $stm->bindParam(2, $esp_rol); 
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
            $query = "SELECT * FROM rol";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->execute();
            $listaVO = $stm->fetchAll(PDO::FETCH_OBJ);

            foreach($listaVO as $r)
            {
                $rolVO = new rolVO();
                $rolVO->setId_rol($r->id_rol);
                $rolVO->setNom_rol($r->nom_rol);
                $rolVO->setEsp_rol($r->esp_rol);
                $result[] = $rolVO;
            }
            return $result;
            $stm = null;
        }catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function readNom_rol($id_rol){
        $stm = null; 
        try 
        {
            $query = "SELECT * FROM rol WHERE id_rol = ?";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindValue(1, $id_rol);
            $stm->execute();
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $rolVO = new rolVO();

            if($stm->rowCount()!=0){
                $rolVO->setId_rol($r->id_rol);
                $rolVO->setNom_rol($r->nom_rol);
                $rolVO->setEsp_rol($r->esp_rol);
            }
            else{
                $rolV0 = null;
            }

            return $rolVO;

            $stm = null;
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function update(rolVO $rolVO){
        $stm = null; 
        try 
        {
            $id_rol = $rolVO->getId_rol();
            $nom_rol = $rolVO->getNom_rol();
            $esp_rol = $rolVO->getEsp_rol();
            $query = "UPDATE rol SET nom_rol= ?, esp_rol=? WHERE id_rol= ?";
            $stm = $this->conn->db_open()->prepare($query);    
            $stm->bindParam(1, $nom_rol);   
            $stm->bindParam(2, $esp_rol); 
            $stm->bindParam(3, $id_rol);      
            $stm->execute();
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }

    }

    public function delete($id_rol){
        $stm = null;
        try 
        {
            $id = $id_rol;
            $query = "DELETE FROM rol WHERE id_rol = ?";
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