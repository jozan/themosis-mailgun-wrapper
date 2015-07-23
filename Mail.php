<?php

namespace Latehours\Mailgun;

use Mailgun\Mailgun;
use Themosis\Facades\View;

class Mail {

    protected $mail;
    protected $key;
    protected $domain;

    /**
     * Create a new Mail instance.
     *
     * @param  string  $key
     * @param  string  $domain
     */
    public function __construct(string $key = null, string $domain = null)
    {
        $this->key = ($key) ?: getenv('MAILGUN_KEY');
        $this->domain = ($domain) ?: getenv('MAILGUN_DOMAIN');

        $this->mail = new Mailgun($this->key);
    }

    /**
     * Send a new message using a view.
     *
     * @param  string  $view
     * @param  array  $data
     * @param  array  $details
     * @return mixed
     */
    public function send($view, array $data, array $details)
    {
        $details['html'] = View::make($view, $data)->render();

        return $this->mail->sendMessage($this->domain, $details);
    }

}
