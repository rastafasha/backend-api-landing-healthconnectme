<?php

namespace App\Mail;

use App\Models\Workshop;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewWorkshopRegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    public $workshop;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Workshop $workshop)
    {
        $this->workshop = $workshop;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('registro@health-connect.me', 'Sistema de Registro desde Health-connect.me')
            ->subject('Registro de un nuevo usuario para Health-connect.me')
            ->markdown('emails.admin.new_workshop_register' , ['workshop' => $this->workshop]);
    }
}
