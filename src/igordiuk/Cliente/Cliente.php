<?php

namespace igordiuk\Cliente;

use igordiuk\Cliente\ClienteNota;
use igordiuk\Cliente\ClienteEnderecoCobranca;

class Cliente implements ClienteNota, ClienteEnderecoCobranca  {

    public $id;
    public $tipo;
    public $cpf;
    public $nome;
    public $endereco;
    public $numero;
    public $cep;
    public $bairro;
    public $cidade;
    public $uf;
    public $email;
    public $telefone;
    public $celular;

    //interface Nota
    public $nota;

    //interface Cobranca
    public $enderecoCobranca;
    public $numeroCobranca;
    public $cepCobranca;
    public $bairroCobranca;
    public $cidadeCobranca;
    public $ufCobranca;

    public function __construct($id, $tipo, $nome, $cpf, $endereco, $numero,
                                $cep, $bairro, $cidade, $uf, $email, $telefone, $celular, $nota) {

        //criar um construtor inicial para atribuir valores
        $this->id  = $id;
        $this->tipo = $tipo;
        $this->cpf = $cpf;
        $this->nome = $nome;
        $this->endereco = $endereco;
        $this->numero = $numero;
        $this->cep = $cep;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->uf = $uf;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->celular = $celular;

        $this->nota = $nota;

    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getCpf() {
        return $this->cpf;
    }

    #interface Classificacao
    public function setNota($nota) {
        $this->nota = $nota;
    }

    public function getNota() {
        return $this->nota;
    }

    #interface EnderecoCobranca
    public function setEnderecoCobranca($enderecoCobranca) {
        $this->enderecoCobranca = $enderecoCobranca;
    }

    public function getEnderecoCobranca() {
        return $this->enderecoCobranca;
    }

    public function setNumeroCobranca($numeroCobranca) {
        $this->numeroCobranca = $numeroCobranca;
    }

    public function getNumeroCobranca() {
        return $this->numeroCobranca;
    }

    public function setCepCobranca($cepCobranca) {
        $this->cepCobranca = $cepCobranca;
    }

    public function getCepCobranca() {
        return $this->cepCobranca;
    }

    public function setBairroCobranca($bairroCobranca) {
        $this->bairroCobranca = $bairroCobranca;
    }

    public function getBairroCobranca() {
        return $this->bairroCobranca;
    }

    public function setCidadeCobranca($cidadeCobranca) {
        $this->cidadeCobranca = $cidadeCobranca;
    }

    public function getCidadeCobranca() {
        return $this->cidadeCobranca;
    }

    public function setUFCobranca($ufCobranca) {
        $this->ufCobranca = $ufCobranca;
    }

    public function getUFCobranca() {
        return $this->ufCobranca;
    }

    public function setCobrancaCompleto($enderecoCobranca, $numeroCobranca, $cepCobranca,
                                        $bairroCobranca, $cidadeCobranca, $ufCobranca) {
        #cria uma especie de construtor para as informacoes do endereco de cobranca
        $this->enderecoCobranca = $enderecoCobranca;
        $this->numeroCobranca = $numeroCobranca;
        $this->cepCobranca = $cepCobranca;
        $this->bairroCobranca = $bairroCobranca;
        $this->cidadeCobranca = $cidadeCobranca;
        $this->ufCobranca = $ufCobranca;
    }

} 