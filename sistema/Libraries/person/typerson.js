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
                    "url": "../Libraries/person/typersonajax.php"
                },
                "columns": [
                    {"data":"id_tip_pers"},
                    {"data":"nom_tip_pers"},
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
    let idtipers = $("#idtipersonedit").val(data.id_tip_pers),
        nomtipers = $("#nomtipersonedit").val(data.nom_tip_pers),
        destipers = $("#destipersonedit").val(data.des_tip_pers);
    });
}

function setdatacreate(table){ 
        let id_tip_pers = $("#idtiperson").val();
        let nom_tip_pers = $("#nomtiperson").val();
        let des_tip_pers = $("#destiperson").val();
        let option = $("button[id='create']").val();

       if(id_tip_pers !== null && id_tip_pers !== "" && nom_tip_pers !== null && nom_tip_pers !== "" && des_tip_pers !== null && des_tip_pers !== "" && option !== null && option !== ""){
            let parametros = {
                "idtipers": id_tip_pers,
                "nomtipers": nom_tip_pers,
                "destipers": des_tip_pers,
                "accion": option
            }
            console.log(parametros);
            $.ajax({
                data:parametros,
                type:"POST",
                url: "../Libraries/person/typersonajax.php",
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
    let id_tip_pers = $("#idtipersonedit").val();
    let nom_tip_pers = $("#nomtipersonedit").val();
    let des_tip_pers = $("#destipersonedit").val();
    let option = $("button[id='update']").val();

   if(id_tip_pers !== null && id_tip_pers !== "" && nom_tip_pers !== null && nom_tip_pers !== "" && des_tip_pers !== null && des_tip_pers !== "" && option !== null && option !== ""){
    let parametros = {
        "idtipers": id_tip_pers,
        "nomtipers": nom_tip_pers,
        "destipers": des_tip_pers,
        "accion": option
    }
        $.ajax({
            data:parametros,
            type:"POST",
            url: "../Libraries/person/typersonajax.php",
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
    let id_tip_pers = $("#idtipersonedit").val();
    let option = $("button[id='delete']").val();
    $.ajax({
        data:{"idtipers": id_tip_pers, "accion": option},
        type:"POST",
        url: "../Libraries/person/typersonajax.php",
        success: function(){
            clearmodalconsultar();
            table.ajax.reload();
        }
    });      
}

function clearmodalconsultar() {
        $("#idtipersonedit").val('');
        $("#nomtipersonedit").val('');
        $("#destipersonedit").val('');
  }

  function clearmodalagregar() {
        $("#idtiperson").val('');
        $("#nomtiperson").val('');
        $("#destiperson").val('');
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