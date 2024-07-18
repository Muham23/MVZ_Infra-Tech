<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);
    $attachment = $_FILES['attachment'];

    if ($email && !empty($subject) && !empty($message) && $attachment['error'] == UPLOAD_ERR_OK) {
        $file_tmp = $attachment['tmp_name'];
        $file_name = $attachment['name'];
        $file_size = $attachment['size'];
        $file_type = $attachment['type'];
        $file_error = $attachment['error'];

        $boundary = md5(time());

        $headers = "From: patelbilal15@gmail.com\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: multipart/mixed; boundary=\"{$boundary}\"\r\n";

        $body = "--{$boundary}\r\n";
        $body .= "Content-Type: text/plain; charset=UTF-8\r\n";
        $body .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
        $body .= $message . "\r\n\r\n";
        $body .= "--{$boundary}\r\n";

        $file = fopen($file_tmp, "rb");
        $data = fread($file, filesize($file_tmp));
        fclose($file);

        $data = chunk_split(base64_encode($data));

        $body .= "Content-Type: {$file_type}; name=\"{$file_name}\"\r\n";
        $body .= "Content-Disposition: attachment; filename=\"{$file_name}\"\r\n";
        $body .= "Content-Transfer-Encoding: base64\r\n\r\n";
        $body .= $data . "\r\n\r\n";
        $body .= "--{$boundary}--";

        if (mail($email, $subject, $body, $headers)) {
            echo "Email sent successfully.";
        } else {
            echo "Failed to send email.";
        }
    } else {
        echo "Invalid input or file upload error.";
    }
} else {
    echo "Invalid request method.";
}
?>
