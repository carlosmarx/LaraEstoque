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

    public function testCreateWithCpf()
    {
        $headers = $this->getHeaders();
        $name = 'Cliente 01';
        $cpf  = '81594380368';
        
        $data = [
            'name'=>$name,
            'cpf'=>$cpf
        ];
        
        $this->post('client', $data, $headers);
        // dd($this->response->getContent());
        $this->seeStatusCode(200);
        $this->seeJson([    
          'name'=>$name,
          'cpf'=>$cpf
        ]);
        $this->seeInDatabase('clients', [
          'name' => $name,
          'cpf' => $cpf
        ]);
    }

    public function testCreateWithCpfAndBirthdate()
    {
        $headers = $this->getHeaders();
        $name       =    'Cliente 01';
        $cpf        =    '81594380368';
        $birthdate  =    '1980-10-30';
        
        $data = [
            'name'=>$name,
            'cpf'=>$cpf,
            'birthdate'=>$birthdate,
        ];
        
        $this->post('client', $data, $headers);
        // dd($this->response->getContent());
        $this->seeStatusCode(200);
        $this->seeJson([    
          'name'=>$name,
          'cpf'=>$cpf,
          'birthdate'=>$birthdate,
        ]);
        $this->seeInDatabase('clients', [
          'name' => $name,
          'cpf' => $cpf,
          'birthdate' => $birthdate
        ]);
    }

  }
