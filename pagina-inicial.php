<?php
session_start();
if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM'){
  header('Location: index.php?login=erro2');
}

$acao = 'ultimosAdicionados';
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

    <!-- medias -->
    <link rel="stylesheet" href="media/index-media.css">
    <link rel="stylesheet" href="media/pagina-inicial-media.css">


    <!-- normalize -->
    <link rel="stylesheet" href="css/normalize.css">

    <!-- scripts -->
    <script src="js/script.js"></script>
    <script src="js/pagina-inicial.js"></script>
    <script src="js/imprimir.js"></script>
    <script defer src="js/eventos-form-selecionar.js"></script>
    <script defer src="js/mascara-inputs.js"></script>
     

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
    <section id="area-adicionar">

      <!-- action sendo criado dentro do arquivo JS pagina-inicial.js validando antes de ser criada a action -->
      <form method="post" id="area-formulario-add">
        
        <div id="servico-opcionais">
          <span onclick="servicosOpcionais()">Serviços opcionais</span>
          <span id="btn-fechar-opcionais" style="display: none;" onclick="fecharLavagemOpcionais()">&times;</span>
        </div>
        <!-- Entrada de veiculos -->
        <input type="hidden" value="COMUM" name="lavagem_comum" id="comum">
        <div id="area-entrada-veiculo">
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
            <button type="button" onclick="consultarInputs()"  id="btn-submit">salvar</button>
            <button type="button" style="display: none;" id="btn-submit-loading"><img src="img/carregando.gif" alt="loading..." width="25px" height="25px"></button>
          </div>
        </div>

        <!-- Serviços Opcionais de veiculos -->
        <input type="hidden" value="ESPECIAIS" name="lavagem_especiais" id="opc-especiais" disabled="disabled">
        <div id="opc-area-servicos-opcionais" >
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
            <button type="button" class="btn-submit2" onclick="consultarInputsEspeciais()">salvar</button>
            <button type="button" style="display: none;" id="btn-submit-loading2"><img src="img/carregando.gif" alt="loading..." width="25px" height="25px"></button>
          </div>

        </div>
      </form>
    </section>

    <section id="area-ultimos-adicionados">
      <h3>Ultimos adicionados</h3>
      <div id="area-table">
        <table>
          <tr class="titulo-td">
            <td>PLACA</td>
            <td>MODELO</td>
            <td>COR</td>
            <td>LAVAGEM</td>
            <td>VALOR</td>
          </tr>
          <?php foreach ($ultimoAdd as $key => $ultimosAdd){
            
          ?>
          <tr class="conteudo-td">
            <td class="media-placa"><?= $ultimosAdd['placa'] ?></td>
            <td class="media-Modelo"><?= $ultimosAdd['modelo'] ?></td>
            <td class="media-cor"><?= $ultimosAdd['cor_veiculo'] ?></td>

              <?php if($ultimosAdd['cera'] == 'CERA' && $ultimosAdd['resina'] == 'RESINA'){?>
                <td class="media-tipo"><?= $ultimosAdd['cera'] ?> / <?= $ultimosAdd['resina'] ?></td>

              <?php }else if($ultimosAdd['cera'] == 'CERA'){ ?>

                <td class="media-tipo"><?= $ultimosAdd['cera'] ?></td>
              <?php }else { ?>

                <td class="media-tipo"><?= $ultimosAdd['resina'] ?></td>
              <?php } ?>

            <td class="media-valor">R$ <?= $ultimosAdd['valor'] ?></td>
            <td class="media-imprimir" onclick="imprimir()"><i class="bi bi-printer"></i></td>
            <td class="media-saida"></td>
          </tr>
          <?php } ?>

        </table>
      </div>
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