<?php
$namerutevo = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/fileVO.php";
$connectionrute = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/Connection/connection.php";

require_once($namerutevo);
require_once($connectionrute);

class fileDAO{

    private $conn;
    public $stm;

    public function __construct(){
        $this->conn = new connection();
    }

    public function create(fileVO $fileVO){ 
        $stm = null;   
        try 
        {
            if($fileVO != null){
                $cod_tip_carp = $fileVO->getCod_tip_carp(); 
                $cod_reg_oper = $fileVO->getCod_reg_oper(); 
                $desc_carp = $fileVO->getDes_carp();
                $query = "INSERT INTO carpeta(cod_tip_carp, cod_reg_oper, des_carp) VALUES (?,?,?)";
                $stm = $this->conn->db_open()->prepare($query);  
                $stm->bindParam(1, $cod_tip_carp);   
                $stm->bindParam(2, $cod_reg_oper);  
                $stm->bindParam(3, $desc_carp);  
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
            $query = "SELECT c.cod_carp, tc.cod_tip_carp, tc.nom_tip_carp, o.cod_reg_oper, o.desc_oper, c.des_carp 
            FROM carpeta c
            INNER JOIN tipo_carpeta tc ON c.cod_tip_carp = tc.cod_tip_carp
            INNER JOIN operacion o ON c.cod_reg_oper = o.cod_reg_oper";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->execute();
            $listaVO = $stm->fetchAll(PDO::FETCH_OBJ);

            foreach($listaVO as $r)
            {
                $fileVO = new fileVO();
                $fileVO->setCod_carp($r->cod_carp);
                $fileVO->setCod_tip_carp($r->cod_tip_carp);
                $fileVO->setNom_tip_carp($r->nom_tip_carp); 
                $fileVO->setCod_reg_oper($r->cod_reg_oper);
                $fileVO->setDesc_oper($r->desc_oper);
                $fileVO->setDes_carp($r->des_carp);
                $result[] = $fileVO;
            }
            return $result;
            $stm = null;
        }catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function readFile($cod_carp){
        $stm = null; 
        try 
        {
            $query = "SELECT c.cod_carp, tc.cod_tip_carp, tc.nom_tip_carp, o.cod_reg_oper, o.desc_oper, c.des_carp 
            FROM carpeta c
            INNER JOIN tipo_carpeta tc ON c.cod_tip_carp = tc.cod_tip_carp
            INNER JOIN operacion o ON c.cod_reg_oper = o.cod_reg_oper 
            WHERE c.cod_carp = ?";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindValue(1, $cod_carp);
            $stm->execute();
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $fileVO = new fileVO();

            if($stm->rowCount()!=0){
                $fileVO->setCod_carp($r->cod_carp);
                $fileVO->setCod_tip_carp($r->cod_tip_carp);
                $fileVO->setNom_tip_carp($r->nom_tip_carp); 
                $fileVO->setCod_reg_oper($r->cod_reg_oper);
                $fileVO->setDesc_oper($r->desc_oper);
                $fileVO->setDes_carp($r->des_carp);
            }
            else{
                $fileVO = null;
            }

            return $fileVO;

            $stm = null;
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function readFilecontract($cod_tip_carp, $cod_reg_oper){
        $stm = null; 
        try 
        {
            $query = "SELECT c.cod_carp, tc.cod_tip_carp, tc.nom_tip_carp, o.cod_reg_oper, o.desc_oper, c.des_carp 
            FROM carpeta c
            INNER JOIN tipo_carpeta tc ON c.cod_tip_carp = tc.cod_tip_carp
            INNER JOIN operacion o ON c.cod_reg_oper = o.cod_reg_oper 
            WHERE c.cod_tip_carp = ? AND c.cod_reg_oper=?";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindValue(1, $cod_tip_carp);
            $stm->bindValue(2, $cod_reg_oper);
            $stm->execute();
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $fileVO = new fileVO();

            if($stm->rowCount()!=0){
                $fileVO->setCod_carp($r->cod_carp);
                $fileVO->setCod_tip_carp($r->cod_tip_carp);
                $fileVO->setNom_tip_carp($r->nom_tip_carp); 
                $fileVO->setCod_reg_oper($r->cod_reg_oper);
                $fileVO->setDesc_oper($r->desc_oper);
                $fileVO->setDes_carp($r->des_carp);
            }
            else{
                $fileVO = null;
            }

            return $fileVO;

            $stm = null;
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function update(fileVO $fileVO){
        $stm = null; 
        try 
        {
            $cod_carp = $fileVO->getCod_carp();
            $cod_tip_carp = $fileVO->getCod_tip_carp(); 
            $cod_reg_oper = $fileVO->getCod_reg_oper(); 
            $desc_carp = $fileVO->getDes_carp();
            $query = "UPDATE carpeta SET cod_tip_carp=?, cod_reg_oper=?, des_carp=? WHERE cod_carp=?";
            $stm = $this->conn->db_open()->prepare($query);   
            $stm->bindParam(1, $cod_tip_carp);   
            $stm->bindParam(2, $cod_reg_oper);  
            $stm->bindParam(3, $desc_carp); 
            $stm->bindParam(4, $cod_carp);   
            $stm->execute();
            
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }

    }

    public function delete($cod_carp){
        $stm = null;
        try 
        {
            $id = $cod_carp;
            $query = "DELETE FROM carpeta WHERE cod_carp = ?";
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