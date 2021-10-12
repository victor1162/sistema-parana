<?php
require './controller/veiculo.model.php';
require './controller/veiculo.service.php';
require './controller/opcionais.service.php';
require './controller/cadastrar_empresas.php';
require './controller/conexao.php';


// configurando o timezone
date_default_timezone_set('America/Sao_Paulo');
// data e hora 
$dataAtual = date('d/m/Y');
$horaAtual = date('H:i');

$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;


if($acao == 'adicionar'){
    
    $veiculo = new Veiculo();
    $conexao = new Conexao();
    $veiculoService = new VeiculoService($conexao, $veiculo);

    $veiculo->__set('lavagem_comum', $_POST['lavagem_comum']);
    $veiculo->__set('placa', $_POST['placa']);
    $veiculo->__set('modelo', $_POST['modelo']);
    $veiculo->__set('cor_veiculo', $_POST['cor_veiculo']);
    $veiculo->__set('cera', $_POST['cera']);
    $veiculo->__set('resina', $_POST['resina']);
    $veiculo->__set('valor', $_POST['valor']);
    $veiculo->__set('data_lavagem', $dataAtual);
    $veiculo->__set('hora_lavagem', $horaAtual);
    
    if($veiculo->__get('placa') != '' || $veiculo->__get('modelo') != '' || $veiculo->__get('cor_veiculo') != '' || $veiculo->__get('valor') != ''){
        $veiculoService->adicionar();
        header('Location: pagina-inicial.php?acao=ultimosAdicionados&salvo=salvo');
        $salvo = 'salvo';
    }

    
    
}else if($acao == 'ultimosAdicionados'){
    $veiculo = new Veiculo();
    $conexao = new Conexao();

    $veiculoService = new VeiculoService($conexao, $veiculo);
    $ultimoAdd = $veiculoService->ultimosAdicionados();

}else if($acao == 'recemAdicionados'){
    $veiculo = new Veiculo();
    $opcionais = new Opcionais();
    $conexao = new Conexao();

    $veiculoService = new VeiculoService($conexao, $veiculo);
    $opcionaisService = new OpcionaisService($conexao, $opcionais);

    $recemAdd = $veiculoService->recemAdicionados(); // limit de 3 para pagina inicial

    // paginação dos recem adicionados Veiculos
    $total_registro_pagina = 5;
    $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
    $deslocamento = ($pagina - 1) * $total_registro_pagina;

    $veiculo->__set('data_lavagem', $dataAtual);
    $opcionais->__set('data_lavagem', $dataAtual);
    
    $recemDoDia = $veiculoService->recemDoDia($total_registro_pagina, $deslocamento); // volta todos os veiculos por data com 'limit e offset'
    $recemDoDiaTotais = $veiculoService->recemDoDiaTotais();// calcula total de veiculos e valor sem 'limit'
    $total_veiculos = $veiculoService->getTotalVeiculos();
    $total_de_paginas = ceil($total_veiculos[0]['total'] / $total_registro_pagina);
    $pagina_ativa = $pagina;

    // somando valor total de lavagem do dia
    $somarDoDia = 0;
    $somarTotalDeVeiculos = count($recemDoDiaTotais);
    foreach($recemDoDiaTotais as $key => $valor){
        $somarDoDia += $valor['valor'];
 
    };

    // paginação dos OPCIONAIS
    $total_registro_opcionais = 8;
    $pagina_opcionais = isset($_GET['pagina_opcionais']) ? $_GET['pagina_opcionais'] : 1;
    $deslocamento_opcionais = ($pagina_opcionais - 1) * $total_registro_opcionais;

    $recemOpcionaisDoDia = $opcionaisService->recemOpcionaisDoDia($total_registro_opcionais, $deslocamento_opcionais); // Opcionais filtrado por data com 'limit e offset'
    $recemOpcionais = $opcionaisService->recemOpcionais();// calcula total de opcionais e valor sem 'limit'
    $total_opcionais = $opcionaisService->getTotalOpcionais();
    $total_de_paginas_opcionais = ceil($total_opcionais[0]['total'] / $total_registro_opcionais);
    $pagina_ativa_opcionais = $pagina_opcionais;

    // echo '<pre>';
    // print_r($recemOpcionais);
    // echo '</pre>';

    // somando valor total de lavagem do dia dos opcionais(especiais)
    $somarOpcionaisDoDia = 0;
    $somarTotalDeVeiculosOpcionais = count($recemOpcionais);
    foreach($recemOpcionais as $key => $valor){
        $somarOpcionaisDoDia += $valor['valor'];
    };

    // somando somarDoDia + somarOpcionaisDoDia
    $totalSomadoDia = $somarDoDia + $somarOpcionaisDoDia;

    // calculando total de veiculos lavados
    $totalVeiculos = $somarTotalDeVeiculos + $somarTotalDeVeiculosOpcionais;

}else if($acao == 'remover'){
    $veiculo = new Veiculo();
    $conexao = new Conexao();

    $veiculo->__set('id', $_GET['id']);

    $veiculoService = new VeiculoService($conexao, $veiculo);
    $recemAdd = $veiculoService->recemAdicionados();

    $removendo = $veiculoService->removerVeiculo();

    header('Location: recem-adicionados.php');

}else if($acao == 'atualizar'){

    $veiculo = new Veiculo();
    $conexao = new Conexao();

    $veiculo->__set('id', $_POST['id']);
    $veiculo->__set('placa', $_POST['placa']);
    $veiculo->__set('modelo', $_POST['modelo']);
    $veiculo->__set('cor_veiculo', $_POST['cor_veiculo']);
    $veiculo->__set('cera', $_POST['cera']);
    $veiculo->__set('resina', $_POST['resina']);
    $veiculo->__set('valor', $_POST['valor']);
    $veiculo->__set('data_lavagem', $dataAtual);

    $veiculoService = new VeiculoService($conexao, $veiculo);

    $veiculoService->atualizar();
    
    header('Location: recem-adicionados.php');
}else if($acao == 'opcionais'){

    $opcionais = new Opcionais();
    $conexao = new Conexao();

    $opcionais->__set('lavagem_especiais', $_POST['lavagem_especiais']);
    $opcionais->__set('placa', $_POST['placa']);
    $opcionais->__set('modelo', $_POST['modelo']);
    $opcionais->__set('chassi', $_POST['chassi']);
    $opcionais->__set('motor_baixo', $_POST['motor-baixo']);
    $opcionais->__set('motor_cima', $_POST['motor-cima']);
    $opcionais->__set('motor_completo_chassi', $_POST['motor-completo-chassi']);
    $opcionais->__set('ducha', $_POST['ducha']);
    $opcionais->__set('ducha_secagem', $_POST['ducha-secagem']);
    $opcionais->__set('ducha_acab_exter', $_POST['ducha-acab-exter']);
    $opcionais->__set('lavagem_simples', $_POST['lavagem-simples']);
    $opcionais->__set('cera', $_POST['lavagem-cera']);
    $opcionais->__set('resina', $_POST['lavagem-resina']);
    $opcionais->__set('lavagem_cera_resina', $_POST['lavagem-cera-resina']);
    $opcionais->__set('valor', $_POST['valor']);
    $opcionais->__set('data_lavagem', $dataAtual);
    $opcionais->__set('hora_lavagem', $horaAtual);

    $opcionaisService = new OpcionaisService($conexao, $opcionais);
    $opcionaisService->adicionarOpcionais();
    
    header('Location: pagina-inicial.php?acao=ultimosAdicionados&salvo=salvo');
    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';
}else if($acao == 'removerEspeciais'){
    $veiculo = new Veiculo();
    $opcionais = new Opcionais();
    $conexao = new Conexao();

    $veiculoService = new VeiculoService($conexao, $veiculo);
    $recemAdd = $veiculoService->recemAdicionados();

    $opcionaisService = new OpcionaisService($conexao, $opcionais);
    $recemOpcionais = $opcionaisService->recemOpcionais();

    $opcionais->__set('id', $_GET['id']);
    $opcionaisService->removerEspeciais();

    header('Location: recem-adicionados.php?id=null');
}else if($acao == 'historicoGeral'){
    $veiculo = new Veiculo();
    $opcionais = new Opcionais();
    $conexao = new Conexao();
    

    $veiculoService = new VeiculoService($conexao, $veiculo);
    $historicoGeralComum = $veiculoService->recemAdicionadosHistorico();
    $historicoGeralComumTotal = $veiculoService->recemVeiculosTotal();

    $opcionaisService = new OpcionaisService($conexao, $opcionais);
    $hitoricoGeral = $opcionaisService->recemOpcionaisHistorico();
    $recemOpcionaisTotal = $opcionaisService->recemOpcionaisTotal();

    // somando valor veiculos comum
    $somarHistoricoComum = 0;
    $somarVeiHistoricoComum = count($historicoGeralComumTotal);
    foreach ($historicoGeralComumTotal as $key => $valor){
        $somarHistoricoComum += $valor['valor'];
    };

    $somarHitoricoGeral = 0;
    $somarVeiHitoricoGeral = count($recemOpcionaisTotal);
    foreach ($recemOpcionaisTotal as $key => $valor){
        $somarHitoricoGeral += $valor['valor'];
    };

    //total somado dos historicos
    $valorTotalDoHistorico = $somarHistoricoComum + $somarHitoricoGeral;

    $totalVeiculosHistorico = $somarVeiHitoricoGeral + $somarVeiHistoricoComum;

    // verificando se a variavel $hitoricoGeral esta vazia se estiver colocar como valor $recemOpcionaisTotal
    $hitoricoGeral = $hitoricoGeral ? $hitoricoGeral : $recemOpcionaisTotal;
     
    // echo '<pre>';
    // print_r($teste);
    // echo '</pre>';

}else if($acao == 'removerEspeciaisHistorico'){
    $veiculo = new Veiculo();
    $opcionais = new Opcionais();
    $conexao = new Conexao();

    $veiculoService = new VeiculoService($conexao, $veiculo);
    $recemAdd = $veiculoService->recemAdicionados();

    $opcionaisService = new OpcionaisService($conexao, $opcionais);
    $recemOpcionais = $opcionaisService->recemOpcionais();

    $opcionais->__set('id', $_GET['id']);
    $opcionaisService->removerEspeciais();

    header('Location: historico.php');
}else if($acao == 'faturamentEmGeral'){
    $veiculo = new Veiculo();
    $opcionais = new Opcionais();
    $conexao = new Conexao();

    $veiculoService = new VeiculoService($conexao, $veiculo);
    $historicoComum = $veiculoService->hitoricoVeiculosComum();
    $valorTotalComum = $veiculoService->valorTotalComum();
    

    $opcionaisService = new OpcionaisService($conexao, $opcionais);
    $historicoEspeciais = $opcionaisService->historicoEspeciais();
    $valorTotalEspeciais = $opcionaisService->valorTotalEspeciais();


    // somar total de veiculos 
    $totalVeiculos = $historicoComum[0]['total'] + $historicoEspeciais[0]['total'];

    // soma valor total dos veiculos 
    $totalValor = $valorTotalComum[0]['total'] + $valorTotalEspeciais[0]['total'];

    // calcular media semanal
    $mediaSemanal = $totalVeiculos / 7;
    // analise feito com base no total de veiculos porem sera modificada para pegar a media de cada dias para dar um total e tirar a media final **** ainda em desenvolvimento
    $mediaFinal = ceil($mediaSemanal); 
}else if($acao == 'filtrarHistorico'){
    
    $valorTotalDoHistorico = 0; // valor total de veiculos lavados

    $veiculo = new Veiculo();
    $opcionais = new Opcionais();
    $conexao = new Conexao();

    
    $data = $_POST['data'];
    $formato = date('d-m-Y', strtotime($data));
    $formatoDataReplace = str_replace('-', '/', $formato);

    if($formatoDataReplace == '31/12/1969'){
        $formatoDataReplace = '';
    }
    

    $_SESSION['data_atual'] = isset($formatoDataReplace) ? $formatoDataReplace : '';
    
    $veiculo->__set('data_lavagem', $formatoDataReplace);
    $opcionais->__set('data_lavagem', $formatoDataReplace);

    $veiculoService = new VeiculoService($conexao, $veiculo);
    $opcionaisService = new OpcionaisService($conexao, $opcionais);


    if($formatoDataReplace != ''){

        $historicoGeralComum = $veiculoService->filtrandoVeiculos();
        $hitoricoGeral = $opcionaisService->filtrandoOpcionais();
        
        $filtroComum = 0;
        $filtroVeiculoComum = count($historicoGeralComum);
        foreach($historicoGeralComum as $key => $valor){
            $filtroComum += $valor['valor'];
        };

        $filtroOpcionais = 0;
        $filtroVeiculoOpcionais = count($hitoricoGeral);
        foreach($hitoricoGeral as $key => $valor){
            $filtroOpcionais += $valor['valor'];
        };

        $totalFiltroValor = $filtroComum + $filtroOpcionais;
        $totalVeiculosFiltro = $filtroVeiculoComum + $filtroVeiculoOpcionais;

    }else{

    $historicoGeralComum = $veiculoService->recemAdicionados();
    $hitoricoGeral = $opcionaisService->recemOpcionais();
    $historicoGeralComum = $veiculoService->filtrandoVeiculos();
    $hitoricoGeral = $opcionaisService->filtrandoOpcionais();

        $filtroComum = 0;
        foreach($historicoGeralComum as $key => $valor){
            $filtroComum += $valor['valor'];
        };
        $filtroOpcionais = 0;
        foreach($hitoricoGeral as $key => $valor){
            $filtroOpcionais += $valor['valor'];
        };
        $totalFiltroValor = $filtroComum + $filtroOpcionais;
    
        // somando valor veiculos comum
        $somarVeiHistoricoComum = count($historicoGeralComum);
        $somarVeiHitoricoGeral = count($hitoricoGeral);
       

        $totalVeiculosHistorico = $somarVeiHitoricoGeral + $somarVeiHistoricoComum;
    }

}else if($acao == 'cadastrarEmpresa'){

    $cadastrar_empresa = new CadastrarEmpresa();
    $conexao = new Conexao();
    $cadastrarServeci = new CadastrarEmpresasService($conexao, $cadastrar_empresa);

    $cadastrar_empresa->__set('nome_empresa', $_POST['nome-empresa']);
    $cadastrar_empresa->__set('cnpj_empresa', $_POST['cnpj-empresa']);
    $cadastrar_empresa->__set('nome_contratante', $_POST['nome-contratante']);
    $cadastrar_empresa->__set('telefone_empresa', $_POST['telefone-empresa']);
    $cadastrar_empresa->__set('celular_empresa', $_POST['celular-empresa']);
    $cadastrar_empresa->__set('email_empresa', $_POST['email-empresa']);
    $cadastrar_empresa->__set('data_inicio', $_POST['data-inicio']);
    $cadastrar_empresa->__set('data_final', $_POST['data-final']);
    $cadastrar_empresa->__set('enviar_email', $_POST['enviar-email']);

    $cadastrarServeci->salvarEmpresa();

    header('Location: pagina-inicial.php');
}else if($acao == 'veiculosEmpresas'){
    $cadastrarEmpresa = new CadastrarEmpresa();
    $conexao = new Conexao();
    $veiculo = new Veiculo();

    $veiculoService = new VeiculoService($conexao, $veiculo);
    $empresaService = new CadastrarEmpresasService($conexao, $cadastrarEmpresa );

    $ultimoAdd = $veiculoService->ultimosAdicionados();
    $empresas = $empresaService->recuperarEmpresas();
    
}else if($acao == 'veiculoEmpresa'){
    $tipo_lavagem = $_POST['lavagem_comum'];
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    //salvar no banco de dados para

    //imprimir na sequencia

    
    

}else if($acao == 'veiculoEmpresaEspeciais'){
    $tipo_lavagem = $_POST['lavagem_especiais'];
    // echo '<pre>';
    // print_r($_POST);
    // echo '</pre>';
    
}

?>