# themosis-mailgun-wrapper
A simple Mailgun wrapper for [Themosis Framework](http://framework.themosis.com/).

### Quick Setup

Open up `.env.*.php` in your project root and add the following lines at the end of array:

```php
    'MAILGUN_KEY'    => 'your mailgun key',
    'MAILGUN_DOMAIN' => 'your mailgun domain',
```

### Example usage

```php
use Latehours\Mailgun\Mail;

$mail = new Mail();

$message = ['greeting' => 'Thanks for registering!'];

// 'emails.greeting' is a Scout template
// $message is an array passed to the view
$mail->send('email.greeting', $message, [
    'from'    => 'Admin <admin@dude.app>',
    'to'      => 'Awesome Dude <newdude@gmail.com>',
    'subject' => 'Thanks for registering!'
]);

```
