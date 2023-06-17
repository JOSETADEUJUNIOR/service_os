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






function GravarDadosOs() {

    var dadosAPI = GetTnkValue();
    if (!dadosAPI.funcionario_id) {
        Sair();
    }
    // if (NotificarCampos(id_form)) {

    var id_user_func = dadosAPI.funcionario_id;
    var id_emp_func = dadosAPI.empresa_id;

    var dadosGravacao = {
        endpoint: 'GravarDadosOs',
        produto: $("#produto").val(),
        quantidades: $("#qtd").val(),
        valores: $("#valor").val(),
        ordem: 11,
        empresa_id: id_emp_func

    }

    $.ajax({
        type: "POST",
        // url: BASE_URL_AJAX("funcionario_api"),
        url: BASE_URL_AJAX("funcionario_api"),
        data: JSON.stringify(dadosGravacao),
        headers: {
            'Authorization': 'Bearer ' + GetTnk(),
            'Content-Type': 'application/json'
        },
        success: function (dados_ret) {
            var resultado = dados_ret["result"];

            $("#novoChamado").modal("hide");
            if (resultado == '1') {
                FiltrarChamado();
                LimparCampos();
            }
        }


    })

    //}
    return false;

}



function ModalAberto() {
    if ($("#dadosOS").is(":visible")) {
        modal({
            backdrop: 'static',
            keyboard: false
        });


    }
}

function ListarProdutos() {
    var dadosAPI = GetTnkValue();
    if (!dadosAPI.funcionario_id) {
        Sair();
    }
    var id_setor_func = dadosAPI.setor_id;
    var combo_produto = $("#produto");
    var id_empresa = dadosAPI.empresa_id;
    combo_produto.empty();
    var endpoint_produtos = "RetornarProdutosAPI";
    var dados = {
        endpoint: endpoint_produtos,
        id_setor: id_setor_func,
        id_emp_func: id_empresa
    }
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("funcionario_api"),
        data: JSON.stringify(dados),
        headers: {
            'Authorization': 'Bearer ' + GetTnk(),
            'Content-Type': 'application/json'
        },
        success: function (dados_ret) {
            var resultado = dados_ret["result"];
            console.log(resultado);

            var tabelaProdutos = $("#tabela-produtos tbody");
            tabelaProdutos.empty(); // Limpa as linhas anteriores da tabela

            for (var i = 0; i < resultado.length; i++) {
                var produto = resultado[i];
                var linha = $("<tr></tr>");

                // Coluna do nome do produto
                var colunaNome = $("<td></td>").text(produto.ProdDescricao);
                linha.append(colunaNome);

                // Coluna do nome do produto
                var colunaEstoque = $("<td></td>").text(produto.ProdEstoque);
                linha.append(colunaEstoque);

                // Coluna do valor do produto
                var colunaValor = $("<td id=\"valor\"></td>");
                var inputValor = $("<input class=\"form-control\" type='text' readonly>").attr("name", "valor[]").val(produto.ProdValorVenda);
                colunaValor.append(inputValor);
                linha.append(colunaValor);

                // Coluna da quantidade (campo de input)
                var colunaQuantidade = $("<td></td>");
                var inputQuantidade = $("<input class=\"form-control\" type='number' min='0' value='0'>").attr("name", "quantidade[]");
                colunaQuantidade.append(inputQuantidade);
                linha.append(colunaQuantidade);

                // Coluna do checkbox
                if (produto.ProdEstoque > 0) {
                    var colunaCheckbox = $("<td></td>");
                    var checkbox = $("<input type='checkbox'>").attr("name", "produto_id[]").val(produto.ProdID);
                    colunaCheckbox.append(checkbox);
                    linha.append(colunaCheckbox);

                } else {
                    var colunaSemSaldo = $("<td style=\"color:red\"></td>").text("item sem saldo");
                    linha.append(colunaSemSaldo);

                }

                tabelaProdutos.append(linha);
            }
        }
    });
    return false;
}

