<?php

namespace Src\Model;

use Src\Model\Conexao;
use Src\VO\SetorVO;
use Src\Model\SQL\Setor;
use Src\_public\Util;

class SetorDAO extends Conexao
{

    private $conexao;

    public function __construct()
    {
        $this->conexao = parent::retornaConexao();
    }

    public function CadastrarSetor(SetorVO $vo): int
    {
        $sql = $this->conexao->prepare(Setor::InserirSetor());
        $sql->bindValue(1, $vo->getNomeSetor());
        $sql->bindValue(2, Util::EmpresaLogado());

        try {
            $sql->execute();
            return 1;
        } catch (\Exception $ex) {
            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    }

    public function FiltrarSetorDAO($nome_filtro)
    {

        $sql = $this->conexao->prepare(Setor::FiltrarSetorSQL($nome_filtro));
        $sql->bindValue(1, Util::EmpresaLogado());
        if (!empty($nome_filtro)) {

            $sql->bindValue(2, "%" . $nome_filtro . "%");
        }
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function RetornarSetorDAO()
    {
        $sql = $this->conexao->prepare(Setor::RetornarSetor());
        $sql->bindValue(1, Util::EmpresaLogado());
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function AlterarSetorDAO(SetorVO $vo): int
    {
        $sql = $this->conexao->prepare(Setor::AlterarSetor());
        $sql->bindValue(1, $vo->getNomeSetor());
        $sql->bindValue(2, $vo->getID());
        $sql->bindValue(3, Util::EmpresaLogado());
        try {
            $sql->execute();
            return 1;
        } catch (\Exception $ex) {
            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -2;
        }
    }

    public function ExcluirSetorDAO(SetorVO $vo): int
    {
        $sql = $this->conexao->prepare(Setor::ExcluirSetor());
        $sql->bindValue(1, $vo->getID());
        $sql->bindValue(2, Util::EmpresaLogado());

        try {
            $sql->execute();
            return 1;
        } catch (\Exception $ex) {
            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -2;
        }
    }
}
