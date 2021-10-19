<?php
session_start();
if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM'){
  header('Location: index.php?login=erro2');
}

$acao = 'veiculosEmpresas';
require 'veiculo-controller.php';

?>

<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- folha de estilo -->
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/pagina-inicial.css">
    <link rel="stylesheet" href="css/historico.css">
    <link rel="stylesheet" href="css/veiculo-empresa.css">

    <!-- medias -->
    <link rel="stylesheet" href="media/index-media.css">
    <link rel="stylesheet" href="media/pagina-inicial-media.css">


    <!-- normalize -->
    <link rel="stylesheet" href="css/normalize.css">

    <!-- scripts -->
    <script src="js/script.js"></script>
    <script src="js/pagina-inicial.js"></script>
    <script src="js/imprimir.js"></script>
    <script defer src="js/mascara-inputs.js"></script>
    <script defer src="js/eventos-form-selecionar.js"></script>
    <script defer src="js/veiculo-empresa.js"></script>
    

    <!-- jquery -->
    <script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>
    <script src="js/jquery.js"></script>

    <!-- icons Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!--[if lt IE 9]>
    <script src="https://cdn.es.gov.br/scripts/extensions/html5shiv/3.7.2/html5shiv.min.js"></script>
    <![endif]-->
    <title>sistema - Paraná</title>
  </head>
  <body >

  <div id="salve">
    <span>Salvo com sucesso!</span>
  </div>

  <!-- menu das paginas -->
  <?php
    include 'layouts/menu-paginas.php';
  ?>

  <div id="container" onclick="fecharNavbarSemFoco()">
    <section id="area-veiculos-empresas">
      <!-- action criada dinamicamente atraves do veiculo-empresa.js -->
        <form method="post" class="area-form-empresas-add"> 

            <div class="area-selecionar-empresa" >
                <h3>Selecione uma empresa</h3>

                <?php 
                  if($empresas != array()){

                  
                  foreach($empresas as $key => $empresa) { 
                    if($key >= 0){
                      $key += 1;
                    }
                ?>
                <div class="area-btn-empresa">
                    <span class="number-empresa"><?= $key ?></span>
                    <div class="item-empresa" onclick="abrirSelecionado('<?= $empresa['nome_empresa'] ?>', <?= $empresa['id_empresas'] ?>)">
                        <span><?= $empresa['nome_empresa'] ?></span>
                        <i class="bi bi-building"></i>
                        <input type="hidden" class="abrir-selecionado" value="1">
                        <input type="hidden" name="nome_empresa" value="<?= $empresa['nome_empresa'] ?>">
                    </div>
                </div>
                <?php }} else{ ?>
                  <div class="area-btn-empresa" style="background: white; font-size: .8em;">
                    <p>Não existe empresa cadastrada, para conseguir cadastrar <a href="cadastrar-empresa.php">clique aqui.</a></p>
                  </div>
                <?php } ?>

            </div>
        
        
        <div class="campo-adicionar-especiais">
          <span onclick="servicosOpcionais()">Serviços opcionais</span>
          <span id="btn-fechar-opcionais" style="display: none;" onclick="fecharLavagemOpcionais()">&times;</span>
        </div>

        <div class="nome-veiculo-empresa" style="display: none;">
            <span class="nome-selcionado"></span>
            <span class="btn-close-empresa">Voltar</span>
            <input type="hidden" value="" name="id_empresa" class="id_da_empresa">
            <input type="hidden" value="" name="nome_empresa" class="nome_da_empresa">
        </div>
        <!-- Entrada de veiculos -->
        <input type="hidden" value="COMUM" name="lavagem_comum" id="comum" class="add-remover-campo">
        <div id="area-entrada-veiculo" style="display: none;">
          <div class="form-placa-modelo">
            <div class="item-form-plac-cor">
              <span id="notPlaca" style="display: none; color: red;"><i class="bi bi-exclamation-circle"></i></span>
              <label for="">PLACA</label>
                <div class="add-input-icon">
                  <input type="text" name="placa" placeholder="Ex: ETX-8785" maxlength="8"  onkeyup="placaREP(this.value)" value="" id="placaREP1">
                  <div class="area-icon-placa">
                    <span><i class="bi bi-pen"></i></span>
                  </div>
                </div>
            </div>
            
            <div class="item-form-plac-cor">
              <span id="notModelo" style="display: none; color: red;"><i class="bi bi-exclamation-circle"></i></span>
              <label for="">MODELO</label>
              <div class="add-input-icon">
                  <input type="text" name="modelo" placeholder="Ex: Corola" id="inputModelo" onkeyup="modeloREP(this.value)">
                  <div class="area-icon-placa">
                    <span><i class="bi bi-safe2"></i></span>
                  </div>
              </div>
            </div>
          </div>

          <div class="item-form">
            <label for="">COR</label>
            <span id="notCor" style="display: none; color: red;"><i class="bi bi-exclamation-circle"></i></span>
            <div class="input-icon">
              <input type="text" name="cor_veiculo" placeholder="Ex: Prata" id="inputCor" onkeyup="corREP(this.value)">
              <div class="area-icon icon-cor-valor">
                <span><i class="bi bi-palette"></i></span>
              </div>
            </div>
          </div>

          <div class="area-cera-resina">
            <div class="item-cera-resina">
            <span onclick="tipoCera(false, 0)" class="idcera idceras">Cera</span>
            <input type="hidden" name="cera" value="SIMPLES"  class="cera">

            <span onclick="tipoResina(false, 0)" class="idresina idresinas">Resina</span>
            <input type="hidden" name="resina" value="SIMPLES" class="resina">
            </div>
          </div>
          <div class="item-form">
            <label for="">VALOR</label>
            <span id="notValor" style="display: none; color: red;"><i class="bi bi-exclamation-circle"></i></span>
            <div class="input-icon">
              <input type="text" name="valor" placeholder="Ex: R$ 35,00" onkeyup="valorREP(this.value)" id="inputValor">
              <div class="area-icon icon-cor-valor">
                <span><i class="bi bi-currency-dollar"></i></span>
              </div>
            </div>
          </div>

          <div class="item-form">
            <button type="button" onclick="consultarInputsEmpresa()"  id="btn-submit">salvar</button>
            <button type="button" style="display: none;" id="btn-submit-loading"><img src="img/carregando.gif" alt="loading..." width="25px" height="25px"></button>
          </div>
        </div>
         <!-- Serviços Opcionais de veiculos -->
        <input type="hidden" value="ESPECIAIS" name="lavagem_especiais" id="opc-especiais" disabled="disabled" class="add-remover-campo">
        <div id="opc-area-servicos-opcionais" class="add-remover-campo">
          <div class="form-placa-modelo">
            <div class="item-form-plac-cor">
            <span id="notEspPlaca" style="display: none; color: red;"><i class="bi bi-exclamation-circle"></i></span>
              <label for="">PLACA</label>
                <div class="add-input-icon">
                  <input type="text" name="placa" placeholder="Ex: ETX-8785" maxlength="8" onkeyup="placaREP(this.value)" value="" disabled="disabled" id="opc-placaREP1" class="opc-placaREP1">
                  <div class="area-icon-placa">
                    <span><i class="bi bi-pen"></i></span>
                  </div>
                </div>
            </div>
            
            <div class="item-form-plac-cor">
            <span id="notEspModelo" style="display: none; color: red;"><i class="bi bi-exclamation-circle"></i></span>
              <label for="">MODELO</label>
              <div class="add-input-icon">
                  <input type="text" name="modelo" placeholder="Ex: Corola" disabled="disabled" class="opc-InputModelo" onkeyup="modeloREP(this.value)">
                  <div class="area-icon-placa">
                    <span><i class="bi bi-safe2"></i></span>
                  </div>
              </div>
            </div>
          </div>
          
          <div class="tiposDeLavagens">
              <div class="lavagem-especiais">
                <h3>Lavagem Especiais</h3>

                <div class="opc-tipos-opcionais" id="eleChassi">
                  <span>Chassi</span>
                  <i class="bi bi-check2"></i>
                  <input type="hidden" value="Não" name="chassi" disabled="disabled" id="chassi">
                </div>

                <div class="opc-tipos-opcionais" id="motorCima">
                  <span>Motor Parte de cima</span>
                  <i class="bi bi-check2"></i>
                  <input type="hidden" value="Não" name="motor-cima" disabled="disabled" id="motor-cima">
                </div>

                <div class="opc-tipos-opcionais" id="motorBaixo">
                  <span>Motor Parte de baixo</span>
                  <i class="bi bi-check2"></i>
                  <input type="hidden" value="Não" name="motor-baixo" disabled="disabled" id="motor-baixo">
                </div>

                <div class="opc-tipos-opcionais" id="motorCompletoChassi">
                  <span>Motor completo + Chassi</span>
                  <i class="bi bi-check2"></i>
                  <input type="hidden" value="Não" name="motor-completo-chassi" disabled="disabled" id="motor-completo-chassi">
                </div>
              </div>

              <div class="lavagem-adicionais">
                <h3>Lavagem Adicionais</h3>
                <div class="opc-tipos-opcionais" id="eleDuchaSimples">
                  <span>Ducha Simples</span>
                  <i class="bi bi-check2"></i>
                  <input type="hidden" value="Não" name="ducha" disabled="disabled" id="ducha">
                </div>

                <div class="opc-tipos-opcionais" id="eleDuchaSecagem">
                  <span>Ducha + Secagem + Pretinho</span>
                  <i class="bi bi-check2"></i>
                  <input type="hidden" value="Não" name="ducha-secagem" disabled="disabled" id="ducha-secagem">
                </div>

                <div class="opc-tipos-opcionais" id="eleDuchaAcabExter">
                  <span>Ducha + Acab. Exter.</span>
                  <i class="bi bi-check2"></i>
                  <input type="hidden" value="Não" name="ducha-acab-exter" disabled="disabled" id="ducha-acab-exter">
                </div>

                <div class="opc-tipos-opcionais" id="eleLavagemSimples">
                  <span>Lavagem Simples</span>
                  <i class="bi bi-check2"></i>
                  <input type="hidden" value="Não" name="lavagem-simples" disabled="disabled" id="lavagem-simples">
                </div>

                <div class="opc-tipos-opcionais" id="eleLavagemCera">
                  <span>Lavagem Cera</span>
                  <i class="bi bi-check2"></i>
                  <input type="hidden" value="Não" name="lavagem-cera" disabled="disabled" id="lavagem-cera">
                </div>

                <div class="opc-tipos-opcionais" id="eleLavagemResina">
                  <span>Lavagem Resina</span>
                  <i class="bi bi-check2"></i>
                  <input type="hidden" value="Não" name="lavagem-resina" disabled="disabled" id="lavagem-resina">
                </div>

                <div class="opc-tipos-opcionais" id="eleLavagemCeraResina">
                  <span>Lavagem cera + Resina</span>
                  <i class="bi bi-check2"></i>
                  <input type="hidden" value="Não" name="lavagem-cera-resina" disabled="disabled" id="lavagem-cera-resina">
                </div>
              </div>

              <div class="opc-valor-final total-pagar">
                <span>Total a pagar</span>

                <div class="area-total-pagar">
                <span id="notEspValor" style="display: none; color: red;"><i class="bi bi-exclamation-circle"></i></span>
                  <input type="text" name="valor" disabled="disabled" id="total-pagar" class="opc-inputValor" onkeyup="valorREP(this.value)">
                  <span><i class="bi bi-currency-dollar"></i></span>
                </div>
              </div>

          </div>

          <div class="item-form">
            <button type="button" class="btn-submit2" onclick="consultarInputsEmpresasEspeciais()">salvar</button>
            <button type="button" style="display: none;" id="btn-submit-loading2"><img src="img/carregando.gif" alt="loading..." width="25px" height="25px"></button>
          </div>

        </div>
        </form>
    </section>
    
  </div>

  

  </body>
  <script src="js/relogio-nav.js"></script>
  <script>
    let urlSalvo = window.location.href;
    let encontrado = urlSalvo.indexOf('salvo');

    if(encontrado > -1){
      document.getElementById('salve').style.display = 'flex';
      document.getElementById('salve').classList.add('sucesso-salvo');
    }

    
  </script>
</html>