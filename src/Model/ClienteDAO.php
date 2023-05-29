<?php

namespace Src\Model;

use Src\_public\Util;
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
        $sql->bindValue($i++, Util::EmpresaLogado());
        $sql->bindValue($i++, $vo->getCliStatus());
        $sql->bindValue($i++, Util::CodigoLogado());
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
        $sql->bindValue($i++, $vo->getCliCpfCnpj());
        $sql->bindValue($i++, $vo->getCilTipo());
        $sql->bindValue($i++, $vo->getCliID());
        $sql->bindValue($i++, Util::EmpresaLogado());

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

    public function SelecionarClienteDAO($empresa_id, $tipo)
    {
        $sql = $this->conexao->prepare(ClienteSQL::SELECT_CLIENTE_SQL());
        $i = 1;
        if ($tipo == PERFIL_FUNCIONARIO) {
            $sql->bindValue($i++, $empresa_id);
            
        }else if ($tipo == '') {
            
            $sql->bindValue($i++, Util::EmpresaLogado());
        }
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function FiltrarClienteDAO($nome_filtro)
    {
        $sql = $this->conexao->prepare(ClienteSQL::FILTER_CLIENTE_SQL($nome_filtro));
        $i = 1;
        $sql->bindValue($i++, Util::EmpresaLogado());
        if (!empty($nome_filtro)) {
            $sql->bindValue($i++, "%" . $nome_filtro . "%");
        }
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function DetalharClienteOSDAO($empresa_id, $tipo, $cliente_id)
    {
        $sql = $this->conexao->prepare(ClienteSQL::RETORNA_CLIENTE_OS_SQL());
        $i = 1;
        if ($tipo == PERFIL_FUNCIONARIO) {
            $sql->bindValue($i++, $cliente_id);
            $sql->bindValue($i++, $empresa_id);
            
        }
        $sql->execute();
        return $sql->fetch(\PDO::FETCH_ASSOC);
    }
    public function EmailDuplicadoClienteDAO()
    {
        $sql = $this->conexao->prepare(ClienteSQL::EMAIL_DUPLICADO_CLIENTE_SQL());
        $i = 1;
        $sql->bindValue($i++, Util::EmpresaLogado());
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function EmailDuplicadoUsuarioDAO()
    {
        $sql = $this->conexao->prepare(ClienteSQL::EMAIL_DUPLICADO_USUARIO_SQL());
        $i = 1;
        $sql->bindValue($i++, Util::EmpresaLogado());
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
}
