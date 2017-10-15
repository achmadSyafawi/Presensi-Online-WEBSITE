<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Universitas Islam Indonesia</title>
    <link rel="icon" type="image/jpg" href="{{ url('public/assets/img/img.jpg') }}"/>

    <!-- Bootstrap Core CSS -->
    <link href="{{ url('public/assets/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    
    <!-- MetisMenu CSS -->
    <link href="{{ url('public/assets/bower_components/metisMenu/dist/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="{{ url('public/assets/css/timeline.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ url('public/assets/css/sb-admin-2.css') }}" rel="stylesheet">
    
     <!--Morris Charts CSS 
    <link href="{{ url('public/assets/bower_components/morrisjs/morris.css') }}" rel="stylesheet">-->
    
    <!-- Datatables CSS -->
    <link href="{{ url('public/assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
    <link href="{{ url('public/assets/bower_components/datatables-responsive/css/dataTables.responsive.css') }}" rel="stylesheet">
    
    <!-- Custom Fonts -->
    <link href="{{ url('public/assets/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ url('public/assets/bower_components/trumbowyg/ui/trumbowyg.min.css') }}" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
        table{font-size: 12px;}
        .nav-tabs a{
            font-size: 12px;
        }
        .content{
            padding: 15px;
        }
        .navbar-default, .navbar-inverse {
            background-color: #093697;
            border-color: #0588de;
        }
        .logo {
            float: Left;
            width: 60px;
            height: 50px;
        }
    </style>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('admin/') }}">Universitas Islam Indonesia</a>
            </div>
            <!-- /.navbar-header -->

            <ul class=" navbar-top-links navbar-right top-nav">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle " data-toggle="dropdown" href="#">
                        <i class="fa fa-cogs fa-lg" style="color:#fff"></i> 
                    </a>
                    
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> {{Auth::user()->name}}</a>
                        </li>
                        <!-- <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a></li> -->
                        <li class="divider"></li>
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse" style="background-color:white" aria-expanded="false" style="height: 1px">
                      <ul class="nav" id="side-menu">
                        <!--<li>
                            <a href="{{ url('admin/')}}"><i class="fa fa-home fa-lg"></i> Dashboard</a>
                        </li>-->
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Absensi <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ url('admin/absensi') }}"><i class="fa fa-database fa-fw"></i> Absensi</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/absensiBaru')}}"><i class="fa fa-list fa-fw"></i> Pengecekan Absensi</a>
                                </li>
                                <li>
                                    <a href="{{ url('admin/absensiDitolak')}}"><i class="fa fa-list fa-fw"></i> Absensi Ditolak</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        @if(Auth::user()->role == 'admin')
                        <li>
                            <a href="{{ url('admin/lokasi') }}"><i class="fa fa-file fa-fw"></i> Lokasi</a>
                        </li>
                        <li>
                            <a href="{{ url('admin/pegawai') }}"><i class="fa fa-users fa-fw"></i> Pegawai</a>
                        </li>
                        <!--<li>
                            <a href="{{ url('admin/transaksi') }}"><i class="fa fa-sticky-note fa-fw"></i> Transaksi</a>
                        </li>-->
                        <li>
                            <a href="{{ url('admin/user') }}"><i class="fa fa-user fa-lg"></i> User</a>
                        </li>
                        <li>
                            <a href="{{ url('admin/updateLibur') }}"><i class="fa fa-database fa-fw"></i>Update Hari libur</a>
                        </li>
                        @endif
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper" style="min-height: 806px;">
            @yield('content')
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{ url('public/assets/bower_components/jquery/dist/jquery.min.js') }}"></script>
    
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ url('public/assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    
    <!-- data tables js -->
    <script src="{{ url('public/assets/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('public/assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ url('public/assets/bower_components/datatables-responsive/js/dataTables.responsive.js') }}"></script>
    
    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ url('public/assets/bower_components/metisMenu/dist/metisMenu.min.js') }}"></script>  
    <script src="{{ url('public/assets/bower_components/trumbowyg/trumbowyg.min.js') }}"></script>  
    
 
    <!-- Custom Theme JavaScript -->
    <script src="{{ url('public/assets/js/sb-admin-2.js') }}"></script>

    <script type="text/javascript">
    $("textarea").trumbowyg({
        fullscreenable: true,
        btns: ['formatting',
                '|', 'btnGrp-design',
                '|', 'linkImproved',
                '|', 'btnGrp-justify',
                '|', 'btnGrp-lists',
                '|', 'foreColor', 'backColor',
                '|', 'preformatted',
                '|', 'horizontalRule']
    });

    $("select[id='customer_id']").on("change", function() {
        var customer_id = $(this).val();
        if(customer_id == "-") {
            $("#transaction_contact_add").fadeIn();
        } else {
            $("#transaction_contact_add").fadeOut();
        }
        return false;
    });
    
    
    $(document).ready(function() {
        $('#data-table').DataTable({
                responsive: true
        });
    });
        


    </script>

</body></html>