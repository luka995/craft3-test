<?php
namespace modules\testmod\models;


use GuzzleHttp\Client;


class DataReader 
{
    private static function createClient(string $baseUri): Client
    {
        $opts = [       
            'base_uri' => $baseUri,
            'cookies' => true,
        ];
        return new Client($opts);                    
    }
    
    /**        
        * @return array<mixed, object>
    */
    public static function readData(string $baseUri, string $url) : array
    {
        $client = self::createClient($baseUri);
        $response = $client->get($url);
        if (($status = $response->getStatusCode()) != 200) {
            throw new \Exception("Greška prilikom učitavanja podataka. Server je vratio kod " . $status);
        }
        $data = $response->getBody();
        return json_decode($data);
    }
    
}
