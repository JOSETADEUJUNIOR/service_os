function VerItens(OsID){
    alert('asd');
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("os_dataview"),
        data: {
            OsID: OsID,
            btn_consultar_os: 'ajx'
        }, success: function (tabela_preenchida) {
            $("#tabela_result_os_itens").html(tabela_preenchida);
        }
    })
}



function ConsultarOs() {
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("os_dataview"),
        data: {
            OsID: $("#OsProdID").val(),
            btn_consultar: 'ajx'
        }, success: function (tabela_preenchida) {
            $("#tabela_result_os").html(tabela_preenchida);
        }
    })
}

function ConsultarItensOs(OsID) {
    let idProd = OsID;
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("os_dataview"),
        data: {
            OsID: idProd,
            btn_consultar_item: 'ajx'
        }, success: function (tabela_preenchida) {
            $("#tabela_result_item").html(tabela_preenchida);
        }
    })
}
function AlterarOs(OsID, NumerNF, dtInicial, status, cliente, descricao, defeito, observacao, laudo) {
    alert('mudou');
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

        ConsultarItensOs(OsID);
    }
}





function ConsultarAnxOs(OsID) {
    let idAnx = OsID;
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("os_dataview"),
        data: {
            OsID: idAnx,
            btn_consultar_anx: 'ajx'
        }, success: function (tabela_preenchida) {
            $("#tabela_result_anx").html(tabela_preenchida);
        }
    })
}

function ConsultarServOs(OsID) {
    let idServOS = OsID
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("os_dataview"),
        data: {
            OsID: idServOS,
            btn_consultar_serv: 'ajx'
        }, success: function (tabela_preenchida) {
            $("#tabela_result_item").html(tabela_preenchida);
        }
    })
}

function ExcluirItemOs() {
    let OsID = $("#ExcluirOsID").val();
    let id = $("#ExcluirID").val();
    let qtd = $("#ExcluirQtd").val();
    let produto = $("#ExcluirProdID").val();
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("os_dataview"),
        data: {
            btnExcluirItemOs: 'ajx',
            OsID: OsID,
            qtd: qtd,
            produto: produto,
            ExcluirID: id
        }, success: function (ret) {
            $("#modalExcluirItem").modal("hide");
            if (ret == 1) {
                MensagemSucesso();
                ConsultarItensOs(OsID);
                ConsultarServOs(OsID);
            } else {
                MensagemExcluirErro();
            }
        }
    })
    return false;
}

function Excluir() {
    let id = $("#ExcluirID").val();
    alert($("#ExcluirID").val());
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("os_dataview"),
        data: {
            btnExcluir: 'ajx',
            ExcluirID: id
        }, success: function (ret) {
            $("#modalExcluir").modal("hide");
            if (ret == 1) {
                MensagemSucesso();
                ConsultarOs();
            } else {
                MensagemExcluirErro();
            }
        }
    })
    return false;
}
function ExcluirAnx() {
    let id = $("#AnxID").val();
    let OsID = $("#AnxOsID").val();
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("os_dataview"),
        data: {
            btnExcluirAnx: 'ajx',
            AnxID: id
        }, success: function (ret) {
            $("#modalExcluirAnx").modal("hide");
            if (ret == 1) {
                MensagemSucesso();
                ConsultarAnxOs(OsID);
            } else {

                MensagemExcluirErro();
            }
        }
    })
    return false;
}

function ExcluirServ() {
    let OsID = $("#ExcluirOsID").val();
    let id = $("#ExcluirID").val();
    let qtd = $("#ExcluirQtd").val();
    let servico = $("#ExcluirServID").val();
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("os_dataview"),
        data: {
            btnExcluirServ: 'ajx',
            OsID: OsID,
            qtd: qtd,
            servico: servico,
            ExcluirID: id
        }, success: function (ret) {
            $("#modalExcluirServ").modal("hide");
            if (ret == 1) {
                MensagemSucesso();
                ConsultarServOs(OsID);
            } else {
                MensagemExcluirErro();
            }
        }
    })
    return false;
}

function faturarOs(id, clienteID, valor) {
    if (valor <= 0) {
        MensagemFaturarSemValor();
        return false;
    }

    let OsID = id;
    let CliID = clienteID;
    let OsValor = valor;
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("os_dataview"),
        data: {
            btnFaturar: 'ajx',
            OsID: OsID,
            CliID: CliID,
            OsValor: OsValor
        },
        success: function (ret) {
            if (ret == 1) {
                MensagemSucesso();
                ConsultarOs();

            } else {
                MensagemErro();
            }
        }
    })
    return false;
}

