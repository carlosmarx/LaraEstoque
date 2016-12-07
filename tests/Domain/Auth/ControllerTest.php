<?php

namespace Domain\Auth;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Domain\User\User;

class ControllerTest extends \TestCase
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
        $user['email'] = 'admin2@admin2.com';
        factory(User::class)->create($user);
        $this->post('auth/login', $data);
        $this->seeStatusCode(200);
        $this->seeJson([
          'username'=>'admin2'
          ]);
    }

    public function testLoginWithEmail()
    {
      //Sets
        $data = [
        'username'=>'test@test.com',
        'password'=>'123456'
        ];
        $user =[
          'username'     => 'test',
          'password'  => bcrypt($data['password']),
          'email'     => 'test@test.com'
        ];
        factory(User::class)->create($user);
        $this->post('auth/login', $data);
        //Asserts
        $this->seeStatusCode(200);
        $this->seeJson([
          'username'=>'test'
        ]);
    }

    public function testCantLogin()
    {
      //Sets
      $data = [
        'username' => uniqid(),
        'password' => 'test'
      ];
      $this->post('auth/login', $data);
      //Asserts
      $this->seeStatusCode(401);
      
    }



}
