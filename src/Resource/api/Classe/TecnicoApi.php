<?php

namespace Src\Resource\api\Classe;

use Src\_public\Util;
use Src\Controller\ChamadoController;
use Src\Resource\api\Classe\ApiRequest;
use Src\Controller\UsuarioController;
use Src\Controller\EquipamentoController;
use Src\VO\UsuarioVO;
use Src\VO\ChamadoVO;
use Src\VO\TecnicoVO;

class TecnicoApi extends ApiRequest
{

    private $ctrl_user;
    private $params;

    public function AddParameters($p)
    {
        $this->params = $p;
    }

    public function CheckEndPoint($endpoint)
    {
        return method_exists($this, $endpoint);
    }

    public function __construct()
    {
        $this->ctrl_user = new UsuarioController;
    }

    public function Autenticar()
    {
        return (new UsuarioController)->ValidarAcessoTecnicoAPI($this->params['email'], $this->params['senha']);
    }


    public function DetalharMeusDados()
    {
        if (Util::AuthenticationTokenAccess()){
            if (empty($this->params['id_user'])) {
                return 0;
            }
            return $this->ctrl_user->DetalharUsuarioController($this->params['id_user']);
        }else{
            return NAO_AUTORIZADO;
        }



    }

    public function AtenderChamado()
    {
        if (Util::AuthenticationTokenAccess()) {
            $vo = new ChamadoVO;

            $vo->setId($this->params['id_chamado']);
            $vo->setTecnico_atendimento($this->params['id_tec']);

            return (new ChamadoController)->AtenderChamadoController($vo);
        }else{
            return NAO_AUTORIZADO;
        }
    }


    public function AlterarMeusDados()
    {
        if (Util::AuthenticationTokenAccess()) {
            $vo = new TecnicoVO;

            $vo->setId($this->params['id_user']);
            $vo->setNome($this->params['nome']);
            $vo->setLogin($this->params['login']);
            $vo->setTelefone($this->params['telefone']);
            $vo->setIdEndereco($this->params['id_end']);
            $vo->setRua($this->params['rua']);
            $vo->setBairro($this->params['bairro']);
            $vo->setCep($this->params['cep']);
            $vo->setEstado($this->params['estado']);
            $vo->setNomeCidade($this->params['cidade']);
            $vo->setTipo(PERFIL_TECNICO);
            $vo->setNomeEmpresa($this->params['empresa']);

            return (new UsuarioController)->AlterarUsuarioController($vo);
        }else{
            return NAO_AUTORIZADO;
        }
    }

    public function FiltrarChamadoAberto(){
        if (Util::AuthenticationTokenAccess()) {
            return (new ChamadoController)->FiltrarChamadoAbertoController();
        }else{
            return NAO_AUTORIZADO;
        }
    }
    public function FiltrarChamadoGeral()
    {
        if (Util::AuthenticationTokenAccess()) {
            return (new ChamadoController)->FiltrarChamadoGeralController($this->params['situacao'], $this->params['id_setor'] ?? '');
        }else{
            return NAO_AUTORIZADO;
        }
        }

    public function FinalizarChamado()
    {
        if (Util::AuthenticationTokenAccess()) {
            $vo = new ChamadoVO;
            $vo->setId($this->params['id_chamado']);
            $vo->setTecnicoEncerramento($this->params['id_tec']);
            $vo->setLaudoTecnico($this->params['laudo']);
            $vo->setAlocar($this->params['id_alocado']);

            return (new ChamadoController)->FinalizarChamadoController($vo);
        }else{
            return NAO_AUTORIZADO;
        }
    }




    /* public function AbrirChamado()
    {
        $vo = new ChamadoVO();

        $vo->setId($this->params['id_user']);
        $vo->setDescrciaoProblema($this->params['problema']);
        $vo->setAlocar($this->params['id_alocar']);

        return (new ChamadoController)->AbrirChamadoController($vo);
    }

    public function SelecionarEquipamentosAlocadosSetorController()
    {
        if (empty($this->params['id_setor'])) {
            return 0;
        }

        return (new EquipamentoController)->SelecionarEquipamentosAlocadosSetorController($this->params['id_setor']);
    }

    public function FiltrarChamado()
    {
        return (new ChamadoController)->FiltrarChamadoController($this->params['situacao']);
    }
*/
    public function VerificarSenhaAtual()
    {

        return (new UsuarioController)->ValidarSenhaAtual($this->params['id'], $this->params['senha']);
    }
    public function AtualizarSenha()
    {
        $vo = new UsuarioVO;

        $vo->setId($this->params['id']);
        $vo->setSenha($this->params['senha']);
        return (new UsuarioController)->AtualizarSenhaAtual($vo, $this->params['repetir_senha']);
    }
    
}
