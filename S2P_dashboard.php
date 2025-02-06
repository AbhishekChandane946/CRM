<?php include 'header.php';?>


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