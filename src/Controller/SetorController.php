<?php

namespace Src\Controller;

use Src\Model\SetorDAO;
use Src\VO\SetorVO;
use Src\_public\Util;


class SetorController
{

    private $dao;

    public function __construct()
    {
        $this->dao = new SetorDAO;
    }

    public function CadastrarSetor(SetorVO $vo): int
    {
        if (empty($vo->getNomeSetor()))
            return 0;

        $vo->setfuncao(CADASTRO_SETOR);
        $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->CadastrarSetor($vo);
    }
    public function RetornarSetorController(): array
    {
        return $this->dao->RetornarSetorDAO();
    }

    public function AlterarSetorController(SetorVO $vo): int
    {
        if (empty($vo->getNomeSetor()))
            return 0;

        $vo->setfuncao(ALTERA_SETOR);
        $vo->setIdLogado(Util::CodigoLogado());
        return $this->dao->AlterarSetorDAO($vo);
    }

    public function ExcluirSetorController(SetorVO $vo): int
    {
        if (empty($vo->getID()))
            return 0;

        $vo->setfuncao(EXCLUI_SETOR);
        $vo->setIdLogado(Util::CodigoLogado());
        return $this->dao->ExcluirSetorDAO($vo);
    }
    public function FiltrarSetorController($nome_filtro)
    {

        return $this->dao->FiltrarSetorDAO($nome_filtro);
    }
}
