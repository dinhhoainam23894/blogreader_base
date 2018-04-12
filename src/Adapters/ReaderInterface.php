<?php
/**
 * Created by PhpStorm.
 * User: hocvt
 * Date: 3/14/18
 * Time: 14:59
 */

namespace Dok123\BlogReader\Adapters;


interface ReaderInterface{
    public function getInfo();
    public function posts(array $fields = null, $page = null, $per_page = 20);
    public function next();
    public function current_page();
    public function setKeyword($keyword);
    public function resetKeyword();
    public function labels($limit = 100);
}