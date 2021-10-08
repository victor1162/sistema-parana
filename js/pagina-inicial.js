// g -  global pega todas ocorrencias
// i -  checa tudo insensitive

// configurando botão cera resina das lavagens
function tipoCera(controle, id) {
  let test = document.querySelectorAll(".cera");

  if (
    !!controle
      ? test[id].value == "SIMPLES"
      : document.querySelector(".cera").value == "SIMPLES"
  ) {
    if (controle) {
      test[id].value = "CERA";
    } else {
      document.querySelector(".cera").value = "CERA";
    }
  } else {
    if (controle) {
      test[id].value = "SIMPLES";
    } else {
      document.querySelector(".cera").value = "SIMPLES";
    }
  }

  document.querySelectorAll(".idcera")[id].classList.toggle("idceras2");
}
function tipoResina(controle, id) {
  let test = document.querySelectorAll(".resina");

  if (
    !!controle
      ? test[id].value == "SIMPLES"
      : document.querySelector(".resina").value == "SIMPLES"
  ) {
    if (controle) {
      test[id].value = "RESINA";
    } else {
      document.querySelector(".resina").value = "RESINA";
    }
  } else {
    if (controle) {
      test[id].value = "SIMPLES";
    } else {
      document.querySelector(".resina").value = "SIMPLES";
    }
  }

  document.querySelectorAll(".idresina")[id].classList.toggle("idresina2");
}

//configurando caminho para paginas
function irPaginaAdicionar() {
  window.location.href = "pagina-inicial.php";
}

function placaREP(valor) {
  let valorUP = valor.toUpperCase();
  let subValor = valor.replace(valor, valorUP);

  let novoValor = subValor
    .replace(/([A-Za-z]{3})(\d)(\d)/g, "$1-$2$3")
    .replace(/([A-Za-z]{3})(\d)(\[A-Za-z])/, "$1$2$3");

  document.getElementById("placaREP1").value = novoValor;
  document.getElementById("opc-placaREP1").value = novoValor;

  document.getElementById("notPlaca").style.display = "none";
  document.getElementById("notEspPlaca").style.display = "none";
}

function modeloREP(valor) {
  document.getElementById("notModelo").style.display = "none";
  document.getElementById("notEspModelo").style.display = "none";
}

function corREP(valor) {
  document.getElementById("notCor").style.display = "none";
}
function valorREP(valor) {

  let valores = document.getElementById('inputValor').value;

  document.getElementById("notValor").style.display = "none";
  document.getElementById("notEspValor").style.display = "none";
}


function servicosOpcionais() {
  document.getElementById("btn-fechar-opcionais").style.display =
    "inline-block";
  document.getElementById("area-entrada-veiculo").style.display = "none";

  let inputLavagem = document.getElementById("comum");

  let inputPLaca = document.getElementById("placaREP1");
  let inputModelo = document.getElementById("inputModelo");
  let inputCor = document.getElementById("inputCor");

  let btnCera = document.querySelector(".cera"); //querySelector
  let btnResina = document.querySelector(".resina"); //querySelector

  let inputValor = document.getElementById("inputValor");

  // desabilitando inputs para não dar incompatibilidade com a nova entrada de valores em input
  inputLavagem.setAttribute("disabled", "disabled");
  inputPLaca.setAttribute("disabled", "disabled");
  inputModelo.setAttribute("disabled", "disabled");
  inputCor.setAttribute("disabled", "disabled");
  btnCera.setAttribute("disabled", "disabled");
  btnResina.setAttribute("disabled", "disabled");
  inputValor.setAttribute("disabled", "disabled");

  // habilitando inputs para nova entrada lavagem especiais
  document.getElementById("opc-area-servicos-opcionais").style.display =
    "block";

  let opcLavagem = document.getElementById("opc-especiais");
  let opcPlaca = document.getElementById("opc-placaREP1");
  let opcModelo = document.querySelector(".opc-InputModelo"); //querySelector
  let opcChassi = document.getElementById("chassi");
  let opcMotorCima = document.getElementById("motor-cima");
  let opcMotorBaixo = document.getElementById("motor-baixo");
  let opcMotorCompletoChassi = document.getElementById("motor-completo-chassi");

  opcLavagem.removeAttribute("disabled");
  opcPlaca.removeAttribute("disabled");
  opcModelo.removeAttribute("disabled");
  opcChassi.removeAttribute("disabled");
  opcMotorCima.removeAttribute("disabled");
  opcMotorBaixo.removeAttribute("disabled");
  opcMotorCompletoChassi.removeAttribute("disabled");

  // habilitando inputs para nova entrada lavagem adicionais
  let opcDucha = document.getElementById("ducha");
  let opcDuchaSecagem = document.getElementById("ducha-secagem");
  let opcDuchaAcabExter = document.getElementById("ducha-acab-exter");
  let opcLavagemSimples = document.getElementById("lavagem-simples");
  let opcLavagemCera = document.getElementById("lavagem-cera");
  let opcLavagemResina = document.getElementById("lavagem-resina");
  let opcLavagemCeraResina = document.getElementById("lavagem-cera-resina");
  let totalPagar = document.getElementById("total-pagar");

  opcDucha.removeAttribute("disabled");
  opcDuchaSecagem.removeAttribute("disabled");
  opcDuchaAcabExter.removeAttribute("disabled");
  opcLavagemSimples.removeAttribute("disabled");
  opcLavagemCera.removeAttribute("disabled");
  opcLavagemResina.removeAttribute("disabled");
  opcLavagemCeraResina.removeAttribute("disabled");
  totalPagar.removeAttribute("disabled");

  // modificando atributo action do form
  document
    .getElementById("area-formulario-add")
    .setAttribute("action", "veiculo-controller.php?acao=opcionais");
}

