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
                    "url": "../Libraries/serie/serieajax.php"
                },
                "columns": [
                    {"data":"id_serie"},
                    {"data":"nom_serie"},
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
    let codserie = $("#codserieedit").val(data.id_serie),
        nomserie = $("#nomserieedit").val(data.nom_serie),
        descserie = $("#desserieedit").val(data.desc_serie);
    });
}

function setdatacreate(table){ 
        let cod_serie = $("#codserie").val();
        let nom_serie = $("#nomserie").val();
        let desc_serie = $("#desserie").val();
        let option = $("button[id='create']").val();

       if(cod_serie !== null && cod_serie !== "" && nom_serie !== null && nom_serie !== "" && desc_serie !== null && desc_serie !== "" && option !== null && option !== ""){
            let parametros = {
                "idserie": cod_serie,
                "nomserie": nom_serie,
                "descserie": desc_serie,
                "accion": option
            }

            $.ajax({
                data:parametros,
                type:"POST",
                url: "../Libraries/serie/serieajax.php",
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
        let cod_serie = $("#codserieedit").val();
        let nom_serie = $("#nomserieedit").val();
        let desc_serie = $("#desserieedit").val();
        let option = $("button[id='update']").val();

       if(cod_serie !== null && cod_serie !== "" && nom_serie !== null && nom_serie !== "" && desc_serie !== null && desc_serie !== "" && option !== null && option !== ""){
            let parametros = {
                "idserie": cod_serie,
                "nomserie": nom_serie,
                "descserie": desc_serie,
                "accion": option
            }
        $.ajax({
            data:parametros,
            type:"POST",
            url: "../Libraries/serie/serieajax.php",
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
    let cod_serie = $("#codserieedit").val();
    let option = $("button[id='delete']").val();
    $.ajax({
        data:{"idserie": cod_serie, "accion": option},
        type:"POST",
        url: "../Libraries/serie/serieajax.php",
        success: function(){
            clearmodalconsultar();
            table.ajax.reload();
        }
    });      
}

function clearmodalconsultar() {
        $("#codserieedit").val('');
        $("#nomserieedit").val('');
        $("#desserieedit").val('');
  }

  function clearmodalagregar() {
        $("#codserie").val('');
        $("#nomserie").val('');
        $("#desserie").val('');
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