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


function ConsultarSetor() {
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("setor_dataview"),
        data: {
            btn_consultar: 'ajx'
        }, success: function (tabela_preenchida) {
            $("#table_result_Setor").html(tabela_preenchida);
        }
    })
}

function Excluir() {

    let id = $("#ExcluirID").val();

    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("setor_dataview"),
        data: {
            btnExcluir: 'ajx',
            ExcluirID: id
        }, success: function (ret) {
            $("#modalExcluir").modal("hide");
            if (ret == 1) {
                MensagemSucesso();
                ConsultarSetor();
            } else {
                MensagemExcluirErro();
            }
        }
    })
    return false;

}


function AlterarSetor() {
    let nome = $("#nome").val();
    let id = $("#AlteraID").val();
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("setor_dataview"),
        data: {
            btnAlterar: 'ajx',
            AlteraID: id,
            AlteraNome: nome
        }, success: function (ret) {
            $("#alterarSetor").modal("hide");
            if (ret == 1) {
                MensagemSucesso();
                LimparCampos();
                ConsultarSetor();
            } else {
                MensagemErro();
            }
        }
    })
    return false;
}


function CadastrarSetor(id_form) {

    if (NotificarCampos(id_form)) {
        let id = $("#AlteraID").val();
        let nome_cad = $("#nome").val();
        $.ajax({
            type: "POST",
            url: "../../Resource/dataview/setor_dataview.php",
            data: {
                btn_cadastrar: 'ajx',
                AlteraID: id,
                nome: nome_cad
            },
            success: function (ret) {
                $("#setor").modal("hide");
                RemoverLoad();
                if (ret == '1') {
                    MensagemSucesso();
                    LimparCampos(id_form);
                    ConsultarSetor();
                } else {
                    MensagemErro();
                }
            }
        })
    }
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