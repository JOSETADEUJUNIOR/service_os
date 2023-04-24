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

function EmitirSetores() {
    $.ajax({
        type: "GET",
        url: BASE_URL_AJAX("setor_dataview"),
        data: {
            nomeTela: 'listarUsuarios.php',
            btn_pdf: 'ajx'
        }
    })
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

function DetalharProduto(id_categoria_alterar) {

    $.ajax({
        type: "post",
        url: BASE_URL_AJAX("produto_dataview"),
        data: {

        }, 
        success: function (dados_retorno) {
            let resultado = dados_retorno['result'];
        }
    })
}

function AlterarSetor() {
    
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("setor_dataview"),
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
            if (ret == 1) {
                MensagemSucesso();
                LimparCampos();
                ConsultarProduto();
            } else {
                MensagemErro();
            }
        }
    })
    return false;
}

function FiltrarSetor(nome_filtro) {
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("setor_dataview"),
        data: {
            btnFiltrar: 'ajx',
            FiltrarNome: nome_filtro
        }, success: function (dados) {
            $("#table_result_Setor").html(dados);
        }
    })
}

$('#gritter-without-image').on(ace.click_event, function () {
    $.gritter.add({
        // (string | mandatory) the heading of the notification
        title: 'This is a notice without an image!',
        // (string | mandatory) the text inside the notification
        text: 'This will fade out after a certain amount of time. Vivamus eget tincidunt velit. Cum sociis natoque penatibus et <a href="#" class="orange">magnis dis parturient</a> montes, nascetur ridiculus mus.',
        class_name: 'gritter-success' + (!$('#gritter-light').get(0).checked ? ' gritter-light' : '')
    });

    return false;
});