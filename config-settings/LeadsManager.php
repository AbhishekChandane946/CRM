<?php
//namespace ConfigSettings;

require_once('config_db.php');
require_once('MysqliDb.php');

class LeadsManager
{
    private $db;
    // pubi $timezone =  ;
    public function __construct()
    {
        global $dbX;
        global $dbUserName;
        global $dbPassword;
        global $dbName;
        $dbX = new MysqliDb('localhost', 'root', $dbPassword, $dbName);
        $dbX->autoReconnect = false;
        $dbX->connect();
        if(!$dbX) {
            die("Database error");
        }
    }

    public function getLeadsRocords(){
        global $dbX;
        try {
            $start = isset($_POST['start']) ? (int)$_POST['start'] : 0;  
            $length = isset($_POST['length']) ? (int)$_POST['length'] : 10;  
            $searchValue = isset($_POST['search']['value']) ? $_POST['search']['value'] : '';  
            $orderColumn = isset($_POST['order'][0]['column']) ? (int)$_POST['order'][0]['column'] : 0;  
            $orderDir = isset($_POST['order'][0]['dir']) ? $_POST['order'][0]['dir'] : 'desc';  
            $columns = $dbX->rawQuery("SHOW COLUMNS FROM myleadsrecords");
            $columnNames = [];
            foreach ($columns as $column) {
                $columnNames[] = $column['Field'];  
            }
            $orderBy = $columnNames[$orderColumn] ?? 'ID';  
            $dbX->where('1 = 1'); 
            if ($searchValue != '') {
                foreach ($columnNames as $column) {
                    $dbX->orWhere("$column LIKE '%" . $dbX->escape($searchValue) . "%'");
                }
            }
            $dbX->orderBy($orderBy, $orderDir);
            $leadsRecords = $dbX->get("myleadsrecords", [$start, $length]);
            $totalRecordsQuery = $dbX->rawQueryOne("SELECT COUNT(*) AS total FROM myleadsrecords");
            $totalRecords = $totalRecordsQuery['total'];
            if (!empty($leadsRecords)) {
                $response['status'] = 'success';
                $response['message'] = "Leads records retrieved successfully.";
                $response['data'] = $leadsRecords;  
                $response['recordsTotal'] = $totalRecords;  
                $response['recordsFiltered'] = $totalRecords;  
            } else {
                $response['status'] = 'error';
                $response['message'] = "No leads records found.";
                $response['data'] = [];
                $response['recordsTotal'] = 0;
                $response['recordsFiltered'] = 0;
            }
        } catch (Exception $e) {
            $response['status'] = 'error';
            $response['message'] = "Error: " . $e->getMessage();
            $response['data'] = [];
        }
        return $response;
    }
    public function getLeads()
    {
        global $dbX;
        try {
            $dbX->join("lead_assigned la", "leads.ID = la.lead_id", "LEFT");
            $dbX->join("users u", "la.user_id = u.ID", "LEFT");
            $dbX->groupBy("leads.ID");
            $leads = $dbX->get("leads", null, [
                'leads.ID AS lead_id',
                'leads.LEAD_NAME AS lead_name',
                'leads.LEAD_REMARK AS lead_remark',
                'leads.LEAD_PRODUCT AS lead_product',
                'leads.LEAD_PHONE AS lead_phone',
                'leads.CREATED_TIMESTAMP AS created_timestamp',
                'leads.LEAD_STATUS AS lead_status',
                'leads.LEAD_SOURCE AS lead_source',
                'GROUP_CONCAT(u.USER_NAME SEPARATOR ", ") AS assigned_users'
            ]);
            $employees = $dbX->get("users", null, ['ID', 'USER_NAME']);
            if (!empty($leads) && !empty($employees)) {
                $response['status'] = 'success';
                $response['tasks'] = $leads;
                $response['employees'] = $employees;
            } else {
                $response['status'] = 'error';
                $response['message'] = "Leads not retrieved";
            }
        } catch (Exception  $e) {
            $response['status']    = 'error';
            $response['message']   = $e->getMessage();
        }
        return $response;
    }
    public function getLeadsDetails(){
        global $dbX;
        if($_POST['lead_id']){
            try{

                $leadsDetail = $dbX->where('ID', $_POST['lead_id'])->get('myleadsrecords');
                $users = $dbX->where('ROLE_ID', 1)->orderBy('ID', 'DESC')->get('users', null, ['ID', 'USER_NAME']);
                if (!empty($leadsDetail)) {
                    $response['status'] = 'success';
                    $response['message'] = "Users retrieved successfully.";
                    $response['leadsDetail'] = $leadsDetail;
                    $response['users'] = $users;
                } else {
                    $response['status'] = 'error';
                    $response['message'] = "Lead Data Not Found.";
                }
            } catch (Exception  $e) {
                $response['status'] = 'error';
                $response['message'] = $e->getMessage();
            }
        }else{
            $response['status'] = 'error';
            $response['message'] = "missing parameter.";
        }
        return $response;
    }
    public function leadAssignToUser(){
        echo "In function: POST data leadAssignToUser\n";
        print_r($params);
        die();
        if (!isset($_POST['lead_id'])) {
            $response['status'] = 'error';
            $response['message'] = 'lead is required';
            return $response;
            exit;
        }
        $leadId = $input['lead_id'];
        global $dbX;
        try {
            $users = $dbX->where('ROLE_ID', 1)->orderBy('ID', 'DESC')->get('users', null, ['ID', 'USER_NAME']);
            $lastAssignedUser = $dbX->orderBy('ID', 'DESC')->getOne('lead_assigned', 'USER_ID');
            $nextUserIndex = 0;
            if ($lastAssignedUser) {
                $lastAssignedUserIndex = array_search($lastAssignedUser['USER_ID'], array_column($users, 'ID'));
                $nextUserIndex = ($lastAssignedUserIndex + 1) % count($users);
            } else {
                $nextUserIndex = 0;
            }
            $isAssigned = $this->$dbX->where('LEAD_ID', $leadId)->getValue('lead_assigned', 'COUNT(*)');
            if ($isAssigned) {
                $response['status'] = 'success';
                $response['message'] = "Lead is already assigned to user: {$users[$lastAssignedUserIndex]['USER_NAME']}";
                $response['user'] = $users[$lastAssignedUserIndex];
            } else {
                $nextUser = $users[$nextUserIndex];
                $result = $this->$dbX->insert('lead_assigned', [
                    'LEAD_ID' => $leadId,
                    'USER_ID' => $nextUser['ID'],
                    'CREATED_TIMESTAMP' => date('Y-m-d H:i:s')
                ]);
                if ($result) {
                    activityLogs($userId, 'set_lead_tousers', '', $newData);
                    $response['status'] = 'success';
                    $response['message'] = "Lead successfully assigned to user: {$nextUser['USER_NAME']}";
                    $response['user'] = $nextUser;
                } else {
                    $response['status'] = 'error';
                    $response['message'] = 'Failed to assign lead.';
                }
            }
        } catch (Exception  $e) {
            $response['status'] = 'error';
            $response['message'] = $e->getMessage();
        }
        return $response;
    }
    public function leadStatusUpdate(){
        global $dbX;
        if (!isset($input['lead_id'])) {
            $response['status'] = 'error';
            $response['message'] = 'Lead is required';
            return $response;
            exit;
        }
        try {
            $new_lead_status = $_POST["new_lead_status"];
            $validStatuses = [
                "To Do" => "To Do",
                "In Progress" => "In Progress",
                "Pending" => "Pending",
                "Hold" => "Hold",
                "Done" => "Done",
                "Completed" => "Completed"
            ];
            if (array_key_exists($new_lead_status, $validStatuses)) {
                $new_lead_status = $validStatuses[$new_lead_status];
            } else {
                $response['status'] = 'error';
                $response['message'] = "Lead status not matched";
                echo json_encode($response);
                exit;
            }
            $oldData = $dbX->where('ID', $input["lead_id"])->getOne('leads');
            $data = [
                'LEAD_STATUS' => $new_lead_status
            ];
            $result = $dbX->where('ID', $input["lead_id"])->update('leads', $data);
            activityLogs($connection, $loggedInUserId = 1, $action = "lead status changed {$oldData['LEAD_STATUS']} to {$new_lead_status}", $oldData, $data);
        
            if ($result) {
                $response['status'] = 'success';
                $response['message'] = "Lead status successfully updated to {$new_lead_status}";
            } else {
                $response['status'] = 'error';
                $response['message'] = 'Failed to change lead status.';
            }
        } catch (Exception $e) {
            $response['status'] = 'error';
            $response['message'] = $e->getMessage();
        }
        return $response;
    }
    function setLeadAssignToUsers(){
        global $dbX;

        if (!empty($_POST["lead_id"]) && !empty($_POST["user_id"])) {
            $currentUsers = $dbX->where('LEAD_ID', $_POST['lead_id'])->get('lead_assigned', null, 'USER_ID');
            $existingUserIds = array_column($currentUsers, 'USER_ID');
            $usersToAdd = array_diff($_POST['user_id'], $existingUserIds);
            $usersToRemove = array_diff($existingUserIds, $_POST['user_id']);
            try {
                $dbX->startTransaction();
                $dataToInsert = [];
                foreach ($usersToAdd as $userId) {
                    $dataToInsert[] = [
                        'LEAD_ID' => $_POST['lead_id'],
                        'USER_ID' => $userId,
                        'CREATED_TIMESTAMP' => date('d-m-Y H:i:s')
                    ];
                }
                if (!empty($dataToInsert)) {
                    $dbX->insertMulti('lead_assigned', $dataToInsert);
                    foreach ($dataToInsert as $data) {
                        // activityLogs($connection, $loggedInUserId = 1, $action = "set_lead_assign_to_user lead assign for the users", '', $data);
                    }
                }
                if (!empty($usersToRemove)) {
                    // $db->where('id', Array(1, 5, 27, -1, 'd'));
                    $dbX->where('LEAD_ID', $_POST['lead_id'])->where('USER_ID', $usersToRemove,'IN');
                    $dbX->delete('lead_assigned');
                    // activityLogs($connection, $loggedInUserId = 1, $action = "Unassign the users", $usersToRemove, $usersToAdd);
                }
                $dbX->commit();
                $response['status'] = 'success';
                $response['message'] = "Lead assignments updated.";
            } catch (Exception $e) {
                $dbX->rollback();
                $response['status'] = 'error';
                $response['message'] = $e->getMessage();
            }
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Lead ID and User IDs are required.';
        }
         return $response;
    }

