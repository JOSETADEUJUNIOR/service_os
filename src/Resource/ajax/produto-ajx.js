function CadastrarProduto(id_form) {

    if (NotificarCampos(id_form)) {
        $.ajax({
            type: "POST",
            url: BASE_URL_AJAX("produto_dataview"),
            data: {
                btn_cadastrar: 'ajx',
                ProdID: $("#ProdID").val(),
                ProdDescricao: $("#ProdDescricao").val(),
                ProdCodBarra: $("#ProdCodBarra").val(),
                ProdValorCompra: $("#ProdValorCompra").val(),
                ProdValorVenda: $("#ProdValorVenda").val(),
                ProdEstoqueMin: $("#ProdEstoqueMin").val(),
                ProdEstoque: $("#ProdEstoque").val()
            },
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
