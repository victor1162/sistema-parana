<?php
class VeiculoEmpresaService{
    private $conexao;
    private $veiculoEmpresa;

    public function __construct(Conexao $conexao, VeiculoEmpresa $veiculoEmpresa){
        $this->conexao = $conexao->conectar();
        $this->veiculoEmpresa = $veiculoEmpresa;
    }

    public function adicionarVeiculoEmpresa(){
        $query = '
            insert into 
                tb_veiculo_empresas(fk_id_empresas, cera, resina, lavagem_comum, placa, modelo, cor_veiculo, valor, data_lavagem, hora_lavagem)
                            values(:fk_id_empresas, :cera, :resina, :lavagem_comum, :placa, :modelo, :cor_veiculo, :valor, :data_lavagem, :hora_lavagem);
        ';

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':fk_id_empresas', $this->veiculoEmpresa->__get('fk_id_empresas'));
        $stmt->bindValue(':cera', $this->veiculoEmpresa->__get('cera'));
        $stmt->bindValue(':resina', $this->veiculoEmpresa->__get('resina'));
        $stmt->bindValue(':lavagem_comum', $this->veiculoEmpresa->__get('lavagem_comum'));
        $stmt->bindValue(':placa', $this->veiculoEmpresa->__get('placa'));
        $stmt->bindValue(':modelo', $this->veiculoEmpresa->__get('modelo'));
        $stmt->bindValue(':cor_veiculo', $this->veiculoEmpresa->__get('cor_veiculo'));
        $stmt->bindValue(':valor', $this->veiculoEmpresa->__get('valor'));
        $stmt->bindValue(':data_lavagem', $this->veiculoEmpresa->__get('data_lavagem'));
        $stmt->bindValue(':hora_lavagem', $this->veiculoEmpresa->__get('hora_lavagem'));

        $stmt->execute();
    }
    public function recuperarVeiculoEmpresa($limit, $offset){
        // $query = '
        //     select * from tb_empresas inner join tb_veiculo_empresas on tb_empresas.id_empresas = tb_veiculo_empresas.fk_id_empresas where id_empresas = 2;
        // ';

        $query = "
            select * from tb_empresas inner join tb_veiculo_empresas on tb_empresas.id_empresas = tb_veiculo_empresas.fk_id_empresas where data_lavagem = :data_atual order by id_veiculo_empresa DESC limit $limit offset $offset;
        ";

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':data_atual', $this->veiculoEmpresa->__get('data_lavagem'));
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getVeiculoEmpresa(){
        $query = '
            select 
                count(*) as total
            from
                tb_veiculo_empresas
            where data_lavagem = :data_atual
        ';

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':data_atual', $this->veiculoEmpresa->data_lavagem);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function somarValorVeiculos(){
        $query = '
            select sum(valor) as total from tb_veiculo_empresas where data_lavagem = :data_atual;
        ';

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':data_atual', $this->veiculoEmpresa->__get('data_lavagem'));
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function atualizarVeiculosEmpresa(){
        // echo $this->veiculoEmpresa->__get('id');
        
        $query = "
            update tb_veiculo_empresas set placa = :placa where id_veiculo_empresa = :id;
            update tb_veiculo_empresas set modelo = :modelo where id_veiculo_empresa = :id;
            update tb_veiculo_empresas set cor_veiculo = :cor_veiculo where id_veiculo_empresa = :id;
            update tb_veiculo_empresas set cera = :cera where id_veiculo_empresa = :id;
            update tb_veiculo_empresas set resina = :resina where id_veiculo_empresa = :id;
            update tb_veiculo_empresas set valor = :valor where id_veiculo_empresa = :id;
            update tb_veiculo_empresas set data_lavagem = :data_lavagem where id_veiculo_empresa = :id;
            update tb_veiculo_empresas set hora_lavagem = :hora_lavagem where id_veiculo_empresa = :id;
        ";

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id', $this->veiculoEmpresa->__get('id'));
        $stmt->bindValue(':placa', $this->veiculoEmpresa->__get('placa'));
        $stmt->bindValue(':modelo', $this->veiculoEmpresa->__get('modelo'));
        $stmt->bindValue(':cor_veiculo', $this->veiculoEmpresa->__get('cor_veiculo'));
        $stmt->bindValue(':cera', $this->veiculoEmpresa->__get('cera'));
        $stmt->bindValue(':resina', $this->veiculoEmpresa->__get('resina'));
        $stmt->bindValue(':valor', $this->veiculoEmpresa->__get('valor'));
        $stmt->bindValue(':data_lavagem', $this->veiculoEmpresa->__get('data_lavagem'));
        $stmt->bindValue(':hora_lavagem', $this->veiculoEmpresa->__get('hora_lavagem'));

        return $stmt->execute();
    }
    public function removerVeiculoEmpresa(){
        $query = '
            delete from tb_veiculo_empresas where id_veiculo_empresa = :id;
        ';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id', $this->veiculoEmpresa->__get('id'));
        $stmt->execute();
    }
    public function recEmpresa(){
        $query = '
            select * from tb_empresas inner join tb_veiculo_empresas on tb_empresas.id_empresas = tb_veiculo_empresas.fk_id_empresas where id_empresas = 2;
        ';
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>