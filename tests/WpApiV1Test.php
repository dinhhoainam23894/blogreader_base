<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/12/18
 * Time: 7:42 AM
 */

class WpApiV1Test extends \PHPUnit\Framework\TestCase
{
    public function testFromUrl(){
        $url = 'en.support.wordpress.com';
        $api_v1 = new \Dok123\BlogReader\Adapters\WpApiV1($url);
        $info = $api_v1->getInfo();
        print_r($info);
    }
}