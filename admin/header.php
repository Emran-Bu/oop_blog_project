<?php

    ob_start();
    session_start();
    if (!isset($_SESSION['userID'])) {
        header('location: login.php');
    }

    $page = explode( '/',$_SERVER['PHP_SELF']);
    $page = end($page);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Emran">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>OOP | Blog | Admin</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">

    <!--dynamic table-->
    <link href="assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
    <link href="assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />

    <!--  summernote -->
    <link href="assets/summernote/summernote-bs4.css" rel="stylesheet">

    <!--right slidebar-->
    <link href="css/slidebars.css" rel="stylesheet">

    <!-- Custom styles for this template -->

    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

  </head>

  <body class="light-sidebar-nav">

  <section id="container">
      <!--header start-->
      <header class="header white-bg">
              <div class="sidebar-toggle-box">
                  <i class="fa fa-bars"></i>
              </div>
            <!--logo start-->
            <a href="index.html" class="logo">OOP<span>Blog</span></a>
            <!--logo end-->
            <div class="top-nav ">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <li>
                        <input type="text" class="form-control search" placeholder="Search">
                    </li>
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <!-- <img alt="" src="img/avatar1_small.jpg"> -->
                            <img class="rounded-circle" class="radius-50%" height="40px" width="40px" alt="" src="img/<?= $_SESSION['photo'] ?>">
                            <span class="username"><?= $_SESSION['name'] ?></span>
                            <b class="caret"></b>
                        </a>
                        <ul style="left: 0px !important;" class="dropdown-menu extended logout dropdown-menu-right">
                            <div class="log-arrow-up"></div>
                            <li><a href="logout.php"><i class="fa fa-key"></i> Log Out</a></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!--search & user info end-->
            </div>
        </header>
      <!--header end-->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  <li>
                      <a class="<?= $page=='index.php'? 'active': '' ?>" href="index.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a class="<?= $page =='add_category.php' || $page =='manage_category.php'? 'active': '' ?>" href="javascript:;" >
                          <i class="fa fa-laptop"></i>
                          <span>Categories</span>
                      </a>
                      <ul class="sub">
                          <li class="<?= $page=='add_category.php'? 'active': '' ?>"><a  href="add_category.php">Add Category</a></li>
                          <li class="<?= $page=='manage_category.php'? 'active': '' ?>"><a  href="manage_category.php">Manage Category</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a class="<?= $page =='add_blog.php' || $page =='manage_blog.php'? 'active': '' ?>" href="javascript:;" >
                          <i class="fa fa-laptop"></i>
                          <span>Blogs</span>
                      </a>
                      <ul class="sub">
                          <li class="<?= $page=='add_blog.php'? 'active': '' ?>"><a  href="add_blog.php">Add Blog</a></li>
                          <li class="<?= $page=='manage_blog.php'? 'active': '' ?>"><a  href="manage_blog.php">Manage Blog</a></li>
                      </ul>
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">