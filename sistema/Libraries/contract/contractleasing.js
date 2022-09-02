$(document).ready(function() {

    $("#subseriea").prop('disabled', true);

    $("#contractpro").change(function(e){
        e.preventDefault();
        let validarselect = $(this);
        let llenarselect = $("#subseriea");
        getcontractmandate(validarselect, llenarselect);
        getidprop(validarselect);
    });

    $("#subseriea").change(function(e){
        e.preventDefault();
        let selectuno = $("#contractpro");
        let selectdos = $(this);
        getdocumentsubserie(selectuno, selectdos);
    });

    $("#filedoca").prop('disabled', true);
    $("#auxiliara").prop('disabled', true);

    $("#tiparcha").change(function(e){
        e.preventDefault();
        let selectuno = $(this);
        let selectdos = $("#filedoca");
        let selectres = $("#auxiliara");
        getipcarp(selectuno, selectdos, selectres);
    });

    $("#contracta").prop('disabled', true);
    $("#formatovin").prop('disabled', true);
    $("#arrendatarioa").prop('disabled', true);
    $("#reqprop").prop('disabled', true);

    $("#seriedoca").change(function(e){
        e.preventDefault();
        let selectuno = $(this);
        let selectdos = $("#formatovin");
        let selectres = $("#contracta");
        let selectcuatro = $("#arrendatarioa");
        let selectcinco = $("#reqprop");
        getsubserie(selectuno, selectdos, selectres, selectcuatro, selectcinco);
    });

    $("#cc").change(function(e){
        e.preventDefault();
        getprop();
    });

    $("#cc1").change(function(e){
        e.preventDefault();
        getcodeudoruno();
    });

    $("#cc2").change(function(e){
        e.preventDefault();
        getcodeudordos();
    });

    $("#create").on("click", function(e){
        e.preventDefault();
        setdatacreate();
        clearcreate()
        alert("Registro con éxito");
        closeagregar();
    });
    

 });

 function getdocumentsubserie(selectuno, selectdos){
    $(".body_container_archivo").html('');
    if(selectuno.val() !== "" && selectdos.val() !== ""){
        let url = "../"
        let barra = "/";
        let punto =".";
        let cod_reg_oper = selectuno.val();
        let idsubse = selectdos.val();
        let option = "searchdocuments";
        let data = {"codregoper" : cod_reg_oper, "idsubse": idsubse, "accion" : option}

        $.ajax({
            data: data,
            url: "../Libraries/document/documentajax.php",
            type: "POST",
            success: function(response){
                $(response.data).each(function(data, r){ // indice, valor
                    if(r.ext_arch_sop === "doc" || r.ext_arch_sop === "docx"){
                        $(".body_container_archivo").append('<div class="body_label"><label>'+r.nom_doc+'</label></div><a title="'+r.nom_doc+'" href="'+url+r.rep_sop+'" download target="_blank"><img src="../Assets/imagenes/doc.png" width="30" height="32"/></a>');   
                    }
                    if(r.ext_arch_sop === "pdf"){
                        $(".body_container_archivo").append('<div class="body_label"><label>'+r.nom_doc+'</label></div><a title="'+r.nom_doc+'" href="'+url+r.rep_sop+'" download target="_blank"><img src="../Assets/imagenes/pdf.png" width="30" height="32"/></a>');   
                    }
                    if(r.ext_arch_sop === "jpg" || r.ext_arch_sop === "jpeg" || r.ext_arch_sop === "png" || r.ext_arch_sop === "gif"){
                        $(".body_container_archivo").append('<div class="body_label"><label>'+r.nom_doc+'</label><a title="'+r.nom_doc+'" href="'+url+r.rep_sop+barra+r.nom_sop+punto+r.ext_arch_sop+'" download></div><img src="'+url+r.rep_sop+barra+r.nom_sop+punto+r.ext_arch_sop+'" width="120" height="150"/></a>');
                    }
                    
                })
            }
        });
    }    
 }

 function getidprop(selectuno){
    if(selectuno.val() !== ""){
        let cod_reg_oper = selectuno.val();
        let option = "searchproperty";
        data = {"codregoper": cod_reg_oper, "accion" : option};

        $.ajax({
            data: data,
            url: "../Libraries/property/propertyajax.php",
            type: "POST",
            success: function(response){
                $(response.data).each(function(data, r){ // indice, valor
                    $("#idprop").val(r.id_prop);
                })
            }
        });

    }
 }

 function getcontractmandate(validateselect, llenarselect){
    if(validateselect.val() !== ""){
        let cod_reg_oper = validateselect.val();
        let option = "subserie";
        data = {"codregoper": cod_reg_oper, "accion" : option};
        $.ajax({
            data: data,
            url: "../Libraries/document/documentajax.php",
            type: "POST",
            success: function(response){
                validateselect.prop('disabled', false);
                llenarselect.find('option').remove();
                llenarselect.append('<option value="" selected>Seleccione Subserie Documental</option>');
                $(response.data).each(function(data, r){ // indice, valor
                        llenarselect.append('<option value="' + r.id_subse + '">'+r.nom_subse+'</option>');      
                })
                llenarselect.prop('disabled', false);
            },
            error: function(error){
                console.log(error);
                alert('Ocurrio un error en el servidor ..');
                validateselect.prop('disabled', false);
            }
        });
    }
    else{
        llenarselect.find('option').remove();
        llenarselect.prop('disabled', true);
    }
 }

 function getipcarp(selectuno, selectdos, selectres){
    if(selectuno.val() !== ""){
        let archivo = selectuno.val();
        datos = {"codarchivo":archivo};
        $.ajax({
            data: datos,
            url: "../Libraries/file/typefileajax.php",
            type: "POST",
            success: function(response){
                selectuno.prop('disabled', false);
                selectdos.find('option').remove();
                selectres.find('option').remove();
                $(response.data).each(function(data, r){ // indice, valor
                    if(archivo == r.cod_arch){
                        selectdos.append('<option value="' + r.cod_tip_carp + '">' + r.nom_tip_carp + '</option>');
                        selectres.append('<option value="' + r.cod_tip_carp + '">' + r.nom_tip_carp + '</option>');        
                    }
                })
                selectdos.prop('disabled', false);
                selectres.prop('disabled', false);
            },
            error: function(error){
                console.log(error);
                alert('Ocurrio un error en el servidor ..');
                selectuno.prop('disabled', false);
            }
        });
    }
    else{
        selectdos.find('option').remove();
        selectdos.prop('disabled', true);
        selectres.find('option').remove();
        selectres.prop('disabled', true);
    }
 }


 function getsubserie(selectuno, selectdos, selectres, selectcuatro, selectcinco){
    if(selectuno.val() !== ""){
        let idserie = selectuno.val();
        datos = {"idserie":idserie};
        $.ajax({
            data: datos,
            url: "../Libraries/serie/subserieajax.php",
            type: "POST",
            success: function(response){
                selectuno.prop('disabled', false);
                selectdos.find('option').remove();
                selectres.find('option').remove();
                selectcuatro.find('option').remove();
                selectcinco.find('option').remove();
                $(response.data).each(function(data, r){ // indice, valor
                    if(idserie == r.id_serie){
                        selectdos.append('<option value="' + r.id_subse + '">' + r.nom_subse + '</option>');   
                        selectres.append('<option value="' + r.id_subse + '">' + r.nom_subse + '</option>');
                        selectcuatro.append('<option value="' + r.id_subse + '">' + r.nom_subse + '</option>');
                        selectcinco.append('<option value="' + r.id_subse + '">' + r.nom_subse + '</option>');    
                    }
                })
                selectdos.prop('disabled', false);
                selectres.prop('disabled', false);
                selectcuatro.prop('disabled', false);
                selectcinco.prop('disabled', false);
            },
            error: function(error){
                console.log(error);
                alert('Ocurrio un error en el servidor ..');
                selectuno.prop('disabled', false);
            }
        });
    }
    else{
        selectdos.find('option').remove();
        selectdos.prop('disabled', true);
        selectres.find('option').remove();
        selectres.prop('disabled', true);
        selectcuatro.find('option').remove();
        selectcuatro.prop('disabled', true);
        selectcinco.find('option').remove();
        selectcinco.prop('disabled', true);
    }
 }

 function getprop(){

    if($("#cc option:selected").val() !== ""){
        let cedpers = $("#cc").val();
        datos = {"cedpers":cedpers};
        $.ajax({
            data: datos,
            url: "../Libraries/person/personajax.php",
            type: "POST",
            success: function(response){
                $(response.data).each(function(data, r){ // indice, valor
                    if(cedpers == r.ced_pers){
                        $("#idemp").val(r.id_emp);
                        $("#ccperson").val(r.ced_pers);
                        $("#nameperson").val(r.nom_pers);
                        $("#lastperson").val(r.ape_pers);
                        $("#dateccperson").val(r.fec_exp_ced_pers);
                        $("#celperson").val(r.cel_pers);
                        $("#teleperson").val(r.tel_pers);
                        $("#corperson").val(r.email_pers);
                        $("#direcperson").val(r.dir_pers);
                        $("#cityperson").val(r.ciud_pers);
                        $("#genperson").val(r.sex_pers);
                    }
                })
            },
            error: function(error){
                console.log(error);
            }
        });
    }
    else{
        $("#idemp").val('');
        $("#ccperson").val('');
        $("#nameperson").val('');
        $("#lastperson").val('');
        $("#dateccperson").val('');
        $("#celperson").val('');
        $("#teleperson").val('');
        $("#corperson").val('');
        $("#direcperson").val('');
        $("#cityperson").val('');
        $("#genperson").val('');
        $("#cc").val('');
    }
   
}

