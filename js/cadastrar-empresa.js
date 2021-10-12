// mascara celular
function mascaraTelefone( campo ) {
      
    function trata( valor,  isOnBlur ) {		
       valor = valor.replace(/\D/g,"");                      
       valor = valor.replace(/^(\d{2})(\d)/g,"($1) $2");      
       if( isOnBlur ) {		   
          valor = valor.replace(/(\d)(\d{4})$/,"$1-$2");   
       } else {
          valor = valor.replace(/(\d)(\d{3})$/,"$1-$2"); 
       }
       return valor;
    }
    
    campo.onkeypress = function (evt) {		 
       let code = (window.event)? window.event.keyCode : evt.which;   
       let valor = this.value		
       if(code > 57 || (code < 48 && code != 8 ))  {
          return false;
       } else {
          this.value = trata(valor, false);
       }
    }
    
    campo.onblur = function() {
       
    let valor = this.value;
       if( valor.length < 14 ) {
          this.value = ""
       }else {      
          this.value = trata( this.value, true );
       }
    }
    
    campo.maxLength = 15;
}
mascaraTelefone( document.querySelector('.input-celular') );

// mascara telefone
function mascaraTelefone( campo ) {
      
   function trata( valor,  isOnBlur ) {		
      valor = valor.replace(/\D/g,"");                      
      valor = valor.replace(/^(\d{2})(\d)/g,"($1) $2");      
      if( isOnBlur ) {		   
         valor = valor.replace(/(\d)(\d{4})$/,"$1-$2");   
      } else {
         valor = valor.replace(/(\d)(\d{3})$/,"$1-$2"); 
      }
      return valor;
   }
   
   campo.onkeypress = function (evt) {		 
      let code = (window.event)? window.event.keyCode : evt.which;   
      let valor = this.value		
      if(code > 57 || (code < 48 && code != 8 ))  {
         return false;
      } else {
         this.value = trata(valor, false);
      }
   }
   
   campo.onblur = function() {
      
   let valor = this.value;
      if( valor.length < 14 ) {
         this.value = ""
      }else {      
         this.value = trata( this.value, true );
      }
   }
   
   campo.maxLength = 15;
}
mascaraTelefone( document.querySelector('.input-telefone') );

// converte para um CNPJ formatado
document.querySelector('.input-cnpj').addEventListener('input', function(e) {
   let x = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,3})(\d{0,3})(\d{0,4})(\d{0,2})/);
   e.target.value = !x[2] ? x[1] : x[1] + '.' + x[2] + '.' + x[3] + '/' + x[4] + (x[5] ? '-' + x[5] : '');
 });

//  validando inputs e verificando se esta vazio
document.querySelector('.btn-salvar-cadastro').addEventListener('click', function (e) {

   let input_empresa = document.querySelector('.input-empresa').value
   let input_nome = document.querySelector('.input-nome').value
   let input_telefone = document.querySelector('.input-telefone').value
   
   let data_inicio = document.querySelector('.input-date-inicio').value;
   let data_final = document.querySelector('.input-date-final').value;

   if(!input_empresa){
      document.getElementById("notEmpresa").style.display = "inline";
   }
   if(!input_nome){
      document.getElementById("notNome").style.display = "inline";
   }
   if(input_telefone < 14 && input_telefone == ''){
      document.getElementById("notTelefone").style.display = "inline";
   }
   if(!data_inicio){
      document.getElementById("notDateInicio").style.display = "inline";
   }
   if(!data_final){
      document.getElementById("notDateFinal").style.display = "inline";
   }
   
   if(!input_empresa || !input_nome || !input_telefone || !data_inicio || !data_final){
      // nada faz
   }else{
      document
      .querySelector(".formulario-empresas")
      .setAttribute("action", "veiculo-controller.php?acao=cadastrarEmpresa");

      document.querySelector(".btn-salvar-cadastro").setAttribute("type", "submit");

      let existeAtt = document.querySelector(".btn-salvar-cadastro").getAttribute("type");

      if (existeAtt == "submit") {
         document.querySelector(".btn-salvar-cadastro").style.display = "none";
         document.querySelector(".btn-submit-loading2").style.display = "block";
      }
   }
})

document.querySelector('.input-empresa').addEventListener('input', function() {
   document.getElementById("notEmpresa").style.display = "none";
});
document.querySelector('.input-nome').addEventListener('input', function() {
   document.getElementById("notNome").style.display = "none";
});
document.querySelector('.input-telefone').addEventListener('input', function() {
   document.getElementById("notTelefone").style.display = "none";
});
document.querySelector('.input-date-inicio').addEventListener('input', function() {
   document.getElementById("notDateInicio").style.display = "none";
});
document.querySelector('.input-date-final').addEventListener('input', function() {
   document.getElementById("notDateFinal").style.display = "none";
});