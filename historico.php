<?php
session_start();
if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM'){
  header('Location: index.php?login=erro2');
}
$acao = 'historicoGeral';
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
    <link rel="stylesheet" href="css/recem-adicionados.css">

    <!-- medias -->
    <link rel="stylesheet" href="media/index-media.css">
    <link rel="stylesheet" href="media/pagina-inicial-media.css">
    <link rel="stylesheet" href="media/historico-media.css">
    <link rel="stylesheet" href="media/recem-adicionados.css">


    <!-- normalize -->
    <link rel="stylesheet" href="css/normalize.css">

    <!-- scripts -->
    <script src="js/script.js"></script>
    <script src="js/pagina-inicial.js"></script>
    <script defer src="js/historico.js"></script>

    
    <!-- jquery -->
    <script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>
    <script src="js/jquery.js"></script>

    <!-- icons Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!--[if lt IE 9]>
    <script src="https://cdn.es.gov.br/scripts/extensions/html5shiv/3.7.2/html5shiv.min.js"></script>
    <![endif]-->
    
    <title>sistema - Paraná</title>
  </head>
  <body id="boty-pag">

  <?php
    include 'layouts/menu-paginas.php';
  ?>

  <div id="container" onclick="fecharNavbarSemFoco()">
    <section id="area-historico">
      <div class="area-pesquisa">

        <form method="post" action="historico.php?acao=filtrarHistorico">
           <!-- btn info -->
          <div class="btn-buscar-data btn-info-buscar" style="margin-right: 1px;" onclick="abrirModalInfo()">
            <i class="bi bi-info-square"></i>
          </div>

          <input type="text" name="data" id="pesquisar-data" maxlength="10" onkeypress="mascaraData( this, event )" placeholder="01/01/2021"/>

          <div class="btn-buscar-data">
            <button type="submit" ><i class="bi bi-search"></i></button>
          </div>
        </form>

        <div class="btn-ir-especiais" >
          <a href="#final-do-veiculos">Lavagem Especiais</a>
        </div>

      </div>
  
      <!-- modal info -->
      <div id="area-modal-info">
        <section class="body-modal-info">
          <div class="btn-remover-modal-info">
            <span onclick="removerModalInfo()">&#10005;</span>
          </div>
          <p>Coloque a dada da seguinte forma ex: 01/01/2021.</p>
        </section>
      </div>
      
      <section id="area-ultimos-adicionados">
        
        <h3>Historico por data</h3>
        <div id="area-table">
          <table>
            <tr class="titulo-td">
              <td>PLACA</td>
              <td>MODELO</td>
              <td>COR</td>
              <td>LAVAGEM</td>
              <td>VALOR</td>
              <td>DATA</td>
            </tr>
            <?php foreach($historicoGeralComum as $key => $historicoComum) { ?>
            <tr class="conteudo-td">
              <td class="media-placa"><?= $historicoComum['placa'] ?></td>
              <td class="media-Modelo"><?= $historicoComum['modelo'] ?></td>
              <td class="media-cor"><?= $historicoComum['cor_veiculo'] ?></td>

              <?php if($historicoComum['cera'] == 'CERA' && $historicoComum['resina'] == 'RESINA'){?>
                <td class="media-recem-tipo"><?= $historicoComum['cera'] ?> / <?= $historicoComum['resina'] ?></td>

                <?php }else if($historicoComum['cera'] == 'CERA'){ ?>

                  <td class="media-recem-tipo"><?= $historicoComum['cera'] ?></td>
                <?php }else { ?>

                  <td class="media-recem-tipo"><?= $historicoComum['resina'] ?></td>
              <?php } ?>

              <td class="media-valor">R$ <?= $historicoComum['valor'] ?></td>
              <td class="media-data"><?= $historicoComum['data_lavagem'] ?></td>
              <td class="media-saida"></td>
            </tr>
            <?php } ?>
          </table>
        </div>
        
        <div id="final-do-veiculos"></div>
      </section>
    </section>

    <section id="historicoEspeciais" style="margin-bottom: 60px;">
      <h3>Lavagem especiais recentes</h3>
        <div class='flex-item-especiais-modal' >
          <?php foreach($hitoricoGeral as $key => $hitorico) { ?>
          <div class="area-item-especiais">

            <div class="item-especiais">
              <div class="coluna-especiais-1">
                  <span>Placa</span>
                  <span>Modelo</span>
                  <span>Data</span>
              </div>
              <div class="coluna-especiais-2">
                  <span><?= $hitorico['placa'] ?></span>
                  <span><?= $hitorico['modelo'] ?></span>
                  <span style="color: black; font-weight: bold;"><?= $hitorico['data_lavagem'] ?></span>
              </div>
            </div>

            <div class="area-valor-info">
              <span class="valor-especiais">R$ <?= $hitorico['valor'] ?></span>

              <input type="hidden" class="valueModalOp" value="<?= $hitorico['id'] ?>">
            </div>
          </div>
            <?php } ?>
        </div>
        
    </section>
  </div>
      
  <footer id="rodape-historico">
      <div class="btn-info-historico">
        <span class="btn-abrir">Informações <i class="bi bi-caret-up-fill" id="icone-info"></i></span>
      </div>

      <div class="total-lavado-historico">
        
        <div class="item-valor">
          <span class="text-valor">Total veiculos <i class="fas fa-car"></i></span>

          <div class="campo-valor">
            <span class="valor-valor">
              <?php
              if(isset($totalVeiculosHistorico)){
                echo $totalVeiculosHistorico;
              }else{
                echo $totalVeiculosFiltro;
              }
              
              ?>
            </span>
          </div>
        </div>

        <div class="item-valor">
          <span class="text-valor">Faturado <i class="bi bi-currency-dollar"></i></span>

          <div class="campo-valor">
            <span class="valor-valor">
              <?php
                if($valorTotalDoHistorico != 0){
                  echo $valorTotalDoHistorico;
                }else{
                  echo $totalFiltroValor;
                }
              ?>,00
            </span>
          </div>
        </div>

        <div class="item-valor">
          <span class="text-valor">media <i class="bi bi-graph-up"></i></span>

          <div class="campo-valor">
            <span class="valor-valor">0</span>
          </div>
        </div>
        
      </div>
  </footer>
  
  <div data-scroll="suave" class="voltar-topo">
      <a href="#boty-pag" onclick="scrollTop()">
        <i class="bi bi-arrow-up-square-fill"></i>
      </a>
  </div>

  </body>
  
  <!-- adicionado atributo defer para carregamento antes que a pagina -->
  <script defer src="js/relogio-nav.js"></script>
</html>