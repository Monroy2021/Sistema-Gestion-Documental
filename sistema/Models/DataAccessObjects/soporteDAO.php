<?php
$namerutevo = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/soporteVO.php";
$connectionrute = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/Connection/connection.php";

require_once($namerutevo);
require_once($connectionrute);

class soporteDAO{

    private $conn;
    public $stm;

    public function __construct(){
        $this->conn = new connection();
    }

    public function create(soporteVO $sopVO){ 
        $stm = null;   
        try 
        {
            if($sopVO != null){
                $cod_doc =          $sopVO->getCod_docs();
                $nom_sop =          $sopVO->getNom_sop(); 
                $ext_arch_sop =     $sopVO->getExt_arch_sop(); 
                $orden_sop =        $sopVO->getOrden_sop(); 
                $rep_sop =          $sopVO->getRep_sop();
                $query = "INSERT INTO soportes(cod_docs, nom_sop, ext_arch_sop, orden_sop, rep_sop) VALUES (?,?,?,?,?)";
                $stm = $this->conn->db_open()->prepare($query);  
                $stm->bindParam(1, $cod_doc);   
                $stm->bindParam(2, $nom_sop);   
                $stm->bindParam(3, $ext_arch_sop);  
                $stm->bindParam(4, $orden_sop);
                $stm->bindParam(5, $rep_sop);  
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
            $query = "SELECT sp.id_sop, sp.cod_docs, d.nom_doc, sp.nom_sop, sp.ext_arch_sop, sp.rep_sop 
            FROM soportes sp 
            INNER JOIN documentos d ON sp.cod_docs = d.cod_doc";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->execute();
            $listaVO = $stm->fetchAll(PDO::FETCH_OBJ);

            foreach($listaVO as $r)
            {
                $sopVO = new soporteVO();
                $sopVO->setId_sop($r->id_sop);
                $sopVO->setCod_docs($r->cod_docs);
                $sopVO->setNom_docs($r->nom_doc); 
                $sopVO->setNom_sop($r->nom_sop);
                $sopVO->setExt_arch_sop($r->ext_arch_sop);
                $sopVO->setRep_sop($r->rep_sop);
                $result[] = $sopVO;
            }
            return $result;
            $stm = null;
        }catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function readSoporteDocument($cod_carp, $id_subse, $cod_doc){
        $stm = null; 
        try 
        {
            $result = array();
            $query = "SELECT sp.id_sop, sp.cod_docs, d.nom_doc, sp.nom_sop, sp.orden_sop, sp.ext_arch_sop, sp.rep_sop 
            FROM soportes sp 
            INNER JOIN documentos d ON sp.cod_docs = d.cod_doc
            INNER JOIN carpeta c ON d.cod_carp = c.cod_carp
            INNER JOIN subserie sb ON d.id_subse = sb.id_subse
            WHERE d.cod_carp = ? AND d.id_subse = ? AND d.cod_doc = ?";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindValue(1, $cod_carp);
            $stm->bindValue(2, $id_subse);
            $stm->bindValue(3, $cod_doc);
            $stm->execute();
            $listaVO = $stm->fetchAll(PDO::FETCH_OBJ);

            foreach($listaVO as $r)
            {
                $sopVO = new soporteVO();
                $sopVO->setId_sop($r->id_sop);
                $sopVO->setCod_docs($r->cod_docs);
                $sopVO->setNom_docs($r->nom_doc); 
                $sopVO->setNom_sop($r->nom_sop);
                $sopVO->setOrden_sop($r->orden_sop);
                $sopVO->setExt_arch_sop($r->ext_arch_sop);
                $sopVO->setRep_sop($r->rep_sop);
                $result[] = $sopVO;
            }
            return $result;
            $stm = null;
        }catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function readSopdocumentcarp($cod_carp, $cod_doc, $id_sop){
        $stm = null; 
        try 
        {
            $result = array();
            $query = "SELECT sp.id_sop, 
            sp.cod_docs, d.nom_doc, sp.nom_sop, sp.orden_sop, sp.ext_arch_sop, sp.rep_sop 
            FROM soportes sp 
            INNER JOIN documentos d ON sp.cod_docs = d.cod_doc
            INNER JOIN carpeta c ON d.cod_carp = c.cod_carp
            WHERE c.cod_carp = ? AND d.cod_doc = ? AND sp.id_sop = ?";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindValue(1, $cod_carp);
            $stm->bindValue(2, $cod_doc);
            $stm->bindValue(3, $id_sop);
            $stm->execute();

            $r = $stm->fetch(PDO::FETCH_OBJ);
            $sopVO = new soporteVO();

            if($stm->rowCount()!=0){
                $sopVO->setId_sop($r->id_sop);
                $sopVO->setCod_docs($r->cod_docs);
                $sopVO->setNom_docs($r->nom_doc); 
                $sopVO->setNom_sop($r->nom_sop);
                $sopVO->setOrden_sop($r->orden_sop);
                $sopVO->setExt_arch_sop($r->ext_arch_sop);
                $sopVO->setRep_sop($r->rep_sop);
            }
            else{
                $sopVO = null;
            }

            return $sopVO;
            $stm = null;
        }catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function readCarpdocumentsop($cod_carp, $cod_doc){
        $stm = null; 
        try 
        {
            $result = array();
            $query = "SELECT o.cod_reg_oper, 
            sp.id_sop, 
            sp.cod_docs, d.nom_doc, sp.nom_sop, sp.orden_sop, sp.ext_arch_sop, sp.rep_sop 
            FROM soportes sp 
            INNER JOIN documentos d ON sp.cod_docs = d.cod_doc
            INNER JOIN carpeta c ON d.cod_carp = c.cod_carp
            INNER JOIN operacion o ON c.cod_reg_oper = o.cod_reg_oper
            WHERE c.cod_carp = ? AND d.cod_doc = ?";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindValue(1, $cod_carp);
            $stm->bindValue(2, $cod_doc);
            $stm->execute();

            $listaVO = $stm->fetchAll(PDO::FETCH_OBJ);

            foreach($listaVO as $r)
            {
                $sopVO = new soporteVO();
                $sopVO->setOper_sop($r->cod_reg_oper);
                $sopVO->setId_sop($r->id_sop);
                $sopVO->setCod_docs($r->cod_docs);
                $sopVO->setNom_docs($r->nom_doc); 
                $sopVO->setNom_sop($r->nom_sop);
                $sopVO->setOrden_sop($r->orden_sop);
                $sopVO->setExt_arch_sop($r->ext_arch_sop);
                $sopVO->setRep_sop($r->rep_sop);
                $result[] = $sopVO;
            }
            return $result;
           

            $stm = null;
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function readSop($id_sop){
        $stm = null; 
        try 
        {
            $query = "SELECT sp.id_sop, sp.cod_docs, d.nom_doc, sp.nom_sop, sp.ext_arch_sop, sp.rep_sop 
            FROM soportes sp 
            INNER JOIN documentos d ON sp.cod_docs = d.cod_doc
            WHERE sp.id_sop = ?";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindValue(1, $id_sop);
            $stm->execute();
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $sopVO = new soporteVO();

            if($stm->rowCount()!=0){
                $sopVO->setId_sop($r->id_sop);
                $sopVO->setCod_docs($r->cod_docs);
                $sopVO->setNom_docs($r->nom_doc); 
                $sopVO->setNom_sop($r->nom_sop);
                $sopVO->setExt_arch_sop($r->ext_arch_sop);
                $sopVO->setRep_sop($r->rep_sop);
            }
            else{
                $sopVO = null;
            }

            return $sopVO;

            $stm = null;
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function update(soporteVO $sopVO){
        $stm = null; 
        try 
        {
            $id_sop = $sopVO->getId_sop();
            $cod_doc = $sopVO->getCod_docs();
            $nom_sop = $sopVO->getNom_sop(); 
            $ext_arch_sop = $sopVO->getExt_arch_sop(); 
            $orden_sop = $sopVO->getOrden_sop();
            $rep_sop = $sopVO->getRep_sop();
            $query = "UPDATE soportes SET cod_docs=?, nom_sop=?, ext_arch_sop=?, orden_sop=?, rep_sop=? WHERE id_sop=?";
            $stm = $this->conn->db_open()->prepare($query);  
            $stm->bindParam(1, $cod_doc);   
            $stm->bindParam(2, $nom_sop);   
            $stm->bindParam(3, $ext_arch_sop);
            $stm->bindParam(4, $orden_sop);  
            $stm->bindParam(5, $rep_sop);
            $stm->bindParam(6, $id_sop);  
            $stm->execute();
            
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }

    }

    public function delete($id_sop){
        $stm = null;
        try 
        {
            $id = $id_sop;
            $query = "DELETE FROM soportes WHERE id_sop = ?";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindParam(1, $id);                 
            $stm->execute();
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
        
    }


    public function deleteSoportecarpdoc($cod_carp, $cod_doc, $id_sop){
        $stm = null;
        try 
        {
            $codcarp = $cod_carp;
            $coddoc = $cod_doc;
            $idsop = $id_sop;
            $query = "DELETE s FROM soportes s
            INNER JOIN documentos d ON s.cod_docs = d.cod_doc
            INNER JOIN carpeta c ON d.cod_carp = c.cod_carp
            WHERE c.cod_carp=? AND d.cod_doc = ? AND s.id_sop = ?";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindParam(1, $codcarp);  
            $stm->bindParam(2, $coddoc);  
            $stm->bindParam(3, $idsop);             
            $stm->execute();
            return true;
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
        
    }

}

?>