<?php

namespace Src\Model;

use Src\_public\Util;
use Src\Model\Conexao;
use Src\VO\ServicoVO;
use Src\Model\SQL\ServicoSQL;


class ServicoDAO extends Conexao{

    private $conexao;

    public function __construct()
    {
        $this->conexao = parent::retornaConexao();
        
    }

    public function RetornarServicoDAO()
    {
        $sql = $this->conexao->prepare(ServicoSQL::RetornarServicoSQL());
        $sql->bindValue(1, Util::EmpresaLogado());
        $sql->execute();

        return $sql->fetchAll(\PDO::FETCH_ASSOC);

    }


}