<?php

namespace Src\VO;

use Src\_public\Util;
use Src\VO\UsuarioVO;

class TecnicoVO extends UsuarioVO
{

    private $empresa_tecnico;

    #get set do Tipo

    public  function setNomeEmpresa($empresa)
    {
        $this->empresa_tecnico = Util::TratarDados($empresa);
    }
    public function getNomeEmpresa()
    {
        return $this->empresa_tecnico;
    }
}
