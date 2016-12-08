<?php

namespace Domain\Client;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Domain\User\Client;
use Domain\User\User;

class ControllerTest extends \TestCase
{
    public function testCreate()
    {
        $headers = $this->getHeaders();
        $name = 'Cliente 01';
        $data = [
        'name'=>$name,
        'cpf'=>'12345678910'
        ];
        
        $this->post('client', $data, $headers);
        $this->seeStatusCode(200);
        $this->seeJson([
          'name'=>$name
        ]);
        $this->seeInDatabase('clients', [
          'name' => $name
        ]);
    }
  }
