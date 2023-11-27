@extends('layouts.master')
@section('content')

<div class="row">
  <div class="col-12">
      <h2 class="text-center"> LIM 1</h2>
  </div>
</div>

<div class="container">
  <div class="row">
      <div class="col">
          <div><canvas id="peopleperformance"></canvas></div>
      </div>
      <div class="col">
          <div><canvas id="myChart"></canvas></div>
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
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>

@stop