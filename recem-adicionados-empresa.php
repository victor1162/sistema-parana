<?php
session_start();
if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM'){
  header('Location: index.php?login=erro2');
}
$acao = 'recemAdicionadosEmpresa';
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
    <link rel="stylesheet" href="css/recem-adicionados.css">
    <link rel="stylesheet" href="css/historico.css">

    <!-- medias -->
    <link rel="stylesheet" href="media/index-media.css">
    <link rel="stylesheet" href="media/pagina-inicial-media.css">
    <link rel="stylesheet" href="media/recem-adicionados.css">
    <link rel="stylesheet" href="media/historico-media.css">


    <!-- normalize -->
    <link rel="stylesheet" href="css/normalize.css">

    <!-- scripts -->
    <script src="js/script.js"></script>
    <script src="js/pagina-inicial.js"></script>
    <script src="js/recem-adicionados.js"></script>
    <script defer src="js/mascara-inputs.js"></script>

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
  <body >

  <?php
    include 'layouts/menu-paginas.php';
  ?>

  <div id="container" onclick="fecharNavbarSemFoco()">

    <div class="mudar-lavagem-especiais">
      <span class="btn-mudar-lavagem" onclick="abrirComumOp()">comum empresa</span>
      <span class="btn-mudar-lavagem" onclick="abrirEspeciaisOp()">especiais empresa</span>
    </div>
    <!-- lavagem COMUM -->
    <section id="area-recem-adicionados">
        <h3>Recem adicionados - <span style="font-weight: 900;">empresas</span></h3>
          <div id="area-table-recem-adicionados">
            <table>

              <tr class="titulo-td-recem-adicionados">
                <td>EMPRESA</td>
                <td>PLACA</td>
                <td>MODELO</td>
                <td>COR</td>
                <td>LAVAGEM</td>
                <td>VALOR</td>
                <td>HORARIO</td>
                <td></td>
                <td></td>
              </tr>

              <?php foreach ($recuperarVeiculoEmpresa as $key => $recemDoDia) { ?>
              <tr class="conteudo-td-recem-adicionados">
                <td class="media-recem-empresa"><?= $recemDoDia['nome_empresa'] ?></td>
                <td class="media-recem-placa"><?= $recemDoDia['placa'] ?></td>
                <td class="media-recem-Modelo"><?= $recemDoDia['modelo'] ?></td>
                <td class="media-recem-cor"><?= $recemDoDia['cor_veiculo'] ?></td>

                <?php if($recemDoDia['cera'] == 'CERA' && $recemDoDia['resina'] == 'RESINA'){?>
                <td class="media-recem-tipo"><?= $recemDoDia['cera'] ?> / <?= $recemDoDia['resina'] ?></td>

                <?php }else if($recemDoDia['cera'] == 'CERA'){ ?>

                  <td class="media-recem-tipo"><?= $recemDoDia['cera'] ?></td>
                <?php }else { ?>

                  <td class="media-recem-tipo"><?= $recemDoDia['resina'] ?></td>
                <?php } ?>

                <td class="media-recem-valor">R$ <?= $recemDoDia['valor'] ?></td>
                <td class="media-recem-data"><?= $recemDoDia['hora_lavagem'] ?> - <?= $recemDoDia['data_lavagem'] ?></td>

                <td>
                  <div class="btn-editar">
                    <span onclick="abrirModal('abrir', '<?= $recemDoDia['id_veiculo_empresa'] ?>')"><i class="bi bi-pencil-square"></i></span>
                  </div>
                </td> 

                <td>
                  <div class="btn-exluir">
                    <span onclick="removerVeiculoEmpresa('remover', <?= $recemDoDia['id_veiculo_empresa'] ?>)"><i class="bi bi-trash"></i></span>
                  </div>
                </td>
              </tr>

              <tr class="rodape-tabela-recem-add">
                <td>
                  <!-- esse input ajusta com o botão editar para abrir modal -->
                  <input type="hidden" value="<?= $recemDoDia['id_veiculo_empresa'] ?>" class="value-modal">
                </td>
              </tr>

                <!-- area do modal -->
              <div class="area-modal-edita id-<?= $recemDoDia['id_veiculo_empresa'] ?>">

                <div class="modal-edita">
                    <h3>Editar</h3>
                    <form method="post" action="veiculo-controller.php?acao=atualizarVeiculoEmpresa" class="form-edit">
                      <input type="hidden" name="id" value="<?= $recemDoDia['id_veiculo_empresa'] ?>">
                      <div class="form-input-edit">
                        <label for="">PLACA</label>
                        <div class="input-icon-edit">
                          <input type="text" name="placa" value="<?= $recemDoDia['placa'] ?>" class="input-value-text">
                          <span><i class="bi bi-pen"></i></span>
                        </div>
                      </div>

                      <div class="form-input-edit">
                        <label for="">MODELO</label>
                        <div class="input-icon-edit">
                          <input type="text" name="modelo" value="<?= $recemDoDia['modelo'] ?>" class="input-value-text">
                          <span><i class="bi bi-safe2"></i></span>
                        </div>
                      </div>

                      <div class="form-input-edit">
                        <label for="">COR</label>
                        <div class="input-icon-edit">
                          <input type="text"  name="cor_veiculo"  value="<?= $recemDoDia['cor_veiculo'] ?>" class="input-value-text">
                          <span><i class="bi bi-palette"></i></span>
                        </div>
                      </div>
                      
                      <div class="tipo-lavagem-edit">
                        <div class="area-cera-resina">
                          <div class="item-cera-resina">
                            <span onclick="tipoCera(true, <?= $key ?>)" class="idcera idceras">Cera</span>
                            <input type="hidden" name="cera" value="SIMPLES"  class="cera">

                            <span onclick="tipoResina(true, <?= $key ?>)" class="idresina idresinas">Resina</span>
                            <input type="hidden" name="resina" value="SIMPLES" class="resina">
                          </div>
                        </div>
                      </div>

                      <div class="form-input-edit">
                        <label for="">VALOR</label>
                        <div class="input-icon-edit">
                          <input type="text" name="valor" value="<?= $recemDoDia['valor'] ?>" class="input-value-text">
                          <span><i class="bi bi-currency-dollar"></i></span>
                        </div>
                      </div>
                      
                      <div class="area-salvar">
                        <div class="salvar-nao-salvar">
                          <input type="button" value="fechar" onclick="fecharModal('fechar', <?= $recemDoDia['id_veiculo_empresa'] ?>)">
                          <button type="submit">Salvar</button>
                        </div>
                      </div>

                    </form>
                </div>
              </div>
              
              <?php } ?>

            </table>
          </div>

          <div class="area-navegação">
            <nav>
              <ul class="paginação-ul">
                  <?php for($i = 1; $i <= $total_de_paginas; $i++) { ?>
                      <li class="paginação-li">
                        <a class="paginação-link" style="<?= $pagina_ativa == $i ? 'background: rgb(0, 162, 255); color: white;' : '' ?>" href="?pagina=<?= $i ?>">
                          <?= $i ?>
                        </a>
                      </li>
                  <?php } ?>
              </ul>
            </nav>
          </div>

    </section>

    <!-- lavagem especial -->
    <section id="area-recem-adicionados-especiais">
      <h3>Lavagem especiais recentes - <span style="font-weight: 900;">empresas</span></h3>
      
      <div class='flex-item-especiais-modal' >
      <!-- itens dinamicos especiais -->
      <?php foreach ($recVeicEmpOpcionais as $key => $opcionaisDoDia){ ?>
      <div class="area-item-especiais">

        <i class="bi bi-trash remover-item-especial" onclick="removerEspeciais('remover', <?= $opcionaisDoDia['id_veiculo_empresa_opcionais'] ?>)"></i>

        <div class="item-especiais">
          <div class="coluna-especiais-1">
              <span>Empresa</span>
              <span>Placa</span>
              <span>Modelo</span>
              <span>Data</span>
          </div>
          <div class="coluna-especiais-2">
              <span><?= $opcionaisDoDia['nome_empresa'] ?></span>
              <span><?= $opcionaisDoDia['placa'] ?></span>
              <span><?= $opcionaisDoDia['modelo'] ?></span>
              <span style="color: black;"><?= $opcionaisDoDia['data_lavagem'] ?></span>
          </div>
        </div>

        <div class="area-valor-info">
          <span class="valor-especiais">R$ <?= $opcionaisDoDia['valor'] ?></span>

          <span class="info-especiais" onclick="abrirEspeciais('abrir', <?= $opcionaisDoDia['id_veiculo_empresa_opcionais'] ?>)"><i class="bi bi-info-square"></i></span>
          <input type="hidden" class="valueModalOp" value="<?= $opcionaisDoDia['id_veiculo_empresa_opcionais'] ?>">
        </div>
      </div>
      

      <!-- modal dinamica itens especiais -->
      <div class="area-modal-especiais idOp-<?= $opcionaisDoDia['id_veiculo_empresa_opcionais'] ?>">
       
        <div class="body-modal-especiais">
            <h3>Informações da lavagem</h3>

            <div class="area-das-tabelas-especiais" >
              <table class="tabela-info-veicular" width="100%">
                <tr>
                  <td class="tipo-veiculo">Placa</td>
                  <td class="tipo-veiculo-info"><?= $opcionaisDoDia['placa'] ?></td>
                </tr>
                <tr>
                  <td class="tipo-veiculo">Modelo</td>
                  <td class="tipo-veiculo-info"><?= $opcionaisDoDia['modelo'] ?></td>
                </tr>
                <tr>
                  <td class="tipo-veiculo">Hora De Entrada</td>
                  <td class="tipo-veiculo-info"><?= $opcionaisDoDia['hora_lavagem'] ?></td>
                </tr>
                <tr>
                  <td class="tipo-veiculo">Data De Entrada</td>
                  <td class="tipo-veiculo-info"><?= $opcionaisDoDia['data_lavagem'] ?></td>
                </tr>
              </table>



              <table class="tabela-info-especiais" width="100%">
                <tr>
                  <td class="name-lagem-especial">Chassi</td>
                  <td class="status-lavagem-especial"><?= $opcionaisDoDia['chassi'] ?></td>
                </tr>
                <tr>
                  <td class="name-lagem-especial">Motor Baixo</td>
                  <td class="status-lavagem-especial"><?= $opcionaisDoDia['motor_baixo'] ?></td>
                </tr>
                <tr>
                  <td class="name-lagem-especial">Motor Cima</td>
                  <td class="status-lavagem-especial"><?= $opcionaisDoDia['motor_cima'] ?></td>
                </tr>
                <tr>
                  <td class="name-lagem-especial">Motor Completo + chassi</td>
                  <td class="status-lavagem-especial"><?= $opcionaisDoDia['motor_completo_chassi'] ?></td>
                </tr>
                <tr>
                  <td class="name-lagem-especial">Ducha</td>
                  <td class="status-lavagem-especial"><?= $opcionaisDoDia['ducha'] ?></td>
                </tr>
                <tr>
                  <td class="name-lagem-especial">Ducha + Secagem e Pretinho</td>
                  <td class="status-lavagem-especial"><?= $opcionaisDoDia['ducha_secagem'] ?></td>
                </tr>
                <tr>
                  <td class="name-lagem-especial">Ducha + Acabamento externo</td>
                  <td class="status-lavagem-especial"><?= $opcionaisDoDia['ducha_acab_exter'] ?></td>
                </tr>
                <tr>
                  <td class="name-lagem-especial">Lavagem Simples</td>
                  <td class="status-lavagem-especial"><?= $opcionaisDoDia['lavagem_simples'] ?></td>
                </tr>
                <tr>
                  <td class="name-lagem-especial">Lavagem Cera</td>
                  <td class="status-lavagem-especial"><?= $opcionaisDoDia['lavagem_cera'] ?></td>
                </tr>
                <tr>
                  <td class="name-lagem-especial">Lavagem Resina</td>
                  <td class="status-lavagem-especial"><?= $opcionaisDoDia['lavagem_resina'] ?></td>
                </tr>
                <tr>
                  <td class="name-lagem-especial">Lavagem Cera + Resina</td>
                  <td class="status-lavagem-especial"><?= $opcionaisDoDia['lavagem_cera_resina'] ?></td>
                </tr>
                <tr>
                  <td class="name-lagem-especial">Valor Total</td>
                  <td class="status-lavagem-especial"><?= $opcionaisDoDia['valor'] ?></td>
                </tr>
              </table>

              <div class="area-btn-fechar-info" onclick="fecharModalEspeciais('fechar', <?= $opcionaisDoDia['id_veiculo_empresa_opcionais'] ?>)">
                <span class="btn-fechar-info" >FECHAR</span>
              </div>

            </div>
        </div>
      </div>
      
      <?php } ?>
      </div>

          <div class="area-navegação">
            <nav>
              <ul class="paginação-ul">
                  <?php for($i = 1; $i <= $total_de_paginas_opcionais; $i++) { ?>
                      <li class="paginação-li">
                        <a class="paginação-link" style="<?= $pagina_ativa_opcionais == $i ? 'background: rgb(0, 162, 255); color: white;' : '' ?>" href="?pagina_opcionais=<?= $i ?>">
                          <?= $i ?>
                        </a>
                      </li>
                  <?php } ?>
              </ul>
            </nav>
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
            <span class="valor-valor"><?= $totalVeiculos ?></span>
          </div>
        </div>

        <div class="item-valor">
          <span class="text-valor">Faturado <i class="bi bi-currency-dollar"></i></span>

          <div class="campo-valor">
            <span class="valor-valor"><?= $totalSomadoDia ?>,00</span>
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

  </body>
  <script src="js/relogio-nav.js"></script>
  <script>
    function removerEspeciais(acao, id){
      window.location.href = 'recem-adicionados-empresa.php?acao=removerVeiculoEmpresaEspeciais&id-veiculo-empresas-especiais=' + id;
    }

    let url = window.location.href;
    let encontrar = url.indexOf('id-veiculo-empresas-especiais');

    if(encontrar > -1){

        document.getElementById('area-recem-adicionados-especiais').style.display = 'inline-block';
        document.getElementById('area-recem-adicionados').style.display = 'none';
        
    }else if(url.includes('pagina_opcionais')){
        document.getElementById('area-recem-adicionados-especiais').style.display = 'inline-block';
        document.getElementById('area-recem-adicionados').style.display = 'none';
    }

    function  removerVeiculoEmpresa(acao, id){

    window.location.href = `recem-adicionados-empresa.php?acao=removerVeiculoEmpresa&id=${id}`;

    }

   
  </script>
</html>