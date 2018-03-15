<!--wrapper box-->
<div class="wrapper">
  <!--//////////////////////////////////////////////////////////////-->
  <!--sidebar-->
  <div class="sidebar" data-active-color="blue" data-background-color="black" data-image="../assets/img/sidebar-1.jpg">
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
          <a href="index.php"><i class="material-icons">dashboard</i><p>Dashboard</p></a>
        </li>
        <!--register menu-->
        <li>
          <a data-toggle="collapse" href="#pagesCustomer"><i class="material-icons">assignment_ind</i>
            <p>Customer<b class="caret"></b></p>
          </a>
            <div class="collapse" id="pagesCustomer">
              <ul class="nav">
                <li>
                  <a href="customer.php">Show Customer</a>
                </li>
                <li>
                  <a href="customer.php?source=add_customer">Add Customer</a>
                </li>
                <li>
                  <a href="customer.php?source=group">Group Member</a>
                </li>
              </ul>
            </div>
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
