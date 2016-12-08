<?php

namespace Domain\Client;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Domain\User\Client;

class ControllerTest extends \TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreate()
    {
        $name = 'Cliente 01';
        $data = [
        'name'=>$name,
        'cpf'=>'12345678910'
        ];
        
        $this->post('client', $data);
        $this->seeStatusCode(200);
        $this->seeJson([
          'name'=>$name
        ]);
        $this->seeInDatabase('clients', [
          'name' => $name
        ]);
        
    }

  }
