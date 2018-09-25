<?php
namespace Senthil\DIExample;

use PDO;
use Senthil\DIExample\Mailer;

class SubscriberManager {
	protected $pdo;

	public function __construct() {

		$dsn = 'sqlite:' . __DIR__ . '/../data/database.sqlite';
		$this->pdo = new PDO($dsn);

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
  
		  
		 $mailer = new Mailer();
		  $mailer->sendMail($sender, $subscriber['email'], $subject, $message);


		}

	}
}