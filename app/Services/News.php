<?php
namespace App\Servces;

use Illuminate\Support\Facades\Http;

class News
{
    protected $apikey = 'bf1a2a4d3547463fa7946c5fc883db9d';
    protected $baseUrl = 'https://newsapi.org/v2/everything?q=bitcoin';
    public function __construct($apikey)
    {
        $this->apikey = $apikey;
    }

    public function last_news($bitcoin)
    {
        $response =  Http::baseUrl($this->baseUrl)
        ->get('news',[
            'q' => $bitcoin,
            'appid' => $this->apikey
        ]);

        return $response->json();
    }
}

