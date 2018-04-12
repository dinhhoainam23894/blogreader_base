<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/11/18
 * Time: 8:11 PM
 */

namespace Dok123\BlogReader\Adapters;


class WpApiV1 extends ReaderAbstract
{

    public $current_page
    , $info;
    public function __construct($url)
    {
        $this->base_url = 'https://public-api.wordpress.com/rest/v1/sites/';
        $this->url = $this->base_url.$url;
    }
    public function posts(array $fields = null, $page = null, $per_page = 20)
    {
        // TODO: Implement posts() method.
    }

    public function next()
    {
        // TODO: Implement next() method.
    }

    public function current_page()
    {
        // TODO: Implement current_page() method.
    }

    public function setKeyword($keyword)
    {
        // TODO: Implement setKeyword() method.
    }

    public function resetKeyword()
    {
        // TODO: Implement resetKeyword() method.
    }

    public function labels($limit = 100)
    {
        // TODO: Implement labels() method.
    }
}