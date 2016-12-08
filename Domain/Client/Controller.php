<?php

namespace Domain\Client;

use Domain\Client\Request;
// use Domain\Client\Client;

class Controller extends \Domain\Core\Http\Controller
{
    public function index()
    {
        # code...
    }

    public function store(Request $request)
    {
        $client = new Client;
        $client->name = $request->name;
        $client->save();
        return  $client;

        // return  ['name'=>$request->name];
    }

}