    public function setLeadFolloUp(){
        global $dbX;
        if (!empty($_POST["follow_up_index"]) && !empty($_POST["follow_up_date"]) && !empty($_POST["follow_up_notes"])) {
            $leadId    = $_POST["leadId"];
            $index     = $_POST["follow_up_index"];
            $date      = $_POST["follow_up_date"];
            $notes     = $_POST["follow_up_notes"];
            $todayDate = new DateTime();
            $columns = [
                1 => ["date" => "FIRST_FOLLOWUP_DATE", "remark" => "FIRST_FOLLOWUP_REMARK"],
                2 => ["date" => "SECOND_FOLLOWUP_DATE", "remark" => "SECOND_FOLLOWUP_REMARK"],
                3 => ["date" => "THREE_FOLLOWUP_DATE", "remark" => "THREE_FOLLOWUP_REMARK"],
                4 => ["date" => "FOUR_FOLLOWUP_DATE", "remark" => "FOUR_FOLLOWUP_REMARK"],
                5 => ["date" => "FIVE_FOLLOWUP_DATE", "remark" => "FIVE_FOLLOWUP_REMARK"]
            ];
            if($date < $todayDate) {
                $response['status'] = 'error';
                $response['message'] = "select current or future date.";
            }
            if (!isset($columns[$index])) {
                $response['status'] = 'error';
                $response['message'] = "Invalid follow-up index.";
            }
            try {
                $remarks = $dbX->where('ID', $leadId)->getOne('myleadsrecords');
                if (!empty($remarks[$columns[$index]['date']]) && !empty($remarks[$columns[$index]['remark']])) {
                    $response['status'] = 'error';
                    $response['message'] = "Follow-up already added.";
                    return $response;
                }
                $updateData = [
                    $columns[$index]['date']   => $date,
                    $columns[$index]['remark'] => $notes
                ];

                $udpated = $dbX->where('ID', $leadId)->update('myleadsrecords', $updateData);
                if(isset($udpated)){
                    $response['status'] = 'success';
                    $response['message'] = "Lead follow Up updated.";
                }
            } catch (Exception $e) {
                $response['status'] = 'error';
                $response['message'] = $e->getMessage();
            }
        }else{
            $response['status'] = 'error';
            $response['message'] = 'parameter are missing.';
        }
        return $response;
    }



