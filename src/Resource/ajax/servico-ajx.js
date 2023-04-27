
function ConsultarServico() {
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("servico_dataview"),
        data: {
            btn_consultar: 'ajx'
        }, success: function (tabela_preenchida) {
            $("#tabela_result_servico").html(tabela_preenchida);
        }
    })
}


function Excluir() {
    let id = $("#ExcluirID").val();
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("servico_dataview"),
        data: {
            btnExcluir: 'ajx',
            ExcluirID: id
        }, success: function (ret) {
            $("#modalExcluir").modal("hide");
            if (ret == 1) {
                MensagemSucesso();
                ConsultarServico();
            } else {
                MensagemExcluirErro();
            }
        }
    })
    return false;
}

function AlterarServico() {
    let nome = $("#AlteraNome").val();
    let id = $("#AlteraID").val();
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("servico_dataview"),
        data: {
            btnAlterar: 'ajx',
            AlteraID: id,
            AlteraNome: nome
        },
        success: function (ret) {
            $("#alterarServico").modal("hide");
            if (ret == 1) {
                MensagemSucesso();
                ConsultarModelo();

            } else {
                MensagemErro();
            }
        }
    })
    return false;
}


function CadastrarServico(id_form) {


    if (NotificarCampos(id_form)) {
        let id = $("#ServID").val();
        let nome = $("#ServNome").val();
        let valor = $("#ServValor").val();
        let descricao = $("#ServDescricao").val();
        $.ajax({
            type: "POST",
            url: "../../Resource/dataview/servico_dataview.php",
            data: {
                btn_cadastrar: 'ajx',
                ServID: id,
                ServNome: nome,
                ServValor: valor,
                ServDescricao: descricao,
            },
            success: function(ret) {
                $("#servico").modal("hide");
                console.log(ret);
                if (ret == '1') {
                    MensagemSucesso();
                    LimparCampos(id_form);
                    ConsultarServico();
                } else {
                    MensagemErro();
                }
            }
        })
    }

    return false;
}


function FiltrarServicos(nome_filtro) {
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("servico_dataview"),
        data: {
            btnFiltrar: 'ajx',
            FiltrarNome: nome_filtro
        }, success: function (dados) {
            $("#table_result_Servico").html(dados);
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


