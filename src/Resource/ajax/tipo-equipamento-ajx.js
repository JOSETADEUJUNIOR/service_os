function ConsultarTipo(){
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("tipoequipamento_dataview"),
        data: {
            btnConsultar: 'ajx'
        }, success: function(tabela_preenchida){
            $("#tabela_result_tipo").html(tabela_preenchida);
        }
    })
}

function Excluir(){
    let id = $("#ExcluirID").val();
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("tipoequipamento_dataview"),
        data: {
           btnExcluir: 'ajx',
           ExcluirID: id  
        }, success: function(ret){
            $("#modalExcluir").modal("hide");
            if (ret == 1) {
                MensagemSucesso();
                ConsultarTipo();
            }else{
                MensagemExcluirErro();
            }
        }
    })
    return false;
}

function AlterarTipo(){
    let nome = $("#AlteraNome").val();
    let id = $("#AlteraID").val();

    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("tipoequipamento_dataview"),
        data: {
            btnAlterar: 'ajx',
            AlteraID: id,
            AlteraNome: nome
        }, success: function(ret){
            $("#alterarTipoEquipamento").modal("hide");
            if(ret == 1){
                MensagemSucesso();
                ConsultarTipo();
            }else{
                MensagemErro();
            }

        }
    })
    
    return false;

}

function CadastrarTipo(id_form){

    if (NotificarCampos(id_form)) {
        let id = $("#AlteraID").val();
        let nome_tipo = $("#nome").val();
        $.ajax({
            type: "POST",
            url: "../../Resource/dataview/tipoequipamento_dataview.php",
            data: {
                btn_cadastrar: 'ajx',
                AlteraID: id,
                nome: nome_tipo,
            },
            success: function(ret){
                $("#tipoequipamento").modal("hide");
                RemoverLoad();
                if(ret == 1) {
                        MensagemSucesso();
                        LimparCampos(id_form);
                        ConsultarTipo();
                    }else{
                        
                        MensagemErro();
                }
            }
        })
    }
    return false;
}

function FiltrarTipo(nome_filtro){
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("tipoequipamento_dataview"),
        data: {
            btnFiltrar: 'ajx',
            FiltrarNome: nome_filtro
        }, success: function(dados){
            $("#tabela_result_tipo").html(dados);
        }
    })
}