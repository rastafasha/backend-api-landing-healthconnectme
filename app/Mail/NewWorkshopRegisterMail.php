<?php

namespace App\Mail;

use App\Models\RegistroL;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewWorkshopRegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    public $rlanding;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(RegistroL $rlanding)
    {
        $this->rlanding = $rlanding;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       
        return $this
        ->subject('Klyntic: Nuevo Registro ')
        ->view('emails.admin.new_workshop_register',['rlanding' => $this->rlanding]);
    }
}
