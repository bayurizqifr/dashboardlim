@inject('helper', 'App\Http\Controllers\helper')

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
           <canvas id="scatterChart" class="mx-auto w-100"></canvas>
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
                    @php
                        
                    @endphp
                    @foreach ($regional as $row)
                        <tr>
                            <td class="text-center">{{ $row->region }}</td>
                            <td class="text-center">{{ $helper->lim_2_table($row->region, 'consistence star') == 0 ? '-' : $helper->lim_2_table($row->region, 'consistence star') }}</td>
                            <td class="text-center">{{ $helper->lim_2_table($row->region, 'continuity learner') == 0 ? '-' : $helper->lim_2_table($row->region, 'continuity learner') }}</td>
                            <td class="text-center">{{ $helper->lim_2_table($row->region, 'high profesional learner') == 0 ? '-' : $helper->lim_2_table($row->region, 'high profesional learner') }}</td>
                            <td class="text-center">{{ $helper->lim_2_table($row->region, 'inconsistent') == 0 ? '-' : $helper->lim_2_table($row->region, 'inconsistent') }}</td>
                            <td class="text-center">{{ $helper->lim_2_table($row->region, 'deadwood') == 0 ? '-' : $helper->lim_2_table($row->region, 'deadwood') }}</td>
                            <td class="text-center">{{ $helper->lim_2_table($row->region) == 0 ? '-' : $helper->lim_2_table($row->region) }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td class="text-center text-dark" style="font-size: 12px"><b>Grand Total</b></td>
                        <td class="text-center text-dark"><b>{{ $count_cs }}</b></td>
                        <td class="text-center text-dark"><b>{{ $count_cl }}</b></td>
                        <td class="text-center text-dark"><b>{{ $count_hpl }}</b></td>
                        <td class="text-center text-dark"><b>{{ $count_i }}</b></td>
                        <td class="text-center text-dark"><b>{{ $count_d }}</b></td>
                        <td class="text-center text-dark"><b>{{ $count_cs + $count_cl + $count_hpl + $count_i + $count_d }}</b></td>
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
                // label: 'My First Dataset',
                data: [{{ $count_cs }}, {{ $count_cl }}, {{ $count_hpl }}, {{ $count_i }}, {{ $count_d }}],
                backgroundColor: [
                    '#20B2AA',
                    '#FFA07A',
                    '#A0522D',
                    '#FF69B4',
                    '#7B68EE'
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
                    text: 'PEOPLE PERFORMANCE POTENTIAL'
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
             datasets: [
            {
                label: 'Consistence Star',
                data: [{{ $scatter_cs }}],
                backgroundColor: '#20B2AA'
            },
            {
                label: 'Continuity Learner',
                data: [{{ $scatter_cl }}],
                backgroundColor: '#FFA07A'
            },
            {
                label: 'High Profesional Learner',
                data: [{{ $scatter_hpl }}],
                backgroundColor: '#A0522D'
            },
            {
                label: 'Inconsistent',
                data: [{{ $scatter_i }}],
                backgroundColor: '#FF69B4'
            },
            {
                label: 'Deadwood',
                data: [{{ $scatter_d }}],
                backgroundColor: '#7B68EE'
            },
            ],
          },
          options: {
            responsive: true,
            layout: {
                padding: {
                    // left : 20,
                    right : 40
                }
            },
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'SCATTER AND TREEMAP MARKS PRE-POST TEST'
                },
            }
        },
       });
    });
 </script> 

{{-- Boxplot --}}
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var trace1 = {
      y: [{{ $boxplot_pre_test }}],
      type: 'box',
      name: 'Pre-Test',
      marker: {
        color: '#FF0000' // Set the color of the box to grey
      }
    };

    var trace2 = {
      y: [{{ $boxplot_post_test }}],
      type: 'box',
      name: 'Post-Test',
      marker: {
        color: '#0000CD' // Set the color of the second box to light grey
      }
    };

    var layout = {
      title: 'BOXPLOT PATH PRE-POST TEST',
    //   boxmode: 'group' // Set the box mode to 'group' for side-by-side boxplots
    };

    var data = [trace1, trace2];

    Plotly.newPlot('boxplot', data, layout, {staticPlot: true});
  });
</script>

</body>
@stop