function ListarServicos() {
    var dadosAPI = GetTnkValue();
    if (!dadosAPI.funcionario_id) {
        Sair();
    }
    var id_setor_func = dadosAPI.setor_id;
    var combo_servico = $("#servicos");
    var id_empresa = dadosAPI.empresa_id;
    combo_servico.empty();
    var endpoint_servicos = "RetornarServicosAPI";
    var dados = {
        endpoint: endpoint_servicos,
        id_setor: id_setor_func,
        id_emp_func: id_empresa
    }
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("funcionario_api"),
        data: JSON.stringify(dados),
        headers: {
            'Authorization': 'Bearer ' + GetTnk(),
            'Content-Type': 'application/json'
        },
        success: function (dados_ret_serv) {
            var resultado_serv = dados_ret_serv["result"];
            console.log(resultado_serv);

            var tabelaServicos = $("#tabela-servicos tbody");
            tabelaServicos.empty(); // Limpa as linhas anteriores da tabela

            for (var i = 0; i < resultado_serv.length; i++) {
                var servico = resultado_serv[i];
                var linha = $("<tr></tr>");

                // Coluna do nome do servico
                var colunaNome = $("<td></td>").text(servico.ServDescricao);
                linha.append(colunaNome);


                // Coluna do valor do produto
                var colunaValor = $("<td id=\"valor\"></td>");
                var inputValor = $("<input class=\"form-control\" type='text' readonly>").attr("name", "valor[]").val(servico.ServValor);
                colunaValor.append(inputValor);
                linha.append(colunaValor);

                // Coluna do checkbox

                var colunaCheckbox = $("<td></td>");
                var checkbox = $("<input type='checkbox'>").attr("name", "servico_id[]").val(servico.ServID);
                colunaCheckbox.append(checkbox);
                linha.append(colunaCheckbox);



                tabelaServicos.append(linha);
            }
        }
    });
    return false;
}

$("#btn-gravar").click(function () {
    var dadosAPI = GetTnkValue();
    if (!dadosAPI.funcionario_id) {
        Sair();
    }
    // if (NotificarCampos(id_form)) {

    var id_user_func = dadosAPI.funcionario_id;
    var id_emp_func = dadosAPI.empresa_id;

    // Obter os valores selecionados dos checkboxes e as quantidades dos inputs
    var Produtos = [];

    var produtosSelecionados = $("input[name='produto_id[]']:checked").each(function () {
        var row = $(this).closest("tr")[0];
        var quantidade = $(row).find("input[name='quantidade[]']").val();
        if (quantidade > 0) {

            Produtos.push({
                "produto_id": $(row).find("input[name='produto_id[]']").val(),
                "valor": $(row).find("input[name='valor[]']").val(),
                "qtd": quantidade,
            });
        } else {
            MensagemGenerica("Inserir quantidade", 'warning');
            return;
        }
    });

    if (Produtos.length === 0) {
        MensagemGenerica("Para gravar, adicione algum produto", 'warning');
        return;
    }

    let dados = {
        endpoint: 'GravarDadosOsGeral',
        empresa_id: id_emp_func,
        chamado_id: $("#OsID").val(),
        Produtos: Produtos
    }

    // Montar os dados para enviar na requisição AJAX
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("funcionario_api"),
        data: JSON.stringify(dados),
        headers: {
            'Authorization': 'Bearer ' + GetTnk(),
            'Content-Type': 'application/json'
        },
        success: function (response) {

            if (response['result'] == -2) {
                MensagemGenerica("Produto com saldo insulficiente", "warning");
            } else {
                MensagemGenerica("Produto Adicionado com sucesso", 'success');
                ListarProdutos();
                CarregarProdutosOS($("#OsID").val());

            }

            // Processar a resposta da requisição
        },
        error: function (xhr, status, error) {
            // Tratar erros na requisição
            console.error(error);
        }
    });

})


