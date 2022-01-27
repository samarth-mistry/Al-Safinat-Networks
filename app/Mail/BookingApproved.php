<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingApproved extends Mailable
{
    use Queueable, SerializesModels;
    public $booking;
    public $unit;

    public function __construct($booking, $unit)
    {
        $this->booking = $booking;
        $this->unit = $unit;
    }

    public function build()
    {
        return $this->view('emails.booking_approved');
    }
}
