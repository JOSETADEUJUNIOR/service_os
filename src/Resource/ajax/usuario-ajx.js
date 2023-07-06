
function ConsultarUsuario() {
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("usuario_dataview"),
        data: {
            btn_consultar: 'ajx'
        }, success: function (tabela_preenchida) {
            $("#table_result_Usuario").html(tabela_preenchida);
        }
    })
}

function ConsultarEmpresa() {
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("usuario_dataview"),
        data: {
            btn_consultar_empresa: 'ajx'
        }, success: function (tabela_preenchida) {
            $("#resultDadosEmpresa").html(tabela_preenchida);
            $("#imglogo").attr('height', '100px');
            $("#imglogo").attr('width', '150px');
            $("#imglogo").attr('alt', 'Photo 2');
            $("#imglogo").attr('class', 'img-fluid');
        }
    })
}

function MudarStatus(id_usuario, valor) {
    let status_atual = valor;
    let id = id_usuario;
    $.ajax({
        type: 'post',
        url: BASE_URL_AJAX("usuario_dataview"),
        data: {
            id_user: id,
            status_user: status_atual,
            mudar_status: 'ajx'
        },
        success: function (resultado) {
            if (resultado == 1) {
                MensagemSucesso();
                ConsultarUsuario();
                $("#modal_status").modal("hide");
                // FiltrarUsuario($("#nome_pesquisar").val()); para poder pesquisar direto
            } else {
                MensagemErro();
            }
        }
    })

}


function SalvarPermissao() {
    var telas = $('input[name="telas[]"]:checked').map(function () {
        return $(this).val();
    }).get();

    var dados = {
        btn_cadastrar_permissao: 'ajx',
        tipo_usuario: $('#tipo_usuario').val(),
        telas: telas
        // adicione mais campos aqui, se necessário
    };

    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("usuario_dataview"),
        data: dados,
        success: function (ret) {
            if (ret == 1) {


            } else {
                MensagemSucesso();

            }
        }
    });

    return false;
}





function EnviarEmailAcesso(nome, email, site) {

    let nome_user = nome;
    let email_user = email;
    let senha = email_user.split("@", 1);
    $.ajax({
        type: 'post',
        url: BASE_URL_AJAX("usuario_dataview"),
        data: {
            nome: nome_user,
            email: email_user,
            senha: senha,
            site: site,
            EnviarEmail: 'ajx'
        },
        success: function (resultado) {

            if (resultado == 1) {
                MensagemGenerica('Email enviado com successo', 'success');
                // FiltrarUsuario($("#nome_pesquisar").val()); para poder pesquisar direto
            } else {
                MensagemErro();
            }
        }
    })

}



function VerficarEmail(emailTela) {


    if (emailTela != '') {
        $.ajax({
            type: 'post',
            url: BASE_URL_AJAX("usuario_dataview"),
            data: {
                VerificaEmail: 'ajx',
                Email: emailTela
            }, success: function (ret) {
                if (ret == -1) {

                    MensagemGenerica("O e-mail " + emailTela + " já Existe");
                    $("#email").val('');
                    $("#email").focus();
                }
            }
        })

    }
}





function FiltrarUsuario(nome_filtro) {
    var funcionario = $("#CheckFuncionario").is(":checked");
    var tecnico = $("#CheckTecnico").is(":checked");
    var tipo = 0;
    if (funcionario==true) {
       tipo = 2
    }else if (tecnico == true) {
       tipo = 3
    }{

    }
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("usuario_dataview"),
        data: {
            btnFiltrar: 'ajx',
            FiltrarNome: nome_filtro,
            FiltrarTipo: tipo
        }, success: function (dados) {
            $("#table_result_Usuario").html(dados);
        }
    })
}

