<?php
$namerutevo = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/typefileVO.php";
$connectionrute = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/Connection/connection.php";

require_once($namerutevo);
require_once($connectionrute);

class typefileDAO{

    private $conn;
    public $stm;

    public function __construct(){
        $this->conn = new connection();
    }

    public function create(typefileVO $typfileVO){ 
        $stm = null;   
        try 
        {
            if($typfileVO != null){
                $cod_tip_carp = $typfileVO->getCod_tip_carp();
                $cod_arch = $typfileVO->getCod_arch();
                $nom_tip_carp = $typfileVO->getNom_tip_carp();
                $orden_tip_carp = $typfileVO->getOrden_tip_carp();
                $desc_tip_carp = $typfileVO->getDesc_tip_carp();
                $query = "INSERT INTO tipo_carpeta (cod_tip_carp, cod_arch, nom_tip_carp, orden_tip_carp, desc_tip_carp) VALUES (?,?,?,?,?)";
                $stm = $this->conn->db_open()->prepare($query);  
                $stm->bindParam(1, $cod_tip_carp);   
                $stm->bindParam(2, $cod_arch);    
                $stm->bindParam(3, $nom_tip_carp); 
                $stm->bindParam(4, $orden_tip_carp); 
                $stm->bindParam(5, $desc_tip_carp); 
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
            $query = "SELECT tp.cod_tip_carp, a.cod_arch, a.nom_arch, a.num_arch, tp.nom_tip_carp, tp.orden_tip_carp, tp.desc_tip_carp
            FROM tipo_carpeta tp 
            INNER JOIN archivo a ON tp.cod_arch = a.cod_arch";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->execute();
            $listaVO = $stm->fetchAll(PDO::FETCH_OBJ);

            foreach($listaVO as $r)
            {
                $typfileVO = new typefileVO();
                $typfileVO->setCod_tip_carp($r->cod_tip_carp);
                $typfileVO->setCod_arch($r->cod_arch);
                $typfileVO->setNom_arch($r->nom_arch); 
                $typfileVO->setNum_arch($r->num_arch);
                $typfileVO->setNom_tip_carp($r->nom_tip_carp);
                $typfileVO->setOrden_tip_carp($r->orden_tip_carp);
                $typfileVO->setDesc_tip_carp($r->desc_tip_carp);
                $result[] = $typfileVO;
            }
            return $result;

            $stm = null;
        }catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function readTipcarpleasing($cod_reg_oper){
        $stm = null; 
        try 
        {
            $result = array();
            $query = "SELECT tc.cod_tip_carp, a.cod_arch, a.nom_arch, a.num_arch, tc.nom_tip_carp, tc.orden_tip_carp, tc.desc_tip_carp
            FROM tipo_carpeta tc
            INNER JOIN archivo a ON tc.cod_arch = a.cod_arch
            INNER JOIN carpeta c ON tc.cod_tip_carp = c.cod_tip_carp
            INNER JOIN operacion op ON c.cod_reg_oper = op.cod_reg_oper
            WHERE op.cod_reg_oper = ?";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindValue(1, $cod_reg_oper);
            $stm->execute();
            $listaVO = $stm->fetchAll(PDO::FETCH_OBJ);

            foreach($listaVO as $r)
            {
                $typfileVO = new typefileVO();
                $typfileVO->setCod_tip_carp($r->cod_tip_carp);
                $typfileVO->setCod_arch($r->cod_arch);
                $typfileVO->setNom_arch($r->nom_arch); 
                $typfileVO->setNum_arch($r->num_arch);
                $typfileVO->setNom_tip_carp($r->nom_tip_carp);
                $typfileVO->setOrden_tip_carp($r->orden_tip_carp);
                $typfileVO->setDesc_tip_carp($r->desc_tip_carp);
                $result[] = $typfileVO;
            }
            return $result;

            $stm = null;
        }catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function readTipcarp($cod_tip_carp){
        $stm = null; 
        try 
        {
            $query = "SELECT tp.cod_tip_carp, a.cod_arch, a.nom_arch, a.num_arch, tp.nom_tip_carp, tp.orden_tip_carp, tp.desc_tip_carp
            FROM tipo_carpeta tp 
            INNER JOIN archivo a ON tp.cod_arch = a.cod_arch
            WHERE tp.cod_tip_carp = ?";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindValue(1, $cod_tip_carp);
            $stm->execute();
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $typfileVO = new typefileVO();

            if($stm->rowCount()!=0){
                $typfileVO->setCod_tip_carp($r->cod_tip_carp);
                $typfileVO->setCod_arch($r->cod_arch);
                $typfileVO->setNom_arch($r->nom_arch); 
                $typfileVO->setNum_arch($r->num_arch);
                $typfileVO->setNom_tip_carp($r->nom_tip_carp);
                $typfileVO->setOrden_tip_carp($r->orden_tip_carp);
                $typfileVO->setDesc_tip_carp($r->desc_tip_carp);
            }
            else{
                $typfileVO = null;
            }

            return $typfileVO;

            $stm = null;
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function update(typefileVO $typfileVO){
        $stm = null; 
        try 
        {
            $cod_tip_carp = $typfileVO->getCod_tip_carp();
            $cod_arch = $typfileVO->getCod_arch();
            $nom_tip_carp = $typfileVO->getNom_tip_carp();
            $desc_tip_carp = $typfileVO->getDesc_tip_carp();
            $query = "UPDATE tipo_carpeta SET cod_arch = ?, nom_tip_carp = ?, desc_tip_carp = ? WHERE cod_tip_carp = ?";
            $stm = $this->conn->db_open()->prepare($query);    
            $stm->bindParam(1, $cod_arch);   
            $stm->bindParam(2, $nom_tip_carp);  
            $stm->bindParam(3, $desc_tip_carp); 
            $stm->bindParam(4, $cod_tip_carp);      
            $stm->execute();
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }

    }

    public function delete($cod_tip_carp){
        $stm = null;
        try 
        {
            $id = $cod_tip_carp;
            $query = "DELETE FROM tipo_carpeta WHERE cod_tip_carp = ?";
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