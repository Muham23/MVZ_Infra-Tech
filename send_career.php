<?php
// Define your dynamic variables
$name = 'Bilal Yusuf';
$phone = '+91 7820071715';
$dateOfBirth = '22 Feb 1994';
$totalExperience = '5 years 5 months';
$currentCompany = 'Peach Software';
$currentSalary = '8 Lakh per annum';
$expectedSalary = '12 Lakh per annum';
$skills = ['Cricket', 'Prompt Engineering in AI'];
$experienceDetails = [
    '2 Year JS TechNo, Ahmedabad (Php Developer)',
    'Continue Working 12th March 2023 Peach Software'
];
$educationDetails = ['BCA', 'MSC IT'];
$mainEmail = 'patelbilal15@gmail.com'; // Corrected variable name for email sender

// Email details
$subject = 'Candidate Application Details';
$to = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$year = date("Y");
// Define a boundary
$boundary = md5(time());
// Check if the attachment was uploaded successfully
if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] == UPLOAD_ERR_OK) {
    $attachment = $_FILES['attachment'];
    $message = '
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidate Application Details</title>
</head>
<body style="font-family: Arial, sans-serif; line-height: 1.6; color: #333333; margin: 0; padding: 0; background-color: #f4f4f4;">
    <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff;">
        <div style="background-color: rgb(0, 33, 87); color: #ffffff; text-align: center; padding: 20px;">
            <img src="https://mvzgreeninfra.com/images/logo/LOGO-white.png" alt="Company Logo" style="max-width: 150px; height: auto;">
            <h1 style="margin: 10px 0;">Candidate Application Details</h1>
        </div>
        
        <div style="padding: 20px;">
            <div style="margin-bottom: 20px;">
                <h2 style="color: rgb(0, 33, 87); border-bottom: 1px solid rgb(0, 33, 87); padding-bottom: 5px;">Personal Information</h2>
                <table style="width: 100%; border-collapse: collapse;">
                    <tr>
                        <th style="text-align: left; padding: 8px; background-color: #f8f9fa; border-bottom: 1px solid #dee2e6;">Name</th>
                        <td style="padding: 8px; border-bottom: 1px solid #dee2e6;">' . htmlspecialchars($name) . '</td>
                    </tr>
                    <tr>
                        <th style="text-align: left; padding: 8px; background-color: #f8f9fa; border-bottom: 1px solid #dee2e6;">Email</th>
                        <td style="padding: 8px; border-bottom: 1px solid #dee2e6;">' . htmlspecialchars($mainEmail) . '</td>
                    </tr>
                    <tr>
                        <th style="text-align: left; padding: 8px; background-color: #f8f9fa; border-bottom: 1px solid #dee2e6;">Phone</th>
                        <td style="padding: 8px; border-bottom: 1px solid #dee2e6;">' . htmlspecialchars($phone) . '</td>
                    </tr>
                    <tr>
                        <th style="text-align: left; padding: 8px; background-color: #f8f9fa; border-bottom: 1px solid #dee2e6;">Date of Birth</th>
                        <td style="padding: 8px; border-bottom: 1px solid #dee2e6;">' . htmlspecialchars($dateOfBirth) . '</td>
                    </tr>
                </table>
            </div>

            <div style="margin-bottom: 20px;">
                <h2 style="color: rgb(0, 33, 87); border-bottom: 1px solid rgb(0, 33, 87); padding-bottom: 5px;">Professional Summary</h2>
                <table style="width: 100%; border-collapse: collapse;">
                    <tr>
                        <th style="text-align: left; padding: 8px; background-color: #f8f9fa; border-bottom: 1px solid #dee2e6;">Total Experience</th>
                        <td style="padding: 8px; border-bottom: 1px solid #dee2e6;">' . htmlspecialchars($totalExperience) . '</td>
                    </tr>
                    <tr>
                        <th style="text-align: left; padding: 8px; background-color: #f8f9fa; border-bottom: 1px solid #dee2e6;">Current Company</th>
                        <td style="padding: 8px; border-bottom: 1px solid #dee2e6;">' . htmlspecialchars($currentCompany) . '</td>
                    </tr>
                    <tr>
                        <th style="text-align: left; padding: 8px; background-color: #f8f9fa; border-bottom: 1px solid #dee2e6;">Current Salary</th>
                        <td style="padding: 8px; border-bottom: 1px solid #dee2e6;">' . htmlspecialchars($currentSalary) . '</td>
                    </tr>
                    <tr>
                        <th style="text-align: left; padding: 8px; background-color: #f8f9fa; border-bottom: 1px solid #dee2e6;">Expected Salary</th>
                        <td style="padding: 8px; border-bottom: 1px solid #dee2e6;">' . htmlspecialchars($expectedSalary) . '</td>
                    </tr>
                </table>
            </div>

            <div style="margin-bottom: 20px;">
                <h2 style="color: rgb(0, 33, 87); border-bottom: 1px solid rgb(0, 33, 87); padding-bottom: 5px;">Skills</h2>
                <ul style="padding-left: 20px;">
                    ' . implode('', array_map(function($skill) {
                        return '<li>' . htmlspecialchars($skill) . '</li>';
                    }, $skills)) . '
                </ul>
            </div>

            <div style="margin-bottom: 20px;">
                <h2 style="color: rgb(0, 33, 87); border-bottom: 1px solid rgb(0, 33, 87); padding-bottom: 5px;">Experience Details</h2>
                ' . implode('', array_map(function($detail) {
                    return '<p>' . htmlspecialchars($detail) . '</p>';
                }, $experienceDetails)) . '
            </div>

            <div style="margin-bottom: 20px;">
                <h2 style="color: rgb(0, 33, 87); border-bottom: 1px solid rgb(0, 33, 87); padding-bottom: 5px;">Education Details</h2>
                ' . implode('', array_map(function($education) {
                    return '<p>' . htmlspecialchars($education) . '</p>';
                }, $educationDetails)) . '
            </div>

            <div style="margin-bottom: 20px;">
                <h2 style="color: rgb(0, 33, 87); border-bottom: 1px solid rgb(0, 33, 87); padding-bottom: 5px;">Attached Resume</h2>
                <p>Please find the candidate\'s resume attached to this email.</p>
            </div>
        </div>
        
        <div style="background-color: rgb(0, 33, 87); color: #ffffff; text-align: center; padding: 20px;">
            <p style="margin: 10px 0;">© ' . htmlspecialchars($year) . ' Your Mvn Green Infra Limited. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
