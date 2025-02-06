<footer class="footer footer-transparent d-print-none">
  <div class="container-xl">
    <div class="row text-center align-items-center flex-row-reverse">
      <div class="col-lg-auto ms-lg-auto">
        <ul class="list-inline list-inline-dots mb-0">
          <li class="list-inline-item"><a href="https://tabler.io/docs" target="_blank" class="link-secondary"
              rel="noopener">Documentation</a></li>
          <li class="list-inline-item"><a href="./license.html" class="link-secondary">License</a></li>
          <li class="list-inline-item"><a href="https://github.com/tabler/tabler" target="_blank" class="link-secondary"
              rel="noopener">Source code</a></li>
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
</body>

</html>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="./dist/js/tabler.min.js?1692870487"></script>
<script src="./dist/js/demo.min.js?1692870487"></script>
<script src="./dist/js/kanban.js"></script>
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