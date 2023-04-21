<?php
namespace Src\VO;

use Src\_public\Util;

class ClienteVO extends LogErro{
    private $CliID;
    private $CliNome;
    private $CliDtNasc;
    private $CliTelefone;
    private $CliEmail;
    private $CliCep;
    private $CliEndereco;
    private $CliNumero;
    private $CliBairro;
    private $CliCidade;
    private $CliEstado;
    private $CliDescricao;
    private $CliEmpID;
    private $CliStatus;
    private $CliUserID;
    private $CliCpfCnpj;
    private $CilTipo;

    public function setCliID($CliID)
    {
        $this->CliID = Util::TratarDados($CliID);
    }

    public function getCliID()
    {
        return $this->CliID;
    }
    
    public function setCliNome($CliNome)
    {
        $this->CliNome = Util::TratarDados($CliNome);
    }

    public function getCliNome()
    {
        return $this->CliNome;
    } 

    public function setCliDtNasc($CliDtNasc)
    {
        $this->CliDtNasc = Util::TratarDados($CliDtNasc);
    }

    public function getCliDtNasc()
    {
        return $this->CliDtNasc;
    } 

    public function setCliTelefone($CliTelefone)
    {
        $this->CliTelefone = Util::TratarDados($CliTelefone);
    }

    public function getCliTelefone()
    {
        return $this->CliTelefone;
    } 

    public function setCliEmail($CliEmail)
    {
        $this->CliEmail = Util::TratarDados($CliEmail);
    }

    public function getCliEmail()
    {
        return $this->CliEmail;
    } 

    public function setCliCep($CliCep)
    {
        $this->CliCep = Util::TratarDados($CliCep);
    }

    public function getCliCep()
    {
        return $this->CliCep;
    }
    
    public function setCliEndereco($CliEndereco)
    {
        $this->CliEndereco = Util::TratarDados($CliEndereco);
    }

    public function getCliEndereco()
    {
        return $this->CliEndereco;
    } 

    public function setCliNumero($CliNumero)
    {
        $this->CliNumero = Util::TratarDados($CliNumero);
    }

    public function getCliNumero()
    {
        return $this->CliNumero;
    } 

    public function setCliBairro($CliBairro)
    {
        $this->CliBairro = Util::TratarDados($CliBairro);
    }

    public function getCliBairro()
    {
        return $this->CliBairro;
    }
    
    public function setCliCidade($CliCidade)
    {
        $this->CliCidade = Util::TratarDados($CliCidade);
    }

    public function getCliCidade()
    {
        return $this->CliCidade;
    }

    public function setCliEstado($CliEstado)
    {
        $this->CliEstado = Util::TratarDados($CliEstado);
    }

    public function getCliEstado()
    {
        return $this->CliEstado;
    }

    public function setCliDescricao($CliDescricao)
    {
        $this->CliDescricao = Util::TratarDados($CliDescricao);
    }

    public function getCliDescricao()
    {
        return $this->CliDescricao;
    }

    public function setCliEmpID($CliEmpID)
    {
        $this->CliEmpID = Util::TratarDados($CliEmpID);
    }

    public function getCliEmpID()
    {
        return $this->CliEmpID;
    }

    public function setCliStatus($CliStatus)
    {
        $this->CliStatus = Util::TratarDados($CliStatus);
    }

    public function getCliStatus()
    {
        return $this->CliStatus;
    }

    public function setCliUserID($CliUserID)
    {
        $this->CliUserID = Util::TratarDados($CliUserID);
    }

    public function getCliUserID()
    {
        return $this->CliUserID;
    }

    public function setCliCpfCnpj($CliCpfCnpj)
    {
        $this->CliCpfCnpj = Util::TratarDados($CliCpfCnpj);
    }

    public function getCliCpfCnpj()
    {
        return $this->CliCpfCnpj;
    }

    public function setCilTipo($CilTipo)
    {
        $this->CilTipo = Util::TratarDados($CilTipo);
    }

    public function getCilTipo()
    {
        return $this->CilTipo;
    }
}
?>