<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailable extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $name;
    public $orderId;

    public function __construct($name, $orderId)
    {
        //
        
        $this->orderId = $orderId;
        $this->name = $name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'donotreply@bazaar24x7.com';
      $name = 'Bazaar 24X7';
      $subject = 'Application Approved';
      return $this->view('templates.deliver')
      ->from($address, $name)
      ->subject($subject);
    }
}
