<?php
$namerutevo = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/serieVO.php";
$connectionrute = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/Connection/connection.php";

require_once($namerutevo);
require_once($connectionrute);

class serieDAO{

    private $conn;
    public $stm;

    public function __construct(){
        $this->conn = new connection();
    }

    public function create(serieVO $serieVO){ 
        $stm = null;   
        try 
        {
            if($serieVO != null){
                $id_serie = $serieVO->getId_serie();
                $nom_serie = $serieVO->getNom_serie();
                $desc_serie = $serieVO->getDesc_serie();
                $query = "INSERT INTO serie(id_serie, nom_serie, desc_serie) VALUES (?,?,?)";
                $stm = $this->conn->db_open()->prepare($query);  
                $stm->bindParam(1, $id_serie); 
                $stm->bindParam(2, $nom_serie);    
                $stm->bindParam(3, $desc_serie);   
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
            $query = "SELECT * FROM serie";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->execute();
            $listaVO = $stm->fetchAll(PDO::FETCH_OBJ);

            foreach($listaVO as $r)
            {
                $serieVO = new serieVO();
                $serieVO->setId_serie($r->id_serie);
                $serieVO->setNom_serie($r->nom_serie);
                $serieVO->setDesc_serie($r->desc_serie);
                $result[] = $serieVO;
            }
            return $result;
            $stm = null;
        }catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function readSerie($id_serie){
        $stm = null; 
        try 
        {
            $query = "SELECT * FROM serie WHERE id_serie = ?";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindValue(1, $id_serie);
            $stm->execute();
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $serieVO = new serieVO();

            if($stm->rowCount()!=0){
                $serieVO->setId_serie($r->id_serie);
                $serieVO->setNom_serie($r->id_serie);
                $serieVO->setDesc_serie($r->desc_serie);
            }
            else{
                $serieVO = null;
            }

            return $serieVO;

            $stm = null;
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function update(serieVO $serieVO){
        $stm = null; 
        try 
        {
            $id_serie = $serieVO->getId_serie();
            $nom_serie = $serieVO->getNom_serie();
            $desc_serie = $serieVO->getDesc_serie();
            $query = "UPDATE serie SET nom_serie=?, desc_serie=? WHERE id_serie=?";
            $stm = $this->conn->db_open()->prepare($query);    
            $stm->bindParam(1, $nom_serie);  
            $stm->bindParam(2, $desc_serie); 
            $stm->bindParam(3, $id_serie); 
            $stm->execute();
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }

    }

    public function delete($id_serie){
        $stm = null;
        try 
        {
            $id = $id_serie;
            $query = "DELETE FROM serie WHERE id_serie = ?";
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