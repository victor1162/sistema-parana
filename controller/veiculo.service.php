<?php

class VeiculoService{
    private $conexao;
    private $veiculo;

    public function __construct(Conexao $conexao, Veiculo $veiculo){
        $this->conexao = $conexao->conectar();
        $this->veiculo = $veiculo;
    }

    public function adicionar(){
        $query = '
            insert into 
                tb_veiculos(cera, resina, placa, modelo, cor_veiculo, valor, data_lavagem, hora_lavagem, lavagem_comum)
                    values(:cera, :resina, :placa, :modelo, :cor_veiculo, :valor, :data_lavagem, :hora_lavagem, :lavagem_comum);
        ';

        $stmt = $this->conexao->prepare($query);

        $stmt->bindValue(':lavagem_comum', $this->veiculo->__get('lavagem_comum'));
        $stmt->bindValue(':cera', $this->veiculo->__get('cera'));
        $stmt->bindValue(':resina', $this->veiculo->__get('resina'));
        $stmt->bindValue(':placa', $this->veiculo->__get('placa'));
        $stmt->bindValue(':modelo', $this->veiculo->__get('modelo'));
        $stmt->bindValue(':cor_veiculo', $this->veiculo->__get('cor_veiculo'));
        $stmt->bindValue(':valor', $this->veiculo->__get('valor'));
        $stmt->bindValue(':data_lavagem', $this->veiculo->__get('data_lavagem'));
        $stmt->bindValue(':hora_lavagem', $this->veiculo->__get('hora_lavagem'));

        $stmt->execute();

    }
    
    public function ultimosAdicionados(){
        $query = '
            select
                id, cera, resina, placa, modelo, cor_veiculo, valor, data_lavagem 
            from 
                tb_veiculos
            order by id DESC
            limit 3;
            
        ';

        $stmt = $this->conexao->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function recemAdicionados(){
        
        $query = '
            select
                id, cera, resina, placa, modelo, cor_veiculo, valor, data_lavagem 
            from 
                tb_veiculos
            order by 
                id DESC
        ';

        $stmt = $this->conexao->prepare($query);
        
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // com paginação
    public function recemDoDia($limit, $offset){

        $query = "
        select
            id, cera, resina, placa, modelo, cor_veiculo, valor, data_lavagem, hora_lavagem
        from 
            tb_veiculos
        where data_lavagem = :data_atual
        order by id DESC
        limit 
            $limit
        offset
            $offset
        ";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':data_atual', $this->veiculo->data_lavagem);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    // recuperar total de veiculos
    public function getTotalVeiculos(){
        $query = "
        select
            count(*) as total
        from 
            tb_veiculos
        where data_lavagem = :data_atual
        
        ";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':data_atual', $this->veiculo->data_lavagem);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTotelVeiculoData(){
        $query = "
        select
            count(*) as total
        from 
            tb_veiculos
            where data_lavagem = :data_atual
        ";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':data_atual', $this->veiculo->data_lavagem);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function recemDoDiaTotais(){
        
        $query = '
        select
            id, cera, resina, placa, modelo, cor_veiculo, valor, data_lavagem, hora_lavagem
        from 
            tb_veiculos
        where data_lavagem = :data_atual
        order by id DESC
        
        ';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':data_atual', $this->veiculo->data_lavagem);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function recemAdicionadosHistorico(){
        
        $query = "
            select
                id, cera, resina, placa, modelo, cor_veiculo, valor, data_lavagem 
            from 
                tb_veiculos
            order by 
                id DESC
        ";

        $stmt = $this->conexao->prepare($query);
        
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function recemVeiculosTotal(){
        $query = '
            select
                id, cera, resina, placa, modelo, cor_veiculo, valor, data_lavagem 
            from 
                tb_veiculos
            order by 
                id DESC
        ';

        $stmt = $this->conexao->prepare($query);
        
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function removerVeiculo(){
        $idRemover = $this->veiculo->id;

        $query = '
            delete from tb_veiculos where id = :id;
        ';

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id', $idRemover);
        $stmt->execute();
    }
    public function atualizar(){
        
        $query = "
            update tb_veiculos set placa = :placa where id = :id;
            update tb_veiculos set modelo = :modelo where id = :id;
            update tb_veiculos set cor_veiculo = :cor_veiculo where id = :id;
            update tb_veiculos set cera = :cera where id = :id;
            update tb_veiculos set resina = :resina where id = :id;
            update tb_veiculos set valor = :valor where id = :id;
            update tb_veiculos set data_lavagem = :data_lavagem where id = :id;

        ";

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id', $this->veiculo->__get('id'));
        $stmt->bindValue(':placa', $this->veiculo->__get('placa'));
        $stmt->bindValue(':modelo', $this->veiculo->__get('modelo'));
        $stmt->bindValue(':cor_veiculo', $this->veiculo->__get('cor_veiculo'));
        $stmt->bindValue(':cera', $this->veiculo->__get('cera'));
        $stmt->bindValue(':resina', $this->veiculo->__get('resina'));
        $stmt->bindValue(':valor', $this->veiculo->__get('valor'));
        $stmt->bindValue(':data_lavagem', $this->veiculo->__get('data_lavagem'));
  
        return $stmt->execute();
    }

    public function hitoricoVeiculosComum(){
        $query = '
            SELECT COUNT(*) as total from tb_veiculos;
        ';
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function valorTotalComum(){
        $query = '
            SELECT SUM(valor) as total from tb_veiculos;
        ';
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function filtrandoVeiculos(){
        $query = "
            select * from tb_veiculos where data_lavagem like :filtro order by id DESC
        ";

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':filtro', '%'.$this->veiculo->__get('data_lavagem').'%');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>