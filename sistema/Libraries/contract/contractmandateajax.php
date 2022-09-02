<?php
header('Content-type: application/json');
$namerute = $_SERVER['DOCUMENT_ROOT']."/sistema/Controllers/controllerproperty.php";
$nameruteuno = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/propertyVO.php";
$namerutedos = $_SERVER['DOCUMENT_ROOT']."/sistema/Controllers/controlleroperation.php";
$namerutetres = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/operationVO.php";
$namerutecuatro = $_SERVER['DOCUMENT_ROOT']."/sistema/Controllers/controllerfile.php";
$namerutecinco = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/fileVO.php";
$nameruteseis = $_SERVER['DOCUMENT_ROOT']."/sistema/Controllers/controllerdocument.php";
$namerutesiete = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/documentVO.php";
$nameruteocho = $_SERVER['DOCUMENT_ROOT']."/sistema/Controllers/controllersoporte.php";
$namerutenueve = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/soporteVO.php";
$namerutediez = $_SERVER['DOCUMENT_ROOT']."/sistema/Controllers/controllerperson.php";
$nameruteonce = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/personVO.php";
$namerutedoce = $_SERVER['DOCUMENT_ROOT']."/sistema/Controllers/controllercontractmandate.php";
$namerutetrece = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/contractmandateVO.php";
$namerutecatorce = $_SERVER['DOCUMENT_ROOT']."/sistema/Controllers/controllercontract.php";
$namerutequince = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/contractVO.php";

require_once($namerute);
require_once($nameruteuno);
require_once($namerutedos);
require_once($namerutetres);
require_once($namerutecuatro);
require_once($namerutecinco);
require_once($nameruteseis);
require_once($namerutesiete);
require_once($nameruteocho);
require_once($namerutenueve);
require_once($namerutediez);
require_once($nameruteonce);
require_once($namerutedoce);
require_once($namerutetrece);
require_once($namerutecatorce);
require_once($namerutequince);

