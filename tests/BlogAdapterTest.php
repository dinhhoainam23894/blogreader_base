<?php

use Dok123\BlogReader\Adapters\BlogReaderAdapter;

/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/12/18
 * Time: 1:40 PM
 */

class BlogAdapterTest extends \PHPUnit\Framework\TestCase
{
    public $url = 'http://playswithpaper.blogspot.com/';
    public function testGetInfo(){
        $sample = new BlogReaderAdapter($this->url);
        $result = $sample->getInfo($this->url);
        if(is_object($result)){
            $this->assertTrue(true);
        }
//        $arr = ['id','blog'];
//        $posts = $sample->posts($arr,null,2);
//        print_r($posts);
//        //print_r($sample->current_page->items);
////        $sample->next();
    }
    public function testPosts(){
        $sample = new BlogReaderAdapter($this->url);
        $result = $sample->getInfo($this->url);
        $arr = ['id','blog'];
        $posts = $sample->posts($arr,null,2);
        if($posts != null){
            $this->assertTrue(true);
        }
        $sample->next();
        print_r($posts);
    }
}