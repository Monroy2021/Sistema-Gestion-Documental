$(document).ready(function() {
    let datatables = $('#tablageneral').DataTable( {
        "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            },
            "buttons": {
                "copy": "Copiar",
                "colvis": "Visibilidad"
            },
            },
                "lengthMenu":				[[10, 15, 20,-1], [10, 15, 20,"Todos"]],
                "iDisplayLength":			10,
                "responsive":               "true",
                "bJQueryUI":				"false",
                "ajax":{
                    "data" : {"accion" : "search"},
                    "method":"POST",
                    "url": "../Libraries/contract/contractmandateajax.php"
                },
                "columns": [
                    {"data":"id_prop"},
                    {"data":"cod_reg_oper"},
                    {"data":"ced_pers"},
                    {"data":"nom_pers"},
                    {"data":"ape_pers"},
                    { "responsivePriority": "1",
                        "data": null,
                        "defaultContent":'<a href="#" class="search" id="search" name="search">Consultar</a>'
                    }
                ]
            });

                            getdata('#tablageneral tbody', datatables);

                            $("#tablageneral tbody").on('click', 'a.search', function () {
                                validarsearch = $(this).attr("id");
                                $("#filedoc").prop('disabled', true);
                                $("#subsepro").prop('disabled', true);
                                $("#subseinm").prop('disabled', true);
                                searchcontractmandate(validarsearch);
                            });

                            $(".body_container_nivelcuatro_documentres").on('click','button.eliminarfoto', function(e){
                                e.preventDefault();
                                let id_sop = $(this).val();
                                let cod_carp = $('#codcarp').val();
                                getdeleteimage(id_sop, cod_carp);
                            });

                            $('input[data-previewable=\"true\"]' ).change(function(e) {
                                e.preventDefault();
                                let prvCnt = $(this).attr('data-preview-container');
                                $(prvCnt).html('');
                                filevalidation(this,prvCnt);
                                //readURL(this, prvCnt);
                            });

                            $("#update").on("click", function(e){
                                e.preventDefault();
                                setdataupdate();
                                //clearcreate();
                                alert("Modificado con éxito");
                                clearmodalconsultar();
                                closeagregar(); 
                            });

                            $("#delete").on("click", function(e){
                                e.preventDefault();
                                setdatadelete();
                                //clearcreate();
                                alert("Eliminado con éxito");
                                closeagregar();
                            });


                            $(".archivo").on("click", function(e){
                                e.preventDefault();
                                $(".archivo").html('');
                            });


} );

function getdata(tbody, table){
    $(tbody).on("click","a.search", function(){
    let data = table.row($(this).parents("tr")).data();
    localStorage.setItem("data", JSON.stringify(data));
    });



}

function getdeleteimage(idsop, codcarp){

    let coddoc = $('#coddoc').val();
    let option = "deleteimage";
    let search = "search"

    datos = {"idsop": idsop, "codcarp": codcarp, "coddoc" : coddoc, "accion" : option };
        $.ajax({
            data: datos,
            url: "../Libraries/soporte/soporteajax.php",
            type: "POST",
            success: function(response){
                if(response){
                    alert('Se elimino exitosamente');
                    getdocuments(codcarp, search);
                }
            }
        });
}