$("#btn-gravar-serv").click(function () {
    var dadosAPI = GetTnkValue();
    if (!dadosAPI.funcionario_id) {
        Sair();
    }
    // if (NotificarCampos(id_form)) {

    var id_user_func = dadosAPI.funcionario_id;
    var id_emp_func = dadosAPI.empresa_id;

    // Obter os valores selecionados dos checkboxes e as quantidades dos inputs
    var Servicos = [];

    var servicosSelecionados = $("input[name='servico_id[]']:checked").each(function () {
        var row = $(this).closest("tr")[0];
        //var quantidade = $(row).find("input[name='quantidade[]']").val();

        Servicos.push({
            "servico_id": $(row).find("input[name='servico_id[]']").val(),
            "valor": $(row).find("input[name='valor[]']").val(),
        });

    });

    if (Servicos.length === 0) {
        MensagemGenerica("Para gravar, adicione algum serviço", 'warning');
        return;
    }

    let dados = {
        endpoint: 'GravarDadosServicosOsGeral',
        empresa_id: id_emp_func,
        chamado_id: $("#OsID").val(),
        Servicos: Servicos
    }

    // Montar os dados para enviar na requisição AJAX
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("funcionario_api"),
        data: JSON.stringify(dados),
        headers: {
            'Authorization': 'Bearer ' + GetTnk(),
            'Content-Type': 'application/json'
        },
        success: function (response) {

            if (response['result'] == -2) {
                MensagemGenerica("Produto com saldo insulficiente", "warning");
            } else {
                MensagemGenerica("Serviço Adicionado com sucesso", 'success');
                ListarServicos();
                CarregarProdutosOS($("#OsID").val());


            }

            // Processar a resposta da requisição
        },
        error: function (xhr, status, error) {
            // Tratar erros na requisição
            console.error(error);
        }
    });

})

function RemoveProdOS(ref_id, quantidade, produtoID) {



    var dadosAPI = GetTnkValue();
    if (!dadosAPI.funcionario_id) {
        Sair();
    }


    var empresa_func_id = dadosAPI.empresa_id;
    var referencia_func_id = ref_id;
    var qtd = quantidade;
    var prodID = produtoID;
    var dados = {

        endpoint: "RemoveProdOsAPI",
        empresa_id: empresa_func_id,
        quantidade_produto: qtd,
        produto_id: prodID,
        referencia_id: referencia_func_id
    }
    $.ajax({

        type: "POST",
        url: BASE_URL_AJAX("funcionario_api"),
        data: JSON.stringify(dados),
        headers: {
            'Authorization': 'Bearer ' + GetTnk(),
            'Content-Type': 'application/json'
        },
        success: function (dados_ret) {
            var resultado = dados_ret["result"];

            if (resultado == 1) {
                ListarProdutos();
                CarregarProdutosOS($("#OsID").val());
                MensagemGenerica('Produto removido com sucesso', 'success');
            } else {
                MensagemErro();
            }
        }
    })
}


function RemoveServOS(ref_id, servicoID) {



    var dadosAPI = GetTnkValue();
    if (!dadosAPI.funcionario_id) {
        Sair();
    }


    var empresa_func_id = dadosAPI.empresa_id;
    var referencia_func_id = ref_id;
    var servID = servicoID;
    var dados = {

        endpoint: "RemoveServOsAPI",
        empresa_id: empresa_func_id,
        servico_id: servID,
        referencia_id: referencia_func_id
    }
    $.ajax({

        type: "POST",
        url: BASE_URL_AJAX("funcionario_api"),
        data: JSON.stringify(dados),
        headers: {
            'Authorization': 'Bearer ' + GetTnk(),
            'Content-Type': 'application/json'
        },
        success: function (dados_ret) {
            var resultado = dados_ret["result"];

            if (resultado == 1) {
                ListarServicos();
                ListarProdutos();
                CarregarProdutosOS($("#OsID").val());
                MensagemGenerica('Serviço removido com sucesso', 'success');
            } else {
                MensagemErro();
            }
        }
    })
}


function CarregarClientes() {
    var dadosAPI = GetTnkValue();
    if (!dadosAPI.funcionario_id) {
        Sair();
    }
    var id_setor_func = dadosAPI.setor_id;
    var combo_clientes = $("#cliente");
    combo_clientes.empty();
    var endpoint_clientes = "RetornarClientes";
    var dados = {
        tipo: dadosAPI.tipo,
        empresa_id: dadosAPI.empresa_id,
        endpoint: endpoint_clientes,
        id_setor: id_setor_func
    }
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("funcionario_api"),
        data: JSON.stringify(dados),
        headers: {
            'Authorization': 'Bearer ' + GetTnk(),
            'Content-Type': 'application/json'
        },
        success: function (dados_ret) {
            var resultado = dados_ret["result"];
            console.log(resultado);
            $('<option>').val("").text("Selecione").appendTo(combo_clientes);

            $(resultado).each(function () {

                $('<option>').val(this.CliID).text(this.CliNome).appendTo(combo_clientes);
            })
        }
    })
    return false;
}

