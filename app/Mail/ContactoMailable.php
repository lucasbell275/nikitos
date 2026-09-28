<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Container\Attributes\Storage as AttributesStorage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Support\Facades\Storage;



class ContactoMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $contacto;
    /**
     * Create a new message instance.
     */
    public function __construct($contacto)
    {
        $this->contacto = $contacto;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {

        $nombreRemitente = $this->contacto->nombre ?? $this->contacto->razon_social;
        $tipoMensaje = $this->contacto->nombre ? 'Postulación CV de ' : 'Consulta de Ventas de ';

        return new Envelope(
            from: new Address('nikitos-user@ejemplo.com', 'Nikitos Web'),
            subject: $tipoMensaje . $nombreRemitente,
            replyTo: [
                new Address($this->contacto->email, $nombreRemitente)
            ],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'admin.contacto.contactomail',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {

        if (!empty($this->contacto->curriculum) && Storage::disk('public')->exists($this->contacto->curriculum)) {
            $nombreArchivo = preg_replace('/[^A-Za-z0-9]/', '_', $this->contacto->nombre ?? 'postulante');

            return [
                Attachment::fromStorageDisk('public', $this->contacto->curriculum)
                    ->as('CV_' . $nombreArchivo . '.' . pathinfo($this->contacto->curriculum, PATHINFO_EXTENSION))
            ];
        }

        return [];
    }
}
