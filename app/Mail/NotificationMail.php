<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $city = null;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($city)
    {
        $this->city = $city;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("{$this->city} mit freien Terminen")->from('info@orlyapps.de')->markdown('mail', ['city' => $this->city]);
    }
}
