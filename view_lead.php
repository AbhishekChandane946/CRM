 
<?php
 
require_once 'config-settings/LeadsManager.php';
 
$leadId = isset($_GET['lead_id']) ? intval($_GET['lead_id']) : 0;

if ($leadId <= 0) {
    echo "<p style='color:red;'>Invalid Lead ID.</p>";
    exit;  
}

 
$leadManager = new LeadsManager();

 
$lead = $leadManager->getLeadById($leadId);

 
if ($lead) { 
    echo "<pre>";
    print_r($lead);
    echo "</pre>";
} else {
    echo "<p style='color:red;'>No lead found with ID: {$leadId}</p>";
}
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
            <div class="btn-list">
              <a href="https://github.com/tabler/tabler" class="btn" target="_blank" rel="noreferrer">
                <!-- Download SVG icon from http://tabler-icons.io/i/brand-github -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                  stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path
                    d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5" />
                  </svg>
                Source code
              </a>
              <a href="https://github.com/sponsors/codecalm" class="btn" target="_blank" rel="noreferrer">
                <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon text-pink" width="24" height="24"
                  viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                  stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>
                Sponsor
              </a>
            </div>
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
                <a class="nav-link" href="sec2pay_index.html">
                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                      stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                      <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                      <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                  </span>
                  <span class="nav-link-title">
                    Home
                  </span>
                </a>
              </li>

              <li class="nav-item active">
                <a class="nav-link" href="sec2pay_leads.html">
                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                    <img src="./dist/img/icons/conversion-rate.png" width="24" height="24">
                  </span>
                  <span class="nav-link-title">
                    Leads
                  </span>
                </a>
              </li>


              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                  data-bs-auto-close="outside" role="button" aria-expanded="false">
                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <!-- Download SVG icon from http://tabler-icons.io/i/package -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                      stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" />
                      <path d="M12 12l8 -4.5" />
                      <path d="M12 12l0 9" />
                      <path d="M12 12l-8 -4.5" />
                      <path d="M16 5.25l-8 4.5" /></svg>
                  </span>
                  <span class="nav-link-title">
                    Interface
                  </span>
                </a>
                <div class="dropdown-menu">
                  <div class="dropdown-menu-columns">
                    <div class="dropdown-menu-column">
                      <a class="dropdown-item" href="./alerts.html">
                        Alerts
                      </a>
                      <a class="dropdown-item" href="./accordion.html">
                        Accordion
                      </a>
                      <div class="dropend">
                        <a class="dropdown-item dropdown-toggle" href="#sidebar-authentication"
                          data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                          Authentication
                        </a>
                        <div class="dropdown-menu">
                          <a href="./sign-in.html" class="dropdown-item">
                            Sign in
                          </a>
                          <a href="./sign-in-link.html" class="dropdown-item">
                            Sign in link
                          </a>
                          <a href="./sign-in-illustration.html" class="dropdown-item">
                            Sign in with illustration
                          </a>
                          <a href="./sign-in-cover.html" class="dropdown-item">
                            Sign in with cover
                          </a>
                          <a href="./sign-up.html" class="dropdown-item">
                            Sign up
                          </a>
                          <a href="./forgot-password.html" class="dropdown-item">
                            Forgot password
                          </a>
                          <a href="./terms-of-service.html" class="dropdown-item">
                            Terms of service
                          </a>
                          <a href="./auth-lock.html" class="dropdown-item">
                            Lock screen
                          </a>
                          <a href="./2-step-verification.html" class="dropdown-item">
                            2 step verification
                          </a>
                          <a href="./2-step-verification-code.html" class="dropdown-item">
                            2 step verification code
                          </a>
                        </div>
                      </div>
                      <a class="dropdown-item" href="./blank.html">
                        Blank page
                      </a>
                      <a class="dropdown-item" href="./badges.html">
                        Badges
                        <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                      </a>
                      <a class="dropdown-item" href="./buttons.html">
                        Buttons
                      </a>
                      <div class="dropend">
                        <a class="dropdown-item dropdown-toggle" href="#sidebar-cards" data-bs-toggle="dropdown"
                          data-bs-auto-close="outside" role="button" aria-expanded="false">
                          Cards
                          <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                        </a>
                        <div class="dropdown-menu">
                          <a href="./cards.html" class="dropdown-item">
                            Sample cards
                          </a>
                          <a href="./card-actions.html" class="dropdown-item">
                            Card actions
                            <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                          </a>
                          <a href="./cards-masonry.html" class="dropdown-item">
                            Cards Masonry
                          </a>
                        </div>
                      </div>
                      <a class="dropdown-item" href="./carousel.html">
                        Carousel
                        <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                      </a>
                      <a class="dropdown-item" href="./charts.html">
                        Charts
                      </a>
                      <a class="dropdown-item" href="./colors.html">
                        Colors
                      </a>
                      <a class="dropdown-item" href="./colorpicker.html">
                        Color picker
                        <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                      </a>
                      <a class="dropdown-item" href="./datagrid.html">
                        Data grid
                        <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                      </a>
                      <a class="dropdown-item" href="./datatables.html">
                        Datatables
                        <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                      </a>
                      <a class="dropdown-item" href="./dropdowns.html">
                        Dropdowns
                      </a>
                      <a class="dropdown-item" href="./dropzone.html">
                        Dropzone
                        <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                      </a>
                      <div class="dropend">
                        <a class="dropdown-item dropdown-toggle" href="#sidebar-error" data-bs-toggle="dropdown"
                          data-bs-auto-close="outside" role="button" aria-expanded="false">
                          Error pages
                        </a>
                        <div class="dropdown-menu">
                          <a href="./error-404.html" class="dropdown-item">
                            404 page
                          </a>
                          <a href="./error-500.html" class="dropdown-item">
                            500 page
                          </a>
                          <a href="./error-maintenance.html" class="dropdown-item">
                            Maintenance page
                          </a>
                        </div>
                      </div>
                      <a class="dropdown-item" href="./flags.html">
                        Flags
                        <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                      </a>
                      <a class="dropdown-item" href="./inline-player.html">
                        Inline player
                        <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                      </a>
                    </div>
                    <div class="dropdown-menu-column">
                      <a class="dropdown-item" href="./lightbox.html">
                        Lightbox
                        <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                      </a>
                      <a class="dropdown-item" href="./lists.html">
                        Lists
                      </a>
                      <a class="dropdown-item" href="./modals.html">
                        Modal
                      </a>
                      <a class="dropdown-item" href="./maps.html">
                        Map
                      </a>
                      <a class="dropdown-item" href="./map-fullsize.html">
                        Map fullsize
                      </a>
                      <a class="dropdown-item" href="./maps-vector.html">
                        Map vector
                        <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                      </a>
                      <a class="dropdown-item" href="./markdown.html">
                        Markdown
                      </a>
                      <a class="dropdown-item" href="./navigation.html">
                        Navigation
                      </a>
                      <a class="dropdown-item" href="./offcanvas.html">
                        Offcanvas
                      </a>
                      <a class="dropdown-item" href="./pagination.html">
                        <!-- Download SVG icon from http://tabler-icons.io/i/pie-chart -->
                        Pagination
                      </a>
                      <a class="dropdown-item" href="./placeholder.html">
                        Placeholder
                      </a>
                      <a class="dropdown-item" href="./steps.html">
                        Steps
                        <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                      </a>
                      <a class="dropdown-item" href="./stars-rating.html">
                        Stars rating
                        <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                      </a>
                      <a class="dropdown-item" href="./tabs.html">
                        Tabs
                      </a>
                      <a class="dropdown-item" href="./tags.html">
                        Tags
                      </a>
                      <a class="dropdown-item" href="./tables.html">
                        Tables
                      </a>
                      <a class="dropdown-item" href="./typography.html">
                        Typography
                      </a>
                      <a class="dropdown-item" href="./tinymce.html">
                        TinyMCE
                        <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                      </a>
                    </div>
                  </div>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./form-elements.html">
                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                      stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M9 11l3 3l8 -8" />
                      <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" /></svg>
                  </span>
                  <span class="nav-link-title">
                    Form elements
                  </span>
                </a>
              </li>
              <li class="nav-item active dropdown">
                <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown"
                  data-bs-auto-close="outside" role="button" aria-expanded="false">
                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                      stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path
                        d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                      </svg>
                  </span>
                  <span class="nav-link-title">
                    Extra
                  </span>
                </a>
                <div class="dropdown-menu">
                  <div class="dropdown-menu-columns">
                    <div class="dropdown-menu-column">
                      <a class="dropdown-item active" href="./empty.html">
                        Empty page
                      </a>
                      <a class="dropdown-item" href="./cookie-banner.html">
                        Cookie banner
                        <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                      </a>
                      <a class="dropdown-item" href="./chat.html">
                        Chat
                        <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                      </a>
                      <a class="dropdown-item" href="./activity.html">
                        Activity
                      </a>
                      <a class="dropdown-item" href="./gallery.html">
                        Gallery
                      </a>
                      <a class="dropdown-item" href="./invoice.html">
                        Invoice
                      </a>
                      <a class="dropdown-item" href="./search-results.html">
                        Search results
                      </a>
                      <a class="dropdown-item" href="./pricing.html">
                        Pricing cards
                      </a>
                      <a class="dropdown-item" href="./pricing-table.html">
                        Pricing table
                      </a>
                      <a class="dropdown-item" href="./faq.html">
                        FAQ
                        <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                      </a>
                      <a class="dropdown-item" href="./users.html">
                        Users
                      </a>
                      <a class="dropdown-item" href="./license.html">
                        License
                      </a>
                    </div>
                    <div class="dropdown-menu-column">
                      <a class="dropdown-item" href="./logs.html">
                        Logs
                        <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                      </a>
                      <a class="dropdown-item" href="./music.html">
                        Music
                      </a>
                      <a class="dropdown-item" href="./photogrid.html">
                        Photogrid
                        <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                      </a>
                      <a class="dropdown-item" href="./tasks.html">
                        Tasks
                        <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                      </a>
                      <a class="dropdown-item" href="./uptime.html">
                        Uptime monitor
                      </a>
                      <a class="dropdown-item" href="./widgets.html">
                        Widgets
                      </a>
                      <a class="dropdown-item" href="./wizard.html">
                        Wizard
                      </a>
                      <a class="dropdown-item" href="./settings.html">
                        Settings
                        <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                      </a>
                      <a class="dropdown-item" href="./trial-ended.html">
                        Trial ended
                        <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                      </a>
                      <a class="dropdown-item" href="./job-listing.html">
                        Job listing
                        <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                      </a>
                      <a class="dropdown-item" href="./page-loader.html">
                        Page loader
                        <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                      </a>
                    </div>
                  </div>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#navbar-layout" data-bs-toggle="dropdown"
                  data-bs-auto-close="outside" role="button" aria-expanded="false">
                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <!-- Download SVG icon from http://tabler-icons.io/i/layout-2 -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                      stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M4 4m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v1a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                      <path d="M4 13m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                      <path d="M14 4m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                      <path d="M14 15m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v1a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" /></svg>
                  </span>
                  <span class="nav-link-title">
                    Layout
                  </span>
                </a>
                <div class="dropdown-menu">
                  <div class="dropdown-menu-columns">
                    <div class="dropdown-menu-column">
                      <a class="dropdown-item" href="./layout-horizontal.html">
                        Horizontal
                      </a>
                      <a class="dropdown-item" href="./layout-boxed.html">
                        Boxed
                        <span class="badge badge-sm bg-green-lt text-uppercase ms-auto">New</span>
                      </a>
                      <a class="dropdown-item" href="./layout-vertical.html">
                        Vertical
                      </a>
                      <a class="dropdown-item" href="./layout-vertical-transparent.html">
                        Vertical transparent
                      </a>
                      <a class="dropdown-item" href="./layout-vertical-right.html">
                        Right vertical
                      </a>
                      <a class="dropdown-item" href="./layout-condensed.html">
                        Condensed
                      </a>
                      <a class="dropdown-item" href="./layout-combo.html">
                        Combined
                      </a>
                    </div>
                    <div class="dropdown-menu-column">
                      <a class="dropdown-item" href="./layout-navbar-dark.html">
                        Navbar dark
                      </a>
                      <a class="dropdown-item" href="./layout-navbar-sticky.html">
                        Navbar sticky
                      </a>
                      <a class="dropdown-item" href="./layout-navbar-overlap.html">
                        Navbar overlap
                      </a>
                      <a class="dropdown-item" href="./layout-rtl.html">
                        RTL mode
                      </a>
                      <a class="dropdown-item" href="./layout-fluid.html">
                        Fluid
                      </a>
                      <a class="dropdown-item" href="./layout-fluid-vertical.html">
                        Fluid vertical
                      </a>
                    </div>
                  </div>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./icons.html">
                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <!-- Download SVG icon from http://tabler-icons.io/i/ghost -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                      stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path
                        d="M5 11a7 7 0 0 1 14 0v7a1.78 1.78 0 0 1 -3.1 1.4a1.65 1.65 0 0 0 -2.6 0a1.65 1.65 0 0 1 -2.6 0a1.65 1.65 0 0 0 -2.6 0a1.78 1.78 0 0 1 -3.1 -1.4v-7" />
                      <path d="M10 10l.01 0" />
                      <path d="M14 10l.01 0" />
                      <path d="M10 14a3.5 3.5 0 0 0 4 0" /></svg>
                  </span>
                  <span class="nav-link-title">
                    4637 icons
                  </span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./emails.html">
                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <!-- Download SVG icon from http://tabler-icons.io/i/mail-opened -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                      stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M3 9l9 6l9 -6l-9 -6l-9 6" />
                      <path d="M21 9v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10" />
                      <path d="M3 19l6 -6" />
                      <path d="M15 13l6 6" /></svg>
                  </span>
                  <span class="nav-link-title">
                    Email templates
                  </span>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown"
                  data-bs-auto-close="outside" role="button" aria-expanded="false">
                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <!-- Download SVG icon from http://tabler-icons.io/i/lifebuoy -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                      stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                      <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                      <path d="M15 15l3.35 3.35" />
                      <path d="M9 15l-3.35 3.35" />
                      <path d="M5.65 5.65l3.35 3.35" />
                      <path d="M18.35 5.65l-3.35 3.35" /></svg>
                  </span>
                  <span class="nav-link-title">
                    Help
                  </span>
                </a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="https://tabler.io/docs" target="_blank" rel="noopener">
                    Documentation
                  </a>
                  <a class="dropdown-item" href="./changelog.html">
                    Changelog
                  </a>
                  <a class="dropdown-item" href="https://github.com/tabler/tabler" target="_blank" rel="noopener">
                    Source code
                  </a>
                  <a class="dropdown-item text-pink" href="https://github.com/sponsors/codecalm" target="_blank"
                    rel="noopener">
                    <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline me-1" width="24" height="24"
                      viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                      stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>
                    Sponsor project!
                  </a>
                </div>
              </li>
            </ul>
            <div class="my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-first order-md-last">
              <form action="./" method="get" autocomplete="off" novalidate>
                <div class="input-icon">
                  <span class="input-icon-addon">
                    <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                      stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                      <path d="M21 21l-6 -6" /></svg>
                  </span>
                  <input type="text" value="" class="form-control" placeholder="Search…" aria-label="Search in website">
                </div>
              </form>
            </div>
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
            <div class="col-md-4 fixed-height">
              <div class="card shadow fixed-height">
                <!-- Header Section -->
                <div class="card-header d-flex justify-content-between align-items-center bg-white">
                  <h3 class="mb-0">Lead Title</h3>

                  <span class="badge bg-danger text-white">11 Days</span>
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
                  <div>
                      <p class="mb-2"><strong>Lead Name:</strong> <?= htmlspecialchars($lead['LEAD_NAME'] ?? 'N/A') ?></p>
                      <p class="mb-2"><strong>Phone:</strong> <?= htmlspecialchars($lead['LEAD_PHONE'] ?? 'N/A') ?></p>
                      <p class="mb-2"><strong>Source:</strong> <?= htmlspecialchars($lead['LEAD_SOURCE'] ?? 'N/A') ?></p>
                      <p class="mb-2"><strong>Product:</strong> <?= htmlspecialchars($lead['LEAD_PRODUCT'] ?? 'N/A') ?></p>
                      <p class="mb-2"><strong>Remark:</strong> <?= htmlspecialchars($lead['LEAD_REMARK'] ?? 'N/A') ?></p>
                      <p class="mb-2"><strong>Status:</strong> <?= htmlspecialchars($lead['LEAD_STATUS'] ?? 'N/A') ?></p>
                      <p class="mb-2"><strong>Created By:</strong> <?= htmlspecialchars($lead['CREATED_BY'] ?? 'N/A') ?></p>
                      <p class="mb-2"><strong>Updated By:</strong> <?= htmlspecialchars($lead['UPDATED_BY'] ?? 'N/A') ?></p>
                      <p class="mb-2"><strong>Created At:</strong> <?= htmlspecialchars($lead['CREATED_TIMESTAMP'] ?? 'N/A') ?></p>
                      <p class="mb-0"><strong>Updated At:</strong> <?= htmlspecialchars($lead['UPDATED_TIMESTAMP'] ?? 'N/A') ?></p>
                  </div> 

                  <hr>
                </div>
              </div>
            </div>

            <div class="col-md-8 fixed-height">
              <div class="card fixed-height">
                <!-- Lead Follow-Up Process Bar -->
                <div class="progress-bar-container">
                  <!-- <div class="progress-badge active">New</div>
                      <div class="progress-badge active">Follow Up</div>
                      <div class="progress-badge inactive">Prospect</div>
                      <div class="progress-badge inactive">Negotiation</div>
                      <div class="progress-badge inactive">Won/Lost</div> -->

                  <ul class="step-bar md">
                    <li class="complete"><a href="#">New</a></li>
                    <li class="warning"><a href="#">Follow Up</a></li>
                    <li class="danger"><a href="#">Prospect</a></li>
                    <li class="active"><a href="#">Negotiation</a></li>
                    <li class="disabled"><a href="#">Won/Lost</a></li>
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


      $('.lead-name').on('click', function (event) {
        event.stopPropagation();
        const leadId = $(this).data('lead-id'); // Assuming `lead_id` is stored in a data attribute
        
        $.ajax({
            url: 'view_lead.php', // A separate PHP file for fetching details
            type: 'GET',
            data: { lead_id: leadId },
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    console.log(response.data); // Debugging in console
                    $('#leadDetails').html(`
                        <p><strong>Name:</strong> ${response.data.LEAD_NAME}</p>
                        <p><strong>Phone:</strong> ${response.data.LEAD_PHONE}</p>
                        <p><strong>Source:</strong> ${response.data.LEAD_SOURCE}</p>
                        <p><strong>Status:</strong> ${response.data.LEAD_STATUS}</p>
                    `);
                } else {
                    alert('Error fetching lead details');
                }
            },
            error: function () {
                alert('AJAX request failed');
            }
      });
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