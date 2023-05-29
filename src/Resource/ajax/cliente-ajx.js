function CadastrarCliente(id_form) {

    if (NotificarCampos(id_form)) {
        $.ajax({
            type: "POST",
            url: BASE_URL_AJAX("cliente_dataview"),
            data: {
                btn_cadastrar: 'ajx',
                CliID: $("#CliID").val(),
                CliNome: $("#CliNome").val(),
                CliDtNasc: $("#CliDtNasc").val(),
                CliCpfCnpj: $("#CliCpfCnpj").val(),
                CliTipo: $("#CliTipo").val(),
                CliTelefone: $("#CliTelefone").val(),
                CliEmail: $("#CliEmail").val(),
                cep: $("#cep").val(),
                endereco: $("#endereco").val(),
                bairro: $("#bairro").val(),
                CliNumero: $("#CliNumero").val(),
                cidade: $("#cidade").val(),
                estado: $("#estado").val(),
                CliDescricao: $("#CliDescricao").val()
            },
            success: function (ret) {
                $("#cliente").modal("hide");
                RemoverLoad();
                if (ret == '1') {
                    MensagemSucesso();
                    LimparCampos(id_form);
                    ConsultarCliente();
                } else {
                    MensagemErro();
                }
            }
        })
    }
    return false;
}

function ConsultarCliente() {
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("cliente_dataview"),
        data: {
            btn_consultar: 'ajx'
        }, success: function (tabela_preenchida) {
            $("#table_result_cliente").html(tabela_preenchida);
            //$("#btnImprimirCliente").show();
        }
    })
}

$("#btnImprimirCliente").show();
function FiltrarCliente(nome_filtro) {
    $("#btnImprimirCliente").show();
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("cliente_dataview"),
        data: {
            btnFiltrar: 'ajx',
            FiltrarNome: nome_filtro
        }, success: function (dados) {
            $("#table_result_cliente").html(dados);
            if (dados == '<h4><center>Nenhum registro encontrado!</center><h4>'){
                $("#btnImprimirCliente").hide();
            }
        } 
    })
}

function MudarStatusCliente(id_cliente, valor) {
    let status_atual = valor;
    let id = id_cliente;
    $.ajax({
        type: 'post',
        url: BASE_URL_AJAX("cliente_dataview"),
        data: {
            CliID: id,
            status_cliente: status_atual,
            mudar_status: 'ajx'
        },
        success: function (resultado) {
            if (resultado == 1) {
                MensagemSucesso();
                // FiltrarUsuario($("#nome_pesquisar").val()); para poder pesquisar direto
            } else {
                MensagemErro();
            }
        }
    })
}

function VerificarEmail(email){
    
    if(email != ""){
        $.ajax({
            type: 'post',
            url: BASE_URL_AJAX("cliente_dataview"),
            data:{
                Email: email,
                verificarEmail: 'ajx'
            },
            success: function(ret){
                if(ret == -105){
                    MensagemGenerica("O e-mail " + email + " já existe!");
                    $("#CliEmail").val('');
                    $("#CliEmail").focus();
                }
            }
        })
    }
}

function Imprimir() {
    let filtrar_palavra = $("#buscaCliente").val();
    location = "relatorio_cliente.php?desc_filtro="+ filtrar_palavra;
}