';



    $file_tmp = $attachment['tmp_name'];
    $file_name = $attachment['name'];
    $file_size = $attachment['size'];
    $file_type = $attachment['type'];
    $file_error = $attachment['error'];
    
    // Construct the email headers
    $headers = "From: patelbilal15@gmail.com\r\n";
    $headers .= "Reply-To: patelbilal15@gmail.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: multipart/mixed; boundary=\"{$boundary}\"\r\n";


    $email_body = "--{$boundary}\r\n";
    $email_body .= "Content-Type: text/html; charset=UTF-8\r\n";
    $email_body .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $email_body .= $message . "\r\n\r\n";
    $email_body .= "--{$boundary}\r\n";

    $file = fopen($file_tmp, "rb");
    $data = fread($file, filesize($file_tmp));
    fclose($file);

    $data = chunk_split(base64_encode($data));

    $email_body .= "Content-Type: {$file_type}; name=\"{$file_name}\"\r\n";
    $email_body .= "Content-Disposition: attachment; filename=\"{$file_name}\"\r\n";
    $email_body .= "Content-Transfer-Encoding: base64\r\n\r\n";
    $email_body .= $data . "\r\n\r\n";
    $email_body .= "--{$boundary}--";
    // Send email
    if (mail($to, $subject, $email_body, $headers)) {
        echo 'Email sent successfully.';
    } else {
        echo 'Failed to send email.';
    }
} else {
    echo 'Failed to upload attachment or attachment is missing.';
}
?>
