
<?php
  require_once 'config-settings/LeadsManager.php';

  $leadId = isset($_GET['lead_id']) ? intval($_GET['lead_id']) : 0;

  if ($leadId <= 0) {
      echo "<p style='color:red;'>Invalid Lead ID.</p>";
      exit;
  }

  $leadManager = new LeadsManager();
  $lead = $leadManager->getLeadById($leadId);

  if ($lead['status'] !== 'success') {
      echo "<p style='color:red;'>No lead found with ID: {$leadId}</p>";
      exit;
  }

  $leadDetail = $lead['leadDetail'];

  $leadStatus = $leadDetail['STATUS'];  

  // echo "<script>alert('$leadStatus')</script>";

  $statusSteps = [
    'New',
    'CONTACTED',
    'QUALIFIED',
    'OPPORTUNITY',
    'DEMO_SCHEDULED',
    'IN NEGOTIATION',
    'CONVERTED',
    'DISQUALIFIED',
    'LOST',
    'LIVE',
    'OTHER'
  ];
   
  $currentStep = array_search($leadStatus, $statusSteps);

?>

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
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title> View Lead </title>
  <!-- CSS files -->
  <link href="./dist/css/tabler.min.css?1692870487" rel="stylesheet" />
  <link href="./dist/css/tabler-flags.min.css?1692870487" rel="stylesheet" />
  <link href="./dist/css/tabler-payments.min.css?1692870487" rel="stylesheet" />
  <link href="./dist/css/tabler-vendors.min.css?1692870487" rel="stylesheet" />
  <link href="./dist/css/demo.min.css?1692870487" rel="stylesheet" />
  <style>
    <blade import|%20url(%26%2339%3Bhttps%3A%2F%2Frsms.me%2Finter%2Finter.css%26%2339%3B)%3B%0D> :root {
      --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
    }

    body {
      font-feature-settings: "cv03", "cv04", "cv11";
    }

    .modal-body_scrollbar_required {
      padding: 0.5rem 1rem;
      max-height: calc(100vh - 210px);
      overflow-y: auto;
    }
  </style>
  <link rel="stylesheet" href="comman_styles.css">
  <!-- Edited : Abhishek Chandane -->
  <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
  <!-- Edited : Abhishek Chandane -->
</head>

