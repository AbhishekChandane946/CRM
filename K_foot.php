
    <!-- Footer  -->
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
                    customClass: {
                        popup: 'small-swal'
                    }
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