function AbrirChamado(id_form) {

    var dadosAPI = GetTnkValue();
    if (!dadosAPI.funcionario_id) {
        Sair();
    }
    if (NotificarCampos(id_form)) {

        var id_user_func = dadosAPI.funcionario_id;
        var id_emp_func = dadosAPI.empresa_id;
        var dados = {
            endpoint: "AbrirChamado",
            id_user: id_user_func,
            empresa_id: id_emp_func,
            numero_nf: $("#numero_nf").val(),
            cliente_id: $("#cliente").val(),
            problema: $("#descricao_problema").val().trim(),
            defeito: $("#defeito").val().trim(),
            observacao: $("#observacao").val().trim()

        }

        $.ajax({
            type: "POST",
            // url: BASE_URL_AJAX("funcionario_api"),
            url: BASE_URL_AJAX("funcionario_api"),
            data: JSON.stringify(dados),
            headers: {
                'Authorization': 'Bearer ' + GetTnk(),
                'Content-Type': 'application/json'
            },
            success: function (dados_ret) {
                var resultado = dados_ret["result"];
                $("#novoChamado").modal("hide");
                if (resultado == '1') {
                    FiltrarChamado();
                    LimparCampos();
                }
            }


        })

    }
    return false;

}

function CarregarProdutosOS(id) {

    var dadosAPI = GetTnkValue();
    if (!dadosAPI.funcionario_id) {
        Sair();
    }

    var dados = {
        endpoint: 'CarregarProdServOS',
        chamado_id: id,
    };
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("funcionario_api"),
        data: JSON.stringify(dados),
        headers: {
            'Authorization': 'Bearer ' + GetTnk(),
            'Content-Type': 'application/json'
        },
        success: function (dados_ret) {
            var itens = dados_ret['result'];
            //console.log(itens);
            preencherTabelaItens(itens);

        }
    })
    return false;
}

