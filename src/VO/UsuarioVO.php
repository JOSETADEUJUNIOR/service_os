<?php

namespace Src\VO;


use Src\_public\Util;
use Src\VO\EnderecoVO;

class UsuarioVO extends EnderecoVO
{
    private $id;
    private $tipo;
    private $nome;
    private $login;
    private $senha;
    private $telefone;
    private $status;
    private $UserEmpID;
    


    # Get Set ID
    public function setId($id)
    {

        $this->id = $id;
    }

    public function getId()
    {

        return $this->id;
    }

    public function setEmpID($UserEmpID)
    {

        $this->UserEmpID = $UserEmpID;
    }

    public function getEmpID()
    {

        return $this->UserEmpID;
    }

    # Get Set Identificacao
    public function setTipo($tipo)
    {

        $this->tipo = Util::TratarDados($tipo);
    }

    public function getTipo()
    {

        return $this->tipo;
    }


    # Get Set da descricao
    public function setLogin($l)
    {

        $this->login = Util::TratarDados($l);
    }

    public function getLogin()
    {

        return $this->login;
    }


    # Get Set ID do Tipo do Equip
    public function setNome($nome)
    {

        $this->nome = $nome;
    }

    public function getNome()
    {

        return $this->nome;
    }


    # Get Set modelo equip ID
    public function setSenha($s)
    {

        $this->senha = $s;
    }

    public function getSenha()
    {

        return $this->senha;
    }

    public function setTelefone($telefone)
    {

        $this->telefone = $telefone;
    }

    public function getTelefone()
    {

        return $this->telefone;
    }
    public function setStatus($s)
    {

        $this->status = $s;
    }
    public function getStatus()
    {

        return $this->status;
    }
   

}
