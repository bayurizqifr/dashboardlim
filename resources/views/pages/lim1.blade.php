@extends('layouts.layoutlim')
@section('content')

<div class="row">
  <div class="col-12">
      <h2 class="text-center"> LIM 1</h2>
  </div>
</div>

<div class="container">
  <div class="row">
      <div class="col">
          <div class="w-50"><canvas id="peopleperformance"></canvas></div>
      </div>
  </div>

  <div class="row">
    <div class="col">
       <div class="w-50"><canvas id="barChart"></canvas></div>
    </div>
 </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
         
{{-- Doughnut --}}
<script>
  const ctx = document.getElementById('peopleperformance');

  new Chart(ctx, {
  type: 'doughnut',
  data:  {
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

{{-- Chart Bar --}}
<script>
  document.addEventListener('DOMContentLoaded', function() {
     const ctx = document.getElementById('barChart').getContext('2d');

     new Chart(ctx, {
        type: 'bar',
        data: {
           labels: ['Label 1', 'Label 2', 'Label 3', 'Label 4'],
           datasets: [{
              label: 'Bar Dataset',
              data: [25, 40, 15, 30],
              backgroundColor: 'rgba(75, 192, 192, 0.2)',
              borderColor: 'rgba(75, 192, 192, 1)',
              borderWidth: 1
           }]
        },
        options: {
           scales: {
              x: {
                 type: 'category',
                 position: 'bottom'
              },
              y: {
                 type: 'linear',
                 position: 'left'
              }
           }
        }
     });
  });
</script>


@stop