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
        var_dump('Chegouuu!');

        if (empty($vo->getServNome()) || empty($vo->getServValor()) || empty($vo->getServDescricao()) || empty($vo->ServEmpID()) || empty($vo->ServUserID()))

            return 0;

        $vo->setfuncao(CADASTRO_SERVICO);
        $vo->setIdLogado(Util::CodigoLogado());

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

    public function DetalharServiçoController($id)
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
        return $this->dao->AlterarServicoDAO($vo);
    }

    public function ExcluirServicoController(ServicoVO $vo): int
    {
        if (empty($vo->getID()))
            return 0;

        $vo->setfuncao(EXCLUI_SERVICO);
        $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->ExcluirServicoDAO($vo);
    }
}