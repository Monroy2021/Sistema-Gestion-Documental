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
                    "url": "../Libraries/operation/tyoperationajax.php"
                },
                "columns": [
                    {"data":"id_tip_oper"},
                    {"data":"nom_tip_oper"},
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
    let idtipoper = $("#idtipoperedit").val(data.id_tip_oper),
        nomtipoper = $("#nomtipoperedit").val(data.nom_tip_oper),
        destipoper = $("#destipoperedit").val(data.desc_tip_oper);
    });
}

function setdatacreate(table){ 
        let id_tip_oper = $("#idtipoper").val();
        let nom_tip_oper = $("#nomtipoper").val();
        let des_tip_oper = $("#destipoper").val();
        let option = $("button[id='create']").val();

       if(id_tip_oper !== null && id_tip_oper !== "" && nom_tip_oper !== null && nom_tip_oper !== "" && des_tip_oper !== null && des_tip_oper !== "" && option !== null && option !== ""){
            let parametros = {
                "idtipoper": id_tip_oper,
                "nomtipoper": nom_tip_oper,
                "destipoper": des_tip_oper,
                "accion": option
            }
            console.log(parametros);
            $.ajax({
                data:parametros,
                type:"POST",
                url: "../Libraries/operation/tyoperationajax.php",
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
    let id_tip_oper = $("#idtipoperedit").val();
    let nom_tip_oper = $("#nomtipoperedit").val();
    let des_tip_oper = $("#destipoperedit").val();
    let option = $("button[id='update']").val();

   if(id_tip_oper !== null && id_tip_oper !== "" && nom_tip_oper !== null && nom_tip_oper !== "" && des_tip_oper !== null && des_tip_oper !== "" && option !== null && option !== ""){
    let parametros = {
        "idtipoper": id_tip_oper,
        "nomtipoper": nom_tip_oper,
        "destipoper": des_tip_oper,
        "accion": option
    }
        $.ajax({
            data:parametros,
            type:"POST",
            url: "../Libraries/operation/tyoperationajax.php",
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
    let id_tip_oper = $("#idtipoperedit").val();
    let option = $("button[id='delete']").val();
    $.ajax({
        data:{"idtipoper": id_tip_oper, "accion": option},
        type:"POST",
        url: "../Libraries/operation/tyoperationajax.php",
        success: function(){
            clearmodalconsultar();
            table.ajax.reload();
        }
    });      
}

function clearmodalconsultar() {
        $("#idtipoper").val('');
        $("#nomtipoper").val('');
        $("#destipoper").val('');
  }

  function clearmodalagregar() {
        $("#idtipoperedit").val('');
        $("#nomtipoperedit").val('');
        $("#destipoperedit").val('');
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