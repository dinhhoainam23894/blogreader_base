<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/11/18
 * Time: 8:12 PM
 */

namespace Dok123\BlogReader;


use Dok123\BlogReader\Adapters\BlogReaderAdapter;
use Dok123\BlogReader\Adapters\WpApiV1;
use Dok123\BlogReader\Adapters\WpApiV2;
use Dok123\BlogReader\Exceptions\BLogNotFoundException;
use PHPUnit\Runner\Exception;

class BlogReader
{
    public static function fromUrl($url){
        $blog = new BlogReaderAdapter($url);
        $api_v1 = new WpApiV1($url);
        $api_v2 = new WpApiV2($url);
        try{
            $blog->getResponseCode();
            return $blog;
        }catch (\Exception $e){
            try{
                $api_v1 = new WpApiV1($url);
                return $api_v1;
            }catch (\Exception $e){
                throw new BLogNotFoundException('Not found');
            }
        }

     }
}