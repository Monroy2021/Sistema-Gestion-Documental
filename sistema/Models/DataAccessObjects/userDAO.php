<?php
$namerutevo = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/companyVO.php";
$connectionrute = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/Connection/connection.php";

require_once($namerutevo);
require_once($connectionrute);

class userDAO{
    private $conn;
    public $stm;

    public function __construct(){
        $this->conn = new connection();
    }

    public function readUser($nom_user, $pass_user){
    $stm = null; 
    try 
    {
        $query ="SELECT e.id_emp, p.ced_pers, p.nom_pers, p.ape_pers, r.id_rol, r.nom_rol 
                FROM usuario u 
                INNER JOIN persona p ON u.ced_pers = p.ced_pers 
                INNER JOIN rol r ON u.id_rol = r.id_rol 
                INNER JOIN empresa e ON p.id_emp = e.id_emp
                WHERE u.nom_usua = ? AND u.pass_usua= ? ";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindValue(1, $nom_user);
            $stm->bindValue(2, $pass_user);
            $stm->execute();
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $usersVO = new userVO();

            if($stm->rowCount()!=0){
                $usersVO->setId_emp($r->id_emp);
                $usersVO->setCed_pers($r->ced_pers);
                $usersVO->setNom_pers($r->nom_pers);
                $usersVO->setApe_pers($r->ape_pers);
                $usersVO->setId_rol($r->id_rol);
                $usersVO->setNom_rol($r->nom_rol);
            }
            else{
                $usersV0 = null;
            }

            return $usersVO;

            $stm = null;
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }

    }

    public function create(userVO $userVO){ 
        $stm = null;   
        try 
        {
            if($userVO != null){
                $ced_pers = $userVO->getCed_pers();
                $id_rol = $userVO->getId_rol();
                $nom_user = $userVO->getNom_usua();
                $pass_user = $userVO->getPass_usua();
                $fec_ing_user = $userVO->getFec_ing_usua();
                $query = "INSERT INTO usuario(ced_pers, id_rol, nom_usua, pass_usua, fec_ing_usua) VALUES (?,?,?,?,?)";
                $stm = $this->conn->db_open()->prepare($query);    
                $stm->bindParam(1, $ced_pers);   
                $stm->bindParam(2, $id_rol); 
                $stm->bindParam(3, $nom_user);   
                $stm->bindParam(4, $pass_user);
                $stm->bindParam(5, $fec_ing_user);  
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
            $query = "SELECT e.id_emp, u.cod_usua,u.ced_pers,p.nom_pers, p.ape_pers, u.id_rol, r.nom_rol, u.nom_usua, u.pass_usua, u.fec_ing_usua
            FROM usuario u 
            INNER JOIN persona p ON u.ced_pers = p.ced_pers
            INNER JOIN rol r ON u.id_rol = r.id_rol
            INNER JOIN empresa e ON p.id_emp = e.id_emp";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->execute();
            $listaVO = $stm->fetchAll(PDO::FETCH_OBJ);

            foreach($listaVO as $r)
            {
                $userVO = new userVO();
                $userVO->setId_emp($r->id_emp);
                $userVO->setCod_usua($r->cod_usua);
                $userVO->setCed_pers($r->ced_pers);
                $userVO->setNom_pers($r->nom_pers);
                $userVO->setApe_pers($r->ape_pers);
                $userVO->setId_rol($r->id_rol);
                $userVO->setNom_rol($r->nom_rol);
                $userVO->setNom_usua($r->nom_usua);
                $userVO->setPass_usua($r->pass_usua);
                $userVO->setFec_ing_usua($r->fec_ing_usua);
                $result[] = $userVO;
            }
            return $result;
            $stm = null;
        }catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function readUsua($cod_usua){
        $stm = null; 
        try 
        {
            $query = "SELECT e.id_emp, u.cod_usua,u.ced_pers,p.nom_pers, p.ape_pers, u.id_rol, r.nom_rol, u.nom_usua, u.pass_usua, u.fec_ing_usua
            FROM usuario u 
            INNER JOIN persona p ON u.ced_pers = p.ced_pers
            INNER JOIN rol r ON u.id_rol = r.id_rol
            INNER JOIN empresa e ON p.id_emp = e.id_emp
            WHERE u.cod_usua = ?";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindValue(1, $cod_usua);
            $stm->execute();
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $userVO = new userVO();

            if($stm->rowCount()!=0){
                $userVO->setId_emp($r->id_emp);
                $userVO->setCod_usua($r->cod_usua);
                $userVO->setCed_pers($r->ced_pers);
                $userVO->setNom_pers($r->nom_pers);
                $userVO->setApe_pers($r->ape_pers);
                $userVO->setId_rol($r->id_rol);
                $userVO->setNom_rol($r->nom_rol);
                $userVO->setNom_usua($r->nom_usua);
                $userVO->setPass_usua($r->pass_usua);
                $userVO->setFec_ing_usua($r->esp_rol);
            }
            else{
                $userV0 = null;
            }

            return $userVO;

            $stm = null;
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function readPers($ced_pers){
        $stm = null; 
        try 
        {
            $query = "SELECT u.cod_usua,u.ced_pers,p.nom_pers, p.ape_pers, u.id_rol, r.nom_rol, u.nom_usua, u.pass_usua, u.fec_ing_usua 
            FROM usuario u 
            INNER JOIN persona p ON u.ced_pers = p.ced_pers 
            INNER JOIN rol r ON u.id_rol = r.id_rol
            WHERE p.ced_pers = ?";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindValue(1, $ced_pers);
            $stm->execute();
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $userVO = new userVO();

            if($stm->rowCount()!=0){
                $userVO->setCod_usua($r->cod_usua);
                $userVO->setCed_pers($r->ced_pers);
                $userVO->setNom_pers($r->nom_pers);
                $userVO->setApe_pers($r->ape_pers);
                $userVO->setId_rol($r->id_rol);
                $userVO->setNom_rol($r->nom_rol);
                $userVO->setNom_usua($r->nom_usua);
                $userVO->setPass_usua($r->pass_usua);
                $userVO->setFec_ing_usua($r->esp_rol);
            }
            else{
                $userV0 = null;
            }

            return $userVO;

            $stm = null;
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function update(userVO $userVO){
        $stm = null; 
        try 
        {
            $cod_usua = $userVO->getCod_usua();
            $ced_pers = $userVO->getCed_pers();
            $id_rol = $userVO->getId_rol();
            $nom_user = $userVO->getNom_usua();
            $pass_user = $userVO->getPass_usua();
            $fec_ing_user = $userVO->getFec_ing_usua();
            $query = "UPDATE usuario SET ced_pers = ?, id_rol = ?, nom_usua = ?, pass_usua = ?, fec_ing_usua = ? WHERE cod_usua= ?";
            $stm = $this->conn->db_open()->prepare($query);    
            $stm->bindParam(1, $ced_pers);   
            $stm->bindParam(2, $id_rol); 
            $stm->bindParam(3, $nom_user);
            $stm->bindParam(4, $pass_user);   
            $stm->bindParam(5, $fec_ing_user);     
            $stm->bindParam(6, $cod_usua);      
            $stm->execute();
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }

    }

    public function delete($cod_usua){
        $stm = null;
        try 
        {
            $cod = $cod_usua;
            $query = "DELETE FROM usuario WHERE cod_usua = ?";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindParam(1, $cod);                 
            $stm->execute();
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
        
    }


}
?>