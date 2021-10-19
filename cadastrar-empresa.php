<?php
session_start();
if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM'){
  header('Location: index.php?login=erro2');
}


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
    <link rel="stylesheet" href="css/cadastrar-empresa.css">

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
    <script defer src="js/cadastrar-empresa.js"></script>
     

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
    <section class="area-section-empresa">
        <form class="formulario-empresas" method="post">
            <h3>Cadastro da Empresa</h3>

            <div class="area-cadastro-empresas">
                <div class="area-inputs-em efeito-1">
                <span id="notEmpresa" style="display: none; color: red;"><i class="bi bi-exclamation-circle"></i></span>
                    <label for="">Nome da empresa</label>
                    <div class="area-icon-input-emp">
                        <input style="text-transform: capitalize;" name="nome-empresa" type="text" placeholder="Lava rapido parana" class="input-empresa" autofocus>
                        <div class="area-icone-em">
                            <span><i class="bi bi-building"></i></span>
                        </div>
                    </div>
                </div>

                <div class="area-inputs-em efeito-1">
                    <label for="">CNPJ <small style="font-size: 0.7em;">*opcional</small></label>
                    <div class="area-icon-input-emp">
                        <input type="text" placeholder="00.000.000/0000-00" name="cnpj-empresa" class="input-cnpj">
                        <div class="area-icone-em">
                            <span><i class="bi bi-sticky"></i></span>
                        </div>
                    </div>
                </div>

                <div class="area-inputs-em efeito-2">
                <span id="notNome" style="display: none; color: red;"><i class="bi bi-exclamation-circle"></i></span>
                    <label for="">Nome do contrate</label>
                    <div class="area-icon-input-emp">
                        <input style="text-transform: capitalize;" type="text" name="nome-contratante" placeholder="Jose Antonio..." class="input-nome">
                        <div class="area-icone-em">
                            <span><i class="bi bi-person"></i></i></span>
                        </div>
                    </div>
                </div>

                <div class="area-inputs-em efeito-3">
                <span id="notTelefone" style="display: none; color: red;"><i class="bi bi-exclamation-circle"></i></span>
                    <label for="">Tel</label>
                    <div class="area-icon-input-emp">
                        <input type="tel" placeholder="(11) 4075-4075" name="telefone-empresa" class="input-telefone">
                        <div class="area-icone-em">
                            <span><i class="bi bi-telephone"></i></span>
                        </div>
                    </div>
                </div>

                <div class="area-inputs-em efeito-4">
                    <label for="">Cel <small style="font-size: 0.7em;">*opcional</small></label>
                    <div class="area-icon-input-emp">
                        <input type="tel" placeholder="(11) 9 5555-5555" name="celular-empresa" class="input-celular">
                        <div class="area-icone-em">
                            <span><i class="bi bi-phone"></i></span>
                        </div>
                    </div>
                </div>

                <div class="area-inputs-em efeito-5">
                    <label for="">E-mail <small style="font-size: 0.7em;">*opcional</small></label>
                    <div class="area-icon-input-emp">
                        <input type="email" placeholder="parana@gmail.com" name="email-empresa" class="input-email">
                        <div class="area-icone-em">
                            <span><i class="bi bi-envelope"></i></span>
                        </div>
                    </div>
                </div>
            </div>

            <h4>Período de contratação</h4>
            <div class="area-cadastro-empresas-2">
                <div class="area-inicio-fim">
                    <div class="area-inputs-em data-inicio-fim">
                        <label for="">Data inicio <span id="notDateInicio" style="display: none; color: red;"><i class="bi bi-exclamation-circle"></i></span></label>
                        <input type="date" class="input-date-inicio" name="data-inicio">
                    </div>
                    <span class="separar-lemento"></span>
                    <div class="area-inputs-em data-inicio-fim">
                        <label for="">Data Final <span id="notDateFinal" style="display: none; color: red;"><i class="bi bi-exclamation-circle"></i></span></label>
                        <input type="date" class="input-date-final" name="data-final">
                    </div>
                </div>
            </div>
                
            <div class="area-cadastro-empresas-3">
                <div class="area-checkbox">
                    <div class="checkboxs">
                        <input id="email-check" type="checkbox" name="enviar-email">
                        <label for="email-check">Cliente desejá receber E-mail.</label>
                    </div>
                    <p>
                        Ao selecionar essa opção todas as vez que um veiculo for adicionado como
                         "lavagem faturada" para está empresa, será enviado uma mensagem no e-mail
                          com dados referente ao dia da lavagem.
                    </p>
                </div>
            </div>

            <div class="area-cadastro-empresas-4">
                <button type="button" class="btn-salvar-cadastro">SALVAR</button>
                <button type="button" style="display: none;" class="btn-salvar-cadastro btn-submit-loading2"><img src="img/carregando.gif" alt="loading..." width="25px" height="25px"></button>
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