function searchcontractmandate(search){
    let tiempos = 500;
      $.ajax({
         url:"../Views/asesor/modules/contratomandatomodificar.php",
         beforeSend: function(){
            $(".content").text('Procesando...');
         },
         success : function(data){
            setTimeout(function(){
                $(".content").html('');
               $(".content").html(data);
               let datos = JSON.parse(localStorage.getItem("data"));
               $("#numcontract").val(datos.cod_reg_oper);
               $("#validatenumcontract").val(datos.cod_reg_oper);

               $('#tipcontract option[value="'+datos.id_tip_oper+'"]').remove();
               $("#tipcontract option:selected").text(datos.nom_tip_oper);
               $("#tipcontract option:selected").val(datos.id_tip_oper);

               $('#perscontract option[value="'+datos.id_tip_pers+'"]').remove();
               $("#perscontract option:selected").text(datos.nom_tip_pers);
               $("#perscontract option:selected").val(datos.id_tip_pers);

               $('#tiparch option[value="'+datos.cod_arch+'"]').remove();
               $("#tiparch option:selected").text(datos.nom_num_arch);
               $("#tiparch option:selected").val(datos.cod_arch);

               $("#filedoc").prop('disabled', false);

               getcarp($("#tiparch"), $("#filedoc"), datos.nom_tip_carp);

               $('#seriedoc option[value="'+datos.id_serie+'"]').remove();
               $("#seriedoc option:selected").text(datos.nom_serie);
               $("#seriedoc option:selected").val(datos.id_serie);

               if(datos.estado_oper == 0){
                    $('#estadocon').append('<option value="'+datos.estado_oper+'" selected>No terminado</option>');
                    $('#estadocon').append('<option value="1">Terminado</option>');
               }
               else{
                    $('#estadocon').append('<option value="'+datos.estado_oper+'" selected>Terminado</option>');
                    $('#estadocon').append('<option value="0">No terminado</option>');
               }

               $('#codcarpvalidate').val(datos.cod_carp); //cod_carp para consultar los documentos

               $("#cc option:selected").text(datos.nom_ape_pers);
               $("#cc option:selected").val(datos.ced_pers);
               
               $('#ccpers').val(datos.ced_pers);
               $('#ccperson').val(datos.ced_pers);

               $('#nameperson').val(datos.nom_pers);
               $('#lastperson').val(datos.ape_pers);
               $('#dateccperson').val(datos.fec_exp_ced_pers);
               $('#celperson').val(datos.cel_pers);
               $('#teleperson').val(datos.tel_pers);
               $('#corperson').val(datos.email_pers);
               $('#direcperson').val(datos.dir_pers);
               $('#cityperson').val(datos.ciud_pers);
               $('#genperson').val(datos.sex_pers);

               $('#tipinmueble option[value="'+datos.id_tip_prop+'"]').remove();
               $("#tipinmueble option:selected").text(datos.nom_tip_prop);
               $("#tipinmueble option:selected").val(datos.id_tip_prop);


               $('#numinmueble').val(datos.id_prop);
               $('#validatenuminmueble').val(datos.id_prop);
               $('#tipinmueble option[value="'+datos.id_tip_prop+'"]').remove();
               $("#tipinmueble option:selected").text(datos.nom_tip_prop);
               $("#tipinmueble option:selected").val(datos.id_tip_prop);
               $('#dirinmueble').val(datos.dir_prop);
               $('#ciudinmueble').val(datos.ubi_prop);

               $('#descinmueble').val(datos.desc_prop);

               getsubserie($("#seriedoc"), $("#subsepro"), $("#subseinm"));

               getdocuments(datos.cod_carp, search);

            },tiempos);
         }
      });
      
}

