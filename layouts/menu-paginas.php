<header>
    <div id="area-barra" onclick="abrirNavbar()">
      <div class="barra-1"></div>
      <div class="barra-2"></div>
      <div class="barra-3"></div>
    </div>

    <div id="area-logo">
      <a href="">
        <span>SISTEMA</span>
        <small>Paraná</small>
      </a>
    </div>
  </header>

  <nav id="navbar-lateral">
    <div id="fechar-navbar-lateral" onclick="fecharNavbar()">
     <span>&#10005;</span> 
    </div>

    <div class="nav-adicionar">
      <span class="btn-adicionar-lavagem">Adicionar Lavagem</span>

      <div class="area-btns-tipos">
        <a href="pagina-inicial.php" class="btn-tipo-lavagem">Comum</a>
        <a href="veiculo-empresa.php" class="btn-tipo-lavagem">Empresa</a>
      </div>
    </div>

    <div class="nav-historico-recem">
      <div class="btn-opcoes-recem">
        <span class=""><i class="bi bi-clock-history"></i></span>
        <span>Recem adicionados</span>
      </div>

      <div class="area-btns-historico">
        <a href="recem-adicionados.php" class="btn-tipo-lavagem">VEICULO COMUM</a>
        <a href="recem-adicionados-empresa.php" class="btn-tipo-lavagem">VEICULO EMPRESA</a>
      </div>
    </div>

    <a href="historico.php" class="nav-item">
      <span class=""><i class="bi bi-card-text"></i></span>
      <span>Historico</span>
    </a>

    <a href="faturamento.php" class="nav-item">
      <span class=""><i class="bi bi-currency-dollar"></i></span>
      <span>Faturamento</span>
    </a>

    <a href="cadastrar-empresa.php" class="nav-item">
      <span class=""><i class="bi bi-building"></i></span>
      <span>Cadastrar Empresas</span>
    </a>

    <a href="controller/logoff.php" class="nav-item">
      <span class=""><i class="bi bi-box-arrow-left"></i></span>
      <span>Sair</span>
    </a>

    <div id="navbar-rodape">
      <small id="data-atual">31/07/2021 - 19:20</small>
    </div>
  </nav>