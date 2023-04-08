
function ConsultarEquipamentos() {
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("alocar_dataview"),
        data: {
            btn_consultar: 'ajx'
        }, success: function (tabela_preenchida) {
            $("#tabela_result_alocado").html(tabela_preenchida);
        }
    })
}

function ConsultarEquipamentosNaoAlocados() {
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("alocar_dataview"),
        data: {
            btn_consultar_equipamento: 'ajx'
        }, success: function (tabela_preenchida) {
            $("#table_result_equip").html(tabela_preenchida);
        }
    })
}


function alocarEquipamento(id_form) {

    if (NotificarCampos(id_form)) {
        let equip = $("#equipamento").val();
        let setor = $("#setor").val();
        $.ajax({
            type: "POST",
            url: BASE_URL_AJAX("alocar_dataview"),
            data: {
                btn_cadastrar: 'ajx',
                equipamento: equip,
                setor: setor,
            },
            success: function (ret) {
                $("#alocado").modal("hide");
                RemoverLoad();
                if (ret == 1) {
                    MensagemSucesso();
                    ConsultarEquipamentos();
                    ConsultarEquipamentosNaoAlocados();
                    LimparCampos(id_form);
                } else {
                    MensagemErro();
                }
            }
        })
    }
    return false;


}
function Excluir() {
    let id = $("#ExcluirID").val();
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("alocar_dataview"),
        data: {
            btnExcluir: 'ajx',
            ExcluirID: id
        }, success: function (ret) {
            $("#modalExcluir").modal("hide");
            if (ret == 1) {
                MensagemSucesso();
                ConsultarEquipamentos();
                ConsultarEquipamentosNaoAlocados();
            } else {
                MensagemExcluirErro();
            }
        }
    })
    return false;
}


function FiltrarEquipamento(nome_filtro) {
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("alocar_dataview"),
        data: {
            btnFiltrar: 'ajx',
            FiltrarNome: nome_filtro
        }, success: function (dados) {
            console.log(dados);
            $("#tabela_result_alocado").html(dados);
        }
    })
}