function preencherTabelaItens(itens) {
    console.log(itens);
    if (itens != "") {

        $("#div_listagem_itens_os").show();
        var tabelaItens_os = $("#tabela-itens_os tbody");
        tabelaItens_os.empty(); // Limpa as linhas anteriores da tabela

        var totalGeral = 0; // Inicializa o total geral como 0
        var valorTotal;
        for (var i = 0; i < itens.length; i++) {
            var item = itens[i];
            var linha_os = $("<tr></tr>");

            // Verifica se é um produto ou serviço
            var tipoItem = item.ProdDescricao ? "Produto" : "Serviço";
            var colunaTipo_os = $("<td></td>").text(tipoItem);

            if (item.ProdDescricao) {
                // É um produto
                var colunaDescricao_os = $("<td></td>").text(item.ProdDescricao);
                var colunaQuantidade_os_prod = $("<td></td>").text(item.quantidade);
                var colunaValorUnitario_os = $("<td></td>").text(formatarValorEmReais(item.valor));
                var valorTotal = item.quantidade * item.valor;
                var colunaValorTotal = $("<td></td>").text(formatarValorEmReais(valorTotal));
                var botaoExcluir = $("<button class=\"red\"><i title=\"Excluir\" class=\"ace-icon fa fa-trash-o bigger-120\"></i></button>");
                botaoExcluir.attr("data-referencia-id", item.referencia_id);
                botaoExcluir.attr("data-produto-id", item.produto_ProdID);
                botaoExcluir.attr("data-quantidade", item.quantidade);

                botaoExcluir.click(function () {
                    if ($("#status").val() == 0) {
                        var referenciaId = $(this).attr("data-referencia-id");
                        var produtoId = $(this).attr("data-produto-id");
                        var quantidade = $(this).attr("data-quantidade");

                        RemoveProdOS(referenciaId, quantidade, produtoId);
                    } else {
                        MensagemGenerica("Ordem de serviço concluída, exclusão não permitida", "warning");
                    }
                });

                var colunaExcluir = $("<td></td>").append(botaoExcluir);

                linha_os.append(colunaDescricao_os, colunaTipo_os, colunaQuantidade_os_prod, colunaValorUnitario_os, colunaValorTotal, colunaExcluir);
            } else {
                // É um serviço
                var quantidadeServico;
                if (item.quantidade > 1) {
                    quantidadeServico = item.quantidade;
                } else {
                    quantidadeServico = 1;
                }
                var colunaDescricao_os = $("<td></td>").text(item.ServNome);
                var colunaQuantidade_os = $("<td></td>").text(quantidadeServico);
                var colunaValorUnitario_os = $("<td></td>").text(formatarValorEmReais(item.valor));
                var valorTotal = 1 * item.valor;
                var colunaValorTotal = $("<td></td>").text(formatarValorEmReais(valorTotal));

                var botaoExcluir = $("<button class=\"red\"><i title=\"Excluir\" class=\"ace-icon fa fa-trash-o bigger-120\"></i></button>");
                botaoExcluir.attr("data-referencia-id", item.referencia_id);
                botaoExcluir.attr("data-servico-id", item.servico_ProdID);

                botaoExcluir.click(function () {
                    if ($("#status").val() == 0) {
                        var referenciaId = $(this).attr("data-referencia-id");
                        var servicoId = $(this).attr("data-servico-id");
                        RemoveServOS(referenciaId, servicoId);
                    } else {
                        MensagemGenerica("Ordem de serviço concluída, exclusão não permitida", "warning");
                    }
                });

                var colunaExcluir = $("<td></td>").append(botaoExcluir);

                linha_os.append(colunaDescricao_os, colunaTipo_os, colunaQuantidade_os, colunaValorUnitario_os, colunaValorTotal, colunaExcluir);
            }

            tabelaItens_os.append(linha_os);
            totalGeral += valorTotal;
        }

        // Adicionar a linha do total geral abaixo da tabela
        var linhaTotalGeral = $("<tr style=\"background-color:#ddd\"></tr>");
        var colunaTotalGeral = $("<td></td>").attr("colspan", "5").text("Total Geral:");
        var colunaValorTotalGeral = $("<td></td>").text(formatarValorEmReais(totalGeral));
        linhaTotalGeral.append(colunaTotalGeral, colunaValorTotalGeral);
        tabelaItens_os.append(linhaTotalGeral);
    } else {
        $("#div_listagem_itens_os").hide();
    }
}

function formatarValorEmReais(valor) {
    const formatter = new Intl.NumberFormat('pt-BR', {
        style: 'currency',
        currency: 'BRL',
    });
    return formatter.format(valor);
}

