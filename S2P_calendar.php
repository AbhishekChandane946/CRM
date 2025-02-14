 
 <?php include 'header.php';?>


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
                      <label for="eventDate">Selected Date:</label>
                <input type="text" id="eventDate" class="form-control" readonly>
                
                <p id="availabilityMessage" class="mt-2"></p> <!-- Availability Message Here -->
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

              var eventsData = [  // Your predefined events
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
                      "title": "New Lead: Abhishek Chandane",
                      "start": "2025-02-14",
                      "description": "Potential client interested in software services.",
                      "type": "Lead"
                  }
              ];

              var calendar = new FullCalendar.Calendar(calendarEl, {
                  initialView: 'dayGridMonth',

                  events: eventsData, // Use predefined events

                  dateClick: function (info) {
                      $('#eventDate').val(info.dateStr);
                      checkAvailability(info.dateStr); // Call function to check availability
                      $('#eventModal').modal('show'); // Show modal for event creation
                  },

                  eventClick: function (info) {
                      var eventType = info.event.extendedProps.type;

                      if (eventType === "Meeting") {
                          $('#meetingId').val(info.event.id);
                          $('#meetingTitle').text(info.event.title);
                          $('#meetingDate').text(info.event.startStr);
                          $('#meetingDescription').text(info.event.extendedProps.description || "No details provided.");
                          $('#meetingModal').modal('show'); 
                      } else if (eventType === "Lead") {
                          $('#leadId').val(info.event.id);
                          $('#leadTitle').text(info.event.title);
                          $('#leadDate').text(info.event.startStr);
                          $('#leadDescription').text(info.event.extendedProps.description || "No details provided.");
                          $('#leadModal').modal('show'); 
                      }
                  },

                  eventContent: function(arg) {
                      let eventTitle = arg.event.title;
                      let eventType = arg.event.extendedProps.type;
                      let bgColor = eventType === 'Meeting' ? '#8c31b9' : '#14b1ff';  

                      return {
                          html: `
                              <div style="background: ${bgColor}; text-align: center; font-size: 14px; font-weight: bold; color: white;">
                                  ${eventTitle}
                              </div>
                          `
                      };
                  }
              });

              calendar.render();


                // Function to check if the selected date is available or outdated
                function checkAvailability(selectedDate) {
                    let today = new Date().toISOString().split("T")[0]; // Get today's date in YYYY-MM-DD format
                    
                    if (selectedDate < today) {
                        $('#availabilityMessage').html("<span class='text-warning'>⚠️ This date is in the past. You cannot schedule an event.</span>");
                        return;
                    }

                    let isAvailable = !eventsData.some(event => event.start === selectedDate);
                    let message = isAvailable 
                        ? "<span class='text-success'>✅ Date is available.</span>" 
                        : "<span class='text-danger'>❌ Date is already booked.</span>";
                    
                    $('#availabilityMessage').html(message);
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