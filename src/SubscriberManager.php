<?php
namespace Senthil\DIExample;

use PDO;
use Senthil\DIExample\Mailer;

class SubscriberManager {
	protected $pdo;
	protected $config;

	public function __construct($config) {
		$this->config = $config;
		$this->pdo = new PDO($this->config['dsn']);

	}

	public function notifySubscribers() {

		// Get list of subscribers from datasource.

		$query = 'SELECT * FROM subscribers';
		$subscribers = $this->pdo->query($query);

		// Sender and Subject of the mail.
		$sender = 'subscriptions@example.com';
		$subject = 'New Article alert for you!';

		

		foreach ($subscribers as $subscriber) {
		// Customized message of the mail.
		 $message = sprintf("Hello %s! A new article has been published in the domain you have subscribed for.."
  , $subscriber['name']);
  
		  
		 $mailer = new Mailer($this->config['hostname'],
		        $this->config['smtp_user'],
		        $this->config['smtp_password'],
		        $this->config['smtp_port'],
		    $this->config['logPath']);

		  $mailer->sendMail($sender, $subscriber['email'], $subject, $message);


		}

	}
}