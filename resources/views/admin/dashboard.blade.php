{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Duyệt bài')

@section('content_header')
<div class="d-flex justify-content-between">
    <h1>Admin page </h1>
    <!-- Button trigger modal add news -->
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddContact">
        <i class="fas fa-plus"></i>
    </button> -->

    <!-- Modal -->
</div>
@stop

@section('content')
<div class="row my-3">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$newUser}}</h3>

                <p>Người dùng mới</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$newMotelApprove}}<sup style="font-size: 20px">%</sup></h3>

                <p>Phòng được kiểm duyệt</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $newMotelPending }}</h3>

                <p>Phòng chưa kiểm duyệt</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
         
          </div>
          <!-- ./col -->
        </div>
<div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="far fa-chart-bar"></i>
                  Interactive Area Chart
                </h3>

                <div class="card-tools">
                  Real time
                  <div class="btn-group" id="realtime" data-toggle="btn-toggle">
                    <button type="button" class="btn btn-default btn-sm active" data-toggle="on">On</button>
                    <button type="button" class="btn btn-default btn-sm" data-toggle="off">Off</button>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div id="interactive" style="height: 300px; padding: 0px; position: relative;"><canvas class="flot-base" width="1497" height="375" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1198.2px; height: 300px;"></canvas><canvas class="flot-overlay" width="1497" height="375" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1198.2px; height: 300px;"></canvas><div class="flot-svg" style="position: absolute; top: 0px; left: 0px; height: 100%; width: 100%; pointer-events: none;"><svg style="width: 100%; height: 100%;"><g class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;"><text x="28" y="294" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">0</text><text x="141.013336489899" y="294" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">10</text><text x="258.003235479798" y="294" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">20</text><text x="374.99313446969694" y="294" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">30</text><text x="491.98303345959596" y="294" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">40</text><text x="608.9729324494949" y="294" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">50</text><text x="725.9628314393939" y="294" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">60</text><text x="842.952730429293" y="294" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">70</text><text x="959.9426294191919" y="294" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">80</text><text x="1076.9325284090908" y="294" class="flot-tick-label tickLabel" style="position: absolute; text-align: center;">90</text></g><g class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;"><text x="8.953125" y="269" class="flot-tick-label tickLabel" style="position: absolute; text-align: right;">0</text><text x="1" y="15" class="flot-tick-label tickLabel" style="position: absolute; text-align: right;">80</text><text x="1" y="237.25" class="flot-tick-label tickLabel" style="position: absolute; text-align: right;">10</text><text x="1" y="205.5" class="flot-tick-label tickLabel" style="position: absolute; text-align: right;">20</text><text x="1" y="173.75" class="flot-tick-label tickLabel" style="position: absolute; text-align: right;">30</text><text x="1" y="142" class="flot-tick-label tickLabel" style="position: absolute; text-align: right;">40</text><text x="1" y="110.25" class="flot-tick-label tickLabel" style="position: absolute; text-align: right;">50</text><text x="1" y="78.5" class="flot-tick-label tickLabel" style="position: absolute; text-align: right;">60</text><text x="1" y="46.75" class="flot-tick-label tickLabel" style="position: absolute; text-align: right;">70</text></g></svg></div></div>
              </div>
              <!-- /.card-body-->
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
$(function () {
    /*
     * Flot Interactive Chart
     * -----------------------
     */
    // We use an inline data source in the example, usually data would
    // be fetched from a server
    var data        = [],
        totalPoints = 100

    function getRandomData() {

      if (data.length > 0) {
        data = data.slice(1)
      }

      // Do a random walk
      while (data.length < totalPoints) {

        var prev = data.length > 0 ? data[data.length - 1] : 50,
            y    = prev + Math.random() * 10 - 5

        if (y < 0) {
          y = 0
        } else if (y > 100) {
          y = 100
        }

        data.push(y)
      }

      // Zip the generated y values with the x values
      var res = []
      for (var i = 0; i < data.length; ++i) {
        res.push([i, data[i]])
      }

      return res
    }

    var interactive_plot = $.plot('#interactive', [
        {
          data: getRandomData(),
        }
      ],
      {
        grid: {
          borderColor: '#f3f3f3',
          borderWidth: 1,
          tickColor: '#f3f3f3'
        },
        series: {
          color: '#3c8dbc',
          lines: {
            lineWidth: 2,
            show: true,
            fill: true,
          },
        },
        yaxis: {
          min: 0,
          max: 100,
          show: true
        },
        xaxis: {
          show: true
        }
      }
    )

    var updateInterval = 500 //Fetch data ever x milliseconds
    var realtime       = 'on' //If == to on then fetch data every x seconds. else stop fetching
    function update() {

      interactive_plot.setData([getRandomData()])

      // Since the axes don't change, we don't need to call plot.setupGrid()
      interactive_plot.draw()
      if (realtime === 'on') {
        setTimeout(update, updateInterval)
      }
    }

    //INITIALIZE REALTIME DATA FETCHING
    if (realtime === 'on') {
      update()
    }
    //REALTIME TOGGLE
    $('#realtime .btn').click(function () {
      if ($(this).data('toggle') === 'on') {
        realtime = 'on'
      }
      else {
        realtime = 'off'
      }
      update()
    })
    /*
     * END INTERACTIVE CHART
     */
})
</script>
@stop