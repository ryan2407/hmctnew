<?php namespace HMCT\Bookings\Repo;


interface BookingRepositoryInterface {
    public function getAll();
    public function createBooking($input);
    public function manualBooking($input);
    public function getById($id);
}
