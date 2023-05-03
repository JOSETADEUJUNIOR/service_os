<?php

namespace Src\Model;

use Src\Model\Conexao;
use Src\VO\OsVO;
use Src\Model\SQL\Os;
use Src\_public\Util;
use Src\Model\SQL\Financeiro;
use Src\VO\ProdutoOSVO;
use Src\VO\ServicoOSVO;
use Src\VO\AnxOSVO;

class OsDAO extends Conexao
{

    private $conexao;

    public function __construct()
    {
        $this->conexao = parent::retornaConexao();
    }

    public function CadastrarOsDAO(OsVO $vo): int
    {
        $sql = $this->conexao->prepare(Os::InserirOsSQL());
        $sql->bindValue(1, $vo->getDtInicial());
        $sql->bindValue(2, $vo->getOsDtFinal());
        $sql->bindValue(3, $vo->getOsGarantia());
        $sql->bindValue(4, $vo->getOsDescProdServ());
        $sql->bindValue(5, $vo->getOsDefeito());
        $sql->bindValue(6, $vo->getOsObs());
        $sql->bindValue(7, $vo->getOsCliID());
        #$sql->bindValue(8, $vo->getOsTecID());
        $sql->bindValue(8, $vo->getOsStatus());
        $sql->bindValue(9, $vo->getOsLaudoTec());
        $sql->bindValue(10, Util::EmpresaLogado());
        $sql->bindValue(11, $vo->getOsNumeroNF());

        try {
            $sql->execute();
            $UltimoLancID = $this->conexao->lastInsertId();
            return $UltimoLancID ;
        } catch (\Exception $ex) {

            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    }



    public function AlterarOsDAO(OsVO $vo): int
    {
        $sql = $this->conexao->prepare(Os::AlterarOsSQL());
        $sql->bindValue(1, $vo->getDtInicial());
        $sql->bindValue(2, $vo->getOsDtFinal());
        $sql->bindValue(3, $vo->getOsGarantia());
        $sql->bindValue(4, $vo->getOsDescProdServ());
        $sql->bindValue(5, $vo->getOsDefeito());
        $sql->bindValue(6, $vo->getOsObs());
        $sql->bindValue(7, $vo->getOsCliID());
        $sql->bindValue(8, $vo->getOsTecID());
        $sql->bindValue(9, $vo->getOsStatus());
        $sql->bindValue(10, $vo->getOsLaudoTec());
        $sql->bindValue(11, Util::EmpresaLogado());
        $sql->bindValue(12, $vo->getID());

        try {
            $sql->execute();
            return 1;
        } catch (\Exception $ex) {

            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    }
    public function FaturarOsDAO(OsVO $vo): int
    {

        $sql = $this->conexao->prepare(Financeiro::InserirLancamentoSQL());
        $sql->bindValue(1, 'Receita da OS:' . $vo->getID() . '');
        $sql->bindValue(2, $vo->getOsValorTotal());
        $sql->bindValue(3, date('Y-m-d'));
        $sql->bindValue(4, date('Y-m-d'));
        $sql->bindValue(5, 'N');
        $sql->bindValue(6, 'D');
        $sql->bindValue(7, 1);
        $sql->bindValue(8, $vo->getOsCliID());
        $sql->bindValue(9, Util::EmpresaLogado());
        $sql->bindValue(10, Util::CodigoLogado());
        $sql->execute();

        $UltimoLancID = $this->conexao->lastInsertId();

        $sql = $this->conexao->prepare(Os::RetornarOrdemFaturadoSQL());
        $sql->bindValue(1, Util::EmpresaLogado());
        $sql->bindValue(2, $vo->getID());
        $sql->execute();

        $dadosOS = $sql->fetchAll(\PDO::FETCH_ASSOC);

        $statusFatura = $dadosOS[0]['OsFaturado'];

        if ($statusFatura == 'N') {
            $sql = $this->conexao->prepare(Os::FaturarOsSQL());
            $sql->bindValue(1, 'S');
            $sql->bindValue(2, $UltimoLancID);
            $sql->bindValue(3, Util::EmpresaLogado());
            $sql->bindValue(4, $vo->getID());
        } else {
            $sql = $this->conexao->prepare(Os::FaturarOsSQL());
            $sql->bindValue(1, 'N');
            $sql->bindValue(2, Util::EmpresaLogado());
            $sql->bindValue(3, $vo->getID());
        }
        try {
            $sql->execute();

            return 1;
        } catch (\Exception $ex) {

            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    }

    public function InserirItemOsDAO(ProdutoOSVO $vo): int
    {
        $sql = $this->conexao->prepare(Os::BuscarItemSQL());
        $sql->bindValue(1, $vo->getOsProdID());
        $sql->bindValue(2, Util::EmpresaLogado());
        $sql->execute();

        $dadosItem = $sql->fetchAll(\PDO::FETCH_ASSOC);
        $estoque = $dadosItem[0]['ProdEstoque'];
        $valor = $dadosItem[0]['ProdValorVenda'];
        $qtd = $vo->getProdQtd();
        if ($estoque < $qtd) {
            return -13;
        }

        $sql = $this->conexao->prepare(Os::AtualizaItemSQL());

        $sql->bindValue(1, $qtd);
        $sql->bindValue(2, $vo->getOsProdID());
        $sql->bindValue(3, Util::EmpresaLogado());
        $sql->execute();

        $SubTotal = $valor * $qtd;

        $sql = $this->conexao->prepare(Os::InserirItemOsSQL());
        $sql->bindValue(1, $vo->getProdQtd());
        $sql->bindValue(2, $vo->getOsID());
        $sql->bindValue(3, $vo->getOsProdID());
        $sql->bindValue(4, $SubTotal);
        $sql->bindValue(5, Util::EmpresaLogado());


        try {
            $sql->execute();

            $sql = $this->conexao->prepare(Os::AtualizaTotalOsSQL());
            $sql->bindValue(1, $SubTotal);
            $sql->bindValue(2, $vo->getOsID());
            $sql->bindValue(3, Util::EmpresaLogado());
            $sql->execute();

            return 1;
        } catch (\Exception $ex) {

            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    }

    public function InserirAnxOsDAO(AnxOSVO $vo): int
    {
        $sql = $this->conexao->prepare(Os::InserirAnxOsSQL());
        $sql->bindValue(1, $vo->getAnxNome());
        $sql->bindValue(2, $vo->getAnxUrl());
        $sql->bindValue(3, $vo->getAnxPath());
        $sql->bindValue(4, $vo->getAnxOsID());
        $sql->bindValue(5, Util::CodigoLogado());
        $sql->bindValue(6, Util::EmpresaLogado());


        try {
            $sql->execute();
            return 1;
        } catch (\Exception $ex) {

            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    }
    public function InserirServOsDAO(ServicoOSVO $vo): int
    {
        $sql = $this->conexao->prepare(Os::BuscarServSQL());
        $sql->bindValue(1, $vo->getOsServID());
        $sql->bindValue(2, Util::EmpresaLogado());
        $sql->execute();

        $dadosServ = $sql->fetchAll(\PDO::FETCH_ASSOC);
        $valor = $dadosServ[0]['ServValor'];
        $qtd = $vo->getServQtd();
        $SubTotal = $valor * $qtd;

        $sql = $this->conexao->prepare(Os::InserirServOsSQL());
        $sql->bindValue(1, $vo->getServQtd());
        $sql->bindValue(2, $vo->getOsID());
        $sql->bindValue(3, $vo->getOsServID());
        $sql->bindValue(4, $SubTotal);
        $sql->bindValue(5, Util::EmpresaLogado());


        try {
            $sql->execute();
            $sql = $this->conexao->prepare(Os::AtualizaTotalOsSQL());
            $sql->bindValue(1, $SubTotal);
            $sql->bindValue(2, $vo->getOsID());
            $sql->bindValue(3, Util::EmpresaLogado());
            $sql->execute();

            return 1;
        } catch (\Exception $ex) {

            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -1;
        }
    }

    public function RetornarOrdemDAO(OsVO $vo): array
    {
        $sql = $this->conexao->prepare(Os::RetornarOrdemSQL());
        $sql->bindValue(1, Util::EmpresaLogado());
        $sql->bindValue(2, $vo->getID());
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function RetornarProdOrdemDAO(OsVO $vo): array
    {
        $sql = $this->conexao->prepare(Os::RetornarProdOrdemSQL());
        $sql->bindValue(1, Util::EmpresaLogado());
        $sql->bindValue(2, $vo->getID());
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function RetornarServOrdemDAO(OsVO $vo): array
    {
        $sql = $this->conexao->prepare(Os::RetornarServOrdemSQL());
        $sql->bindValue(1, Util::EmpresaLogado());
        $sql->bindValue(2, $vo->getID());
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function RetornarAnxOSDAO(OsVO $vo): array
    {
        $sql = $this->conexao->prepare(Os::RetornarAnxOSSQL());
        $sql->bindValue(1, Util::EmpresaLogado());
        $sql->bindValue(2, $vo->getID());
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function RetornarOrdemServDAO(OsVO $vo): array
    {
        $sql = $this->conexao->prepare(Os::RetornarOrdemServSQL());
        $sql->bindValue(1, Util::EmpresaLogado());
        $sql->bindValue(2, $vo->getID());
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function ExcluirItemOSDAO(ProdutoOSVO $vo)
    {

        $sql = $this->conexao->prepare(Os::BuscarItemSQL());
        $sql->bindValue(1, $vo->getOsProdID());
        $sql->bindValue(2, Util::EmpresaLogado());
        $sql->execute();

        $dadosItem = $sql->fetchAll(\PDO::FETCH_ASSOC);
        $valor = $dadosItem[0]['ProdValorVenda'];
        $qtd = $vo->getProdQtd();

        $sql = $this->conexao->prepare(Os::AtualizaExcluiItemSQL());

        $sql->bindValue(1, $qtd);
        $sql->bindValue(2, $vo->getOsProdID());
        $sql->bindValue(3, Util::EmpresaLogado());
        $sql->execute();

        $sql = $this->conexao->prepare(Os::ExcluirItemOS());
        $sql->bindValue(1, $vo->getProdOsID());

        $sql->execute();


        $SubTotal = $valor * $qtd;

        try {
            $sql->execute();

            $sql = $this->conexao->prepare(Os::AtualizaExclusaoValorOsSQL());
            $sql->bindValue(1, $SubTotal);
            $sql->bindValue(2, $vo->getOsID());
            $sql->bindValue(3, Util::EmpresaLogado());
            $sql->execute();


            return 1;
        } catch (\Exception $ex) {
            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -2;
        }
    }

    public function ExcluirOSDAO(OSVO $vo)
    {

        $sql = $this->conexao->prepare(Os::ExcluirOS());
        $sql->bindValue(1, $vo->getID());

        try {
            $sql->execute();
            return 1;
        } catch (\Exception $ex) {
            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -2;
        }
    }

    public function RetornarDadosOsDAO()
    {
        $sql = $this->conexao->prepare(Os::RetornarDadosOS());
        $sql->bindValue(1, Util::EmpresaLogado());
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function ExcluirAnxOSDAO(AnxOSVO $vo)
    {

        $sql = $this->conexao->prepare(Os::ExcluirAnxOS());
        $sql->bindValue(1, $vo->getAnxID());
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


    public function ExcluirServOSDAO(ServicoOSVO $vo)
    {

        $sql = $this->conexao->prepare(Os::BuscarServSQL());
        $sql->bindValue(1, $vo->getOsServID());
        $sql->bindValue(2, Util::EmpresaLogado());
        $sql->execute();

        $dadosItem = $sql->fetchAll(\PDO::FETCH_ASSOC);
        $valor = $dadosItem[0]['ServValor'];
        $qtd = $vo->getServQtd();

        $sql = $this->conexao->prepare(Os::ExcluirServOS());
        $sql->bindValue(1, $vo->getID());

        $sql->execute();


        $SubTotal = $valor * $qtd;

        try {

            $sql = $this->conexao->prepare(Os::AtualizaExclusaoValorOsSQL());
            $sql->bindValue(1, $SubTotal);
            $sql->bindValue(2, $vo->getOsID());
            $sql->bindValue(3, Util::EmpresaLogado());
            $sql->execute();


            return 1;
        } catch (\Exception $ex) {
            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -2;
        }
    }
    public function FiltrarOsDAO($nome_filtro)
    {
        $sql = $this->conexao->prepare(Os::FiltrarOsSQL($nome_filtro));
        $sql->bindValue(1, Util::EmpresaLogado());
        if (!empty($nome_filtro) && is_numeric($nome_filtro)) {
            $sql->bindValue(2, $nome_filtro);
        }
        if (!empty($nome_filtro) && !is_numeric($nome_filtro)) {
            $sql->bindValue(2, "%" . $nome_filtro . "%");
        }
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function FiltrarStatusDAO($status_filtro, $filtroDe, $filtroAte)
    {
        $sql = $this->conexao->prepare(Os::FiltrarStatusSQL($status_filtro, $filtroDe, $filtroAte));
        $sql->bindValue(1, Util::EmpresaLogado());
        if (!empty($filtroDe) && !empty($filtroAte)) {
            $sql->bindValue(2, $filtroDe);
            $sql->bindValue(3, $filtroAte);
        }
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function RetornarOsDAO()
    {
        $sql = $this->conexao->prepare(Os::RetornarOsSQL());
        $sql->bindValue(1, Util::EmpresaLogado());
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function RetornarOsMesDAO()
    {
        $sql = $this->conexao->prepare(Os::RetornarOsMesSQL());
        $sql->bindValue(1, Util::EmpresaLogado());
        $sql->bindValue(2, date('Y-m-01'));
        $sql->bindValue(3, date('Y-m-t'));
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function RetornarOsClienteDAO($CliID, $tipo)
    {
        $sql = $this->conexao->prepare(Os::RetornarOsClienteSQL($CliID, $tipo));
        $sql->bindValue(1, Util::EmpresaLogado());
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }
}
