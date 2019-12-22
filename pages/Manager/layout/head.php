<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dhaka Motors | Manager</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="../../bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="../../bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../../bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="../../bower_components/select2/dist/css/select2.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="../../plugins/iCheck/all.css">
    <!-- JQuery for fade -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">




    <?php
    session_start();
    $connection = mysqli_connect("localhost", "root", "", "dhaka_motors");
    include '../functions.php';
    protect_page();
    protect_page_manager();

    ?>


</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="index.php" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>D</b>Mt</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Dhaka</b>Motors</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="../../dist/img/avatar5.png" class="user-image" alt="User Image">
                            <span class="hidden-xs">
              <?php
              if(logged_in()==true){
                  echo($_SESSION['userName']);
              }else{
                  echo "No User";
              }
              ?>
              </span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="../../dist/img/avatar5.png" class="img-circle" alt="User Image">

                                <p>
                                    <?php
                                    if(logged_in()==true){
                                        echo($_SESSION['userName']);
                                    }else{
                                        echo "No User";
                                    }
                                    ?>
                                    <small>Member since Nov. 2012</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <div class="row">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="../logout.php" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->

            <ul class="sidebar-menu" data-widget="tree">
                <li class="header"></li>

                <li><a href="index.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-cogs"></i>
                        <span>Sales</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="sale_motorcycle.php"><i class="fa fa-circle-o"></i> Motorcycle</a></li>
                        <li><a href="sale_parts.php"><i class="fa fa-circle-o"></i> Parts</a></li>
                        <li><a href="sale_list.php"><i class="fa fa-circle-o"></i> Sold Motorcycles</a></li>
                        <li><a href="sale_parts_list.php"><i class="fa fa-circle-o"></i> Sold Parts</a></li>
                    </ul>
                </li>

                <!-- <li><a href="service.php"><i class="fa fa-book"></i> <span>Service</span></a></li> -->
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-wrench"></i>
                        <span>Service</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="service.php"><i class="fa fa-circle-o"></i> Free Service</a></li>
                        <li><a href="paid_service.php"><i class="fa fa-circle-o"></i> Paid Service</a></li>
                        <!-- <li><a href="pre_book_sale_list.php"><i class="fa fa-circle-o"></i> Pre-Book Sales</a></li> -->

                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-check-square"></i>
                        <span>Pre-Book</span>
                        <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="pre_book.php"><i class="fa fa-circle-o"></i> Pre-Booking</a></li>
                        <li><a href="pre_book_list.php"><i class="fa fa-circle-o"></i> Pre-Book List</a></li>
                        <li><a href="pre_book_sale_list.php"><i class="fa fa-circle-o"></i> Pre-Book Sales</a></li>

                    </ul>
                </li>
                <li><a href="distribute.php"><i class="fa fa-sitemap"></i> <span>Distribution</span></a></li>

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