function getcodeudoruno(){

    if($("#cc1 option:selected").val() !== ""){
        let cedpers = $("#cc1").val();
        datos = {"cedpers":cedpers};
        $.ajax({
            data: datos,
            url: "../Libraries/person/personajax.php",
            type: "POST",
            success: function(response){
                $(response.data).each(function(data, r){ // indice, valor
                    if(cedpers == r.ced_pers){
                        $("#idemp1").val(r.id_emp);
                        $("#ccperson1").val(r.ced_pers);
                        $("#nameperson1").val(r.nom_pers);
                        $("#lastperson1").val(r.ape_pers);
                        $("#dateccperson1").val(r.fec_exp_ced_pers);
                        $("#celperson1").val(r.cel_pers);
                        $("#teleperson1").val(r.tel_pers);
                        $("#corperson1").val(r.email_pers);
                        $("#direcperson1").val(r.dir_pers);
                        $("#cityperson1").val(r.ciud_pers);
                        $("#genperson1").val(r.sex_pers);
                    }
                })
            },
            error: function(error){
                console.log(error);
            }
        });
    }
    else{
        $("#idemp1").val('');
        $("#ccperson1").val('');
        $("#nameperson1").val('');
        $("#lastperson1").val('');
        $("#dateccperson1").val('');
        $("#celperson1").val('');
        $("#teleperson1").val('');
        $("#corperson1").val('');
        $("#direcperson1").val('');
        $("#cityperson1").val('');
        $("#genperson1").val('');
        $("#cc1").val('');
    }
   
}

