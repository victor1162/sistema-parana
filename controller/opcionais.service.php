<?php

class OpcionaisService{
    private $conexao;
    private $opcionais;

    public function __construct(Conexao $conexao, Opcionais $opcionais){
        $this->conexao = $conexao->conectar();
        $this->opcionais = $opcionais;
    }

    public function adicionarOpcionais(){
        $query = '
        insert into 
            tb_opcionais(lavagem_especiais, placa, modelo, chassi, motor_baixo, motor_cima, motor_completo_chassi, ducha, ducha_secagem, ducha_acab_exter, lavagem_simples, lavagem_cera, lavagem_resina, lavagem_cera_resina, valor, data_lavagem, hora_lavagem)
            values(:lavagem_especiais, :placa, :modelo, :chassi, :motor_baixo, :motor_cima, :motor_completo_chassi, :ducha, :ducha_secagem, :ducha_acab_exter, :lavagem_simples, :lavagem_cera, :lavagem_resina, :lavagem_cera_resina, :valor, :data_lavagem, :hora_lavagem)
        ';
        $stmt = $this->conexao->prepare($query);

        $stmt->bindValue(':lavagem_especiais', $this->opcionais->__get('lavagem_especiais'));
        $stmt->bindValue(':placa', $this->opcionais->__get('placa'));
        $stmt->bindValue(':modelo', $this->opcionais->__get('modelo'));
        $stmt->bindValue(':chassi', $this->opcionais->__get('chassi'));
        $stmt->bindValue(':motor_baixo', $this->opcionais->__get('motor_baixo'));
        $stmt->bindValue(':motor_cima', $this->opcionais->__get('motor_cima'));
        $stmt->bindValue(':motor_completo_chassi', $this->opcionais->__get('motor_completo_chassi'));
        $stmt->bindValue(':ducha', $this->opcionais->__get('ducha'));
        $stmt->bindValue(':ducha_secagem', $this->opcionais->__get('ducha_secagem'));
        $stmt->bindValue(':ducha_acab_exter', $this->opcionais->__get('ducha_acab_exter'));
        $stmt->bindValue(':lavagem_simples', $this->opcionais->__get('lavagem_simples'));
        $stmt->bindValue(':lavagem_cera', $this->opcionais->__get('cera'));
        $stmt->bindValue(':lavagem_resina', $this->opcionais->__get('resina'));
        $stmt->bindValue(':lavagem_cera_resina', $this->opcionais->__get('lavagem_cera_resina'));
        $stmt->bindValue(':valor', $this->opcionais->__get('valor'));
        $stmt->bindValue(':data_lavagem', $this->opcionais->__get('data_lavagem'));
        $stmt->bindValue(':hora_lavagem', $this->opcionais->__get('hora_lavagem'));

        $stmt->execute();
    }
    public function recemOpcionais(){
        $query = "
            select 
                id, placa, modelo, chassi, motor_baixo, motor_cima, motor_completo_chassi, ducha, ducha_secagem, ducha_acab_exter, lavagem_simples, lavagem_cera, lavagem_resina, lavagem_cera_resina, valor, data_lavagem, hora_lavagem
            from
                tb_opcionais
            where data_lavagem = :data_atual
            order by id DESC
            ";

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':data_atual', $this->opcionais->data_lavagem);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function recemOpcionaisTotal(){
        $query = "
            select 
                id, placa, modelo, chassi, motor_baixo, motor_cima, motor_completo_chassi, ducha, ducha_secagem, ducha_acab_exter, lavagem_simples, lavagem_cera, lavagem_resina, lavagem_cera_resina, valor, data_lavagem, hora_lavagem
            from
                tb_opcionais
            order by id DESC
            ";

        $stmt = $this->conexao->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function recemOpcionaisDoDia($limit, $offset){

        $query = "
        select
            id, placa, modelo, chassi, motor_baixo, motor_cima, motor_completo_chassi, ducha, ducha_secagem, ducha_acab_exter, lavagem_simples, lavagem_cera, lavagem_resina, lavagem_cera_resina, valor, data_lavagem, hora_lavagem
        from
            tb_opcionais
            where data_lavagem = :data_lavagem
        order by id DESC
        limit
            $limit
        offset
            $offset
        ";

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':data_lavagem', $this->opcionais->data_lavagem);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getTotalOpcionais(){
        $query = "
            select
                count(*) as total
            from 
                tb_opcionais
            where data_lavagem = :data_atual
        ";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':data_atual', $this->opcionais->data_lavagem);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function recemOpcionaisHistorico(){
        
        $query = "
            select 
                id, placa, modelo, chassi, motor_baixo, motor_cima, motor_completo_chassi, ducha, ducha_secagem, ducha_acab_exter, lavagem_simples, lavagem_cera, lavagem_resina, lavagem_cera_resina, valor, data_lavagem, hora_lavagem
            from
                tb_opcionais
            order by id DESC
            ";

        $stmt = $this->conexao->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function removerEspeciais(){

        $query = '
            delete from tb_opcionais where id = :id;
        ';

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id', $this->opcionais->id);
        $stmt->execute();
    }
    public function historicoEspeciais(){
        $query = '
            SELECT COUNT(*) as total from tb_opcionais;
        ';
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function valorTotalEspeciais(){
        $query = '
            SELECT SUM(valor) as total from tb_opcionais;
        ';
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function filtrandoOpcionais(){
        $query = "
            select * from tb_opcionais where data_lavagem like :filtro order by id DESC
        ";

        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':filtro', '%'.$_POST['data'].'%');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>