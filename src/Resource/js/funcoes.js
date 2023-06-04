function load() {
    $("#divload").addClass("overlay").html('<i class="fas fa-2x fa-sync-alt fa-spin"> </i>');
}
function RemoverLoad() {
    $("#divload").removeClass("overlay").html('');
}

function AlterarProdutoModal(ProdID, ProdDescricao, ProdCodBarra, ProdValorCompra, ProdValorVenda, ProdEstoque, ProdEstoqueMin, ProdImagem, ProdPath) {

    $("#ProdID").val(ProdID);
    $("#ProdDescricao").val(ProdDescricao);
    $("#ProdCodBarra").val(ProdCodBarra);
    $("#ProdValorCompra").val(ProdValorCompra);
    $("#ProdValorVenda").val(ProdValorVenda);
    $("#ProdEstoque").val(ProdEstoque);
    $("#ProdEstoqueMin").val(ProdEstoqueMin);
    $("#OldImagem").val(ProdImagem);
    $("#OldPath").val(ProdPath);
}

function ExcluirModalItem(OsID, id, nome, idProduto, qtd) {
    alert('item');
    $("#ExcluirOsID").val(OsID);
    $("#ExcluirID").val(id);
    $("#ExcluirNome").html(nome);
    $("#ExcluirProdID").val(idProduto);
    $("#ExcluirQtd").val(qtd);
}
function ExcluirModalServ(OsID, id, nomeServ, idServ, qtd) {
    $("#ExcluirOsID").val(OsID);
    $("#ExcluirID").val(id);
    $("#ExcluirNomeServ").html(nomeServ);
    $("#ExcluirServID").val(idServ);
    $("#ExcluirQtd").val(qtd);
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

function ValidadorCPFeCNPJ(cpf_cnpj) {
    cpf_cnpj = cpf_cnpj.replace(/[^\d]+/g, '');
    if (cpf_cnpj != "") {
        if (cpf_cnpj.length <= 11) {
            if (!ValidacaoCPF(cpf_cnpj)) {
                MensagemGenerica("CPF: " + cpf_cnpj + " inválido!");
                $("#CliCpfCnpj").val('');
                $("#CliCpfCnpj").focus();
            }
        } else {
            if (!ValidacaoCNPJ(cpf_cnpj)) {
                MensagemGenerica("CNPJ: " + cpf_cnpj + " inválido!");
                $("#CliCpfCnpj").val('');
                $("#CliCpfCnpj").focus();
            }
        }
    }
}
function ValidacaoCNPJ(cnpj) {
    cnpj = cnpj.replace(/[^\d]+/g, '');

    //if (cnpj == '') return false;

    if (cnpj.length != 14)
        return false;

    // Elimina CNPJs invalidos conhecidos
    if (cnpj == "00000000000000" ||
        cnpj == "11111111111111" ||
        cnpj == "22222222222222" ||
        cnpj == "33333333333333" ||
        cnpj == "44444444444444" ||
        cnpj == "55555555555555" ||
        cnpj == "66666666666666" ||
        cnpj == "77777777777777" ||
        cnpj == "88888888888888" ||
        cnpj == "99999999999999")
        return false;

    // Valida DVs
    tamanho = cnpj.length - 2
    numeros = cnpj.substring(0, tamanho);
    digitos = cnpj.substring(tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
        soma += numeros.charAt(tamanho - i) * pos--;
        if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(0))
        return false;

    tamanho = tamanho + 1;
    numeros = cnpj.substring(0, tamanho);
    soma = 0;
    pos = tamanho - 7;
    for (i = tamanho; i >= 1; i--) {
        soma += numeros.charAt(tamanho - i) * pos--;
        if (pos < 2)
            pos = 9;
    }
    resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
    if (resultado != digitos.charAt(1))
        return false;

    return true;
}

function ValidacaoCPF(cpf) {
    cpf = cpf.replace(/[^\d]+/g, '');

    if (cpf.length !== 11) {
        return false;
    }

       // Elimina cpfs invalidos conhecidos
    if (cpf == "00000000000" ||
        cpf == "11111111111" ||
        cpf == "22222222222" ||
        cpf == "33333333333" ||
        cpf == "44444444444" ||
        cpf == "55555555555" ||
        cpf == "66666666666" ||
        cpf == "77777777777" ||
        cpf == "88888888888" ||
        cpf == "99999999999") {
        return false;
    }

    var soma = 0;
    for (var i = 0; i < 9; i++) {
        soma += parseInt(cpf[i]) * (10 - i);
    }

    var resto = soma % 11;
    var digitoVerificador1 = resto < 2 ? 0 : 11 - resto;

    if (digitoVerificador1 !== parseInt(cpf[9])) {
        return false;
    }

    soma = 0;
    for (var i = 0; i < 10; i++) {
        soma += parseInt(cpf[i]) * (11 - i);
    }

    resto = soma % 11;
    var digitoVerificador2 = resto < 2 ? 0 : 11 - resto;

    if (digitoVerificador2 !== parseInt(cpf[10])) {
        return false;
    }

    return true;
}
