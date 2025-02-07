 <?php include 'header.php';?>



      <style>
        .card-header-tabs {
          margin: 0% !important;
        }
      
        /* .swal2-popup {
           width: 250px; 
          padding: 0px;
          font-size: 10px;
        } */
      
        #createNoteSvg {
          position: fixed;
          z-index: 1050;
          background: white;
          border-radius: 50%;
        }
      
        .small-note-modal {
          position: fixed;
          right: 125px;
          top: 200px;
          background: white;
          /* padding: 15px; */
          border-radius: 10px;
          box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
          width: 250px;
        }
      
      </style>
      
      <div class="page-wrapper">
        <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
              <div class="d-flex justify-content-between"> 
                  <h4 class="page-title mb-4">
                          Leads
                  </h4> 
                  <button class="button p-0">
                      <a style="text-decoration: none;" class="text-light" href="newKanban.php">Kanban View</a>
                  </button>
              </div>
              </div>
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Leads List</h3>
                  </div>
                  <div class="card-body border-bottom py-3">
                    <!-- Edited : Abhishek Chandane -->
                    <div class="table-responsive" style="overflow-x: auto; max-width: 100%;">
                      <table class="table card-table table-vcenter text-nowrap datatable">
                        <thead>
                          <tr>
                            <th class="w-1 sticky-col">View Lead</th>
                            <th class="w-1 sticky-col">Sr.No</th>
                            <th class="w-1 sticky-col">LAST MODIFIED</th>
                            <th class="w-1 sticky-col">CREATED AT</th>
                            <th>LEAD NAME</th>
                            <th>LEAD OWNER</th>
                            <th>QUICK ACTION</th>
                            <th>SALES PERSON</th>
                            <th>EMPLOYEE ID</th>
                            <th>SUBJECT</th>
                            <th>LEAD SOURCE</th>
                            <th>LEAD VALUE</th>
                            <th>LEAD TYPE</th>
                            <th>CONTACT PERSON</th>
                            <th>STAGE</th>
                            <th>ACTIONS</th>
                          </tr>
                        </thead>
                        <tbody id="leadTableBody">
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal modal-blur fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalTitle">Lead Details</h5>
              <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="card" style="height:450px;">
                <div class="card-header">
                  <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                      <a href="#tabs-home-8" class="nav-link active" data-bs-toggle="tab" aria-selected="true" role="tab">Lead
                        Data</a>
                    </li>
                    <li class="nav-item" role="presentation">
                      <a href="#tabs-profile-8" class="nav-link" data-bs-toggle="tab" aria-selected="false" tabindex="-1"
                        role="tab">Lead Follow up</a>
                    </li>
                    <li class="nav-item" role="presentation">
                      <a href="#tabs-lead-status-8" class="nav-link" data-bs-toggle="tab" aria-selected="false" tabindex="-1"
                        role="tab">Lead Status</a>
                    </li>
                    <li class="nav-item" role="presentation">
                      <a href="#tabs-activity-8" class="nav-link" data-bs-toggle="tab" aria-selected="false" tabindex="-1"
                        role="tab">Notes</a>
                    </li>
                    <li class="nav-item ms-auto" role="presentation">
                      <a href="#tabs-assign-users-8" class="nav-link" title="Settings" data-bs-toggle="tab"
                        aria-selected="false" tabindex="-1" role="tab"><i class="fa fa-user-plus" title="Assign User"></i>
                      </a>
                    </li>
                  </ul>
                </div>
                <div class="card-body content-scrollable" style="overflow-y: auto;">
                  <div class="tab-content ">
                    <div class="tab-pane active show" id="tabs-home-8" role="tabpanel">
                      <div class="row">
                        <div id="leadDetailsList"></div>
                      </div>
                    </div>
                    <div class="tab-pane" id="tabs-profile-8" role="tabpanel">
                      <div class="d-flex align-items-start">
                        <div class="nav flex-column nav-pills me-3 shadow-sm  rounded " id="followUpNav" role="tablist"
                          aria-orientation="vertical"></div>
                        <div class="tab-content w-100" id="followUpTabContent"></div>
                      </div>
                    </div>
                    <div class="tab-pane" id="tabs-lead-status-8" role="tabpanel">
                      <div class="d-flex align-items-start">
                        <form id="lead_status_form">
                          <select name="lead_status" id="lead_status" class="form-control ">
                          </select>
                          <div id="datepicker-container" style="display:none;">
                            <input type="date" name="demo_scheduled_date" id="demo_scheduled_date" class="form-cotrol">
                          </div>
                          <input type="submit" class="btn btn-success btn-sm" name="submit" id="submit" value="Submit">
                        </form>
                      </div>
                    </div>
                    <div class="tab-pane" id="tabs-activity-8" role="tabpanel">
                      <div class="d-flex justify-content-end mb-3 position-relative">
                        <svg title="add note" id="createNoteSvg" xmlns="http://www.w3.org/2000/svg"
                          class="mail-icon text-dark" width="25" height="25" viewBox="0 0 24 24" fill="none"
                          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                          style="cursor: pointer;">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                          <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                          <path d="M13.5 6.5l4 4" />
                        </svg>
                        <div id="smallNoteModal" class="small-note-modal d-none">
                          <div class="modal-content p-3">
                            <form id="smallNoteForm">
                              <div class="mb-2">
                                <label for="noteInput" class="form-label">Create Note</label>
                                <textarea class="form-control" id="noteInput" placeholder="Enter note" rows="3"
                                  required></textarea>
                              </div>
                              <div class="d-flex" style="justify-content:end">
                                <button type="submit" class="btn btn-6 btn-outline-success"><i
                                    class="fa-brands fa-telegram"></i></button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                      <div class="note-list"></div>
                    </div>
                    <div class="tab-pane" id="tabs-assign-users-8" role="tabpanel">
                      <form id="leadAssignUserForm">
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group mb-2">
                              <select class="selectpicker form-control" data-live-search="true" data-actions-box="true"
                                data-size="5" multiple name="user_id[]" id="user_id" placeholder="Select Users">
                              </select>
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <input type="hidden" name="action" id="action" value="leadsmanager.setLeadAssignToUsers">
                            <input type="submit" class="btn btn-success btn-sm " name="submit" id="submit" value="Submit">
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="leadId" id="leadId" />
              <!-- <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button> -->
              <button type="button" class="btn btn-danger " data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>




              <!-- Call Now Modal --> 
              <div class="modal fade" id="callNowModal" tabindex="-1" aria-labelledby="callNowModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center p-4 call-now-modal">
              <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
              <div class="modal-body">
                <div class="call-icon mb-3">
                  <i class="fas fa-phone-alt"></i>
                  <p><strong>Lead ID:</strong> <span id="callNowLeadId"></span></p>
                </div>
                <h5 class="modal-title mb-2">9960929067</h5>
                <p><strong>Lead ID:</strong> <span id="callNowLeadId"></span></p>
                <p class="modal-description mb-4">We’re here to help you with your experience.</p>
                <button type="button" class="btn quick-action-btn">CALL NOW</button>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="sendSmsModal" tabindex="-1" aria-labelledby="sendSmsModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center p-4 call-now-modal">
              <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
              <div class="modal-body">
                <div class="call-icon mb-3">
                  <i class="fas fa-sms"></i>
                  <p><strong>Lead ID:</strong> <span id="sendSmsLeadId"></span></p>
                </div>
                <div class="mb-3">
                  <label>Select Template</label>
                  <div class="form-selectgroup form-selectgroup-boxes d-flex flex-column">
                    <label class="form-selectgroup-item flex-fill">
                      <input type="radio" name="form-payment" value="visa" class="form-selectgroup-input">
                      <div class="form-selectgroup-label d-flex align-items-center p-3">
                        <div class="me-3">
                          <span class="form-selectgroup-check"></span>
                        </div>
                        <div>
                            <strong>
                              "Thank you for reaching out! We've received your inquiry and 
                              will be contacting you shortly to discuss your needs."
                            </strong>
                        </div>
                      </div>
                    </label>
                    <label class="form-selectgroup-item flex-fill">
                      <input type="radio" name="form-payment" value="visa" class="form-selectgroup-input">
                      <div class="form-selectgroup-label d-flex align-items-center p-3">
                        <div class="me-3">
                          <span class="form-selectgroup-check"></span>
                        </div>
                        <div>
                            <strong>
                              "Thank you for reaching out! We've received your inquiry and 
                              will be contacting you shortly to discuss your needs."
                            </strong>
                        </div>
                      </div>
                    </label>
                    <label class="form-selectgroup-item flex-fill">
                      <input type="radio" name="form-payment" value="visa" class="form-selectgroup-input">
                      <div class="form-selectgroup-label d-flex align-items-center p-3">
                        <div class="me-3">
                          <span class="form-selectgroup-check"></span>
                        </div>
                        <div>
                            <strong>
                              "Thank you for reaching out! We've received your inquiry and 
                              will be contacting you shortly to discuss your needs."
                            </strong>
                        </div>
                      </div>
                    </label>
                  </div>
                </div>
                <p class="modal-description mb-4"> SMS Will Send To : +91 123456789</p>
                <button type="button" class="btn quick-action-btn">Send</button>
              </div>
            </div>
          </div>
        </div> 
        <!-- Send SMS Modal -->

        <!-- Meeting Modal --> 
        <div class="modal fade" id="meetingModal" tabindex="-1" aria-labelledby="meetingModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center p-4 call-now-modal">
              <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
              <div class="modal-body">
                <div class="call-icon mb-3">
                  <i class="fas fa-calendar"></i>
                  <p><strong>Lead ID:</strong> <span id="meetingLeadId"></span></p>
                </div>
                <h6 class="modal-title mb-2">Meeting With  : <span>Abhishek Chandane</span> </h6>
                <h6 class="modal-title mb-2">Meeting Date : <span> 17-01-2025 </span></h6>
                <h6 class="modal-title mb-2">Meeting Time : 05:33:43 PM</h6>
                <h6 class="modal-title mb-2">Meeting Type : Interview, Discussion, Presentation</h6>
                <p class="modal-description mb-4">We’re here to help you with your experience.</p>
                <button type="button" class="btn quick-action-btn">Meeting</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Meeting Modal -->

        <!-- Edit Modal -->
        <div class="modal modal-blur fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Lead Details</h5>
                <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="card">
                  <!-- Sticky Tab Header -->
                  <div class="card-header sticky-header">
                    <ul class="nav nav-tabs" id="myTabs" role="tablist">
                      <li class="nav-item">
                        <button href="#tabs-home-8" class="nav-link active" data-bs-toggle="tab">Lead Data</button>
                      </li>
                      <li class="nav-item">
                        <button href="#tabs-profile-8" class="nav-link" data-bs-toggle="tab">Lead Follow up</button>
                      </li>
                      <li class="nav-item">
                        <button href="#tabs-activity-8" class="nav-link" data-bs-toggle="tab">Notes</button>
                      </li>
                    </ul>
                  </div>
                  
                  <!-- Scrollable Tab Content -->
                  <div class="card-body content-scrollable" >
                    <div class="tab-content">
                      <div class="tab-pane fade show active" id="tabs-home-8">
                        <h4>Lead Info</h4>
                        <div class="row">
                          <div id="leadDetailsList"></div>
                        </div>
                      </div>

                      <style>
                        .custom-tab-container {
                          width: 250px;
                          border-radius: 15px;
                          background: linear-gradient(135deg, #eef1f6, #ffffff);
                      
                          box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                      }

                      .custom-tab-list .nav-link {
                          font-size: 16px;
                          color: #333;
                          text-align: left;
                          border-radius: 10px;
                          padding: 10px 15px;
                          display: flex;
                          align-items: center;
                          justify-content: space-between;
                          transition: 0.3s;
                      }

                      .custom-tab-list .nav-link.active {
                          background: #574bff;
                          color: #fff;
                          font-weight: 500;
                      }

                      .custom-tab-list .nav-link:hover {
                          background: rgba(87, 75, 255, 0.1);
                      }

                      .custom-tab-list .badge {
                          background: #ff3b30;
                          color: white;
                          font-size: 12px;
                          padding: 4px 8px;
                          border-radius: 20px;
                          font-weight: bold;
                      }

                      </style>
                      
                      <div class="d-flex align-items-start " >
                          <div class="custom-tab-container" style="margin-right: 12px;">
                            <div class="p-3 nav flex-column nav-pills me-3 custom-tab-list" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <button class="nav-link active" id="v-pills-follow1-tab" data-bs-toggle="pill" data-bs-target="#v-pills-follow1" type="button" role="tab" aria-controls="v-pills-follow1" aria-selected="true">
                                    Follow Up 1 
                                </button>
                                <button class="nav-link" id="v-pills-follow2-tab" data-bs-toggle="pill" data-bs-target="#v-pills-follow2" type="button" role="tab" aria-controls="v-pills-follow2" aria-selected="false">
                                    Follow Up 2
                                </button>
                                <button class="nav-link" id="v-pills-follow3-tab" data-bs-toggle="pill" data-bs-target="#v-pills-follow3" type="button" role="tab" aria-controls="v-pills-follow3" aria-selected="false">
                                    Follow Up 3
                                </button>
                                <button class="nav-link" id="v-pills-follow4-tab" data-bs-toggle="pill" data-bs-target="#v-pills-follow4" type="button" role="tab" aria-controls="v-pills-follow4" aria-selected="false">
                                    Follow Up 4
                                </button>
                                <button class="nav-link" id="v-pills-follow5-tab" data-bs-toggle="pill" data-bs-target="#v-pills-follow5" type="button" role="tab" aria-controls="v-pills-follow5" aria-selected="false">
                                    Follow Up 5
                                </button>
                            </div>
                          </div>
                    
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-follow1" role="tabpanel" aria-labelledby="v-pills-follow1-tab"></div>
                            <div class="tab-pane fade" id="v-pills-follow2" role="tabpanel" aria-labelledby="v-pills-follow2-tab"></div>
                            <div class="tab-pane fade" id="v-pills-follow3" role="tabpanel" aria-labelledby="v-pills-follow3-tab"></div>
                            <div class="tab-pane fade" id="v-pills-follow4" role="tabpanel" aria-labelledby="v-pills-follow4-tab"></div>
                            <div class="tab-pane fade" id="v-pills-follow5" role="tabpanel" aria-labelledby="v-pills-follow5-tab"></div>
                        </div>
                    </div>
                    

                      <div class="tab-pane fade" id="tabs-activity-8">
                        <div class="mb-3">
                          <div class="form-group mb-2">
                            <select class="selectpicker form-control" data-live-search="true" data-live-search="true"
                                data-actions-box="true" data-size="5" multiple name="user_id[]" id="user_id"
                                placeholder="Select Users">

                            </select>
                        </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal-footer">
                <input type="hidden" name="leadId" id="leadId" />
                <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Update Lead</button>
              </div>
            </div>
          </div>
        </div>

       <!-- Edited : Abhishek Chandane --> 








    

     <footer class="footer footer-transparent d-print-none">
          <div class="container-xl">
            <div class="row text-center align-items-center flex-row-reverse">
              <div class="col-lg-auto ms-lg-auto">
                <ul class="list-inline list-inline-dots mb-0">
                  <li class="list-inline-item"><a href="https://tabler.io/docs" target="_blank" class="link-secondary" rel="noopener">Documentation</a></li>
                  <li class="list-inline-item"><a href="./license.html" class="link-secondary">License</a></li>
                  <li class="list-inline-item"><a href="https://github.com/tabler/tabler" target="_blank" class="link-secondary" rel="noopener">Source code</a></li>
                  <li class="list-inline-item">
                    <a href="https://github.com/sponsors/codecalm" target="_blank" class="link-secondary" rel="noopener">
                      <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon text-pink icon-filled icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>
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


  </body>
</html>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="./dist/js/tabler.min.js?1692870487" ></script>
<script src="./dist/js/demo.min.js?1692870487"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
  $(document).ready(function () {
    $('.selectpicker').selectpicker();
    $(".nav-link").on("click", function () {
      let tab = $(this).attr("href");
      if (tab == "#tabs-profile-8") {
        renderFollowUpData();
      }
      if (tab == "#tabs-activity-8") {
        const lead_id = $('#leadId').val();
        getLeadNotes(lead_id);
      }
      if (tab == "#tabs-assign-users-8") {
        const lead_id = $('#leadId').val();
        loadUsers(lead_id);
      }
      if (tab == "#tabs-lead-status-8") {
        const lead_id = $('#leadId').val();
        getLeadStatus(lead_id);
      }
    });



function renderFollowUpData() {
    const lead_id = $('#leadId').val();
    const navContainer = document.getElementById("followUpNav");
    const tabContentContainer = document.getElementById("followUpTabContent");
    
    $.ajax({
        url: "api.php",
        type: "POST",
        dataType: "json",
        data: { action: "leadsmanager.getLeadsDetails", lead_id: lead_id },
        success: function (response) {
            console.log('Full API Response:', response);
            const followUpData = response.leadsDetail[0];
            
            const columns = [
                { date: "FIRST_FOLLOWUP_DATE", remark: "FIRST_FOLLOWUP_REMARK", title: "Follow Up 1" },
                { date: "SECOND_FOLLOWUP_DATE", remark: "SECOND_FOLLOWUP_REMARK", title: "Follow Up 2" },
                { date: "THREE_FOLLOWUP_DATE", remark: "THREE_FOLLOWUP_REMARK", title: "Follow Up 3" },
                { date: "FOUR_FOLLOWUP_DATE", remark: "FOUR_FOLLOWUP_REMARK", title: "Follow Up 4" },
                { date: "FIVE_FOLLOWUP_DATE", remark: "FIVE_FOLLOWUP_REMARK", title: "Follow Up 5" }
            ];
            
            navContainer.innerHTML = "";
            tabContentContainer.innerHTML = "";
            
            columns.forEach((column, i) => {
                const followUpDate = followUpData[column.date];
                const followUpRemark = followUpData[column.remark];
                let isReadonly = followUpDate && followUpRemark;
                
                const tabButton = document.createElement("button");
                tabButton.className = `nav-link ${i === 0 ? 'active' : ''}`;
                tabButton.id = `followUpTab${i + 1}`;
                tabButton.setAttribute("data-bs-toggle", "pill");
                tabButton.setAttribute("data-bs-target", `#followUpContent${i + 1}`);
                tabButton.setAttribute("type", "button");
                tabButton.setAttribute("role", "tab");
                tabButton.setAttribute("aria-controls", `followUpContent${i + 1}`);
                tabButton.setAttribute("aria-selected", i === 0 ? "true" : "false");
                tabButton.classList.add("btn", "btn-outline-primary", "w-100", "mb-2");
                tabButton.innerText = column.title;
                
                navContainer.appendChild(tabButton);
                
                const tabPane = document.createElement("div");
                tabPane.className = `tab-pane fade ${i === 0 ? 'show active' : ''}`;
                tabPane.id = `followUpContent${i + 1}`;
                tabPane.setAttribute("role", "tabpanel");
                tabPane.setAttribute("aria-labelledby", `followUpTab${i + 1}`);
                tabPane.innerHTML = `
                    <div class="card">
                        <div class="card-header bg-primary text-white">${column.title}</div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <input type="date" id="date${i + 1}" class="form-control" value="${followUpDate || ''}" ${isReadonly ? 'readonly' : ''}>
                                </div>
                                <div class="col-md-4">
                                    <textarea id="notes${i + 1}" class="form-control" placeholder="Type something…" rows="2" ${isReadonly ? 'readonly' : ''}>${followUpRemark || ''}</textarea>
                                </div>
                                <div class="col-md-4 d-flex justify-content-center">
                                    <button class="btn btn-success w-100 submitFollowUp" id="submitBtn${i + 1}" data-index="${i + 1}" ${isReadonly ? 'style="display: none;"' : ''}>Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                
                tabContentContainer.appendChild(tabPane);
            });
        },
        error: function () {
            Swal.fire({ icon: "error", title: "Oops", text: "Failed to retrieve follow-up data. Please try again." });
        }
    });
}



    fetchLeads();
    document.addEventListener('DOMContentLoaded', function () {
      const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
      tooltipTriggerList.forEach(function (tooltipTriggerEl) {
        new bootstrap.Tooltip(tooltipTriggerEl);
      });
    });
    $('.datatable').DataTable({
      scrollX: true,
      paging: true,
      searching: true,
      ordering: true,
      lengthChange: true,
      pageLength: 10,
      language: {
        search: "_INPUT_",
        searchPlaceholder: "Search leads...",
      },
      columnDefs: [{
        orderable: false,
        targets: [0, 6, 15]
      }, ],
    });
    $('.callNowModal').on('click', function () {
      var leadId = $(this).data('lead-id');
      console.log('Call Now clicked for Lead ID:', leadId);
      $('#callNowModal #callNowLeadId').text(leadId);
    });
    $('.sendSmsModal').on('click', function () {
      var leadId = $(this).data('lead-id');
      console.log('Send SMS clicked for Lead ID:', leadId);
      $('#sendSmsModal #sendSmsLeadId').text(leadId);
    });
    $('.meetingModal').on('click', function () {
      var leadId = $(this).data('lead-id');
      console.log('Meeting clicked for Lead ID:', leadId);
      $('#meetingModal #meetingLeadId').text(leadId);
    });
    $('.deleteLead').on('click', function (e) {
      e.preventDefault();
      var leadId = $(this).data('lead-id');
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire({
            title: "Deleted!",
            text: "Your file has been deleted.",
            icon: "success"
          });
        }
      });
    });

    function fetchLeads() {
      $.ajax({
        url: "api.php",
        type: "POST",
        dataType: "json",
        data: {
          action: 'leadsmanager.getLeadsRocords'
        },
        success: function (response) {
          if (response.status === "success" && Array.isArray(response.data)) {
            let rows = "";
            response.data.forEach((lead, index) => {
              rows += `
                              <tr>
                                  <td class="text-center">
                                      <a href="S2P_view_lead.php?lead_id=${lead.ID}" data-bs-toggle="tooltip"  class="text-primary" title="View Lead">
                                      <svg   xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"   fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class=" icon icon-tabler icons-tabler-outline icon-tabler-eye"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                                      </a>
                                  </td>
                                  <td><span class="text-secondary">${index + 1}</span></td>
                                  <td><span>${lead.CREATED_AT}</span></td>
                                  <td><span>${lead.CREATED_AT}</span></td> <!-- Adjust this as necessary -->
                                  <td data-bs-toggle="tooltip" data-bs-html="true" title="
                                      <b>Lead Name:</b> ${lead.PRIMARY_NAME}<br>
                                      <b>Contact:</b> ${lead.PRIMARY_PHONE}<br>
                                      <b>Owner:</b> ${lead.ORG_OWNER_ID}<br>
                                      <b>Source:</b> ${lead.SOURCE}<br>
                                      <b>Value:</b> ₹${lead.SCORE}">
                                      ${lead.PRIMARY_NAME}
                                  </td>
                                  <td>${lead.ORG_OWNER_ID}</td>
                                  <td>
                                      <div class="dropdown">
                                          <button class="btn quick-action-btn dropdown-toggle text-light" type="button" data-bs-toggle="dropdown">
                                             <svg   xmlns="http://www.w3.org/2000/svg"  width="15"  height="15"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-bolt"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M13 2l.018 .001l.016 .001l.083 .005l.011 .002h.011l.038 .009l.052 .008l.016 .006l.011 .001l.029 .011l.052 .014l.019 .009l.015 .004l.028 .014l.04 .017l.021 .012l.022 .01l.023 .015l.031 .017l.034 .024l.018 .011l.013 .012l.024 .017l.038 .034l.022 .017l.008 .01l.014 .012l.036 .041l.026 .027l.006 .009c.12 .147 .196 .322 .218 .513l.001 .012l.002 .041l.004 .064v6h5a1 1 0 0 1 .868 1.497l-.06 .091l-8 11c-.568 .783 -1.808 .38 -1.808 -.588v-6h-5a1 1 0 0 1 -.868 -1.497l.06 -.091l8 -11l.01 -.013l.018 -.024l.033 -.038l.018 -.022l.009 -.008l.013 -.014l.04 -.036l.028 -.026l.008 -.006a1 1 0 0 1 .402 -.199l.011 -.001l.027 -.005l.074 -.013l.011 -.001l.041 -.002z" /></svg>
                                          </button>
                                          <ul class="dropdown-menu quick-action-dropdown">
                                            <li>
                                              <a class="dropdown-item callNowModal" href="#callNowModal" data-bs-toggle="modal" data-lead-id="${lead.ID}">
                                                <svg   xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="  icon icon-tabler icons-tabler-filled icon-tabler-phone"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 3a1 1 0 0 1 .877 .519l.051 .11l2 5a1 1 0 0 1 -.313 1.16l-.1 .068l-1.674 1.004l.063 .103a10 10 0 0 0 3.132 3.132l.102 .062l1.005 -1.672a1 1 0 0 1 1.113 -.453l.115 .039l5 2a1 1 0 0 1 .622 .807l.007 .121v4c0 1.657 -1.343 3 -3.06 2.998c-8.579 -.521 -15.418 -7.36 -15.94 -15.998a3 3 0 0 1 2.824 -2.995l.176 -.005h4z" /></svg> Call Now
                                              </a>
                                            </li>
                                            <li>
                                              <a class="dropdown-item sendSmsModal" href="#sendSmsModal" data-bs-toggle="modal" data-lead-id="${lead.ID}">
                                               <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-message"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 3a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-4.724l-4.762 2.857a1 1 0 0 1 -1.508 -.743l-.006 -.114v-2h-1a4 4 0 0 1 -3.995 -3.8l-.005 -.2v-8a4 4 0 0 1 4 -4zm-4 9h-6a1 1 0 0 0 0 2h6a1 1 0 0 0 0 -2m2 -4h-8a1 1 0 1 0 0 2h8a1 1 0 0 0 0 -2" /></svg> Send SMS
                                              </a>
                                            </li>
                                            <li>
                                              <a class="dropdown-item meetingModal" href="#meetingModal" data-bs-toggle="modal" data-lead-id="${lead.ID}">
                                                <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-time"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M11.795 21h-6.795a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v4" /><path d="M18 18m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M15 3v4" /><path d="M7 3v4" /><path d="M3 11h16" /><path d="M18 16.496v1.504l1 1" /></svg> Meeting
                                              </a>
                                            </li>

                                              <li>
                                              
                                              <a class="dropdown-item editmodal"data-lead-id="${lead.ID}">
                                              
                                              <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg> Edit</a></li>
                                            <li>
                                              <a class="dropdown-item deleteLead" href="#" data-lead-id="${lead.ID}">
                                               <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M20 6a1 1 0 0 1 .117 1.993l-.117 .007h-.081l-.919 11a3 3 0 0 1 -2.824 2.995l-.176 .005h-8c-1.598 0 -2.904 -1.249 -2.992 -2.75l-.005 -.167l-.923 -11.083h-.08a1 1 0 0 1 -.117 -1.993l.117 -.007h16z" /><path d="M14 2a2 2 0 0 1 2 2a1 1 0 0 1 -1.993 .117l-.007 -.117h-4l-.007 .117a1 1 0 0 1 -1.993 -.117a2 2 0 0 1 1.85 -1.995l.15 -.005h4z" /></svg> Delete
                                              </a>
                                            </li>
                                          </ul>
                                      </div>
                                  </td>
                                  <td><a href="invoice.html?id=${lead.SOURCE}" class="text-reset">${lead.SOURCE}</a></td>
                                  <td>${lead.ORG_OWNER_ID}</td>
                                  <td>${lead.PRODUCT}</td>
                                  <td><i class="fas fa-envelope"></i> ${lead.SOURCE}</td>
                                  <td>₹${lead.SCORE}</td>
                                  <td>${lead.STATUS}</td>
                                  <td>${lead.PRIMARY_PHONE}</td>
                                  <td>${lead.STATUS}</td>
                                  <td class="text-end">
                                      <span class="dropdown">
                                          <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">Actions</button>
                                          <div class="dropdown-menu dropdown-menu-end">
                                              <a class="dropdown-item" href="#">Action</a>
                                              <a class="dropdown-item" href="#">Another action</a>
                                          </div>
                                      </span>
                                  </td>
                              </tr>
                          `;
            });
            $("#leadTableBody").html(rows);
            $('[data-bs-toggle="tooltip"]').tooltip();
          } else {
            Swal.fire({
                    icon: "error",
                    title: "Oops",
                    text: "No leads found or error in API response.",
                });
          }
        },
        error: function () {
          Swal.fire({
                    icon: "error",
                    title: "Oops",
                    text: "Error fetching data.",
                });
        }
      });
    }

    $(document).on("submit", "#lead_status_form", function (e) {
      e.preventDefault();
      var lead_status = $('#lead_status').val();
      var leadId = $('#leadId').val();
      if (lead_status === "DEMO SCHEDULED") {
        Swal.fire({
          title: "Select a Date",
          input: "date",
          showCancelButton: true,
          confirmButtonText: "Submit",
          allowOutsideClick: false,
          preConfirm: (date) => {
            if (!date) {
              Swal.showValidationMessage("⚠ Please select a date!");
            }
            return date;
          }
        }).then((result) => {
          if (result.isConfirmed && result.value) {
            $.ajax({
              url: "api.php",
              type: "POST",
              data: {
                lead_id: leadId,
                new_lead_status: lead_status,
                schedule_date: result.value,
                action: "leadsmanager.leadStatusUpdate",
              },
              dataType: "json",
              beforeSend: function () {
                Swal.fire({
                  title: "Processing...",
                  text: "Please wait...",
                  allowOutsideClick: false,
                  didOpen: () => {
                    Swal.showLoading();
                  }
                });
              },
              success: function (response) {
                console.log("Success Response:1", response);
                if (response.status == "success") {
                  Swal.fire({
                    icon: "success",
                    title: "Success",
                    text: response.message
                  });
                } else {
                  Swal.fire({
                    icon: "error",
                    title: "error",
                    text: response.message
                  });
                }
              },
              error: function (xhr, status, error) {
                Swal.fire({
                  icon: "error",
                  title: "Error",
                  text: "Failed to save date!"
                });
              }
            });
          } else {
            $("#lead_status").val("");
          }
        });
      } else {
        $.ajax({
          url: "api.php",
          type: "POST",
          data: {
            lead_id: leadId,
            new_lead_status: lead_status,
            action: "leadsmanager.leadStatusUpdate",
          },
          dataType: "json",
          beforeSend: function () {
            Swal.fire({
              title: "Processing...",
              text: "Please wait...",
              allowOutsideClick: false,
              didOpen: () => {
                Swal.showLoading();
              }
            });
          },
          success: function (response) {
            if (response.status == "success") {
              Swal.fire({
                icon: "success",
                title: "Success",
                text: response.message
              });
            } else {
              Swal.fire({
                icon: "error",
                title: "error",
                text: response.message
              });
            }
          },
          error: function (xhr, status, error) {
            Swal.fire({
              icon: "error",
              title: "Error",
              text: "Failed to update status!"
            });
          }
        });
      }
    });
    $(document).on("submit", "#smallNoteForm", function (e) {
      e.preventDefault();
      let noteInput = $('#noteInput').val();
      let leadId = $('#leadId').val();
      let regex = /^[a-zA-Z0-9 ]+$/;
      let formData = {
        leadId: leadId,
        noteInput: noteInput,
        action: "leadsmanager.setLeadNote",
      };
      $.ajax({
        url: "api.php",
        type: "POST",
        data: formData,
        dataType: "json",
        success: function (response) {
          if (response && response.status == 'success') {
            $('#noteInput').val('')
            getLeadNotes(leadId);
            Swal.fire({
              title: "Success",
              text: response.message,
              icon: "success",
              draggable: true,
            }).then(() => {
              $("#smallNoteModal").addClass("d-none"); // Close modal after success
            });
          } else {
            Swal.fire({
              icon: "error",
              title: "success",
              text: response.message,
              draggable: true
            });
          }
        },
        error: function (xhr, status, error) {
          Swal.fire({
              icon: "error",
              title: "Oops",
              text: "Failed to submit a form. Please try again.",
              draggable: true
            });
        }
      });
    })
    $(document).on("click", ".submitFollowUp", function () {
      let index = $(this).data("index");
      let dateInput = $(`#date${index}`).val();
      let notesInput = $(`#notes${index}`).val();
      let leadId = $('#leadId').val();
      const totalFollowUps = 5;
      console.log('index--->' + index, 'date-->' + dateInput, 'notesInput-->' + notesInput);
      if (!dateInput || !notesInput) {
        Swal.fire({
              icon: "error",
              title: "Oops",
              text: "Please fill all fields before submitting.",
              draggable: true
            });
        return;
      }
      let formData = {
        leadId: leadId,
        follow_up_index: index,
        follow_up_date: dateInput,
        follow_up_notes: notesInput,
        action: "leadsmanager.setLeadFolloUp",
      };
      $.ajax({
        url: "api.php",
        type: "POST",
        data: formData,
        dataType: "json",
        success: function (response) {
          if (response && response.status === 'success') {
            Swal.fire({
              title:"success",
              text: `Follow Up ${index} Submitted Successfully!`,
              icon: "success",
              draggable: true,
            });
            $(`#submitBtn${index}`).hide();
            renderFollowUpData();
            if (index < totalFollowUps) {
              $(`#followUp${index + 1}`).show();
            }
            $(`#date${index}`).prop("readonly", true);
            $(`#notes${index}`).prop("readonly", true);
            $(`#followUp${index}`).addClass("readonly");
          } else {
            Swal.fire({
              icon: "error",
              title: "Oops",
              text: response.message,
              draggable: true,
            });
          }
        },
        error: function (xhr, status, error) {
          console.error("AJAX Error: ", error);
          Swal.fire({
              icon: "error",
              title: "Oops",
              text: "Failed to submit follow-up. Please try again.",
              draggable: true,
            });
        }
      });
    });
    $(document).on("submit", "#leadAssignUserForm", function (e) {
      e.preventDefault();
      var form = $(this).serializeArray();
      var leadId = $('#leadId').val();
      form.push({
        name: "lead_id",
        value: leadId
      });
      $.ajax({
        type: "POST",
        url: "api.php",
        data: $.param(form),
        dataType: "JSON",
        success: function (response) {
          $("#leadAssignUserForm")[0].reset();
          Swal.fire({
            icon: "success",
            title: "success",
            text: response.message,
            draggable: true,
          });
        },
        error: function (response) {
          Swal.fire({
            icon: "error",
            title: "Ooops",
            text: response.message,
            draggable: true,
          });
        },
      });
    });

    $(document).on("click", "#createNoteSvg", function () {
      $("#smallNoteModal").toggleClass("d-none");
    });
    $(document).on("click", ".editmodal", function () {
      let leadId = $(this).attr("data-lead-id");
      $.ajax({
        url: "api.php",
        type: "POST",
        dataType: "json",
        data: {
          action: "leadsmanager.getLeadsDetails",
          lead_id: leadId
        },
        success: function (response) {
          if (response.status === "success" && response.leadsDetail.length > 0) {
            let lead = response.leadsDetail[0];
            let modalTitle = `Edit Lead ${lead.PRIMARY_NAME} (#${lead.LEAD_STORE_ID}) 
                    <span class='text text-danger'> ${formatAMPM(lead.CREATED_AT)} </span>`;
            $("#modalTitle").html(modalTitle);
            let convertedLead = convertKeysToCamelCase(lead);
            let leadDetailsHtml = '';
            let colClass = 'col-sm-6 col-md-4';
            leadDetailsHtml += `<div class="card-body" ><div class="datagrid">`;
            for (let key in convertedLead) {
              if (convertedLead.hasOwnProperty(key) && convertedLead[key] !== null && convertedLead[
                  key] !== "") {
                let badgeHtml = '';
                if (key.toLowerCase() === 'source') {
                  badgeHtml = `<span class="badge bg-primary text-light">${convertedLead[key]}</span>`;
                } else if (key.toLowerCase() === 'status') {
                  badgeHtml = `<span class="badge bg-secondary">${convertedLead[key]}</span>`;
                } else if (key.toLowerCase() === 'product') {
                  badgeHtml = `<span class="badge bg-success text-light">${convertedLead[key]}</span>`;
                }
                let contentHtml = convertedLead[key];
                if (key.toLowerCase() === 'creator') {
                  contentHtml = `
                <div class="d-flex align-items-center">
                    <span class="avatar avatar-xs me-2 rounded" style="background-image: url(./static/avatars/000m.jpg)"></span>
                    ${convertedLead[key]}
                </div>`;
                } else if (key.toLowerCase() === 'edge network') {
                  contentHtml = `<span class="status status-green">${convertedLead[key]}</span>`;
                } else if (key.toLowerCase() === 'avatars list') {
                  contentHtml = `
                <div class="avatar-list avatar-list-stacked">
                    <span class="avatar avatar-xs rounded" style="background-image: url(./static/avatars/000m.jpg)"></span>
                    <span class="avatar avatar-xs rounded">JL</span>
                    <span class="avatar avatar-xs rounded" style="background-image: url(./static/avatars/002m.jpg)"></span>
                    <span class="avatar avatar-xs rounded" style="background-image: url(./static/avatars/003m.jpg)"></span>
                    <span class="avatar avatar-xs rounded" style="background-image: url(./static/avatars/000f.jpg)"></span>
                    <span class="avatar avatar-xs rounded">+3</span>
                </div>`;
                } else if (key.toLowerCase() === 'checkbox') {
                  contentHtml = `
                <label class="form-check">
                    <input class="form-check-input" type="checkbox" checked="">
                    <span class="form-check-label">Click me</span>
                </label>`;
                } else if (key.toLowerCase() === 'icon') {
                  contentHtml = `
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon text-green icon-2">
                    <path d="M5 12l5 5l10 -10"></path>
                </svg>
                ${convertedLead[key]}`;
                } else if (key.toLowerCase() === 'form control') {
                  contentHtml =
                    `<input type="text" class="form-control form-control-flush" placeholder="Input placeholder">`;
                }
                leadDetailsHtml += `
            <div class="datagrid-item">
                <div class="datagrid-title">${formatKey(key)}:</div> 
                <div class="datagrid-content">${badgeHtml || contentHtml}</div> 
            </div>
        `;
              }
            }
            leadDetailsHtml += `</div></div>`;
            $("#leadDetailsList").html(leadDetailsHtml);
            $("#leadId").val(leadId);
            $("#editModal").modal("show");
          } else {
                Swal.fire({
                icon: "error",
                title: "Ooops",
                text: "No lead details found.",
                draggable: true,
              });
          }
        },
        error: function () {
          Swal.fire({
                icon: "error",
                title: "Ooops",
                text: "something went to wrong.",
                draggable: true,
              });
        }
      });
    });
  });

  function getLeadStatus(lead_id) {
    $.ajax({
      url: "api.php",
      type: "POST",
      data: {
        action: "leadsmanager.getLeadStatus",
        lead_id: lead_id,
      },
      dataType: "json",
      success: function (response) {
       
        if (response && response.status == 'success') {
          var leadStatuses = response.leadStatuses;
          var currentStatus = response.leadStatus.STATUS; // Actual selected status

          var html = '';
          $.each(leadStatuses, function (key, value) {
            var selected = key === currentStatus ? 'selected' : '';  
            html += '<option value="' + key + '" ' + selected + '>' + value +
            '</option>';  
          });

          $('#lead_status').html(html) ;
        }
      },
      error: function (xhr, status, error) {
        console.error("AJAX Error: ", error);
        alert("Failed to fetch lead status. Please try again.");
      }
    });
  }

  function loadUsers(lead_id = '') {
    $.ajax({
      type: "POST",
      url: "api.php",
      data: {
        action: "leadsmanager.getLeadAssignedToUsers",
        lead_id: lead_id,
      },
      dataType: "json",
      success: function (data) {
        console.log('data==>', data);
        if (data.status === 'success') {
          var users = data.users;
          var html = '';
          $.each(users, function (index, user) {
            var selected = user.LEAD_ID !== null ? 'selected' : '';
            html += '<option value="' + user.ID + '" ' + selected + '>' + user.USER_NAME + '</option>';
          });
          // $('#user_id').html(html).selectpicker('refresh');
             $('#user_id').html(html).selectpicker('refresh');
        } else {
          console.error('Error fetching data:', data.message);
        }
      },
      error: function (xhr, status, error) {
        console.log('AJAX Error:', xhr.responseText);
      }
    });
  }

  function getLeadNotes(leadId) {
    $.ajax({
      url: "api.php",
      type: "POST",
      data: {
        action: "leadsmanager.getLeadNotes",
        lead_id: leadId
      },
      dataType: "json", // Ensure response is parsed as JSON
      success: function (response) {
        console.log("Response:", response);
        if (response.status == "success") {
          $(".note-list").html(response.html);
        } else {
          $(".note-list").html("<p class='text-muted'>No notes found.</p>");
        }
      },
      error: function (xhr, status, error) {
        console.error("AJAX Error:", error);
        alert("Failed to fetch notes. Please try again.");
      }
    });
  }

  function formatKey(key) {
    return key.toLowerCase().replace(/_/g, " ").replace(/\b\w/g, (char) => char.toUpperCase());
  }

  function convertKeysToCamelCase(obj) {
    let newObj = {};
    for (let key in obj) {
      if (obj.hasOwnProperty(key)) {
        let camelCaseKey = key.toLowerCase().replace(/_([a-z])/g, (match, letter) => letter.toUpperCase());
        newObj[camelCaseKey] = obj[key];
      }
    }
    return newObj;
  }

  function formatAMPM(date) {
    if (typeof date === 'string') {
      date = new Date(date);
    }
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var ampm = hours >= 12 ? 'pm' : 'am';
    hours = hours % 12;
    hours = hours ? hours : 12;
    minutes = minutes < 10 ? '0' + minutes : minutes;
    var strTime = hours + ':' + minutes + ' ' + ampm;
    return strTime;
  }
</script>