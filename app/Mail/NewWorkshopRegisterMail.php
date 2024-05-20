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
        return $this->from('soporte@tu-managerdigital.com', 'Sistema Automatizado de Envio de Notificaciones por correo')
            ->subject('Registro de un nuevo usuario para el workshop')
            ->markdown('emails.admin.new_workshop_register' , ['workshop' => $this->workshop]);
    }
}
