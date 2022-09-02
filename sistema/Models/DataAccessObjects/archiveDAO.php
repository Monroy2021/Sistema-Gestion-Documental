<?php
$namerutevo = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/archiveVO.php";
$connectionrute = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/Connection/connection.php";

require_once($namerutevo);
require_once($connectionrute);

class archiveDAO{

    private $conn;
    public $stm;

    public function __construct(){
        $this->conn = new connection();
    }

    public function create(archiveVO $archVO){ 
        $stm = null;   
        try 
        {
            if($archVO != null){
                $nom_arch = $archVO->getNom_arch();
                $num_arch = $archVO->getNum_arch(); 
                $tip_arch = $archVO->getTip_arch(); 
                $desc_arch = $archVO->getDesc_arch();
                $query = "INSERT INTO archivo (nom_arch, num_arch, tip_arch, desc_arch) VALUES (?,?,?,?)";
                $stm = $this->conn->db_open()->prepare($query);    
                $stm->bindParam(1, $nom_arch);   
                $stm->bindParam(2, $num_arch);  
                $stm->bindParam(3, $tip_arch);   
                $stm->bindParam(4, $desc_arch);
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
            $query = "SELECT * FROM archivo";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->execute();
            $listaVO = $stm->fetchAll(PDO::FETCH_OBJ);

            foreach($listaVO as $r)
            {
                $archVO = new archiveVO();
                $archVO->setCod_arch($r->cod_arch);
                $archVO->setNom_arch($r->nom_arch);
                $archVO->setNum_arch($r->num_arch); 
                $archVO->setTip_arch($r->tip_arch);
                $archVO->setDesc_arch($r->desc_arch);
                $result[] = $archVO;
            }
            return $result;
            $stm = null;
        }catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function readArchive($cod_arch){
        $stm = null; 
        try 
        {
            $query = "SELECT * FROM archivo WHERE cod_arch = ?";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindValue(1, $cod_arch);
            $stm->execute();
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $archVO = new archiveVO();

            if($stm->rowCount()!=0){
                $archVO->setCod_arch($r->cod_arch);
                $archVO->setNom_arch($r->nom_arch);
                $archVO->setNum_arch($r->num_arch); 
                $archVO->setTip_arch($r->tip_arch);
                $archVO->setDesc_arch($r->desc_arch);
            }
            else{
                $archVO = null;
            }

            return $archVO;

            $stm = null;
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function update(archiveVO $archVO){
        $stm = null; 
        try 
        {
            $cod_arch = $archVO->getCod_arch();
            $nom_arch = $archVO->getNom_arch();
            $num_arch = $archVO->getNum_arch(); 
            $tip_arch = $archVO->getTip_arch();
            $desc_arch = $archVO->getDesc_arch();
            $query = "UPDATE archivo SET nom_arch= ?, num_arch=?, tip_arch=?, desc_arch=? WHERE cod_arch= ?";
            $stm = $this->conn->db_open()->prepare($query);    
            $stm->bindParam(1, $nom_arch);   
            $stm->bindParam(2, $num_arch); 
            $stm->bindParam(3, $tip_arch);  
            $stm->bindParam(4, $desc_arch); 
            $stm->bindParam(5, $cod_arch);       
            $stm->execute();
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }

    }

    public function delete($cod_arch){
        $stm = null;
        try 
        {
            $id = $cod_arch;
            $query = "DELETE FROM archivo WHERE cod_arch = ?";
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