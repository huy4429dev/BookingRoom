{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Duyệt bài')

@section('content_header')
<div class="d-flex justify-content-between">
    <h1>Thống kê doanh thu</h1>
    <!-- Button trigger modal add news -->
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddContact">
        <i class="fas fa-plus"></i>
    </button> -->

    <!-- Modal -->
</div>
@stop

@section('content')
<div class="col-md-6">
    <form action="{{route('admin.order.group.post')}}" method="Post">
        <div class="form-group">
            <select id="order-group" class="form-control" name="groupYear">
                <option value="2019">2017</option>
                <option value="2019">2018</option>
                <option value="2019">2019</option>
                <option value="2020" selected>2020</option>
                <option value="2021">2021</option>
                <option value="2021">2022</option>
            </select>
        </div>
    </form>
    <!-- Bar chart -->
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">
                <i class="far fa-chart-bar"></i>
                Bar Chart
            </h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div id="bar-chart" style="height: 300px; padding: 0px; position: relative;"><canvas class="flot-base" width="714" height="375" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 571.6px; height: 300px;"></canvas><canvas class="flot-overlay" width="714" height="375" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 571.6px; height: 300px;"></canvas>
                <div class="flot-svg" style="position: absolute; top: 0px; left: 0px; height: 100%; width: 100%; pointer-events: none;"><svg style="width: 100%; height: 100%;">
                        <g class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;"><text x="117.21590909090912" y="294" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">February</text><text x="219.5167613636364" y="294" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">March</text><text x="316.55198863636366" y="294" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">April</text><text x="411.15752840909096" y="294" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">May</text><text x="27.508806818181824" y="294" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">January</text><text x="500.9115056818182" y="294" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">June</text></g>
                        <g class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;"><text x="8.953125" y="269" class="flot-tick-label tickLabel" style="position: absolute; text-align: right;">0</text><text x="8.953125" y="205.5" class="flot-tick-label tickLabel" style="position: absolute; text-align: right;">5</text><text x="1" y="15" class="flot-tick-label tickLabel" style="position: absolute; text-align: right;">20</text><text x="1" y="142" class="flot-tick-label tickLabel" style="position: absolute; text-align: right;">10</text><text x="1" y="78.5" class="flot-tick-label tickLabel" style="position: absolute; text-align: right;">15</text></g>
                    </svg></div>
            </div>
        </div>
    </div>
    <!-- /.card -->
</div>
@stop

@section('css')
<!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
@stop

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
@stop
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/flot/jquery.flot.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/flot-old/jquery.flot.resize.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/flot-old/jquery.flot.pie.min.js"></script>
<script>
    $(function() {
        /*
         * BAR CHART
         * ---------
         */

        var bar_data = {
            data: [
                [1, {{$data[1][0]}}],
                [2, {{$data[1][1]}}],
                [3, {{$data[1][2]}}],
                [4, {{$data[1][3]}}],
                [5, {{$data[1][4]}}],
                [6, {{$data[1][5]}}],
                [7, {{$data[1][6]}}],
                [8, {{$data[1][7]}}],
                [9, {{$data[1][8]}}],
                [10,{{$data[1][9]}} ],
                [11,{{$data[1][10]}} ],
                [12,{{$data[1][11]}} ],
            ],
            bars: {
                show: true
            }
        }
        $.plot('#bar-chart', [bar_data], {
            grid: {
                borderWidth: 1,
                borderColor: '#f3f3f3',
                tickColor: '#f3f3f3'
            },
            series: {
                bars: {
                    show: true,
                    barWidth: 0.5,
                    align: 'center',
                },
            },
            colors: ['#3c8dbc'],
            xaxis: {
                ticks: [
                    [1, 'Tháng 1'],
                    [2, 'Tháng 2'],
                    [3, 'Tháng 3'],
                    [4, 'Tháng 4'],
                    [5, 'Tháng 5'],
                    [6, 'Tháng 6'],
                    [7, 'Tháng 7'],
                    [8, 'Tháng 8'],
                    [9, 'Tháng 9'],
                    [10, 'Tháng 10'],
                    [11, 'Tháng 11'],
                    [12, 'Tháng 12']
                ]
            }
        })
        /* END BAR CHART */

        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

        var url = "{{route('admin.order.group.post')}}";
    var orderGroup = document.querySelector('#order-group');
    orderGroup.addEventListener('change', function(){
    
    fetch(url, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-Token': csrfToken
          },
          body: JSON.stringify({groupYear:orderGroup.value })
        })
        .then(response => response.json())
        .then(data => {
            
            for(item in data.data[1]){
                 bar_data.data[item][1] = data.data[1][item]      
            }


            $.plot('#bar-chart', [bar_data], {
            grid: {
                borderWidth: 1,
                borderColor: '#f3f3f3',
                tickColor: '#f3f3f3'
            },
            series: {
                bars: {
                    show: true,
                    barWidth: 0.5,
                    align: 'center',
                },
            },
            colors: ['#3c8dbc'],
            xaxis: {
                ticks: [
                    [1, 'Tháng 1'],
                    [2, 'Tháng 2'],
                    [3, 'Tháng 3'],
                    [4, 'Tháng 4'],
                    [5, 'Tháng 5'],
                    [6, 'Tháng 6'],
                    [7, 'Tháng 7'],
                    [8, 'Tháng 8'],
                    [9, 'Tháng 9'],
                    [10, 'Tháng 10'],
                    [11, 'Tháng 11'],
                    [12, 'Tháng 12']
                ]
            }
        })
            
        
        })
        .catch((err) => {
          console.log(err);
        })
    
})

    })
</script>
@stop