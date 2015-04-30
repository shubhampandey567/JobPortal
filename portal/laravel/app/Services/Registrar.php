<?php namespace App\Services;

use App\Employer;
use App\User;
use Monolog\Handler\SyslogUdp\UdpSocket;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
            'authority' => 'required|min:3|max:255',
			'name' => 'required|max:255|min:3',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6',
            'contact' => 'required|numeric|min:1000000000',
            'location' => 'required|max:255|min:3',
            'qualification' => 'required|max:255|min:2',
            'university' => 'required|max:255|min:2',
            'marks' => 'required|min:0|max:100',
            'skill' => 'required|min:3|max:255'
		]);
	}
    public function create(array $data)
    {
        return User::create([
            'authority' => $data['authority'],
             'name' => $data['name'],
             'contact'   => $data['contact'],
             'location'   => $data['location'],
             'qualification'   => $data['qualification'],
             'university'   => $data['university'],
            'marks'   => $data['marks'],
             'skill'   => $data['skill'],
             'logo'   => $data['logo'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }


    public function validatorEmployer(array $data)
    {
        return Validator::make($data, [
            'authority' => 'required|min:3|max:255',
            'name' => 'required|max:255|min:3',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'contact' => 'required|numeric|min:1000000000',
            'location' => 'required|max:255|min:3',
            'skill' => 'required|min:3|max:255'
        ]);
    }
    public function createEmployer(array $data)
    {
        return User::create([
            'authority' => $data['authority'],
            'name' => $data['name'],
            'contact'   => $data['contact'],
            'location'   => $data['location'],
            'qualification'   => 'employer',
            'university'   => 'employer',
            'marks'   => 0,
            'skill'   => $data['skill'],
            'logo'   => $data['logo'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

}
