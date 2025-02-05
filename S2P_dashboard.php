<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta20
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title> Dashboard</title>
    <!-- CSS files -->
    <link href="./dist/css/tabler.min.css?1692870487" rel="stylesheet"/>
    <link href="./dist/css/tabler-flags.min.css?1692870487" rel="stylesheet"/>
    <link href="./dist/css/tabler-payments.min.css?1692870487" rel="stylesheet"/>
    <link href="./dist/css/tabler-vendors.min.css?1692870487" rel="stylesheet"/>
    <link href="./dist/css/demo.min.css?1692870487" rel="stylesheet"/>

    <link rel="stylesheet" href="./dist/css/product_dashboard.css">
    

    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
      	font-feature-settings: "cv03", "cv04", "cv11";
      }

      
      .main-content { 
          padding: 20px;
      }

      .header {
          display: flex;
          justify-content: space-between;
          align-items: center;
          background-color: #fff;
          padding: 20px;
          box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      }

      .header h2 {
          margin: 0;
      }



      #pieChartCategory {
        width: 100% !important; 
        height: 100% !important;  
      }

 

      .button {
        background: linear-gradient(90deg, #007bff, #0056b3);
        color: #fff;
        border: none;
        width: 150px;
        font-weight: 500;
        padding: 8px; 
        border-radius: 5px; 
        transition: all 0.3s ease;
      }

      .button:hover {
        background: linear-gradient(90deg, #0056b3, #004080);
        color: #fff;
      } 
    </style>
  </head> 

<body>
  <script src="./dist/js/demo-theme.min.js?1692870487"></script>
  <div class="page">
    <!-- Navbar -->
    <header class="navbar navbar-expand-md d-print-none">
      <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
          aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
          <a href=".">
            <img src="./static/logo.svg" width="110" height="32" alt="Tabler" class="navbar-brand-image">
          </a>
        </h1>
        <div class="navbar-nav flex-row order-md-last">
          <div class="nav-item d-none d-md-flex me-3">
   
          </div>
          <div class="d-none d-md-flex">
            <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode"
              data-bs-toggle="tooltip" data-bs-placement="bottom">
              <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" /></svg>
            </a>
            <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode"
              data-bs-toggle="tooltip" data-bs-placement="bottom">
              <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                <path d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
              </svg>
            </a>
            <div class="nav-item dropdown d-none d-md-flex me-3">
              <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1" aria-label="Show notifications">
                <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                  stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                  <path d="M9 17v1a3 3 0 0 0 6 0v-1" /></svg>
                <span class="badge bg-red"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Last updates</h3>
                  </div>
                  <div class="list-group list-group-flush list-group-hoverable">
                    <div class="list-group-item">
                      <div class="row align-items-center">
                        <div class="col-auto"><span class="status-dot status-dot-animated bg-red d-block"></span></div>
                        <div class="col text-truncate">
                          <a href="#" class="text-body d-block">Example 1</a>
                          <div class="d-block text-secondary text-truncate mt-n1">
                            Change deprecated html tags to text decoration classes (#29604)
                          </div>
                        </div>
                        <div class="col-auto">
                          <a href="#" class="list-group-item-actions">
                            <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24"
                              viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                              stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                              <path
                                d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                            </svg>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="list-group-item">
                      <div class="row align-items-center">
                        <div class="col-auto"><span class="status-dot d-block"></span></div>
                        <div class="col text-truncate">
                          <a href="#" class="text-body d-block">Example 2</a>
                          <div class="d-block text-secondary text-truncate mt-n1">
                            justify-content:between ⇒ justify-content:space-between (#29734)
                          </div>
                        </div>
                        <div class="col-auto">
                          <a href="#" class="list-group-item-actions show">
                            <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-yellow" width="24" height="24"
                              viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                              stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                              <path
                                d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                            </svg>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="list-group-item">
                      <div class="row align-items-center">
                        <div class="col-auto"><span class="status-dot d-block"></span></div>
                        <div class="col text-truncate">
                          <a href="#" class="text-body d-block">Example 3</a>
                          <div class="d-block text-secondary text-truncate mt-n1">
                            Update change-version.js (#29736)
                          </div>
                        </div>
                        <div class="col-auto">
                          <a href="#" class="list-group-item-actions">
                            <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24"
                              viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                              stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                              <path
                                d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                            </svg>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="list-group-item">
                      <div class="row align-items-center">
                        <div class="col-auto"><span class="status-dot status-dot-animated bg-green d-block"></span>
                        </div>
                        <div class="col text-truncate">
                          <a href="#" class="text-body d-block">Example 4</a>
                          <div class="d-block text-secondary text-truncate mt-n1">
                            Regenerate package-lock.json (#29730)
                          </div>
                        </div>
                        <div class="col-auto">
                          <a href="#" class="list-group-item-actions">
                            <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24"
                              viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                              stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                              <path
                                d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                            </svg>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="nav-item dropdown">
            <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
              aria-label="Open user menu">
              <span class="avatar avatar-sm" style="background-image: url(./static/avatars/000m.jpg)"></span>
              <div class="d-none d-xl-block ps-2">
                <div>Paweł Kuna</div>
                <div class="mt-1 small text-secondary">UI Designer</div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <a href="#" class="dropdown-item">Status</a>
              
              <a href="./sec2pay_profile.html" class="dropdown-item">Profile</a>

              <a href="#" class="dropdown-item">Feedback</a>
              <div class="dropdown-divider"></div>
              <a href="./settings.html" class="dropdown-item">Settings</a>
              <a href="./sign-in.html" class="dropdown-item">Logout</a>
            </div>
          </div>
        </div>
      </div>
    </header>


    <header class="navbar-expand-md">
        <div class="collapse navbar-collapse" id="navbar-menu">
          <div class="navbar">
            <div class="container-xl">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="S2P_dashboard.php" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l-2 0l9 -9l9 9l-2 0" /><path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" /><path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                    </span>
                    <span class="nav-link-title">
                      Home
                    </span>
                  </a>
                </li>  
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                        <img src="./dist/img/icons/conversion-rate.png" width="24" height="24" > 
                      </span>
                      <span class="nav-link-title">
                        Leads
                  </span>
                  </a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="S2P_lead.php" target="_blank" rel="noopener">
                          List View
                      </a>

                      <a class="dropdown-item" href="newKanban.php" target="_blank" rel="noopener">
                        Kanban View
                      </a>
                      <a class="dropdown-item" href="S2P_calendar.php" target="_blank" rel="noopener">
                      Calendar
                      </a> 
                  </div>
                </li>
              </ul>
 
            </div>
          </div>
        </div>
      </header>


    <div class="page-wrapper"> 
              <!-- Page header -->
              <div class="page-header d-print-none my-4">
                <div class="container-xl">
                  <div class="row g-2 align-items-center">
                    <div class="col">
                      <h2 class="page-title">
                          Product Analytics Dashboard  
                      </h2>
                    </div>
                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none">
                      <div class="btn-list">
                          <button style="border-radius: 25px;" class="button"> Filter</button>   
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Product Analytics Dashboard -->
              <div class="container-xl mt-2">
                  <div class="row g-2">
                      <div class="col-12">
                          <div class="card card-md p-0">
                              <div class="card-body">  

                                  <!-- Summary Cards -->
                                  <div class="row row-cards summary-cards ">
                                    <!-- Total Products -->
                                    <div class="col-md-4 col-sm-6">
                                      <div class="custom-card card-1">
                                        <div class="custom-card-body">
                                          <h3 class="custom-card-title">Total Products</h3>
                                          <p class="custom-card-subtitle">Summary of Total Product</p>
                                          <p class="custom-card-value">999</p>
                                          <div class="custom-icon-container">
                                            <svg class="icon icon-tabler icon-tabler-package" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                              <path d="M12 3l8 4.5l-8 4.5l-8 -4.5z"></path>
                                              <path d="M4 10.5v7l8 4.5v-7"></path>
                                              <path d="M20 10.5v7l-8 4.5"></path>
                                              <path d="M12 3v9l8 4.5"></path>
                                              <path d="M4 10.5l8 4.5"></path>
                                            </svg>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                    <!-- Top-Selling Product -->
                                    <div class="col-md-4 col-sm-6">
                                      <div class="custom-card card-2">
                                        <div class="custom-card-body">
                                          <h3 class="custom-card-title">Top-Selling Product</h3>
                                          <p class="custom-card-subtitle">Summary of Top-Selling Product</p>
                                          <p class="custom-card-value">Product A</p>
                                          <div class="custom-icon-container">
                                            <svg class="icon icon-tabler icon-tabler-star" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                              <path d="M12 17.75l-6.172 3.897l1.185 -7.084l-5.163 -5.048l7.134 -1.04l3.016 -6.112l3.016 6.112l7.134 1.04l-5.163 5.048l1.185 7.084z"></path>
                                            </svg>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                    <!-- Total Revenue This Month -->
                                    <div class="col-md-4 col-sm-6">
                                      <div class="custom-card card-3">
                                        <div class="custom-card-body">
                                          <h3 class="custom-card-title">Total Revenue This Month</h3>
                                          <p class="custom-card-subtitle">Summary of Monthly Revenue</p>
                                          <p class="custom-card-value">$85,625</p>
                                          <div class="custom-icon-container">
                                            <svg class="icon icon-tabler icon-tabler-currency-dollar" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                              <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                              <path d="M12 8c-4 0 -4 -2.5 -4 -4s4 -2 4 -2s4 0 4 2s-4 4 -4 4"></path>
                                              <path d="M12 16c4 0 4 2.5 4 4s-4 2 -4 2s-4 0 -4 -2s4 -4 4 -4"></path>
                                              <path d="M12 4v16"></path>
                                            </svg>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div> 

                                  <div class="row mt-4">
                                      <!-- Revenue by Category (Pie Chart) -->
                                      <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="card">
                                            <div class="card-body p-0">
                                                <h3 class="card-title text-center">Revenue by Category</h3>
                                                <canvas id="pieChartCategory"></canvas>
                                            </div>
                                        </div>
                                    </div> 
                                    
                                    <!-- Sales Trend (Line Chart) -->
                                    <div class="col-lg-8 col-md-6 col-sm-12">
                                        <div class="card">
                                            <div class="card-body p-0">
                                                <h3 class="card-title text-center">Sales Trend</h3>
                                                <canvas id="lineChartSales"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                  </div> 

                              </div>
                          </div>
                      </div>
                  </div>
              </div>


                            <!-- Product Analytics Dashboard -->
                            <div class="container-xl mt-2">
                              <div class="row g-2">
                                  <div class="col-12">
                                      <div class="card card-md p-0">
                                          <div class="card-body">  
                                            <!-- Sales Distribution (new section) -->
                                                        <h2>  </h2>
                                                        <div class="table-responsive">  
                                                          <table id="leadTable" class="table  display nowrap" style="width:100%">
                                                            <thead>
                                                              <tr>
                                                                <th>Lead ID</th>
                                                                <th>Lead Name</th>
                                                                <th>Product Name</th>
                                                                <th>Lead Source</th>
                                                                <th>Status</th>
                                                                <th>Revenue</th>
                                                                <th>Created Date</th>
                                                                <th>Conversion Date</th>
                                                              </tr>
                                                            </thead>
                                                            <tbody>
                                                              <tr>
                                                                <td>001</td>
                                                                <td>Abhishek Chandane</td>
                                                                <td>Product A</td>
                                                                <td>Website</td>
                                                                <td>Converted</td>
                                                                <td>$5,000</td>
                                                                <td>2025-01-10</td>
                                                                <td>2025-01-15</td>
                                                              </tr>
                                                              <tr>
                                                                <td>002</td>
                                                                <td>Chandane Abhishek</td>
                                                                <td>Product B</td>
                                                                <td>Referral</td>
                                                                <td>In Progress</td>
                                                                <td>$2,500</td>
                                                                <td>2025-01-12</td>
                                                                <td></td>
                                                              </tr>
                                                            </tbody>
                                                          </table>
                                                        </div>
            
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
  
      <!-- Footer -->
      <footer class="footer footer-transparent d-print-none">
          <div class="container-xl">
              <div class="row text-center align-items-center flex-row-reverse">
                  <div class="col-lg-auto ms-lg-auto">
                      <ul class="list-inline list-inline-dots mb-0">
                          <li class="list-inline-item"><a href="https://tabler.io/docs" target="_blank" class="link-secondary" rel="noopener">Documentation</a></li>
                          <li class="list-inline-item"><a href="./license.html" class="link-secondary">License</a></li>
                          <li class="list-inline-item"><a href="https://github.com/tabler/tabler" target="_blank" class="link-secondary" rel="noopener">Source code</a></li>
                      </ul>
                  </div>
                  <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                      <ul class="list-inline list-inline-dots mb-0">
                          <li class="list-inline-item">Copyright &copy; 2023 <a href="." class="link-secondary">Tabler</a>. All rights reserved.</li>
                          <li class="list-inline-item"><a href="./changelog.html" class="link-secondary" rel="noopener">v1.0.0-beta20</a></li>
                      </ul>
                  </div>
              </div>
          </div>
      </footer>
  </div>

 

    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->

        <!-- Libs JS --> 

      <!-- Tabler Core -->
 
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
      <!-- Include DataTables CSS and JS -->
      <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
      <!-- DataTable Initialization Script -->
      <script>
          $(document).ready(function () {
              $('#leadTable').DataTable({
                responsive: true,  
                autoWidth: false,  
                paging: true,  
                searching: true, 
                ordering: true,  
                info: true,      
              columnDefs: [
                  { targets: 5, render: $.fn.dataTable.render.number(',', '.', 2, '$') } // Format revenue as currency
              ],
           });
          });
      </script>



        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
          // Example Pie Chart - Revenue by Category
          const pieChartCategoryData = {
              labels: ['Category 1', 'Category 2', 'Category 3', 'Category 4', 'Category 5'],
              datasets: [{
                  data: [10000, 6000, 4000, 8000, 7000], 
                  backgroundColor: ['#4caf50', '#ff9800', '#9c27b0', '#00bcd4', '#e91e63'],
              }]
          };
      
          const pieChartCategory = new Chart(document.getElementById('pieChartCategory'), {
              type: 'pie',
              data: pieChartCategoryData,
              options: {
                  responsive: true,
                  plugins: {
                      legend: { position: 'top' },
                      tooltip: { enabled: true },
                  },
              }
          });
      
          // Example Line Chart - Sales Trend
          const lineChartSalesData = {
              labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
              datasets: [{
                  label: 'Sales Trend ($)',
                  data: [0, 4000, 6000, 8000, 10000, 12000, 16000],
                  fill: false,
                  borderColor: '#3F51B5',
                  tension: 0.1,
              }]
          };
      
          const lineChartSales = new Chart(document.getElementById('lineChartSales'), {
              type: 'line',
              data: lineChartSalesData,
              options: {
                  responsive: true,
                  plugins: {
                      legend: { position: 'top' },
                      tooltip: { enabled: true },
                  },
                  scales: {
                      x: {
                          title: {
                              display: true,
                              text: 'Months',
                          },
                      },
                      y: {
                          title: {
                              display: true,
                              text: 'Revenue ($)',
                          },
                          beginAtZero: true,
                      },
                  },
              }
          });
      </script>
      
 

          </div>
        </div>
      </div>
 
    </div>
  </div> 



  
  <script src="./dist/js/tabler.min.js?1692870487" defer></script>
  <script src="./dist/js/demo.min.js?1692870487" defer></script>
</body>

</html>