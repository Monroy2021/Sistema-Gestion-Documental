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
                    "url": "../Libraries/contract/contractleasingajax.php"
                },
                "columns": [
                    {"data":"id_prop"},
                    {"data":"cod_reg_oper"},
                    {"data":"ced_pers"},
                    {"data":"nom_ape_pers"},
                    { "responsivePriority": "1",
                        "data": null,
                        "defaultContent":'<a href="#" class="search" id="search" name="search">Consultar</a>'
                    }
                ]
            });
                            localStorage.removeItem("data");

                            getdata('#tablageneral tbody', datatables);

                            $("#tablageneral tbody").on('click', 'a.search', function () {
                                validarsearch = $(this).attr("id");
                                searchsubserie(validarsearch);
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
                                alert("Se modificó con éxito");
                                closeagregar();
                            });

                            $("#contractpro").change(function(e){
                                e.preventDefault();
                                let validarselect = $(this);
                                let llenarselect = $("#subseriea");
                                getcontractmandate(validarselect, llenarselect);
                            });

                            $(".archivo").on("click", function(e){
                                e.preventDefault();
                                $(".archivo").html('');
                            });


});

function getdata(tbody, table){
    $(tbody).on("click","a.search", function(){
    let data = table.row($(this).parents("tr")).data();
    localStorage.setItem("dataca", JSON.stringify(data));
    });
}

function searchsubserie(search){
    let tiempos = 500;
      $.ajax({
         url:"../Views/asesor/modules/contratoarrendamientomodificar.php",
         beforeSend: function(){
            $(".content").text('Procesando...');
         },
         success : function(data){
            setTimeout(function(){
                $(".content").html('');
               $(".content").html(data);
               let datos = JSON.parse(localStorage.getItem("dataca"));

               $("#numcontracta").val(datos.cod_reg_oper);
               $("#validatenumcontracta").val(datos.cod_reg_oper);
               $("#idprop").val(datos.id_prop);
               $("#cma").val(datos.cod_reg_oper_dep);

               $('#tipcontracta option[value="'+datos.id_tip_oper+'"]').remove();
               $("#tipcontracta option:selected").text(datos.nom_tip_oper);
               $("#tipcontracta option:selected").val(datos.id_tip_oper);

               $('#tiparcha option[value="'+datos.cod_arch+'"]').remove();
               $("#tiparcha option:selected").text(datos.nom_num_arch);
               $("#tiparcha option:selected").val(datos.cod_arch);

               getipcarp($("#tiparcha"), $("#filedoca"), $("#auxiliara"), datos.cod_reg_oper, search);
               
               $('#seriedoca option[value="'+datos.id_serie+'"]').remove();
               $("#seriedoca option:selected").text(datos.nom_serie);
               $("#seriedoca option:selected").val(datos.id_serie);

               getsubserie($("#seriedoca"), $("#subserievin"), $("#subserieca"), $("#subseriereqar"), $("#subseriereqprop"));

               getpersoncontract($('#tipcontracta'), datos.cod_reg_oper);
              

            },tiempos);
         }
      });
      
}

