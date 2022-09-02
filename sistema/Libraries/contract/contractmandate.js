$(document).ready(function() {

    $("#filedoc").prop('disabled', true);

    $("#tiparch").change(function(e){
        e.preventDefault();
        let selectuno = $(this);
        let selectdos = $("#filedoc");
        getipcarp(selectuno, selectdos);
    });

    $("#subsepro").prop('disabled', true);
    $("#subseinm").prop('disabled', true);

    $("#seriedoc").change(function(e){
        e.preventDefault();
        let selectuno = $(this);
        let selectdos = $("#subsepro");
        let selectres = $("#subseinm");
        getsubserie(selectuno, selectdos, selectres);
    });

    $("#cc").change(function(e){
        e.preventDefault();
        getprop();
    });

    $("#create").on("click", function(e){
        e.preventDefault();
        setdatacreate();
        clearcreate();
        alert("Registro con éxito");
        closeagregar();
    });

    $('input[data-previewable=\"true\"]' ).change(function(e) {
        e.preventDefault();
        let prvCnt = $(this).attr('data-preview-container');
        $(prvCnt).html('');
        filevalidation(this,prvCnt);
        //readURL(this, prvCnt);
    });

 });

 function getipcarp(selectuno, selectdos){
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
                selectdos.append('<option value="">Seleccione Carpeta Documental</option>');
                $(response.data).each(function(data, r){ // indice, valor
                    if(archivo == r.cod_arch){
                        selectdos.append('<option value="' + r.cod_tip_carp + '">' + r.nom_tip_carp + '</option>');       
                    }
                })
                selectdos.prop('disabled', false);
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
    }
 }


 function getsubserie(selectuno, selectdos, selectres){
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
                selectdos.append('<option value="">Seleccione Subserie Documental</option>');   
                selectres.append('<option value="">Seleccione Subserie Documental</option>'); 
                $(response.data).each(function(data, r){ // indice, valor
                    if(idserie == r.id_serie){
                        selectdos.append('<option value="' + r.id_subse + '">' + r.nom_subse + '</option>');   
                        selectres.append('<option value="' + r.id_subse + '">' + r.nom_subse + '</option>');    
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

 function filevalidation(input, component){
    let fileLength = input.files.length;
    let extension= ["image/jpeg","image/png","image/jpg","image/gif"];
    let i;
    for(i = 0; i < fileLength; i++){ 
        let file = input.files[i];
        let imagefile = file.type;
        if(!((imagefile==extension[0]) || (imagefile==extension[1]) || (imagefile==extension[2]) || (imagefile==extension[3]))){
            alert('Por favor la extensión debe ser imagen (JPEG/JPG/PNG/GIF).');
            $(input).val('');
        }
        else{
            readURL(file, component);
        }
    }
 }
 function readURL(file, component){
            //for(let i =0; i< input.files.length; i++){
                //let file = input.files[i];
                    let reader = new FileReader();
                    reader.onload = function (e) {
                        let img = $('<img>');
                        img.attr('src', e.target.result).width(300).height(330);
                        img.appendTo(component);
                    }
                    reader.readAsDataURL(file);
            //}
}

function setdatacreate(){

    //data contrato
    let numcon = $("#numcontract").val();
    let archcon = $("#tiparch option:selected").val();
    let archconnom = $("#tiparch option:selected").text();
    let archfile = $("#filedoc option:selected").val();
    let archfilename = $("#filedoc option:selected").text();
    let tipcon = $("#tipcontract option:selected").val();
    let tipconom = $("#tipcontract option:selected").text();
    let perscon = $("#perscontract option:selected").val();

    //data propietario
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
    let subse_doc_pro = $("#subsepro option:selected").val();

    //data serie
    let serie_doc = $("#seriedoc option:selected").val();


    //data document propietario
    let con_man = $("#cdm").prop("files")[0];
    let fot_ced = $("#fcc").prop("files")[0];
    let cop_rut = $("#cdr").prop("files")[0];
    let cert_banca = $("#cbp").prop("files")[0];

    //data inmueble
    let num_mat_prop = $("#numinmueble").val();
    let tip_prop = $("#tipinmueble option:selected").val();
    let dir_prop = $("#dirinmueble").val();
    let ciud_prop = $("#ciudinmueble").val();
    let desc_prop = $("#descinmueble").val();
    let subse_doc_inm = $("#subseinm option:selected").val();

    //data document inmueble
    let esc_prop = $("#esci").prop("files")[0];
    let clei_prop = $("#clei").prop("files")[0];
    let ddi_prop = $("#ddi").prop("files")[0]; 
    let daf_prop = $("#daf").prop("files")[0]; //Data opcional 

    let option = $("button[id='create']").val();
    
    if(numcon !== null && numcon !== "" &&
    archcon !== null && archcon !== "" &&
    tipcon !== null && tipcon !== "" &&
    perscon !== null && perscon !== "" &&
    id_emp !== null && id_emp !== "" && 
    ced_pers !== null && ced_pers !== "" && 
    name_pers !== null && name_pers !== "" && 
    last_pers !== null && last_pers !== "" &&
    date_ced_pers !== null && date_ced_pers !== "" &&  
    cel_pers !== null && cel_pers !== "" && 
    tele_pers !== null && tele_pers !== "" && 
    cor_pers !== null && cor_pers !== "" && 
    dir_pers !== null && dir_pers !== "" && 
    ciud_pers !== null && ciud_pers !== "" && 
    sex_pers !== null && sex_pers !== "" && 
    serie_doc !== null && serie_doc !== "" && 
    subse_doc_pro !== null && subse_doc_pro !== "" && 
    con_man !== null && con_man !== "" &&
    fot_ced !== null && fot_ced !== "" && 
    cop_rut !== null && cop_rut !== "" && 
    cert_banca !== null && cert_banca !== "" && 
    num_mat_prop !== null && num_mat_prop !== "" && 
    tip_prop !== null && tip_prop !== "" && 
    dir_prop !== null && dir_prop !== "" && 
    ciud_prop !== null && ciud_prop !== "" && 
    desc_prop !== null && desc_prop !== "" &&
    subse_doc_inm !== null && subse_doc_inm !== "" &&  
    esc_prop !== null && esc_prop !== "" && 
    clei_prop !== null && clei_prop !== "" && 
    ddi_prop !== null && ddi_prop !== "" &&
    option !== null && option !== ""){
        
            let formdata = new FormData();

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
            formdata.append("subsedocpers", subse_doc_pro);

            formdata.append("seriedoc", serie_doc);

            formdata.append("numcontract", numcon);
            formdata.append("archcontract", archcon);
            formdata.append("nomarchcontract", archconnom);
            formdata.append("archfile", archfile);
            formdata.append("nomarchfile", archfilename);
            formdata.append("tipcontract", tipcon);
            formdata.append("nomtipcontract", tipconom);
            formdata.append("perscontract", perscon);
            
            formdata.append("contractman", con_man);
	        formdata.append("fotcedpers", fot_ced);
            formdata.append("coprutpers", cop_rut);
            formdata.append("certbanpers", cert_banca);
            
            formdata.append("numatprop", num_mat_prop);
            formdata.append("tiprop", tip_prop);
	        formdata.append("dirprop", dir_prop);
            formdata.append("ciudprop", ciud_prop);
            formdata.append("descprop", desc_prop);
            formdata.append("subsedocprop", subse_doc_inm);

            formdata.append("escprop", esc_prop);
	        formdata.append("cleiprop", clei_prop);
            formdata.append("ddiprop", ddi_prop);
            
            if($("#daf").prop("files").length > 0){
                formdata.append("dafprop", daf_prop);
            }
            let fotos = $("#fotos").prop("files").length;

            if(fotos>0){
                for(i=0; i< fotos; i++){
                    formdata.append('fotos['+i+']', $("#fotos").prop("files")[i]); 
                }
            }
            

	        //formdata.append("galeryprop", galery_prop);
            formdata.append("accion", option);


            $.ajax({
                data: formdata,
                url: "../Libraries/contract/contractmandateajax.php",
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
        else{
            alert("Datos incompletos");//Modificar alert Ojo.
        }

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
