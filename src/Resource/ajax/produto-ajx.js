
function CadastrarProduto(id_form) {
    var img = $("#ProdImagem").prop("files")[0];
    if (NotificarCampos(id_form)) {
        var formData = new FormData();
        formData.append("ProdID", $("#ProdID").val());
        formData.append("ProdDescricao", $("#ProdDescricao").val());
        formData.append("ProdCodBarra", $("#ProdCodBarra").val());
        formData.append("ProdValorCompra", $("#ProdValorCompra").val());
        formData.append("ProdValorVenda", $("#ProdValorVenda").val());
        formData.append("ProdEstoque", $("#ProdEstoque").val());
        formData.append("ProdEstoqueMin", $("#ProdEstoqueMin").val());
        if (img != ""){
            formData.append("ProdImagem", img);
        }
        formData.append("btn_cadastrar", 'ajx');
        $.ajax({
            type: "POST",
            url: BASE_URL_AJAX("produto_dataview"),
            data: formData,
            processData: false,
            contentType: false,
            success: function (resultado) {
                console.log(resultado);
                if (resultado == 1) {
                    MensagemSucesso();
                    LimparCampos(id_form);
                    ConsultarProduto();
                    $("#produto").modal("hide");
                } else if (resultado == 10){
                    MensagemGenerica('Arquivo muito grande !! Max: 2MB');
                } else if (resultado == 11){
                    MensagemGenerica('Tipo de arquivo não aceito'); 
                } else {
                    MensagemErro();
                }
            }
        })
    }
    return false;
}

function Cadastrarteste(id_form) {
    let img = $("#ProdImagem").prop("files")[0];
    
    if (NotificarCampos(id_form)) {
        let reader = new FileReader();
        reader.onload = function () {
            let base64String = reader.result.split(",")[1];
            let dados = {
                ProdID: $("#ProdID").val(),
                ProdDescricao: $("#ProdDescricao").val(),
                ProdCodBarra: $("#ProdCodBarra").val(),
                ProdValorCompra: $("#ProdValorCompra").val(),
                ProdValorVenda: $("#ProdValorVenda").val(),
                ProdEstoque: $("#ProdEstoque").val(),
                ProdEstoqueMin: $("#ProdEstoqueMin").val(),
                Nome: img['name'],
                Type: img['type'],
                Size: img['size'],
                btn_cadastrar: 'ajx',
                ProdImagem: base64String
            };
            $.ajax({
                type: "POST",
                url: BASE_URL_AJAX("produto_dataview"),
                data: JSON.stringify(dados),
                success: function (ret) {
                    $("#produto").modal("hide");
                    RemoverLoad();
                    if (ret == 1) {
                        MensagemSucesso();
                        LimparCampos(id_form);
                        ConsultarProduto();
                    } else {
                        MensagemErro();
                    }
                }
            })
        }
        reader.readAsDataURL(img);
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

function LimparImgProdutoAjx(){
    $("#ProdImagem").val('');
    $("#imgProd").attr('src', '');
    $("#imgProd").hide(); 
}

$("#ProdImagem").change(function() {
    $("#imgProd").show();
    let ProdImagem = $("#ProdImagem").prop("files")[0];
    let reader = new FileReader();
    reader.onload = function() {
        let base64String = reader.result.split(",")[1]; // Extract the base64 string from the data URL
        // Adicionar preview da imagem selecionada
        let imgPreview = document.getElementById("imgProd");
        imgPreview.src = reader.result;
    };
    reader.readAsDataURL(ProdImagem); // Read the file as a data URL
});