function CadastrarUsuario(id_form) {
    if (NotificarCampos(id_form)) {
        $.ajax({
            type: "POST",
            url: BASE_URL_AJAX("usuario_dataview"),
            data: {

                btn_cadastrar: 'ajx',
                idUser: $("#id_user").val(),
                idEnd: $("#id_end").val(),
                tipo: $("#tipo").val(),
                setor: $("#setor").val(),
                nome_empresa_tec: $("#nome_empresa_tec").val(),
                nome: $("#nome").val(),
                email: $("#email").val(),
                telefone: $("#telefone").val(),
                cep: $("#cep").val(),
                endereco: $("#endereco").val(),
                bairro: $("#bairro").val(),
                cidade: $("#cidade").val(),
                estado: $("#estado").val(),
            },
            success: function (ret) {
                $("#usuario").modal("hide");
                RemoverLoad();
                if (ret == '1') {

                    MensagemSucesso();
                    ConsultarUsuario();
                    LimparCampos(id_form);
                } else {
                    MensagemErro();
                }

            }
        })

    }

    return false;
}

function CadastrarMeusDados(id_form) {
    if (NotificarCampos(id_form)) {
        $.ajax({
            type: "POST",
            url: BASE_URL_AJAX("usuario_dataview"),
            data: {

                btn_cadastrar: 'ajx',
                idUser: $("#id_user").val(),
                idEnd: $("#id_end").val(),
                tipo: $("#tipo_user").val(),
                setor: $("#setor").val(),
                nome_empresa_tec: $("#nome_empresa_tec").val(),
                nome: $("#nome_user").val(),
                email: $("#email_user").val(),
                telefone: $("#telefone_user").val(),
                cep: $("#cep_user").val(),
                endereco: $("#endereco_user").val(),
                bairro: $("#bairro_user").val(),
                cidade: $("#cidade_user").val(),
                estado: $("#estado_user").val(),
            },
            success: function (ret) {
                console.log(ret);
                $("#usuario").modal("hide");
                RemoverLoad();
                if (ret != '') {

                    MensagemSucesso();
                    ConsultarUsuario();

                } else {
                    MensagemErro();
                }

            }
        })

    }

    return false;
}
function CadastrarDadosEmpresa() {
    var formData = new FormData();
    formData.append("EmpNome", $("#nome").val());
    formData.append("EmpCNPJ", $("#cnpj").val());
    formData.append("EmpCep", $("#cep").val());
    formData.append("EmpEnd", $("#endereco").val());
    formData.append("EmpNumero", $("#numero").val());
    formData.append("EmpCidade", $("#cidade").val());
    formData.append("oldLogo", $("#oldLogo").val());
    formData.append("OldPathLogo", $("#OldPathLogo").val());
    if ($("#logo").prop("files")[0] == "") {
        formData.append("arquivos", '');
    } else {
        formData.append("arquivos", $("#logo").prop("files")[0]);
    }
    formData.append("btnAlterar", 'ajxx');
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("usuario_dataview"),
        data:
        formData,
        processData: false,
        contentType: false,
        success: function (ret) {
            console.log(ret);
            if (ret != "") {
                MensagemSucesso();
                ConsultarEmpresa();
            } else {
                MensagemErro();
            }
        }
    }); return false;
}





function AlterarUsuario(id_form) {

    if (NotificarCampos(id_form)) {

        $.ajax({
            type: "POST",
            url: BASE_URL_AJAX("usuario_dataview"),
            data: {

                btn_alterar: 'ajx',
                idUser: $("#id").val(),
                tipo: $("#alteraTipo").val(),
                idEnd: $("#idEndereco").val(),
                setor: $("#setor").val(),
                nome_empresa_tec: $("#nome_empresa_tec").val(),
                nome: $("#nome").val(),
                email: $("#email").val(),
                telefone: $("#telefone").val(),
                cep: $("#cep").val(),
                endereco: $("#endereco").val(),
                bairro: $("#bairro").val(),
                cidade: $("#cidade").val(),
                estado: $("#estado").val(),
            },
            success: function (ret) {
                RemoverLoad();
                if (ret == '1') {
                    FiltrarUsuario($("#nomeUser").val());
                    MensagemSucesso();
                    LimparCampos(id_form);
                } else {
                    MensagemErro();
                }

            }
        })

    }

    return false;
}