function getcodeudordos(){

    if($("#cc2 option:selected").val() !== ""){
        let cedpers = $("#cc2").val();
        datos = {"cedpers":cedpers};
        $.ajax({
            data: datos,
            url: "../Libraries/person/personajax.php",
            type: "POST",
            success: function(response){
                $(response.data).each(function(data, r){ // indice, valor
                    if(cedpers == r.ced_pers){
                        $("#idemp2").val(r.id_emp);
                        $("#ccperson2").val(r.ced_pers);
                        $("#nameperson2").val(r.nom_pers);
                        $("#lastperson2").val(r.ape_pers);
                        $("#dateccperson2").val(r.fec_exp_ced_pers);
                        $("#celperson2").val(r.cel_pers);
                        $("#teleperson2").val(r.tel_pers);
                        $("#corperson2").val(r.email_pers);
                        $("#direcperson2").val(r.dir_pers);
                        $("#cityperson2").val(r.ciud_pers);
                        $("#genperson2").val(r.sex_pers);
                    }
                })
            },
            error: function(error){
                console.log(error);
            }
        });
    }
    else{
        $("#idemp2").val('');
        $("#ccperson2").val('');
        $("#nameperson2").val('');
        $("#lastperson2").val('');
        $("#dateccperson2").val('');
        $("#celperson2").val('');
        $("#teleperson2").val('');
        $("#corperson2").val('');
        $("#direcperson2").val('');
        $("#cityperson2").val('');
        $("#genperson2").val('');
        $("#cc2").val('');
    }
   
}

 
function setdatacreate(){

    //data contrato arrendamiento
    let num_con = $("#numcontracta").val();
    let tip_con = $("#tipcontracta option:selected").val();
    let tip_con_nom = $("#tipcontracta option:selected").text();

    //person =>arrendatario
    let pers_con = $("#perscontracta option:selected").val();

    //person =>codeudor 1
    let pers_concodeudoruno = $("#perscontractac1 option:selected").val();

    //person =>codeudor 2
    let pers_concodeudordos = $("#perscontractac2 option:selected").val();

    //archivo documental
    let archcon = $("#tiparcha option:selected").val();
    let archconnom = $("#tiparcha option:selected").text();

    //carpeta documental principal =>Principal
    let archfile = $("#filedoca option:selected").val();
    let archfilename = $("#filedoca option:selected").text();
    
    //serie documental para referenciar => contrato arrendamiento
    let serie_doca = $('#seriedoca option:selected').val();
    let nom_serie_doca = $('#seriedoca option_selected').text();

    //subserie documental =>Formatos de vinculación
    let subserie_vin = $('#formatovin option:selected').val();
    let nom_subse_vin = $('#formatovin option_selected').text();

    //document vinculación arrendatario
    let for_vinc_a = $("#sva").prop("files")[0];
    let auto_uso_data_a = $("#auda").prop("files")[0];

    //document vinculación codeudor 1
    let for_vin_cuno = $("#svcuno").prop("files")[0];
    let auto_uso_data_cuno = $("#audcuno").prop("files")[0];

    //document vinculación codeudor 2
    let for_vin_cdos = $("#svcdos").prop("files")[0];
    let auto_uso_data_cdos = $("#audcdos").prop("files")[0];

    //subserie contrato de arriendamiento
    let subserie_ca = $("#contracta option:selected").val();
    let nom_subserie_ca = $("#contracta option:selected").text();

    //document contrato arrendamiento
    let con_ar = $("#ca").prop("files")[0];

    //data arrendatario
    let id_emp = $("#idemp").val();
    let ced_pers = $("#ccperson").val();
    let name_pers = $("#nameperson").val();
    let last_pers = $("#lastperson").val();
    let date_ced_pers = $("#dateccperson").val();
    let cel_pers = $("#celperson").val();
    let tele_pers = $("#teleperson").val();
    let cor_pers = $("#corperson").val();
    let dir_pers = $("#direcperson").val();
    let ciud_pers = $("#cityperson").val();
    let sex_pers = $("#genperson option:selected").val();

    //data codeudor1
    let id_emp1 = $("#idemp1").val();
    let ced_pers1 = $("#ccperson1").val();
    let name_pers1 = $("#nameperson1").val();
    let last_pers1 = $("#lastperson1").val();
    let date_ced_pers1 = $("#dateccperson1").val();
    let cel_pers1 = $("#celperson1").val();
    let tele_pers1 = $("#teleperson1").val();
    let cor_pers1 = $("#corperson1").val();
    let dir_pers1 = $("#direcperson1").val();
    let ciud_pers1 = $("#cityperson1").val();
    let sex_pers1 = $("#genperson1 option:selected").val();

    //data codeudor2
    let id_emp2 = $("#idemp2").val();
    let ced_pers2 = $("#ccperson2").val();
    let name_pers2 = $("#nameperson2").val();
    let last_pers2 = $("#lastperson2").val();
    let date_ced_pers2 = $("#dateccperson2").val();
    let cel_pers2 = $("#celperson2").val();
    let tele_pers2 = $("#teleperson2").val();
    let cor_pers2 = $("#corperson2").val();
    let dir_pers2 = $("#direcperson2").val();
    let ciud_pers2 = $("#cityperson2").val();
    let sex_pers2 = $("#genperson2 option:selected").val();

    //subserie requisitos de arrendatario
    let subserie_arr = $("#arrendatarioa option:selected").val();
    let nom_subserie_arr = $("#arrendatarioa option:selected").text();

    //data property
    let id_prop_a =  $("#idprop").val();

    //carpeta documental auxiliar =>Auxiliar
    let folderaux = $("#auxiliara option:selected").val();
    let nomfolderaux = $("#auxiliara option:selected").text();

    //documentos del arrendatario
    let fot_ced_a = $("#fcca").prop("files")[0];
    let cop_rut_a = $("#cra").prop("files")[0];

    //documentos del codeudor 1
    let fot_ced_c1 = $("#fcccuno").prop("files")[0];
    let cop_rut_c1 = $("#crcuno").prop("files")[0];
    

    //documentos del codeudor 2
    let fot_ced_c2 = $("#fcccdos").prop("files")[0];
    let cop_rut_c2 = $("#crcdos").prop("files")[0];
    

    //referenciar contrato de mandato con los documents =>num_contrato
    let cod_reg_oper_contract_mandate = $("#contractpro option:selected").val();
    
    //referenciar subserie del contrato de mandato en los requisitos del propietario
    let id_subserie_contract_mandate = $("#subseriea option:selected").val();

    //subserie requisitos de propetario
    let subserie_prop = $("#reqprop option:selected").val();
    let nom_subserie_prop = $("#reqprop option:selected").text();
    
    let option = $("button[id='create']").val();
   
        
            let formdata = new FormData();

            //data contrato de arrendamiento
            formdata.append("numcona", num_con);
            formdata.append("tipcona", tip_con);
            formdata.append("tipconoma", tip_con_nom);

            //persons contract
            formdata.append("perscona", pers_con);
            formdata.append("persconac1", pers_concodeudoruno);
            formdata.append("persconac2", pers_concodeudordos);

            //data archivo documental
            formdata.append("archcona", archcon);
            formdata.append("archconnoma", archconnom);

            //carpeta documental principal =>Principal
            formdata.append("archfilea", archfile);
            formdata.append("archfilenamea", archfilename);

            //serie documental para referenciar => contrato arrendamiento
            formdata.append("seriedoca", serie_doca);
            formdata.append("nomseriedoca", nom_serie_doca);
            
            //id_propiedad
            formdata.append("idpropar", id_prop_a);

            //data arrendatario
            formdata.append("idemp", id_emp);
            formdata.append("cedpers", ced_pers);
            formdata.append("namepers", name_pers);
            formdata.append("lastpers", last_pers);
            formdata.append("dateccpers", date_ced_pers);
            formdata.append("celpers", cel_pers);
            formdata.append("telepers", tele_pers);
            formdata.append("corpers", cor_pers);
            formdata.append("dirpers", dir_pers);
            formdata.append("ciudpers", ciud_pers);
            formdata.append("sexpers", sex_pers);

            //data codeudoruno
            formdata.append("idempc1", id_emp1);
            formdata.append("cedpersc1", ced_pers1);
            formdata.append("namepersc1", name_pers1);
            formdata.append("lastpersc1", last_pers1);
            formdata.append("dateccpersc1", date_ced_pers1);
            formdata.append("celpersc1", cel_pers1);
            formdata.append("telepersc1", tele_pers1);
            formdata.append("corpersc1", cor_pers1);
            formdata.append("dirpersc1", dir_pers1);
            formdata.append("ciudpersc1", ciud_pers1);
            formdata.append("sexpersc1", sex_pers1);

            //data codeudordos
            formdata.append("idempc2", id_emp2);
            formdata.append("cedpersc2", ced_pers2);
            formdata.append("namepersc2", name_pers2);
            formdata.append("lastpersc2", last_pers2);
            formdata.append("dateccpersc2", date_ced_pers2);
            formdata.append("celpersc2", cel_pers2);
            formdata.append("telepersc2", tele_pers2);
            formdata.append("corpersc2", cor_pers2);
            formdata.append("dirpersc2", dir_pers2);
            formdata.append("ciudpersc2", ciud_pers2);
            formdata.append("sexpersc2", sex_pers2);

            //subserie formatos de vinculación 
            formdata.append("subserievina", subserie_vin);
            formdata.append("nomsubsevina", nom_subse_vin);

            //subserie contrato de arrendamiento
            formdata.append("subserieca", subserie_ca);
            formdata.append("nomsubserieca", nom_subserie_ca);

            //subserie requisitos de arrendatario
            formdata.append("subseriearr", subserie_arr);
            formdata.append("nomsubseriearr", nom_subserie_arr);

            //subserie requisitos de propietario
            formdata.append("subserieprop", subserie_prop);
            formdata.append("nomsubserieprop", nom_subserie_prop);

            //carpeta documental auxiliar =>Auxiliar
            formdata.append("folderauxiliar", folderaux);
            formdata.append("nomfolderauxiliar", nomfolderaux);

            if($("#sva").prop("files").length > 0){
                formdata.append("forvinca", for_vinc_a);
            }

            if($("#auda").prop("files").length > 0){
                formdata.append("autousodataa", auto_uso_data_a);
            }

            if($("#svcuno").prop("files").length > 0){
                formdata.append("forvincuno", for_vin_cuno);
            }

            if($("#audcuno").prop("files").length > 0){
                formdata.append("autousodatacuno", auto_uso_data_cuno);
            }

            if($("#svcdos").prop("files").length > 0){
                formdata.append("forvincdos", for_vin_cdos);
            }

            if($("#audcdos").prop("files").length > 0){
                formdata.append("autousodatacdos", auto_uso_data_cdos);
            }

            if($("#ca").prop("files").length > 0){
                formdata.append("conar", con_ar);
            }

            if($("#fcca").prop("files").length > 0){
                formdata.append("fotceda", fot_ced_a);
            }

            if($("#cra").prop("files").length > 0){
                formdata.append("copruta", cop_rut_a);
            }

            if($("#fcccuno").prop("files").length > 0){
                formdata.append("fotcedc1", fot_ced_c1);
            }

            if($("#crcuno").prop("files").length > 0){
                formdata.append("coprutc1", cop_rut_c1);
            }

            if($("#fcccdos").prop("files").length > 0){
                formdata.append("fotcedc2", fot_ced_c2);
            }

            if($("#crcdos").prop("files").length > 0){
                formdata.append("coprutc2", cop_rut_c2);
            }

            let sop_act_lab_a = $("#sopactlaba").prop("files").length; //>0

            if(sop_act_lab_a > 0){
                for(i=0; i< sop_act_lab_a; i++){
                    formdata.append('sopactlaba['+i+']', $("#sopactlaba").prop("files")[i]); 
                }
            }

            let sop_act_lab_c1 = $("#sopactlabcuno").prop("files").length; //>0

            if(sop_act_lab_c1 > 0){
                for(i=0; i< sop_act_lab_c1; i++){
                    formdata.append('sopactlabcuno['+i+']', $("#sopactlabcuno").prop("files")[i]); 
                }
            }

            let sop_act_lab_c2 = $("#sopactlabcdos").prop("files").length; //>0
            
            if(sop_act_lab_c2 > 0){
                for(i=0; i< sop_act_lab_c2; i++){
                    formdata.append('sopactlabcdos['+i+']', $("#sopactlabcdos").prop("files")[i]); 
                }
            }
            
            formdata.append("codregopercontractmandate", cod_reg_oper_contract_mandate);
            formdata.append("idsubseriecontractmandate", id_subserie_contract_mandate);
            

            formdata.append("accion", option);

            $.ajax({
                data: formdata,
                url: "../Libraries/contract/contractleasingajax.php",
                type: "POST",
                cache:false,
                contentType: false,
                processData: false,
                success: function(response){
                    console.log(response);
                },
                error: function(error){
                    console.log(error);
                }
            });
        

}


function clearcreate() {
    $("#idemp").val('');
    $("#ccperson").val('');
    $("#nameperson").val('');
    $("#lastperson").val('');
    $("#dateccperson").val('');
    $("#celperson").val('');
    $("#teleperson").val('');
    $("#corperson").val('');
    $("#direcperson").val('');
    $("#cityperson").val('');
    $("#genperson").val('');
    $("#seriepro").val('');
    $("#subsepro").val('');
    
    $("#cc").val('');

    $("#fcc").val('');
    $("#cdr").val('');
    $("#cbp").val('');

    $("#numinmueble").val('');
    $("#tipinmueble").val('');
    $("#dirinmueble").val('');
    $("#ciudinmueble").val('');
    $("#descinmueble").val('');
    $("#serieinm").val('');
    $("#subseinm").val('');

    $("#esci").val('');
    $("#clei").val('');
    $("#ddi").val(''); 
    $("#daf").val(''); //Data opcional 

    $("#fotos").val('');
}

function closeagregar(){
    $(".content").load("../Views/welcome.php");   ;//Ojo con el direccionamiento de la ruta
  }
