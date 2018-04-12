<?php

use Dok123\BlogReader\BlogReader;
use Dok123\BlogReader\Exceptions\BLogNotFoundException;

/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/11/18
 * Time: 11:54 PM
 */

class BlogReaderTest extends \PHPUnit\Framework\TestCase
{
    public $url = 'http://playswithpaper.blogspot.com/';
    public function testException(){
        $this->expectException(BLogNotFoundException::class);
        $blog = BlogReader::fromUrl('wtf.com');
    }
    public function testBLogAdapter(){
        $blog = BlogReader::fromUrl($this->url);
        if($blog instanceof \Dok123\BlogReader\Adapters\BlogReaderAdapter){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }
    public function testApiV1Adapter(){
        $api_v1 = BlogReader::fromUrl('en.support.wordpress.com');
        if($api_v1 instanceof \Dok123\BlogReader\Adapters\WpApiV1){
            $this->assertTrue(true);
        }else{
            $this->assertTrue(false);
        }
    }
//    public function testDetectUrl(){
//         print_r(\Dok123\BlogReader\BlogReader::fromUrl($this->url));
//    }
//    public function testUrl(){
//        $blog = new \Dok123\BlogReader\Adapters\BlogReaderAdapter($this->url);
//        echo $blog->getResponseCode();
//    }

}