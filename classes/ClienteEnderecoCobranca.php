<?php

interface ClienteEnderecoCobranca {

    public function setEnderecoCobranca($enderecoCobranca);

    public function getEnderecoCobranca();

    public function setNumeroCobranca($numeroCobranca);

    public function getNumeroCobranca();

    public function setCepCobranca($cepCobranca);

    public function getCepCobranca();

    public function setBairroCobranca($bairroCobranca);

    public function getBairroCobranca();

    public function setCidadeCobranca($cidadeCobranca);

    public function getCidadeCobranca();

    public function setUFCobranca($ufCobranca);

    public function getUFCobranca();

    public function setCobrancaCompleto($enderecoCobranca, $numeroCobranca, $cepCobranca,
                                        $bairroCobranca, $cidadeCobranca, $ufCobranca);


} 