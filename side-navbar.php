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
  <link rel="stylesheet" href="style.css">

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
  <div class="wrapper">
    <!-- Navbar -->
 

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-bg-dark sidebar-color-primary shadow">
      <div class="brand-container">
        <a href="dashboard.php" class="brand-link">
          <!-- <img src="./assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image opacity-80 shadow"> -->
          <span class="brand-text fw-light" style="font-size: 14px;">Leave Management System</span>
        </a>
        <a class="pushmenu mx-1" data-lte-toggle="sidebar-mini" href="javascript:;" role="button"><i
            class="fas fa-angle-double-left"></i></a>
      </div>
      <!-- Sidebar -->
      <div class="sidebar">
        <nav class="mt-2">
          <!-- Sidebar Menu -->
          <ul class="nav nav-pills nav-sidebar flex-column" data-lte-toggle="treeview" role="menu"
            data-accordion="false">
            <li class="nav-item menu-open">
              <a href="javascript:;" class="nav-link active">
                <i class="nav-icon fas fa-circle"></i>
                <p>
                  Master Settings
                  <i class="end fas fa-angle-right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="designation.php" class="nav-link active">
                    <i class="nav-icon far fa-circle"></i>
                    <p>Designation</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="department.php" class="nav-link ">
                    <i class="nav-icon far fa-circle"></i>
                    <p>Department</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="new-leave-type.php" class="nav-link">
                    <i class="nav-icon far fa-circle"></i>
                    <p>Leave type</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="new-leave-status.php" class="nav-link">
                    <i class="nav-icon far fa-circle"></i>
                    <p>Leave Status</p>
                  </a>
                </li>
              </ul>
            </li>

          </ul>
        </nav>
      </div>
      <!-- /.sidebar -->
    </aside>


  </div>
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
