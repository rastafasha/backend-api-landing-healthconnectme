<?php

namespace App\Mail;

use App\Models\RegistroL;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InvitacionConsultorioMail extends Mailable
{
    use Queueable, SerializesModels;

    public $workshop;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(RegistroL $workshop)
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
        // return $this->from('citasmedicas@malcolmcordova.com', 'Registro de una nueva cita desde Health Connect')
        //     ->subject('Registro de una nueva cita')
        //     ->markdown('emails.admin.new_workshop_register' , ['workshop' => $this->workshop]);

            return $this
            ->subject('HealthConnectMe: Invitacion Consultorio')
            ->view('emails.admin.invitacion_consultorio',['workshop' => $this->workshop]);
        
    }
}