function FiltrarChamado(situacao = 4) {
    alert('ooo');
    filtro_chamado = situacao;
    
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("os_dataview"),
          // url: "http://localhost/service_os/src/Resource/api/funcionario_api.php",
        data: {
            situacao: filtro_chamado,
            filtrarOSGeral: 'ajx'
        },
        success: function (dados_ret) {
            var resultado = dados_ret['result'];
            console.log(resultado);
            var status = '';
            if (resultado) {
                var table_data = resultado.map(function (item) {


                    if (item.data_abertura != null && item.data_atendimento == null) {
                        status = '<span class="label label-info arrowed-right arrowed-in">Em aberto</span>';
                    } else if (item.data_atendimento != null && item.tecnico_encerramento == null) {
                        status = '<span class="label label-warning arrowed arrowed-right">Em atendimento</span>';
                    } else if (item.tecnico_encerramento != null) {
                        status = '<span class="label label-success arrowed-in arrowed-in-right">Concluída</span>';
                    }
                    return `
              <tr>
                <td colspan="3">
               
                    <a class="green" href="#verMais" role="button" data-toggle="modal" onclick="ModalMais('${item.data_atendimento || ""}', '${item.data_encerramento || ""}', '${item.nome_tecnico || ""}', '${item.tecnico_encerramento || ""}', '${item.defeito || ""}', '${item.observacao || ""}', '${item.numero_nf}', '${item.laudo_tecnico || "sem laudo"}')">
                        <i title="Alterar Setor" class="ace-icon fa fa-pencil bigger-120"></i>
                    </a>
                    <a class="blue" href="#print_os" role="button" data-toggle="modal" onclick="RelatorioOs('${item.id}', '${item.numero_nf}', '${item.cliente_id}')">
                        <i title="Emitir Ordem" class="ace-icon fa fa-print bigger-120"></i>
                    </a>
                </td>
                <td colspan="3">
                <a class="green" href="#dadosOS" role="button" data-toggle="modal" onclick="CarregarDadosOS('${item.id}', '${item.data_abertura}', '${item.numero_nf}', ${item.data_encerramento !== null ? "'" + item.data_encerramento + "'" : 0})">

                        <i title="Itens da os" class="ace-icon fa fa-list bigger-120"></i>
                    </a>
                    </td>
  
  
                
                <td>${item.numero_nf}</td>
                <td>${item.data_abertura}</td>
                <td>${item.nome_funcionario}</td>
                <td>${item.nome_cliente}</td>
                <td>${status}</td>
                <td>${item.descricao_problema}</td>
              </tr>`;

                }).join('');

                var vaso = `
            <table class="table table-hover" id="dynamic-table">
              <thead>
                <tr>
                  <th colspan="3">Ações</th>
                  <th colspan="3">Itens</th>
                  <th>Numero da NF</th>
                  <th>Data Abertura</th>
                  <th>Funcionário</th>
                  <th>Cliente</th>
                  <th>Status</th>
                  <th>Problema</th>
                </tr>
              </thead>
              <tbody>${table_data}</tbody>
            </table>
          `;

                $("#dynamic-table").html(vaso);
            } else {
                MensageGenerica("Nenhum chamado encontrado");
                $("#dynamic-table").html('');
            }
        }
    });
}
function RelatorioOs(id, numero_nf, cliente_CliID) {

    var dadosAPI = GetTnkValue();
    if (!dadosAPI.funcionario_id) {
        Sair();
    }

    var dados = {
        endpoint: 'CarregarProdServOS',
        chamado_id: id,
    };
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("funcionario_api"),
        data: JSON.stringify(dados),
        headers: {
            'Authorization': 'Bearer ' + GetTnk(),
            'Content-Type': 'application/json'
        },
        success: function (dados_ret) {
            var data = dados_ret['result'];
            console.log(data);
            var tableBody = $('#table_rel_os'); // Seletor para o corpo da tabela
            var count = 1;
            var totalGeral = 0;
            // Limpar o conteúdo atual da tabela
            tableBody.empty();

            // Iterar sobre os dados e gerar as linhas da tabela
            $.each(data, function (index, item) {
                var row = $('<tr>'); // Cria uma nova linha da tabela

                // Verifica se é um produto ou serviço
                var isProduct = item.ProdDescricao !== null;
                var description = isProduct ? item.ProdDescricao : item.ServDescricao;

                // Cria as células da tabela com os dados correspondentes
                var cell1 = $('<td>').addClass('center').text(count++);
                var cell2 = $('<td>').text(isProduct ? 'Produto' : 'Serviço');
                var cell3 = $('<td>').addClass('hidden-xs').text(description);
                var cell4 = $('<td>').addClass('hidden-xs').text(item.quantidade);
                var cell5 = $('<td>').addClass('hidden-xs').text(item.valor);
                //var cell6 = $('<td>').addClass('hidden-480').text(item.discount);
                var cell6 = $('<td>').text(item.valorTotal);
                var valorTotal = parseFloat(item.valorTotal);
                totalGeral += valorTotal;

                // Adiciona as células à linha da tabela
                row.append(cell1, cell2, cell3, cell4, cell5, cell6);

                // Adiciona a linha à tabela
                tableBody.append(row);
            });
            $("#total_geral").html(formatarValorEmReais(totalGeral));
            $("#numero_nf_rel").html(numero_nf);
            var dataAtual = new Date();
            var dataFormatada = dataAtual.toLocaleDateString();
            $("#data_fatura").text(dataFormatada);
            RetornaCliente(cliente_CliID);
            RetornaEmpresa();
            RetornarDadosRelOs(id);
        }
    });

    return false;
}

