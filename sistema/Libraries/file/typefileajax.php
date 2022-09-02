<?php
$namerute = $_SERVER['DOCUMENT_ROOT']."/sistema/Controllers/controllertypefile.php";
$namerute1 = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/typefileVO.php";
header('Content-type: application/json');
require_once($namerute);
require_once($namerute1);

    $getypefile = new controllertypefile();

    $arreglo = array();
    $datatable = array();

    $datatable = $getypefile->read();
    foreach($datatable as $r)
    {
        $elementos = array("cod_tip_carp"=>$r->getCod_tip_carp(),
                            "cod_arch"=>$r->getCod_arch(), 
                            "nom_num_arch"=>$r->getNom_arch()." ".$r->getNum_arch(), 
                            "nom_tip_carp"=>$r->getNom_tip_carp(), 
                            "orden_tip_carp"=>$r->getOrden_tip_carp(),
                            "desc_tip_carp"=>$r->getDesc_tip_carp()
                        );
        $arreglo[]=$elementos;
    }
    $datosretornar = array("data"=>$arreglo);
    echo json_encode($datosretornar);

    if(isset($_POST['accion']) && $_POST['accion'] == "create"){
        $cod_tip_carp= $_POST['codtipcarp'];
        $cod_arch = $_POST['codarch'];
        $nom_tip_carp = $_POST['nomtipcarp'];
        $des_tip_carp = $_POST['desctipcarp'];
        $typfileVO = new typefileVO();
        $typfileVO->setCod_tip_carp($cod_tip_carp);  
        $typfileVO->setCod_arch($cod_arch);
        $typfileVO->setNom_tip_carp($nom_tip_carp);  
        $typfileVO->setDesc_tip_carp($des_tip_carp);              
        $getypefile->create($typfileVO);
    }

    if(isset($_POST['accion']) && $_POST['accion'] == "update"){
        $cod_tip_carp= $_POST['codtipcarp'];
        $cod_arch = $_POST['codarch'];
        $nom_tip_carp = $_POST['nomtipcarp'];
        $des_tip_carp = $_POST['desctipcarp'];
        $typfileVO = new typefileVO();
        $typfileVO->setCod_tip_carp($cod_tip_carp);  
        $typfileVO->setCod_arch($cod_arch);
        $typfileVO->setNom_tip_carp($nom_tip_carp);  
        $typfileVO->setDesc_tip_carp($des_tip_carp);              
        $getypefile->update($typfileVO);
    }

    if(isset($_POST['accion']) && $_POST['accion'] == "delete"){
        $cod_tip_carp = $_POST['codtipcarp'];
        $getypefile->delete($cod_tip_carp);
    }

?>