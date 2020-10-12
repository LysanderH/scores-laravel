<?php

namespace App\Mail;

use App\Models\Match;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MatchAdded extends Mailable
{
    use Queueable, SerializesModels;

    public $match;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Match $match)
    {
        $this->match = $match;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('lysander.hans@student.hepl.be')->view('emails.matches.added');
    }
}
