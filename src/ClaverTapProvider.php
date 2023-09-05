<?php

namespace Flits\Clavertap;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7;
use Flits\Clavertap\ClaverTapException;

class ClaverTapProvider {
    public $BASE_URL = "https://in1.api.clevertap.com/";
    public $APP_ID;
    public $HEADERS;
    public $EXTRA_CONFIG;
    public $client;

    function __construct($config) {
        $this->APP_ID = $config['app_id'] ?? ''; // APP_ID from the moengage
        $this->HEADERS = $config['headers'] ?? []; // extra headers if you want to pass it in request
        $this->EXTRA_CONFIG = $config['EXTRA_CONFIG'] ?? []; // Extra Guzzle/client config for api call
        $this->setupBaseURL();
        $this->setupClient();
    }

    function setupClient() {
        $config = [
            'base_uri' => $this->BASE_URL,
            'timeout' => 2.0,
            'curl' => [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '', 
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            ],
            'headers' => $this->HEADERS,
        ];
        $config = array_merge($config, $this->EXTRA_CONFIG);
        $this->client = new Client($config);
    }

    function setupBaseURL() {
        $this->BASE_URL=$this->BASE_URL;
    }

    function setupURL() {
        $this->URL = str_replace('<APP_ID>', $this->APP_ID, $this->URL);
    }

    function POST($payload) {
        try {
            $this->setupURL();
            $response = $this->client->request($this->METHOD,  $this->URL, [
                'body' => $payload,
            ]);
        } catch (RequestException $ex) {
            throw new ClaverTapException($ex->getResponse()->getBody()->getContents(), $ex->getResponse()->getStatusCode());
        }
        if ($response->getStatusCode() != 200) {
            throw new ClaverTapException($response->getBody()->getContents(), $response->getStatusCode());
        }
        return json_decode($response->getBody()->getContents());
    }
}