function fecharLavagemOpcionais() {
  document.getElementById("btn-fechar-opcionais").style.display = "none";
  document.getElementById("area-entrada-veiculo").style.display = "block";

  let inputLavagem = document.getElementById("comum");

  let inputPLaca = document.getElementById("placaREP1");
  let inputModelo = document.getElementById("inputModelo");
  let inputCor = document.getElementById("inputCor");

  let btnCera = document.querySelector(".cera"); //querySelector
  let btnResina = document.querySelector(".resina"); //querySelector

  let inputValor = document.getElementById("inputValor");

  // desabilitando inputs para não dar incompatibilidade com a nova entrada de valores em input
  inputLavagem.removeAttribute("disabled", "disabled");
  inputPLaca.removeAttribute("disabled", "disabled");
  inputModelo.removeAttribute("disabled", "disabled");
  inputCor.removeAttribute("disabled", "disabled");
  btnCera.removeAttribute("disabled", "disabled");
  btnResina.removeAttribute("disabled", "disabled");
  inputValor.removeAttribute("disabled", "disabled");

  // habilitando inputs para nova entrada lavagem especiais
  document.getElementById("opc-area-servicos-opcionais").style.display = "none";

  let opcLavagem = document.getElementById("opc-especiais");
  let opcPlaca = document.getElementById("opc-placaREP1");
  let opcModelo = document.querySelector(".opc-InputModelo"); //querySelector
  let opcChassi = document.getElementById("chassi");
  let opcMotorCima = document.getElementById("motor-cima");
  let opcMotorBaixo = document.getElementById("motor-baixo");
  let opcMotorCompletoChassi = document.getElementById("motor-completo-chassi");

  opcLavagem.setAttribute("disabled", "disabled");
  opcPlaca.setAttribute("disabled", "disabled");
  opcModelo.setAttribute("disabled", "disabled");
  opcChassi.setAttribute("disabled", "disabled");
  opcMotorCima.setAttribute("disabled", "disabled");
  opcMotorBaixo.setAttribute("disabled", "disabled");
  opcMotorCompletoChassi.setAttribute("disabled", "disabled");

  // habilitando inputs para nova entrada lavagem adicionais
  let opcDucha = document.getElementById("ducha");
  let opcDuchaSecagem = document.getElementById("ducha-secagem");
  let opcDuchaAcabExter = document.getElementById("ducha-acab-exter");
  let opcLavagemSimples = document.getElementById("lavagem-simples");
  let opcLavagemCera = document.getElementById("lavagem-cera");
  let opcLavagemResina = document.getElementById("lavagem-resina");
  let opcLavagemCeraResina = document.getElementById("lavagem-cera-resina");
  let totalPagar = document.getElementById("total-pagar");

  opcDucha.setAttribute("disabled", "disabled");
  opcDuchaSecagem.setAttribute("disabled", "disabled");
  opcDuchaAcabExter.setAttribute("disabled", "disabled");
  opcLavagemSimples.setAttribute("disabled", "disabled");
  opcLavagemCera.setAttribute("disabled", "disabled");
  opcLavagemResina.setAttribute("disabled", "disabled");
  opcLavagemCeraResina.setAttribute("disabled", "disabled");
  totalPagar.setAttribute("disabled", "disabled");

  // modificando atributo action do form
  document
    .getElementById("area-formulario-add")
    .setAttribute("action", "veiculo-controller.php?acao=adicionar");
}

// verificar se inputs esta vazio ou cheio

function consultarInputs() {
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
    document
      .getElementById("area-formulario-add")
      .setAttribute("action", "veiculo-controller.php?acao=adicionar");
    document.getElementById("btn-submit").setAttribute("type", "submit");

    let existeAtt = document.getElementById("btn-submit").getAttribute("type");

    if (existeAtt == "submit") {
      document.getElementById("btn-submit").style.display = "none";
      document.getElementById("btn-submit-loading").style.display = "block";
    }
  }
}

function consultarInputsEspeciais() {
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
      .getElementById("area-formulario-add")
      .setAttribute("action", "veiculo-controller.php?acao=opcionais");
    document.querySelector(".btn-submit2").setAttribute("type", "submit");

    let existeAtt = document.getElementById("btn-submit").getAttribute("type");

    if (existeAtt == "submit") {
      document.getElementById("btn-submit2").style.display = "none";
      document.getElementById("btn-submit-loading2").style.display = "block";
    }
  }
}
