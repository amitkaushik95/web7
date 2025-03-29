<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mailer
{
  private static function getMailer()
  {
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = SMTP_HOST;
    $mail->SMTPAuth = true;
    $mail->Username = SMTP_USER;
    $mail->Password = SMTP_PASS;
    $mail->SMTPSecure = SMTP_SECURE;
    $mail->Port = SMTP_PORT;

    return $mail;
  }

  public static function sendAdminNotification($data)
  {
    try {
      $mail = self::getMailer();

      $mail->setFrom(SMTP_USER, SITE_NAME);
      $mail->addAddress(SITE_EMAIL, 'Admin');
      $mail->addReplyTo($data['email'], $data['name']);

      $mail->isHTML(true);
      $mail->Subject = 'New Lead Submission - ' . SITE_NAME;
      $mail->Body = self::getAdminEmailTemplate($data);

      return $mail->send();
    } catch (Exception $e) {
      error_log("Admin Email Error: {$mail->ErrorInfo}");
      return false;
    }
  }

  public static function sendCustomerNotification($data)
  {
    try {
      $mail = self::getMailer();

      $mail->setFrom(SMTP_USER, SITE_NAME);
      $mail->addAddress($data['email'], $data['name']);

      $mail->isHTML(true);
      $mail->Subject = 'Thank you for your interest in ' . SITE_NAME;
      $mail->Body = self::getCustomerEmailTemplate($data);

      return $mail->send();
    } catch (Exception $e) {
      error_log("Customer Email Error: {$mail->ErrorInfo}");
      return false;
    }
  }

  private static function getAdminEmailTemplate($data)
  {
    return "
            <h2>New Lead Submission Details</h2>
            <p><strong>Name:</strong> {$data['name']}</p>
            <p><strong>Email:</strong> {$data['email']}</p>
            <p><strong>Phone:</strong> {$data['phone']}</p>
            <p><strong>Plan:</strong> {$data['plan_name']}</p>
            <p><strong>Message:</strong> {$data['message']}</p>
            <p><strong>Submitted at:</strong> {$data['created_at']}</p>
        ";
  }

  private static function getCustomerEmailTemplate($data)
  {
    return "
            <h2>Thank you for your interest in " . SITE_NAME . "</h2>
            <p>Dear {$data['name']},</p>
            <p>Thank you for your interest in our {$data['plan_name']} plan. We have received your inquiry and one of our representatives will contact you shortly.</p>
            <h3>Your Submission Details:</h3>
            <p><strong>Plan Selected:</strong> {$data['plan_name']}</p>
            <p><strong>Phone:</strong> {$data['phone']}</p>
            <p><strong>Message:</strong> {$data['message']}</p>
            <br>
            <p>Best regards,<br>" . SITE_NAME . " Team</p>
        ";
  }
}