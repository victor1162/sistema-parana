<?php
class VeiculoEmpresaOpcionaisService{
    private $conexao;
    private $veiculoEmpresaOpcionais;

    public function __construct(Conexao $conexao, VeiculoEmpresaOpcionais $veiculoEmpresaOpcionais){
        $this->conexao = $conexao->conectar();
        $this->veiculoEmpresaOpcionais = $veiculoEmpresaOpcionais;
    }

    public function adicionarVeiculoEmpresaOpcionais(){
        $query = '
            insert into tb_veiculo_empresas_opcionais(fk_id_empresas, lavagem_especiais, placa, modelo, chassi, motor_baixo, motor_cima, motor_completo_chassi, ducha, ducha_secagem, ducha_acab_exter, lavagem_simples, lavagem_cera, lavagem_resina, lavagem_cera_resina, valor, data_lavagem, hora_lavagem)
            values(:fk_id_empresas, :lavagem_especiais, :placa, :modelo, :chassi, :motor_baixo, :motor_cima, :motor_completo_chassi, :ducha, :ducha_secagem, :ducha_acab_exter, :lavagem_simples, :lavagem_cera, :lavagem_resina, :lavagem_cera_resina, :valor, :data_lavagem, :hora_lavagem);
        ';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':fk_id_empresas', $this->veiculoEmpresaOpcionais->__get('fk_id_empresas'));
        $stmt->bindValue(':lavagem_especiais', $this->veiculoEmpresaOpcionais->__get('lavagem_especiais'));
        $stmt->bindValue(':placa', $this->veiculoEmpresaOpcionais->__get('placa'));
        $stmt->bindValue(':modelo', $this->veiculoEmpresaOpcionais->__get('modelo'));
        $stmt->bindValue(':chassi', $this->veiculoEmpresaOpcionais->__get('chassi'));
        $stmt->bindValue(':motor_baixo', $this->veiculoEmpresaOpcionais->__get('motor_baixo'));
        $stmt->bindValue(':motor_cima', $this->veiculoEmpresaOpcionais->__get('motor_cima'));
        $stmt->bindValue(':motor_completo_chassi', $this->veiculoEmpresaOpcionais->__get('motor_completo_chassi'));
        $stmt->bindValue(':ducha', $this->veiculoEmpresaOpcionais->__get('ducha'));
        $stmt->bindValue(':ducha_secagem', $this->veiculoEmpresaOpcionais->__get('ducha_secagem'));
        $stmt->bindValue(':ducha_acab_exter', $this->veiculoEmpresaOpcionais->__get('ducha_acab_exter'));
        $stmt->bindValue(':lavagem_simples', $this->veiculoEmpresaOpcionais->__get('lavagem_simples'));
        $stmt->bindValue(':lavagem_cera', $this->veiculoEmpresaOpcionais->__get('lavagem_cera'));
        $stmt->bindValue(':lavagem_resina', $this->veiculoEmpresaOpcionais->__get('lavagem_resina'));
        $stmt->bindValue(':lavagem_cera_resina', $this->veiculoEmpresaOpcionais->__get('lavagem_cera_resina'));
        $stmt->bindValue(':valor', $this->veiculoEmpresaOpcionais->__get('valor'));
        $stmt->bindValue(':data_lavagem', $this->veiculoEmpresaOpcionais->__get('data_lavagem'));
        $stmt->bindValue(':hora_lavagem', $this->veiculoEmpresaOpcionais->__get('hora_lavagem'));

        $stmt->execute();
    }
    public function recuperarVeiculoEmpresasOpcionais(){
        // select * from tb_empresas inner join tb_veiculo_empresas on tb_empresas.id_empresas = tb_veiculo_empresas.fk_id_empresas 
        $query = '
        select * from tb_empresas inner join tb_veiculo_empresas_opcionais on tb_empresas.id_empresas = tb_veiculo_empresas_opcionais.fk_id_empresas where data_lavagem = :data_atual order by id_veiculo_empresa_opcionais desc;
        ';

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':data_atual', $this->veiculoEmpresaOpcionais->__get('data_lavagem'));
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function removerVeiculoEmpresa(){
        $query = '
            delete from tb_veiculo_empresas_opcionais where id_veiculo_empresa_opcionais  = :id;
        ';

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id', $this->veiculoEmpresaOpcionais->__get('id'));
        $stmt->execute();
    }
    public function somarValorVeiculoEmpresaEspeciais(){
        $query = '
            select sum(valor) as total from tb_veiculo_empresas_opcionais where data_lavagem = :data_atual ;
        ';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':data_atual', $this->veiculoEmpresaOpcionais->__get('data_lavagem'));
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>