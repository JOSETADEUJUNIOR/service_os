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
        $this->CliID = Util::remove_especial_char($CliID);
    }

    public function getCliID()
    {
        return $this->CliID;
    }
    
    public function setCliNome($CliNome)
    {
        $this->CliNome = Util::remove_especial_char($CliNome);
    }

    public function getCliNome()
    {
        return $this->CliNome;
    } 

    public function setCliDtNasc($CliDtNasc)
    {
        $this->CliDtNasc = Util::remove_especial_char($CliDtNasc);
    }

    public function getCliDtNasc()
    {
        return $this->CliDtNasc;
    } 

    public function setCliTelefone($CliTelefone)
    {
        $this->CliTelefone = Util::remove_especial_char($CliTelefone);
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
        $this->CliCep = Util::remove_especial_char($CliCep);
    }

    public function getCliCep()
    {
        return $this->CliCep;
    }
    
    public function setCliEndereco($CliEndereco)
    {
        $this->CliEndereco = Util::remove_especial_char($CliEndereco);
    }

    public function getCliEndereco()
    {
        return $this->CliEndereco;
    } 

    public function setCliNumero($CliNumero)
    {
        $this->CliNumero = Util::remove_especial_char($CliNumero);
    }

    public function getCliNumero()
    {
        return $this->CliNumero;
    } 

    public function setCliBairro($CliBairro)
    {
        $this->CliBairro = Util::remove_especial_char($CliBairro);
    }

    public function getCliBairro()
    {
        return $this->CliBairro;
    }
    
    public function setCliCidade($CliCidade)
    {
        $this->CliCidade = Util::remove_especial_char($CliCidade);
    }

    public function getCliCidade()
    {
        return $this->CliCidade;
    }

    public function setCliEstado($CliEstado)
    {
        $this->CliEstado = Util::remove_especial_char($CliEstado);
    }

    public function getCliEstado()
    {
        return $this->CliEstado;
    }

    public function setCliDescricao($CliDescricao)
    {
        $this->CliDescricao = Util::remove_especial_char($CliDescricao);
    }

    public function getCliDescricao()
    {
        return $this->CliDescricao;
    }

    public function setCliEmpID($CliEmpID)
    {
        $this->CliEmpID = Util::remove_especial_char($CliEmpID);
    }

    public function getCliEmpID()
    {
        return $this->CliEmpID;
    }

    public function setCliStatus($CliStatus)
    {
        $this->CliStatus = Util::remove_especial_char($CliStatus);
    }

    public function getCliStatus()
    {
        return $this->CliStatus;
    }

    public function setCliUserID($CliUserID)
    {
        $this->CliUserID = Util::remove_especial_char($CliUserID);
    }

    public function getCliUserID()
    {
        return $this->CliUserID;
    }

    public function setCliCpfCnpj($CliCpfCnpj)
    {
        $this->CliCpfCnpj = Util::remove_especial_char($CliCpfCnpj);
    }

    public function getCliCpfCnpj()
    {
        return $this->CliCpfCnpj;
    }

    public function setCilTipo($CilTipo)
    {
        $this->CilTipo = Util::remove_especial_char($CilTipo);
    }

    public function getCilTipo()
    {
        return $this->CilTipo;
    }
}
?>