# sistema parana
Sistema desenvolvido para controlar o faturamento do lava rapido e assim tendo acesso aos ultimos veiculos lavados e historico, como tambem a emissão de pequenos cupom para os clientes com o valor , placa, dia, hora e outras informações


<h2>Como rodar ?</h2>

<ul>
  <li>
      <strong>Passo 1</strong> - Para rodar é necessario baixar na maquina o xampp https://www.apachefriends.org/pt_br/index.html. Após baixado instale o xampp na maquina com o         local padrão e nesse caminho "C:\xampp\htdocs" remova o arquivo INDEX que está dentro dessa pasta "htdocs".
  </li>
  <li>
    <strong>Passo 2</strong> - Para rodar o servidor é necessario acessar o seguinte caminho "C:\xampp", dentro dessa pasta execute o arquivo "xampp-control.exe", quando abrir o     painel do xampp start o Apache e o MySQL, para que voce consiga acessar o sistema entre no navegador e escreva na barra superior "localhost".
  </li>
  <li>
    <strong>Passo 3</strong> - Para que o sistema funcione 100% é necessario criar o banco de dados na maquina local, para isso voce ira acessar em outra pagina no browser     "http://localhost/phpmyadmin/", ao abrir o painel no lado direito do painel onde esta uma barra horizontal veja os seguintes nomes "Procurar, Estrutura, SQL, Pesquisar ..." clique em "SQL".
  </li>
  <li>
    <strong>Passo 4</strong> -  Agora voce ira criar a Banco de dados e só escrever "CREATE DATABASE sistema_parana" e após isso existe uma lista na lateral esquerda é só clicar na "sistema_parana" e depois clicar em "SQL" que esta no lado direito na horizontal com esses nomes "Procurar, Estrutura, SQL, Pesquisar ..." copie esse codigo que esta abaixo e cole no "SQL".
    < /br>
      
    
      create table tb_opcionais(
          id int not null PRIMARY KEY AUTO_INCREMENT,

          lavagem_especiais varchar(10) not null,
        placa varchar(10) not null,
          modelo varchar(25) not null,
          chassi varchar(3) not null,
          motor_baixo varchar(3) not null,
          motor_cima varchar(3) not null,
          motor_completo_chassi varchar(3) not null,
          ducha varchar(3) not null,
          ducha_secagem varchar(3) not null,
          ducha_acab_exter varchar(3) not null,
          lavagem_simples varchar(3) not null,
          lavagem_cera varchar(3) not null,
          lavagem_resina varchar(3) not null,
          lavagem_cera_resina varchar(3) not null,
          valor float(4,2) not null,
          data_lavagem varchar(20) not null,
          hora_lavagem varchar(20) not null
      );

      create table tb_empresas(
        id int not null PRIMARY KEY AUTO_INCREMENT,

          nome_empresa varchar(50) not null,
          cnpj_empresa varchar(20) not null,
          nome_contratante varchar(150) not null,
          telefone_empresa varchar(17) not null,
          celular_empresa varchar(17) not null,
          email_empresa varchar(200) not null,
          data_inicio varchar(30) not null,
          data_final varchar(30) not null,
          enviar_email varchar(10) not null,
          valor_contrato float(4,1) not null
      );
      
      <hr>
      
      <p>Após copiar cole no "SQL" e depois clique no botão executar e pode voltar para o "localhost", agora para acessar use Matricula: 3531805 Senha: 102030aa</p>
  </li>
</ul>



