@extends('layouts.layoutlim')
@section('content')
@inject('ctl', 'App\Http\Controllers\TrainingFeedbackController')

<div class="row">
  <div class="col-12">
      <h2 class="text-center"> LIM 1</h2>
  </div>
</div>

<div class="container">
   <div class="row mt-5">
      <div class="col-6 mb-5">
        <div class="" style="width: 450px;"><canvas id="peopleperformance"></canvas></div>
      </div>
      <div class="col-6 text-center">
       <div class="" style="width: 550px;"><canvas id="barChart"></canvas></div>
      </div>
   </div>
   <div class="row mb-5">
    <div class="col-6">
      <table class="table table-sm table-bordered" id="">
        <thead class="bg-secondary text-light">
            <tr>
                <td class="text-center"><b>No</b></td>
                <td class="text-center"><b>Nama Training</b></td>
                <td class="text-center"><b>Peserta</b></td>
                <td class="text-center"><b>%</b></td>
            </tr>
        </thead>
        <tbody>
         @php 
          $no = 1;
			  @endphp
        @foreach ($data_lim1 as $row)
        <tr>
          <td class="text-center">{{ $no++ }}</td>
          <td class="text-center">{{ $row->nama_pelatihan }}</td>
          <td class="text-center">-</td>
          <td class="text-center">-</td>
       </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    <div class="col-6">
      <img src="img/map.png" style="width: 550px;" alt="">
      <table class="table table-sm table-bordered" id="">
        <thead class="bg-secondary text-light">
            <tr>
                <td class="text-center"><b>Logo</b></td>
                <td class="text-center"><b>Regional</b></td>
                <td class="text-center"><b>Rating</b></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-center"><img src="img/R1.png" alt=""></td>
                <td class="text-center">Regional 1</td>
                <td class="text-center">-</td>
            </tr>
            <tr>
              <td class="text-center"><img src="img/R2.png" alt=""></td>
              <td class="text-center">Regional 2</td>
              <td class="text-center">-</td>
          </tr>
          <tr>
            <td class="text-center"><img src="img/R3.png" alt=""></td>
            <td class="text-center">Regional 3</td>
            <td class="text-center">-</td>
        </tr>
        <tr>
          <td class="text-center"><img src="img/R4.png" alt=""></td>
          <td class="text-center">Regional 4</td>
          <td class="text-center">-</td>
      </tr>
      <tr>
        <td class="text-center"><img src="img/R5.png" alt=""></td>
        <td class="text-center">Regional 5</td>
        <td class="text-center">-</td>
    </tr>
    <tr>
      <td class="text-center"><img src="img/R6.png" alt=""></td>
      <td class="text-center">Regional 6</td>
      <td class="text-center">-</td>
  </tr>
  <tr>
    <td class="text-center"><img src="img/R7.png" alt=""></td>
    <td class="text-center">Regional 7</td>
    <td class="text-center">-</td>
</tr>
        </tbody>
      </table>
    </div>
   </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://d3js.org/d3.v5.min.js"></script>
         
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
    data: [478, 156, 212, 89, 100],
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
           datasets: [
              {
                 label: 'Bar 1',
                 data: [25, 40, 15, 30],
                 backgroundColor: 'rgba(75, 192, 192, 0.2)',
                 borderColor: 'rgba(75, 192, 192, 1)',
                 borderWidth: 1
              },
              {
                 label: 'Bar 2',
                 data: [15, 30, 10, 20],
                 backgroundColor: 'rgba(255, 99, 132, 0.2)',
                 borderColor: 'rgba(255, 99, 132, 1)',
                 borderWidth: 1
              },{
                 label: 'Bar 3',
                 data: [15, 30, 10, 20],
                 backgroundColor: 'rgba(255, 99, 132, 0.2)',
                 borderColor: 'rgba(255, 99, 132, 1)',
                 borderWidth: 1
              }
           ]
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