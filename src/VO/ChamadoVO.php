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
    private $numero_nf;
    private $defeito;
    private $observacao;
    private $cliente_id;
    private $empresa_id;



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

    /**
     * Get the value of numero_nf
     */ 
    public function getNumero_nf()
    {
        return $this->numero_nf;
    }

    /**
     * Set the value of numero_nf
     *
     * @return  self
     */ 
    public function setNumero_nf($numero_nf)
    {
        $this->numero_nf = $numero_nf;

        return $this;
    }
    

    /**
     * Get the value of defeito
     */ 
    public function getDefeito()
    {
        return $this->defeito;
    }

    /**
     * Set the value of defeito
     *
     * @return  self
     */ 
    public function setDefeito($defeito)
    {
        $this->defeito = $defeito;

        return $this;
    }

    /**
     * Get the value of observacao
     */ 
    public function getObservacao()
    {
        return $this->observacao;
    }

    /**
     * Set the value of observacao
     *
     * @return  self
     */ 
    public function setObservacao($observacao)
    {
        $this->observacao = $observacao;

        return $this;
    }

    /**
     * Get the value of cliente_id
     */ 
    public function getCliente_id()
    {
        return $this->cliente_id;
    }

    /**
     * Set the value of cliente_id
     *
     * @return  self
     */ 
    public function setCliente_id($cliente_id)
    {
        $this->cliente_id = $cliente_id;

        return $this;
    }

    /**
     * Get the value of empresa_id
     */ 
    public function getEmpresa_id()
    {
        return $this->empresa_id;
    }

    /**
     * Set the value of empresa_id
     *
     * @return  self
     */ 
    public function setEmpresa_id($empresa_id)
    {
        $this->empresa_id = $empresa_id;

        return $this;
    }
}
