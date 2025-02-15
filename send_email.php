 
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Include PHPMailer

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $templatePath = $_POST['template'];
 
    // Check if the template file exists
    if (!file_exists($templatePath)) {
        echo json_encode(["status" => "error", "message" => "Template file not found"]);
        exit;
    }

    // Load email template content
    $emailBody = file_get_contents($templatePath);

    // Replace placeholders with actual data
    $emailBody = str_replace("{MMC}", $_POST['mmc'] ?? '', $emailBody);
    $emailBody = str_replace("{OTC}", $_POST['otc'] ?? '', $emailBody);
    $emailBody = str_replace("{FOLLOWUP_REASON}", $_POST['followupReason'] ?? '', $emailBody);
    $emailBody = str_replace("{LEAD_SOURCE}", $_POST['leadSource'] ?? '', $emailBody);

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Use your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'abhishek.chandane@sec2payindia.com';  // Your email
        $mail->Password = 'zrhh nhcn ekvb qbnx';  // App password (not your normal password)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
 




        // Email Headers
        $mail->setFrom('abhishek.chandane@sec2payindia.com', 'ABHISHEK CHANDANE');
        $mail->addAddress('abhishekchandane03@gmail.com', 'Haleluya');

        // Email Content
        $mail->isHTML(true);
        $mail->Subject = "Your Email Subject";
        $mail->Body = $emailBody; // Use the email template as the body

        // Send the email
        if ($mail->send()) {
            echo json_encode(["status" => "success", "message" => "Email sent successfully"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Email sending failed"]);
        }
    } catch (Exception $e) {
        echo json_encode(["status" => "error", "message" => "Error: {$mail->ErrorInfo}"]);
    }
}
?>
