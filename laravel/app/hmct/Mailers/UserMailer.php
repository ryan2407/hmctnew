<?php namespace HMCT\Mailers;


class UserMailer implements MailInterface {

    public function send($data)
    {
        \Mail::send('emails.signup', $this->getData($data), function($message) use($data) {
           $message->to([$data['email'], 'ryanmurrayemail@gmail.com'])->subject('Welcome to Hire My Camper Trailer');
        });
    }

    public function getData($data)
    {
        return $data->toArray();
    }
}
