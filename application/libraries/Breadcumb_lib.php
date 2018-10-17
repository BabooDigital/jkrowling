<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Breadcumb_lib {

    private $breadcrumbs = array();
    private $tags = "";

    function __construct()
    {
        $this->tags['open'] = "<ol itemscope itemtype='http://schema.org/BreadcrumbList' class='breadcrumb p-5'>";
        $this->tags['close'] = "</ol>";
        $this->tags['itemOpen'] = "<li class='breadcrumb-item' itemtype='http://schema.org/ListItem' itemprop='itemListElement' itemscope>";
        $this->tags['itemClose'] = "</li>";
    }

    function add($title, $href){
        if (!$title OR !$href) return;
        $this->breadcrumbs[] = array('title' => $title, 'href' => $href);
    }

    function openTag($tags=""){
        if(empty($tags)){
            return $this->tags['open'];
        }else{
            $this->tags['open'] = $tags;
        }
    }

    function closeTag($tags=""){
        if(empty($tags)){
            return $this->tags['close'];
        }else{
            $this->tags['close'] = $tags;
        }
    }

    function itemOpenTag($tags=""){
        if(empty($tags)){
            return $this->tags['itemOpen'];
        }else{
            $this->tags['itemOpen'] = $tags;
        }
    }

    function itemCloseTage($tags=""){
        if(empty($tags)){
            return $this->tags['itemClose'];
        }else{
            $this->tags['itemClose'] = $tags;
        }
    }

    function render(){
        if(!empty($this->tags['open'])){
            $output = $this->tags['open'];
        }else{
            $output = "<ol itemscope itemtype='http://schema.org/BreadcrumbList' class='breadcrumb'>";
        }

        $count = count($this->breadcrumbs)-1;
        $position = count($this->breadcrumbs);
        foreach($this->breadcrumbs as $index => $breadcrumb){
            $indexPos = $index+1;
            if($index == $count){
                $output .= "<li class='breadcrumb-item active' itemtype='http://schema.org/ListItem' itemprop='itemListElement' itemscope>";
                $output .= "<a class='".$breadcrumb['href']."' itemprop='item'>";
                $output .= "<span itemprop='name'>".$breadcrumb['title']."</span>";
                $output .= "<meta content='".$position."' itemprop='position'>";
                $output .= '</a>';
                $output .= '</li>';
            }else{
                $output .= ($this->tags['itemOpen'])?$this->tags['itemOpen']:'<li class="breadcrumb-item" itemtype="http://schema.org/ListItem" itemprop="itemListElement" itemscope>';
                $output .= '<a href="'.$breadcrumb['href'].'" itemprop="item">';
                $output .= "<span itemprop='name'>".$breadcrumb['title']."</span>";
                $output .= "<meta content='".$indexPos."' itemprop='position'>";
                $output .= '</a>';
                $output .= '</li>';
            }

        }

        if(!empty($this->tags['open'])){
            $output .= $this->tags['close'];
        }else{
            $output .= "</ol>";
        }

        return $output;
    }
}
