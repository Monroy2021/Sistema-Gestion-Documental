$(document).ready(function() {

    $("#login").on("click", function(){
        loginsession();
    });

    $("#cerrarsession").on("click", function(){
        closesession();
    });

} );

function loginsession(){
    let user = $("#username").val();
    let pass = $("#pass").val();
    let login = $("button[id='login']").val();
    if(user !== null && user !== "" && pass !== null && pass !== ""){
        let datauser = {"nameuser":user, "passworduser":pass, "option":login}
        $.ajax({
            data:datauser,
            type:"POST",
            url: "Controllers/controllerlogin.php",
            success: function(users){
                if(users.ced_user !== "" && users.ced_user !== null && users.nom_user !== "" && users.ape_user !== null && users.ape_user !== "" && users.ape_user !== null){
                    $(location).attr("href","Views/principal.php");
                }
                else{
                    alert("usuario y password incorrectos");
                }
            }
        });        
    }
}

function closesession(){
    let closesession = "close";
    let datauser = {"option":closesession}
    $.ajax({
        data:datauser,
        type:"POST",
        url: "../Controllers/controllerlogin.php",
        success: function(response){
            if(response = "OK"){
                localStorage.clear();
                $(location).attr("href","../index.html");
            }
            
        }
    });        
}

function clearloginsession() {
    $("#username").val(''),
    $("#pass").val('')
}