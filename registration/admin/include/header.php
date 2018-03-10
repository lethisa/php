<?php

if (!isset($_SESSION['username'])) {
  header("Location: ../index.php");
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
  <link rel="icon" type="image/png" href="assets/img/favicon.png" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Registration System</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />
  <!-- Bootstrap core CSS     -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <!--  Material Dashboard CSS    -->
  <link href="../assets/css/material-dashboard.css" rel="stylesheet" />
  <!--     Fonts and icons     -->
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
</head>

<body>
  <!--wrapper box-->
  <div class="wrapper">
    <!--//////////////////////////////////////////////////////////////-->
    <!--sidebar-->
    <div class="sidebar" data-active-color="blue" data-background-color="black" data-image="assets/img/sidebar-1.jpg">
      <!--//////////////////////////////////////////////////////////////-->

      <!--Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
        Tip 2: you can also add an image using data-image tag
        Tip 3: you can change the color of the sidebar with data-background-color="white | black"-->

      <!--logo-->
      <div class="logo">
        <a href="http://www.wonderland-indonesia.com" class="simple-text">Wonderland Crew</a>
      </div>
      <!--mini logo-->
      <div class="logo logo-mini">
        <a href="http://www.wonderland-indonesia.com" class="simple-text">WDR</a>
      </div>
      <!--sidebar wrapper-->
      <div class="sidebar-wrapper">
        <!--//////////////////////////////////////////////////////////////-->

        <!--navigation menu-->
        <ul class="nav">
          <!--dashboard menu-->
          <li>
            <a href="#"><i class="material-icons">dashboard</i><p>Dashboard</p></a>
          </li>
          <!--register menu-->
          <li>
            <a href="#"><i class="material-icons">assignment_ind</i><p>Talent</p></a>
          </li>
          <!--./register menu-->
        </ul>
      </div>
      <!--./sidebar wrapper-->
    </div>
    <!--./sidebar-->

    <!--main panel box-->
    <div class="main-panel">
      <!--//////////////////////////////////////////////////////////////-->
      <!--top navigation box-->
      <nav class="navbar navbar-transparent navbar-absolute">
        <!--top navigation container box-->
        <div class="container-fluid">
          <!--minimize box-->
          <div class="navbar-minimize">
            <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
              <i class="material-icons visible-on-sidebar-regular">more_vert</i>
              <i class="material-icons visible-on-sidebar-mini">view_list</i>
            </button>
          </div>
          <!--./minimize box-->

          <!--header nav-->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"> Welcome <?php echo $_SESSION['username'] ?>  </a>
          </div>
          <!--./header nav-->

          <!--collapse nav-->
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li>
                <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="material-icons">person</i>
                  <p class="hidden-lg hidden-md"><?php echo $_SESSION['username'] ?></p>
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a href="include/logout.php">Log Out</a>
                  </li>
                </ul>
              </li>
              <li class="separator hidden-lg hidden-md"></li>
            </ul>
          </div>
          <!--./collapse nav-->
        </div>
        <!--./top navigation container box-->
      </nav>
      <!--./top navigation box-->

      <!--main content-->
      <div class="content">
        <!--container box-->
        <div class="container-fluid">
          <!--row box-->
          <div class="row">
