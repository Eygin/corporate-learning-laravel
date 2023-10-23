<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>{{ $page }} - Corporate Learning</title>

        <!-- Bootstrap Core CSS -->
        <link href="{{ URL('assets/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="{{ URL('assets/css/metisMenu.min.css')}}" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="{{ URL('assets/css/timeline.css')}}" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{ URL('assets/css/startmin.css')}}" rel="stylesheet">

        <link href="{{ URL('assets/css/dataTables/dataTables.bootstrap.css')}}" rel="stylesheet">
        <!-- DataTables Responsive CSS -->
        <link href="{{ URL('assets/css/dataTables/dataTables.responsive.css')}}" rel="stylesheet">
        <!-- Morris Charts CSS -->
        <link href="{{ URL('assets/css/morris.css')}}" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="{{ URL('assets/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
        <link rel="icon" type="image/x-icon" href="{{URL('assets/img/telkom.png')}}">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ URL('') }}"><img src="{{URL('assets/img/telkom.png')}}" alt="" width="100"></a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="nav navbar-right navbar-top-links">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> {{ Auth::user()->name }} <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li>
                                <a href="{{ route('setting') }}"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="{{ route('doLogout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->
            </nav>

            <aside class="sidebar navbar-default" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="{{ URL('') }}" class=""><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="{{ URL('/member') }}" class=""><i class="fa fa-users fa-fw"></i> Member</a>
                        </li>
                        @role('super admin')
                        <li>
                            <a href="{{ URL('/kategori') }}" class=""><i class="fa fa-filter fa-fw"></i> Kategori</a>
                        </li>
                        @endrole
                        <li>
                            <a href="{{ URL('/materi') }}" class=""><i class="fa fa-book fa-fw"></i> Materi</a>
                        </li>
                    </ul>
                </div>
            </aside>
            <!-- /.sidebar -->