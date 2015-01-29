<?php namespace HMCT\Mailers;


interface MailInterface {

    public function send($data);
    public function getData($data);

} 
