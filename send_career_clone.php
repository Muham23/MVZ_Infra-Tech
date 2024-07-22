<?php
 $jsonString = $_POST['data'];
 $data = json_decode($jsonString, true);
 $firstName = filter_var($data['FirstName'], FILTER_SANITIZE_STRING);
 $lastName = filter_var($data['LastName'], FILTER_SANITIZE_STRING);
 $name = $firstName . ' ' . $lastName; // Concatenate with a space between first and last names 
 $email = filter_var($data['Email'], FILTER_SANITIZE_EMAIL);
 $mobileno = filter_var($data['MobileNo'], FILTER_SANITIZE_STRING);
 $dateOfBirth = filter_var($data['DOB'], FILTER_SANITIZE_STRING);
 $totalExperience = filter_var($data['ExperienceYears'], FILTER_SANITIZE_NUMBER_INT) . ' per years';
 $currentCompany = filter_var($data['CurrentCompany'], FILTER_SANITIZE_STRING);
 $currentPosition = filter_var($data['CurrentPosition'], FILTER_SANITIZE_STRING);
 $currentSalary = filter_var($data['CurrentSalary'], FILTER_SANITIZE_NUMBER_INT) . ' per annum';
 $expectedSalary = filter_var($data['ExpectedSalary'], FILTER_SANITIZE_NUMBER_INT) . ' per annum'; 
 $jobType   = filter_var($data['jobType'], FILTER_SANITIZE_STRING); 

 // Handle array data
 $skills = $data['skills'];
 $experienceDetails = $data['experiences'];
 $educationDetails = $data['educations'];
$to = 'patelbilal15@gmail.com'; // Corrected variable name for email sender

// Email details
$subject = 'Candidate Application Details';
$mainEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
$year = date("Y");
// Define a boundary
$boundary = md5(time());
// Check if the attachment was uploaded successfully
if ($_FILES['attachment'] && $_FILES['attachment']['error'] == UPLOAD_ERR_OK) {
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
                        <th style="text-align: left; padding: 8px; background-color: #f8f9fa; border-bottom: 1px solid #dee2e6;">Mobile No</th>
                        <td style="padding: 8px; border-bottom: 1px solid #dee2e6;">' . htmlspecialchars($mobileno) . '</td>
                    </tr>
                    <tr>
                        <th style="text-align: left; padding: 8px; background-color: #f8f9fa; border-bottom: 1px solid #dee2e6;">Date of Birth</th>
                        <td style="padding: 8px; border-bottom: 1px solid #dee2e6;">' . htmlspecialchars($dateOfBirth) . '</td>
                    </tr>
                     <tr>
                        <th style="text-align: left; padding: 8px; background-color: #f8f9fa; border-bottom: 1px solid #dee2e6;">Apply for Job</th>
                        <td style="padding: 8px; border-bottom: 1px solid #dee2e6;">' . htmlspecialchars($jobType) . '</td>
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
                        <th style="text-align: left; padding: 8px; background-color: #f8f9fa; border-bottom: 1px solid #dee2e6;">Current Position</th>
                        <td style="padding: 8px; border-bottom: 1px solid #dee2e6;">' . htmlspecialchars($currentPosition) . '</td>
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
    $clonedata = fread($file, filesize($file_tmp));
    fclose($file);

    $clonedata = chunk_split(base64_encode($clonedata));

    $email_body .= "Content-Type: {$file_type}; name=\"{$file_name}\"\r\n";
    $email_body .= "Content-Disposition: attachment; filename=\"{$file_name}\"\r\n";
    $email_body .= "Content-Transfer-Encoding: base64\r\n\r\n";
    $email_body .= $clonedata . "\r\n\r\n";
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
