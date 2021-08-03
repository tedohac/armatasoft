<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Auth;

class MainController extends Controller
{
    public function main()
    {
        
        $_API_URL  = "https://jsonplaceholder.typicode.com/posts?userId=".Auth::User()->id;
        
        $client = new Client(); //GuzzleHttp\Client
        $response = $client->get("https://jsonplaceholder.typicode.com/posts?userId=".Auth::User()->id, []);

        $response = json_decode((string) $response->getBody(), true);

        // print_r($response);

        return view('page.main', [
            'response' => $response
        ]);
    }
}
