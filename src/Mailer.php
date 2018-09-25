<?php
namespace Senthil\DIExample;

class Mailer {

  protected $hostname;
  protected $smtp_user;
  protected $smtp_password;
  protected $smtp_port;
  protected $logPath;

  public function __construct() {
    $this->hostname = 'smtp.blogtrottr.com';
    $this->smtp_user = 'smtpuser';
    $this->smtp_password = 'smtppass';
    $this->smtp_port = '465';
    // Log messages for demo in a log file.
    $this->logPath = __DIR__.'../../logs/emails.log';
  }

  public function sendMail($sender, $recipient, $subject, $body) {
    $logLines = array();
    $logLines[] = sprintf(
      '[%s][%s:%s@%s:%s][From: %s][To: %s][Subject: %s]',
      date('Y-m-d H:i:s'),
      $this->hostname,
      $this->smtp_user,
      $this->smtp_password,
      $this->smtp_port,
      $sender,
      $recipient,
      $subject
    );
    $logLines[] = '---------------';
    $logLines[] = $body;
    $logLines[] = '---------------';

    $fh = fopen($this->logPath, 'a');
    fwrite($fh, implode("\n", $logLines)."\n");

  }

}
