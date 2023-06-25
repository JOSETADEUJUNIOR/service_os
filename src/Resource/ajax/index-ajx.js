
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
        type: 'doughnut',
        data: {
          labels: labels,
          datasets: [{
            data: valores,
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
          }]
        },
        options: {
          plugins: {
            legend: {
              display: false, // Exibir legenda
              position: 'bottom' // Posição da legenda (pode ser 'top', 'bottom', 'left' ou 'right')
            },
            datalabels: {
              formatter: function (value, context) {
                return value + " (" + context.chart.data.labels[context.dataIndex] + ")";
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
        type: 'doughnut',
        data: {
          labels: labels,
          datasets: [{
            label: 'Total de chamados por setor',
            data: valores,
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(255, 159, 64, 0.2)',
              'rgba(255, 205, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
              'rgb(255, 99, 132)',
              'rgb(255, 159, 64)',
              'rgb(255, 205, 86)',
              'rgb(75, 192, 192)',
              'rgb(54, 162, 235)',
              'rgb(153, 102, 255)',
              'rgb(201, 203, 207)'
            ],
            borderWidth: 1
          }]
        },
        options: {
          plugins: {
            legend: {
              display: false, // Exibir legenda
              position: 'bottom' // Posição da legenda (pode ser 'top', 'bottom', 'left' ou 'right')
            },
            datalabels: {
              formatter: function (value, context) {
                return value + " (" + context.chart.data.labels[context.dataIndex] + ")";
              },
              color: "#fff"
            }
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

        total_chamados += parseInt(chamado.Total);
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
          labels: ["O.S aguardando", "O.S em atendimento", "O.S finalizadas"],
          datasets: [{
            label: 'Total de O.S',
            data: [aguardando, em_atendimento, concluidos],
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(255, 159, 64, 0.2)',
              'rgba(255, 205, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
              'rgb(255, 99, 132)',
              'rgb(255, 159, 64)',
              'rgb(255, 205, 86)',
              'rgb(75, 192, 192)',
              'rgb(54, 162, 235)',
              'rgb(153, 102, 255)',
              'rgb(201, 203, 207)'
            ],
            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
          plugins: {
            legend: {
              display: false, // Exibir legenda
              position: 'bottom' // Posição da legenda (pode ser 'top', 'bottom', 'left' ou 'right')
            },
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
