function load() {
    $("#divload").addClass("overlay").html('<i class="fas fa-2x fa-sync-alt fa-spin"> </i>');
}
function RemoverLoad() {
    $("#divload").removeClass("overlay").html('');
}

function AlterarProdutoModal(ProdID, ProdDescricao, ProdCodBarra, ProdValorCompra, ProdValorVenda, ProdEstoque, ProdEstoqueMin) {

    $("#ProdID").val(ProdID);
    $("#ProdDescricao").val(ProdDescricao);
    $("#ProdCodBarra").val(ProdCodBarra);
    $("#ProdValorCompra").val(ProdValorCompra);
    $("#ProdValorVenda").val(ProdValorVenda);
    $("#ProdEstoque").val(ProdEstoque);
    $("#ProdEstoqueMin").val(ProdEstoqueMin);
}

function AlterarOs(OsID, NumerNF, dtInicial, status, cliente, descricao, defeito, observacao, laudo ) {
    alert('oi');
    if (OsID > 0) {
        $("#DivProduto").show();
        $("#OsID").val(OsID);
        $("#numeroNF").val(NumerNF);
        $("#dtInicial").val(dtInicial);
        $("#status").val(status);
        $("#Oscliente").val(cliente);
        $("#descProd").val(descricao);
        $("#defeito").val(defeito);
        $("#obs").val(observacao);
        $("#laudo").val(laudo);
    }
}

function AlterarClienteModal(CliID, CliNome, CliDtNasc, CliCpfCnpj, CliTipo, CliTelefone, CliEmail, cep, endereco, bairro, CliNumero, cidade, estado, CliDescricao) {

    $("#CliID").val(CliID);
    $("#CliNome").val(CliNome);
    $("#CliDtNasc").val(CliDtNasc);
    $("#CliCpfCnpj").val(CliCpfCnpj);
    $("#CliTipo").val(CliTipo);
    $("#CliTelefone").val(CliTelefone);
    $("#CliEmail").val(CliEmail);
    $("#cep").val(cep);
    $("#endereco").val(endereco);
    $("#bairro").val(bairro);
    $("#CliNumero").val(CliNumero);
    $("#cidade").val(cidade);
    $("#estado").val(estado);
    $("#CliDescricao").val(CliDescricao);
}

function AlterarSetorModal(id, nome) {
    $("#AlteraID").val(id);
    $("#nome").val(nome);
}
function AlterarModeloModal(id, nome) {
    $("#AlteraID").val(id);
    $("#nome").val(nome);
}
function AlterarServicoModal(servID, servNome, servValor, servDescricao) {
    $("#ServID").val(servID);
    $("#ServNome").val(servNome);
    $("#ServValor").val(servValor);
    $("#ServDescricao").val(servDescricao);
}
function AlterarEquipamentoModal(id, nomeTipo, nomeModelo, identificacao, descricao) {
    $("#idEquip").val(id);
    $("#tipo").val(nomeTipo);
    $("#modelo").val(nomeModelo);
    $("#identificacao").val(identificacao);
    $("#descricao").val(descricao);
}

function ExcluirModal(id, nome) {
    $("#ExcluirID").val(id);
    $("#ExcluirNome").html(nome);

}
function AlterarUsuarioModal(id, tipo, nome, email, telefone, cep, rua, bairro, cidade, sigla_estado, empresa_tecnico, setor_id, id_end) {

    EscolherUsuario(tipo);
    $("#id_user").val(id);
    $("#tipo").val(tipo);
    $("#nome").val(nome);
    $("#email").val(email);
    $("#telefone").val(telefone);
    $("#cep").val(cep);
    $("#endereco").val(rua);
    $("#bairro").val(bairro);
    $("#cidade").val(cidade);
    $("#estado").val(sigla_estado);
    $("#nome_empresa_tec").val(empresa_tecnico);
    $("#setor").val(setor_id);
    $("#id_end").val(id_end);

}

function AlterarTipoEquipamentoModal(id, nome) {
    $("#AlteraID").val(id);
    $("#nome").val(nome);
}

function FechandoModal(form_id) {
    LimparCampos(form_id)
}

function NotificarCampos(form_id) {

    var ret = true;

    $("#" + form_id + " input," + "#" + form_id + " select, " + "#" + form_id + " textarea," + "#" + form_id + " i").each(function () {

        if ($(this).hasClass("obg")) {
            if ($(this).val().trim() == "") {
                ret = false;
                $(this).css({ border: "1px solid red" });
                $(this).focus();
            } else {
                $(this).css(({ border: "1px solid green" }));
            }
        }
    });
    if (!ret)
        MensagemCamposObrigatorios();
    else
        load();

    return ret;
}
function LimparCampos(form_id) {

    $("#" + form_id + " input, select, textarea").each(function () {
        $(this).val('');

    });
}

function CarregarModalStatus(id, nome, status_atual) {
    $("#id_status").val(id);
    $("#nome_user_status").html(nome);
    $("#status_atual").val(status_atual);
}

function BASE_URL_AJAX(dataview) {
    return "../../Resource/dataview/" + dataview + ".php";
}

function EscolherUsuario(tipo) {

    switch (tipo) {
        case '2':
            $("#divFunc").show();
            $("#divGeral").show();
            $("#divButton").show();
            $("#divTecnico").hide();
            $("#setor").addClass("obg");
            break;

        case '1':
            $("#divTecnico").hide();
            $("#divFunc").hide();
            $("#setor").removeClass('obg');
            $("#nome_empresa_tec").removeClass('obg');
            $("#divGeral").show();
            $("#divButton").show();
            break;
        case '3':
            $("#divTecnico").show();
            $("#divFunc").hide();
            $("#divGeral").show();
            $("#divButton").show();
            $("#nome_empresa_tec").addClass('obg');
            break;

        default:
            $("#divFunc").hide();
            $("#divFunc").removeClass('obg');
            $("#divTecnico").hide();
            $("#divGeral").hide();
            $("#divButton").hide();
            break;
    }


}

