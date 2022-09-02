<?php
$namerutevo = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/documentVO.php";
$connectionrute = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/Connection/connection.php";

require_once($namerutevo);
require_once($connectionrute);

class documentDAO{

    private $conn;
    public $stm;

    public function __construct(){
        $this->conn = new connection();
    }

    public function create(documentVO $docVO){ 
        $stm = null;   
        try 
        {
            if($docVO != null){
                $cod_carp = $docVO->getCod_carp(); 
                $id_subse =  $docVO->getId_subse();
                $nom_doc = $docVO->getNom_doc();
                $desc_doc =  $docVO->getDesc_doc();
                $tip_arch_doc = $docVO->getTip_arch_doc();
                $orden_doc =  $docVO->getOrden_doc();  
                $cod_doc_prop = $docVO->getCod_doc_prop();
                $query = "INSERT INTO documentos (cod_carp, id_subse, nom_doc, desc_doc, tip_arch_doc, orden_doc, cod_doc_prop) VALUES (?,?,?,?,?,?,?)";
                $stm = $this->conn->db_open()->prepare($query);  
                $stm->bindParam(1, $cod_carp);    
                $stm->bindParam(2, $id_subse); 
                $stm->bindParam(3, $nom_doc); 
                $stm->bindParam(4, $desc_doc); 
                $stm->bindParam(5, $tip_arch_doc);
                $stm->bindParam(6, $orden_doc);
                $stm->bindParam(7, $cod_doc_prop);  
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
            $query = "SELECT d.cod_doc, c.cod_carp, c.des_carp, sb.id_subse, sb.nom_subse, d.nom_doc, d.desc_doc, d.tip_arch_doc, d.cod_doc_prop 
            FROM documentos d
            INNER JOIN carpeta c ON d.cod_carp = c.cod_carp
            INNER JOIN subserie sb ON d.id_subse = sb.id_subse";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->execute();
            $listaVO = $stm->fetchAll(PDO::FETCH_OBJ);

            foreach($listaVO as $r)
            {
                $docVO = new documentVO();
                $docVO->setCod_doc($r->cod_doc);
                $docVO->setCod_carp($r->cod_carp);
                $docVO->setNom_carp($r->des_carp); 
                $docVO->setId_subse($r->id_subse);
                $docVO->setNom_subse($r->nom_subse);
                $docVO->setNom_doc($r->nom_doc);
                $docVO->setDesc_doc($r->desc_doc);
                $docVO->setTip_arch_doc($r->tip_arch_doc); 
                $docVO->setCod_doc_prop($r->cod_doc_prop);
                $result[] = $docVO;
            }
            return $result;

            $stm = null;
        }catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function readDoc($cod_doc){
        $stm = null; 
        try 
        {
            $query = "SELECT d.cod_doc, c.cod_carp, c.des_carp, sb.id_subse, sb.nom_subse, d.nom_doc, d.desc_doc, d.tip_arch_doc, d.cod_doc_prop 
            FROM documentos d
            INNER JOIN carpeta c ON d.cod_carp = c.cod_carp
            INNER JOIN subserie sb ON d.id_subse = sb.id_subse
            WHERE d.cod_doc = ?";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindValue(1, $cod_doc);
            $stm->execute();
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $docVO = new documentVO();

            if($stm->rowCount()!=0){
                $docVO->setCod_doc($r->cod_doc);
                $docVO->setCod_carp($r->cod_carp);
                $docVO->setNom_carp($r->des_carp); 
                $docVO->setId_subse($r->id_subse);
                $docVO->setNom_subse($r->nom_subse);
                $docVO->setNom_doc($r->nom_doc);
                $docVO->setDesc_doc($r->desc_doc);
                $docVO->setTip_arch_doc($r->tip_arch_doc); 
                $docVO->setCod_doc_prop($r->cod_doc_prop);
            }
            else{
                $docVO = null;
            }

            return $docVO;

            $stm = null;
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }


    public function countSopdocumentcarp($cod_carp, $cod_doc){
        $stm = null; 
        try 
        {
            $query = "SELECT DISTINCT COUNT(sop.id_sop)
            FROM soportes sop
            INNER JOIN documentos doc ON sop.cod_docs = doc.cod_doc
            INNER JOIN carpeta c ON doc.cod_carp = c.cod_carp
            WHERE c.cod_carp = ? AND doc.cod_doc = ?";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindValue(1, $cod_carp);
            $stm->bindValue(2, $cod_doc);
            $stm->execute();
            $result_rows = $stm->fetchColumn(); 

            if($result_rows > 0){
                return $result_rows;
            }
            else{
                return $result_rows = 0;
            }
            
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }


    public function readDocumentfile($cod_carp, $subserie_doc, $nom_doc){
        $stm = null; 
        try 
        {
            $query = "SELECT d.cod_doc, c.cod_carp, c.des_carp, sb.id_subse, sb.nom_subse, d.nom_doc, d.desc_doc, d.tip_arch_doc, d.cod_doc_prop 
            FROM documentos d
            INNER JOIN carpeta c ON d.cod_carp = c.cod_carp
            INNER JOIN operacion op ON c.cod_reg_oper = op.cod_reg_oper
            INNER JOIN subserie sb ON d.id_subse = sb.id_subse
            WHERE d.cod_carp = ? AND d.id_subse = ? AND d.nom_doc = ?";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindValue(1, $cod_carp);
            $stm->bindValue(2, $subserie_doc);
            $stm->bindValue(3, $nom_doc);
            $stm->execute();
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $docVO = new documentVO();

            if($stm->rowCount()!=0){
                $docVO->setCod_doc($r->cod_doc);
                $docVO->setCod_carp($r->cod_carp);
                $docVO->setNom_carp($r->des_carp); 
                $docVO->setId_subse($r->id_subse);
                $docVO->setNom_subse($r->nom_subse);
                $docVO->setNom_doc($r->nom_doc);
                $docVO->setDesc_doc($r->desc_doc);
                $docVO->setTip_arch_doc($r->tip_arch_doc); 
                $docVO->setCod_doc_prop($r->cod_doc_prop);
            }
            else{
                $docVO = null;
            }

            return $docVO;

            $stm = null;
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function readDocumentfileordendoc($cod_carp, $subserie_doc, $orden_doc){
        $stm = null; 
        try 
        {
            $query = "SELECT d.cod_doc, c.cod_carp, c.des_carp, sb.id_subse, sb.nom_subse, d.nom_doc, d.desc_doc, d.tip_arch_doc, d.cod_doc_prop 
            FROM documentos d
            INNER JOIN carpeta c ON d.cod_carp = c.cod_carp
            INNER JOIN operacion op ON c.cod_reg_oper = op.cod_reg_oper
            INNER JOIN subserie sb ON d.id_subse = sb.id_subse
            WHERE d.cod_carp = ? AND d.id_subse = ? AND d.orden_doc = ?";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindValue(1, $cod_carp);
            $stm->bindValue(2, $subserie_doc);
            $stm->bindValue(3, $orden_doc);
            $stm->execute();
            $r = $stm->fetch(PDO::FETCH_OBJ);
            $docVO = new documentVO();

            if($stm->rowCount()!=0){
                $docVO->setCod_doc($r->cod_doc);
                $docVO->setCod_carp($r->cod_carp);
                $docVO->setNom_carp($r->des_carp); 
                $docVO->setId_subse($r->id_subse);
                $docVO->setNom_subse($r->nom_subse);
                $docVO->setNom_doc($r->nom_doc);
                $docVO->setDesc_doc($r->desc_doc);
                $docVO->setTip_arch_doc($r->tip_arch_doc); 
                $docVO->setCod_doc_prop($r->cod_doc_prop);
            }
            else{
                $docVO = null;
            }

            return $docVO;

            $stm = null;
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function readDocumentscodregoper($cod_reg_oper){
    
    }

    public function readDocumentscarp($cod_carp){
        $stm = null; 
        try 
        {
            $result = array();
            $query = "SELECT doc.cod_doc, doc.cod_carp, doc.id_subse, 
            subse.nom_subse, subse.orden_subse, 
            doc.nom_doc, doc.orden_doc, 
            sop.id_sop, sop.rep_sop, sop.nom_sop, sop.orden_sop, sop.ext_arch_sop
            FROM documentos doc
            INNER JOIN soportes sop ON doc.cod_doc = sop.cod_docs
            INNER JOIN carpeta c ON doc.cod_carp = c.cod_carp
            INNER JOIN subserie subse ON doc.id_subse = subse.id_subse
            WHERE c.cod_carp= ?
            ORDER BY subse.orden_subse, doc.orden_doc, sop.orden_sop ASC";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindValue(1, $cod_carp);
            $stm->execute();
            $listaVO = $stm->fetchAll(PDO::FETCH_OBJ);

            foreach($listaVO as $r)
            {
                $docVO = new documentVO();
                $docVO->setCod_doc($r->cod_doc);
                $docVO->setCod_carp($r->cod_carp);
                $docVO->setId_subse($r->id_subse);
                $docVO->setNom_subse($r->nom_subse);
                $docVO->setOrden_subse($r->orden_subse);
                $docVO->setNom_doc($r->nom_doc);
                $docVO->setOrden_doc($r->orden_doc);
                $docVO->setId_sop($r->id_sop);
                $docVO->setOrden_sop($r->orden_sop);
                $docVO->setRep_sop($r->rep_sop);
                $docVO->setNom_sop($r->nom_sop);
                $docVO->setExt_arch_sop($r->ext_arch_sop);
                $result[] = $docVO;
            }
        
            return $result;

            $stm = null;
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function readDocumentsubse($cod_reg_oper, $id_subse){
        $stm = null; 
        try 
        {
            $result = array();
            $query = "SELECT doc.cod_doc, doc.cod_carp, doc.id_subse, subse.nom_subse, doc.nom_doc, doc.tip_arch_doc, sop.nom_sop, sop.rep_sop, sop.ext_arch_sop
            FROM documentos doc
            INNER JOIN soportes sop ON doc.cod_doc = sop.cod_docs
            INNER JOIN subserie subse ON doc.id_subse = subse.id_subse
            INNER JOIN carpeta c ON doc.cod_carp = c.cod_carp
            INNER JOIN operacion op ON c.cod_reg_oper = op.cod_reg_oper
            WHERE op.cod_reg_oper = ? AND subse.id_subse = ?
            ORDER BY doc.cod_doc";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindValue(1, $cod_reg_oper);
            $stm->bindValue(2, $id_subse);
            $stm->execute();
            $listaVO = $stm->fetchAll(PDO::FETCH_OBJ);

            foreach($listaVO as $r)
            {
                $docVO = new documentVO();
                $docVO->setCod_doc($r->cod_doc);
                $docVO->setCod_carp($r->cod_carp);
                $docVO->setId_subse($r->id_subse);
                $docVO->setNom_subse($r->nom_subse);
                $docVO->setNom_doc($r->nom_doc);
                $docVO->setTip_arch_doc($r->tip_arch_doc);
                $docVO->setNom_sop($r->nom_sop);  
                $docVO->setRep_sop($r->rep_sop);
                $docVO->setExt_arch_sop($r->ext_arch_sop);
                $result[] = $docVO;
            }
        
            return $result;

            $stm = null;
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function readSubserie($cod_reg_oper){
        $stm = null; 
        try 
        {
            $result = array();
            $query = "SELECT  subse.id_subse, subse.nom_subse
            FROM subserie subse
            INNER JOIN documentos doc ON doc.id_subse = subse.id_subse
            INNER JOIN soportes sop ON doc.cod_doc = sop.cod_docs
            INNER JOIN carpeta c ON doc.cod_carp = c.cod_carp
            INNER JOIN operacion op ON c.cod_reg_oper = op.cod_reg_oper
            WHERE op.cod_reg_oper = ?
            GROUP BY subse.id_subse, subse.nom_subse";
            $stm = $this->conn->db_open()->prepare($query);
            $stm->bindValue(1, $cod_reg_oper);
            $stm->execute();
            $listaVO = $stm->fetchAll(PDO::FETCH_OBJ);

            foreach($listaVO as $r)
            {
                $docVO = new documentVO();
                $docVO->setId_subse($r->id_subse);
                $docVO->setNom_subse($r->nom_subse);
                $result[] = $docVO;
            }
        
            return $result;

            $stm = null;
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }
    }

    public function update(documentVO $docVO){
        $stm = null; 
        try 
        {
            $cod_doc =  $docVO->getCod_doc();
            $cod_carp = $docVO->getCod_carp(); 
            $id_subse =  $docVO->getId_subse();
            $nom_doc = $docVO->getNom_doc();
            $desc_doc =  $docVO->getDesc_doc();
            $tip_arch_doc = $docVO->getTip_arch_doc();  
            $cod_doc_prop = $docVO->getCod_doc_prop();
            $query = "UPDATE documentos SET cod_carp=?, id_subse=?, nom_doc=?,desc_doc=?, tip_arch_doc=?, cod_doc_prop=? WHERE cod_doc=?";
            $stm = $this->conn->db_open()->prepare($query);    
            $stm->bindParam(1, $cod_carp);    
            $stm->bindParam(2, $id_subse); 
            $stm->bindParam(3, $nom_doc); 
            $stm->bindParam(4, $desc_doc); 
            $stm->bindParam(5, $tip_arch_doc);
            $stm->bindParam(6, $cod_doc_prop);
            $stm->bindParam(7, $cod_doc);   
            $stm->execute();        
        } catch (Exception $e) 
        {
            print_r($e->getMessage());
        }

    }

    public function delete($cod_doc){
        $stm = null;
        try 
        {
            $id = $cod_doc;
            $query = "DELETE FROM documentos WHERE cod_doc = ?";
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