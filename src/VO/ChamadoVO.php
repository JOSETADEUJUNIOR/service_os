<?php

namespace Src\VO;


use Src\_public\Util;

class ChamadoVO extends TecnicoVO
{
    private $id;
    private $data_abertura;
    private $descricao_problema;
    private $data_atendimento;
    private $data_encerramento;
    private $laudo_tecnico;
    private $funcionario_id;
    private $tecnico_atendimento;
    private $tecnico_encerramento;
    private $alocar;
    private $situacao;



    # Get Set id da locação
    public function setId($id)
    {

        $this->id = $id;
    }

    public function getId()
    {

        return $this->id;
    }

    # Get Set id da locação
    public function setDataAbertura($data_abertura)
    {

        $this->data_abertura = $data_abertura;
    }

    public function getDataAbertura()
    {

        return $this->data_abertura;
    }


    # Get Set id da locação
    public function setDescrciaoProblema($descricao_problema)
    {

        $this->descricao_problema = $descricao_problema;
    }

    public function getDescrciaoProblema()
    {

        return $this->descricao_problema;
    }


    # Get Set id da locação
    public function setDataAtendimento($data_atendimento)
    {

        $this->data_atendimento = $data_atendimento;
    }

    public function getDataAtendimento()
    {

        return $this->data_atendimento;
    }


    # Get Set id da locação
    public function setDataEnceramento($data_encerramento)
    {

        $this->data_encerramento = $data_encerramento;
    }

    public function getDataEncerramento()
    {

        return $this->data_encerramento;
    }


    # Get Set id da locação
    public function setLaudoTecnico($laudo_tecnico)
    {

        $this->laudo_tecnico = Util::remove_especial_char($laudo_tecnico);
    }

    public function getLaudoTecnico()
    {

        return $this->laudo_tecnico;
    }

    # Get Set id da locação
    public function setFuncionarioID($funcionario_id)
    {

        $this->funcionario_id = $funcionario_id;
    }

    public function getFuncionarioID()
    {

        return $this->funcionario_id;
    }

    # Get Set id da locação
    public function setTecnicoAtendimento($tecnico_atendomento)
    {

        $this->tecnico_atendimento = $tecnico_atendomento;
    }

    public function getTecnicoAtendimento()
    {

        return $this->tecnico_atendimento;
    }

    # Get Set id da locação
    public function setTecnicoEncerramento($tecnico_encerramento)
    {

        $this->tecnico_encerramento = $tecnico_encerramento;
    }

    public function getTecnicoEncerramento()
    {

        return $this->tecnico_encerramento;
    }

    /**
     * Set the value of tecnico_atendimento
     *
     * @return  self
     */
    public function setTecnico_atendimento($tecnico_atendimento)
    {
        $this->tecnico_atendimento = $tecnico_atendimento;

        return $this;
    }

    /**
     * Get the value of tecnico_atendimento
     */
    public function getTecnico_atendimento()
    {
        return $this->tecnico_atendimento;
    }

    /**
     * Get the value of alocar
     */
    public function getAlocar()
    {
        return $this->alocar;
    }

    /**
     * Set the value of alocar
     *
     * @return  self
     */
    public function setAlocar($alocar)
    {
        $this->alocar = $alocar;

        return $this;
    }

    /**
     * Get the value of situacao
     */
    public function getSituacao()
    {
        return $this->situacao;
    }

    /**
     * Set the value of situacao
     *
     * @return  self
     */
    public function setSituacao($situacao)
    {
        $this->situacao = $situacao;

        return $this;
    }
}