<body>
  <script src="./dist/js/demo-theme.min.js?1692870487"></script>
  <div class="page">
    <!-- Navbar --> 
       <header class="navbar navbar-expand-md d-print-none" >
        <div class="container-xl">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href=".">
              <img src="./static/logo.svg" width="110" height="32" alt="Tabler" class="navbar-brand-image">
            </a>
          </h1>
          <div class="navbar-nav flex-row order-md-last">
     
            <div class="d-none d-md-flex">
 
 
              <div class="nav-item dropdown d-none d-md-flex me-3">
 
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
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
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
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon text-yellow" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
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
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="list-group-item">
                        <div class="row align-items-center">
                          <div class="col-auto"><span class="status-dot status-dot-animated bg-green d-block"></span></div>
                          <div class="col text-truncate">
                            <a href="#" class="text-body d-block">Example 4</a>
                            <div class="d-block text-secondary text-truncate mt-n1">
                              Regenerate package-lock.json (#29730)
                            </div>
                          </div>
                          <div class="col-auto">
                            <a href="#" class="list-group-item-actions">
                              <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" /></svg>
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
              <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                <span class="avatar avatar-sm" style="background-image: url(./static/avatars/000m.jpg)"></span>
                <div class="d-none d-xl-block ps-2">
                  <div>Paweł Kuna</div>
                  <div class="mt-1 small text-secondary">UI Designer</div>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <a href="#" class="dropdown-item">Status</a>
                <a href="./profile.html" class="dropdown-item">Profile</a>
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
                  <a class="nav-link dropdown-toggle" href="" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
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
      <div class="page-header d-print-none">
        <div class="container-xl">
          <div class="row g-2 align-items-center">
            <div class="col">
              <h2 class="page-title">
                View Lead
              </h2>
            </div>
          </div>


          <div class="row mt-3">
            <!-- Left Side: Lead Details -->
            <div class="col-md-12 fixed-height">
              <div class="card shadow fixed-height">
                <!-- Header Section -->
                <div class="card-header d-flex justify-content-between align-items-center bg-white">
                  <h3 id="leadId" class="mb-0"><?= htmlspecialchars($leadDetail['PRIMARY_NAME'] ?? 'N/A') ?> </h3>

                  <!-- <span class="badge bg-danger text-white">11 Days</span> -->
                </div>

                <!-- Action Buttons -->
                <div class="card-body">
                  <div class="d-flex justify-content-around mb-4">
                    <!-- Mail Button -->
                    <button class="btn btn-light text-success d-flex flex-column align-items-center"
                      data-bs-toggle="modal" data-bs-target="#mailModal">
                      <svg xmlns="http://www.w3.org/2000/svg" class="mail-icon" width="35" height="35"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                          d="M22 7.535v9.465a3 3 0 0 1 -2.824 2.995l-.176 .005h-14a3 3 0 0 1 -2.995 -2.824l-.005 -.176v-9.465l9.445 6.297l.116 .066a1 1 0 0 0 .878 0l.116 -.066l9.445 -6.297z"
                          stroke-width="0" fill="currentColor" />
                        <path
                          d="M19 4c1.08 0 2.027 .57 2.555 1.427l-9.555 6.37l-9.555 -6.37a2.999 2.999 0 0 1 2.354 -1.42l.201 -.007h14z"
                          stroke-width="0" fill="currentColor" /></svg>
                      <span>Mail</span>
                    </button>
                    <!-- File Button -->
                    <button class="btn btn-light text-info d-flex flex-column align-items-center" data-bs-toggle="modal"
                      data-bs-target="#fileModal">
                      <svg xmlns="http://www.w3.org/2000/svg" class="file-icon" width="35" height="35"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                          d="M12 2l.117 .007a1 1 0 0 1 .876 .876l.007 .117v4l.005 .15a2 2 0 0 0 1.838 1.844l.157 .006h4l.117 .007a1 1 0 0 1 .876 .876l.007 .117v9a3 3 0 0 1 -2.824 2.995l-.176 .005h-10a3 3 0 0 1 -2.995 -2.824l-.005 -.176v-14a3 3 0 0 1 2.824 -2.995l.176 -.005h5z"
                          stroke-width="0" fill="currentColor" />
                        <path d="M19 7h-4l-.001 -4.001z" stroke-width="0" fill="currentColor" /></svg>
                      <span>File</span>
                    </button>

                    <!-- Note Button -->
                    <button class="btn btn-light text-warning d-flex flex-column align-items-center"
                      data-bs-toggle="modal" data-bs-target="#noteModal">
                      <svg xmlns="http://www.w3.org/2000/svg" class="mail-icon" width="35" height="35"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-notes">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M5 3m0 2a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v14a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2z" />
                        <path d="M9 7l6 0" />
                        <path d="M9 11l6 0" />
                        <path d="M9 15l4 0" /></svg>
                      <span>Notes</span>
                    </button>

                    <!-- Activity Button -->
                    <button class="btn btn-light text-primary d-flex flex-column align-items-center"
                      data-bs-toggle="modal" data-bs-target="#activityModal">
                      <svg xmlns="http://www.w3.org/2000/svg" class="mail-icon" width="35" height="35"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-activity">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M3 12h4l3 8l4 -16l3 8h4" /></svg><span>Activity</span>
                    </button>
                  </div> 

                  
                <!-- Lead Details Section -->
                <h6 class="text-muted mb-3">About Lead</h6>
                <div class="card-body">

                <div class="datagrid">
    <div class="datagrid-item">
        <div class="datagrid-title">Lead ID</div>
        <div class="datagrid-content"><?= htmlspecialchars($leadDetail['ID'] ?? 'N/A') ?></div>
    </div>
    <div class="datagrid-item">
        <div class="datagrid-title">System ID</div>
        <div class="datagrid-content"><?= htmlspecialchars($leadDetail['SYSTEM_ID'] ?? 'N/A') ?></div>
    </div>
    <div class="datagrid-item">
        <div class="datagrid-title">Source Lead ID</div>
        <div class="datagrid-content"><?= htmlspecialchars($leadDetail['SOURCE_LEAD_ID'] ?? 'N/A') ?></div>
    </div>
    <div class="datagrid-item">
        <div class="datagrid-title">Product</div>
        <div class="datagrid-content"><?= htmlspecialchars($leadDetail['PRODUCT'] ?? 'N/A') ?></div>
    </div>
    <div class="datagrid-item">
        <div class="datagrid-title">Source</div>
        <div class="datagrid-content"><?= htmlspecialchars($leadDetail['SOURCE'] ?? 'N/A') ?></div>
    </div>
    <div class="datagrid-item">
        <div class="datagrid-title">Primary Phone</div>
        <div class="datagrid-content"><?= htmlspecialchars($leadDetail['PRIMARY_PHONE'] ?? 'N/A') ?></div>
    </div>
    <div class="datagrid-item">
        <div class="datagrid-title">Primary Name</div>
        <div class="datagrid-content"><?= htmlspecialchars($leadDetail['PRIMARY_NAME'] ?? 'N/A') ?></div>
    </div>
    <div class="datagrid-item">
        <div class="datagrid-title">Primary Email</div>
        <div class="datagrid-content"><?= htmlspecialchars($leadDetail['PRIMARY_EMAIL'] ?? 'N/A') ?></div>
    </div>
    <div class="datagrid-item">
        <div class="datagrid-title">Primary Text</div>
        <div class="datagrid-content"><?= htmlspecialchars($leadDetail['PRIMARY_TEXT'] ?? 'N/A') ?></div>
    </div>
    <div class="datagrid-item">
        <div class="datagrid-title">First Follow-up Date</div>
        <div class="datagrid-content"><?= htmlspecialchars($leadDetail['FIRST_FOLLOWUP_DATE'] ?? 'N/A') ?></div>
    </div>
    <div class="datagrid-item">
        <div class="datagrid-title">Second Follow-up Date</div>
        <div class="datagrid-content"><?= htmlspecialchars($leadDetail['SECOND_FOLLOWUP_DATE'] ?? 'N/A') ?></div>
    </div>
    <div class="datagrid-item">
        <div class="datagrid-title">Third Follow-up Date</div>
        <div class="datagrid-content"><?= htmlspecialchars($leadDetail['THREE_FOLLOWUP_DATE'] ?? 'N/A') ?></div>
    </div>
    <div class="datagrid-item">
        <div class="datagrid-title">Status</div>
        <div class="datagrid-content">
            <span class="badge bg-secondary text-light"><?= htmlspecialchars($leadDetail['STATUS'] ?? 'N/A') ?></span>
        </div>
    </div>
    <div class="datagrid-item">
        <div class="datagrid-title">Score</div>
        <div class="datagrid-content"><?= htmlspecialchars($leadDetail['SCORE'] ?? 'N/A') ?></div>
    </div>
    <div class="datagrid-item">
        <div class="datagrid-title">Org Owner ID</div>
        <div class="datagrid-content"><?= htmlspecialchars($leadDetail['ORG_OWNER_ID'] ?? 'N/A') ?></div>
    </div>
    <div class="datagrid-item">
        <div class="datagrid-title">Current Owner ID</div>
        <div class="datagrid-content"><?= htmlspecialchars($leadDetail['CURRENT_OWNER_ID'] ?? 'N/A') ?></div>
    </div>
    <div class="datagrid-item">
        <div class="datagrid-title">Lead Store ID</div>
        <div class="datagrid-content"><?= htmlspecialchars($leadDetail['LEAD_STORE_ID'] ?? 'N/A') ?></div>
    </div>
    <div class="datagrid-item">
        <div class="datagrid-title">Created At</div>
        <div class="datagrid-content"><?= htmlspecialchars($leadDetail['CREATED_AT'] ?? 'N/A') ?></div>
    </div>
    <div class="datagrid-item">
        <div class="datagrid-title">Updated At</div>
        <div class="datagrid-content"><?= htmlspecialchars($leadDetail['UPDATED_AT'] ?? 'N/A') ?></div>
    </div>
</div>


                </div>
 

                </div>
              </div>
            </div>

            <div class="col-md-12 fixed-height">
              <div class="card fixed-height"> 
                <!-- Lead Follow-Up STEP PROGRESS BAR -->

                
                <!-- Lead Follow-Up Process Bar -->
                <div class="progress-bar-container">
                  <!-- <div class="progress-badge active">New</div>
                      <div class="progress-badge active">Follow Up</div>
                      <div class="progress-badge inactive">Prospect</div>
                      <div class="progress-badge inactive">Negotiation</div>
                      <div class="progress-badge inactive">Won/Lost</div> -->

                      <ul class="step-bar">
                          <?php foreach ($statusSteps as $index => $step) :  
                              $class = ($index < $currentStep) ? "complete" : (($index == $currentStep) ? "active" : "pending");
                          ?>
                              <li class="<?= $class; ?>">
                                  <a href="javascript:void(0)"><?= $step; ?></a>
                              </li>
                          <?php endforeach; ?>
                      </ul>




                </div>



                <!-- Tabs Section -->
                <div class="card-body">
                  <ul class="nav nav-tabs mb-3" id="followUpTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all"
                        type="button" role="tab" aria-controls="all" aria-selected="true">All</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="planned-tab" data-bs-toggle="tab" data-bs-target="#planned"
                        type="button" role="tab" aria-controls="planned" aria-selected="false">Planned</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="notes-tab" data-bs-toggle="tab" data-bs-target="#notes" type="button"
                        role="tab" aria-controls="notes" aria-selected="false">Notes</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="calls-tab" data-bs-toggle="tab" data-bs-target="#calls" type="button"
                        role="tab" aria-controls="calls" aria-selected="false">Calls</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="meetings-tab" data-bs-toggle="tab" data-bs-target="#meetings"
                        type="button" role="tab" aria-controls="meetings" aria-selected="false">Meetings</button>
                    </li>
                  </ul>

                  <!-- Tab Content -->
                  <div class="tab-content" id="followUpTabsContent">
                    <!-- All Tab -->
                    <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                      <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-gear-fill text-warning me-2"></i>
                        <div>
                          <strong>Updated Stage:</strong> Empty → New<br>
                          <small>6 Dec 2024, 10:45 AM, By Mr. A</small>
                        </div>
                      </div>
                      <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-gear-fill text-warning me-2"></i>
                        <div>
                          <strong>Updated Pipeline:</strong> Empty → Default Pipeline<br>
                          <small>6 Dec 2024, 10:45 AM, By Mr. A</small>
                        </div>
                      </div>
                    </div>

                    <!-- Planned Tab -->
                    <div class="tab-pane fade" id="planned" role="tabpanel" aria-labelledby="planned-tab">
                      <p>No planned follow-ups yet. Click "Add Follow-Up" to create one.</p>
                    </div>

                    <!-- Notes Tab -->
                    <div class="tab-pane fade" id="notes" role="tabpanel" aria-labelledby="notes-tab">
                      <textarea class="form-control" rows="4" placeholder="Add your notes here"></textarea>
                      <button class="btn btn-primary mt-3">Save Notes</button>
                    </div>

                    <!-- Calls Tab -->
                    <div class="tab-pane fade" id="calls" role="tabpanel" aria-labelledby="calls-tab">
                      <p>No calls logged yet. Click "Log Call" to add details.</p>
                      <button class="btn btn-primary mt-3">Log Call</button>
                    </div>

                    <!-- Meetings Tab -->
                    <div class="tab-pane fade" id="meetings" role="tabpanel" aria-labelledby="meetings-tab">
                      <p>No meetings scheduled yet. Click "Schedule Meeting" to add one.</p>
                      <button class="btn btn-primary mt-3">Schedule Meeting</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>


      <!-- Mail Modal -->
      <div class="modal fade" id="mailModal" tabindex="-1" aria-labelledby="mailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content text-center p-4 mail-modal">
            <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal"
              aria-label="Close"></button>
            <div class="modal-body" style="scroll">
              <div class="mail-icon mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="mail-icon" width="50" height="50" viewBox="0 0 24 24"
                  stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path
                    d="M22 7.535v9.465a3 3 0 0 1 -2.824 2.995l-.176 .005h-14a3 3 0 0 1 -2.995 -2.824l-.005 -.176v-9.465l9.445 6.297l.116 .066a1 1 0 0 0 .878 0l.116 -.066l9.445 -6.297z"
                    stroke-width="0" fill="currentColor" />
                  <path
                    d="M19 4c1.08 0 2.027 .57 2.555 1.427l-9.555 6.37l-9.555 -6.37a2.999 2.999 0 0 1 2.354 -1.42l.201 -.007h14z"
                    stroke-width="0" fill="currentColor" /></svg>
              </div>
              <h5 class="modal-title mb-2">Compose Mail</h5>
              <form>
                <div class="mb-3">
                  <input type="email" class="form-control mail-input" id="toEmail" placeholder="Recipient Email">
                </div>
                <div class="mb-3">
                  <input type="text" class="form-control mail-input" id="subject" placeholder="Subject">
                </div>
                <div class="mb-3">
                  <textarea class="form-control mail-input" id="message" rows="4" placeholder="Message"></textarea>
                </div>
                <button style="border-radius:25px;" type="button" class="button p-1">Send Mail</button>
              </form>
            </div>
          </div>
        </div>
      </div>


      <!-- File Modal -->
      <div class="modal fade " id="fileModal" tabindex="-1" aria-labelledby="fileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content text-center p-4 mail-modal">
            <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal"
              aria-label="Close"></button>
            <div class="modal-body">
              <div class="mail-icon mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="mail-icon" width="50" height="50" viewBox="0 0 24 24"
                  stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path
                    d="M22 7.535v9.465a3 3 0 0 1 -2.824 2.995l-.176 .005h-14a3 3 0 0 1 -2.995 -2.824l-.005 -.176v-9.465l9.445 6.297l.116 .066a1 1 0 0 0 .878 0l.116 -.066l9.445 -6.297z"
                    stroke-width="0" fill="currentColor" />
                  <path
                    d="M19 4c1.08 0 2.027 .57 2.555 1.427l-9.555 6.37l-9.555 -6.37a2.999 2.999 0 0 1 2.354 -1.42l.201 -.007h14z"
                    stroke-width="0" fill="currentColor" /></svg>
              </div>
              <h5 class="modal-title mb-2">Compose Mail</h5>
              <form>
                <div class="mb-3">
                  <input type="email" class="form-control mail-input" id="toEmail" placeholder="Recipient Email">
                </div>
                <div class="mb-3">
                  <input type="text" class="form-control mail-input" id="subject" placeholder="Subject">
                </div>
                <div class="mb-3">
                  <textarea class="form-control mail-input" id="message" rows="4" placeholder="Message"></textarea>
                </div>
                <button type="button" class="btn quick-action-btn w-100">Send Mail</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Full Note Modal List and Create -->
      <div class="modal fade" id="noteModal" tabindex="-1" aria-labelledby="noteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content note-modal">
            <div class="modal-header">
              <h5 class="modal-title">Notes</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body modal-body_scrollbar_required">
              <!-- Create Note Button -->
              <div class="d-flex justify-content-end mb-3 position-relative">
                <!-- SVG Trigger -->
                <svg id="createNoteSvg" xmlns="http://www.w3.org/2000/svg" title="Create Note" class="mail-icon"
                  width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                  stroke-linecap="round" stroke-linejoin="round" style="cursor: pointer;">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                  <path d="M13.5 6.5l4 4" />
                </svg>
                <!-- Small Create Note Modal -->
                <div id="smallNoteModal" class="small-note-modal d-none">
                  <div class="modal-content p-3">
                    <form id="smallNoteForm">
                      <div class="mb-2">
                        <label for="noteInput" class="form-label">Create Note</label>
                        <textarea class="form-control" id="noteInput" placeholder="Enter note" rows="3"
                          required></textarea>
                      </div>
                      <div class="text-center">
                        <button style="border-radius: 25px;" type="submit" class=" button">Save</button>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
              <!-- Note List -->
              <div class="note-list">
                <!-- Example Note Item -->
                <div class="note-item d-flex align-items-center mb-3 p-3 rounded shadow-sm">
                  <img src="./static/avatars/003m.jpg" alt="Profile" class="rounded-circle me-3"
                    style="width: 50px; height: 50px;">
                  <div class="flex-grow-1">
                    <h6 class="mb-1">John Doe</h6>
                    <p class="mb-0 text-muted">Some details about this note...</p>
                    <small class="text-muted">10:30 AM</small>
                  </div>
                  <svg xmlns="http://www.w3.org/2000/svg" class="mail-icon" width="25" height="25" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                    <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                </div>

                <!-- Repeat for More Notes -->
                <div class="note-item d-flex align-items-center mb-3 p-3 rounded shadow-sm">
                  <img src="./static/avatars/003m.jpg" alt="Profile" class="rounded-circle me-3"
                    style="width: 50px; height: 50px;">
                  <div class="flex-grow-1">
                    <h6 class="mb-1">John Doe</h6>
                    <p class="mb-0 text-muted">Some details about this note...</p>
                    <small class="text-muted">10:30 AM</small>
                  </div>
                  <svg xmlns="http://www.w3.org/2000/svg" class="mail-icon" width="25" height="25" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                    <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                </div>

                <div class="note-item d-flex align-items-center mb-3 p-3 rounded shadow-sm">
                  <img src="./static/avatars/003m.jpg" alt="Profile" class="rounded-circle me-3"
                    style="width: 50px; height: 50px;">
                  <div class="flex-grow-1">
                    <h6 class="mb-1">John Doe</h6>
                    <p class="mb-0 text-muted">Some details about this note...</p>
                    <small class="text-muted">10:30 AM</small>
                  </div>
                  <svg xmlns="http://www.w3.org/2000/svg" class="mail-icon" width="25" height="25" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                    <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                </div>

                <div class="note-item d-flex align-items-center mb-3 p-3 rounded shadow-sm">
                  <img src="./static/avatars/003m.jpg" alt="Profile" class="rounded-circle me-3"
                    style="width: 50px; height: 50px;">
                  <div class="flex-grow-1">
                    <h6 class="mb-1">John Doe</h6>
                    <p class="mb-0 text-muted">Some details about this note...</p>
                    <small class="text-muted">10:30 AM</small>
                  </div>
                  <svg xmlns="http://www.w3.org/2000/svg" class="mail-icon" width="25" height="25" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                    <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                </div>

                <div class="note-item d-flex align-items-center mb-3 p-3 rounded shadow-sm">
                  <img src="./static/avatars/003m.jpg" alt="Profile" class="rounded-circle me-3"
                    style="width: 50px; height: 50px;">
                  <div class="flex-grow-1">
                    <h6 class="mb-1">John Doe</h6>
                    <p class="mb-0 text-muted">Some details about this note...</p>
                    <small class="text-muted">10:30 AM</small>
                  </div>
                  <svg xmlns="http://www.w3.org/2000/svg" class="mail-icon" width="25" height="25" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                    <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                </div>

                <div class="note-item d-flex align-items-center mb-3 p-3 rounded shadow-sm">
                  <img src="./static/avatars/003m.jpg" alt="Profile" class="rounded-circle me-3"
                    style="width: 50px; height: 50px;">
                  <div class="flex-grow-1">
                    <h6 class="mb-1">John Doe</h6>
                    <p class="mb-0 text-muted">Some details about this note...</p>
                    <small class="text-muted">10:30 AM</small>
                  </div>
                  <svg xmlns="http://www.w3.org/2000/svg" class="mail-icon" width="25" height="25" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                    <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                </div>

                <div class="note-item d-flex align-items-center mb-3 p-3 rounded shadow-sm">
                  <img src="./static/avatars/003m.jpg" alt="Profile" class="rounded-circle me-3"
                    style="width: 50px; height: 50px;">
                  <div class="flex-grow-1">
                    <h6 class="mb-1">John Doe</h6>
                    <p class="mb-0 text-muted">Some details about this note...</p>
                    <small class="text-muted">10:30 AM</small>
                  </div>
                  <svg xmlns="http://www.w3.org/2000/svg" class="mail-icon" width="25" height="25" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                    <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                </div>

                <div class="note-item d-flex align-items-center mb-3 p-3 rounded shadow-sm">
                  <img src="./static/avatars/003m.jpg" alt="Profile" class="rounded-circle me-3"
                    style="width: 50px; height: 50px;">
                  <div class="flex-grow-1">
                    <h6 class="mb-1">John Doe</h6>
                    <p class="mb-0 text-muted">Some details about this note...</p>
                    <small class="text-muted">10:30 AM</small>
                  </div>
                  <svg xmlns="http://www.w3.org/2000/svg" class="mail-icon" width="25" height="25" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                    <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                </div>

                <div class="note-item d-flex align-items-center mb-3 p-3 rounded shadow-sm">
                  <img src="./static/avatars/003m.jpg" alt="Profile" class="rounded-circle me-3"
                    style="width: 50px; height: 50px;">
                  <div class="flex-grow-1">
                    <h6 class="mb-1">John Doe</h6>
                    <p class="mb-0 text-muted">Some details about this note...</p>
                    <small class="text-muted">10:30 AM</small>
                  </div>
                  <svg xmlns="http://www.w3.org/2000/svg" class="mail-icon" width="25" height="25" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                    <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                </div>

                <div class="note-item d-flex align-items-center mb-3 p-3 rounded shadow-sm">
                  <img src="./static/avatars/003m.jpg" alt="Profile" class="rounded-circle me-3"
                    style="width: 50px; height: 50px;">
                  <div class="flex-grow-1">
                    <h6 class="mb-1">John Doe</h6>
                    <p class="mb-0 text-muted">Some details about this note...</p>
                    <small class="text-muted">10:30 AM</small>
                  </div>
                  <svg xmlns="http://www.w3.org/2000/svg" class="mail-icon" width="25" height="25" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="icon icon-tabler icons-tabler-outline icon-tabler-eye">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                    <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Full Note Modal List and Create -->

      <!-- Activity Modal -->
      <div class="modal fade" id="activityModal" tabindex="-1" aria-labelledby="activityModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="activityModalLabel">Activity</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body modal-body_scrollbar_required">
              <div class="activity-timeline">
                <!-- Today's Activity -->
                <div class="activity-day ">
                  <h6 class="text-muted">Today</h6>
                  <div class="activity-item">
                    <div class="activity-icon bg-primary text-white">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-refresh" width="24"
                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" />
                        <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" />
                      </svg>
                    </div>
                    <div class="activity-content">
                      <p><strong>LEAD status updated</strong> </p>
                      <p class="text-muted small">From Requirement Closed • by OPS team</p>
                    </div>
                  </div>
                  <div class="activity-item">
                    <div class="activity-icon bg-warning text-white">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-note" width="24"
                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M13 20h-6a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8l-4 4" />
                        <line x1="13" y1="20" x2="20" y2="20" />
                        <line x1="15" y1="8" x2="9" y2="8" />
                        <line x1="15" y1="12" x2="9" y2="12" />
                      </svg>
                    </div>
                    <div class="activity-content d-flex justify-content-between">
                      <div>
                        <p><strong>Added note on</strong> </p>
                        <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit, assumenda.
                        </p>
                      </div>
                      <svg xmlns="http://www.w3.org/2000/svg" class="mail-icon" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <circle cx="12" cy="12" r="2" />
                        <path d="M22 12c0 1.657 -4.03 6 -10 6s-10 -4.343 -10 -6s4.03 -6 10 -6s10 4.343 10 6z" />
                      </svg>
                    </div>
                  </div>
                </div>

                <!-- Yesterday's Activity -->
                <div class="activity-day ">
                  <h6 class="text-muted">Today</h6>
                  <div class="activity-item">
                    <div class="activity-icon bg-primary text-white">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-refresh" width="24"
                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" />
                        <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" />
                      </svg>
                    </div>
                    <div class="activity-content">
                      <p><strong>LEAD status updated</strong> </p>
                      <p class="text-muted small">From Requirement Closed • by OPS team</p>
                    </div>
                  </div>
                  <div class="activity-item">
                    <div class="activity-icon bg-warning text-white">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-note" width="24"
                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M13 20h-6a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8l-4 4" />
                        <line x1="13" y1="20" x2="20" y2="20" />
                        <line x1="15" y1="8" x2="9" y2="8" />
                        <line x1="15" y1="12" x2="9" y2="12" />
                      </svg>
                    </div>
                    <div class="activity-content d-flex justify-content-between">
                      <div>
                        <p><strong>Added note on</strong> </p>
                        <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit, assumenda.
                        </p>
                      </div>
                      <svg xmlns="http://www.w3.org/2000/svg" class="mail-icon" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <circle cx="12" cy="12" r="2" />
                        <path d="M22 12c0 1.657 -4.03 6 -10 6s-10 -4.343 -10 -6s4.03 -6 10 -6s10 4.343 10 6z" />
                      </svg>
                    </div>
                  </div>
                </div>

                <!-- Today's Activity -->
                <div class="activity-day ">
                  <h6 class="text-muted">Today</h6>
                  <div class="activity-item">
                    <div class="activity-icon bg-primary text-white">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-refresh" width="24"
                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" />
                        <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" />
                      </svg>
                    </div>
                    <div class="activity-content">
                      <p><strong>LEAD status updated</strong> </p>
                      <p class="text-muted small">From Requirement Closed • by OPS team</p>
                    </div>
                  </div>
                  <div class="activity-item">
                    <div class="activity-icon bg-warning text-white">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-note" width="24"
                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M13 20h-6a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8l-4 4" />
                        <line x1="13" y1="20" x2="20" y2="20" />
                        <line x1="15" y1="8" x2="9" y2="8" />
                        <line x1="15" y1="12" x2="9" y2="12" />
                      </svg>
                    </div>
                    <div class="activity-content d-flex justify-content-between">
                      <div>
                        <p><strong>Added note on</strong> </p>
                        <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit, assumenda.
                        </p>
                      </div>
                      <svg xmlns="http://www.w3.org/2000/svg" class="mail-icon" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <circle cx="12" cy="12" r="2" />
                        <path d="M22 12c0 1.657 -4.03 6 -10 6s-10 -4.343 -10 -6s4.03 -6 10 -6s10 4.343 10 6z" />
                      </svg>
                    </div>
                  </div>
                </div>

                <!-- Yesterday's Activity -->
                <div class="activity-day ">
                  <h6 class="text-muted">Today</h6>
                  <div class="activity-item">
                    <div class="activity-icon bg-primary text-white">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-refresh" width="24"
                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" />
                        <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" />
                      </svg>
                    </div>
                    <div class="activity-content">
                      <p><strong>LEAD status updated</strong> </p>
                      <p class="text-muted small">From Requirement Closed • by OPS team</p>
                    </div>
                  </div>
                  <div class="activity-item">
                    <div class="activity-icon bg-warning text-white">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-note" width="24"
                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M13 20h-6a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8l-4 4" />
                        <line x1="13" y1="20" x2="20" y2="20" />
                        <line x1="15" y1="8" x2="9" y2="8" />
                        <line x1="15" y1="12" x2="9" y2="12" />
                      </svg>
                    </div>
                    <div class="activity-content d-flex justify-content-between">
                      <div>
                        <p><strong>Added note on</strong> </p>
                        <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit, assumenda.
                        </p>
                      </div>
                      <svg xmlns="http://www.w3.org/2000/svg" class="mail-icon" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <circle cx="12" cy="12" r="2" />
                        <path d="M22 12c0 1.657 -4.03 6 -10 6s-10 -4.343 -10 -6s4.03 -6 10 -6s10 4.343 10 6z" />
                      </svg>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>








      <!-- Page body -->
      <div class="page-body">
        <div class="container-xl">
          <!-- Content here -->
        </div>
      </div>
      <footer class="footer footer-transparent d-print-none">
        <div class="container-xl">
          <div class="row text-center align-items-center flex-row-reverse">
            <div class="col-lg-auto ms-lg-auto">
              <ul class="list-inline list-inline-dots mb-0">
                <li class="list-inline-item"><a href="https://tabler.io/docs" target="_blank" class="link-secondary"
                    rel="noopener">Documentation</a></li>
                <li class="list-inline-item"><a href="./license.html" class="link-secondary">License</a></li>
                <li class="list-inline-item"><a href="https://github.com/tabler/tabler" target="_blank"
                    class="link-secondary" rel="noopener">Source code</a></li>
                <li class="list-inline-item">
                  <a href="https://github.com/sponsors/codecalm" target="_blank" class="link-secondary" rel="noopener">
                    <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon text-pink icon-filled icon-inline" width="24"
                      height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>
                    Sponsor
                  </a>
                </li>
              </ul>
            </div>
            <div class="col-12 col-lg-auto mt-3 mt-lg-0">
              <ul class="list-inline list-inline-dots mb-0">
                <li class="list-inline-item">
                  Copyright &copy; 2023
                  <a href="." class="link-secondary">Tabler</a>.
                  All rights reserved.
                </li>
                <li class="list-inline-item">
                  <a href="./changelog.html" class="link-secondary" rel="noopener">
                    v1.0.0-beta20
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!-- Libs JS -->
  <!-- Tabler Core -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


  <script> 
    
  // $(document).ready(function () {
  //   // Define colors for each step
  //   const stepColors = {
  //       "To Do": "rgb(255 223 93)",
  //       "In Progress": "rgb(101 193 255)",
  //       "Pending": "rgb(255 157 71)",
  //       "Hold": "rgb(215 117 255)",
  //       "Done": "rgb(49 255 136)",
  //       "Completed": "rgb(68 223 29)",
  //       "Lost": "rgb(255 82 64)"
  //   };

    
  //   const stepOrder = [
  //       "To Do", "In Progress", "Pending", "Hold", "Done", "Completed", "Lost"
  //   ];

  
  //   function prefillSteps(currentStatus) {
  //       let currentStepIndex = stepOrder.indexOf(currentStatus);
      
  //       $(".step").each(function (index) {
  //           let stepName = $(this).text().trim(); 
  //           //  alert(stepName); 
  //           if (stepOrder.indexOf(stepName) <= currentStepIndex) {
  //               $(this).css("background", stepColors[stepName]); // Fill previous steps
  //               $(this).removeClass('disabled'); // Enable previous steps
  //           } else {
  //               $(this).css("background", "#e0e0e0"); // Reset the background for future steps
  //               $(this).addClass('disabled'); // Disable future steps
  //           }
  //       });
  //   }

  //   // Trigger when a step is clicked
  //   $(".step").click(function () {
  //     var stepName2 = $(this).text();
  //       alert('You Clicked on STEP ...' + stepName2);
  //       let status = $(this).data("status"); 
  //       // Reset all steps and clear colors
  //       $(".step").css("background", "#e0e0e0").addClass('disabled').removeClass('active complete warning danger');

  //       // Fill the current step and all previous steps
  //       $(".step").each(function () {
  //           let stepName = $(this).text().trim();
  //           if (stepOrder.indexOf(stepName) <= stepOrder.indexOf(status)) {
  //               $(this).css("background", stepColors[stepName]).removeClass('disabled').addClass('active');
  //           }
  //       });

  //       // Save the selected status to Local Storage
  //       localStorage.setItem('currentLeadStatus', status) ;

  //       // Update the status in DB
  //       updateStatusInDB(status);
  //   });

  //   // This function sends the updated status to the backend via AJAX
  //   function updateStatusInDB(status) {
  //     let leadId = $('#id').val();
  //     alert(leadId);
  //       $.ajax({
  //           url: "update_status.php",  // Your endpoint for updating status
  //           type: "POST",
  //           data: {
  //               lead_id: leadId,
  //               status: status
  //           },
  //           success: function (response) {
  //               try {
  //                   let data = JSON.parse(response);
  //                   if (data.success) {
  //                       console.log("Database Updated:", data.message);
  //                   } else {
  //                       console.error("Error:", data.message);
  //                   }
  //               } catch (error) {
  //                   console.error("Invalid JSON response:", error);
  //               }
  //           },
  //           error: function (xhr, status, error) {
  //               console.error("AJAX Error:", error);
  //           }
  //       });
  //   }

  //   // Assuming you have the current status of the lead from the backend or Local Storage
  //   $(document).ready(function () {
  //       // Try to get the current lead status from Local Storage, fallback to "To Do"
  //       let currentLeadStatus = localStorage.getItem('currentLeadStatus') || "To Do";

  //       // Prefill steps based on the current status of the lead
  //       prefillSteps(currentLeadStatus);
  //   });

  // });
 
</script>



  <script>
    $(document).ready(function () {
      const $svgTrigger = $("#createNoteSvg");
      const $smallModal = $("#smallNoteModal");

      $svgTrigger.on("click", function () {
        $smallModal.toggleClass("d-none");
      });

      $(document).on("click", function (e) {
        if (!$smallModal.is(e.target) && !$smallModal.has(e.target).length && !$svgTrigger.is(e.target)) {
          $smallModal.addClass("d-none");
        }
      });
    });
  </script>


  <script src="./dist/js/tabler.min.js?1692870487" defer></script>
  <script src="./dist/js/demo.min.js?1692870487" defer></script>
</body>

</html>



<!-- $(document).ready(function () {
  $('#createNoteForm').on('submit', function (e) {
    e.preventDefault(); // Prevent default form submission
    const noteTitle = $('#noteTitle').val();
    const noteDescription = $('#noteDescription').val();

    // Simulate adding the note to the list
    const newNote = `
      <div class="note-item d-flex align-items-center mb-3 p-3 rounded shadow-sm">
        <img src="./static/avatars/003m.jpg" alt="Profile" class="rounded-circle me-3" style="width: 50px; height: 50px;">
        <div class="flex-grow-1">
          <h6 class="mb-1">${noteTitle}</h6>
          <p class="mb-0 text-muted">${noteDescription}</p>
          <small class="text-muted">${new Date().toLocaleTimeString()}</small>
        </div>
      </div>
    `;

    $('.note-list').append(newNote); // Append the new note
    $('#createNoteModal').modal('hide'); // Hide the modal
    $('#createNoteForm')[0].reset(); // Reset the form
  });
}); -->