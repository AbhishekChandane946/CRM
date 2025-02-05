<?php

require_once 'config-settings/LeadsManager.php';

$leadId = filter_input(INPUT_POST, 'lead_id', FILTER_VALIDATE_INT);
$status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);

if (!$leadId || empty($status)) {
    $response = ["success" => false, "message" => "Invalid input"];
    error_log("Invalid input: " . json_encode($response)); // Log error response
    echo json_encode($response);
    exit;
}

try {
    $leadManager = new LeadsManager();
    $response = $leadManager->updateLeadStatus($leadId, $status);

    error_log("Response: " . json_encode($response)); // Log response
    echo json_encode($response);
} catch (Exception $e) {
    error_log("Error updating lead status: " . $e->getMessage());
    echo json_encode(["success" => false, "message" => "An error occurred while updating lead status"]);
}

exit;

