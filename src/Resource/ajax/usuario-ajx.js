
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

                console.log(ret);
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
            console.log(resultado);
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
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("usuario_dataview"),
        data: {
            btnFiltrar: 'ajx',
            FiltrarNome: nome_filtro
        }, success: function (dados) {
            $("#table_result_Usuario").html(dados);
        }
    })
}

function MudarStatus() {

    let id = $("#id_status").val();
    let status_atual = $("#status_atual").val();
    alert(id);
    alert(status_atual);

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
                    console.log(ret);
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
                    console.log(ret);
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

    filtrar = filtro;
    $.ajax({
        type: "POST",
        url: BASE_URL_AJAX("usuario_dataview"),
        data: {
            btnFiltrar: 'ajx',
            FiltrarTipo: filtrar
        }, success: function (dados) {
            $("#table_result_Usuario").html(dados);
        }
    })
}

function VerificarSenhaAtual(id_form) {
    if (NotificarCampos(id_form)) {
        alert($("#senha").val());
       $.ajax({
            type: "POST",
            // url: BASE_URL_AJAX("funcionario_api"),
            url: BASE_URL_AJAX("usuario_dataview"),
            data: {
                btnVerificarSenha: 'ajx',
                senha: $("#senha").val()
            }, success: function(dados_ret) {
                if (dados_ret == 1) {
                    console.log(dados_ret);
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

function AtualizarSenha(id_form){
    if (NotificarCampos(id_form)) {
        newsenha = $("#newsenha").val();
        resenha = $("#resenha").val();
        console.log(newsenha);
        console.log(resenha);
       $.ajax({
            type: "POST",
            // url: BASE_URL_AJAX("funcionario_api"),
            url: BASE_URL_AJAX("usuario_dataview"),
            data: {
                btnAtualizarSenha: 'ajx',
                senha: newsenha,
                repetir_senha: resenha
            }, success: function(dados_ret) {
                console.log(dados_ret);
                if (dados_ret == 1) {
                   MensagemGenerica("Senha alterada com sucesso", "success");
                    $("#divSenhaAtual").show();
                    $("#divMudarSenha").hide();
                }else if(dados_ret == -2){
                    
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

