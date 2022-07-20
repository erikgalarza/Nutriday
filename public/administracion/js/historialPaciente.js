

(function($) {
    'use strict';
    $(function() {

      if ($("#orders-chart").length) {
        const months = ["Ene", "Feb", "Mar","Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"];
        var datos = document.getElementById('datosAntropometricos').value
        datos = JSON.parse(datos);

        var fechas = [],imcs = [];
        datos.forEach(dato=>{
            let fecha = dato.created_at.substr(5,2);
            let mes = Number(fecha);
            let cadMes = months[mes-1];
            fechas.push(cadMes)
            imcs.push(dato.imc)
        })
        var currentChartCanvas = $("#orders-chart").get(0).getContext("2d");

        var currentChart = new Chart(currentChartCanvas, {
          type: 'bar',
          data: {
            labels: fechas,
            datasets: [{
                label: 'Indice de Masa Corporal',
                data: imcs,
                backgroundColor: '#392c70'
              },
            //   {
            //     label: 'Estimated',
            //     data: [480, 600, 510, 600, 1000, 570, 500, 350, 450, 710, 820, 650],
            //     backgroundColor: '#d1cede'
            //   }
            ]
          },
          options: {
            responsive: true,
            maintainAspectRatio: true,
            layout: {
              padding: {
                left: 0,
                right: 0,
                top: 20,
                bottom: 0
              }
            },
            scales: {
              yAxes: [{
                gridLines: {
                  drawBorder: false,
                },
                ticks: {
                  stepSize: 25,
                  fontColor: "#686868"
                }
              }],
              xAxes: [{
                stacked: true,
                ticks: {
                  beginAtZero: true,
                  fontColor: "#686868"
                },
                gridLines: {
                  display: false,
                },
                barPercentage: 0.4
              }]
            },
            legend: {
              display: false
            },
            elements: {
              point: {
                radius: 0
              }
            },
            legendCallback: function(chart) {
              var text = [];
              text.push('<ul class="legend'+ chart.id +'">');
              for (var i = 0; i < chart.data.datasets.length; i++) {
                text.push('<li><span class="legend-label" style="background-color:' + chart.data.datasets[i].backgroundColor + '"></span>');
                if (chart.data.datasets[i].label) {
                  text.push(chart.data.datasets[i].label);
                }
                text.push('</li>');
              }
              text.push('</ul>');
              return text.join("");
            },
          }
        });
        document.getElementById('orders-chart-legend').innerHTML = currentChart.generateLegend();
      }
      if ($('#sales-chart').length) {
          var datos = document.getElementById('datosAntropometricos').value
          datos = JSON.parse(datos);
          var fechas = [], pesos=[], imcs = [];
          datos.forEach(dato=>{
            let fecha = dato.created_at.split('T')[0]
              fechas.push(fecha)
              pesos.push(dato.peso)
              imcs.push(dato.imc)
          })

                  var lineChartCanvas = $("#sales-chart").get(0).getContext("2d");
        var data = {
          labels: fechas,
          datasets: [
            {
              label: 'Peso (Kg)',
              data: pesos,
              borderColor: [
                '#392c70'
              ],
              borderWidth: 1,
              fill: false
            },
          ]
        };
        var options = {
          scales: {
            yAxes: [{
              gridLines: {
                drawBorder: false
              },
              ticks: {
                stepSize: 80,
                fontColor: "#686868"
              }
            }],
            xAxes: [{
              display: false,
              gridLines: {
                drawBorder: false
              }
            }]
          },
          legend: {
            display: false
          },
          elements: {
            point: {
              radius: 3
            }
          },
          stepsize: 1
        };
        var lineChart = new Chart(lineChartCanvas, {
          type: 'line',
          data: data,
          options: options
        });

      }
      if ($("#sales-status-chart").length) {
        var pieChartCanvas = $("#sales-status-chart").get(0).getContext("2d");
        var pieChart = new Chart(pieChartCanvas, {
          type: 'pie',
          data: {
            datasets: [{
              data: [75, 25],
              backgroundColor: [
                '#04b76b',
                '#ff5e6d',

              ],
              borderColor: [
                '#04b76b',
                '#ff5e6d',
              ],
            }],

            // These labels appear in the legend and in the tooltips when hovering different arcs
            labels: [
              'Pacientes activos',
              'Pacientes inactivos',

            ]
          },
          options: {
            responsive: true,
            animation: {
              animateScale: true,
              animateRotate: true
            },
            legend: {
              display: false
            },
            legendCallback: function(chart) {
              var text = [];
              text.push('<ul class="legend'+ chart.id +'">');
              for (var i = 0; i < chart.data.datasets[0].data.length; i++) {
                text.push('<li><span class="legend-label" style="background-color:' + chart.data.datasets[0].backgroundColor[i] + '"></span>');
                if (chart.data.labels[i]) {
                  text.push(chart.data.labels[i]);
                }
                text.push('<label class="badge badge-light badge-pill legend-percentage ml-auto">'+ chart.data.datasets[0].data[i] + '%</label>');
                text.push('</li>');
              }
              text.push('</ul>');
              return text.join("");
            }
          }
        });
        document.getElementById('sales-status-chart-legend').innerHTML = pieChart.generateLegend();
      }
      if ($("#daily-sales-chart").length) {
        var dailySalesChartData = {
          datasets: [{
            data: [90, 10],
            backgroundColor: [
              '#04b76b',
              '#ff5e6d',

            ],
            borderWidth: 1
          }],

          // These labels appear in the legend and in the tooltips when hovering different arcs
          labels: [
            'Nutricionistas activos',
            'Nutricionistas inactivos',
          ]
        };
        var dailySalesChartOptions = {
          responsive: true,
          maintainAspectRatio: true,
          animation: {
            animateScale: true,
            animateRotate: true
          },
          legend: {
            display: false
          },
          legendCallback: function(chart) {
            var text = [];
            text.push('<ul class="legend'+ chart.id +'">');
            for (var i = 0; i < chart.data.datasets[0].data.length; i++) {
              text.push('<li><span class="legend-label" style="background-color:' + chart.data.datasets[0].backgroundColor[i] + '"></span>');
              if (chart.data.labels[i]) {
                text.push(chart.data.labels[i]);
              }
              text.push('</li>');
            }
            text.push('</ul>');
            return text.join("");
          },
          cutoutPercentage: 70
        };
        var dailySalesChartCanvas = $("#daily-sales-chart").get(0).getContext("2d");
        var dailySalesChart = new Chart(dailySalesChartCanvas, {
          type: 'doughnut',
          data: dailySalesChartData,
          options: dailySalesChartOptions
        });
        document.getElementById('daily-sales-chart-legend').innerHTML = dailySalesChart.generateLegend();
      }
    });
  })(jQuery);
