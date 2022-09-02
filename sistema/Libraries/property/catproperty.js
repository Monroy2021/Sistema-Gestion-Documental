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
                    "url": "../Libraries/property/catpropertyajax.php"
                },
                "columns": [
                    {"data":"id_cat_prop"},
                    {"data":"nom_cat_prop"},
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
    let idcatprop = $("#codcatpropedit").val(data.id_cat_prop),
        nomcatprop = $("#nomcatpropedit").val(data.nom_cat_prop),
        descatprop = $("#descatpropedit").val(data.desc_cat_prop);
    });
}

function setdatacreate(table){ 
        let id_cat_prop = $("#idcatprop").val();
        let nom_cat_prop = $("#nomcatprop").val();
        let desc_cat_prop = $("#descatprop").val();
        let option = $("button[id='create']").val();

       if(id_cat_prop !== null && id_cat_prop !== "" && nom_cat_prop !== null && nom_cat_prop !== "" && desc_cat_prop !== null && desc_cat_prop !== "" && option !== null && option !== ""){
            let parametros = {
                "idcatprop": id_cat_prop,
                "nomcatprop": nom_cat_prop,
                "descatprop": desc_cat_prop,
                "accion": option
            }
            $.ajax({
                data:parametros,
                type:"POST",
                url: "../Libraries/property/catpropertyajax.php",
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
        let id_cat_prop = $("#codcatpropedit").val();
        let nom_cat_prop = $("#nomcatpropedit").val();
        let desc_cat_prop = $("#descatpropedit").val();
        let option = $("button[id='update']").val();

    if(id_cat_prop !== null && id_cat_prop !== "" && nom_cat_prop !== null && nom_cat_prop !== "" && desc_cat_prop !== null && desc_cat_prop !== "" && option !== null && option !== ""){
        let parametros = {
            "idcatprop": id_cat_prop,
            "nomcatprop": nom_cat_prop,
            "descatprop": desc_cat_prop,
            "accion": option
        }
        $.ajax({
            data:parametros,
            type:"POST",
            url: "../Libraries/property/catpropertyajax.php",
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
    let id_cat_prop = $("#codcatpropedit").val();
    let option = $("button[id='delete']").val();
    $.ajax({
        data:{"idcatprop": id_cat_prop, "accion": option},
        type:"POST",
        url: "../Libraries/property/catpropertyajax.php",
        success: function(){
            clearmodalconsultar();
            table.ajax.reload();
        }
    });      
}

function clearmodalconsultar() {
        $("#codcatpropedit").val('');
        $("#nomcatpropedit").val('');
        $("#descatpropedit").val('');
  }

  function clearmodalagregar() {
        $("#idcatprop").val('');
        $("#nomcatprop").val('');
        $("#descatprop").val('');
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