function RetornaCliente(idCliente) {


    var dadosAPI = GetTnkValue();
    if (!dadosAPI.funcionario_id) {
        Sair();
    }
    var id_setor_func = dadosAPI.setor_id;

    var endpoint_clientes = "DetalharClienteOS";
    var dados = {
        tipo: dadosAPI.tipo,
        empresa_id: dadosAPI.empresa_id,
        endpoint: endpoint_clientes,
        id_setor: id_setor_func,
        cliente_id: idCliente
    }
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("funcionario_api"),
        data: JSON.stringify(dados),
        headers: {
            'Authorization': 'Bearer ' + GetTnk(),
            'Content-Type': 'application/json'
        },
        success: function (dados_ret) {
            var resultado = dados_ret["result"];
            console.log(resultado);
            $("#cliente_nome").html("<i class=\"ace-icon fa fa-caret-right blue\"></i>Nome: " + resultado.CliNome);
            $("#cliente_endereco").html("<i class=\"ace-icon fa fa-caret-right blue\"></i>Endereco: " + resultado.CliEndereco);
            $("#cliente_cep").html("<i class=\"ace-icon fa fa-caret-right blue\"></i>Cep: " + resultado.CliCep);
            $("#cliente_estado").html("<i class=\"ace-icon fa fa-caret-right blue\"></i>Cidade: " + resultado.CliCidade + " - " + resultado.CliEstado);
            $("#cliente_email").html("<i class=\"ace-icon fa fa-caret-right blue\"></i>E-mail: " + resultado.CliEmail);



        }
    })
    return false;


}

function RetornarDadosRelOs(idOs) {

    var dadosAPI = GetTnkValue();
    if (!dadosAPI.funcionario_id) {
        Sair();
    }
    alert(idOs);
    var id_setor_func = dadosAPI.setor_id;

    var endpoint_clientes = "DetalharDadosOS";
    var dados = {
        tipo: dadosAPI.tipo,
        empresa_id: dadosAPI.empresa_id,
        endpoint: endpoint_clientes,
        os_id: idOs

    }
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("funcionario_api"),
        data: JSON.stringify(dados),
        headers: {
            'Authorization': 'Bearer ' + GetTnk(),
            'Content-Type': 'application/json'
        },
        success: function (dados_ret) {
            var resultado = dados_ret["result"];
            console.log(resultado);
            $("#os_descricao").html("<i class=\"ace-icon fa fa-caret-right blue\"></i>" + resultado.descricao_problema);
            $("#os_defeito").html("<i class=\"ace-icon fa fa-caret-right blue\"></i>" + resultado.defeito);
            $("#os_observacao").html("<i class=\"ace-icon fa fa-caret-right blue\"></i>" + resultado.observacao);
            $("#os_laudo_tec").html("<i class=\"ace-icon fa fa-caret-right blue\"></i>" + resultado.laudo_tecnico);

        }
    })
    return false;


}

