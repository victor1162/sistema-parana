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
    <link rel="stylesheet" href="css/imprimir-cupom.css">

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
    <script defer src="js/imprimir-cupom.js"></script>
    

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
  <body class="body-impressao" onafterprint="carregamento()">
        <section class="area-imprimir">
            <h3>Você deseja imprimir CUPOM ?</h3>
            <span class="btn-confirme sim-imprimir">SIM</span>
            <span class="btn-confirme nao-imprimir">NÃO</span>
        </section>

        <section class="body-impressao-dados" style="display: none;">
            <div style="text-align: center; width: 100%;">--------------------------------</div>
            <h3 class="titulo-tmpresa">LAVA RAPIDO PARANA LTDA</h3>
            <div style="text-align: center; width: 100%;">--------------------------------</div>
            <br>

            <div class="dados-lavagem-imprimir">
                <?php if($_POST['nome_empresa'] != '') { ?>
                <div class="item-dados">
                    <span>EMPRESA:</span>
                    <span><?= $_POST['nome_empresa'] ?></span>
                </div>
                <?php } ?>
                <div class="item-dados">
                    <span>MODELO:</span>
                    <span><?= $_POST['modelo'] ?></span>
                </div>
                <div class="item-dados">
                    <span>PLACA:</span>
                    <span><?= $_POST['placa'] ?></span>
                </div>
                <?php if($tipo_lavagem == 'COMUM') { ?>
                <div class="item-dados">
                    <span>LAVAGEM:</span>
                    <span><?= $_POST['lavagem_comum'] ?></span>
                </div>
                <?php }else if($tipo_lavagem == 'ESPECIAIS'){ ?>
                <div class="item-dados">
                    <span>LAVAGEM:</span>
                    <span><?= $_POST['lavagem_especiais'] ?></span>
                </div>
                <?php } ?> 

                <div class="item-dados">
                    <span>DATA:</span>
                    <span><?= $dataAtual ?></span>
                </div>
                <div class="item-dados">
                    <span>HORA:</span>
                    <span><?= $horaAtual ?></span>
                </div>
                
            </div>
            <br>
            <div class="item-dados-valor">
                <div style="text-align: center; width: 100%;">--------------------------------</div>
                <span>VALOR TOTAL</span>
                <span><?= $_POST['valor'] ?></span>
                <div style="text-align: center; width: 100%;">--------------------------------</div>
            </div>
            <br>
            <div class="item-dados-info">
                <p>
                    POR FAVOR VERIFIQUE SE EXISTE OBJETOS DE VALORES NO INTERIOR DO VEICULO 
                    E AVISE A GERENCIA.
                    <br>
                    <br>
                    SEGUNDA A SABADO DAS 07:00 AS 17:00
                    <br>
                    DOMINGOS E FERIADOS 07:00 AS 12:00.
                </p>
            </div>

        </section>
  </body>
</html>