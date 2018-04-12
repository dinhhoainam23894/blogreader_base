<?php
/**
 * Created by PhpStorm.
 * User: hocvt
 * Date: 3/14/18
 * Time: 15:00
 */

namespace Dok123\BlogReader\Adapters;


use GuzzleHttp\Client;

abstract class ReaderAbstract implements ReaderInterface {

    public  $base_url
            , $api_key
            , $url
            , $keyword;

    public function getInfo()
    {
        // TODO: Implement getInfo() method.
        $url = $this->url;
        $total_info = $this->requestApi($url);
        $this->info = $total_info;
        return $total_info;
    }

    public function requestApi($url){

        $client = new Client();
        $response = $client->request('GET', $url);
        $response = json_decode($response->getBody());
        return $response;
    }

    public function getResponseCode(){
        $client = new Client();
        $response = $client->request('GET', $this->url);
        $response = $response->getStatusCode();
        if ($response  == 200){
            return true;
        }
        return false;
    }
}