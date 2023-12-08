@extends('layouts.layoutlim')
@section('content')

<div class="row">
    <div class="col-12">
        <h2 class="text-center"> LIM 2</h2>
    </div>
</div>

<div class="container">
    <div class="row ">
        <div class="col-5 p-5">
            <div><canvas id="peopleperformance"></canvas></div>
        </div>
        <div class="col-7 text-center p-5">
            <div id="boxplot"></div>
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-6">
           <canvas id="scatterChart" class="mx-auto w-50"></canvas>
        </div>
        <div class="col-6">
            <table class="table table-sm table-bordered" id="">
                <thead class="bg-secondary text-light">
                    <tr>
                        <td class="text-center"><b>REG</b></td>
                        <td class="text-center"><b>Consistence Star</b></td>
                        <td class="text-center"><b>Continuity Learner</b></td>
                        <td class="text-center"><b>High Profesional Learner</b></td>
                        <td class="text-center"><b>Inconsistent</b></td>
                        <td class="text-center"><b>Deadwood</b></td>
                        <td class="text-center"><b>Grand Total</b></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">-</td>
                        <td class="text-center">-</td>
                        <td class="text-center">-</td>
                        <td class="text-center">-</td>
                        <td class="text-center">-</td>
                        <td class="text-center">-</td>
                        <td class="text-center">-</td>
                    </tr>
                </tbody>
              </table>
         </div>
     </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>


{{-- Doughnut --}}
<script>
    const ctx = document.getElementById('peopleperformance');

    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: [
                'Consistence Star',
                'Continuity Learner',
                'High Profesional Learner',
                'Inconsistent',
                'Deadwood',
            ],
            datasets: [{
                label: 'My First Dataset',
                data: [478, 156, 2212, 0, 0],
                backgroundColor: [
                    '#265073',
                    'E48F45',
                    '#B0A695',
                    '#FFC436',
                    '#83A2FF'
                ],
                hoverOffset: 4
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Chart.js Doughnut Chart'
                }
            }
        },
    });

</script>

{{-- Scatter --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
       const ctx = document.getElementById('scatterChart').getContext('2d');
 
       new Chart(ctx, {
          type: 'scatter',
          data: {
             datasets: [{
                label: 'Scatter Dataset',
                data: [{
                   x: -10,
                   y: 0
                }, {
                   x: 0,
                   y: 10
                }, {
                   x: 10,
                   y: 5
                }, {
                   x: 0.5,
                   y: 5.5
                }],
                backgroundColor: 'rgb(255, 99, 132)'
             }],
          },
          options: {
             scales: {
                x: {
                   type: 'linear',
                   position: 'bottom'
                }
             }
          },
       });
    });
 </script> 

{{-- Boxplot --}}
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var trace1 = {
      y: [1, 2, 2, 3, 3, 3, 4, 4, 5],
      type: 'box',
      name: 'Boxplot 1',
      marker: {
        color: 'grey' // Set the color of the box to grey
      }
    };

    var trace2 = {
      y: [2, 3, 3, 4, 4, 4, 5, 5, 6],
      type: 'box',
      name: 'Boxplot 2',
      marker: {
        color: 'lightgrey' // Set the color of the second box to light grey
      }
    };

    var layout = {
      title: 'Two Boxplots Example',
      boxmode: 'group' // Set the box mode to 'group' for side-by-side boxplots
    };

    var data = [trace1, trace2];

    Plotly.newPlot('boxplot', data, layout);
  });
</script>

</body>
@stop
