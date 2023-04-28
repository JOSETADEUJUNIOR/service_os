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

const CADASTRO_SERVICO = 'CadastrarServico';
const ALTERA_SERVICO = 'AlterarServico';
const EXCLUI_SERVICO = 'ExcluirServicoController';

const ALTERA_EMPRESA = 'AlterarEmpresaController';

const CADASTRO_OS = 'CadastrarOsController';
const ALTERA_OS = 'AlterarOsController';
const FATURA_OS = 'FaturarOsController';
const EXCLUI_OS = 'ExcluirOsController';
const EXCLUI_ITEM_OS = 'ExcluirItemOSController';
const CADASTRO_ANX_OS = 'InserirAnxOrdemController';
const EXCLUIR_ANX = 'ExcluirAnxOSController';

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

const CADASTRO_PRODUTO = 'CadastrarProdutoController';
const ALTERA_PRODUTO = 'AlterarProdutoController';
const STATUS_PRODUTO = 'StatusProdutoController';

const CADASTRO_CLIENTE = 'CadastrarClienteController';
const ALTERA_CLIENTE = 'AlterarClienteController';
const STATUS_CLIENTE = 'StatusClienteController';

# Dados cliente
const TIPO_CLIENTE    = 1;
const TIPO_FORNECEDOR = 2;

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

# Situação da OS
const ORDEM_EM_ABERTO       = "A";
const ORDEM_EM_ANDAMENTO    = "EA";
const ORDEM_CANCELADA       = "C";
const ORDEM_CONCLUIDA       = "F";

#para acessos localhost
define('PATH_URL', $_SERVER["DOCUMENT_ROOT"] . '/service_os/src/');

define('SITE_ADMIN','http://localhost/service_os/src/View/admin/login.php');
define('SITE_FUNC', 'http://localhost/service_os_funcionario/src/View/login.php');
define('SITE_TEC', 'http://localhost/service_os_tecnico/src/View/login.php');

# para acesso em produção

/* define('SITE_ADMIN','https://siteparaseunegocio.com/service_os/src/View/admin/login.php');
define('SITE_FUNC', 'https://siteparaseunegocio.com/service_os_func/src/View/login.php');
define('SITE_TEC', 'https://siteparaseunegocio.com/service_os_tec/src/View/login.php'); */

const SECRET_JWT = 'tokenFunc';

const NAO_AUTORIZADO = -1000;
