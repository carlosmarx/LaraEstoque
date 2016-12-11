<?php

namespace Domain\Client;

use Domain\Client\Requests\Store;
use Domain\Client\Client;
use Domain\Core\Http\Controller as BaseController;

class Controller extends BaseController
{
    public function index()
    {
        # code...
    }

    public function store(Store $request)
    {
        $data = $request->all();
        $client = new Client;
        $client->fill($data);
        $client->save();
        return  $client;

        // return  ['name'=>$request->name];
    }

}
