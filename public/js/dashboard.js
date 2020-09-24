/* globals Chart:false, feather:false */

window.onload = (function () {
  'use strict'

  //ejemplo
 
  var resultados = appSettings;
  var array_dias = [];  
  var array_temperatura = [];
  var array_sat_oxigeno = [];
  var days = 1;

  //document.getElementById("demo").innerHTML = "hhhh Hello JavaScript!" + resultados;

  console.log(typeof resultados);
    
  resultados.forEach(element => {
    console.log(element.created_at);
    array_dias.push(days);
    array_temperatura.push(element.temperature);
    array_sat_oxigeno.push(element.oxygen_saturation);
    days++;
  }); 


  feather.replace()

  //var array_labels = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
  //var array_data = [15339,21345, 18483, 24003, 23489, 24092, 12034];
  
  // Graphs
  var ctx = document.getElementById('myChart')
  // eslint-disable-next-line no-unused-vars
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      //Eje X
      labels: array_dias,
      datasets: [{
        //Eje Y
        data: array_sat_oxigeno,
        lineTension: 0,
        backgroundColor: 'transparent',
        borderColor: '#007bff',
        borderWidth: 4,
        pointBackgroundColor: '#007bff'
      },{
        //Eje Y
        data: array_temperatura,
        lineTension: 0,
        backgroundColor: 'transparent',
        borderColor: '#FF0000',
        borderWidth: 4,
        pointBackgroundColor: '#FF0000'
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: false
          }
        }]
      },
      legend: {
        display: false
      }
    }
  })
}())
