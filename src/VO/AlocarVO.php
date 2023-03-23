<?php

namespace Src\VO;
use Src\_public\Util;
use Src\VO\LogErro;

class AlocarVO extends LogErro
{
    private $idAlocar;
    private $situacao;
    private $data_alocacao;
    private $data_remocao;
    private $equipamento_id;
    private $setor_id;

    # Get Set id da locação
    public function setIdAlocar($idAlocar)
    {

        $this->idAlocar = $idAlocar;
    }

    public function getIdAlocar()
    {

        return $this->idAlocar;
    }

    # Get Set id da locação
    public function setSituacao($situacao)
    {

        $this->situacao = $situacao;
    }

    public function getSituacao()
    {

        return $this->situacao;
    }


    # Get Set id da locação
    public function setDataAlocacao($data_alocacao)
    {

        $this->data_alocacao = $data_alocacao;
    }

    public function getDataAlocacao()
    {

        return $this->data_alocacao;
    }


    # Get Set id da locação
    public function setDataRemocao($data_remocao)
    {

        $this->data_remocao = $data_remocao;
    }

    public function getDataRemocao()
    {

        return $this->data_remocao;
    }


    # Get Set id da locação
    public function setEquipamentoID($equipamento_id)
    {

        $this->equipamento_id = $equipamento_id;
    }

    public function getEquipamentoID()
    {

        return $this->equipamento_id;
    }


    # Get Set id da locação
    public function setSetorID($setor_id)
    {

        $this->setor_id = $setor_id;
    }

    public function getSetorID()
    {

        return $this->setor_id;
    }    
    
}
