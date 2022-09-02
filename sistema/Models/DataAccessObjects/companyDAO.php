<?php

$namerutevo = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/companyVO.php";
$connectionrute = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/Connection/connection.php";

require_once($namerutevo);
require_once($connectionrute);

class companyDAO{

    private $conn;
    public $stm;

    public function __construct(){
        $this->conn = new connection();
    }

    public function create(companyVO $compVO){ 
        $stm = null;   
        try 
        {
            if($compVO != null){
                $nit_emp = $compVO->getNit_emp();
                $nom_emp = $compVO->getNom_emp();
                $dir_emp = $compVO->getDir_emp();
                $reg_emp = $compVO->getReg_emp();
                $query = "INSERT INTO empresa (nit_emp,nom_emp,dir_emp,reg_emp) VALUES (?,?,?,?)";
                $stm = $this->conn->db_open()->prepare($query);  
                $stm->bindParam(1, $nit_emp);   
                $stm->bindParam(2, $nom_emp);   
                $stm->bindParam(3, $dir_emp); 
                $stm->bindParam(4, $reg_emp);   
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
            $query = "SELECT * FROM empresa";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->execute();
            $listaVO = $stm->fetchAll(PDO::FETCH_OBJ);

            foreach($listaVO as $r)
            {
                $compVO = new companyVO();
                $compVO->setId_emp($r->id_emp);
                $compVO->setNit_emp($r->nit_emp);
                $compVO->setNom_emp($r->nom_emp);
                $compVO->setDir_emp($r->dir_emp);
                $compVO->setReg_emp($r->reg_emp);
                $result[] = $compVO;
            }
            return $result;
            $stm = null;
        }catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function readNom_emp($nom_emp){
        $stm = null; 
        try 
        {
            $query = "SELECT * FROM empresa WHERE nom_emp = ?";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindValue(1, $nom_emp);
            $stm->execute();
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $compVO = new companyVO();

            if($stm->rowCount()!=0){
                $compVO->setId_emp($r->id_emp);
                $compVO->setNit_emp($r->nit_emp);
                $compVO->setNom_emp($r->nom_emp);
                $compVO->setDir_emp($r->dir_emp);
                $compVO->setReg_emp($r->reg_emp);
            }
            else{
                $compV0 = null;
            }

            return $compVO;

            $stm = null;
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }

    }

    public function update(companyVO $compVO){
        $stm = null; 
        try 
        {
            $id_emp = $compVO->getId_emp();
            $nit_emp = $compVO->getNit_emp();
            $nom_emp = $compVO->getNom_emp();
            $dir_emp = $compVO->getDir_emp();
            $reg_emp = $compVO->getReg_emp();
            $query = "UPDATE empresa SET nit_emp= ?, nom_emp=?, dir_emp=?, reg_emp=? WHERE id_emp= ?";
            $stm = $this->conn->db_open()->prepare($query);  
            $stm->bindParam(1, $nit_emp);   
            $stm->bindParam(2, $nom_emp);   
            $stm->bindParam(3, $dir_emp); 
            $stm->bindParam(4, $reg_emp); 
            $stm->bindParam(5, $id_emp);     
            $stm->execute();
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }

    }

    public function delete($id_emp){
        $stm = null;
        try 
        {
            $id = $id_emp;
            $query = "DELETE FROM empresa WHERE id_emp = ?";
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