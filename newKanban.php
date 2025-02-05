<html xmlns="http://www.w3.org/1999/xhtml" lang="en">

<head>
    <title>kanbanBoard</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="./dist/css/tabler.min.css?1692870487" rel="stylesheet" />
    <link href="./dist/css/tabler-flags.min.css?1692870487" rel="stylesheet" />
    <link href="./dist/css/tabler-payments.min.css?1692870487" rel="stylesheet" />
    <link href="./dist/css/tabler-vendors.min.css?1692870487" rel="stylesheet" />
    <link href="./dist/css/demo.min.css?1692870487" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.15.10/dist/sweetalert2.min.css " rel="stylesheet">
    <script>
        window.jQuery || document.write(decodeURIComponent('%3Cscript src="js/jquery.min.js"%3E%3C/script%3E'))
    </script>
    <link rel="stylesheet" type="text/css" href="./dist/css/dx.material.blue.light.css" />
    <script src="./dist/js/dx.all.js"></script>
    <script src="data.js"></script>
    <link rel="stylesheet" type="text/css" href="kanbanBoard.css" />
</head>
<style>
    ::ng-deep .dx-sortable {
        display: block
    }

    .dx-theme-material-typography h2 {
        font-weight: 700 !important;
        font-size: 16px !important;
        letter-spacing: 0.5px !important;
    }

    .swal2-popup {
        /* width: 250px; */
        padding: 0px;
        font-size: 10px;
    }

    .highlight-target {
        border: 2px dashed #007bff;
        background-color: #f8f9fa;
    }

    .dx-theme-material-typography a {
        color: black;
    }

    .font-size-10 {
        font-size: 10px !important;
    }

    .font-size-12 {
        font-size: 12px !important;
    }

    .font-size-14 {
        font-size: 14px !important;
    }

    .font-size-16 {
        font-size: 16px !important;
    }

    .dropdown-menu {
        font-size: 12px !important;
    }
</style>

<body class="dx-viewport">
    
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
                  <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false" >
                  <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                        <img src="./dist/img/icons/conversion-rate.png" width="24" height="24" > 
                      </span>
                      <span class="nav-link-title">
                        Leads
                  </span>
                  </a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="newKanban.php" target="_blank" rel="noopener">
                      Kanban View
                    </a>
 
                  </div>
                </li>
              </ul>
 
            </div>
          </div>
        </div>
      </header>



    <div class="page-wrapper" style="background-color: #f6f8fb;">
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <div class="page-pretitle">
                            Leads
                        </div>
                        <h4 class="page-title mb-4">
                            Kanban
                        </h4>
                    </div>
                </div>
                <div class="demo-container">
                    <div id="kanban"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal-blur fade" id="leadAssignUserModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <form id="leadAssignUserForm">
                    <div class="modal-body">
                        <div class="modal-title">Lead Assign To Users</div>
                        <div class="form-group mb-2">
                            <select class="selectpicker form-control" data-live-search="true" data-live-search="true"
                                data-actions-box="true" data-size="5" multiple name="user_id[]" id="user_id"
                                placeholder="Select Users">

                            </select>
                        </div>
                        <div class="modal-footer mt-2">
                            <input type="hidden" name="action" id="action" value="leadsmanager.setLeadAssignToUsers">
                            <input type="hidden" name="lead_id" id="lead_id" value="">
                            <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success btn-sm">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
<script src="dist/js/kanban.js"></script>
<script src="./dist/js/tabler.min.js?1692870487" defer></script>
<script src="./dist/js/demo.min.js?1692870487" defer></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.15.10/dist/sweetalert2.all.min.js "></script>
<script>
    $(function () {
        $('[data-bs-toggle="tooltip"]').tooltip();
    });
    $('.selectpicker').selectpicker();
    loadUsers(selectedUserIds = '');

    function loadUsers(selectedUserIds = '') {
        $.ajax({
            type: "POST",
            url: "api.php",
            data: {
                action: "users.getUsers",
            },
            dataType: "json",
            success: function (data) {
                var users = data.users;
                var html = '';
                var selectedIds = selectedUserIds.split(',').map(id => id.trim());
                $.each(users, function (index, user) {
                    var selected = selectedIds.includes(user.ID.toString()) ? 'selected' : '';
                    html += '<option value="' + user.ID + '" ' + selected + '>' + user.ADMIN_NAME +
                        '</option>';
                    console.log('selected===>', selected);
                });
                $('#user_id').html(html).selectpicker('refresh');
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    }
    $("#leadAssignUserForm").submit(function (e) {
        e.preventDefault();
        var form = $(this).serialize();
        console.log('form', form);
        $.ajax({
            type: "POST",
            url: "api.php",
            data: form,
            dataType: "JSON",
            success: function (data) {
                $("#leadAssignUserForm")[0].reset();
                $('#leadAssignUserModal').modal('hide');
                refreshKanbanBoard();
                Swal.fire({
                    title: response.message,
                    icon: "success",
                    draggable: true,
                    // customClass: {
                    //     popup: 'small-swal'
                    // }
                });
            },
            error: function (data) {
                Swal.fire({
                    title: response.message,
                    icon: "error",
                    draggable: true,
                    customClass: {
                        popup: 'small-swal'
                    }
                });
            },
        });

    });

    function refreshKanbanBoard() {
        getLeads(statuses);
    }

    function setBackgroundColor() {
    $('.list-title').each(function () {
        var titleText = $(this).text().trim(); 
        var formattedText = titleText.replace(/_/g, ' '); 
        formattedText = formattedText.toLowerCase().replace(/\b\w/g, function (char) {
            return char.toUpperCase();
        });
        $(this).html(formattedText);
        var colors = {
            "New": "#F1C40F", 
            "Contacted": "#3498DB", 
            "Qualified": "#E67E22", 
            "Opportunity": "#9B59B6", 
            "Demo Scheduled": "#2ECC71", 
            "Demo Done": "#27AE60", 
            "In Negotiation": "#E74C3C", 
            "Converted": "#16A085", 
            "Disqualified": "#E74C3C", 
            "Lost": "#95A5A6", 
            "Live": "#1ABC9C", 
            "Other": "#BDC3C7" 
        };

        if (colors.hasOwnProperty(formattedText)) {
            $(this).css('background-color', colors[formattedText]);
        }
    });
}


  
</script>