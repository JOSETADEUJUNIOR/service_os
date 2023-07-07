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
    private $id_produto_equipamento;
    private $id_servico_equipamento;
    


    # Get Set ID
    public function setId($id)
    {

        $this->id = $id;
    }

    public function getId()
    {

        return $this->id;
    }

    public function setIdServicoEquipamento($id_servico_equipamento)
    {

        $this->id_servico_equipamento = $id_servico_equipamento;
    }

    public function getIdServicoEquipamento()
    {
        return $this->id_servico_equipamento;
        //return explode(",", $this->id_servico_equipamento);
    }

    public function setIdProdutoEquipamento($id_produto_equipamento)
    {

        $this->id_produto_equipamento = $id_produto_equipamento;
    }

    public function getIdProdutoEquipamento()
    {
        return $this->id_produto_equipamento;
        //return explode(",", $this->id_produto_equipamento);
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
