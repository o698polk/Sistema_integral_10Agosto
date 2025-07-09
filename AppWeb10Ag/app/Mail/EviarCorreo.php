<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\HelpFuntionController;
use Illuminate\Support\Facades\File;
use App\Models\Usuario;
use App\Models\Estudiante;
use App\Models\Asistencia;
class EviarCorreo extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    use Queueable, SerializesModels;

    public $dato; // Definimos la variable que pasaremos al correo

    /**
     * Create a new message instance.
     */
    public function __construct($id)
    {
        // Aquí asignamos el valor a la variable $dato
        $this->dato = Asistencia::with(['estudiante', 'curso', 'usuario'])
            ->find($id);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Notificación de Asistencia - Colegio 10 de Agosto',
        );
    }

    /**
     * Get the message content definition.
     */
    public function build()
    {
        return $this->view('asistencias.correoenviar')
                    ->with('dato', $this->dato); // Pasamos la variable $dato a la vista
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
