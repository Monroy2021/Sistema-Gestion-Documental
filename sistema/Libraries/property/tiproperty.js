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
                    "method":"POST",
                    "url": "../Libraries/property/tipropertyajax.php"
                },
                "columns": [
                    {"data":"id_tip_prop"},
                    {"data":"nom_cat_prop"},
                    {"data":"nom_tip_prop"},
                    { "responsivePriority": "1",
                        "data": null,
                        "defaultContent":'<a href="#modalconsultar" class="search" id="search" name="search">Consultar</a>'
                    }
                ]
            });

                            getdata('#tablageneral tbody', datatables);

                            $("a.close_modal").on("click", function(){
                                clearmodalagregar();
                            });

                            $("#open_modal").on("click", function(){
                                abrirmodalagregar();
                            });

                            $("#tablageneral tbody").on('click', 'a.search', function () {
                                abrirmodalconsultar();
                            });
                            
                            $("#create").on("click", function(e){
                                e.preventDefault();
                                setdatacreate(datatables);
                                closemodalagregar();
                            });

                            $("#update").on("click", function(e){
                                e.preventDefault();
                                setdataupdate(datatables);
                                closemodalconsultar();
                            });

                            $("#delete").on("click", function(e){
                                e.preventDefault();
                                setdatadelete(datatables);
                                closemodalconsultar();
                            });
} );

function getdata(tbody, table){
    clearmodalconsultar();
    $(tbody).on("click","a.search", function(){
    $("#selectcompanyedit").change();
    let data = table.row($(this).parents("tr")).data();
    let idtiprop = $("#codtipropedit").val(data.id_tip_prop),
        idcatprop = $("#catpropedit").val(data.id_cat_prop),
        nomcatprop = $("#catpropedit option:selected").text(data.nom_cat_prop),
        nomtiprop = $("#nomtipropedit").val(data.nom_tip_prop),
        destiprop = $("#destipropedit").val(data.desc_tip_prop);
    });
}

function setdatacreate(table){ 
        let id_tip_prop = $("#idtiprop").val();
        let id_cat_prop = $("#selectcatprop option:selected").val();
        let nom_tip_prop = $("#nomtiprop").val();
        let desc_tip_prop = $("#destiprop").val();
        let option = $("button[id='create']").val();

       if(id_tip_prop !== null && id_tip_prop !== "" && id_cat_prop !== null && id_cat_prop !== "" && nom_tip_prop !== null && nom_tip_prop !== "" && desc_tip_prop !== null && desc_tip_prop !== "" && option !== null && option !== ""){
            let parametros = {
                "idtiprop": id_tip_prop,
                "idcatprop": id_cat_prop,
                "nomtiprop": nom_tip_prop,
                "destiprop": desc_tip_prop,
                "accion": option
            }
            $.ajax({
                data:parametros,
                type:"POST",
                url: "../Libraries/property/tipropertyajax.php",
                success: function(){
                    clearmodalagregar();
                    table.ajax.reload();
                }
            });      
       }
       else{
            alert("Datos incompletos");//Modificar alert Ojo.
       }

}

function setdataupdate(table){ 
        let id_tip_prop = $("#codtipropedit").val();
        let id_cat_prop = $("#catpropedit").val();
        let nom_tip_prop = $("#nomtipropedit").val();
        let desc_tip_prop = $("#destipropedit").val();
        let option = $("button[id='update']").val();

    if(id_tip_prop !== null && id_tip_prop !== "" && id_cat_prop !== null && id_cat_prop !== "" && nom_tip_prop !== null && nom_tip_prop !== "" && desc_tip_prop !== null && desc_tip_prop !== "" && option !== null && option !== ""){
        let parametros = {
            "idtiprop": id_tip_prop,
            "idcatprop": id_cat_prop,
            "nomtiprop": nom_tip_prop,
            "destiprop": desc_tip_prop,
            "accion": option
        }
        $.ajax({
            data:parametros,
            type:"POST",
            url: "../Libraries/property/tipropertyajax.php",
            success: function(){
                clearmodalconsultar();
                table.ajax.reload();
            }
        });          
    }
    else{
        alert("Datos incompletos");//Modificar alert Ojo.
    }
    
}

function setdatadelete(table){ 
    let id_tip_prop = $("#codtipropedit").val();
    let option = $("button[id='delete']").val();
    $.ajax({
        data:{"idtiprop": id_tip_prop, "accion": option},
        type:"POST",
        url: "../Libraries/property/tipropertyajax.php",
        success: function(){
            clearmodalconsultar();
            table.ajax.reload();
        }
    });      
}

function clearmodalconsultar() {
        $("#codtipropedit").val(''),
        $("#catpropedit").val(''),
        $("#nomtipropedit").val(''),
        $("#destipropedit").val('');
  }

  function clearmodalagregar() {
        $("#idtiprop").val('');
        $("#selectcatprop").val('');
        $("#nomtiprop").val('');
        $("#destiprop").val('');
  }

  function closemodalagregar(){
    $("#modalagregar").hide();
    history.pushState({}, "", "/sistema/Views/principal.php");//Ojo con el direccionamiento de la ruta
  }

  function abrirmodalagregar(){
    $("#modalagregar").show();
  }

  function closemodalconsultar(){
    $("#modalconsultar").hide();
    history.pushState({}, "", "/sistema/Views/principal.php");//Ojo con el direccionamiento de la ruta
  }

  function abrirmodalconsultar(){
    $("#modalconsultar").show();
  }
