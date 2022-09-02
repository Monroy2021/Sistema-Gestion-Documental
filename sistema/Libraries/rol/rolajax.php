<?php
$namerute = $_SERVER['DOCUMENT_ROOT']."/sistema/Controllers/controllerrol.php";
$namerute1 = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/rolVO.php";
header('Content-type: application/json');
require_once($namerute);
require_once($namerute1);

    $getrol = new controllerrol();

    $arreglo = array();
    $datatable = array();

    $datatable = $getrol->read();
    foreach($datatable as $r)
    {
        $elementos = array("id_rol"=>$r->getId_rol(), 
                            "nom_rol"=>$r->getNom_rol(), 
                            "esp_rol"=>$r->getEsp_rol()
                        );
        $arreglo[]=$elementos;
    }
    $datosretornar = array("data"=>$arreglo);
    echo json_encode($datosretornar);

    if(isset($_POST['accion']) && $_POST['accion'] == "create"){
        $nomrol = $_POST['nomrol'];
        $esprol = $_POST['esprol'];
        $rolVO = new rolVO();
        $rolVO->setNom_rol($nomrol);
        $rolVO->setEsp_rol($esprol);             
        $getrol->create($rolVO);
    }

    if(isset($_POST['accion']) && $_POST['accion'] == "update"){
        $idrol = $_POST['idrol'];
        $nomrol = $_POST['nomrol'];
        $esprol = $_POST['esprol'];
        $rolVO = new rolVO();
        $rolVO->setId_rol($idrol);
        $rolVO->setNom_rol($nomrol);
        $rolVO->setEsp_rol($esprol);   
        $getrol->update($rolVO);
    }

    if(isset($_POST['accion']) && $_POST['accion'] == "delete"){
        $idrol = $_POST['idrol'];
        $getrol->delete($idrol);
    }
?>