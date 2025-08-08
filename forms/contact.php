<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace with your real receiving email address
  $receiving_email_address = 'tharindu.dissanayake@hotmail.com';

  // Check if the PHP Email Form library exists
  if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
      include($php_email_form);
  } else {
      die('Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  // Set email properties
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Add form messages
  $contact->add_message($_POST['name'], 'From');
  $contact->add_message($_POST['email'], 'Email');
  $contact->add_message($_POST['message'], 'Message', 10);

  // Uncomment below code to use SMTP (if needed)
  /*
  $contact->smtp = array(
    'host' => 'smtp.example.com',  // Replace with your SMTP host
    'username' => 'your-email@example.com', // Your SMTP username
    'password' => 'your-password', // Your SMTP password
    'port' => '587'  // Common ports: 587 (TLS), 465 (SSL)
  );
  */

  echo $contact->send();
?>
