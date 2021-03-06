<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailOrder extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    public $arrayCart;
    public $buyNow;
    public $flagCart;
    public $total;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data,$arrayCart,$buyNow,$flagCart,$total)
    {
        $this->data = $data;
        $this->arrayCart = $arrayCart;
        $this->buyNow = $buyNow;
        $this->flagCart = $flagCart;
        $this->total = $total;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env("MAIL_FROM_ADDRESS","xxxx@gmail.com"), env("MAIL_FROM_NAME","vuong"))
            ->view('send_mail');

    }
}
