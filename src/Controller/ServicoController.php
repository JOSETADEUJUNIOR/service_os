<?php

namespace Src\Controller;

use Src\Model\ServicoDAO;
use Src\VO\ServicoVO;
use Src\_public\Util;

class ServicoController {

    private $dao;

    public function __construct()
    {
        $this->dao = new ServicoDAO;
        
    }

    public function CadastrarServico(ServicoVO $vo): int
    {

        if (empty($vo->getServNome()) || empty($vo->getServValor()))

            return 0;

        $vo->setfuncao(CADASTRO_SERVICO);
        $vo->setIdLogado(Util::CodigoLogado());
        $vo->setServUserID(Util::CodigoLogado());
        $vo->setServEmpID(Util::EmpresaLogado());

        return $this->dao->CadastrarServico($vo);
    }

     public function ConsultarServicoController($ServNome, $filtro_palavra): array
    {
        if (empty(trim($filtro_palavra))) {
            return 0;
        }
        return $this->dao->ConsultarServicoDAO($ServNome, $filtro_palavra);
    } 

    public function ConsultarServicoAllController(): array
    {
        return $this->dao->ConsultarServicoAllDAO();
    } 

    public function DetalharServicoController($id)
    {
        if (empty(trim($id))) {
            return 0;
        }
        return $this->dao->DetalharServicoDAO($id);
    }

    public function RetornarServicoController()
    {
        return $this->dao->RetornarServicoDAO();
    }

     public function FiltrarServicoController($ServNome_filtro)
    {

        return $this->dao->FiltrarServicoDAO($ServNome_filtro);
    } 

    public function AlterarServicoController(ServicoVO $vo): int
    {
        if (empty($vo->getServNome()))
            return 0;

        $vo->setfuncao(ALTERA_SERVICO);
        $vo->setIdLogado(Util::CodigoLogado());

        $vo->setServUserID(Util::CodigoLogado());
        $vo->setServEmpID(Util::EmpresaLogado());
        return $this->dao->CadastrarServico($vo);
    }

    public function ExcluirServicoController(ServicoVO $vo): int
    {
        if (empty($vo->getServID()))
            return 0;

        $vo->setfuncao(EXCLUI_SERVICO);
        $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->ExcluirServicoDAO($vo);
    }
}