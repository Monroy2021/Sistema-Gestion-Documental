<?php
$namerute = $_SERVER['DOCUMENT_ROOT']."/sistema/Controllers/controllersubserie.php";
$namerute1 = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/subserieVO.php";
header('Content-type: application/json');
require_once($namerute);
require_once($namerute1);

    $getsubserie = new controllersubserie();

    $arreglo = array();
    $datatable = array();

    $datatable = $getsubserie->read();
    foreach($datatable as $r)
    {
        $elementos = array("id_subse"=>$r->getId_subse(),
                            "id_serie"=>$r->getId_serie(),
                            "nom_serie"=>$r->getNom_serie(),
                            "nom_subse"=>$r->getNom_subse(),
                            "orden_subse"=>$r->getOrden_subse(),
                            "desc_subse"=>$r->getDesc_subse()
                        );
        $arreglo[]=$elementos;
    }
    $datosretornar = array("data"=>$arreglo);
    echo json_encode($datosretornar);

    if(isset($_POST['accion']) && $_POST['accion'] == "create"){
        $id_subse= $_POST['idsubse'];
        $id_serie= $_POST['idserie'];
        $nom_subse= $_POST['nomsubse'];
        $desc_subse = $_POST['descsubse'];
        $subseVO = new subserieVO();
        $subseVO->setId_subse($id_subse);
        $subseVO->setId_serie($id_serie);
        $subseVO->setNom_subse($nom_subse);    
        $subseVO->setDesc_subse($desc_subse);          
        $getsubserie->create($subseVO);
    }

    if(isset($_POST['accion']) && $_POST['accion'] == "update"){
        $id_subse= $_POST['idsubse'];
        $id_serie= $_POST['idserie'];
        $nom_subse= $_POST['nomsubse'];
        $desc_subse = $_POST['descsubse'];
        $subseVO = new subserieVO();
        $subseVO->setId_subse($id_subse);
        $subseVO->setId_serie($id_serie);
        $subseVO->setNom_subse($nom_subse);    
        $subseVO->setDesc_subse($desc_subse);          
        $getsubserie->update($subseVO);
    }

    if(isset($_POST['accion']) && $_POST['accion'] == "delete"){
        $id_subse = $_POST['idsubse'];
        $getsubserie->delete($id_subse);
    }
?>