function getcarp(selectuno, selectdos, dato){
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
                $(response.data).each(function(data, r){ // indice, valor
                    if(archivo == r.cod_arch){
                        if(dato == r.nom_tip_carp){
                            selectdos.append('<option value="' + r.cod_tip_carp + '" selected>' + r.nom_tip_carp + '</option>');       
                        }
                        else{
                            selectdos.append('<option value="' + r.cod_tip_carp + '">' + r.nom_tip_carp + '</option>');       
                        }    
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

function getdocuments(cod_carp, search){
    let url = "../"
    let barra = "/";
    let punto =".";
    $(".body_label_document").html('');
    $(".body_input_document").html('');
    $(".body_container_nivelcuatro_documentres").html('');
    $(".body_label_documentdos").html('');
    $(".body_input_documentdos").html('');
    $(".body_container_nivelcuatro_documentdos").html('');
    $(".body_label_documentres").html('');
    $(".body_input_documentres").html('');
    $(".body_container_nivelcuatro_document").html('');
    

    let data = {"codcarp" : cod_carp, "accion" : search}

    $.ajax({
        data: data,
        url: "../Libraries/document/documentajax.php",
        type: "POST",
        success: function(response){
            $(response.data).each(function(data, r){ // indice, valor
            
                if(r.orden_subse === 0){
                    if(r.ext_arch_sop === "doc" || r.ext_arch_sop === "docx"){
                        $(".body_container_nivelcuatro_document").append('<div class="body_label_document"><label>'+r.nom_doc+'</label><a title="'+r.nom_doc+'" href="'+url+r.rep_sop+'" download target="_blank"><img src="../Assets/imagenes/doc.png" width="30" height="35"/></a></div>');
                        $(".body_container_nivelcuatro_document").append('<div class="body_input_document"><input class="textnameniveluno archivo'+r.orden_subse+'" type="file" name="filesdocument'+r.orden_subse+'[]" id="filesdocument'+r.orden_subse+'" accept=".doc, .docx, .pdf"></div>');   
                    }
                    if(r.ext_arch_sop === "pdf"){ 
                        $(".body_container_nivelcuatro_document").append('<div class="body_label_document"><label>'+r.nom_doc+'</label><a title="'+r.nom_doc+'" href="'+url+r.rep_sop+'" download target="_blank"><img src="../Assets/imagenes/pdf.png" width="30" height="35"/></a></div>');
                        $(".body_container_nivelcuatro_document").append('<div class="body_input_document"><input class="textnameniveluno archivo'+r.orden_subse+'" type="file" name="filesdocument'+r.orden_subse+'[]" id="filesdocument'+r.orden_subse+'" accept=".doc, .docx, .pdf" ></div>');   
                    }
                    if(r.ext_arch_sop === "jpg" || r.ext_arch_sop === "jpeg" || r.ext_arch_sop === "png" || r.ext_arch_sop === "gif"){
                        $(".body_container_nivelcuatro_document").append('<div class="body_label_document"><label>'+r.nom_sop+'</label><a title="'+r.nom_sop+'" href="'+url+r.rep_sop+barra+r.nom_sop+punto+r.ext_arch_sop+'" download><img src="'+url+r.rep_sop+barra+r.nom_sop+punto+r.ext_arch_sop+'" width="120" height="150"/></a></div>');
                        $(".body_container_nivelcuatro_document").append('<div class="body_input_document"><input class="textnameniveluno archivo'+r.orden_subse+'" type="file" name="filesdocument'+r.orden_subse+'[]" id="filesdocument'+r.orden_subse+'" accept=".doc, .docx, .pdf"></div>');   
                    }
                }
                if(r.orden_subse === 1){
                    if(r.ext_arch_sop === "doc" || r.ext_arch_sop === "docx"){
                        $(".body_container_nivelcuatro_documentdos").append('<div class="body_label_documentdos"><label>'+r.nom_doc+'</label><a title="'+r.nom_doc+'" href="'+url+r.rep_sop+'" download target="_blank"><img src="../Assets/imagenes/doc.png" width="30" height="35"/></a></div>');
                        $(".body_container_nivelcuatro_documentdos").append('<div class="body_input_documentdos"><input class="textnameniveluno archivo'+r.orden_subse+'" type="file" name="filesdocument'+r.orden_subse+'[]" id="filesdocument'+r.orden_subse+'" accept=".doc, .docx, .pdf"></div>');   
                    }
                    if(r.ext_arch_sop === "pdf"){ 
                        $(".body_container_nivelcuatro_documentdos").append('<div class="body_label_documentdos"><label>'+r.nom_doc+'</label><a title="'+r.nom_doc+'" href="'+url+r.rep_sop+'" download target="_blank"><img src="../Assets/imagenes/pdf.png" width="30" height="35"/></a></div>');
                        $(".body_container_nivelcuatro_documentdos").append('<div class="body_input_documentdos"><input class="textnameniveluno archivo'+r.orden_subse+'" type="file" name="filesdocument'+r.orden_subse+'[]" id="filesdocument'+r.orden_subse+'" accept=".doc, .docx, .pdf"></div>');   
                    }

                    if(r.orden_doc == 3){
                        $('.body_container_nivelcuatro_fianza').hide();   
                    }
                    
                    if(r.orden_doc == 4){
                        if(r.ext_arch_sop === "jpg" || r.ext_arch_sop === "jpeg" || r.ext_arch_sop === "png" || r.ext_arch_sop === "gif"){
                            $(".body_container_nivelcuatro_documentres").append('<div class="body_label_documentres"><label>'+r.nom_sop+'</label><a title="'+r.nom_sop+'" href="'+url+r.rep_sop+barra+r.nom_sop+punto+r.ext_arch_sop+'" download><img src="'+url+r.rep_sop+barra+r.nom_sop+punto+r.ext_arch_sop+"?"+new Date().valueOf()+'" id="viewimage" width="120" height="150"/></a></div>');
                            $(".body_container_nivelcuatro_documentres").append('<div class="body_input_documentres">'+
                            '<input class="textnameniveluno imagenes'+r.orden_subse+'" type="file" name="fotos'+r.orden_subse+'[]" id="fotos'+r.orden_subse+'" accept="image/png, .jpeg, .jpg">'+
                            
                            '<label><button type="button" class="eliminarfoto" value="'+r.id_sop+'"><img src="../Assets/imagenes/eliminar.png"/></button></label>'+
                            '<input type="hidden" name="codcarp" id="codcarp" value="'+r.cod_carp+'"/>'+
                            '<input type="hidden" name="coddoc" id="coddoc" value="'+r.cod_doc+'"/>'); 
                        }
                    }
                }
                
            })
        }
    });
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
                $(response.data).each(function(data, r){ // indice, valor
                    if(idserie == r.id_serie){
                        if(r.orden_subse == 0){
                            selectdos.append('<option value="' + r.id_subse + '" selected="selected">' + r.nom_subse + '</option>');
                            selectres.append('<option value="' + r.id_subse + '">' + r.nom_subse + '</option>'); 
                        }
                        if(r.orden_subse == 1){
                            selectres.append('<option value="' + r.id_subse + '" selected="selected">' + r.nom_subse + '</option>'); 
                            selectdos.append('<option value="' + r.id_subse + '">' + r.nom_subse + '</option>');
                        }   
                        
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

function setdataupdate(){
    //data contrato
    let numcon = $("#validatenumcontract").val();
    let tipcon = $("#tipcontract option:selected").val();
    let tipconom = $("#tipcontract option:selected").text();
    let perscon = $("#perscontract option:selected").val();
    let archcon = $("#tiparch option:selected").val();
    let archconnom = $("#tiparch option:selected").text();
    let archfile = $("#filedoc option:selected").val();
    let archfilename = $("#filedoc option:selected").text();
    let estadocon = $("#estadocon option:selected").val();
    
     //data serie
     let serie_doc = $("#seriedoc option:selected").val();

    //data propietario
    let id_emp = $("#idemp").val();
    let ced_pers = $("#ccpers").val();
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

    //data inmueble
    let num_mat_prop = $("#numinmueble").val();
    let tip_prop = $("#tipinmueble option:selected").val();
    let dir_prop = $("#dirinmueble").val();
    let ciud_prop = $("#ciudinmueble").val();
    let desc_prop = $("#descinmueble").val();
    let subse_doc_inm = $("#subseinm option:selected").val();

    let daf_prop = $("#daf").prop("files")[0]; //Data opcional 

    let option = $("button[id='update']").val();

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
            formdata.append("estadocon", estadocon);

            formdata.append("numcontract", numcon);
            formdata.append("archcontract", archcon);
            formdata.append("nomarchcontract", archconnom);
            formdata.append("archfile", archfile);
            formdata.append("nomarchfile", archfilename);
            formdata.append("tipcontract", tipcon);
            formdata.append("nomtipcontract", tipconom);
            formdata.append("perscontract", perscon);
            
            
            formdata.append("numatprop", num_mat_prop);
            formdata.append("tiprop", tip_prop);
	        formdata.append("dirprop", dir_prop);
            formdata.append("ciudprop", ciud_prop);
            formdata.append("descprop", desc_prop);
            
            formdata.append("subsedocprop", subse_doc_inm);

            
            if($("#daf").prop("files").length > 0){
                formdata.append("dafprop", daf_prop);
            }

            formdata.append("accion", option);

            $.each($(".archivo0"), function (i, obj) {                
                $.each(obj.files, function (j, file) {                    
                    formdata.append('filesdocument0['+i+']', file); 
                });
            });

            $.each($(".archivo1"), function (i, obj) {                
                $.each(obj.files, function (j, file) {                    
                    formdata.append('filesdocument1['+i+']', file); 
                });
            });

            $.each($(".imagenes1"), function (i, obj) {                
                $.each(obj.files, function (j, file) {                    
                    formdata.append('fotos1['+i+']', file); 
                });
            });

            let fotos = $("#fotos").prop("files").length;

            if(fotos>0){
                for(i=0; i< fotos; i++){
                    formdata.append('fotos['+i+']', $("#fotos").prop("files")[i]); 
                }
            }

            $.ajax({
                data: formdata,
                url: "../Libraries/contract/contractmandateajax.php",
                type: "POST",
                cache:false,
                contentType: false,
                processData: false,
                success: function(response){
                    console.log(response);
                }
            });

}


function setdatadelete(){
    localStorage.removeItem("data");
    localStorage.clear();
}


function clearmodalconsultar() {
    $(".body_label_documentres").html('');
    $(".body_input_documentres").html('');
    $(".body_container_nivelcuatro_documentres").html('');
    $(".body_container_nivelcuatro_documentres").load(" .body_container_nivelcuatro_documentres");
    $(".body_label_documentdos").html('');
    $(".body_input_documentdos").html('');
    $(".body_container_nivelcuatro_documentdos").html('');
    $(".body_container_nivelcuatro_documentdos").load(" .body_container_nivelcuatro_documentdos");
    $(".body_label_document").html('');
    $(".body_input_document").html('');
    $(".body_container_nivelcuatro_document").html('');
    $(".body_container_nivelcuatro_document").load(" .body_container_nivelcuatro_document");
}

function closeagregar(){
    $(".content").load("../Views/welcome.php");   ;//Ojo con el direccionamiento de la ruta
    localStorage.removeItem("data");
    localStorage.clear();
  }

  