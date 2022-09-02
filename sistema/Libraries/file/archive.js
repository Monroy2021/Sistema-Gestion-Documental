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
                    "url": "../Libraries/file/archiveajax.php"
                },
                "columns": [
                    {"data":"nom_arch"},
                    {"data":"num_arch"},
                    {"data":"tip_arch"},
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
    let codarch = $("#codarchedit").val(data.cod_arch),
        nomarch = $("#nomarchedit").val(data.nom_arch),
        numarch = $("#numarchedit").val(data.num_arch),
        tiparch = $("#tiparchedit").val(data.tip_arch),
        desarch = $("#desarchedit").val(data.desc_arch);
    });
}

function setdatacreate(table){ 
        let nom_arch = $("#nomarch").val();
        let num_arch = $("#numarch").val();
        let tip_arch = $("#tiparch").val();
        let desc_arch = $("#desarch").val();
        let option = $("button[id='create']").val();

       if(nom_arch !== null && nom_arch !== "" && num_arch !== null && num_arch !== "" && tip_arch !== null && tip_arch !== "" && desc_arch !== null && desc_arch !== "" && option !== null && option !== ""){
            let parametros = {
                "nomarch": nom_arch,
                "numarch": num_arch,
                "tiparch": tip_arch,
                "desarch": desc_arch,
                "accion": option
            }
            $.ajax({
                data:parametros,
                type:"POST",
                url: "../Libraries/file/archiveajax.php",
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
    let cod_arch = $("#codarchedit").val();
    let nom_arch = $("#nomarchedit").val();
    let num_arch = $("#numarchedit").val();
    let tip_arch = $("#tiparchedit").val();
    let desc_arch = $("#desarchedit").val();
    let option = $("button[id='update']").val();

   if(cod_arch !== null && cod_arch !== "" && nom_arch !== null && nom_arch !== "" && num_arch !== null && num_arch !== "" && tip_arch !== null && tip_arch !== "" && desc_arch !== null && desc_arch !== "" && option !== null && option !== ""){
    let parametros = {
        "codarch": cod_arch,
        "nomarch": nom_arch,
        "numarch": num_arch,
        "tiparch": tip_arch,
        "desarch": desc_arch,
        "accion": option
    }
        $.ajax({
            data:parametros,
            type:"POST",
            url: "../Libraries/file/archiveajax.php",
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
    let cod_arch = $("#codarchedit").val();
    let option = $("button[id='delete']").val();
    $.ajax({
        data:{"codarch": cod_arch, "accion": option},
        type:"POST",
        url: "../Libraries/file/archiveajax.php",
        success: function(){
            clearmodalconsultar();
            table.ajax.reload();
        }
    });      
}

function clearmodalconsultar() {
        $("#codarchedit").val('');
        $("#nomarchedit").val('');
        $("#numarchedit").val('');
        $("#tiparchedit").val('');
        $("#desarchedit").val('');
  }

  function clearmodalagregar() {
        $("#nomarch").val('');
        $("#numarch").val('');
        $("#tiparch").val('');
        $("#desarch").val('');
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