<?php

namespace Src\Resource\api\Classe;

use Src\Controller\ChamadoController;
use Src\Resource\api\Classe\ApiRequest;
use Src\Controller\UsuarioController;
use Src\VO\FuncionarioVO;
use Src\Controller\EquipamentoController;
use Src\Controller\ProdutoController;
use Src\Controller\ClienteController;
use Src\VO\ChamadoVO;
use Src\VO\UsuarioVO;

class FuncionarioApi extends ApiRequest
{

    private $params;

    public function AddParameters($p)
    {
        $this->params = $p;
    }

    public function CheckEndPoint($endpoint)
    {
        return method_exists($this, $endpoint);
    }

    public function DetalharMeusDados()
    {

        if (empty($this->params['id_user'])) {
            return 0;
        }

        return (new UsuarioController)->DetalharUsuarioController($this->params['id_user']);
    }

    public function AlterarMeusDados()
    {
        $vo = new FuncionarioVO;

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
        $vo->setTipo(PERFIL_FUNCIONARIO);
        $vo->setSetor($this->params['id_setor']);

        return (new UsuarioController)->AlterarUsuarioController($vo);
    }

    public function AbrirChamado()
    {
        $vo = new ChamadoVO();

        $vo->setId($this->params['id_user']);
        $vo->setDescrciaoProblema($this->params['problema']);
        $vo->setNumero_nf($this->params['numero_nf']);
        $vo->setDefeito($this->params['defeito']);
        $vo->setObservacao($this->params['observacao']);
        $vo->setCliente_id($this->params['cliente_id']);
        $vo->setEmpresa_id($this->params['empresa_id']);
        return (new ChamadoController)->AbrirChamadoController($vo);
    }

    public function SelecionarEquipamentosAlocadosSetorController()
    {
        if (empty($this->params['id_setor'])) {
            return 0;
        }

        return (new EquipamentoController)->SelecionarEquipamentosAlocadosSetorController($this->params['id_setor']);
    }

    public function RetornarProdutos()
    {
        return (new ProdutoController)->SelecioneProdutoCTRL();
    }
    public function RetornarClientes()
    {
        return (new ClienteController)->SelecioneClienteCTRL();
    }
    public function FiltrarChamado()
    {
        return (new ChamadoController)->FiltrarChamadoController($this->params['situacao'], $this->params['id_setor']);
    }

    public function FiltrarChamadoGeral()
    {
        return (new ChamadoController)->FiltrarChamadoGeralController($this->params['empresa_id'], $this->params['situacao'], $this->params['id_setor'] ?? '');
    }

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
    public function Autenticar()
    {
        return (new UsuarioController)->ValidarAcessoFuncionarioAPI($this->params['email'], $this->params['senha']);
    }
}
