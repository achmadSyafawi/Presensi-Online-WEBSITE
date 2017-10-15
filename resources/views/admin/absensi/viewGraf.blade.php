@extends('admin/template')

@section('content')
<!-- <div class="row">
  <div class="col-lg-12">
    <div class="page-header">
      <h1>Help</h1>
      <p>User manual</p>
    </div>
  </div>
</div> -->
<!--<div class="row">
<div class="col-lg-12">
 <h1 align="center">Hello Dude!!!</h1>
    <img src={{ url("public/assets/img/logo.png")}} width="100%" height="auto">
  </div>
</div>-->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Detail Presensi {{ $data[0]->name }} {{ $data[0]->nidn }}</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <!-- <a href="{{ url('admin/item') }}"> -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                       {{ $data[0]->masuk }}</div>
                                    <div>Masuk</div>
                                </div>
                            </div>
                        </div>
                            <div class="panel-footer">
                                <span class="pull-left"></span>
                                <div class="clearfix"></div>
                            </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">                   
                    <!-- <a href="{{ url('admin/paket') }}"> -->
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        {{ $data[0]->tidak_masuk }}</div>
                                    <div>Tidak Masuk</div>
                                </div>
                            </div>
                        </div>
                            <div class="panel-footer">
                                <span class="pull-left"></span>
                                <div class="clearfix"></div>
                            </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <!-- <a href="{{ url('admin/transaksi') }}"> -->
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        {{ $data[0]->days - $hari_libur - $dayOfWeekend }}</div>
                                    <div>Jumlah hari kerja</div>
                                </div>
                            </div>
                        </div>
                            <div class="panel-footer" >
                                <span class="pull-left"></span>
                                <div class="clearfix"></div>
                            </div>
                    </div>
                    </a>
                </div>
                 <div class="col-lg-3 col-md-6">
                    <div class="panel ">
                        <!-- <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        TEST!!</div>
                                    <div>Banyak Category!</div>
                                </div>
                            </div>
                        </div>
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div> -->
                    </div> 
                    </a>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Presensi Perbulan
                        </div>
                        <!-- /.panel-heading -->
                        <div class="col-lg-12" id="container" style="max-width: 600px; height: 400px; margin: 0 auto"></div>
                        <script src="{{ url('public/assets/bower_components/jquery/dist/jquery.min.js') }}"></script>
                        <script src="{{ url('public/assets/bower_components/highcharts/highcharts.js') }}"></script>
                        <script src="{{ url('public/assets/bower_components/highcharts/drilldown.js') }}"></script> -->
                        <script src="{{ url('public/assets/bower_components/highcharts/data.js') }}"></script>   
                        <script type="text/javascript">
                            var subtitle = <?php echo json_encode($bulan);?>;
                            console.log(subtitle);
                            Highcharts.chart('container', {
                                chart: {
                                    plotBackgroundColor: null,
                                    plotBorderWidth: null,
                                    plotShadow: false,
                                    type: 'pie'
                                },
                                title: {
                                    text: subtitle
                                },
                                tooltip: {
                                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                                },
                                plotOptions: {
                                    pie: {
                                        allowPointSelect: true,
                                        cursor: 'pointer',
                                        dataLabels: {
                                            enabled: true,
                                            format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                            style: {
                                                color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                            }
                                        }
                                    }
                                },
                                series: [{
                                        name: 'Brands',
                                        colorByPoint: true,
                                        data: [{
                                            name: 'Masuk Kerja',
                                            y: <?php echo $data[0]->masuk ?>
                                    }, {
                                        name: 'Tidak Masuk Kerja',
                                        y: <?php echo $data[0]->tidak_masuk ?>,
                                        sliced: true,
                                        selected: true
                                    }]
                                }]
                            });
                        </script>
                        <!-- /.panel-body -->
                    </div>
                    
                    
                </div>
                <div class="col-lg-4">
                    <!-- <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Donut Chart Example
                        </div>
                        <div class="panel-body">
                            <div id="morris-donut-chart"></div>
                            <a href="#" class="btn btn-default btn-block">View Details</a>
                        </div>
                    </div> -->
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        
                        <!-- /.panel-body -->
                    </div>
                   
                </div>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
@stop