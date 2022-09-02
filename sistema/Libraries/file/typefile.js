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
                    "url": "../Libraries/file/typefileajax.php"
                },
                "columns": [
                    {"data":"cod_tip_carp"},
                    {"data":"nom_num_arch"},
                    {"data":"nom_tip_carp"},
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
    let codtipcarp = $("#codtipcarpedit").val(data.cod_tip_carp),
        codarch = $("#archedit").val(data.cod_arch),
        nomnumarch = $("#archedit option:selected").text(data.nom_num_arch),
        nomtipcarp = $("#nomtipcarpedit").val(data.nom_tip_carp),
        destipcarp = $("#destipcarpedit").val(data.desc_tip_carp);
    });
}

function setdatacreate(table){ 
        let cod_tip_carp = $("#codtipcarp").val();
        let cod_arch = $("#selectarch").val();
        let nom_tip_carp = $("#nomtipcarp").val();
        let desc_tip_carp = $("#destipcarp").val();
        let option = $("button[id='create']").val();

       if(cod_tip_carp !== null && cod_tip_carp !== "" && cod_arch !== null && cod_arch !== "" && nom_tip_carp !== null && nom_tip_carp !== "" && desc_tip_carp !== null && desc_tip_carp !== "" && option !== null && option !== ""){
            let parametros = {
                "codtipcarp": cod_tip_carp,
                "codarch": cod_arch,
                "nomtipcarp": nom_tip_carp,
                "desctipcarp": desc_tip_carp,
                "accion": option
            }
            $.ajax({
                data:parametros,
                type:"POST",
                url: "../Libraries/file/typefileajax.php",
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
    let cod_tip_carp = $("#codtipcarpedit").val();
    let cod_arch = $("#archedit").val();
    let nom_tip_carp = $("#nomtipcarpedit").val();
    let desc_tip_carp = $("#destipcarpedit").val();
    let option = $("button[id='update']").val();

   if(cod_tip_carp !== null && cod_tip_carp !== "" && cod_arch !== null && cod_arch !== "" && nom_tip_carp !== null && nom_tip_carp !== "" && desc_tip_carp !== null && desc_tip_carp !== "" && option !== null && option !== ""){
    let parametros = {
        "codtipcarp": cod_tip_carp,
        "codarch": cod_arch,
        "nomtipcarp": nom_tip_carp,
        "desctipcarp": desc_tip_carp,
        "accion": option
    }
        $.ajax({
            data:parametros,
            type:"POST",
            url: "../Libraries/file/typefileajax.php",
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
    let cod_tip_carp = $("#codtipcarpedit").val();
    let option = $("button[id='delete']").val();
    $.ajax({
        data:{"codtipcarp": cod_tip_carp, "accion": option},
        type:"POST",
        url: "../Libraries/file/typefileajax.php",
        success: function(){
            clearmodalconsultar();
            table.ajax.reload();
        }
    });      
}

function clearmodalconsultar() {
        $("#codtipcarpedit").val(''),
        $("#archedit").val(''),
        $("#nomtipcarpedit").val(''),
        $("#destipcarpedit").val('');
  }

  function clearmodalagregar() {
        $("#codtipcarp").val('');
        $("#selectarch").val('');
        $("#nomtipcarp").val('');
        $("#destipcarp").val('');
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