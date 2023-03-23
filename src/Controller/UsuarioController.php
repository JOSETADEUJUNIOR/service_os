<?php

namespace Src\Controller;

use Src\Model\UsuarioDAO;
use Src\_public\Util;
use Src\VO\UsuarioVO;

class UsuarioController
{
    private $dao;
    public function __construct()
    {
        $this->dao = new UsuarioDAO;
    }

    public function VerificarEmailController($email, $id = ''): bool
    {
        return $this->dao->VerificarEmailDuplicadoDAO($id, $email);
    }

    public function MudarStatusController(UsuarioVO $vo)
    {
        $vo->setStatus($vo->getStatus() == STATUS_ATIVO ? STATUS_INATIVO : STATUS_ATIVO);
        $vo->setFuncao(MUDAR_STATUS);
        $vo->setIdLogado(Util::CodigoLogado());
        return $this->dao->MudarStatusDAO($vo);
    }


    public function CadastrarPermissao($telas)
    {
        var_dump($telas);
    }


    public function CadastrarUsuarioController($vo)
    {

        if ($vo->getTipo() == PERFIL_FUNCIONARIO) {

            if (empty($vo->getSetor())) {
                return 0;
            }
        } else if ($vo->getTipo() == PERFIL_TECNICO) {
            if (empty($vo->getNomeEmpresa())) {
                return 0;
            }
        }

        $vo->setStatus(STATUS_ATIVO);
        $vo->setSenha(Util::CriarSenha($vo->getLogin()));

        $vo->setFuncao(CADASTRO_USUARIO);
        $vo->setIdLogado(Util::CodigoLogado());

        return $this->dao->CadastrarUsuarioDAO($vo);
    }
    public function AlterarUsuarioController($vo)
    {
        if (empty($vo->getNome()) || empty($vo->getTelefone()) || empty($vo->getRua()) || empty($vo->getCep()) || empty($vo->getNomeCidade())) {
            return 0;
        }

        if ($vo->getTipo() == PERFIL_FUNCIONARIO) {

            if (empty($vo->getSetor())) {
                return 0;
            }
        } else if ($vo->getTipo() == PERFIL_TECNICO) {
            if (empty($vo->getNomeEmpresa())) {
                return 0;
            }
        }

        $vo->setStatus(STATUS_ATIVO);
        $vo->setSenha(Util::CriarSenha($vo->getLogin()));

        $vo->setFuncao(ALTERA_USUARIO);
        $vo->setIdLogado(Util::CodigoLogado() == 0 ? $vo->getId() : Util::CodigoLogado());

        return $this->dao->AlterarUsuarioDAO($vo);
    }

    public function FiltrarPessoaController($nome, $tipo)
    {
        return $this->dao->FiltrarPessoaDAO($nome, $tipo);
    }
    public function FiltrarUsuariosController()
    {
        return $this->dao->RetornarUsuariosDAO();
    }

    public function DetalharUsuarioController($idUser)
    {
        return $this->dao->DetalharUsuarioDAO($idUser);
    }


    public function ValidarSenhaAtual($id, $senha)
    {
        if (Util::AuthenticationTokenAccess()) {
            if (empty($id) || empty($senha)) {
                return 0;
            }
            $user_senha = $this->dao->RecuperarSenhaAtual($id);

            if (password_verify($senha, $user_senha['senha'])) {
                return 1;
            } else {
                return -1;
            }
        } else {
            return NAO_AUTORIZADO;
        }
    }

    public function ValidarLoginController($login, $senha)
    {
        $usuario = '';
        if (empty($login) || empty($senha)) {
            return 0;
        }

        $usuario = $this->dao->ValidarLoginDAO($login, STATUS_ATIVO);

        if (empty($usuario)) {
            return -4;
        }
        if ($usuario['tipo'] == PERFIL_FUNCIONARIO || $usuario['tipo'] == PERFIL_TECNICO) {

            return -10;
        }

        # testar variavel para ver se encontrou o usuario com login digitado.
        #testando a senha digitada/criptografada
        if (!Util::ValidarSenhaBanco($senha, $usuario['senha'])) {
            return -3;
        } else {
            Util::CriarSessao($usuario['id'], $usuario['nome']);
            Util::chamarPagina('index.php');
        }
    }

    public function ValidarAcessoFuncionarioAPI($email, $senha)
    {
        if (empty($email) || empty($senha)) {
            return 0;
        }

        $usuario = $this->dao->ValidarAcesso($email, STATUS_ATIVO, PERFIL_FUNCIONARIO);
        if ($usuario == '') {
            return -4;
        } else {
            if (password_verify($senha, $usuario['senha'])) {

                $dados_usuario = [
                    'funcionario_id' => $usuario['id'],
                    'nome'           => $usuario['nome'],
                    'setor_id'       => $usuario['setor_id'],
                    'tipo'           => $usuario['tipo']
                ];

                $token = Util::CreateTokenAuthentication($dados_usuario);
                return $token;
            } else {
                return -3;
            }
        }
    }
    public function ValidarAcessoTecnicoAPI($email, $senha)
    {
        if (empty($email) || empty($senha)) {
            return 0;
        }

        $usuario = $this->dao->ValidarAcesso($email, STATUS_ATIVO, PERFIL_TECNICO);
        if ($usuario == '') {
            return -4;
        } else {
            if (password_verify($senha, $usuario['senha'])) {

                $dados_usuario = [
                    'tecnico_id'     => $usuario['id'],
                    'nome'           => $usuario['nome'],
                    'tipo'           => $usuario['tipo']
                ];

                $token = Util::CreateTokenAuthentication($dados_usuario);
                return $token;
            } else {
                return -3;
            }
        }
    }

    public function AtualizarSenhaAtual(UsuarioVO $vo, $repetir_senha)
    {
        if (empty($vo->getSenha()) || empty($vo->getId())) {
            return 0;
        }
        if (strlen($vo->getSenha()) < 6) {
            return -2;
        }
        if ($vo->getSenha() != $repetir_senha) {
            return -4;
        }

        $vo->setSenha(Util::RetornarSenhaCriptografada($vo->getSenha()));

        $vo->setFuncao(MUDAR_SENHA);
        $vo->setIdLogado(Util::CodigoLogado() == 0 ? $vo->getId() : Util::CodigoLogado());


        return $this->dao->AtualizarSenhaAtual($vo);
    }
}
