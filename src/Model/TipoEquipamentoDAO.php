<?php

namespace Src\Model;

use Src\Model\Conexao;
use Src\VO\TipoEquipamentoVO;
use Src\Model\SQL\TipoEquipamento;

class TipoEquipamentoDAO extends Conexao
{

    private $conexao;
    public function __construct()
    {
        $this->conexao = parent::retornaConexao();
    }

    public function CadastrarTipo(TipoEquipamentoVO $vo): int
    {

        $sql = $this->conexao->prepare(TipoEquipamento::InserirTipo());
        $sql->bindValue(1, $vo->getNome());

        try {
            $sql->execute();
            return 1;
        } catch (\Exception $ex) {
         
         $vo->setmsg_erro($ex->getMessage());
         parent::GravarLogErro($vo);
            return -1;
        }
    }


    public function RetornarTipoEquipamentoDAO(){

        $sql = $this->conexao->prepare(TipoEquipamento::RetornarTiposEquipamentos());
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }


    public function FiltrarTipoEquipamentoDAO($nome_filtro){

        $sql = $this->conexao->prepare(TipoEquipamento::FiltrarTipoEquipamentoSQL($nome_filtro));
        if(!empty($nome_filtro)){

            $sql->bindValue(1, "%" . $nome_filtro . "%");
        }
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }


    public function AlterarTipoEquipamentoDAO(TipoEquipamentoVO $vo):int
    {
        $sql = $this->conexao->prepare(TipoEquipamento::AlterarTipoEquipamentoSQL());
        $sql->bindValue(1, $vo->getNome());
        $sql->bindValue(2, $vo->getID());

        try {
            $sql->execute();
            return 1;
        } catch (\Exception $ex) {
            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -2;
        }
    }

    public function ExcluirTipoEquipamentoDAO(TipoEquipamentoVO $vo):int
    {
        $sql = $this->conexao->prepare(TipoEquipamento::ExcluirTipoEquipamentoSQL());
        $sql->bindValue(1, $vo->getID());
        
        try{
            $sql->execute();
            return 1;
        } catch (\Exception $ex){
            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -2;
        }

    }
}
