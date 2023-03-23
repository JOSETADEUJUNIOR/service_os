<?php

namespace Src\Model;
use Src\Model\Conexao;
use Src\VO\ModeloEquipVO;
use Src\Model\SQL\Modelo;


class ModeloDAO extends Conexao{

    private $conexao;

    public function __construct()
    {
        $this->conexao = parent::retornaConexao();
        
    }

    public function CadastrarModelo(ModeloEquipVO $vo): int
    {
        $sql = $this->conexao->prepare(Modelo::InserirModelo());
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
    
    public function RetornaModeloDAO()
    {
        $sql = $this->conexao->prepare(Modelo::RetornaModelo());
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function FiltrarModeloDAO($nome_filtro){

        $sql = $this->conexao->prepare(Modelo::FiltrarModeloSQL($nome_filtro));
        if(!empty($nome_filtro)){

            $sql->bindValue(1, "%" . $nome_filtro . "%");
        }
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }



    public function AlterarModeloDAO(ModeloEquipVO $vo): int
    {
        $sql = $this->conexao->prepare(Modelo::AlterarModeloSQL());
        $sql->bindValue(1, $vo->getNome());
        $sql->bindValue(2, $vo->getID());

        try{
            $sql->execute();
            return 1;
        } catch (\Exception $ex) {
            $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo);
            return -2;
        }
    }

    public function ExcluirModeloDAO(ModeloEquipVO $vo): int
    {
        $sql = $this->conexao->prepare(Modelo::ExcluirModeloSQL());
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