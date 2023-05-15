<?php

namespace Src\Controller;

use Src\Model\ClienteDAO;
use Src\VO\ClienteVO;
use Src\_public\Util;


class ClienteController
{
    private $dao;

    public function __construct()
    {
        $this->dao = new ClienteDAO;
    }

    public function CadastrarClienteCTRL(ClienteVO $vo): int
    {
        if (empty($vo->getCliNome()) || empty($vo->getCliTelefone()) || empty($vo->getCliEmail()) || empty($vo->getCliCep()) || empty($vo->getCliEndereco()) || empty($vo->getCliNumero()) || empty($vo->getCliBairro()) || empty($vo->getCliCidade()) || empty($vo->getCliEstado()))
            return 0;
        
        $vo->setCliStatus(STATUS_ATIVO);
        $vo->setfuncao(CADASTRO_CLIENTE);
        $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->CadastrarClienteDAO($vo);
    }

    public function AlterarClienteCTRL(ClienteVO $vo): int
    {
        if (empty($vo->getCliNome()) || empty($vo->getCliTelefone()) || empty($vo->getCliEmail()) || empty($vo->getCliCep()) || empty($vo->getCliEndereco()) || empty($vo->getCliNumero()) || empty($vo->getCliBairro()) || empty($vo->getCliCidade()) || empty($vo->getCliEstado()))
            return 0;

        $vo->setfuncao(ALTERA_CLIENTE);
        $vo->setIdLogado(Util::CodigoLogado());
        return $this->dao->AlterarClienteDAO($vo);
    }

    public function AlterarStatusClienteCTRL(ClienteVO $vo): int
    {
        $vo->setCliStatus($vo->getCliStatus() == STATUS_ATIVO ? STATUS_INATIVO : STATUS_ATIVO);
        $vo->setCliEmpID(Util::EmpresaLogado());
        $vo->setfuncao(STATUS_CLIENTE);
        $vo->setIdLogado(Util::CodigoLogado());
        return $this->dao->AlterarStatusClienteDAO($vo);
    }

    public function SelecioneClienteCTRL(): array
    {
        $dados = $this->dao->SelecionarClienteDAO(); 
        for ($i = 0; $i < count($dados); $i++){
            $dados[$i]['CliDtNasc'] = Util::ExibirDataBr($dados[$i]['CliDtNasc']);
        }
        return $dados;
    }

    public function FiltrarClienteCTRL($nome_filtro)
    {
        $dados = $this->dao->FiltrarClienteDAO($nome_filtro);
        for ($i = 0; $i < count($dados); $i++){
            $dados[$i]['CliDtNasc'] = Util::ExibirDataBr($dados[$i]['CliDtNasc']);
        }
        return $dados;
    }
}
