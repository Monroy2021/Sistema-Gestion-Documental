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
$namerutedoce = $_SERVER['DOCUMENT_ROOT']."/sistema/Controllers/controllercontractleasing.php";
$namerutetrece = $_SERVER['DOCUMENT_ROOT']."/sistema/Models/ValueObjects/contractleasingVO.php";
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
$getcontractleasing = new controllercontractleasing();

    if(isset($_POST['accion']) && $_POST['accion'] == "search"){
        
        $arreglo = array();
        $datatable = array();

            $datatable = $getcontractleasing->readContractleasing();

            foreach($datatable as $r)
            {
                $elementos = array("id_prop"=>$r->getId_prop_ca(), 
                            "id_tip_prop"=>$r->getId_tip_prop_ca(),
                            "nom_tip_prop"=>$r->getNom_tip_prop_ca(),
                            "ced_pers"=>$r->getCed_pers_ca(),
                            "nom_ape_pers"=>$r->getNom_pers_ca()." ".$r->getApe_pers_ca(),
                            "cod_reg_oper"=>$r->getCod_reg_oper_ca(),
                            "estado_oper"=>$r->getEstado_oper_ca(),
                            "cod_reg_oper_dep"=>$r->getCod_reg_oper_dep_ca(),
                            "id_tip_oper"=>$r->getId_tip_oper_ca(),
                            "nom_tip_oper"=>$r->getNom_tip_oper_ca(),
                            "cod_arch"=>$r->getCod_arch_ca(), 
                            "nom_num_arch"=>$r->getNom_arch_ca()."".$r->getNum_arch_ca(), 
                            "id_serie"=>$r->getId_serie_ca(),
                            "nom_serie"=>$r->getNom_serie_ca()
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

        //data codeudor1
        $id_empc1 = $_POST['idempc1'];
        $ced_persc1 = $_POST['cedpersc1'];//data important
        $name_persc1 = $_POST['namepersc1'];
        $last_persc1 = $_POST['lastpersc1'];
        $fec_exp_cc_persc1 = $_POST['dateccpersc1'];
        $cel_persc1 = $_POST['celpersc1'];
        $tel_persc1 = $_POST['telepersc1'];
        $email_persc1 = $_POST['corpersc1'];
        $sex_persc1 = $_POST['sexpersc1'];
        $dir_persc1 = $_POST['dirpersc1'];
        $ciud_persc1 = $_POST['ciudpersc1'];
        $fec_reg_persc1 = date("Y-m-d");
        $fec_act_persc1 = date("Y-m-d");

         //data codeudor2
         $id_empc2 = $_POST['idempc2'];
         $ced_persc2 = $_POST['cedpersc2'];//data important
         $name_persc2 = $_POST['namepersc2'];
         $last_persc2 = $_POST['lastpersc2'];
         $fec_exp_cc_persc2 = $_POST['dateccpersc2'];
         $cel_persc2 = $_POST['celpersc2'];
         $tel_persc2 = $_POST['telepersc2'];
         $email_persc2 = $_POST['corpersc2'];
         $sex_persc2 = $_POST['sexpersc2'];
         $dir_persc2 = $_POST['dirpersc2'];
         $ciud_persc2 = $_POST['ciudpersc2'];
         $fec_reg_persc2 = date("Y-m-d");
         $fec_act_persc2 = date("Y-m-d");

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

        $personc1VO = new personVO();
        $personc1VO = $getperson->readPerson($ced_persc1);

        if(!is_null($personc1VO->getCed_pers())){
            $persVO = new personVO();
            $persVO->setCed_pers($ced_persc1);
            $persVO->setId_emp($id_empc1);
            $persVO->setNom_pers($name_persc1);
            $persVO->setApe_pers($last_persc1);
            $persVO->setFec_exp_ced_pers($fec_exp_cc_persc1);
            $persVO->setCel_pers($cel_persc1);
            $persVO->setTel_pers($tel_persc1);
            $persVO->setEmail_pers($email_persc1);
            $persVO->setSex_pers($sex_persc1);
            $persVO->setDir_pers($dir_persc1);
            $persVO->setCiud_pers($ciud_persc1);
            $persVO->setFec_act_pers($fec_act_persc1);
            $getperson->update($persVO);  
        }
        else{
            $persVO = new personVO();
            $persVO->setCed_pers($ced_persc1);
            $persVO->setId_emp($id_empc1);
            $persVO->setNom_pers($name_persc1);
            $persVO->setApe_pers($last_persc1);
            $persVO->setFec_exp_ced_pers($fec_exp_cc_persc1);
            $persVO->setCel_pers($cel_persc1);
            $persVO->setTel_pers($tel_persc1);
            $persVO->setEmail_pers($email_persc1);
            $persVO->setSex_pers($sex_persc1);
            $persVO->setDir_pers($dir_persc1);
            $persVO->setCiud_pers($ciud_persc1);
            $persVO->setFec_reg_pers($fec_reg_persc1);
            $persVO->setFec_act_pers($fec_act_persc1); 
            $getperson->create($persVO);    
        }

        $personc2VO = new personVO();
        $personc2VO = $getperson->readPerson($ced_persc2);

        if(!is_null($personc2VO->getCed_pers())){
            $persVO = new personVO();
            $persVO->setCed_pers($ced_persc2);
            $persVO->setId_emp($id_empc2);
            $persVO->setNom_pers($name_persc2);
            $persVO->setApe_pers($last_persc2);
            $persVO->setFec_exp_ced_pers($fec_exp_cc_persc2);
            $persVO->setCel_pers($cel_persc2);
            $persVO->setTel_pers($tel_persc2);
            $persVO->setEmail_pers($email_persc2);
            $persVO->setSex_pers($sex_persc2);
            $persVO->setDir_pers($dir_persc2);
            $persVO->setCiud_pers($ciud_persc2);
            $persVO->setFec_act_pers($fec_act_persc2);
            $getperson->update($persVO);  
        }
        else{
            $persVO = new personVO();
            $persVO->setCed_pers($ced_persc2);
            $persVO->setId_emp($id_empc2);
            $persVO->setNom_pers($name_persc2);
            $persVO->setApe_pers($last_persc2);
            $persVO->setFec_exp_ced_pers($fec_exp_cc_persc2);
            $persVO->setCel_pers($cel_persc2);
            $persVO->setTel_pers($tel_persc2);
            $persVO->setEmail_pers($email_persc2);
            $persVO->setSex_pers($sex_persc2);
            $persVO->setDir_pers($dir_persc2);
            $persVO->setCiud_pers($ciud_persc2);
            $persVO->setFec_reg_pers($fec_reg_persc2);
            $persVO->setFec_act_pers($fec_act_persc2); 
            $getperson->create($persVO);    
        }
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////
        
        //valide property
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////

        //data prop
        $id_prop_leasing = $_POST["idpropar"];

        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////

        $validatepropVO = new propertyVO();
        $validatepropVO = $getproperty->readProp($id_prop_leasing);

        //data contract
        $num_con = $_POST['numcona'];
        $tip_con = $_POST['tipcona'];
        $tip_con_nom = $_POST['tipconoma'];
        $pers_con = $_POST['perscona'];
        $orden_pers_cona = 1;
        $pers_conc1 = $_POST['persconac1'];
        $orden_pers_conc1 = 2;
        $pers_conc2 = $_POST['persconac2'];
        $orden_pers_conc2 = 3;

        $estado_oper = 0;
        $cod_reg_oper_dep = $_POST['codregopercontractmandate'];;
        $fec_oper = date("Y-m-d");

        if($validatepropVO != null && $validatepropVO !=""){
             ///////////////////////////////////////////////////////////////////////////////////////////////////////////////

            //valide operation
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

            $newoperationVO = new operationVO();
            $newoperationVO = $getoperation->readOper($num_con);
            
            if($newoperationVO != null && $newoperationVO !=""){
                $operVO = new operationVO();
                $operVO->setCod_reg_oper($num_con);
                $operVO->setId_tip_oper($tip_con);
                $operVO->setId_prop_oper($id_prop_leasing);
                $operVO->setDesc_oper($tip_con_nom);
                $operVO->setCod_reg_oper_dep($cod_reg_oper_dep);
                $operVO->setEstado_oper($estado_oper); 
                $getoperation->update($operVO); 
            }
            else{
                $operVO = new operationVO();
                $operVO->setCod_reg_oper($num_con);
                $operVO->setId_tip_oper($tip_con);
                $operVO->setId_prop_oper($id_prop_leasing);
                $operVO->setDesc_oper($tip_con_nom); 
                $operVO->setCod_reg_oper_dep($cod_reg_oper_dep);
                $operVO->setEstado_oper($estado_oper);
                $operVO->setFec_oper($fec_oper);
                $getoperation->create($operVO);

                //data contract arrendatario
                $conVO = new contractVO();
                $conVO->setCed_pers_con($ced_pers);
                $conVO->setCod_reg_oper_con($num_con);
                $conVO->setId_tip_pers_con($pers_con);
                $getcontract->create($conVO);

                //data contract codeudor1
                $conc1VO = new contractVO();
                $conc1VO->setCed_pers_con($ced_persc1);
                $conc1VO->setCod_reg_oper_con($num_con);
                $conc1VO->setId_tip_pers_con($pers_conc1);
                $getcontract->create($conc1VO);

                //data contract codeudor2
                $conc2VO = new contractVO();
                $conc2VO->setCed_pers_con($ced_persc2);
                $conc2VO->setCod_reg_oper_con($num_con);
                $conc2VO->setId_tip_pers_con($pers_conc2);
                $getcontract->create($conc2VO);
            }

            //////////////////////////////////////////////////////////////////////////////////////////////////////////////

        }

        //////////////////////////////////////////////////////////////////////////////////////////////////////////////

        //valide folder
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $arch_con = $_POST['archcona'];//cod archivo documental
        $arch_con_nom = $_POST['archconnoma'];//nom archivo documental

        $arch_file_prin = $_POST['archfilea'];//cod tip file =>Principal
        $arch_file_name_prin = $_POST['archfilenamea']; //nom tip file=> Principal

        $arch_file_aux = $_POST['folderauxiliar'];//cod tip file =>Auxiliar
        $arch_file_name_aux = $_POST['nomfolderauxiliar']; //nom tip file=>Auxiliar

        //Folder documents
        $namefile = $_SERVER['DOCUMENT_ROOT']."/sistema/Folder/archivo/"; 
        $folder = $namefile.$arch_con_nom;// /sistema/Folder/archivo/A1
        $folderprop = $folder."/Arriendos";// /sistema/Folder/archivo/A1/Arriendos
        $filearriendo = $folderprop."/".$tip_con_nom."".$num_con; //  /sistema/Folder/archivo/A1/Arriendos/Arriendo#####
        
        //folder documents principal y auxiliar
        $descfileprin = $arch_file_name_prin."".$num_con; //desc file principal####
        $descfileaux = $arch_file_name_aux."".$num_con; //desc file auxiliar####

        //url para crear folders Principal y auxiliar
        $urlfileprin = $filearriendo."/".$descfileprin;
        $urlfileaux = $filearriendo."/".$descfileaux;

        //Folder documents base de datos
        $urldir = "Folder/archivo/".$arch_con_nom."/Arriendos"."/".$tip_con_nom."".$num_con; //url for bd

        //search cod_carp Principal y Auxiliar
        $validatefileVOprin = new fileVO();
        $validatefileVOprin = $getfolder->readFilecontract($arch_file_prin, $num_con);

        $validatefileVOaux = new fileVO();
        $validatefileVOaux = $getfolder->readFilecontract($arch_file_aux, $num_con);

        if($validatefileVOprin != null && $validatefileVOprin != "" && $validatefileVOaux != null && $validatefileVOaux != ""){
            //update file Principal
            $fileprinVO = new fileVO();
            $fileprinVO->setCod_tip_carp($arch_file_prin); //cod_tip_carp =>Principal
            $fileprinVO->setCod_reg_oper($num_con); //cod_reg_oper
            $fileprinVO->setDes_carp($descfileprin);
            $getfolder->update($fileprinVO);

            //update file Auxiliar
            $fileauxVO = new fileVO();
            $fileauxVO->setCod_tip_carp($arch_file_aux); //cod_tip_carp =>Auxiliar
            $fileauxVO->setCod_reg_oper($num_con); //cod_reg_oper
            $fileauxVO->setDes_carp($descfileaux);
            $getfolder->update($fileauxVO);
        }
        else{
            //create file Principal
            $fileprinVO = new fileVO();
            $fileprinVO->setCod_tip_carp($arch_file_prin); //cod_tip_carp =>Principal
            $fileprinVO->setCod_reg_oper($num_con); //cod_reg_oper
            $fileprinVO->setDes_carp($descfileprin);
            $getfolder->create($fileprinVO);

            //create file Auxiliar
            $fileauxVO = new fileVO();
            $fileauxVO->setCod_tip_carp($arch_file_aux); //cod_tip_carp =>Auxiliar
            $fileauxVO->setCod_reg_oper($num_con); //cod_reg_oper
            $fileauxVO->setDes_carp($descfileaux);
            $getfolder->create($fileauxVO);
        }

        //search cod_carp Principal
        $fileVOsearchprin = new fileVO();
        $fileVOsearchprin = $getfolder->readFilecontract($arch_file_prin, $num_con);

        //search cod_carp Auxiliar
        $fileVOsearchaux = new fileVO();
        $fileVOsearchaux = $getfolder->readFilecontract($arch_file_aux, $num_con);

        ///////////////////////////////////////////////////////////////////////////////////////////////////////

        //cod_carp Principal
        $cod_file_search_prin = $fileVOsearchprin->getCod_carp();//cod_carp
        $cod_doc_prop_prin = 0;

        //cod_carp Auxiliar
        $cod_file_search_aux = $fileVOsearchaux->getCod_carp();//cod_carp
        $cod_doc_prop_aux = 0; //este valor va cambiar

        //subserie documentales contrato de arrendamiento
        $subserie_form_vinc = $_POST['subserievina']; //id_suberie formatos de vinculacion
        $subserie_con_ar = $_POST['subserieca']; //id_suberie contrato de arrendamiento
        $subserie_req_ar = $_POST['subseriearr']; //id_subserie requisitos de arrendatario
        $subserie_req_prop = $_POST['subserieprop']; //id_subserie requisitos de propietario
        
        if(file_exists($folder) && file_exists($folderprop)){
            mkdir($filearriendo);
            mkdir($urlfileprin);
            mkdir($urlfileaux);

            if(file_exists($urlfileprin)){

                if(isset($_FILES['forvinca'])){
                    $orden_document = 0;
                    $orden_sop = 0;
                    $tiparchdoc = $_FILES['forvinca']['type']; //tip_arch_doc
                    $namedocument = "Sol_Vin_Arriendo_Arrendatario_".$num_con;//nom doc
                    $ext = str_replace('.', '', strrchr($_FILES['forvinca']['name'], '.')); //ext_arch_sop
                    $newdocument = "Sol_Vin_Arriendo_Arrendatario_".$num_con.".".$ext; //desc doc //name sop
                    $urldirdocument = $urldir."/".$descfileprin."/".$newdocument;//rep_sop
    
                    $docVO = new documentVO();
                    $docVO->setCod_carp($cod_file_search_prin); 
                    $docVO->setId_subse($subserie_form_vinc);
                    $docVO->setNom_doc($namedocument);
                    $docVO->setDesc_doc($newdocument);
                    $docVO->setTip_arch_doc($tiparchdoc);
                    $docVO->setOrden_doc($orden_document); 
                    $docVO->setCod_doc_prop($cod_doc_prop_prin);
                    $getdocument->create($docVO);
    
                    $docVOsearch = new documentVO();
                    $docVOsearch = $getdocument->readDocumentfile($cod_file_search_prin,$subserie_form_vinc,$namedocument);
    
                    $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search
    
                    $sopVO = new soporteVO();
    
                    $sopVO->setCod_docs($cod_doc_search);
                    $sopVO->setNom_sop($newdocument);
                    $sopVO->setExt_arch_sop($ext);
                    $sopVO->setOrden_sop($orden_sop);
                    $sopVO->setRep_sop($urldirdocument);
                    $getsoporte->create($sopVO);
    
                    $filedir = opendir($urlfileprin);
                    $rutedir = $urlfileprin."/".$newdocument;
                    move_uploaded_file($_FILES['forvinca']['tmp_name'], $rutedir);
                    closedir($filedir);
                }

                if(isset($_FILES['autousodataa'])){
                    $orden_document = 1;
                    $orden_sop = 0;
                    $tiparchdoc = $_FILES['autousodataa']['type']; //tip_arch_doc
                    $namedocument = "Auto_Datos_Personales_Arrendatario_".$num_con;//nom doc
                    $ext = str_replace('.', '', strrchr($_FILES['autousodataa']['name'], '.')); //ext_arch_sop
                    $newdocument = "Auto_Datos_Personales_Arrendatario_".$num_con.".".$ext; //desc doc //name sop
                    $urldirdocument = $urldir."/".$descfileprin."/".$newdocument;//rep_sop
    
                    $docVO = new documentVO();
                    $docVO->setCod_carp($cod_file_search_prin); 
                    $docVO->setId_subse($subserie_form_vinc);
                    $docVO->setNom_doc($namedocument);
                    $docVO->setDesc_doc($newdocument);
                    $docVO->setTip_arch_doc($tiparchdoc);
                    $docVO->setOrden_doc($orden_document); 
                    $docVO->setCod_doc_prop($cod_doc_prop_prin);
                    $getdocument->create($docVO);
    
                    $docVOsearch = new documentVO();
                    $docVOsearch = $getdocument->readDocumentfile($cod_file_search_prin,$subserie_form_vinc,$namedocument);
    
                    $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search
    
                    $sopVO = new soporteVO();
    
                    $sopVO->setCod_docs($cod_doc_search);
                    $sopVO->setNom_sop($newdocument);
                    $sopVO->setExt_arch_sop($ext);
                    $sopVO->setOrden_sop($orden_sop);
                    $sopVO->setRep_sop($urldirdocument);
                    $getsoporte->create($sopVO);
    
                    $filedir = opendir($urlfileprin);
                    $rutedir = $urlfileprin."/".$newdocument;
                    move_uploaded_file($_FILES['autousodataa']['tmp_name'], $rutedir);
                    closedir($filedir);
                }

                if(isset($_FILES['forvincuno'])){
                    $orden_document = 2;
                    $orden_sop = 0;
                    $tiparchdoc = $_FILES['forvincuno']['type']; //tip_arch_doc
                    $namedocument = "Sol_Vin_Arriendo_CodeudorUno_".$num_con;//nom doc
                    $ext = str_replace('.', '', strrchr($_FILES['forvincuno']['name'], '.')); //ext_arch_sop
                    $newdocument = "Sol_Vin_Arriendo_CodeudorUno_".$num_con.".".$ext; //desc doc //name sop
                    $urldirdocument = $urldir."/".$descfileprin."/".$newdocument;//rep_sop
    
                    $docVO = new documentVO();
                    $docVO->setCod_carp($cod_file_search_prin); 
                    $docVO->setId_subse($subserie_form_vinc);
                    $docVO->setNom_doc($namedocument);
                    $docVO->setDesc_doc($newdocument);
                    $docVO->setTip_arch_doc($tiparchdoc);
                    $docVO->setOrden_doc($orden_document); 
                    $docVO->setCod_doc_prop($cod_doc_prop_prin);
                    $getdocument->create($docVO);
    
                    $docVOsearch = new documentVO();
                    $docVOsearch = $getdocument->readDocumentfile($cod_file_search_prin,$subserie_form_vinc,$namedocument);
    
                    $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search
    
                    $sopVO = new soporteVO();
    
                    $sopVO->setCod_docs($cod_doc_search);
                    $sopVO->setNom_sop($newdocument);
                    $sopVO->setExt_arch_sop($ext);
                    $sopVO->setOrden_sop($orden_sop);
                    $sopVO->setRep_sop($urldirdocument);
                    $getsoporte->create($sopVO);
    
                    $filedir = opendir($urlfileprin);
                    $rutedir = $urlfileprin."/".$newdocument;
                    move_uploaded_file($_FILES['forvincuno']['tmp_name'], $rutedir);
                    closedir($filedir);
                }

                if(isset($_FILES['autousodatacuno'])){
                    $orden_document = 3;
                    $orden_sop = 0;
                    $tiparchdoc = $_FILES['autousodatacuno']['type']; //tip_arch_doc
                    $namedocument = "Auto_Datos_Personales_CodeudorUno_".$num_con;//nom doc
                    $ext = str_replace('.', '', strrchr($_FILES['autousodatacuno']['name'], '.')); //ext_arch_sop
                    $newdocument = "Auto_Datos_Personales_CodeudorUno_".$num_con.".".$ext; //desc doc //name sop
                    $urldirdocument = $urldir."/".$descfileprin."/".$newdocument;//rep_sop
    
                    $docVO = new documentVO();
                    $docVO->setCod_carp($cod_file_search_prin); 
                    $docVO->setId_subse($subserie_form_vinc);
                    $docVO->setNom_doc($namedocument);
                    $docVO->setDesc_doc($newdocument);
                    $docVO->setTip_arch_doc($tiparchdoc);
                    $docVO->setOrden_doc($orden_document); 
                    $docVO->setCod_doc_prop($cod_doc_prop_prin);
                    $getdocument->create($docVO);
    
                    $docVOsearch = new documentVO();
                    $docVOsearch = $getdocument->readDocumentfile($cod_file_search_prin,$subserie_form_vinc,$namedocument);
    
                    $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search
    
                    $sopVO = new soporteVO();
    
                    $sopVO->setCod_docs($cod_doc_search);
                    $sopVO->setNom_sop($newdocument);
                    $sopVO->setExt_arch_sop($ext);
                    $sopVO->setOrden_sop($orden_sop);
                    $sopVO->setRep_sop($urldirdocument);
                    $getsoporte->create($sopVO);
    
                    $filedir = opendir($urlfileprin);
                    $rutedir = $urlfileprin."/".$newdocument;
                    move_uploaded_file($_FILES['autousodatacuno']['tmp_name'], $rutedir);
                    closedir($filedir);
                }
                
                if(isset($_FILES['forvincdos'])){
                    $orden_document = 4;
                    $orden_sop = 0;
                    $tiparchdoc = $_FILES['forvincdos']['type']; //tip_arch_doc
                    $namedocument = "Sol_Vin_Arriendo_CodeudorDos_".$num_con;//nom doc
                    $ext = str_replace('.', '', strrchr($_FILES['forvincdos']['name'], '.')); //ext_arch_sop
                    $newdocument = "Sol_Vin_Arriendo_CodeudorDos_".$num_con.".".$ext; //desc doc //name sop
                    $urldirdocument = $urldir."/".$descfileprin."/".$newdocument;//rep_sop
    
                    $docVO = new documentVO();
                    $docVO->setCod_carp($cod_file_search_prin); 
                    $docVO->setId_subse($subserie_form_vinc);
                    $docVO->setNom_doc($namedocument);
                    $docVO->setDesc_doc($newdocument);
                    $docVO->setTip_arch_doc($tiparchdoc);
                    $docVO->setOrden_doc($orden_document); 
                    $docVO->setCod_doc_prop($cod_doc_prop_prin);
                    $getdocument->create($docVO);
    
                    $docVOsearch = new documentVO();
                    $docVOsearch = $getdocument->readDocumentfile($cod_file_search_prin,$subserie_form_vinc,$namedocument);
    
                    $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search
    
                    $sopVO = new soporteVO();
    
                    $sopVO->setCod_docs($cod_doc_search);
                    $sopVO->setNom_sop($newdocument);
                    $sopVO->setExt_arch_sop($ext);
                    $sopVO->setOrden_sop($orden_sop);
                    $sopVO->setRep_sop($urldirdocument);
                    $getsoporte->create($sopVO);
    
                    $filedir = opendir($urlfileprin);
                    $rutedir = $urlfileprin."/".$newdocument;
                    move_uploaded_file($_FILES['forvincdos']['tmp_name'], $rutedir);
                    closedir($filedir);
                }

                if(isset($_FILES['autousodatacdos'])){
                    $orden_document = 5;
                    $orden_sop = 0;
                    $tiparchdoc = $_FILES['autousodatacdos']['type']; //tip_arch_doc
                    $namedocument = "Auto_Datos_Personales_CodeudorDos_".$num_con;//nom doc
                    $ext = str_replace('.', '', strrchr($_FILES['autousodatacdos']['name'], '.')); //ext_arch_sop
                    $newdocument = "Auto_Datos_Personales_CodeudorDos_".$num_con.".".$ext; //desc doc //name sop
                    $urldirdocument = $urldir."/".$descfileprin."/".$newdocument;//rep_sop
    
                    $docVO = new documentVO();
                    $docVO->setCod_carp($cod_file_search_prin); 
                    $docVO->setId_subse($subserie_form_vinc);
                    $docVO->setNom_doc($namedocument);
                    $docVO->setDesc_doc($newdocument);
                    $docVO->setTip_arch_doc($tiparchdoc);
                    $docVO->setOrden_doc($orden_document); 
                    $docVO->setCod_doc_prop($cod_doc_prop_prin);
                    $getdocument->create($docVO);
    
                    $docVOsearch = new documentVO();
                    $docVOsearch = $getdocument->readDocumentfile($cod_file_search_prin,$subserie_form_vinc,$namedocument);
    
                    $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search
    
                    $sopVO = new soporteVO();
    
                    $sopVO->setCod_docs($cod_doc_search);
                    $sopVO->setNom_sop($newdocument);
                    $sopVO->setExt_arch_sop($ext);
                    $sopVO->setOrden_sop($orden_sop);
                    $sopVO->setRep_sop($urldirdocument);
                    $getsoporte->create($sopVO);
    
                    $filedir = opendir($urlfileprin);
                    $rutedir = $urlfileprin."/".$newdocument;
                    move_uploaded_file($_FILES['autousodatacdos']['tmp_name'], $rutedir);
                    closedir($filedir);
                }

                //Contrato de Arrendamiento

                if(isset($_FILES['conar'])){
                    $orden_document = 0;
                    $orden_sop = 0;
                    $tiparchdoc = $_FILES['conar']['type']; //tip_arch_doc
                    $namedocument = "Contrato_Arrendamiento_".$num_con;//nom doc
                    $ext = str_replace('.', '', strrchr($_FILES['conar']['name'], '.')); //ext_arch_sop
                    $newdocument = "Contrato_Arrendamiento_".$num_con.".".$ext; //desc doc //name sop
                    $urldirdocument = $urldir."/".$descfileprin."/".$newdocument;//rep_sop
    
                    $docVO = new documentVO();
                    $docVO->setCod_carp($cod_file_search_prin); 
                    $docVO->setId_subse($subserie_con_ar);
                    $docVO->setNom_doc($namedocument);
                    $docVO->setDesc_doc($newdocument);
                    $docVO->setTip_arch_doc($tiparchdoc);
                    $docVO->setOrden_doc($orden_document); 
                    $docVO->setCod_doc_prop($cod_doc_prop_prin);
                    $getdocument->create($docVO);
    
                    $docVOsearch = new documentVO();
                    $docVOsearch = $getdocument->readDocumentfile($cod_file_search_prin,$subserie_con_ar,$namedocument);
    
                    $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search
    
                    $sopVO = new soporteVO();
    
                    $sopVO->setCod_docs($cod_doc_search);
                    $sopVO->setNom_sop($newdocument);
                    $sopVO->setExt_arch_sop($ext);
                    $sopVO->setOrden_sop($orden_sop);
                    $sopVO->setRep_sop($urldirdocument);
                    $getsoporte->create($sopVO);
    
                    $filedir = opendir($urlfileprin);
                    $rutedir = $urlfileprin."/".$newdocument;
                    move_uploaded_file($_FILES['conar']['tmp_name'], $rutedir);
                    closedir($filedir);
                }
            }

            if(file_exists($urlfileaux)){

                if(isset($_FILES['fotceda'])){
                    $orden_document = 0;
                    $orden_sop = 0;
                    $tiparchdoc = $_FILES['fotceda']['type']; //tip_arch_doc
                    $namedocument = "Fot_Ced_Arrendatario_150_".$num_con;//nom doc
                    $ext = str_replace('.', '', strrchr($_FILES['fotceda']['name'], '.')); //ext_arch_sop
                    $newdocument = "Fot_Ced_Arrendatario_150_".$num_con.".".$ext; //desc doc //name sop
                    $urldirdocument = $urldir."/".$descfileaux."/".$newdocument;//rep_sop
    
                    $docVO = new documentVO();
                    $docVO->setCod_carp($cod_file_search_aux); 
                    $docVO->setId_subse($subserie_req_ar);
                    $docVO->setNom_doc($namedocument);
                    $docVO->setDesc_doc($newdocument);
                    $docVO->setTip_arch_doc($tiparchdoc);
                    $docVO->setOrden_doc($orden_document); 
                    $docVO->setCod_doc_prop($cod_doc_prop_aux);
                    $getdocument->create($docVO);
    
                    $docVOsearch = new documentVO();
                    $docVOsearch = $getdocument->readDocumentfile($cod_file_search_aux,$subserie_req_ar,$namedocument);
    
                    $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search
    
                    $sopVO = new soporteVO();
    
                    $sopVO->setCod_docs($cod_doc_search);
                    $sopVO->setNom_sop($newdocument);
                    $sopVO->setExt_arch_sop($ext);
                    $sopVO->setOrden_sop($orden_sop);
                    $sopVO->setRep_sop($urldirdocument);
                    $getsoporte->create($sopVO);
    
                    $filedir = opendir($urlfileaux);
                    $rutedir = $urlfileaux."/".$newdocument;
                    move_uploaded_file($_FILES['fotceda']['tmp_name'], $rutedir);
                    closedir($filedir);
                }

                if(isset($_FILES['copruta'])){
                    $orden_document = 1;
                    $orden_sop = 0;
                    $tiparchdoc = $_FILES['copruta']['type']; //tip_arch_doc
                    $namedocument = "Copia_Rut_Arrendatario_".$num_con;//nom doc
                    $ext = str_replace('.', '', strrchr($_FILES['copruta']['name'], '.')); //ext_arch_sop
                    $newdocument = "Copia_Rut_Arrendatario_".$num_con.".".$ext; //desc doc //name sop
                    $urldirdocument = $urldir."/".$descfileaux."/".$newdocument;//rep_sop
    
                    $docVO = new documentVO();
                    $docVO->setCod_carp($cod_file_search_aux); 
                    $docVO->setId_subse($subserie_req_ar);
                    $docVO->setNom_doc($namedocument);
                    $docVO->setDesc_doc($newdocument);
                    $docVO->setTip_arch_doc($tiparchdoc);
                    $docVO->setOrden_doc($orden_document); 
                    $docVO->setCod_doc_prop($cod_doc_prop_aux);
                    $getdocument->create($docVO);
    
                    $docVOsearch = new documentVO();
                    $docVOsearch = $getdocument->readDocumentfile($cod_file_search_aux,$subserie_req_ar,$namedocument);
    
                    $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search
    
                    $sopVO = new soporteVO();
    
                    $sopVO->setCod_docs($cod_doc_search);
                    $sopVO->setNom_sop($newdocument);
                    $sopVO->setExt_arch_sop($ext);
                    $sopVO->setOrden_sop($orden_sop);
                    $sopVO->setRep_sop($urldirdocument);
                    $getsoporte->create($sopVO);
    
                    $filedir = opendir($urlfileaux);
                    $rutedir = $urlfileaux."/".$newdocument;
                    move_uploaded_file($_FILES['copruta']['tmp_name'], $rutedir);
                    closedir($filedir);
                }

                if(isset($_FILES['sopactlaba'])){
                    $orden_document = 2;
                    $tiparchdoc = "Texto/Lectura"; //tip_arch_doc
                    $namedocument = "Sop_Act_Com_Labor_Arrendatario_".$num_con;//nom doc
                    $newdocument = "Sop_Act_Com_Labor_Arrendatario_".$num_con;//desc doc
    
                    $docVO = new documentVO();
                    $docVO->setCod_carp($cod_file_search_aux); 
                    $docVO->setId_subse($subserie_req_ar);
                    $docVO->setNom_doc($namedocument);
                    $docVO->setDesc_doc($newdocument);
                    $docVO->setTip_arch_doc($tiparchdoc); 
                    $docVO->setOrden_doc($orden_document); 
                    $docVO->setCod_doc_prop($cod_doc_prop_aux);
                    $getdocument->create($docVO);
    
                    $docVOsearch = new documentVO();
                    $docVOsearch = $getdocument->readDocumentfile($cod_file_search_aux,$subserie_req_ar,$namedocument);
    
                    $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search
    
    
                    $filedir = opendir($urlfileaux);
                    foreach($_FILES['sopactlaba']['tmp_name'] as $file=>$value){
                        $tiparchdoc = $_FILES['sopactlaba']['type'][$file];//tip_arch_doc
                        $ext = str_replace('.', '', strrchr($_FILES['sopactlaba']['name'][$file], '.'));//ext_arch_sop
                        $newdocument= "Sop_Act_Com_Labor_Arrendatario_".$file."_".$num_con.".".$ext;//nom_sop
                        $urldirdocument = $urldir."/".$descfileaux."/".$newdocument;//rep_sop 
    
                        $sopVO = new soporteVO();
    
                        $sopVO->setCod_docs($cod_doc_search);
                        $sopVO->setNom_sop($newdocument);
                        $sopVO->setExt_arch_sop($ext);
                        $sopVO->setOrden_sop($file);
                        $sopVO->setRep_sop($urldirdocument);
                        $getsoporte->create($sopVO);
    
                        $rutedir = $urlfileaux."/".$newdocument;
                        move_uploaded_file($_FILES['sopactlaba']['tmp_name'][$file],$rutedir);
                    }
                    closedir($filedir);
                }  

                if(isset($_FILES['fotcedc1'])){
                    $orden_document = 3;
                    $orden_sop = 0;
                    $tiparchdoc = $_FILES['fotcedc1']['type']; //tip_arch_doc
                    $namedocument = "Fot_Ced_CodeudorUno_150_".$num_con;//nom doc
                    $ext = str_replace('.', '', strrchr($_FILES['fotcedc1']['name'], '.')); //ext_arch_sop
                    $newdocument = "Fot_Ced_CodeudorUno_150_".$num_con.".".$ext; //desc doc //name sop
                    $urldirdocument = $urldir."/".$descfileaux."/".$newdocument;//rep_sop
    
                    $docVO = new documentVO();
                    $docVO->setCod_carp($cod_file_search_aux); 
                    $docVO->setId_subse($subserie_req_ar);
                    $docVO->setNom_doc($namedocument);
                    $docVO->setDesc_doc($newdocument);
                    $docVO->setTip_arch_doc($tiparchdoc);
                    $docVO->setOrden_doc($orden_document); 
                    $docVO->setCod_doc_prop($cod_doc_prop_aux);
                    $getdocument->create($docVO);
    
                    $docVOsearch = new documentVO();
                    $docVOsearch = $getdocument->readDocumentfile($cod_file_search_aux,$subserie_req_ar,$namedocument);
    
                    $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search
    
                    $sopVO = new soporteVO();
    
                    $sopVO->setCod_docs($cod_doc_search);
                    $sopVO->setNom_sop($newdocument);
                    $sopVO->setExt_arch_sop($ext);
                    $sopVO->setOrden_sop($orden_sop);
                    $sopVO->setRep_sop($urldirdocument);
                    $getsoporte->create($sopVO);
    
                    $filedir = opendir($urlfileaux);
                    $rutedir = $urlfileaux."/".$newdocument;
                    move_uploaded_file($_FILES['fotcedc1']['tmp_name'], $rutedir);
                    closedir($filedir);
                }

                if(isset($_FILES['coprutc1'])){
                    $orden_document = 4;
                    $orden_sop = 0;
                    $tiparchdoc = $_FILES['coprutc1']['type']; //tip_arch_doc
                    $namedocument = "Copia_Rut_CodeudorUno_".$num_con;//nom doc
                    $ext = str_replace('.', '', strrchr($_FILES['coprutc1']['name'], '.')); //ext_arch_sop
                    $newdocument = "Copia_Rut_CodeudorUno_".$num_con.".".$ext; //desc doc //name sop
                    $urldirdocument = $urldir."/".$descfileaux."/".$newdocument;//rep_sop
    
                    $docVO = new documentVO();
                    $docVO->setCod_carp($cod_file_search_aux); 
                    $docVO->setId_subse($subserie_req_ar);
                    $docVO->setNom_doc($namedocument);
                    $docVO->setDesc_doc($newdocument);
                    $docVO->setTip_arch_doc($tiparchdoc);
                    $docVO->setOrden_doc($orden_document); 
                    $docVO->setCod_doc_prop($cod_doc_prop_aux);
                    $getdocument->create($docVO);
    
                    $docVOsearch = new documentVO();
                    $docVOsearch = $getdocument->readDocumentfile($cod_file_search_aux,$subserie_req_ar,$namedocument);
    
                    $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search
    
                    $sopVO = new soporteVO();
    
                    $sopVO->setCod_docs($cod_doc_search);
                    $sopVO->setNom_sop($newdocument);
                    $sopVO->setExt_arch_sop($ext);
                    $sopVO->setOrden_sop($orden_sop);
                    $sopVO->setRep_sop($urldirdocument);
                    $getsoporte->create($sopVO);
    
                    $filedir = opendir($urlfileaux);
                    $rutedir = $urlfileaux."/".$newdocument;
                    move_uploaded_file($_FILES['coprutc1']['tmp_name'], $rutedir);
                    closedir($filedir);
                }

                if(isset($_FILES['sopactlabcuno'])){
                    $orden_document = 5;
                    $tiparchdoc = "Texto/Lectura"; //tip_arch_doc
                    $namedocument = "Sop_Act_Com_Labor_CodeudorUno_".$num_con;//nom doc
                    $newdocument = "Sop_Act_Com_Labor_CodeudorUno_".$num_con;//desc doc
    
                    $docVO = new documentVO();
                    $docVO->setCod_carp($cod_file_search_aux); 
                    $docVO->setId_subse($subserie_req_ar);
                    $docVO->setNom_doc($namedocument);
                    $docVO->setDesc_doc($newdocument);
                    $docVO->setTip_arch_doc($tiparchdoc); 
                    $docVO->setOrden_doc($orden_document); 
                    $docVO->setCod_doc_prop($cod_doc_prop_aux);
                    $getdocument->create($docVO);
    
                    $docVOsearch = new documentVO();
                    $docVOsearch = $getdocument->readDocumentfile($cod_file_search_aux,$subserie_req_ar,$namedocument);
    
                    $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search
    
    
                    $filedir = opendir($urlfileaux);
                    foreach($_FILES['sopactlabcuno']['tmp_name'] as $file=>$value){
                        $tiparchdoc = $_FILES['sopactlabcuno']['type'][$file];//tip_arch_doc
                        $ext = str_replace('.', '', strrchr($_FILES['sopactlabcuno']['name'][$file], '.'));//ext_arch_sop
                        $newdocument= "Sop_Act_Com_Labor_CodeudorUno_".$file."_".$num_con.".".$ext;//nom_sop
                        $urldirdocument = $urldir."/".$descfileaux."/".$newdocument;//rep_sop 
    
                        $sopVO = new soporteVO();
    
                        $sopVO->setCod_docs($cod_doc_search);
                        $sopVO->setNom_sop($newdocument);
                        $sopVO->setExt_arch_sop($ext);
                        $sopVO->setOrden_sop($file);
                        $sopVO->setRep_sop($urldirdocument);
                        $getsoporte->create($sopVO);
    
                        $rutedir = $urlfileaux."/".$newdocument;
                        move_uploaded_file($_FILES['sopactlabcuno']['tmp_name'][$file],$rutedir);
                    }
                    closedir($filedir);
                }  

                if(isset($_FILES['fotcedc2'])){
                    $orden_document = 6;
                    $orden_sop = 0;
                    $tiparchdoc = $_FILES['fotcedc2']['type']; //tip_arch_doc
                    $namedocument = "Fot_Ced_CodeudorDos_150_".$num_con;//nom doc
                    $ext = str_replace('.', '', strrchr($_FILES['fotcedc2']['name'], '.')); //ext_arch_sop
                    $newdocument = "Fot_Ced_CodeudorDos_150_".$num_con.".".$ext; //desc doc //name sop
                    $urldirdocument = $urldir."/".$descfileaux."/".$newdocument;//rep_sop
    
                    $docVO = new documentVO();
                    $docVO->setCod_carp($cod_file_search_aux); 
                    $docVO->setId_subse($subserie_req_ar);
                    $docVO->setNom_doc($namedocument);
                    $docVO->setDesc_doc($newdocument);
                    $docVO->setTip_arch_doc($tiparchdoc);
                    $docVO->setOrden_doc($orden_document); 
                    $docVO->setCod_doc_prop($cod_doc_prop_aux);
                    $getdocument->create($docVO);
    
                    $docVOsearch = new documentVO();
                    $docVOsearch = $getdocument->readDocumentfile($cod_file_search_aux,$subserie_req_ar,$namedocument);
    
                    $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search
    
                    $sopVO = new soporteVO();
    
                    $sopVO->setCod_docs($cod_doc_search);
                    $sopVO->setNom_sop($newdocument);
                    $sopVO->setExt_arch_sop($ext);
                    $sopVO->setOrden_sop($orden_sop);
                    $sopVO->setRep_sop($urldirdocument);
                    $getsoporte->create($sopVO);
    
                    $filedir = opendir($urlfileaux);
                    $rutedir = $urlfileaux."/".$newdocument;
                    move_uploaded_file($_FILES['fotcedc2']['tmp_name'], $rutedir);
                    closedir($filedir);
                }

                if(isset($_FILES['coprutc2'])){
                    $orden_document = 7;
                    $orden_sop = 0;
                    $tiparchdoc = $_FILES['coprutc2']['type']; //tip_arch_doc
                    $namedocument = "Copia_Rut_CodeudorDos_".$num_con;//nom doc
                    $ext = str_replace('.', '', strrchr($_FILES['coprutc2']['name'], '.')); //ext_arch_sop
                    $newdocument = "Copia_Rut_CodeudorDos_".$num_con.".".$ext; //desc doc //name sop
                    $urldirdocument = $urldir."/".$descfileaux."/".$newdocument;//rep_sop
    
                    $docVO = new documentVO();
                    $docVO->setCod_carp($cod_file_search_aux); 
                    $docVO->setId_subse($subserie_req_ar);
                    $docVO->setNom_doc($namedocument);
                    $docVO->setDesc_doc($newdocument);
                    $docVO->setTip_arch_doc($tiparchdoc);
                    $docVO->setOrden_doc($orden_document); 
                    $docVO->setCod_doc_prop($cod_doc_prop_aux);
                    $getdocument->create($docVO);
    
                    $docVOsearch = new documentVO();
                    $docVOsearch = $getdocument->readDocumentfile($cod_file_search_aux,$subserie_req_ar,$namedocument);
    
                    $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search
    
                    $sopVO = new soporteVO();
    
                    $sopVO->setCod_docs($cod_doc_search);
                    $sopVO->setNom_sop($newdocument);
                    $sopVO->setExt_arch_sop($ext);
                    $sopVO->setOrden_sop($orden_sop);
                    $sopVO->setRep_sop($urldirdocument);
                    $getsoporte->create($sopVO);
    
                    $filedir = opendir($urlfileaux);
                    $rutedir = $urlfileaux."/".$newdocument;
                    move_uploaded_file($_FILES['coprutc2']['tmp_name'], $rutedir);
                    closedir($filedir);
                }

                if(isset($_FILES['sopactlabcdos'])){
                    $orden_document = 8;
                    $tiparchdoc = "Texto/Lectura"; //tip_arch_doc
                    $namedocument = "Sop_Act_Com_Labor_CodeudorDos_".$num_con;//nom doc
                    $newdocument = "Sop_Act_Com_Labor_CodeudorDos_".$num_con;//desc doc
    
                    $docVO = new documentVO();
                    $docVO->setCod_carp($cod_file_search_aux); 
                    $docVO->setId_subse($subserie_req_ar);
                    $docVO->setNom_doc($namedocument);
                    $docVO->setDesc_doc($newdocument);
                    $docVO->setTip_arch_doc($tiparchdoc); 
                    $docVO->setOrden_doc($orden_document); 
                    $docVO->setCod_doc_prop($cod_doc_prop_aux);
                    $getdocument->create($docVO);
    
                    $docVOsearch = new documentVO();
                    $docVOsearch = $getdocument->readDocumentfile($cod_file_search_aux,$subserie_req_ar,$namedocument);
    
                    $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search
    
    
                    $filedir = opendir($urlfileaux);
                    foreach($_FILES['sopactlabcdos']['tmp_name'] as $file=>$value){
                        $tiparchdoc = $_FILES['sopactlabcdos']['type'][$file];//tip_arch_doc
                        $ext = str_replace('.', '', strrchr($_FILES['sopactlabcdos']['name'][$file], '.'));//ext_arch_sop
                        $newdocument= "Sop_Act_Com_Labor_CodeudorDos_".$file."_".$num_con.".".$ext;//nom_sop
                        $urldirdocument = $urldir."/".$descfileaux."/".$newdocument;//rep_sop 
    
                        $sopVO = new soporteVO();
    
                        $sopVO->setCod_docs($cod_doc_search);
                        $sopVO->setNom_sop($newdocument);
                        $sopVO->setExt_arch_sop($ext);
                        $sopVO->setOrden_sop($file);
                        $sopVO->setRep_sop($urldirdocument);
                        $getsoporte->create($sopVO);
    
                        $rutedir = $urlfileaux."/".$newdocument;
                        move_uploaded_file($_FILES['sopactlabcdos']['tmp_name'][$file],$rutedir);
                    }
                    closedir($filedir);
                }
                

                //Referenciar documentos de mandato del propietario de la propiedad

                if(isset($_POST['codcarpcontractmandate']) && isset($_POST['idsubseriecontractmandate'])){
                    $orden_document = 0;
                    $subserie_req_prop_cod_reg = $_POST['codregopercontractmandate']; //referenciar documentos
                    $subserie_req_prop_con_man = $_POST['idsubseriecontractmandate']; //referenciar documentos

                    $searchdocumentsproperty = array();

                    $searchdocumentsproperty = $getdocument->readDocumentsubse($subserie_req_prop_cod_reg , $subserie_req_prop_con_man);

                    foreach($searchdocumentsproperty as $r){
                        $docVOsearch = new documentVO();
                        $namedocument = $r->getNom_doc();
                        $docVOsearch = $getdocument->readDocumentfile($cod_file_search_aux,$subserie_req_prop,$namedocument);

                        if($docVOsearch != null && $docVOsearch !=""){
                            $docVO = new documentVO();
                            $docVO->setCod_carp($docVOsearch->getCod_doc()); 
                            $docVO->setCod_carp($cod_file_search_aux); 
                            $docVO->setId_subse($subserie_req_prop);
                            $docVO->setNom_doc($namedocument);
                            $docVO->setDesc_doc($namedocument);
                            $docVO->setTip_arch_doc($r->getTip_arch_doc()); 
                            $docVO->setOrden_doc($orden_document); 
                            $docVO->setCod_doc_prop($r->getCod_doc());
                            $getdocument->update($docVO);
                        }
                        else{
                            $docVO = new documentVO();
                            $docVO->setCod_carp($cod_file_search_aux); 
                            $docVO->setId_subse($subserie_req_prop);
                            $docVO->setNom_doc($namedocument);
                            $docVO->setDesc_doc($namedocument);
                            $docVO->setTip_arch_doc($r->getTip_arch_doc()); 
                            $docVO->setOrden_doc($orden_document); 
                            $docVO->setCod_doc_prop($r->getCod_doc());
                            $getdocument->create($docVO);
                        }
                    }

                }
            
            }

        }
        else{
            mkdir($folderprop);
            mkdir($filearriendo);
            mkdir($urlfileprin);
            mkdir($urlfileaux);

            if(file_exists($urlfileprin)){

                if(isset($_FILES['forvinca'])){
                    $orden_document = 0;
                    $orden_sop = 0;
                    $tiparchdoc = $_FILES['forvinca']['type']; //tip_arch_doc
                    $namedocument = "Sol_Vin_Arriendo_Arrendatario_".$num_con;//nom doc
                    $ext = str_replace('.', '', strrchr($_FILES['forvinca']['name'], '.')); //ext_arch_sop
                    $newdocument = "Sol_Vin_Arriendo_Arrendatario_".$num_con.".".$ext; //desc doc //name sop
                    $urldirdocument = $urldir."/".$descfileprin."/".$newdocument;//rep_sop
    
                    $docVO = new documentVO();
                    $docVO->setCod_carp($cod_file_search_prin); 
                    $docVO->setId_subse($subserie_form_vinc);
                    $docVO->setNom_doc($namedocument);
                    $docVO->setDesc_doc($newdocument);
                    $docVO->setTip_arch_doc($tiparchdoc);
                    $docVO->setOrden_doc($orden_document); 
                    $docVO->setCod_doc_prop($cod_doc_prop_prin);
                    $getdocument->create($docVO);
    
                    $docVOsearch = new documentVO();
                    $docVOsearch = $getdocument->readDocumentfile($cod_file_search_prin,$subserie_form_vinc,$namedocument);
    
                    $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search
    
                    $sopVO = new soporteVO();
    
                    $sopVO->setCod_docs($cod_doc_search);
                    $sopVO->setNom_sop($newdocument);
                    $sopVO->setExt_arch_sop($ext);
                    $sopVO->setOrden_sop($orden_sop);
                    $sopVO->setRep_sop($urldirdocument);
                    $getsoporte->create($sopVO);
    
                    $filedir = opendir($urlfileprin);
                    $rutedir = $urlfileprin."/".$newdocument;
                    move_uploaded_file($_FILES['forvinca']['tmp_name'], $rutedir);
                    closedir($filedir);
                }

                if(isset($_FILES['autousodataa'])){
                    $orden_document = 1;
                    $orden_sop = 0;
                    $tiparchdoc = $_FILES['autousodataa']['type']; //tip_arch_doc
                    $namedocument = "Auto_Datos_Personales_Arrendatario_".$num_con;//nom doc
                    $ext = str_replace('.', '', strrchr($_FILES['autousodataa']['name'], '.')); //ext_arch_sop
                    $newdocument = "Auto_Datos_Personales_Arrendatario_".$num_con.".".$ext; //desc doc //name sop
                    $urldirdocument = $urldir."/".$descfileprin."/".$newdocument;//rep_sop
    
                    $docVO = new documentVO();
                    $docVO->setCod_carp($cod_file_search_prin); 
                    $docVO->setId_subse($subserie_form_vinc);
                    $docVO->setNom_doc($namedocument);
                    $docVO->setDesc_doc($newdocument);
                    $docVO->setTip_arch_doc($tiparchdoc);
                    $docVO->setOrden_doc($orden_document); 
                    $docVO->setCod_doc_prop($cod_doc_prop_prin);
                    $getdocument->create($docVO);
    
                    $docVOsearch = new documentVO();
                    $docVOsearch = $getdocument->readDocumentfile($cod_file_search_prin,$subserie_form_vinc,$namedocument);
    
                    $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search
    
                    $sopVO = new soporteVO();
    
                    $sopVO->setCod_docs($cod_doc_search);
                    $sopVO->setNom_sop($newdocument);
                    $sopVO->setExt_arch_sop($ext);
                    $sopVO->setOrden_sop($orden_sop);
                    $sopVO->setRep_sop($urldirdocument);
                    $getsoporte->create($sopVO);
    
                    $filedir = opendir($urlfileprin);
                    $rutedir = $urlfileprin."/".$newdocument;
                    move_uploaded_file($_FILES['autousodataa']['tmp_name'], $rutedir);
                    closedir($filedir);
                }

                if(isset($_FILES['forvincuno'])){
                    $orden_document = 2;
                    $orden_sop = 0;
                    $tiparchdoc = $_FILES['forvincuno']['type']; //tip_arch_doc
                    $namedocument = "Sol_Vin_Arriendo_CodeudorUno_".$num_con;//nom doc
                    $ext = str_replace('.', '', strrchr($_FILES['forvincuno']['name'], '.')); //ext_arch_sop
                    $newdocument = "Sol_Vin_Arriendo_CodeudorUno_".$num_con.".".$ext; //desc doc //name sop
                    $urldirdocument = $urldir."/".$descfileprin."/".$newdocument;//rep_sop
    
                    $docVO = new documentVO();
                    $docVO->setCod_carp($cod_file_search_prin); 
                    $docVO->setId_subse($subserie_form_vinc);
                    $docVO->setNom_doc($namedocument);
                    $docVO->setDesc_doc($newdocument);
                    $docVO->setTip_arch_doc($tiparchdoc);
                    $docVO->setOrden_doc($orden_document); 
                    $docVO->setCod_doc_prop($cod_doc_prop_prin);
                    $getdocument->create($docVO);
    
                    $docVOsearch = new documentVO();
                    $docVOsearch = $getdocument->readDocumentfile($cod_file_search_prin,$subserie_form_vinc,$namedocument);
    
                    $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search
    
                    $sopVO = new soporteVO();
    
                    $sopVO->setCod_docs($cod_doc_search);
                    $sopVO->setNom_sop($newdocument);
                    $sopVO->setExt_arch_sop($ext);
                    $sopVO->setOrden_sop($orden_sop);
                    $sopVO->setRep_sop($urldirdocument);
                    $getsoporte->create($sopVO);
    
                    $filedir = opendir($urlfileprin);
                    $rutedir = $urlfileprin."/".$newdocument;
                    move_uploaded_file($_FILES['forvincuno']['tmp_name'], $rutedir);
                    closedir($filedir);
                }

                if(isset($_FILES['autousodatacuno'])){
                    $orden_document = 3;
                    $orden_sop = 0;
                    $tiparchdoc = $_FILES['autousodatacuno']['type']; //tip_arch_doc
                    $namedocument = "Auto_Datos_Personales_CodeudorUno_".$num_con;//nom doc
                    $ext = str_replace('.', '', strrchr($_FILES['autousodatacuno']['name'], '.')); //ext_arch_sop
                    $newdocument = "Auto_Datos_Personales_CodeudorUno_".$num_con.".".$ext; //desc doc //name sop
                    $urldirdocument = $urldir."/".$descfileprin."/".$newdocument;//rep_sop
    
                    $docVO = new documentVO();
                    $docVO->setCod_carp($cod_file_search_prin); 
                    $docVO->setId_subse($subserie_form_vinc);
                    $docVO->setNom_doc($namedocument);
                    $docVO->setDesc_doc($newdocument);
                    $docVO->setTip_arch_doc($tiparchdoc);
                    $docVO->setOrden_doc($orden_document); 
                    $docVO->setCod_doc_prop($cod_doc_prop_prin);
                    $getdocument->create($docVO);
    
                    $docVOsearch = new documentVO();
                    $docVOsearch = $getdocument->readDocumentfile($cod_file_search_prin,$subserie_form_vinc,$namedocument);
    
                    $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search
    
                    $sopVO = new soporteVO();
    
                    $sopVO->setCod_docs($cod_doc_search);
                    $sopVO->setNom_sop($newdocument);
                    $sopVO->setExt_arch_sop($ext);
                    $sopVO->setOrden_sop($orden_sop);
                    $sopVO->setRep_sop($urldirdocument);
                    $getsoporte->create($sopVO);
    
                    $filedir = opendir($urlfileprin);
                    $rutedir = $urlfileprin."/".$newdocument;
                    move_uploaded_file($_FILES['autousodatacuno']['tmp_name'], $rutedir);
                    closedir($filedir);
                }
                
                if(isset($_FILES['forvincdos'])){
                    $orden_document = 4;
                    $orden_sop = 0;
                    $tiparchdoc = $_FILES['forvincdos']['type']; //tip_arch_doc
                    $namedocument = "Sol_Vin_Arriendo_CodeudorDos_".$num_con;//nom doc
                    $ext = str_replace('.', '', strrchr($_FILES['forvincdos']['name'], '.')); //ext_arch_sop
                    $newdocument = "Sol_Vin_Arriendo_CodeudorDos_".$num_con.".".$ext; //desc doc //name sop
                    $urldirdocument = $urldir."/".$descfileprin."/".$newdocument;//rep_sop
    
                    $docVO = new documentVO();
                    $docVO->setCod_carp($cod_file_search_prin); 
                    $docVO->setId_subse($subserie_form_vinc);
                    $docVO->setNom_doc($namedocument);
                    $docVO->setDesc_doc($newdocument);
                    $docVO->setTip_arch_doc($tiparchdoc);
                    $docVO->setOrden_doc($orden_document); 
                    $docVO->setCod_doc_prop($cod_doc_prop_prin);
                    $getdocument->create($docVO);
    
                    $docVOsearch = new documentVO();
                    $docVOsearch = $getdocument->readDocumentfile($cod_file_search_prin,$subserie_form_vinc,$namedocument);
    
                    $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search
    
                    $sopVO = new soporteVO();
    
                    $sopVO->setCod_docs($cod_doc_search);
                    $sopVO->setNom_sop($newdocument);
                    $sopVO->setExt_arch_sop($ext);
                    $sopVO->setOrden_sop($orden_sop);
                    $sopVO->setRep_sop($urldirdocument);
                    $getsoporte->create($sopVO);
    
                    $filedir = opendir($urlfileprin);
                    $rutedir = $urlfileprin."/".$newdocument;
                    move_uploaded_file($_FILES['forvincdos']['tmp_name'], $rutedir);
                    closedir($filedir);
                }

                if(isset($_FILES['autousodatacdos'])){
                    $orden_document = 5;
                    $orden_sop = 0;
                    $tiparchdoc = $_FILES['autousodatacdos']['type']; //tip_arch_doc
                    $namedocument = "Auto_Datos_Personales_CodeudorDos_".$num_con;//nom doc
                    $ext = str_replace('.', '', strrchr($_FILES['autousodatacdos']['name'], '.')); //ext_arch_sop
                    $newdocument = "Auto_Datos_Personales_CodeudorDos_".$num_con.".".$ext; //desc doc //name sop
                    $urldirdocument = $urldir."/".$descfileprin."/".$newdocument;//rep_sop
    
                    $docVO = new documentVO();
                    $docVO->setCod_carp($cod_file_search_prin); 
                    $docVO->setId_subse($subserie_form_vinc);
                    $docVO->setNom_doc($namedocument);
                    $docVO->setDesc_doc($newdocument);
                    $docVO->setTip_arch_doc($tiparchdoc);
                    $docVO->setOrden_doc($orden_document); 
                    $docVO->setCod_doc_prop($cod_doc_prop_prin);
                    $getdocument->create($docVO);
    
                    $docVOsearch = new documentVO();
                    $docVOsearch = $getdocument->readDocumentfile($cod_file_search_prin,$subserie_form_vinc,$namedocument);
    
                    $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search
    
                    $sopVO = new soporteVO();
    
                    $sopVO->setCod_docs($cod_doc_search);
                    $sopVO->setNom_sop($newdocument);
                    $sopVO->setExt_arch_sop($ext);
                    $sopVO->setOrden_sop($orden_sop);
                    $sopVO->setRep_sop($urldirdocument);
                    $getsoporte->create($sopVO);
    
                    $filedir = opendir($urlfileprin);
                    $rutedir = $urlfileprin."/".$newdocument;
                    move_uploaded_file($_FILES['autousodatacdos']['tmp_name'], $rutedir);
                    closedir($filedir);
                }

                //Contrato de Arrendamiento

                if(isset($_FILES['conar'])){
                    $orden_document = 0;
                    $orden_sop = 0;
                    $tiparchdoc = $_FILES['conar']['type']; //tip_arch_doc
                    $namedocument = "Contrato_Arrendamiento_".$num_con;//nom doc
                    $ext = str_replace('.', '', strrchr($_FILES['conar']['name'], '.')); //ext_arch_sop
                    $newdocument = "Contrato_Arrendamiento_".$num_con.".".$ext; //desc doc //name sop
                    $urldirdocument = $urldir."/".$descfileprin."/".$newdocument;//rep_sop
    
                    $docVO = new documentVO();
                    $docVO->setCod_carp($cod_file_search_prin); 
                    $docVO->setId_subse($subserie_con_ar);
                    $docVO->setNom_doc($namedocument);
                    $docVO->setDesc_doc($newdocument);
                    $docVO->setTip_arch_doc($tiparchdoc);
                    $docVO->setOrden_doc($orden_document); 
                    $docVO->setCod_doc_prop($cod_doc_prop_prin);
                    $getdocument->create($docVO);
    
                    $docVOsearch = new documentVO();
                    $docVOsearch = $getdocument->readDocumentfile($cod_file_search_prin,$subserie_con_ar,$namedocument);
    
                    $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search
    
                    $sopVO = new soporteVO();
    
                    $sopVO->setCod_docs($cod_doc_search);
                    $sopVO->setNom_sop($newdocument);
                    $sopVO->setExt_arch_sop($ext);
                    $sopVO->setOrden_sop($orden_sop);
                    $sopVO->setRep_sop($urldirdocument);
                    $getsoporte->create($sopVO);
    
                    $filedir = opendir($urlfileprin);
                    $rutedir = $urlfileprin."/".$newdocument;
                    move_uploaded_file($_FILES['conar']['tmp_name'], $rutedir);
                    closedir($filedir);
                }
            }

            if(file_exists($urlfileaux)){

                if(isset($_FILES['fotceda'])){
                    $orden_document = 0;
                    $orden_sop = 0;
                    $tiparchdoc = $_FILES['fotceda']['type']; //tip_arch_doc
                    $namedocument = "Fot_Ced_Arrendatario_150_".$num_con;//nom doc
                    $ext = str_replace('.', '', strrchr($_FILES['fotceda']['name'], '.')); //ext_arch_sop
                    $newdocument = "Fot_Ced_Arrendatario_150_".$num_con.".".$ext; //desc doc //name sop
                    $urldirdocument = $urldir."/".$descfileaux."/".$newdocument;//rep_sop
    
                    $docVO = new documentVO();
                    $docVO->setCod_carp($cod_file_search_aux); 
                    $docVO->setId_subse($subserie_req_ar);
                    $docVO->setNom_doc($namedocument);
                    $docVO->setDesc_doc($newdocument);
                    $docVO->setTip_arch_doc($tiparchdoc);
                    $docVO->setOrden_doc($orden_document); 
                    $docVO->setCod_doc_prop($cod_doc_prop_aux);
                    $getdocument->create($docVO);
    
                    $docVOsearch = new documentVO();
                    $docVOsearch = $getdocument->readDocumentfile($cod_file_search_aux,$subserie_req_ar,$namedocument);
    
                    $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search
    
                    $sopVO = new soporteVO();
    
                    $sopVO->setCod_docs($cod_doc_search);
                    $sopVO->setNom_sop($newdocument);
                    $sopVO->setExt_arch_sop($ext);
                    $sopVO->setOrden_sop($orden_sop);
                    $sopVO->setRep_sop($urldirdocument);
                    $getsoporte->create($sopVO);
    
                    $filedir = opendir($urlfileaux);
                    $rutedir = $urlfileaux."/".$newdocument;
                    move_uploaded_file($_FILES['fotceda']['tmp_name'], $rutedir);
                    closedir($filedir);
                }

                if(isset($_FILES['copruta'])){
                    $orden_document = 1;
                    $orden_sop = 0;
                    $tiparchdoc = $_FILES['copruta']['type']; //tip_arch_doc
                    $namedocument = "Copia_Rut_Arrendatario_".$num_con;//nom doc
                    $ext = str_replace('.', '', strrchr($_FILES['copruta']['name'], '.')); //ext_arch_sop
                    $newdocument = "Copia_Rut_Arrendatario_".$num_con.".".$ext; //desc doc //name sop
                    $urldirdocument = $urldir."/".$descfileaux."/".$newdocument;//rep_sop
    
                    $docVO = new documentVO();
                    $docVO->setCod_carp($cod_file_search_aux); 
                    $docVO->setId_subse($subserie_req_ar);
                    $docVO->setNom_doc($namedocument);
                    $docVO->setDesc_doc($newdocument);
                    $docVO->setTip_arch_doc($tiparchdoc);
                    $docVO->setOrden_doc($orden_document); 
                    $docVO->setCod_doc_prop($cod_doc_prop_aux);
                    $getdocument->create($docVO);
    
                    $docVOsearch = new documentVO();
                    $docVOsearch = $getdocument->readDocumentfile($cod_file_search_aux,$subserie_req_ar,$namedocument);
    
                    $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search
    
                    $sopVO = new soporteVO();
    
                    $sopVO->setCod_docs($cod_doc_search);
                    $sopVO->setNom_sop($newdocument);
                    $sopVO->setExt_arch_sop($ext);
                    $sopVO->setOrden_sop($orden_sop);
                    $sopVO->setRep_sop($urldirdocument);
                    $getsoporte->create($sopVO);
    
                    $filedir = opendir($urlfileaux);
                    $rutedir = $urlfileaux."/".$newdocument;
                    move_uploaded_file($_FILES['copruta']['tmp_name'], $rutedir);
                    closedir($filedir);
                }

                if(isset($_FILES['sopactlaba'])){
                    $orden_document = 2;
                    $tiparchdoc = "Texto/Lectura"; //tip_arch_doc
                    $namedocument = "Sop_Act_Com_Labor_Arrendatario_".$num_con;//nom doc
                    $newdocument = "Sop_Act_Com_Labor_Arrendatario_".$num_con;//desc doc
    
                    $docVO = new documentVO();
                    $docVO->setCod_carp($cod_file_search_aux); 
                    $docVO->setId_subse($subserie_req_ar);
                    $docVO->setNom_doc($namedocument);
                    $docVO->setDesc_doc($newdocument);
                    $docVO->setTip_arch_doc($tiparchdoc); 
                    $docVO->setOrden_doc($orden_document); 
                    $docVO->setCod_doc_prop($cod_doc_prop_aux);
                    $getdocument->create($docVO);
    
                    $docVOsearch = new documentVO();
                    $docVOsearch = $getdocument->readDocumentfile($cod_file_search_aux,$subserie_req_ar,$namedocument);
    
                    $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search
    
    
                    $filedir = opendir($urlfileaux);
                    foreach($_FILES['sopactlaba']['tmp_name'] as $file=>$value){
                        $tiparchdoc = $_FILES['sopactlaba']['type'][$file];//tip_arch_doc
                        $ext = str_replace('.', '', strrchr($_FILES['sopactlaba']['name'][$file], '.'));//ext_arch_sop
                        $newdocument= "Sop_Act_Com_Labor_Arrendatario_".$file."_".$num_con.".".$ext;//nom_sop
                        $urldirdocument = $urldir."/".$descfileaux."/".$newdocument;//rep_sop 
    
                        $sopVO = new soporteVO();
    
                        $sopVO->setCod_docs($cod_doc_search);
                        $sopVO->setNom_sop($newdocument);
                        $sopVO->setExt_arch_sop($ext);
                        $sopVO->setOrden_sop($file);
                        $sopVO->setRep_sop($urldirdocument);
                        $getsoporte->create($sopVO);
    
                        $rutedir = $urlfileaux."/".$newdocument;
                        move_uploaded_file($_FILES['sopactlaba']['tmp_name'][$file],$rutedir);
                    }
                    closedir($filedir);
                }  

                if(isset($_FILES['fotcedc1'])){
                    $orden_document = 3;
                    $orden_sop = 0;
                    $tiparchdoc = $_FILES['fotcedc1']['type']; //tip_arch_doc
                    $namedocument = "Fot_Ced_CodeudorUno_150_".$num_con;//nom doc
                    $ext = str_replace('.', '', strrchr($_FILES['fotcedc1']['name'], '.')); //ext_arch_sop
                    $newdocument = "Fot_Ced_CodeudorUno_150_".$num_con.".".$ext; //desc doc //name sop
                    $urldirdocument = $urldir."/".$descfileaux."/".$newdocument;//rep_sop
    
                    $docVO = new documentVO();
                    $docVO->setCod_carp($cod_file_search_aux); 
                    $docVO->setId_subse($subserie_req_ar);
                    $docVO->setNom_doc($namedocument);
                    $docVO->setDesc_doc($newdocument);
                    $docVO->setTip_arch_doc($tiparchdoc);
                    $docVO->setOrden_doc($orden_document); 
                    $docVO->setCod_doc_prop($cod_doc_prop_aux);
                    $getdocument->create($docVO);
    
                    $docVOsearch = new documentVO();
                    $docVOsearch = $getdocument->readDocumentfile($cod_file_search_aux,$subserie_req_ar,$namedocument);
    
                    $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search
    
                    $sopVO = new soporteVO();
    
                    $sopVO->setCod_docs($cod_doc_search);
                    $sopVO->setNom_sop($newdocument);
                    $sopVO->setExt_arch_sop($ext);
                    $sopVO->setOrden_sop($orden_sop);
                    $sopVO->setRep_sop($urldirdocument);
                    $getsoporte->create($sopVO);
    
                    $filedir = opendir($urlfileaux);
                    $rutedir = $urlfileaux."/".$newdocument;
                    move_uploaded_file($_FILES['fotcedc1']['tmp_name'], $rutedir);
                    closedir($filedir);
                }

                if(isset($_FILES['coprutc1'])){
                    $orden_document = 4;
                    $orden_sop = 0;
                    $tiparchdoc = $_FILES['coprutc1']['type']; //tip_arch_doc
                    $namedocument = "Copia_Rut_CodeudorUno_".$num_con;//nom doc
                    $ext = str_replace('.', '', strrchr($_FILES['coprutc1']['name'], '.')); //ext_arch_sop
                    $newdocument = "Copia_Rut_CodeudorUno_".$num_con.".".$ext; //desc doc //name sop
                    $urldirdocument = $urldir."/".$descfileaux."/".$newdocument;//rep_sop
    
                    $docVO = new documentVO();
                    $docVO->setCod_carp($cod_file_search_aux); 
                    $docVO->setId_subse($subserie_req_ar);
                    $docVO->setNom_doc($namedocument);
                    $docVO->setDesc_doc($newdocument);
                    $docVO->setTip_arch_doc($tiparchdoc);
                    $docVO->setOrden_doc($orden_document); 
                    $docVO->setCod_doc_prop($cod_doc_prop_aux);
                    $getdocument->create($docVO);
    
                    $docVOsearch = new documentVO();
                    $docVOsearch = $getdocument->readDocumentfile($cod_file_search_aux,$subserie_req_ar,$namedocument);
    
                    $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search
    
                    $sopVO = new soporteVO();
    
                    $sopVO->setCod_docs($cod_doc_search);
                    $sopVO->setNom_sop($newdocument);
                    $sopVO->setExt_arch_sop($ext);
                    $sopVO->setOrden_sop($orden_sop);
                    $sopVO->setRep_sop($urldirdocument);
                    $getsoporte->create($sopVO);
    
                    $filedir = opendir($urlfileaux);
                    $rutedir = $urlfileaux."/".$newdocument;
                    move_uploaded_file($_FILES['coprutc1']['tmp_name'], $rutedir);
                    closedir($filedir);
                }

                if(isset($_FILES['sopactlabcuno'])){
                    $orden_document = 5;
                    $tiparchdoc = "Texto/Lectura"; //tip_arch_doc
                    $namedocument = "Sop_Act_Com_Labor_CodeudorUno_".$num_con;//nom doc
                    $newdocument = "Sop_Act_Com_Labor_CodeudorUno_".$num_con;//desc doc
    
                    $docVO = new documentVO();
                    $docVO->setCod_carp($cod_file_search_aux); 
                    $docVO->setId_subse($subserie_req_ar);
                    $docVO->setNom_doc($namedocument);
                    $docVO->setDesc_doc($newdocument);
                    $docVO->setTip_arch_doc($tiparchdoc); 
                    $docVO->setOrden_doc($orden_document); 
                    $docVO->setCod_doc_prop($cod_doc_prop_aux);
                    $getdocument->create($docVO);
    
                    $docVOsearch = new documentVO();
                    $docVOsearch = $getdocument->readDocumentfile($cod_file_search_aux,$subserie_req_ar,$namedocument);
    
                    $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search
    
    
                    $filedir = opendir($urlfileaux);
                    foreach($_FILES['sopactlabcuno']['tmp_name'] as $file=>$value){
                        $tiparchdoc = $_FILES['sopactlabcuno']['type'][$file];//tip_arch_doc
                        $ext = str_replace('.', '', strrchr($_FILES['sopactlabcuno']['name'][$file], '.'));//ext_arch_sop
                        $newdocument= "Sop_Act_Com_Labor_CodeudorUno_".$file."_".$num_con.".".$ext;//nom_sop
                        $urldirdocument = $urldir."/".$descfileaux."/".$newdocument;//rep_sop 
    
                        $sopVO = new soporteVO();
    
                        $sopVO->setCod_docs($cod_doc_search);
                        $sopVO->setNom_sop($newdocument);
                        $sopVO->setExt_arch_sop($ext);
                        $sopVO->setOrden_sop($file);
                        $sopVO->setRep_sop($urldirdocument);
                        $getsoporte->create($sopVO);
    
                        $rutedir = $urlfileaux."/".$newdocument;
                        move_uploaded_file($_FILES['sopactlabcuno']['tmp_name'][$file],$rutedir);
                    }
                    closedir($filedir);
                }  

                if(isset($_FILES['fotcedc2'])){
                    $orden_document = 6;
                    $orden_sop = 0;
                    $tiparchdoc = $_FILES['fotcedc2']['type']; //tip_arch_doc
                    $namedocument = "Fot_Ced_CodeudorDos_150_".$num_con;//nom doc
                    $ext = str_replace('.', '', strrchr($_FILES['fotcedc2']['name'], '.')); //ext_arch_sop
                    $newdocument = "Fot_Ced_CodeudorDos_150_".$num_con.".".$ext; //desc doc //name sop
                    $urldirdocument = $urldir."/".$descfileaux."/".$newdocument;//rep_sop
    
                    $docVO = new documentVO();
                    $docVO->setCod_carp($cod_file_search_aux); 
                    $docVO->setId_subse($subserie_req_ar);
                    $docVO->setNom_doc($namedocument);
                    $docVO->setDesc_doc($newdocument);
                    $docVO->setTip_arch_doc($tiparchdoc);
                    $docVO->setOrden_doc($orden_document); 
                    $docVO->setCod_doc_prop($cod_doc_prop_aux);
                    $getdocument->create($docVO);
    
                    $docVOsearch = new documentVO();
                    $docVOsearch = $getdocument->readDocumentfile($cod_file_search_aux,$subserie_req_ar,$namedocument);
    
                    $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search
    
                    $sopVO = new soporteVO();
    
                    $sopVO->setCod_docs($cod_doc_search);
                    $sopVO->setNom_sop($newdocument);
                    $sopVO->setExt_arch_sop($ext);
                    $sopVO->setOrden_sop($orden_sop);
                    $sopVO->setRep_sop($urldirdocument);
                    $getsoporte->create($sopVO);
    
                    $filedir = opendir($urlfileaux);
                    $rutedir = $urlfileaux."/".$newdocument;
                    move_uploaded_file($_FILES['fotcedc2']['tmp_name'], $rutedir);
                    closedir($filedir);
                }

                if(isset($_FILES['coprutc2'])){
                    $orden_document = 7;
                    $orden_sop = 0;
                    $tiparchdoc = $_FILES['coprutc2']['type']; //tip_arch_doc
                    $namedocument = "Copia_Rut_CodeudorDos_".$num_con;//nom doc
                    $ext = str_replace('.', '', strrchr($_FILES['coprutc2']['name'], '.')); //ext_arch_sop
                    $newdocument = "Copia_Rut_CodeudorDos_".$num_con.".".$ext; //desc doc //name sop
                    $urldirdocument = $urldir."/".$descfileaux."/".$newdocument;//rep_sop
    
                    $docVO = new documentVO();
                    $docVO->setCod_carp($cod_file_search_aux); 
                    $docVO->setId_subse($subserie_req_ar);
                    $docVO->setNom_doc($namedocument);
                    $docVO->setDesc_doc($newdocument);
                    $docVO->setTip_arch_doc($tiparchdoc);
                    $docVO->setOrden_doc($orden_document); 
                    $docVO->setCod_doc_prop($cod_doc_prop_aux);
                    $getdocument->create($docVO);
    
                    $docVOsearch = new documentVO();
                    $docVOsearch = $getdocument->readDocumentfile($cod_file_search_aux,$subserie_req_ar,$namedocument);
    
                    $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search
    
                    $sopVO = new soporteVO();
    
                    $sopVO->setCod_docs($cod_doc_search);
                    $sopVO->setNom_sop($newdocument);
                    $sopVO->setExt_arch_sop($ext);
                    $sopVO->setOrden_sop($orden_sop);
                    $sopVO->setRep_sop($urldirdocument);
                    $getsoporte->create($sopVO);
    
                    $filedir = opendir($urlfileaux);
                    $rutedir = $urlfileaux."/".$newdocument;
                    move_uploaded_file($_FILES['coprutc2']['tmp_name'], $rutedir);
                    closedir($filedir);
                }

                if(isset($_FILES['sopactlabcdos'])){
                    $orden_document = 8;
                    $tiparchdoc = "Texto/Lectura"; //tip_arch_doc
                    $namedocument = "Sop_Act_Com_Labor_CodeudorDos_".$num_con;//nom doc
                    $newdocument = "Sop_Act_Com_Labor_CodeudorDos_".$num_con;//desc doc
    
                    $docVO = new documentVO();
                    $docVO->setCod_carp($cod_file_search_aux); 
                    $docVO->setId_subse($subserie_req_ar);
                    $docVO->setNom_doc($namedocument);
                    $docVO->setDesc_doc($newdocument);
                    $docVO->setTip_arch_doc($tiparchdoc); 
                    $docVO->setOrden_doc($orden_document); 
                    $docVO->setCod_doc_prop($cod_doc_prop_aux);
                    $getdocument->create($docVO);
    
                    $docVOsearch = new documentVO();
                    $docVOsearch = $getdocument->readDocumentfile($cod_file_search_aux,$subserie_req_ar,$namedocument);
    
                    $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search
    
    
                    $filedir = opendir($urlfileaux);
                    foreach($_FILES['sopactlabcdos']['tmp_name'] as $file=>$value){
                        $tiparchdoc = $_FILES['sopactlabcdos']['type'][$file];//tip_arch_doc
                        $ext = str_replace('.', '', strrchr($_FILES['sopactlabcdos']['name'][$file], '.'));//ext_arch_sop
                        $newdocument= "Sop_Act_Com_Labor_CodeudorDos_".$file."_".$num_con.".".$ext;//nom_sop
                        $urldirdocument = $urldir."/".$descfileaux."/".$newdocument;//rep_sop 
    
                        $sopVO = new soporteVO();
    
                        $sopVO->setCod_docs($cod_doc_search);
                        $sopVO->setNom_sop($newdocument);
                        $sopVO->setExt_arch_sop($ext);
                        $sopVO->setOrden_sop($file);
                        $sopVO->setRep_sop($urldirdocument);
                        $getsoporte->create($sopVO);
    
                        $rutedir = $urlfileaux."/".$newdocument;
                        move_uploaded_file($_FILES['sopactlabcdos']['tmp_name'][$file],$rutedir);
                    }
                    closedir($filedir);
                }
                

                //Referenciar documentos de mandato del propietario de la propiedad

                if(isset($_POST['codregopercontractmandate']) && isset($_POST['idsubseriecontractmandate'])){
                    $orden_document = 0;
                    $subserie_req_prop_cod_reg = $_POST['codregopercontractmandate']; //referenciar documentos
                    $subserie_req_prop_con_man = $_POST['idsubseriecontractmandate']; //referenciar documentos

                    $searchdocumentsproperty = array();

                    $searchdocumentsproperty = $getdocument->readDocumentsubse($subserie_req_prop_cod_reg , $subserie_req_prop_con_man);

                    foreach($searchdocumentsproperty as $r){
                        $docVOsearch = new documentVO();
                        $namedocument = $r->getNom_doc();
                        $docVOsearch = $getdocument->readDocumentfile($cod_file_search_aux,$subserie_req_prop,$namedocument);

                        if($docVOsearch != null && $docVOsearch !=""){
                            $docVO = new documentVO();
                            $docVO->setCod_carp($docVOsearch->getCod_doc()); 
                            $docVO->setCod_carp($cod_file_search_aux); 
                            $docVO->setId_subse($subserie_req_prop);
                            $docVO->setNom_doc($namedocument);
                            $docVO->setDesc_doc($namedocument);
                            $docVO->setTip_arch_doc($r->getTip_arch_doc()); 
                            $docVO->setOrden_doc($orden_document); 
                            $docVO->setCod_doc_prop($r->getCod_doc());
                            $getdocument->update($docVO);
                        }
                        else{
                            $docVO = new documentVO();
                            $docVO->setCod_carp($cod_file_search_aux); 
                            $docVO->setId_subse($subserie_req_prop);
                            $docVO->setNom_doc($namedocument);
                            $docVO->setDesc_doc($namedocument);
                            $docVO->setTip_arch_doc($r->getTip_arch_doc()); 
                            $docVO->setOrden_doc($orden_document); 
                            $docVO->setCod_doc_prop($r->getCod_doc());
                            $getdocument->create($docVO);
                        }
                    }

                }
            
            }


        }
        


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

        //data codeudor1
        $id_empc1 = $_POST['idempc1'];
        $ced_persc1 = $_POST['cedpersc1'];//data important
        $name_persc1 = $_POST['namepersc1'];
        $last_persc1 = $_POST['lastpersc1'];
        $fec_exp_cc_persc1 = $_POST['dateccpersc1'];
        $cel_persc1 = $_POST['celpersc1'];
        $tel_persc1 = $_POST['telepersc1'];
        $email_persc1 = $_POST['corpersc1'];
        $sex_persc1 = $_POST['sexpersc1'];
        $dir_persc1 = $_POST['dirpersc1'];
        $ciud_persc1 = $_POST['ciudpersc1'];
        $fec_reg_persc1 = date("Y-m-d");
        $fec_act_persc1 = date("Y-m-d");

         //data codeudor2
         $id_empc2 = $_POST['idempc2'];
         $ced_persc2 = $_POST['cedpersc2'];//data important
         $name_persc2 = $_POST['namepersc2'];
         $last_persc2 = $_POST['lastpersc2'];
         $fec_exp_cc_persc2 = $_POST['dateccpersc2'];
         $cel_persc2 = $_POST['celpersc2'];
         $tel_persc2 = $_POST['telepersc2'];
         $email_persc2 = $_POST['corpersc2'];
         $sex_persc2 = $_POST['sexpersc2'];
         $dir_persc2 = $_POST['dirpersc2'];
         $ciud_persc2 = $_POST['ciudpersc2'];
         $fec_reg_persc2 = date("Y-m-d");
         $fec_act_persc2 = date("Y-m-d");

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

        $personc1VO = new personVO();
        $personc1VO = $getperson->readPerson($ced_persc1);

        if(!is_null($personc1VO->getCed_pers())){
            $persVO = new personVO();
            $persVO->setCed_pers($ced_persc1);
            $persVO->setId_emp($id_empc1);
            $persVO->setNom_pers($name_persc1);
            $persVO->setApe_pers($last_persc1);
            $persVO->setFec_exp_ced_pers($fec_exp_cc_persc1);
            $persVO->setCel_pers($cel_persc1);
            $persVO->setTel_pers($tel_persc1);
            $persVO->setEmail_pers($email_persc1);
            $persVO->setSex_pers($sex_persc1);
            $persVO->setDir_pers($dir_persc1);
            $persVO->setCiud_pers($ciud_persc1);
            $persVO->setFec_act_pers($fec_act_persc1);
            $getperson->update($persVO);  
        }
        else{
            $persVO = new personVO();
            $persVO->setCed_pers($ced_persc1);
            $persVO->setId_emp($id_empc1);
            $persVO->setNom_pers($name_persc1);
            $persVO->setApe_pers($last_persc1);
            $persVO->setFec_exp_ced_pers($fec_exp_cc_persc1);
            $persVO->setCel_pers($cel_persc1);
            $persVO->setTel_pers($tel_persc1);
            $persVO->setEmail_pers($email_persc1);
            $persVO->setSex_pers($sex_persc1);
            $persVO->setDir_pers($dir_persc1);
            $persVO->setCiud_pers($ciud_persc1);
            $persVO->setFec_reg_pers($fec_reg_persc1);
            $persVO->setFec_act_pers($fec_act_persc1); 
            $getperson->create($persVO);    
        }

        $personc2VO = new personVO();
        $personc2VO = $getperson->readPerson($ced_persc2);

        if(!is_null($personc2VO->getCed_pers())){
            $persVO = new personVO();
            $persVO->setCed_pers($ced_persc2);
            $persVO->setId_emp($id_empc2);
            $persVO->setNom_pers($name_persc2);
            $persVO->setApe_pers($last_persc2);
            $persVO->setFec_exp_ced_pers($fec_exp_cc_persc2);
            $persVO->setCel_pers($cel_persc2);
            $persVO->setTel_pers($tel_persc2);
            $persVO->setEmail_pers($email_persc2);
            $persVO->setSex_pers($sex_persc2);
            $persVO->setDir_pers($dir_persc2);
            $persVO->setCiud_pers($ciud_persc2);
            $persVO->setFec_act_pers($fec_act_persc2);
            $getperson->update($persVO);  
        }
        else{
            $persVO = new personVO();
            $persVO->setCed_pers($ced_persc2);
            $persVO->setId_emp($id_empc2);
            $persVO->setNom_pers($name_persc2);
            $persVO->setApe_pers($last_persc2);
            $persVO->setFec_exp_ced_pers($fec_exp_cc_persc2);
            $persVO->setCel_pers($cel_persc2);
            $persVO->setTel_pers($tel_persc2);
            $persVO->setEmail_pers($email_persc2);
            $persVO->setSex_pers($sex_persc2);
            $persVO->setDir_pers($dir_persc2);
            $persVO->setCiud_pers($ciud_persc2);
            $persVO->setFec_reg_pers($fec_reg_persc2);
            $persVO->setFec_act_pers($fec_act_persc2); 
            $getperson->create($persVO);    
        }
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////
        
        //valide property
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////

        //data prop
        $id_prop_leasing = $_POST["idpropar"];

        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////

        $validatepropVO = new propertyVO();
        $validatepropVO = $getproperty->readProp($id_prop_leasing);

        //data contract
        $num_con = $_POST['numcontracta'];
        $tip_con = $_POST['tipcontracta'];
        $tip_con_nom = $_POST['nomtipcontracta'];
        $estado_oper = $_POST['estadocona'];
        $cod_reg_oper_dep = $_POST['codregopercontractmandate'];;
        $fec_oper = date("Y-m-d");
             ///////////////////////////////////////////////////////////////////////////////////////////////////////////////

            //valide operation
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        $newoperationVO = new operationVO();
        $newoperationVO = $getoperation->readOper($num_con);
            
            if($newoperationVO != null && $newoperationVO !=""){
                $operVO = new operationVO();
                $operVO->setCod_reg_oper($num_con);
                $operVO->setId_tip_oper($tip_con);
                $operVO->setId_prop_oper($id_prop_leasing);
                $operVO->setDesc_oper($tip_con_nom);
                $operVO->setCod_reg_oper_dep($cod_reg_oper_dep);
                $operVO->setEstado_oper($estado_oper); 
                $getoperation->update($operVO); 
            }
            //////////////////////////////////////////////////////////////////////////////////////////////////////////////

        //data arrendatario
        $pers_cona = $_POST['perscona'];
        $orden_pers_cona = 1;
    
        $validatecontractVO = new contractVO();
        $validatecontractVO = $getcontract->readContract($ced_pers, $num_con, $pers_cona);
        $idcon = $validatecontractVO->getId_con(); //Id contrato

        if($validatecontractVO != null && $validatecontractVO != ""){
            $conVO = new contractVO();
            $conVO->setId_con($idcon);
            $conVO->setCed_pers_con($ced_pers);
            $conVO->setCod_reg_oper_con($num_con);
            $conVO->setId_tip_pers_con($pers_cona);
            $conVO->setOrden_tip_pers_con($orden_pers_cona);
            $getcontract->update($conVO); 
        }

        //data codeudor 1
        $pers_conac1 = $_POST['persconac1'];
        $orden_pers_conc1 = 2;

        $validatecontractVO = new contractVO();
        $validatecontractVO = $getcontract->readContract($ced_persc1, $num_con, $pers_conac1);
        $idcon = $validatecontractVO->getId_con(); //Id contrato

        if($validatecontractVO != null && $validatecontractVO != ""){
            $conVO = new contractVO();
            $conVO->setId_con($idcon);
            $conVO->setCed_pers_con($ced_persc1);
            $conVO->setCod_reg_oper_con($num_con);
            $conVO->setId_tip_pers_con($pers_conac1);
            $conVO->setOrden_tip_pers_con($orden_pers_conc1);
            $getcontract->update($conVO); 
        }

        //data codeudor 2
        $pers_conac2 = $_POST['persconac2'];
        $orden_pers_conc2 = 3;

        $validatecontractVO = new contractVO();
        $validatecontractVO = $getcontract->readContract($ced_persc2, $num_con, $pers_conac2);
        $idcon = $validatecontractVO->getId_con(); //Id contrato

        if($validatecontractVO != null && $validatecontractVO != ""){
            $conVO = new contractVO();
            $conVO->setId_con($idcon);
            $conVO->setCed_pers_con($ced_persc2);
            $conVO->setCod_reg_oper_con($num_con);
            $conVO->setId_tip_pers_con($pers_conac2);
            $conVO->setOrden_tip_pers_con($orden_pers_conc2);
            $getcontract->update($conVO); 
        }

        //////////////////////////////////////////////////////////////////////////////////////////////////////////////

        //////////////////////////////////////////////////////////////////////////////////////////////////////////////

        //valide folder
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $arch_con = $_POST['archcona'];//cod archivo documental
        $arch_con_nom = $_POST['archnomcona'];//nom archivo documental

        $arch_file_prin = $_POST['archfilea'];//cod tip file =>Principal
        $arch_file_name_prin = $_POST['archfilenamea']; //nom tip file=> Principal

        $arch_file_aux = $_POST['folderauxiliar'];//cod tip file =>Auxiliar
        $arch_file_name_aux = $_POST['nomfolderauxiliar']; //nom tip file=>Auxiliar

        //Folder documents
        $nameruteraiz = $_SERVER['DOCUMENT_ROOT']."/sistema";//raiz
        $namefile = $_SERVER['DOCUMENT_ROOT']."/sistema/Folder/archivo/"; 
        $folder = $namefile.$arch_con_nom;// /sistema/Folder/archivo/A1
        $folderprop = $folder."/Arriendos";// /sistema/Folder/archivo/A1/Arriendos
        $filearriendo = $folderprop."/".$tip_con_nom."".$num_con; //  /sistema/Folder/archivo/A1/Arriendos/Arriendo#####
        
        //folder documents principal y auxiliar
        $descfileprin = $arch_file_name_prin."".$num_con; //desc file principal####
        $descfileaux = $arch_file_name_aux."".$num_con; //desc file auxiliar####

        //url para crear folders Principal y auxiliar
        $urlfileprin = $filearriendo."/".$descfileprin;
        $urlfileaux = $filearriendo."/".$descfileaux;

        //Folder documents base de datos
        $urldir = "Folder/archivo/".$arch_con_nom."/Arriendos"."/".$tip_con_nom."".$num_con; //url for bd

        //search cod_carp Principal y Auxiliar
        $validatefileVOprin = new fileVO();
        $validatefileVOprin = $getfolder->readFilecontract($arch_file_prin, $num_con);

        $validatefileVOaux = new fileVO();
        $validatefileVOaux = $getfolder->readFilecontract($arch_file_aux, $num_con);

        if($validatefileVOprin != null && $validatefileVOprin != "" && $validatefileVOaux != null && $validatefileVOaux != ""){
            //update file Principal
            $fileprinVO = new fileVO();
            $fileprinVO->setCod_tip_carp($arch_file_prin); //cod_tip_carp =>Principal
            $fileprinVO->setCod_reg_oper($num_con); //cod_reg_oper
            $fileprinVO->setDes_carp($descfileprin);
            $getfolder->update($fileprinVO);

            //update file Auxiliar
            $fileauxVO = new fileVO();
            $fileauxVO->setCod_tip_carp($arch_file_aux); //cod_tip_carp =>Auxiliar
            $fileauxVO->setCod_reg_oper($num_con); //cod_reg_oper
            $fileauxVO->setDes_carp($descfileaux);
            $getfolder->update($fileauxVO);
        }
        else{
            //create file Principal
            $fileprinVO = new fileVO();
            $fileprinVO->setCod_tip_carp($arch_file_prin); //cod_tip_carp =>Principal
            $fileprinVO->setCod_reg_oper($num_con); //cod_reg_oper
            $fileprinVO->setDes_carp($descfileprin);
            $getfolder->create($fileprinVO);

            //create file Auxiliar
            $fileauxVO = new fileVO();
            $fileauxVO->setCod_tip_carp($arch_file_aux); //cod_tip_carp =>Auxiliar
            $fileauxVO->setCod_reg_oper($num_con); //cod_reg_oper
            $fileauxVO->setDes_carp($descfileaux);
            $getfolder->create($fileauxVO);
        }

        //search cod_carp Principal
        $fileVOsearchprin = new fileVO();
        $fileVOsearchprin = $getfolder->readFilecontract($arch_file_prin, $num_con);

        //search cod_carp Auxiliar
        $fileVOsearchaux = new fileVO();
        $fileVOsearchaux = $getfolder->readFilecontract($arch_file_aux, $num_con);

        ///////////////////////////////////////////////////////////////////////////////////////////////////////

        //cod_carp Principal
        $cod_file_search_prin = $fileVOsearchprin->getCod_carp();//cod_carp
        $cod_doc_prop_prin = 0;

        //cod_carp Auxiliar
        $cod_file_search_aux = $fileVOsearchaux->getCod_carp();//cod_carp
        $cod_doc_prop_aux = 0; //este valor va cambiar

        //subserie documentales contrato de arrendamiento
        $subserie_form_vinc = $_POST['subserievina']; //id_suberie formatos de vinculacion
        $subserie_con_ar = $_POST['subserieca']; //id_suberie contrato de arrendamiento
        $subserie_req_ar = $_POST['subseriereqar']; //id_subserie requisitos de arrendatario
        $subserie_req_prop = $_POST['subserieprop']; //id_subserie requisitos de propietario

        if(file_exists($folder) && file_exists($folderprop) && file_exists($filearriendo)){
            
            //Inicia modificación de la carpeta principal de los documentos
            if(file_exists($urlfileprin)){
                
                //Inicio de modificación de la documentación de formatos de vinculación
                if(isset($_FILES['filesdocument0'])){

                    foreach($_FILES['filesdocument0']['tmp_name'] as $file=>$value){

                        if($file == 0){

                            if(!empty($_FILES['filesdocument0']['tmp_name'][$file])){
                                
                                $tiparchdoc = $_FILES['filesdocument0']['type'][$file];//tip_arch_doc
                                $namedocument = "Sol_Vin_Arriendo_Arrendatario_".$num_con;//nom doc
                                $ext = str_replace('.', '', strrchr($_FILES['filesdocument0']['name'][$file], '.')); //ext_arch_sop
                                $newdocument = "Sol_Vin_Arriendo_Arrendatario_".$num_con.".".$ext; //desc doc //name sop
                                $urldirdocument = $urldir."/".$descfileprin."/".$newdocument;//rep_sop

                                $docVOsearch = new documentVO();
                                $docVOsearch = $getdocument->readDocumentfileordendoc($cod_file_search_prin,$subserie_form_vinc,$file);

                                $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search

                                $datasop = array();

                                $datasop = $getsoporte->readSoporteDocument($cod_file_search_prin,$subserie_form_vinc,$cod_doc_search);

                                foreach($datasop as $sop){
                                    $rutedirupdatesop = strval($sop->getRep_sop());
                                    $rutedirupdate = $nameruteraiz."/".$rutedirupdatesop;
                                    $rutedir = $filearriendo."/".$descfileprin."/".$newdocument;

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
                                
                                $tiparchdoc = $_FILES['filesdocument0']['type'][$file];//tip_arch_doc
                                $namedocument = "Auto_Datos_Personales_Arrendatario_".$num_con;//nom doc
                                $ext = str_replace('.', '', strrchr($_FILES['filesdocument0']['name'][$file], '.')); //ext_arch_sop
                                $newdocument = "Auto_Datos_Personales_Arrendatario_".$num_con.".".$ext; //desc doc //name sop
                                $urldirdocument = $urldir."/".$descfileprin."/".$newdocument;//rep_sop

                                $docVOsearch = new documentVO();
                                $docVOsearch = $getdocument->readDocumentfileordendoc($cod_file_search_prin,$subserie_form_vinc,$file);

                                $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search

                                $datasop = array();

                                $datasop = $getsoporte->readSoporteDocument($cod_file_search_prin,$subserie_form_vinc,$cod_doc_search);

                                foreach($datasop as $sop){
                                    $rutedirupdatesop = strval($sop->getRep_sop());
                                    $rutedirupdate = $nameruteraiz."/".$rutedirupdatesop;
                                    $rutedir = $filearriendo."/".$descfileprin."/".$newdocument;

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
                                
                                $tiparchdoc = $_FILES['filesdocument0']['type'][$file];//tip_arch_doc
                                $namedocument = "Sol_Vin_Arriendo_CodeudorUno_".$num_con;//nom doc
                                $ext = str_replace('.', '', strrchr($_FILES['filesdocument0']['name'][$file], '.')); //ext_arch_sop
                                $newdocument = "Sol_Vin_Arriendo_CodeudorUno_".$num_con.".".$ext; //desc doc //name sop
                                $urldirdocument = $urldir."/".$descfileprin."/".$newdocument;//rep_sop

                                $docVOsearch = new documentVO();
                                $docVOsearch = $getdocument->readDocumentfileordendoc($cod_file_search_prin,$subserie_form_vinc,$file);

                                $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search

                                $datasop = array();

                                $datasop = $getsoporte->readSoporteDocument($cod_file_search_prin,$subserie_form_vinc,$cod_doc_search);

                                foreach($datasop as $sop){
                                    $rutedirupdatesop = strval($sop->getRep_sop());
                                    $rutedirupdate = $nameruteraiz."/".$rutedirupdatesop;
                                    $rutedir = $filearriendo."/".$descfileprin."/".$newdocument;

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
                                
                                $tiparchdoc = $_FILES['filesdocument0']['type'][$file];//tip_arch_doc
                                $namedocument = "Auto_Datos_Personales_CodeudorUno_".$num_con;//nom doc
                                $ext = str_replace('.', '', strrchr($_FILES['filesdocument0']['name'][$file], '.')); //ext_arch_sop
                                $newdocument = "Auto_Datos_Personales_CodeudorUno_".$num_con.".".$ext; //desc doc //name sop
                                $urldirdocument = $urldir."/".$descfileprin."/".$newdocument;//rep_sop

                                $docVOsearch = new documentVO();
                                $docVOsearch = $getdocument->readDocumentfileordendoc($cod_file_search_prin,$subserie_form_vinc,$file);

                                $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search

                                $datasop = array();

                                $datasop = $getsoporte->readSoporteDocument($cod_file_search_prin,$subserie_form_vinc,$cod_doc_search);

                                foreach($datasop as $sop){
                                    $rutedirupdatesop = strval($sop->getRep_sop());
                                    $rutedirupdate = $nameruteraiz."/".$rutedirupdatesop;
                                    $rutedir = $filearriendo."/".$descfileprin."/".$newdocument;

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

                        if($file == 4){

                            if(!empty($_FILES['filesdocument0']['tmp_name'][$file])){
                                
                                $tiparchdoc = $_FILES['filesdocument0']['type'][$file];//tip_arch_doc
                                $namedocument = "Sol_Vin_Arriendo_CodeudorDos_".$num_con;//nom doc
                                $ext = str_replace('.', '', strrchr($_FILES['filesdocument0']['name'][$file], '.')); //ext_arch_sop
                                $newdocument = "Sol_Vin_Arriendo_CodeudorDos_".$num_con.".".$ext; //desc doc //name sop
                                $urldirdocument = $urldir."/".$descfileprin."/".$newdocument;//rep_sop

                                $docVOsearch = new documentVO();
                                $docVOsearch = $getdocument->readDocumentfileordendoc($cod_file_search_prin,$subserie_form_vinc,$file);

                                $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search

                                $datasop = array();

                                $datasop = $getsoporte->readSoporteDocument($cod_file_search_prin,$subserie_form_vinc,$cod_doc_search);

                                foreach($datasop as $sop){
                                    $rutedirupdatesop = strval($sop->getRep_sop());
                                    $rutedirupdate = $nameruteraiz."/".$rutedirupdatesop;
                                    $rutedir = $filearriendo."/".$descfileprin."/".$newdocument;

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

                        if($file == 5){

                            if(!empty($_FILES['filesdocument0']['tmp_name'][$file])){
                                
                                $tiparchdoc = $_FILES['filesdocument0']['type'][$file];//tip_arch_doc
                                $namedocument = "Auto_Datos_Personales_CodeudorDos_".$num_con;//nom doc
                                $ext = str_replace('.', '', strrchr($_FILES['filesdocument0']['name'][$file], '.')); //ext_arch_sop
                                $newdocument = "Auto_Datos_Personales_CodeudorDos_".$num_con.".".$ext; //desc doc //name sop
                                $urldirdocument = $urldir."/".$descfileprin."/".$newdocument;//rep_sop

                                $docVOsearch = new documentVO();
                                $docVOsearch = $getdocument->readDocumentfileordendoc($cod_file_search_prin,$subserie_form_vinc,$file);

                                $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search

                                $datasop = array();

                                $datasop = $getsoporte->readSoporteDocument($cod_file_search_prin,$subserie_form_vinc,$cod_doc_search);

                                foreach($datasop as $sop){
                                    $rutedirupdatesop = strval($sop->getRep_sop());
                                    $rutedirupdate = $nameruteraiz."/".$rutedirupdatesop;
                                    $rutedir = $filearriendo."/".$descfileprin."/".$newdocument;

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
                //Finalización de la modificación de los formatos de vinculación

                //Inicio de la modificación del contrato de arrendamiento
                if(isset($_FILES['filesdocument1'])){

                    foreach($_FILES['filesdocument1']['tmp_name'] as $file=>$value){
                        
                        if($file == 0){

                            if(!empty($_FILES['filesdocument1']['tmp_name'][$file])){
                                
                                $tiparchdoc = $_FILES['filesdocument1']['type'][$file];//tip_arch_doc
                                $namedocument = "Contrato_Arrendamiento_".$num_con;//nom doc
                                $ext = str_replace('.', '', strrchr($_FILES['filesdocument1']['name'][$file], '.')); //ext_arch_sop
                                $newdocument = "Contrato_Arrendamiento_".$num_con.".".$ext; //desc doc //name sop
                                $urldirdocument = $urldir."/".$descfileprin."/".$newdocument;//rep_sop

                                $docVOsearch = new documentVO();
                                $docVOsearch = $getdocument->readDocumentfileordendoc($cod_file_search_prin,$subserie_con_ar,$file);

                                $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search

                                $datasop = array();

                                $datasop = $getsoporte->readSoporteDocument($cod_file_search_prin,$subserie_con_ar,$cod_doc_search);

                                foreach($datasop as $sop){
                                    $rutedirupdatesop = strval($sop->getRep_sop());
                                    $rutedirupdate = $nameruteraiz."/".$rutedirupdatesop;
                                    $rutedir = $filearriendo."/".$descfileprin."/".$newdocument;

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

            }
            //Termina modificación de los documentos de la carpeta principal

            //Inicia modificación de los documentos de la carpeta auxiliar
            if(file_exists($urlfileaux)){

                if(isset($_FILES['filesdocument2'])){

                    foreach($_FILES['filesdocument2']['tmp_name'] as $file=>$value){

                        if($file == 0){
                            if(!empty($_FILES['filesdocument2']['tmp_name'][$file])){
                                
                                $tiparchdoc = $_FILES['filesdocument2']['type'][$file];//tip_arch_doc
                                $namedocument = "Fot_Ced_Arrendatario_150_".$num_con;//nom doc
                                $ext = str_replace('.', '', strrchr($_FILES['filesdocument2']['name'][$file], '.')); //ext_arch_sop
                                $newdocument = "Fot_Ced_Arrendatario_150_".$num_con.".".$ext; //desc doc //name sop
                                $urldirdocument = $urldir."/".$descfileaux."/".$newdocument;//rep_sop

                                print("=>file auxiliar=>".$cod_file_search_aux);
                                print("=>subserie documental=>".$subserie_req_ar);
                                print("=>orden documento=>".$file);

                                $docVOsearch = new documentVO();
                                $docVOsearch = $getdocument->readDocumentfileordendoc($cod_file_search_aux,$subserie_req_ar,$file);

                                $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search

                                $datasop = array();

                                $datasop = $getsoporte->readSoporteDocument($cod_file_search_aux,$subserie_req_ar,$cod_doc_search);

                                foreach($datasop as $sop){
                                    $rutedirupdatesop = strval($sop->getRep_sop());
                                    $rutedirupdate = $nameruteraiz."/".$rutedirupdatesop;
                                    $rutedir = $filearriendo."/".$descfileaux."/".$newdocument;

                                    if(file_exists($rutedirupdate)){
                                        unlink($rutedirupdate);
                                        move_uploaded_file($_FILES['filesdocument2']['tmp_name'][$file], $rutedir);
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
                            if(!empty($_FILES['filesdocument2']['tmp_name'][$file])){
                                
                                $tiparchdoc = $_FILES['filesdocument2']['type'][$file];//tip_arch_doc
                                $namedocument = "Copia_Rut_Arrendatario_".$num_con;//nom doc
                                $ext = str_replace('.', '', strrchr($_FILES['filesdocument2']['name'][$file], '.')); //ext_arch_sop
                                $newdocument = "Copia_Rut_Arrendatario_".$num_con.".".$ext; //desc doc //name sop
                                $urldirdocument = $urldir."/".$descfileaux."/".$newdocument;//rep_sop

                                $docVOsearch = new documentVO();
                                $docVOsearch = $getdocument->readDocumentfileordendoc($cod_file_search_aux,$subserie_req_ar,$file);

                                $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search

                                $datasop = array();

                                $datasop = $getsoporte->readSoporteDocument($cod_file_search_aux,$subserie_req_ar,$cod_doc_search);

                                foreach($datasop as $sop){
                                    $rutedirupdatesop = strval($sop->getRep_sop());
                                    $rutedirupdate = $nameruteraiz."/".$rutedirupdatesop;
                                    $rutedir = $filearriendo."/".$descfileaux."/".$newdocument;

                                    if(file_exists($rutedirupdate)){
                                        unlink($rutedirupdate);
                                        move_uploaded_file($_FILES['filesdocument2']['tmp_name'][$file], $rutedir);
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

                        //varios archivos
                        if($file == 2){
                            //validar
                            //if(!empty($_FILES['filesdocument2']['tmp_name'][$file])){
                                //$tiparchdoc = $_FILES['filesdocument2']['type'][$file];//tip_arch_doc
                                //$nomtemp = $_FILES['filesdocument2']['tmp_name'][$file];
                                //$ext = str_replace('.', '', strrchr($_FILES['filesdocument2']['name'][$file], '.'));

                            //}
                        }

                        if($file == 3){
                            if(!empty($_FILES['filesdocument2']['tmp_name'][$file])){
                                
                                $tiparchdoc = $_FILES['filesdocument2']['type'][$file];//tip_arch_doc
                                $namedocument = "Fot_Ced_CodeudorUno_150_".$num_con;//nom doc
                                $ext = str_replace('.', '', strrchr($_FILES['filesdocument2']['name'][$file], '.')); //ext_arch_sop
                                $newdocument = "Fot_Ced_CodeudorUno_150_".$num_con.".".$ext; //desc doc //name sop
                                $urldirdocument = $urldir."/".$descfileaux."/".$newdocument;//rep_sop

                                $docVOsearch = new documentVO();
                                $docVOsearch = $getdocument->readDocumentfileordendoc($cod_file_search_aux,$subserie_req_ar,$file);

                                $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search

                                $datasop = array();

                                $datasop = $getsoporte->readSoporteDocument($cod_file_search_aux,$subserie_req_ar,$cod_doc_search);

                                foreach($datasop as $sop){
                                    $rutedirupdatesop = strval($sop->getRep_sop());
                                    $rutedirupdate = $nameruteraiz."/".$rutedirupdatesop;
                                    $rutedir = $filearriendo."/".$descfileaux."/".$newdocument;

                                    if(file_exists($rutedirupdate)){
                                        unlink($rutedirupdate);
                                        move_uploaded_file($_FILES['filesdocument2']['tmp_name'][$file], $rutedir);
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

                        if($file == 4){
                            if(!empty($_FILES['filesdocument2']['tmp_name'][$file])){
                                
                                $tiparchdoc = $_FILES['filesdocument2']['type'][$file];//tip_arch_doc
                                $namedocument = "Copia_Rut_CodeudorUno_".$num_con;//nom doc
                                $ext = str_replace('.', '', strrchr($_FILES['filesdocument2']['name'][$file], '.')); //ext_arch_sop
                                $newdocument = "Copia_Rut_CodeudorUno_".$num_con.".".$ext; //desc doc //name sop
                                $urldirdocument = $urldir."/".$descfileaux."/".$newdocument;//rep_sop

                                $docVOsearch = new documentVO();
                                $docVOsearch = $getdocument->readDocumentfileordendoc($cod_file_search_aux,$subserie_req_ar,$file);

                                $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search

                                $datasop = array();

                                $datasop = $getsoporte->readSoporteDocument($cod_file_search_aux,$subserie_req_ar,$cod_doc_search);

                                foreach($datasop as $sop){
                                    $rutedirupdatesop = strval($sop->getRep_sop());
                                    $rutedirupdate = $nameruteraiz."/".$rutedirupdatesop;
                                    $rutedir = $filearriendo."/".$descfileaux."/".$newdocument;

                                    if(file_exists($rutedirupdate)){
                                        unlink($rutedirupdate);
                                        move_uploaded_file($_FILES['filesdocument2']['tmp_name'][$file], $rutedir);
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

                        //varios archivos
                        if($file == 5){
                            //validar
                        }

                        if($file == 6){
                            if(!empty($_FILES['filesdocument2']['tmp_name'][$file])){
                                
                                $tiparchdoc = $_FILES['filesdocument2']['type'][$file];//tip_arch_doc
                                $namedocument = "Fot_Ced_CodeudorDos_150_".$num_con;//nom doc
                                $ext = str_replace('.', '', strrchr($_FILES['filesdocument2']['name'][$file], '.')); //ext_arch_sop
                                $newdocument = "Fot_Ced_CodeudorDos_150_".$num_con.".".$ext; //desc doc //name sop
                                $urldirdocument = $urldir."/".$descfileaux."/".$newdocument;//rep_sop

                                $docVOsearch = new documentVO();
                                $docVOsearch = $getdocument->readDocumentfileordendoc($cod_file_search_aux,$subserie_req_ar,$file);

                                $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search

                                $datasop = array();

                                $datasop = $getsoporte->readSoporteDocument($cod_file_search_aux,$subserie_req_ar,$cod_doc_search);

                                foreach($datasop as $sop){
                                    $rutedirupdatesop = strval($sop->getRep_sop());
                                    $rutedirupdate = $nameruteraiz."/".$rutedirupdatesop;
                                    $rutedir = $filearriendo."/".$descfileaux."/".$newdocument;

                                    if(file_exists($rutedirupdate)){
                                        unlink($rutedirupdate);
                                        move_uploaded_file($_FILES['filesdocument2']['tmp_name'][$file], $rutedir);
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

                        if($file == 7){
                            if(!empty($_FILES['filesdocument2']['tmp_name'][$file])){
                                
                                $tiparchdoc = $_FILES['filesdocument2']['type'][$file];//tip_arch_doc
                                $namedocument = "Copia_Rut_CodeudorDos_".$num_con;//nom doc
                                $ext = str_replace('.', '', strrchr($_FILES['filesdocument2']['name'][$file], '.')); //ext_arch_sop
                                $newdocument = "Copia_Rut_CodeudorDos_".$num_con.".".$ext; //desc doc //name sop
                                $urldirdocument = $urldir."/".$descfileaux."/".$newdocument;//rep_sop

                                $docVOsearch = new documentVO();
                                $docVOsearch = $getdocument->readDocumentfileordendoc($cod_file_search_aux,$subserie_req_ar,$file);

                                $cod_doc_search = $docVOsearch->getCod_doc();//cod_doc_search

                                $datasop = array();

                                $datasop = $getsoporte->readSoporteDocument($cod_file_search_aux,$subserie_req_ar,$cod_doc_search);

                                foreach($datasop as $sop){
                                    $rutedirupdatesop = strval($sop->getRep_sop());
                                    $rutedirupdate = $nameruteraiz."/".$rutedirupdatesop;
                                    $rutedir = $filearriendo."/".$descfileaux."/".$newdocument;

                                    if(file_exists($rutedirupdate)){
                                        unlink($rutedirupdate);
                                        move_uploaded_file($_FILES['filesdocument2']['tmp_name'][$file], $rutedir);
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

            }
        }
    }


?>