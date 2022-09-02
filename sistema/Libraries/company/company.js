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
                    "url": "../Libraries/company/companyajax.php"
                },
                "columns": [
                    {"data":"nit_emp"},
                    {"data":"nom_emp"},
                    {"data":"dir_emp"},
                    {"data":"reg_emp"},
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
    let data = table.row($(this).parents("tr")).data();
    let idempresa   = $("#idempresaedit").val(data.id_emp),
        nitempresa  = $("#nitempresaedit").val(data.nit_emp),
        nomempresa  = $("#nomempresaedit").val(data.nom_emp),
        dirempresa  = $("#dirempresaedit").val(data.dir_emp),
        regempresa  = $("#regempresaedit").val(data.reg_emp);
    });
}

function setdatacreate(table){ 
        let nit_empresa = $("#nitempresa").val();
        let nom_empresa = $("#nomempresa").val(); 
        let dir_empresa = $("#dirempresa").val();
        let reg_empresa = $("#regempresa").val();  
        let option = $("button[id='create']").val()


       if(nit_empresa !== null && nit_empresa !== "" && nom_empresa !== null && nom_empresa !== "" && dir_empresa !== null && dir_empresa !== "" && reg_empresa !== null && reg_empresa !== "" && option !== null && option !== ""){
            let parametros = {
                "nitempresa": nit_empresa,
                "nomempresa": nom_empresa,
                "dirempresa": dir_empresa,
                "regempresa": reg_empresa,
                "accion": option
            }
            $.ajax({
                data:parametros,
                type:"POST",
                url: "../Libraries/company/companyajax.php",
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
    let id_empresa = $("#idempresaedit").val();
    let nit_empresa = $("#nitempresaedit").val();
    let nom_empresa = $("#nomempresaedit").val(); 
    let dir_empresa = $("#dirempresaedit").val();
    let reg_empresa = $("#regempresaedit").val();  
    let option = $("button[id='update']").val();

    if(id_empresa !== null && id_empresa !== "" && nit_empresa !== null && nit_empresa !== "" && nom_empresa !== null && nom_empresa !== "" && dir_empresa !== null && dir_empresa !== "" && reg_empresa !== null && reg_empresa !== "" && option !== null && option !== ""){
        let parametros = {
            "idempresa": id_empresa,
            "nitempresa": nit_empresa,
            "nomempresa": nom_empresa,
            "dirempresa": dir_empresa,
            "regempresa": reg_empresa,
            "accion": option
        }
        $.ajax({
            data:parametros,
            type:"POST",
            url: "../Libraries/company/companyajax.php",
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
    let id_empresa = $("#idempresaedit").val();
    let option = $("button[id='delete']").val();
    $.ajax({
        data:{"idempresa": id_empresa, "accion": option},
        type:"POST",
        url: "../Libraries/company/companyajax.php",
        success: function(){
            clearmodalconsultar();
            table.ajax.reload();
        }
    });      
}

function clearmodalconsultar() {
    $("#nitempresaedit").val(''),
    $("#nomempresaedit").val(''),
    $("#dirempresaedit").val(''),
    $("#regempresaedit").val('');
  }

  function clearmodalagregar() {
    $("#nitempresa").val(''),
    $("#nomempresa").val(''),
    $("#dirempresa").val(''),
    $("#regempresa").val('');
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

