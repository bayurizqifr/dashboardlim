@inject('helper', 'App\Http\Controllers\helper')

@extends('layouts.layoutlim')
@section('content')

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
      <div class="text-center text-uppercase"><h6>TOP 10 PELATIHAN BULAN {{ $helper->bulan($data_bulan) .' '. $data_tahun }}</h6></div>
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
        @foreach ($data_feedback as $row)
        <tr>
          <td class="text-center">{{ $no++ }}</td>
          <td class="text-center">{{ $row->nama_pelatihan }}</td>
          <td class="text-center">{{ $row->total }}</td>
          <td class="text-center">{{ number_format( $row->total / $data_feedback_count * 100 , 2) }}</td>
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
                <td class="text-center" style="background-color: #ccc"></td>
                <td class="text-center">HO</td>
                <td class="text-center">{{ isset($data_feedback_support['HO']) ? (($data_feedback_support['HO'] + $data_feedback_facilitator['HO'] + $data_feedback_facilities['R-1']) / 3) : '-'}}</td>
            </tr>
            <tr>
                <td class="text-center"><img src="img/R1.png" alt="" style="width: 20px;"></td>
                <td class="text-center">Regional 1</td>
                <td class="text-center">{{ isset($data_feedback_support['R-1']) ? (($data_feedback_support['R-1'] + $data_feedback_facilitator['R-1'] + $data_feedback_facilities['R-1']) / 3) : '-'}}</td>
            </tr>
            <tr>
                <td class="text-center"><img src="img/R2.png" alt="" style="width: 20px;"></td>
                <td class="text-center">Regional 2</td>
                <td class="text-center">{{ isset($data_feedback_support['R-2']) ? (($data_feedback_support['R-2'] + $data_feedback_facilitator['R-2'] + $data_feedback_facilities['R-2']) / 3) : '-'}}</td>
            </tr>
            <tr>
                <td class="text-center"><img src="img/R3.png" alt="" style="width: 20px;"></td>
                <td class="text-center">Regional 3</td>
                <td class="text-center">{{ isset($data_feedback_support['R-3']) ? (($data_feedback_support['R-3'] + $data_feedback_facilitator['R-3'] + $data_feedback_facilities['R-3']) / 3) : '-'}}</td>
            </tr>
            <tr>
                <td class="text-center"><img src="img/R4.png" alt="" style="width: 20px;"></td>
                <td class="text-center">Regional 4</td>
                <td class="text-center">{{ isset($data_feedback_support['R-4']) ? (($data_feedback_support['R-4'] + $data_feedback_facilitator['R-4'] + $data_feedback_facilities['R-4']) / 3) : '-'}}</td>
            </tr>
            <tr>
                <td class="text-center"><img src="img/R5.png" alt="" style="width: 20px;"></td>
                <td class="text-center">Regional 5</td>
                <td class="text-center">{{ isset($data_feedback_support['R-5']) ? (($data_feedback_support['R-5'] + $data_feedback_facilitator['R-5'] + $data_feedback_facilities['R-5']) / 3) : '-'}}</td>
            </tr>
            <tr>
                <td class="text-center"><img src="img/R6.png" alt="" style="width: 20px;"></td>
                <td class="text-center">Regional 6</td>
                <td class="text-center">{{ isset($data_feedback_support['R-6']) ? (($data_feedback_support['R-6'] + $data_feedback_facilitator['R-6'] + $data_feedback_facilities['R-6']) / 3) : '-'}}</td>
            </tr>
            <tr>
                <td class="text-center"><img src="img/R7.png" alt="" style="width: 20px;"></td>
                <td class="text-center">Regional 7</td>
                <td class="text-center">{{ isset($data_feedback_support['R-7']) ? (($data_feedback_support['R-7'] + $data_feedback_facilitator['R-7'] + $data_feedback_facilities['R-7']) / 3) : '-'}}</td>
            </tr>
        </tbody>
      </table>
    </div>
   </div>
</div>

@php
    $a = 100;
@endphp
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://d3js.org/d3.v5.min.js"></script>
         
{{-- Doughnut --}}
<script>
  const ctx = document.getElementById('peopleperformance');

  new Chart(ctx, {
  type: 'doughnut',
  data:  {
    labels: [{!! $all_feedback_title !!}],
  datasets: [{
    // label: 'My First Dataset',
    data: [{{ $all_feedback_value }}],
    backgroundColor: [
      '#228B22',
      '#556B2F',
      '#BDB76B',
      '#B8860B',
      '#D2691E',
      '#A52A2A',
      '#FF7F50',
      '#DC143C',
      '#A9A9A9',
      '#A9A9A9',
      '#A9A9A9',
      '#A9A9A9',
      '#A9A9A9',
      '#A9A9A9',
      '#A9A9A9',
      '#A9A9A9',
      '#A9A9A9',
      '#A9A9A9',
      '#A9A9A9',
      '#A9A9A9',
      '#A9A9A9',
      '#A9A9A9',
      '#A9A9A9',
      '#A9A9A9',
      '#A9A9A9',
      '#A9A9A9',
      '#A9A9A9',
      '#A9A9A9',
      '#A9A9A9',
      '#A9A9A9',
      '#A9A9A9',
      '#A9A9A9',
      '#A9A9A9',
      '#A9A9A9',
      '#A9A9A9',
      '#A9A9A9',
      '#A9A9A9',
      '#A9A9A9',
      '#A9A9A9',
      '#A9A9A9',
    ],
    hoverOffset: 4
  }]
},
  options: {
    responsive: true,
    plugins: {
      legend: {
        display: false,
      },
      title: {
        display: true,
        text: 'PENGISIAN UBPP '+{{ $data_feedback_count }}+' RESPONDEN'
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
           labels: [{!! $data_feedback_per_region_title !!}],
           datasets: [
              {
                 label: 'Support',
                 data: [
                  @foreach ($data_region as $dr)
                    {{ $data_feedback_support[$dr->regional_penyelenggara] }},
                  @endforeach
                 ],
                 backgroundColor: 'rgba(0, 130, 130, 0.5)',
                 borderColor: 'rgba(0, 130, 130, 1)',
                 borderWidth: 1
              },{
                 label: 'Facilitator',
                 data: [
                  @foreach ($data_region as $dr)
                    {{ $data_feedback_facilitator[$dr->regional_penyelenggara] }},
                  @endforeach
                 ],
                 backgroundColor: 'rgba(50, 230, 120, 0.5)',
                 borderColor: 'rgba(50, 230, 120, 1)',
                 borderWidth: 1
              },{
                 label: 'Facilities',
                 data: [
                  @foreach ($data_region as $dr)
                    {{ $data_feedback_facilities[$dr->regional_penyelenggara] }},
                  @endforeach
                 ],
                 backgroundColor: 'rgba(190, 50, 20, 0.5)',
                 borderColor: 'rgba(190, 50, 20, 1)',
                 borderWidth: 1
              },
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