function RetornaEmpresa() {

    var dadosAPI = GetTnkValue();
    if (!dadosAPI.funcionario_id) {
        Sair();
    }
    var id_setor_func = dadosAPI.setor_id;

    var endpoint_clientes = "DetalharEmpresaOS";
    var dados = {
        tipo: dadosAPI.tipo,
        empresa_id: dadosAPI.empresa_id,
        endpoint: endpoint_clientes,
        id_setor: id_setor_func,
        cliente_id: idCliente
    }
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("funcionario_api"),
        data: JSON.stringify(dados),
        headers: {
            'Authorization': 'Bearer ' + GetTnk(),
            'Content-Type': 'application/json'
        },
        success: function (dados_ret) {
            var resultado = dados_ret["result"];
            console.log(resultado);
            $("#empresa_cnpj").html("<i class=\"ace-icon fa fa-caret-right blue\"></i>Cnpj: " + resultado.EmpCNPJ);
            $("#empresa_nome").html("<i class=\"ace-icon fa fa-caret-right blue\"></i>Nome: " + resultado.EmpNome);
            $("#empresa_endereco").html("<i class=\"ace-icon fa fa-caret-right blue\"></i>Endereco: " + resultado.EmpEnd);
            $("#empresa_cep").html("<i class=\"ace-icon fa fa-caret-right blue\"></i>Cep: " + resultado.EmpCep);
            $("#empresa_cidade").html("<i class=\"ace-icon fa fa-caret-right blue\"></i>Cidade: " + resultado.EmpCidade);



        }
    })
    return false;


}
function FiltrarOsNf(valordigitado) {

    let filtro_chamado = valordigitado;
    console.log(filtro_chamado);
    var dadosAPI = GetTnkValue();
    if (!dadosAPI.funcionario_id){
        Sair();
    }
    var dados = {
        buscar_nf: filtro_chamado,
        endpoint: 'FiltrarPorNF',
        empresa_id: dadosAPI.empresa_id
    };
    $.ajax({
        type: "POST",
        // url: BASE_URL_AJAX("funcionario_api"),
        url:BASE_URL_AJAX("funcionario_api"),
        data: JSON.stringify(dados),
        headers: {
            'Authorization': 'Bearer ' + GetTnk(),
            'Content-Type': 'application/json'
        },
        success: function (dados_ret){
            var resultado = dados_ret['result'];
            console.log(resultado);
            var status = '';
            if (resultado) {
                var table_data = resultado.map(function (item) {


                    if (item.data_abertura != null && item.data_atendimento == null) {
                        status = '<span class="label label-info arrowed-right arrowed-in">Em aberto</span>';
                    } else if (item.data_atendimento != null && item.tecnico_encerramento == null) {
                        status = '<span class="label label-warning arrowed arrowed-right">Em atendimento</span>';
                    } else if (item.tecnico_encerramento != null) {
                        status = '<span class="label label-success arrowed-in arrowed-in-right">Concluída</span>';
                    }
                    return `
              <tr>
                <td colspan="3">
               
                    <a class="green" href="#verMais" role="button" data-toggle="modal" onclick="ModalMais('${item.data_atendimento || ""}', '${item.data_encerramento || ""}', '${item.nome_tecnico || ""}', '${item.tecnico_encerramento || ""}', '${item.defeito || ""}', '${item.observacao || ""}', '${item.numero_nf}', '${item.laudo_tecnico || "sem laudo"}')">
                        <i title="Alterar Setor" class="ace-icon fa fa-pencil bigger-120"></i>
                    </a>
                    <a class="blue" href="#print_os" role="button" data-toggle="modal" onclick="RelatorioOs('${item.id}', '${item.numero_nf}', '${item.cliente_id}')">
                        <i title="Emitir Ordem" class="ace-icon fa fa-print bigger-120"></i>
                    </a>
                </td>
                <td colspan="3">
                <a class="green" href="#dadosOS" role="button" data-toggle="modal" onclick="CarregarDadosOS('${item.id}', '${item.data_abertura}', '${item.numero_nf}', ${item.data_encerramento !== null ? "'" + item.data_encerramento + "'" : 0})">

                        <i title="Itens da os" class="ace-icon fa fa-list bigger-120"></i>
                    </a>
                    </td>
  
  
                
                <td>${item.numero_nf}</td>
                <td>${item.data_abertura}</td>
                <td>${item.nome_funcionario}</td>
                <td>${item.nome_cliente}</td>
                <td>${status}</td>
                <td>${item.descricao_problema}</td>
              </tr>`;

                }).join('');

                var vaso = `
            <table class="table table-hover" id="dynamic-table">
              <thead>
                <tr>
                  <th colspan="3">Ações</th>
                  <th colspan="3">Itens</th>
                  <th>Numero da NF</th>
                  <th>Data Abertura</th>
                  <th>Funcionário</th>
                  <th>Cliente</th>
                  <th>Status</th>
                  <th>Problema</th>
                </tr>
              </thead>
              <tbody>${table_data}</tbody>
            </table>
          `;

                $("#dynamic-table").html(vaso);
            } else {
                MensageGenerica("Nenhum chamado encontrado");
                $("#dynamic-table").html('');
            }
        }

    })

}





