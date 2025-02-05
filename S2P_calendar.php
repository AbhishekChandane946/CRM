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
    <title>    Calendar </title>
    <!-- CSS files -->
    <link href="./dist/css/tabler.min.css?1692870487" rel="stylesheet"/>
    <link href="./dist/css/tabler-flags.min.css?1692870487" rel="stylesheet"/>
    <link href="./dist/css/tabler-payments.min.css?1692870487" rel="stylesheet"/>
    <link href="./dist/css/tabler-vendors.min.css?1692870487" rel="stylesheet"/>
    <link href="./dist/css/demo.min.css?1692870487" rel="stylesheet"/>


    <!-- Full Calerndar CSS Link -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css" rel="stylesheet">

    <link rel="stylesheet" href="comman_styles.css"> 


    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
      	font-feature-settings: "cv03", "cv04", "cv11";
      } 
 



       
      .custom-modal-meeting {
        border-radius: 20px;
        width: 400px;
        background: linear-gradient(135deg, #f0f4ff, #e6f7ff);
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
        /* text-align: center; */
        padding: 20px;
      }

       
      .profile-container {
        display: flex;
        /* justify-content: center; */
        /* margin-bottom: 10px; */
      }

      .profile-img {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #fff;
        box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
      }

       
      .meeting-info h5 {
        font-size: 1.2rem;
        color: #1a73e8;
        margin-bottom: 5px;
      }

      .meeting-info p {
        font-size: 0.9rem;
        color: #333;
      }

       
      .join-container {
        display: flex;
        justify-content: center;
        margin-top: 15px;
      }
 

      .custom-modal-lead {
        border-radius: 20px;
        width: 400px;
        background: linear-gradient(135deg, #f0f4ff, #e6f7ff);
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
        /* text-align: center; */
        padding: 20px;
      }

 
    </style>
  </head>
  <body >
    <script src="./dist/js/demo-theme.min.js?1692870487"></script> 

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
      <!-- Calendar View For Lead Records -->
      <!-- Page header -->
      <div class="page-header d-print-none my-4">
        <div class="container-xl">
          <div class="row g-2 align-items-center">
            <div class="col">
              <h2 class="page-title">
                  Calendar For Lead
              </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
              <div class="btn-list">
                  <button class="button"> Filter</button>
                    
              </div>
            </div>
              </div>
            </div>
          </div>
          <div class="container-xl mt-2">
            <div class="row g-2">
                <div class="col-12">
                    <div class="card card-md p-0">
                        <div class="card-body"> 
                    <div id="calendar"> 
                    </div>
                  </div>
                    </div>
                </div>
            </div>
          </div>
 
          <!-- Create Event Modal for Lead -->  
            <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" >
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="eventModalLabel">Create Event</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          <form id="eventForm">
                              <!-- Event Name -->
                              <div class="mb-3">
                                  <label for="eventTitle" class="form-label">Event Name</label>
                                  <input type="text" class="form-control" id="eventTitle" placeholder="New Event Title">
                              </div>
                              <!-- Date -->
                              <div class="mb-3">
                                  <label for="eventDate" class="form-label">Date</label>
                                  <input type="text" class="form-control" id="eventDate" readonly>
                              </div>
                              <!-- Time -->
                              <div class="mb-3 d-flex align-items-center">
                                  <label for="eventTimeStart" class="form-label me-2">Time</label>
                                  <input type="time" class="form-control me-2" id="eventTimeStart">
                                  <span class="me-2">–</span>
                                  <input type="time" class="form-control" id="eventTimeEnd">
                              </div>
                              <!-- Attachment -->
                              <div class="mb-3">  
                                    <label for="eventAttachment" class="form-label">Attachment</label>
                                    <input class="form-control" type="file" id="formFile">  
                              </div>
                              <!-- Guests -->
                              <!-- <div class="mb-3">
                                  <label for="eventGuests" class="form-label">Add Guest</label>
                                  <input type="text" class="form-control" id="eventGuests" placeholder="Add Member">
                              </div> -->
                              <!-- Tags -->
                              <!-- <div class="mb-3">
                                  <label for="eventTags" class="form-label">Tags</label>
                                  <div class="d-flex align-items-center">
                                      <button type="button" class="btn btn-sm p-2 rounded-circle me-2" style="background-color: #ff595e;"></button>
                                      <button type="button" class="btn btn-sm p-2 rounded-circle me-2" style="background-color: #ffca3a;"></button>
                                      <button type="button" class="btn btn-sm p-2 rounded-circle me-2" style="background-color: #8ac926;"></button>
                                      <button type="button" class="btn btn-sm p-2 rounded-circle me-2" style="background-color: #1982c4;"></button>
                                      <button type="button" class="btn btn-sm p-2 rounded-circle" style="background-color: #6a4c93;"></button>
                                  </div>
                              </div> -->
                              <!-- Description -->
                              <div class="mb-3">
                                  <label for="eventDescription" class="form-label">Description</label>
                                  <textarea class="form-control" id="eventDescription" rows="3" placeholder="Add Description"></textarea>
                              </div>
                              <!-- Buttons -->
                              <div class="d-flex justify-content-end">
                                  <button type="button" class="button_delete" data-bs-dismiss="modal">Cancel</button>
                                  <button type="submit" class="button mx-2">Save</button>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
            </div> 
          <!-- Create Event Modal for Lead -->

          <!-- Meeting Modal -->
          <div class="modal fade" id="meetingModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content custom-modal-meeting">
                <div class="modal-header`">
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                  <!-- Profile Picture -->
                  <div class="profile-container">
                    <img src="./dist/img/profiles/ac.jpg" alt="Client" class="profile-img"> 
                  </div>
                  <input type="text" name="" id="meetingId">
                  <!-- Meeting Info -->
                  <div class="meeting-info my-2">
                    <h5 id="meetingTitle">Project Discussion</h5>
                    <p id="meetingDescription">Discuss project updates and next steps.</p>
                  </div>

                  <!-- Join Button -->
                  <div class="join-container my-2">
                    <button class="button p-2" style="border-radius: 25px;">
                      <i class="tabler tabler-video"></i> Join Meeting
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>


      

          <!-- View Lead Details Modal -->
          <div class="modal fade" id="leadModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content custom-modal-lead">
                <div class="modal-header">
                  <h5 class="modal-title">
                    <i class="tabler tabler-user"></i> Lead Details
                  </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                  <input type="text"  id="leadId"> 
                  <div class="lead-info"> 
                    <p><i class="tabler tabler-file-text"></i> <strong>Title:</strong> <span id="leadTitle">Business Opportunity</span></p>
                    <p><i class="tabler tabler-calendar"></i> <strong>Date:</strong> <span id="leadDate">2025-02-10</span></p>
                    <p><i class="tabler tabler-message"></i> <strong>Description:</strong> <span id="leadDescription">Potential client interested in our services.</span></p>
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
 
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

        <!-- FullCalendar -->
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>

        <script> 
         $(document).ready(function () {
          var calendarEl = $('#calendar')[0];

          var calendar = new FullCalendar.Calendar(calendarEl, {
              initialView: 'dayGridMonth', 

              events: [
                        {
                          "id": 1,
                          "title": "Project Discussion",
                          "start": "2025-01-27",
                          "description": "Meeting to discuss project milestones.",
                          "type": "Meeting"
                        },
                        {
                          "id": 2,
                          "title": "Client Call",
                          "start": "2024-02-05",
                          "description": "Follow-up call with the client regarding requirements.",
                          "type": "Meeting"
                        },
                        {
                          "id": 3,
                          "title": "New Lead: John Doe",
                          "start": "2024-02-10",
                          "description": "Potential client interested in software services.",
                          "type": "Lead"
                        },
                        {
                          "id": 4,
                          "title": "Team Sync-up",
                          "start": "2024-02-15",
                          "description": "Weekly meeting with the development team.",
                          "type": "Meeting"
                        },
                        {
                          "id": 5,
                          "title": "Lead: ABC Corp",
                          "start": "2024-02-18",
                          "description": "Company looking for CRM software solutions.",
                          "type": "Lead"
                        },
                        {
                          "id": 6,
                          "title": "Sprint Planning",
                          "start": "2024-02-20",
                          "description": "Discuss upcoming sprint tasks and backlog.",
                          "type": "Meeting"
                        },
                        {
                          "id": 7,
                          "title": "Lead: XYZ Pvt Ltd",
                          "start": "2025-01-28",
                          "description": "Potential customer exploring cloud services.",
                          "type": "Lead"
                        },
                        {
                          "id": 8,
                          "title": "Investor Meeting",
                          "start": "2025-01-20",
                          "description": "Presentation to investors about growth strategy.",
                          "type": "Meeting"
                        },
                        {
                          "id": 9,
                          "title": "Lead: Jane Smith",
                          "start": "2025-01-14",
                          "description": "Lead interested in website development.",
                          "type": "Lead"
                        },
                        {
                          "id": 10,
                          "title": "Annual Review",
                          "start": "2025-01-06",
                          "description": "Year-end performance review meeting.",
                          "type": "Meeting"
                        }
                      ],

              dateClick: function (info) {
                  $('#eventDate').val(info.dateStr);
                  $('#eventModal').modal('show'); // Show event creation modal
              },

              eventClick: function (info) {
                  var eventType = info.event.extendedProps.type; // Fetch event type

                  if (eventType === "Meeting") {
                      $('#meetingId').val(info.event.id);
                      $('#meetingTitle').text(info.event.title);
                      $('#meetingDate').text(info.event.startStr);
                      $('#meetingDescription').text(info.event.extendedProps.description || "No details provided.");
                      $('#meetingModal').modal('show'); // Open Meeting modal
                  } else if (eventType === "Lead") {
                      $('#leadId').val(info.event.id);
                      $('#leadTitle').text(info.event.title);
                      $('#leadDate').text(info.event.startStr);
                      $('#leadDescription').text(info.event.extendedProps.description || "No details provided.");
                      $('#leadModal').modal('show'); // Open View Lead Details modal
                  }
              },
              

              eventContent: function(arg) {
                  let eventTitle = arg.event.title;
                  let eventType = arg.event.extendedProps.type;
                  let bgColor = eventType === 'Meeting' ? '#8c31b9' : '#14b1ff';  
                
                  return {
                      html: `
                          <div style="background: ${bgColor};  text-align: center; font-size: 14px; font-weight: bold; color: white;">
                              ${eventTitle}
                          </div>
                      `
                  };
             }
          
            });

          calendar.render(); 

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