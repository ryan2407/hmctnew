<?php namespace HMCT\Users\Repo;

use HMCT\Users\User;

class UserRepository implements UserRepositoryInterface {

    public function getAll()
    {
        return User::all();
    }

    public function createUser($input)
    {
        $user = User::create([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'password' => \Hash::make($input['password'])
        ]);
        \Auth::login($user);
        \Event::fire('user.created', [$user]);
        return $user;
    }

    public function getById($id)
    {
        return User::find($id);
    }
}
