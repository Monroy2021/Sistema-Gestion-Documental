$(document).ready(function() {

    $(".content").load("../Views/welcome.php");   
    
    $("#mandate").on('click', function(evento){
       evento.preventDefault();
       let tiempos = 500;
       $.ajax({
          url:"../Views/asesor/modules/contratomandato.php",
          beforeSend: function(){
             $(".content").text('Procesando...');
          },
          success : function(data){
             setTimeout(function(){
                $(".content").html(data);
             },tiempos);
          }
       });
    });

    $("#mandatesearch").on('click', function(evento){
      evento.preventDefault();
      let tiempos = 500;
      $.ajax({
         url:"../Views/asesor/modules/buscarcontratomandato.php",
         beforeSend: function(){
            $(".content").text('Procesando...');
         },
         success : function(data){
            setTimeout(function(){
               $(".content").html(data);
            },tiempos);
         }
      });
   });

    $("#leasing").on('click', function(evento){
       evento.preventDefault();
       let tiempos = 500;
       $.ajax({
          url:"../Views/asesor/modules/contratoarriendo.php",
          beforeSend: function(){
             $(".content").text('Procesando...');
          },
          success : function(data){
             setTimeout(function(){
                $(".content").html(data);
             },tiempos);
          }
       });
    });

    $("#leasingsearch").on('click', function(evento){
      evento.preventDefault();
      let tiempos = 500;
      $.ajax({
         url:"../Views/asesor/modules/buscarcontratoarriendo.php",
         beforeSend: function(){
            $(".content").text('Procesando...');
         },
         success : function(data){
            setTimeout(function(){
               $(".content").html(data);
            },tiempos);
         }
      });
   });
 
 });
 