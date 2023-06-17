
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
        labels.push(item.nome_funcionario);
        valores.push(item.total);
        totalGeral = item.total;
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



function BuscarChamadosPorSetor() {
  $.ajax({
    url: BASE_URL_AJAX("index_dataview"),
    method: 'GET',
    dataType: 'json',
    data: { acao: 'chamado_por_setor' },
    success: function (dados) {
      console.log(dados);
      
      var labels = [];
      var valores = [];

      for (var i = 0; i < dados.length; i++) {
        var setor = dados[i];
        
        labels.push(setor.nome_setor);
        valores.push(setor.total);
      }
      $("#qtd_chamado_por_setor").html(setor.total);
      var ctx = document.getElementById('chamado_por_setor').getContext('2d');
      var meuGrafico = new Chart(ctx, {
        type: 'bar',
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
      var total_chamados = 0;
      var aguardando = 0;
      var em_atendimento = 0;
      var concluidos = 0;
      
      // Iterar sobre a matriz de objetos
      for (var i = 0; i < data.length; i++) {
        var chamado = data[i];
        
        total_chamados += chamado.Total;
        aguardando += parseInt(chamado.Aguardando);
        em_atendimento += parseInt(chamado.Em_atendimento);
        concluidos += parseInt(chamado.Encerrando);
      }
      
      $("#total_chamados").html(total_chamados);
      $("#aguardando").html(aguardando);
      $("#em_atendimento").html(em_atendimento);
      $("#concluidos").html(concluidos);
      $("#qtd_chamado_por_status").html(total_chamados);
      
      var ctx = document.getElementById('chart_chamados_status').getContext('2d');
      var meuGrafico = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ["Aguardando", "Em atendimento", "Encerrando"],
          datasets: [{
            label: 'Total de chamados',
            data: [aguardando, em_atendimento, concluidos],
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
        }
      });
    }
  });
}
