<?php namespace HMCT\Users\Repo;


interface UserRepositoryInterface {
    public function getAll();
    public function createUser($input);
    public function getById($id);
}
