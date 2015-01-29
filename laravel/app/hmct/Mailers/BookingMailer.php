<?php namespace HMCT\Mailers;


class BookingMailer implements MailInterface {

    public function send($data)
    {
        \Mail::send('emails.bookings.created', $this->getData($data), function($message) use($data) {
            $message->to([$data->user->email, 'ryanmurrayemail@gmail.com'])->subject('Your Booking Details');
        });
    }

    public function getData($data)
    {
        return [
          'user' => $data->user,
          'booking' => $data,
          'product' => $data->product
        ];
    }
}
