function abrirSelecionado(empresa, id){
    document.querySelector('.id_da_empresa').value = id;
    document.querySelector('.nome_da_empresa').value = empresa;

    document.querySelector('.nome-selcionado').innerHTML = empresa;
    document.querySelector('.area-selecionar-empresa').style.display = 'none';
    document.querySelector('.area-form-empresas-add').setAttribute("id", "area-formulario-add");
    document.querySelector('.nome-veiculo-empresa').style.display = 'flex';
    document.getElementById('area-entrada-veiculo').style.display = 'block';
    document.querySelector('.campo-adicionar-especiais').style.display = 'flex';

}

// voltando para a seleção de empresas
document.querySelector('.btn-close-empresa').addEventListener('click', function(){
    document.querySelector('.id_da_empresa').value = '';
    document.querySelector('.nome-selcionado').innerHTML = '';
    document.querySelector('.area-selecionar-empresa').style.display = 'block';
    document.querySelector('.area-form-empresas-add').removeAttribute("id");
    document.querySelector('.nome-veiculo-empresa').style.display = 'none';
    document.getElementById('area-entrada-veiculo').style.display = 'none';
    document.querySelector('.campo-adicionar-especiais').style.display = 'none';
})

// verificar se inputs esta vazio ou cheio
// pagina veiculo empresas
function consultarInputsEmpresa(){
    let placaVeiculo = document.getElementById("placaREP1").value;
    let modeloVeiculo = document.getElementById("inputModelo").value;
    let corVeiculo = document.getElementById("inputCor").value;
    let valorVeiculo = document.getElementById("inputValor").value;
  
    if (!placaVeiculo) {
      document.getElementById("notPlaca").style.display = "inline";
    }
    if (!modeloVeiculo) {
      document.getElementById("notModelo").style.display = "inline";
    }
    if (!corVeiculo) {
      document.getElementById("notCor").style.display = "inline";
    }
    if (!valorVeiculo) {
      document.getElementById("notValor").style.display = "inline";
    }
  
    if (!placaVeiculo || !modeloVeiculo || !corVeiculo || !valorVeiculo) {
      // nada faz / possivel alteração
    } else {
      // veiculo-controller.php?acao=veiculoEmpresa
      // imprimir-cupom.php?acao=imprimirCupom
      document
        .querySelector(".area-form-empresas-add")
        .setAttribute("action", "imprimir-cupom.php?acao=veiculoEmpresa");
      document.getElementById("btn-submit").setAttribute("type", "submit");
  
      let existeAtt = document.getElementById("btn-submit").getAttribute("type");
  
      if (existeAtt == "submit") {
        document.getElementById("btn-submit").style.display = "none";
        document.getElementById("btn-submit-loading").style.display = "block";
      }
    }
}

function consultarInputsEmpresasEspeciais(){
    let placaVeiculo = document.querySelector(".opc-placaREP1").value;
  let modeloVeiculo = document.querySelector(".opc-InputModelo").value;
  let valorVeiculo = document.querySelector(".opc-inputValor").value;

  if (!placaVeiculo) {
    document.getElementById("notEspPlaca").style.display = "inline";
  }
  if (!modeloVeiculo) {
    document.getElementById("notEspModelo").style.display = "inline";
  }
  if (!valorVeiculo) {
    document.getElementById("notEspValor").style.display = "inline";
  }

  if (!placaVeiculo || !modeloVeiculo || !valorVeiculo) {
    // nada faz / possivel alteração
  } else {
    document
      .querySelector(".area-form-empresas-add")
      .setAttribute("action", "imprimir-cupom.php?acao=veiculoEmpresaEspeciais");
    document.querySelector(".btn-submit2").setAttribute("type", "submit");

    let existeAtt = document.getElementById("btn-submit").getAttribute("type");

    if (existeAtt == "submit") {
      document.getElementById("btn-submit2").style.display = "none";
      document.getElementById("btn-submit-loading2").style.display = "block";
    }
  }
}