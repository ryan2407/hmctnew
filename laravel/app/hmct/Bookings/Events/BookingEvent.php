<?php namespace HMCT\Bookings\Events;


use HMCT\Mailers\BookingMailer;

class BookingEvent {

    protected $email;

    function __construct(BookingMailer $email)
    {
        $this->email = $email;
    }

    public function created($data)
    {
        $this->email->send($data);
    }

} 
