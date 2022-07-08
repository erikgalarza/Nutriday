<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnvioCredenciales extends Mailable
{
    use Queueable, SerializesModels;


    public $subject = "MENSAJE RECIBIDO DE COLPOMED";
    public $email;
    public $password;
    public $nombre;

    public function __construct($nombre, $email, $password)
    {
        $this->$email = $email;
        $this->password = $password;
        $this->nombre = $nombre;
    }
    //este metodo hace la inyeccion de los datos recibidos en el constructor
    public function build()
    {
        return $this->view('email.plantillaEnvioCredenciales');
    }
}
