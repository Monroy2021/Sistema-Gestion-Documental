<?php
$namerutevo = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/subserieVO.php";
$connectionrute = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/Connection/connection.php";

require_once($namerutevo);
require_once($connectionrute);

class subserieDAO{

    private $conn;
    public $stm;

    public function __construct(){
        $this->conn = new connection();
    }

    public function create(subserieVO $subseVO){ 
        $stm = null;   
        try 
        {
            if($subseVO != null){
                $id_subse = $subseVO->getId_subse();
                $id_serie = $subseVO->getId_serie();
                $nom_subse = $subseVO->getNom_subse();
                $orden_subse = $subseVO->getOrden_subse();
                $desc_subse = $subseVO->getDesc_subse();
                $query = "INSERT INTO subserie (id_subse, id_serie, nom_subse, orden_subse, desc_subse) VALUES (?,?,?,?)";
                $stm = $this->conn->db_open()->prepare($query);  
                $stm->bindParam(1, $id_subse);   
                $stm->bindParam(2, $id_serie); 
                $stm->bindParam(3, $nom_subse);
                $stm->bindParam(4, $orden_subse);   
                $stm->bindParam(5, $desc_subse); 
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
            $query = "SELECT sb.id_subse, s.id_serie, s.nom_serie, sb.nom_subse, sb.orden_subse, sb.desc_subse
            FROM subserie sb
            INNER JOIN serie s ON sb.id_serie = s.id_serie";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->execute();
            $listaVO = $stm->fetchAll(PDO::FETCH_OBJ);

            foreach($listaVO as $r)
            {
                $subseVO = new subserieVO();
                $subseVO->setId_subse($r->id_subse);
                $subseVO->setId_serie($r->id_serie);
                $subseVO->setNom_serie($r->nom_serie);
                $subseVO->setNom_subse($r->nom_subse);
                $subseVO->setOrden_subse($r->orden_subse);
                $subseVO->setDesc_subse($r->desc_subse);
                $result[] = $subseVO;
            }
            return $result;
            $stm = null;
        }catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function readSubse($id_subse){
        $stm = null; 
        try 
        {
            $query = "SELECT sb.id_subse, s.id_serie, s.nom_serie, sb.nom_subse, sb.orden_subse, sb.desc_subse
            FROM subserie sb
            INNER JOIN serie s ON sb.id_serie = s.id_serie
            WHERE sb.id_subse = ?";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindValue(1, $id_subse);
            $stm->execute();
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $subseVO = new subserieVO();

            if($stm->rowCount()!=0){
                $subseVO->setId_subse($r->id_subse);
                $subseVO->setId_serie($r->id_serie);
                $subseVO->setNom_serie($r->nom_serie);
                $subseVO->setNom_subse($r->nom_subse);
                $subseVO->setOrden_subse($r->orden_subse);
                $subseVO->setDesc_subse($r->desc_subse);
            }
            else{
                $subseVO = null;
            }

            return $subseVO;

            $stm = null;
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function update(subserieVO $subseVO){
        $stm = null; 
        try 
        {
            $id_subse = $subseVO->getId_subse();
            $id_serie = $subseVO->getId_serie();
            $nom_subse = $subseVO->getNom_subse();
            $desc_subse = $subseVO->getDesc_subse();
            $query = "UPDATE subserie SET id_serie= ?, nom_subse = ?, orden_subse=?, desc_subse= ? WHERE id_subse= ?";
            $stm = $this->conn->db_open()->prepare($query);    
            $stm->bindParam(1, $id_serie);  
            $stm->bindParam(2, $nom_subse); 
            $stm->bindParam(3, $desc_subse); 
            $stm->bindParam(4, $desc_subse); 
            $stm->bindParam(5, $id_subse);      
            $stm->execute();
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }

    }

    public function delete($id_subse){
        $stm = null;
        try 
        {
            $id = $id_subse;
            $query = "DELETE FROM subserie WHERE id_subse = ?";
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