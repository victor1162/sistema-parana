document.getElementById("eleChassi").addEventListener("click", function () {
  document.getElementById("eleChassi").classList.toggle("btn-duchaSimples");
  if (document.getElementById("chassi").value == "Não") {
    document.getElementById("chassi").value = "Sim";
  } else {
    document.getElementById("chassi").value = "Não";
  }
});

document.getElementById("motorCima").addEventListener("click", function () {
  document.getElementById("motorCima").classList.toggle("btn-duchaSimples");
  if (document.getElementById("motor-cima").value == "Não") {
    document.getElementById("motor-cima").value = "Sim";
  } else {
    document.getElementById("motor-cima").value = "Não";
  }
});

document.getElementById("motorBaixo").addEventListener("click", function () {
  document.getElementById("motorBaixo").classList.toggle("btn-duchaSimples");
  if (document.getElementById("motor-baixo").value == "Não") {
    document.getElementById("motor-baixo").value = "Sim";
  } else {
    document.getElementById("motor-baixo").value = "Não";
  }
});

document
  .getElementById("motorCompletoChassi")
  .addEventListener("click", function () {
    document
      .getElementById("motorCompletoChassi")
      .classList.toggle("btn-duchaSimples");
    if (document.getElementById("motor-completo-chassi").value == "Não") {
      document.getElementById("motor-completo-chassi").value = "Sim";
    } else {
      document.getElementById("motor-completo-chassi").value = "Não";
    }
  });

document
  .getElementById("eleDuchaSimples")
  .addEventListener("click", function () {
    document
      .getElementById("eleDuchaSimples")
      .classList.toggle("btn-duchaSimples");
    if (document.getElementById("ducha").value == "Não") {
      document.getElementById("ducha").value = "Sim";
    } else {
      document.getElementById("ducha").value = "Não";
    }
  });

document
  .getElementById("eleDuchaSecagem")
  .addEventListener("click", function () {
    document
      .getElementById("eleDuchaSecagem")
      .classList.toggle("btn-duchaSimples");
    if (document.getElementById("ducha-secagem").value == "Não") {
      document.getElementById("ducha-secagem").value = "Sim";
    } else {
      document.getElementById("ducha-secagem").value = "Não";
    }
  });

document
  .getElementById("eleDuchaAcabExter")
  .addEventListener("click", function () {
    document
      .getElementById("eleDuchaAcabExter")
      .classList.toggle("btn-duchaSimples");
    if (document.getElementById("ducha-acab-exter").value == "Não") {
      document.getElementById("ducha-acab-exter").value = "Sim";
    } else {
      document.getElementById("ducha-acab-exter").value = "Não";
    }
  });

document
  .getElementById("eleLavagemSimples")
  .addEventListener("click", function () {
    document
      .getElementById("eleLavagemSimples")
      .classList.toggle("btn-duchaSimples");
    if (document.getElementById("lavagem-simples").value == "Não") {
      document.getElementById("lavagem-simples").value = "Sim";
    } else {
      document.getElementById("lavagem-simples").value = "Não";
    }
  });

document
  .getElementById("eleLavagemCera")
  .addEventListener("click", function () {
    document
      .getElementById("eleLavagemCera")
      .classList.toggle("btn-duchaSimples");
    if (document.getElementById("lavagem-cera").value == "Não") {
      document.getElementById("lavagem-cera").value = "Sim";
    } else {
      document.getElementById("lavagem-cera").value = "Não";
    }
  });

document
  .getElementById("eleLavagemResina")
  .addEventListener("click", function () {
    document
      .getElementById("eleLavagemResina")
      .classList.toggle("btn-duchaSimples");
    if (document.getElementById("lavagem-resina").value == "Não") {
      document.getElementById("lavagem-resina").value = "Sim";
    } else {
      document.getElementById("lavagem-resina").value = "Não";
    }
  });

document
  .getElementById("eleLavagemCeraResina")
  .addEventListener("click", function () {
    document
      .getElementById("eleLavagemCeraResina")
      .classList.toggle("btn-duchaSimples");
    if (document.getElementById("lavagem-cera-resina").value == "Não") {
      document.getElementById("lavagem-cera-resina").value = "Sim";
    } else {
      document.getElementById("lavagem-cera-resina").value = "Não";
    }
  });


