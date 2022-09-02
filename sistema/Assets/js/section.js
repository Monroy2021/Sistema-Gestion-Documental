$( document ).ready(function() {
  $('#btn_principal').click(function(){ 
     $('.sidebar').toggleClass('active');
     $('#btn_principal').toggleClass('active');
     $('.main').toggleClass('active');
   })
});

$( document ).ready(function() {
  $('#btn_principal_mobile').click(function(){ 
    $('.sidebar').toggleClass('active');
    $('.main').toggleClass('active');
    $('.btn').toggleClass('active');      
   })
});

