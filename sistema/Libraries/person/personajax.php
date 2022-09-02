<?php
$namerute = $_SERVER['DOCUMENT_ROOT']."/sistema/Controllers/controllerperson.php";
$namerute1 = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/personVO.php";
header('Content-type: application/json');
require_once($namerute);
require_once($namerute1);

    $getperson = new controllerperson();

    $arreglo = array();
    $datatable = array();

    $datatable = $getperson->read();
    foreach($datatable as $r)
    {
        $elementos = array("ced_pers"=>$r->getCed_pers(), 
                            "id_emp"=>$r->getId_emp(), 
                            "nom_emp"=>$r->getNom_emp(), 
                            "nom_pers"=>$r->getNom_pers(), 
                            "ape_pers"=>$r->getApe_pers(), 
                            "fec_exp_ced_pers"=>$r->getFec_exp_ced_pers(), 
                            "cel_pers"=>$r->getCel_pers(), 
                            "tel_pers"=>$r->getTel_pers(), 
                            "email_pers"=>$r->getEmail_pers(), 
                            "sex_pers"=>$r->getSex_pers(), 
                            "dir_pers"=>$r->getDir_pers(), 
                            "ciud_pers"=>$r->getCiud_pers()
                        );
        $arreglo[]=$elementos;
    }
    $datosretornar = array("data"=>$arreglo);
    echo json_encode($datosretornar);

    if(isset($_POST['accion']) && $_POST['accion'] == "create"){
        $cedpers = $_POST['cedperson'];
        $idemp = $_POST['idcompany'];
        $nompers = $_POST['nomperson'];
        $apepers = $_POST['apeperson'];
        $fecexpcedpers = $_POST['fecexpcedcedperson'];
        $celupers = $_POST['celuperson'];
        $telpers = $_POST['telperson'];
        $emailpers = $_POST['emailperson'];
        $sexpers = $_POST['sexperson'];
        $dirpers = $_POST['dirperson'];
        $ciudpers = $_POST['ciudperson'];
        $fecregpers = date("Y-m-d");
        $fecactpers = date("Y-m-d");
        $personVO = new personVO();
        $personVO->setCed_pers($cedpers);
        $personVO->setId_emp($idemp);
        $personVO->setNom_pers($nompers);
        $personVO->setApe_pers($apepers);
        $personVO->setFec_exp_ced_pers($fecexpcedpers);
        $personVO->setCel_pers($celpers);
        $personVO->setTel_pers($telpers);
        $personVO->setEmail_pers($emailpers);
        $personVO->setSex_pers($sexpers);
        $personVO->setDir_pers($dirpers);
        $personVO->setCiud_pers($ciudpers);
        $personVO->setFec_reg_pers($fecregpers);
        $personVO->setFec_act_pers($fecactpers);               
        $getperson->create($personVO);
    }

    if(isset($_POST['accion']) && $_POST['accion'] == "update"){
        $cedpers = $_POST['cedperson'];
        $idemp = $_POST['idcompany'];
        $nompers = $_POST['nomperson'];
        $apepers = $_POST['apeperson'];
        $fecexpcedpers = $_POST['fecexpcedcedperson'];
        $celupers = $_POST['celuperson'];
        $telpers = $_POST['telperson'];
        $emailpers = $_POST['emailperson'];
        $sexpers = $_POST['sexperson'];
        $dirpers = $_POST['dirperson'];
        $ciudpers = $_POST['ciudperson'];
        $fecactpers = date("Y-m-d");;
        $personVO = new personVO();
        $personVO->setCed_pers($cedpers);
        $personVO->setId_emp($idemp);
        $personVO->setNom_pers($nompers);
        $personVO->setApe_pers($apepers);
        $personVO->setFec_exp_ced_pers($fecexpcedpers);
        $personVO->setCel_pers($telpers);
        $personVO->setTel_pers($telpers);
        $personVO->setEmail_pers($emailpers);
        $personVO->setSex_pers($sexpers);
        $personVO->setDir_pers($dirpers);
        $personVO->setCiud_pers($ciudpers);
        $personVO->setFec_act_pers($fecactpers);          
        $getperson->update($personVO);
    }

    if(isset($_POST['accion']) && $_POST['accion'] == "delete"){
        $cedpers = $_POST['cedperson'];
        $getperson->delete($cedpers);
    }

?>