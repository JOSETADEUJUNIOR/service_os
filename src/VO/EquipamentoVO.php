<?php

namespace Src\VO;


use Src\_public\Util;
use Src\VO\LogErro;

class EquipamentoVO extends LogErro
{
    private $id;
    private $identificacao;
    private $descricao;
    private $tipoequip_id;
    private $modeloequip_id;
    


    # Get Set ID
    public function setId($id)
    {

        $this->id = $id;
    }

    public function getId()
    {

        return $this->id;
    }

    # Get Set Identificacao
    public function setIdentificacao($identificacao)
    {

        $this->identificacao = Util::TratarDados($identificacao);
    }

    public function getIdentificacao()
    {

        return $this->identificacao;
    }


    # Get Set da descricao
    public function setDescricao($descricao)
    {

        $this->descricao = Util::TratarDados($descricao);
    }

    public function getDescricao()
    {

        return $this->descricao;
    }


    # Get Set ID do Tipo do Equip
    public function setTipoEquipID($tipoequip_id)
    {

        $this->tipoequip_id = $tipoequip_id;
    }

    public function getTipoEquipID()
    {

        return $this->tipoequip_id;
    }


    # Get Set modelo equip ID
    public function setModeloEquipID($modeloequip_id)
    {

        $this->modeloequip_id = $modeloequip_id;
    }

    public function getModeloEquipID()
    {

        return $this->modeloequip_id;
    }


}
