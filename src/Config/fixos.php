<?php

#FUNÇÕES

const REGISTRO_POR_PAGINA = 10;

const FILTRO_TIPO = 1;
const FILTRO_MODELO = 2;
const FILTRO_IDENTIFICACAO = 3;
const FILTRO_DESCRICAO = 4;

const CADASTRO_SETOR = 'CadastrarSetor';
const ALTERA_SETOR = 'AlterarSetor';
const EXCLUI_SETOR = 'ExcluirSetorController';

const CADASTRO_TIPO_EQUIPAMENTO = "CadastrarTipoEquipamento";
const ALTERAR_TIPO_EQUIPAMENTO = "AlterarTipoEquipamentoController";
const EXCLUIR_TIPO_EQUIPAMENTO = "ExcluirTipoEquipamento";
const CADASTRO_ALOCAR = 'AlocarEquipamentoController';

const CADASTRO_MODELO = 'CadastrarModelo';
const EXCLUIR_MODELO  = 'ExcluirModeloController';
const ALTERAR_MODELO  = 'AlterarModeloController';

const CADASTRO_EQUIPAMENTO = 'CadastrarEquipamentoController';
const ALTERA_EQUIPAMENTO = 'AlterarEquipamentoController';
const EXCLUI_EQUIPAMENTO = 'ExcluirEquipamentoController';

const CADASTRO_USUARIO = 'CadastrarUsuarioController';
const ALTERA_USUARIO = 'AlterarUsuarioController';
const MUDAR_STATUS = 'MudarStatusController';
const MUDAR_SENHA = 'AtualizarSenhaAtual';


const ABRIR_CHAMADO = 'AbrirChamadoController';
const ATENDER_CHAMADO = 'AtenderChamadoController';
const FINALIZAR_CHAMADO = 'FinalizarChamadoController';

# DADOS COMBO FILTRO
const PERFIL_ADM         = 1;
const PERFIL_FUNCIONARIO = 2;
const PERFIL_TECNICO     = 3;

const SITUACAO_ALOCADO = 1;
const SITUACAO_MANUTENCAO = 2;
const SITUACAO_REMOVIDO = 3;

const STATUS_ATIVO   = 1;
const STATUS_INATIVO = 0;

# Situação do atendimento
const SITUACAO_EM_ABERTO      = 1;
const SITUACAO_EM_ATENDIMENTO = 2;
const SITUACAO_ENCERRADO      = 3;
const SITUACAO_TODOS          = 4;

define('PATH_URL', $_SERVER["DOCUMENT_ROOT"] . '/service_os/src/');

define('SITE_ADMIN','http://localhost/service_os/src/View/admin/login.php');
define('SITE_FUNC', 'http://localhost/service_os_funcionario/src/View/login.php');
define('SITE_TEC', 'http://localhost/service_os_tecnico/src/View/login.php');

const SECRET_JWT = 'tokenFunc';

const NAO_AUTORIZADO = -1000;
