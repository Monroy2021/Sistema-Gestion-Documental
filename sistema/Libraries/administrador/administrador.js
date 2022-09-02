$(document).ready(function() {

   $(".content").load("../Views/welcome.php");   
   
   $("#company").on('click', function(evento){
      evento.preventDefault();
      let tiempos = 500;
      $.ajax({
         url:"../Views/administrador/modules/company.php",
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

   $("#person").on('click', function(evento){
      evento.preventDefault();
      let tiempos = 500;
      $.ajax({
         url:"../Views/administrador/modules/person.php",
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

   $("#typerson").on('click', function(evento){
      evento.preventDefault();
      let tiempos = 500;
      $.ajax({
         url:"../Views/administrador/modules/typerson.php",
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

   $("#rol").on('click', function(evento){
      evento.preventDefault();
      let tiempos = 500;
      $.ajax({
         url:"../Views/administrador/modules/rol.php",
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

   $("#users").on('click', function(evento){
      evento.preventDefault();
      let tiempos = 500;
      $.ajax({
         url:"../Views/administrador/modules/user.php",
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


   $("#catproperty").on('click', function(evento){
      evento.preventDefault();
      let tiempos = 500;
      $.ajax({
         url:"../Views/administrador/modules/catproperty.php",
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

   $("#tiproperty").on('click', function(evento){
      evento.preventDefault();
      let tiempos = 500;
      $.ajax({
         url:"../Views/administrador/modules/tiproperty.php",
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

   $("#property").on('click', function(evento){
      evento.preventDefault();
      let tiempos = 500;
      $.ajax({
         url:"../Views/administrador/modules/property.php",
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

   $("#tyoperation").on('click', function(evento){
      evento.preventDefault();
      let tiempos = 500;
      $.ajax({
         url:"../Views/administrador/modules/tyoperation.php",
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

   $("#archive").on('click', function(evento){
      evento.preventDefault();
      let tiempos = 500;
      $.ajax({
         url:"../Views/administrador/modules/archive.php",
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

   $("#typefile").on('click', function(evento){
      evento.preventDefault();
      let tiempos = 500;
      $.ajax({
         url:"../Views/administrador/modules/typefile.php",
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

   $("#serie").on('click', function(evento){
      evento.preventDefault();
      let tiempos = 500;
      $.ajax({
         url:"../Views/administrador/modules/serie.php",
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

   $("#subserie").on('click', function(evento){
      evento.preventDefault();
      let tiempos = 500;
      $.ajax({
         url:"../Views/administrador/modules/subserie.php",
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