function ChecarFiltro(filtro) {

    var filtrar = filtro;
    var filtrar_nome = $("#buscaUsuario").val();
   

    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("usuario_dataview"),
        data: {
            btnFiltrar: 'ajx',
            FiltrarTipo: filtrar,
            FiltrarNome: filtrar_nome
        }, success: function (dados) {
            $("#table_result_Usuario").html(dados);
        }
    })
}

function VerificarSenhaAtual(id_form) {
    if (NotificarCampos(id_form)) {
        $.ajax({
            type: "POST",
            // url: BASE_URL_AJAX("funcionario_api"),
            url: BASE_URL_AJAX("usuario_dataview"),
            data: {
                btnVerificarSenha: 'ajx',
                senha: $("#senha").val()
            }, success: function (dados_ret) {
                if (dados_ret == 1) {

                    $("#divSenhaAtual").hide();
                    $("#divMudarSenha").show();
                } else if (dados_ret == -1) {
                    MensagemGenerica("Senha não confere", "info");
                    $("#senha").focus();
                }
            }


        })
    }
    return false;
}

function AtualizarSenha(id_form) {
    if (NotificarCampos(id_form)) {
        newsenha = $("#newsenha").val();
        resenha = $("#resenha").val();


        $.ajax({
            type: "POST",
            // url: BASE_URL_AJAX("funcionario_api"),
            url: BASE_URL_AJAX("usuario_dataview"),
            data: {
                btnAtualizarSenha: 'ajx',
                senha: newsenha,
                repetir_senha: resenha
            }, success: function (dados_ret) {

                if (dados_ret == 1) {
                    MensagemGenerica("Senha alterada com sucesso", "success");
                    $("#divSenhaAtual").show();
                    $("#divMudarSenha").hide();
                } else if (dados_ret == -2) {

                    MensagemGenerica("Senha precisa ter no mínimo 6 digitos", "info");
                    $("#newsenha").focus();
                }
                else if (dados_ret == -4) {

                    MensagemGenerica("Senha não confere", "info");
                    $("#newsenha").focus();
                }
            }


        })
    }
    return false;
}

function VerSenha() {

    if ($("#senha").prop('type') == 'password') {
        $("#senha").prop('type', 'text');

    } else {
        $("#senha").prop('type', 'password');

    }


}

$('#logo').ace_file_input({
    no_file:'Selecione o arquivo...',
    btn_choose:'Escolher',
    btn_change:'Outro',
    droppable:false,
    onchange:null,
    thumbnail:false //| true | large
    //whitelist:'gif|png|jpg|jpeg'
    //blacklist:'exe|php'
    //onchange:''
    //
});

$("#logo").change(function() {
    $("#imglogo").show();
    let logo = $("#logo").prop("files")[0];
    let reader = new FileReader();
    reader.onload = function() {
        let base64String = reader.result.split(",")[1]; // Extract the base64 string from the data URL
        // Adicionar preview da imagem selecionada
        let imgPreview = document.getElementById("imglogo");
        imgPreview.src = reader.result;
    };
    $("#imglogo").attr('height', '100px');
    $("#imglogo").attr('width', '150px');
    $("#imglogo").attr('alt', 'Photo 2');
    $("#imglogo").attr('class', 'img-fluid');
    reader.readAsDataURL(logo); // Read the file as a data URL
});

function Imprimir() {
    let filtrar_palavra = $("#buscaUsuario").val();
    let filtro_selecionado = $("input[name='form-field-radio']:checked").val();
    url = "relatorio_usuario.php?desc_filtro=" + encodeURIComponent(filtrar_palavra) + "&filtro=" + filtro_selecionado;
    window.open(url, "_blank");
}