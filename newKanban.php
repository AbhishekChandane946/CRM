
<!-- newkanban.php -->

<!-- MAIN HEADER -->
<?php include 'header.php';?>

<!-- KANBAN HEADER BUT JUST ONLY FOR LINKS -->
<?php include 'K_head.php';?>

<div class="page-wrapper mb-5" style="background-color: #f6f8fb;">
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                <div class="page-pretitle">
                        Leads
                    </div>
                     <div class="d-flex justify-content-between"> 

                    <h4 class="page-title mb-4">
                        Kanban
                    </h4>

                    <button class="button p-0">
                        <a style="text-decoration: none;" class="text-light" href="S2P_lead.php">List View</a>
                    </button>   
                    </div>
                </div>
            </div>
            <div class="demo-container mt-3">
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






<!-- KANBAN HEADER BUT JUST ONLY FOR LINKS -->
<?php include 'K_foot.php';?>


<script>
$(function () {
    $('[data-bs-toggle="tooltip"]').tooltip();
});

$('.selectpicker').selectpicker();
loadUsers();

function loadUsers(selectedUserIds = '') {
    $.ajax({
        type: "POST",
        url: "api.php",
        data: { action: "users.getUsers" },
        dataType: "json",
        success: function (data) {
            console.log("API Response:", data); // Debugging

            if (data.status === "success") {
                var users = data.users;
                var selectedIds = selectedUserIds.split(',').map(id => id.trim());

                // Clear existing options before appending
                $('#user_id').empty();

                $.each(users, function (index, user) {
                    var selected = selectedIds.includes(user.ID.toString()) ? 'selected' : '';
                    $('#user_id').append(`<option value="${user.ID}" ${selected}>${user.USER_NAME}</option>`);
                });

                // Refresh dropdown to apply new options
                $('#user_id').selectpicker('refresh');
            } else {
                console.log("Error: ", data.message);
            }
        },
        error: function (xhr) {
            console.log("AJAX Error:", xhr.responseText);
        }
    });
}

$("#leadAssignUserForm").submit(function (e) {
    e.preventDefault();
    var form = $(this).serialize();
    console.log("Form Data:", form);

    $.ajax({
        type: "POST",
        url: "api.php",
        data: form,
        dataType: "json",
        success: function (data) {
            if (data.status === "success") {
                // Reset form before hiding modal
                $("#leadAssignUserForm")[0].reset();
                $('#user_id').selectpicker('refresh'); // Ensure dropdown resets
                $('#user_id').selectpicker('toggle'); // Close dropdown

                $('#leadAssignUserModal').modal('hide');
                refreshKanbanBoard();

                Swal.fire({
                    title: data.message,
                    icon: "success",
                    draggable: true,
                    customClass: { popup: 'small-swal' }
                });
            } else {
                Swal.fire({
                    title: data.message,
                    icon: "error",
                    draggable: true,
                    customClass: { popup: 'small-swal' }
                });
            }
        },
        error: function (xhr) {
            Swal.fire({
                title: "An error occurred.",
                text: xhr.responseText,
                icon: "error",
                draggable: true,
                customClass: { popup: 'small-swal' }
            });
        }
    });
});

function refreshKanbanBoard() {
    getLeads(statuses);
}

function setBackgroundColor() {
    $('.list-title').each(function () {
        var titleText = $(this).text().trim();
        var formattedText = titleText.replace(/_/g, ' ')
            .toLowerCase()
            .replace(/\b\w/g, function (char) { return char.toUpperCase(); });

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