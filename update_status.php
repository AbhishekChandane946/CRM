<?php
 

require_once 'config-settings/LeadsManager.php';

$leadId = isset($_POST['lead_id']) ? intval($_POST['lead_id']) : 0;
$status = isset($_POST['status']) ? $_POST['status'] : null;

if ($leadId <= 0 || empty($status)) {
    $response = ["success" => false, "message" => "Invalid input"];
    error_log("Invalid input: " . json_encode($response)); // Log error response
    echo json_encode($response);
    exit;
}

$leadManager = new LeadsManager();
$response = $leadManager->updateLeadStatus($leadId, $status);

error_log("Response: " . json_encode($response)); // Log response

echo json_encode($response);
exit;
?>
