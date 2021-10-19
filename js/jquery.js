$(document).ready(function(){
        

    $(".btn-info-historico").click(function(){
      
      $(".total-lavado-historico").slideToggle();
    });

    $(".area-btns-tipos").hide();
    $(".btn-adicionar-lavagem").click( function(){
      $(".area-btns-tipos").slideToggle();
    })

    $(".area-btns-historico").hide();
    $(".btn-opcoes-recem").click(function(){
      $('.area-btns-historico').slideToggle();
    })

});
  