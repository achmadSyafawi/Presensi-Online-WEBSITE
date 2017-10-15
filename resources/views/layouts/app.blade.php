<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Universitas Islam Indonesia</title>
    
    <!-- Bootstrap Core CSS -->
    <link href="{{ url('public/assets/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ url('public/assets/bower_components/metisMenu/dist/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="{{ url('public/assets/css/timeline.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ url('public/assets/css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ url('public/assets/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    
    <link href="{{ url('public/assets/bower_components/trumbowyg/ui/trumbowyg.min.css') }}" rel="stylesheet" type="text/css">
    
    

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
        .navbar-default {
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
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top" >
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="{{ url('/admin') }}">
                    <img class="logo" src="{{ url('public/assets/img/img.png') }}">
                </a>
                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/admin') }}" >
                    Universitas Islam Indonesia
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <!--<ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                </ul>-->

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <!--<li><a href="{{ url('/register') }}">Register</a></li>-->
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
     <!-- jQuery -->
    <script src="{{ url('public/assets/bower_components/jquery/dist/jquery.min.js') }}"></script>
    
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ url('public/assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ url('public/assets/bower_components/metisMenu/dist/metisMenu.min.js') }}"></script>  
    <script src="{{ url('public/assets/bower_components/trumbowyg/trumbowyg.min.js') }}"></script>  
    

    <!-- Custom Theme JavaScript -->
    <script src="{{ url('public/assets/js/sb-admin-2.js') }}"></script>
    

</body>
</html>
