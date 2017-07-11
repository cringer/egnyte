<?php

namespace App\Mail;

use App\NewHire;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewHireAnnounced extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The newhire instance.
     *     
     * @var NewHire
     */
    public $newhire;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(NewHire $newhire)
    {
        $this->newhire = $newhire;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('IT Request - ' . $this->newhire->name)
                    ->view('emails.newhires.announce')
                    ->with([
                        'newhireName' => $this->newhire->name,
                        'newhirePosition' => $this->newhire->position->name,
                        'newhireStartDate' => $this->newhire->hire_date,
                        'hrName' => getenv('HR_NAME'),
                        'hrPosition' => getenv('HR_POSITION'),
                        'hrNumber' => getenv('HR_NUMBER')
                    ]);
    }
}
