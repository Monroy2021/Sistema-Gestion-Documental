<?php
$namerute = $_SERVER['DOCUMENT_ROOT']."/sistema/Controllers/controllersoporte.php";
$namerute1 = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/soporteVO.php";
header('Content-type: application/json');
require_once($namerute);
require_once($namerute1);

$getsoporte = new controllersoporte();

if(isset($_POST['accion']) && $_POST['accion'] == "deleteimage"){
    $cod_carp = $_POST['codcarp'];
    $cod_doc = $_POST['coddoc'];
    $id_sop = $_POST['idsop'];
    $nameruteraiz = $_SERVER['DOCUMENT_ROOT']."/sistema";//raiz

    $sopVO = new soporteVO();
    $sopVO = $getsoporte->readSopdocumentcarp($cod_carp, $cod_doc, $id_sop);

    
    $nom_sop = $sopVO->getNom_sop();
    $ext_sop = $sopVO->getExt_arch_sop();
    $urlrep = $sopVO->getRep_sop();
    $urlsop = $nameruteraiz."/".$urlrep."/".$nom_sop.".".$ext_sop;
    unlink($urlsop);
    $validardelete = $getsoporte->deleteSoportecarpdoc($cod_carp, $cod_doc, $id_sop);
    
    if($validardelete){
        
        $datasop = array();
        $datasop = $getsoporte->readCarpdocumentsop($cod_carp, $cod_doc);

        foreach($datasop as $indice=>$sop){

            $num_con = $sop->getOper_sop();
            $ext_sopr = $sop->getExt_arch_sop();
            $url_sopr = $sop->getRep_sop();
            $nom_sopr = $sop->getNom_sop();
           
            $urlsoporter = $nameruteraiz."/".$url_sopr."/".$nom_sopr.".".$ext_sopr; //rename par 1

            $newsoporter ="Foto_".$indice."_".$num_con;

            $newurlsoporte = $nameruteraiz."/".$url_sopr."/".$newsoporter.".".$ext_sopr; //rename par2

            $soprVO = new soporteVO();
            $soprVO->setId_sop($sop->getId_sop());
            $soprVO->setCod_docs($sopVO->getCod_docs());
            $soprVO->setNom_sop($newsoporter);
            $soprVO->setExt_arch_sop($ext_sopr);
            $soprVO->setRep_sop($url_sopr);
            $soprVO->setOrden_sop($indice);
            $getsoporte->update($soprVO);
            rename($urlsoporter, $newurlsoporte);
        }
    }
    echo json_encode($validardelete);
}



?>