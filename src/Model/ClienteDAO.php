<?php

namespace Src\Model;

use Src\Model\Conexao;
use Src\VO\ClienteVO;
use Src\Model\SQL\ClienteSQL;

class ClienteDAO extends Conexao
{

    private $conexao;

    public function __construct()
    {
        $this->conexao = parent::retornaConexao();
    }

    public function CadastrarClienteDAO(ClienteVO $vo): int
    {
        $sql = $this->conexao->prepare(ClienteSQL::INSERT_CLIENTE_SQL());
        $i = 1;
        $sql->bindValue($i++, $vo->getCliNome());
        $sql->bindValue($i++, $vo->getCliDtNasc());
        $sql->bindValue($i++, $vo->getCliTelefone());
        $sql->bindValue($i++, $vo->getCliEmail());
        $sql->bindValue($i++, $vo->getCliCep());
        $sql->bindValue($i++, $vo->getCliEndereco());
        $sql->bindValue($i++, $vo->getCliNumero());
        $sql->bindValue($i++, $vo->getCliBairro());
        $sql->bindValue($i++, $vo->getCliCidade());
        $sql->bindValue($i++, $vo->getCliEstado());
        $sql->bindValue($i++, $vo->getCliDescricao());
        $sql->bindValue($i++, $vo->getCliEmpID());
        $sql->bindValue($i++, $vo->getCliStatus());
        $sql->bindValue($i++, $vo->getCliUserID());
        $sql->bindValue($i++, $vo->getCliCpfCnpj());
        $sql->bindValue($i++, $vo->getCilTipo());

        try {
            $sql->execute();
            return 1;
        } catch (\Exception $ex) {
            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    }

    public function AlterarClienteDAO(ClienteVO $vo): int
    {
        $sql = $this->conexao->prepare(ClienteSQL::UPDATE_CLIENTE_SQL());
        $i = 1;
        $sql->bindValue($i++, $vo->getCliNome());
        $sql->bindValue($i++, $vo->getCliDtNasc());
        $sql->bindValue($i++, $vo->getCliTelefone());
        $sql->bindValue($i++, $vo->getCliEmail());
        $sql->bindValue($i++, $vo->getCliCep());
        $sql->bindValue($i++, $vo->getCliEndereco());
        $sql->bindValue($i++, $vo->getCliNumero());
        $sql->bindValue($i++, $vo->getCliBairro());
        $sql->bindValue($i++, $vo->getCliCidade());
        $sql->bindValue($i++, $vo->getCliEstado());
        $sql->bindValue($i++, $vo->getCliDescricao());
        $sql->bindValue($i++, $vo->getCilTipo());
        $sql->bindValue($i++, $vo->getCliID());
        $sql->bindValue($i++, $vo->getCliEmpID());

        try {
            $sql->execute();
            return 1;
        } catch (\Exception $ex) {
            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    }

    public function AlterarStatusClienteDAO(ClienteVO $vo): int
    {
        $sql = $this->conexao->prepare(ClienteSQL::UPDATE_STATUS_CLIENTE_SQL());
        $i = 1;
        $sql->bindValue($i++, $vo->getCliStatus());
        $sql->bindValue($i++, $vo->getCliID());
        $sql->bindValue($i++, $vo->getCliEmpID());

        try {
            $sql->execute();
            return 1;
        } catch (\Exception $ex) {
            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    }

    public function SelecionarClienteDAO($CliEmpID)
    {
        $sql = $this->conexao->prepare(ClienteSQL::SELECT_CLIENTE_SQL());
        $i = 1;
        $sql->bindValue($i++, $CliEmpID);
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function DetalharClienteDAO($CliID, $CliEmpID)
    {
        $sql = $this->conexao->prepare(ClienteSQL::DETAIL_CLIENTE_SQL());
        $i = 1;
        $sql->bindValue($i++, $CliID);
        $sql->bindValue($i++, $CliEmpID);
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
}
