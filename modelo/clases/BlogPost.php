<?php

Class BlogPost{
    public $id;
    public $title;
    public $author;
    public $category;
    public $status;


    function __construct($id = null, $title = null, $author = null, $category = null, $status = null)
    {
        if(!empty($id)): $this->id = $id; endif;
        if(!empty($title)): $this->title = $title; endif;
        if(!empty($author)): $this->author = $author; endif;
        if(!empty($category)): $this->category = $category; endif;
        if(!empty($status)): $this->status = $status; endif;
    }
}