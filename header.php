<!DOCTYPE html>
<html lang="en">
<!-- For RTL verison -->
<!-- <html lang="en" dir="rtl"> -->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <!-- Primary Meta Tags -->
  <title>AdminLTE 4 | Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="title" content="AdminLTE 4 | Dashboard">
  <meta name="author" content="ColorlibHQ">
  <meta name="description"
    content="AdminLTE is a Free Bootstrap 5 Admin Dashboard featuring over 800 components, 10+ plugins and 20 example pages using Vanilla JS.">
  <meta name="keywords"
    content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard" />
  <!-- By adding ./css/dark/adminlte-dark-addon.css then the page supports both dark color schemes, and the page author prefers / default is light. -->
  <meta name="color-scheme" content="light dark">
  <!-- By adding ./css/dark/adminlte-dark-addon.css then the page supports both dark color schemes, and the page author prefers / default is dark. -->
  <!-- <meta name="color-scheme" content="dark light"> -->

  <!-- OPTIONAL LINKS -->

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@1.13.1/css/OverlayScrollbars.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/all.min.css">

  <!-- REQUIRED LINKS -->

  <!-- Theme style -->
  <link rel="stylesheet" href="./css/adminlte.css">

  <!-- For RTL verison use ./css/rtl/adminlte.rtl.css, remove dist/css/adminlte.css -->
  <!-- <link rel="stylesheet" href="./css/rtl/adminlte.rtl.css""> -->

  <!-- For dark mode use ./css/dark/adminlte-dark-addon.css, do not remove dist/css/adminlte.css or if usinf RTL version do not remove ./css/rtl/adminlte.rtl.css-->
  <!-- ... and then the alternate CSS first as a snap-on for dark color scheme preference -->
  <!-- <link rel="stylesheet" href="./css/dark/adminlte-dark-addon.css" media="(prefers-color-scheme: dark)""> -->

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">


  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>


