@extends('layouts.master')
@section('content')

<div class="row">
    <div class="col-12">
        <h2 class="text-center"> LIM 2</h2>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col">
            <div><canvas id="peopleperformance"></canvas></div>
        </div>
        <div class="col">
            <div id="scatter"></div>
        </div>
        <div class="col">
            <div id="my_dataviz"></div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://d3js.org/d3.v4.js"></script>

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
    const ctx = document.getElementById('scatter');

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
            }]
        },
        options: {
            scales: {
                x: {
                    type: 'linear',
                    position: 'bottom'
                }
            }
        }
    });

</script>

{{-- Boxplot --}}
<script>
    // set the dimensions and margins of the graph
    var margin = {
            top: 10,
            right: 30,
            bottom: 30,
            left: 40
        },
        width = 400 - margin.left - margin.right,
        height = 400 - margin.top - margin.bottom;

    // append the svg object to the body of the page
    var svg = d3.select("#my_dataviz")
        .append("svg")
        .attr("width", width + margin.left + margin.right)
        .attr("height", height + margin.top + margin.bottom)
        .append("g")
        .attr("transform",
            "translate(" + margin.left + "," + margin.top + ")");

    // create dummy data
    var data = [12, 19, 11, 13, 12, 22, 13, 4, 15, 16, 18, 19, 20, 12, 11, 9]

    // Compute summary statistics used for the box:
    var data_sorted = data.sort(d3.ascending)
    var q1 = d3.quantile(data_sorted, .25)
    var median = d3.quantile(data_sorted, .5)
    var q3 = d3.quantile(data_sorted, .75)
    var interQuantileRange = q3 - q1
    var min = q1 - 1.5 * interQuantileRange
    var max = q1 + 1.5 * interQuantileRange

    // Show the Y scale
    var y = d3.scaleLinear()
        .domain([0, 24])
        .range([height, 0]);
    svg.call(d3.axisLeft(y))

    // a few features for the box // mengatur jarak box
    var center = 100
    var width = 100

    // Show the main vertical line
    svg
        .append("line")
        .attr("x1", center)
        .attr("x2", center)
        .attr("y1", y(min))
        .attr("y2", y(max))
        .attr("stroke", "black")

    // Show the box
    svg
        .append("rect")
        .attr("x", center - width / 2)
        .attr("y", y(q3))
        .attr("height", (y(q1) - y(q3)))
        .attr("width", width)
        .attr("stroke", "black")
        .style("fill", "#B0A695")

    // show median, min and max horizontal lines
    svg
        .selectAll("toto")
        .data([min, median, max])
        .enter()
        .append("line")
        .attr("x1", center - width / 2)
        .attr("x2", center + width / 2)
        .attr("y1", function (d) {
            return (y(d))
        })
        .attr("y2", function (d) {
            return (y(d))
        })
        .attr("stroke", "black")

</script>
@stop
