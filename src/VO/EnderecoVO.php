<?php

namespace Src\VO;


use Src\_public\Util;
use Src\VO\LogErro;

class EnderecoVO extends LogErro
{
    private $idEndereco;
    private $rua;
    private $bairro;
    private $cep;
    private $idCidade;
    private $nomeCidade;
    private $siglaEstado;

    # Get Set id Endereco
    public function setIdEndereco($idEndereco)
    {

        $this->idEndereco = $idEndereco;
    }

    public function getIdEndereco()
    {

        return $this->idEndereco;
    }

    # Get Set Rua
    public function setRua($rua)
    {
        $this->rua = $rua;
    }
    public function getRua()
    {
        return $this->rua;
    }
    # Get Set Bairro
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
    }
    public function getBairro()
    {
        return $this->bairro;
    }
    # Get Set Cep
    public function setCep($cep)
    {
        $this->cep = $cep;
    }
    public function getCep()
    {
        return $this->cep;
    }
    # Get Set Id Cidade
    public function setIdCidade($idCidade)
    {
        $this->idCidade = $idCidade;
    }
    public function getIdCidade()
    {
        return $this->idCidade;
    }
    # Get Set Id User
    public function setEstado($p)
    {
        $this->siglaEstado = $p;
    }
    public function getEstado()
    {
        return $this->siglaEstado;
    }

    public function setNomeCidade($p)
    {
        $this->nomeCidade = $p;
    }
    public function getNomeCidade()
    {
        return $this->nomeCidade;
    }
}
