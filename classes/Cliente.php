<?php

class Cliente {

    public $id;
    public $nome;
    public $cnpjcpf;
    public $endereco;
    public $numero;
    public $cep;
    public $bairro;
    public $cidade;
    public $uf;
    public $email;
    public $telefone;
    public $celular;

    public function __construct($id, $nome, $cnpjcpf, $endereco, $numero,
                                $cep, $bairro, $cidade, $uf, $email, $telefone, $celular) {

        //criar um construtor inicial para atribuir valores
        $this->id  = $id;
        $this->nome = $nome;
        $this->cnpjcpf = $cnpjcpf;
        $this->endereco = $endereco;
        $this->numero = $numero;
        $this->cep = $cep;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->uf = $uf;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->celular = $celular;

    }

} 