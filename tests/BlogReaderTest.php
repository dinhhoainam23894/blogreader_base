<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/11/18
 * Time: 11:54 PM
 */

class BlogReaderTest extends \PHPUnit\Framework\TestCase
{
    public $url = 'http://playswithpaper.blogspot.com/';
    public function testDetectUrl(){
         print_r(\Dok123\BlogReader\BlogReader::fromUrl($this->url));
    }
    public function testUrl(){
        $blog = new \Dok123\BlogReader\Adapters\BlogReaderAdapter($this->url);
        echo $blog->getResponseCode();
    }
    public function testRequestApi(){
        $sample = new \Dok123\BlogReader\Adapters\BlogReaderAdapter($this->url);
        $result = $sample->getInfo($url);
        $arr = ['id','blog'];
        $posts = $sample->posts($arr,null,2);
        print_r($posts);
        //print_r($sample->current_page->items);
//        $sample->next();
    }
}