function CadastrarOs(id_form) {
    alert($("#Oscliente").val());
    if (NotificarCampos(id_form)) {
        let OsID = $("#OsID").val();
        let OsNumeroNF = $("#numeroNF").val();
        let Oscliente = $("#Oscliente").val();
        let tecnico = $("#tecnico").val();
        let status = $("#status").val();
        let dtInicial = $("#dtInicial").val();
        let dtFinal = $("#dtFinal").val();
        let garantia = $("#garantia").val();
        let descProd = $("#descProd").val();
        let defeito = $("#defeito").val();
        let obs = $("#obs").val();
        let laudo = $("#laudo").val();
        $.ajax({
            type: "POST",
            url: BASE_URL_AJAX("os_dataview"),
            data: {
                btn_cadastrar: 'ajx',
                Oscliente: Oscliente,
                tecnico: tecnico,
                status: status,
                dtInicial: dtInicial,
                dtFinal: dtFinal,
                garantia: garantia,
                descProd: descProd,
                defeito: defeito,
                obs: obs,
                laudo: laudo,
                NumeroNF: OsNumeroNF,
                OsID: OsID
            },
            success: function (ret) {
                if (ret != "") {
                    MensagemSucesso();
                    console.log(ret);
                    $("#DivProduto").show();
                    $("#OsID").val(ret);
                    ConsultarOs();

                } else {
                    MensagemErro();
                }
            }
        })
    }
    return false;
}
function CadastrarGarantia(id_form) {

    if (NotificarCampos(id_form)) {
        let OsID = $("#OsID").val();
        let GrtNome = $("#nome").val();
        let text = $("#editor").val();
        let status = $("#status").val();
        let dtInicial = $("#dtInicial").val();
        let dtFinal = $("#dtFinal").val();
        let garantia = $("#garantia").val();
        let descProd = $("#descProd").val();
        let defeito = $("#defeito").val();
        let obs = $("#obs").val();
        let laudo = $("#laudo").val();
        $.ajax({
            type: "POST",
            url: BASE_URL_AJAX("os_dataview"),
            data: {
                btn_cadastrar: 'ajx',
                Oscliente: Oscliente,
                tecnico: tecnico,
                status: status,
                dtInicial: dtInicial,
                dtFinal: dtFinal,
                garantia: garantia,
                descProd: descProd,
                defeito: defeito,
                obs: obs,
                laudo: laudo,
                OsID: OsID
            },
            success: function (ret) {
                RemoverLoad();
                if (ret == 1) {
                    MensagemSucesso();
                    LimparCampos(id_form);
                    ConsultarOs();
                    $("#CadOs").addClass('collapsed-card');
                    window.location.replace("ordem_servico.php")
                } else {
                    MensagemErro();
                }
            }
        })
    }
    return false;
}

function InserirAnxOs(form_id) {
    if (NotificarCampos(form_id)) {
        let OsID = $("#OsAnxID").val();
        var formData = new FormData();
        formData.append("anxOsID", $("#OsAnxID").val());
        formData.append("anxNome", $("#anxNome").val());
        formData.append("arquivos", $("#anxImagem").prop("files")[0]);
        formData.append("btnAddAnx", 'ajx');

        $.ajax({
            type: "POST",
            url: BASE_URL_AJAX("os_dataview"),
            data:
                formData,
            processData: false,
            contentType: false,
            success: function (ret) {
                RemoverLoad();
                if (ret == 1) {
                    MensagemSucesso();
                    ConsultarAnxOs(OsID);
                } else if (ret == -13) {
                    MensagemErro();
                }
            }
        })
    }
    return false;
}

function InserirProd() {
    let produto = $("#produto").val();
    let qtdProd = $("#qtdProd").val();
    let OsID = $("#OsID").val();
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("os_dataview"),
        data: {
            btn_addItem: 'ajx',
            produto: produto,
            qtdProd: qtdProd,
            OsID: OsID

        },
        success: function (ret) {
            RemoverLoad();
            if (ret == 1) {
                MensagemSucesso();
                $("#produto").val('');
                $("#qtdProd").val('');
                ConsultarItensOs(OsID);
                ConsultarServOs(OsID);
            } else if (ret == -13) {
                MensagemGenerica('Você não possui estoque suficiênte!');
            }
        }
    })

    return false;
}



function InserirServ(form_id) {
    if (NotificarCampos(form_id)) {
        let servico = $("#servico").val();
        let qtdServ = $("#qtdServ").val();
        let OsID = $("#OsID").val();
        alert($("#OsProdID").val());

        $.ajax({
            type: "POST",
            url: BASE_URL_AJAX("os_dataview"),
            data: {
                btn_addServ: 'ajx',
                servico: servico,
                qtdServ: qtdServ,
                OsID: OsID
            },
            success: function (ret) {
                RemoverLoad();
                if (ret == 1) {
                    MensagemSucesso();
                    $("#servico").val('');
                    $("#qtdServ").val('');
                    ConsultarServOs(OsID);

                }
            }
        })
    }
    return false;
}


function FiltrarServico(nome_filtro) {
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("servico_dataview"),
        data: {
            btnFiltrar: 'ajx',
            FiltrarNome: nome_filtro
        }, success: function (dados) {
            $("#tabela_result_servico").html(dados);
        }
    })
}
function FiltrarStatus() {
    let status = $("#filtrarstatus").val();
    let filtrarde = $("#filtrarde").val();
    let filtrarate = $("#filtrarate").val();
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("os_dataview"),
        data: {
            btnFiltrarStatus: 'ajx',
            filtroDe: filtrarde,
            filtroAte: filtrarate,
            FiltrarStatus: status
        }, success: function (dados) {
            $("#tabela_result_os").html(dados);
        }
    })

}

function StatusOS() {

    if ($("#status").val() == "C") {

        let valorOS = $("#ValorOS").val();
        if (valorOS > 0) {
            MensagemLimparOs();
            $("#status").val('A');
            return false;
        } else {
            return true;
        }

    }
}

function FiltrarOrdem(nome_filtro) {
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("os_dataview"),
        data: {
            btnFiltrar: 'ajx',
            FiltrarNome: nome_filtro
        }, success: function (dados) {
            console.log(dados);
            $("#tabela_result_os").html(dados);
        }
    })
}