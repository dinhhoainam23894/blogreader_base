<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 4/11/18
 * Time: 8:11 PM
 */

namespace Dok123\BlogReader\Adapters;


use GuzzleHttp\Client;

class BlogReaderAdapter extends ReaderAbstract
{
    public $current_page
            , $info
            , $labels = [];
    public function __construct($url)
    {
        $this->base_url = 'https://www.googleapis.com/blogger/v3/blogs/byurl?url=';
        $this->api_key = 'key=AIzaSyA7X1QazL98_MxcEDGTNh_2eQtrQ_K8l8Q';
        $this->url = $this->base_url.$url.'&'.$this->api_key;
    }


    public function posts(array $fields = null, $page = null, $per_page = 20)
    {
        $post_link = $this->info->posts->selfLink;
        $post_url = $post_link.'?'.$this->api_key.'&maxResults='.$per_page;
        if($fields != null){
            $str = implode(',',$fields);
            $post_url = $post_url.'&fields=kind,items('.$str.')';
        }
        if($page != null){
            $post_url = $post_url.'&pageToken='.$page;
        }
        $post_res = $this->requestApi($post_url);
        $this->current_page = $post_res;
        return $post_res;
    }

    public function next()
    {
        if(!empty($this->current_page->nextPageToken) && $this->current_page->nextPageToken != null){
            $this->posts(null,$this->current_page->nextPageToken);
            return true;
        }else{
            return false;
        }
    }

    public function current_page()
    {
        return $this->current_page->nextPageToken;
    }

    public function setKeyword($keyword)
    {
        $this->keyword = $keyword;
        $post_link = $this->info->posts->selfLink;
        $post_url = $post_link.'/search?'.$this->api_key.'&q='.$this->keyword;
        $post_res = $this->requestApi($post_url);
        $this->current_page = $post_res;
        return $post_res;
    }

    public function resetKeyword()
    {
        $this->keyword = '';
        $this->setKeyword($this->keyword);
    }

    public function labels($limit = 100)
    {
        $labels = [];
        // TODO: Implement labels() method.
        foreach ($this->current_page->items as $item){
            foreach ($item->labels as $label){
                if (count($labels) == $limit){
                    break;
                }
                $labels[] = $label;
            }
        }
        return $labels;
    }
}