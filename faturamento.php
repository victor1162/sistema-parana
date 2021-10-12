<?php
session_start();
if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM'){
  header('Location: index.php?login=erro2');
}
$acao = 'faturamentEmGeral';
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
    <link rel="stylesheet" href="css/faturamento.css">

    <!-- medias -->
    <link rel="stylesheet" href="media/index-media.css">
    <link rel="stylesheet" href="media/pagina-inicial-media.css">
    <link rel="stylesheet" href="media/historico-media.css">
    <link rel="stylesheet" href="media/faturamento-media.css">

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
  <body >

  <?php
    include 'layouts/menu-paginas.php';
  ?>

  <div id="container" onclick="fecharNavbarSemFoco()">
    
    <section class="area-faturamento">
        <div class="itens-faturamento-total">
            <div class="itens-faturamento">
                <span>
                  <?php
                    if($totalVeiculos == ''){
                      echo '0';
                    }else{
                      echo $totalVeiculos;
                    }
                  ?>
                </span>

                <div class="text-tipo-faturamento">Total veiculos <i class="fas fa-car"></i></div>
            </div>

            <div class="itens-faturamento">
                <span>R$ 
                      <?php
                        if($totalValor == ''){
                          echo '0';
                        }else{
                          echo $totalValor;
                        }
                      ?>
                  </span>

                <div class="text-tipo-faturamento">Total faturado <i class="bi bi-currency-dollar"></i></div>
            </div>
            
            <div class="itens-faturamento">
                <span>
                      <?php
                        if($mediaFinal == ''){
                          echo '0';
                        }else{
                          echo $mediaFinal;
                        }
                      ?>
                </span>

                <div class="text-tipo-faturamento">Media semanal <i class="bi bi-graph-up"></i></div>
            </div>
        </div> 
    </section>
  </div>

  </body>
  
  <!-- adicionado atributo defer para carregamento antes que a pagina -->
  <script defer src="js/relogio-nav.js"></script>
</html>