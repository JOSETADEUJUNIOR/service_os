function CadastrarProduto(id_form) {

    if (NotificarCampos(id_form)) {
        var formData = new FormData();
        formData.append("ProdID", $("#ProdID").val());
        formData.append("ProdDescricao", $("#ProdDescricao").val());
        formData.append("ProdCodBarra", $("#ProdCodBarra").val());
        formData.append("ProdValorCompra", $("#ProdValorCompra").val());
        formData.append("ProdValorVenda", $("#ProdValorVenda").val());
        formData.append("ProdEstoque", $("#ProdEstoque").val());
        formData.append("ProdEstoqueMin", $("#ProdEstoqueMin").val());
        formData.append("ProdImagem", $("#ProdImagem").prop("files")[0]);
        formData.append("btn_cadastrar", 'ajx');
        $.ajax({
            type: "POST",
            url: BASE_URL_AJAX("produto_dataview"),
            data: formData,
            processData: false,
            contentType: false,
            success: function (ret) {
                $("#produto").modal("hide");
                RemoverLoad();
                if (ret == '1') {
                    MensagemSucesso();
                    LimparCampos(id_form);
                    ConsultarProduto();
                } else {
                    MensagemErro();
                }
            }
        })
    }
    return false;
}

function ConsultarProduto() {
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("produto_dataview"),
        data: {
            btn_consultar: 'ajx'
        }, success: function (tabela_preenchida) {
            $("#table_result_produto").html(tabela_preenchida);
        }
    })
}

function FiltrarProduto(nome_filtro) {
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("produto_dataview"),
        data: {
            btnFiltrar: 'ajx',
            FiltrarNome: nome_filtro
        }, success: function (dados) {
            $("#table_result_produto").html(dados);
        }
    })
}

function MudarStatusProduto(id_produto, valor) {
    let status_atual = valor;
    let id = id_produto;
    $.ajax({
        type: 'post',
        url: BASE_URL_AJAX("produto_dataview"),
        data: {
            ProdID: id,
            status_produto: status_atual,
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