<?php
class Home extends Controller
{
    public function index()
    {
        $data['page_title'] = "Photos";
        $this->view("catalog/index", $data);
    }
}