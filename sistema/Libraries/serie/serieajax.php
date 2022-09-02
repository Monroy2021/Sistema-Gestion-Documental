<?php
$namerute = $_SERVER['DOCUMENT_ROOT']."/sistema/Controllers/controllerserie.php";
$namerute1 = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/serieVO.php";
header('Content-type: application/json');
require_once($namerute);
require_once($namerute1);

    $getserie = new controllerserie();

    $arreglo = array();
    $datatable = array();

    $datatable = $getserie->read();
    foreach($datatable as $r)
    {
        $elementos = array("id_serie"=>$r->getId_serie(),
                            "nom_serie"=>$r->getNom_serie(),
                            "desc_serie"=>$r->getDesc_serie()
                        );
        $arreglo[]=$elementos;
    }
    $datosretornar = array("data"=>$arreglo);
    echo json_encode($datosretornar);

    if(isset($_POST['accion']) && $_POST['accion'] == "create"){
        $id_serie= $_POST['idserie'];
        $nom_serie= $_POST['nomserie'];
        $desc_serie = $_POST['descserie'];
        $serieVO = new serieVO();
        $serieVO->setId_serie($id_serie);
        $serieVO->setNom_serie($nom_serie);    
        $serieVO->setDesc_serie($desc_serie);          
        $getserie->create($serieVO);
    }

    if(isset($_POST['accion']) && $_POST['accion'] == "update"){
        $id_serie= $_POST['idserie'];
        $nom_serie= $_POST['nomserie'];
        $desc_serie = $_POST['descserie'];
        $serieVO = new serieVO();
        $serieVO->setId_serie($id_serie);
        $serieVO->setNom_serie($nom_serie);    
        $serieVO->setDesc_serie($desc_serie);          
        $getserie->update($serieVO);
    }

    if(isset($_POST['accion']) && $_POST['accion'] == "delete"){
        $id_serie = $_POST['idserie'];
        $getserie->delete($id_serie);
    }
?>