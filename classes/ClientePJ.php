<?php

require_once 'ClienteNota.php';
require_once 'ClienteEnderecoCobranca.php';

class ClientePJ extends Cliente implements ClienteNota, ClienteEnderecoCobranca {

    public $cnpj;
    public $razaoSocial;

    public function __construct($id, $tipo, $razaoSocial, $cnpj, $endereco, $numero,
                                $cep, $bairro, $cidade, $uf, $email, $telefone, $celular, $nota) {

        //criar um construtor inicial para atribuir valores
        $this->id  = $id;
        $this->tipo = $tipo;
        $this->razaoSocial = $razaoSocial;
        $this->cnpj = $cnpj;
        $this->endereco = $endereco;
        $this->numero = $numero;
        $this->cep = $cep;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->uf = $uf;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->celular = $celular;

        //atribuindo valores do CNPJ e Razao Social ao campo CPF e Nome (para aproveitar listagem)
        $this->setCpf($cnpj);
        $this->setNome($razaoSocial);

        //recuperando valores
        $this->cpf = $this->getCpf();
        $this->nome = $this->getNome();

        //definindo quantas estrelas o cliente possui
        $this->setNota($nota);


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