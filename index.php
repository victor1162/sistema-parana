

<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- folha de estilo -->
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/pagina-inicial.css">

    <!-- medias -->
    <link rel="stylesheet" href="media/index-media.css">

    <!-- normalize -->
    <link rel="stylesheet" href="css/normalize.css">

    <!-- scripts -->
    <script src="js/script.js"></script>


    <!--[if lt IE 9]>
    <script src="https://cdn.es.gov.br/scripts/extensions/html5shiv/3.7.2/html5shiv.min.js"></script>
    <![endif]-->
    <title>sistema - Paraná</title>
  </head>
  <body>
    
  <div class="conatiner area-principal" style="height: 100%;">

    <div class="apresentacao-inicial">
      <div id="area-imagem-inicial">
        <img src="img/principal.png" alt="">
      </div>
    </div>

    <div id="area-formulario">

        <form method="post" action="autenticacao-controller.php" id="formulario-autenticacao">

          <div class="area-usuario-autenticacao">
            <div class="area-item">
              <label for="id-usuario">ID usuario</label>
              <input type="text" name="id_usuario" class="input-inicial" placeholder="Ex: 3531805" id="id-usuario" autofocus>
            </div>

            <div class="area-item">
              <label for="senha-usuario" >Senha</label>
              <input type="password" name="senha_usuario" class="input-inicial" id="senha-usuario">
            </div>
            <?php if(isset($_GET['login']) && $_GET['login'] == 'erro'){ ?>

              <div style="margin-bottom: 10px;">
                <span style="color: red; font-weight: 300; font-size: .9em;"> ID Usuaio ou Senha inválido(s)!</span>
              </div>

            <?php } ?>

            <?php if(isset($_GET['login']) && $_GET['login'] == 'erro2'){ ?>

              <div style="margin-bottom: 10px;">
                <span style="color: red; font-weight: 300; font-size: .9em;"> Faça login antes de acessar as páginas protegidas!</span>
              </div>

            <?php } ?>

            <div class="area-item btn-acessar">
              <button type="submit">acessar</button>
            </div>

            <div class="area-item problema-acesso">
              <span>
                <a href="#">Problema com acesso</a>
              </span>
              <span>
                <a href="#">Primeiro acesso</a>
              </span>
            </div>
          </div>
        </form>
    </div>

  </div>

  </body>
</html>