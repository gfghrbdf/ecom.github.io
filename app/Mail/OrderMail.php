<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        // $this->data = $data;
        $order = $data;

        return $this->from('touhidmunna591@gmail.com')->view('mail.order_mail',compact('order'))->subject('Easy Online Shop');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        
    }
}
