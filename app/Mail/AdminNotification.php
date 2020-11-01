<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminNotification extends Mailable implements ShouldQueue
{
    use Queueable;
    use SerializesModels;

    public $fields = [];
    public $subject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $fields, string $subject)
    {
        $this->fields = $fields;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.admin-notification');
    }
}
