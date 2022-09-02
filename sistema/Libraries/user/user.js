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
                    "url": "../Libraries/user/userajax.php"
                },
                "columns": [
                    {"data":"ced_pers"},
                    {"data":"nom_pers"},
                    {"data":"ape_pers"},
                    {"data":"nom_usua"},
                    {"data":"nom_rol"},
                    { "responsivePriority": "1",
                        "data": null,
                        "defaultContent":'<a href="#modalconsultar" class="search" id="search" name="search">Consultar</a>'
                    }
                ]
            });

            getdata('#tablageneral tbody', datatables);

            $("#selectced").change(function(){
                getpers();
            });

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

function getpers(){
    if($("#selectced option:selected").val() !== ""){
        let cedpers = $("#selectced").val();
        datos = {"cedperson":cedpers};
        $.ajax({
            data: datos,
            url: "../Libraries/person/personajax.php",
            type: "POST",
            success: function(response){
                $(response.data).each(function(data, r){ // indice, valor
                    if(cedpers == r.ced_pers){
                        $("#nompers").val(r.nom_pers),
                        $("#apepers").val(r.ape_pers);
                    }
                })
            },
            error: function(error){
                console.log(error);
            }
        });
    }
}

function getdata(tbody, table){
    clearmodalconsultar();
    $(tbody).on("click","a.search", function(){
    let data = table.row($(this).parents("tr")).data();
    let coduser = $("#coduseredit").val(data.cod_usua),
        cedpers = $("#ceduseredit").val(data.ced_pers),
        nompers = $("#nompersedit").val(data.nom_pers),
        apepers = $("#apepersedit").val(data.ape_pers),
        idrol = $("#roledit").val(data.id_rol),
        nomrol = $("#roledit option:selected").text(data.nom_rol),
        nomusua = $("#nomuseredit").val(data.nom_usua),
        passusua = $("#passuseredit").val(data.pass_usua);
    });
}

function setdatacreate(table){ 
    let ced_pers = $("#selectced option:selected").val();
    let id_rol = $("#selectrol option:selected").val();
    let nom_user = $("#nomuser").val();
    let pass_user = $("#passuser").val();
    let option = $("button[id='create']").val();

   if(ced_pers !== null && ced_pers !== "" && id_rol !== null && id_rol !== "" && nom_user !== null && nom_user !== "" && pass_user !== null && pass_user !== "" && option !== null && option !== ""){
        let parametros = {
            "cedpers": ced_pers,
            "idrol": id_rol,
            "nomuser": nom_user,
            "passuser": pass_user,
            "accion": option
        }
        $.ajax({
            data:parametros,
            type:"POST",
            url: "../Libraries/user/userajax.php",
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
    let cod_user = $("#coduseredit").val();
    let ced_pers = $("#ceduseredit").val();
    let id_rol = $("#roledit").val();
    let nom_user = $("#nomuseredit").val();
    let pass_user = $("#passuseredit").val();
    let option = $("button[id='update']").val();

    if(cod_user !== null && cod_user !== "" && ced_pers !== null && ced_pers !== "" && id_rol !== null && id_rol !== "" && nom_user !== null && nom_user !== "" && pass_user !== null && pass_user !== "" && option !== null && option !== ""){
        let parametros = {
            "coduser" : cod_user,
            "cedpers": ced_pers,
            "idrol": id_rol,
            "nomuser": nom_user,
            "passuser": pass_user,
            "accion": option
        }
        $.ajax({
            data:parametros,
            type:"POST",
            url: "../Libraries/user/userajax.php",
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
    let cod_user= $("#coduseredit").val();
    let option = $("button[id='delete']").val();
    $.ajax({
        data:{"coduser": cod_user, "accion": option},
        type:"POST",
        url: "../Libraries/user/userajax.php",
        success: function(){
            clearmodalconsultar();
            table.ajax.reload();
        }
    });      
}


function clearmodalconsultar() {
    $("#coduseredit").val('');
    $("#ceduseredit").val('');
    $("#nompersedit").val('');
    $("#apepersedit").val('');
    $("#roledit").val('');
    $("#nomuseredit").val('');
    $("#passuseredit").val('');
}

function clearmodalagregar() {
    $("#selectced").val('');
    $("#nompers").val('');
    $("#apepers").val('');
    $("#selectrol").val('');
    $("#nomuser").val('');
    $("#passuser").val('');
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
