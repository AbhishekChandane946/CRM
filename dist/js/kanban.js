const statuses = ['To Do', 'In Progress', 'Pending', 'Hold', 'Done', 'Completed','Lost'];
getLeads(statuses);

function getLeads(statuses){
    $.ajax({
        url: 'api.php', 
        type: 'POST',
        data: {action:'leadsmanager.getLeads'},
        dataType: 'json',
        success: function (response) {
            console.log("response===>",response);
            const tasks = response.tasks;
            const employees = response.employees;
            renderKanban($('#kanban'), statuses, tasks, employees);
        },
        error: function () {
            alert("Error fetching data from the server.");
        }
    });
}
function renderKanban($container, statusList, tasks, employees) {
    statusList.forEach((status) => {
        renderList($container, status, tasks, employees);
    });

    $container.addClass('scrollable-board').dxScrollView({
        direction: 'horizontal',
        showScrollbar: 'always',
    });

    $container.addClass('sortable-lists').dxSortable({
        filter: '.list',
        itemOrientation: 'horizontal',
        handle: '.list-title',
        moveItemOnDrop: true,
    });
    $container.find('.sortable-cards').each(function () {
        $(this).dxSortable({
            group: 'tasksGroup',
            moveItemOnDrop: true,
            onDragChange: function (e) {
                if (e.toElement) {
                    $(e.toElement).closest('.list').addClass('highlight-target'); 
                }
                if (e.fromElement) {
                    $(e.fromElement).closest('.list').removeClass('highlight-target'); 
                }
            },
            onAdd: function (e) {
                var parent = findParentWithClass(e.toComponent._$element[0],'list');
                const newStatus = parent.children[0].innerText;
                const lead_id = $(e.itemElement).data('lead-id'); 
                const lead_status = $(e.itemElement).data('lead-status');
                if (!lead_id || !newStatus) {
                    alert('Lead ID or new status not assigned.');
                    return;
                }
                $.ajax({
                    url: 'action.php',
                    type: 'POST',
                    data: {
                        action: 'set_lead_status',
                        lead_id: lead_id,
                        new_lead_status: newStatus,
                        lead_status: lead_status,
                    },
                    success: function (response) {
                        console.log('Server Response:', response);
                        if (response.success == 'success') {
                            alert(response.message);
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function () {
                        alert('Error communicating with the server.');
                    },
                });
            },
        });
    });
}
function findParentWithClass(element, className) {
    while (element && !element.classList.contains(className)) {
      element = element.parentElement;
    }
    return element && element.classList.contains(className) ? element : null;
  }

function renderList($container, status, tasks, employees) {
    const $list = $('<div>').addClass('list').appendTo($container);
    renderListTitle($list, status);
    const listTasks = tasks.filter((task) => task.lead_status === status);
    renderCards($list, listTasks, employees);
}

function renderListTitle($container, status) {
    $('<div>').addClass('list-title').text(status).appendTo($container);
    setBackgroundColor();
}

function renderCards($container, tasks, employees) {
    const $scroll = $('<div>').appendTo($container);
    const $items = $('<div>').appendTo($scroll);

    tasks.forEach((task) => {
        renderCard($items, task, employees);
    });

    $scroll.addClass('scrollable-list').dxScrollView({
        direction: 'vertical',
        showScrollbar: 'always',
    });

    $items.addClass('sortable-cards ').dxSortable({
        group: 'tasksGroup',
        moveItemOnDrop: true,
    });
   
}
function renderCardOld($container, lead) {

    const $item = $('<div>').addClass('card dx-card p-3 mb-3').attr('data-lead-id', lead.lead_id).attr('data-lead-status', lead.lead_status).appendTo($container);
    const $infoLine1 = $('<div>').addClass('d-flex align-items-center mt-2').appendTo($item);
    if (lead.lead_source) {
        $('<span>').addClass(`badge ${getStatusBadgeClass(lead.lead_source)} me-2`).text(lead.lead_source).appendTo($infoLine1);
    }
    if (lead.lead_product) {
        $('<span>').addClass('badge bg-success me-2').text(lead.lead_product).appendTo($infoLine1);
    }
    const $header = $('<div>').addClass('d-flex justify-content-between align-items-start mb-2').appendTo($item);
    const $leftSection = $('<div>').appendTo($header);
    $('<div>').addClass('card-subject fw-bold').html(`${lead.lead_name} <span class="text-secondary">(#lead-${new Date().getFullYear()}-${String(lead.lead_id).padStart(3, '0')})</span>`).appendTo($leftSection).on('click', function (event) {
            event.stopPropagation();
            window.location.href = `add-lead.php?lead_id=${lead.lead_id}`;
        });
    const $dropdown = $('<div>').addClass('dropdown').appendTo($header);
    $('<button>').addClass('btn btn-light btn-sm').attr('type', 'button').attr('data-bs-toggle', 'dropdown').html('<i class="fas fa-cog"></i>').appendTo($dropdown);
    const $dropdownMenu = $('<ul>').addClass('dropdown-menu').appendTo($dropdown);
    $('<li>').append('<a class="dropdown-item" href="#">Call Now</a>').appendTo($dropdownMenu);
    $('<li>').append('<a class="dropdown-item" href="#">Sms Now</a>').appendTo($dropdownMenu);
    $('<li>').append('<a class="dropdown-item" href="#">Meeting</a>').appendTo($dropdownMenu);
    $('<li>').append('<a class="dropdown-item" href="#">Edit</a>').appendTo($dropdownMenu);
    $('<li>').append('<a class="dropdown-item " href="#">Delete</a>').appendTo($dropdownMenu);
    if (lead.lead_remark) {
         $('<div>').addClass('small text-secondary mb-2').text(lead.lead_remark.length > 50 ? `${lead.lead_remark.substring(0, 50)}...` : lead.lead_remark).attr('title', lead.lead_remark).appendTo($item);
    }
    $('<div>').addClass('small text-danger').append($('<i>').addClass('fa fa-calendar-check me-1')).append(document.createTextNode(new Date(lead.created_timestamp).toLocaleString())).appendTo($leftSection);
    const $infoLine2 = $('<div>').addClass('d-flex align-items-center mt-2').appendTo($item);
    $('<div>').addClass('me-2').html(`<i class="fas fa-phone-alt me-1"></i>${lead.lead_phone}`).appendTo($infoLine2);
    const $assignedUsers = $('<div>').appendTo($infoLine2);
    if (lead.assigned_users) {
        if (Array.isArray(lead.assigned_users)) {
            lead.assigned_users.forEach((user) => {
                const initials = (user.split(' ')[0][0] || '') + (user.split(' ')[1]?.[0] || '');
                $('<span>').addClass('badge bg-primary me-1').text(initials).attr('title', user)
                    .appendTo($assignedUsers);
                 });
        } else if (typeof lead.assigned_users === 'string') {
            const initials = lead.assigned_users.split(' ').map((word) => word[0]).join('');
            $('<span>').addClass('badge bg-primary me-1').text(initials).attr('title', lead.assigned_users).appendTo($assignedUsers);
        }
    } else {
        $('<span>').addClass('me-2').text('Unassigned').appendTo($assignedUsers);
    }
    $('<i>').addClass('fa fa-user-plus').attr('title', 'Assign User').on('click', function () {
        loadUsers(lead.assigned_user_ids);
        $("#leadAssignUserForm")[0].reset();
        $("#lead_id").val(lead.lead_id);
        $('#leadAssignUserModal').modal('show');

    }).appendTo($infoLine2);
    $('<hr>').addClass('my-2').appendTo($item);
    const $footer = $('<div>').addClass('d-flex justify-content-between align-items-center').appendTo($item);
    const lastActivity = lead.last_activity || new Date().toISOString();
    const $activity = $('<div>').addClass('small').appendTo($footer);
    $('<i>').addClass('fas fa-clock me-1').appendTo($activity);
    $('<span>').text(`${new Date(lastActivity).toLocaleString()}`).appendTo($activity);
    const commentCount = lead.comment_count || 0;
    $('<div>').addClass('small').html(`<i class="fas fa-comments"></i> ${commentCount}`).appendTo($footer);
}


function renderCard($container, lead) {
    const $item = $('<div>')
        .addClass('style="background-color:" card dx-card p-3 mb-3 shadow-lg position-relative')
        .attr('data-lead-id', lead.lead_id)
        .css({
            'border-radius': '12px',
            'box-shadow': '0 6px 15px rgba(0, 0, 0, 0.15)',
            'transition': 'transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out'
        })
        .hover(
            function () { $(this).css({ 'transform': 'translateY(-5px)', 'box-shadow': '0 10px 20px rgba(0, 0, 0, 0.2)' }); },
            function () { $(this).css({ 'transform': 'translateY(0)', 'box-shadow': '0 6px 15px rgba(0, 0, 0, 0.15)' }); }
        )
        .appendTo($container);

    // Row 1: Lead Source, Product, and Dropdown
    const $headerRow = $('<div>').addClass('d-flex justify-content-between align-items-center mb-2').appendTo($item);
    const $badges = $('<div>').appendTo($headerRow);

    if (lead.lead_source) {
        $('<span>')
            .addClass('badge bg-primary me-2')
            .attr('title', `Lead Source: ${lead.lead_source}`)
            .text(lead.lead_source)
            .css({ 'border-radius': '8px', 'padding': '6px 10px' })
            .appendTo($badges);
    }

    if (lead.lead_product) {
        $('<span>')
            .addClass('badge bg-success')
            .attr('title', `Lead Product: ${lead.lead_product}`)
            .text(lead.lead_product)
            .css({ 'border-radius': '8px', 'padding': '6px 10px' })
            .appendTo($badges);
    }

    const $dropdown = $('<div>').addClass('dropdown').appendTo($headerRow);
    $('<i>')
        .addClass('fas fa-ellipsis-v text-secondary cursor-pointer')
        .attr('data-bs-toggle', 'dropdown')
        .attr('title', 'Actions')
        .css({ 'cursor': 'pointer' })
        .appendTo($dropdown);
    $('<ul>')
        .addClass('dropdown-menu dropdown-menu-end shadow')
        .html(`
            <li><a class="dropdown-item" href="#"><i class="fas fa-phone-alt me-2"></i>Call Now</a></li>
            <li><a class="dropdown-item" href="#"><i class="fas fa-sms me-2"></i>Sms Now</a></li>
            <li><a class="dropdown-item" href="#"><i class="fas fa-calendar-check me-2"></i>Meeting</a></li>
            <li><a class="dropdown-item" href="#"><i class="fas fa-edit me-2"></i>Edit</a></li>
            <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-trash me-2"></i>Delete</a></li>
        `)
        .appendTo($dropdown);

    // Row 2: Lead Name and Created Date
    const $nameRow = $('<div>').addClass('d-flex justify-content-between align-items-center mb-2').appendTo($item);
    $('<div>')
        .addClass('fw-bold text-primary lead-name')
        .attr('title', `Lead Name: ${lead.lead_name}`)
        .html(`${lead.lead_name} <span class="text-secondary">(#${lead.lead_id})</span>`)
        .css({ 'cursor': 'pointer', 'font-size': '16px' })
        .appendTo($nameRow)
        .on('click', function (event) {
            event.stopPropagation();
            window.location.href = `add-lead.php?lead_id=${lead.lead_id}`;
        });

    $('<div>')
        .addClass('small text-danger')
        .attr('title', `Created on: ${new Date(lead.created_timestamp).toLocaleString()}`)
        .text(new Date(lead.created_timestamp).toLocaleDateString())
        .appendTo($nameRow);

    // Row 3: Lead Phone
    const $phoneRow = $('<div>').addClass('d-flex align-items-center mt-2').appendTo($item);
    $('<i>')
        .addClass('fa fa-phone me-2 text-success')
        .attr('title', 'Phone')
        .appendTo($phoneRow);
    $('<div>')
        .addClass('small text-dark')
        .attr('title', `Phone Number: ${lead.lead_phone}`)
        .text(lead.lead_phone)
        .css({ 'font-weight': '500' })
        .appendTo($phoneRow);

    // Row 4: Assigned User
    const $userRow = $('<div>').addClass('d-flex justify-content-between align-items-center mt-2').appendTo($item);
    $('<div>')
        .addClass('small')
        .attr('title', `Assigned to: ${lead.assigned_users || 'Unassigned'}`)
        .append('<i class="fa fa-users me-1"></i>')
        .append(` ${lead.assigned_users || 'Unassigned'}`)
        .css({ 'font-weight': '500' })
        .appendTo($userRow);

    $('<i>')
        .addClass('fa fa-user-plus text-primary cursor-pointer')
        .attr('title', 'Assign User')
        .css({ 'cursor': 'pointer' })
        .on('click', function () {
            loadUsers(lead.assigned_user_ids);
            $("#leadAssignUserForm")[0].reset();
            $("#lead_id").val(lead.lead_id);
            $('#leadAssignUserModal').modal('show');
        })
        .appendTo($userRow);

    // ❌ COMMENTED OUT: Lead Remark
    /*
    if (lead.lead_remark) {
        $('<div>')
            .addClass('text-danger small mb-1')
            .attr('title', `Remark: ${lead.lead_remark}`)
            .text(lead.lead_remark.length > 50 ? `${lead.lead_remark.substring(0, 50)}...` : lead.lead_remark)
            .appendTo($item);
    }
    */

    // ❌ COMMENTED OUT: Footer (Last Activity & Comments)
    /*
    const $footer = $('<div>').addClass('d-flex justify-content-between align-items-center mt-3 pt-2 border-top').appendTo($item);
    $('<div>')
        .addClass('small')
        .attr('title', `Last Activity: ${new Date(lead.last_activity || new Date()).toLocaleString()}`)
        .html(`<i class="fas fa-clock me-1"></i>${new Date(lead.last_activity || new Date()).toLocaleString()}`)
        .appendTo($footer);

    $('<div>')
        .addClass('small')
        .attr('title', `Comments: ${lead.comment_count || 0}`)
        .html(`<i class="fas fa-comments me-1"></i>${lead.comment_count || 0}`)
        .appendTo($footer);
    */
}




function getStatusBadgeClass(status) {
    switch (status.toLowerCase()) {
        case 'facebook':
            return 'bg-primary';
        case 'instamart':
            return 'bg-secondary';
        case 'google':
            return 'bg-warning';
        case 'instagram':
            return 'bg-info';
        case 'website':
            return 'bg-dark';
        case 'website':
            return 'bg-danger';
        default:
            return 'bg-success';
    }
}

