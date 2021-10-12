<?php

class Veiculo{
    private $id;
    private $lavagem_comum;
    private $placa;
    private $modelo;
    private $cor_veiculo;
    private $cera;
    private $resina;
    private $valor;
    private $data_lavagem;
    private $hora_lavagem;

    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }
}

class Opcionais{
    private $id;
    private $lavagem_especiais;
    private $placa;
    private $modelo;
    private $chassi;
    private $motor_baixo;
    private $motor_cima;
    private $motor_completo_chassi;
    private $ducha;
    private $ducha_secagem;
    private $ducha_acab_exter;
    private $lavagem_simples;
    private $cera;
    private $resina;
    private $lavagem_cera_resina;
    private $valor;
    private $data_lavagem;
    private $hora_lavagem;

    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }
}
class CadastrarEmpresa{
    private $id;
    private $nome_empresa;
    private $cnpj_empresa;
    private $nome_contratante;
    private $telefone_empresa;
    private $celular_empresa;
    private $email_empresa;
    private $data_inicio;
    private $data_final;
    private $valor_contrato;
    private $enviar_email;

    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }
}

?>