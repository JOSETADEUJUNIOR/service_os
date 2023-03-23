<?php

namespace Src\VO;

use Src\_public\Util;

class LogErro
{

    private $idLogado;
    private $hora;
    private $data;
    private $msg_erro;
    private $funcao;



    public function getHoraErro()
    {

        $this->hora = Util::HoraAtual();
        return $this->hora;
    }

    public function getDataErro()
    {
        $this->data = Util::DataAtual();
        return $this->data;
    }



    public function setIdLogado($id): void
    {
        $this->idLogado = $id;
    }

    public function getIdLogado(): int
    {
        return $this->idLogado;
    }

    public function setmsg_erro($p): void
    {
        $this->msg_erro = $p;
    }

    public function getmsg_erro(): string
    {
        return $this->msg_erro;
    }

    public function setfuncao($p): void
    {
        $this->funcao = $p;
    }

    public function getfuncao(): string
    {
        return $this->funcao;
    }
}