<body class="layout-fixed">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-light">
      <div class="container-fluid">
        <!-- Start navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-lte-toggle="sidebar-full" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-md-block">
            <a href="#" class="nav-link">Home</a>
          </li>
          <li class="nav-item d-none d-md-block">
            <a href="#" class="nav-link">Contact</a>
          </li>
        </ul>

        <!-- End navbar links -->
        <ul class="navbar-nav ms-auto">
          <!-- Navbar Search -->
          <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
              <i class="fas fa-search"></i>
            </a>
          </li>

          <!-- Messages Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" data-bs-toggle="dropdown" href="#">
              <i class="far fa-comments"></i>
              <span class="navbar-badge badge bg-danger">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="d-flex">
                  <div class="flex-shrink-0">
                    <img src="./assets/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle me-3">
                  </div>
                  <div class="flex-grow-1">
                    <h3 class="dropdown-item-title">
                      Brad Diesel
                      <span class="float-end fs-7 text-danger"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="fs-7">Call me whenever you can...</p>
                    <p class="fs-7 text-muted"><i class="far fa-clock me-1"></i> 4 Hours Ago</p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="d-flex">
                  <div class="flex-shrink-0">
                    <img src="./assets/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle me-3">
                  </div>
                  <div class="flex-grow-1">
                    <h3 class="dropdown-item-title">
                      John Pierce
                      <span class="float-end fs-7 text-muted"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="fs-7">I got your message bro</p>
                    <p class="fs-7 text-muted"><i class="far fa-clock me-1"></i> 4 Hours Ago</p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <!-- Message Start -->
                <div class="d-flex">
                  <div class="flex-shrink-0">
                    <img src="./assets/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle me-3">
                  </div>
                  <div class="flex-grow-1">
                    <h3 class="dropdown-item-title">
                      Nora Silvester
                      <span class="float-end fs-7 text-warning"><i class="fas fa-star"></i></span>
                    </h3>
                    <p class="fs-7">The subject goes here</p>
                    <p class="fs-7 text-muted"><i class="far fa-clock me-1"></i> 4 Hours Ago</p>
                  </div>
                </div>
                <!-- Message End -->
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
          </li>
          <!-- Notifications Dropdown Menu -->
          <li class="nav-item dropdown">
            <a class="nav-link" data-bs-toggle="dropdown" href="#">
              <i class="far fa-bell"></i>
              <span class="navbar-badge badge bg-warning">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
              <span class="dropdown-item dropdown-header">15 Notifications</span>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-envelope me-2"></i> 4 new messages
                <span class="float-end text-muted fs-7">3 mins</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-users me-2"></i> 8 friend requests
                <span class="float-end text-muted fs-7">12 hours</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item">
                <i class="fas fa-file me-2"></i> 3 new reports
                <span class="float-end text-muted fs-7">2 days</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
          </li>
          <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
              <img src="./assets/img/user2-160x160.jpg" class="user-image img-circle shadow" alt="User Image">
              <span class="d-none d-md-inline">Hello, admin</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
              <!-- User image -->
              <li class="user-header bg-primary">
                <img src="./assets/img/user2-160x160.jpg" class="img-circle shadow" alt="User Image">

                <p>
                  Alexander Pierce - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <a href="#" class="btn btn-default btn-flat">Profile</a>
                <a href="#" class="btn btn-default btn-flat float-end">Sign out</a>
              </li>
            </ul>
          </li>
          <!-- TODO tackel in v4.1 -->
          <!-- <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> -->
        </ul>
      </div>
    </nav>
    <!-- /.navbar -->


  <!--  ./wrapper -->

  <!-- OPTIONAL SCRIPTS -->

  <!-- overlayScrollbars -->
  <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@1.13.1/js/OverlayScrollbars.min.js"
    integrity="sha256-7mHsZb07yMyUmZE5PP1ayiSGILxT6KyU+a/kTDCWHA8=" crossorigin="anonymous"></script>
  <!-- Bootstrap 5 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha256-9SEPo+fwJFpMUet/KACSwO+Z/dKMReF9q4zFhU/fT9M=" crossorigin="anonymous"></script>

  <!-- REQUIRED SCRIPTS -->

  <!-- AdminLTE App -->
  <script src="./js/adminlte.js"></script>

  <!-- OPTIONAL SCRIPTS -->

  <script>
    const SELECTOR_SIDEBAR = '.sidebar'
    const Default = {
      scrollbarTheme: 'os-theme-light',
      scrollbarAutoHide: 'leave'
    }
    document.addEventListener("DOMContentLoaded", function () {
      if (typeof OverlayScrollbars !== 'undefined') {
        OverlayScrollbars(document.querySelectorAll(SELECTOR_SIDEBAR), {
          className: Default.scrollbarTheme,
          sizeAutoCapable: true,
          scrollbars: {
            autoHide: Default.scrollbarAutoHide,
            clickScrolling: true
          }
        })
      }
    })
  </script>


  <!-- OPTIONAL SCRIPTS -->

  <!-- ChartJS -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.0/dist/chart.min.js"
    integrity="sha256-7lWo7cjrrponRJcS6bc8isfsPDwSKoaYfGIHgSheQkk=" crossorigin="anonymous"></script>
  <!-- AdminLTE dashboard3 demo (This is only for demo purposes) -->
  <script src="./assets/js/dashboard3.js"></script>
  <script>
      // NOTICE!! DO NOT USE ANY OF THIS JAVASCRIPT
      // IT'S ALL JUST JUNK FOR DEMO
      // ++++++++++++++++++++++++++++++++++++++++++

      /* global Chart:false */
      (function () {
        'use strict'

        var ticksStyle = {
          fontColor: '#495057',
          fontStyle: 'bold'
        }

        var mode = 'index'
        var intersect = true

        var salesChartSelector = document.querySelector('#sales-chart')
        // eslint-disable-next-line no-unused-vars
        var salesChart = new Chart(salesChartSelector, {
          type: 'bar',
          data: {
            labels: ['JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
            datasets: [{
              label: 'My First Dataset',
              data: [65, 59, 80, 81, 56, 55, 40],
              backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)'
              ],
              borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)'
              ],
              borderWidth: 1
            }]
          },
          options: {
            maintainAspectRatio: false,
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        })

        var visitorsChartSelector = document.querySelector('#visitors-chart')
        var visitorsChart = new Chart(visitorsChartSelector, {
          data: {
            labels: ['18th', '20th', '22nd', '24th', '26th', '28th', '30th'],
            datasets: [{
              type: 'line',
              data: [100, 120, 170, 167, 180, 177, 160],
              backgroundColor: 'transparent',
              borderColor: '#007bff',
              pointBorderColor: '#007bff',
              pointBackgroundColor: '#007bff'
              // pointHoverBackgroundColor: '#007bff',
              // pointHoverBorderColor    : '#007bff'
            },
            {
              type: 'line',
              data: [60, 80, 70, 67, 80, 77, 100],
              backgroundColor: 'tansparent',
              borderColor: '#ced4da',
              pointBorderColor: '#ced4da',
              pointBackgroundColor: '#ced4da'
              // pointHoverBackgroundColor: '#ced4da',
              // pointHoverBorderColor    : '#ced4da'
            }]
          },
          options: {
            maintainAspectRatio: false,
            tooltip: {
              mode: mode,
              intersect: intersect
            },
            hover: {
              mode: mode,
              intersect: intersect
            },
            plugins: {
              legend: {
                display: false
              }
            },
            scales: {
              yAxes: {
                // display: false,
                gridLines: {
                  display: true,
                  lineWidth: '4px',
                  color: 'rgba(0, 0, 0, .2)',
                  zeroLineColor: 'transparent'
                },
                ticks: Object.assign({
                  beginAtZero: true,
                  suggestedMax: 200
                }, ticksStyle)
              },
              xAxes: {
                display: true,
                gridLines: {
                  display: false
                },
                ticks: ticksStyle
              }
            }
          }
        })
      })()
  </script>
