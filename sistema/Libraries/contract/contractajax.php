<?php
$namerutecatorce = $_SERVER['DOCUMENT_ROOT']."/sistema/Controllers/controllercontract.php";
$namerutequince = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/contractVO.php";
header('Content-type: application/json');
require_once($namerutecatorce);
require_once($namerutequince);

$getcontract = new controllercontract();


if(isset($_POST['accion']) && $_POST['accion'] == "search"){

    $cod_reg_oper = $_POST['codregopercon'];
    $arreglo = array();
    $datatable = array();

    $datatable = $getcontract->readPersoncontract($cod_reg_oper);
    
        foreach($datatable as $r)
        {
            $elementos = array("id_con"=>$r->getId_con(), 
                                "orden_tip_pers_con"=>$r->getOrden_tip_pers_con(),
                                "cod_reg_oper_con"=>$r->getCod_reg_oper_con(),
                                "id_tip_pers_con"=>$r->getId_tip_pers_con(),
                                "nom_tip_pers_con"=>$r->getNom_tip_pers_con(),
                                "ced_pers_con"=>$r->getCed_pers_con(),
                                "id_emp_con"=>$r->getId_emp_con(),  
                                "nom_pers_con"=>$r->getNom_pers_con(), 
                                "ape_pers_con"=>$r->getApe_pers_con(),
                                "nom_ape_pers_con"=>$r->getNom_pers_con()." ".$r->getApe_pers_con(),
                                "fec_exp_ced_pers_con"=>$r->getFec_exp_ced_pers_con(), 
                                "cel_pers_con"=>$r->getCel_pers_con(),
                                "tel_pers_con"=>$r->getTel_pers_con(),
                                "email_pers_con"=>$r->getEmail_pers_con(),
                                "sex_pers_con"=>$r->getSex_pers_con(),
                                "dir_pers_con"=>$r->getDir_pers_con(),
                                "ciud_pers_con"=>$r->getCiud_pers_con(),
                                "fec_act_pers_con"=>$r->getFec_act_pers_con()
                            );
            $arreglo[]=$elementos;
        }
        $datosretornar = array("data"=>$arreglo);
        echo json_encode($datosretornar);
}



?>