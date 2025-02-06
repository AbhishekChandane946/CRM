
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


<?php include 'footer.php';?>
<!-- MAIN FOOTER -->