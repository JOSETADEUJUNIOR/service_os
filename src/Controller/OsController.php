<?php

namespace Src\Controller;

use Src\Model\OsDAO;
use Src\VO\OsVO;
use Src\_public\Util;
use Src\VO\ProdutoOSVO;
use Src\VO\ServicoOSVO;
use Src\VO\AnxOSVO;

class OsController
{

    private $dao;

    public function __construct()
    {
        $this->dao = new OsDAO;
    }

    public function CadastrarOsController(OsVO $vo): int
    {
        if (empty($vo->getDtInicial()))
            return 0;

        $vo->setfuncao(CADASTRO_OS);
        $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->CadastrarOsDAO($vo);
    }

    public function InserirItemOrdemController(ProdutoOSVO $vo): int
    {
        if (empty($vo->getProdQtd()))
            return 0;

        $vo->setfuncao(CADASTRO_OS);
        $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->InserirItemOsDAO($vo);
    }
    public function InserirAnxOrdemController(AnxOSVO $vo): int
    {
        if (empty($vo->getAnxNome()))
            return 0;

        $vo->setfuncao(CADASTRO_ANX_OS);
        $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->InserirAnxOsDAO($vo);
    }
    public function InserirServOrdemController(ServicoOSVO $vo): int
    {
        if (empty($vo->getServQtd()))
            return 0;

        $vo->setfuncao(CADASTRO_OS);
        $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->InserirServOsDAO($vo);
    }

    public function RetornaOrdem(OsVO $vo): array
    {

        $vo->setfuncao(CADASTRO_OS);
        $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->RetornarOrdemDAO($vo);
    }

    public function RetornarDadosOsController(): array
    {
        return $this->dao->RetornarDadosOsDAO();
    }
    public function RetornaProdOrdem(OsVO $vo): array
    {
        $vo->setfuncao(CADASTRO_OS);
        $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->RetornarProdOrdemDAO($vo);
    }
    public function RetornaServOrdem(OsVO $vo): array
    {

        $vo->setfuncao(CADASTRO_OS);
        $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->RetornarServOrdemDAO($vo);
    }
    public function RetornaAnxOS(OsVO $vo): array
    {

        $vo->setfuncao(CADASTRO_OS);
        $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->RetornarAnxOSDAO($vo);
    }

    public function ExcluirItemOSController(ProdutoOSVO $vo)
    {
        $vo->setfuncao(EXCLUI_ITEM_OS);
        $vo->setIdLogado(Util::CodigoLogado());
        return $this->dao->ExcluirItemOSDAO($vo);
    }
    public function ExcluirOSController(OSVO $vo)
    {
        $vo->setfuncao(EXCLUI_OS);
        $vo->setIdLogado(Util::CodigoLogado());
        return $this->dao->ExcluirOSDAO($vo);
    }
    public function ExcluirAnxOSController(AnxOSVO $vo)
    {
        $vo->setfuncao(EXCLUIR_ANX);
        $vo->setIdLogado(Util::CodigoLogado());
        return $this->dao->ExcluirAnxOSDAO($vo);
    }

    public function ExcluirServOSController(ServicoOSVO $vo)
    {
        $vo->setfuncao(EXCLUI_ITEM_OS);
        $vo->setIdLogado(Util::CodigoLogado());
        return $this->dao->ExcluirServOSDAO($vo);
    }


    public function AlterarOsController(OsVO $vo): int
    {
        if (empty($vo->getID()))
            return 0;

        $vo->setfuncao(ALTERA_OS);
        $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->AlterarOsDAO($vo);
    }
    public function FaturarOsController(OsVO $vo): int
    {
        if (empty($vo->getID()))
            return 0;

        $vo->setfuncao(FATURA_OS);
        $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->FaturarOsDAO($vo);
    }


    public function RetornarOsController(): array
    {
        return $this->dao->RetornarOsDAO();
    }
    public function FiltrarOsController($nome_filtro)
    {
        return $this->dao->FiltrarOsDAO($nome_filtro);
    }
    public function FiltrarStatusController($status_filtro, $filtroDe, $filtroAte)
    {
        return $this->dao->FiltrarStatusDAO($status_filtro, $filtroDe, $filtroAte);
    }
    public function RetornarOsMesController(): array
    {
        return $this->dao->RetornarOsMesDAO();
    }
    public function RetornarOsClienteController($CliID, $tipo): array
    {
        return $this->dao->RetornarOsClienteDAO($CliID, $tipo);
    }
    public function RetornarOsServController(): array
    {
        return $this->dao->RetornarOsDAO();
    }
}
