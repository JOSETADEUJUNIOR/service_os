function LimparCamposEndereco() {
    // Limpa valores do formulário de cep.
    $("#endereco").val("");
    $("#bairro").val("");
    $("#cidade").val("");
    $("#estado").val("");
    
}


function TravarCamposEndereco(readonly){
   
        $("#cidade").attr("readonly",readonly );
        $("#estado").attr("readonly",readonly );
       
}

function LimparCamposEndereco_2() {
    // Limpa valores do formulário de cep.
    $("#endereco_user").val("");
    $("#bairro_user").val("");
    $("#cidade_user").val("");
    $("#estado_user").val("");
    
}


function TravarCamposEndereco_2(readonly){
   
        $("#cidade_user").attr("readonly",readonly );
        $("#estado_user").attr("readonly",readonly );
       
}

 //Quando o campo cep perde o foco.
function BuscarCep(){

    //Nova variável "cep" somente com dígitos.
    var cep = $("#cep").val().replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if(validacep.test(cep)) {

            //Preenche os campos com "..." enquanto consulta webservice.
            $("#endereco").val("...");
            $("#bairro").val("...");
            $("#cidade").val("...");
            $("#estado").val("...");
           
            //Consulta o webservice viacep.com.br/
            $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                if (!("erro" in dados)) {
                    //Atualiza os campos com os valores da consulta.
                    $("#endereco").val(dados.logradouro);
                    $("#bairro").val(dados.bairro);
                    $("#cidade").val(dados.localidade);
                    $("#estado").val(dados.uf);
                    TravarCamposEndereco(true);
                } //end if.
                else {
                    //CEP pesquisado não foi encontrado.
                    LimparCamposEndereco();
                    TravarCamposEndereco(false);
                    MensagemGenerica("CEP: " + cep + " inválido!");
                }
            });
        } //end if.
        else {
            //cep é inválido.
            LimparCamposEndereco();
            //MensagemGenerica("CEP: " + cep + " inválido!");
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep();
    }
}

function BuscarCep_2(){

    //Nova variável "cep" somente com dígitos.
    var cep_2 = $(".cep_2").val().replace(/\D/g, '');

    //Verifica se campo cep possui valor informado.
    if (cep_2 != "") {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if(validacep.test(cep_2)) {

            //Preenche os campos com "..." enquanto consulta webservice.
            $("#endereco_user").val("...");
            $("#bairro_user").val("...");
            $("#cidade_user").val("...");
            $("#estado_user").val("...");
           
            //Consulta o webservice viacep.com.br/
            $.getJSON("https://viacep.com.br/ws/"+ cep_2 +"/json/?callback=?", function(dados) {

                if (!("erro" in dados)) {
                    //Atualiza os campos com os valores da consulta.
                    $("#endereco_user").val(dados.logradouro);
                    $("#bairro_user").val(dados.bairro);
                    $("#cidade_user").val(dados.localidade);
                    $("#estado_user").val(dados.uf);
                    TravarCamposEndereco_2(true);
                } //end if.
                else {
                    //CEP pesquisado não foi encontrado.
                    LimparCamposEndereco_2();
                    TravarCamposEndereco_2(false);
                    MensagemGenerica_2("CEP: " + cep_2 + " inválido!");
                }
            });
        } //end if.
        else {
            //cep é inválido.
            LimparCamposEndereco_2();
            //MensagemGenerica("CEP: " + cep + " inválido!");
        }
    } //end if.
    else {
        //cep sem valor, limpa formulário.
        limpa_formulário_cep_2();
    }
}