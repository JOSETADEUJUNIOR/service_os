<?php

namespace Src\VO;


use Src\_public\Util;
use Src\VO\UsuarioVO;

class FuncionarioVO extends UsuarioVO
{
    private $setor;

    # Get Set ID

    # Get Set da descricao
    public function setSetor($setor)
    {

        $this->setor = Util::TratarDados($setor);
    }

    public function getSetor()
    {

        return $this->setor;
    }
}
