<?php

namespace Src\Model;

use Src\Model\Conexao;
use Src\VO\LoteVO;
use Src\VO\Lote_insumoVO;
use Src\VO\Lote_servicoVO;
use Src\Model\SQL\LoteSQL;
use Src\_public\Util;

class LoteDAO extends Conexao
{

    private $conexao;

    public function __construct()
    {
        $this->conexao = parent::retornaConexao();
    }

    public function CadastrarLoteDAO($vo): int
    {
        try {
            $this->conexao->beginTransaction();
    
            $sql = $this->conexao->prepare(LoteSQL::InserirLote());
            $i = 1;
            $sql->bindValue($i++, $vo->getNumero_lote());
            $sql->bindValue($i++, $vo->getEmpresa_id());
            /* $sql->bindValue($i++, $vo->getEquipamento_id());
            $sql->bindValue($i++, $vo->getVersao());
            $sql->bindValue($i++, $vo->getNumero_serie());
             */
    
            $sql->execute();
            $idLote = $this->conexao->lastInsertId();
            $quantidadeEquip = $vo->getQtdEquip();
    
            $sql = $this->conexao->prepare(LoteSQL::InserirLoteEquip());
            for ($j = 0; $j <= $quantidadeEquip; $j++) {
                $i = 1;
                $sql->bindValue($i++, $idLote);
                $sql->bindValue($i++, $vo->getEquipamento_id());
                $sql->execute();
            }
    
            $this->conexao->commit();
    
            return 1;
        } catch (\Exception $ex) {
            $this->conexao->rollBack();
            /* $vo->setmsg_erro($ex->getMessage());
            parent::GravarLogErro($vo); */
            return -1;
        }
    }

    public function FiltrarLoteDAO($empresa)
    {
        $sql = $this->conexao->prepare(LoteSQL::FiltrarLoteSQL());
        $sql->bindValue(1, $empresa);
        $sql->execute();
        return $sql->fetchAll(\PDO::FETCH_ASSOC);
    }



    
    

}
