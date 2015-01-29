<?php namespace HMCT\Users\Events;


use HMCT\Mailers\UserMailer;

class UserEvent {

    protected $email;

    function __construct(UserMailer $email)
    {
        $this->email = $email;
    }

    public function created($user)
    {
        $this->email->send($user);
    }

} 
