
function BuscarChamadosPorColaborador() {
  $.ajax({
    url: BASE_URL_AJAX("index_dataview"),
    method: 'GET',
    dataType: 'json',
    data: { acao: 'requisicao' },
    success: function (data) {
   
      var labels = [];
      var valores = [];
      var totalGeral = [];
      $.each(data, function (index, item) {
        labels.push(item.nome);
        valores.push(item.total_chamados);
        totalGeral = item.total_geral;
      });
     $("#qtd_chamado_por_responsável").html(totalGeral);
      $("#qtd_chamado_por_periodo").html(totalGeral);
      var ctx = document.getElementById('chamado_por_responsavel').getContext('2d');
      var meuGrafico = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: labels,
          datasets: [{
            label: 'Chamados por responsável',
            data: valores,
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          },
          plugins: {
            datalabels: {
              formatter: function (value, context) {
                return value + " (" + context.dataset.labels[context.dataIndex] + ")";
              },
              color: "#fff"
            }


          }
        }
      });
    }
  });
}

function BuscarChamadosPorPeriodo() {
  $.ajax({
    url: BASE_URL_AJAX("index_dataview"),
    method: 'GET',
    dataType: 'json',
    data: { acao: 'chamado_por_periodo' },
    success: function (periodo) {
      var dados = periodo;
      var labels = [];
      var valores = [];

      for (var i = 0; i < dados.length; i++){
        labels.push(dados[i].mes + '/' + dados[i].ano);
        valores.push(dados[i].total_chamados);
      }

      var ctx = document.getElementById('chamado_por_periodo').getContext('2d');
      var meuGrafico = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: labels,
          datasets: [{
            label: 'Total de chamados por Periodo',
            data: valores,
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          }
        }
      });
    }
  });
}

function BuscarChamadosPorSetor() {
  $.ajax({
    url: BASE_URL_AJAX("index_dataview"),
    method: 'GET',
    dataType: 'json',
    data: { acao: 'chamado_por_setor' },
    success: function (setor) {
      var dados = setor;
      var labels = [];
      var valores = [];

      for (var i in dados){
        labels.push(dados[i].nome_setor);
        valores.push(dados[i].quantidade_por_setor);
      }

      var ctx = document.getElementById('chamado_por_setor').getContext('2d');
      var meuGrafico = new Chart(ctx, {
        type: 'pie',
        data: {
          labels: labels,
          datasets: [{
            label: 'Total de chamados por Setor',
            data: valores,
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          }
        }
      });
    }
  });
}











function BuscarChamadosPorStatus() {
  $.ajax({
    url: BASE_URL_AJAX("index_dataview"),
    method: 'GET',
    dataType: 'json',
    data: { acao: 'chamado_status' },
    success: function (data) {
      var total_chamados = data.Total;
      var aguardando = data.Aguardando;
      var em_atendimento = data.Em_atendimento;
      var concluidos = data.Encerrando;
      $("#total_chamados").html(total_chamados);
      $("#aguardando").html(aguardando);
      $("#em_atendimento").html(em_atendimento);
      $("#concluidos").html(concluidos);
      var ctx = document.getElementById('chart_chamados_status').getContext('2d');
      var meuGrafico = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ["Aguardando", "Em atendimento", "Encerrando"],
          datasets: [{
            label: 'Total de chamados',
            data: [data.Aguardando, data.Em_atendimento, data.Encerrando],
            backgroundColor: ["yellow", "blue", "green"],

          }]
        },
        options: {
          responsive: true,
          plugins: {
            datalabels: {
              formatter: function (value, context) {
                return value + " (" + context.dataset.labels[context.dataIndex] + ")";
              },
              color: "#fff"
            }


          }
          /*  scales: {
             yAxes: [{
               ticks: {
                 beginAtZero: true
               }
             }]
           } */


        }
      });
    }
  });
}

function BuscarDadosTabela()
{

  $.ajax({
    url: BASE_URL_AJAX("index_dataview"),
    method: 'GET',
    dataType: 'json',
    data: { acao: 'chamado_dados_tabela' },
    success: function (tabela_html) {
        console.log(tabela_html);
      

    /*   var total_chamados = data.Total;
      var aguardando = data.Aguardando;
      var em_atendimento = data.Em_atendimento;
      var concluidos = data.Encerrando;
      $("#total_chamados").html(total_chamados);
      $("#aguardando").html(aguardando);
      $("#em_atendimento").html(em_atendimento);
      $("#concluidos").html(concluidos); */
    }
  });


}


function BuscarChamadosTotais() {
  $.ajax({
    url: BASE_URL_AJAX("index_dataview"),
    method: 'GET',
    dataType: 'json',
    data: { acao: 'chamado_status' },
    success: function (data) {
      var ctx = document.getElementById('chamados_por_setor1').getContext('2d');
      var meuGrafico = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['A', 'B', 'C'],
          datasets: [
            {
              label: 'Dataset 1',
              data: [1, 2, 3],
              borderColor: '#36A2EB',
              backgroundColor: '#9BD0F5',
            },
            {
              label: 'Dataset 2',
              data: [2, 3, 4],
              borderColor: '#FF6384',
              backgroundColor: '#FFB1C1',
            }
          ]
        },
        options: {
          responsive: true,
          /* plugins: {
            datalabels: {
              formatter: function (value, context) {
                return value + " (" + context.dataset.labels[context.dataIndex] + ")";
              },
              color: "#fff"
            }


          } */
          /*  scales: {
             yAxes: [{
               ticks: {
                 beginAtZero: true
               }
             }]
           } */


        }
      });
    }
  });
}






/*

function BuscarChamadosPorColaborador(){
alert('teste');
$.ajax({
    type: 'GET',
    url: BASE_URL_AJAX("index_dataview"), // Coloque aqui o arquivo PHP que executa a consulta
    data: {
        consultarChamado: 'ajx'
    },success: function(data) {



      // Variáveis para armazenar os dados
      var nomes = [];
      var totais = [];

      // Loop pelos resultados da consulta
      for (var i = 0; i < data.length; i++) {
        nomes.push(data[i].nome);
        totais.push(data[i].total_chamados);
        console.log(nomes);
        console.log(totais);
      }

      // Configuração do gráfico
      var config = {
        type: 'bar',
        data: {
          labels: nomes,
          datasets: [{
            label: 'Total de chamados',
            data: totais,
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: true
              }
            }]
          }
        }
      };

      // Criação do gráfico
      var chart = new Chart(document.getElementById('chart'), config);
    }
  });

} */