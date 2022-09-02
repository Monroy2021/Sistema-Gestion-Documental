<?php
$namerute = $_SERVER['DOCUMENT_ROOT']."/sistema/Controllers/controllerarchive.php";
$namerute1 = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/archiveVO.php";
header('Content-type: application/json');
require_once($namerute);
require_once($namerute1);

    $getarchive = new controllerarchive();

    $arreglo = array();
    $datatable = array();

    $datatable = $getarchive->read();
    foreach($datatable as $r)
    {
        $elementos = array("cod_arch"=>$r->getCod_arch(), 
                            "nom_arch"=>$r->getNom_arch(), 
                            "num_arch"=>$r->getNum_arch(), 
                            "tip_arch"=>$r->getTip_arch(), 
                            "desc_arch"=>$r->getDesc_arch()
                        );
        $arreglo[]=$elementos;
    }
    $datosretornar = array("data"=>$arreglo);
    echo json_encode($datosretornar);

    if(isset($_POST['accion']) && $_POST['accion'] == "create"){
        $nom_arch= $_POST['nomarch'];
        $num_arch = $_POST['numarch'];
        $tip_arch = $_POST['tiparch'];
        $des_arch = $_POST['desarch'];
        $archVO = new archiveVO();
        $archVO->setNom_arch($nom_arch);  
        $archVO->setNum_arch($num_arch);
        $archVO->setTip_arch($tip_arch);  
        $archVO->setDesc_arch($des_arch);              
        $getarchive->create($archVO);
    }

    if(isset($_POST['accion']) && $_POST['accion'] == "update"){
        $cod_arch = $_POST['codarch'];
        $nom_arch= $_POST['nomarch'];
        $num_arch = $_POST['numarch'];
        $tip_arch = $_POST['tiparch'];
        $des_arch = $_POST['desarch'];
        $archVO = new archiveVO();
        $archVO->setCod_arch($cod_arch);
        $archVO->setNom_arch($nom_arch);  
        $archVO->setNum_arch($num_arch);
        $archVO->setTip_arch($tip_arch);  
        $archVO->setDesc_arch($des_arch);              
        $getarchive->update($archVO);
    }

    if(isset($_POST['accion']) && $_POST['accion'] == "delete"){
        $cod_arch = $_POST['codarch'];
        $getarchive->delete($cod_arch);
    }
?>