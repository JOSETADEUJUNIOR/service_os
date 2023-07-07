
function ConsultarEquipamentos() {
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("equipamento_dataview"),
        data: {
            btn_consultar: 'ajx'
        }, success: function (tabela_preenchida) {
            $("#tabela_result_equipamento").html(tabela_preenchida);
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
        url: BASE_URL_AJAX("equipamento_dataview"),
        data: {
            btnExcluir: 'ajx',
            ExcluirID: id
        }, success: function (ret) {
            $("#modalExcluir").modal("hide");
            if (ret == 1) {
                MensagemSucesso();
                ConsultarEquipamentos();
            } else {
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


function CadastrarEquipamento(id_form) {

    if (NotificarCampos(id_form)) {

        let modelo = $("#modelo").val();
        let tipoequip = $("#tipo").val();
        let identificacao = $("#identificacao").val();
        let descricao = $("#descricao").val();
        let ID = $("#idEquip").val();
        let servico = $("#servico").val();
        let insumo = $("#insumo").val();
        // let servicosString = servico.join(",");
        // let insumosString = insumo.join(",");
       // console.log(modelo,tipoequip,identificacao,descricao,ID,servico,insumo,servicosString,insumosString); exit();
        $.ajax({
            type: "POST",
            url: BASE_URL_AJAX("equipamento_dataview"),
            data: {
                btn_cadastrar: 'ajx',
                modelo: modelo,
                tipoequip: tipoequip,
                identificacao: identificacao,
                descricao: descricao,
                idEquip: ID,
                IdProdutoEquipamento: insumo,
                IdServicoEquipamento: servico
            },
            success: function (ret) {
                 
                $("#equipamento").modal("hide");
                RemoverLoad();
                if (ret == 1) {
                    MensagemSucesso();
                    ConsultarEquipamentos();
                    LimparCampos(id_form);

                } else {
                    MensagemErro();
                }
            }
        })
    }
    return false;
}


function FiltrarEquipamentos(id_form) {
    if (NotificarCampos(id_form)) {
    let tipo = $("#tipoFiltro").val();
    let filtrar_palavra = $("#filtro_palavra").val();
    console.log(tipo);
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("equipamento_dataview"),
        data: {
            btn_filtro: 'ajx',
            BuscarTipo: tipo,
            filtro_palavra: filtrar_palavra
        }, success: function (tabela_preenchida) {
            console.log(tabela_preenchida);
          if (tabela_preenchida !="") {
            
            $("#divResult").show();
            $("#tabela_result_equipamento").html(tabela_preenchida);
            $("#relatorioEquipamento").removeClass("ocultar");
          }else if (tabela_preenchida ==""){
            $("#relatorioEquipamento").addClass("ocultar");
            $("#tabela_result_equipamento").html('');
            $("#divResult").hide();
            MensagemGenerica("Nenhum dado encontrado");
            
          }
          
        }
    })
}
return false;
}

function Imprimir() {
    let tipo = $("#tipoFiltro").val();
    let filtrar_palavra = $("#filtro_palavra").val();
    location = "relatorio_equipamento.php?filtro=" + tipo + "&desc_filtro="+ filtrar_palavra;
}

function FiltrarEquipamento(nome_filtro) {

    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("equipamento_dataview"),
        data: {
            btnFiltrar: 'ajx',
            FiltrarNome: nome_filtro
        }, success: function (dados) {
            $("#tabela_result_equipamento").html(dados);
        }
    })
}

