<?php
$namerutevo = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/personVO.php";
$connectionrute = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/Connection/connection.php";

require_once($namerutevo);
require_once($connectionrute);

class personDAO{

    private $conn;
    public $stm;

    public function __construct(){
        $this->conn = new connection();
    }

    public function create(personVO $personVO){ 
        $stm = null;   
        try 
        {
            if($personVO != null){
                $ced_pers = $personVO->getCed_pers();
                $id_emp = $personVO->getId_emp();
                $nom_pers = $personVO->getNom_pers();
                $ape_pers = $personVO->getApe_pers();
                $fec_exp_ced_pers = $personVO->getFec_exp_ced_pers();
                $cel_pers = $personVO->getCel_pers();
                $tel_pers = $personVO->getTel_pers();
                $email_pers = $personVO->getEmail_pers();
                $sex_pers = $personVO->getSex_pers();
                $dir_pers = $personVO->getDir_pers();
                $ciud_pers = $personVO->getCiud_pers();
                $fec_reg_pers = $personVO->getFec_reg_pers();
                $fec_act_pers = $personVO->getFec_act_pers();
                $query = "INSERT INTO persona(ced_pers, id_emp, nom_pers, ape_pers, fec_exp_ced_pers, cel_pers, tel_pers, email_pers, sex_pers, dir_pers, ciud_pers, fec_reg_pers, fec_act_pers) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $stm = $this->conn->db_open()->prepare($query);  
                $stm->bindParam(1, $ced_pers);   
                $stm->bindParam(2, $id_emp);   
                $stm->bindParam(3, $nom_pers); 
                $stm->bindParam(4, $ape_pers);   
                $stm->bindParam(5, $fec_exp_ced_pers);   
                $stm->bindParam(6, $cel_pers);   
                $stm->bindParam(7, $tel_pers); 
                $stm->bindParam(8, $email_pers);
                $stm->bindParam(9, $sex_pers);   
                $stm->bindParam(10, $dir_pers);   
                $stm->bindParam(11, $ciud_pers); 
                $stm->bindParam(12, $fec_reg_pers);
                $stm->bindParam(13, $fec_act_pers);
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
            $query = "SELECT p.ced_pers, p.id_emp, e.nom_emp, p.nom_pers, p.ape_pers, p.fec_exp_ced_pers, p.cel_pers, 
            p.tel_pers, p.email_pers, p.sex_pers, p.dir_pers, p.ciud_pers, p.fec_reg_pers, p.fec_act_pers 
            FROM persona p 
            INNER JOIN empresa e ON p.id_emp = e.id_emp";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->execute();
            $listaVO = $stm->fetchAll(PDO::FETCH_OBJ);

            foreach($listaVO as $r)
            {
                $personVO = new personVO();
                $personVO->setCed_pers($r->ced_pers);
                $personVO->setId_emp($r->id_emp);
                $personVO->setNom_emp($r->nom_emp);
                $personVO->setNom_pers($r->nom_pers);
                $personVO->setApe_pers($r->ape_pers);
                $personVO->setFec_exp_ced_pers($r->fec_exp_ced_pers);
                $personVO->setCel_pers($r->cel_pers);
                $personVO->setTel_pers($r->tel_pers);
                $personVO->setEmail_pers($r->email_pers);
                $personVO->setSex_pers($r->sex_pers);
                $personVO->setDir_pers($r->dir_pers);
                $personVO->setCiud_pers($r->ciud_pers);
                $personVO->setFec_reg_pers($r->fec_reg_pers);
                $personVO->setFec_act_pers($r->fec_act_pers);
                $result[] = $personVO;
            }
            return $result;
            $stm = null;
        }catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function readPerson($ced_pers){
        $stm = null; 
        try 
        {
            $query = "SELECT p.ced_pers, e.id_emp, e.nom_emp, p.nom_pers, p.ape_pers, p.fec_exp_ced_pers, p.cel_pers, 
            p.tel_pers, p.email_pers, p.sex_pers, p.dir_pers, p.ciud_pers, p.fec_reg_pers, p.fec_act_pers 
            FROM persona p INNER JOIN empresa e ON p.id_emp = e.id_emp
            WHERE p.ced_pers = ? ";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindValue(1, $ced_pers);
            $stm->execute();
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $personVO = new personVO();

            if($stm->rowCount()!=0){
                $personVO->setCed_pers($r->ced_pers);
                $personVO->setId_emp($r->id_emp);
                $personVO->setNom_emp($r->nom_emp);
                $personVO->setNom_pers($r->nom_pers);
                $personVO->setApe_pers($r->ape_pers);
                $personVO->setFec_exp_ced_pers($r->fec_exp_ced_pers);
                $personVO->setCel_pers($r->cel_pers);
                $personVO->setTel_pers($r->tel_pers);
                $personVO->setEmail_pers($r->email_pers);
                $personVO->setSex_pers($r->sex_pers);
                $personVO->setDir_pers($r->dir_pers);
                $personVO->setCiud_pers($r->ciud_pers);
                $personVO->setFec_reg_pers($r->fec_reg_pers);
                $personVO->setFec_act_pers($r->fec_act_pers);
            }
            else{
                $personV0 = null;
            }

            return $personVO;

            $stm = null;
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }

    }

    public function update(personVO $personVO){
        $stm = null; 
        try 
        {
            $ced_pers = $personVO->getCed_pers();
            $id_emp = $personVO->getId_emp();
            $nom_pers = $personVO->getNom_pers();
            $ape_pers = $personVO->getApe_pers();
            $fec_exp_ced_pers = $personVO->getFec_exp_ced_pers();
            $cel_pers = $personVO->getCel_pers();
            $tel_pers = $personVO->getTel_pers();
            $email_pers = $personVO->getEmail_pers();
            $sex_pers = $personVO->getSex_pers();
            $dir_pers = $personVO->getDir_pers();
            $ciud_pers = $personVO->getCiud_pers();
            $fec_act_pers = $personVO->getFec_act_pers();
            $query = "UPDATE persona SET id_emp = ?, nom_pers = ?, ape_pers = ?, fec_exp_ced_pers = ?, cel_pers = ?, tel_pers = ?, email_pers = ?, sex_pers = ?, dir_pers = ?, ciud_pers = ?, fec_act_pers = ? WHERE ced_pers= ?";
            $stm = $this->conn->db_open()->prepare($query);   
            $stm->bindParam(1, $id_emp);   
            $stm->bindParam(2, $nom_pers); 
            $stm->bindParam(3, $ape_pers); 
            $stm->bindParam(4, $fec_exp_ced_pers); 
            $stm->bindParam(5, $cel_pers);   
            $stm->bindParam(6, $tel_pers);   
            $stm->bindParam(7, $email_pers); 
            $stm->bindParam(8, $sex_pers); 
            $stm->bindParam(9, $dir_pers);
            $stm->bindParam(10, $ciud_pers); 
            $stm->bindParam(11, $fec_act_pers);   
            $stm->bindParam(12, $ced_pers);      
            $stm->execute();
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }

    }

    public function delete($ced_pers){
        $stm = null;
        try 
        {
            $ced = $ced_pers;
            $query = "DELETE FROM persona WHERE ced_pers = ?";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindParam(1, $ced);                 
            $stm->execute();
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
        
    }


}
?>