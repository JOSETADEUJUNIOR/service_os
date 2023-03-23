
function ConsultarModelo() {
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("modelo_dataview"),
        data: {
            btn_consultar: 'OK'
        }, success: function (tabela_preenchida) {
            $("#tabela_result_modelo").html(tabela_preenchida);
        }
    })
}

function Excluir(){
    let id = $("#ExcluirID").val();
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("modelo_dataview"),
        data: {
            btnExcluir: 'ajx',
            ExcluirID: id
        }, success: function(ret){
            $("#modalExcluir").modal("hide");
            if(ret == 1) {
                MensagemSucesso();
                ConsultarModelo();
            }else{
                MensagemExcluirErro();
            }
        }
    })
    return false;
}

function AlterarModelo() {
    let nome = $("#AlteraNome").val();
    let id = $("#AlteraID").val();
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("modelo_dataview"),
        data: {
            btnAlterar: 'ajx',
            AlteraID: id,
            AlteraNome: nome
        },
        success: function (ret) {
            $("#alterarModelo").modal("hide");
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


function CadastrarModelo(id_form) {

    if (NotificarCampos(id_form)) {
        let id = $("#AlteraID").val();
        let modelo = $("#nome").val();
        $.ajax({
            type: "POST",
            url: BASE_URL_AJAX("modelo_dataview"),
            data: {
                btn_cadastrar: 'ajx',
                AlteraID: id,
                nome: modelo
            },
            success: function (ret) {
                $("#modelo").modal("hide");
                RemoverLoad();
                if (ret == 1) {
                    MensagemSucesso();
                    LimparCampos(id_form);
                    ConsultarModelo();


                } else {
                    MensagemErro();
                }
            }
        })
    }
    return false;
}

function FiltrarModelo(nome_filtro){
    
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("modelo_dataview"),
        data: {
            btnFiltrar: 'ajx',
            FiltrarNome: nome_filtro
        }, success: function(dados){
            $("#tabela_result_modelo").html(dados);
        }
    })
}