function getipcarp(selectuno, selectdos, selectres, dato, search){
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
                    if(r.cod_arch == archivo){
    
                        if(r.orden_tip_carp == 1){
                            selectdos.append('<option value="' + r.cod_tip_carp + '" selected>' + r.nom_tip_carp + '</option>');       
                            selectres.append('<option value="' + r.cod_tip_carp + '">' + r.nom_tip_carp + '</option>');
                            getcarpprin(r.cod_tip_carp, dato, search);
                        }
                        if(r.orden_tip_carp == 2){
                            selectres.append('<option value="' + r.cod_tip_carp + '" selected>' + r.nom_tip_carp + '</option>');       
                            selectdos.append('<option value="' + r.cod_tip_carp + '">' + r.nom_tip_carp + '</option>'); 
                            getcarpaux(r.cod_tip_carp, dato, search);   
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

function getsubserie(selectuno, selectdos, selectres, selectcuatro, selectcinco){
    if(selectuno.val() !== ""){
        let id_serie = selectuno.val();
        datos = {"idserie":id_serie};
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
                    if(r.id_serie == id_serie){
                        if(r.orden_subse == 0){
                            selectdos.append('<option value="' + r.id_subse + '" selected="selected">' + r.nom_subse + '</option>');
                            selectres.append('<option value="' + r.id_subse + '">' + r.nom_subse + '</option>');
                            selectcuatro.append('<option value="' + r.id_subse + '">' + r.nom_subse + '</option>');
                            selectcinco.append('<option value="' + r.id_subse + '">' + r.nom_subse + '</option>');   
                        }
                        if(r.orden_subse == 1){
                            selectres.append('<option value="' + r.id_subse + '" selected="selected">' + r.nom_subse + '</option>'); 
                            selectdos.append('<option value="' + r.id_subse + '">' + r.nom_subse + '</option>');
                            selectcuatro.append('<option value="' + r.id_subse + '">' + r.nom_subse + '</option>');
                            selectcinco.append('<option value="' + r.id_subse + '">' + r.nom_subse + '</option>');   
                        }   

                        if(r.orden_subse == 2){
                            selectcuatro.append('<option value="' + r.id_subse + '" selected="selected">' + r.nom_subse + '</option>'); 
                            selectdos.append('<option value="' + r.id_subse + '">' + r.nom_subse + '</option>');
                            selectres.append('<option value="' + r.id_subse + '">' + r.nom_subse + '</option>');
                            selectcinco.append('<option value="' + r.id_subse + '">' + r.nom_subse + '</option>');   
                        } 
                        
                        if(r.orden_subse == 3){
                            selectcinco.append('<option value="' + r.id_subse + '" selected="selected">' + r.nom_subse + '</option>'); 
                            selectdos.append('<option value="' + r.id_subse + '">' + r.nom_subse + '</option>');
                            selectres.append('<option value="' + r.id_subse + '">' + r.nom_subse + '</option>');
                            selectcuatro.append('<option value="' + r.id_subse + '">' + r.nom_subse + '</option>');   
                        }   
                        
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

function getpersoncontract(selectuno, cod_reg_oper){
    if(selectuno.val() !== ""){
        let cod_reg_oper_con = cod_reg_oper;
        let option = "search"; 
        let datos = {"codregopercon" : cod_reg_oper_con ,"accion" : option}
        $.ajax({
            data: datos,
            url: "../Libraries/contract/contractajax.php",
            type: "POST",
            success: function(result){

                $(result.data).each(function(data, c){ // indice, valor
                
                        if(c.orden_tip_pers_con == 1){
                            
                            $('#perscontracta option[value="'+c.id_tip_pers_con+'"]').remove();
                            $("#perscontracta option:selected").text(c.nom_tip_pers_con);
                            $("#perscontracta option:selected").val(c.id_tip_pers_con);

                            $('#cc option:selected  option[value="'+c.ced_pers_con+'"]').remove();
                            $("#cc option:selected").text(c.nom_ape_pers_con);
                            $("#cc option:selected").val(c.ced_pers_con);
                            
                            $('#ccpers').val(c.ced_pers_con);
                            $('#ccperson').val(c.ced_pers_con);

                            $('#nameperson').val(c.nom_pers_con);
                            $('#lastperson').val(c.ape_pers_con);
                            $('#dateccperson').val(c.fec_exp_ced_pers_con);
                            $('#celperson').val(c.cel_pers_con);
                            $('#teleperson').val(c.tel_pers_con);
                            $('#corperson').val(c.email_pers_con);
                            $('#direcperson').val(c.dir_pers_con);
                            $('#cityperson').val(c.ciud_pers_con);
                            $('#genperson').val(c.sex_pers_con);
                        }
                        if(c.orden_tip_pers_con == 2){
                            $('#perscontractac1 option[value="'+c.id_tip_pers_con+'"]').remove();
                            $("#perscontractac1 option:selected").text(c.nom_tip_pers_con);
                            $("#perscontractac1 option:selected").val(c.id_tip_pers_con);

                            $('#cc1 option:selected  option[value="'+c.ced_pers_con+'"]').remove();
                            $("#cc1 option:selected").text(c.nom_ape_pers_con);
                            $("#cc1 option:selected").val(c.ced_pers_con);
                            
                            $('#ccpers1').val(c.ced_pers_con);
                            $('#ccperson1').val(c.ced_pers_con);

                            $('#nameperson1').val(c.nom_pers_con);
                            $('#lastperson1').val(c.ape_pers_con);
                            $('#dateccperson1').val(c.fec_exp_ced_pers_con);
                            $('#celperson1').val(c.cel_pers_con);
                            $('#teleperson1').val(c.tel_pers_con);
                            $('#corperson1').val(c.email_pers_con);
                            $('#direcperson1').val(c.dir_pers_con);
                            $('#cityperson1').val(c.ciud_pers_con);
                            $('#genperson1').val(c.sex_pers_con);
                            
                        }   

                        if(c.orden_tip_pers_con == 3){
                            $('#perscontractac2 option[value="'+c.id_tip_pers_con+'"]').remove();
                            $("#perscontractac2 option:selected").text(c.nom_tip_pers_con);
                            $("#perscontractac2 option:selected").val(c.id_tip_pers_con);

                            $('#cc2 option:selected  option[value="'+c.ced_pers_con+'"]').remove();
                            $("#cc2 option:selected").text(c.nom_ape_pers_con);
                            $("#cc2 option:selected").val(c.ced_pers_con);
                            
                            $('#ccpers2').val(c.ced_pers_con);
                            $('#ccperson2').val(c.ced_pers_con);

                            $('#nameperson2').val(c.nom_pers_con);
                            $('#lastperson2').val(c.ape_pers_con);
                            $('#dateccperson2').val(c.fec_exp_ced_pers_con);
                            $('#celperson2').val(c.cel_pers_con);
                            $('#teleperson2').val(c.tel_pers_con);
                            $('#corperson2').val(c.email_pers_con);
                            $('#direcperson2').val(c.dir_pers_con);
                            $('#cityperson2').val(c.ciud_pers_con);
                            $('#genperson2').val(c.sex_pers_con);
                        } 
                        
                });
                
            },
            error: function(error){
                console.log(error);
                alert('Ocurrio un error en el servidor ..');
                selectuno.prop('disabled', false);
            }
        });
    }
 }

function getcarpprin(cod_tip_carp, cod_reg_oper, search){
    let data = {"codtipcarp" : cod_tip_carp, "codregoper" : cod_reg_oper ,"accion" : search}
    $.ajax({
        data: data,
        url: "../Libraries/file/fileajax.php",
        type: "POST",
        success: function(response){
            $(response.data).each(function(data, r){ // indice, valor
                getdocumentsprin(r.cod_carp, search);
            })
        }
    });

 }

function getcarpaux(cod_tip_carp, cod_reg_oper, search){

    let data = {"codtipcarp" : cod_tip_carp, "codregoper" : cod_reg_oper ,"accion" : search}
    $.ajax({
        data: data,
        url: "../Libraries/file/fileajax.php",
        type: "POST",
        success: function(response){
            $(response.data).each(function(data, r){ // indice, valor
                getdocumentsaux(r.cod_carp, search);
            })
        }
    });
    
 }

function getdocumentsprin(cod_carp, search){
    let url = "../"
    $(".body_label_document").html('');
    $(".body_label_documentdos").html('');
    $(".body_label_documentres").html('');
    $(".body_label_documentcuatro").html('');

    let data = {"codcarp" : cod_carp, "accion" : search}

    $.ajax({
        data: data,
        url: "../Libraries/document/documentajax.php",
        type: "POST",
        success: function(response){
            $(response.data).each(function(data, r){ // indice, valor
            
                if(r.orden_subse === 0){

                    if(r.orden_doc >= 0 && r.orden_doc <= 1){

                        if(r.ext_arch_sop === "doc" || r.ext_arch_sop === "docx"){
                            $(".body_container_nivelcuatro_document").append('<div class="body_label_document"><label>'+r.nom_doc+'</label><a title="'+r.nom_doc+'" href="'+url+r.rep_sop+'" download target="_blank"><img src="../Assets/imagenes/doc.png" width="30" height="35"/></a></div>');
                            $(".body_container_nivelcuatro_document").append('<div class="body_input_document"><input class="textnameniveluno archivo'+r.orden_subse+'" type="file" name="filesdocument'+r.orden_subse+'[]" id="filesdocument'+r.orden_subse+'" accept=".doc, .docx, .pdf"></div>');   
                        }
                        if(r.ext_arch_sop === "pdf"){ 
                            $(".body_container_nivelcuatro_document").append('<div class="body_label_document"><label>'+r.nom_doc+'</label><a title="'+r.nom_doc+'" href="'+url+r.rep_sop+'" download target="_blank"><img src="../Assets/imagenes/pdf.png" width="30" height="35"/></a></div>');
                            $(".body_container_nivelcuatro_document").append('<div class="body_input_document"><input class="textnameniveluno archivo'+r.orden_subse+'" type="file" name="filesdocument'+r.orden_subse+'[]" id="filesdocument'+r.orden_subse+'" accept=".doc, .docx, .pdf" ></div>');   
                        }
                        if(r.ext_arch_sop === "jpg" || r.ext_arch_sop === "jpeg" || r.ext_arch_sop === "png" || r.ext_arch_sop === "gif"){
                            $(".body_container_nivelcuatro_document").append('<div class="body_label_document"><label>'+r.nom_doc+'</label><a title="'+r.nom_doc+'" href="'+url+r.rep_sop+'" download><img src="'+url+r.rep_sop+'" width="120" height="150"/></a></div>');
                            $(".body_container_nivelcuatro_document").append('<div class="body_input_document"><input class="textnameniveluno archivo'+r.orden_subse+'" type="file" name="filesdocument'+r.orden_subse+'[]" id="filesdocument'+r.orden_subse+'" accept=".doc, .docx, .pdf"></div>');   
                        }

                    }

                    if(r.orden_doc >= 2 && r.orden_doc <= 3){

                        if(r.ext_arch_sop === "doc" || r.ext_arch_sop === "docx"){
                            $(".body_container_nivelcuatro_documentdos").append('<div class="body_label_documentdos"><label>'+r.nom_doc+'</label><a title="'+r.nom_doc+'" href="'+url+r.rep_sop+'" download target="_blank"><img src="../Assets/imagenes/doc.png" width="30" height="35"/></a></div>');
                            $(".body_container_nivelcuatro_documentdos").append('<div class="body_input_documentdos"><input class="textnameniveluno archivo'+r.orden_subse+'" type="file" name="filesdocument'+r.orden_subse+'[]" id="filesdocument'+r.orden_subse+'" accept=".doc, .docx, .pdf"></div>');   
                        }
                        if(r.ext_arch_sop === "pdf"){ 
                            $(".body_container_nivelcuatro_documentdos").append('<div class="body_label_documentdos"><label>'+r.nom_doc+'</label><a title="'+r.nom_doc+'" href="'+url+r.rep_sop+'" download target="_blank"><img src="../Assets/imagenes/pdf.png" width="30" height="35"/></a></div>');
                            $(".body_container_nivelcuatro_documentdos").append('<div class="body_input_documentdos"><input class="textnameniveluno archivo'+r.orden_subse+'" type="file" name="filesdocument'+r.orden_subse+'[]" id="filesdocument'+r.orden_subse+'" accept=".doc, .docx, .pdf" ></div>');   
                        }
                        if(r.ext_arch_sop === "jpg" || r.ext_arch_sop === "jpeg" || r.ext_arch_sop === "png" || r.ext_arch_sop === "gif"){
                            $(".body_container_nivelcuatro_documentdos").append('<div class="body_label_documentdos"><label>'+r.nom_doc+'</label><a title="'+r.nom_doc+'" href="'+url+r.rep_sop+'" download><img src="'+url+r.rep_sop+'" width="120" height="150"/></a></div>');
                            $(".body_container_nivelcuatro_documentdos").append('<div class="body_input_documentdos"><input class="textnameniveluno archivo'+r.orden_subse+'" type="file" name="filesdocument'+r.orden_subse+'[]" id="filesdocument'+r.orden_subse+'" accept=".doc, .docx, .pdf"></div>');   
                        }

                    }

                    if(r.orden_doc >= 4 && r.orden_doc <= 5){

                        if(r.ext_arch_sop === "doc" || r.ext_arch_sop === "docx"){
                            $(".body_container_nivelcuatro_documentres").append('<div class="body_label_documentres"><label>'+r.nom_doc+'</label><a title="'+r.nom_doc+'" href="'+url+r.rep_sop+'" download target="_blank"><img src="../Assets/imagenes/doc.png" width="30" height="35"/></a></div>');
                            $(".body_container_nivelcuatro_documentres").append('<div class="body_input_documentres"><input class="textnameniveluno archivo'+r.orden_subse+'" type="file" name="filesdocument'+r.orden_subse+'[]" id="filesdocument'+r.orden_subse+'" accept=".doc, .docx, .pdf"></div>');   
                        }
                        if(r.ext_arch_sop === "pdf"){ 
                            $(".body_container_nivelcuatro_documentres").append('<div class="body_label_documentres"><label>'+r.nom_doc+'</label><a title="'+r.nom_doc+'" href="'+url+r.rep_sop+'" download target="_blank"><img src="../Assets/imagenes/pdf.png" width="30" height="35"/></a></div>');
                            $(".body_container_nivelcuatro_documentres").append('<div class="body_input_documentres"><input class="textnameniveluno archivo'+r.orden_subse+'" type="file" name="filesdocument'+r.orden_subse+'[]" id="filesdocument'+r.orden_subse+'" accept=".doc, .docx, .pdf" ></div>');   
                        }
                        if(r.ext_arch_sop === "jpg" || r.ext_arch_sop === "jpeg" || r.ext_arch_sop === "png" || r.ext_arch_sop === "gif"){
                            $(".body_container_nivelcuatro_documentres").append('<div class="body_label_documentres"><label>'+r.nom_doc+'</label><a title="'+r.nom_doc+'" href="'+url+r.rep_sop+'" download><img src="'+url+r.rep_sop+'" width="120" height="150"/></a></div>');
                            $(".body_container_nivelcuatro_documentres").append('<div class="body_input_documentres"><input class="textnameniveluno archivo'+r.orden_subse+'" type="file" name="filesdocument'+r.orden_subse+'[]" id="filesdocument'+r.orden_subse+'" accept=".doc, .docx, .pdf"></div>');   
                        }

                    }
                    
                }

                if(r.orden_subse === 1){
                    if(r.ext_arch_sop === "doc" || r.ext_arch_sop === "docx"){
                        $(".body_container_nivelcuatro_documentcuatro").append('<div class="body_label_documentcuatro"><label>'+r.nom_doc+'</label><a title="'+r.nom_doc+'" href="'+url+r.rep_sop+'" download target="_blank"><img src="../Assets/imagenes/doc.png" width="30" height="35"/></a></div>');
                        $(".body_container_nivelcuatro_documentcuatro").append('<div class="body_input_documentcuatro"><input class="textnameniveluno archivo'+r.orden_subse+'" type="file" name="filesdocument'+r.orden_subse+'[]" id="filesdocument'+r.orden_subse+'" accept=".doc, .docx, .pdf"></div>');   
                    }
                    if(r.ext_arch_sop === "pdf"){ 
                        $(".body_container_nivelcuatro_documentcuatro").append('<div class="body_label_documentcuatro"><label>'+r.nom_doc+'</label><a title="'+r.nom_doc+'" href="'+url+r.rep_sop+'" download target="_blank"><img src="../Assets/imagenes/pdf.png" width="30" height="35"/></a></div>');
                        $(".body_container_nivelcuatro_documentcuatro").append('<div class="body_input_documentcuatro"><input class="textnameniveluno archivo'+r.orden_subse+'" type="file" name="filesdocument'+r.orden_subse+'[]" id="filesdocument'+r.orden_subse+'" accept=".doc, .docx, .pdf" ></div>');   
                    }
                    if(r.ext_arch_sop === "jpg" || r.ext_arch_sop === "jpeg" || r.ext_arch_sop === "png" || r.ext_arch_sop === "gif"){
                        $(".body_container_nivelcuatro_documentcuatro").append('<div class="body_label_documentcuatro"><label>'+r.nom_doc+'</label><a title="'+r.nom_doc+'" href="'+url+r.rep_sop+'" download><img src="'+url+r.rep_sop+'" width="120" height="150"/></a></div>');
                        $(".body_container_nivelcuatro_documentcuatro").append('<div class="body_input_documentcuatro"><input class="textnameniveluno archivo'+r.orden_subse+'" type="file" name="filesdocument'+r.orden_subse+'[]" id="filesdocument'+r.orden_subse+'" accept=".doc, .docx, .pdf"></div>');   
                    }

                }
                
            })
        }
    });
}

function getdocumentsaux(cod_carp, search){
    let url = "../"
    $(".body_label_documentcinco").html('');
    $(".body_label_documentseis").html('');
    $(".body_label_documentsiete").html('');
    $(".body_label_documentocho").html('');

    let data = {"codcarp" : cod_carp, "accion" : search}

    $.ajax({
        data: data,
        url: "../Libraries/document/documentajax.php",
        type: "POST",
        success: function(response){
            $(response.data).each(function(data, r){ // indice, valor
            
                if(r.orden_subse === 2){

                    if(r.orden_doc >= 0 && r.orden_doc <= 2){

                        if(r.ext_arch_sop === "doc" || r.ext_arch_sop === "docx"){
                            $(".body_container_nivelcuatro_documentcinco").append('<div class="body_label_documentcinco"><label>'+r.nom_doc+'</label><a title="'+r.nom_doc+'" href="'+url+r.rep_sop+'" download target="_blank"><img src="../Assets/imagenes/doc.png" width="30" height="35"/></a></div>');
                            $(".body_container_nivelcuatro_documentcinco").append('<div class="body_input_documentcinco"><input class="textnameniveluno archivo'+r.orden_subse+'" type="file" name="filesdocument'+r.orden_subse+'[]" id="filesdocument'+r.orden_subse+'" accept=".doc, .docx, .pdf"></div>');   
                        }
                        if(r.ext_arch_sop === "pdf"){ 
                            $(".body_container_nivelcuatro_documentcinco").append('<div class="body_label_documentcinco"><label>'+r.nom_doc+'</label><a title="'+r.nom_doc+'" href="'+url+r.rep_sop+'" download target="_blank"><img src="../Assets/imagenes/pdf.png" width="30" height="35"/></a></div>');
                            $(".body_container_nivelcuatro_documentcinco").append('<div class="body_input_documentcinco"><input class="textnameniveluno archivo'+r.orden_subse+'" type="file" name="filesdocument'+r.orden_subse+'[]" id="filesdocument'+r.orden_subse+'" accept=".doc, .docx, .pdf" ></div>');   
                        }
                        if(r.ext_arch_sop === "jpg" || r.ext_arch_sop === "jpeg" || r.ext_arch_sop === "png" || r.ext_arch_sop === "gif"){
                            $(".body_container_nivelcuatro_documentcinco").append('<div class="body_label_documentcinco"><label>'+r.nom_doc+'</label><a title="'+r.nom_doc+'" href="'+url+r.rep_sop+'" download><img src="'+url+r.rep_sop+'" width="120" height="150"/></a></div>');
                            $(".body_container_nivelcuatro_documentcinco").append('<div class="body_input_documentcinco"><input class="textnameniveluno archivo'+r.orden_subse+'" type="file" name="filesdocument'+r.orden_subse+'[]" id="filesdocument'+r.orden_subse+'" accept=".doc, .docx, .pdf"></div>');   
                        }

                    }

                    if(r.orden_doc >= 3 && r.orden_doc <= 5){

                        if(r.ext_arch_sop === "doc" || r.ext_arch_sop === "docx"){
                            $(".body_container_nivelcuatro_documentseis").append('<div class="body_label_documentseis"><label>'+r.nom_doc+'</label><a title="'+r.nom_doc+'" href="'+url+r.rep_sop+'" download target="_blank"><img src="../Assets/imagenes/doc.png" width="30" height="35"/></a></div>');
                            $(".body_container_nivelcuatro_documentseis").append('<div class="body_input_documentseis"><input class="textnameniveluno archivo'+r.orden_subse+'" type="file" name="filesdocument'+r.orden_subse+'[]" id="filesdocument'+r.orden_subse+'" accept=".doc, .docx, .pdf"></div>');   
                        }
                        if(r.ext_arch_sop === "pdf"){ 
                            $(".body_container_nivelcuatro_documentseis").append('<div class="body_label_documentseis"><label>'+r.nom_doc+'</label><a title="'+r.nom_doc+'" href="'+url+r.rep_sop+'" download target="_blank"><img src="../Assets/imagenes/pdf.png" width="30" height="35"/></a></div>');
                            $(".body_container_nivelcuatro_documentseis").append('<div class="body_input_documentseis"><input class="textnameniveluno archivo'+r.orden_subse+'" type="file" name="filesdocument'+r.orden_subse+'[]" id="filesdocument'+r.orden_subse+'" accept=".doc, .docx, .pdf" ></div>');   
                        }
                        if(r.ext_arch_sop === "jpg" || r.ext_arch_sop === "jpeg" || r.ext_arch_sop === "png" || r.ext_arch_sop === "gif"){
                            $(".body_container_nivelcuatro_documentseis").append('<div class="body_label_documentseis"><label>'+r.nom_doc+'</label><a title="'+r.nom_doc+'" href="'+url+r.rep_sop+'" download><img src="'+url+r.rep_sop+'" width="120" height="150"/></a></div>');
                            $(".body_container_nivelcuatro_documentseis").append('<div class="body_input_documentseis"><input class="textnameniveluno archivo'+r.orden_subse+'" type="file" name="filesdocument'+r.orden_subse+'[]" id="filesdocument'+r.orden_subse+'" accept=".doc, .docx, .pdf"></div>');   
                        }

                    }

                    if(r.orden_doc >= 6 && r.orden_doc <= 8){

                        if(r.ext_arch_sop === "doc" || r.ext_arch_sop === "docx"){
                            $(".body_container_nivelcuatro_documentsiete").append('<div class="body_label_documentsiete"><label>'+r.nom_doc+'</label><a title="'+r.nom_doc+'" href="'+url+r.rep_sop+'" download target="_blank"><img src="../Assets/imagenes/doc.png" width="30" height="35"/></a></div>');
                            $(".body_container_nivelcuatro_documentsiete").append('<div class="body_input_documentsiete"><input class="textnameniveluno archivo'+r.orden_subse+'" type="file" name="filesdocument'+r.orden_subse+'[]" id="filesdocument'+r.orden_subse+'" accept=".doc, .docx, .pdf"></div>');   
                        }
                        if(r.ext_arch_sop === "pdf"){ 
                            $(".body_container_nivelcuatro_documentsiete").append('<div class="body_label_documentsiete"><label>'+r.nom_doc+'</label><a title="'+r.nom_doc+'" href="'+url+r.rep_sop+'" download target="_blank"><img src="../Assets/imagenes/pdf.png" width="30" height="35"/></a></div>');
                            $(".body_container_nivelcuatro_documentsiete").append('<div class="body_input_documentsiete"><input class="textnameniveluno archivo'+r.orden_subse+'" type="file" name="filesdocument'+r.orden_subse+'[]" id="filesdocument'+r.orden_subse+'" accept=".doc, .docx, .pdf" ></div>');   
                        }
                        if(r.ext_arch_sop === "jpg" || r.ext_arch_sop === "jpeg" || r.ext_arch_sop === "png" || r.ext_arch_sop === "gif"){
                            $(".body_container_nivelcuatro_documentsiete").append('<div class="body_label_documentsiete"><label>'+r.nom_doc+'</label><a title="'+r.nom_doc+'" href="'+url+r.rep_sop+'" download><img src="'+url+r.rep_sop+'" width="120" height="150"/></a></div>');
                            $(".body_container_nivelcuatro_documentsiete").append('<div class="body_input_documentsiete"><input class="textnameniveluno archivo'+r.orden_subse+'" type="file" name="filesdocument'+r.orden_subse+'[]" id="filesdocument'+r.orden_subse+'" accept=".doc, .docx, .pdf"></div>');   
                        }

                    }
                    
                }
                
            })
        }
    });
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

function setdataupdate(){
        //data contrato
        let numcon = $("#validatenumcontracta").val();
        let tipcon = $("#tipcontracta option:selected").val();
        let tipconom = $("#tipcontracta option:selected").text();
        let perscon = $("#perscontracta option:selected").val();
        let archcon = $("#tiparcha option:selected").val();
        let archconnom = $("#tiparcha option:selected").text();
        let estadocona = $("#estadocona option:selected").val();

        //carpeta principal
        let archfile = $("#filedoca option:selected").val();
        let archfilename = $("#filedoca option:selected").text();
        
        //carpeta auxiliar
        let archfileaux = $("#auxiliara option:selected").val();
        let archfilenameaux = $("#auxiliara option:selected").text();

        //data serie
        let serie_doc = $("#seriedoca option:selected").val();

        //data property
        let id_prop_a =  $("#idprop").val();


        //data arrendatario
        let id_empa = $("#idemp").val();
        let ced_persa = $("#ccpers").val();
        let name_persa = $("#nameperson").val();
        let last_persa = $("#lastperson").val();
        let date_ced_persa = $("#dateccperson").val();
        let cel_persa = $("#celperson").val();
        let tele_persa = $("#teleperson").val();
        let cor_persa = $("#corperson").val();
        let dir_persa = $("#direcperson").val();
        let ciud_persa = $("#cityperson").val();
        let sex_persa = $("#genperson option:selected").val();

        //data codeudor1
        let id_empc1 = $("#idemp1").val();
        let ced_persc1 = $("#ccpers1").val();
        let name_persc1 = $("#nameperson1").val();
        let last_persc1 = $("#lastperson1").val();
        let date_ced_persc1 = $("#dateccperson1").val();
        let cel_persc1 = $("#celperson1").val();
        let tele_persc1 = $("#teleperson1").val();
        let cor_persc1 = $("#corperson1").val();
        let dir_persc1 = $("#direcperson1").val();
        let ciud_persc1 = $("#cityperson1").val();
        let sex_persc1 = $("#genperson1 option:selected").val();
        //tipo person codeudor
        let persconc1 = $("#perscontractc1 option:selected").val();

        //data codeudor1
        let id_empc2 = $("#idemp2").val();
        let ced_persc2 = $("#ccpers2").val();
        let name_persc2 = $("#nameperson2").val();
        let last_persc2 = $("#lastperson2").val();
        let date_ced_persc2 = $("#dateccperson2").val();
        let cel_persc2 = $("#celperson2").val();
        let tele_persc2 = $("#teleperson2").val();
        let cor_persc2 = $("#corperson2").val();
        let dir_persc2 = $("#direcperson2").val();
        let ciud_persc2 = $("#cityperson2").val();
        let sex_persc2 = $("#genperson2 option:selected").val();
        //tipo person codeudor
        let persconc2 = $("#perscontractc2 option:selected").val();

        //subserie documental =>Formatos de vinculación
        let subserie_vin = $('#subserievin option:selected').val();
        let nom_subse_vin = $('#subserievin option_selected').text();

        //subserie contrato de arriendamiento
        let subserie_ca = $("#subserieca option:selected").val();
        let nom_subserie_ca = $("#subserieca option:selected").text();

         //subserie requisitos de arrendatario
         let subserie_arr = $("#subseriereqar option:selected").val();
         let nom_subserie_arr = $("#subseriereqar option:selected").text();

        //referenciar contrato de mandato con los documents =>num_contrato
        //let cod_reg_oper_contract_mandate = $("#contractpro option:selected").val();
    
        //referenciar subserie del contrato de mandato en los requisitos del propietario
        //let id_subserie_contract_mandate = $("#subseriea option:selected").val();
        
        //referenciar contrato de mandato con los documents =>num_contrato
        //let cod_reg_oper_contract_mandate = $("#contractpro option:selected").val(); // POR EL MOMENTO ES OPCIONAL
        let cod_reg_oper_contract_mandate = $("#cma").val();

        //subserie requisitos de propetario
        let subserie_prop = $("#reqprop option:selected").val();
        let nom_subserie_prop = $("#reqprop option:selected").text();

        let option = $("button[id='update']").val();

        let formdata = new FormData();

        //data contrato
        formdata.append("numcontracta", numcon);
        formdata.append("archcona", archcon);
        formdata.append("archnomcona", archconnom);
        formdata.append("archfilea", archfile);
        formdata.append("nomarchfilea", archfilename);
        formdata.append("tipcontracta", tipcon);
        formdata.append("nomtipcontracta", tipconom);
        formdata.append("seriedoca", serie_doc);
        formdata.append("estadocona", estadocona);

        formdata.append("codregopercontractmandate", cod_reg_oper_contract_mandate); //OPCIONAL

        //data id prop
        formdata.append("idpropar", id_prop_a);

        //data arrendatario
        formdata.append("idemp", id_empa);
        formdata.append("cedpers", ced_persa);
        formdata.append("namepers", name_persa);
        formdata.append("lastpers", last_persa);
        formdata.append("dateccpers", date_ced_persa);
        formdata.append("celpers", cel_persa);
        formdata.append("telepers", tele_persa);
        formdata.append("corpers", cor_persa);
        formdata.append("dirpers", dir_persa);
        formdata.append("ciudpers", ciud_persa);
        formdata.append("sexpers", sex_persa);

        //data codeudoruno
        formdata.append("idempc1", id_empc1);
        formdata.append("cedpersc1", ced_persc1);
        formdata.append("namepersc1", name_persc1);
        formdata.append("lastpersc1", last_persc1);
        formdata.append("dateccpersc1", date_ced_persc1);
        formdata.append("celpersc1", cel_persc1);
        formdata.append("telepersc1", tele_persc1);
        formdata.append("corpersc1", cor_persc1);
        formdata.append("dirpersc1", dir_persc1);
        formdata.append("ciudpersc1", ciud_persc1);
        formdata.append("sexpersc1", sex_persc1);

        //data codeudordos
        formdata.append("idempc2", id_empc2);
        formdata.append("cedpersc2", ced_persc2);
        formdata.append("namepersc2", name_persc2);
        formdata.append("lastpersc2", last_persc2);
        formdata.append("dateccpersc2", date_ced_persc2);
        formdata.append("celpersc2", cel_persc2);
        formdata.append("telepersc2", tele_persc2);
        formdata.append("corpersc2", cor_persc2);
        formdata.append("dirpersc2", dir_persc2);
        formdata.append("ciudpersc2", ciud_persc2);
        formdata.append("sexpersc2", sex_persc2);

        //tipo persona contrato
        formdata.append("perscona", perscon);
        formdata.append("persconac1", persconc1);
        formdata.append("persconac2", persconc2);

        //carpeta documental principal =>Principal
        formdata.append("archfilea", archfile);
        formdata.append("archfilenamea", archfilename);

        //carpeta documental auxiliar =>Auxiliar
        formdata.append("folderauxiliar", archfileaux);
        formdata.append("nomfolderauxiliar", archfilenameaux);

        //subserie formatos de vinculación 
        formdata.append("subserievina", subserie_vin);
        formdata.append("nomsubsevina", nom_subse_vin);

        //subserie contrato de arrendamiento
        formdata.append("subserieca", subserie_ca);
        formdata.append("nomsubserieca", nom_subserie_ca);

        //subserie requisitos de arrendatario
        formdata.append("subseriereqar", subserie_arr);
        formdata.append("nomsubseriereqar", nom_subserie_arr);

        //subserie requisitos de propietario
        formdata.append("subserieprop", subserie_prop);
        formdata.append("nomsubserieprop", nom_subserie_prop);

        //actualizar
        formdata.append("accion", option);

            //archivo formatos vinculación arrendatario, codeudor 1 y codeudor 2
            $.each($(".archivo0"), function (i, obj) {                
            $.each(obj.files, function (j, file) {                    
                formdata.append('filesdocument0['+i+']', file); 
                });
            });
            
            //archivo contrato de arrendamiento
            $.each($(".archivo1"), function (i, obj) {                
                    $.each(obj.files, function (j, file) {                    
                        formdata.append('filesdocument1['+i+']', file); 
                });
            });

            //archivo de soporte arrendatario, codeudor 1 y codeudor 2
            $.each($(".archivo2"), function (i, obj) {                
                $.each(obj.files, function (j, file) {                    
                    formdata.append('filesdocument2['+i+']', file); 
                });
            });

        $.ajax({
            data: formdata,
            url: "../Libraries/contract/contractleasingajax.php",
            type: "POST",
            cache:false,
            contentType: false,
            processData: false,
            success: function(response){
                console.log(response);
            }
        });
}

function closeagregar(){
    $(".content").load("../Views/welcome.php");   ;//Ojo con el direccionamiento de la ruta
    localStorage.removeItem("data");
    localStorage.clear();
}

        


