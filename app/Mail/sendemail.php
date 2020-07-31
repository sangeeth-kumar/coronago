<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendemail extends Mailable
{
    use Queueable, SerializesModels;

    public $dataArray;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->dataArray=$data;
     
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $dataArray = $this->dataArray;
        // dd($dataArray);
        return $this->view('mail',compact('dataArray'));
    }
}