    // 
    public function getLeadById($lead_id) {
        global $dbX;
    
        if (empty($lead_id)) {
            return [
                'status' => 'error',
                'message' => 'Missing lead_id parameter.'
            ];
        }
    
        try { 
            $dbX->where('ID', $lead_id);
            $leadDetail = $dbX->get("leads");
            // $dbX->where('ROLE_ID', 1);
            $dbX->orderBy('ID', 'DESC');
            $users = $dbX->get('users', null, ['ID', 'USER_NAME']);
    
            if (!empty($leadDetail)) {
                return [
                    'status' => 'success',
                    'message' => 'Lead details retrieved successfully.',
                    'leadDetail' => $leadDetail,
                    'users' => $users
                ];
            } else {
                return [
                    'status' => 'error',
                    'message' => 'Lead data not found.'
                ];
            }
        } catch (Exception $e) {
            return [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        }
    }



    public function updateLeadStatus($leadId, $status)
    {
        global $dbX;
    
       
        if (empty($leadId) || empty($status)) {
            return ["success" => false, "message" => "Invalid input"];
        }
    
        
        $data = ["LEAD_STATUS" => $status];
    
        
        if (!$dbX->ping()) {
            return ["success" => false, "message" => "Database connection error"];
        }
    
      
        $dbX->where("ID", $leadId);
    
        if ($dbX->update("leads", $data)) {
            return ["success" => true, "message" => "Lead status updated successfully"];
        } else {
             
            $error = $dbX->getLastError();
            return ["success" => false, "message" => "Failed to update lead status. Error: $error"];
        }
    }
    
    
    

}