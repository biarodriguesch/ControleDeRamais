<?php

class RamalService {
    private $conexao;
    private $ramal;

    public function __construct(Conexao $conexao, Ramal $ramal){
        $this->conexao = $conexao->conectar();
        $this->ramal = $ramal;
    }

    public function inserir() {  //CREATE
        "INSERT INTO ramais(ramal, nome, `status`, ip) VALUES(:ramal, :nome, :sts, :ip)";
    }

    public function atualizar() {  //UPDATE
        "UPDATE ramais SET ramal = :ramal, nome = :nome, `status` = :sts, ip = :ip WHERE ramal = :ramal";
    }
}

?>