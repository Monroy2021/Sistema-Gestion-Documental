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
                    "url": "../Libraries/rol/rolajax.php"
                },
                "columns": [
                    {"data":"nom_rol"},
                    {"data":"esp_rol"},
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
    let idrol = $("#idroledit").val(data.id_rol),
        nomrol = $("#nomroledit").val(data.nom_rol),
        esprol = $("#esproledit").val(data.esp_rol);
    });
}

function setdatacreate(table){ 
        let nom_rol = $("#nomrol").val();
        let esp_rol = $("#esprol").val();
        let option = $("button[id='create']").val();

       if(nom_rol !== null && nom_rol !== "" && esp_rol !== null && esp_rol !== "" && option !== null && option !== ""){
            let parametros = {
                "nomrol": nom_rol,
                "esprol": esp_rol,
                "accion": option
            }
            $.ajax({
                data:parametros,
                type:"POST",
                url: "../Libraries/rol/rolajax.php",
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
        let id_rol = $("#idroledit").val();
        let nom_rol = $("#nomroledit").val();
        let esp_rol = $("#esproledit").val();
        let option = $("button[id='update']").val();

    if(id_rol !== null && id_rol !== "" && nom_rol !== null && nom_rol !== "" && esp_rol !== null && esp_rol !== "" && option !== null && option !== ""){
        let parametros = {
            "idrol" : id_rol,
            "nomrol": nom_rol,
            "esprol": esp_rol,
            "accion": option
        }
        $.ajax({
            data:parametros,
            type:"POST",
            url: "../Libraries/rol/rolajax.php",
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
    let id_rol = $("#idroledit").val();
    let option = $("button[id='delete']").val();
    $.ajax({
        data:{"idrol": id_rol, "accion": option},
        type:"POST",
        url: "../Libraries/rol/rolajax.php",
        success: function(){
            clearmodalconsultar();
            table.ajax.reload();
        }
    });      
}

function clearmodalconsultar() {
        $("#idroledit").val('');
        $("#nomroledit").val('');
        $("#esproledit").val('');
  }

  function clearmodalagregar() {
        $("#nomrol").val('');
        $("#esprol").val('');
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

 
 



