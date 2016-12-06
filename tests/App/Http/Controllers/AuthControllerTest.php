<?php

namespace App\Http\AuthControllerTest;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class AuthControllerTest extends \TestCase
{
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testLogin()
    {
        $data = [
        'username'=>'admin2',
        'password'=>'123456'
        ];

        $user = $data;
        $user['password'] = bcrypt($user['password']);
        $user['email'] = 'test@test.com';

        factory(User::class)->create($user);

        $this->post('auth/login', $data);
        $this->seeStatusCode(200);
        $this->seeJson([
          'username'=>'admin2'
          ]);
    }

}