$getperson = new controllerperson();
$getproperty = new controllerproperty();
$getoperation = new controlleroperation();
$getfolder = new controllerfile();
$getdocument = new controllerdocument();
$getsoporte = new controllersoporte();
$getcontract = new controllercontract();
$getcontractmandate = new controllercontractmandate();


    if(isset($_POST['accion']) && $_POST['accion'] == "search"){
        $arreglo = array();
        $datatable = array();

        $datatable = $getcontractmandate->readContractmandate();
    
        foreach($datatable as $r)
        {
            $elementos = array("id_prop"=>$r->getId_prop_cm(), 
                                "id_tip_prop"=>$r->getId_tip_prop_cm(),
                                "nom_tip_prop"=>$r->getNom_tip_prop_cm(),
                                "dir_prop"=>$r->getDir_prop_cm(),
                                "ubi_prop"=>$r->getUbi_prop_cm(),
                                "desc_prop"=>$r->getDesc_prop_cm(),
                                "cod_reg_oper"=>$r->getCod_reg_oper_cm(),
                                "estado_oper"=>$r->getEstado_oper_cm(),
                                "ced_pers"=>$r->getCed_pers_cm(),  
                                "nom_pers"=>$r->getNom_pers_cm(), 
                                "ape_pers"=>$r->getApe_pers_cm(),
                                "nom_ape_pers"=>$r->getNom_pers_cm()."".$r->getApe_pers_cm(),
                                "fec_exp_ced_pers"=>$r->getFec_exp_ced_pers_cm(), 
                                "cel_pers"=>$r->getCel_pers_cm(),
                                "tel_pers"=>$r->getTel_pers_cm(),
                                "email_pers"=>$r->getEmail_pers_cm(),
                                "sex_pers"=>$r->getSex_pers_cm(),
                                "dir_pers"=>$r->getDir_pers_cm(),
                                "ciud_pers"=>$r->getCiud_pers_cm(),
                                "id_tip_oper"=>$r->getId_tip_oper_cm(),
                                "nom_tip_oper"=>$r->getNom_tip_oper_cm(),
                                "cod_arch"=>$r->getCod_arch_cm(), 
                                "nom_num_arch"=>$r->getNom_arch_cm()."".$r->getNum_arch_cm(), 
                                "id_tip_pers"=>$r->getId_tip_pers_cm(),
                                "nom_tip_pers"=>$r->getNom_tip_pers_cm(),
                                "cod_tip_carp"=>$r->getCod_tip_carp_cm(),
                                "nom_tip_carp"=>$r->getNom_tip_carp_cm(), 
                                "cod_carp"=>$r->getCod_carp_cm(),
                                "desc_carp"=>$r->getDesc_carp_cm(),
                                "id_serie"=>$r->getId_serie_cm(),
                                "nom_serie"=>$r->getNom_serie_cm()
                            );
            $arreglo[]=$elementos;
        }
        $datosretornar = array("data"=>$arreglo);
        echo json_encode($datosretornar);
    }

    if(isset($_POST['accion']) && $_POST['accion'] == "create"){

        //Valide person
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //data pers
        $id_emp = $_POST['idemp'];
        $ced_pers = $_POST['cedpers'];//data important
        $name_pers = $_POST['namepers'];
        $last_pers = $_POST['lastpers'];
        $fec_exp_cc_pers = $_POST['dateccpers'];
        $cel_pers = $_POST['celpers'];
        $tel_pers = $_POST['telepers'];
        $email_pers = $_POST['corpers'];
        $sex_pers = $_POST['sexpers'];
        $dir_pers = $_POST['dirpers'];
        $ciud_pers = $_POST['ciudpers'];
        $fec_reg_pers = date("Y-m-d");
        $fec_act_pers = date("Y-m-d");

        $personVO = new personVO();
        $personVO = $getperson->readPerson($ced_pers);

        if(!is_null($personVO->getCed_pers())){
            $persVO = new personVO();
            $persVO->setCed_pers($ced_pers);
            $persVO->setId_emp($id_emp);
            $persVO->setNom_pers($name_pers);
            $persVO->setApe_pers($last_pers);
            $persVO->setFec_exp_ced_pers($fec_exp_cc_pers);
            $persVO->setCel_pers($cel_pers);
            $persVO->setTel_pers($tel_pers);
            $persVO->setEmail_pers($email_pers);
            $persVO->setSex_pers($sex_pers);
            $persVO->setDir_pers($dir_pers);
            $persVO->setCiud_pers($ciud_pers);
            $persVO->setFec_act_pers($fec_act_pers);
            $getperson->update($persVO);  
        }
        else{
            $persVO = new personVO();
            $persVO->setCed_pers($ced_pers);
            $persVO->setId_emp($id_emp);
            $persVO->setNom_pers($name_pers);
            $persVO->setApe_pers($last_pers);
            $persVO->setFec_exp_ced_pers($fec_exp_cc_pers);
            $persVO->setCel_pers($cel_pers);
            $persVO->setTel_pers($tel_pers);
            $persVO->setEmail_pers($email_pers);
            $persVO->setSex_pers($sex_pers);
            $persVO->setDir_pers($dir_pers);
            $persVO->setCiud_pers($ciud_pers);
            $persVO->setFec_reg_pers($fec_reg_pers);
            $persVO->setFec_act_pers($fec_act_pers); 
            $getperson->create($persVO);    
        }
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////
        
        //valide property
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////

        //data prop
        $num_mat_prop = $_POST['numatprop'];
        $tip_prop = $_POST['tiprop'];
        $dir_prop = $_POST['dirprop'];
        $ciud_prop = $_POST['ciudprop'];
        $desc_prop = $_POST['descprop'];

        $newpropVO = new propertyVO();
        $newpropVO = $getproperty->readProp($num_mat_prop);

        if($newpropVO != null && $newpropVO !=""){
            $propVO = new propertyVO();
            $propVO->setId_prop($num_mat_prop);
            $propVO->setId_tip_prop($tip_prop);
            $propVO->setDir_prop($dir_prop);
            $propVO->setUbi_prop($ciud_prop);
            $propVO->setDesc_prop($desc_prop);
            $getproperty->update($propVO);
        }
        else{
            $propVO = new propertyVO();
            $propVO->setId_prop($num_mat_prop);
            $propVO->setId_tip_prop($tip_prop);
            $propVO->setDir_prop($dir_prop);
            $propVO->setUbi_prop($ciud_prop);
            $propVO->setDesc_prop($desc_prop);
            $getproperty->create($propVO);
        }

        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////

        //valide operation
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////

        //data operation
        $num_con = $_POST['numcontract'];
        $tip_con = $_POST['tipcontract'];
        $tip_con_nom = $_POST['nomtipcontract'];
        $cod_reg_oper_dep = 0;
        $estado_oper = 0;
        $orden_tip_pers = 0;
        $fec_oper = date("Y-m-d");
        $pers_con = $_POST['perscontract'];

        $newoperationVO = new operationVO();
        $newoperationVO = $getoperation->readOper($num_con);
        
        if($newoperationVO != null && $newoperationVO !=""){
            $operVO = new operationVO();
            $operVO->setCod_reg_oper($num_con);
            $operVO->setId_tip_oper($tip_con);
            $operVO->setId_prop_oper($num_mat_prop);
            $operVO->setDesc_oper($tip_con_nom);
            $operVO->setCod_reg_oper_dep($cod_reg_oper_dep);
            $operVO->setEstado_oper($estado_oper); 
            $getoperation->update($operVO); 
        }
        else{
            $operVO = new operationVO();
            $operVO->setCod_reg_oper($num_con);
            $operVO->setId_tip_oper($tip_con);
            $operVO->setId_prop_oper($num_mat_prop);
            $operVO->setDesc_oper($tip_con_nom); 
            $operVO->setCod_reg_oper_dep($cod_reg_oper_dep);
            $operVO->setEstado_oper($estado_oper);
            $operVO->setFec_oper($fec_oper);
            $getoperation->create($operVO);

            //data contract
            $conVO = new contractVO();
            $conVO->setCed_pers_con($ced_pers);
            $conVO->setCod_reg_oper_con($num_con);
            $conVO->setId_tip_pers_con($pers_con);
            $conVO->setOrden_tip_pers_con($orden_tip_pers);
            $getcontract->create($conVO); 
        }

        //////////////////////////////////////////////////////////////////////////////////////////////////////////////

        //valide folder
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $arch_con = $_POST['archcontract'];//cod archivo documental
        $arch_con_nom = $_POST['nomarchcontract'];//nom archivo documental

        $arch_file = $_POST['archfile'];//cod tip file =>inmueble
        $arch_file_name = $_POST['nomarchfile']; //nom tip file=> inmueble

        //Folder documents
        $namefile = $_SERVER['DOCUMENT_ROOT']."/sistema/Folder/archivo/"; 
        $folder = $namefile.$arch_con_nom;
        $folderprop = $folder."/".$arch_file_name;//inmueble
        $inmueble = $folderprop."/".$tip_con_nom."".$num_con;
        $descfile = $tip_con_nom."".$num_con; //desc file
        //Folder documents base de datos
        $urldir = "Folder/archivo/".$arch_con_nom."/".$arch_file_name."/".$tip_con_nom."".$num_con; //url for bd

        //create file
        $fileVO = new fileVO();
        $fileVO->setCod_tip_carp($arch_file); //cod_tip_carp =>inmueble
        $fileVO->setCod_reg_oper($num_con); //cod_reg_oper
        $fileVO->setDes_carp($descfile);
        $getfolder->create($fileVO);

        //search cod_carp
        $fileVOsearch = new fileVO();
        $fileVOsearch = $getfolder->readFilecontract($arch_file, $num_con);

        //serie document
        $serie_doc = $_POST['seriedoc'];

        //////////////////////////////////////////////////////////////////////////////////////////////////////////////

        //valide document
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////

        //data document
        $cod_file_search = $fileVOsearch->getCod_carp();//cod_carp
        $cod_doc_prop = 0;

        //subserie document
        $subserie_doc_prop = $_POST['subsedocprop']; //id_suberie doc prop
        $subserie_doc_pers = $_POST['subsedocpers']; //id subserie doc pers-prop

        if(file_exists($folder) && file_exists($folderprop)){
            mkdir($inmueble);
                
            if(isset($_FILES['contractman'])){
                $orden_doc = 0;
                $orden_sop = 0;
                $tiparchdoc = $_FILES['contractman']['type']; //tip_arch_doc
                $namedocument = "Contrato_Mandato_".$num_con;//nom doc
                $ext = str_replace('.', '', strrchr($_FILES['contractman']['name'], '.')); //ext_arch_sop
                $newdocument = "Contrato_Mandato_".$num_con.".".$ext; //desc doc //name sop
                $urldirdocument = $urldir."/".$newdocument;//rep_sop

                $docVO = new documentVO();
                $docVO->setCod_carp($cod_file_search); 
                $docVO->setId_subse($subserie_doc_pers);
                $docVO->setNom_doc($namedocument);
                $docVO->setDesc_doc($newdocument);
                $docVO->setTip_arch_doc($tiparchdoc); 
                $docVO->setOrden_doc($orden_doc);
                $docVO->setCod_doc_prop($cod_doc_prop);
                $getdocument->create($docVO);

                $docVOsearch = new documentVO();
                $docVOsearch = $getdocument->readDocumentfile($cod_file_search,$subserie_doc_pers,$namedocument);

                $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search

                $sopVO = new soporteVO();

                $sopVO->setCod_docs($cod_doc_search);
                $sopVO->setNom_sop($newdocument);
                $sopVO->setExt_arch_sop($ext);
                $sopVO->setOrden_sop($orden_sop);
                $sopVO->setRep_sop($urldirdocument);
                $getsoporte->create($sopVO);

                $filedir = opendir($inmueble);
                $rutedir = $inmueble."/".$newdocument;
                move_uploaded_file($_FILES['contractman']['tmp_name'], $rutedir);
                closedir($filedir);
            }
            
            if(isset($_FILES['fotcedpers'])){
                $orden_doc = 1;
                $orden_sop = 0;
                $tiparchdoc = $_FILES['fotcedpers']['type']; //tip_arch_doc
                $namedocument = "Fotocopia_Cédula_".$ced_pers;//nom doc
                $ext = str_replace('.', '', strrchr($_FILES['fotcedpers']['name'], '.'));//ext_arch_sop
                $newdocument = "Fot_Ced_Propietario_".$num_con.".".$ext; //desc doc //name sop
                $urldirdocument = $urldir."/".$newdocument;//rep_sop

                $docVO = new documentVO();
                $docVO->setCod_carp($cod_file_search); 
                $docVO->setId_subse($subserie_doc_pers);
                $docVO->setNom_doc($namedocument);
                $docVO->setDesc_doc($newdocument);
                $docVO->setTip_arch_doc($tiparchdoc); 
                $docVO->setOrden_doc($orden_doc);
                $docVO->setCod_doc_prop($cod_doc_prop);
                $getdocument->create($docVO);

                $docVOsearch = new documentVO();
                $docVOsearch = $getdocument->readDocumentfile($cod_file_search,$subserie_doc_pers,$namedocument);

                $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search

                $sopVO = new soporteVO();

                $sopVO->setCod_docs($cod_doc_search);
                $sopVO->setNom_sop($newdocument);
                $sopVO->setExt_arch_sop($ext);
                $sopVO->setRep_sop($urldirdocument);
                $sopVO->setOrden_sop($orden_sop);
                $getsoporte->create($sopVO);

                $filedir = opendir($inmueble);
                $rutedir = $inmueble."/".$newdocument;
                move_uploaded_file($_FILES['fotcedpers']['tmp_name'], $rutedir);
                closedir($filedir);
            }

            if(isset($_FILES['coprutpers'])){
                $orden_doc = 2;
                $orden_sop = 0;
                $tiparchdoc = $_FILES['coprutpers']['type']; //tip_arch_doc
                $namedocument = "Copia_Rut_Propietario_".$ced_pers;//nom doc
                $ext = str_replace('.', '', strrchr($_FILES['coprutpers']['name'], '.'));//ext_arch_sop
                $newdocument = "Copia_Rut_Propietario_".$num_con.".".$ext; //desc doc //name sop
                $urldirdocument = $urldir."/".$newdocument;//rep_sop

                $docVO = new documentVO();
                $docVO->setCod_carp($cod_file_search); 
                $docVO->setId_subse($subserie_doc_pers);
                $docVO->setNom_doc($namedocument);
                $docVO->setDesc_doc($newdocument);
                $docVO->setTip_arch_doc($tiparchdoc); 
                $docVO->setOrden_doc($orden_doc);
                $docVO->setCod_doc_prop($cod_doc_prop);
                $getdocument->create($docVO);

                $docVOsearch = new documentVO();
                $docVOsearch = $getdocument->readDocumentfile($cod_file_search,$subserie_doc_pers,$namedocument);

                $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search

                $sopVO = new soporteVO();

                $sopVO->setCod_docs($cod_doc_search);
                $sopVO->setNom_sop($newdocument);
                $sopVO->setExt_arch_sop($ext);
                $sopVO->setRep_sop($urldirdocument);
                $sopVO->setOrden_sop($orden_sop);
                $getsoporte->create($sopVO);

                $filedir = opendir($inmueble);
                $rutedir = $inmueble."/".$newdocument;
                move_uploaded_file($_FILES['coprutpers']['tmp_name'], $rutedir);
                closedir($filedir);
            }

            if(isset($_FILES['certbanpers'])){
                $orden_doc = 3;
                $orden_sop = 0;
                $tiparchdoc = $_FILES['certbanpers']['type']; //tip_arch_doc
                $namedocument = "Cert_Bancaria_Propietario_".$ced_pers;//nom doc
                $ext = str_replace('.', '', strrchr($_FILES['certbanpers']['name'], '.'));//ext_arch_sop
                $newdocument = "Cert_Bancaria_Propietario_".$num_con.".".$ext; //desc doc //name sop
                $urldirdocument = $urldir."/".$newdocument;//rep_sop

                $docVO = new documentVO();
                $docVO->setCod_carp($cod_file_search); 
                $docVO->setId_subse($subserie_doc_pers);
                $docVO->setNom_doc($namedocument);
                $docVO->setDesc_doc($newdocument);
                $docVO->setTip_arch_doc($tiparchdoc); 
                $docVO->setOrden_doc($orden_doc);
                $docVO->setCod_doc_prop($cod_doc_prop);
                $getdocument->create($docVO);

                $docVOsearch = new documentVO();
                $docVOsearch = $getdocument->readDocumentfile($cod_file_search,$subserie_doc_pers,$namedocument);

                $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search

                $sopVO = new soporteVO();

                $sopVO->setCod_docs($cod_doc_search);
                $sopVO->setNom_sop($newdocument);
                $sopVO->setExt_arch_sop($ext);
                $sopVO->setRep_sop($urldirdocument);
                $sopVO->setOrden_sop($orden_sop);
                $getsoporte->create($sopVO);

                $filedir = opendir($inmueble);
                $rutedir = $inmueble."/".$newdocument;
                move_uploaded_file($_FILES['certbanpers']['tmp_name'], $rutedir);
                closedir($filedir);
            }

            if(isset($_FILES['escprop'])){
                $orden_doc = 0;
                $orden_sop = 0;
                $tiparchdoc = $_FILES['escprop']['type']; //tip_arch_doc
                $namedocument = "Escrituras_Inmueble_".$num_mat_prop;//nom doc
                $ext = str_replace('.', '', strrchr($_FILES['escprop']['name'], '.'));//ext_arch_sop
                $newdocument = "Escrituras_Inmueble_".$num_con.".".$ext; //desc doc //name sop
                $urldirdocument = $urldir."/".$newdocument;//rep_sop

                $docVO = new documentVO();
                $docVO->setCod_carp($cod_file_search); 
                $docVO->setId_subse($subserie_doc_prop);
                $docVO->setNom_doc($namedocument);
                $docVO->setDesc_doc($newdocument);
                $docVO->setTip_arch_doc($tiparchdoc); 
                $docVO->setOrden_doc($orden_doc);
                $docVO->setCod_doc_prop($cod_doc_prop);
                $getdocument->create($docVO);

                $docVOsearch = new documentVO();
                $docVOsearch = $getdocument->readDocumentfile($cod_file_search,$subserie_doc_prop,$namedocument);

                $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search

                $sopVO = new soporteVO();

                $sopVO->setCod_docs($cod_doc_search);
                $sopVO->setNom_sop($newdocument);
                $sopVO->setExt_arch_sop($ext);
                $sopVO->setRep_sop($urldirdocument);
                $sopVO->setOrden_sop($orden_sop);
                $getsoporte->create($sopVO);

                $filedir = opendir($inmueble);
                $rutedir = $inmueble."/".$newdocument;
                move_uploaded_file($_FILES['escprop']['tmp_name'], $rutedir);
                closedir($filedir);
            }

            if(isset($_FILES['cleiprop'])){
                $orden_doc = 1;
                $orden_sop = 0;
                $tiparchdoc = $_FILES['cleiprop']['type']; //tip_arch_doc
                $namedocument = "Cert_Lib_Extra_Inmueble_".$num_mat_prop;//nom doc
                $ext = str_replace('.', '', strrchr($_FILES['cleiprop']['name'], '.'));//ext_arch_sop
                $newdocument = "Cert_Lib_Extra_Inmueble_".$num_con.".".$ext; //desc doc //name sop
                $urldirdocument = $urldir."/".$newdocument;//rep_sop

                $docVO = new documentVO();
                $docVO->setCod_carp($cod_file_search); 
                $docVO->setId_subse($subserie_doc_prop);
                $docVO->setNom_doc($namedocument);
                $docVO->setDesc_doc($newdocument);
                $docVO->setTip_arch_doc($tiparchdoc); 
                $docVO->setOrden_doc($orden_doc);
                $docVO->setCod_doc_prop($cod_doc_prop);
                $getdocument->create($docVO);

                $docVOsearch = new documentVO();
                $docVOsearch = $getdocument->readDocumentfile($cod_file_search,$subserie_doc_prop,$namedocument);

                $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search

                $sopVO = new soporteVO();

                $sopVO->setCod_docs($cod_doc_search);
                $sopVO->setNom_sop($newdocument);
                $sopVO->setExt_arch_sop($ext);
                $sopVO->setRep_sop($urldirdocument);
                $sopVO->setOrden_sop($orden_sop);
                $getsoporte->create($sopVO);

                $filedir = opendir($inmueble);
                $rutedir = $inmueble."/".$newdocument;
                move_uploaded_file($_FILES['cleiprop']['tmp_name'], $rutedir);
                closedir($filedir);
            }

            if(isset($_FILES['ddiprop'])){
                $orden_doc = 2;
                $orden_sop = 0;
                $tiparchdoc = $_FILES['ddiprop']['type']; //tip_arch_doc
                $namedocument = "Doc_Desc_Inmueble_".$num_mat_prop;//nom doc
                $ext = str_replace('.', '', strrchr($_FILES['ddiprop']['name'], '.'));//ext_arch_sop
                $newdocument = "Doc_Desc_Inmueble_".$num_con.".".$ext; //desc doc //name sop
                $urldirdocument = $urldir."/".$newdocument;//rep_sop

                $docVO = new documentVO();
                $docVO->setCod_carp($cod_file_search); 
                $docVO->setId_subse($subserie_doc_prop);
                $docVO->setNom_doc($namedocument);
                $docVO->setDesc_doc($newdocument);
                $docVO->setTip_arch_doc($tiparchdoc);
                $docVO->setOrden_doc($orden_doc); 
                $docVO->setCod_doc_prop($cod_doc_prop);
                $getdocument->create($docVO);

                $docVOsearch = new documentVO();
                $docVOsearch = $getdocument->readDocumentfile($cod_file_search,$subserie_doc_prop,$namedocument);

                $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search

                $sopVO = new soporteVO();

                $sopVO->setCod_docs($cod_doc_search);
                $sopVO->setNom_sop($newdocument);
                $sopVO->setExt_arch_sop($ext);
                $sopVO->setRep_sop($urldirdocument);
                $sopVO->setOrden_sop($orden_sop);
                $getsoporte->create($sopVO);

                $filedir = opendir($inmueble);
                $rutedir = $inmueble."/".$newdocument;
                move_uploaded_file($_FILES['ddiprop']['tmp_name'], $rutedir);
                closedir($filedir);
            }

            //Opcional
            if(isset($_FILES['dafprop'])){
                $orden_doc = 3;
                $orden_sop = 0;
                $tiparchdoc = $_FILES['dafprop']['type']; //tip_arch_doc
                $namedocument = "Doc_Auto_Fianza_Inmueble_".$num_mat_prop;//nom doc
                $ext = str_replace('.', '', strrchr($_FILES['dafprop']['name'], '.'));//ext_arch_sop
                $newdocument = "Doc_Auto_Fianza_Inmueble_".$num_con.".".$ext;//ext_arch_sop
                $urldirdocument = $urldir."/".$newdocument;//rep_sop

                $docVO = new documentVO();
                $docVO->setCod_carp($cod_file_search); 
                $docVO->setId_subse($subserie_doc_prop);
                $docVO->setNom_doc($namedocument);
                $docVO->setDesc_doc($newdocument);
                $docVO->setTip_arch_doc($tiparchdoc); 
                $docVO->setOrden_doc($orden_doc); 
                $docVO->setCod_doc_prop($cod_doc_prop);
                $getdocument->create($docVO);

                $docVOsearch = new documentVO();
                $docVOsearch = $getdocument->readDocumentfile($cod_file_search,$subserie_doc_prop,$namedocument);

                $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search

                $sopVO = new soporteVO();

                $sopVO->setCod_docs($cod_doc_search);
                $sopVO->setNom_sop($newdocument);
                $sopVO->setExt_arch_sop($ext);
                $sopVO->setRep_sop($urldirdocument);
                $sopVO->setOrden_sop($orden_sop);
                $getsoporte->create($sopVO);

                $filedir = opendir($inmueble);
                $rutedir = $inmueble."/".$newdocument;
                move_uploaded_file($_FILES['dafprop']['tmp_name'], $rutedir);
                closedir($filedir);
            }

            if(isset($_FILES['fotos'])){
                $orden_doc = 4;

                $tiparchdocimg = "Image"; //tip_arch_doc
                $namedocumentimg = "Imagenes_Inmueble_".$num_mat_prop;//nom doc
                $newdocumentimg = "Img_Inmueble_".$num_mat_prop;//desc doc
                $extimg = "image/jpeg image/png image/jpg image/gif";

                $docVO = new documentVO();
                $docVO->setCod_carp($cod_file_search); 
                $docVO->setId_subse($subserie_doc_prop);
                $docVO->setNom_doc($namedocumentimg);
                $docVO->setDesc_doc($newdocumentimg);
                $docVO->setTip_arch_doc($tiparchdocimg); 
                $docVO->setOrden_doc($orden_doc); 
                $docVO->setCod_doc_prop($cod_doc_prop);
                $getdocument->create($docVO);

                $docVOsearch = new documentVO();
                $docVOsearch = $getdocument->readDocumentfile($cod_file_search,$subserie_doc_prop,$namedocumentimg);

                $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search


                $filedir = opendir($inmueble);
                foreach($_FILES['fotos']['tmp_name'] as $file=>$value){
                    $tiparchdoc = $_FILES['fotos']['type'][$file];//tip_arch_doc
                    $extimg = str_replace('.', '', strrchr($_FILES['fotos']['name'][$file], '.'));//ext_arch_sop
                    $newimg = "Foto_".$file."_".$num_con.".".$extimg;//nom_sop
                    $newimgbd = "Foto_".$file."_".$num_con; //image en la base de datos
                    $urldirimg = $urldir."/".$newimg;//rep_sop 
                    $urldirimgbd = $urldir; //dir rep en la base de datos
                    $orden_sop = $file;

                    $sopVO = new soporteVO();

                    $sopVO->setCod_docs($cod_doc_search);
                    $sopVO->setNom_sop($newimgbd);
                    $sopVO->setExt_arch_sop($extimg);
                    $sopVO->setRep_sop($urldirimgbd);
                    $sopVO->setOrden_sop($orden_sop);
                    $getsoporte->create($sopVO);

                    $rutedir = $inmueble."/".$newimg;
                    move_uploaded_file($_FILES['fotos']['tmp_name'][$file],$rutedir);
                }
                closedir($filedir);
            }  

        } // fin del ciclo if 
        else{
            mkdir($folder);
            mkdir($folderprop);
            mkdir($inmueble);

            if(isset($_FILES['contractman'])){
                $orden_doc = 0;
                $orden_sop = 0;
                $tiparchdoc = $_FILES['contractman']['type']; //tip_arch_doc
                $namedocument = "Contrato_Mandato_".$num_con;//nom doc
                $ext = str_replace('.', '', strrchr($_FILES['contractman']['name'], '.')); //ext_arch_sop
                $newdocument = "Contrato_Mandato_".$num_con.".".$ext; //desc doc //name sop
                $urldirdocument = $urldir."/".$newdocument;//rep_sop

                $docVO = new documentVO();
                $docVO->setCod_carp($cod_file_search); 
                $docVO->setId_subse($subserie_doc_pers);
                $docVO->setNom_doc($namedocument);
                $docVO->setDesc_doc($newdocument);
                $docVO->setTip_arch_doc($tiparchdoc); 
                $docVO->setOrden_doc($orden_doc);
                $docVO->setCod_doc_prop($cod_doc_prop);
                $getdocument->create($docVO);

                $docVOsearch = new documentVO();
                $docVOsearch = $getdocument->readDocumentfile($cod_file_search,$subserie_doc_pers,$namedocument);

                $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search

                $sopVO = new soporteVO();

                $sopVO->setCod_docs($cod_doc_search);
                $sopVO->setNom_sop($newdocument);
                $sopVO->setExt_arch_sop($ext);
                $sopVO->setOrden_sop($orden_sop);
                $sopVO->setRep_sop($urldirdocument);
                $getsoporte->create($sopVO);

                $filedir = opendir($inmueble);
                $rutedir = $inmueble."/".$newdocument;
                move_uploaded_file($_FILES['contractman']['tmp_name'], $rutedir);
                closedir($filedir);
            }
            
            if(isset($_FILES['fotcedpers'])){
                $orden_doc = 1;
                $orden_sop = 0;
                $tiparchdoc = $_FILES['fotcedpers']['type']; //tip_arch_doc
                $namedocument = "Fotocopia_Cédula_".$ced_pers;//nom doc
                $ext = str_replace('.', '', strrchr($_FILES['fotcedpers']['name'], '.'));//ext_arch_sop
                $newdocument = "Fot_Ced_Propietario_".$num_con.".".$ext; //desc doc //name sop
                $urldirdocument = $urldir."/".$newdocument;//rep_sop

                $docVO = new documentVO();
                $docVO->setCod_carp($cod_file_search); 
                $docVO->setId_subse($subserie_doc_pers);
                $docVO->setNom_doc($namedocument);
                $docVO->setDesc_doc($newdocument);
                $docVO->setTip_arch_doc($tiparchdoc); 
                $docVO->setOrden_doc($orden_doc);
                $docVO->setCod_doc_prop($cod_doc_prop);
                $getdocument->create($docVO);

                $docVOsearch = new documentVO();
                $docVOsearch = $getdocument->readDocumentfile($cod_file_search,$subserie_doc_pers,$namedocument);

                $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search

                $sopVO = new soporteVO();

                $sopVO->setCod_docs($cod_doc_search);
                $sopVO->setNom_sop($newdocument);
                $sopVO->setExt_arch_sop($ext);
                $sopVO->setRep_sop($urldirdocument);
                $sopVO->setOrden_sop($orden_sop);
                $getsoporte->create($sopVO);

                $filedir = opendir($inmueble);
                $rutedir = $inmueble."/".$newdocument;
                move_uploaded_file($_FILES['fotcedpers']['tmp_name'], $rutedir);
                closedir($filedir);
            }

            if(isset($_FILES['coprutpers'])){
                $orden_doc = 2;
                $orden_sop = 0;
                $tiparchdoc = $_FILES['coprutpers']['type']; //tip_arch_doc
                $namedocument = "Copia_Rut_Propietario_".$ced_pers;//nom doc
                $ext = str_replace('.', '', strrchr($_FILES['coprutpers']['name'], '.'));//ext_arch_sop
                $newdocument = "Copia_Rut_Propietario_".$num_con.".".$ext; //desc doc //name sop
                $urldirdocument = $urldir."/".$newdocument;//rep_sop

                $docVO = new documentVO();
                $docVO->setCod_carp($cod_file_search); 
                $docVO->setId_subse($subserie_doc_pers);
                $docVO->setNom_doc($namedocument);
                $docVO->setDesc_doc($newdocument);
                $docVO->setTip_arch_doc($tiparchdoc); 
                $docVO->setOrden_doc($orden_doc);
                $docVO->setCod_doc_prop($cod_doc_prop);
                $getdocument->create($docVO);

                $docVOsearch = new documentVO();
                $docVOsearch = $getdocument->readDocumentfile($cod_file_search,$subserie_doc_pers,$namedocument);

                $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search

                $sopVO = new soporteVO();

                $sopVO->setCod_docs($cod_doc_search);
                $sopVO->setNom_sop($newdocument);
                $sopVO->setExt_arch_sop($ext);
                $sopVO->setRep_sop($urldirdocument);
                $sopVO->setOrden_sop($orden_sop);
                $getsoporte->create($sopVO);

                $filedir = opendir($inmueble);
                $rutedir = $inmueble."/".$newdocument;
                move_uploaded_file($_FILES['coprutpers']['tmp_name'], $rutedir);
                closedir($filedir);
            }

            if(isset($_FILES['certbanpers'])){
                $orden_doc = 3;
                $orden_sop = 0;
                $tiparchdoc = $_FILES['certbanpers']['type']; //tip_arch_doc
                $namedocument = "Cert_Bancaria_Propietario_".$ced_pers;//nom doc
                $ext = str_replace('.', '', strrchr($_FILES['certbanpers']['name'], '.'));//ext_arch_sop
                $newdocument = "Cert_Bancaria_Propietario_".$num_con.".".$ext; //desc doc //name sop
                $urldirdocument = $urldir."/".$newdocument;//rep_sop

                $docVO = new documentVO();
                $docVO->setCod_carp($cod_file_search); 
                $docVO->setId_subse($subserie_doc_pers);
                $docVO->setNom_doc($namedocument);
                $docVO->setDesc_doc($newdocument);
                $docVO->setTip_arch_doc($tiparchdoc); 
                $docVO->setOrden_doc($orden_doc);
                $docVO->setCod_doc_prop($cod_doc_prop);
                $getdocument->create($docVO);

                $docVOsearch = new documentVO();
                $docVOsearch = $getdocument->readDocumentfile($cod_file_search,$subserie_doc_pers,$namedocument);

                $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search

                $sopVO = new soporteVO();

                $sopVO->setCod_docs($cod_doc_search);
                $sopVO->setNom_sop($newdocument);
                $sopVO->setExt_arch_sop($ext);
                $sopVO->setRep_sop($urldirdocument);
                $sopVO->setOrden_sop($orden_sop);
                $getsoporte->create($sopVO);

                $filedir = opendir($inmueble);
                $rutedir = $inmueble."/".$newdocument;
                move_uploaded_file($_FILES['certbanpers']['tmp_name'], $rutedir);
                closedir($filedir);
            }

            if(isset($_FILES['escprop'])){
                $orden_doc = 0;
                $orden_sop = 0;
                $tiparchdoc = $_FILES['escprop']['type']; //tip_arch_doc
                $namedocument = "Escrituras_Inmueble_".$num_mat_prop;//nom doc
                $ext = str_replace('.', '', strrchr($_FILES['escprop']['name'], '.'));//ext_arch_sop
                $newdocument = "Escrituras_Inmueble_".$num_con.".".$ext; //desc doc //name sop
                $urldirdocument = $urldir."/".$newdocument;//rep_sop

                $docVO = new documentVO();
                $docVO->setCod_carp($cod_file_search); 
                $docVO->setId_subse($subserie_doc_prop);
                $docVO->setNom_doc($namedocument);
                $docVO->setDesc_doc($newdocument);
                $docVO->setTip_arch_doc($tiparchdoc); 
                $docVO->setOrden_doc($orden_doc);
                $docVO->setCod_doc_prop($cod_doc_prop);
                $getdocument->create($docVO);

                $docVOsearch = new documentVO();
                $docVOsearch = $getdocument->readDocumentfile($cod_file_search,$subserie_doc_prop,$namedocument);

                $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search

                $sopVO = new soporteVO();

                $sopVO->setCod_docs($cod_doc_search);
                $sopVO->setNom_sop($newdocument);
                $sopVO->setExt_arch_sop($ext);
                $sopVO->setRep_sop($urldirdocument);
                $sopVO->setOrden_sop($orden_sop);
                $getsoporte->create($sopVO);

                $filedir = opendir($inmueble);
                $rutedir = $inmueble."/".$newdocument;
                move_uploaded_file($_FILES['escprop']['tmp_name'], $rutedir);
                closedir($filedir);
            }

            if(isset($_FILES['cleiprop'])){
                $orden_doc = 1;
                $orden_sop = 0;
                $tiparchdoc = $_FILES['cleiprop']['type']; //tip_arch_doc
                $namedocument = "Cert_Lib_Extra_Inmueble_".$num_mat_prop;//nom doc
                $ext = str_replace('.', '', strrchr($_FILES['cleiprop']['name'], '.'));//ext_arch_sop
                $newdocument = "Cert_Lib_Extra_Inmueble_".$num_con.".".$ext; //desc doc //name sop
                $urldirdocument = $urldir."/".$newdocument;//rep_sop

                $docVO = new documentVO();
                $docVO->setCod_carp($cod_file_search); 
                $docVO->setId_subse($subserie_doc_prop);
                $docVO->setNom_doc($namedocument);
                $docVO->setDesc_doc($newdocument);
                $docVO->setTip_arch_doc($tiparchdoc); 
                $docVO->setOrden_doc($orden_doc);
                $docVO->setCod_doc_prop($cod_doc_prop);
                $getdocument->create($docVO);

                $docVOsearch = new documentVO();
                $docVOsearch = $getdocument->readDocumentfile($cod_file_search,$subserie_doc_prop,$namedocument);

                $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search

                $sopVO = new soporteVO();

                $sopVO->setCod_docs($cod_doc_search);
                $sopVO->setNom_sop($newdocument);
                $sopVO->setExt_arch_sop($ext);
                $sopVO->setRep_sop($urldirdocument);
                $sopVO->setOrden_sop($orden_sop);
                $getsoporte->create($sopVO);

                $filedir = opendir($inmueble);
                $rutedir = $inmueble."/".$newdocument;
                move_uploaded_file($_FILES['cleiprop']['tmp_name'], $rutedir);
                closedir($filedir);
            }

            if(isset($_FILES['ddiprop'])){
                $orden_doc = 2;
                $orden_sop = 0;
                $tiparchdoc = $_FILES['ddiprop']['type']; //tip_arch_doc
                $namedocument = "Doc_Desc_Inmueble_".$num_mat_prop;//nom doc
                $ext = str_replace('.', '', strrchr($_FILES['ddiprop']['name'], '.'));//ext_arch_sop
                $newdocument = "Doc_Desc_Inmueble_".$num_con.".".$ext; //desc doc //name sop
                $urldirdocument = $urldir."/".$newdocument;//rep_sop

                $docVO = new documentVO();
                $docVO->setCod_carp($cod_file_search); 
                $docVO->setId_subse($subserie_doc_prop);
                $docVO->setNom_doc($namedocument);
                $docVO->setDesc_doc($newdocument);
                $docVO->setTip_arch_doc($tiparchdoc);
                $docVO->setOrden_doc($orden_doc); 
                $docVO->setCod_doc_prop($cod_doc_prop);
                $getdocument->create($docVO);

                $docVOsearch = new documentVO();
                $docVOsearch = $getdocument->readDocumentfile($cod_file_search,$subserie_doc_prop,$namedocument);

                $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search

                $sopVO = new soporteVO();

                $sopVO->setCod_docs($cod_doc_search);
                $sopVO->setNom_sop($newdocument);
                $sopVO->setExt_arch_sop($ext);
                $sopVO->setRep_sop($urldirdocument);
                $sopVO->setOrden_sop($orden_sop);
                $getsoporte->create($sopVO);

                $filedir = opendir($inmueble);
                $rutedir = $inmueble."/".$newdocument;
                move_uploaded_file($_FILES['ddiprop']['tmp_name'], $rutedir);
                closedir($filedir);
            }

            //Opcional
            if(isset($_FILES['dafprop'])){
                $orden_doc = 3;
                $orden_sop = 0;
                $tiparchdoc = $_FILES['dafprop']['type']; //tip_arch_doc
                $namedocument = "Doc_Auto_Fianza_Inmueble_".$num_mat_prop;//nom doc
                $ext = str_replace('.', '', strrchr($_FILES['dafprop']['name'], '.'));//ext_arch_sop
                $newdocument = "Doc_Auto_Fianza_Inmueble_".$num_con.".".$ext;//ext_arch_sop
                $urldirdocument = $urldir."/".$newdocument;//rep_sop

                $docVO = new documentVO();
                $docVO->setCod_carp($cod_file_search); 
                $docVO->setId_subse($subserie_doc_prop);
                $docVO->setNom_doc($namedocument);
                $docVO->setDesc_doc($newdocument);
                $docVO->setTip_arch_doc($tiparchdoc); 
                $docVO->setOrden_doc($orden_doc); 
                $docVO->setCod_doc_prop($cod_doc_prop);
                $getdocument->create($docVO);

                $docVOsearch = new documentVO();
                $docVOsearch = $getdocument->readDocumentfile($cod_file_search,$subserie_doc_prop,$namedocument);

                $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search

                $sopVO = new soporteVO();

                $sopVO->setCod_docs($cod_doc_search);
                $sopVO->setNom_sop($newdocument);
                $sopVO->setExt_arch_sop($ext);
                $sopVO->setRep_sop($urldirdocument);
                $sopVO->setOrden_sop($orden_sop);
                $getsoporte->create($sopVO);

                $filedir = opendir($inmueble);
                $rutedir = $inmueble."/".$newdocument;
                move_uploaded_file($_FILES['dafprop']['tmp_name'], $rutedir);
                closedir($filedir);
            }

            if(isset($_FILES['fotos'])){
                $orden_doc = 4;

                $tiparchdocimg = "Image"; //tip_arch_doc
                $namedocumentimg = "Imagenes_Inmueble_".$num_mat_prop;//nom doc
                $newdocumentimg = "Img_Inmueble_".$num_mat_prop;//desc doc
                $extimg = "image/jpeg image/png image/jpg image/gif";

                $docVO = new documentVO();
                $docVO->setCod_carp($cod_file_search); 
                $docVO->setId_subse($subserie_doc_prop);
                $docVO->setNom_doc($namedocumentimg);
                $docVO->setDesc_doc($newdocumentimg);
                $docVO->setTip_arch_doc($tiparchdocimg); 
                $docVO->setOrden_doc($orden_doc); 
                $docVO->setCod_doc_prop($cod_doc_prop);
                $getdocument->create($docVO);

                $docVOsearch = new documentVO();
                $docVOsearch = $getdocument->readDocumentfile($cod_file_search,$subserie_doc_prop,$namedocumentimg);

                $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search


                $filedir = opendir($inmueble);
                foreach($_FILES['fotos']['tmp_name'] as $file=>$value){
                    $tiparchdoc = $_FILES['fotos']['type'][$file];//tip_arch_doc
                    $extimg = str_replace('.', '', strrchr($_FILES['fotos']['name'][$file], '.'));//ext_arch_sop
                    $newimg = "Foto_".$file."_".$num_con.".".$extimg;//nom_sop
                    $newimgbd = "Foto_".$file."_".$num_con; //image en la base de datos
                    $urldirimg = $urldir."/".$newimg;//rep_sop 
                    $urldirimgbd = $urldir; //dir rep en la base de datos
                    $orden_sop = $file;

                    $sopVO = new soporteVO();

                    $sopVO->setCod_docs($cod_doc_search);
                    $sopVO->setNom_sop($newimgbd);
                    $sopVO->setExt_arch_sop($extimg);
                    $sopVO->setRep_sop($urldirimgbd);
                    $sopVO->setOrden_sop($orden_sop);
                    $getsoporte->create($sopVO);

                    $rutedir = $inmueble."/".$newimg;
                    move_uploaded_file($_FILES['fotos']['tmp_name'][$file],$rutedir);
                }
                closedir($filedir);
            } 

        }//fin del ciclo else
		
    }

    if(isset($_POST['accion']) && $_POST['accion'] == "update"){

        //Valide person
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //data pers
        $id_emp = $_POST['idemp'];
        $ced_pers = $_POST['cedpers'];//data important
        $name_pers = $_POST['namepers'];
        $last_pers = $_POST['lastpers'];
        $fec_exp_cc_pers = $_POST['dateccpers'];
        $cel_pers = $_POST['celpers'];
        $tel_pers = $_POST['telepers'];
        $email_pers = $_POST['corpers'];
        $sex_pers = $_POST['sexpers'];
        $dir_pers = $_POST['dirpers'];
        $ciud_pers = $_POST['ciudpers'];
        $fec_reg_pers = date("Y-m-d");
        $fec_act_pers = date("Y-m-d");

        $personVO = new personVO();
        $personVO = $getperson->readPerson($ced_pers);

        if(!is_null($personVO->getCed_pers())){
            $persVO = new personVO();
            $persVO->setCed_pers($ced_pers);
            $persVO->setId_emp($id_emp);
            $persVO->setNom_pers($name_pers);
            $persVO->setApe_pers($last_pers);
            $persVO->setFec_exp_ced_pers($fec_exp_cc_pers);
            $persVO->setCel_pers($cel_pers);
            $persVO->setTel_pers($tel_pers);
            $persVO->setEmail_pers($email_pers);
            $persVO->setSex_pers($sex_pers);
            $persVO->setDir_pers($dir_pers);
            $persVO->setCiud_pers($ciud_pers);
            $persVO->setFec_act_pers($fec_act_pers);
            $getperson->update($persVO);  
        }
        else{
            $persVO = new personVO();
            $persVO->setCed_pers($ced_pers);
            $persVO->setId_emp($id_emp);
            $persVO->setNom_pers($name_pers);
            $persVO->setApe_pers($last_pers);
            $persVO->setFec_exp_ced_pers($fec_exp_cc_pers);
            $persVO->setCel_pers($cel_pers);
            $persVO->setTel_pers($tel_pers);
            $persVO->setEmail_pers($email_pers);
            $persVO->setSex_pers($sex_pers);
            $persVO->setDir_pers($dir_pers);
            $persVO->setCiud_pers($ciud_pers);
            $persVO->setFec_reg_pers($fec_reg_pers);
            $persVO->setFec_act_pers($fec_act_pers); 
            $getperson->create($persVO);    
        }
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////
        
        //valide property
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////

        //data prop
        $num_mat_prop = $_POST['numatprop'];
        $tip_prop = $_POST['tiprop'];
        $dir_prop = $_POST['dirprop'];
        $ciud_prop = $_POST['ciudprop'];
        $desc_prop = $_POST['descprop'];

        $newpropVO = new propertyVO();
        $newpropVO = $getproperty->readProp($num_mat_prop);

        if($newpropVO != null && $newpropVO !=""){
            $propVO = new propertyVO();
            $propVO->setId_prop($num_mat_prop);
            $propVO->setId_tip_prop($tip_prop);
            $propVO->setDir_prop($dir_prop);
            $propVO->setUbi_prop($ciud_prop);
            $propVO->setDesc_prop($desc_prop);
            $getproperty->update($propVO);
        }
        else{
            $propVO = new propertyVO();
            $propVO->setId_prop($num_mat_prop);
            $propVO->setId_tip_prop($tip_prop);
            $propVO->setDir_prop($dir_prop);
            $propVO->setUbi_prop($ciud_prop);
            $propVO->setDesc_prop($desc_prop);
            $getproperty->create($propVO);
        }

        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////

        //valide operation
        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////

        //data contract
        $num_con = $_POST['numcontract'];
        $tip_con = $_POST['tipcontract'];
        $tip_con_nom = $_POST['nomtipcontract'];
        $pers_con = $_POST['perscontract'];
        $estado_oper = $_POST['estadocon'];
        $cod_reg_oper_dep = 0;
        $fec_oper = date("Y-m-d");

        $newoperationVO = new operationVO();
        $newoperationVO = $getoperation->readOper($num_con);
        
        if($newoperationVO != null && $newoperationVO !=""){
            $operVO = new operationVO();
            $operVO->setCod_reg_oper($num_con);
            $operVO->setId_tip_oper($tip_con);
            $operVO->setId_prop_oper($num_mat_prop);
            $operVO->setDesc_oper($tip_con_nom);
            $operVO->setCod_reg_oper_dep($cod_reg_oper_dep);
            $operVO->setEstado_oper($estado_oper); 
            $operVO->setFec_oper($fec_oper);
            $getoperation->update($operVO); 
        }
        else{
            $operVO = new operationVO();
            $operVO->setCod_reg_oper($num_con);
            $operVO->setId_tip_oper($tip_con);
            $operVO->setId_prop_oper($num_mat_prop);
            $operVO->setDesc_oper($tip_con_nom); 
            $operVO->setCod_reg_oper_dep($cod_reg_oper_dep);
            $operVO->setEstado_oper($estado_oper);
            $operVO->setFec_oper($fec_oper);
            $getoperation->create($operVO); 
        }

        //data contract
        $pers_con = $_POST['perscontract'];
        $orden_tip_pers = 0;

        $validatecontractVO = new contractVO();
        $validatecontractVO = $getcontract->readContract($ced_pers, $num_con, $pers_con);
        $idcon = $validatecontractVO->getId_con(); //Id contrato

        if($validatecontractVO != null && $validatecontractVO != ""){
            $conVO = new contractVO();
            $conVO->setId_con($idcon);
            $conVO->setCed_pers_con($ced_pers);
            $conVO->setCod_reg_oper_con($num_con);
            $conVO->setId_tip_pers_con($pers_con);
            $conVO->setOrden_tip_pers_con($orden_tip_pers);
            $getcontract->update($conVO); 
        }

        //////////////////////////////////////////////////////////////////////////////////////////////////////////////

        //valide folder
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $arch_con = $_POST['archcontract'];//cod archivo documental
        $arch_con_nom = $_POST['nomarchcontract'];//nom archivo documental

        $arch_file = $_POST['archfile'];//cod tip file =>inmueble
        $arch_file_name = $_POST['nomarchfile']; //nom tip file=> inmueble

        //Folder documents
        $nameruteraiz = $_SERVER['DOCUMENT_ROOT']."/sistema";//raiz
        $namefile = $_SERVER['DOCUMENT_ROOT']."/sistema/Folder/archivo/"; 
        $folder = $namefile.$arch_con_nom; // Directorio =>"/sistema/Folder/archivo/A#"
        $folderprop = $folder."/".$arch_file_name;//inmueble =>"/sistema/Folder/archivo/A#/inmueble"
        $inmueble = $folderprop."/".$tip_con_nom."".$num_con; // Mandato##### =>"/sistema/Folder/archivo/A#/inmueble/Mandato###..."
        $descfile = $tip_con_nom."".$num_con; //desc file => Mandato####...
        //Folder documents base de datos
        $urldir = "Folder/archivo/".$arch_con_nom."/".$arch_file_name."/".$tip_con_nom."".$num_con; //url for bd

        //search cod_carp
        $validatefileVO = new fileVO();
        $validatefileVO = $getfolder->readFilecontract($arch_file, $num_con);

        $validatecodcarp = $validatefileVO->getCod_carp();

        if($validatefileVO != null && $validatefileVO != ""){
            //create file
            $fileVO = new fileVO();
            $fileVO->setCod_carp($validatecodcarp);
            $fileVO->setCod_tip_carp($arch_file); //cod_tip_carp =>inmueble
            $fileVO->setCod_reg_oper($num_con); //cod_reg_oper
            $fileVO->setDes_carp($descfile);
            $getfolder->update($fileVO);
        }
        else{
            //update file
            $fileVO = new fileVO();
            $fileVO->setCod_tip_carp($arch_file); //cod_tip_carp =>inmueble
            $fileVO->setCod_reg_oper($num_con); //cod_reg_oper
            $fileVO->setDes_carp($descfile);
            $getfolder->create($fileVO);
        }

        //search cod_carp
        $fileVOsearch = new fileVO();
        $fileVOsearch = $getfolder->readFilecontract($arch_file, $num_con);
        
        //serie document
        $serie_doc = $_POST['seriedoc'];

        //////////////////////////////////////////////////////////////////////////////////////////////////////////////

        //valide document
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////

        //data document
        $cod_file_search = $fileVOsearch->getCod_carp();//cod_carp
        $cod_doc_prop = 0;

        //subserie document
        $subserie_doc_prop = $_POST['subsedocprop']; //id_suberie doc prop
        $subserie_doc_pers = $_POST['subsedocpers']; //id subserie doc pers-prop

        if(file_exists($folder) && file_exists($folderprop) && file_exists($inmueble)){
            
            //Opcional
            if(isset($_FILES['dafprop'])){
                $orden_doc = 3;
                $orden_sop = 0;
                $tiparchdoc = $_FILES['dafprop']['type']; //tip_arch_doc
                $namedocument = "Doc_Auto_Fianza_Inmueble_".$num_mat_prop;//nom doc
                $ext = str_replace('.', '', strrchr($_FILES['dafprop']['name'], '.'));//ext_arch_sop
                $newdocument = "Doc_Auto_Fianza_Inmueble_".$num_con.".".$ext;//ext_arch_sop
                $urldirdocument = $urldir."/".$newdocument;//rep_sop

                $docVO = new documentVO();
                $docVO->setCod_carp($cod_file_search); 
                $docVO->setId_subse($subserie_doc_prop);
                $docVO->setNom_doc($namedocument);
                $docVO->setDesc_doc($newdocument);
                $docVO->setTip_arch_doc($tiparchdoc); 
                $docVO->setOrden_doc($orden_doc); 
                $docVO->setCod_doc_prop($cod_doc_prop);
                $getdocument->create($docVO);

                $docVOsearch = new documentVO();
                $docVOsearch = $getdocument->readDocumentfile($cod_file_search,$subserie_doc_prop,$namedocument);

                $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search

                $sopVO = new soporteVO();

                $sopVO->setCod_docs($cod_doc_search);
                $sopVO->setNom_sop($newdocument);
                $sopVO->setExt_arch_sop($ext);
                $sopVO->setRep_sop($urldirdocument);
                $sopVO->setOrden_sop($orden_sop);
                $getsoporte->create($sopVO);

                $filedir = opendir($inmueble);
                $rutedir = $inmueble."/".$newdocument;
                move_uploaded_file($_FILES['dafprop']['tmp_name'], $rutedir);
                closedir($filedir);
            }

            if(isset($_FILES['filesdocument0'])){
               
                foreach($_FILES['filesdocument0']['tmp_name'] as $file=>$value){

                    if($file == 0){
                        if(!empty($_FILES['filesdocument0']['tmp_name'][$file])){

                            $tiparchdoc = $_FILES['filesdocument0']['type'][$file];//tip_arch_doc
                            $namedocument = "Contrato_Mandato_".$num_con;//nom doc
                            $ext = str_replace('.', '', strrchr($_FILES['filesdocument0']['name'][$file], '.')); //ext_arch_sop
                            $newdocument = "Contrato_Mandato_".$num_con.".".$ext; //desc doc //name sop
                            $urldirdocument = $urldir."/".$newdocument;//rep_sop

                            $docVOsearch = new documentVO();
                            $docVOsearch = $getdocument->readDocumentfileordendoc($cod_file_search,$subserie_doc_pers,$file);

                            $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search

                            $datasop = array();

                            $datasop = $getsoporte->readSoporteDocument($cod_file_search,$subserie_doc_pers,$cod_doc_search);

                            foreach($datasop as $sop){

                                $rutedirupdatesop = strval($sop->getRep_sop());
                                $rutedirupdate = $nameruteraiz."/".$rutedirupdatesop;
                                $rutedir = $inmueble."/".$newdocument;

                                if(file_exists($rutedirupdate)){
                                    unlink($rutedirupdate);
                                    move_uploaded_file($_FILES['filesdocument0']['tmp_name'][$file], $rutedir);
                                    $sopVO = new soporteVO();
                                    $sopVO->setId_sop($sop->getId_sop());
                                    $sopVO->setCod_docs($cod_doc_search);
                                    $sopVO->setNom_sop($newdocument);
                                    $sopVO->setExt_arch_sop($ext);
                                    $sopVO->setRep_sop($urldirdocument);
                                    $getsoporte->update($sopVO);
                                }
                            }
                        }
                    }

                    if($file == 1){
                        if(!empty($_FILES['filesdocument0']['tmp_name'][$file])){

                            $tiparchdoc = $_FILES['filesdocument0']['type'][$file]; //tip_arch_doc
                            $namedocument = "Fotocopia_Cédula_".$ced_pers;//nom doc
                            $ext = str_replace('.', '', strrchr($_FILES['filesdocument0']['name'][$file], '.'));//ext_arch_sop
                            $newdocument = "Fot_Ced_Propietario_".$num_con.".".$ext; //desc doc //name sop
                            $urldirdocument = $urldir."/".$newdocument;//rep_sop

                            $docVOsearch = new documentVO();
                            $docVOsearch = $getdocument->readDocumentfileordendoc($cod_file_search,$subserie_doc_pers,$file);

                            $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search

                            $datasop = array();

                            $datasop = $getsoporte->readSoporteDocument($cod_file_search,$subserie_doc_pers,$cod_doc_search);

                            foreach($datasop as $sop){

                                $rutedirupdatesop = strval($sop->getRep_sop());
                                $rutedirupdate = $nameruteraiz."/".$rutedirupdatesop;
                                $rutedir = $inmueble."/".$newdocument;

                                if(file_exists($rutedirupdate)){
                                    unlink($rutedirupdate);
                                    move_uploaded_file($_FILES['filesdocument0']['tmp_name'][$file], $rutedir);
                                    $sopVO = new soporteVO();
                                    $sopVO->setId_sop($sop->getId_sop());
                                    $sopVO->setCod_docs($cod_doc_search);
                                    $sopVO->setNom_sop($newdocument);
                                    $sopVO->setExt_arch_sop($ext);
                                    $sopVO->setRep_sop($urldirdocument);
                                    $getsoporte->update($sopVO);
                                }
                            }
                        }

                    }
                    
                    if($file == 2){

                        if(!empty($_FILES['filesdocument0']['tmp_name'][$file])){

                            $tiparchdoc = $_FILES['filesdocument0']['type'][$file]; //tip_arch_doc
                            $namedocument = "Copia_Rut_Propietario_".$ced_pers;//nom doc
                            $ext = str_replace('.', '', strrchr($_FILES['filesdocument0']['name'][$file], '.'));//ext_arch_sop
                            $newdocument = "Copia_Rut_Propietario_".$num_con.".".$ext; //desc doc //name sop
                            $urldirdocument = $urldir."/".$newdocument;//rep_sop

                            $docVOsearch = new documentVO();
                            $docVOsearch = $getdocument->readDocumentfileordendoc($cod_file_search,$subserie_doc_pers,$file);

                            $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search

                            $datasop = array();

                            $datasop = $getsoporte->readSoporteDocument($cod_file_search,$subserie_doc_pers,$cod_doc_search);

                            foreach($datasop as $sop){

                                $rutedirupdatesop = strval($sop->getRep_sop());
                                $rutedirupdate = $nameruteraiz."/".$rutedirupdatesop;
                                $rutedir = $inmueble."/".$newdocument;

                                if(file_exists($rutedirupdate)){
                                    unlink($rutedirupdate);
                                    move_uploaded_file($_FILES['filesdocument0']['tmp_name'][$file], $rutedir);
                                    $sopVO = new soporteVO();
                                    $sopVO->setId_sop($sop->getId_sop());
                                    $sopVO->setCod_docs($cod_doc_search);
                                    $sopVO->setNom_sop($newdocument);
                                    $sopVO->setExt_arch_sop($ext);
                                    $sopVO->setRep_sop($urldirdocument);
                                    $getsoporte->update($sopVO);
                                }
                            }
                        }

                    }

                    if($file == 3){

                        if(!empty($_FILES['filesdocument0']['tmp_name'][$file])){

                            $tiparchdoc = $_FILES['filesdocument0']['type'][$file]; //tip_arch_doc
                            $namedocument = "Cert_Bancaria_Propietario_".$ced_pers;//nom doc
                            $ext = str_replace('.', '', strrchr($_FILES['filesdocument0']['name'][$file], '.'));//ext_arch_sop
                            $newdocument = "Cert_Bancaria_Propietario_".$num_con.".".$ext; //desc doc //name sop
                            $urldirdocument = $urldir."/".$newdocument;//rep_sop

                            $docVOsearch = new documentVO();
                            $docVOsearch = $getdocument->readDocumentfileordendoc($cod_file_search,$subserie_doc_pers,$file);

                            $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search

                            $datasop = array();

                            $datasop = $getsoporte->readSoporteDocument($cod_file_search,$subserie_doc_pers,$cod_doc_search);

                            foreach($datasop as $sop){

                                $rutedirupdatesop = strval($sop->getRep_sop());
                                $rutedirupdate = $nameruteraiz."/".$rutedirupdatesop;
                                $rutedir = $inmueble."/".$newdocument;

                                if(file_exists($rutedirupdate)){
                                    unlink($rutedirupdate);
                                    move_uploaded_file($_FILES['filesdocument0']['tmp_name'][$file], $rutedir);
                                    $sopVO = new soporteVO();
                                    $sopVO->setId_sop($sop->getId_sop());
                                    $sopVO->setCod_docs($cod_doc_search);
                                    $sopVO->setNom_sop($newdocument);
                                    $sopVO->setExt_arch_sop($ext);
                                    $sopVO->setRep_sop($urldirdocument);
                                    $getsoporte->update($sopVO);
                                }
                            }
                        }

                    }
                }
                
            }

            if(isset($_FILES['filesdocument1'])){

                foreach($_FILES['filesdocument1']['tmp_name'] as $file=>$value){

                    if($file == 0){
                        if(!empty($_FILES['filesdocument1']['tmp_name'][$file])){

                            $tiparchdoc = $_FILES['filesdocument1']['type'][$file];//tip_arch_doc
                            $namedocument = "Escrituras_Inmueble_".$num_mat_prop;//nom doc
                            $ext = str_replace('.', '', strrchr($_FILES['filesdocument1']['name'][$file], '.'));//ext_arch_sop
                            $newdocument = "Escrituras_Inmueble_".$num_con.".".$ext; //desc doc //name sop
                            $urldirdocument = $urldir."/".$newdocument;//rep_sop


                            $docVOsearch = new documentVO();
                            $docVOsearch = $getdocument->readDocumentfileordendoc($cod_file_search,$subserie_doc_prop,$file);

                            $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search

                            $datasop = array();

                            $datasop = $getsoporte->readSoporteDocument($cod_file_search,$subserie_doc_prop,$cod_doc_search);

                            foreach($datasop as $sop){

                                $rutedirupdatesop = strval($sop->getRep_sop());
                                $rutedirupdate = $nameruteraiz."/".$rutedirupdatesop;
                                $rutedir = $inmueble."/".$newdocument;

                                if(file_exists($rutedirupdate)){
                                    unlink($rutedirupdate);
                                    move_uploaded_file($_FILES['filesdocument1']['tmp_name'][$file], $rutedir);
                                    $sopVO = new soporteVO();
                                    $sopVO->setId_sop($sop->getId_sop());
                                    $sopVO->setCod_docs($cod_doc_search);
                                    $sopVO->setNom_sop($newdocument);
                                    $sopVO->setExt_arch_sop($ext);
                                    $sopVO->setRep_sop($urldirdocument);
                                    $getsoporte->update($sopVO);
                                }
                            }
                        }
                    }
                    
                    if($file == 1){

                        if(!empty($_FILES['filesdocument1']['tmp_name'][$file])){

                            $tiparchdoc = $_FILES['filesdocument1']['type'][$file];//tip_arch_doc
                            $namedocument = "Cert_Lib_Extra_Inmueble_".$num_mat_prop;//nom doc
                            $ext = str_replace('.', '', strrchr($_FILES['filesdocument1']['name'][$file], '.'));//ext_arch_sop
                            $newdocument = "Cert_Lib_Extra_Inmueble_".$num_con.".".$ext; //desc doc //name sop
                            $urldirdocument = $urldir."/".$newdocument;//rep_sop


                            $docVOsearch = new documentVO();
                            $docVOsearch = $getdocument->readDocumentfileordendoc($cod_file_search,$subserie_doc_prop,$file);

                            $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search

                            $datasop = array();

                            $datasop = $getsoporte->readSoporteDocument($cod_file_search,$subserie_doc_prop,$cod_doc_search);

                            foreach($datasop as $sop){

                                $rutedirupdatesop = strval($sop->getRep_sop());
                                $rutedirupdate = $nameruteraiz."/".$rutedirupdatesop;
                                $rutedir = $inmueble."/".$newdocument;

                                if(file_exists($rutedirupdate)){
                                    unlink($rutedirupdate);
                                    move_uploaded_file($_FILES['filesdocument1']['tmp_name'][$file], $rutedir);
                                    $sopVO = new soporteVO();
                                    $sopVO->setId_sop($sop->getId_sop());
                                    $sopVO->setCod_docs($cod_doc_search);
                                    $sopVO->setNom_sop($newdocument);
                                    $sopVO->setExt_arch_sop($ext);
                                    $sopVO->setRep_sop($urldirdocument);
                                    $getsoporte->update($sopVO);
                                }
                            }
                        }
                        
                    }

                    if($file == 2){

                        if(!empty($_FILES['filesdocument1']['tmp_name'][$file])){

                            $tiparchdoc = $_FILES['filesdocument1']['type'][$file];//tip_arch_doc
                            $namedocument = "Doc_Desc_Inmueble_".$num_mat_prop;//nom doc
                            $ext = str_replace('.', '', strrchr($_FILES['filesdocument1']['name'][$file], '.'));//ext_arch_sop
                            $newdocument = "Doc_Desc_Inmueble_".$num_con.".".$ext; //desc doc //name sop
                            $urldirdocument = $urldir."/".$newdocument;//rep_sop


                            $docVOsearch = new documentVO();
                            $docVOsearch = $getdocument->readDocumentfileordendoc($cod_file_search,$subserie_doc_prop,$file);

                            $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search

                            $datasop = array();

                            $datasop = $getsoporte->readSoporteDocument($cod_file_search,$subserie_doc_prop,$cod_doc_search);

                            foreach($datasop as $sop){

                                $rutedirupdatesop = strval($sop->getRep_sop());
                                $rutedirupdate = $nameruteraiz."/".$rutedirupdatesop;
                                $rutedir = $inmueble."/".$newdocument;

                                if(file_exists($rutedirupdate)){
                                    unlink($rutedirupdate);
                                    move_uploaded_file($_FILES['filesdocument1']['tmp_name'][$file], $rutedir);
                                    $sopVO = new soporteVO();
                                    $sopVO->setId_sop($sop->getId_sop());
                                    $sopVO->setCod_docs($cod_doc_search);
                                    $sopVO->setNom_sop($newdocument);
                                    $sopVO->setExt_arch_sop($ext);
                                    $sopVO->setRep_sop($urldirdocument);
                                    $getsoporte->update($sopVO);
                                }
                            }
                        }
                        
                    }
                    
                    if($file == 3){
                        
                        if(!empty($_FILES['filesdocument1']['tmp_name'][$file])){

                            $tiparchdoc = $_FILES['filesdocument1']['type'][$file];//tip_arch_doc
                            $namedocument = "Doc_Auto_Fianza_Inmueble_".$num_mat_prop;//nom doc
                            $ext = str_replace('.', '', strrchr($_FILES['filesdocument1']['name'][$file], '.'));//ext_arch_sop
                            $newdocument = "Doc_Auto_Fianza_Inmueble_".$num_con.".".$ext;//ext_arch_sop
                            $urldirdocument = $urldir."/".$newdocument;//rep_sop


                            $docVOsearch = new documentVO();
                            $docVOsearch = $getdocument->readDocumentfileordendoc($cod_file_search,$subserie_doc_prop,$file);

                            $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search

                            $datasop = array();

                            $datasop = $getsoporte->readSoporteDocument($cod_file_search,$subserie_doc_prop,$cod_doc_search);

                            foreach($datasop as $sop){

                                $rutedirupdatesop = strval($sop->getRep_sop());
                                $rutedirupdate = $nameruteraiz."/".$rutedirupdatesop;
                                $rutedir = $inmueble."/".$newdocument;

                                if(file_exists($rutedirupdate)){
                                    unlink($rutedirupdate);
                                    move_uploaded_file($_FILES['filesdocument1']['tmp_name'][$file], $rutedir);
                                    $sopVO = new soporteVO();
                                    $sopVO->setId_sop($sop->getId_sop());
                                    $sopVO->setCod_docs($cod_doc_search);
                                    $sopVO->setNom_sop($newdocument);
                                    $sopVO->setExt_arch_sop($ext);
                                    $sopVO->setRep_sop($urldirdocument);
                                    $getsoporte->update($sopVO);
                                }
                            }
                        }
                    }

                }
            }
            
            //Modificar imagenes del inmueble
            if(isset($_FILES['fotos1'])){
                $orden_doc = 4;
                $docVOsearch = new documentVO();
                $docVOsearch = $getdocument->readDocumentfileordendoc($cod_file_search,$subserie_doc_prop,$orden_doc);

                $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search

                $datasop = array();
                $datasop = $getsoporte->readSoporteDocument($cod_file_search,$subserie_doc_prop,$cod_doc_search);

                //echo "cod_doc_foto ".$cod_doc_search." ";

                foreach($_FILES['fotos1']['tmp_name'] as $file=>$value){
                    foreach($datasop as $indice=>$sop){
                        $orden_sopm = $sop->getOrden_sop();

                        if($file == $orden_sopm && $file == $indice){
                            $nom_sop = $sop->getNom_sop();
                            $rute_sop = strval($sop->getRep_sop());
                            $ext_sop = $sop->getExt_arch_sop();
                            $rutedirupdate = $nameruteraiz."/".$rute_sop."/".$nom_sop.".".$ext_sop;
                            $rutedirnew = $nameruteraiz."/".$rute_sop."/".$nom_sop.".".$ext_sop;

                                if(file_exists($rutedirupdate)){
                                    unlink($rutedirupdate);
                                    move_uploaded_file($_FILES['fotos1']['tmp_name'][$file], $rutedirnew);
                                    $sopVO = new soporteVO();
                                    $sopVO->setId_sop($sop->getId_sop());
                                    $sopVO->setCod_docs($cod_doc_search);
                                    $sopVO->setNom_sop($nom_sop);
                                    $sopVO->setExt_arch_sop($ext_sop);
                                    $sopVO->setOrden_sop($indice);
                                    $sopVO->setRep_sop($rute_sop);
                                    $getsoporte->update($sopVO);
                                }
                        }
                    }

                }

            }

            //Cargar nuevas fotos del inmueble
            if(isset($_FILES['fotos'])){
                $orden_doc = 4;
                $docVOsearch = $getdocument->readDocumentfileordendoc($cod_file_search,$subserie_doc_prop,$orden_doc);

                $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search

                $files = 0;
                $contarsop = $getdocument->countSopdocumentcarp($cod_file_search, $cod_doc_search);

                $files = $contarsop;

                foreach($_FILES['fotos']['tmp_name'] as $file=>$value){
                    $tiparchdoc = $_FILES['fotos']['type'][$file];//tip_arch_doc
                    $extimg = str_replace('.', '', strrchr($_FILES['fotos']['name'][$file], '.'));//ext_arch_sop
                    $newimg = "Foto_".$files."_".$num_con.".".$extimg;//nom_sop
                    $newimgbd = "Foto_".$files."_".$num_con; //image en la base de datos
                    $urldirimg = $urldir."/".$newimg;//rep_sop 
                    $urldirimgbd = $urldir; //dir rep en la base de datos
                    $orden_sop = $files;

                    $sopVO = new soporteVO();

                    $sopVO->setCod_docs($cod_doc_search);
                    $sopVO->setNom_sop($newimgbd);
                    $sopVO->setExt_arch_sop($extimg);
                    $sopVO->setRep_sop($urldirimgbd);
                    $sopVO->setOrden_sop($orden_sop);
                    $getsoporte->create($sopVO);

                    $rutedir = $inmueble."/".$newimg;
                    move_uploaded_file($_FILES['fotos']['tmp_name'][$file],$rutedir);
                    $files++;
                }   
            }
    
        }
    }

    if(isset($_POST['accion']) && $_POST['accion'] == "delete"){
        
    }


?>