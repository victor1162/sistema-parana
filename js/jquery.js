$(document).ready(function(){
        

    $(".btn-info-historico").click(function(){
      
      $(".total-lavado-historico").slideToggle();
    });

    $(".area-btns-tipos").hide();
    $(".btn-adicionar-lavagem").click( function(){
      $(".area-btns-tipos").slideToggle();
    })

});
  