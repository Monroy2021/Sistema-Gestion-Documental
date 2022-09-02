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
                    "url": "../Libraries/person/personajax.php"
                },
                "columns": [
                    {"data":"ced_pers"},
                    {"data":"nom_pers"},
                    {"data":"ape_pers"},
                    {"data":"nom_emp"},
                    {"data":"email_pers"},
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
    let nomemp = $("#companyedit option:selected").text(data.nom_emp),
        cedpers = $("#cedupersonedit").val(data.ced_pers),
        nompers = $("#nompersonedit").val(data.nom_pers),
        apepers = $("#apepersonedit").val(data.ape_pers),
        fecexpcedpers = $("#fecexpcedpersonedit").val(data.fec_exp_ced_pers),
        celupers = $("#celupersonedit").val(data.cel_pers),
        telpers = $("#telpersonedit").val(data.tel_pers),
        emailpers = $("#emailpersonedit").val(data.email_pers), 
        sexpers = $("#sexpersonedit").val(data.sex_pers),
        dirpers = $("#dirpersonedit").val(data.dir_pers),  
        ciudpers = $("#ciudpersonedit").val(data.ciud_pers);
    });
}

function setdatacreate(table){ 
        let ced_pers = $("#cedperson").val();
        let id_emp = $("#selectcompany").val();
        let nom_pers = $("#nomperson").val();
        let ape_pers = $("#apeperson").val();
        let fec_exp_ced_pers = $("#fecexpcedperson").val();
        let celu_pers = $("#celuperson").val();
        let tel_pers = $("#telperson").val();
        let email_pers = $("#emailperson").val(); 
        let sex_pers = $("#sexperson").val();
        let dir_pers = $("#dirperson").val();  
        let ciud_pers = $("#ciudperson").val();
        let option = $("button[id='create']").val();

       if(ced_pers !== null && ced_pers !== "" && id_emp !== null && id_emp !== "" && nom_pers !== null && nom_pers !== "" && ape_pers !== null && ape_pers !== "" && fec_exp_ced_pers !== null && fec_exp_ced_pers !== "" && celu_pers !== null && celu_pers !== "" && tel_pers !== null && tel_pers !== "" && email_pers !== null && email_pers !== "" && sex_pers !== null && sex_pers !== "" && dir_pers !== null && dir_pers !== "" && ciud_pers !== null && ciud_pers !== "" && option !== null && option !== ""){
            let parametros = {
                "cedperson": ced_pers,
                "idcompany": id_emp,
                "nomperson": nom_pers,
                "apeperson": ape_pers,
                "fecexpcedcedperson": fec_exp_ced_pers,
                "celuperson": celu_pers,
                "telperson": tel_pers,
                "emailperson": email_pers,
                "sexperson": sex_pers,
                "dirperson": dir_pers,
                "ciudperson": ciud_pers,
                "accion": option
            }
            $.ajax({
                data:parametros,
                type:"POST",
                url: "../Libraries/person/personajax.php",
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
        let ced_pers = $("#cedupersonedit").val();
        let id_emp = $("#companyedit").val();
        let nom_pers = $("#nompersonedit").val();
        let ape_pers = $("#apepersonedit").val();
        let fec_exp_ced_pers = $("#fecexpcedpersonedit").val();
        let celu_pers = $("#celupersonedit").val();
        let tel_pers = $("#telpersonedit").val();
        let email_pers = $("#emailpersonedit").val(); 
        let sex_pers = $("#sexpersonedit").val();
        let dir_pers = $("#dirpersonedit").val();  
        let ciud_pers = $("#ciudpersonedit").val();  
        let option = $("button[id='update']").val();

        console.log(id_emp);
        console.log(ced_pers);

    if(ced_pers !== null && ced_pers !== "" && id_emp !== null && id_emp !== "" && nom_pers !== null && nom_pers !== "" && ape_pers !== null && ape_pers !== "" && fec_exp_ced_pers !== null && fec_exp_ced_pers !== "" && celu_pers !== null && celu_pers !== "" && tel_pers !== null && tel_pers !== "" && email_pers !== null && email_pers !== "" && sex_pers !== null && sex_pers !== "" && dir_pers !== null && dir_pers !== "" && ciud_pers !== null && ciud_pers !== "" && option !== null && option !== ""){
        let parametros = {
            "cedperson": ced_pers,
            "idcompany": id_emp,
            "nomperson": nom_pers,
            "apeperson": ape_pers,
            "fecexpcedcedperson": fec_exp_ced_pers,
            "celuperson": celu_pers,
            "telperson": tel_pers,
            "emailperson": email_pers,
            "sexperson": sex_pers,
            "dirperson": dir_pers,
            "ciudperson": ciud_pers,
            "accion": option
        }
        $.ajax({
            data:parametros,
            type:"POST",
            url: "../Libraries/person/personajax.php",
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
    let ced_pers = $("#cedupersonedit").val();
    let option = $("button[id='delete']").val();
    $.ajax({
        data:{"cedperson": ced_pers, "accion": option},
        type:"POST",
        url: "../Libraries/person/personajax.php",
        success: function(){
            clearmodalconsultar();
            table.ajax.reload();
        }
    });      
}

function clearmodalconsultar() {
        $("#cedupersonedit").val('');
        $("#nompersonedit").val('');
        $("#apepersonedit").val('');
        $("#fecexpcedpersonedit").val('');
        $("#celupersonedit").val('');
        $("#telpersonedit").val('');
        $("#emailpersonedit").val(''); 
        $("#sexpersonedit").val('');
        $("#dirpersonedit").val('');  
        $("#ciudpersonedit").val('');
  }

  function clearmodalagregar() {
        $("#cedperson").val('');
        $("#selectcompany").val('');
        $("#nomperson").val('');
        $("#apeperson").val('');
        $("#fecexpcedperson").val('');
        $("#celuperson").val('');
        $("#telperson").val('');
        $("#emailperson").val(''); 
        $("#sexperson").val('');
        $("#dirperson").val('');  
        $("#ciudperson").val('');
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

 
 



