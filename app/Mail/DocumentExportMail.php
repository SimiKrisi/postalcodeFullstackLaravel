<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment; // Ez a legfontosabb import a csatolmányhoz!
use Illuminate\Queue\SerializesModels;

class DocumentExportMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Ebben a változóban tároljuk a memóriában lévő nyers PDF adatot.
     */
    public $pdfContent;

    /**
     * A konstruktor átveszi a Controllerből küldött PDF adatot.
     */
    public function __construct($pdfContent)
    {
        $this->pdfContent = $pdfContent;
    }

    /**
     * Az email borítékja (tárgy, feladó, stb.)
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Irányítószámok Export PDF',
        );
    }

    /**
     * Az email tartalma (itt hivatkozunk az előbb elkészített blade fájlra)
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.document_export',
        );
    }

    /**
     * A csatolmányok meghatározása.
     */
    public function attachments(): array
    {
        return [
            // A fromData() metódus mondja meg a Laravelnek, hogy ez egy memóriában lévő adat
            // A fn () => $this->pdfContent egy úgynevezett closure, így a legbiztonságosabb átadni.
            Attachment::fromData(fn () => $this->pdfContent, 'iranyitoszamok_export.pdf')
                ->withMime('application/pdf'),
        ];
    }
}