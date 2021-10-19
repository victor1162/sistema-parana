<?php

class CadastrarEmpresasService{
    private $conexao;
    private $cadastrar_empresa;

    public function __construct(Conexao $conexao, CadastrarEmpresa $cadastrar_empresa){
        $this->conexao = $conexao->conectar();
        $this->cadastrar_empresa = $cadastrar_empresa;
    }

    public function salvarEmpresa(){
        $query = '
            insert into tb_empresas(nome_empresa, cnpj_empresa, nome_contratante, telefone_empresa, celular_empresa, email_empresa, data_inicio, data_final, enviar_email)
            values(:nome_empresa, :cnpj_empresa, :nome_contratante, :telefone_empresa, :celular_empresa, :email_empresa, :data_inicio, :data_final, :enviar_email)
        ';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':nome_empresa', $this->cadastrar_empresa->__get('nome_empresa'));
        $stmt->bindValue(':cnpj_empresa', $this->cadastrar_empresa->__get('cnpj_empresa'));
        $stmt->bindValue(':nome_contratante', $this->cadastrar_empresa->__get('nome_contratante'));
        $stmt->bindValue(':telefone_empresa', $this->cadastrar_empresa->__get('telefone_empresa'));
        $stmt->bindValue(':celular_empresa', $this->cadastrar_empresa->__get('celular_empresa'));
        $stmt->bindValue(':email_empresa', $this->cadastrar_empresa->__get('email_empresa'));
        $stmt->bindValue(':data_inicio', $this->cadastrar_empresa->__get('data_inicio'));
        $stmt->bindValue(':data_final', $this->cadastrar_empresa->__get('data_final'));
        $stmt->bindValue(':enviar_email', $this->cadastrar_empresa->__get('enviar_email'));

        $stmt->execute();
    }
    public function recuperarEmpresas(){
        $query = '
            select * from tb_empresas order by id_empresas desc
        ';

        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>